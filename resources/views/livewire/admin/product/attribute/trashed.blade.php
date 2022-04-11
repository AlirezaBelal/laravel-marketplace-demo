@section('title','سطل زباله مشخصات کالا ')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item " href="/admin/attribute">مشخصات کالا
                    ها</a>
                <a class="tab__item " href="/admin/attributeValue">مقدار مشخصات کالا
                    </a>


                <a class="tab__item btn btn-danger"
                   href="{{route('attribute.trashed')}}" style="color: white;float: left;margin-top: 10px;margin-left: 10px">سطل زباله
                    ({{\App\Models\Attribute::onlyTrashed()->count()}})
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
                            <th>عنوان </th>
                            <th>دسته نمایش کالا </th>
                            <th>زیر دسته مشخصات</th>
                            <th>موقعیت</th>

                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($attributes as $attribute)
                                <tr role="row">
                                    <td><a href="">{{$attribute->id}}</a></td>
                                    <td><a href="">{{$attribute->title}}</a></td>
                                    <td>
                                        @foreach(\App\Models\ChildCategory::where('id',$attribute->childCategory)->get() as $ca)
                                            {{$ca->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($attribute->parent == 0)
                                            سر دسته مشخصات
                                        @else
                                            @foreach(\App\Models\Attribute::where('id',$attribute->parent)->get() as $ca)


                                                {{$ca->title}}

                                            @endforeach
                                        @endif
                                    </td>
                                    <td><a href="">{{$attribute->position}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$attribute->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                        <a wire:click="trashedCategory({{$attribute->id}})"
                                           class="item-li i-checkouts item-restore"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$attributes->render()}}
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
