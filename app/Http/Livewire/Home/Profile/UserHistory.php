<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class UserHistory extends Component
{
    //    public \App\Models\Address $address;
    //
    //    public function mount()
    //    {
    //        $this->address = new \App\Models\Address();
    //    }
    //
    //    protected $rules = [
    //        'address.name' => 'nullable',
    //        'address.vahed' => 'nullable',
    //        'address.code_posti' => 'nullable',
    //        'address.lname' => 'nullable',
    //        'address.address' => 'nullable',
    //        'address.mobile' => 'nullable',
    //        'address.bld_num' => 'nullable',
    //        'address.city' => 'nullable',
    //        'address.state' => 'nullable',
    //
    //    ];

    //    public function updated($country)
    //    {
    //        $this->validateOnly($country);
    //    }
    //
    //    public function addressForm()
    //    {
    //        $this->validate();
    //        \App\Models\Address::create([
    //            'user_id' => auth()->user()->id,
    //            'name' => $this->address->name,
    //            'vahed' => $this->address->vahed,
    //            'code_posti' => $this->address->code_posti,
    //            'lname' => $this->address->lname,
    //            'address' => $this->address->address,
    //            'mobile' => $this->address->mobile,
    //            'bld_num' => $this->address->bld_num,
    //            'city' => $this->address->city,
    //            'state' => $this->address->state,
    //        ]);
    //        return $this->redirect(request()->header('Referer'));
    //    }

    public function deleteUserHistory($id)
    {
        $userHistory = \App\Models\UserHistory::find($id);
        $userHistory->delete();
        $this->emit('toast', 'success', ' تاریخچه بازدید شما با موفقیت حذف شد.');
    }

    //    public function sendEditForm($address)
    //    {
    //        return $this->redirect(route('address.edit',$address));
    //    }

    public function render()
    {
        return view('livewire.home.profile.user-history')
            ->layout('layouts.home');
    }
}
