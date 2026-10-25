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
                    $orders = Order::where('user_id', auth()->id())->where('order_number', $order_number)->get();
                    $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
                    foreach ($payments as $payment) {
                        $payment->update([
                            'discount_code' => $code_discount->code,
                            'discount_price' => $code_discount->price,
                        ]);
                    }
                    $this->dispatch('toast', type: 'success', message: ' کد تخفیف وارد شده اعمال شد.');
                } elseif ($code_discount->type == 0) {
                    $this->discount_price = $code_discount->percent;
                    $this->discount_type = 0;
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('user_id', auth()->id())->where('order_number', $order_number)->get();
                    $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
                    foreach ($payments as $payment) {
                        $payment->update([
                            'discount_code' => $code_discount->code,
                            'discount_price' => $code_discount->percent,
                        ]);
                    }
                    $dPercent = ($orders->sum('total_discount_price') * $this->discount_price) / 100;

                    $this->dTotalPercent = $orders->sum('total_discount_price') - $dPercent;
                    $this->dispatch('toast', type: 'success', message: ' کد تخفیف وارد شده اعمال شد.');
                } else {
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('user_id', auth()->id())->where('order_number', $order_number)->get();
                    $this->sumPrice = $orders->sum('total_discount_price');

                }
            } else {
                $this->dispatch('toast', type: 'error', message: ' کد تخفیف وارد شده وجود ندارد.');

            }
        }
        if ($this->gift != null) {
            $gift_code = Gift::where('code', $this->gift->code)->first();
            if ($gift_code) {
                if ($gift_code->type == 0) {
                    $order2 = Order::where('user_id', auth()->user()->id)->get();
                    $order_last = $order2->last();
                    $order_number = $order2->last()->order_number;
                    $orders = Order::where('user_id', auth()->id())->where('order_number', $order_number)->get();
                    $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
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
                        $this->dispatch('toast', type: 'error', message: ' کد هدیه شما وجود ندارد.');
                    }

                } elseif ($gift_code->type == 1) {
                    $this->dispatch('toast', type: 'error', message: ' کد هدیه شما استفاده شده است.');
                }
            } else {
                $this->dispatch('toast', type: 'error', message: ' کد هدیه شما پیدا نشد.');

            }
        }
    }

    public function paymentTypeInternet($order_number)
    {
        $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
        foreach ($payments as $payment) {
            $payment->update([
                'type_payment' => 1,
            ]);
        }
    }

    public function paymentTypeManual($order_number)
    {
        $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
        foreach ($payments as $payment) {
            $payment->update([
                'type_payment' => 0,
            ]);
        }
    }

    public function continuePayment($order_number)
    {
        $orders = Order::where('user_id', auth()->id())->where('order_number', $order_number)->get();
        $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
        abort_if($orders->isEmpty() || $payments->isEmpty(), 404);
        [$price, $gift, $giftApplied] = $this->payableAmount($orders, $payments);

        $bankPayment = BankPayment::create([
            'user_id' => auth()->user()->id,
            'order_number' => $payments[0]->order_number,
            'price' => $price,
            'status' => 0,
            'gift_code' => $giftApplied > 0 ? $gift->code : null,
            'gift_applied' => $giftApplied,
        ]);

        // The gift is reserved as a snapshot, not deducted until the gateway verifies.
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
        $orders = Order::where('user_id', auth()->id())->where('order_number', $order_number)->get();
        $payments = \App\Models\Payment::where('user_id', auth()->id())->where('order_number', $order_number)->get();
        $addresses = Address::where('user_id', auth()->user()->id)->get();
        [$amountDue] = $this->payableAmount($orders, $payments);

        return view('livewire.home.order.payment', compact('order_number', 'payments', 'orders', 'order_last', 'amountDue'))
            ->layout('layouts.shipping');
    }

    private function payableAmount($orders, $payments): array
    {
        // Livewire public properties are client-controlled. Recalculate the
        // amount from persisted order, delivery and voucher records instead.
        $subtotal = max(0, (int) $orders->sum('total_discount_price'));
        $shipping = max(0, (int) $payments->first()->shipping_price);
        $discountAmount = 0;
        if ($payments->first()->discount_code) {
            $discount = Discount::where('code', $payments->first()->discount_code)->first();
            if ($discount) {
                if ((int) $discount->type === 1) {
                    $discountAmount = max(0, (int) $discount->price);
                } elseif ((int) $discount->type === 0) {
                    $percent = min(100, max(0, (int) $discount->percent));
                    $discountAmount = intdiv($subtotal * $percent, 100);
                }
            }
        }
        $afterDiscount = max(0, $subtotal - $discountAmount);
        $gift = $payments->first()->gift_code
            ? Gift::where('code', $payments->first()->gift_code)->where('type', 0)->first()
            : null;
        $giftApplied = $gift ? min($afterDiscount, max(0, (int) $gift->value_price)) : 0;

        return [$afterDiscount - $giftApplied + $shipping, $gift, $giftApplied];
    }
}
