<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public Color $color;
    public $img;
    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'color.name' => 'required',
        'color.value' => 'required',
        'color.status' => 'nullable',
    ];


    public function mount()
    {
        $this->color = new Color();
    }


    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function categoryForm()
    {
        $this->validate();

        $color = Color::query()->create([
            'name' => $this->color->name,
            'value' => $this->color->value,
            'status' => $this->color->status ? 1 : 0,
        ]);

        $this->color->name = "";
        $this->color->value = "";
        $this->color->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن رنگ' . '-' . $this->color->name,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' رنگ با موفقیت ایجاد شد.');
    }


    public function updateCategoryDisable($id)
    {
        $color = Color::find($id);
        $color->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت رنگ' . '-' . $this->color->name,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت رنگ با موفقیت غیرفعال شد.');
    }


    public function updateCategoryEnable($id)
    {
        $color = Color::find($id);
        $color->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت رنگ' . '-' . $this->color->name,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت رنگ با موفقیت فعال شد.');
    }


    public function deleteCategory($id)
    {
        $color = Color::find($id);
        $color->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن رنگ' . '-' . $this->color->name,
            'actionType' => 'حذف'
        ]);

        $this->emit('toast', 'success', ' رنگ با موفقیت حذف شد.');
    }


    public function render()
    {
        $colors = $this->readyToLoad ? Color::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('value', 'LIKE', "%{$this->search}%")
            ->latest()
            ->paginate(10) : [];
        return view('livewire.admin.product.color.index', compact('colors'));
    }
}
