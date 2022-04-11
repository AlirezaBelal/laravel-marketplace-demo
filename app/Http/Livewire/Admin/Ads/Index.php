<?php

namespace App\Http\Livewire\Admin\Ads;

use App\Models\AdsCategory;
use App\Models\Brand;
use App\Models\Log;
use App\Models\Product;
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

    public AdsCategory $ads;

    public function mount()
    {
        $this->ads = new AdsCategory();
    }



    protected $rules = [
        'ads.title' => 'required|min:3',
        'ads.category_id' => 'nullable',
        'ads.status' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function categoryForm()
    {
        $this->validate();

        $ads =    AdsCategory::query()->create([
            'title' => $this->ads->title,
            'category_id' => $this->ads->category_id,
            'status' => $this->ads->status ? 1:0 ,
        ]);

        if ($this->img){
            $ads->update([
                'img' => $this->uploadImage()
            ]);
        }

        $this->ads->title = "";
        $this->ads->category_id = null;
        $this->ads->status = false;
        $this->img = null;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن تبلیغات دسته' .'-'. $this->ads->title,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' تبلیغات دسته با موفقیت ایجاد شد.');

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "Ads/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }
    public function loadCategory()
    {
        $this->readyToLoad = true;
    }
    public function updateCategoryDisable($id)
    {
        $brand = AdsCategory::find($id);
        $brand->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت تبلیغات دسته' .'-'. $this->ads->title,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تبلیغات دسته با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $brand = AdsCategory::find($id);
        $brand->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت تبلیغات دسته' .'-'. $this->ads->title,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تبلیغات دسته با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $brand = AdsCategory::find($id);
        $brand->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن تبلیغات دسته' .'-'. $this->ads->title,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' تبلیغات دسته با موفقیت حذف شد.');

    }


    public function render()
    {

        $advertising = $this->readyToLoad ? AdsCategory::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->latest()->paginate(15) : [];
        return view('livewire.admin.ads.index',compact('advertising'));
    }
}
