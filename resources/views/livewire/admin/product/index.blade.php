@section('title','محصولات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('product.index')}}">
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
                   href="{{route('product.trashed')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Product::onlyTrashed()->count()}})
                </a>
                <a class="tab__item btn btn-success"
                   href="{{route('product.create')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">افزودن محصول
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
                            <th>مشخصات کالا</th>
                            <th>گالری تصاویر محصول</th>
                            <th>تنوع قیمت محصول</th>
                            <th>وضعیت محصول</th>
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
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt="img"
                                             width="50px">
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
                                        <br>
                                        @if (\App\Models\CategoryLevel4::where('id',$product->categorylevel4_id)->first())
                                            --
                                            @foreach(\App\Models\CategoryLevel4::where('id',$product->categorylevel4_id)->get() as $cat)
                                                {{$cat->title}}
                                            @endforeach
                                            <br>
                                        @endif

                                        برند:
                                        @foreach(\App\Models\Brand::where('id',$product->brand_id)->get() as $brand)
                                            {{$brand->name}}
                                        @endforeach

                                    </td>
                                    <td>
                                        <a href="{{route('product.attribute',$product)}}" style="margin-left: 10px;"
                                           class=" "
                                           title="مشخصات فنی">
                                            <img width: 20px; src="{{asset('icons/icons/list-check.svg')}}"
                                                 alt="images">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.gallery_image',$product)}}" style="margin-left: 10px;"
                                           class=" "
                                           title="گالری تصاویر">
                                            <img width: 20px; src="{{asset('icons/icons/images.svg')}}" alt="images">
                                        </a>

                                    </td>
                                    <td>
                                        <a href="{{route('product.productVendor',$product)}}" style="margin-left: 6px"
                                           class=""
                                           title="تنوع قیمت">
                                            <img width: 20px; src="{{asset('icons/icons/grid.svg')}}" alt="grid">
                                        </a>
                                    </td>

                                    <td>
                                        @if($product->status_product == 1)
                                            <button wire:click="updateCategoryDisable({{$product->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$product->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$product->id}})" type="submit"
                                           class="item-delete mlg-15"
                                           title="حذف">
                                        </a>
                                        <a href="{{route('product.update',$product)}}" class="item-edit mlg-15"
                                           title="ویرایش">
                                        </a>
                                        <br>
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
