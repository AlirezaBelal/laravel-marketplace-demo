<?php

namespace App\Http\Livewire\Home\Compare;

use App\Models\Compare;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Step2 extends Component
{

    public function pic1($id)
    {
        $p = Compare::where('user_id', auth()->user()->id)->where('product_id', '!=', $id)->first();

        $compare1 = Compare::where('user_id', auth()->user()->id)->where('product_id', $id)->first();
        $compare1->delete();
        return $this->redirect(route('compare.step1', $p->product_id));
    }

    public function pic2($id)
    {
        $p = Compare::where('user_id', auth()->user()->id)->where('product_id', '!=', $id)->first();
        $compare2 = Compare::where('user_id', auth()->user()->id)->where('product_id', $id)->first();
        $compare2->delete();

        return $this->redirect(route('compare.step1', $p->product_id));
    }

    public function render()
    {
        $com1 = Request::segment(2);
        $compre1 = (int)str_replace("dkp-", "", $com1);
        $product1 = Product::find($compre1);

        $com2 = Request::segment(3);
        $compre2 = (int)str_replace("dkp-", "", $com2);
        $product2 = Product::find($compre2);

        return view('livewire.home.compare.step2',
            compact('compre1', 'product1', 'compre2', 'product2'))->layout('layouts.home');
    }
}
