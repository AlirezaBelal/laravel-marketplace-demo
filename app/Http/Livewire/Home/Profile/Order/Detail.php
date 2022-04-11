<?php

namespace App\Http\Livewire\Home\Profile\Order;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        $order_number = Request::segment(3);

        $orders = Order::where('order_number',$order_number)->get();
        $payment_first = Payment::where('order_number',$order_number)->first();
        $payments = Payment::where('order_number',$order_number)->get();
        $order_first = Order::where('order_number',$order_number)->first();
        return view('livewire.home.profile.order.detail',
            compact('orders','order_first','payments','payment_first','order_number'))
            ->layout('layouts.home');
    }
}
