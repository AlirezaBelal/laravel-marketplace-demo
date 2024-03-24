@section('title','بررسی ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/comment">نظر
                    ها</a>

                <a class="tab__item is-active" href="/admin/review">بررسی ها
                    </a>
                {{--                @can('subcategory-show')--}}
                {{--                    <a class="tab__item {{Request::routeIs('subcategory.index') ? 'is-active': '' }}"--}}
                {{--                       href="/admin/subcategory">زیر بررسی ها</a>--}}
                {{--                @endcan--}}


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی بررسی ...">
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
                            <th>آیدی</th>
                            <th>کاربر</th>
                            <th>محصول</th>
                            <th> بررسی</th>
                            <th>اطلاعات</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($reviews as $review)
                                <tr role="row">
                                    <td><a href="">{{$review->id}}</a></td>

                                    <td><a href="">{{$review->user->name}}</a></td>
                                    <td><a href="">{{$review->product->title}}
                                            <br>

                                            @if ($review->parent == 0)
                                                -   نظر اصلی

                                            @else
                                                --مربوط به بررسی:

                                                {{$review->parent}}
                                            @endif
                                        </a>
                                        <br>

                                        @if($review->ok_buy == 0)
                                            <button wire:click="vip({{$review->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">تبدیل به بررسی ویژه
                                            </button>
                                        @else
                                            <button wire:click="dvip({{$review->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                تبدیل به بررسی ساده
                                            </button>
                                        @endif
                                    </td>
                                    <td><a href="">
                                            {{$review->review_title}}
                                            <br>
                                            {{$review->review}}</a></td>

                                    <td>
                                        @if($review->status == 1)
                                            <button wire:click="updateCategoryDisable({{$review->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$review->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                        <br>

                                        @if($review->liked != null)
                                            <button class="badge-danger badge"
                                                    style="background-color: blue">
                                                لایک:
                                                {{$review->liked}}
                                            </button>
                                        @endif
                                            <br>
                                        @if($review->dislike != null)
                                            <button class="badge-danger badge"
                                                    style="background-color: darkmagenta">
                                                لایک منفی:
                                                {{$review->dislike}}
                                            </button>
                                        @endif
                                        <br>

                                        @if($review->report ==1)
                                            <button class="badge-danger badge"
                                                    style="background-color: red">
                                                گزارش شده
                                            </button>
                                        @endif
                                    </td>
                                    <td>

                                        <a wire:click="deleteCategory({{$review->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>


                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$reviews->render()}}
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
