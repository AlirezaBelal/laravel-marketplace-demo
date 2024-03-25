<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Models\Log;
use App\Models\ProductSeller;
use Livewire\Component;
use Livewire\WithPagination;

class Single extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public ProductSeller $productSeller;

    public \App\Models\Product $product;

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
    ];

    public function updated($product_id)
    {
        $this->validateOnly($product_id);
    }

    public function categoryForm()
    {

        $this->validate();
        $this->productSeller->product_id = $this->product->id;
        $this->productSeller->save();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن تنوع قیمت محصول'.'-'.$this->productSeller->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' تنوع قیمت محصول با موفقیت ایجاد شد.');

        return redirect()->back();
    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت تنوع قیمت محصول'.'-'.$this->productSeller->product_id,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت تنوع قیمت محصول با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت تنوع قیمت محصول'.'-'.$this->productSeller->product_id,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت تنوع قیمت محصول با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن تنوع قیمت محصول'.'-'.$this->productSeller->product_id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' تنوع قیمت محصول با موفقیت حذف شد.');
    }

    public function render()
    {
        $product = $this->product;

        $productSellers =
            $this->readyToLoad ? ProductSeller::where('product_id', $this->product->id)->
            orderBy('price')->paginate(15) : [];

        return view('livewire.admin.product.product-vendor.single', compact('product', 'productSellers'));
    }
}
