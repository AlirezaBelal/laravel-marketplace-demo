@if($product->publish_product == 1)
    <div class="c-product__summary js-product-summary">
        <div class="c-box">
            <div class="c-product__seller-info js-seller-info">
                <div class="js-seller-info-changable c-product__seller-box">
                    <div class="c-product__seller-counter">
                        <div>فروشنده</div>
                        <a href="#suppliers" class="js-seller-count-row"><span
                                class="js-seller-count u-text-bold">{{\App\Models\PersianNumber::translate($productSeller_count)}}</span><span
                                class="u-text-bold"> فروشنده</span>
                            دیگر
                        </a></div>
                    <div
                        class="c-product__seller-row c-product__seller-row--dk c-product__seller-row--clickable js-seller-info-seller js-seller-variant js-ab-seller-info-row c-product__seller-row--summary-overlay">
                        <a target="_blank" onclick="event.stopPropagation()"
                           href="/seller/5a52n/"
                           class="js-sellerUrl c-product__seller-row--summary-overlay-link js-ab-seller-info-link-overlay js-ab-seller-info-link"></a><i
                            class="c-product__seller-row--trusted-seller js-mini-not-digikala-seller js-mini-is-trusted u-hidden"></i><i
                            class="c-product__seller-row--official-seller js-mini-not-digikala-seller js-mini-is-official u-hidden"></i>
                        <div
                            class="c-product__seller-row-main c-product__seller-row-main--arrow-left">
                            <div class="c-product__seller-first-line"><span
                                    class="c-product__seller-name js-seller-name">{{$productSeller_max_price_first->vendor['name'] ?? ''}}</span><span
                                    class="c-product__seller-details-badge-container js-seller-badge js-seller-trusted u-hidden"><span
                                        class="c-badge-seller c-badge-seller--prominent">برگزیده</span></span><span
                                    class="c-product__seller-details-badge-container js-seller-badge js-seller-official u-hidden"><span
                                        class="c-badge-seller c-badge-seller--official">رسمی</span></span>
                            </div>
                            <div
                                class="c-product__seller-second-line js-seller-final-score-container"><span
                                    class="js-seller-rate-container"><span
                                        class="u-text-bold js-seller-rate good">۸۷٪</span> رضایت خریداران
                    <span class="u-divider"></span></span>
                                عملکرد
                                <span
                                    class="u-text-bold js-seller-final-score excellent">عالی</span>
                            </div>
                            <div
                                class="c-product__seller-second-line js-seller-empty-score u-hidden">
                                عملکرد محاسبه نشده
                            </div>
                            <a onclick="event.stopPropagation()" target="_blank"
                               class="js-ab-seller-info-link u-hidden"
                               href="/seller/5a52n/">
                                <div class="c-product__seller-row-pdp-seller-link">
                                    مشاهده این فروشگاه
                                </div>
                            </a></div>
                        <div
                            class="c-table-suppliers__seller-info u-event-none summary-overlay">
                            <div
                                class="c-seller-rating u-select-none js-buyBox-seller-info">
                                <div
                                    class="c-seller-rating__title c-seller-rating__title--inBuyBox">
                                    <div
                                        class="js-sellerName c-product-info-box__dk-title-logo">
                                        دیجی‌کالا
                                    </div>
                                </div>
                                <div
                                    class="c-seller-rating__subtitle js-seller-register-time u-hidden">
                                    عضویت از <label class="u-mx-4 js-sellerTimeAgo">۴
                                        سال و
                                        ۱۱ ماه</label> پیش
                                </div>
                                <div class="u-mt-16 js-rateStats-holder">
                                    <div
                                        class="c-seller-rating__text u-items-center u-flex-col">
                                        <div
                                            class="c-seller-rating__bold-text c-seller-rating__text-color js-seller-total-rate-color good">
                                            <label class="js-total-rate">۸۷</label>٪
                                        </div>
                                        <div
                                            class="c-seller-rating__thin-text u-flex u-items-center u-font-bold">
                                            رضایت خریداران از کیفیت کالا
                                        </div>
                                    </div>
                                    <div
                                        class="u-mb-12 c-seller-rating__subtitle c-seller-rating__subtitle--center">
                                        از مجموع<label
                                            class="u-mx-4 js-total-count">۱۲۰</label>نفر
                                    </div>
                                    <div class="c-seller-rating__row-rating">
                                        <div class="c-line-graph__container">
                                            <div
                                                class="c-line-graph js-line-graph-holder">
                                                <div
                                                    class="c-line-graph__item c-line-graph__item--5"
                                                    style="width:52.5%"></div>
                                                <div
                                                    class="c-line-graph__item c-line-graph__item--4"
                                                    style="width:39.17%"></div>
                                                <div
                                                    class="c-line-graph__item c-line-graph__item--3"
                                                    style="width:1.67%"></div>
                                                <div
                                                    class="c-line-graph__item c-line-graph__item--2"
                                                    style="width:4.17%"></div>
                                                <div
                                                    class="c-line-graph__item c-line-graph__item--1"
                                                    style="width:2.5%"></div>
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
                                        class="c-seller-rating__bold-text c-seller-rating__text-color js-finalScore excellent">
                                        عالی
                                    </div>
                                    <div class="c-seller-rating__thin-text u-font-bold">
                                        عملکرد کلی فروشنده
                                    </div>
                                </div>
                                <div
                                    class="c-seller-rating__ratings u-flex u-justify-between u-text-center u-mt-8 js-round-progress-holder c-seller-rating__ratings--buy-box">
                                    <div>
                                        <div
                                            class="c-seller-rating__percent u-text-16 u-font-extrabold excellent js-shipOnTimePer gray"
                                            data-value="100">۱۰۰٪
                                        </div>
                                        <div
                                            class="u-text-11 u-text-n-500 u-leading-normal">
                                            تامین به موقع
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="c-seller-rating__percent u-text-16 u-font-extrabold excellent js-cancelPer gray"
                                            data-value="100">۱۰۰٪
                                        </div>
                                        <div
                                            class="u-text-11 u-text-n-500 u-leading-normal">
                                            تعهد ارسال
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="c-seller-rating__percent u-text-16 u-font-extrabold excellent js-returnPer gray"
                                            data-value="99.9">۹۹.۹٪
                                        </div>
                                        <div
                                            class="u-text-11 u-text-n-500 u-leading-normal">
                                            بدون ثبت مرجوعی
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-info-box js-seller-info-expand">
                        <div class="c-product-info-box__header">
                            <div
                                class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>
                            <div><label>اطلاعات تکمیلی فروشنده</label><span
                                    class="c-product-info-box__seller-info-modal js-seller-rate-info-modal"></span>
                            </div>
                        </div>
                        <div class="c-product-info-box__body-wrapper">
                            <div class="c-product-info-box__body">
                                <div
                                    class="u-p-16 c-product-info-box__seller-detail-box">
                                    <div
                                        class="c-seller-rating u-select-none js-buyBox-seller-info">
                                        <div
                                            class="c-seller-rating__title c-seller-rating__title--inBuyBox">
                                            <div
                                                class="js-sellerName c-product-info-box__dk-title-logo">
                                                دیجی‌کالا
                                            </div>
                                            <a class="js-sellerUrl u-hidden"
                                               href="/seller/۵a۵۲n/">صفحه فروشنده</a>
                                        </div>
                                        <div
                                            class="c-seller-rating__subtitle js-seller-register-time u-hidden">
                                            عضویت از <label
                                                class="u-mx-4 js-sellerTimeAgo">۴
                                                سال و ۱۱ ماه</label> پیش
                                        </div>
                                        <div class="u-mt-16 js-rateStats-holder">
                                            <div
                                                class="c-seller-rating__text u-items-center u-flex-col">
                                                <div
                                                    class="c-seller-rating__bold-text c-seller-rating__text-color js-seller-total-rate-color good">
                                                    <label
                                                        class="js-total-rate">۸۷</label>٪
                                                </div>
                                                <div
                                                    class="c-seller-rating__thin-text u-flex u-items-center u-font-bold">
                                                    رضایت خریداران از کیفیت کالا
                                                    <div
                                                        class=" js-dk-wiki-trigger c-wiki c-wiki__holder c-product__user-suggestion-line-info-icon">
                                                        <div
                                                            class="c-wiki__container js-dk-wiki is-right  is-black">
                                                            <div
                                                                class="c-wiki__arrow"></div>
                                                            <p class="c-wiki__text">
                                                                این عدد درصد رضایت
                                                                خریداران
                                                                از کیفیت کالای این
                                                                فروشنده
                                                                را نشان می‌دهد. میزان
                                                                رضایت
                                                                توسط خریداران کالا با
                                                                شرکت
                                                                در نظرسنجی تعیین می‌شود.
                                                            </p></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="u-mb-12 c-seller-rating__subtitle c-seller-rating__subtitle--center">
                                                از مجموع<label
                                                    class="u-mx-4 js-total-count">۱۲۰</label>نفر
                                            </div>
                                            <div class="c-seller-rating__row-rating">
                                                <div class="c-line-graph__container">
                                                    <div
                                                        class="c-line-graph js-line-graph-holder">
                                                        <div
                                                            class="c-line-graph__item c-line-graph__item--5"
                                                            style="width:52.5%"></div>
                                                        <div
                                                            class="c-line-graph__item c-line-graph__item--4"
                                                            style="width:39.17%"></div>
                                                        <div
                                                            class="c-line-graph__item c-line-graph__item--3"
                                                            style="width:1.67%"></div>
                                                        <div
                                                            class="c-line-graph__item c-line-graph__item--2"
                                                            style="width:4.17%"></div>
                                                        <div
                                                            class="c-line-graph__item c-line-graph__item--1"
                                                            style="width:2.5%"></div>
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
                                                class="c-seller-rating__bold-text c-seller-rating__text-color js-finalScore excellent">
                                                عالی
                                            </div>
                                            <div
                                                class="c-seller-rating__thin-text u-font-bold">
                                                عملکرد کلی فروشنده
                                            </div>
                                        </div>
                                        <div
                                            class="c-seller-rating__ratings u-flex u-justify-between u-text-center u-mt-8 js-round-progress-holder c-seller-rating__ratings--buy-box">
                                            <div>
                                                <div
                                                    class="c-seller-rating__percent u-text-16 u-font-extrabold excellent js-shipOnTimePer gray"
                                                    data-value="100">۱۰۰٪
                                                </div>
                                                <div
                                                    class="u-text-11 u-text-n-500 u-leading-normal">
                                                    تامین به موقع
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="c-seller-rating__percent u-text-16 u-font-extrabold excellent js-cancelPer gray"
                                                    data-value="100">۱۰۰٪
                                                </div>
                                                <div
                                                    class="u-text-11 u-text-n-500 u-leading-normal">
                                                    تعهد ارسال
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="c-seller-rating__percent u-text-16 u-font-extrabold excellent js-returnPer gray"
                                                    data-value="99.9">۹۹.۹٪
                                                </div>
                                                <div
                                                    class="u-text-11 u-text-n-500 u-leading-normal">
                                                    بدون ثبت مرجوعی
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="c-product__seller-row c-product__seller-row--guarantee c-product__seller-row--clickable js-seller-info-guarantee"
                        style="pointer-events: none;">
                        <div class="c-product__seller-row-main js-guarantee-text">
                            {{$productSeller_max_price_first->warranty['name'] ?? ''}}
                        </div>
                        <div
                            class="c-product__seller-extra js-guarantee-extra-toggle u-hidden"></div>
                    </div>
                    <div class="c-product-info-box js-guarantee-info-expand">
                        <div class="c-product-info-box__header">
                            <div
                                class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>
                            جزئیات گارانتی
                        </div>
                        <div class="c-product-info-box__body-wrapper">
                            <div class="c-product-info-box__body">
                                <div class="c-guarantee-info-box__row">
                                    <div class="u-text-bold m-b-md js-guarantee-text">
                                        {{$productSeller_max_price_first->warranty['name'] ?? ''}}
                                    </div>
                                    <div
                                        class="u-text-spaced js-guarantee-description"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product__seller-row c-product__seller-row--column
            js-seller-info-shipment c-product__seller-row--clickable">
                        <div
                            class="c-product__seller-row-main c-product__seller-row-main--arrow-left">
                                                        <span
                                                            class="c-product__delivery-warehouse js-provider-main-title c-product__delivery-warehouse--no-lead-time">موجود در انبار دیجی‌کالا</span>
                        </div>
                        <ul class="c-line-bullet-list c-product__sender-list js-provider-list">
                            <li class=""><span
                                    class="c-line-bullet-list__item  c-line-bullet-list__item--digikala no-lead-time">ارسال دیجی‌کالا</span><span
                                    class="js-ab-shipment-free-badge u-hidden free-badge">رایگان</span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-info-box js-shipment-info-expand">
                        <div class="c-product-info-box__header">
                            <div
                                class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>
                            جزئیات ارسال
                        </div>
                        <div class="c-product-info-box__body-wrapper">
                            <div class="c-product-info-box__body">
                                <div
                                    class="c-shipment-info-box__row js-shipment-info-main-container">
                                    <div class="c-shipment-info-box__row--title">
                                        ارسال توسط دیجی‌کالا
                                        <span
                                            class="js-ab-shipment-free-badge u-hidden">رایگان</span>
                                    </div>
                                    <div class="c-shipment-info-box__row--content">
                                        این کالا پس از مدت زمان مشخص شده توسط فروشنده در
                                        انبار دیجی‌کالا تامین و آماده پردازش می‌گردد و
                                        توسط
                                        پیک دیجی‌کالا در بازه انتخابی ارسال خواهد شد.
                                        <p class="free-badge js-ab-shipment-free-badge u-hidden">
                                            کالا‌هایی با قیمت بیش از ۳۰۰ هزار تومان به
                                            صورت
                                            رایگان ارسال خواهند شد.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="c-product__seller-row c-product__seller-row--gift c-product__seller-row--clickable js-seller-info-gift u-hidden"
                        style="pointer-events: none;">
                        <div
                            class="c-product__seller-row-main js-gift-text js-single-gift "></div>
                        <div
                            class="c-product__seller-row-main js-gift-text js-multi-gift u-hidden">
                            <span class="js-gift-count">۰</span>
                            هدیه
                        </div>
                        <div
                            class="c-product__seller-extra js-gift-extra-toggle "></div>
                    </div>
                    <div class="c-product-info-box js-gift-info-expand">
                        <div class="c-product-info-box__header">
                            <div
                                class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>
                            لیست هدیه‌ها
                        </div>
                        <div class="c-product-info-box__body-wrapper">
                            <div class="c-product-info-box__body">
                                <div>
                                    <div class="c-product__gift-title">
                                        لیست هدیه ها
                                    </div>
                                    <div
                                        class="c-product__gift-content js-gift-items"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="c-product__seller-row c-product__seller-row--best-price-row js-data-best-price u-hidden">
                        بهترین قیمت ۳۰ روز گذشته
                    </div>
                    <div class="c-product__seller-row c-product__seller-row--price">
                        <div class="c-product__seller-price-info">
                            <div
                                class="c-product__seller-price-prev js-rrp-price u-hidden">
                                {{\App\Models\PersianNumber::translate($productSeller_max_price_first->discount_price ?? '')}}
                            </div>
                            <div
                                class="c-product__seller-price-off js-discount-value u-hidden">
                                ۰٪
                            </div>
                        </div>
                        <div class="c-product__seller-price-real">
                            <div
                                class="c-product__seller-price-pure u-hidden js-ab-price-value">
                                ۴.۰۹۸ میلیون
                            </div>
                            <div class="c-product__seller-price-pure js-price-value">
                                {{\App\Models\PersianNumber::translate($productSeller_max_price_first->discount_price ?? '')}}

                            </div>
                            تومان
                        </div>
                        <div
                            class="c-product__additional-item c-product__additional-item--no-icon js-price-discount-osm u-hidden">
                            <span class="js-discount-osm-value"></span>&nbsp; تومان
                            تخفیف سازمانی کسر گردیده است.
                        </div>
                    </div>
                    <div class="c-product__remaining-in-stock--parent">
                        <div class="c-cart-view-count">
                            ۳۰+
                            نفر در حال بازدید این کالا می‌باشند.
                        </div>
                    </div>
                </div>
                <div class="c-product__seller-row c-product__seller-row--add-to-cart">
                    <div class="u-w-full js-ab-app-incredible-pdp-action u-hidden"><span
                            class=" c-product-gallery__application-only-user-label">تنها برای کاربران اپلیکیشن دیجی‌کالا</span><a
                            href="/landings/new-app/" target="_blank"
                            class="btn-add-to-cart btn-add-to-cart--outline btn-add-to-cart--full-width btn-add-to-cart--cta-icon btn-add-to-cart--navigate-to-application  js-app-incredible"
                            data-android="https://cafebazaar.ir/app/com.digikala/?l=fa"
                            data-ios="https://sibapp.com/applications/digikala"
                            data-id="3048126">
                            مشاهده در اپلیکیشن دیجی‌کالا
                        </a></div>
                    <a class="js-ab-product-action btn-add-to-cart btn-add-to-cart--full-width js-add-to-cart js-cart-page-add-to-cart js-btn-add-to-cart"
                       data-product-id="3048126" data-variant="9832233"
                       href="/cart/add/9832233/1/" data-event="add_to_cart"
                       data-event-category="ecommerce"
                       data-event-label="price: 40980000 - seller: marketplace - seller_name: دیجی‌کالا - seller_rating: 0 - multiple_configs: True - position: 0"><span
                            class="btn-add-to-cart__txt">افزودن به سبد خرید</span></a>
                </div>
            </div>
            <a href="#suppliers">
                <div
                    class="c-product-shipping-limitation c-product-shipping-limitation__mt-8 js-btn-supplier-list js-btn-cheapest-price u-hidden">
                    <div
                        class="c-product-shipping-limitation__title c-product-shipping-limitation__title--info">
                        این کالا را ارزان‌تر بخرید
                    </div>
                    <div class="c-product-shipping-limitation__dsc">
                        از
                        <span class="js-cheapest-price">۴,۰۹۸,۰۰۰ </span> تومان
                        توسط فروشندگان دیگر
                    </div>
                </div>
            </a>
            {{--        <a target="_blank"--}}
            {{--               href="https://www.digikala.com/mag/pricing-sale-and-price-monitoring-at-digikala/"--}}
            {{--               class="c-product__white-box">--}}
            {{--            <div class="o-hint o-hint--small o-hint--text o-hint--neutral ">--}}
            {{--                فرآیند قیمت‌گذاری و نظارت بر قیمت‌ها--}}
            {{--            </div>--}}
            {{--        </a>--}}
            {{--        <div--}}
            {{--            class="c-product__price-survey-question js-price-question js-pricing-survey"--}}
            {{--            data-variant="9832233" data-observed-price="40980000"><label--}}
            {{--                class="js-price-yes js-pricing-survey-btn js-fair-pricing-btn"--}}
            {{--                data-snt-event="dkProductPageClick"--}}
            {{--                data-snt-params="{&quot;item&quot;:&quot;price-survey&quot;,&quot;item_option&quot;:&quot;بله&quot;}"--}}
            {{--                data-value="no" data-event="pricing_experience"--}}
            {{--                data-event-category="product_page">--}}
            {{--                آیا قیمت مناسب‌تری سراغ دارید؟--}}
            {{--            </label>--}}
            {{--            <div--}}
            {{--                class="c-product__price-suggestion js-price-yes js-pricing-survey-btn js-fair-pricing-btn"--}}
            {{--                data-snt-event="dkProductPageClick"--}}
            {{--                data-snt-params="{&quot;item&quot;:&quot;price-survey&quot;,&quot;item_option&quot;:&quot;بله&quot;}"--}}
            {{--                data-value="no" data-event="pricing_experience"--}}
            {{--                data-event-category="product_page"></div>--}}
        </div>
    </div>
@else
    <div class="c-product__summary js-product-summary">
        <div class="c-product__stock-status c-product__stock-status--out-of-stock">
            <div class="c-product-stock__title">
                ناموجود
            </div>
            <div class="c-product-stock__body">
                متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق لیست بالای صفحه، از محصولات مشابه این کالا
                دیدن نمایید
            </div>
            <button data-snt-event="dkProductPageClick" type="button"
                    onclick="publish_product()"
                    data-snt-params="{&quot;item&quot;:&quot;main-alarm-for-instock&quot;,&quot;item_option&quot;:&quot;out-of-stock&quot;}"
                    class="o-btn o-btn--full-width o-btn--contained-red-lg c-product-stock__action js-add-to-notify-button">
                <i class="c-product-stock__action--alarm-icon"></i><label>موجود شد به من اطلاع بده</label></button>
        </div>
    </div>

@endif
@include('livewire.home.modals')
@include('livewire.home.script')
