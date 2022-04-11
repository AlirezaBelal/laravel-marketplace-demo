<?php

namespace App\Http\Livewire\Home\Profile\Order;

use Livewire\Component;

class Delivered extends Component
{
    public function render()
    {
        return view('livewire.home.profile.order.delivered')->layout('layouts.home');
    }
}
