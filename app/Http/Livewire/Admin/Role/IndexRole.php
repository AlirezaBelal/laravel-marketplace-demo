<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Category;
use App\Models\Log;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class IndexRole extends Component
{
    use WithPagination;

    public $permissions;
    protected $listeners = [
        'category.added' => '$refresh'
    ];
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;
    public Role $role;

    public function mount()
    {
        $this->role = new Role();
    }


    protected $rules = [
        'role.name' => 'required',
        'role.def' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function roleForm()
    {

        $this->validate();
        $role = Role::query()->create([
            'name' => $this->role->name,
            'def' => $this->role->def,
        ]);
        foreach ($this->permissions as $permission) {
            PermissionRole::create([
                'permission_id' => $permission,
                'role_id' => $role->id,
            ]);
        }


        $this->role->name = "";
        $this->role->def = "";
        $this->permissions = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن مقام' . '-' . $this->role->name,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' مقام با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن مقام' . '-' . $role->name,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' مقام با موفقیت حذف شد.');


    }


    public function render()
    {

        $roles = $this->readyToLoad ? Role::where('name', 'LIKE', "%{$this->search}%")->
        orWhere('def', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.role.index-role', compact('roles'));
    }
}
