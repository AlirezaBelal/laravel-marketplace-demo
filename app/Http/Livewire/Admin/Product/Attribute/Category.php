<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Attribute;
use App\Models\ChildCategory;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Attribute $attribute;

    public ChildCategory $category;

    public function mount()
    {
        $this->attribute = new Attribute();
    }

    protected $rules = [
        'attribute.childCategory' => 'nullable',
        'attribute.parent' => 'required',
        'attribute.title' => 'required',
        'attribute.position' => 'required',
        'attribute.status' => 'required',
    ];

    public function updated($childCategory)
    {
        $this->validateOnly($childCategory);
    }

    public function categoryForm()
    {

        $this->validate();
        Attribute::query()->create([
            'childCategory' => $this->category->id,
            'position' => $this->attribute->position,
            'title' => $this->attribute->title,
            'parent' => $this->attribute->parent,
            'status' => $this->attribute->status ? 1 : 0,
        ]);

        $this->attribute->childCategory = null;
        $this->attribute->parent = null;
        $this->attribute->title = '';
        $this->attribute->position = null;
        $this->attribute->status = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن مشخصات کالا'.'-'.$this->attribute->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' مشخصات کالا با موفقیت ایجاد شد.');

        return redirect()->back();
    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $attribute = Attribute::find($id);
        $attribute->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت مشخصات کالا'.'-'.$this->attribute->childCategory,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت مشخصات کالا با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $attribute = Attribute::find($id);
        $attribute->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت مشخصات کالا'.'-'.$this->attribute->childCategory,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت مشخصات کالا با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن مشخصات کالا'.'-'.$this->attribute->childCategory,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' مشخصات کالا با موفقیت حذف شد.');
    }

    public function render()
    {

        $category = $this->category;

        $attributes =
            $this->readyToLoad ? Attribute::where('childCategory', $this->category->id)->
            orderBy('position')->paginate(15) : [];

        return view('livewire.admin.product.attribute.category', compact('attributes', 'category'));
    }
}
