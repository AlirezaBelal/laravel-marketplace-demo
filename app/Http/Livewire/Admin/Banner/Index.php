<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Log;
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

    public Banner $banner;

    public function mount()
    {
        $this->banner = new Banner();
    }

    protected $rules = [
        'banner.title' => 'required',
        'banner.link' => 'required',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
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
                'img' => $this->uploadImage(),
            ]);
        }

        $this->banner->title = '';
        $this->banner->link = '';
        $this->img = null;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن بنر'.'-'.$this->banner->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' بنر با موفقیت ایجاد شد.');

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

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {

        $banners = $this->readyToLoad ? Banner::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.banner.index', compact('banners'));
    }
}
