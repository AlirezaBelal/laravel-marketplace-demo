@section('title','برند ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/brand">برند
                    ها</a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی برند ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('brand.trashed')}}
                       " style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Brand::onlyTrashed()->count()}})
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
                            <th>تصویر برند</th>
                            <th>نام برند</th>
                            <th>دسته برند</th>
                            <th>وضعیت برند</th>
                            <th>ویژه</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($brands as $brand)
                                <tr role="row">
                                    <td><a href="">{{$brand->id}}</a></td>
                                    <td>
                                        <img src="/storage/{{$brand->img}}" alt="img" width="100px">
                                    </td>
                                    <td><a href="">{{$brand->name}}</a></td>
                                    <td>
                                        @foreach(\App\Models\Category::where('id',$brand->parent)->get() as $ca)
                                            {{$ca->title}}
                                        @endforeach
                                    </td>

                                    <td>
                                        @if($brand->status == 1)
                                            <button wire:click="updateCategoryDisable({{$brand->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$brand->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($brand->vip == 1)
                                            <button wire:click="updateBrandDisable({{$brand->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">ویژه
                                            </button>
                                        @else
                                            <button wire:click="updateBrandEnable({{$brand->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیر ویژه
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="deleteCategory({{$brand->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a href="{{route('brand.update',$brand)}}
                                            " class="item-edit " title="ویرایش"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$brands->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد برند بندی جدید</p>
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

                    <button class="btn btn-brand">افزودن برند</button>
                </form>
            </div>
        </div>


    </div>

    <script>
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
