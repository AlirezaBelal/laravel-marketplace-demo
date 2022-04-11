@section('title','دلایل مرجوعی سفارشات')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/orders/returnreson">دلایل مرجوعی </a>
                <a class="tab__item " href="/admin/orders/returndetail">جزئیات مرجوعی ها</a>
                <a class="tab__item" href="/admin/orders/returndetail/accept"> مرجوعی های تایید شده</a>


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی سفارش ...">
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
                            <th>آیدی </th>
                            <th>دلیل مرجوعی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($returnReasons as $returnReason)
                                <tr role="row">
                                    <td><a href="">{{$returnReason->id}}</a></td>
                                    <td><a href="">{{$returnReason->reason}}</a></td>


                                    <td>
                                        <a wire:click="deleteCategory({{$returnReason->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$returnReasons->render()}}

                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif

                    </table>
                </div>
            </div>

                <div class="col-4 bg-white">
                    <p class="box__title">افزودن دلیل مرجوعی</p>
                    <form wire:submit.prevent="categoryForm"
                          enctype="multipart/form-data" role="form"
                          class="padding-10 categoryForm">

                        @include('errors.error')

                        <div class="form-group">
                            <input type="text" wire:model.lazy="returnReason.reason" placeholder="دلیل مرجوعی "
                                   class="form-control">
                        </div>



                        <button class="btn btn-brand">افزودن دلیل مرجوعی</button>
                    </form>
                </div>
        </div>


    </div>

</div>
