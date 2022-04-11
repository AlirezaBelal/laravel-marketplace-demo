@section('title','رنگ ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/product">محصولات</a>
                <a class="tab__item is-active" href="/admin/color"> رنگ های محصولات</a>
                <a class="tab__item " href="/admin/gallery"> گالری تصاویر محصولات</a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی رنگ ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('color.trashed')}}
                       " style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Color::onlyTrashed()->count()}})
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
                            <th>نام رنگ</th>
                            <th>کد رنگ</th>
                            <th>وضعیت رنگ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($colors as $color)
                                <tr role="row">
                                    <td><a href="">{{$color->id}}</a></td>
                                    <td><a href="">{{$color->name}}</a></td>
                                    <td><a href="" style="background-color: {{$color->value}}">{{$color->value}}</a></td>

                                    <td>
                                        @if($color->status == 1)
                                            <button wire:click="updateCategoryDisable({{$color->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$color->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$color->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('color.update',$color)}}
                                            " class="item-edit " title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$colors->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد رنگ جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <input type="text" wire:model.lazy="color.name" placeholder="نام رنگ "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input data-jscolor="" type="text" wire:model.lazy="color.value" placeholder="کد رنگ "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="color.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در رنگ ها:</label>
                        </div>
                    </div>


                    <button class="btn btn-brand">افزودن رنگ</button>
                </form>
            </div>
        </div>


    </div>

</div>
