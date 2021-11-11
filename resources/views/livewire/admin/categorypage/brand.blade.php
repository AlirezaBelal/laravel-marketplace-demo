@section('title','برند محصولات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item" href="{{route('category.slider')}}">
                    اسلایدر
                </a>
                <a class="tab__item " href="{{route('category.amazing')}}">
                    پیشنهاد شگفت انگیز
                </a>
                <a class="tab__item " href="{{route('category.banner')}}">
                    بنر ها
                </a>
                <a class="tab__item " href="{{route('category.title')}}">
                    عنوان ها
                </a>
                <a class="tab__item " href="{{route('category.product')}}">
                    محصولات
                </a>
                <a class="tab__item is-active" href="{{route('category.brand')}}">
                    برندهای برتر
                </a>
                |
                <a class="tab__item">
                    جستجو:
                </a>
                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی اسلایدر ...">
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
                            <th>ردیف</th>
                            <th>تصویر برند</th>
                            <th>عنوان برند</th>
                            <th>لینک برند</th>
                            <th>دسته برند</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            @php($count = 1)
                            <tbody>
                            @foreach($brands as $brand)
                                <tr role="row">
                                    <td>
                                        @php($count = 1)
                                    </td>

                                    <td>
                                        @foreach(\App\Models\Brand::where('id',$brand->brand_id)->get() as $cat)
                                            <img height="50px" width="100px"
                                                 src="{{\Illuminate\Support\Facades\Storage::url($cat->img)}}"
                                                 alt="  {{$cat->name}}">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Brand::where('id',$brand->brand_id)->get() as $cat)
                                            {{$cat->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Brand::where('id',$brand->brand_id)->get() as $cat)
                                            {{$cat->link}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Category::where('id',$brand->c_id)->get() as $cat)
                                            {{$cat->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$brand->id}})" type="submit"
                                           class="item-delete mlg-15"
                                           title="حذف">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$brands->render()}}
                        @else
                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>
                        @endif
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد برند برتر</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')

                    <div class="form-group">
                        <select wire:model.lazy="brand_id" name="brand_id" id="" class="form-control">
                            <option value="-1">- برند برتر -</option>
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="c_id" name="c_id" id="" class="form-control">
                            <option value="-1">- دسته -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-brand">افزودن برند برتر</button>
                </form>
            </div>
        </div>
    </div>
</div>
