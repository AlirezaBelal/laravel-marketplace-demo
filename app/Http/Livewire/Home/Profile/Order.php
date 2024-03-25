<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\Payment;
use Livewire\Component;

class Order extends Component
{
    public function PaymentBank($id)
    {
        $payment = Payment::find($id);

        return $this->redirect('/payment/bank/order-'.$payment->order_number);
    }

    public function render()
    {
        return view('livewire.home.profile.order')->layout('layouts.home');
    }
}
