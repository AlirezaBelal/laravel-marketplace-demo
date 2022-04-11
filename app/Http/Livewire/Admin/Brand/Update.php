<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public Brand $brand;

    public $img;
    protected $rules = [
        'brand.description' => 'required|min:3',
        'brand.name' => 'required',
        'brand.link' => 'required',
        'brand.parent' => 'required',
        'brand.vip' => 'nullable',
        'brand.status' => 'nullable',
    ];
    public function categoryForm()
    {
        $this->validate();
        if ($this->img){
            $this->brand->img = $this->uploadImage();
        }

        $this->brand->update($this->validate());
        if (!$this->brand->status) {
            $this->brand->update([
                'status' => 0
            ]);
        }
        if (!$this->brand->vip) {
            $this->brand->update([
                'vip' => 0
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت برند' .'-'. $this->brand->title,
            'actionType' => 'آپدیت'
        ]);
        alert()->success(' با موفقیت آپدیت شد.', 'برند مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('brand.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "brand/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        if ($this->brand->status == 1){
            $this->brand->status = true;
        }else
        {
            $this->brand->status = false;
        }
        if ($this->brand->vip == 1){
            $this->brand->vip = true;
        }else
        {
            $this->brand->vip = false;
        }
        $brand = $this->brand;
        return view('livewire.admin.brand.update',compact('brand'));
    }
}
