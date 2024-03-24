<?php

namespace App\Http\Livewire\Admin\Footer\Link;

use App\Models\FooterLinkTitle;
use App\Models\Log;
use Livewire\Component;

class Title extends Component
{
    public $readyToLoad = false;

    public FooterLinkTitle $footerLinkTitle;

    public function mount()
    {
        $this->footerLinkTitle = new FooterLinkTitle();
    }



    protected $rules = [
        'footerLinkTitle.page_id' => 'required',
    ];

    public function updated($page_id)
    {
        $this->validateOnly($page_id);
    }


    public function categoryForm()
    {
        $this->validate();
       if ($this->footerLinkTitle->count() >2){
//           alert()->error('عنوان فوتر صفحه سایت آپدیت نشد.', 'عنوان فوتر صفحه سایت نباید بیشتر از 3 تا باشد.');
           return redirect(route('footer_page_title.index'));
       }else
       {
           FooterLinkTitle::query()->create([
               'page_id' => $this->footerLinkTitle->page_id,
           ]);
           $this->footerLinkTitle->page_id = "";
           Log::create([
               'user_id' => auth()->user()->id,
               'url' => 'افزودن صفحه به فوتر سایت' .'-'. $this->footerLinkTitle->page_id,
               'actionType' => 'ایجاد'
           ]);
           $this->emit('toast', 'success', ' صفحه به فوتر سایت با موفقیت ایجاد شد.');
       }


    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }
    public function deleteCategory($id)
    {
        $page = FooterLinkTitle::find($id);
        $page->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن صفحه به فوتر سایت' .'-'. $this->footerLinkTitle->page_id,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' صفحه به فوتر سایت با موفقیت حذف شد.');

    }

    public function render()
    {

        $footer_links = FooterLinkTitle::latest()->get();
        return view('livewire.admin.footer.link.title',compact('footer_links'));
    }
}
