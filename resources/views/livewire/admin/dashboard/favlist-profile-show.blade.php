@section('title','لیست های عمومی ')
<div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active">
                    لیست های عمومی
                    -
                    {{$fav->title ?? ''}}
                </a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی در لیست های عمومی  ...">
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
                            <th>ردیف</th>
                            <th>محصول</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($count = 1)
                        @foreach(DB::table('favlist_product')->where('favlist_id',$fave_id)->
                              get() as $favlist)
                            <tr role="row">
                                <td>
                                    {{$count++}}
                                </td>
                                <td>
                                    @foreach(\App\Models\Product::where('id',$favlist->product_id)->get() as $product)
                                        {{$product->title}}
                                    @endforeach
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        {{--                            {{$favlists->render()}}--}}
                        {{--                        @else--}}
                        {{--                            <div class="alert-warning alert">--}}
                        {{--                                در حال خواندن اطلاعات از دیتابیس ...--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
