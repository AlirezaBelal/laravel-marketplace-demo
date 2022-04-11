@section('title','آپدیت دسته سطح 4')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش دسته سطح چهارم -
            {{$categorylevel4->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="categorylevel4.title" placeholder="نام دسته "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="categorylevel4.name" placeholder="نام انگلیسی دسته "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="categorylevel4.link" placeholder="لینک دسته "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox"
                                   wire:model.lazy="categorylevel4.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در دسته اصلی:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="categorylevel4.parent" name="parent" id="" class="form-control">
                            @foreach(\App\Models\ChildCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" wire:model.lazy="img" class="form-control">
                        <span class="mt-2 text-danger" wire:loading wire:target="img">در حال آپلود ...</span>

                        <div wire:ignore class="progress mt-2" id="progressbar" style="display: none">
                            <div class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                        </div>
                    </div>
                    <div>
                        @if($img)
                            <img style="    width: 200px;" class="form-control mt-3 mb-3" width="400" src="{{$img->temporaryUrl()}}" alt="">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت دسته کودک</button>
                </form>
            </div>
        </div>
    </div>
</div>
