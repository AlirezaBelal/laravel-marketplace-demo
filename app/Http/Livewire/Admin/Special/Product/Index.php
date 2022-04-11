<?php

namespace App\Http\Livewire\Admin\Special\Product;

use App\Models\Log;
use App\Models\Menu;
use App\Models\SpecialProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public SpecialProduct $specialProduct;

    public function mount()
    {
        $this->specialProduct = new SpecialProduct();
    }


    protected $rules = [
        'specialProduct.product_id' => 'required',
        'specialProduct.category_id' => 'required',
        'specialProduct.subCategory_id' => 'required',
        'specialProduct.childCategory_id' => 'required',
        'specialProduct.natural' => 'nullable',
        'specialProduct.supermarket' => 'nullable',
        'specialProduct.status' => 'nullable',
    ];

    public function updated($product_id)
    {
        $this->validateOnly($product_id);
    }


    public function categoryForm()
    {
        $this->validate();

        SpecialProduct::query()->create([
            'product_id' => $this->specialProduct->product_id,
            'category_id' => $this->specialProduct->category_id,
            'subCategory_id' => $this->specialProduct->subCategory_id,
            'childCategory_id' => $this->specialProduct->childCategory_id,
            'status' => $this->specialProduct->status ? 1 : 0,
            'natural' => $this->specialProduct->natural ? 1 : 0,
            'supermarket' => $this->specialProduct->supermarket ? 1 : 0,
        ]);

        $this->specialProduct->product_id = null;
        $this->specialProduct->category_id = null;
        $this->specialProduct->subCategory_id = null;
        $this->specialProduct->childCategory_id = null;
        $this->specialProduct->status = false;
        $this->specialProduct->natural = false;
        $this->specialProduct->supermarket = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن پیشنهاد شگفت انگیز' . '-' . $this->specialProduct->product_id,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' پیشنهاد شگفت انگیز با موفقیت ایجاد شد.');

    }
    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $category = SpecialProduct::find($id);
        $category->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت پیشنهاد شگفت انگیز' . '-' . $category->category_id,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت پیشنهاد شگفت انگیز با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category = SpecialProduct::find($id);
        $category->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت پیشنهاد شگفت انگیز' . '-' . $category->category_id,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت پیشنهاد شگفت انگیز با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $category = SpecialProduct::find($id);
            $category->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن پیشنهاد شگفت انگیز' . '-' . $category->category_id,
                'actionType' => 'حذف'
            ]);
            $this->emit('toast', 'success', ' پیشنهاد شگفت انگیز با موفقیت حذف شد.');

    }


    public function render()
    {

        $specialProducts = $this->readyToLoad ? SpecialProduct::where('category_id', 'LIKE', "%{$this->search}%")->
        orWhere('subCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('childCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.special.product.index',compact('specialProducts'));
    }
}
