<?php

namespace App\Http\Livewire\Admin\Order;

use App\Mail\OrderSubmit;
use App\Models\Notification;
use App\Models\Order;
use App\Models\SMS;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Kavenegar\KavenegarApi;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUpdate extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'order.status' => 'nullable',
    ];

    public function categoryForm()
    {

        $this->validate();

        $this->order->update($this->validate());

        if ($this->order->status == 'delivered') {
            $seller = User::where('id', $this->order->product_seller_id)->first();

            $type = 'سفارش شما تحویل داده شد';
            Notification::create([
                'user_id' => $this->order->user_id,
                'product_id' => $this->order->product_id,
                'type' => $type,
                'sms' => 1,
                'email' => 1,
                'system' => 1,
                'text' => $this->order->product->title,
            ]);
            //email to seller

            $email = \App\Models\Email::create([
                'user_id' => $seller->id,
                'user_email' => $seller->email,
                'user_mobile' => $seller->mobile,
                'title' => 'سفارش محصول شما تحویل داده شد',
                'text' => 'سفارش محصولی در سایت دیجی کالا تحویل داده شد',
                'code' => 'سفارش با موفقیت تحویل داده شد',
            ]);

            Mail::to($seller->email)->send(new OrderSubmit($email));
            //email to user
            $email = \App\Models\Email::create([
                'user_id' => $this->order->user_id,
                'user_email' => $this->order->user->email,
                'user_mobile' => $this->order->user->mobile,
                'title' => 'سفارش محصول شما تحویل داده شد',
                'text' => 'سفارش محصولی در سایت دیجی کالا تحویل داده شد',
                'code' => 'سفارش با موفقیت تحویل داده شد',
            ]);

            Mail::to($this->order->user->email)->send(new OrderSubmit($email));

            //sms user
            $code = random_int(10000, 99999);
            $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
            $client->send(env('SENDER_MOBILE'), env('To_MOBILE'),
                '  سفارش شما تحویل داده شد');

            SMS::create([
                'code' => $code,
                'type' => $type,
                'user_id' => $this->order->user_id,
            ]);

        } elseif ($this->order->status == 'paid') {
            $type = 'سفارش شما  پرداخت شد';
            Notification::create([
                'user_id' => $this->order->user_id,
                'product_id' => $this->order->product_id,
                'type' => $type,
                'sms' => 1,
                'email' => 1,
                'system' => 1,
                'text' => $this->order->product->title,
            ]);

        } elseif ($this->order->status == 'returned') {
            $type = 'سفارش شما  مرجوع شد';
            Notification::create([
                'user_id' => $this->order->user_id,
                'product_id' => $this->order->product_id,
                'type' => $type,
                'sms' => 1,
                'email' => 1,
                'system' => 1,
                'text' => $this->order->product->title,
            ]);
        } elseif ($this->order->status == 'cancel') {
            $type = 'سفارش شما  لغو شد';
            Notification::create([
                'user_id' => $this->order->user_id,
                'product_id' => $this->order->product_id,
                'type' => $type,
                'sms' => 1,
                'email' => 1,
                'system' => 1,
                'text' => $this->order->product->title,
            ]);
        }

        //        alert()->success('وضعیت سفارش با موفقیت ایجاد شد.', 'وضعیت سفارش آپدیت شد.');
        return redirect(route('admin.orders.index'));

    }

    public Order $order;

    public function render()
    {
        $order = $this->order;

        return view('livewire.admin.order.index-update', compact('order'));
    }
}
