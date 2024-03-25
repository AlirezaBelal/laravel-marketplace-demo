<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Log;
use App\Models\PermissionRole;
use App\Models\Role;
use Livewire\Component;

class UpdateRole extends Component
{
    public $permissions;

    public Role $role;

    public $img;

    protected $rules = [
        'role.name' => 'required',
        'role.def' => 'nullable',
    ];

    public function categoryForm()
    {
        $this->validate();

        $this->role->update($this->validate());
        $permissionDelete = PermissionRole::where('role_id', $this->role->id)->delete();
        foreach ($this->permissions as $key => $value) {
            PermissionRole::create([
                'permission_id' => $value,
                'role_id' => $this->role->id,
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت مقام'.'-'.$this->role->def,
            'actionType' => 'آپدیت',
        ]);
        //        alert()->success('مقام با موفقیت ایجاد شد.', 'مقام آپدیت شد.');

        return redirect(route('role.index'));

    }

    public function render()
    {
        $role = $this->role;

        return view('livewire.admin.role.update-role', compact('role'));
    }
}
