<?php

namespace App\Http\Controllers;

use App\Models\BankPayment;
use App\Models\Order;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;

class PayController extends Controller
{
    public function pay()
    {
        $bank = BankPayment::where('user_id', auth()->user()->id)->where('status', 0)->get()->last();
        if ($bank->status == 1) {
            alert()->message('شما قبلا این سفارش را پرداخت کرده اید.');
            return back();
        }
        $payconfig = config('payment');
        $payment = new Payment($payconfig);
        $invoice = (new Invoice)->amount($bank->price);
     return   $payment->callbackUrl(env('CALLBACK_URL'))->purchase($invoice, function ($driver, $transactionId) {
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
        if ($status =="OK") {
            $payments = \App\Models\Payment::where('transactionId',$Authority)->get();
            $bank_payments = BankPayment::where('order_number',$payments[0]->order_number)->get();
            $orders = Order::where('order_number',$payments[0]->order_number)->get();
            foreach ($payments as $payment){
                $payment->update([
                    'status' =>1
                ]);
            }
            foreach ($bank_payments as $bank_payment){
                $bank_payment->update([
                    'status' =>1
                ]);
            }
            foreach ($orders as $order){
                $order->update([
                    'payment' =>1,
                    'transaction_id'=>$Authority,
                    'status'=>'paid'
                ]);
            }
            alert()->success('پرداخت موفق')->message('سفارش با موفقیت ثبت شد.');
            return redirect(route('profile.index'));
        }else
        {
            alert()->message('پرداخت با شکست مواجه شد.');
            return redirect('/');
        }
    }
}
