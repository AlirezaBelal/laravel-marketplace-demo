<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Log;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUpdate extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'order.status'=> 'nullable',
    ];
    public function categoryForm()
    {

        $this->validate();
        $this->order->update($this->validate());
        alert()->success('وضعیت سفارش با موفقیت ایجاد شد.', 'وضعیت سفارش آپدیت شد.');
        return redirect(route('admin.orders.index'));

    }
    public Order $order;

    public function render()
    {
        $order = $this->order;
        return view('livewire.admin.order.index-update',compact('order'));
    }
}
