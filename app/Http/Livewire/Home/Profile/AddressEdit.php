<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class AddressEdit extends Component
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

    public function updated($country)
    {
        $this->validateOnly($country);
    }

    public function addressForm()
    {

        $this->validate();
        $address = \App\Models\Address::where('id', $this->address->id)->first();
        if ($this->address->name) {
            $address->update([
                'name' => $this->address->name,
            ]);
        }
        if ($this->address->vahed) {
            $address->update([
                'vahed' => $this->address->vahed,
            ]);
        }
        if ($this->address->code_posti) {
            $address->update([
                'code_posti' => $this->address->code_posti,
            ]);
        }
        if ($this->address->lname) {
            $address->update([
                'lname' => $this->address->lname,
            ]);
        }
        if ($this->address->address) {
            $address->update([
                'address' => $this->address->address,
            ]);
        }
        if ($this->address->state) {
            $address->update([
                'state' => $this->address->state,
            ]);
        }
        if ($this->address->mobile) {
            $address->update([
                'mobile' => $this->address->mobile,
            ]);
        }
        if ($this->address->bld_num) {
            $address->update([
                'bld_num' => $this->address->bld_num,
            ]);
        }
        if ($this->address->city) {
            $address->update([
                'city' => $this->address->city,
            ]);
        }

        return $this->redirect(route('address.index'));
    }

    public function render()
    {
        return view('livewire.home.profile.address-edit')->layout('layouts.home');
    }
}
