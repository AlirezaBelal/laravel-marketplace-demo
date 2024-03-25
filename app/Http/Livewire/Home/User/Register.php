<?php

namespace App\Http\Livewire\Home\User;

use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Kavenegar\KavenegarApi;
use Livewire\Component;

class Register extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = new User();
    }

    protected $rules = [
        'user.email_phone' => 'required',
    ];

    public function updated($email_phone)
    {
        $this->validateOnly($email_phone);
    }

    public function userForm()
    {
        $this->validate();
        $email = User::where('email', $this->user->email_phone)->first();
        $mobile = User::where('mobile', $this->user->email_phone)->first();

        if ($email) {
            return $this->redirect(route('users.confirm', $email->id));
        } elseif ($mobile) {
            return $this->redirect(route('users.confirm', $mobile->id));
        } else {
            $password = random_int(10000000, 99999999);
            $user = User::create([
                'mobile' => $this->user->email_phone,
                'password' => Hash::make($password),
            ]);
            $type = 'ایجاد حساب';
            $code = random_int(10000, 99999);
            $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
            $client->send(env('SENDER_MOBILE'), $this->user->email_phone,
                "کد تایید شما: $code");

            SMS::create([
                'code' => $code,
                'type' => $type,
                'user_id' => $user->id,
            ]);

            return $this->redirect(route('users.register.confirm', $user->id));
        }
    }

    public function render()
    {

        return view('livewire.home.user.register')->layout('layouts.login');
    }
}
