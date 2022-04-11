@section('title','آپدیت عنوان صفحه سایت')
<div>
    <div class="main-content padding-0">
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <div class="form-group">
                            <textarea type="text" wire:model.lazy="footer_title.title"
                                   placeholder="عنوان فوتر را وارد کنید(یا شماره آیدی دسته کودک را وارد کنید)"
                                   class="form-control">
                            </textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت عنوان صفحه سایت</button>
                </form>
            </div>
        </div>
    </div>
</div>
