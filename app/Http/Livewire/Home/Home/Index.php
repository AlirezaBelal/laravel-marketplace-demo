<?php

namespace App\Http\Livewire\Home\Home;

use App\Models\FooterLinkTitle;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
auth()->loginUsingId(1);

        return view('livewire.home.home.index')->layout('layouts.home');
    }
}
