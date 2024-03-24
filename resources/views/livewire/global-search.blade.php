<div style="display:contents;">
    <div class="c-header__search">
        <div class="c-search js-search"
             data-event="using_search_box" data-event-category="header_section">
{{--            @if(count($results) || $search)--}}
                <span wire:click="resetForm"
                      class="c-search__reset u-hidden js-search-reset">
{{--@endif--}}
                        </span>
                <input type="text" name="q"
                       placeholder="جستجو در دیجی‌کالا …"
                       class="js-search-input"
                       autocomplete="off" wire:model.debounce.300ms="search">
                <div class="c-search__results js-search-results">
                    <ul class="js-autosuggest-results-list c-search__results-list
             c-search__results-list--autosuggest">

                    </ul>
                    <ul class="js-results-list c-search__results-list"></ul>
                    <ul class="js-autosuggest-empty-list c-search__results-list">
                        <li><a class="js-search-keyword-link" href="javascript:">
                        <span
                            class="c-search__result-item
                            c-search__result-icon c-search__result-icon--group">
                            نمایش همه نتایج برای </span><span
                                    class="c-search__result-item--category js-search-keyword"></span></a></li>
                    </ul>
                    <ul class="c-search__results-list c-search__results-list--history  "></ul>
                    @if(strlen($search) >= 3 && !count($results))
                        <div class="c-search__results-footer">
                            هیچ نتیجه ای برای جستجوی شما یافت نشد.

                        </div>
                    @else

                        <div class="c-search__results-footer">
                            بیشترین جستجوهای اخیر:
                            <div class="d-flex w-full">
                                <div class="gap-2 w-full">
                                    <div
                                        class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-rtl"
                                        style="margin-bottom: -120px">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide swiper-slide-active"
                                                 style="width: auto; height: auto; margin-left: 8px;"><a
                                                    class="d-inline-block shrink-0 mr-14"
                                                    data-cro-id="searchbox-popular-search" href="/search/?q=pubg">
                                                    <div
                                                        class="d-flex ai-center Chip-module_Chip__HWK4W Chip-module_Chip--radius-medium__RUbhT Chip-module_Chip--medium__jya8B py-2 px-3 text-body-1 pl-1-xs">
                                                        <span>pubg</span>
                                                        <div class="d-flex mr-1">
                                                            <svg
                                                                style="width: 20px; height: 20px; fill: var(--color-icon-high-emphasis);">
                                                                <use xlink:href="#chevronLeft"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a></div>
                                            <div class="swiper-slide swiper-slide-next"
                                                 style="width: auto; height: auto; margin-left: 8px;"><a
                                                    class="d-inline-block shrink-0"
                                                    data-cro-id="searchbox-popular-search"
                                                    href="/search/?q=%D9%BE%D8%A7%D8%A8%D8%AC%DB%8C">
                                                    <div
                                                        class="d-flex ai-center Chip-module_Chip__HWK4W Chip-module_Chip--radius-medium__RUbhT Chip-module_Chip--medium__jya8B py-2 px-3 text-body-1 pl-1-xs">
                                                        <span>پابجی</span>
                                                        <div class="d-flex mr-1">
                                                            <svg
                                                                style="width: 20px; height: 20px; fill: var(--color-icon-high-emphasis);">
                                                                <use xlink:href="#chevronLeft"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a></div>
                                            <div class="swiper-slide"
                                                 style="width: auto; height: auto; margin-left: 8px;">
                                                <a class="d-inline-block shrink-0"
                                                   data-cro-id="searchbox-popular-search"
                                                   href="/search/?q=%DA%A9%D8%AA%D8%A7%D8%A8+%D9%85%D9%86+%D8%A7%D8%AD%D9%85%D9%82">
                                                    <div
                                                        class="d-flex ai-center Chip-module_Chip__HWK4W Chip-module_Chip--radius-medium__RUbhT Chip-module_Chip--medium__jya8B py-2 px-3 text-body-1 pl-1-xs">
                                                        <span>کتاب من احمق</span>
                                                        <div class="d-flex mr-1">
                                                            <svg
                                                                style="width: 20px; height: 20px; fill: var(--color-icon-high-emphasis);">
                                                                <use xlink:href="#chevronLeft"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a></div>
                                            <div class="swiper-slide"
                                                 style="width: auto; height: auto; margin-left: 8px;">
                                                <a class="d-inline-block shrink-0"
                                                   data-cro-id="searchbox-popular-search"
                                                   href="/search/?q=%D9%85%D9%86+%D8%A7%D8%AD%D9%85%D9%82">
                                                    <div
                                                        class="d-flex ai-center Chip-module_Chip__HWK4W Chip-module_Chip--radius-medium__RUbhT Chip-module_Chip--medium__jya8B py-2 px-3 text-body-1 pl-1-xs">
                                                        <span>من احمق</span>
                                                        <div class="d-flex mr-1">
                                                            <svg
                                                                style="width: 20px; height: 20px; fill: var(--color-icon-high-emphasis);">
                                                                <use xlink:href="#chevronLeft"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a></div>
                                            <div class="swiper-slide"
                                                 style="width: auto; height: auto; margin-left: 8px;">
                                                <a class="d-inline-block shrink-0 ml-2"
                                                   data-cro-id="searchbox-popular-search"
                                                   href="/search/?q=%DA%A9%D8%B1%D9%87+%D9%BE%D8%A7%D8%B3%D8%AA%D9%88%D8%B1%DB%8C%D8%B2%D9%87">
                                                    <div
                                                        class="d-flex ai-center Chip-module_Chip__HWK4W Chip-module_Chip--radius-medium__RUbhT Chip-module_Chip--medium__jya8B py-2 px-3 text-body-1 pl-1-xs">
                                                        <span>کره پاستوریزه</span>
                                                        <div class="d-flex mr-1">
                                                            <svg
                                                                style="width: 20px; height: 20px; fill: var(--color-icon-high-emphasis);">
                                                                <use xlink:href="#chevronLeft"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a></div>
                                        </div>
                                        <div
                                            class="Slider-module_Slider__next-button-selector__GtwEi d-none d-flex-lg jc-center ai-center bg-000 pos-absolute pointer z-5 radius-circle ScrollHorizontalWrapper_ScrollHorizontalWrapper__button__ivZXa ScrollHorizontalWrapper_ScrollHorizontalWrapper__button--next__2a79G ScrollHorizontalWrapper_ScrollHorizontalWrapper__button--small__vhwl7 shadow-fab-button">
                                            <div class="d-flex">
                                                <svg
                                                    style="width: 24px; height: 24px; fill: var(--color-icon-high-emphasis);">
                                                    <use xlink:href="#chevronLeft"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div
                                            class="Slider-module_Slider__prev-button-selector__kfnhy d-none d-flex-lg jc-center ai-center bg-000 pos-absolute pointer z-5 radius-circle ScrollHorizontalWrapper_ScrollHorizontalWrapper__button__ivZXa ScrollHorizontalWrapper_ScrollHorizontalWrapper__button--prev__XgdlI ScrollHorizontalWrapper_ScrollHorizontalWrapper__button--small__vhwl7 shadow-fab-button d-none-lg">
                                            <div class="d-flex">
                                                <svg
                                                    style="width: 24px; height: 24px; fill: var(--color-icon-high-emphasis);">
                                                    <use xlink:href="#chevronRight"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="c-search__results-list  ">
                        <style>
                            .c-search__results-list {
                                display: block !important;
                            }

                            .breakpoint .text-body-1 {
                                font-size: 1.4rem;
                                font-weight: 400;
                                line-height: 2.15;
                            }

                            .breakpoint .pl-1-xs {
                                padding-left: calc(1 * var(--spacing-base));
                            }
                        </style>
                        @foreach($results as $group =>$entries)

                            <div class="c-search__banner">
                                @if($group == 'product')
                                    <div style="font-size: 1.1rem;
    font-weight: 700;
    line-height: 2.15; ">محصولات
                                    </div>
                                @endif

                                @foreach($entries as $entry)

                                    <a style="display: flex;"
                                       @php
                                           foreach ($entry['link'] as $link =>$value){
            $link = $value;
        }
                                       @endphp
                                       @foreach($entry['id'] as $id =>$value)
                                       href="/product/dkp-{{$value}}/{{$link}}"
                                       @endforeach
                                       data-id="60064"
                                       target="_blank" class="js-search-banner-ga">

                                        <img class="d-flex"
                                             @foreach($entry['name'] as $name =>$value)

                                             alt="{{$value}}"
                                             @endforeach
                                             @foreach($entry['img'] as $img => $value)
                                             src="/storage/{{$value}}" height="70" width="60"

                                             @endforeach


                                             loading="lazy"/>
                                        @foreach($entry['name'] as $name =>$value)

                                            {{$value}}
                                        @endforeach
                                    </a>
                                @endforeach

                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

</div>
