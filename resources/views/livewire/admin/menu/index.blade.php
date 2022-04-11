@section('title','منو ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active"
                   href="/admin/menu">منو ها</a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی منو ...">
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
                            <th>وضعیت منو</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($menus as $menu)
                                <tr role="row">
                                    <td><a href="">{{$menu->id}}</a></td>
                                    <td>
                                        {{$menu->category->title}}
                                    </td>
                                    <td>
                                        {{$menu->subCategory->title}}
                                    </td>
                                    @if($menu->childCategory_id == null)
                                        <td>
                                            -
                                        </td>
                                    @else
                                        <td>
                                            {{$menu->childCategory->title}}
                                        </td>
                                        @endif

                                    <td>
                                        @if($menu->status == 1)
                                            <button wire:click="updateCategoryDisable({{$menu->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$menu->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$menu->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('menu.update',$menu)}}" class="item-edit "
                                           title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$menus->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد منو جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <select wire:model.lazy="menu.category_id" name="category_id" id="" class="form-control">
                            <option value="-1" >- دسته منو -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="menu.subCategory_id" name="subCategory_id" id="" class="form-control">
                            <option value="-1" >- زیردسته منو -</option>
                            @foreach(\App\Models\SubCategory::where('parent',$this->menu->category_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="menu.childCategory_id" name="childCategory_id" id="" class="form-control">
                            <option value=" ">- دسته کودک منو -</option>
                            @foreach(\App\Models\ChildCategory::where('parent',$this->menu->subCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="menu.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در منو اصلی:</label>
                        </div>
                    </div>
                    <button class="btn btn-brand">افزودن دسته</button>
                </form>
            </div>
        </div>


    </div>

</div>
