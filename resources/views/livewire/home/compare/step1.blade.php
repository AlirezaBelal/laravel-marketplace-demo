<div>
    @section('css')
        <link rel="stylesheet" href="{{asset('css/8a96a58de86637fc.css')}}">
    @endsection

    <div class="grow-1 bg-000 d-flex flex-column w-100 ai-center shrink-0"
         style="padding-top: 108px; padding-left: 0px; padding-bottom: 0px;">
        <div id="base_layout_desktop_static_header" class="w-100"></div>
        <div id="base_layout_desktop_sticky_header"
             class="sticky bg-000 z-3 w-100 BaseLayoutDesktop_BaseLayoutDesktop__stickyHeader__EDgOE"></div>
        <div
            class="grow-1 bg-000 d-flex flex-column w-100 ai-center BaseLayoutDesktop_BaseLayoutDesktop__content__qBCkO container-xl-w px-6 pt-6">
            <div class="PageLoader_PageLoader--hasPageContainer__lznbR d-none"></div>
            <div class="pt-8">
                <div class="d-grid grid-cols-2 gap-1 mx-4 grid-cols-2-lg">
                    <div
                        class="d-flex flex-column ai-center jc-start pos-relative h-full mx-6 br-list-horizontal d-flex"
                        datalayer="[object Object]" productratingcount="123" productid="8202469"
                        producttitleen="Apple iPhone SE 2022 128GB And 4GB RAM Mobile Phone"
                        productpropertiesstatus="marketable" productstatus="marketable">
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
                            <h3 class="color-700 align-right text-body-1 mx-2">{{$product1->title}}</h3>
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
                    <div class="d-flex ai-center jc-center w-full border-r">
                        <button
                            class="relative d-flex ai-center user-select-none Button-module_btn__daEdK text-button-1 Button-module_btn--large__D38zo Button-module_btn--outlined__qZQ8i Button-module_btn--primary__RKxUy radius-medium">
                            <div class="d-flex ai-center jc-center Button-module_btn__loading__47UHk">
                                <div
                                    class="rounded-circle Loading-module_Loading__circle__VPFX- Loading-module_Loading__circle--low-emphasis__BFY3N"></div>
                                <div
                                    class="rounded-circle Loading-module_Loading__circle__VPFX- Loading-module_Loading__circle--low-emphasis__BFY3N"></div>
                                <div
                                    class="rounded-circle Loading-module_Loading__circle__VPFX- Loading-module_Loading__circle--low-emphasis__BFY3N"></div>
                            </div>
                            <div class="d-flex ai-center jc-center relative grow-1">انتخاب کالا</div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column pos-relative mx-4">
                <div class="br-list-vertical-no-padding-200"><h3 class="mt-4 mb-6 text-body-1 color-700">مشخصات</h3>
                    <div class="py-5">
                        @foreach(\App\Models\Attribute::where('childCategory',$product1->childcategory_id)->get() as $attr)
                            <div class=" align-right-lg br-list-vertical-no-padding"><h5
                                    class="color-500 text-body-1 pt-5">{{$attr->title}}</h5>
                                <div class="d-grid grid-cols-2 gap-2 pt-4 pb-5">

                                    <div class="br-list-horizontal">
                                        @foreach(\App\Models\AttributeValue::where('attribute_id',$attr->id)->get() as $atr)
                                        <p class="color-900 text-body-1">
                                              {{$atr->value}}
                                        </p>
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
