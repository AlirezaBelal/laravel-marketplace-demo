<?php

namespace App\Http\Livewire\Home\User;

use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Confirm extends Component
{
    public User $user;


    protected $rules = [
        'user.password2' => 'required',
    ];

    public function updated($password2)
    {
        $this->validateOnly($password2);
    }

    public function userForm()
    {
        $user = User::where('id',$this->user->id)->first();
        $this->validate();
        if (Hash::check($this->user->password2, $user->password)) {
            auth()->loginUsingId($user->id);
            $userIp2 = Request::ip();
            $cart2s = \App\Models\Cart::where('ip',$userIp2)->get();
            if ($cart2s) {
                foreach ($cart2s as $cart){
                    $cart->update([
                        'user_id' =>auth()->user()->id,
                    ]);
                }

            }
            return $this->redirect('/');
        } else {
            $this->emit('toast', 'error', ' رمز عبور وارد شده اشتباه است!');
        }

    }


    public function render()
    {

        $user = $this->user;
        return view('livewire.home.user.confirm', compact('user'))->layout('layouts.login');
    }
}
