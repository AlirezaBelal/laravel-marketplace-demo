@section('title','آپدیت کاربر')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش کاربر -
            {{$user->name}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
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

                    <button type="submit" class="btn btn-brand">آپدیت کاربر</button>
                </form>
            </div>
        </div>
    </div>
</div>
