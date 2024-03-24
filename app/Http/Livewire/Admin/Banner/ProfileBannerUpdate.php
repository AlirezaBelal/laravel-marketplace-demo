<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileBannerUpdate extends Component
{
    use WithFileUploads;

    public \App\Models\ProfileBanner $banner;

    public $img;

    protected $rules = [
        'banner.title' => 'required',
        'banner.link' => 'required',
        'banner.discount' => 'nullable',
        'banner.name' => 'nullable',
    ];

    public function categoryForm()
    {
        $this->validate();
        if ($this->img) {
            $this->banner->img = $this->uploadImage();
        }

        $this->banner->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت بنر'.'-'.$this->banner->title,
            'actionType' => 'آپدیت',
        ]);

        //        alert()->success(' با موفقیت آپدیت شد.', 'بنر مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('profileBanner.index'));

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "bannerprofile/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);

        return "$directory/$name";
    }

    public function render()
    {
        $banner = $this->banner;

        return view('livewire.admin.banner.profile-banner-update', compact('banner'));
    }
}
