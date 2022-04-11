<?php

namespace App\Http\Livewire\Admin\Product\Warranty;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Log;
use App\Models\Warranty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }



    public function trashedCategory($id)
    {
        $warranty = Warranty::withTrashed()->where('id', $id)->first();
        $warranty->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی گارانتی' .'-'. $warranty->name,
            'actionType' => 'بازیابی'
        ]);
        $this->emit('toast', 'success', ' گارانتی با موفقیت بازیابی شد.');
    }

    public function deleteCategory($id)
    {
        $warranty = Warranty::withTrashed()->findOrFail($id);
        $warranty->forceDelete();
        $this->emit('toast', 'success', ' گارانتی به صورت کامل از دیتابیس حذف شد.');
    }
    public function render()
    {

        $warranties = $this->readyToLoad ? DB::table('warranties')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15) : [];

        return view('livewire.admin.product.warranty.trashed',compact('warranties'));
    }
}
