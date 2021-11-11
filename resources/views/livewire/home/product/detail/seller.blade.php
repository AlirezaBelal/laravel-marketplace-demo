@if($product->publish_product == 1)
<div class="js-c-box-suppliers c-box-suppliers" id="suppliers"
     xmlns="http://www.w3.org/1999/html">
    <div class="c-box-suppliers__headline-container">
        <div class="o-box__header"><span class="o-box__title">لیست فروشندگان این کالا</span>
        </div>
        <div class="o-headline__sort u-hidden"><label>فیلتر فروشندگان بر اساس : </label>
            <div
                class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select selectric-js-color-select">
                <div class="selectric-hide-select"><select
                        class="c-ui-select js-ui-select js-color-select" data-type="color"
                        tabindex="-1">
                        <option value="2">رنگ : سفید</option>
                        <option value="1">رنگ : مشکی</option>
                        <option value="4">رنگ : آبی</option>
                        <option value="119">رنگ : آبی رویال</option>
                    </select></div>
                <div class="selectric"><span class="label">رنگ : سفید</span><b
                        class="button">▾</b>
                </div>
                <div class="selectric-items" tabindex="-1">
                    <div class="selectric-scroll">
                        <ul>
                            <li data-index="0" class="selected">رنگ : سفید</li>
                            <li data-index="1" class="">رنگ : مشکی</li>
                            <li data-index="2" class="">رنگ : آبی</li>
                            <li data-index="3" class="last">رنگ : آبی رویال</li>
                        </ul>
                    </div>
                </div>
                <input class="u-hidden" tabindex="0"></div>
        </div>
    </div>

    <div class="c-box">
        <div class="c-table-suppliers js-c-table-suppliers--summary">
            <div class="c-table-suppliers__body">
                @foreach($productSeller_max_price_all as $seller)
                    @php
                    $vendor_name = \App\Models\User::where('id',$seller->vendor_id)->first();
                    @endphp
                    <div
                        class="c-table-suppliers__row js-supplier c-table-suppliers__row--head in-filter c-table-suppliers__row--active in-list"
                        data-variant="9832233">
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--title"><span
                                class="c-table-suppliers__seller-icon   is-digikala"></span>
                            <div class="c-table-suppliers__seller-wrapper"><p
                                    class="c-table-suppliers__seller-name"><a
                                        data-snt-event="dkProductPageClick"
                                        data-snt-params="{&quot;item&quot;:&quot;seller-in-list&quot;,&quot;item_option&quot;:&quot;دیجی‌کالا&quot;}"
                                        href="/seller/5a52n/">
                                        {{$vendor_name->name  ?? 'None'}}
                                    </a></p>
                                <div class="c-product__seller-second-line"><span><span
                                            class="u-text-bold good">۸۷٪</span> رضایت خریداران
                                <span class=" u-divider"></span></span>

                                    عملکرد
                                    <span class="u-text-bold excellent">
                                عالی
                            </span></div>
                                <p></p></div>
                            <div class="c-table-suppliers__seller-info summary-overlay">
                                <div class="c-seller-rating u-select-none ">
                                    <div class="c-seller-rating__title ">
                                        {{$vendor_name->name  ?? 'None'}}
                                    </div>
                                    <div
                                        class="c-seller-rating__subtitle js-seller-register-time u-hidden">
                                        عضویت از <label class="u-mx-4 js-sellerTimeAgo">۴ سال و ۱۱
                                            ماه</label> پیش
                                    </div>
                                    <div class="u-mt-16  ">
                                        <div
                                            class="c-seller-rating__text u-items-center u-flex-col">
                                            <div
                                                class=" good c-seller-rating__bold-text c-seller-rating__text-color js-seller-total-rate-color">
                                                <label class="js-total-rate">۸۷</label>٪
                                            </div>
                                            <div
                                                class="c-seller-rating__thin-text u-flex u-items-center u-font-bold">
                                                رضایت خریداران از کیفیت کالا
                                                <div
                                                    class="u-hidden js-dk-wiki-trigger c-wiki c-wiki__holder c-product__user-suggestion-line-info-icon">
                                                    <div
                                                        class="c-wiki__container js-dk-wiki is-right  is-black">
                                                        <div class="c-wiki__arrow"></div>
                                                        <p class="c-wiki__text">
                                                            این عدد درصد رضایت خریداران از کیفیت
                                                            کالای
                                                            این فروشنده را نشان می‌دهد. میزان رضایت
                                                            توسط
                                                            خریداران کالا با شرکت در نظرسنجی تعیین
                                                            می‌شود.
                                                        </p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="u-mb-12 c-seller-rating__subtitle c-seller-rating__subtitle--center">
                                            از مجموع<label class="u-mx-4 js-total-count">۱۲۰</label>نفر
                                        </div>
                                        <div class="c-seller-rating__row-rating">
                                            <div class="c-line-graph__container">
                                                <div class="c-line-graph ">
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--5"
                                                        style="width: 53%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--4"
                                                        style="width: 39%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--3"
                                                        style="width: 2%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--2"
                                                        style="width: 4%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--1"
                                                        style="width: 3%"></div>
                                                </div>
                                                <div class="c-line-graph__labels">
                                                    <div
                                                        class="c-line-graph__label js-line-graph-right-label">
                                                        کاملا راضی
                                                    </div>
                                                    <div
                                                        class="c-line-graph__label js-line-graph-left-label">
                                                        کاملا ناراضی
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="c-seller-rating__bottom c-seller-rating__text u-items-center u-flex-col">
                                        <div
                                            class="excellent c-seller-rating__bold-text c-seller-rating__text-color js-finalScore">
                                            عالی
                                        </div>
                                        <div class="c-seller-rating__thin-text u-font-bold">
                                            عملکرد کلی فروشنده
                                        </div>
                                    </div>
                                    <div
                                        class="c-seller-rating__ratings u-flex u-justify-between u-text-center u-mt-8 ">
                                        <div>
                                            <div
                                                class="c-seller-rating__percent u-text-16 u-font-extrabold excellent gray">
                                                ۱۰۰٪
                                            </div>
                                            <div class="u-text-11 u-text-n-500 u-leading-normal">
                                                تامین
                                                به موقع
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="c-seller-rating__percent u-text-16 u-font-extrabold excellent gray">
                                                ۱۰۰٪
                                            </div>
                                            <div class="u-text-11 u-text-n-500 u-leading-normal">
                                                تعهد
                                                ارسال
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="c-seller-rating__percent u-text-16 u-font-extrabold excellent gray">
                                                ۹۹.۹٪
                                            </div>
                                            <div class="u-text-11 u-text-n-500 u-leading-normal">
                                                بدون
                                                ثبت مرجوعی
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--conditions">
                            <div
                                class="c-table-suppliers__sender c-table-suppliers__sender--digikala no-lead-time">
                                @if($seller->time ==0)
                                    ارسال از انبار دیجی کالا
                                @else
                                    {{\App\Models\PersianNumber::translate($seller->time)}}
                                    روز کاری
                                @endif

                            </div>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--guarantee">
                            <span>     {{$seller->warranty['name']}}</span>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--price ">
                            <div class="c-price">
                                <div class="c-price__value js-seller-section-price">
                                    {{\App\Models\PersianNumber::translate($seller->discount_price)}}
                                </div>
                                <div class="c-price__value js-ab-seller-section-price u-hidden">
                                    ۴.۰۹۸ میلیون
                                </div>
                            </div>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--action"><a
                                class=" o-btn o-btn--outlined-red-md js-variant-add-to-cart js-btn-add-to-cart"
                                href="/cart/add/9832233/1/" data-variant="9832233"
                                data-snt-event="dkProductPageClick"
                                data-snt-params="{&quot;item&quot;:&quot;seller-add-to-cart&quot;,&quot;item_option&quot;:null}"
                                data-event="add_to_cart" data-event-category="ecommerce"
                                data-event-label="items: price: 40980000 - seller: retail - multiple_configs: True - position: 2">
                                افزودن به سبد
                            </a></div>
                    </div>
                @endforeach
                @foreach($productSeller_max_price_all_init as $seller)
                    <div
                        class="c-table-suppliers__row js-supplier c-table-suppliers__row--head list_inlist in-filter c-table-suppliers__row--active"
                        data-variant="9832233">
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--title"><span
                                class="c-table-suppliers__seller-icon   is-digikala"></span>
                            <div class="c-table-suppliers__seller-wrapper"><p
                                    class="c-table-suppliers__seller-name"><a
                                        data-snt-event="dkProductPageClick"
                                        data-snt-params="{&quot;item&quot;:&quot;seller-in-list&quot;,&quot;item_option&quot;:&quot;دیجی‌کالا&quot;}"
                                        href="/seller/5a52n/">
                                        {{$vendor_name->name  ?? 'None'}}
                                    </a></p>
                                <div class="c-product__seller-second-line"><span><span
                                            class="u-text-bold good">۸۷٪</span> رضایت خریداران
                                <span class=" u-divider"></span></span>

                                    عملکرد
                                    <span class="u-text-bold excellent">
                                عالی
                            </span></div>
                                <p></p></div>
                            <div class="c-table-suppliers__seller-info summary-overlay">
                                <div class="c-seller-rating u-select-none ">
                                    <div class="c-seller-rating__title ">
                                        {{$vendor_name->name  ?? 'None'}}
                                    </div>
                                    <div
                                        class="c-seller-rating__subtitle js-seller-register-time u-hidden">
                                        عضویت از <label class="u-mx-4 js-sellerTimeAgo">۴ سال و ۱۱
                                            ماه</label> پیش
                                    </div>
                                    <div class="u-mt-16  ">
                                        <div
                                            class="c-seller-rating__text u-items-center u-flex-col">
                                            <div
                                                class=" good c-seller-rating__bold-text c-seller-rating__text-color js-seller-total-rate-color">
                                                <label class="js-total-rate">۸۷</label>٪
                                            </div>
                                            <div
                                                class="c-seller-rating__thin-text u-flex u-items-center u-font-bold">
                                                رضایت خریداران از کیفیت کالا
                                                <div
                                                    class="u-hidden js-dk-wiki-trigger c-wiki c-wiki__holder c-product__user-suggestion-line-info-icon">
                                                    <div
                                                        class="c-wiki__container js-dk-wiki is-right  is-black">
                                                        <div class="c-wiki__arrow"></div>
                                                        <p class="c-wiki__text">
                                                            این عدد درصد رضایت خریداران از کیفیت
                                                            کالای
                                                            این فروشنده را نشان می‌دهد. میزان رضایت
                                                            توسط
                                                            خریداران کالا با شرکت در نظرسنجی تعیین
                                                            می‌شود.
                                                        </p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="u-mb-12 c-seller-rating__subtitle c-seller-rating__subtitle--center">
                                            از مجموع<label class="u-mx-4 js-total-count">۱۲۰</label>نفر
                                        </div>
                                        <div class="c-seller-rating__row-rating">
                                            <div class="c-line-graph__container">
                                                <div class="c-line-graph ">
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--5"
                                                        style="width: 53%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--4"
                                                        style="width: 39%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--3"
                                                        style="width: 2%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--2"
                                                        style="width: 4%"></div>
                                                    <div
                                                        class="c-line-graph__item c-line-graph__item--1"
                                                        style="width: 3%"></div>
                                                </div>
                                                <div class="c-line-graph__labels">
                                                    <div
                                                        class="c-line-graph__label js-line-graph-right-label">
                                                        کاملا راضی
                                                    </div>
                                                    <div
                                                        class="c-line-graph__label js-line-graph-left-label">
                                                        کاملا ناراضی
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="c-seller-rating__bottom c-seller-rating__text u-items-center u-flex-col">
                                        <div
                                            class="excellent c-seller-rating__bold-text c-seller-rating__text-color js-finalScore">
                                            عالی
                                        </div>
                                        <div class="c-seller-rating__thin-text u-font-bold">
                                            عملکرد کلی فروشنده
                                        </div>
                                    </div>
                                    <div
                                        class="c-seller-rating__ratings u-flex u-justify-between u-text-center u-mt-8 ">
                                        <div>
                                            <div
                                                class="c-seller-rating__percent u-text-16 u-font-extrabold excellent gray">
                                                ۱۰۰٪
                                            </div>
                                            <div class="u-text-11 u-text-n-500 u-leading-normal">
                                                تامین
                                                به موقع
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="c-seller-rating__percent u-text-16 u-font-extrabold excellent gray">
                                                ۱۰۰٪
                                            </div>
                                            <div class="u-text-11 u-text-n-500 u-leading-normal">
                                                تعهد
                                                ارسال
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="c-seller-rating__percent u-text-16 u-font-extrabold excellent gray">
                                                ۹۹.۹٪
                                            </div>
                                            <div class="u-text-11 u-text-n-500 u-leading-normal">
                                                بدون
                                                ثبت مرجوعی
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--conditions">
                            <div
                                class="c-table-suppliers__sender c-table-suppliers__sender--digikala no-lead-time">
                                @if($seller->time ==0)
                                    ارسال از انبار دیجی کالا
                                @else
                                    {{\App\Models\PersianNumber::translate($seller->time)}}
                                    روز کاری
                                @endif

                            </div>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--guarantee">
                            <span>     {{$seller->warranty['name']}}</span>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--price ">
                            <div class="c-price">
                                <div class="c-price__value js-seller-section-price">
                                    {{\App\Models\PersianNumber::translate($seller->discount_price)}}
                                </div>
                                <div class="c-price__value js-ab-seller-section-price u-hidden">
                                    ۴.۰۹۸ میلیون
                                </div>
                            </div>
                        </div>
                        <div class="c-table-suppliers__cell c-table-suppliers__cell--action"><a
                                class=" o-btn o-btn--outlined-red-md js-variant-add-to-cart js-btn-add-to-cart"
                                href="/cart/add/9832233/1/" data-variant="9832233"
                                data-snt-event="dkProductPageClick"
                                data-snt-params="{&quot;item&quot;:&quot;seller-add-to-cart&quot;,&quot;item_option&quot;:null}"
                                data-event="add_to_cart" data-event-category="ecommerce"
                                data-event-label="items: price: 40980000 - seller: retail - multiple_configs: True - position: 2">
                                افزودن به سبد
                            </a></div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="c-table-suppliers-less c-table-suppliers-hidden js-table-suppliers-less" id="d4">
            <button data-snt-event="dkProductPageClick" onclick="dkProductPageClick()"
                    data-snt-params="{&quot;item&quot;:&quot;show-fewer-supplier&quot;,&quot;item_option&quot;:null}"
                    class="o-btn o-btn--link-blue-sm o-btn--remove-padding o-btn--l-expand-more is-open js-less-supplier-button"
                    data-is-open="0">
                تنها نمایش ۳ فروشنده اول
            </button>
        </div>
        <div class="c-table-suppliers-more js-table-suppliers-more">
            <button onclick="dkProductPageClick()"
                    class="o-btn o-btn--link-blue-sm o-btn--l-expand-more o-btn--remove-padding js-more-supplier-button"
                    data-is-open="0" data-snt-event="dkProductPageClick"
                    data-snt-params="{&quot;item&quot;:&quot;show-more-supplier&quot;,&quot;item_option&quot;:null}"
                    data-event="more_sellers" data-event-category="product_page"
                    data-event-label="3048126-category: گوشی موبایل, sellers: 8 - default_seller: marketplace">
                نمایش
                <span
                    class="u-ml-4 u-mr-4 js-more-suppliers-count">{{\App\Models\PersianNumber::translate($productSeller_count)}}</span>
                فروشنده دیگر این کالا
            </button>
        </div>
    </div>
</div>
<script>
    function dkProductPageClick() {
        let element_list = document.getElementsByClassName('list_inlist');
        let elements = document.getElementsByClassName('js-table-suppliers-more');
        if (document.getElementById("d4").classList.contains('c-table-suppliers-hidden')) {
            document.getElementById("d4").classList.remove('c-table-suppliers-hidden')
            elements[0].classList.add('c-table-suppliers-hidden')
            for (let i = 0; i < element_list.length ; i++)
            {
                element_list[i].classList.add('in-list');
            }
        } else {
            elements[0].classList.remove('c-table-suppliers-hidden')
            document.getElementById("d4").classList.add('c-table-suppliers-hidden')
            element_list[0].classList.remove('in-list');
            for (let i = 0; i < element_list.length ; i++)
            {
                element_list[i].classList.remove('in-list');
            }
        }
    }
</script>
@endif
