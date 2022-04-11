<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Gift extends Component
{
    public \App\Models\Gift $gift;

    public function mount()
    {
        $this->gift = new \App\Models\Gift();
    }

    protected $rules = [
        'gift.newcard' => 'nullable',
    ];

    public function updated($newcard)
    {
        $this->validateOnly($newcard);
    }

    public function giftForm()
    {
        $this->validate();
        $newcode = \App\Models\Gift::where('code',$this->gift->newcard)->first();
        if ($newcode) {
            $newcode->update([
               'user_id' => auth()->user()->id,
               'type' => 1,
            ]);
            $this->emit('toast', 'success', ' کد هدیه وارد شده ثبت شد.');
        }else
        {
            $this->emit('toast', 'error', ' کد هدیه وارد شده وجود ندارد.');
        }

    }

    public function render()
    {
        return view('livewire.home.profile.gift')->layout('layouts.home');
    }
}
