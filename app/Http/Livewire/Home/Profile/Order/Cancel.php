<?php

namespace App\Http\Livewire\Home\Profile\Order;

use Livewire\Component;

class Cancel extends Component
{
    public function render()
    {
        return view('livewire.home.profile.order.cancel')->layout('layouts.home');
    }
}
