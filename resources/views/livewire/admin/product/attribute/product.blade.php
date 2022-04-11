@section('title','مقدار مشخصه کالا')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item "> مقدار مشخصه کالا -
                    {{$this->product->title}}
                </a>


                <a class="tab__item btn btn-danger"
                   href="{{route('attributeValue.trashed')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\AttributeValue::onlyTrashed()->count()}})
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
                            <th>مشخصه کالا</th>
                            <th>مقدار</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($attributes as $attribute)
                                <tr role="row">
                                    <td><a href="">{{$attribute->id}}</a></td>

                                    <td>
                                        @foreach(\App\Models\Attribute::where('id',$attribute->attribute_id)->get() as $att)

                                            {{$att->title}}

                                        @endforeach
                                    </td>
                                    <td><a href="">{{$attribute->value}}</a></td>
                                    <td>
                                        @if($attribute->status == 1)
                                            <button wire:click="updateCategoryDisable({{$attribute->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$attribute->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$attribute->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('attributeValue.update',$attribute)}}" class="item-edit "
                                           title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$attributes->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد مشخصات فنی کالا</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <select wire:model.lazy="attribute.attribute_id" name="attribute_id" id="" class="form-control">
                            <option value="-1">- انتخاب مشخصه کالا -</option>
                            @foreach(\App\Models\Attribute::where('parent','>', '0')
                                ->where('childCategory',$this->product->childcategory_id)->get() as $attribute)

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
