@section('title','کدهای تخفیف')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/discount">کدهای تخفیف
                </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی کد تخفیف ...">
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
                            <th>کد تخفیف</th>
                            <th>نوع کد تخفیف</th>
                            <th>مبلغ تخفیف</th>
                            <th>مربوط به محصول</th>
                            <th>مربوط به دسته</th>
                            <th>مربوط به فروشنده</th>
                            <th>تاریخ انقضا</th>
                            <th>تاریخ ایجاد</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($discounts as $discount)
                                <tr role="row">
                                    <td><a href="">{{$discount->id}}</a></td>
                                    <td><a href="">{{$discount->code}}</a></td>
                                    <td><a href="">@if ($discount->price == null)
                                                <span class="alert alert-success">درصد  </span>
                                            @else
                                                <span class="alert alert-danger">مقدار ثابت  </span>

                                            @endif</a></td>
                                    <td><a href="">{{$discount->price ?? $discount->percent}}</a></td>
                                    <td><a href="">{{$discount->product_id ?? ''}}</a></td>
                                    <td><a href="">{{$discount->category_id ?? ''}}</a></td>
                                    <td><a href="">{{$discount->vendor_id ?? ''}}</a></td>


                                    <td>
                                        {{\App\Models\PersianNumber::translate(jdate($discount->date_expire)->format('%Y/%m/%d'))}}
                                    </td>
                                    <td>
                                        {{\App\Models\PersianNumber::translate(jdate($discount->created_at)->format('%Y/%m/%d'))}}
                                    </td>
                                    <td>
                                            @if ($discount->status == 1)
                                            <a  wire:click="disableStatus({{$discount->id}})"><span class="alert alert-success" >فعال  </span>
                                            </a>
                                            @else
                                                    <a  wire:click="enableStatus({{$discount->id}})">   <span class="alert alert-danger" >غیرفعال  </span>
                                                    </a>
                                            @endif</td>

                                    <td>
                                        <a wire:click="deleteGift({{$discount->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$discounts->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد کد تخفیف جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="discount.price" placeholder="مبلغ کارت تخفیف(می تواند خالی باشد)  "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="discount.percent" placeholder="درصد تخفیف(می تواند خالی باشد)  "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="discount.product_id" name="parent" id="" class="form-control">
                            <option value="-1">- محصول تخفیفی -</option>
                            @foreach(\App\Models\Product::all() as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select wire:model.lazy="discount.category_id" name="parent" id="" class="form-control">
                            <option value="-1">- دسته تخفیف -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select wire:model.lazy="discount.vendor_id" name="parent" id="" class="form-control">
                            <option value="-1">- فروشنده تخفیفی -</option>
                            @foreach(\App\Models\Seller::all() as $seller)
                                <option value="{{$seller->id}}">{{$seller->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="date" wire:model.lazy="discount.date_expire" placeholder="تاریخ انقضا "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="discount.status" name="status"
                                   class="form-control">
                            <label for="option4">کد تخفیف فعال باشد:</label>
                        </div>
                    </div>


                    <button class="btn btn-brand">افزودن کد تخفیف</button>
                </form>
            </div>
        </div>


    </div>

</div>
