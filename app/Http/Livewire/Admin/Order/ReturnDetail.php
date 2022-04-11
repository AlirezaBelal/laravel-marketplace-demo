<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\ReturnOrder;
use Livewire\Component;
use Livewire\WithPagination;

class ReturnDetail extends Component
{
    use WithPagination;
    protected $listeners = [
        'category.added' => '$refresh'
    ];
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $queryString = ['search'];
    public $readyToLoad = false;
    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function confirmReturnOrder($id)
    {
        $returnOrder = ReturnOrder::find($id);
        $returnOrder->update([
            'status'=>1
        ]);
        $this->emit('toast', 'success', ' مرجوعی کالا با موفقیت تایید شد.');

    }
    public function render()
    {
        $returnOrders = $this->readyToLoad ? ReturnOrder::where('status','0')
            ->where('user_id', 'LIKE', "%{$this->search}%")->
        orWhere('order_number', 'LIKE', "%{$this->search}%")->
        orWhere('order_id', 'LIKE', "%{$this->search}%")->
        orWhere('count', 'LIKE', "%{$this->search}%")->
        orWhere('item_reason', 'LIKE', "%{$this->search}%")->
        orWhere('detail', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(20) : [];
        return view('livewire.admin.order.return-detail',compact('returnOrders'));
    }
}
