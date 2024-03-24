<?php

namespace App\Http\Livewire\Seller\Auth;

use App\Mail\SellerRegister;
use App\Models\Email;
use App\Models\Seller;
use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Kavenegar\KavenegarApi;
use Livewire\Component;

class Register extends Component
{
    public Seller $seller;

    public function mount()
    {
        $this->seller = new Seller();
    }


    protected $rules = [
        'seller.email' => 'nullable',
        'seller.phone' => 'nullable',
        'seller.password' => 'nullable',
    ];

    public function updated($email)
    {
        $this->validateOnly($email);
    }


    public function registerSellerForm()
    {
        $this->validate();

        $seller = Seller::create([
            'email' => $this->seller->email,
            'mobile' => $this->seller->phone,
            'password' => $this->seller->password,
        ]);
        $code = random_int(1000, 9999);

        $email = Email::create([
            'user_id' => $seller->id,
            'user_email' => $seller->email,
            'user_mobile' => $seller->mobile,
            'title' => 'ثبت نام فروشنده جدید',
            'text' => 'فروشنده با ایمیل فوق درخواست ثبت نام جدیدی را دارد.',
            'code' => $code,
        ]);
        $user = User::create([
            'seller' => 1,
            'email' => $this->seller->email,
            'mobile' => $this->seller->phone,
            'password' => Hash::make($this->seller->password),

        ]);
        Mail::to($seller->email)->send(new SellerRegister($email));


        return $this->redirect(route('seller.register.email', $seller->id));

    }

    public function render()
    {
        return view('livewire.seller.auth.register')->layout('layouts.seller');
    }
}
