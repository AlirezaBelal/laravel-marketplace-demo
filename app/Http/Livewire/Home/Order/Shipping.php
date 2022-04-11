<?php

namespace App\Http\Livewire\Home\Order;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ReceiptCenter;
use Illuminate\Support\Facades\Request;
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
        $address = Address::find($id);
        $this->address_use = $address;
        foreach ($this->orders as $order) {
            $order->update([
                'address_id' => $address->id,
            ]);
        }
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);
        dd($address);
    }

    public function anbaradd($id)
    {
        $address = ReceiptCenter::find($id);
        foreach ($this->orders as $order) {
            $order->update([
                'anbar_id' => $address->id,
                'type_order' => 1,
            ]);
        }
    }

    public function shippingId($id)
    {
//        $this->dateId = $id;
    }

    public function addToPayment($data)
    {
        foreach ($this->orders as $order) {
            \App\Models\Payment::create([
                'user_id' => auth()->user()->id,
                'order_id' => $order->id,
                'total_price' => $data + $this->dPrice,
                'time_id' =>  $this->dateId,
                'shipping_price' => $this->dPrice,
                'order_number' => $order->order_number,
            ]);
            if ($order->address_id == null) {
                $address = Address::where('user_id',auth()->user()->id)->first();
                $order->update([
                    'address_id' => $address->id,
                ]);
            }
        }

        $carts = Cart::where('user_id',auth()->user()->id)->where('type',0)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return $this->redirect(route('order.payment'));
    }

    public function render()
    {

        $order = Order::where('user_id', auth()->user()->id)->get();
        $order_last = $order->last();
        $order_number = $order->last()->order_number;
        $orders = Order::where('order_number', $order_number)->get();
        $this->orders = $orders;
        $carts = Cart::where('user_id', auth()->user()->id)
            ->where('type', 0)->get();

        $addresses = Address::where('user_id', auth()->user()->id)->get();
        return view('livewire.home.order.shipping',
            compact('addresses', 'orders', 'order_last')
        )->layout('layouts.shipping');
    }
}
