<?php

namespace App\Http\Livewire\Admin\Payment;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
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
        $payments = $this->readyToLoad ? Payment::where('transactionId', 'LIKE', "%{$this->search}%")->
        orWhere('driver', 'LIKE', "%{$this->search}%")->
        orWhere('user_id', 'LIKE', "%{$this->search}%")->
        orWhere('order_id', 'LIKE', "%{$this->search}%")->
        orWhere('order_number', 'LIKE', "%{$this->search}%")->
        orWhere('total_price', 'LIKE', "%{$this->search}%")->
        orWhere('type_payment', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.payment.index', compact('payments'));
    }
}
