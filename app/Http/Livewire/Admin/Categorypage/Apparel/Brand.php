<?php

namespace App\Http\Livewire\Admin\Categorypage\Apparel;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Brand extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $brand_id;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function categoryForm()
    {
        $banner = DB::connection('mysql-apparel')
            ->table('category_apparel_brand')
            ->insert([
                'brand_id' => $this->brand_id,
            ]);

        $banner2 = DB::connection('mysql-apparel')
            ->table('category_apparel_brand')
            ->where('brand_id', $this->brand_id)
            ->first();

        $banner3 = DB::connection('mysql-apparel')
            ->table('category_apparel_brand')
            ->where('id', $banner2->id)
            ->limit($banner2->id);

        $this->brand_id = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن محصول' . '-' . $this->brand_id,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' محصول با موفقیت ایجاد شد.');
    }


    public function deleteCategory($id)
    {
        $banner2 = DB::connection('mysql-apparel')
            ->table('category_apparel_brand')
            ->where('id', $id)
            ->first();

        $banner = DB::connection('mysql-apparel')
            ->table('category_apparel_brand')
            ->where('id', $id)
            ->limit($id);

        $banner->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن محصول' . '-' . $banner2->brand_id,
            'actionType' => 'حذف'
        ]);

        $this->emit('toast', 'success', ' محصول با موفقیت حذف شد.');
    }

    public function render()
    {
        $brands = $this->readyToLoad ? DB::connection('mysql-apparel')
            ->table('category_apparel_brand')
            ->where('brand_id', 'LIKE', "%{$this->search}%")
            ->latest()
            ->paginate(10) : [];

        return view('livewire.admin.categorypage.apparel.brand', compact('brands'));
    }
}
