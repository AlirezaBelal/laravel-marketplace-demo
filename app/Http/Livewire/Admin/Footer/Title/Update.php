<?php

namespace App\Http\Livewire\Admin\Footer\Title;

use App\Models\FooterTitle;
use App\Models\Log;
use Livewire\Component;

class Update extends Component
{
    public FooterTitle $footer_title;

    protected $rules = [
        'footer_title.title' => 'required',
    ];

    public function categoryForm()
    {
        $this->validate();
        $this->footer_title->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت عنوان فوتر صفحه سایت'.'-'.$this->footer_title->page_id,
            'actionType' => 'آپدیت',
        ]);
        //        alert()->success('عنوان فوتر صفحه سایت با موفقیت ایجاد شد.', 'عنوان فوتر صفحه سایت آپدیت شد.');

        return redirect(route('footer_title.index'));

    }

    public function render()
    {
        $footer_title = $this->footer_title;

        return view('livewire.admin.footer.title.update', compact('footer_title'));
    }
}
