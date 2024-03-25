<?php

namespace App\Http\Livewire\Admin\Menu;

use App\Models\Log;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Menu $menu;

    public function mount()
    {
        $this->menu = new Menu();
    }

    protected $rules = [
        'menu.category_id' => 'required',
        'menu.subCategory_id' => 'required',
        'menu.childCategory_id' => 'nullable',
        'menu.index' => 'nullable',
        'menu.status' => 'nullable',
    ];

    public function updated($category_id)
    {
        $this->validateOnly($category_id);
    }

    public function categoryForm()
    {
        $this->validate();

        Menu::query()->create([
            'category_id' => $this->menu->category_id,
            'subCategory_id' => $this->menu->subCategory_id,
            'childCategory_id' => $this->menu->childCategory_id,
            'status' => $this->menu->status ? 1 : 0,
        ]);

        $this->menu->category_id = null;
        $this->menu->subCategory_id = null;
        $this->menu->childCategory_id = null;
        $this->menu->status = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن منو'.'-'.$this->menu->category_id,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' منو با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $category = Menu::find($id);
        $category->update([
            'status' => 0,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت منو'.'-'.$category->category_id,
            'actionType' => 'غیرفعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت منو با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $category = Menu::find($id);
        $category->update([
            'status' => 1,
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت منو'.'-'.$category->category_id,
            'actionType' => 'فعال',
        ]);
        $this->emit('toast', 'success', 'وضعیت منو با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $category = Menu::find($id);
        $childCategory = Menu::where('subCategory_id', $id)->first();
        if ($childCategory == null) {
            $category->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن منو'.'-'.$category->category_id,
                'actionType' => 'حذف',
            ]);
            $this->emit('toast', 'success', ' منو با موفقیت حذف شد.');
        } else {
            $this->emit('toast', 'success', ' امکان حذف وجود ندارد زیرا این دسته، شامل دسته کودک است!');
        }

    }

    public function render()
    {

        $menus = $this->readyToLoad ? Menu::where('category_id', 'LIKE', "%{$this->search}%")->
        orWhere('subCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('childCategory_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.menu.index', compact('menus'));
    }
}
