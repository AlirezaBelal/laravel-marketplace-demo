<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\RoleUser;
use App\Models\User;
use Livewire\Component;

class PermissionUser extends Component
{
    public $permissions;

    public $roles;

    public User $user;

    protected $rules = [
        'permissions' => 'nullable',
    ];

    public function categoryForm()
    {
        $this->validate();
        if (\App\Models\PermissionUser::where('user_id', $this->user->id)->first()) {
            $permissionDelete = \App\Models\PermissionUser::where('user_id', $this->user->id)->delete();

        }
        if (\App\Models\RoleUser::where('user_id', $this->user->id)->first()) {
            $permissionDelete = \App\Models\RoleUser::where('user_id', $this->user->id)->delete();

        }
        if ($this->permissions != null) {
            foreach ($this->permissions as $key => $value) {
                \App\Models\PermissionUser::create([
                    'permission_id' => $value,
                    'user_id' => $this->user->id,
                ]);
            }
        }
        if ($this->roles != null) {
            foreach ($this->roles as $key => $value) {
                RoleUser::create([
                    'role_id' => $value,
                    'user_id' => $this->user->id,
                ]);
            }

        }

        //        alert()->success('مقام با موفقیت ایجاد شد.', 'مقام آپدیت شد.');

        return redirect(route('users.index'));

    }

    public function render()
    {
        $user = $this->user;

        return view('livewire.admin.users.permission-user', compact('user'));
    }
}
