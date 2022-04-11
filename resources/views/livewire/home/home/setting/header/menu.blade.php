@php
$header_1 = \App\Models\SiteHeader::get()[0];

$header_2 = \App\Models\SiteHeader::get()[1];
$header_3 = \App\Models\SiteHeader::get()[2];
$header_4 = \App\Models\SiteHeader::get()[3];
$header_5 = \App\Models\SiteHeader::get()[4];
$header_6 = \App\Models\SiteHeader::get()[5];
$header_7 = \App\Models\SiteHeader::get()[6];
@endphp
<li class="js-categories-bar-item">
    <a href="{{$header_1->link}}"
       class="c-navi-new-list__category-link c-navi-new-list__category-link--{{$header_1->icon}} c-navi-new-list__category-link--bold">
        {{$header_1->title}}</a>
</li>
<li class="js-categories-bar-item js-mega-menu-main-item"><a
        href="{{$header_2->link}}"
        class="c-navi-new-list__category-link c-navi-new-list__category-link--{{$header_2->icon}} c-navi-new-list__category-link--bold">
        {{$header_2->title}}</a>
    <div
        class="c-navi-new-list__sublist c-navi-new-list__sublist--promotion js-mega-menu-categories-options">
        <div class="c-navi-new-list__options-container">
            <div class="c-navi-new-list__options-list is-active">
                <div class="c-navi-new-list__sublist-top-bar"><a
                        href="promotion-center/index.html"
                        class="c-navi-new-list__sublist-see-all-cats">
                        مشاهده همه تخفیف‌ها و پیشنهادها
                    </a></div>
                <ul>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title">
                        <a href="incredible-offers/index.html"
                           class=" c-navi-new__big-display-title"><span>کالاهای شگفت‌انگیز</span></a><a
                            href="incredible-offers/index.html"
                            class=" c-navi-new__medium-display-title"><span>کالاهای شگفت‌انگیز</span></a>
                    </li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title">
                        <a href="fresh-offers/index.html"
                           class=" c-navi-new__big-display-title"><span>شگفت‌انگیز سوپرمارکتی</span></a><a
                            href="fresh-offers/index.html"
                            class=" c-navi-new__medium-display-title"><span>شگفت‌انگیز سوپرمارکتی</span></a>
                    </li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title">
                        <a href="landing-page/index48e7.html?promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title"><span>فروش ویژه</span></a><a
                            href="landing-page/index48e7.html?promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title"><span>فروش ویژه</span></a>
                    </li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/index0b5a.html?category%5B0%5D=5966&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            کالای دیجیتال
                        </a><a
                            href="landing-page/index0b5a.html?category%5B0%5D=5966&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            کالای دیجیتال
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/indexa225.html?category%5B0%5D=8450&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            خودرو، ابزار و تجهیزات صنعتی
                        </a><a
                            href="landing-page/indexa225.html?category%5B0%5D=8450&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            خودرو، ابزار و تجهیزات صنعتی
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/indexea3f.html?category%5B0%5D=8749&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            مد و پوشاک
                        </a><a
                            href="landing-page/indexea3f.html?category%5B0%5D=8749&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            مد و پوشاک
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/index14ad.html?category%5B0%5D=6741&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            اسباب بازی، کودک و نوزاد
                        </a><a
                            href="landing-page/index14ad.html?category%5B0%5D=6741&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            اسباب بازی، کودک و نوزاد
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/index80f3.html?category%5B0%5D=8895&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            خوردنی و آشامیدنی
                        </a><a
                            href="landing-page/index80f3.html?category%5B0%5D=8895&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            خوردنی و آشامیدنی
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/indexd8e9.html?category%5B0%5D=5968&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            زیبایی و سلامت
                        </a><a
                            href="landing-page/indexd8e9.html?category%5B0%5D=5968&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            زیبایی و سلامت
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/index69d5.html?category%5B0%5D=5967&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            خانه و آشپزخانه
                        </a><a
                            href="landing-page/index69d5.html?category%5B0%5D=5967&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            خانه و آشپزخانه
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/index3fd3.html?category%5B0%5D=8&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            کتاب، لوازم تحریر و هنر
                        </a><a
                            href="landing-page/index3fd3.html?category%5B0%5D=8&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            کتاب، لوازم تحریر و هنر
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                        <a href="landing-page/indexeae8.html?category%5B0%5D=6124&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                           class=" c-navi-new__big-display-title">
                            ورزش و سفر
                        </a><a
                            href="landing-page/indexeae8.html?category%5B0%5D=6124&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                            class=" c-navi-new__medium-display-title">
                            ورزش و سفر
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item c-navi-new-list__sublist-option--has-circle">
                        <a href="promotion-center/category-based-products/20/index.html"
                           class=" c-navi-new__big-display-title">
                            چتر کمتر از ۱۵۰ هزار تومان
                        </a><a href="promotion-center/category-based-products/20/index.html"
                               class=" c-navi-new__medium-display-title">
                            چتر کمتر از ۱۵۰ هزار تومان
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item c-navi-new-list__sublist-option--has-circle">
                        <a href="promotion-center/category-based-products/22/index.html"
                           class=" c-navi-new__big-display-title">
                            ساک و چمدان کمتر از ۱۰۰ هزار تومان
                        </a><a href="promotion-center/category-based-products/22/index.html"
                               class=" c-navi-new__medium-display-title">
                            ساک و چمدان کمتر از ۱۰۰ هزار تومان
                        </a></li>
                    <div class="c-navi-new-list__sublist-divider"></div>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--best-selling">
                        <a href="best-selling/index.html"
                           class=" c-navi-new__big-display-title">
                            پرفروش‌ترین‌ کالاها
                        </a><a href="best-selling/index.html"
                               class=" c-navi-new__medium-display-title">
                            پرفروش‌ترین‌ کالاها
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--gift">
                        <a href="promotion-center/products-with-gifts/index.html"
                           class=" c-navi-new__big-display-title">
                            با هر خرید هدیه بگیرید!
                        </a><a href="promotion-center/products-with-gifts/index.html"
                               class=" c-navi-new__medium-display-title">
                            با هر خرید هدیه بگیرید!
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--last-season">
                        <a href="promotion-page/cmp_109599/index.html"
                           class=" c-navi-new__big-display-title">
                            تخفیف پایان فصل
                        </a><a href="promotion-page/cmp_109599/index.html"
                               class=" c-navi-new__medium-display-title">
                            تخفیف پایان فصل
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--gift-card">
                        <a href="search/category-dk-ds-gift-card/index.html"
                           class=" c-navi-new__big-display-title">
                            کارت هدیه خرید از دیجی‌کالا
                        </a><a href="search/category-dk-ds-gift-card/index.html"
                               class=" c-navi-new__medium-display-title">
                            کارت هدیه خرید از دیجی‌کالا
                        </a></li>
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--new-seller-product">
                        <a href="promotion-center/new-sellers-products/index.html"
                           class=" c-navi-new__big-display-title">
                            تازه‌های فروشنده‌های جدید
                        </a><a href="promotion-center/new-sellers-products/index.html"
                               class=" c-navi-new__medium-display-title">
                            تازه‌های فروشنده‌های جدید
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="c-navi-new-list__main-banner"><a
                href="promotion-center/index84e4.html?&amp;promo_name=%D8%AA%D8%AE%D9%81%DB%8C%D9%81+%D9%87%D8%A7+%D9%88+%D9%BE%DB%8C%D8%B4%D9%86%D9%87%D8%A7%D8%AF%D9%87%D8%A7&amp;promo_position=promotion_center_mega_menu&amp;promo_creative=58152&amp;bCode=58152"><img
{{--                    src="../dkstatics-public.digikala.com/digikala-adservice-banners/560de61ce10e86ee53603192ed6e3320fd0d0923_1610191059c401.png?x-oss-process=image/quality,q_80"/></a>--}}
        </div>
    </div>
</li>
<li class="js-categories-bar-item"><a
        class="c-navi-new-list__category-link c-navi-new-list__category-link--{{$header_3->icon}} c-navi-new-list__category-link--bold"
        href="{{$header_3->link}}">
        {{$header_3->title}}
    </a></li>
<li class="js-categories-bar-item js-mega-menu-main-item">
    <a class="c-navi-new-list__category-link c-navi-new-list__category-link--bold c-navi-new-list__category-link--{{$header_4->icon}} c-digiplus-sign--before"
       href="{{$header_4->link}}">
        {{$header_4->title}}
    </a>
    <div
        class="c-navi-new-list__sublist c-navi-new-list__sublist--digiplus js-mega-menu-categories-options">


        <div class="c-dp-header-submenu">
            <div class="c-dp-header-submenu__content">
                <div class="c-dp-header-submenu__head-title">
                    خدمات ویژه کاربران <img src="static/files/4a2895fc.svg" alt="Digiplus">
                </div>
                <div class="c-dp-header-submenu__head-subtitle">
                    ارسال رایگان بدون محدودیت قیمت، هدیه نقدی و بازگشت کالا تا ۳۰ روز پس از
                    تحویل
                </div>
                <ul class="c-dp-header-submenu__nav">
                    <li class="c-dp-header-submenu__nav-item c-dp-header-submenu__nav-item--register">
                        <a class="c-dp-header-submenu__register o-btn o-btn--link-blue-md"
                           href="plus/landing/index.html">
                            اطلاعات بیشتر و عضویت
                        </a>
                    </li>
                    <li class="c-dp-header-submenu__nav-item c-dp-header-submenu__nav-item--plus-products">
                        <a class="c-dp-header-submenu__nav-link"
                           href="search/index4f40.html?only_plus=1&amp;digiplus%5B0%5D=has_plus_cash_back">
                            کالاهای <img src="static/files/4a2895fc.svg" alt="Digiplus">
                        </a>
                    </li>
                </ul>
            </div>
            <a class="c-dp-header-submenu__banner-link"
               href="plus/landing/index.html">
                <img class="c-dp-header-submenu__banner-img"
                     src="static/files/38492329.jpg"
                     alt="Banner"
                >
            </a>
        </div>
    </div>
</li>
<li class="js-categories-bar-item js-mega-menu-main-item">
    <a href="{{$header_5->link}}"
    class="c-navi-new-list__category-link c-navi-new-list__category-link--{{$header_5->icon}} c-navi-new-list__category-link--bold">
        {{$header_5->title}}</a>
    <div
        class="c-navi-new-list__sublist c-navi-new-list__sublist--digiclub js-mega-menu-categories-options">
        <div class="c-dc-header-submenu">
            <div class="c-dc-header-submenu__content">
                <img class="c-dc-header-submenu__logo-img"
                     src="static/files/1c93eb76.svg"
                     alt="Digiclub"
                >
                <ul class="c-dc-header-submenu__nav">
                    <li class="c-dc-header-submenu__nav-item">
                        <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--main"
                           href="digiclub/index.html"
                        >
                            صفحه اصلی دیجی‌کلاب
                        </a>
                    </li>
                    <li class="c-dc-header-submenu__nav-item">
                        <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--rewards"
                           href="digiclub/rewards/index.html"
                        >
                            جوایز دیجی‌کلاب
                        </a>
                    </li>
                    <li class="c-dc-header-submenu__nav-item">
                                    <span
                                        class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--history c-dc-header-submenu__nav-link--disabled"
                                    >
                        تاریخچه امتیازات دیجی‌کلاب
                    </span>
                    </li>
                    <li class="c-dc-header-submenu__nav-item">
                        <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--missions"
                           href="digiclub/missions/index.html"
                        >
                            ماموریت‌های دیجی‌کلابی
                        </a>
                    </li>
                    <li class="c-dc-header-submenu__nav-item">
                        <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--luckydraw"
                           href="digiclub/luckydraw/index.html"
                        >
                            قرعه‌کشی
                            <div
                                class="c-dc-lucky-counter c-dc-lucky-counter--header js-dc-counter u-hidden">
                                <div
                                    class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header c-dc-lucky-counter__time--first-child js-dc-counter-days"></div>
                                <div
                                    class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header js-dc-counter-hours"></div>
                                <div
                                    class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header js-dc-counter-minutes"></div>
                                <div
                                    class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header js-dc-counter-seconds"></div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <a class="c-dc-header-submenu__banner-link"
               href="https://dgka.la/dcdkhomepaege"
            >
                <img class="c-dc-header-submenu__banner-img"
{{--                     src="../dkstatics-public.digikala.com/digiclub/53aa31f81138fd588df842086e152102979a00d7_1601458094.jpg"--}}
                     alt=""
                >
            </a>
        </div>
    </div>
</li>
<li class="js-categories-bar-item c-navi-new-list__category-link--visible-in-wide"><a
        class="c-navi-new-list__category-link" target="_blank" href="{{$header_6->link}}">
        {{$header_6->title}}
    </a></li>
<li class="js-categories-bar-item"><a
        class="c-navi-new-list__category-link c-navi-new-list__category-link--visible-in-wide"
        target="_blank"
        href="{{$header_7->link}}">
        {{$header_7->title}}
    </a></li>
