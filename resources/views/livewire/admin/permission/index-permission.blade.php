@section('title','دسترسی ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/role">مقام
                    ها</a>
                <a class="tab__item is-active" href="/admin/permission">دسترسی
                    ها</a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی دسترسی ...">
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
                            <th>نام دسترسی(دسترسی کاربری)</th>
                            <th>توضیح دسترسی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr role="row">
                                    <td><a href="">{{$permission->id}}</a></td>
                                    <td><a href="">{{$permission->name}}</a></td>
                                    <td><a href="">{{$permission->def}}</a></td>
                                    <td>
                                        <a wire:click="deleteRole({{$permission->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$permissions->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسترسی جدید</p>
                <form wire:submit.prevent="roleForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <input type="text" wire:model.lazy="permission.name" placeholder="نام  دسترسی "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="permission.def" placeholder="توضیح  دسترسی "
                               class="form-control">
                    </div>


                    <button class="btn btn-brand">افزودن دسترسی</button>
                </form>
            </div>
        </div>


    </div>

</div>
