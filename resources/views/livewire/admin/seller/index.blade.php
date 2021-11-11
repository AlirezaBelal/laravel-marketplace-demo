@section('title','فروشندگان')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('seller.index')}}">
                    فروشندگان
                </a>
                |
                <a class="tab__item">
                    جستجو:
                </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی فروشنده ...">
                    </form>
                </a>

                <a class="tab__item btn btn-success"
                   href="{{route('seller.create')}}"
                   style="color: white;float: left;margin-top: 10px;margin-left: 10px">
                    افزودن فروشنده
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
                            <th>لوگو فروشنده</th>
                            <th>نام و نام خانوادگی</th>
                            <th>نوع فروشنده</th>
                            <th>موبایل</th>
                            <th>ایمیل</th>
                            <th>نام برند</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            @php($count = 1)
                            <tbody>
                            @foreach($sellers as $seller)
                                <tr role="row">
                                    <td>
                                        {{$count++}}
                                    </td>
                                    <td>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($seller->logo)}}" alt="img"
                                             width="50px">
                                    </td>
                                    <td>
                                        {{$seller->name}}{{$seller->lname}}
                                    </td>
                                    <td>
                                        {{$seller->type_seller}}
                                    </td>
                                    <td>
                                        {{$seller->mobile}}
                                    </td>
                                    <td>
                                        {{$seller->email}}
                                    </td>
                                    <td>
                                        {{$seller->brand_name}}
                                    </td>

                                    <td>
                                        <a wire:click="deleteCategory({{$seller->id}})" type="submit"
                                           class="item-delete mlg-15"
                                           title="حذف">
                                        </a>
                                        <a href="{{route('seller.update',$seller)}}" class="item-edit mlg-15"
                                           title="ویرایش">
                                        </a>
                                        <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$sellers->render()}}
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
