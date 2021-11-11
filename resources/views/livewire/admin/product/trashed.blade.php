@section('title','سطل زباله محصولات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="{{route('product.index')}}">
                    محصولات
                </a>
                <a class="tab__item " href="{{route('color.index')}}">
                    رنگ های محصولات
                </a>
                <a class="tab__item " href="{{route('gallery.index')}}">
                    گالری تصاویر محصولات
                </a>
                |
                <a class="tab__item">جستجو: </a>
                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی محصول ...">
                    </form>
                </a>
                <a class="tab__item btn btn-danger"
                   href="{{route('product.trashed')}}" style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Product::onlyTrashed()->count()}})
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
                            <th>تصویر محصول</th>
                            <th>عنوان محصول</th>
                            <th>فروشنده محصول</th>
                            <th>دسته های محصول</th>
                            <th>برند محصول</th>
                            <th>قیمت محصول</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        @if($readyToLoad)
                            @php($count = 1)
                            <tbody>
                            @foreach($products as $product)
                                <tr role="row">
                                    <td>
                                        {{$count++}}
                                    </td>
                                    <td>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt="img" width="50px">
                                    </td>
                                    <td>
                                        {{$product->title}}
                                    </td>
                                    <td>
                                        @foreach(\App\Models\User::where('id',$product->vendor_id)->get() as $user)
                                            {{$user->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Category::where('id',$product->category_id)->get() as $cat)
                                            {{$cat->title}}
                                        @endforeach
                                        <br>
                                        -
                                        @foreach(\App\Models\SubCategory::where('id',$product->subcategory_id)->get() as $cat)
                                            {{$cat->title}}
                                        @endforeach

                                        <br>
                                        --
                                        @foreach(\App\Models\ChildCategory::where('id',$product->childcategory_id)->get() as $cat)
                                            {{$cat->title}}
                                        @endforeach

                                    </td>
                                    <td>
                                        {{$product->brand_id}}
                                    </td>
                                    <td>
                                        قیمت:
                                        {{number_format($product->price)}}
                                        تومان
                                        <br>
                                        با تخفیف
                                        {{number_format($product->discount_price)}}
                                        تومان
                                    </td>

                                    <td>
                                        <a wire:click="deleteCategory({{$product->id}})" type="submit"
                                           class="item-delete mlg-15"
                                           title="حذف">
                                        </a>
                                        <a wire:click="trashedProduct({{$product->id}})"
                                           class="item-li i-checkouts item-restore"
                                           title="بازگردانی">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$products->render()}}
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
