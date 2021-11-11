<?php

namespace App\Http\Livewire\Home\User;

use App\Models\SMS;
use App\Models\User;
use Kavenegar\KavenegarApi;
use Livewire\Component;

class ForgetPasswordPhone extends Component
{
    public User $user;
    public SMS $sms;

    protected $rules = [
        'sms.code' => 'required',
    ];


    public function mount()
    {
        $this->sms = new Sms();
    }


    public function updated($code)
    {
        $this->validateOnly($code);
    }


    public function userForm()
    {
        $this->validate();
        $sms_code = SMS::where('code', $this->sms->code)
            ->first();

        if ($sms_code) {
            if ($sms_code->user_id == $this->user->id) {
                return $this->redirect(route('users.password.reset', $this->user->id));
            } else {
                $this->emit('toast', 'error', ' کد وارد شده اشتباه است!');
            }

        } else {
            $this->emit('toast', 'error', ' کد وارد شده اشتباه است!');
        }
    }


    public function resendSMS($id)
    {
        $type = 'اسمس دوباره فراموشی رمز حساب';
        $mobile = User::where('id', $id)
            ->first();

        $code = random_int(10000, 99999);
        $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
        $client->send(env('SENDER_MOBILE'), $mobile->mobile,
            "کد تایید شما: $code");
        SMS::create([
            'code' => $code,
            'type' => $type,
            'user_id' => $mobile->id,
        ]);
        $this->emit('toast', 'success', 'کد تایید دوباره ارسال شد!');
        return $this->redirect(request()->header('Referer'));
    }


    public function render()
    {
        return view('livewire.home.user.forget-password-phone')->layout('layouts.login');
    }
}
