<?php

namespace App\Http\Livewire\Admin\Product\Warranty;

use App\Models\Color;
use App\Models\Log;
use App\Models\Warranty;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Warranty $warranty;

    public function mount()
    {
        $this->warranty = new Warranty();
    }



    protected $rules = [
        'warranty.name' => 'required',
        'warranty.status' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function categoryForm()
    {
        $this->validate();
         Warranty::query()->create([
            'name' => $this->warranty->name,
            'status' => $this->warranty->status ? 1:0 ,
        ]);
        $this->warranty->name = "";
        $this->warranty->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن گارانتی' .'-'. $this->warranty->name,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' گارانتی با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }
    public function updateCategoryDisable($id)
    {
        $warranty = Warranty::find($id);
        $warranty->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت گارانتی' .'-'. $this->warranty->name,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت گارانتی با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $warranty = Warranty::find($id);
        $warranty->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت گارانتی' .'-'. $this->warranty->name,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت گارانتی با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $warranty = Warranty::find($id);
        $warranty->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن گارانتی' .'-'. $this->warranty->name,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' گارانتی با موفقیت حذف شد.');
    }


    public function render()
    {

        $warranties = $this->readyToLoad ? Warranty::where('name', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.product.warranty.index',compact('warranties'));
    }
}
