@section('title','گارارنتی ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/warranty">گارانتی محصولات</a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی گارارنتی ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('warranty.trashed')}}
                       " style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Warranty::onlyTrashed()->count()}})
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
                            <th>نام گارارنتی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($warranties as $warranty)
                                <tr role="row">
                                    <td><a href="">{{$warranty->id}}</a></td>
                                    <td><a href="">{{$warranty->name}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$warranty->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a wire:click="trashedCategory({{$warranty->id}})"
                                           class="item-li i-checkouts item-restore"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$warranties->render()}}
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
