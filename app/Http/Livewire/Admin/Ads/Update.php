<?php

namespace App\Http\Livewire\Admin\Ads;

use App\Models\AdsCategory;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public AdsCategory $ads;

    public $img;
    protected $rules = [
        'ads.title' => 'required|min:3',
        'ads.category_id' => 'nullable',
        'ads.status' => 'nullable',
    ];
    public function categoryForm()
    {
        $this->validate();
        if ($this->img){
            $this->ads->img = $this->uploadImage();
        }

        $this->ads->update($this->validate());
        if (!$this->ads->status) {
            $this->ads->update([
                'status' => 0
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت تبلیغات دسته' .'-'. $this->ads->title,
            'actionType' => 'آپدیت'
        ]);
        alert()->success(' با موفقیت آپدیت شد.', 'تبلیغات دسته مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('ads.index'));

    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "ads/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        if ($this->ads->status == 1){
            $this->ads->status = true;
        }else
        {
            $this->ads->status = false;
        }
        $ads = $this->ads;
        return view('livewire.admin.ads.update',compact('ads'));
    }
}
