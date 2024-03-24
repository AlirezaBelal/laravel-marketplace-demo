<?php

namespace App\Http\Livewire\Admin\Product\Selected;

use App\Models\Log;
use App\Models\ProductNewSelected;
use Livewire\Component;
use Livewire\WithPagination;

class NewProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public ProductNewSelected $product;

    public function mount()
    {
        $this->product = new ProductNewSelected();
    }

    protected $rules = [
        'product.product_id' => 'required',
        'product.category_id' => 'required',
        'product.subCategory_id' => 'required',
        'product.childCategory_id' => 'required',
        'product.status' => 'nullable',
    ];

    public function updated($product_id)
    {
        $this->validateOnly($product_id);
    }

    public function categoryForm()
    {
        $this->validate();

        ProductNewSelected::query()->create([
            'product_id' => $this->product->product_id,
            'category_id' => $this->product->category_id,
            'subCategory_id' => $this->product->subCategory_id,
            'childCategory_id' => $this->product->childCategory_id,
            'status' => $this->product->status ? 1 : 0,
        ]);

        $this->product->product_id = null;
        $this->product->category_id = null;
        $this->product->subCategory_id = null;
        $this->product->childCategory_id = null;
        $this->product->status = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن محصول منتخب'.'-'.$this->product->product_id,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' محصول منتخب با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $category = ProductNewSelected::find($id);
        $category->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت محصول منتخب'.'-'.$category->category_id,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت محصول منتخب با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category = ProductNewSelected::find($id);
        $category->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت محصول دسته های صفحه اصلی'.'-'.$category->category_id,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت محصول منتخب با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $category = ProductNewSelected::find($id);
        $category->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن محصول منتخب'.'-'.$category->category_id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' محصول منتخب با موفقیت حذف شد.');

    }

    public function render()
    {

        $products = $this->readyToLoad ? ProductNewSelected::where('category_id', 'LIKE', "%{$this->search}%")->
        orWhere('subCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('childCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.product.selected.new-product', compact('products'));
    }
}
