<?php

namespace App\Http\Livewire\Seller\Auth\Register;

use App\Models\Seller;
use Livewire\Component;

class Email extends Component
{
    public Seller $seller;

    public $code;

    public function registerEmailVerify()
    {

        $usr = \App\Models\Email::where('user_email', $this->seller->email)->where('code', $this->code)->first();

        if ($usr) {

            return $this->redirect(route('seller.register.detail', $usr->user_id));
        } else {

            $this->emit('toast', 'error', ' کد وارد شده صحیح نمی باشد.');
        }

    }

    public function render()
    {
        $seller = $this->seller;

        return view('livewire.seller.auth.register.email', compact('seller'))->layout('layouts.seller');
    }
}
