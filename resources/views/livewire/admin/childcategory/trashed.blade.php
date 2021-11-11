@section('title','سطل زباله دسته ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="{{route('category.index')}}">
                    دسته ها
                </a>
                <a class="tab__item " href="{{route('subcategory.index')}}">
                    زیر دسته ها
                </a>
                <a class="tab__item is-active"
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
                   href="{{route('childcategory.trashed')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\ChildCategory::onlyTrashed()->count()}})
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>ردیف</th>
                            <th>تصویر دسته</th>
                            <th>عنوان دسته</th>
                            <th>نام دسته</th>
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
                                        <a wire:click="deleteCategory({{$category->id}})" type="submit"
                                           class="item-delete mlg-15"
                                           title="حذف">
                                        </a>
                                        <a wire:click="trashedCategory({{$category->id}})"
                                           class="item-li i-checkouts item-restore"
                                           title="بازگردانی"></a>
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
        </div>
    </div>
</div>
