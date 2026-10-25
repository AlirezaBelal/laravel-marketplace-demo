<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class Gift extends Component
{
    public string $newcard = '';

    protected $rules = [
        'newcard' => 'required|string|max:64',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function giftForm()
    {
        $this->validate();
        // One conditional update prevents a second account from claiming a
        // card that was already redeemed, even under concurrent requests.
        $claimed = \App\Models\Gift::where('code', trim($this->newcard))
            ->where('type', 0)
            ->whereNull('user_id')
            ->where(function ($query): void {
                $query->whereNull('date_expire')->orWhereDate('date_expire', '>=', today());
            })
            ->update([
                'user_id' => auth()->user()->id,
                'type' => 1,
            ]);
        if ($claimed === 1) {
            $this->dispatch('toast', type: 'success', message: ' کد هدیه وارد شده ثبت شد.');
        } else {
            $this->dispatch('toast', type: 'error', message: ' کارت هدیه نامعتبر، منقضی یا متعلق به حساب دیگری است.');
        }

    }

    public function render()
    {
        return view('livewire.home.profile.gift')->layout('layouts.home');
    }
}
