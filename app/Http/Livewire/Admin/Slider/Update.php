<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Banner;
use App\Models\Log;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public Slider $slider;

    public $img;
    protected $rules = [
        'slider.title' => 'required',
        'slider.link' => 'required',
        'slider.status' => 'nullable',
    ];
    public function categoryForm()
    {
        $this->validate();
        if ($this->img){
            $this->slider->img = $this->uploadImage();
        }

        $this->slider->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت اسلایدر' .'-'. $this->slider->title,
            'actionType' => 'آپدیت'
        ]);
//        alert()->success(' با موفقیت آپدیت شد.', 'اسلایدر مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('slider.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "slider/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        if ($this->slider->status == 1){
            $this->slider->status = true;
        }else
        {
            $this->slider->status = false;
        }

        $slider = $this->slider;
        return view('livewire.admin.slider.update',compact('slider'));
    }
}
