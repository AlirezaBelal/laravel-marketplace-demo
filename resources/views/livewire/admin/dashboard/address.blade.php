@section('title','آدرس ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('dashboard.address')}}">
                    آدرس ها
                </a>
                |
                <a class="tab__item">
                    جستجو:
                </a>
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
                            <th>ردیف</th>
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
                            @php($count = 0)
                            @foreach($addreses as $address)
                                <tr role="row">
                                    <td>
                                        {{$count++}}
                                    </td>
                                    <td>
                                        {{$address->user->name}}
                                    </td>
                                    <td>
                                        {{$address->address}}
                                    </td>
                                    <td>
                                        {{$address->name}} {{$address->lname}}
                                    </td>
                                    <td>
                                        {{$address->code_posti}}
                                    </td>
                                    <td>
                                        {{$address->bld_num}}
                                    </td>
                                    <td>
                                        <a wire:click="deleteAddress({{$address->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف">
                                        </a>
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
