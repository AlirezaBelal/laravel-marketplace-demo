<?php

namespace App\Http\Livewire\Admin\Footer\Link;

use App\Models\FooterLinkTitle;
use App\Models\Log;
use Livewire\Component;

class TitleUpdate extends Component
{
    public FooterLinkTitle $footer_page;

    protected $rules = [
        'footer_page.page_id' => 'required',
    ];
    public function categoryForm()
    {
        $this->validate();
        $this->footer_page->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت عنوان فوتر صفحه سایت' .'-'. $this->footer_page->page_id,
            'actionType' => 'آپدیت'
        ]);
//        alert()->success('عنوان فوتر صفحه سایت با موفقیت ایجاد شد.', 'عنوان فوتر صفحه سایت آپدیت شد.');

        return redirect(route('footer_page_title.index'));

    }


    public function render()
    {
        $footer_page = $this->footer_page;
        return view('livewire.admin.footer.link.title-update',compact('footer_page'));
    }
}
