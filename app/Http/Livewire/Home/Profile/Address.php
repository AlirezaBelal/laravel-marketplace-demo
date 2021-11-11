<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Address extends Component
{
    public \App\Models\Address $address;

    protected $rules = [
        'address.name' => 'nullable',
        'address.vahed' => 'nullable',
        'address.code_posti' => 'nullable',
        'address.lname' => 'nullable',
        'address.address' => 'nullable',
        'address.mobile' => 'nullable',
        'address.bld_num' => 'nullable',
        'address.city' => 'nullable',
        'address.state' => 'nullable',

    ];


    public function mount()
    {
        $this->address = new \App\Models\Address();
    }


    public function updated($country)
    {
        $this->validateOnly($country);
    }


    public function addressForm()
    {
        $this->validate();
        \App\Models\Address::create([
            'user_id' => auth()->user()->id,
            'name' => $this->address->name,
            'vahed' => $this->address->vahed,
            'code_posti' => $this->address->code_posti,
            'lname' => $this->address->lname,
            'address' => $this->address->address,
            'mobile' => $this->address->mobile,
            'bld_num' => $this->address->bld_num,
            'city' => $this->address->city,
            'state' => $this->address->state,
        ]);

        return $this->redirect(request()->header('Referer'));
    }


    public function deleteAddress($id)
    {
        $address = \App\Models\Address::find($id);
        $address->delete();
        $this->emit('toast', 'success', ' آدرس با موفقیت حذف شد.');
    }


    public function sendEditForm($address)
    {
        return $this->redirect(route('address.edit', $address));
    }


    public function render()
    {
        $address = $this->address;
        return view('livewire.home.profile.address',
            compact('address'))->layout('layouts.home');
    }
}
