<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProfileBanner extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public \App\Models\ProfileBanner $banner;

    public function mount()
    {
        $this->banner = new \App\Models\ProfileBanner();
    }


    protected $rules = [
        'banner.title' => 'required',
        'banner.link' => 'required',
        'banner.discount' => 'nullable',
        'banner.name' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function categoryForm()
    {
        $this->validate();

        $banner = \App\Models\ProfileBanner::query()->create([
            'title' => $this->banner->title,
            'link' => $this->banner->link,
            'discount' => $this->banner->discount,
            'name' => $this->banner->name,
        ]);

        if ($this->img) {
            $banner->update([
                'img' => $this->uploadImage()
            ]);
        }

        $this->banner->title = "";
        $this->banner->link = "";
        $this->banner->name = "";
        $this->banner->discount = "";
        $this->img = null;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن بنر پروفایل' . '-' . $this->banner->title,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' بنر پروفایل با موفقیت ایجاد شد.');

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

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {

        $banners = $this->readyToLoad ? \App\Models\ProfileBanner::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('discount', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.banner.profile-banner',compact('banners'));
    }
}
