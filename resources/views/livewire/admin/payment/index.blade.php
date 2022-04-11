@section('title','پرداخت ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/payment">پرداخت ها</a>
                <a class="tab__item " href="/admin/payment/pay">اطلاعات پرداختی بانکی</a>


                |
                                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی پرداخت ...">
                    </form>
                </a>

            </div>
        </div>
        <div class="row">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی پرداخت</th>
                            <th>شناسه پرداخت</th>
                            <th>سامانه پرداخت</th>
                            <th>کاربر</th>
                            <th>آیدی سفارش</th>
                            <th>مبلغ پرداختی</th>
                            <th>نوع پرداخت</th>
                            <th>تاریخ پرداخت</th>
                            <th>وضعیت پرداخت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($payments as $payment)
                                <tr role="row">
                                    <td><a href="">{{$payment->id}}</a></td>
                                    <td><a href="">{{$payment->transactionId}}</a></td>
                                    <td><a href="">{{$payment->driver}}</a></td>
                                    <td><a href="">{{$payment->user->name ?? ''}}</a></td>
                                    <td><a href="">{{$payment->order_id}}</a></td>
                                    <td><a href="">{{$payment->total_price}}</a></td>
                                    <td>
                                        @if($payment->type_payment ==1)
                                            <span class="alert alert-success">پرداخت شده</span>
                                        @else
                                            <span class="alert alert-danger">پرداخت درب منزل</span>

                                        @endif
                                    </td>
                                    <td>
                                        {{\App\Models\PersianNumber::translate(jdate($payment->created_at)->format(' %d %B %Y'))}}</td>



                                    <td>
                                        @if($payment->status == 1)

                                            <span class="alert alert-success">پرداخت اینترنتی</span>
                                        @else
                                            در انتظار پرداخت
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.payment.show',$payment)}}" style="margin-left: 10px;"
                                           class=" "
                                           title="جزئیات پرداخت">
                                            <img width: 20px; src="{{asset('icons/icons/sun.svg')}}"
                                                 alt="images">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$payments->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
        </div>


    </div>

</div>
