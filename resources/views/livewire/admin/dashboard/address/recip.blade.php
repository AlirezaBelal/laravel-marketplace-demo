<div>
    @section('title','انبار ها')
    <div>
        <div class="main-content" wire:init="loadCategory">
            <div class="tab__box">
                <div class="tab__items">
                    <a class="tab__item " href="/admin/dashboard/address">آدرس ها
                    </a>
                    <a class="tab__item is-active" href="/admin/dashboard/address/recip">آدرس های انبار
                    </a>
                    <a class="tab__item" href="/admin/dashboard/address/time">زمان های ارسال
                    </a>
                    |
                    <a class="tab__item">جستجو: </a>

                    <a class="t-header-search">
                        <form action="" onclick="event.preventDefault();">
                            <input wire:model.debounce.1000="search"
                                   type="text" class="text" placeholder="جستجوی انبار ...">
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
                                <th>آدرس انبار</th>
                                <th>وضعیت انبار</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>

                            @if($readyToLoad)
                                <tbody>
                                @foreach($receiptCenters as $receiptCenter)
                                    <tr role="row">
                                        <td><a href="">{{$receiptCenter->id}}</a></td>
                                        <td><a href="">{{$receiptCenter->address}}</a></td>


                                        <td>
                                            @if($receiptCenter->status == 1)
                                                <button wire:click="updateCategoryDisable({{$receiptCenter->id}})"
                                                        type="submit" class="badge-success badge"
                                                        style="background-color: green">فعال
                                                </button>
                                            @else
                                                <button wire:click="updateCategoryEnable({{$receiptCenter->id}})"
                                                        type="submit" class="badge-danger badge"
                                                        style="background-color: red">
                                                    غیرفعال
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            <a wire:click="deleteCategory({{$receiptCenter->id}})" type="submit"
                                               class="item-delete mlg-15" title="حذف"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                {{$receiptCenters->render()}}
                            @else



                                <div class="alert-warning alert">
                                    در حال خواندن اطلاعات از دیتابیس ...
                                </div>


                            @endif


                        </table>
                    </div>


                </div>
                <div class="col-4 bg-white">
                    <p class="box__title">ایجاد انبار جدید</p>
                    <form wire:submit.prevent="categoryForm"
                          enctype="multipart/form-data" role="form"
                          class="padding-10 categoryForm">

                        @include('errors.error')

                        <div class="form-group">
                            <input type="text" wire:model.lazy="receiptCenter.address"
                                   placeholder="آدرس انبار "
                                   class="form-control">
                        </div>

                        <div class="form-group">


                        <div class="form-group">
                            <div class="notificationGroup">
                                <input id="option4" type="checkbox" wire:model.lazy="receiptCenter.status" name="status"
                                       class="form-control">
                                <label for="option4">نمایش در انبار اصلی:</label>
                            </div>
                        </div>



                        <button class="btn btn-brand">افزودن انبار</button>
                    </form>
                </div>
            </div>


        </div>

    </div>

</div>
