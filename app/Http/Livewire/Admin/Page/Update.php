<?php

namespace App\Http\Livewire\Admin\Page;

use App\Models\Brand;
use App\Models\Log;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public Page $page;

    public $img;
    protected $rules = [
        'page.title' => 'required',
        'page.link' => 'required',
    ];
    public function categoryForm()
    {
        $this->validate();
        if ($this->img){
            $this->page->img = $this->uploadImage();
        }

        $this->page->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت صفحه سایت' .'-'. $this->page->title,
            'actionType' => 'آپدیت'
        ]);
        alert()->success(' با موفقیت آپدیت شد.', 'صفحه سایت مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('page.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "page/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        $page = $this->page;
        return view('livewire.admin.page.update',compact('page'));
    }
}
