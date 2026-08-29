<?php

namespace App\Http\Controllers;

use App\Mail\OrderSubmit;
use App\Models\BankPayment;
use App\Models\Email as EmailLog;
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
                PaymentModel::where('order_number', $bank->order_number)->update([
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

        $bankPayment = BankPayment::where('order_number', $paymentRecord->order_number)
            ->where('status', 0)
            ->first();

        if (! $bankPayment) {
            return redirect()->route('home.index');
        }

        $gateway = new PaymentGateway(config('payment'));
        if ($paymentRecord->driver) {
            $gateway->via($paymentRecord->driver);
        }

        try {
            $receipt = $gateway
                ->amount($bankPayment->price)
                ->transactionId($transactionId)
                ->verify();
        } catch (InvalidPaymentException $exception) {
            report($exception);

            return redirect()->route('home.index');
        } catch (Throwable $exception) {
            report($exception);

            return redirect()->route('home.index');
        }

        $referenceId = method_exists($receipt, 'getReferenceId')
            ? (string) $receipt->getReferenceId()
            : (string) $transactionId;

        $orders = DB::transaction(function () use ($bankPayment, $referenceId) {
            PaymentModel::where('order_number', $bankPayment->order_number)->update([
                'status' => 1,
            ]);

            BankPayment::where('order_number', $bankPayment->order_number)->update([
                'status' => 1,
            ]);

            $orders = Order::where('order_number', $bankPayment->order_number)->get();
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
