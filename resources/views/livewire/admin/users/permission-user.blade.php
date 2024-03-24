@section('title','آپدیت مقام')
<div>
    <div class="main-content padding-0">
        <p class="box__title">دسترسی دادن به کاربر -
            {{$user->name}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')

                    <div class="form-group">
                        <label for="permission" class="control-label">مقام ها</label>
                        <br>
                        <div style="margin-right: 50px" >
                            @foreach(\App\Models\Role::all() as $role)

                                -
                                <label for="permission" class="form-check-label">{{$role->def}}</label>
                                <input type="checkbox" class=""
                                       style="margin-right: inherit;position: absolute;left: 400px"
                                       {{in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'checked':''}}
                                       value="{{$role->id}}"
                                       wire:model="roles.{{$role->id}}"
                                >


                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="permission" class="control-label">دسترسی ها</label>
                        <br>
                        <div style="margin-right: 50px" >
                            @foreach(\App\Models\Permission::all() as $permission)

                                -
                                <label for="permission" class="form-check-label">{{$permission->def}}</label>
                                <input type="checkbox" class=""
                                       style="margin-right: inherit;position: absolute;left: 400px"
                                       {{in_array($permission->id,$user->permissions->pluck('id')->toArray()) ? 'checked':''}}
                                       value="{{$permission->id}}"
                                       wire:model="permissions.{{$permission->id}}"
                                >


                                <br>
                            @endforeach
                        </div>
                    </div>


                    <button type="submit" class="btn btn-brand">آپدیت کاربر</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{--@include('livewire.admin.select2')--}}
