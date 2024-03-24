<?php

namespace App\Http\Controllers;

use App\Mail\OrderSubmit;
use App\Mail\SellerRegister;
use App\Models\BankPayment;
use App\Models\Notification;
use App\Models\Order;
use App\Models\SMS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Kavenegar\KavenegarApi;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;

class PayController extends Controller
{
    public function pay()
    {
        $bank = BankPayment::where('user_id', auth()->user()->id)->where('status', 0)->get()->last();
        if ($bank->status == 1) {
//            alert()->message('شما قبلا این سفارش را پرداخت کرده اید.');
            return back();
        }
        $payconfig = config('payment');
        $payment = new Payment($payconfig);
        $invoice = (new Invoice)->amount($bank->price);
        return $payment->callbackUrl(env('CALLBACK_URL'))->purchase($invoice, function ($driver, $transactionId) {
            $bank = BankPayment::where('user_id', auth()->user()->id)->where('status', 0)->get()->last();
            $paymentModels = \App\Models\Payment::where('order_number', $bank->order_number)->get();
            foreach ($paymentModels as $paymentModel) {
                $paymentModel->update([
                    'transactionId' => $transactionId,
                    'driver' => config('payment.default'),
                ]);
            }
        })->pay()->render();
    }

    public function callback()
    {

        $Authority = \request()->Authority;
        $status = \request()->Status;
        if ($status == "OK") {
            $payments = \App\Models\Payment::where('transactionId', $Authority)->get();
            $bank_payments = BankPayment::where('order_number', $payments[0]->order_number)->get();
            $orders = Order::where('order_number', $payments[0]->order_number)->get();
            foreach ($payments as $payment) {
                $payment->update([
                    'status' => 1
                ]);
            }
            foreach ($bank_payments as $bank_payment) {
                $bank_payment->update([
                    'status' => 1
                ]);
            }
            foreach ($orders as $order) {
                $order->update([
                    'payment' => 1,
                    'transaction_id' => $Authority,
                    'status' => 'paid'
                ]);
                //مشتری
                $type = 'سفارش شما ثبت شد';
                Notification::create([
                    'user_id' => $order->user_id,
                    'product_id' => $order->product_id,
                    'type' => $type,
                    'sms' => 1,
                    'email' => 1,
                    'system' => 1,
                    'text' => $order->product->title,
                ]);
                //فروشنده
                $type = 'سفارش جدیدی برای شما ثبت شد';
                Notification::create([
                    'user_id' => $order->product_seller_id,
                    'product_id' => $order->product_id,
                    'type' => $type,
                    'sms' => 1,
                    'email' => 1,
                    'system' => 1,
                    'text' => $order->product->title,
                ]);
                //ادمین
                $type = 'سفارش جدیدی در سایت ثبت شد';
                Notification::create([
                    'user_id' => 1,
                    'product_id' => $order->product_id,
                    'type' => $type,
                    'sms' => 1,
                    'email' => 1,
                    'system' => 1,
                    'text' => $order->product->title,
                ]);
/////////////////////////////////sms
///

                $type2 = 'سفارش جدیدی برای شما ثبت شد';
                $seller = User::where('id', $order->product_seller_id)->first();
                $code = random_int(10000, 99999);
                $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
                $client->send(env('SENDER_MOBILE'), $seller->mobile,
                    "  سفارش محصولی در سایت دیجی کالا برای شما ثبت شد");

                SMS::create([
                    'code' => $code,
                    'type' => $type2,
                    'user_id' => $order->product_seller_id,
                ]);

                $type3 = 'سفارش جدیدی در سایت شما ثبت شد';
                $Admin = User::where('id', 1)->first();
                $code = random_int(10000, 99999);
                $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
                $client->send(env('SENDER_MOBILE'), $Admin->mobile,
                    "  سفارش محصولی در سایت دیجی کالا برای شما ثبت شد");

                SMS::create([
                    'code' => $code,
                    'type' => $type3,
                    'user_id' => 1,
                ]);

                ///////////////////////////////////email
                $email = \App\Models\Email::create([
                    'user_id' => $seller->id,
                    'user_email' => $seller->email,
                    'user_mobile' => $seller->mobile,
                    'title' => 'سفارش محصولی در سایت  برای شما ثبت شد',
                    'text' => 'سفارش محصولی در سایت دیجی کالا برای شما ثبت شد',
                    'code' => 'سفارش با موفقیت پرداخت شد',
                ]);

                Mail::to(auth()->user()->email)->send(new OrderSubmit($email));
                //////////admin

                $email3 = \App\Models\Email::create([
                    'user_id' => $Admin->id,
                    'user_email' => $Admin->email,
                    'user_mobile' => $Admin->mobile,
                    'title' => 'سفارش جدیدی در سایت دریافت شد',
                    'text' => 'سفارش جدیدی در سایت با موفقیت دریافت شد و پرداخت شده است',
                    'code' => 'سفارش با موفقیت پرداخت شد',
                ]);

                Mail::to($Admin->email)->send(new OrderSubmit($email3));


            }
//            alert()->success('پرداخت موفق')->message('سفارش با موفقیت ثبت شد.');

            $type = 'سفارش شما ثبت شد';
            $code = random_int(10000, 99999);
            $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
            $client->send(env('SENDER_MOBILE'), auth()->user()->mobile,
                "کد تایید شما: $code");

            SMS::create([
                'code' => $code,
                'type' => $type,
                'user_id' => auth()->user()->id,
            ]);

            ////////////////////////////
            $email = \App\Models\Email::create([
                'user_id' => auth()->user()->id,
                'user_email' => auth()->user()->email,
                'user_mobile' => auth()->user()->mobile,
                'title' => 'سفارش شما با موفقیت دریافت شد',
                'text' => 'سفارش شما با موفقیت دریافت شد و در حال پردازش است',
                'code' => 'سفارش با موفقیت پرداخت شد',
            ]);

            Mail::to(auth()->user()->email)->send(new OrderSubmit($email));


            ///////////////////////////////////////////////////


            return redirect(route('profile.index'));
        } else {
//            alert()->message('پرداخت با شکست مواجه شد.');
            return redirect('/');
        }
    }
}
