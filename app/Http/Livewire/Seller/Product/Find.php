<?php

namespace App\Http\Livewire\Seller\Product;

use App\Models\Product;
use App\Models\ProductSeller;
use Livewire\Component;

class Find extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function addToSale($id)
    {
        $product = Product::find($id);
        ProductSeller::create([
            'vendor_id' => auth()->user()->id,
            'product_id' => $id,
            'status' => 0,
            'warranty_id' => 0,
            'color_id' => 0,
            'product_count' => 0,
            'limit_order' => 0,
            'time' => 0,

            'anbar' => 0,
            'price' => $product->price,
            'discount_price' => $product->discount_price,
        ]);

    }

    public function render()
    {
        $products = Product::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        where('status_product', 1)->get();
        return view('livewire.seller.product.find', compact('products'))
            ->layout('layouts.seller_dashboard');
    }
}
