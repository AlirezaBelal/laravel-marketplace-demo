<?php

namespace App\Http\Livewire\Admin\Site\Header;

use App\Models\header;
use App\Models\Log;
use App\Models\SiteHeader;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $img;
    public $status = null;
    protected $rules = [
        'header.title' => 'required|min:3',
        'header.status' => 'required',
        'header.link' => 'required',
        'header.icon' => 'nullable',
    ];
    public function headerForm()
    {

        $this->validate();
        if ($this->img) {
            $this->header->img = $this->uploadImage();
        }
        $this->header->update($this->validate());
        if (!$this->header->status) {
            $this->header->update([
                'status' => 0
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت منو' .'-'. $this->header->title,
            'actionType' => 'آپدیت'
        ]);
//        alert()->success('منو با موفقیت ایجاد شد.', 'منو آپدیت شد.');
        return redirect(route('header.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "site/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }
    public SiteHeader $header;

    public function render()
    {
        if ($this->header->status == 1){
            $this->header->status = true;
        }else
        {
            $this->header->status = false;
        }

        $header = $this->header;
        return view('livewire.admin.site.header.update',compact('header'));
    }
}
