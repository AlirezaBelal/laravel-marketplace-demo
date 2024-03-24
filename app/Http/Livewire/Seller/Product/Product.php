<?php

namespace App\Http\Livewire\Seller\Product;

use Livewire\Component;

class Product extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {

        $products = \App\Models\Product::where('vendor_id', auth()->user()->id)->
        where('status_product', 1)->get();

        return view('livewire.seller.product.product', compact('products'))
            ->layout('layouts.seller_dashboard');
    }
}
