<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Attribute;
use App\Models\ChildCategory;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    public Attribute $attribute;

    protected $rules = [
        'attribute.childCategory' => 'required',
        'attribute.parent' => 'required',
        'attribute.title' => 'required',
        'attribute.position' => 'required',
        'attribute.status' => 'required',
    ];


    public function categoryForm()
    {
        $this->validate();
        $this->attribute->update($this->validate());
        if (!$this->attribute->status) {
            $this->attribute->update([
                'status' => 0
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت مشخصات کالا' . '-' . $this->attribute->title,
            'actionType' => 'آپدیت'
        ]);

        alert()->success(' با موفقیت آپدیت شد.', 'مشخصات محصول مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('attribute.index'));
    }


    public function render()
    {
        if ($this->attribute->status == 1) {
            $this->attribute->status = true;
        } else {
            $this->attribute->status = false;
        }
        $attribute = $this->attribute;
        return view('livewire.admin.product.attribute.update', compact('attribute'));
    }
}
