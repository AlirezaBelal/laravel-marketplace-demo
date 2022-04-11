@section('title','کدهای هدیه')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/gift">کارت های هدیه
                </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی کارت هدیه ...">
                    </form>
                </a>

            </div>
        </div>
        <div class="row">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی</th>
                            <th>کد کارت هدیه</th>
                            <th>کاربر استفاده کننده</th>
                            <th>نوع کارت هدیه</th>
                            <th>مبلغ کارت هدیه</th>
                            <th>مانده اعتبار</th>
                            <th>تاریخ انقضا</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($gifts as $gift)
                                <tr role="row">
                                    <td><a href="">{{$gift->id}}</a></td>
                                    <td><a href="">{{$gift->code}}</a></td>
                                    <td><a href="">{{$gift->user->name ?? ''}}</a></td>
                                    <td><a href="">@if ($gift->type ==1)
                                                <span class="alert alert-success">استفاده شده  </span>
                                            @else
                                                <span class="alert alert-danger">استفاده نشده  </span>

                                            @endif</a></td>
                                    <td><a href="">{{\App\Models\PersianNumber::translate($gift->price)}}</a>
                                        تومان
                                    </td>
                                    <td><a href="">{{\App\Models\PersianNumber::translate($gift->value_price)}}</a>
                                        تومان
                                    </td>

                                    <td>
                                        {{\App\Models\PersianNumber::translate(jdate($gift->date_expire)->format('%Y/%m/%d'))}}
                                    </td>
                                    <td>
                                        {{\App\Models\PersianNumber::translate(jdate($gift->created_at)->format('%Y/%m/%d'))}}
                                    </td>


                                    <td>
                                        <a wire:click="deleteGift({{$gift->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$gifts->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد کد هدیه جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="gift.price" placeholder="مبلغ کارت هدیه  "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="date" wire:model.lazy="gift.date_expire" placeholder="تاریخ انقضا "
                               class="form-control">
                    </div>


                    <button class="btn btn-brand">افزودن کد هدیه</button>
                </form>
            </div>
        </div>


    </div>

</div>
