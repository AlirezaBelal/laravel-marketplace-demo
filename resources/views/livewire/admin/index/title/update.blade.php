@section('title','آپدیت عنوان دسته')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش عنوان دسته -
            {{$index->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')

                    <div class="form-group">
                        <div class="form-group">
                            <input type="text" wire:model.lazy="index.title" name="title" id="" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت دسته</button>
                </form>
            </div>
        </div>
    </div>
</div>
