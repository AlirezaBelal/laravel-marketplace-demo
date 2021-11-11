<?php

namespace App\Http\Livewire\Admin\Product\Gallery;

use App\Models\Gallery;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;

    public Gallery $gallery;
    public \App\Models\Product $product;
    public $img;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'gallery.product_id' => 'nullable',
        'gallery.status' => 'nullable',
        'gallery.position' => 'nullable',
    ];


    public function mount()
    {
        $this->gallery = new Gallery();
    }


    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function categoryForm()
    {
        $this->validate();

        $gallery = Gallery::query()->create([
            'product_id' => $this->product->id,
            'position' => $this->gallery->position,
            'status' => $this->gallery->status ? 1 : 0,
        ]);

        if ($this->img) {
            $gallery->update([
                'img' => $this->uploadImage()
            ]);
        }

        $this->gallery->product_id = "";
        $this->gallery->position = null;
        $this->gallery->status = false;
        $this->img = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن تصویر محصول' . '-' . $this->gallery->product_id,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' تصویر محصول با موفقیت ایجاد شد.');
    }


    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $day = now()->day;
        $directory = "gallery/$year/$month/$day";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function updateCategoryDisable($id)
    {
        $gallery = Gallery::find($id);
        $gallery->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت تصویر محصول' . '-' . $this->gallery->product_id,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تصویر محصول با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $gallery = Gallery::find($id);
        $gallery->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت تصویر محصول' . '-' . $this->gallery->product_id,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تصویر محصول با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن تصویر محصول' . '-' . $this->gallery->product_id,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' تصویر محصول با موفقیت حذف شد.');
    }


    public function render()
    {
        $product = $this->product;
        $galleries = $this->readyToLoad ? Gallery::where('product_id', $this->product->id)
            ->orderBy('position')
            ->paginate(10) : [];

        return view('livewire.admin.product.gallery.product', compact('galleries', 'product'));
    }
}
