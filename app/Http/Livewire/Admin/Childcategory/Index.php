<?php

namespace App\Http\Livewire\Admin\Childcategory;

use App\Models\ChildCategory;
use App\Models\Log;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public ChildCategory $childcategory;

    public function mount()
    {
        $this->childcategory = new ChildCategory();
    }

    protected $rules = [
        'childcategory.title' => 'required|min:3',
        'childcategory.name' => 'required',
        'childcategory.link' => 'required',
        'childcategory.parent' => 'required',
        'childcategory.status' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function categoryForm()
    {
        $this->validate();

        $childCategory = ChildCategory::query()->create([
            'title' => $this->childcategory->title,
            'name' => $this->childcategory->name,
            'link' => $this->childcategory->link,
            'parent' => $this->childcategory->parent,
            'status' => $this->childcategory->status ? 1 : 0,
        ]);

        if ($this->img) {
            $childCategory->update([
                'img' => $this->uploadImage(),
            ]);
        }

        $this->childcategory->title = '';
        $this->childcategory->name = '';
        $this->childcategory->link = '';
        $this->childcategory->parent = null;
        $this->childcategory->status = false;
        $this->img = null;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دسته کودک'.'-'.$this->childcategory->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' دسته کودک با موفقیت ایجاد شد.');

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "childcategory/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);

        return "$directory/$name";
    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $category = ChildCategory::find($id);
        $category->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت دسته کودک'.'-'.$category->title,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت دسته کودک با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category = ChildCategory::find($id);
        $category->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت دسته کودک'.'-'.$category->title,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت دسته کودک با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $category = ChildCategory::find($id);
        $product = Product::where('childcategory_id', $id)->first();
        if ($product == null) {
            $category->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن دسته کودک'.'-'.$category->title,
                'actionType' => 'حذف',
            ]);
            $this->emit('toast', 'success', ' دسته کودک با موفقیت حذف شد.');
        } else {
            $this->emit('toast', 'success', ' امکان حذف وجود ندارد زیرا این دسته، شامل محصول است!');
        }

    }

    public function render()
    {

        $categories = $this->readyToLoad ? ChildCategory::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.childcategory.index', compact('categories'));
    }
}
