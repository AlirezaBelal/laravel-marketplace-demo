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

    public \App\Models\ProfileBanner $banner;
    public $img;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    /**
     * @var string
     * Front type
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     * Manage form inputs
     */
    protected $rules = [
        'banner.title' => 'required',
        'banner.link' => 'required',
        'banner.discount' => 'nullable',
        'banner.name' => 'nullable',
    ];


    public function mount()
    {
        $this->banner = new \App\Models\ProfileBanner();
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
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


    /**
     * @return string
     * Image storage path
     */
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

        $banners = $this->readyToLoad ? \App\Models\ProfileBanner::where('title', 'LIKE', "%{$this->search}%")
            ->orWhere('link', 'LIKE', "%{$this->search}%")
            ->orWhere('name', 'LIKE', "%{$this->search}%")
            ->orWhere('discount', 'LIKE', "%{$this->search}%")
            ->latest()->paginate(10) : [];
        return view('livewire.admin.banner.profile-banner', compact('banners'));
    }
}
