@section('title','عنوان های سوایپر دسته الکترونیک')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/category/apparel/slider">اسلایدر
                </a>
                <a class="tab__item "
                   href="/admin/category/apparel/amazing">پیشنهاد شگفت انگیز </a>
                <a class="tab__item"
                   href="/admin/category/apparel/banner">بنر ها </a>
                <a class="tab__item is-active"
                   href="/admin/category/apparel/title">عنوان ها </a>
                <a class="tab__item"
                   href="/admin/category/apparel/product">محصولات </a>

                <a class="tab__item"
                   href="/admin/category/apparel/brand">برندهای برتر </a>
                |
                <a class="tab__item">جستجو: </a>

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
                            <th>آیدی</th>
                            <th>عنوان سوایپر</th>
                            <th>لینک سوایپر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($titles as $title)
                                <tr role="row">
                                    <td><a href="">{{$title->id}}</a></td>
                                    <td><a href="">{{$title->title}}</a></td>
                                    <td><a href="">{{$title->link}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$title->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$titles->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد عنوان جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <input type="text" wire:model.lazy="title" placeholder="نام عنوان "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="link" placeholder="لینک هدایت شونده "
                               class="form-control">
                    </div>


                    <button class="btn btn-brand">افزودن عنوان</button>
                </form>
            </div>
        </div>


    </div>


</div>

