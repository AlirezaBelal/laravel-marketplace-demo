<?php

namespace App\Http\Livewire\Admin\Product\AttributeValue;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;

    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function deleteCategory($id)
    {
        $attribute = AttributeValue::withTrashed()->findOrFail($id);
        $attribute->forceDelete();
        $this->emit('toast', 'success', ' مقدار مشخصه کالا به صورت کامل از دیتابیس حذف شد.');
    }


    public function trashedCategory($id)
    {
        $attribute = AttributeValue::withTrashed()->where('id', $id)->first();
        $attribute->restore();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی مقدار مشخصه کالا' . '-' . $attribute->title,
            'actionType' => 'بازیابی'
        ]);

        $this->emit('toast', 'success', ' مقدار مشخصه کالا با موفقیت بازیابی شد.');
    }


    public function render()
    {
        $attributes = $this->readyToLoad ? DB::table('attribute_values')
            ->whereNotNull('deleted_at')
            ->latest()
            ->paginate(10) : [];
        return view('livewire.admin.product.attribute-value.trashed', compact('attributes'));
    }
}
