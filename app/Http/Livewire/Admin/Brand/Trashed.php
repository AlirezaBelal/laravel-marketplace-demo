<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Log;
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
        $brand = Brand::withTrashed()->findOrFail($id);
        Storage::disk('public')->delete('storage', $brand->img);
        $brand->forceDelete();
        $this->emit('toast', 'success', ' برند به صورت کامل از دیتابیس حذف شد.');
    }

    public function trashedCategory($id)
    {
        $brand = Brand::withTrashed()->where('id', $id)->first();
        $brand->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی برند'.'-'.$brand->name,
            'actionType' => 'بازیابی',
        ]);
        $this->emit('toast', 'success', ' برند با موفقیت بازیابی شد.');
    }

    public function render()
    {

        $brands = $this->readyToLoad ? DB::table('brands')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15) : [];

        return view('livewire.admin.brand.trashed', compact('brands'));
    }
}
