@section('title','گالری تصاویر محصولات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/product">محصولات</a>
                <a class="tab__item " href="/admin/color"> تصویر های محصولات</a>
                <a class="tab__item is-active" href="/admin/gallery"> گالری تصاویر محصولات</a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی تصویر ...">
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
                            <th> تصویر</th>
                            <th>نام محصول</th>
                            <th>وضعیت تصویر</th>
                            <th>موقعیت تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr role="row">
                                    <td><a href="">{{$gallery->id}}</a></td>
                                    <td>
                                        <img src="/storage/{{$gallery->img}}" alt="img" width="100px">
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Product::where('id',$gallery->product_id)->get() as $product)
                                            {{$product->title}}
                                        @endforeach
                                    </td>

                                    <td>
                                        @if($gallery->status == 1)
                                            <button wire:click="updateCategoryDisable({{$gallery->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$gallery->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td><a href="">{{$gallery->position}}</a></td>
                                    <td>
                                        <a wire:click="deleteCategory({{$gallery->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('gallery.update',$gallery)}}
                                            " class="item-edit " title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$galleries->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد تصویر جدید</p>
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
                        <input type="file" wire:model.lazy="img" id="{{rand()}}" class="form-control">
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

                    <button class="btn btn-brand">افزودن تصویر</button>
                </form>
            </div>
        </div>


    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description_create' ),{
                language:{
                    ui:'fa',
                    content:'fa'
                }
            })
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#body_create' ),{
                language:{
                    ui:'fa',
                    content:'fa'
                }
            } )
            .catch( error => {
                console.error( error );
            } );

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
