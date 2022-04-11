@section('title','صفحات فوتر سایت')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/footer">صفحات بالای فوتر سایت</a>
                <a class="tab__item  " href="/admin/footer/link1">فوتر لینک یک</a>
                <a class="tab__item " href="/admin/footer/link2">فوتر لینک دو</a>
                <a class="tab__item " href="/admin/footer/link3">فوتر لینک سه</a>
                <a class="tab__item " href="/admin/footer/linktitle">عنوان صفحات فوتر لینک سایت</a>
                <a class="tab__item " href="/admin/footer/title">عناوین اصلی فوتر سایت</a>
                <a class="tab__item " href="/admin/footer/partner">صفحات پایین فوتر سایت</a>

            </div>
        </div>
        <div class="row">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی</th>
                            <th> آیدی صفحه سایت</th>
                            <th>عنوان صفحه سایت</th>
                            <th>مکان نمایش</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($footer_pages as $footer_page)
                                <tr role="row">
                                    <td>{{$footer_page->id}}</td>

                                    <td><a href="">{{$footer_page->page_id}}</a></td>
                                    <td>
                                        @foreach(\App\Models\Page::where('id',$footer_page->page_id)->get() as $page)
                                            {{$page->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($footer_page->top == 1)
                                            صفحات فوتر بالا

                                        @else
                                        صفحات فوتر پایین

                                        @endif
                                    </td>

                                    <td>
                                        <a wire:click="deleteCategory({{$footer_page->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد صفحه سایت بندی جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <select wire:model.lazy="footerInnerBox.page_id" name="page_id" id="" class="form-control">
                            <option value="-1">- انتخاب صفحه برای فوتر -</option>
                            @foreach(\App\Models\Page::all() as $page)
                                <option value="{{$page->id}}">{{$page->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="footerInnerBox.top" name="top"
                                   class="form-control">
                            <label for="option4">نمایش در صفحات بالای فوتر:</label>
                        </div>
                    </div>


                    <button class="btn btn-brand">افزودن صفحه سایت</button>
                </form>
            </div>
        </div>


    </div>


</div>
