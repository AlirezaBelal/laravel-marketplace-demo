@section('title','لیست علاقه مندی ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/dashboard/favorite">لیست علاقه مندی ها</a>
                <a class="tab__item " href="/admin/dashboard/observed">لیست اطلاع رسانی ها</a>
                <a class="tab__item " href="/admin/dashboard/favlist">لیست های عمومی</a>


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی در لیست علاقه مندی ها ...">
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
                            <th>عنوان محصول</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($favorites as $favorite)
                                <tr role="row">
                                    <td><a href="">{{$favorite->id}}</a></td>

                                    <td><a href="">{{$favorite->users->name}}</a></td>
                                    <td><a href="">{{$favorite->products->title ?? 'NONE'}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$favorite->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>


                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$favorites->render()}}
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
