<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Seller;
use App\Models\Log;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Seller $seller;

    public function mount()
    {
        $this->seller = new Seller();
    }



    public function loadCategory()
    {
        $this->readyToLoad = true;
    }





    public function deleteCategory($id)
    {
        $seller = seller::find($id);
        $product = Product::where('vendor_id',$id)->first();
        if ($product == null){
            $seller->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن فروشنده' .'-'. $this->seller->title,
                'actionType' => 'حذف'
            ]);
            $this->emit('toast', 'success', ' فروشنده با موفقیت حذف شد.');
        }else
        {
            $this->emit('toast', 'success', ' امکان حذف وجود ندارد زیرا فروشنده، شامل محصول است!');
        }

    }


    public function render()
    {

        $sellers = $this->readyToLoad ? seller::where('website', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('lname', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.seller.index',compact('sellers'));
    }
}
