@section('title','آپدیت مشخصات کالا')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مشخصات کالا -
            {{$attribute->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="attribute.title" placeholder="عنوان مشخصات کالا "
                               class="form-control">
                    </div>


                    <div class="form-group">
                        <select wire:model.lazy="attribute.childCategory" name="parent" id="" class="form-control">
                            <option value="-1">- انتخاب دسته نمایش کالا - </option>
                            @foreach(\App\Models\ChildCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="attribute.parent" name="parent" id="" class="form-control">
                            <option value="-1">- انتخاب زیر دسته مشخصات کالا - </option>
                            <option value="0">- سر دسته اصلی مشخصات کالا - </option>
                            @foreach(\App\Models\Attribute::where('parent',0)->get() as $attribute)
                                <option value="{{$attribute->id}}">-- {{$attribute->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="attribute.position" placeholder="موقعیت مشخصات کالا "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="attribute.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در مشخصات کالا:</label>
                        </div>
                    </div>

                    <button class="btn btn-brand">افزودن مشخصات کالا</button>
                </form>
            </div>
        </div>
    </div>
</div>
