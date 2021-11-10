@section('title','دسته های کودک')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('category.index')}}">
                    دسته ها
                </a>

                <a class="tab__item {{Request::routeIs('subcategory.index') ? 'is-active': '' }}"
                   href="{{route('subcategory.index')}}">
                    زیر دسته ها
                </a>

                <a class="tab__item {{Request::routeIs('childcategory.index') ? 'is-active': '' }}"
                   href="{{route('childcategory.index')}}">
                    دسته های کودک
                </a>

                <a class="tab__item {{Request::routeIs('categorylevel4.index') ? 'is-active': '' }}"
                   href="{{route('categorylevel4.index')}}">
                    دسته های سطح 4
                </a>
                |
                <a class="tab__item">
                    جستجو:
                </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی دسته ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('categorylevel4.trashed')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">
                    سطل زباله
                    ({{\App\Models\Categorylevel4::onlyTrashed()->count()}})
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>ردیف</th>
                            <th>تصویر دسته سطح 4</th>
                            <th>عنوان دسته سطح 4</th>
                            <th>نام دسته سطح 4</th>
                            <th>سر دسته کودک</th>
                            <th>وضعیت دسته سطح 4</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            @php($count = 1)
                            <tbody>
                            @foreach($categories as $category)
                                <tr role="row">
                                    <td>
                                        {{$count++}}
                                    </td>
                                    <td>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($category->img)}}"
                                             alt="img" width="50px">
                                    </td>
                                    <td>
                                        {{$category->title}}
                                    </td>
                                    <td>
                                        {{$category->name}}
                                    </td>
                                    <td>
                                        @foreach(\App\Models\ChildCategory::where('id',$category->parent)->get() as $ca)
                                            {{$ca->title}}
                                        @endforeach
                                    </td>

                                    <td>
                                        @if($category->status == 1)
                                            <button wire:click="updateCategoryDisable({{$category->id}})"
                                                    type="submit" class="badge-success badge"
                                                    style="background-color: green">
                                                فعال
                                            </button>
                                        @else
                                            <button wire:click="updateCategoryEnable({{$category->id}})"
                                                    type="submit" class="badge-danger badge"
                                                    style="background-color: red">
                                                غیرفعال
                                            </button>
                                        @endif
                                    </td>

                                    <td>
                                        <a wire:click="deleteCategory({{$category->id}})" type="submit"
                                           class="item-delete mlg-15"
                                           title="حذف">
                                        </a>
                                        <a href="{{route('categorylevel4.update',$category)}}" class="item-edit "
                                           title="ویرایش">
                                        </a>
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
                <p class="box__title">ایجاد دسته سطح 4 جدید</p>
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
                            <input id="option4" type="checkbox" wire:model.lazy="categorylevel4.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در دسته اصلی:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="categorylevel4.parent" name="parent" id="" class="form-control">
                            <option value="-1">- دسته محصول -</option>
                            @foreach(\App\Models\ChildCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="file" wire:model.lazy="img" name="img" id="{{rand()}}" class="form-control">
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
