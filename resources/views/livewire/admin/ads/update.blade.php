@section('title','آپدیت تبلیغ')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش تبلیغ -
            {{$ads->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="ads.title" placeholder="عنوان تبلیغ "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="ads.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در تبلیغ اصلی:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="ads.category_id" name="category_id" id="" class="form-control">
                            <option value="-1"> - انتخاب دسته تبلیغ</option>
                            @foreach(\App\Models\Category::all() as $category)

                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
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

                    <button type="submit" class="btn btn-brand">آپدیت تبلیغ</button>
                </form>
            </div>
        </div>
    </div>
</div>
