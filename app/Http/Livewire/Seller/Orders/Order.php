<?php

namespace App\Http\Livewire\Seller\Orders;

use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        return view('livewire.seller.orders.order')
            ->layout('layouts.seller_dashboard');
    }
}
