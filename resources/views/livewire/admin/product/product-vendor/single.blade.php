@section('title','تنوع قیمت محصول')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item "> تنوع قیمت محصول -
                    {{$this->product->title}}
                </a>


                <a class="tab__item btn btn-danger"
                   href="{{route('productVendor.trashed')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\ProductSeller::onlyTrashed()->count()}})
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی</th>
                            <th>نام فروشنده</th>
                            <th>گارانتی</th>
                            <th>رنگ</th>
                            <th>قیمت</th>
                            <th>قیمت تخفیف خورده</th>
                            <th>زمان ارسال</th>
                            <th>وضعیت تنوع قیمت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($productSellers as $productSeller)
                                <tr role="row">
                                    <td><a href="">{{$productSeller->id}}</a></td>

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
            <div class="col-4 bg-white">
                <p class="box__title">افزودن تنوع قیمت  جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')



                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select wire:model.lazy="productSeller.vendor_id" name="vendor_id" id=""
                                        class="form-control">
                                    <option value="-1">-فروشنده-</option>
                                    @foreach(\App\Models\User::all() as $user)
                                        <option value="{{$user->id}}">{{$user->name}} - {{$user->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select wire:model.lazy="productSeller.warranty_id" name="warranty_id" id="" class="form-control">
                                    <option value="-1">-گارانتی-</option>
                                    @foreach(\App\Models\Warranty::all() as $warranty)
                                        <option value="{{$warranty->id}}">{{$warranty->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select wire:model.lazy="productSeller.color_id" name="color_id" id=""
                                        class="form-control">
                                    <option value="-1">-رنگ-</option>
                                    @foreach(\App\Models\Color::all() as $color)
                                        <option value="{{$color->id}}" style="background-color: {{$color->value}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <input type="text" wire:model.lazy="productSeller.product_count" placeholder="تعداد موجودی  "
                                   class="form-control">
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <input type="text" wire:model.lazy="productSeller.limit_order"
                                   placeholder="تعداد سفارش (صفر نامحدود) "
                                   class="form-control">
                        </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                            <input type="text" wire:model.lazy="productSeller.price" placeholder="قیمت  محصول "
                                   class="form-control">
                        </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                            <input type="text" wire:model.lazy="productSeller.discount_price" placeholder="قیمت تخفیف خورده "
                                   class="form-control">
                        </div>
                        </div>

                    </div>





                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <input type="text" wire:model.lazy="productSeller.time" placeholder="زمان ارسال محصول به روز "
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option10" type="checkbox" wire:model.lazy="productSeller.status" name="status"
                                           class="form-control">
                                    <label for="option10">وضعیت محصول:</label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <button class="btn btn-brand">افزودن تنوع محصول</button>
                </form>
            </div>
        </div>


    </div>

</div>
