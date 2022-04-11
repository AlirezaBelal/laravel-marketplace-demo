@section('title','نمایش اطلاعات مرجوعی')
<div>
    <div class="row">
        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>آیدی </th>
                    <th>آیدی سفارش</th>
                    <th>شماره سفارش</th>
                    <th>کاربر سفارش دهنده</th>
                    <th>تعداد</th>
                    <th>دلیل مرجوعی</th>
                    <th>جزئیات</th>
                    <th>وضعیت</th>
                    <th>تایید مرجوعی</th>
                    <th>تاریخ ثبت مرجوعی</th>
                </tr>
                </thead>

                    <tbody>

                        <tr role="row">
                            <td><a href="">{{$returnOrder->id}}</a></td>
                            <td><a href="">{{$returnOrder->order->id}}</a></td>
                            <td><a href="">{{$returnOrder->order->order_number}}</a></td>
                            <td><a href="">{{$returnOrder->user->name}}</a></td>
                            <td><a href="">{{$returnOrder->count}}</a></td>
                            <td>
                                {{$returnOrder->reason->reason ?? ''}}
                            </td>
                            <td><a href="">{{$returnOrder->detail}}</a></td>

                            <td>
                                @if($returnOrder->status ==1)
                                    <span class="alert alert-success">تکمیل شده</span>
                                @elseif ($returnOrder->status ==0)

                                    در حال بررسی
                                @endif
                            </td>
                            <td>
                                @if($returnOrder->status ==1)
                                    تایید شده
                                @elseif ($returnOrder->status ==0)

                                    <button wire:click="confirmReturnOrder({{$returnOrder->id}})" class="alert alert-success"> تایید</button>
                                @endif
                            </td>
                            <td>{{\App\Models\PersianNumber::translate(jdate($returnOrder->updated_at)->format(' %d %B %Y'))}}</td>

                        </tr>



            </table>
        </div>



    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <img src="/storage/{{$returnOrder->img}}" alt="img" width="400px">
        </div>
        <div class="col-md-3"></div>
    </div>

</div>
