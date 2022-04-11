<?php

namespace App\Http\Livewire\Admin\Footer\Title;

use App\Models\FooterTitle;
use App\Models\Log;
use Livewire\Component;

class Index extends Component
{
    public $readyToLoad = false;

    public FooterTitle $footerTitle;

    public function mount()
    {
        $this->footerTitle = new FooterTitle();
    }



    protected $rules = [
        'footerTitle.title' => 'required',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function categoryForm()
    {
        $this->validate();
        if ($this->footerTitle->count() >17){
            alert()->error('عنوان فوتر  آپدیت نشد.', 'عنوان فوتر  نباید بیشتر از 15 مورد باشد.');
            return redirect(route('footer_title.index'));
        }else
        {
            FooterTitle::query()->create([
                'title' => $this->footerTitle->title,
            ]);
            $this->footerTitle->title = "";
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'افزودن صفحه به فوتر سایت' .'-'. $this->footerTitle->title,
                'actionType' => 'ایجاد'
            ]);
            $this->emit('toast', 'success', ' عنوان فوتر سایت با موفقیت ایجاد شد.');
        }


    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function render()
    {

        $footer_titles = FooterTitle::latest()->get();
        return view('livewire.admin.footer.title.index',compact('footer_titles'));
    }
}
