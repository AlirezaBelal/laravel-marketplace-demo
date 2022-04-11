<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class FavlistShow extends Component
{
    public function render()
    {
        return view('livewire.home.profile.favlist-show')
            ->layout('layouts.home');
    }
}
