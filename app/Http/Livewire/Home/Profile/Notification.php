<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class Notification extends Component
{

    public function render()
    {
        return view('livewire.home.profile.notification')->layout('layouts.home');
    }
}
