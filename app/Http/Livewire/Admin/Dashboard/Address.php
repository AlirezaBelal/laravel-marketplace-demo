<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Log;
use App\Models\Product;
use App\Models\Seller;
use App\Models\TitleCategoryIndex;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Address extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public \App\Models\Address $address;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }





    public function deleteAddress($id)
    {
        $address = \App\Models\Address::where('id',$id)->first();
        $address->delete();

        $this->emit('toast', 'success', ' آدرس با موفقیت حذف شد.');
    }


    public function render()
    {
        $addreses = $this->readyToLoad ? \App\Models\Address::where('name', 'LIKE', "%{$this->search}%")->
        orWhere('lname', 'LIKE', "%{$this->search}%")->
        orWhere('address', 'LIKE', "%{$this->search}%")->
        orWhere('code_posti', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.dashboard.address',compact('addreses'));
    }
}
