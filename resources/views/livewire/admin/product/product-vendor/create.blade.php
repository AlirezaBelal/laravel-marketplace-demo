@section('title','افزودن تنوع قیمت محصول')
<div>

    <div class="main-content">
        <div class="row" style="background-color: white">
            <p class="box__title">افزودن تنوع قیمت  جدید</p>
            <form wire:submit.prevent="categoryForm"
                  enctype="multipart/form-data" role="form"
                  class="padding-10 categoryForm">

                @include('errors.error')



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select wire:model.lazy="productSeller.product_id" name="product_id" id="" class="form-control">
                                <option value="-1">-محصول-</option>
                                @foreach(\App\Models\Product::all() as $product)
                                    <option value="{{$product->id}}">{{$product->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <select wire:model.lazy="productSeller.warranty_id" name="warranty_id" id="" class="form-control">
                                <option value="-1">-گارانتی-</option>
                                @foreach(\App\Models\Warranty::all() as $warranty)
                                    <option value="{{$warranty->id}}">{{$warranty->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-3">
                        <input type="text" wire:model.lazy="productSeller.product_count" placeholder="تعداد موجودی  "
                               class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" wire:model.lazy="productSeller.limit_order"
                               placeholder="تعداد سفارش (صفر نامحدود) "
                               class="form-control">
                    </div>
                    <div class="col-md-3 ">
                        <input type="text" wire:model.lazy="productSeller.price" placeholder="قیمت  محصول "
                               class="form-control">
                    </div>
                    <div class="col-md-3 ">
                        <input type="text" wire:model.lazy="productSeller.discount_price" placeholder="قیمت تخفیف خورده "
                               class="form-control">
                    </div>

                </div>





                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">
                        <input type="text" wire:model.lazy="productSeller.time" placeholder="زمان ارسال محصول به روز "
                               class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="notificationGroup">
                                <input id="option10" type="checkbox" wire:model.lazy="productSeller.status" name="status"
                                       class="form-control">
                                <label for="option10">وضعیت محصول:</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="notificationGroup">
                                <input id="option101" type="checkbox" wire:model.lazy="productSeller.anbar" name="anbar"
                                       class="form-control">
                                <label for="option101">موجود در انبار فروشنده:</label>
                            </div>
                        </div>
                    </div>
                </div>



                <button class="btn btn-brand">افزودن تنوع محصول</button>
            </form>
        </div>
    </div>

</div>
