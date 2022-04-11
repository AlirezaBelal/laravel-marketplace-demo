@section('title','دسته های زیر دسته ها ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/category-level">دسته های زیر دسته ها
                </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی دسته های زیر دسته ها ...">
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
                            <th>دسته سطح 4</th>
                            <th>نوع دسته</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($categorylevels as $specialProduct)
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


                                    @if($specialProduct->categorylevel4_id == null)
                                        <td>
                                            -
                                        </td>
                                    @else
                                        <td>
                                            @foreach(\App\Models\CategoryLevel4::where('id',$specialProduct->categorylevel4_id)->get() as $category)
                                                {{$category->title}}
                                            @endforeach
                                        </td>
                                    @endif

                                    <td>
                                       @if ($specialProduct->property == 1)
                                        <span class="alert alert-danger">   دسته سطح دوم</span>
                                        @else
                                            <span class="alert alert-success">   دسته سطح سوم</span>
                                       @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$specialProduct->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$categorylevels->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته های زیر دسته ها جدید</p>
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
                            <option value=" ">- دسته کودک -</option>
                            @foreach(\App\Models\ChildCategory::where('parent',$this->subCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="categorylevel4_id" name="categorylevel4_id" id="" class="form-control">
                            <option value=" ">- دسته سطح 4 (اگر سطح دوم بود خالی باشد) -</option>
                            @foreach(\App\Models\CategoryLevel4::where('parent',$this->childCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="property" name="property" id="" class="form-control">
                            <option value=" ">- نوع دسته محصول -</option>
                                <option value="1">دسته سطح دوم</option>
                                <option value="2">دسته سطح سوم</option>
                        </select>
                    </div>

                    <button class="btn btn-brand">افزودن به دسته های زیر دسته ها</button>
                </form>
            </div>
        </div>


    </div>

</div>
