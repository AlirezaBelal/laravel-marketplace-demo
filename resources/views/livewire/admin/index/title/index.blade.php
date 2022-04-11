@section('title','عنوان دسته های اصلی سایت')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/index/title">عنوان دسته های اصلی سایت </a>
                <a class="tab__item " href="/admin/index/category">محصولات دسته ها </a>


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی دسته های اصلی سایت ...">
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
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($indexes as $index)
                                <tr role="row">
                                    <td><a href="">{{$index->id}}</a></td>
                                    <td>
                                        {{$index->title}}
                                    </td>

                                    <td>
                                        <a href="{{route('index.title.update',$index)}}" class="item-edit "
                                           title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$indexes->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد عنوان برای دسته های صفحه اصلی</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')



                    <div class="form-group">
                            <input type="text" wire:model.lazy="index.title" name="title" id="" class="form-control">
                    </div>

                    <button class="btn btn-brand">افزودن عنوان دسته</button>
                </form>
            </div>
        </div>


    </div>

</div>
