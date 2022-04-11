@section('title','سطل زباله صفحات سایت')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/page">صفحات سایت
                </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی برند ...">
                    </form>
                </a>

                <a class="tab__item btn btn-danger"
                   href="{{route('page.trashed')}}
                       " style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Page::onlyTrashed()->count()}})
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی</th>
                            <th>تصویر صفحه سایت</th>
                            <th>عنوان صفحه سایت</th>
                            <th>لینک صفحه سایت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($pages as $page)
                                <tr role="row">
                                    <td><a href="">{{$page->id}}</a></td>
                                    <td>
                                        <img src="/storage/{{$page->img}}" alt="img" width="100px">
                                    </td>
                                    <td><a href="">{{$page->title}}</a></td>
                                    <td><a target="_blank" href="{{url($page->link)}}">{{$page->link}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$page->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a wire:click="trashedCategory({{$page->id}})"
                                           class="item-li i-checkouts item-restore"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$pages->render()}}
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
