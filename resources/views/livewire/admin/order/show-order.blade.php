@section('title','آپدیت سفارش')
<div>
    <div class="row">
        <div class="main-content padding-0">
            <p class="box__title">اطلاعات سفارش -
                {{$order->order_number}}</p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">شماره سفارش</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">وضعیت سفارش</th>
                    <th scope="col">نوع سفارش</th>
                    <th >پرداخت</th>
                    <th >شناسه پرداخت</th>
                    <th >تاریخ سفارش</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>
                        @if($order->status =='wait')
                            <span class="alert alert-warning">در انتظار پرداخت</span>
                        @elseif ($order->status =='delivered')
                            <span class="alert alert-success">تحویل داده شده</span>
                        @elseif ($order->status =='returned')
                            <span class="alert alert-danger">مرجوعی</span>
                        @elseif ($order->status =='paid')
                            <span class="alert alert-primary">پرداخت شده</span>
                        @elseif ($order->status =='progress')
                            <span class="alert alert-dark">در حال آماده سازی سفارش</span>
                        @elseif ($order->status =='sended')
                            <span class="alert alert-info">در حال ارسال سفارش</span>
                        @elseif ($order->status =='cancel')
                            <span class="alert alert-danger">لغو شده</span>
                        @endif
                    </td>
                    <td>
                        @if($order->type_order ==1)
                            <span class="alert alert-primary">سفارش سریع</span>
                        @else
                            سفارش عادی
                        @endif
                    </td>
                    <td >
                        @if($order->payment ==1)
                            <span class="alert alert-primary">پرداخت شده</span>
                        @else
                            پرداخت نشده
                        @endif
                    </td>
                    <td>{{$order->transaction_id}}</td>
                    <td>{{\App\Models\PersianNumber::translate(jdate($order->created_at)->format(' %d %B %Y'))}}</td>

                </tr>

                </tbody>
            </table>
            <p class="box__title">اطلاعات ارسال </p>
            <table class="table">
                <thead>
                <tr>
                    <th >نوع ارسال</th>
                    <th > استان</th>
                    <th > شهر</th>
                    <th > آدرس</th>
                    <th>ماه</th>
                    <th>روز</th>
                    <th>زمان</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">
                        @if($order->type_send ==1)
                            <span class="alert alert-primary">سفارش سریع</span>
                        @else
                            سفارش عادی
                        @endif
                    </th>

                    <td>
                        {{$order->address->state}}
                    </td>
                    <td>
                        {{$order->address->city}}
                    </td>
                    <td>
                        {{$order->address->address}}
                    </td>
                    <td>
                        {{$order->time_month}}
                    </td>
                    <td>
                        {{$order->time_day}}
                    </td>

                    <td>
                        {{$order->time_time}}
                    </td>

                </tr>

                </tbody>
            </table>
            <p class="box__title">اطلاعات محصولات
            </p>
            <table class="table table-bordered table-responsive ">
                <thead>
                <tr>
                    <th scope="col">آیدی محصول</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">قیمت تخفیف خورده</th>
                    <th scope="col">تعداد سفارش</th>
                    <th scope="col">فروشنده</th>
                    <th scope="col">رنگ محصول</th>
                    <th scope="col">گارانتی محصول</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$order->product->id}}</th>
                    <th >{{$order->product->title}}</th>
                    <th >{{$order->total_price}}</th>
                    <td>{{$order->total_discount_price}}</td>
                    <td>{{$order->count}}</td>
                    <td>{{$order->vendor->name}}</td>
                    <td>{{$order->color->name}}</td>
                    <td>{{$order->warranty->name}}</td>
                </tr>

                </tbody>
            </table>
        </div>



    </div>

    </div>
