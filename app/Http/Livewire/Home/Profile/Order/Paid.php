<?php

namespace App\Http\Livewire\Home\Profile\Order;

use Livewire\Component;

class Paid extends Component
{
    public function render()
    {
        return view('livewire.home.profile.order.paid')->layout('layouts.home');
    }
}
