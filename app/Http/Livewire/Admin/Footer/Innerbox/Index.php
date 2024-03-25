<?php

namespace App\Http\Livewire\Admin\Footer\Innerbox;

use App\Models\FooterInnerBox;
use App\Models\Log;
use Livewire\Component;

class Index extends Component
{
    public $readyToLoad = false;

    public FooterInnerBox $footerInnerBox;

    public function mount()
    {
        $this->footerInnerBox = new FooterInnerBox();
    }

    protected $rules = [
        'footerInnerBox.page_id' => 'required',
        'footerInnerBox.top' => 'required',
    ];

    public function updated($page_id)
    {
        $this->validateOnly($page_id);
    }

    public function categoryForm()
    {
        $this->validate();

        FooterInnerBox::query()->create([
            'page_id' => $this->footerInnerBox->page_id,
            'top' => $this->footerInnerBox->top ? true : false,
        ]);
        $this->footerInnerBox->page_id = '';
        $this->footerInnerBox->top = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن صفحه به فوتر سایت'.'-'.$this->footerInnerBox->page_id,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' صفحه به فوتر سایت با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $page = FooterInnerBox::find($id);
        $page->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن صفحه به فوتر سایت'.'-'.$this->footerInnerBox->page_id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' صفحه به فوتر سایت با موفقیت حذف شد.');

    }

    public function render()
    {

        $footer_pages = FooterInnerBox::latest()->get();

        return view('livewire.admin.footer.innerbox.index', compact('footer_pages'));
    }
}
