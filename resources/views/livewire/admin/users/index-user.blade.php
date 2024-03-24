@section('title','کاربر ها')
<div>

    <div class="main-content" wire:init="loadUser">
        @livewire('chart.user-chart')
        <div class="tab__box">
            <div class="tab__items">
                @can('user-show')
                    <a class="tab__item is-active" href="/admin/users">کاربر
                        ها</a>
                @endcan

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی کاربر ...">
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
                            <th>تصویر کاربر</th>
                            <th>اطلاعات کاربر</th>
                            <th>تایید ایمیل کاربر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($users as $user)
                                <tr role="row">
                                    <td><a href="">{{$user->id}}</a></td>
                                    <td>
                                        @if ($user->img == null)
                                            <img style="border-radius: 25px" src="{{asset('img/pro.jpg')}}" alt="img" width="100px">

                                        @else
                                            <img style="border-radius: 25px"  src="/storage/{{$user->img}}" alt="img" width="100px">

                                        @endif
                                    </td>
                                    <td><a href="">
                                            نام:
                                            {{$user->name}}
                                            <br>
                                            ایمیل:
                                            {{$user->email}}
                                            <br>
                                            موبایل:
                                            {{$user->mobile}}
                                        </a></td>

                                    <td>
                                            @if($user->email_verified_at != null)
                                                <button
                                                        type="submit" class="badge-success badge"
                                                        style="background-color: green">ایمیل تایید شده
                                                </button>
                                            @else
                                                <button  wire:click="updateUserDisable({{$user->id}})"
                                                        type="submit" class="badge-danger badge"
                                                        style="background-color: red">
                                                    ایمیل تایید نشده
                                                </button>
                                            @endif
                                                <br>
                                                @if ($user->admin ==1)
                                                    <button class="badge-danger badge"
                                                            style="background-color: darkred">
                                                        مدیر سایت
                                                    </button>
                                                @endif
                                                @if ($user->staff ==1)
                                                    <button class="badge-warning badge"
                                                            style="background-color: darkgrey">
                                                        همکار سایت
                                                    </button>
                                                @endif

                                                @if ($user->isStaff())
                                                    <br>
                                                    <a href="{{route('permission.user',$user)}}" class="badge-warning badge" style="background-color: #ffc107">
                                                        تغییر دسترسی
                                                    </a>

                                                @endif


                                    </td>
                                    <td>
                                        @can('user-delete')
                                            <a wire:click="deleteUser({{$user->id}})" type="submit"
                                               class="item-delete mlg-15" title="حذف"></a>
                                        @endcan
                                        @can('edit-category')
                                            <a href="{{route('users.update',$user)}}" class="item-edit " title="ویرایش"></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$users->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>

            <div class="col-4 bg-white">
                <p class="box__title">ایجاد کاربر بندی جدید</p>
                @can('create-user')
                    <form wire:submit.prevent="userForm"
                          enctype="multipart/form-data" role="form"
                          class="padding-10 categoryForm">

                        @include('errors.error')

                        <div class="form-group">
                            <input type="text" wire:model.lazy="user.name" placeholder="نام کاربر "
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="text" wire:model.lazy="user.email" placeholder="ایمیل کاربر "
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" wire:model.lazy="user.mobile" placeholder="موبایل کاربر "
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="notificationGroup">
                                <input id="option4" type="checkbox" wire:model.lazy="user.admin"
                                       class="form-control">
                                <label for="option4">ادمین سایت:</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="notificationGroup">
                                <input id="option5" type="checkbox" wire:model.lazy="user.staff"
                                       class="form-control">
                                <label for="option5">همکار سایت:</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" wire:model.lazy="img" id="{{rand()}}" class="form-control">
                            <span class="mt-2 text-danger" wire:loading wire:target="img">در حال آپلود ...</span>

                            <div wire:ignore class="progress mt-2" id="progressbar" style="display: none">
                                <div class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                            </div>
                        </div>
                        <div>
                            @if($img)
                                <img class="form-control mt-3 mb-3" width="400" src="{{$img->temporaryUrl()}}" alt="">
                            @endif
                        </div>

                        <button class="btn btn-brand">افزودن کاربر</button>
                    </form>
                @endcan
            </div>
        </div>


    </div>

    <script>
        document.addEventListener('livewire:load', () => {
            let progressSection = document.querySelector('#progressbar'),
                progressBar = progressSection.querySelector('.progress-bar');

            document.addEventListener('livewire-upload-start', () => {
                console.log('شروع آپلود');
                progressSection.style.display = 'flex';
            });
            document.addEventListener('livewire-upload-finish', () => {
                console.log('اتمام آپلود');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-error', () => {
                console.log('ارور موقع آپلود');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-progress', (event) => {
                console.log(`${event.detail.progress}%`);
                progressBar.style.width = `${event.detail.progress}%`;
                progressBar.textContent = `${event.detail.progress}%`;
            });

        });
    </script>
</div>
