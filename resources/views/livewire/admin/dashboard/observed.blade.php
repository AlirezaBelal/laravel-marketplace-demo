@section('title','لیست اطلاع رسانی ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/dashboard/favorite">لیست های علاقه مندی ها</a>
                <a class="tab__item is-active" href="/admin/dashboard/observed">لیست اطلاع رسانی ها</a>
                <a class="tab__item " href="/admin/dashboard/favlist">لیست های عمومی</a>


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی در لیست اطلاع رسانی ها ...">
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
                            @foreach($observeds as $observed)
                                <tr role="row">
                                    <td><a href="">{{$observed->id}}</a></td>

                                    <td><a href="">{{$observed->users->name}}</a></td>
                                    <td><a href="">{{$observed->products->title ?? 'NONE'}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$observed->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>


                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$observeds->render()}}
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
