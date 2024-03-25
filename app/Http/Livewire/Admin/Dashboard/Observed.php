<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Observed extends Component
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
        $favorites = \App\Models\Observed::where('id', $id)->first();

        $favorites->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن اطلاع رسانی'.'-'.$id,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' با موفقیت از لیست اطلاع رسانی ها حذف شد ! ');

    }

    public function render()
    {

        $observeds = $this->readyToLoad ? \App\Models\Observed::where('user_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.dashboard.observed', compact('observeds'));
    }
}
