<?php

namespace App\Http\Livewire\Home\Profile\Order\Detail;

use App\Models\Order;
use App\Models\Payment;
use App\Models\ReturnOrder;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemInfo extends Component
{
    public $o_number;

    use WithFileUploads;

    public $img;

    public ReturnOrder $returnOrder;

    public function mount()
    {
        $this->returnOrder = new ReturnOrder();
    }

    protected $rules = [
        'returnOrder.count' => 'nullable',
        'returnOrder.item_reason' => 'nullable',
        'returnOrder.detail' => 'nullable',
    ];

    public function updated($item_reason)
    {
        $this->validateOnly($item_reason);
    }

    public function itemReturnedOrder()
    {
        $this->validate();
        $returnedPayments = ReturnOrder::where('order_number', $this->o_number)->get();
        foreach ($returnedPayments as $returnedPayment) {
            $returnedPayment->update([
                'count' => $this->returnOrder->count,
                'item_reason' => $this->returnOrder->item_reason,
                'detail' => $this->returnOrder->detail,
            ]);
            if ($this->img) {
                $returnedPayment->update([
                    'img' => $this->uploadImage(),
                ]);
            }
        }

        return redirect(route('order.profile.canceled'));
    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "order/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);

        return "$directory/$name";
    }

    public function render()
    {
        $order_number = Request::segment(3);
        $this->o_number = $order_number;
        $orders = Order::where('order_number', $order_number)->get();
        $payment_first = Payment::where('order_number', $order_number)->first();
        $payments = Payment::where('order_number', $order_number)->get();
        $order_first = Order::where('order_number', $order_number)->first();
        $returnedPayments = ReturnOrder::where('order_number', $order_number)->get();

        return view('livewire.home.profile.order.detail.item-info', compact('order_number', 'orders', 'payment_first', 'payments', 'returnedPayments', 'order_first'))->layout('layouts.home');
    }
}
