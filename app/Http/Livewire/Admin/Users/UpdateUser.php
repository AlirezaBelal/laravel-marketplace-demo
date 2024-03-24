<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateUser extends Component
{
    use WithFileUploads;

    public $img;

    public $admin = null;

    public $staff = null;

    protected $rules = [
        'user.admin' => 'nullable',
        'user.staff' => 'nullable',
        'user.name' => 'nullable',
        'user.mobile' => 'nullable',
        'user.email' => 'nullable',
    ];

    public function categoryForm()
    {

        $this->validate();
        if ($this->img) {
            $this->user->img = $this->uploadImage();
        }
        $this->user->update($this->validate());
        //        if (!$this->user->status) {
        //            $this->category->update([
        //                'status' => 0
        //            ]);
        //        }

        //        alert()->success('کاربر با موفقیت ایجاد شد.', 'کاربر آپدیت شد.');
        return redirect(route('users.index'));

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "user/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);

        return "$directory/$name";
    }

    public User $user;

    public function render()
    {
        if ($this->user->admin == 1) {
            $this->user->admin = true;
        } else {
            $this->user->admin = false;
        }
        if ($this->user->staff == 1) {
            $this->user->staff = true;
        } else {
            $this->user->staff = false;
        }

        $user = $this->user;

        return view('livewire.admin.users.update-user', compact('user'));
    }
}
