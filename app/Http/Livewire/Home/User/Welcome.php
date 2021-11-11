<?php

namespace App\Http\Livewire\Home\User;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.home.user.welcome')->layout('layouts.login');
    }
}
