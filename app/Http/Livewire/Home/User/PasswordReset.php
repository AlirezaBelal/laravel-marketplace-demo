<?php

namespace App\Http\Livewire\Home\User;

use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class PasswordReset extends Component
{
    public User $user;
    public SMS $sms;



    public function mount()
    {
        $this->sms = new SMS();
    }

    protected $rules = [
        'sms.password2' => ['required', 'string'],
        'sms.password_confirmed' => ['required', 'string'],
    ];

    public function updated($password2)
    {
        $this->validateOnly($password2);
    }


    public function userForm()
    {

        $this->validate();
        if ($this->sms->password2 == $this->sms->password_confirmed) {
            $user_update = User::where('id', $this->user->id)->first();
            $user_update->update([
                'password' => Hash::make($this->user->password2),
            ]);
            auth()->loginUsingId($user_update->id);
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
            $this->emit('toast', 'error', ' پسورد وارد شده با هم مطابقت ندارد!');
        }

    }

    public function render()
    {

        return view('livewire.home.user.password-reset')->layout('layouts.login');
    }
}
