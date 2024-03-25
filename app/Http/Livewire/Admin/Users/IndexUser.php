<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Log;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = [
        'user.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $img;

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public User $user;

    public function mount()
    {
        $this->user = new User();
    }

    protected $rules = [
        'user.admin' => 'nullable',
        'user.staff' => 'nullable',
        'user.name' => 'nullable',
        'user.mobile' => 'nullable',
        'user.email' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function userForm()
    {

        $this->validate();

        $user = User::query()->create([
            'name' => $this->user->name,
            'mobile' => $this->user->mobile,
            'email' => $this->user->email,
            'admin' => $this->user->admin ? true : false,
            'staff' => $this->user->staff ? true : false,
        ]);

        if ($this->img) {
            $user->update([
                'img' => $this->uploadImage(),
            ]);
        }

        $this->user->mobile = '';
        $this->user->email = '';
        $this->user->name = '';
        $this->user->staff = false;
        $this->user->admin = false;
        $this->img = null;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن کاربر'.'-'.$this->user->name,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' کاربر با موفقیت ایجاد شد.');

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

    public function loadUser()
    {
        $this->readyToLoad = true;
    }

    public function updateUserDisable($id)
    {
        $user = user::find($id);
        $user->update([
            'email_verified_at' => now(),
        ]);

        $this->emit('toast', 'success', 'ایمیل کاربر با موفقیت تایید شد.');
    }

    public function deleteUser($id)
    {
        $user = user::find($id);
        $user->delete();

        $this->emit('toast', 'success', ' کاربر با موفقیت حذف شد.');

    }

    public function render()
    {

        $users = $this->readyToLoad ? User::where('name', 'LIKE', "%{$this->search}%")->
        orWhere('email', 'LIKE', "%{$this->search}%")->
        orWhere('mobile', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.users.index-user', compact('users'));
    }
}
