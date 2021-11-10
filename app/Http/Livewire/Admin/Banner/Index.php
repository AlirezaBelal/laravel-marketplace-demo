<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Log;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public Banner $banner;
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
    ];


    public function mount()
    {
        $this->banner = new Banner();
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

        $banner = Banner::query()->create([
            'title' => $this->banner->title,
            'link' => $this->banner->link,
        ]);

        if ($this->img) {
            $banner->update([
                'img' => $this->uploadImage()
            ]);
        }

        $this->banner->title = "";
        $this->banner->link = "";
        $this->img = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن بنر' . '-' . $this->banner->title,
            'actionType' => 'ایجاد'
        ]);

        $this->emit('toast', 'success', ' بنر با موفقیت ایجاد شد.');
    }


    /**
     * @return string
     * Image storage path
     */
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
        $banners = $this->readyToLoad ? Banner::where('title', 'LIKE', "%{$this->search}%")
            ->orWhere('link', 'LIKE', "%{$this->search}%")
            ->latest()->paginate(10) : [];
        return view('livewire.admin.banner.index', compact('banners'));
    }
}
