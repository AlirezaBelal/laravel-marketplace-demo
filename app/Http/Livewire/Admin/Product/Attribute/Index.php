<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Attribute;
use App\Models\ChildCategory;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public Attribute $attribute;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'attribute.childCategory' => 'required',
        'attribute.parent' => 'required',
        'attribute.title' => 'required',
        'attribute.position' => 'required',
        'attribute.status' => 'required',
    ];


    public function mount()
    {
        $this->attribute = new Attribute();
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

        Attribute::query()->create([
            'childCategory' => $this->attribute->childCategory,
            'position' => $this->attribute->position,
            'title' => $this->attribute->title,
            'parent' => $this->attribute->parent,
            'status' => $this->attribute->status ? 1 : 0,
        ]);

        $this->attribute->childCategory = null;
        $this->attribute->parent = null;
        $this->attribute->title = "";
        $this->attribute->position = null;
        $this->attribute->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن مشخصات کالا' . '-' . $this->attribute->title,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' مشخصات کالا با موفقیت ایجاد شد.');
    }


    public function updateCategoryDisable($id)
    {
        $attribute = Attribute::find($id);
        $attribute->update([
            'status' => 0
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت مشخصات کالا' . '-' . $attribute->title,
            'actionType' => 'غیرفعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت مشخصات کالا با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $attribute = Attribute::find($id);
        $attribute->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت مشخصات کالا' . '-' . $attribute->title,
            'actionType' => 'فعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت مشخصات کالا با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن مشخصات کالا' . '-' . $attribute->title,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' مشخصات کالا با موفقیت حذف شد.');
    }


    public function render()
    {

        $attributes = $this->readyToLoad ? Attribute::where('title', 'LIKE', "%{$this->search}%")
            ->orWhere('parent', 'LIKE', "%{$this->search}%")
            ->orWhere('childCategory', 'LIKE', "%{$this->search}%")
            ->orWhere('position', 'LIKE', "%{$this->search}%")
            ->latest()->paginate(10) : [];
        return view('livewire.admin.product.attribute.index', compact('attributes'));
    }
}
