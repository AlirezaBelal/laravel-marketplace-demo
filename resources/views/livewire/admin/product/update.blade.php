@section('title','آپدیت محصول')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش محصول -
            {{$product->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" wire:model.lazy="product.title" placeholder="نام محصول "
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" wire:model.lazy="product.name" placeholder="نام انگلیسی محصول "
                                       class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" wire:model.lazy="product.link" placeholder="لینک محصول "
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option36" type="checkbox" wire:model.lazy="product.status_product"
                                           name="status_product"
                                           class="form-control">
                                    <label for="option36">نمایش در محصول اصلی:</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model.lazy="product.category_id" name="category_id" id=""
                                        class="form-control">
                                    <option value="-1">--دسته اصلی</option>
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model.lazy="product.subcategory_id" name="subcategory_id" id=""
                                        class="form-control">
                                    <option value="-1">--زیر دسته</option>
                                    @foreach(\App\Models\SubCategory::all() as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model.lazy="product.childcategory_id" name="childcategory_id" id=""
                                        class="form-control">
                                    <option value="-1">--دسته فرزند</option>
                                    @foreach(\App\Models\ChildCategory::all() as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model.lazy="product.categorylevel4_id" name="categorylevel4_id" id=""
                                        class="form-control">
                                    <option value="-1">--دسته سطح چهارم(می تواند خالی باشد)</option>
                                    @foreach(\App\Models\CategoryLevel4::where('parent',$this->product->childcategory_id)->get() as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model.lazy="product.brand_id" name="brand_id" id="" class="form-control">
                                    <option value="1">برند محصول</option>
                                    @foreach(\App\Models\Brand::all() as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <select wire:model.lazy="product.color_id" name="brand_id" id="" class="form-control">
                                    <option value="1">رنگ محصول</option>
                                    @foreach(\App\Models\Color::all() as $color)
                                        <option value="{{$color->id}}"
                                                style="background-color: {{$color->value}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" wire:model.lazy="product.tags" placeholder="تگ های محصول "
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <textarea rows="5" wire:model.lazy="product.description"
                                      placeholder="توضیح کوتاه محصول "
                                      class="form-control" id="description_create">
                                {{$product->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <textarea wire:model.lazy="product.body" name="body" placeholder="توضیح محصول "
                                      class="form-control" id="body_create">
                                  {{$product->body}}
                            </textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" wire:model.lazy="product.price" placeholder="قیمت محصول "
                                   class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" wire:model.lazy="product.discount_price" placeholder="قیمت تخفیف خورده "
                                   class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" wire:model.lazy="product.number" placeholder="تعداد موجودی محصول "
                                   class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" wire:model.lazy="product.weight" placeholder="وزن محصول "
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option10" type="checkbox" wire:model.lazy="product.shipment"
                                           name="shipment"
                                           class="form-control">
                                    <label for="option10">موجود در انبار دیجی کالا:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option11" type="checkbox" wire:model.lazy="product.publish_product"
                                           name="publish_product"
                                           class="form-control">
                                    <label for="option11">منتشر شده:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option12" type="checkbox" wire:model.lazy="product.original"
                                           name="original"
                                           class="form-control">
                                    <label for="option12">محصول با کیفیت اصلی:</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option13" type="checkbox" wire:model.lazy="product.gift" name="gift"
                                           class="form-control">
                                    <label for="option13">محصول به عنوان هدیه:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <div class="notificationGroup">
                                    <input id="option14" type="checkbox" wire:model.lazy="product.special"
                                           name="special"
                                           class="form-control">
                                    <label for="option14">محصول ویژه:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" wire:model.lazy="product.order_count"
                                   placeholder="تعداد سفارش محصول(صفر نامحدود) "
                                   class="form-control">
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

                    <button type="submit" class="btn btn-brand">آپدیت محصول</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            ClassicEditor
                .create(document.querySelector('#description_create'), {
                    language: {
                        ui: 'fa',
                        content: 'fa'
                    }
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#body_create'), {
                    language: {
                        ui: 'fa',
                        content: 'fa'
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
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
