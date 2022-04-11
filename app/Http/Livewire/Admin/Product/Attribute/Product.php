<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ChildCategory;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public AttributeValue $attribute;
    public \App\Models\Product $product;

    public function mount()
    {
        $this->attribute = new AttributeValue();
    }



    protected $rules = [
        'attribute.product_id' => 'nullable',
        'attribute.attribute_id' => 'required',
        'attribute.value' => 'required',
        'attribute.status' => 'required',
    ];

    public function updated($product_id)
    {
        $this->validateOnly($product_id);
    }



    public function categoryForm()
    {

        $this->validate();
        AttributeValue::query()->create([
            'attribute_id' => $this->attribute->attribute_id,
            'product_id' => $this->product->id,
            'value' => $this->attribute->value,
            'status' => $this->attribute->status ? 1:0 ,
        ]);

        $this->attribute->attribute_id = null;
        $this->attribute->product_id = null;
        $this->attribute->value = "";
        $this->attribute->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن مقدار مشخصه کالا' .'-'. $this->attribute->value,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' مقدار مشخصه کالا با موفقیت ایجاد شد.');
        return redirect()->back();
    }
    public function loadCategory()
    {
        $this->readyToLoad = true;
    }
    public function updateCategoryDisable($id)
    {
        $attribute = AttributeValue::find($id);
        $attribute->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت مقدار مشخصه کالا' .'-'. $this->attribute->value,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت مقدار مشخصه کالا با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $attribute = AttributeValue::find($id);
        $attribute->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت مقدار مشخصه کالا' .'-'. $this->attribute->value,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت مقدار مشخصه کالا با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $attribute = AttributeValue::find($id);
        $attribute->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن مقدار مشخصه کالا' .'-'. $this->attribute->value,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' مقدار مشخصه کالا با موفقیت حذف شد.');
    }


    public function render()
    {

        $product = $this->product;

        $attributes =
            $this->readyToLoad ? AttributeValue::
            where('product_id', $this->product->id)->
            orderBy('product_id')->paginate(15): [];
        return view('livewire.admin.product.attribute.product',compact('attributes','product'));
    }
}
