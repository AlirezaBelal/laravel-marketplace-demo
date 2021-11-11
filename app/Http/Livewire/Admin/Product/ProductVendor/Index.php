<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Models\Gallery;
use App\Models\Log;
use App\Models\ProductSeller;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ProductSeller $productSeller;
    public $img;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

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


    public function mount()
    {
        $this->productSeller = new ProductSeller();
    }


    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function categoryForm()
    {
        $this->validate();

        $this->productSeller->save();

        if (!$this->productSeller->status) {
            $this->productSeller->update([
                'status' => 0
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' تنوع قیمت محصول با موفقیت ایجاد شد.');
    }


    public function updateCategoryDisable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تنوع قیمت محصول با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'فعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت تنوع قیمت محصول با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'حذف'
        ]);

        $this->emit('toast', 'success', ' تنوع قیمت محصول با موفقیت حذف شد.');
    }


    public function render()
    {
        $productSellers = $this->readyToLoad ? ProductSeller::where('product_id', 'LIKE', "%{$this->search}%")
            ->orWhere('vendor_id', 'LIKE', "%{$this->search}%")
            ->orWhere('time', 'LIKE', "%{$this->search}%")
            ->orWhere('warranty_id', 'LIKE', "%{$this->search}%")
            ->orWhere('price', 'LIKE', "%{$this->search}%")
            ->orWhere('color_id', 'LIKE', "%{$this->search}%")
            ->latest()
            ->paginate(10) : [];

        return view('livewire.admin.product.product-vendor.index', compact('productSellers'));
    }
}
