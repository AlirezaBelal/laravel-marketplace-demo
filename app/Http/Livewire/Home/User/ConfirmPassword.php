<?php

namespace App\Http\Livewire\Home\User;

use App\Models\SMS;
use App\Models\User;
use Kavenegar\KavenegarApi;
use Livewire\Component;

class ConfirmPassword extends Component
{
    public User $user;

    public SMS $sms;

    public function mount()
    {
        $this->sms = new Sms();
    }

    protected $rules = [
        'sms.email_phone' => 'required',
    ];

    public function updated($email_phone)
    {
        $this->validateOnly($email_phone);
    }

    public function userForm()
    {

        $this->validate();

        $type = 'ورود به حساب';
        $mobile = User::where('mobile', $this->sms->email_phone)->first();
        if ($mobile) {
            $code = random_int(10000, 99999);
            $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
            $client->send(env('SENDER_MOBILE'), $this->sms->email_phone,
                "کد تایید شما: $code");

            SMS::create([
                'code' => $code,
                'type' => $type,
                'user_id' => $mobile->id,
            ]);

            return $this->redirect(route('users.confirm.password.verify', $mobile->id));
        } else {
            $this->emit('toast', 'error', ' شماره موبایل وجود ندارد. به قسمت ایجاد حساب مراجعه فرمایید!');
        }
    }

    public function render()
    {
        return view('livewire.home.user.confirm-password')->layout('layouts.login');
    }
}
