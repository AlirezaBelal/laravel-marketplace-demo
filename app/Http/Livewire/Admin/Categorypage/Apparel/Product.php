<?php

namespace App\Http\Livewire\Admin\Categorypage\Apparel;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $product_id;

    public $title_id;

    public $category_id;

    public $subCategory_id;

    public $childCategory_id;

    public $status;

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function categoryForm()
    {
        $banner = DB::connection('mysql-apparel')->table('category_apparel_product_swiper')->insert([
            'title_id' => $this->title_id,
            'product_id' => $this->product_id,
            'category_id' => $this->category_id,
            'subCategory_id' => $this->subCategory_id,
            'childCategory_id' => $this->childCategory_id,
            'status' => $this->status,
        ]);
        $banner2 = DB::connection('mysql-apparel')->table('category_apparel_product_swiper')
            ->where('title_id', $this->title_id)->first();

        $banner3 = DB::connection('mysql-apparel')->table('category_apparel_product_swiper')
            ->where('id', $banner2->id)->limit($banner2->id);

        $this->title_id = null;
        $this->product_id = null;
        $this->category_id = null;
        $this->subCategory_id = null;
        $this->childCategory_id = null;
        $this->status = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن محصول'.'-'.$this->title_id,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' محصول با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $banner2 = DB::connection('mysql-apparel')->table('category_apparel_product_swiper')
            ->where('id', $id)->first();
        $banner = DB::connection('mysql-apparel')->table('category_apparel_product_swiper')
            ->where('id', $id)->limit($id);
        $banner->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن محصول'.'-'.$banner2->title_id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' محصول با موفقیت حذف شد.');

    }

    public function render()
    {

        $products = $this->readyToLoad ? DB::connection('mysql-apparel')
            ->table('category_apparel_product_swiper')
            ->where('title_id', 'LIKE', "%{$this->search}%")->
            orWhere('id', $this->search)->
            latest()->paginate(15) : [];
        $titles = DB::connection('mysql-apparel')->table('category_apparel_title_swiper')->get();

        return view('livewire.admin.categorypage.apparel.product', compact('titles', 'products'));
    }
}
