@section('title','آپدیت رنگ')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش رنگ -
            {{$color->name}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="color.name" placeholder="نام رنگ "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input data-jscolor="" type="text" wire:model.lazy="color.value"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="color.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در رنگ اصلی:</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت رنگ</button>
                </form>
            </div>
        </div>
    </div>
</div>
