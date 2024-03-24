<?php

namespace App\Http\Livewire\Seller\Auth\Register;

use App\Mail\SellerRegister;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Detail extends Component
{
    public Seller $seller;

    public $name;
    public $lname;
    public $birth;
    public $gender;
    public $shenasname_code;
    public $national_code;
    public $state;
    public $city;
    public $address;
    public $telephone;
    public $pin_code;
    public $mobile;
    public $brand_name;
    public $bank_shaba;
    public $about;


    public function sellerForm()
    {

        $seller = $this->seller->update([
            'name' => $this->name,
            'lname' => $this->lname,
            'birth' => $this->birth,
            'gender' => $this->gender,
            'shenasname_code' => $this->shenasname_code,
            'national_code' => $this->national_code,
            'state' => $this->state,
            'city' => $this->city,
            'address' => $this->address,
            'telephone' => $this->telephone,
            'pin_code' => $this->pin_code,
            'mobile' => $this->mobile,
            'brand_name' => $this->brand_name,
            'bank_shaba' => $this->bank_shaba,
            'about' => $this->about,
        ]);

        $seller2 = $this->seller->id - 1;
        $code = Seller::find($seller2);
        $this->seller->update([
            'code_seller' => $code->code_seller + 1
        ]);
        $user = User::where('email', $this->seller->email)->first();
        $user->update([

            'name' => $this->name,
            'national_code' => $this->national_code,
            'birthday' => $this->birth,

        ]);


        $this->seller->update([
            'user_id' => $user->id
        ]);


        $email = \App\Models\Email::create([
            'user_id' => $this->seller->id,
            'user_email' => $this->seller->email,
            'user_mobile' => $this->seller->mobile,
            'title' => 'ثبت نام فروشنده جدید',
            'text' => 'فروشنده با ایمیل فوق با موفقیت ثبت نام شد',
            'code' => 'ثبت نام موفق بود',
        ]);

        Mail::to($this->seller->email)->send(new SellerRegister($email));
//
        auth()->loginUsingId($this->seller->user_id);
        return $this->redirect(route('seller.dashboard.index'));

    }

    public function render()
    {

        $seller = $this->seller;
        return view('livewire.seller.auth.register.detail', compact('seller'))
            ->layout('layouts.seller');
    }
}
