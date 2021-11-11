<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public Color $color;

    protected $rules = [
        'color.name' => 'required',
        'color.value' => 'required',
        'color.status' => 'nullable',
    ];


    public function categoryForm()
    {
        $this->validate();
        $this->color->update($this->validate());
        if (!$this->color->status) {
            $this->color->update([
                'status' => 0
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت رنگ' . '-' . $this->color->name,
            'actionType' => 'آپدیت'
        ]);

        alert()->success(' با موفقیت آپدیت شد.', 'رنگ مورد نظر با موفقیت آپدیت شد.');
        return redirect(route('color.index'));
    }


    public function render()
    {
        if ($this->color->status == 1) {
            $this->color->status = true;
        } else {
            $this->color->status = false;
        }
        $color = $this->color;
        return view('livewire.admin.product.color.update', compact('color'));
    }
}
