<?php

namespace App\Http\Livewire\Admin\Categorypage\Vehicle;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Amazing extends Component
{
    use WithPagination;

    public $search;
    public $product_id;
    public $category_id;
    public $subCategory_id;
    public $childCategory_id;
    public $status;
    public $property1;
    public $property2;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function categoryForm()
    {

        DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->insert([
                'product_id' => $this->product_id,
                'category_id' => $this->category_id,
                'subCategory_id' => $this->subCategory_id,
                'childCategory_id' => $this->childCategory_id,
                'status' => $this->status,
                'property1' => $this->property1,
                'property2' => $this->property2,
            ]);

        $this->product_id = null;
        $this->category_id = null;
        $this->subCategory_id = null;
        $this->childCategory_id = null;
        $this->status = false;
        $this->property1 = null;
        $this->property2 = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن پیشنهاد شگفت انگیز' . '-' . $this->product_id,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' پیشنهاد شگفت انگیز با موفقیت ایجاد شد.');
    }


    public function updateCategoryDisable($id)
    {
        $category2 = DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->where('id', $id)->first();

        $category = DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->where('id', $id)
            ->limit($id);

        $category->update([
            'status' => 0
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت پیشنهاد شگفت انگیز' . '-' . $category2->category_id,
            'actionType' => 'غیرفعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت پیشنهاد شگفت انگیز با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $category2 = DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->where('id', $id)
            ->first();

        $category = DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->where('id', $id)
            ->limit($id);

        $category->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت پیشنهاد شگفت انگیز' . '-' . $category2->category_id,
            'actionType' => 'فعال'
        ]);

        $this->emit('toast', 'success', 'وضعیت پیشنهاد شگفت انگیز با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $amazing2 = DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->where('id', $id)
            ->first();

        $amazing = DB::connection('mysql-vehicle')
            ->table('category_vehicle_amazing')
            ->where('id', $id)
            ->limit($id);

        $amazing->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن پیشنهاد شگفت انگیز' . '-' . $amazing2->category_id,
            'actionType' => 'حذف'
        ]);

        $this->emit('toast', 'success', ' پیشنهاد شگفت انگیز با موفقیت حذف شد.');
    }


    public function render()
    {
        $specialProducts = $this->readyToLoad ?
            DB::connection('mysql-vehicle')->table('category_vehicle_amazing')
                ->where('category_id', 'LIKE', "%{$this->search}%")
                ->orWhere('subCategory_id', 'LIKE', "%{$this->search}%")
                ->orWhere('childCategory_id', 'LIKE', "%{$this->search}%")
                ->orWhere('product_id', 'LIKE', "%{$this->search}%")
                ->latest()
                ->paginate(10) : [];

        return view('livewire.admin.categorypage.vehicle.amazing', compact('specialProducts'));
    }
}
