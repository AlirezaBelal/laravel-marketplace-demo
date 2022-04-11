<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
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

    public function deleteCategory($id)
    {
        $color = Color::withTrashed()->findOrFail($id);
        Storage::disk('public')->delete("storage",$color->img);
        $color->forceDelete();
        $this->emit('toast', 'success', ' رنگ به صورت کامل از دیتابیس حذف شد.');
    }

    public function trashedCategory($id)
    {
        $color = Color::withTrashed()->where('id', $id)->first();
        $color->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی رنگ' .'-'. $color->title,
            'actionType' => 'بازیابی'
        ]);
        $this->emit('toast', 'success', ' رنگ با موفقیت بازیابی شد.');
    }

    public function render()
    {

        $colors = $this->readyToLoad ? DB::table('colors')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15) : [];

        return view('livewire.admin.product.color.trashed',compact('colors'));
    }
}
