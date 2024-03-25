<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Models\Cart;
use App\Models\Log;
use App\Models\PriceDate;
use App\Models\ProductSeller;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public ProductSeller $productSeller;

    protected $rules = [
        'productSeller.product_id' => 'nullable',
        'productSeller.vendor_id' => 'required',
        'productSeller.time' => 'required',
        'productSeller.warranty_id' => 'required',
        'productSeller.price' => 'required',
        'productSeller.discount_price' => 'required',
        'productSeller.color_id' => 'required',
        'productSeller.product_count' => 'required',
        'productSeller.limit_order' => 'required',
        'productSeller.status' => 'nullable',
        'productSeller.anbar' => 'nullable',
    ];

    public function categoryForm()
    {

        $this->validate();
        $this->productSeller->update($this->validate());

        PriceDate::create([
            'product_id' => $this->productSeller->product_id,
            'price' => $this->productSeller->price,
            'discount_price' => $this->productSeller->discount_price,
            'product_seller_id' => $this->productSeller->id,
        ]);
        $cart = Cart::where('product_seller_id', $this->productSeller->id)->first();
        if ($cart) {
            $cart->update([
                'price_old' => $cart->product_price,
                'product_price_discount_old' => $cart->product_price_discount,
                'view' => 0,
                'read_cart' => 0,
            ]);
            $cart->update([
                'product_price' => $this->productSeller->price,
                'product_price_discount' => $this->productSeller->discount_price,
                'product_color' => $this->productSeller->color_id,
                'product_vendor' => $this->productSeller->vendor_id,
                'product_warranty' => $this->productSeller->warranty_id,
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت تنوع محصول'.'-'.$this->productSeller->product_id,
            'actionType' => 'آپدیت',
        ]);

        //        alert()->success(' با موفقیت آپدیت شد.', 'تنوع محصول مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('productVendor.index'));

    }

    public function render()
    {
        if ($this->productSeller->status == 1) {
            $this->productSeller->status = true;
        } else {
            $this->productSeller->status = false;
        }
        if ($this->productSeller->anbar == 1) {
            $this->productSeller->anbar = true;
        } else {
            $this->productSeller->anbar = false;
        }
        $productSeller = $this->productSeller;

        return view('livewire.admin.product.product-vendor.update', compact('productSeller'));
    }
}
