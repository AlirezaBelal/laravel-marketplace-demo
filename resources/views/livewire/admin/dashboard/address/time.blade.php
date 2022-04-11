<div>
    <div>
        @section('title','زمان های ارسال')
        <div>
            <div class="main-content" wire:init="loadCategory">
                <div class="tab__box">
                    <div class="tab__items">
                        <a class="tab__item " href="/admin/dashboard/address">آدرس ها
                        </a>
                        <a class="tab__item " href="/admin/dashboard/address/recip">آدرس های انبار
                        </a>
                        <a class="tab__item is-active" href="/admin/dashboard/address/time">زمان های ارسال
                        </a>

                        |
                        <a class="tab__item">جستجو: </a>

                        <a class="t-header-search">
                            <form action="" onclick="event.preventDefault();">
                                <input wire:model.debounce.1000="search"
                                       type="text" class="text" placeholder="جستجوی زمان ارسال ...">
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
                                    <th> روز ارسال</th>
                                    <th>تاریخ ارسال</th>
                                    <th>بازه زمان ارسال</th>
                                    <th>قیمت روز ارسال</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>

                                @if($readyToLoad)
                                    <tbody>
                                    @foreach($addressTimes as $addressTime)
                                        <tr role="row">
                                            <td><a href="">{{$addressTime->id}}</a></td>
                                            <td><a href="">{{$addressTime->day}}</a></td>
                                            <td><a href="">{{$addressTime->date}}</a></td>
                                            <td><a href="">{{$addressTime->time}}</a></td>
                                            <td><a href="">{{$addressTime->price}}</a></td>


                                            <td>
                                                <a wire:click="deleteCategory({{$addressTime->id}})" type="submit"
                                                   class="item-delete mlg-15" title="حذف"></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    {{$addressTimes->render()}}
                                @else



                                    <div class="alert-warning alert">
                                        در حال خواندن اطلاعات از دیتابیس ...
                                    </div>


                                @endif


                            </table>
                        </div>


                    </div>
                    <div class="col-4 bg-white">
                        <p class="box__title">ایجاد زمان ارسال جدید</p>
                        <form wire:submit.prevent="categoryForm"
                              enctype="multipart/form-data" role="form"
                              class="padding-10 categoryForm">

                            @include('errors.error')

                            <div class="form-group">
                                <input type="text" wire:model.lazy="addressTime.day"
                                       placeholder=" روز ارسال "
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model.lazy="addressTime.date"
                                       placeholder=" تاریخ ارسال "
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model.lazy="addressTime.time"
                                       placeholder=" بازه زمان ارسال "
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model.lazy="addressTime.price"
                                       placeholder=" هزینه ارسال پستی "
                                       class="form-control">
                            </div>

                            <div class="form-group">






                                <button class="btn btn-brand">افزودن زمان ارسال</button>
                        </form>
                    </div>
                </div>


            </div>

        </div>

    </div>

</div>
