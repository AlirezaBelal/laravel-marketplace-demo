<?php

namespace App\Http\Livewire\Admin\Product\Attribute;

use App\Models\Attribute;
use App\Models\ChildCategory;
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
        $attribute = Attribute::withTrashed()->findOrFail($id);
        $attribute->forceDelete();
        $this->emit('toast', 'success', ' مشخصات کالا به صورت کامل از دیتابیس حذف شد.');
    }


    public function trashedCategory($id)
    {
        $attribute = Attribute::withTrashed()
            ->where('id', $id)
            ->first();

        $attribute->restore();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی مشخصات کالا' . '-' . $attribute->title,
            'actionType' => 'بازیابی'
        ]);

        $this->emit('toast', 'success', ' مشخصات کالا با موفقیت بازیابی شد.');
    }

    public function render()
    {
        $attributes = $this->readyToLoad ? DB::table('attributes')
            ->whereNotNull('deleted_at')
            ->latest()->paginate(10) : [];
        return view('livewire.admin.product.attribute.trashed', compact('attributes'));
    }
}
