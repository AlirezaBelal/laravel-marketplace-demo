<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public SubCategory $subcategory;
    public $img;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'subcategory.title' => 'required|min:3',
        'subcategory.name' => 'required',
        'subcategory.link' => 'required',
        'subcategory.parent' => 'required',
        'subcategory.status' => 'nullable',
    ];


    public function mount()
    {
        $this->subcategory = new SubCategory();
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

        $subCategory = SubCategory::query()->create([
            'title' => $this->subcategory->title,
            'name' => $this->subcategory->name,
            'link' => $this->subcategory->link,
            'parent' => $this->subcategory->parent,
            'status' => $this->subcategory->status ? 1 : 0,
        ]);

        if ($this->img) {
            $subCategory->update([
                'img' => $this->uploadImage()
            ]);
        }

        $this->subcategory->title = "";
        $this->subcategory->name = "";
        $this->subcategory->link = "";
        $this->subcategory->parent = null;
        $this->subcategory->status = false;
        $this->img = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن زیر دسته' . '-' . $this->subcategory->title,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' زیردسته با موفقیت ایجاد شد.');
    }


    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "subcategory/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function updateCategoryDisable($id)
    {
        $category = SubCategory::find($id);
        $category->update([
            'status' => 0
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت زیر دسته' . '-' . $category->title,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت زیر دسته با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $category = SubCategory::find($id);
        $category->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت زیر دسته' . '-' . $category->title,
            'actionType' => 'فعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت زیر دسته با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $category = SubCategory::find($id);

        $childCategory = ChildCategory::where('parent', $id)->first();

        if ($childCategory == null) {
            $category->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن زیر دسته' . '-' . $category->title,
                'actionType' => 'حذف'
            ]);

            $this->emit('toast', 'success', ' زیر دسته با موفقیت حذف شد.');
        } else {
            $this->emit('toast', 'success', ' امکان حذف وجود ندارد زیرا این دسته، شامل دسته کودک است!');
        }
    }


    public function render()
    {
        $categories = $this->readyToLoad ? SubCategory::where('title', 'LIKE', "%{$this->search}%")
            ->orWhere('name', 'LIKE', "%{$this->search}%")
            ->orWhere('link', 'LIKE', "%{$this->search}%")
            ->latest()
            ->paginate(10) : [];
        return view('livewire.admin.subcategory.index', compact('categories'));
    }
}
