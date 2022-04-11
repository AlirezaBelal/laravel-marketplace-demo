<?php

namespace App\Http\Livewire\Admin\Footer\Link;

use App\Models\FooterLinkOne;
use App\Models\FooterPartner;
use App\Models\Log;
use Livewire\Component;

class Partner extends Component
{
    public $readyToLoad = false;

    public FooterPartner $footerLinkOne;

    public function mount()
    {
        $this->footerLinkOne = new FooterPartner();
    }



    protected $rules = [
        'footerLinkOne.page_id' => 'required',
    ];

    public function updated($page_id)
    {
        $this->validateOnly($page_id);
    }


    public function categoryForm()
    {
        $this->validate();

        FooterPartner::query()->create([
            'page_id' => $this->footerLinkOne->page_id,
        ]);
        $this->footerLinkOne->page_id = "";
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن صفحه به فوتر سایت' .'-'. $this->footerLinkOne->page_id,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' صفحه به فوتر سایت با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }
    public function deleteCategory($id)
    {
        $page = FooterPartner::find($id);
        $page->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن صفحه به فوتر سایت' .'-'. $this->footerLinkOne->page_id,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' صفحه به فوتر سایت با موفقیت حذف شد.');

    }

    public function render()
    {

        $footer_links = FooterPartner::latest()->get();

        return view('livewire.admin.footer.link.partner',compact('footer_links'));
    }
}
