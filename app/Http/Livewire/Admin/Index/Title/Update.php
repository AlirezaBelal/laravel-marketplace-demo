<?php

namespace App\Http\Livewire\Admin\Index\Title;

use App\Models\Log;
use App\Models\TitleCategoryIndex;
use Livewire\Component;

class Update extends Component
{
    protected $rules = [
        'index.title' => 'required',
    ];

    public function categoryForm()
    {

        $this->validate();
        $this->index->update($this->validate());
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت عنوان دسته'.'-'.$this->index->title,
            'actionType' => 'آپدیت',
        ]);

        //        alert()->success('عنوان دسته با موفقیت ایجاد شد.', 'عنوان دسته آپدیت شد.');
        return redirect(route('index.title.index'));

    }

    public TitleCategoryIndex $index;

    public function render()
    {

        $index = $this->index;

        return view('livewire.admin.index.title.update', compact('index'));
    }
}
