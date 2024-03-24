<?php

namespace App\Http\Livewire\Admin\Site\Header;

use App\Models\Log;
use App\Models\SiteHeader;
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

    public SiteHeader $header;

    public function mount()
    {
        $this->header = new SiteHeader();
    }

    protected $rules = [
        'header.title' => 'required|min:3',
        'header.status' => 'nullable',
        'header.link' => 'required',
        'header.icon' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function categoryForm()
    {

        $this->validate();

        $header = SiteHeader::query()->create([
            'title' => $this->header->title,
            'link' => $this->header->link,
            'icon' => $this->header->icon,
            'status' => $this->header->status ? true : false,
        ]);

        if ($this->img) {
            $header->update([
                'img' => $this->uploadImage(),
            ]);
        }

        $this->header->title = '';
        $this->header->link = '';
        $this->header->icon = '';
        $this->header->status = false;
        $this->img = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن منو هدر'.'-'.$this->header->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' منو هدر با موفقیت ایجاد شد.');

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "site/$year/$month";
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
        $header = SiteHeader::find($id);
        $header->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت منو هدر'.'-'.$header->title,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت منو هدر با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $header = SiteHeader::find($id);
        $header->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت منو هدر'.'-'.$header->title,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت منو هدر با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $header = SiteHeader::find($id);
        $header->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن منو هدر'.'-'.$header->title,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' منو هدر با موفقیت حذف شد.');
    }

    public function render()
    {

        $headers = $this->readyToLoad ? SiteHeader::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.site.header.index', compact('headers'));
    }
}
