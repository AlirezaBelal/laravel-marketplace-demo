<?php

namespace App\Http\Livewire\Admin\Product\AttributeValue;

use App\Models\AttributeValue;
use App\Models\Log;
use Livewire\Component;

class Update extends Component
{
    public AttributeValue $attribute;

    protected $rules = [
        'attribute.product_id' => 'required',
        'attribute.attribute_id' => 'required',
        'attribute.value' => 'required',
        'attribute.status' => 'required',
    ];

    public function categoryForm()
    {
        $this->validate();
        $this->attribute->update($this->validate());
        if (! $this->attribute->status) {
            $this->attribute->update([
                'status' => 0,
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت مقدار مشخصه'.'-'.$this->attribute->title,
            'actionType' => 'آپدیت',
        ]);

        //        alert()->success(' با موفقیت آپدیت شد.', 'مقدار مشخصه مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('attributeValue.index'));

    }

    public function render()
    {
        if ($this->attribute->status == 1) {
            $this->attribute->status = true;
        } else {
            $this->attribute->status = false;
        }
        $attribute = $this->attribute;
        $product = \App\Models\Product::find($attribute->product_id);
        $att = \App\Models\Attribute::where('parent', '>', '0')->where('childCategory', $product->childcategory_id)->get();

        return view('livewire.admin.product.attribute-value.update',
            compact('attribute', 'product', 'att'));
    }
}
