@section('title','پیشنهاد شگفت انگیز ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active"
                   href="/admin/menu">پیشنهاد شگفت انگیز </a>

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
                            <th>نوع</th>
                            <th>وضعیت پیشنهاد شگفت انگیز</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($specialProducts as $specialProduct)
                                <tr role="row">
                                    <td><a href="">{{$specialProduct->id}}</a></td>

                                    <td>
                                        {{$specialProduct->category->title}}
                                    </td>
                                    <td>
                                        {{$specialProduct->subCategory->title}}
                                    </td>
                                    @if($specialProduct->childCategory_id == null)
                                        <td>
                                            -
                                        </td>
                                    @else
                                        <td>
                                            {{$specialProduct->childCategory->title}}
                                        </td>
                                    @endif
                                    <td>
                                        {{$specialProduct->product->title}}
                                    </td>
                                    <td>
                                        @if($specialProduct->natural == 1)
                                        اصلی
                                        @elseif($specialProduct->supermarket == 1)
                                         سوپرمارکت
                                        @endif
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
                        <select wire:model.lazy="specialProduct.category_id" name="category_id" id="" class="form-control">
                            <option value="-1" >- دسته  -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="specialProduct.subCategory_id" name="subCategory_id" id="" class="form-control">
                            <option value="-1" >- زیردسته  -</option>
                            @foreach(\App\Models\SubCategory::where('parent',$this->specialProduct->category_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="specialProduct.childCategory_id" name="childCategory_id" id="" class="form-control">
                            <option value=" ">- دسته کودک  -</option>
                            @foreach(\App\Models\ChildCategory::where('parent',$this->specialProduct->subCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="specialProduct.product_id" name="product_id" id="" class="form-control">
                            <option value=" ">- محصول -</option>
                            @foreach(\App\Models\Product::where('childcategory_id',$this->specialProduct->childCategory_id)->get() as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="specialProduct.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در پیشنهاد شگفت انگیز اصلی:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option7" type="checkbox" wire:model.lazy="specialProduct.natural" name="natural"
                                   class="form-control">
                            <label for="option7">نمایش در شگفت انگیز اصلی:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option8" type="checkbox" wire:model.lazy="specialProduct.supermarket" name="supermarket"
                                   class="form-control">
                            <label for="option8">نمایش در شگفت انگیز سوپرمارکتی:</label>
                        </div>
                    </div>
                    <button class="btn btn-brand">افزودن دسته</button>
                </form>
            </div>
        </div>


    </div>

</div>
