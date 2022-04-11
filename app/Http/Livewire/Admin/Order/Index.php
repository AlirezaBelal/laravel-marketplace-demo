<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\ReceiptCenter;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
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
    public function render()
    {
        $orders = $this->readyToLoad ? Order::where('address_id', 'LIKE', "%{$this->search}%")->
        orWhere('order_number', 'LIKE', "%{$this->search}%")->
        orWhere('anbar_id', 'LIKE', "%{$this->search}%")->
        orWhere('transaction_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_vendor', 'LIKE', "%{$this->search}%")->
        orWhere('count', 'LIKE', "%{$this->search}%")->
        orWhere('type_send', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.order.index',compact('orders'));
    }
}
