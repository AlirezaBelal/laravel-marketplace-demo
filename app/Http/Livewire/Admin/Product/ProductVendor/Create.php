<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Models\Log;
use App\Models\PriceDate;
use App\Models\Product;
use App\Models\ProductSeller;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public ProductSeller $productSeller;

    public function mount()
    {
        $this->productSeller = new ProductSeller();
    }



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

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function categoryForm()
    {

        $this->validate();
        $this->productSeller->save();

        PriceDate::create([
           'product_id' => $this->productSeller->product_id,
           'price' => $this->productSeller->price,
           'discount_price' => $this->productSeller->discount_price,
           'product_seller_id' => $this->productSeller->id,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن تنوع قیمت محصول' .'-'. $this->productSeller->title,
            'actionType' => 'ایجاد'
        ]);
//        alert()->success(' با موفقیت ایجاد شد.', 'تنوع قیمت محصول مورد نظر با موفقیت ایجاد شد.');

        return redirect(route('productVendor.index'));
    }



    public function render()
    {
        return view('livewire.admin.product.product-vendor.create');
    }
}
