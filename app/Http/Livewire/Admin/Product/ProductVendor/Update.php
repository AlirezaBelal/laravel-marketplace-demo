<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
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
    ];


    public function categoryForm()
    {
        $this->validate();

        $this->productSeller->update($this->validate());

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت تنوع محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'آپدیت'
        ]);

        alert()->success(' با موفقیت آپدیت شد.', 'تنوع محصول مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('productVendor.index'));
    }


    public function render()
    {
        if ($this->productSeller->status == 1) {
            $this->productSeller->status = true;
        } else {
            $this->productSeller->status = false;
        }
        $productSeller = $this->productSeller;

        return view('livewire.admin.product.product-vendor.update', compact('productSeller'));
    }
}
