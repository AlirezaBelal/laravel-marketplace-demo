@section('title','رنگ ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/product">محصولات</a>
                <a class="tab__item " href="/admin/color"> رنگ های محصولات</a>
                <a class="tab__item " href="/admin/gallery"> گالری تصاویر محصولات</a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی رنگ ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('color.trashed')}}
                       " style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Color::onlyTrashed()->count()}})
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
                            <th>نام رنگ</th>
                            <th>کد رنگ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($colors as $color)
                                <tr role="row">
                                    <td><a href="">{{$color->id}}</a></td>
                                    <td><a href="">{{$color->name}}</a></td>
                                    <td><a href="" style="background-color: {{$color->value}}">{{$color->value}}</a></td>


                                    <td>
                                        <a wire:click="deleteCategory({{$color->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a wire:click="trashedCategory({{$color->id}})"
                                           class="item-li i-checkouts item-restore"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$colors->render()}}
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
