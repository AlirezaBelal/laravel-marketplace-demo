@section('title','نظر ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                    <a class="tab__item is-active" href="/admin/comment">نظر
                        ها</a>

                    <a class="tab__item" href="/admin/review">بررسی ها
                        </a>
{{--                @can('subcategory-show')--}}
{{--                    <a class="tab__item {{Request::routeIs('subcategory.index') ? 'is-active': '' }}"--}}
{{--                       href="/admin/subcategory">زیر نظر ها</a>--}}
{{--                @endcan--}}


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی نظر ...">
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
                            <th> نظر</th>
                            <th>اطلاعات</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($comments as $comment)
                                <tr role="row">
                                    <td><a href="">{{$comment->id}}</a></td>

                                    <td><a href="">{{$comment->user->name}}</a></td>
                                    <td><a href="">{{$comment->product->title}}
                                            <br>

                                            @if ($comment->parent == 0)
                                                -   نظر اصلی

                                            @else
                                                --مربوط به نظر:

                                                {{$comment->parent}}
                                            @endif
                                        </a></td>
                                    <td><a href="">{{$comment->comment}}</a></td>

                                    <td>
                                            @if($comment->status == 1)
                                                <button wire:click="updateCategoryDisable({{$comment->id}})"
                                                        type="submit" class="badge-success badge"
                                                        style="background-color: green">فعال
                                                </button>
                                            @else
                                                <button wire:click="updateCategoryEnable({{$comment->id}})"
                                                        type="submit" class="badge-danger badge"
                                                        style="background-color: red">
                                                    غیرفعال
                                                </button>
                                            @endif
                                                <br>

@if($comment->like != null)
                                                    <button class="badge-danger badge"
                                                            style="background-color: blue">
                                                        لایک:
                                                        {{$comment->like}}
                                                    </button>
    @endif
                                                <br>

@if($comment->report ==1)
                                                    <button class="badge-danger badge"
                                                            style="background-color: red">
                                                      گزارش شده
                                                    </button>
    @endif
                                    </td>
                                    <td>

                                            <a wire:click="deleteCategory({{$comment->id}})" type="submit"
                                               class="item-delete mlg-15" title="حذف"></a>


                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$comments->render()}}
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
