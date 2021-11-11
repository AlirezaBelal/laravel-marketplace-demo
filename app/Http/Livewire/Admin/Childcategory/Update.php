<?php

namespace App\Http\Livewire\Admin\Childcategory;

use App\Models\ChildCategory;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public ChildCategory $childcategory;
    public $img;

    protected $rules = [
        'childcategory.title' => 'required|min:3',
        'childcategory.name' => 'required',
        'childcategory.link' => 'required',
        'childcategory.status' => 'nullable',
        'childcategory.parent' => 'nullable',
    ];


    public function categoryForm()
    {
        $this->validate();
        if ($this->img) {
            $this->childcategory->img = $this->uploadImage();
        }

        $this->childcategory->update($this->validate());

        if (!$this->childcategory->status) {
            $this->childcategory->update([
                'status' => 0
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت دسته کودک' . '-' . $this->childcategory->title,
            'actionType' => 'آپدیت'
        ]);

        alert()->success('دسته کودک با موفقیت ایجاد شد.', 'دسته کودک آپدیت شد.');

        return redirect(route('childcategory.index'));
    }


    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "childcategory/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        if ($this->childcategory->status == 1) {
            $this->childcategory->status = true;
        } else {
            $this->childcategory->status = false;
        }
        $childcategory = $this->childcategory;
        return view('livewire.admin.childcategory.update', compact('childcategory'));
    }
}
