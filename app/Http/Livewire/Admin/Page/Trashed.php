<?php

namespace App\Http\Livewire\Admin\Page;

use App\Models\Brand;
use App\Models\Log;
use App\Models\Page;
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
        $page = Page::withTrashed()->findOrFail($id);
        Storage::disk('public')->delete("storage",$page->img);
        $page->forceDelete();
        $this->emit('toast', 'success', ' صفحه سایت به صورت کامل از دیتابیس حذف شد.');
    }

    public function trashedCategory($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();
        $page->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی صفحه سایت' .'-'. $page->title,
            'actionType' => 'بازیابی'
        ]);
        $this->emit('toast', 'success', ' صفحه سایت با موفقیت بازیابی شد.');
    }

    public function render()
    {

        $pages = $this->readyToLoad ? DB::table('pages')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15) : [];
        return view('livewire.admin.page.trashed',compact('pages'));
    }
}
