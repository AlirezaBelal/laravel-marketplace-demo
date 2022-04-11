<?php

namespace App\Http\Livewire\Admin\Menu;

use App\Models\Category;
use App\Models\Log;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    public $status = null;

    protected $rules = [
        'menu.category_id' => 'required',
        'menu.subCategory_id' => 'required',
        'menu.childCategory_id' => 'nullable',
        'menu.status' => 'nullable',
    ];
    public function categoryForm()
    {

        $this->validate();
        $this->menu->update($this->validate());
        if (!$this->menu->status) {
            $this->menu->update([
                'status' => 0
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت منو' .'-'. $this->menu->category_id,
            'actionType' => 'آپدیت'
        ]);
        alert()->success('منو با موفقیت ایجاد شد.', 'منو آپدیت شد.');
        return redirect(route('menu.index'));

    }

    public Menu $menu;

    public function render()
    {
        if ($this->menu->status == 1){
            $this->menu->status = true;
        }else
        {
            $this->menu->status = false;
        }

        $menu = $this->menu;
        return view('livewire.admin.menu.update',compact('menu'));
    }
}
