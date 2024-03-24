<div>
    @section('css')
        <link rel="stylesheet" href="{{asset('css/8a96a58de86637fc.css')}}">
    @endsection
        <style>
            .CompareProductItem_CompareProductItem__closeIcon__xAsjK {
                background-color: var(--color-icon-low-emphasis);
                left: 24px;
            }

        </style>
    <div class="grow-1 bg-000 d-flex flex-column w-100 ai-center shrink-0"
         style="padding-top: 108px; padding-left: 0px; padding-bottom: 0px;">
        <div id="base_layout_desktop_static_header" class="w-100"></div>
        <div id="base_layout_desktop_sticky_header"
             class="sticky bg-000 z-3 w-100 BaseLayoutDesktop_BaseLayoutDesktop__stickyHeader__EDgOE"></div>
        <div
            class="grow-1 bg-000 d-flex flex-column w-100 ai-center BaseLayoutDesktop_BaseLayoutDesktop__content__qBCkO container-xl-w px-6 pt-6">
            <div class="PageLoader_PageLoader--hasPageContainer__lznbR d-none"></div>
            <div class="pt-8">
                <div class="d-grid grid-cols-2 gap-1 mx-4 grid-cols-3-lg">
                    <div
                        class="d-flex flex-column ai-center  pos-relative h-full mx-6 br-list-horizontal d-flex"
                        datalayer="[object Object]" productratingcount="62" productid="8217847" producttitleen=""
                        productpropertiesstatus="marketable" productstatus="marketable">
                        <div
                            class="pos-absolute top-0 p-1 radius-circle z-1 CompareProductItem_CompareProductItem__closeIcon__xAsjK">
                            <div class="d-flex pointer">
{{--                                <svg style="width: 12px; height: 12px; fill: var(--color-icon-white);">--}}
{{--                                    <use xlink:href="#close"></use>--}}
{{--                                    <img  style="height: 30px;" src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Times_symbol.svg" alt="">--}}
{{--                                </svg>--}}
                                <img  style="height: 30px;"
                                      wire:click="pic1({{$product1->id}})"
                                      src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Times_symbol.svg" alt="">

                            </div>
                        </div>
                        <div class="mx-7 my-4">
                            <a class="Link-module_Link__9P9LC"
                               href="/product/dkp-{{$product1->id}}/{{$product1->link}}">
                                <figure class="p-1 radius-medium overflow-hidden">
                                    <div class="mx-auto" style="width: 150px; height: 150px;"><img
                                            class="w-100 lazyloaded"
                                            data-src="/storage/{{$product1->img}}"
                                            width="150" height="150"
                                            alt="گوشی موبایل اپل مدل iPhone SE 2022 ظرفیت 128 گیگابایت و رم 4 گیگابایت "
                                            style="object-fit: cover;"
                                            src="/storage/{{$product1->img}}">
                                    </div>
                                </figure>
                            </a>
                            <h3 class="color-700 align-center text-body-1 mx-2">{{$product1->title}}</h3>
                            <div class="d-flex ai-center mt-2 jc-center">
                                <div class="d-flex">
                                    <svg style="width: 16px; height: 16px; fill: var(--color-icon-rating-0-2);">
                                        <use xlink:href="#starFill"></use>
                                    </svg>
                                </div>

                            </div>
                            <div class="mx-auto w-fit-content">
                                <div>
                                    <div class="d-flex ai-center jc-start"><span
                                            class="text-body-1">{{number_format($product1->price)}}</span>
                                        <div class="d-flex ai-center jc-between">
                                            <div class="d-flex ai-center">
                                                <div class="d-flex mr-1">
                                                    <svg
                                                        style="width: 14px; height: 14px; fill: var(--color-icon-high-emphasis);">
                                                        <use xlink:href="#toman"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex flex-column ai-center  pos-relative h-full mx-6 br-list-horizontal d-flex"
                        datalayer="[object Object]" productratingcount="0" productid="7774232" producttitleen=""
                        productpropertiesstatus="marketable" productstatus="marketable">
                        <div
                            class="pos-absolute top-0 p-1 radius-circle z-1 CompareProductItem_CompareProductItem__closeIcon__xAsjK">
                            <div class="d-flex pointer">
{{--                                <svg style="width: 12px; height: 12px; fill: var(--color-icon-white);">--}}
{{--                                    <use xlink:href="#close"></use>--}}
{{--                                </svg>--}}
                                <img  style="height: 30px;"
                                      wire:click="pic2({{$product2->id}})"
                                      src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Times_symbol.svg" alt="">

                            </div>
                        </div>
                        <div class="mx-7 my-4">
                            <a class="Link-module_Link__9P9LC"
                               href="/product/dkp-{{$product2->id}}/{{$product2->link}}">
                                <figure class="p-1 radius-medium overflow-hidden">
                                    <div class="mx-auto" style="width: 150px; height: 150px;"><img
                                            class="w-100 lazyloaded"
                                            data-src="/storage/{{$product2->img}}"
                                            width="150" height="150"
                                            alt="گوشی موبایل اپل مدل iPhone SE 2022 ظرفیت 128 گیگابایت و رم 4 گیگابایت "
                                            style="object-fit: cover;"
                                            src="/storage/{{$product2->img}}">
                                    </div>
                                </figure>
                            </a>
                            <h3 class="color-700 align-center text-body-1 mx-2">{{$product2->title}}</h3>
                            <div class="d-flex ai-center mt-2 jc-center">
                                <div class="d-flex">
                                    <svg style="width: 16px; height: 16px; fill: var(--color-icon-rating-0-2);">
                                        <use xlink:href="#starFill"></use>
                                    </svg>
                                </div>

                            </div>
                            <div class="mx-auto w-fit-content">
                                <div>
                                    <div class="d-flex ai-center jc-start"><span
                                            class="text-body-1">{{number_format($product2->price)}}</span>
                                        <div class="d-flex ai-center jc-between">
                                            <div class="d-flex ai-center">
                                                <div class="d-flex mr-1">
                                                    <svg
                                                        style="width: 14px; height: 14px; fill: var(--color-icon-high-emphasis);">
                                                        <use xlink:href="#toman"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex flex-column pos-relative mx-4">
                <div class="br-list-vertical-no-padding-200"><h3 class="mt-4 mb-6 text-body-1 color-700">مشخصات</h3>
                    <div class="py-5">
                        @foreach(\App\Models\Attribute::where('childCategory',$product2->childcategory_id)->get() as $attr)
                        <div class="align-center align-right-lg br-list-vertical-no-padding"><h5
                                class="color-500 text-body-1 pt-5" style="text-align: right">{{$attr->title}}</h5>
                            <div class="d-grid grid-cols-3 gap-2 pt-4 pb-5">
                                <div class="br-list-horizontal">
                                    @foreach(\App\Models\AttributeValue::where('attribute_id',$attr->id)->get() as $atr)
                                    <p class="color-900 text-body-1"> {{$atr->value}}</p>
                                    @endforeach
                                </div>
                                <div class="br-list-horizontal">
                                    @foreach(\App\Models\AttributeValue::where('attribute_id',$attr->id)->get() as $atr)
                                    <p class="color-900 text-body-1">   {{$atr->value}}</p>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
