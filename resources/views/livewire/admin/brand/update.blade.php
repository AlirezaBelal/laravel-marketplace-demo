@section('title','آپدیت برند')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش برند -
            {{$brand->name}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="brand.name" placeholder="نام برند "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="brand.link" placeholder="لینک برند "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="brand.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در برند اصلی:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option6" type="checkbox" wire:model.lazy="brand.vip" name="vip"
                                   class="form-control">
                            <label for="option6">برند ویژه:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="brand.parent" name="parent" id="" class="form-control">
                            <option value="-1"> - انتخاب دسته برند</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea type="text" wire:model.lazy="brand.description" placeholder="توضیح برند "
                                  class="form-control">

                        </textarea>
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
                            <img class="form-control mt-3 mb-3" width="400" src="{{$img->temporaryUrl()}}" alt="">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت برند</button>
                </form>
            </div>
        </div>
    </div>
</div>
