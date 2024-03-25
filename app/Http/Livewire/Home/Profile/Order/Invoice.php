<?php

namespace App\Http\Livewire\Home\Profile\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Invoice extends Component
{
    public function render()
    {
        $order_id = Request::segment(3);
        $order = Order::where('id', $order_id)->first();
        foreach (Order::where('order_number', $order->order_number)->get() as $ord) {

            $ord->update([
                'proPriceCount' => $ord->total_price * $ord->count,
                'proPriceCountDiscount' => $ord->total_discount_price * $ord->count,
                'proPriceCountD' => ($ord->total_price * $ord->count) - ($ord->total_discount_price * $ord->count),
            ]);
        }

        return view('livewire.home.profile.order.invoice', compact('order'))
            ->layout('layouts.invoice');
    }
}
