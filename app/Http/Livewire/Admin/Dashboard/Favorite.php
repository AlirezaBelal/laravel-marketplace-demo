<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Favorite extends Component
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
        $favorites = \App\Models\Favorite::where('id',$id)->first();

        $favorites->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن علاقه مندی' . '-' . $id,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' با موفقیت از لیست علاقه مندی ها حذف شد ! ');

    }

    public function render()
    {

        $favorites = $this->readyToLoad ? \App\Models\Favorite::where('user_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.dashboard.favorite', compact('favorites'));
    }
}
