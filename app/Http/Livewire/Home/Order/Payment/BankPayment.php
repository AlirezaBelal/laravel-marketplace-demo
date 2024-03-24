<?php

namespace App\Http\Livewire\Home\Order\Payment;

use Livewire\Component;

class BankPayment extends Component
{
    public \App\Models\BankPayment $bankPayment;

    public function render()
    {
        $bank = \App\Models\BankPayment::where('user_id', auth()->user()->id)
            ->get()->last();
        header('refresh:2;url=/payment/bank/pay');

        return view('livewire.home.order.payment.bank-payment', compact('bank'))->layout('layouts.home');
    }
}
