<?php

namespace App\Http\Livewire\Admin\Product\Gallery;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $img;
    protected $rules = [
        'gallery.product_id' => 'required',
        'gallery.status' => 'nullable',
        'gallery.position' => 'nullable',
    ];
    public function categoryForm()
    {

        $this->validate();
        if ($this->img) {
            $this->gallery->img = $this->uploadImage();
        }
        $this->gallery->update($this->validate());
        if (!$this->gallery->status) {
            $this->gallery->update([
                'status' => 0
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت تصویر محصول' .'-'. $this->gallery->product_id,
            'actionType' => 'آپدیت'
        ]);
//        alert()->success(' با موفقیت آپدیت شد.', 'تصویر محصول مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('gallery.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "gallery/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }
    public Gallery $gallery;

    public function render()
    {
        if ($this->gallery->status == 1){
            $this->gallery->status = true;
        }else
        {
            $this->gallery->status = false;
        }
        $gallery = $this->gallery;
        return view('livewire.admin.product.gallery.update',compact('gallery'));
    }
}
