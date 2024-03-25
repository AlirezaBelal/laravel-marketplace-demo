<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Log;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $product = Product::find($id);
        $product->update([
            'status_product' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت محصول'.'-'.$product->title,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت محصول با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $product = Product::find($id);
        $product->update([
            'status_product' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت محصول'.'-'.$product->title,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت محصول با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $product = Product::find($id);

        $product->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن محصول'.'-'.$product->title,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' محصول با موفقیت حذف شد.');
    }

    public function render()
    {

        $products = $this->readyToLoad ? Product::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('body', 'LIKE', "%{$this->search}%")->
        orWhere('description', 'LIKE', "%{$this->search}%")->
        orWhere('tags', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.product.index', compact('products'));
    }
}
