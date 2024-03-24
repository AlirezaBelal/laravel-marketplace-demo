<?php

namespace App\Http\Livewire\Home\Compare;

use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Step1 extends Component
{
    public Product $product;

    public function render()
    {
        $com1 = Request::segment(2);
        $compre1 = (int)str_replace("dkp-", "", $com1);
        $product1 = Product::find($compre1);

        return view('livewire.home.compare.step1',
            compact('product1', 'compre1'))
            ->layout('layouts.home');
    }
}
