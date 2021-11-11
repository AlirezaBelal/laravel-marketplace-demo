<div class="o-page__aside has-pager" id="js-list-aside-wrapper">
    <div class="o-page__aside--listing js-list-aside-container js-sticky" style="">
        <div class="c-listing-sidebar js-list-aside js-sticky-inner" id="js-list-aside"
             style="position: relative;">

            @include('livewire.home.sub-category.aside.category')
            <div class="c-box">
                <div class="c-box__header">جستجو در نتایج:</div>
                <div class="c-box__content">
                    <div class="c-ui-input c-ui-input--quick-search"><input type="text"
                                                                            class="c-ui-input__field c-ui-input__field--cleanable js-cleanable-input"
                                                                            value=""
                                                                            name="searchInput"
                                                                            data-event="search_in_category"
                                                                            data-event-category="search_page"
                                                                            placeholder="نام محصول یا برند مورد نظر را بنویسید…"><span
                            class="c-ui-input-cleaner js-input-cleaner"></span></div>
                </div>
            </div>
            <div class="c-box c-box--brands-filter js-ab-sidebar-filter">
                <div class="">
                    <div class="c-box__header c-box__header--toggleable js-box-toggle ">برند

                    </div>
                    <div class="c-filter c-filter--params js-box-content">
                        <div class="c-ui-input c-ui-input--quick-search"><input type="text"
                                                                                class="c-ui-input__field c-ui-input__field--cleanable js-filter-input js-cleanable-input"
                                                                                placeholder="جستجوی نام برند…"><span
                                class="c-ui-input-cleaner js-input-cleaner"></span></div>
                        <div
                            class="c-message c-message-light c-message-light--info js-message-error u-hidden">
                            <p>برند یا سازنده‌ای با این نام پیدا نشد!</p></div>
                        <div class="c-box__divider c-box__divider--full">
                            <div></div>
                        </div>
                        <div class="c-box__scroll-container">
                            <div class="c-box__scroll js-box-content-items">
                                <ul>
                                    @foreach($brands as $brand)
                                        <li><label class="c-filter__label js-box-content-item"
                                                   for="brand-param-{{$brand->id}}" data-fa="  {{$brand->name}}"
                                                   data-en="  {{$brand->link}}" data-search="  {{$brand->name}}   {{$brand->link}}">
                                            {{$brand->name}}
                                            </label><label class="c-ui-checkbox"><input
                                                    type="checkbox" value="{{$brand->id}}" name="brand[]"
                                                    data-search-uid="brand"
                                                    id="brand-param-{{$brand->id}}"><span
                                                    class="c-ui-checkbox__check"></span></label>
                                        </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-box c-box--brands-filter js-ab-sidebar-filter">
                <div class="">
                    <div class="c-box__header c-box__header--toggleable js-box-toggle ">فروشنده

                    </div>
                    <div class="c-filter c-filter--params js-box-content">
                        <div
                            class="c-message c-message-light c-message-light--info js-message-error u-hidden">
                            <p>برند یا سازنده‌ای با این نام پیدا نشد!</p></div>
                        <div class="c-box__divider c-box__divider--full">
                            <div></div>
                        </div>
                        <div class="c-box__scroll-container">
                            <div class="c-box__scroll js-box-content-items">
                                <ul>
                                    <li><label class="c-filter__label js-box-content-item"
                                               for="seller_condition-param-digikala"
                                               data-fa="دیجی‌کالا" data-en="" data-search=" ">
                                            دیجی‌کالا
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="digikala"
                                                name="seller_condition[]"
                                                data-search-uid="seller_condition"
                                                id="seller_condition-param-digikala"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                    <li><label class="c-filter__label js-box-content-item"
                                               for="seller_condition-param-official"
                                               data-fa="فروشنده رسمی برند" data-en=""
                                               data-search=" ">
                                            فروشنده رسمی برند
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="official"
                                                name="seller_condition[]"
                                                data-search-uid="seller_condition"
                                                id="seller_condition-param-official"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                    <li><label class="c-filter__label js-box-content-item"
                                               for="seller_condition-param-trusted"
                                               data-fa="فروشنده برگزیده" data-en=""
                                               data-search=" ">
                                            فروشنده برگزیده
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="trusted"
                                                name="seller_condition[]"
                                                data-search-uid="seller_condition"
                                                id="seller_condition-param-trusted"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                    <li><label class="c-filter__label js-box-content-item"
                                               for="seller_condition-param-roosta"
                                               data-fa="کسب و کارهای بومی" data-en=""
                                               data-search=" ">
                                            کسب و کارهای بومی
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="roosta"
                                                name="seller_condition[]"
                                                data-search-uid="seller_condition"
                                                id="seller_condition-param-roosta"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var sellerConditionsSectionExists = true;
            </script>
            <div class="c-box js-ab-sidebar-filter" id="digikala_plus_section">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher"><input type="checkbox" value="1"
                                                           name="only_plus"
                                                           id="plus_status-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label><span
                        class="c-filter__label-with-img c-filter__label-with-img--plus">
                فقط کالاهای <img src="https://www.digikala.com/static/files/4a2895fc.svg" alt="پلاس"></span></div>
            </div>
            <div class="c-box">
                <div class="c-filter__sbs-title">
                    با خرید از کالاهایی با امکان ارسال توسط فروشنده سفارش خود را زودتر تحویل
                    بگیرید
                </div>
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher"><input type="checkbox" value="1"
                                                           name="has_ship_by_seller"
                                                           id="has_ship_by_seller-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>امکان
                    ارسال توسط فروشنده
                </div>
            </div>
            <div class="c-box">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher"><input type="checkbox" value="1"
                                                           name="has_jet_delivery"
                                                           id="has_jet_delivery-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>فقط
                    ارسال فوری
                </div>
            </div>
            <div class="c-box js-ab-sidebar-filter">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher"><input type="checkbox" value="1"
                                                           name="has_selling_stock"
                                                           id="stock_status-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>فقط
                    کالاهای موجود
                </div>
            </div>
            <div class="c-box js-ab-sidebar-filter" id="digikala_fake_section">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher"><input type="checkbox" value="1"
                                                           name="only_original"
                                                           id="stock_status-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>فقط
                    کالاهای اصل
                </div>
            </div>
            <div class="c-box js-ready-to-shipment-filter js-ab-sidebar-filter">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher"><input type="checkbox" value="1"
                                                           name="has_ready_to_shipment"
                                                           id="has_ready_to_shipment-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>فقط
                    کالاهای موجود در انبار دیجی‌کالا
                </div>
            </div>
            <div class="c-box">
                <div class="c-box__header c-box__header--toggleable js-box-toggle is-hidden">
                    محدوده قیمت مورد نظر
                </div>
                <div class="c-filter c-filter--range js-box-content" style="display: none">
                    <div class="c-filter__slider">
                        <div
                            class="c-slider js-slider-range noUi-target noUi-rtl noUi-horizontal">
                            <div class="noUi-base">
                                <div class="noUi-origin" style="right: 0%;">
                                    <div class="noUi-handle noUi-handle-lower" data-handle="0"
                                         tabindex="0" role="slider"
                                         aria-orientation="horizontal" aria-valuemin="0.0"
                                         aria-valuemax="100.0" aria-valuenow="0.0"
                                         aria-valuetext="0" style="z-index: 5;"></div>
                                </div>
                                <div class="noUi-connect" style="right: 0%; left: 0%;"></div>
                                <div class="noUi-origin" style="right: 100%;">
                                    <div class="noUi-handle noUi-handle-upper" data-handle="1"
                                         tabindex="0" role="slider"
                                         aria-orientation="horizontal" aria-valuemin="0.0"
                                         aria-valuemax="100.0" aria-valuenow="100.0"
                                         aria-valuetext="117900000" style="z-index: 4;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="c-filter__range">
                        <li data-label="از" data-currency=" تومان"><input type="text"
                                                                          data-value="0"
                                                                          value="0"
                                                                          name="price[min]"
                                                                          data-range="0"
                                                                          class="js-slider-range-from disabled"
                                                                          disabled="disabled">
                        </li>
                        <li data-label="تا" data-currency="تومان"><input type="text"
                                                                         data-value="117900000"
                                                                         value="117900000"
                                                                         name="price[max]"
                                                                         data-range="117900000"
                                                                         class="js-slider-range-to disabled"
                                                                         disabled="disabled">
                        </li>
                    </ul>
                    <div class="c-filter__action">
                        <div class="js-box-content-items u-hidden"><input type="checkbox"
                                                                          name="price[min]"
                                                                          value=""
                                                                          class="js-min-price"><input
                                type="checkbox" name="price[max]" value="" class="js-max-price">
                        </div>
                        <button
                            class="btn-primary btn-primary--filter js-price-filter disabled">
                            اعمال محدوده قیمت
                        </button>
                    </div>
                </div>
            </div>
            <div class="c-box c-box--brands-filter js-ab-test-rating u-hidden">
                <div class="">
                    <div class="c-box__header c-box__header--toggleable js-box-toggle ">امتیاز

                    </div>
                    <div class="c-filter c-filter--params js-box-content">
                        <div
                            class="c-message c-message-light c-message-light--info js-message-error u-hidden">
                            <p>برند یا سازنده‌ای با این نام پیدا نشد!</p></div>
                        <div class="c-box__divider c-box__divider--full">
                            <div></div>
                        </div>
                        <div class="c-box__scroll-container">
                            <div class="c-box__scroll js-box-content-items">
                                <ul>
                                    <li><label
                                            class="c-filter__label c-filter__label--rating js-box-content-item"
                                            for="rate_range-param-4" data-fa="4" data-en=""
                                            data-search=" "><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating"></span>
                                            و بیشتر
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="4" name="rate_range[]"
                                                data-search-uid="rate_range"
                                                id="rate_range-param-4"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                    <li><label
                                            class="c-filter__label c-filter__label--rating js-box-content-item"
                                            for="rate_range-param-3" data-fa="3" data-en=""
                                            data-search=" "><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating "></span><span
                                                class="c-filter__rating"></span>
                                            و بیشتر
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="3" name="rate_range[]"
                                                data-search-uid="rate_range"
                                                id="rate_range-param-3"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                    <li><label
                                            class="c-filter__label c-filter__label--rating js-box-content-item"
                                            for="rate_range-param-2" data-fa="2" data-en=""
                                            data-search=" "><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating "></span><span
                                                class="c-filter__rating "></span><span
                                                class="c-filter__rating"></span>
                                            و بیشتر
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="2" name="rate_range[]"
                                                data-search-uid="rate_range"
                                                id="rate_range-param-2"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                    <li><label
                                            class="c-filter__label c-filter__label--rating js-box-content-item"
                                            for="rate_range-param-1" data-fa="1" data-en=""
                                            data-search=" "><span
                                                class="c-filter__rating c-filter__rating--filled"></span><span
                                                class="c-filter__rating "></span><span
                                                class="c-filter__rating "></span><span
                                                class="c-filter__rating "></span><span
                                                class="c-filter__rating"></span>
                                            و بیشتر
                                        </label><label class="c-ui-checkbox"><input
                                                type="checkbox" value="1" name="rate_range[]"
                                                data-search-uid="rate_range"
                                                id="rate_range-param-1"><span
                                                class="c-ui-checkbox__check"></span></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
