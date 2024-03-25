<?php

namespace App\Http\Livewire\Seller\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $password;

    public $email;

    public function loginForm()
    {

        $user = User::where('email', $this->email)->first();

        //         if ($this->password == $user->password){
        if (Hash::check($this->password, $user->password)) {
            auth()->loginUsingId($user->id);
            $this->redirect('/seller');
        }

    }

    public function render()
    {
        return view('livewire.seller.auth.login')
            ->layout('layouts.seller');
    }
}
