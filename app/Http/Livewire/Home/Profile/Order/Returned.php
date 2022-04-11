<?php

namespace App\Http\Livewire\Home\Profile\Order;

use Livewire\Component;

class Returned extends Component
{
    public function render()
    {
        return view('livewire.home.profile.order.returned')->layout('layouts.home');
    }
}
