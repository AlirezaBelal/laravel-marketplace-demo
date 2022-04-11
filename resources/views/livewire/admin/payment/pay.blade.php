@section('title','اطلاعات پرداختی بانکی')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/payment">پرداخت ها</a>
                <a class="tab__item is-active" href="/admin/payment/pay">اطلاعات پرداختی بانکی</a>


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
                            <th>کاربر</th>
                            <th>شماره سفارش</th>
                            <th>مبلغ پرداختی</th>
                            <th>تاریخ پرداخت</th>
                            <th>وضعیت پرداخت</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($payments as $payment)
                                <tr role="row">
                                    <td><a href="">{{$payment->id}}</a></td>
                                    <td><a href="">{{$payment->user->name ?? ''}}</a></td>
                                    <td><a href="">{{$payment->order_number}}</a></td>
                                    <td><a href="">{{$payment->price}}</a></td>
                                    <td>
                                        {{\App\Models\PersianNumber::translate(jdate($payment->created_at)->format(' %d %B %Y'))}}</td>



                                    <td>
                                        @if($payment->status == 1)

                                            <span class="alert alert-success">پرداخت شده</span>
                                        @else
                                            در انتظار پرداخت
                                        @endif
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
