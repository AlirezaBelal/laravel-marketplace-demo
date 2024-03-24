<?php

namespace App\Http\Livewire\Admin\Permission;

use App\Models\Log;
use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPermission extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh'
    ];
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;
    public Permission $permission;

    public function mount()
    {
        $this->permission = new Permission();
    }


    protected $rules = [
        'permission.name' => 'required',
        'permission.def' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function roleForm()
    {

        $this->validate();

        $permission = Permission::query()->create([
            'name' => $this->permission->name,
            'def' => $this->permission->def,
        ]);


        $this->permission->name = "";
        $this->permission->def = "";

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دسترسی' . '-' . $this->permission->name,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' دسترسی با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function deleteRole($id)
    {
        $role = Permission::find($id);
        $role->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن دسترسی' . '-' . $role->name,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' دسترسی با موفقیت حذف شد.');


    }


    public function render()
    {

        $permissions = $this->readyToLoad ? Permission::where('name', 'LIKE', "%{$this->search}%")->
        orWhere('def', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.permission.index-permission', compact('permissions'));
    }
}
