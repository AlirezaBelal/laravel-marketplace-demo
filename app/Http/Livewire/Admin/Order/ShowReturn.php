<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\ReturnOrder;
use Livewire\Component;

class ShowReturn extends Component
{
    public ReturnOrder $returnOrder;

    public function render()
    {
        $returnOrder = $this->returnOrder;

        return view('livewire.admin.order.show-return', compact('returnOrder'));
    }
}
