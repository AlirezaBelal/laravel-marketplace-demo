@section('title','منتخب جدیدترین کالاها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/index/newselected">منتخب جدیدترین کالاها </a>
                <a class="tab__item " href="/admin/index/productselected">منتخب محصولات تخفیف و حراج </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی منتخب جدیدترین کالاها ...">
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
                            <th>وضعیت نمایش</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($products as $product)
                                <tr role="row">
                                    <td><a href="">{{$product->id}}</a></td>

                                    <td>
                                        {{$product->category->title}}
                                    </td>
                                    <td>
                                        {{$product->subCategory->title}}
                                    </td>
                                    @if($product->childCategory_id == null)
                                        <td>
                                            -
                                        </td>
                                    @else
                                        <td>
                                            {{$product->childCategory->title}}
                                        </td>
                                    @endif
                                    <td>
                                        {{$product->product->title}}
                                    </td>

                                    <td>
                                        @if($product->status == 1)
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
                                           class="item-delete mlg-15" title="حذف"></a>
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
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد منتخب جدیدترین کالاها</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <select wire:model.lazy="product.category_id" name="category_id" id="" class="form-control">
                            <option value="-1" >- دسته  -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="product.subCategory_id" name="subCategory_id" id="" class="form-control">
                            <option value="-1" >- زیردسته  -</option>
                            @foreach(\App\Models\SubCategory::where('parent',$this->product->category_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="product.childCategory_id" name="childCategory_id" id="" class="form-control">
                            <option value=" ">- دسته کودک  -</option>
                            @foreach(\App\Models\ChildCategory::where('parent',$this->product->subCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="product.product_id" name="product_id" id="" class="form-control">
                            <option value=" ">- محصول -</option>
                            @foreach(\App\Models\Product::where('childcategory_id',$this->product->childCategory_id)->get() as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="product.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در منتخب جدیدترین کالاها:</label>
                        </div>
                    </div>
                    <button class="btn btn-brand">افزودن محصول برای منتخب جدیدترین کالاها</button>
                </form>
            </div>
        </div>


    </div>

</div>
