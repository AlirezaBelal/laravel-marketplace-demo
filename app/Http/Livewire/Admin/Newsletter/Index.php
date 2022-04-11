<?php

namespace App\Http\Livewire\Admin\Newsletter;

use App\Models\Log;
use App\Models\NewsLetter;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public NewsLetter $newsletter;

    public function mount()
    {
        $this->newsletter = new NewsLetter();
    }



    protected $rules = [
        'newsletter.email' => 'required',
    ];

    public function updated($email)
    {
        $this->validateOnly($email);
    }


    public function categoryForm()
    {
        $this->validate();

        NewsLetter::query()->create([
            'email' => $this->newsletter->email,
        ]);


        $this->newsletter->email = "";
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن خبرنامه' .'-'. $this->newsletter->email,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' خبرنامه با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }
    public function deleteCategory($id)
    {
        $page = NewsLetter::find($id);
        $page->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن خبرنامه' .'-'. $this->newsletter->email,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' خبرنامه با موفقیت حذف شد.');

    }


    public function render()
    {

        $newsletters = $this->readyToLoad ? NewsLetter::where('email', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.newsletter.index',compact('newsletters'));
    }
}
