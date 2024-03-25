<?php

namespace App\Http\Livewire\Admin\Social;

use App\Models\Log;
use App\Models\Social;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Social $social;

    public function mount()
    {
        $this->social = new Social();
    }

    protected $rules = [
        'social.img' => 'nullable',
        'social.icon' => 'nullable',
        'social.title' => 'required',
        'social.link' => 'required',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function categoryForm()
    {
        $this->validate();

        Social::query()->create([
            'img' => $this->social->img,
            'icon' => $this->social->icon,
            'title' => $this->social->title,
            'link' => $this->social->link,
        ]);

        $this->social->img = '';
        $this->social->icon = '';
        $this->social->title = '';
        $this->social->link = '';

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن شبکه اجتماعی'.'-'.$this->social->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' شبکه اجتماعی با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $page = Social::find($id);
        $page->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن شبکه اجتماعی'.'-'.$this->social->title,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' شبکه اجتماعی با موفقیت حذف شد.');

    }

    public function render()
    {

        $socials = $this->readyToLoad ? Social::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('icon', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.social.index', compact('socials'));
    }
}
