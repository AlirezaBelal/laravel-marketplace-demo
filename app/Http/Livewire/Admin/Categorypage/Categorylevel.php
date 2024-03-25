<?php

namespace App\Http\Livewire\Admin\Categorypage;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Categorylevel extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public $category_id;

    public $subCategory_id;

    public $childCategory_id;

    public $categorylevel4_id;

    public $property;

    public function categoryForm()
    {

        DB::table('category_levels')->insert([
            'category_id' => $this->category_id,
            'subCategory_id' => $this->subCategory_id,
            'childCategory_id' => $this->childCategory_id,
            'categorylevel4_id' => $this->categorylevel4_id,
            'property' => $this->property,
        ]);

        $this->category_id = null;
        $this->subCategory_id = null;
        $this->childCategory_id = null;
        $this->categorylevel4_id = null;
        $this->property = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دسته های زیردسته ها'.'-'.$this->category_id,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' دسته های زیردسته ها با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $category2 = DB::table('category_levels')
            ->where('id', $id)->first();
        $category = DB::table('category_levels')
            ->where('id', $id)->limit($id);
        $category->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت دسته های زیردسته ها'.'-'.$category2->category_id,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت دسته های زیردسته ها با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category2 = DB::table('category_levels')
            ->where('id', $id)->first();
        $category = DB::table('category_levels')
            ->where('id', $id)->limit($id);
        $category->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت دسته های زیردسته ها'.'-'.$category2->category_id,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت دسته های زیردسته ها با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $amazing2 = DB::table('category_levels')
            ->where('id', $id)->first();
        $amazing = DB::table('category_levels')
            ->where('id', $id)->limit($id);
        $amazing->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن دسته های زیردسته ها'.'-'.$amazing2->category_id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' دسته های زیردسته ها با موفقیت حذف شد.');

    }

    public function render()
    {

        $categorylevels = $this->readyToLoad ?
            DB::table('category_levels')
                ->where('category_id', 'LIKE', "%{$this->search}%")->
                orWhere('subCategory_id', 'LIKE', "%{$this->search}%")->
                orWhere('childCategory_id', 'LIKE', "%{$this->search}%")->
                orWhere('id', $this->search)->
                latest()->paginate(15) : [];

        return view('livewire.admin.categorypage.categorylevel', compact('categorylevels'));
    }
}
