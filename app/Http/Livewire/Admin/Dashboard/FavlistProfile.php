<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class FavlistProfile extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $favlists = \App\Models\FavList::where('id',$id)->first();

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

        $favlists = $this->readyToLoad ? \App\Models\FavList::where('user_id', 'LIKE', "%{$this->search}%")->
        orWhere('title', 'LIKE', "%{$this->search}%")->
        orWhere('description', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.dashboard.favlist-profile',compact('favlists'));
    }
}
