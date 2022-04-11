<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOrder extends Component
{


    public Order $order;

    public function render()
    {
        $order = $this->order;
        return view('livewire.admin.order.show-order',compact('order'));
    }
}
