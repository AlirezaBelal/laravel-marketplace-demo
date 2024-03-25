<?php

namespace App\Http\Livewire\Admin\Index\Category;

use App\Models\CategoryIndex;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public CategoryIndex $category;

    public function mount()
    {
        $this->category = new CategoryIndex();
    }

    protected $rules = [
        'category.title_id' => 'required',
        'category.product_id' => 'required',
        'category.category_id' => 'required',
        'category.subCategory_id' => 'required',
        'category.childCategory_id' => 'required',
        'category.status' => 'nullable',
    ];

    public function updated($product_id)
    {
        $this->validateOnly($product_id);
    }

    public function categoryForm()
    {
        $this->validate();

        CategoryIndex::query()->create([
            'title_id' => $this->category->title_id,
            'product_id' => $this->category->product_id,
            'category_id' => $this->category->category_id,
            'subCategory_id' => $this->category->subCategory_id,
            'childCategory_id' => $this->category->childCategory_id,
            'status' => $this->category->status ? 1 : 0,
        ]);

        $this->category->product_id = null;
        $this->category->category_id = null;
        $this->category->subCategory_id = null;
        $this->category->childCategory_id = null;
        $this->category->title_id = null;
        $this->category->status = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن محصول دسته صفحه اصلی'.'-'.$this->category->product_id,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' محصول دسته صفحه اصلی با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $category = CategoryIndex::find($id);
        $category->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت محصول دسته صفحه اصلی'.'-'.$category->category_id,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت محصول دسته صفحه اصلی با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category = CategoryIndex::find($id);
        $category->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت محصول دسته های صفحه اصلی'.'-'.$category->category_id,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت محصول دسته صفحه اصلی با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $category = CategoryIndex::find($id);
        $category->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن محصول دسته صفحه اصلی'.'-'.$category->category_id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' محصول دسته صفحه اصلی با موفقیت حذف شد.');

    }

    public function render()
    {

        $categories = $this->readyToLoad ? CategoryIndex::where('category_id', 'LIKE', "%{$this->search}%")->
        orWhere('subCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('childCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.index.category.index', compact('categories'));
    }
}
