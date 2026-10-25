<?php

namespace App\Http\Controllers;

use App\Mail\OrderSubmit;
use App\Models\BankPayment;
use App\Models\Email as EmailLog;
use App\Models\Gift;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment as PaymentModel;
use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Kavenegar\KavenegarApi;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment as PaymentGateway;
use Throwable;

class PayController extends Controller
{
    public function pay()
    {
        $bank = BankPayment::where('user_id', auth()->id())
            ->where('status', 0)
            ->latest('id')
            ->first();

        if (! $bank) {
            return back();
        }

        $gateway = new PaymentGateway(config('payment'));
        $invoice = (new Invoice)->amount($bank->price);

        return $gateway
            ->callbackUrl(route('bank.callback'))
            ->purchase($invoice, function ($driver, $transactionId) use ($bank) {
                PaymentModel::where('order_number', $bank->order_number)
                    ->where('user_id', $bank->user_id)->update([
                    'transactionId' => $transactionId,
                    'driver' => config('payment.default'),
                ]);
            })
            ->pay()
            ->render();
    }

    public function callback()
    {
        $transactionId = request()->input('Authority')
            ?: request()->input('transactionId');

        if (! $transactionId) {
            return redirect()->route('home.index');
        }

        $paymentRecord = PaymentModel::where('transactionId', $transactionId)->first();
        if (! $paymentRecord) {
            return redirect()->route('home.index');
        }

        // A retry must not contact the gateway or fulfill an already paid order.
        if ((int) $paymentRecord->status === 1) {
            return redirect()->route('home.index');
        }

        $bankPayment = BankPayment::where('order_number', $paymentRecord->order_number)
            ->where('user_id', $paymentRecord->user_id)
            ->where('status', 0)
            ->latest('id')->first();

        if (! $bankPayment) {
            return redirect()->route('home.index');
        }

        try {
            $referenceId = $this->verifyTransaction($paymentRecord, $bankPayment, $transactionId);
        } catch (InvalidPaymentException $exception) {
            report($exception);

            return redirect()->route('home.index');
        } catch (Throwable $exception) {
            report($exception);

            return redirect()->route('home.index');
        }

        $orders = DB::transaction(function () use ($bankPayment, $paymentRecord, $referenceId) {
            // The payment row serializes concurrent callbacks for this order.
            $lockedPayment = PaymentModel::whereKey($paymentRecord->id)->lockForUpdate()->first();
            if (! $lockedPayment || (int) $lockedPayment->status === 1) {
                return collect();
            }

            $lockedBank = BankPayment::whereKey($bankPayment->id)->lockForUpdate()->first();
            if (! $lockedBank || (string) $lockedBank->status !== '0' ||
                BankPayment::where('order_number', $bankPayment->order_number)
                    ->where('user_id', $bankPayment->user_id)->where('status', 1)->exists()) {
                return collect();
            }

            $orders = Order::where('order_number', $lockedBank->order_number)
                ->where('user_id', $lockedBank->user_id)->get();
            if ($orders->isEmpty()) {
                $lockedBank->update(['status' => 'reconciliation_required', 'gateway_reference' => $referenceId]);

                return collect();
            }

            // An unsuccessful/abandoned gateway attempt must never consume credit.
            // Lock the gift before debit so two different orders cannot spend it twice.
            if ((int) $lockedBank->gift_applied > 0) {
                $gift = Gift::where('code', $lockedBank->gift_code)
                    ->spendableBy((int) $lockedBank->user_id)->lockForUpdate()->first();
                if (! $gift || (int) $gift->value_price < (int) $lockedBank->gift_applied) {
                    // Gateway verified but credit was exhausted in the meantime.
                    // Record the verified reference and leave the order unfulfilled
                    // for manual payment reconciliation; never re-charge automatically.
                    $lockedBank->update(['status' => 'reconciliation_required', 'gateway_reference' => $referenceId]);
                    report(new \RuntimeException('Verified bank payment requires gift credit reconciliation for bank payment #'.$lockedBank->id));

                    return collect();
                }

                $gift->update([
                    'value_price' => (int) $gift->value_price - (int) $lockedBank->gift_applied,
                    'user_id' => $lockedBank->user_id,
                    'type' => 1,
                ]);
            }

            PaymentModel::where('order_number', $lockedBank->order_number)
                ->where('user_id', $lockedBank->user_id)->update([
                'status' => 1,
            ]);

            $lockedBank->update(['status' => 1, 'gateway_reference' => $referenceId]);

            foreach ($orders as $order) {
                $order->update([
                    'payment' => 1,
                    'transaction_id' => $referenceId,
                    'status' => 'paid',
                ]);

                Notification::create([
                    'user_id' => $order->user_id,
                    'product_id' => $order->product_id,
                    'type' => 'سفارش شما ثبت شد',
                    'sms' => 1,
                    'email' => 1,
                    'system' => 1,
                    'text' => $order->product->title,
                ]);

                Notification::create([
                    'user_id' => $order->product_seller_id,
                    'product_id' => $order->product_id,
                    'type' => 'سفارش جدیدی برای شما ثبت شد',
                    'sms' => 1,
                    'email' => 1,
                    'system' => 1,
                    'text' => $order->product->title,
                ]);

                Notification::create([
                    'user_id' => 1,
                    'product_id' => $order->product_id,
                    'type' => 'سفارش جدیدی در سایت ثبت شد',
                    'sms' => 1,
                    'email' => 1,
                    'system' => 1,
                    'text' => $order->product->title,
                ]);
            }

            return $orders;
        });

        if ($orders->isEmpty()) {
            return redirect()->route('home.index');
        }

        $customer = User::find($bankPayment->user_id);
        $admin = User::find(1);

        foreach ($orders as $order) {
            $seller = User::find($order->product_seller_id);
            if ($seller) {
                $this->sendSms($seller, 'سفارش محصولی در سایت برای شما ثبت شد', 'سفارش جدیدی برای شما ثبت شد');
                $this->sendEmail($seller, 'سفارش محصولی برای شما ثبت شد', 'سفارش محصولی در سایت برای شما ثبت شد');
            }
        }

        if ($admin) {
            $this->sendSms($admin, 'سفارش جدیدی در سایت ثبت شد', 'سفارش جدیدی در سایت شما ثبت شد');
            $this->sendEmail($admin, 'سفارش جدیدی در سایت دریافت شد', 'سفارش جدیدی در سایت با موفقیت دریافت شد و پرداخت شده است');
        }

        if ($customer) {
            $this->sendSms($customer, 'سفارش شما با موفقیت پرداخت شد', 'سفارش شما ثبت شد');
            $this->sendEmail($customer, 'سفارش شما با موفقیت دریافت شد', 'سفارش شما با موفقیت دریافت شد و در حال پردازش است');
        }

        return $customer
            ? redirect()->route('profile.index')
            : redirect()->route('home.index');
    }

    /**
     * Verify a provider transaction before any persistent fulfillment.
     * Kept isolated so feature tests can substitute a fake provider.
     */
    protected function verifyTransaction(PaymentModel $payment, BankPayment $bank, string $transactionId): string
    {
        $gateway = new PaymentGateway(config('payment'));
        if ($payment->driver) {
            $gateway->via($payment->driver);
        }

        $receipt = $gateway
            ->amount($bank->price)
            ->transactionId($transactionId)
            ->verify();

        return method_exists($receipt, 'getReferenceId')
            ? (string) $receipt->getReferenceId()
            : $transactionId;
    }

    private function sendSms(User $user, string $message, string $type): void
    {
        $apiKey = (string) env('KAVENEGAR_CLIENT_API', '');
        $sender = (string) env('SENDER_MOBILE', '');

        if ($apiKey === '' || $sender === '' || ! $user->mobile) {
            return;
        }

        try {
            (new KavenegarApi($apiKey))->send($sender, $user->mobile, $message);
            SMS::create([
                'code' => random_int(10000, 99999),
                'type' => $type,
                'user_id' => $user->id,
            ]);
        } catch (Throwable $exception) {
            report($exception);
        }
    }

    private function sendEmail(User $user, string $title, string $text): void
    {
        if (! $user->email) {
            return;
        }

        try {
            $email = EmailLog::create([
                'user_id' => $user->id,
                'user_email' => $user->email,
                'user_mobile' => $user->mobile,
                'title' => $title,
                'text' => $text,
                'code' => 'سفارش با موفقیت پرداخت شد',
            ]);

            Mail::to($user->email)->send(new OrderSubmit($email));
        } catch (Throwable $exception) {
            report($exception);
        }
    }
}
