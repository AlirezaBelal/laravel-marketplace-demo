<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Models\Log;
use App\Models\Product;
use App\Models\ProductSeller;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;

    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function deleteCategory($id)
    {
        $pVendor = ProductSeller::withTrashed()
            ->findOrFail($id);

        $pVendor->forceDelete();

        $this->emit('toast', 'success', ' تنوع قیمت به صورت کامل از دیتابیس حذف شد.');
    }


    public function trashedProduct($id)
    {
        $product = ProductSeller::withTrashed()
            ->where('id', $id)
            ->first();

        $product->restore();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی تنوع محصول' . '-' . $product->product_id,
            'actionType' => 'بازیابی'
        ]);

        $this->emit('toast', 'success', ' تنوع محصول با موفقیت بازیابی شد.');
    }

    public function render()
    {
        $productSellers = $this->readyToLoad ? DB::table('product_sellers')
            ->whereNotNull('deleted_at')
            ->latest()
            ->paginate(10) : [];
        return view('livewire.admin.product.product-vendor.trashed', compact('productSellers'));
    }
}
