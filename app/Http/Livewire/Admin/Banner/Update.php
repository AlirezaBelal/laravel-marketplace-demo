<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Log;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public Banner $banner;

    public $img;
    protected $rules = [
        'banner.title' => 'required',
        'banner.link' => 'required',
    ];
    public function categoryForm()
    {
        $this->validate();
        if ($this->img){
            $this->banner->img = $this->uploadImage();
        }

        $this->banner->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت بنر' .'-'. $this->banner->title,
            'actionType' => 'آپدیت'
        ]);
//        alert()->success(' با موفقیت آپدیت شد.', 'بنر مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('banner.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "banner/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        $banner = $this->banner;
        return view('livewire.admin.banner.update',compact('banner'));
    }
}
