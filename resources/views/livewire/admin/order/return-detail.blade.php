@section('title','مرجوعی سفارشات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/orders/returnreson">دلایل مرجوعی </a>
                <a class="tab__item is-active" href="/admin/orders/returndetail">جزئیات مرجوعی ها</a>
                <a class="tab__item" href="/admin/orders/returndetail/accept"> مرجوعی های تایید شده</a>


                |
                                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی سفارش ...">
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
                            <th>آیدی </th>
                            <th>آیدی سفارش</th>
                            <th>شماره سفارش</th>
                            <th>کاربر سفارش دهنده</th>
                            <th>تعداد</th>
                            <th>دلیل مرجوعی</th>
                            <th>جزئیات</th>
                            <th>تصاویر</th>
                            <th>وضعیت</th>
                            <th>تایید مرجوعی</th>
                            <th>تاریخ ثبت مرجوعی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                        <tbody>
                        @foreach($returnOrders as $returnOrder)
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
                                <td> <img src="/storage/{{$returnOrder->img}}" alt="img" width="100px"></td>

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

                                <td>


                                    <a href="{{route('admin.orders.showReturn',$returnOrder)}}" style="margin-left: 10px;"
                                       class=" "
                                       title="نمایش مرجوعی">
                                        <img width: 20px; src="{{asset('icons/icons/sun.svg')}}"
                                             alt="images">
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        {{$returnOrders->render()}}

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
