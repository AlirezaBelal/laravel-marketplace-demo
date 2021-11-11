<?php

namespace App\Http\Livewire\Admin\Product\Warranty;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Log;
use App\Models\Warranty;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public Warranty $warranty;

    protected $rules = [
        'warranty.name' => 'required',
        'warranty.status' => 'nullable',
    ];


    public function categoryForm()
    {
        $this->validate();

        $this->warranty->update($this->validate());
        if (!$this->warranty->status) {
            $this->warranty->update([
                'status' => 0
            ]);
        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت گارانتی' . '-' . $this->warranty->name,
            'actionType' => 'آپدیت'
        ]);

        alert()->success(' با موفقیت آپدیت شد.', 'گارانتی مورد نظر با موفقیت آپدیت شد.');

        return redirect(route('warranty.index'));
    }

    public function render()
    {
        if ($this->warranty->status == 1) {
            $this->warranty->status = true;
        } else {
            $this->warranty->status = false;
        }
        $warranty = $this->warranty;
        return view('livewire.admin.product.warranty.update', compact('warranty'));
    }
}
