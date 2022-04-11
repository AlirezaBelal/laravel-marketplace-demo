@section('title','پیشنهاد شگفت انگیز ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item" href="/admin/category/electronic/slider">اسلایدر
                </a>
                    <a class="tab__item is-active"
                   href="/admin/category/electronic/amazing">پیشنهاد شگفت انگیز </a>
                    <a class="tab__item "
                       href="/admin/category/electronic/banner">بنر ها </a>
                <a class="tab__item "
                   href="/admin/category/electronic/title">عنوان ها </a>
                <a class="tab__item"
                   href="/admin/category/electronic/product">محصولات </a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی پیشنهاد شگفت انگیز ...">
                    </form>
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
                            <th>دسته اصلی</th>
                            <th>زیر دسته</th>
                            <th>دسته کودک</th>
                            <th>محصول</th>
                            <th>ویژگی اول</th>
                            <th>ویژگی دوم</th>
                            <th>وضعیت </th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($specialProducts as $specialProduct)
                                <tr role="row">
                                    <td><a href="">{{$specialProduct->id}}</a></td>

                                    <td>
                                        @foreach(\App\Models\Category::where('id',$specialProduct->category_id)->get() as $category)
                                        {{$category->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\SubCategory::where('id',$specialProduct->subCategory_id)->get() as $category)
                                            {{$category->title}}
                                        @endforeach

                                    </td>
                                    @if($specialProduct->childCategory_id == null)
                                        <td>
                                            -
                                        </td>
                                    @else
                                        <td>
                                            @foreach(\App\Models\ChildCategory::where('id',$specialProduct->childCategory_id)->get() as $category)
                                                {{$category->title}}
                                            @endforeach
                                        </td>
                                    @endif
                                    <td>
                                        @foreach(\App\Models\Product::where('id',$specialProduct->product_id)->get() as $product)
                                            {{$product->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\AttributeValue::where('id',$specialProduct->property1)->get() as $product)
                                            {{$product->value}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\AttributeValue::where('id',$specialProduct->property2)->get() as $product)
                                            {{$product->value}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($specialProduct->status == 1)
                                            <button wire:click="updateCategoryDisable({{$specialProduct->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$specialProduct->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$specialProduct->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$specialProducts->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد پیشنهاد شگفت انگیز جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')



                    <div class="form-group">
                        <select wire:model.lazy="category_id" name="category_id" id="" class="form-control">
                            <option value="-1" >- دسته  -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="subCategory_id" name="subCategory_id" id="" class="form-control">
                            <option value="-1" >- زیردسته  -</option>
                            @foreach(\App\Models\SubCategory::where('parent',$this->category_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="childCategory_id" name="childCategory_id" id="" class="form-control">
                            <option value=" ">- دسته کودک  -</option>
                            @foreach(\App\Models\ChildCategory::where('parent',$this->subCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="product_id" name="product_id" id="" class="form-control">
                            <option value=" ">- محصول -</option>
                            @foreach(\App\Models\Product::where('childcategory_id',$this->childCategory_id)->get() as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="property1" name="property1" id="" class="form-control">
                            <option value=" ">- ویژگی اول محصول -</option>
                            @foreach(\App\Models\AttributeValue::where('product_id',$this->product_id)->get() as $product)
                                <option value="{{$product->id}}">{{$product->value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="property2" name="property2" id="" class="form-control">
                            <option value=" ">- ویژگی دوم محصول -</option>
                            @foreach(\App\Models\AttributeValue::where('product_id',$this->product_id)->get() as $product)
                                <option value="{{$product->id}}">{{$product->value}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در پیشنهاد شگفت انگیز اصلی:</label>
                        </div>
                    </div>

                    <button class="btn btn-brand">افزودن به پیشنهاد شگفت انگیز</button>
                </form>
            </div>
        </div>


    </div>

</div>
