@section('title','آپدیت گارانتی')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش گارانتی -
            {{$warranty->name}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="warranty.name" placeholder="نام گارانتی "
                               class="form-control">
                    </div>


                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="warranty.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در گارانتی اصلی:</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت گارانتی</button>
                </form>
            </div>
        </div>
    </div>
</div>
