@section('title','آدرس ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/dashboard/address">آدرس ها
                    </a>
                <a class="tab__item " href="/admin/dashboard/address/recip">آدرس های انبار
                </a>
                <a class="tab__item " href="/admin/dashboard/address/time">زمان های ارسال
                </a>
                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی آدرس ...">
                    </form>
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
                            <th>نام کاربر</th>
                            <th>آدرس</th>
                            <th> گیرنده</th>
                            <th>کدپستی</th>
                            <th>پلاک</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($addreses as $address)
                                <tr role="row">
                                    <td><a href="">{{$address->id}}</a></td>

                                    <td><a href="">{{$address->user->name}}</a></td>
                                    <td><a href="">{{$address->address}}</a></td>
                                    <td><a href="">{{$address->name}} {{$address->lname}}</a></td>
                                    <td><a href="">{{$address->code_posti}} </a></td>
                                    <td><a href="">{{$address->bld_num}} </a></td>

                                    <td>
                                        <a wire:click="deleteAddress({{$address->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$addreses->render()}}
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
