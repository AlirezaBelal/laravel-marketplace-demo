<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $img;

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Category $category;

    public function mount()
    {
        $this->category = new Category();
    }

    protected $rules = [
        'category.title' => 'required|min:3',
        'category.icon' => 'nullable',
        'category.name' => 'required',
        'category.link' => 'required',
        'category.description' => 'required',
        'category.body' => 'required',
        'category.status' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function categoryForm()
    {

        $this->validate();

        $category = Category::query()->create([
            'title' => $this->category->title,
            'icon' => $this->category->icon,
            'name' => $this->category->name,
            'link' => $this->category->link,
            'description' => $this->category->description,
            'body' => $this->category->body,
            'status' => $this->category->status ? true : false,
        ]);

        if ($this->img) {
            $category->update([
                'img' => $this->uploadImage(),
            ]);
        }

        $this->category->title = '';
        $this->category->icon = '';
        $this->category->description = '';
        $this->category->body = '';
        $this->category->name = '';
        $this->category->link = '';
        $this->category->status = false;
        $this->img = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دسته'.'-'.$this->category->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' دسته با موفقیت ایجاد شد.');

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "category/$year/$month";
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
        $category = Category::find($id);
        $category->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت دسته'.'-'.$category->title,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت دسته با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category = Category::find($id);
        $category->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت دسته'.'-'.$category->title,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت دسته با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $subCategory = SubCategory::where('parent', $id)->first();
        if ($subCategory == null) {
            $category->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن دسته'.'-'.$category->title,
                'actionType' => 'حذف',
            ]);
            $this->emit('toast', 'success', ' دسته با موفقیت حذف شد.');
        } else {
            $this->emit('toast', 'success', ' امکان حذف وجود ندارد زیرا زیردسته دارد!');
        }

    }

    public function render()
    {

        $categories = $this->readyToLoad ? Category::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.category.index', compact('categories'));
    }
}
