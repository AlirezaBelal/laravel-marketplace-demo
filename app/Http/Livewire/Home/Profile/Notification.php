<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class Notification extends Component
{
    public function deleteAllNotification($id)
    {
        $notifics = \App\Models\Notification::where('user_id', $id)
            ->where('type', 1)->get();
        foreach ($notifics as $not) {
            $not->delete();
        }
        $this->dispatch('toast', type: 'success', message: ' پیغام ها با موفقیت حذف شدند.');
    }

    public function render()
    {
        return view('livewire.home.profile.notification')->layout('layouts.home');
    }
}
