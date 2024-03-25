<?php

namespace App\Http\Livewire\Home\Order;

use App\Models\Address;
use App\Models\BankPayment;
use App\Models\Discount;
use App\Models\Gift;
use App\Models\Order;
use App\Models\ReturnOrder;
use Livewire\Component;

class Payment extends Component
{
    public $discount_price;

    public $discount_type;

    public $dTotalPercent;

    public $dgift;

    public $sumPrice;

    public Discount $discount;

    public Gift $gift;

    public function mount()
    {
        $this->discount = new Discount();
        $this->gift = new Gift();
    }

    protected $rules = [
        'discount.code' => 'nullable',
        'gift.code' => 'nullable',
    ];

    public function updated($code)
    {
        $this->validateOnly($code);
    }

    public function checkDiscountCode()
    {
        $this->validate();

        if ($this->discount != null) {
            $code_discount = Discount::where('code', $this->discount->code)->first();
            if ($code_discount != null) {

                if ($code_discount->type == 1) {
                    $this->discount_price = $code_discount->price;
                    $this->discount_type = $code_discount->type;
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('order_number', $order_number)->get();
                    $payments = \App\Models\Payment::where('order_number', $order_number)->get();
                    foreach ($payments as $payment) {
                        $payment->update([
                            'discount_code' => $code_discount->code,
                            'discount_price' => $code_discount->price,
                        ]);
                    }
                    $this->emit('toast', 'success', ' کد تخفیف وارد شده اعمال شد.');
                } elseif ($code_discount->type == 0) {
                    $this->discount_price = $code_discount->percent;
                    $this->discount_type = 0;
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('order_number', $order_number)->get();
                    $payments = \App\Models\Payment::where('order_number', $order_number)->get();
                    foreach ($payments as $payment) {
                        $payment->update([
                            'discount_code' => $code_discount->code,
                            'discount_price' => $code_discount->percent,
                        ]);
                    }
                    $dPercent = ($orders->sum('total_discount_price') * $this->discount_price) / 100;

                    $this->dTotalPercent = $orders->sum('total_discount_price') - $dPercent;
                    $this->emit('toast', 'success', ' کد تخفیف وارد شده اعمال شد.');
                } else {
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('order_number', $order_number)->get();
                    $this->sumPrice = $orders->sum('total_discount_price');

                }
            } else {
                $this->emit('toast', 'error', ' کد تخفیف وارد شده وجود ندارد.');

            }
        }
        if ($this->gift != null) {
            $gift_code = Gift::where('code', $this->gift->code)->first();
            if ($gift_code) {
                if ($gift_code->type == 0) {
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('order_number', $order_number)->get();
                    $payments = \App\Models\Payment::where('order_number', $order_number)->get();
                    foreach ($payments as $payment) {
                        $payment->update([
                            'gift_code' => $gift_code->code,
                            'gift_code_price' => $gift_code->price,
                        ]);
                    }
                    if ($gift_code->value_price > $orders->sum('total_discount_price')) {
                        $this->dgift = $orders->sum('total_discount_price');
                    } elseif ($gift_code->value_price < $orders->sum('total_discount_price')) {
                        $this->dgift = $gift_code->value_price;
                    } else {
                        $this->emit('toast', 'error', ' کد هدیه شما وجود ندارد.');
                    }

                } elseif ($gift_code->type == 1) {
                    $this->emit('toast', 'error', ' کد هدیه شما استفاده شده است.');
                }
            } else {
                $this->emit('toast', 'error', ' کد هدیه شما پیدا نشد.');

            }
        }
    }

    public function paymentTypeInternet($order_number)
    {
        $payments = \App\Models\Payment::where('order_number', $order_number)->get();
        foreach ($payments as $payment) {
            $payment->update([
                'type_payment' => 1,
            ]);
        }
    }

    public function paymentTypeManual($order_number)
    {
        $payments = \App\Models\Payment::where('order_number', $order_number)->get();
        foreach ($payments as $payment) {
            $payment->update([
                'type_payment' => 0,
            ]);
        }
    }

    public function continuePayment($order_number)
    {
        $orders = Order::where('order_number', $order_number)->get();
        $payments = \App\Models\Payment::where('order_number', $order_number)->get();
        if ($this->discount_type == null) {
            if ($this->dgift == null) {
                $price = $orders->sum('total_discount_price');
            } else {
                $price = $orders->sum('total_discount_price') - $this->dgift;
            }
        } elseif ($this->discount_type == 1) {
            $price = $orders->sum('total_discount_price') - $this->discount_price;
        } elseif ($this->discount_type == 0) {
            $price = $this->dTotalPercent;
        }
        $bankPayment = BankPayment::create([
            'user_id' => auth()->user()->id,
            'order_number' => $payments[0]->order_number,
            'price' => $price,
            'status' => 0,
        ]);

        if ($this->dgift != null) {
            $gift = Gift::where('code', $this->gift->code)->first();
            if ($gift->value_price > $orders->sum('total_discount_price')) {
                $gift->update([
                    'value_price' => $gift->value_price - $orders->sum('total_discount_price'),
                ]);
            } elseif ($gift->value_price < $orders->sum('total_discount_price')) {
                $gift->update([
                    'value_price' => 0,
                ]);
            }
        }
        foreach ($orders as $order) {
            $order->update([
                'status' => 'wait',
            ]);
            $returnedPayment = ReturnOrder::create([
                'user_id' => auth()->user()->id,
                'order_number' => $order->order_number,
                'order_id' => $order->id,
            ]);
        }

        return $this->redirect(route('bank.payment', $payments[0]->order_number));
    }

    public function render()
    {
        $order2 = Order::where('user_id', auth()->user()->id)->get();
        $order_last = $order2->last();
        $order_number = $order2->last()->order_number;
        $orders = Order::where('order_number', $order_number)->get();
        $payments = \App\Models\Payment::where('order_number', $order_number)->get();
        $addresses = Address::where('user_id', auth()->user()->id)->get();

        return view('livewire.home.order.payment', compact('order_number', 'payments', 'orders', 'order_last', 'order_number'))
            ->layout('layouts.shipping');
    }
}
