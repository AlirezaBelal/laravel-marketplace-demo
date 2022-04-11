<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PersonalInfo extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = new User();
    }

    protected $rules = [
        'user.name' => 'nullable',
        'user.email' => 'nullable',
        'user.password2' => 'nullable',
        'user.password3' => 'nullable',
        'user.img' => 'nullable',
        'user.mobile'=> 'nullable',
        'user.national_code'=> 'nullable',
        'user.birthday'=> 'nullable',
        'user.job'=> 'nullable',
        'user.money_back'=> 'nullable',
        'user.name_company'=> 'nullable',
        'user.national_code_company'=> 'nullable',
        'user.code_company'=> 'nullable',
        'user.sabt_company'=> 'nullable',
        'user.state_company'=> 'nullable',
        'user.city_company'=> 'nullable',
        'user.phone_company'=> 'nullable',
        'user.wallet'=> 'nullable',
    ];

    public function updated($password2)
    {
        $this->validateOnly($password2);
    }

    public function userForm()
    {

        $user = User::find(auth()->user()->id);
        $this->validate();
        if ($this->user->name) {
            $user->update([
               'name' =>$this->user->name
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->national_code) {
            $user->update([
               'national_code' =>$this->user->national_code
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->mobile) {
            $user->update([
               'mobile' =>$this->user->mobile
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->email) {
            $user->update([
               'email' =>$this->user->email
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->birthday) {
            $user->update([
               'birthday' =>$this->user->birthday
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->job) {
            $user->update([
               'job' =>$this->user->job
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->money_back) {

            $user->update([
               'money_back' =>$this->user->money_back
            ]);
            return $this->redirect(request()->header('Referer'));
        }
        if ($this->user->password2) {
            if ($this->user->password2 == $this->user->password3) {
                $user->update([
                    'password' => Hash::make($this->user->password2),
                ]);
            }
            return $this->redirect(request()->header('Referer'));
        }



//            $this->emit('toast', 'error', ' رمز عبور وارد شده اشتباه است!');

    }
    public function companyForm()
    {
        $user = User::find(auth()->user()->id);
        $this->validate();
        if ($this->user->name_company){
            $user->update([
                'name_company' =>$this->user->name_company,
            ]);
        }
        if ($this->user->national_code_company){
            $user->update([
                'national_code_company' =>$this->user->national_code_company,
            ]);
        }
        if ($this->user->code_company){
            $user->update([
                'code_company' =>$this->user->code_company,
            ]);
        }
        if ($this->user->sabt_company){
            $user->update([
                'sabt_company' =>$this->user->sabt_company,
            ]);
        }
        if ($this->user->state_company){
            $user->update([
                'state_company' =>$this->user->state_company,
            ]);
        }
        if ($this->user->city_company){
            $user->update([
                'city_company' =>$this->user->city_company,
            ]);
        }
        if ($this->user->phone_company){
            $user->update([
                'phone_company' =>$this->user->phone_company,
            ]);
        }

            return $this->redirect(request()->header('Referer'));


    }


    public function render()
    {
        $user = auth()->user();
        return view('livewire.home.profile.personal-info'
            , compact('user'))->layout('layouts.home');
    }
}
