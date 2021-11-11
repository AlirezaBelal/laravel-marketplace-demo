<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Category;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public SubCategory $subcategory;
    public $img;

    protected $rules = [
        'subcategory.title' => 'required|min:3',
        'subcategory.name' => 'required',
        'subcategory.link' => 'required',
        'subcategory.status' => 'nullable',
        'subcategory.parent' => 'nullable',
    ];


    public function categoryForm()
    {
        $this->validate();
        if ($this->img) {
            $this->subcategory->img = $this->uploadImage();
        }

        $this->subcategory->update($this->validate());
        if (!$this->subcategory->status) {
            $this->subcategory->update([
                'status' => 0
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت زیردسته' . '-' . $this->subcategory->title,
            'actionType' => 'آپدیت'
        ]);

        alert()->success('زیر دسته با موفقیت ایجاد شد.', 'زیر دسته آپدیت شد.');

        return redirect(route('subcategory.index'));
    }


    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "subcategory/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }


    public function render()
    {
        if ($this->subcategory->status == 1) {
            $this->subcategory->status = true;
        } else {
            $this->subcategory->status = false;
        }
        $subcategory = $this->subcategory;
        return view('livewire.admin.subcategory.update', compact('subcategory'));
    }
}
