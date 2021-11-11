<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class FavlistProfile extends Component
{
    use WithPagination;

    public $search;
    public $readyToLoad = false;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function deleteCategory($id)
    {
        $favlists = \App\Models\FavList::where('id', $id)->first();

        $favlists->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن لیست عمومی' . '-' . $id,
            'actionType' => 'حذف'
        ]);

        $this->emit('toast', 'success', ' با موفقیت از لیست های عمومی حذف شد ! ');
    }

    public function render()
    {
        $favlists = $this->readyToLoad ? \App\Models\FavList::where('user_id', 'LIKE', "%{$this->search}%")
            ->orWhere('title', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->orWhere('link', 'LIKE', "%{$this->search}%")
            ->latest()
            ->paginate(10) : [];
        return view('livewire.admin.dashboard.favlist-profile', compact('favlists'));
    }
}
