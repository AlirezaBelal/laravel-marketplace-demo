@section('title','آپدیت مقدار مشخصه کالا')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مقدار مشخصه کالا -
            {{$attribute->value}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')



                    <div class="form-group">
                        <select wire:model.lazy="attribute.product_id" name="product_id" id="" class="form-control">
                            <option value="-1">- انتخاب محصول - </option>
                            @foreach(\App\Models\Product::all() as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="attribute.attribute_id" name="attribute_id" id="" class="form-control">
                            <option value="-1">- انتخاب مشخصه کالا - </option>
                            @foreach($att as $attribute)
                                <option value="{{$attribute->id}}">-- {{$attribute->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="attribute.value" placeholder=" مقدار مشخصه کالا "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="attribute.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در مقدار مشخصات کالا:</label>
                        </div>
                    </div>

                    <button class="btn btn-brand">افزودن مقدار مشخصه کالا</button>
                </form>
            </div>
        </div>
    </div>
</div>
