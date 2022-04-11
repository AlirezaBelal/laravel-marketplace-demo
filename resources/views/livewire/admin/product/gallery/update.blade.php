@section('title','آپدیت رنگ')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش تصویر محصول -
            @foreach(\App\Models\Product::where('id',$gallery->product_id)->get() as $product)
                {{$product->title}}
            @endforeach
        </p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <select wire:model.lazy="gallery.product_id" name="product_id" id="" class="form-control">
                            <option value="1">تصویر محصول</option>
                            @foreach(\App\Models\Product::all() as $product)
                                <option value="{{$product->id}}" >{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="gallery.position" placeholder="موقعیت تصویر "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="gallery.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در گالری تصاویر:</label>
                        </div>
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
                            <img style="width: 400px" class="form-control mt-3 mb-3" width="400"
                                 src="{{$img->temporaryUrl()}}" alt="">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت تصویر محصول</button>
                </form>
            </div>
        </div>
    </div>
</div>
