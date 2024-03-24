<?php

namespace App\Http\Livewire\Admin\Index\Title;

use App\Models\Log;
use App\Models\TitleCategoryIndex;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public TitleCategoryIndex $index;

    public function mount()
    {
        $this->index = new TitleCategoryIndex();
    }

    protected $rules = [
        'index.title' => 'required',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function categoryForm()
    {
        $this->validate();

        TitleCategoryIndex::query()->create([
            'title' => $this->index->title,
        ]);

        $this->index->title = '';
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن عنوان دسته صفحه اصلی سایت'.'-'.$this->index->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' عنوان دسته صفحه اصلی سایت با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {

        $indexes = $this->readyToLoad ? TitleCategoryIndex::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.index.title.index', compact('indexes'));
    }
}
