<?php

namespace App\Http\Livewire\Admin\Product\AttributeValue;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public AttributeValue $attribute;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'attribute.product_id' => 'required',
        'attribute.attribute_id' => 'required',
        'attribute.value' => 'required',
        'attribute.status' => 'required',
    ];


    public function mount()
    {
        $this->attribute = new AttributeValue();
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

        AttributeValue::query()->create([
            'attribute_id' => $this->attribute->attribute_id,
            'product_id' => $this->attribute->product_id,
            'value' => $this->attribute->value,
            'status' => $this->attribute->status ? 1 : 0,
        ]);

        $this->attribute->attribute_id = null;
        $this->attribute->product_id = null;
        $this->attribute->value = "";
        $this->attribute->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن مقدار مشخصات کالا' . '-' . $this->attribute->value,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' مقدار مشخصات کالا با موفقیت ایجاد شد.');
    }


    public function updateCategoryDisable($id)
    {
        $attribute = AttributeValue::find($id);
        $attribute->update([
            'status' => 0
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت مقدار مشخصات کالا' . '-' . $attribute->value,
            'actionType' => 'غیرفعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت مقدار مشخصات کالا با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $attribute = AttributeValue::find($id);
        $attribute->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت مقدار مشخصات کالا' . '-' . $attribute->title,
            'actionType' => 'فعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت مقدار مشخصات کالا با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $attribute = AttributeValue::find($id);
        $attribute->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن مقدار مشخصات کالا' . '-' . $attribute->value,
            'actionType' => 'حذف'
        ]);

        $this->emit('toast', 'success', ' مقدار مشخصات کالا با موفقیت حذف شد.');
    }


    public function render()
    {
        $attributes = $this->readyToLoad ? AttributeValue::where('value', 'LIKE', "%{$this->search}%")
            ->latest()
            ->paginate(10) : [];
        return view('livewire.admin.product.attribute-value.index', compact('attributes'));
    }
}
