@section('title','جزئیات پرداخت')
<div>
    <div class="row">
        <div class="main-content padding-0">

            <p class="box__title">اطلاعات پرداخت
            </p>
            <table class="table table-bordered table-responsive ">
                <thead>
                <tr>
                    <th>آیدی پرداخت</th>
                    <th>شناسه پرداخت</th>
                    <th>سامانه پرداخت</th>
                    <th>کاربر</th>
                    <th>آیدی سفارش</th>
                    <th>مبلغ پرداختی</th>
                    <th>نوع پرداخت</th>
                    <th>تاریخ پرداخت</th>
                    <th>وضعیت پرداخت</th>
                </tr>
                </thead>
                <tbody>
                <tr>
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
                </tr>

                </tbody>
            </table>
            <p class="box__title">اطلاعات اضافی پرداخت
            </p>
            <table class="table table-bordered table-responsive ">
                <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th>هزینه حمل و نقل</th>

                    <th>کد تخفیف استفاده شده</th>
                    <th>میزان تخفیف کد تخفیف</th>
                    <th>کد هدیه استفاده شده</th>
                    <th>میزان تخفیف کد هدیه</th>
                    <th>آخرین تاریخ پرداخت</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="">{{$payment->order_number}}</a></td>
                    <td><a href="">{{$payment->shipping_price}}</a></td>
                    <td><a href="">{{$payment->discount_code ?? ''}}</a></td>
                    <td><a href="">{{$payment->discount_price ?? ''}}</a></td>
                    <td><a href="">{{$payment->gift_code ?? ''}}</a></td>
                    <td><a href="">{{$payment->gift_code_price	 ?? ''}}</a></td>
                    <td>
                        {{\App\Models\PersianNumber::translate(jdate($payment->updated_at)->format(' %d %B %Y'))}}</td>

                    {{--                    <td>--}}
                    {{--                        @if($payment->type_payment ==1)--}}
                    {{--                            <span class="alert alert-success">پرداخت شده</span>--}}
                    {{--                        @else--}}
                    {{--                            <span class="alert alert-danger">پرداخت درب منزل</span>--}}

                    {{--                        @endif--}}
                    {{--                    </td>--}}

                </tr>

                </tbody>
            </table>
            <p class="box__title">اطلاعات ارسال
            </p>
            <table class="table table-bordered table-responsive ">
                <thead>
                <tr>
                    <th>روز</th>
                    <th>تاریخ</th>

                    <th>ساعت</th>
                    <th>هزینه حمل و نقل</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="">{{$payment->times->day ?? ''}}</a></td>
                    <td><a href="">{{$payment->times->date ?? ''}}</a></td>
                    <td><a href="">{{$payment->times->time ?? ''}}</a></td>
                    <td><a href="">{{$payment->times->price ?? ''}}</a></td>
                </tr>

                </tbody>
            </table>
        </div>


    </div>

</div>
