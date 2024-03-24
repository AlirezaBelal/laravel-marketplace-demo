@section('title','دسته ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                @can('show-category')
                <a class="tab__item is-active" href="/admin/category">دسته
                    ها</a>
                @endcan
                @can('subcategory-show')
                <a class="tab__item {{Request::routeIs('subcategory.index') ? 'is-active': '' }}"
                   href="/admin/subcategory">زیر دسته ها</a>
                @endcan
                <a class="tab__item {{Request::routeIs('childcategory.index') ? 'is-active': '' }}"
                   href="/admin/childcategory">دسته های کودک</a>
                <a class="tab__item {{Request::routeIs('categorylevel4.index') ? 'is-active': '' }}"
                   href="/admin/categorylevel4">دسته های سطح 4 </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی دسته ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('category.trashed')}}" style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                ({{\App\Models\Category::onlyTrashed()->count()}})
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
                            <th>تصویر دسته</th>
                            <th>آیکون دسته</th>
                            <th>عنوان دسته</th>
                            <th>نام دسته</th>
                            <th>وضعیت دسته</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($categories as $category)
                                <tr role="row">
                                    <td><a href="">{{$category->id}}</a></td>
                                    <td>
                                        <img src="/storage/{{$category->img}}" alt="img" width="100px">
                                    </td>
                                    <td><a href="">{{$category->icon}}</a></td>
                                    <td><a href="">{{$category->title}}</a></td>
                                    <td><a href="">{{$category->name}}</a></td>

                                    <td>
                                        @can('status-category')
                                        @if($category->status == 1)
                                            <button wire:click="updateCategoryDisable({{$category->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$category->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                        @endcan
                                    </td>
                                    <td>
                                        @can('delete-category')
                                        <a wire:click="deleteCategory({{$category->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        @endcan
                                        @can('edit-category')
                                        <a href="{{route('category.update',$category)}}" class="item-edit " title="ویرایش"></a>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$categories->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>

            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                @can('create-category')
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <input type="text" wire:model.lazy="category.icon" placeholder="آیکون دسته "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="category.title" placeholder="نام دسته "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="category.name" placeholder="نام انگلیسی دسته "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="category.link" placeholder="لینک دسته "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="category.description" placeholder="توضیحات "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea wire:model.lazy="category.body"  class="form-control" placeholder="متن دسته ">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="category.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در دسته اصلی:</label>
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
                            <img class="form-control mt-3 mb-3" width="400" src="{{$img->temporaryUrl()}}" alt="">
                        @endif
                    </div>

                    <button class="btn btn-brand">افزودن دسته</button>
                </form>
                @endcan
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
