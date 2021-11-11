<?php

namespace App\Http\Livewire\Home\User;

use App\Models\User;
use Livewire\Component;

class RegisterConfirm2 extends Component
{
    public User $user;

    protected $rules = [
        'user.email_phone' => 'required',
    ];


    public function mount()
    {
        $this->user = new User();
    }


    public function updated($email_phone)
    {
        $this->validateOnly($email_phone);
    }


    public function render()
    {
        return view('livewire.home.user.register-confirm2')->layout('layouts.login');
    }
}
