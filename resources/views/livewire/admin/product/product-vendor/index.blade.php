@section('title','تنوع قیمت محصولات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/product">محصولات</a>
                <a class="tab__item is-active" href="/admin/productVendor"> تنوع قیمت محصول</a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی تنوع قیمت ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('productVendor.trashed')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\ProductSeller::onlyTrashed()->count()}})
                </a>
                <a class="tab__item btn btn-success"
                   href="{{route('productVendor.create')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">افزودن تنوع قیمت
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
                            <th>نام محصول</th>
                            <th>نام فروشنده</th>

                            <th>گارانتی</th>
                            <th>رنگ</th>
                            <th>قیمت</th>
                            <th>قیمت تخفیف خورده</th>
                            <th>زمان ارسال</th>
                            <th>وضعیت تنوع قیمت</th>
                            <th>موجود در انبار فروشنده</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($productSellers as $productSeller)
                                <tr role="row">
                                    <td><a href="">{{$productSeller->id}}</a></td>
                                    <td>
                                        @foreach(\App\Models\Product::where('id',$productSeller->product_id)->get() as $product)
                                            {{$product->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\User::where('id',$productSeller->vendor_id)->get() as $user)
                                            {{$user->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Warranty::where('id',$productSeller->warranty_id)->get() as $warranty)
                                            {{$warranty->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Color::where('id',$productSeller->color_id)->get() as $color)
                                            {{$color->name}}
                                        @endforeach
                                    </td>
                                    <td>{{$productSeller->price}}
                                    تومان</td>
                                    <td>{{$productSeller->discount_price}}
                                    تومان</td>
                                    <td>{{$productSeller->time}}
                                        روز کاری
                                    </td>
                                    <td>
                                        @if($productSeller->status == 1)
                                            <button wire:click="updateCategoryDisable({{$productSeller->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$productSeller->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($productSeller->anbar == 1)
                                            <button wire:click="updateAnbarDisable({{$productSeller->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">موجود
                                            </button>
                                        @else
                                            <button wire:click="updateAnbarEnable({{$productSeller->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                ناموجود
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$productSeller->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('productSeller.update',$productSeller)}}
                                            " class="item-edit " title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$productSellers->render()}}
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
