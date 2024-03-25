<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Log;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $category = SubCategory::withTrashed()->findOrFail($id);
        Storage::disk('public')->delete('storage', $category->img);
        $category->forceDelete();
        $this->emit('toast', 'success', ' زیردسته به صورت کامل با موفقیت حذف شد.');
    }

    public function trashedCategory($id)
    {
        $category = SubCategory::withTrashed()->where('id', $id)->first();
        $category->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی زیر دسته'.'-'.$category->title,
            'actionType' => 'بازیابی',
        ]);
        $this->emit('toast', 'success', ' زیر دسته با موفقیت بازیابی شد.');
    }

    public function render()
    {

        $categories = $this->readyToLoad ? DB::table('sub_categories')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15) : [];

        return view('livewire.admin.subcategory.trashed', compact('categories'));
    }
}
