@section('title','مقام ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/role">مقام
                    ها</a>
                <a class="tab__item " href="/admin/permission">دسترسی
                    ها</a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی مقام ...">
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
                            <th>نام مقام(نقش کاربری)</th>
                            <th>توضیح مقام</th>
                            <th>دسترسی ها</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($roles as $role)
                                <tr role="row">
                                    <td><a href="">{{$role->id}}</a></td>
                                    <td><a href="">{{$role->name}}</a></td>
                                    <td><a href="">{{$role->def}}</a></td>

                                    <td>
                                            @foreach(\App\Models\PermissionRole::where('role_id',$role->id)
->get() as $pe)
                                                @foreach(\App\Models\Permission::where('id',$pe->permission_id)->get() as $per)

                                                {{$per->def ?? ''}}
                                                    <br>
                                                @endforeach
                                            @endforeach


                                    </td>

                                    <td>
                                        <a wire:click="deleteRole({{$role->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('role.update',$role)}}" class="item-edit " title="ویرایش"></a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$roles->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد مقام جدید</p>
                <form wire:submit.prevent="roleForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <input type="text" wire:model.lazy="role.name" placeholder="نام  مقام "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="role.def" placeholder="توضیح  مقام "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="permission" class="control-label">دسترسی ها</label>
                        <div wire:ignore>
                        <select id="roles" style="width: 315px !important;"
                                wire:model.defer="permissions"
                                multiple class="form-control ">
                            @foreach(\App\Models\Permission::all() as $permission)
                            <option value="{{$permission->id}}">{{$permission->def}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>


                    <button class="btn btn-brand">افزودن مقام</button>
                </form>
            </div>
        </div>


    </div>

</div>
@include('livewire.admin.select2')
