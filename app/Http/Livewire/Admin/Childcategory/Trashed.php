<?php

namespace App\Http\Livewire\Admin\Childcategory;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Log;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;

    public $img;
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
        $category = ChildCategory::withTrashed()->findOrFail($id);

        Storage::disk('public')->delete("storage", $category->img);

        $category->forceDelete();

        $this->emit('toast', 'success', ' دسته کودک به صورت کامل با موفقیت حذف شد.');
    }


    public function trashedCategory($id)
    {
        $category = ChildCategory::withTrashed()->where('id', $id)->first();
        $category->restore();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی دسته کودک' . '-' . $category->title,
            'actionType' => 'بازیابی'
        ]);

        $this->emit('toast', 'success', ' دسته کودک با موفقیت بازیابی شد.');
    }


    public function render()
    {
        $categories = $this->readyToLoad ? DB::table('child_categories')
            ->whereNotNull('deleted_at')
            ->latest()->paginate(10) : [];

        return view('livewire.admin.childcategory.trashed', compact('categories'));
    }
}
