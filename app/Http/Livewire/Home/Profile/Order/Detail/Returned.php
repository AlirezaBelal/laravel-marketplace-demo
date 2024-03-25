<?php

namespace App\Http\Livewire\Home\Profile\Order\Detail;

use App\Models\Order;
use App\Models\Payment;
use App\Models\ReturnOrder;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Returned extends Component
{
    public $order_price;

    public $status = [];

    public $newPrice;

    public $order_number;

    public ReturnOrder $returnOrder;

    public function mount()
    {
        $this->returnOrder = new ReturnOrder();
    }

    protected $rules = [
        'returnOrder.status' => 'nullable',
    ];

    public function updated($status)
    {
        $this->validateOnly($status);
    }

    public function ReturnedForm()
    {
        $this->validate();
        $orders = Order::where('order_number', $this->order_number)->get();
        $returnedPayments = ReturnOrder::where('order_number', $this->order_number)->get();
        foreach ($this->status as $state) {
            $returnedPaymentU = ReturnOrder::where('id', $state)->get();
            foreach ($returnedPaymentU as $returnedPayment) {
                $returnedPayment->update([
                    'status' => 0,
                ]);
            }
        }

        return redirect(route('returned.itemInfo', $this->order_number));

    }

    public function newPrice($id)
    {
        $returnPayment = ReturnOrder::find($id);
        $this->newPrice = $this->newPrice + $returnPayment->order->total_price;
    }

    public function render()
    {
        $order_number = Request::segment(3);
        $this->order_number = $order_number;
        $orders = Order::where('order_number', $order_number)->get();
        $payment_first = Payment::where('order_number', $order_number)->first();
        $payments = Payment::where('order_number', $order_number)->get();
        $order_first = Order::where('order_number', $order_number)->first();
        $returnedPayments = ReturnOrder::where('order_number', $order_number)->get();

        return view('livewire.home.profile.order.detail.returned_detail', compact('order_number', 'orders', 'payments', 'payment_first', 'returnedPayments'))
            ->layout('layouts.home');
    }
}
