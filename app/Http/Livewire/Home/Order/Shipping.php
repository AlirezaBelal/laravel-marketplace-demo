<?php

namespace App\Http\Livewire\Home\Order;

use App\Models\Address;
use App\Models\AddressTime;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ReceiptCenter;
use Livewire\Component;

class Shipping extends Component
{
    public $address_use;

    public $order;

    public $orders;

    public $dPrice;

    public $dateId;

    protected $listeners = ['adtime' => '$refresh'];

    public function checkout_address($id)
    {
        $address = Address::where('user_id', auth()->id())->findOrFail($id);
        $this->address_use = $address;
        foreach ($this->pendingOrders() as $order) {
            $order->update([
                'address_id' => $address->id,
            ]);
        }
    }

    public function deleteAddress($id)
    {
        Address::where('user_id', auth()->id())->findOrFail($id)->delete();
    }

    public function anbaradd($id)
    {
        $address = ReceiptCenter::findOrFail($id);
        foreach ($this->pendingOrders() as $order) {
            $order->update([
                'anbar_id' => $address->id,
                'type_order' => 1,
            ]);
        }
    }

    public function shippingId($id)
    {
        $time = AddressTime::findOrFail($id);
        $this->dateId = $time->id;
        $this->dPrice = $time->price;
    }

    public function addToPayment()
    {
        // Never accept order totals or shipping prices from a Livewire argument
        // or mutable public properties. Both amounts must come from the database.
        $orders = $this->pendingOrders();
        $shippingTime = AddressTime::findOrFail($this->dateId);
        $subtotal = $orders->sum('total_discount_price');
        $shippingPrice = $shippingTime->price;

        foreach ($orders as $order) {
            Payment::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'total_price' => $subtotal + $shippingPrice,
                'time_id' => $shippingTime->id,
                'shipping_price' => $shippingPrice,
                'order_number' => $order->order_number,
            ]);
            if ($order->address_id == null) {
                $address = Address::where('user_id', auth()->id())->firstOrFail();
                $order->update([
                    'address_id' => $address->id,
                ]);
            }
        }

        $carts = Cart::where('user_id', auth()->id())->where('type', 0)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }

        return $this->redirect(route('order.payment'));
    }

    public function render()
    {

        $orders = $this->pendingOrders();
        $order_last = $orders->last();
        $this->orders = $orders;
        $carts = Cart::where('user_id', auth()->user()->id)
            ->where('type', 0)->get();

        $addresses = Address::where('user_id', auth()->user()->id)->get();

        return view('livewire.home.order.shipping',
            compact('addresses', 'orders', 'order_last')
        )->layout('layouts.shipping');
    }

    private function pendingOrders()
    {
        $latest = Order::where('user_id', auth()->id())
            ->where('payment', 0)
            ->latest('id')
            ->firstOrFail();

        return Order::where('user_id', auth()->id())
            ->where('order_number', $latest->order_number)
            ->where('payment', 0)
            ->get();
    }
}
