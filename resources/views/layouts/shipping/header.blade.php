<style class="">
    @media screen and (-ms-high-contrast: none) {
        .c-shipment-page__to-payment-sticky, .c-checkout__to-shipping-sticky {
            position: relative !important;
        }

        .c-checkout-aside {
            position: relative !important;
        }
    }

    /* all edge versions */
    @supports (-ms-ime-align:auto) {
        .c-shipment-page__to-payment-sticky, .c-checkout__to-shipping-sticky {
            position: relative !important;
        }

        .c-checkout-aside {
            position: relative !important;
        }
    }
</style>

<div id="new-mini-cart" class="js-ab-u-mini-cart u-hidden">
    <div data-cart-product-length="0" class="c-u-mini-cart u-select-none js-ab-sidebar-mini-cart">
        <div class="c-u-mini-cart__header">

            <div class="c-u-mini-cart__header-title js-ab-u-mini-cart--header-type-c u-hidden">سبد خرید</div>

            <div class="c-u-mini-cart__payable-price"></div>

            <a href="/cart/"
               class="o-link o-link--has-arrow o-link--no-border o-link--sm js-ab-u-mini-cart--header-type-b u-hidden">مشاهده
                سبد</a>

            <div class="c-u-mini-cart__header-type-a js-ab-u-mini-cart--header-type-a">
                <a class="cart-link" href="/cart/">مشاهده سبد</a>
                <a data-snt-event="dkHeaderClick" href=""
                   data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;confirm-cart&quot;}"
                   class="cart-action-btn">ثبت سفارش</a>
            </div>

        </div>
        <div class="c-u-mini-cart__body js-u-mini-cart-body">
        </div>
    </div>
</div>
<header class="c-header   js-header">
    <div class="container">
        <div class="c-header__row js-header-sticky">
            <div class="c-header__right-side">
                <div class="c-header__logo ">
                    <a data-snt-event="dkHeaderClick"
                       data-snt-params="{&quot;item&quot;:&quot;digikala-logo&quot;,&quot;item_option&quot;:null}"
                       href="/?ref=nav_logo" class="c-header__logo-img">Digikala</a>
                </div>
                <div class="c-header__search">
                    <div class="c-search js-search" data-event="using_search_box" data-event-category="header_section">
                        <span class="c-search__reset u-hidden js-search-reset"></span><input type="text" name="q"
                                                                                             placeholder="جستجو در دیجی‌کالا …"
                                                                                             class="js-search-input"
                                                                                             autocomplete="off"
                                                                                             value="">
                        <div class="c-search__results js-search-results">
                            <div
                                class="js-ab-search-box-product-suggestions swiper-container swiper-container-horizontal js-swiper-product-suggestions c-search__product-suggestions-list-container swiper-container-rtl">
                                <ul class="js-product-suggestions-list swiper-wrapper"
                                    style="transition-duration: 0ms;"></ul>
                                <div
                                    class="js-swiper-button-prev swiper-butsston-prev c-search__swiper-button-prev-circle"></div>
                                <div
                                    class="js-swiper-button-next swiper-buttossn-next c-search__swiper-button-next-circle"></div>
                            </div>
                            <ul class="c-search__results-last-searches-container js-last-searches">
                                <div class="c-search__label-container"><span
                                        class="c-search__searches-label-icon c-search__searches-label-icon--last-searches"></span><span
                                        class="c-search__searches-label">تاریخچه جستجوهای شما</span><span
                                        class="c-search__last-searches-trash-icon js-last-searches-trash-icon"></span>
                                </div>
                                <div class="c-search__results-last-searches-items js-last-searches-items"></div>
                            </ul>
                            <div>
                                <div class="c-search__label-container"><span
                                        class="c-search__searches-label-icon c-search__searches-label-icon--trend"></span><span
                                        class="c-search__searches-label">بیشترین جستجوهای اخیر</span></div>
                                <ul class="c-search__results-trends js-trends-results"></ul>
                            </div>
                            <ul class="js-autosuggest-results-list c-search__results-list c-search__results-list--autosuggest"></ul>
                            <ul class="js-results-list c-search__results-list"></ul>
                            <ul class="js-autosuggest-empty-list c-search__results-list">
                                <li><a class="js-search-keyword-link" href="javascript:"><span
                                            class="c-search__result-item c-search__result-icon c-search__result-icon--group">نمایش همه نتایج برای </span><span
                                            class="c-search__result-item--category js-search-keyword"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" c-header__action">
                <div class="c-header__btn-container"><input type="hidden" id="topBarMeta" data-cart_count="2"
                                                            data-cart_items="[{&quot;item&quot;:3513237,&quot;quantity&quot;:1,&quot;price&quot;:630000},{&quot;item&quot;:4301452,&quot;quantity&quot;:1,&quot;price&quot;:3390000}]">

                    <input type="hidden" id="ESILogged" data-logged="1" data-user_id="7406722"
                           data-email="tdanandeh@yahoo.com" data-default_phone="09120634157"
                           data-login_phone="09120634157" data-mobile_phone="09120634157" data-first_name="توحید"
                           data-last_name="داننده">

                    <div class="c-header__btn-user-container c-header__btn-profile-container js-dropdown-container">
                        <a data-snt-event="dkHeaderClick"
                           data-snt-params="{&quot;item&quot;:&quot;account&quot;,&quot;item_option&quot;:null}"
                           class="c-header__btn-profile js-dropdown-toggle">
                            <div class="c-header__btn-profile-notification-badge js-notif-animation"></div>

                            <div class="c-header__btn-profile-plus-badge js-plus-badge-motion">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 126 108" width="126" height="108"
                                     preserveAspectRatio="xMidYMid meet"
                                     style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);">
                                    <defs>
                                        <clipPath id="__lottie_element_2">
                                            <rect width="126" height="108" x="0" y="0"></rect>
                                        </clipPath>
                                        <linearGradient id="__lottie_element_21" spreadMethod="pad"
                                                        gradientUnits="userSpaceOnUse" x1="-8" y1="8" x2="8" y2="-8">
                                            <stop offset="0%" stop-color="rgb(210,100,190)"></stop>
                                            <stop offset="25%" stop-color="rgb(186,73,162)"></stop>
                                            <stop offset="49%" stop-color="rgb(163,47,135)"></stop>
                                            <stop offset="75%" stop-color="rgb(156,38,132)"></stop>
                                            <stop offset="100%" stop-color="rgb(148,29,128)"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g clip-path="url(#__lottie_element_2)">
                                        <g transform="matrix(1,0,0,1,96,78)" opacity="1" style="display: block;">
                                            <g opacity="1" transform="matrix(3,0,0,3,0,0)">
                                                <path fill="rgb(255,255,255)" fill-opacity="1"
                                                      d=" M-4,-10 C-4,-10 4,-10 4,-10 C7.309999942779541,-10 10,-7.309999942779541 10,-4 C10,-4 10,4 10,4 C10,7.309999942779541 7.309999942779541,10 4,10 C4,10 -4,10 -4,10 C-7.309999942779541,10 -10,7.309999942779541 -10,4 C-10,4 -10,-4 -10,-4 C-10,-7.309999942779541 -7.309999942779541,-10 -4,-10z"></path>
                                            </g>
                                        </g>
                                        <g transform="matrix(1,0,0,1,96,78)" opacity="1" style="display: block;">
                                            <g opacity="1" transform="matrix(3,0,0,3,0,0)">
                                                <path fill="url(#__lottie_element_21)" fill-opacity="1"
                                                      d=" M-4,-8 C-4,-8 4,-8 4,-8 C6.210000038146973,-8 8,-6.210000038146973 8,-4 C8,-4 8,4 8,4 C8,6.210000038146973 6.210000038146973,8 4,8 C4,8 -4,8 -4,8 C-6.210000038146973,8 -8,6.210000038146973 -8,4 C-8,4 -8,-4 -8,-4 C-8,-6.210000038146973 -6.210000038146973,-8 -4,-8z"></path>
                                            </g>
                                        </g>
                                        <g transform="matrix(1,0,0,1,96,78)" opacity="1" style="display: block;">
                                            <g opacity="1" transform="matrix(3,0,0,3,0,0)">
                                                <path fill="rgb(255,255,255)" fill-opacity="1"
                                                      d=" M4.206999778747559,-0.9629999995231628 C4.206999778747559,-0.9629999995231628 4.126999855041504,-0.9629999995231628 4.126999855041504,-0.9629999995231628 C4.126999855041504,-0.9629999995231628 4.126999855041504,-0.953000009059906 4.126999855041504,-0.953000009059906 C4.117000102996826,-0.953000009059906 4.10699987411499,-0.9629999995231628 4.086999893188477,-0.953000009059906 C3.246999979019165,-0.8930000066757202 2.4070000648498535,-1.2029999494552612 1.8070000410079956,-1.8029999732971191 C1.1970000267028809,-2.4130001068115234 0.8970000147819519,-3.243000030517578 0.9570000171661377,-4.0929999351501465 C0.9570000171661377,-4.103000164031982 0.9570000171661377,-4.11299991607666 0.9570000171661377,-4.123000144958496 C0.9570000171661377,-4.123000144958496 0.9570000171661377,-4.123000144958496 0.9570000171661377,-4.123000144958496 C0.9570000171661377,-4.123000144958496 0.9570000171661377,-4.203000068664551 0.9570000171661377,-4.203000068664551 C0.9570000171661377,-4.413000106811523 0.7870000004768372,-4.583000183105469 0.5770000219345093,-4.583000183105469 C0.5770000219345093,-4.583000183105469 -0.5830000042915344,-4.583000183105469 -0.5830000042915344,-4.583000183105469 C-0.7929999828338623,-4.583000183105469 -0.9629999995231628,-4.413000106811523 -0.9629999995231628,-4.203000068664551 C-0.9629999995231628,-4.203000068664551 -0.9629999995231628,-4.123000144958496 -0.9629999995231628,-4.123000144958496 C-0.9629999995231628,-4.123000144958496 -0.953000009059906,-4.123000144958496 -0.953000009059906,-4.123000144958496 C-0.953000009059906,-4.11299991607666 -0.953000009059906,-4.103000164031982 -0.953000009059906,-4.0929999351501465 C-0.8930000066757202,-3.243000030517578 -1.2029999494552612,-2.4130001068115234 -1.8029999732971191,-1.8029999732971191 C-2.4130001068115234,-1.2029999494552612 -3.243000030517578,-0.8930000066757202 -4.0929999351501465,-0.953000009059906 C-4.103000164031982,-0.9629999995231628 -4.11299991607666,-0.953000009059906 -4.123000144958496,-0.953000009059906 C-4.123000144958496,-0.953000009059906 -4.123000144958496,-0.9629999995231628 -4.123000144958496,-0.9629999995231628 C-4.123000144958496,-0.9629999995231628 -4.203000068664551,-0.9629999995231628 -4.203000068664551,-0.9629999995231628 C-4.413000106811523,-0.9629999995231628 -4.583000183105469,-0.7929999828338623 -4.583000183105469,-0.5830000042915344 C-4.583000183105469,-0.5830000042915344 -4.583000183105469,0.5870000123977661 -4.583000183105469,0.5870000123977661 C-4.583000183105469,0.7870000004768372 -4.413000106811523,0.9570000171661377 -4.203000068664551,0.9570000171661377 C-4.203000068664551,0.9570000171661377 -4.1529998779296875,0.9570000171661377 -4.1529998779296875,0.9570000171661377 C-4.132999897003174,0.9570000171661377 -4.11299991607666,0.9670000076293945 -4.0929999351501465,0.9570000171661377 C-3.243000030517578,0.8970000147819519 -2.4130001068115234,1.2070000171661377 -1.8029999732971191,1.8070000410079956 C-1.2029999494552612,2.4170000553131104 -0.8930000066757202,3.246999979019165 -0.953000009059906,4.0970001220703125 C-0.953000009059906,4.10699987411499 -0.953000009059906,4.117000102996826 -0.953000009059906,4.126999855041504 C-0.953000009059906,4.126999855041504 -0.9629999995231628,4.126999855041504 -0.9629999995231628,4.126999855041504 C-0.9629999995231628,4.126999855041504 -0.9629999995231628,4.206999778747559 -0.9629999995231628,4.206999778747559 C-0.9629999995231628,4.416999816894531 -0.7929999828338623,4.586999893188477 -0.5830000042915344,4.586999893188477 C-0.5830000042915344,4.586999893188477 0.5770000219345093,4.586999893188477 0.5770000219345093,4.586999893188477 C0.7870000004768372,4.586999893188477 0.9570000171661377,4.416999816894531 0.9570000171661377,4.206999778747559 C0.9570000171661377,4.206999778747559 0.9570000171661377,4.126999855041504 0.9570000171661377,4.126999855041504 C0.9570000171661377,4.126999855041504 0.9570000171661377,4.126999855041504 0.9570000171661377,4.126999855041504 C0.9570000171661377,4.117000102996826 0.9570000171661377,4.10699987411499 0.9570000171661377,4.0970001220703125 C0.8970000147819519,3.246999979019165 1.1970000267028809,2.4170000553131104 1.8070000410079956,1.8070000410079956 C2.4070000648498535,1.2070000171661377 3.246999979019165,0.8970000147819519 4.086999893188477,0.9570000171661377 C4.117000102996826,0.9670000076293945 4.13700008392334,0.9570000171661377 4.1570000648498535,0.9570000171661377 C4.1570000648498535,0.9570000171661377 4.206999778747559,0.9570000171661377 4.206999778747559,0.9570000171661377 C4.416999816894531,0.9570000171661377 4.586999893188477,0.7870000004768372 4.586999893188477,0.5870000123977661 C4.586999893188477,0.5870000123977661 4.586999893188477,-0.5830000042915344 4.586999893188477,-0.5830000042915344 C4.586999893188477,-0.7929999828338623 4.416999816894531,-0.9629999995231628 4.206999778747559,-0.9629999995231628 M0.9179999828338623,0.9279999732971191 C0.527999997138977,1.3179999589920044 0.21799999475479126,1.7879999876022339 -0.0020000000949949026,2.2880001068115234 C-0.21199999749660492,1.7879999876022339 -0.5220000147819519,1.3179999589920044 -0.921999990940094,0.9279999732971191 C-1.3220000267028809,0.527999997138977 -1.7920000553131104,0.21799999475479126 -2.2920000553131104,-0.0020000000949949026 C-1.7920000553131104,-0.21199999749660492 -1.3220000267028809,-0.5320000052452087 -0.921999990940094,-0.921999990940094 C-0.5220000147819519,-1.3220000267028809 -0.21199999749660492,-1.7920000553131104 -0.0020000000949949026,-2.2920000553131104 C0.21799999475479126,-1.7920000553131104 0.527999997138977,-1.3220000267028809 0.9179999828338623,-0.921999990940094 C1.3179999589920044,-0.5320000052452087 1.7879999876022339,-0.21199999749660492 2.2880001068115234,-0.0020000000949949026 C1.7879999876022339,0.21799999475479126 1.3179999589920044,0.527999997138977 0.9179999828338623,0.9279999732971191"></path>
                                            </g>
                                        </g>
                                        <g style="display: none;">
                                            <g>
                                                <path></path>
                                                <g></g>
                                            </g>
                                        </g>
                                        <g style="display: none;">
                                            <g>
                                                <path></path>
                                            </g>
                                        </g>
                                        <g style="display: none;">
                                            <g>
                                                <path></path>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                            </g>
                                        </g>
                                        <g style="display: none;">
                                            <g>
                                                <path></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </a>

                        <div class="c-header__profile-dropdown js-dropdown-menu" style="display: none;">
                            <div class="c-header__profile-dropdown-account-container">
                                <div class="c-header__profile-dropdown-user">
                                    <div class="c-header__profile-dropdown-user-img">
                                        <img src="https://www.digikala.com/static/files/2a5b1e32.svg">
                                    </div>
                                    <div class="c-header__profile-dropdown-user-info">
                                        <p class="c-header__profile-dropdown-user-name">توحید داننده</p>
                                        <span
                                            class="c-header__profile-dropdown-user-profile-link">مشاهده حساب کاربری</span>
                                    </div>
                                </div>
                                <div class="c-header__profile-dropdown-account">
                                    <div
                                        class="c-header__profile-dropdown-account-item u-hidden js-user-dropdown-wallet-has-amount">
                                        <span class="c-header__profile-dropdown-account-item-title">کیف پول</span>
                                        <div class="c-header__profile-dropdown-account-item-amount">
                                            <span
                                                class="c-header__profile-dropdown-account-item-amount-number js-user-drop-down-wallet-amount"></span>
                                            تومان
                                        </div>
                                    </div>
                                    <div
                                        class="c-header__profile-dropdown-account-item u-hidden js-user-dropdown-wallet-has-url">
                                        <a class="c-header__profile-dropdown-account-item-title c-header__profile-dropdown-account-item-title--link  js-wallet-activation-url"
                                           href="">فعال سازی کیف پول</a>
                                    </div>

                                    <div class="c-header__profile-dropdown-account-item">
                                        <span class="c-header__profile-dropdown-account-item-title">دیجی‌کلاب</span>
                                        <span class="c-header__profile-dropdown-account-item-amount">
                            <span class="c-header__profile-dropdown-account-item-amount-number js-dc-point">۵۲۶</span>
                            امتیاز
                        </span>
                                    </div>
                                </div>
                                <a href="/profile/" data-snt-event="dkHeaderClick"
                                   data-snt-params="{&quot;item&quot;:&quot;account&quot;,&quot;item_option&quot;:&quot;profile&quot;}"
                                   data-event="profile_click" data-event-category="header_section"
                                   data-event-label="logged_in: True - digiclub_score: 87000"
                                   class="c-header__profile-dropdown-user-profile-full-link"></a>
                            </div>

                            <div class="c-header__profile-dropdown-actions">
                                <div class="c-header__profile-dropdown-action-container">
                                    <a href="/profile/orders/" data-snt-event="dkHeaderClick"
                                       data-snt-params="{&quot;item&quot;:&quot;account&quot;,&quot;item_option&quot;:&quot;orders&quot;}"
                                       class="c-header__profile-dropdown-action c-header__profile-dropdown-action--orders c-header__profile-dropdown-action--has-pending-order">سفارش‌های
                                        من</a>
                                </div>
                                <div class="c-header__profile-dropdown-action-container u-hidden">
                                    <a href="/profile/favorites/?convert=true"
                                       class="c-header__profile-dropdown-action c-header__profile-dropdown-action--favorites">
                                        لیست مورد علاقه
                                    </a>
                                </div>
                                <div class="c-header__profile-dropdown-action-container">
                                    <a href="/digiclub/rewards/"
                                       class="c-header__profile-dropdown-action c-header__profile-dropdown-action--digiclub-gifts">
                                        جوایز دیجی‌کلاب
                                    </a>
                                </div>
                                <div class="c-header__profile-dropdown-action-container">
                                    <a href="/users/logout/" data-snt-event="dkHeaderClick"
                                       data-snt-params="{&quot;item&quot;:&quot;account&quot;,&quot;item_option&quot;:&quot;sign-out&quot;}"
                                       class="c-header__profile-dropdown-action c-header__profile-dropdown-action--logout js-logout-button">خروج
                                        از حساب کاربری</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div id="mini-cart" class="c-header__btn-container">
                    <div class="c-header__btn-cart-container js-mini-cart-container">
                        <a id="cart-button" class="c-header__btn-cart " data-snt-event="dkHeaderClick"
                           data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:null}"
                           data-counter="۲" href="/cart/" data-event="mini_cart_click"
                           data-event-category="header_section" data-event-label="items: 2 - total price: 4020000">
                            <span class="js-cart-count c-header__btn-cart-counter c-header__btn-cart-counter--square"
                                  data-counter="۲">۲</span>
                        </a>
                        <div class="c-header__cart-info js-mini-cart-dropdown">
                            <div class="c-header__cart-info-header">
                                <div class="c-header__cart-info-count">
                                    ۲ کالا
                                </div>
                                <a data-snt-event="dkHeaderClick"
                                   data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;cart-page&quot;}"
                                   href="/cart/" class="c-header__cart-info-link">
                                    <span>مشاهده سبد خرید</span>
                                </a>
                            </div>


                            <ul class="c-header__basket-list">
                                <li class="js-mini-cart-item" data-is-fresh="">
                                    <a data-snt-event="dkHeaderClick"
                                       data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;cart-item&quot;}"
                                       href="/product/dkp-3513237/لیوان-نوری-تازه-سری-apple-مدل-410221w-بسته-6-عددی"
                                       class="c-header__basket-list-item">
                                        <div class="c-header__basket-list-item-image">
                                            <img alt="لیوان نوری تازه سری APPLE مدل 410221W بسته 6 عددی"
                                                 src="https://dkstatics-public.digikala.com/digikala-products/fd73073d8dffdc1f7825656b8b2788cd1ef1dce9_1601977954.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80">
                                        </div>
                                        <div class="c-header__basket-list-item-content">
                                            <p class="c-header__basket-list-item-title">لیوان نوری تازه سری APPLE مدل
                                                410221W بسته 6 عددی</p>
                                            <p>
                                                <span
                                                    class="c-header__basket-list-item-shipping-type c-header__basket-list-item-shipping-type--ready">موجود در انبار دیجی‌کلا</span>
                                            </p>
                                            <div class="c-header__basket-list-item-footer">
                                                <div class="c-header__basket-list-item-props">
                                                    <span class="c-header__basket-list-item-props-item"> ۱ عدد</span>
                                                    <span class="c-header__basket-list-item-props-item">
                                                    <div class="c-header__basket-list-item-color-badge"
                                                         style="background: #f5fafd"></div>
                                                    بی رنگ شفاف
                                                </span>
                                                </div>
                                                <button
                                                    class="c-header__basket-list-item-remove js-mini-cart-remove-item"
                                                    data-snt-event="dkHeaderClick"
                                                    data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;remove-item&quot;}"
                                                    data-id="1487176416" data-product="3513237" data-variant="13506836"
                                                    data-enhanced-ecommerce="null"></button>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="js-mini-cart-item" data-is-fresh="">
                                    <a data-snt-event="dkHeaderClick"
                                       data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;cart-item&quot;}"
                                       href="/product/dkp-4301452/کفش-کوهنوردی-مردانه-ای-ال-ام-مدل-brs-کد-2-7954"
                                       class="c-header__basket-list-item">
                                        <div class="c-header__basket-list-item-image">
                                            <img alt="کفش کوهنوردی مردانه ای ال ام مدل BRS کد 2-7954"
                                                 src="https://dkstatics-public.digikala.com/digikala-products/17538a06b8240d28f50c543769f585a11d0498b0_1611483708.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80">
                                        </div>
                                        <div class="c-header__basket-list-item-content">
                                            <p class="c-header__basket-list-item-title">کفش کوهنوردی مردانه ای ال ام مدل
                                                BRS کد 2-7954</p>
                                            <p>
                                                <span
                                                    class="c-header__basket-list-item-shipping-type c-header__basket-list-item-shipping-type--ready">موجود در انبار دیجی‌کلا</span>
                                            </p>
                                            <div class="c-header__basket-list-item-footer">
                                                <div class="c-header__basket-list-item-props">
                                                    <span class="c-header__basket-list-item-props-item"> ۱ عدد</span>
                                                    <span class="c-header__basket-list-item-props-item">سایز 36</span>
                                                </div>
                                                <button
                                                    class="c-header__basket-list-item-remove js-mini-cart-remove-item"
                                                    data-snt-event="dkHeaderClick"
                                                    data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;remove-item&quot;}"
                                                    data-id="1487176494" data-product="4301452" data-variant="13768671"
                                                    data-enhanced-ecommerce="null"></button>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="c-header__cart-info-footer">
                                <div class="c-header__cart-info-total">
                                    <span class="c-header__cart-info-total-text">مبلغ قابل پرداخت</span>
                                    <p class="c-header__cart-info-total-amount">
                                        <span class="c-header__cart-info-total-amount-number"> ۴۰۲,۰۰۰</span>
                                        <span> تومان</span>
                                    </p>
                                </div>

                                <div>
                                    <a data-snt-event="dkHeaderClick"
                                       data-snt-params="{&quot;item&quot;:&quot;mini-cart&quot;,&quot;item_option&quot;:&quot;confirm-cart&quot;}"
                                       href="/shipping/"
                                       class="c-header__cart-info-submit c-header__cart-info-submit--red">ثبت سفارش</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="c-navi js-navi">
        <div class="container">
            <div class="c-navi__row">
                <ul class="c-navi-new-list">
                    <li class="c-navi-new-list__categories">
                        <ul class="c-navi-new-list__category-item">
                            <li class="c-navi-new-list__a-hover js-navi-new-list-category-hover">
                                <div></div>
                            </li>
                            <li class="js-categories-bar-item js-mega-menu-main-item js-categories-item c-navi-new-list__category-container-main">
                                <div class="c-navi-new-list__category c-navi-new-list__category--main">دسته‌بندی
                                    کالاها
                                </div>
                                <div
                                    class="c-navi-new-list__sublist js-mega-menu-categories-options c-navi-new__ads-holder">
                                    <div class="c-navi-new-list__inner-categories"><a href="/main/electronic-devices/"
                                                                                      class="c-navi-new-list__inner-category c-navi-new-list__inner-category--hovered js-mega-menu-category c-navi-new-list__inner-category--electronics"
                                                                                      data-index="1">کالای دیجیتال</a><a
                                            href="/main/vehicles/"
                                            class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--tools"
                                            data-index="2">خودرو، ابزار و تجهیزات صنعتی</a><a href="/main/apparel/"
                                                                                              class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--fashion"
                                                                                              data-index="3">مد و
                                            پوشاک</a><a href="/main/mother-and-child/"
                                                        class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--mother-and-child"
                                                        data-index="4">اسباب بازی، کودک و نوزاد</a><a
                                            href="/main/food-beverage/"
                                            class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--food-and-beverage"
                                            data-index="5">کالاهای سوپرمارکتی</a><a href="/main/personal-appliance/"
                                                                                    class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--personal-appliance"
                                                                                    data-index="6">زیبایی و سلامت</a><a
                                            href="/main/home-and-kitchen/"
                                            class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--home-and-kitchen"
                                            data-index="7">خانه و آشپزخانه</a><a href="/main/book-and-media/"
                                                                                 class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--book-and-media"
                                                                                 data-index="8">کتاب، لوازم تحریر و
                                            هنر</a><a href="/main/sport-entertainment/"
                                                      class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--sport-and-entertainment"
                                                      data-index="9">ورزش و سفر</a><a href="/main/rural-products/"
                                                                                      class="c-navi-new-list__inner-category  js-mega-menu-category c-navi-new-list__inner-category--indigenous-and-local-products"
                                                                                      data-index="10">محصولات بومی و
                                            محلی</a></div>
                                    <div class="c-navi-new-list__options-container">
                                        <div
                                            class="c-navi-new-list__options-list is-active js-mega-menu-category-options"
                                            id="categories-1">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/electronic-devices/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های کالای دیجیتال
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: mobile - category_fa: لوازم جانبی گوشی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی گوشی&quot;}"
                                                       href="/search/category-mobile-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم جانبی گوشی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی گوشی&quot;}"
                                                        href="/search/category-mobile-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم جانبی گوشی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: cell phone pouch cover - category_fa: کیف و کاور گوشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف و کاور گوشی&quot;}"
                                                       href="/search/category-cell-phone-pouch-cover/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیف و کاور گوشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف و کاور گوشی&quot;}"
                                                           href="/search/category-cell-phone-pouch-cover/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف و کاور گوشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پاور بانک (شارژر همراه) - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پاور بانک (شارژر همراه)&quot;}"
                                                       href="/search/category-power-bank/"
                                                       class=" c-navi-new__big-display-title">
                                                        پاور بانک (شارژر همراه)
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پاور بانک (شارژر همراه)&quot;}"
                                                           href="/search/category-power-bank/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پاور بانک (شارژر همراه)
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پایه نگهدارنده گوشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پایه نگهدارنده گوشی&quot;}"
                                                       href="/search/category-cell-phone-holder/"
                                                       class=" c-navi-new__big-display-title">
                                                        پایه نگهدارنده گوشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پایه نگهدارنده گوشی&quot;}"
                                                           href="/search/category-cell-phone-holder/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پایه نگهدارنده گوشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: mobile phone - category_fa: گوشی موبایل - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;گوشی موبایل&quot;}"
                                                       href="/search/category-mobile-phone/"
                                                       class=" c-navi-new__big-display-title"><span>گوشی موبایل</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;گوشی موبایل&quot;}"
                                                        href="/search/category-mobile-phone/"
                                                        class=" c-navi-new__medium-display-title"><span>گوشی موبایل</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Samsung - category_fa: سامسونگ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سامسونگ&quot;}"
                                                       href="https://www.digikala.com/search/category-mobile-phone/?q=سامسونگ&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        سامسونگ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سامسونگ&quot;}"
                                                           href="https://www.digikala.com/search/category-mobile-phone/?q=سامسونگ&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        سامسونگ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: هوآوی - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;هوآوی&quot;}"
                                                        href="/search/category-mobile-phone/?q=%d9%87%d9%88%d8%a7%d9%88%db%8c&amp;entry=mm"
                                                        class=" c-navi-new__big-display-title">
                                                        هوآوی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;هوآوی&quot;}"
                                                           href="/search/category-mobile-phone/?q=%d9%87%d9%88%d8%a7%d9%88%db%8c&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        هوآوی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Apple iPhone - category_fa: اپل - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اپل&quot;}"
                                                       href="/search/category-mobile-phone/?q=%d8%a7%d9%be%d9%84&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        اپل
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اپل&quot;}"
                                                           href="/search/category-mobile-phone/?q=%d8%a7%d9%be%d9%84&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        اپل
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Xiaomi - category_fa: شیائومی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیائومی&quot;}"
                                                       href="https://www.digikala.com/search/category-mobile-phone/?q=شیائومی&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        شیائومی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیائومی&quot;}"
                                                           href="https://www.digikala.com/search/category-mobile-phone/?q=شیائومی&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        شیائومی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Honor - category_fa: آنر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آنر&quot;}"
                                                       href="https://www.digikala.com/search/category-mobile-phone/?q=آنر&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        آنر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آنر&quot;}"
                                                           href="https://www.digikala.com/search/category-mobile-phone/?q=آنر&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        آنر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Nokia - category_fa: نوکیا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوکیا&quot;}"
                                                       href="https://www.digikala.com/search/category-mobile-phone/?q=نوکیا&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        نوکیا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوکیا&quot;}"
                                                           href="https://www.digikala.com/search/category-mobile-phone/?q=نوکیا&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        نوکیا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: واقعیت مجازی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;واقعیت مجازی&quot;}"
                                                       href="/search/category-mobile-accessories/?q=%d9%87%d8%af%d8%b3%d8%aa%20%d9%88%d8%a7%d9%82%d8%b9%db%8c%d8%aa%20%d9%85%d8%ac%d8%a7%d8%b2%db%8c&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title"><span>واقعیت مجازی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;واقعیت مجازی&quot;}"
                                                        href="/search/category-mobile-accessories/?q=%d9%87%d8%af%d8%b3%d8%aa%20%d9%88%d8%a7%d9%82%d8%b9%db%8c%d8%aa%20%d9%85%d8%ac%d8%a7%d8%b2%db%8c&amp;entry=mm"
                                                        class=" c-navi-new__medium-display-title"><span>واقعیت مجازی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مچ‌بند و ساعت هوشمند - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مچ‌بند و ساعت هوشمند&quot;}"
                                                       href="/search/category-wearable-gadget/"
                                                       class=" c-navi-new__big-display-title"><span>مچ‌بند و ساعت هوشمند</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مچ‌بند و ساعت هوشمند&quot;}"
                                                        href="/search/category-wearable-gadget/"
                                                        class=" c-navi-new__medium-display-title"><span>مچ‌بند و ساعت هوشمند</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: هدفون، هدست، هندزفری - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;هدفون، هدست، هندزفری&quot;}"
                                                       href="/search/category-headphone-headset-microphone/"
                                                       class=" c-navi-new__big-display-title"><span>هدفون، هدست، هندزفری</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;هدفون، هدست، هندزفری&quot;}"
                                                        href="/search/category-headphone-headset-microphone/"
                                                        class=" c-navi-new__medium-display-title"><span>هدفون، هدست، هندزفری</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اسپیکر بلوتوث و با سیم - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسپیکر بلوتوث و با سیم&quot;}"
                                                       href="/search/category-speaker/"
                                                       class=" c-navi-new__big-display-title"><span>اسپیکر بلوتوث و با سیم</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسپیکر بلوتوث و با سیم&quot;}"
                                                        href="/search/category-speaker/"
                                                        class=" c-navi-new__medium-display-title"><span>اسپیکر بلوتوث و با سیم</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: هارد، فلش و SSD - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;هارد، فلش و SSD&quot;}"
                                                       href="/search/category-data-storage/"
                                                       class=" c-navi-new__big-display-title"><span>هارد، فلش و SSD</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;هارد، فلش و SSD&quot;}"
                                                        href="/search/category-data-storage/"
                                                        class=" c-navi-new__medium-display-title"><span>هارد، فلش و SSD</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوربین&quot;}"
                                                        href="/search/category-camera/"
                                                        class=" c-navi-new__big-display-title"><span>دوربین</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوربین&quot;}"
                                                        href="/search/category-camera/"
                                                        class=" c-navi-new__medium-display-title"><span>دوربین</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین عکاسی دیجیتال - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین عکاسی دیجیتال&quot;}"
                                                       href="/search/category-digital-camera/"
                                                       class=" c-navi-new__big-display-title">
                                                        دوربین عکاسی دیجیتال
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین عکاسی دیجیتال&quot;}"
                                                           href="/search/category-digital-camera/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دوربین عکاسی دیجیتال
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین‌ ورزشی و فیلم برداری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین‌ ورزشی و فیلم برداری&quot;}"
                                                       href="/search/category-camcorder/"
                                                       class=" c-navi-new__big-display-title">
                                                        دوربین‌ ورزشی و فیلم برداری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین‌ ورزشی و فیلم برداری&quot;}"
                                                           href="/search/category-camcorder/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دوربین‌ ورزشی و فیلم برداری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین‌ چاپ سریع - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین‌ چاپ سریع&quot;}"
                                                       href="/search/category-digital-camera/?q=%da%86%d8%a7%d9%be%20%d8%b3%d8%b1%db%8c%d8%b9&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        دوربین‌ چاپ سریع
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین‌ چاپ سریع&quot;}"
                                                           href="/search/category-digital-camera/?q=%da%86%d8%a7%d9%be%20%d8%b3%d8%b1%db%8c%d8%b9&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        دوربین‌ چاپ سریع
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی دوربین - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی دوربین&quot;}"
                                                       href="/search/category-camera-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم جانبی دوربین</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی دوربین&quot;}"
                                                        href="/search/category-camera-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم جانبی دوربین</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لنز - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لنز&quot;}"
                                                        href="/search/category-camera-lens/"
                                                        class=" c-navi-new__big-display-title">
                                                        لنز
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لنز&quot;}"
                                                           href="/search/category-camera-lens/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لنز
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف&quot;}"
                                                        href="/search/category-camera-bag/"
                                                        class=" c-navi-new__big-display-title">
                                                        کیف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف&quot;}"
                                                           href="/search/category-camera-bag/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کارت حافظه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کارت حافظه&quot;}"
                                                       href="/search/category-memory-cards/"
                                                       class=" c-navi-new__big-display-title">
                                                        کارت حافظه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کارت حافظه&quot;}"
                                                           href="/search/category-memory-cards/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کارت حافظه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کاغذ چاپ عکس - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاغذ چاپ عکس&quot;}"
                                                       href="/search/category-printer-paper/"
                                                       class=" c-navi-new__big-display-title">
                                                        کاغذ چاپ عکس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاغذ چاپ عکس&quot;}"
                                                           href="/search/category-printer-paper/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کاغذ چاپ عکس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین دو چشمی و شکاری - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوربین دو چشمی و شکاری&quot;}"
                                                       href="/search/category-binoculars/"
                                                       class=" c-navi-new__big-display-title"><span>دوربین دو چشمی و شکاری</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوربین دو چشمی و شکاری&quot;}"
                                                        href="/search/category-binoculars/"
                                                        class=" c-navi-new__medium-display-title"><span>دوربین دو چشمی و شکاری</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تلسکوپ - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تلسکوپ&quot;}"
                                                        href="/search/category-telescope/"
                                                        class=" c-navi-new__big-display-title"><span>تلسکوپ</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تلسکوپ&quot;}"
                                                        href="/search/category-telescope/"
                                                        class=" c-navi-new__medium-display-title"><span>تلسکوپ</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پلی استیشن، ایکس باکس و بازی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پلی استیشن، ایکس باکس و بازی&quot;}"
                                                       href="/search/category-game-console/"
                                                       class=" c-navi-new__big-display-title"><span>پلی استیشن، ایکس باکس و بازی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پلی استیشن، ایکس باکس و بازی&quot;}"
                                                        href="/search/category-game-console/"
                                                        class=" c-navi-new__medium-display-title"><span>پلی استیشن، ایکس باکس و بازی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Office Electronics - category_fa: کامپیوتر و تجهیزات جانبی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کامپیوتر و تجهیزات جانبی&quot;}"
                                                       href="/search/category-computer-parts/"
                                                       class=" c-navi-new__big-display-title"><span>کامپیوتر و تجهیزات جانبی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کامپیوتر و تجهیزات جانبی&quot;}"
                                                        href="/search/category-computer-parts/"
                                                        class=" c-navi-new__medium-display-title"><span>کامپیوتر و تجهیزات جانبی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تجهیزات مخصوص بازی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات مخصوص بازی&quot;}"
                                                       href="/search/category-gaming-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        تجهیزات مخصوص بازی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات مخصوص بازی&quot;}"
                                                           href="/search/category-gaming-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تجهیزات مخصوص بازی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مانیتور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مانیتور&quot;}"
                                                       href="/search/category-monitor/"
                                                       class=" c-navi-new__big-display-title">
                                                        مانیتور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مانیتور&quot;}"
                                                           href="/search/category-monitor/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مانیتور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیس‌های اسمبل شده - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیس‌های اسمبل شده&quot;}"
                                                       href="/search/category-assembled-cases/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیس‌های اسمبل شده
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیس‌های اسمبل شده&quot;}"
                                                           href="/search/category-assembled-cases/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیس‌های اسمبل شده
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قطعات داخلی کامپیوتر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قطعات داخلی کامپیوتر&quot;}"
                                                       href="/search/category-computer-devices/"
                                                       class=" c-navi-new__big-display-title">
                                                        قطعات داخلی کامپیوتر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قطعات داخلی کامپیوتر&quot;}"
                                                           href="/search/category-computer-devices/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قطعات داخلی کامپیوتر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماوس - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماوس&quot;}"
                                                        href="/search/category-mouse/"
                                                        class=" c-navi-new__big-display-title">
                                                        ماوس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماوس&quot;}"
                                                           href="/search/category-mouse/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماوس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیبورد - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیبورد&quot;}"
                                                        href="/search//category-keyboard/"
                                                        class=" c-navi-new__big-display-title">
                                                        کیبورد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیبورد&quot;}"
                                                           href="/search//category-keyboard/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیبورد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Laptop - category_fa: لپ تاپ - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لپ تاپ&quot;}"
                                                       href="/search/category-notebook-netbook-ultrabook/"
                                                       class=" c-navi-new__big-display-title"><span>لپ تاپ</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لپ تاپ&quot;}"
                                                        href="/search/category-notebook-netbook-ultrabook/"
                                                        class=" c-navi-new__medium-display-title"><span>لپ تاپ</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی لپ تاپ - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی لپ تاپ&quot;}"
                                                       href="/search/category-laptop-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم جانبی لپ تاپ</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی لپ تاپ&quot;}"
                                                        href="/search/category-laptop-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم جانبی لپ تاپ</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف، کوله و کاور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف، کوله و کاور&quot;}"
                                                       href="/search/category-laptop-bag/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیف، کوله و کاور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف، کوله و کاور&quot;}"
                                                           href="/search/category-laptop-bag/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف، کوله و کاور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کابل‌ صدا، AUX و HDMI - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کابل‌ صدا، AUX و HDMI&quot;}"
                                                       href="/search/category-cable-voice-video/"
                                                       class=" c-navi-new__big-display-title">
                                                        کابل‌ صدا، AUX و HDMI
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کابل‌ صدا، AUX و HDMI&quot;}"
                                                           href="/search/category-cable-voice-video/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کابل‌ صدا، AUX و HDMI
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Tablet - category_fa: تبلت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تبلت&quot;}"
                                                       href="https://www.digikala.com/search/category-tablet/"
                                                       class=" c-navi-new__big-display-title"><span>تبلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تبلت&quot;}"
                                                        href="https://www.digikala.com/search/category-tablet/"
                                                        class=" c-navi-new__medium-display-title"><span>تبلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شارژر تبلت و موبایل - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;شارژر تبلت و موبایل&quot;}"
                                                       href="/search/category-car-charger/"
                                                       class=" c-navi-new__big-display-title"><span>شارژر تبلت و موبایل</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;شارژر تبلت و موبایل&quot;}"
                                                        href="/search/category-car-charger/"
                                                        class=" c-navi-new__medium-display-title"><span>شارژر تبلت و موبایل</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Camera &amp; Studio Equipment - category_fa: کیف، کاور، لوازم جانبی تبلت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کیف، کاور، لوازم جانبی تبلت&quot;}"
                                                       href="/search/category-tablet-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>کیف، کاور، لوازم جانبی تبلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کیف، کاور، لوازم جانبی تبلت&quot;}"
                                                        href="/search/category-tablet-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>کیف، کاور، لوازم جانبی تبلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: باتری - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;باتری&quot;}"
                                                        href="/search/category-battery-charger-and-accesories/"
                                                        class=" c-navi-new__big-display-title"><span>باتری</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;باتری&quot;}"
                                                        href="/search/category-battery-charger-and-accesories/"
                                                        class=" c-navi-new__medium-display-title"><span>باتری</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین‌های تحت شبکه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوربین‌های تحت شبکه&quot;}"
                                                       href="/search/category-network-cam/"
                                                       class=" c-navi-new__big-display-title"><span>دوربین‌های تحت شبکه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوربین‌های تحت شبکه&quot;}"
                                                        href="/search/category-network-cam/"
                                                        class=" c-navi-new__medium-display-title"><span>دوربین‌های تحت شبکه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Accessories - category_fa: مودم و تجهیزات شبکه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مودم و تجهیزات شبکه&quot;}"
                                                       href="/search/category-network/"
                                                       class=" c-navi-new__big-display-title"><span>مودم و تجهیزات شبکه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مودم و تجهیزات شبکه&quot;}"
                                                        href="/search/category-network/"
                                                        class=" c-navi-new__medium-display-title"><span>مودم و تجهیزات شبکه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماشین های اداری - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ماشین های اداری&quot;}"
                                                       href="/search/category-office-machines/"
                                                       class=" c-navi-new__big-display-title"><span>ماشین های اداری</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ماشین های اداری&quot;}"
                                                        href="/search/category-office-machines/"
                                                        class=" c-navi-new__medium-display-title"><span>ماشین های اداری</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تلفن، بی سیم و سانترال - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تلفن، بی سیم و سانترال&quot;}"
                                                       href="/search/category-telephone/"
                                                       class=" c-navi-new__big-display-title">
                                                        تلفن، بی سیم و سانترال
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تلفن، بی سیم و سانترال&quot;}"
                                                           href="/search/category-telephone/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تلفن، بی سیم و سانترال
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فکس - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فکس&quot;}"
                                                        href="/search/category-fax/"
                                                        class=" c-navi-new__big-display-title">
                                                        فکس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فکس&quot;}"
                                                           href="/search/category-fax/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فکس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پرینتر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پرینتر&quot;}"
                                                        href="/search/category-printer/"
                                                        class=" c-navi-new__big-display-title">
                                                        پرینتر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پرینتر&quot;}"
                                                           href="/search/category-printer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پرینتر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی اداری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی اداری&quot;}"
                                                       href="/search/category-office-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم جانبی اداری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی اداری&quot;}"
                                                           href="/search/category-office-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم جانبی اداری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کتابخوان فیدیبوک - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کتابخوان فیدیبوک&quot;}"
                                                       href="/search/category-ebook-reader/?q=فیدیبوک&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title"><span>کتابخوان فیدیبوک</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کتابخوان فیدیبوک&quot;}"
                                                        href="/search/category-ebook-reader/?q=فیدیبوک&amp;entry=mm"
                                                        class=" c-navi-new__medium-display-title"><span>کتابخوان فیدیبوک</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کارت هدیه خرید از دیجی‌کالا - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کارت هدیه خرید از دیجی‌کالا&quot;}"
                                                       href="/main/dk-ds-gift-card/"
                                                       class=" c-navi-new__big-display-title"><span>کارت هدیه خرید از دیجی‌کالا</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کارت هدیه خرید از دیجی‌کالا&quot;}"
                                                        href="/main/dk-ds-gift-card/"
                                                        class=" c-navi-new__medium-display-title"><span>کارت هدیه خرید از دیجی‌کالا</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-2">
                                            <div class="c-navi-new-list__sublist-top-bar"><a href="/main/vehicles/"
                                                                                             class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های وسایل نقلیه و صنعتی
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خودروهای ایرانی و خارجی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خودروهای ایرانی و خارجی&quot;}"
                                                       href="/search/category-cars/"
                                                       class=" c-navi-new__big-display-title"><span>خودروهای ایرانی و خارجی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خودروهای ایرانی و خارجی&quot;}"
                                                        href="/search/category-cars/"
                                                        class=" c-navi-new__medium-display-title"><span>خودروهای ایرانی و خارجی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: موتور سیکلت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;موتور سیکلت&quot;}"
                                                       href="/search/category-motorbike/"
                                                       class=" c-navi-new__big-display-title"><span>موتور سیکلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;موتور سیکلت&quot;}"
                                                        href="/search/category-motorbike/"
                                                        class=" c-navi-new__medium-display-title"><span>موتور سیکلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی خودرو و موتورسیکلت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی خودرو و موتورسیکلت&quot;}"
                                                       href="/search/category-car-accessory-parts/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم جانبی خودرو و موتورسیکلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی خودرو و موتورسیکلت&quot;}"
                                                        href="/search/category-car-accessory-parts/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم جانبی خودرو و موتورسیکلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم تزیینی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم تزیینی&quot;}"
                                                       href="/search/category-in-car-accessorie/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم تزیینی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم تزیینی&quot;}"
                                                           href="/search/category-in-car-accessorie/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم تزیینی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سیستم صوتی و تصویری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سیستم صوتی و تصویری&quot;}"
                                                       href="/search/category-car-stereo/"
                                                       class=" c-navi-new__big-display-title">
                                                        سیستم صوتی و تصویری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سیستم صوتی و تصویری&quot;}"
                                                           href="/search/category-car-stereo/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سیستم صوتی و تصویری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نظافت و نگهداری خودرو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نظافت و نگهداری خودرو&quot;}"
                                                       href="/search/category-car-cleaning-and-maintenance/"
                                                       class=" c-navi-new__big-display-title">
                                                        نظافت و نگهداری خودرو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نظافت و نگهداری خودرو&quot;}"
                                                           href="/search/category-car-cleaning-and-maintenance/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نظافت و نگهداری خودرو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کلاه کاسکت و  لوازم جانبی موتور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کلاه کاسکت و  لوازم جانبی موتور&quot;}"
                                                       href="/search/category-motorbike-accessory-parts/"
                                                       class=" c-navi-new__big-display-title">
                                                        کلاه کاسکت و لوازم جانبی موتور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کلاه کاسکت و  لوازم جانبی موتور&quot;}"
                                                           href="/search/category-motorbike-accessory-parts/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کلاه کاسکت و لوازم جانبی موتور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم یدکی خودرو و موتورسیکلت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم یدکی خودرو و موتورسیکلت&quot;}"
                                                       href="/search/category-car-spare-parts/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم یدکی خودرو و موتورسیکلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم یدکی خودرو و موتورسیکلت&quot;}"
                                                        href="/search/category-car-spare-parts/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم یدکی خودرو و موتورسیکلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دیسک و صفحه کلاچ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دیسک و صفحه کلاچ&quot;}"
                                                       href="/search/category-clutch-kit/"
                                                       class=" c-navi-new__big-display-title">
                                                        دیسک و صفحه کلاچ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دیسک و صفحه کلاچ&quot;}"
                                                           href="/search/category-clutch-kit/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دیسک و صفحه کلاچ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: جلوبندی و تعلیق - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جلوبندی و تعلیق&quot;}"
                                                       href="/search/category-suspension-systems-and-component/"
                                                       class=" c-navi-new__big-display-title">
                                                        جلوبندی و تعلیق
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جلوبندی و تعلیق&quot;}"
                                                           href="/search/category-suspension-systems-and-component/"
                                                           class=" c-navi-new__medium-display-title">
                                                        جلوبندی و تعلیق
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چراغ خودرو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ خودرو&quot;}"
                                                       href="/search/category-automotive-lighting/"
                                                       class=" c-navi-new__big-display-title">
                                                        چراغ خودرو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ خودرو&quot;}"
                                                           href="/search/category-automotive-lighting/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چراغ خودرو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تسمه خودرو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تسمه خودرو&quot;}"
                                                       href="/search/category-engine-belt/"
                                                       class=" c-navi-new__big-display-title">
                                                        تسمه خودرو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تسمه خودرو&quot;}"
                                                           href="/search/category-engine-belt/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تسمه خودرو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کمک فنر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کمک فنر&quot;}"
                                                       href="/search/category-shock-absorber/"
                                                       class=" c-navi-new__big-display-title">
                                                        کمک فنر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کمک فنر&quot;}"
                                                           href="/search/category-shock-absorber/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کمک فنر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم مصرفی خودرو و موتورسیکلت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم مصرفی خودرو و موتورسیکلت&quot;}"
                                                       href="/search/category-consumable-parts/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم مصرفی خودرو و موتورسیکلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم مصرفی خودرو و موتورسیکلت&quot;}"
                                                        href="/search/category-consumable-parts/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم مصرفی خودرو و موتورسیکلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لاستیک و تایر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لاستیک و تایر&quot;}"
                                                       href="/search/category-tire/"
                                                       class=" c-navi-new__big-display-title">
                                                        لاستیک و تایر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لاستیک و تایر&quot;}"
                                                           href="/search/category-tire/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لاستیک و تایر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لنت ترمز - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لنت ترمز&quot;}"
                                                       href="/search/category-brake-pad/"
                                                       class=" c-navi-new__big-display-title">
                                                        لنت ترمز
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لنت ترمز&quot;}"
                                                           href="/search/category-brake-pad/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لنت ترمز
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: روغن موتور و ضد یخ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;روغن موتور و ضد یخ&quot;}"
                                                       href="/search/category-oils-and-additives/"
                                                       class=" c-navi-new__big-display-title">
                                                        روغن موتور و ضد یخ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;روغن موتور و ضد یخ&quot;}"
                                                           href="/search/category-oils-and-additives/"
                                                           class=" c-navi-new__medium-display-title">
                                                        روغن موتور و ضد یخ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مکمل سوخت و روغن و انواع فیلتر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مکمل سوخت و روغن و انواع فیلتر&quot;}"
                                                       href="/search/category-car-oil-and-fuel-additive/"
                                                       class=" c-navi-new__big-display-title">
                                                        مکمل سوخت و روغن و انواع فیلتر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مکمل سوخت و روغن و انواع فیلتر&quot;}"
                                                           href="/search/category-car-oil-and-fuel-additive/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مکمل سوخت و روغن و انواع فیلتر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Sport Gadgets - category_fa: ابزار برقی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار برقی&quot;}"
                                                       href="/search/category-power-tools/"
                                                       class=" c-navi-new__big-display-title"><span>ابزار برقی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار برقی&quot;}"
                                                        href="/search/category-power-tools/"
                                                        class=" c-navi-new__medium-display-title"><span>ابزار برقی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دریل، پیچ گوشتی برقی و شارژی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دریل، پیچ گوشتی برقی و شارژی&quot;}"
                                                       href="/search/category-cordlessscrewdriver/"
                                                       class=" c-navi-new__big-display-title">
                                                        دریل، پیچ گوشتی برقی و شارژی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دریل، پیچ گوشتی برقی و شارژی&quot;}"
                                                           href="/search/category-cordlessscrewdriver/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دریل، پیچ گوشتی برقی و شارژی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فرز و سنگ رومیزی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فرز و سنگ رومیزی&quot;}"
                                                       href="/search/category-anglegrinder/"
                                                       class=" c-navi-new__big-display-title">
                                                        فرز و سنگ رومیزی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فرز و سنگ رومیزی&quot;}"
                                                           href="/search/category-anglegrinder/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فرز و سنگ رومیزی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: موتور برق - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;موتور برق&quot;}"
                                                       href="/search/category-electric-engine/"
                                                       class=" c-navi-new__big-display-title">
                                                        موتور برق
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;موتور برق&quot;}"
                                                           href="/search/category-electric-engine/"
                                                           class=" c-navi-new__medium-display-title">
                                                        موتور برق
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مکنده و دمنده - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مکنده و دمنده&quot;}"
                                                       href="/search/category-blower/"
                                                       class=" c-navi-new__big-display-title">
                                                        مکنده و دمنده
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مکنده و دمنده&quot;}"
                                                           href="/search/category-blower/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مکنده و دمنده
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کارواش - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کارواش&quot;}"
                                                        href="/search/category-carwash/"
                                                        class=" c-navi-new__big-display-title">
                                                        کارواش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کارواش&quot;}"
                                                           href="/search/category-carwash/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کارواش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کمپرسور و جک خودرو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کمپرسور و جک خودرو&quot;}"
                                                       href="/search/category-car-tools/"
                                                       class=" c-navi-new__big-display-title">
                                                        کمپرسور و جک خودرو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کمپرسور و جک خودرو&quot;}"
                                                           href="/search/category-car-tools/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کمپرسور و جک خودرو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار همه کاره برقی و شارژی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار همه کاره برقی و شارژی&quot;}"
                                                       href="/search/category-multitool/"
                                                       class=" c-navi-new__big-display-title">
                                                        ابزار همه کاره برقی و شارژی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار همه کاره برقی و شارژی&quot;}"
                                                           href="/search/category-multitool/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ابزار همه کاره برقی و شارژی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار غیر برقی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار غیر برقی&quot;}"
                                                       href="/search/category-non-electrical-tools/"
                                                       class=" c-navi-new__big-display-title"><span>ابزار غیر برقی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار غیر برقی&quot;}"
                                                        href="/search/category-non-electrical-tools/"
                                                        class=" c-navi-new__medium-display-title"><span>ابزار غیر برقی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار دستی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار دستی&quot;}"
                                                       href="/search/category-hand-tools/"
                                                       class=" c-navi-new__big-display-title">
                                                        ابزار دستی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار دستی&quot;}"
                                                           href="/search/category-hand-tools/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ابزار دستی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مجموعه ابزار - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مجموعه ابزار&quot;}"
                                                       href="/search/category-tools-set/"
                                                       class=" c-navi-new__big-display-title">
                                                        مجموعه ابزار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مجموعه ابزار&quot;}"
                                                           href="/search/category-tools-set/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مجموعه ابزار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نردبان - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نردبان&quot;}"
                                                        href="/search/category-ladders/"
                                                        class=" c-navi-new__big-display-title">
                                                        نردبان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نردبان&quot;}"
                                                           href="/search/category-ladders/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نردبان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پیچ گوشتی و فازمتر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پیچ گوشتی و فازمتر&quot;}"
                                                       href="/search/category-screwdriver/"
                                                       class=" c-navi-new__big-display-title">
                                                        پیچ گوشتی و فازمتر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پیچ گوشتی و فازمتر&quot;}"
                                                           href="/search/category-screwdriver/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پیچ گوشتی و فازمتر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نظم دهنده ابزار - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نظم دهنده ابزار&quot;}"
                                                       href="/search/category-tool-organizer/"
                                                       class=" c-navi-new__big-display-title">
                                                        نظم دهنده ابزار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نظم دهنده ابزار&quot;}"
                                                           href="/search/category-tool-organizer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نظم دهنده ابزار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: متر، تراز، اندازه‌گیری دقیق - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;متر، تراز، اندازه‌گیری دقیق&quot;}"
                                                       href="/search/category-measurement/"
                                                       class=" c-navi-new__big-display-title">
                                                        متر، تراز، اندازه‌گیری دقیق
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;متر، تراز، اندازه‌گیری دقیق&quot;}"
                                                           href="/search/category-measurement/"
                                                           class=" c-navi-new__medium-display-title">
                                                        متر، تراز، اندازه‌گیری دقیق
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم روانکاری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم روانکاری&quot;}"
                                                       href="/search/category-oilcan/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم روانکاری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم روانکاری&quot;}"
                                                           href="/search/category-oilcan/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم روانکاری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چسب صنعتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چسب صنعتی&quot;}"
                                                       href="/search/category-industrial-glue/"
                                                       class=" c-navi-new__big-display-title">
                                                        چسب صنعتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چسب صنعتی&quot;}"
                                                           href="/search/category-industrial-glue/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چسب صنعتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم و یراق آلات ساختمانی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم و یراق آلات ساختمانی&quot;}"
                                                       href="/search/category-construction-tools-and-equipment/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم و یراق آلات ساختمانی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم و یراق آلات ساختمانی&quot;}"
                                                        href="/search/category-construction-tools-and-equipment/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم و یراق آلات ساختمانی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شیرآلات - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیرآلات&quot;}"
                                                       href="/search/category-faucets/"
                                                       class=" c-navi-new__big-display-title">
                                                        شیرآلات
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیرآلات&quot;}"
                                                           href="/search/category-faucets/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شیرآلات
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: رنگ - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;رنگ&quot;}"
                                                        href="/search/category-color/"
                                                        class=" c-navi-new__big-display-title">
                                                        رنگ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;رنگ&quot;}"
                                                           href="/search/category-color/"
                                                           class=" c-navi-new__medium-display-title">
                                                        رنگ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دستگیره در - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستگیره در&quot;}"
                                                       href="/search/category-doorknob/"
                                                       class=" c-navi-new__big-display-title">
                                                        دستگیره در
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستگیره در&quot;}"
                                                           href="/search/category-doorknob/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دستگیره در
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم باغبانی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم باغبانی&quot;}"
                                                       href="/search/category-gardening-tools/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم باغبانی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم باغبانی&quot;}"
                                                        href="/search/category-gardening-tools/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم باغبانی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قیچی‌، چاقو و ابزار باغبانی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قیچی‌، چاقو و ابزار باغبانی&quot;}"
                                                       href="/search/category-scissors/"
                                                       class=" c-navi-new__big-display-title">
                                                        قیچی‌، چاقو و ابزار باغبانی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قیچی‌، چاقو و ابزار باغبانی&quot;}"
                                                           href="/search/category-scissors/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قیچی‌، چاقو و ابزار باغبانی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بذر و تخم گیاهان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بذر و تخم گیاهان&quot;}"
                                                       href="/search/category-plants-grain-and-seeds/"
                                                       class=" c-navi-new__big-display-title">
                                                        بذر و تخم گیاهان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بذر و تخم گیاهان&quot;}"
                                                           href="/search/category-plants-grain-and-seeds/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بذر و تخم گیاهان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تبر، بیل و کلنگ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تبر، بیل و کلنگ&quot;}"
                                                       href="/search/category-axeshovelandpick/"
                                                       class=" c-navi-new__big-display-title">
                                                        تبر، بیل و کلنگ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تبر، بیل و کلنگ&quot;}"
                                                           href="/search/category-axeshovelandpick/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تبر، بیل و کلنگ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خاک، کود و آفت کش - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خاک، کود و آفت کش&quot;}"
                                                       href="/search/category-soils-and-fertilizers/"
                                                       class=" c-navi-new__big-display-title">
                                                        خاک، کود و آفت کش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خاک، کود و آفت کش&quot;}"
                                                           href="/search/category-soils-and-fertilizers/"
                                                           class=" c-navi-new__medium-display-title">
                                                        خاک، کود و آفت کش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نور و روشنایی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نور و روشنایی&quot;}"
                                                       href="/search/category-lighting/"
                                                       class=" c-navi-new__big-display-title"><span>نور و روشنایی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نور و روشنایی&quot;}"
                                                        href="/search/category-lighting/"
                                                        class=" c-navi-new__medium-display-title"><span>نور و روشنایی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوسترو آباژور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوسترو آباژور&quot;}"
                                                       href="/search/category-hanging-lamps/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوسترو آباژور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوسترو آباژور&quot;}"
                                                           href="/search/category-hanging-lamps/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوسترو آباژور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لامپ - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لامپ&quot;}"
                                                        href="/search/category-lamp/"
                                                        class=" c-navi-new__big-display-title">
                                                        لامپ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لامپ&quot;}"
                                                           href="/search/category-lamp/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لامپ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چندراهی برق و محافظ ولتاژ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چندراهی برق و محافظ ولتاژ&quot;}"
                                                       href="/search/category-power-strip/"
                                                       class=" c-navi-new__big-display-title">
                                                        چندراهی برق و محافظ ولتاژ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چندراهی برق و محافظ ولتاژ&quot;}"
                                                           href="/search/category-power-strip/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چندراهی برق و محافظ ولتاژ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تجهیزات ایمنی و کار - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تجهیزات ایمنی و کار&quot;}"
                                                       href="/search/category-safety-tools/"
                                                       class=" c-navi-new__big-display-title"><span>تجهیزات ایمنی و کار</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تجهیزات ایمنی و کار&quot;}"
                                                        href="/search/category-safety-tools/"
                                                        class=" c-navi-new__medium-display-title"><span>تجهیزات ایمنی و کار</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ایمنی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش ایمنی&quot;}"
                                                       href="/search/category-safety-shoes/"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش ایمنی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش ایمنی&quot;}"
                                                           href="/search/category-safety-shoes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش ایمنی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حفاظتی و امنیتی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;حفاظتی و امنیتی&quot;}"
                                                       href="/search/category-protection-and-security-equipment/"
                                                       class=" c-navi-new__big-display-title"><span>حفاظتی و امنیتی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;حفاظتی و امنیتی&quot;}"
                                                        href="/search/category-protection-and-security-equipment/"
                                                        class=" c-navi-new__medium-display-title"><span>حفاظتی و امنیتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گاوصندوق - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گاوصندوق&quot;}"
                                                       href="/search/category-safe/"
                                                       class=" c-navi-new__big-display-title">
                                                        گاوصندوق
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گاوصندوق&quot;}"
                                                           href="/search/category-safe/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گاوصندوق
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-3">
                                            <div class="c-navi-new-list__sublist-top-bar"><a href="/main/apparel/"
                                                                                             class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های مد و پوشاک
                                                </a><a href="https://www.digistyle.com" target="_blank"
                                                       class="c-navi-new-list__sublist-top-bar-image"><img
                                                        src="https://www.digikala.com/static/files/5851ec93.svg"></a>
                                            </div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مردانه - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مردانه&quot;}"
                                                        href="/search/category-mens-apparel/"
                                                        class=" c-navi-new__big-display-title"><span>مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مردانه&quot;}"
                                                        href="/search/category-mens-apparel/"
                                                        class=" c-navi-new__medium-display-title"><span>مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لباس مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لباس مردانه&quot;}"
                                                       href="/search/category-men-clothing/"
                                                       class=" c-navi-new__big-display-title"><span>لباس مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لباس مردانه&quot;}"
                                                        href="/search/category-men-clothing/"
                                                        class=" c-navi-new__medium-display-title"><span>لباس مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تی شرت و پولو شرت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تی شرت و پولو شرت&quot;}"
                                                       href="/search/category-men-tee-shirts-and-polos/"
                                                       class=" c-navi-new__big-display-title">
                                                        تی شرت و پولو شرت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تی شرت و پولو شرت&quot;}"
                                                           href="/search/category-men-tee-shirts-and-polos/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تی شرت و پولو شرت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پیراهن - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پیراهن&quot;}"
                                                        href="/search/category-men-shirts/"
                                                        class=" c-navi-new__big-display-title">
                                                        پیراهن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پیراهن&quot;}"
                                                           href="/search/category-men-shirts/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پیراهن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شلوار - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شلوار&quot;}"
                                                        href="/search/category-men-trousers-jumpsuits/"
                                                        class=" c-navi-new__big-display-title">
                                                        شلوار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شلوار&quot;}"
                                                           href="/search/category-men-trousers-jumpsuits/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شلوار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لباس زیر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لباس زیر&quot;}"
                                                       href="/search/category-men-underwear/"
                                                       class=" c-navi-new__big-display-title">
                                                        لباس زیر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لباس زیر&quot;}"
                                                           href="/search/category-men-underwear/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لباس زیر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش مردانه&quot;}"
                                                       href="/search/category-men-shoes/"
                                                       class=" c-navi-new__big-display-title"><span>کفش مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش مردانه&quot;}"
                                                        href="/search/category-men-shoes/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش روزمره - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش روزمره&quot;}"
                                                       href="/search/category-casual-shoes-for-men/"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش روزمره
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش روزمره&quot;}"
                                                           href="/search/category-casual-shoes-for-men/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش روزمره
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش رسمی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش رسمی&quot;}"
                                                       href="/search/category-men-formal-shoes/"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش رسمی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش رسمی&quot;}"
                                                           href="/search/category-men-formal-shoes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش رسمی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اکسسوری مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اکسسوری مردانه&quot;}"
                                                       href="/search/category-men-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>اکسسوری مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اکسسوری مردانه&quot;}"
                                                        href="/search/category-men-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>اکسسوری مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ساعت - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساعت&quot;}"
                                                        href="/search/category-men-watches/"
                                                        class=" c-navi-new__big-display-title">
                                                        ساعت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساعت&quot;}"
                                                           href="/search/category-men-watches/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ساعت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف&quot;}"
                                                        href="/search/category-men-bags/"
                                                        class=" c-navi-new__big-display-title">
                                                        کیف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف&quot;}"
                                                           href="/search/category-men-bags/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کمربند - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کمربند&quot;}"
                                                        href="/search/category-men-belts/"
                                                        class=" c-navi-new__big-display-title">
                                                        کمربند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کمربند&quot;}"
                                                           href="/search/category-men-belts/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کمربند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Women - category_fa: زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زنانه&quot;}"
                                                       href="/search/category-womens-apparel/"
                                                       class=" c-navi-new__big-display-title"><span>زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زنانه&quot;}"
                                                        href="/search/category-womens-apparel/"
                                                        class=" c-navi-new__medium-display-title"><span>زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لباس زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لباس زنانه&quot;}"
                                                       href="/search/category-women-clothing/"
                                                       class=" c-navi-new__big-display-title"><span>لباس زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لباس زنانه&quot;}"
                                                        href="/search/category-women-clothing/"
                                                        class=" c-navi-new__medium-display-title"><span>لباس زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشش اسلامی و مانتو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پوشش اسلامی و مانتو&quot;}"
                                                       href="/search/category-women-islamicwear/"
                                                       class=" c-navi-new__big-display-title">
                                                        پوشش اسلامی و مانتو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پوشش اسلامی و مانتو&quot;}"
                                                           href="/search/category-women-islamicwear/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پوشش اسلامی و مانتو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بلوز و شومیز - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بلوز و شومیز&quot;}"
                                                       href="/search/category-women-shirts/"
                                                       class=" c-navi-new__big-display-title">
                                                        بلوز و شومیز
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بلوز و شومیز&quot;}"
                                                           href="/search/category-women-shirts/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بلوز و شومیز
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تی شرت و پولوشرت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تی شرت و پولوشرت&quot;}"
                                                       href="/search/category-women-tee-shirts-and-polos/"
                                                       class=" c-navi-new__big-display-title">
                                                        تی شرت و پولوشرت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تی شرت و پولوشرت&quot;}"
                                                           href="/search/category-women-tee-shirts-and-polos/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تی شرت و پولوشرت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شلوار و سرهمی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شلوار و سرهمی&quot;}"
                                                       href="/search/category-women-trousers-and-jumpsuits/"
                                                       class=" c-navi-new__big-display-title">
                                                        شلوار و سرهمی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شلوار و سرهمی&quot;}"
                                                           href="/search/category-women-trousers-and-jumpsuits/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شلوار و سرهمی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لباس زیر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لباس زیر&quot;}"
                                                       href="/search/category-women-underwear/"
                                                       class=" c-navi-new__big-display-title">
                                                        لباس زیر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لباس زیر&quot;}"
                                                           href="/search/category-women-underwear/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لباس زیر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش زنانه&quot;}"
                                                       href="/search/category-women-shoes/"
                                                       class=" c-navi-new__big-display-title"><span>کفش زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش زنانه&quot;}"
                                                        href="/search/category-women-shoes/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش روزمره - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش روزمره&quot;}"
                                                       href="/search/category-casual-shoes-for-women/"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش روزمره
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش روزمره&quot;}"
                                                           href="/search/category-casual-shoes-for-women/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش روزمره
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش تخت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش تخت&quot;}"
                                                       href="/search/category-women-flat-shoes/"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش تخت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش تخت&quot;}"
                                                           href="/search/category-women-flat-shoes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش تخت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اکسسوری زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اکسسوری زنانه&quot;}"
                                                       href="/search/category-women-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>اکسسوری زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اکسسوری زنانه&quot;}"
                                                        href="/search/category-women-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>اکسسوری زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ساعت - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساعت&quot;}"
                                                        href="/search/category-women-watches/"
                                                        class=" c-navi-new__big-display-title">
                                                        ساعت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساعت&quot;}"
                                                           href="/search/category-women-watches/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ساعت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف&quot;}"
                                                        href="/search/category-women-bags/"
                                                        class=" c-navi-new__big-display-title">
                                                        کیف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف&quot;}"
                                                           href="/search/category-women-bags/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شال و روسری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شال و روسری&quot;}"
                                                       href="/search/category-women-scarves/"
                                                       class=" c-navi-new__big-display-title">
                                                        شال و روسری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شال و روسری&quot;}"
                                                           href="/search/category-women-scarves/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شال و روسری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیورآلات زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات زنانه&quot;}"
                                                       href="/search/category-women-jewelry/"
                                                       class=" c-navi-new__big-display-title"><span>زیورآلات زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات زنانه&quot;}"
                                                        href="/search/category-women-jewelry/"
                                                        class=" c-navi-new__medium-display-title"><span>زیورآلات زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دستبند - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستبند&quot;}"
                                                        href="/search/category-women-bracelet/"
                                                        class=" c-navi-new__big-display-title">
                                                        دستبند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستبند&quot;}"
                                                           href="/search/category-women-bracelet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دستبند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گوشواره - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشواره&quot;}"
                                                       href="/search/category-women-earrings/"
                                                       class=" c-navi-new__big-display-title">
                                                        گوشواره
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشواره&quot;}"
                                                           href="/search/category-women-earrings/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گوشواره
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گردنبند - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گردنبند&quot;}"
                                                       href="/search/category-women-necklace/"
                                                       class=" c-navi-new__big-display-title">
                                                        گردنبند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گردنبند&quot;}"
                                                           href="/search/category-women-necklace/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گردنبند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیورآلات طلا زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات طلا زنانه&quot;}"
                                                       href="/search/category-women-gold-jewelry/"
                                                       class=" c-navi-new__big-display-title"><span>زیورآلات طلا زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات طلا زنانه&quot;}"
                                                        href="/search/category-women-gold-jewelry/"
                                                        class=" c-navi-new__medium-display-title"><span>زیورآلات طلا زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دستبند - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستبند&quot;}"
                                                        href="/search/category-women-gold-bracelet/"
                                                        class=" c-navi-new__big-display-title">
                                                        دستبند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستبند&quot;}"
                                                           href="/search/category-women-gold-bracelet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دستبند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گوشواره - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشواره&quot;}"
                                                       href="/search/category-women-gold-earrings/"
                                                       class=" c-navi-new__big-display-title">
                                                        گوشواره
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشواره&quot;}"
                                                           href="/search/category-women-gold-earrings/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گوشواره
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آویز - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آویز&quot;}"
                                                        href="/search/category-women-gold-pendants/"
                                                        class=" c-navi-new__big-display-title">
                                                        آویز
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آویز&quot;}"
                                                           href="/search/category-women-gold-pendants/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آویز
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گردنبند - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گردنبند&quot;}"
                                                       href="/search/category-women-gold-necklace/"
                                                       class=" c-navi-new__big-display-title">
                                                        گردنبند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گردنبند&quot;}"
                                                           href="/search/category-women-gold-necklace/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گردنبند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیورآلات نقره زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات نقره زنانه&quot;}"
                                                       href="/search/category-women-silver-jewelry/"
                                                       class=" c-navi-new__big-display-title"><span>زیورآلات نقره زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات نقره زنانه&quot;}"
                                                        href="/search/category-women-silver-jewelry/"
                                                        class=" c-navi-new__medium-display-title"><span>زیورآلات نقره زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عینک آفتابی زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;عینک آفتابی زنانه&quot;}"
                                                       href="/search/category-women-eyewear/"
                                                       class=" c-navi-new__big-display-title"><span>عینک آفتابی زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;عینک آفتابی زنانه&quot;}"
                                                        href="/search/category-women-eyewear/"
                                                        class=" c-navi-new__medium-display-title"><span>عینک آفتابی زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عینک آفتابی مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;عینک آفتابی مردانه&quot;}"
                                                       href="/search/category-men-eyewear/"
                                                       class=" c-navi-new__big-display-title"><span>عینک آفتابی مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;عینک آفتابی مردانه&quot;}"
                                                        href="/search/category-men-eyewear/"
                                                        class=" c-navi-new__medium-display-title"><span>عینک آفتابی مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی مردانه&quot;}"
                                                       href="/search/category-men-sportswear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی مردانه&quot;}"
                                                        href="/search/category-men-sportswear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی زنانه&quot;}"
                                                       href="/search/category-women-sportwear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی زنانه&quot;}"
                                                        href="/search/category-women-sportwear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی مردانه&quot;}"
                                                       href="/search/category-men-sport-shoes-/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی مردانه&quot;}"
                                                        href="/search/category-men-sport-shoes-/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی زنانه&quot;}"
                                                       href="/search/category-women-sport-shoes-/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی زنانه&quot;}"
                                                        href="/search/category-women-sport-shoes-/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی پسرانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی پسرانه&quot;}"
                                                       href="/search/category-boys-sportswear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی پسرانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی پسرانه&quot;}"
                                                        href="/search/category-boys-sportswear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی پسرانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی دخترانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی دخترانه&quot;}"
                                                       href="/search/category-girls-sportswear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی دخترانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی دخترانه&quot;}"
                                                        href="/search/category-girls-sportswear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی دخترانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی پسرانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی پسرانه&quot;}"
                                                       href="/search/category-boys-sport-shoes/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی پسرانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی پسرانه&quot;}"
                                                        href="/search/category-boys-sport-shoes/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی پسرانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی دخترانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی دخترانه&quot;}"
                                                       href="/search/category-girls-sport-shoes/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی دخترانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی دخترانه&quot;}"
                                                        href="/search/category-girls-sport-shoes/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی دخترانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کوله پشتی مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کوله پشتی مردانه&quot;}"
                                                       href="/search/category-men-backpacks/"
                                                       class=" c-navi-new__big-display-title"><span>کوله پشتی مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کوله پشتی مردانه&quot;}"
                                                        href="/search/category-men-backpacks/"
                                                        class=" c-navi-new__medium-display-title"><span>کوله پشتی مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بچه گانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بچه گانه&quot;}"
                                                       href="/search/category-kids-apparel/"
                                                       class=" c-navi-new__big-display-title"><span>بچه گانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بچه گانه&quot;}"
                                                        href="/search/category-kids-apparel/"
                                                        class=" c-navi-new__medium-display-title"><span>بچه گانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نوزاد - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوزاد&quot;}"
                                                        href="/search/category-kids-clothes/"
                                                        class=" c-navi-new__big-display-title">
                                                        نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوزاد&quot;}"
                                                           href="/search/category-kids-clothes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پسرانه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پسرانه&quot;}"
                                                        href="/search/category-boys-clothing/"
                                                        class=" c-navi-new__big-display-title">
                                                        پسرانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پسرانه&quot;}"
                                                           href="/search/category-boys-clothing/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پسرانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دخترانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دخترانه&quot;}"
                                                       href="/search/category-girls-clothing/"
                                                       class=" c-navi-new__big-display-title">
                                                        دخترانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دخترانه&quot;}"
                                                           href="/search/category-girls-clothing/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دخترانه
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-4">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/mother-and-child/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های اسباب بازی و کودک
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Kids Apparel - category_fa: بهداشت و حمام کودک و نوزاد - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بهداشت و حمام کودک و نوزاد&quot;}"
                                                       href="/search/category-health-and-bathroom-tools/"
                                                       class=" c-navi-new__big-display-title"><span>بهداشت و حمام کودک و نوزاد</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بهداشت و حمام کودک و نوزاد&quot;}"
                                                        href="/search/category-health-and-bathroom-tools/"
                                                        class=" c-navi-new__medium-display-title"><span>بهداشت و حمام کودک و نوزاد</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشک - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پوشک&quot;}"
                                                        href="/search/category-diaper/"
                                                        class=" c-navi-new__big-display-title">
                                                        پوشک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پوشک&quot;}"
                                                           href="/search/category-diaper/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پوشک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دستمال مرطوب - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستمال مرطوب&quot;}"
                                                       href="/search/category-wet-wipes/"
                                                       class=" c-navi-new__big-display-title">
                                                        دستمال مرطوب
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستمال مرطوب&quot;}"
                                                           href="/search/category-wet-wipes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دستمال مرطوب
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حوله - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حوله&quot;}"
                                                        href="/search/category-baby-towel/"
                                                        class=" c-navi-new__big-display-title">
                                                        حوله
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حوله&quot;}"
                                                           href="/search/category-baby-towel/"
                                                           class=" c-navi-new__medium-display-title">
                                                        حوله
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: وان حمام نوزاد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;وان حمام نوزاد&quot;}"
                                                       href="/search/category-baby-bath-tub/"
                                                       class=" c-navi-new__big-display-title">
                                                        وان حمام نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;وان حمام نوزاد&quot;}"
                                                           href="/search/category-baby-bath-tub/"
                                                           class=" c-navi-new__medium-display-title">
                                                        وان حمام نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مینی واش - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مینی واش&quot;}"
                                                       href="/search/category-diaper-cleaner/"
                                                       class=" c-navi-new__big-display-title">
                                                        مینی واش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مینی واش&quot;}"
                                                           href="/search/category-diaper-cleaner/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مینی واش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شامپو کودک و نوزاد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شامپو کودک و نوزاد&quot;}"
                                                       href="/search/category-baby-shampoo/"
                                                       class=" c-navi-new__big-display-title">
                                                        شامپو کودک و نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شامپو کودک و نوزاد&quot;}"
                                                           href="/search/category-baby-shampoo/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شامپو کودک و نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک و کفش کودک و نوزاد - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک و کفش کودک و نوزاد&quot;}"
                                                       href="/search/category-kids-apparel/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک و کفش کودک و نوزاد</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک و کفش کودک و نوزاد&quot;}"
                                                        href="/search/category-kids-apparel/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک و کفش کودک و نوزاد</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لباس کودک و لباس نوزادی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لباس کودک و لباس نوزادی&quot;}"
                                                       href="/search/category-children-and-baby-clothes/"
                                                       class=" c-navi-new__big-display-title">
                                                        لباس کودک و لباس نوزادی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لباس کودک و لباس نوزادی&quot;}"
                                                           href="/search/category-children-and-baby-clothes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لباس کودک و لباس نوزادی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش  - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش &quot;}"
                                                        href="/search/category-kidsshoes/"
                                                        class=" c-navi-new__big-display-title">
                                                        کفش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش &quot;}"
                                                           href="/search/category-kidsshoes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش ورزشی&quot;}"
                                                       href="/search/category-kids-sport-shoes/"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش ورزشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش ورزشی&quot;}"
                                                           href="/search/category-kids-sport-shoes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش ورزشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: جوراب و پاپوش کودک و نوزاد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جوراب و پاپوش کودک و نوزاد&quot;}"
                                                       href="/search/category-kids-socks-/"
                                                       class=" c-navi-new__big-display-title">
                                                        جوراب و پاپوش کودک و نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جوراب و پاپوش کودک و نوزاد&quot;}"
                                                           href="/search/category-kids-socks-/"
                                                           class=" c-navi-new__medium-display-title">
                                                        جوراب و پاپوش کودک و نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کلاه و پیشبند نوزاد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کلاه و پیشبند نوزاد&quot;}"
                                                       href="/search/category-hat-and-bib/"
                                                       class=" c-navi-new__big-display-title">
                                                        کلاه و پیشبند نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کلاه و پیشبند نوزاد&quot;}"
                                                           href="/search/category-hat-and-bib/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کلاه و پیشبند نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تبلت - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تبلت&quot;}"
                                                        href="/search/category-tablet/"
                                                        class=" c-navi-new__big-display-title"><span>تبلت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تبلت&quot;}"
                                                        href="/search/category-tablet/"
                                                        class=" c-navi-new__medium-display-title"><span>تبلت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: XBox, PS4 و بازی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;XBox, PS4 و بازی&quot;}"
                                                       href="/search/category-game-console/"
                                                       class=" c-navi-new__big-display-title"><span>XBox, PS4 و بازی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;XBox, PS4 و بازی&quot;}"
                                                        href="/search/category-game-console/"
                                                        class=" c-navi-new__medium-display-title"><span>XBox, PS4 و بازی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Dining Accessories - category_fa: اسباب بازی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسباب بازی&quot;}"
                                                       href="/search/category-toys/"
                                                       class=" c-navi-new__big-display-title"><span>اسباب بازی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسباب بازی&quot;}"
                                                        href="/search/category-toys/"
                                                        class=" c-navi-new__medium-display-title"><span>اسباب بازی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فکری و آموزشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فکری و آموزشی&quot;}"
                                                       href="/search/category-intellectual-and-educational/"
                                                       class=" c-navi-new__big-display-title">
                                                        فکری و آموزشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فکری و آموزشی&quot;}"
                                                           href="/search/category-intellectual-and-educational/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فکری و آموزشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پازل، لگو و ساختنی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پازل، لگو و ساختنی&quot;}"
                                                       href="/search/category-puzzles-and-building/"
                                                       class=" c-navi-new__big-display-title">
                                                        پازل، لگو و ساختنی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پازل، لگو و ساختنی&quot;}"
                                                           href="/search/category-puzzles-and-building/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پازل، لگو و ساختنی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عروسک و فیگور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عروسک و فیگور&quot;}"
                                                       href="/search/category-toy-and-model/"
                                                       class=" c-navi-new__big-display-title">
                                                        عروسک و فیگور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عروسک و فیگور&quot;}"
                                                           href="/search/category-toy-and-model/"
                                                           class=" c-navi-new__medium-display-title">
                                                        عروسک و فیگور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اسپینر، ابزار شوخی و سرگرمی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اسپینر، ابزار شوخی و سرگرمی&quot;}"
                                                       href="/search/category-humor-and-entertainment/"
                                                       class=" c-navi-new__big-display-title">
                                                        اسپینر، ابزار شوخی و سرگرمی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اسپینر، ابزار شوخی و سرگرمی&quot;}"
                                                           href="/search/category-humor-and-entertainment/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اسپینر، ابزار شوخی و سرگرمی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تفنگ، تیر و لوازم بازی جنگی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تفنگ، تیر و لوازم بازی جنگی&quot;}"
                                                       href="/search/category-guns-and-combat/"
                                                       class=" c-navi-new__big-display-title">
                                                        تفنگ، تیر و لوازم بازی جنگی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تفنگ، تیر و لوازم بازی جنگی&quot;}"
                                                           href="/search/category-guns-and-combat/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تفنگ، تیر و لوازم بازی جنگی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Educational Equipment  - category_fa: بازی و سرگرمی کودک - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بازی و سرگرمی کودک&quot;}"
                                                       href="/search/category-entertainment-and-games-equipment/"
                                                       class=" c-navi-new__big-display-title"><span>بازی و سرگرمی کودک</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بازی و سرگرمی کودک&quot;}"
                                                        href="/search/category-entertainment-and-games-equipment/"
                                                        class=" c-navi-new__medium-display-title"><span>بازی و سرگرمی کودک</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماشین بازی، موتور، سه چرخه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین بازی، موتور، سه چرخه&quot;}"
                                                       href="/search/category-tricycle-and-motorcycle/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماشین بازی، موتور، سه چرخه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین بازی، موتور، سه چرخه&quot;}"
                                                           href="/search/category-tricycle-and-motorcycle/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماشین بازی، موتور، سه چرخه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوچرخه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوچرخه&quot;}"
                                                        href="/search/category-bicycles/"
                                                        class=" c-navi-new__big-display-title">
                                                        دوچرخه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوچرخه&quot;}"
                                                           href="/search/category-bicycles/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دوچرخه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تشک بازی و پارک بازی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تشک بازی و پارک بازی&quot;}"
                                                       href="/search/category-play-gym/"
                                                       class=" c-navi-new__big-display-title">
                                                        تشک بازی و پارک بازی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تشک بازی و پارک بازی&quot;}"
                                                           href="/search/category-play-gym/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تشک بازی و پارک بازی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تاب و سرسره - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تاب و سرسره&quot;}"
                                                       href="/search/category-swings-and-slides/"
                                                       class=" c-navi-new__big-display-title">
                                                        تاب و سرسره
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تاب و سرسره&quot;}"
                                                           href="/search/category-swings-and-slides/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تاب و سرسره
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سلامت، ایمنی و مراقبت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;سلامت، ایمنی و مراقبت&quot;}"
                                                       href="/search/category-safety-and-care/"
                                                       class=" c-navi-new__big-display-title"><span>سلامت، ایمنی و مراقبت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;سلامت، ایمنی و مراقبت&quot;}"
                                                        href="/search/category-safety-and-care/"
                                                        class=" c-navi-new__medium-display-title"><span>سلامت، ایمنی و مراقبت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تصفیه هوا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تصفیه هوا&quot;}"
                                                       href="/search/category-air-purifier/"
                                                       class=" c-navi-new__big-display-title">
                                                        تصفیه هوا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تصفیه هوا&quot;}"
                                                           href="/search/category-air-purifier/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تصفیه هوا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ترازو - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترازو&quot;}"
                                                        href="/search/category-digital-scale/"
                                                        class=" c-navi-new__big-display-title">
                                                        ترازو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترازو&quot;}"
                                                           href="/search/category-digital-scale/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ترازو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوربین و پیجر اتاق کودک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین و پیجر اتاق کودک&quot;}"
                                                       href="/search/category-baby-monitor-and-pager/"
                                                       class=" c-navi-new__big-display-title">
                                                        دوربین و پیجر اتاق کودک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دوربین و پیجر اتاق کودک&quot;}"
                                                           href="/search/category-baby-monitor-and-pager/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دوربین و پیجر اتاق کودک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تب سنج و دماسنج - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تب سنج و دماسنج&quot;}"
                                                       href="/search/category-baby-thermometer/"
                                                       class=" c-navi-new__big-display-title">
                                                        تب سنج و دماسنج
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تب سنج و دماسنج&quot;}"
                                                           href="/search/category-baby-thermometer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تب سنج و دماسنج
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: محافظ و ابزار ایمنی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;محافظ و ابزار ایمنی&quot;}"
                                                       href="/search/category-safety-tools-for-children-and-babies/"
                                                       class=" c-navi-new__big-display-title">
                                                        محافظ و ابزار ایمنی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;محافظ و ابزار ایمنی&quot;}"
                                                           href="/search/category-safety-tools-for-children-and-babies/"
                                                           class=" c-navi-new__medium-display-title">
                                                        محافظ و ابزار ایمنی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Kid bedroom &amp;  - category_fa: خواب کودک - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خواب کودک&quot;}"
                                                       href="/search/category-baby-bedding/"
                                                       class=" c-navi-new__big-display-title"><span>خواب کودک</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خواب کودک&quot;}"
                                                        href="/search/category-baby-bedding/"
                                                        class=" c-navi-new__medium-display-title"><span>خواب کودک</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مبلمان اتاق کودک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مبلمان اتاق کودک&quot;}"
                                                       href="/search/category-childrens-bedroom-furniture/"
                                                       class=" c-navi-new__big-display-title">
                                                        مبلمان اتاق کودک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مبلمان اتاق کودک&quot;}"
                                                           href="/search/category-childrens-bedroom-furniture/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مبلمان اتاق کودک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چراغ خواب کودک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ خواب کودک&quot;}"
                                                       href="/search/category-baby-decorative-lamp/"
                                                       class=" c-navi-new__big-display-title">
                                                        چراغ خواب کودک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ خواب کودک&quot;}"
                                                           href="/search/category-baby-decorative-lamp/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چراغ خواب کودک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تشک کودک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تشک کودک&quot;}"
                                                       href="/search/category-baby-mat/"
                                                       class=" c-navi-new__big-display-title">
                                                        تشک کودک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تشک کودک&quot;}"
                                                           href="/search/category-baby-mat/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تشک کودک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سرویس خواب - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سرویس خواب&quot;}"
                                                       href="/search/category-bed-set/"
                                                       class=" c-navi-new__big-display-title">
                                                        سرویس خواب
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سرویس خواب&quot;}"
                                                           href="/search/category-bed-set/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سرویس خواب
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پتو - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پتو&quot;}"
                                                        href="/search/category-blanket/"
                                                        class=" c-navi-new__big-display-title">
                                                        پتو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پتو&quot;}"
                                                           href="/search/category-blanket/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پتو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بالش شیردهی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بالش شیردهی&quot;}"
                                                       href="/search/category-feeding-pillow/"
                                                       class=" c-navi-new__big-display-title">
                                                        بالش شیردهی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بالش شیردهی&quot;}"
                                                           href="/search/category-feeding-pillow/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بالش شیردهی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Entertainment &amp; Toys - category_fa: ملزومات گردش و سفر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ملزومات گردش و سفر&quot;}"
                                                       href="/search/category-promenade-and-travel-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>ملزومات گردش و سفر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ملزومات گردش و سفر&quot;}"
                                                        href="/search/category-promenade-and-travel-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>ملزومات گردش و سفر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کالسکه و کریر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کالسکه و کریر&quot;}"
                                                       href="/search/category-stroller-and-carrier/"
                                                       class=" c-navi-new__big-display-title">
                                                        کالسکه و کریر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کالسکه و کریر&quot;}"
                                                           href="/search/category-stroller-and-carrier/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کالسکه و کریر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: صندلی خودرو کودک و نوزاد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;صندلی خودرو کودک و نوزاد&quot;}"
                                                       href="/search/category-chair-species/"
                                                       class=" c-navi-new__big-display-title">
                                                        صندلی خودرو کودک و نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;صندلی خودرو کودک و نوزاد&quot;}"
                                                           href="/search/category-chair-species/"
                                                           class=" c-navi-new__medium-display-title">
                                                        صندلی خودرو کودک و نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ساک لوازم نوزاد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساک لوازم نوزاد&quot;}"
                                                       href="/search/category-diaper-bag/"
                                                       class=" c-navi-new__big-display-title">
                                                        ساک لوازم نوزاد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساک لوازم نوزاد&quot;}"
                                                           href="/search/category-diaper-bag/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ساک لوازم نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی گردش و سفر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی گردش و سفر&quot;}"
                                                       href="/search/category-children-and-baby-promenade-and-travel-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم جانبی گردش و سفر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی گردش و سفر&quot;}"
                                                           href="/search/category-children-and-baby-promenade-and-travel-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم جانبی گردش و سفر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آغوشی - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آغوشی&quot;}"
                                                        href="/search/category-baby-carrier/"
                                                        class=" c-navi-new__big-display-title">
                                                        آغوشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آغوشی&quot;}"
                                                           href="/search/category-baby-carrier/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آغوشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم شخصی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم شخصی&quot;}"
                                                       href="/search/category-personal-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم شخصی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم شخصی&quot;}"
                                                        href="/search/category-personal-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم شخصی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پستانک و ملزومات - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پستانک و ملزومات&quot;}"
                                                       href="/search/category-pacifier-and-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        پستانک و ملزومات
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پستانک و ملزومات&quot;}"
                                                           href="/search/category-pacifier-and-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پستانک و ملزومات
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شیردوش - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیردوش&quot;}"
                                                        href="/search/category-milking/"
                                                        class=" c-navi-new__big-display-title">
                                                        شیردوش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیردوش&quot;}"
                                                           href="/search/category-milking/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شیردوش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شورت آموزشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شورت آموزشی&quot;}"
                                                       href="/search/category-training-short/"
                                                       class=" c-navi-new__big-display-title">
                                                        شورت آموزشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شورت آموزشی&quot;}"
                                                           href="/search/category-training-short/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شورت آموزشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: غذاخوری - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;غذاخوری&quot;}"
                                                       href="/search/category-dining-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>غذاخوری</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;غذاخوری&quot;}"
                                                        href="/search/category-dining-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>غذاخوری</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: صندلی غذاخوری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;صندلی غذاخوری&quot;}"
                                                       href="/search/category-booster-seat/"
                                                       class=" c-navi-new__big-display-title">
                                                        صندلی غذاخوری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;صندلی غذاخوری&quot;}"
                                                           href="/search/category-booster-seat/"
                                                           class=" c-navi-new__medium-display-title">
                                                        صندلی غذاخوری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شیشه شیر، سرلاک، داروخوری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیشه شیر، سرلاک، داروخوری&quot;}"
                                                       href="/search/category-baby-bottle/"
                                                       class=" c-navi-new__big-display-title">
                                                        شیشه شیر، سرلاک، داروخوری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیشه شیر، سرلاک، داروخوری&quot;}"
                                                           href="/search/category-baby-bottle/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شیشه شیر، سرلاک، داروخوری
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-5">
                                            <div class="c-navi-new-list__sublist-top-bar"><a href="/main/food-beverage/"
                                                                                             class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های کالاهای سوپرمارکتی
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کالای اساسی و خوار و بار - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کالای اساسی و خوار و بار&quot;}"
                                                       href="/search/category-groceries/"
                                                       class=" c-navi-new__big-display-title"><span>کالای اساسی و خوار و بار</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کالای اساسی و خوار و بار&quot;}"
                                                        href="/search/category-groceries/"
                                                        class=" c-navi-new__medium-display-title"><span>کالای اساسی و خوار و بار</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نان - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نان&quot;}"
                                                        href="/search/category-bread/"
                                                        class=" c-navi-new__big-display-title">
                                                        نان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نان&quot;}"
                                                           href="/search/category-bread/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: برنج - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;برنج&quot;}"
                                                        href="/search/category-rice/"
                                                        class=" c-navi-new__big-display-title">
                                                        برنج
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;برنج&quot;}"
                                                           href="/search/category-rice/"
                                                           class=" c-navi-new__medium-display-title">
                                                        برنج
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: روغن - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;روغن&quot;}"
                                                        href="/search/category-oil/"
                                                        class=" c-navi-new__big-display-title">
                                                        روغن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;روغن&quot;}"
                                                           href="/search/category-oil/"
                                                           class=" c-navi-new__medium-display-title">
                                                        روغن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قند - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قند&quot;}"
                                                        href="/search/category-sugar-cube/"
                                                        class=" c-navi-new__big-display-title">
                                                        قند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قند&quot;}"
                                                           href="/search/category-sugar-cube/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شکر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شکر&quot;}"
                                                        href="/search/category-sugar/"
                                                        class=" c-navi-new__big-display-title">
                                                        شکر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شکر&quot;}"
                                                           href="/search/category-sugar/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شکر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سس - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سس&quot;}"
                                                        href="/search/category-sauce-dressing/"
                                                        class=" c-navi-new__big-display-title">
                                                        سس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سس&quot;}"
                                                           href="/search/category-sauce-dressing/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: رب و کنسرو گوجه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;رب و کنسرو گوجه&quot;}"
                                                       href="/search/category-tomato-paste/"
                                                       class=" c-navi-new__big-display-title">
                                                        رب و کنسرو گوجه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;رب و کنسرو گوجه&quot;}"
                                                           href="/search/category-tomato-paste/"
                                                           class=" c-navi-new__medium-display-title">
                                                        رب و کنسرو گوجه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خیارشور و ترشیجات - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خیارشور و ترشیجات&quot;}"
                                                       href="/search/category-salted-marzipan/"
                                                       class=" c-navi-new__big-display-title">
                                                        خیارشور و ترشیجات
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خیارشور و ترشیجات&quot;}"
                                                           href="/search/category-salted-marzipan/"
                                                           class=" c-navi-new__medium-display-title">
                                                        خیارشور و ترشیجات
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آبلیمو، آبغوره و سرکه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آبلیمو، آبغوره و سرکه&quot;}"
                                                       href="/search/category-liquid-condiments/"
                                                       class=" c-navi-new__big-display-title">
                                                        آبلیمو، آبغوره و سرکه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آبلیمو، آبغوره و سرکه&quot;}"
                                                           href="/search/category-liquid-condiments/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آبلیمو، آبغوره و سرکه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماکارونی، پاستا و رشته - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماکارونی، پاستا و رشته&quot;}"
                                                       href="/search/category-spaghetti-pasta/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماکارونی، پاستا و رشته
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماکارونی، پاستا و رشته&quot;}"
                                                           href="/search/category-spaghetti-pasta/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماکارونی، پاستا و رشته
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زعفران، زرشک و تزیینات غذا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زعفران، زرشک و تزیینات غذا&quot;}"
                                                       href="/search/category-food-design/"
                                                       class=" c-navi-new__big-display-title">
                                                        زعفران، زرشک و تزیینات غذا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زعفران، زرشک و تزیینات غذا&quot;}"
                                                           href="/search/category-food-design/"
                                                           class=" c-navi-new__medium-display-title">
                                                        زعفران، زرشک و تزیینات غذا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حبوبات و سویا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حبوبات و سویا&quot;}"
                                                       href="/search/category-beans/"
                                                       class=" c-navi-new__big-display-title">
                                                        حبوبات و سویا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حبوبات و سویا&quot;}"
                                                           href="/search/category-beans/"
                                                           class=" c-navi-new__medium-display-title">
                                                        حبوبات و سویا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: صبحانه - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;صبحانه&quot;}"
                                                        href="/search/category-breakfast/"
                                                        class=" c-navi-new__big-display-title"><span>صبحانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;صبحانه&quot;}"
                                                        href="/search/category-breakfast/"
                                                        class=" c-navi-new__medium-display-title"><span>صبحانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مربا - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مربا&quot;}"
                                                        href="/search/category-jams-butter/"
                                                        class=" c-navi-new__big-display-title">
                                                        مربا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مربا&quot;}"
                                                           href="/search/category-jams-butter/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مربا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عسل - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عسل&quot;}"
                                                        href="/search/category-honey/"
                                                        class=" c-navi-new__big-display-title">
                                                        عسل
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عسل&quot;}"
                                                           href="/search/category-honey/"
                                                           class=" c-navi-new__medium-display-title">
                                                        عسل
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حلواشکری، ارده و کنجد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حلواشکری، ارده و کنجد&quot;}"
                                                       href="/search/category-halva-ardeh-sesame/"
                                                       class=" c-navi-new__big-display-title">
                                                        حلواشکری، ارده و کنجد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حلواشکری، ارده و کنجد&quot;}"
                                                           href="/search/category-halva-ardeh-sesame/"
                                                           class=" c-navi-new__medium-display-title">
                                                        حلواشکری، ارده و کنجد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مواد پروتئینی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مواد پروتئینی&quot;}"
                                                       href="/search/category-protein-foods/"
                                                       class=" c-navi-new__big-display-title"><span>مواد پروتئینی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مواد پروتئینی&quot;}"
                                                        href="/search/category-protein-foods/"
                                                        class=" c-navi-new__medium-display-title"><span>مواد پروتئینی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سوسیس و کالباس - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سوسیس و کالباس&quot;}"
                                                       href="/search/category-sausages/"
                                                       class=" c-navi-new__big-display-title">
                                                        سوسیس و کالباس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سوسیس و کالباس&quot;}"
                                                           href="/search/category-sausages/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سوسیس و کالباس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گوشت گوسفندی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشت گوسفندی&quot;}"
                                                       href="/search/category-sheep-meat/"
                                                       class=" c-navi-new__big-display-title">
                                                        گوشت گوسفندی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشت گوسفندی&quot;}"
                                                           href="/search/category-sheep-meat/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گوشت گوسفندی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گوشت مرغ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشت مرغ&quot;}"
                                                       href="/search/category-chicken/"
                                                       class=" c-navi-new__big-display-title">
                                                        گوشت مرغ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشت مرغ&quot;}"
                                                           href="/search/category-chicken/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گوشت مرغ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تخم مرغ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تخم مرغ&quot;}"
                                                       href="/search/category-eggs/"
                                                       class=" c-navi-new__big-display-title">
                                                        تخم مرغ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تخم مرغ&quot;}"
                                                           href="/search/category-eggs/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تخم مرغ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گوشت گاو و گوساله - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشت گاو و گوساله&quot;}"
                                                       href="/search/category-beaf/"
                                                       class=" c-navi-new__big-display-title">
                                                        گوشت گاو و گوساله
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشت گاو و گوساله&quot;}"
                                                           href="/search/category-beaf/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گوشت گاو و گوساله
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: میگو - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;میگو&quot;}"
                                                        href="/search/category-shrimp/"
                                                        class=" c-navi-new__big-display-title">
                                                        میگو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;میگو&quot;}"
                                                           href="/search/category-shrimp/"
                                                           class=" c-navi-new__medium-display-title">
                                                        میگو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماهی - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماهی&quot;}"
                                                        href="/search/category-fish/"
                                                        class=" c-navi-new__big-display-title">
                                                        ماهی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماهی&quot;}"
                                                           href="/search/category-fish/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماهی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تن ماهی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تن ماهی&quot;}"
                                                       href="/search/category-tuna-fish/"
                                                       class=" c-navi-new__big-display-title">
                                                        تن ماهی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تن ماهی&quot;}"
                                                           href="/search/category-tuna-fish/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تن ماهی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لبنیات - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لبنیات&quot;}"
                                                        href="/search/category-dairy/"
                                                        class=" c-navi-new__big-display-title"><span>لبنیات</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لبنیات&quot;}"
                                                        href="/search/category-dairy/"
                                                        class=" c-navi-new__medium-display-title"><span>لبنیات</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شیر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیر&quot;}"
                                                        href="/search/category-milk/"
                                                        class=" c-navi-new__big-display-title">
                                                        شیر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شیر&quot;}"
                                                           href="/search/category-milk/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شیر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماست - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماست&quot;}"
                                                        href="/search/category-yogurt/"
                                                        class=" c-navi-new__big-display-title">
                                                        ماست
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماست&quot;}"
                                                           href="/search/category-yogurt/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماست
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پنیر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پنیر&quot;}"
                                                        href="/search/category-cheese/"
                                                        class=" c-navi-new__big-display-title">
                                                        پنیر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پنیر&quot;}"
                                                           href="/search/category-cheese/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پنیر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خامه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خامه&quot;}"
                                                        href="/search/category-cream/"
                                                        class=" c-navi-new__big-display-title">
                                                        خامه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خامه&quot;}"
                                                           href="/search/category-cream/"
                                                           class=" c-navi-new__medium-display-title">
                                                        خامه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نوشیدنی ها - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نوشیدنی ها&quot;}"
                                                       href="/search/category-beverages/"
                                                       class=" c-navi-new__big-display-title"><span>نوشیدنی ها</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نوشیدنی ها&quot;}"
                                                        href="/search/category-beverages/"
                                                        class=" c-navi-new__medium-display-title"><span>نوشیدنی ها</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چای - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چای&quot;}"
                                                        href="/search/category-tea/"
                                                        class=" c-navi-new__big-display-title">
                                                        چای
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چای&quot;}"
                                                           href="/search/category-tea/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چای
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دمنوش - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دمنوش&quot;}"
                                                        href="/search/category-herbal-tea/"
                                                        class=" c-navi-new__big-display-title">
                                                        دمنوش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دمنوش&quot;}"
                                                           href="/search/category-herbal-tea/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دمنوش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قهوه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قهوه&quot;}"
                                                        href="/search/category-coffee"
                                                        class=" c-navi-new__big-display-title">
                                                        قهوه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قهوه&quot;}"
                                                           href="/search/category-coffee"
                                                           class=" c-navi-new__medium-display-title">
                                                        قهوه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آب و آب معدنی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آب و آب معدنی&quot;}"
                                                       href="/search/category-mineral-water/"
                                                       class=" c-navi-new__big-display-title">
                                                        آب و آب معدنی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آب و آب معدنی&quot;}"
                                                           href="/search/category-mineral-water/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آب و آب معدنی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماءالشعیر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماءالشعیر&quot;}"
                                                       href="/search/category-non-alcoholic/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماءالشعیر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماءالشعیر&quot;}"
                                                           href="/search/category-non-alcoholic/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماءالشعیر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نوشابه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوشابه&quot;}"
                                                        href="/search/category-soft-drink/"
                                                        class=" c-navi-new__big-display-title">
                                                        نوشابه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوشابه&quot;}"
                                                           href="/search/category-soft-drink/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نوشابه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شربت و آبمیوه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شربت و آبمیوه&quot;}"
                                                       href="/search/category-fruit-juice/"
                                                       class=" c-navi-new__big-display-title">
                                                        شربت و آبمیوه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شربت و آبمیوه&quot;}"
                                                           href="/search/category-fruit-juice/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شربت و آبمیوه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: میوه و سبزی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;میوه و سبزی&quot;}"
                                                       href="/search/category-fruits-and-vegetables/"
                                                       class=" c-navi-new__big-display-title"><span>میوه و سبزی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;میوه و سبزی&quot;}"
                                                        href="/search/category-fruits-and-vegetables/"
                                                        class=" c-navi-new__medium-display-title"><span>میوه و سبزی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: غذای آماده و نودل - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;غذای آماده و نودل&quot;}"
                                                       href="/search/category-ready-made-canned-food/"
                                                       class=" c-navi-new__big-display-title"><span>غذای آماده و نودل</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;غذای آماده و نودل&quot;}"
                                                        href="/search/category-ready-made-canned-food/"
                                                        class=" c-navi-new__medium-display-title"><span>غذای آماده و نودل</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فرآورده‌های منجمد - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فرآورده‌های منجمد&quot;}"
                                                       href="/search/category-frozen-food/"
                                                       class=" c-navi-new__big-display-title"><span>فرآورده‌های منجمد</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فرآورده‌های منجمد&quot;}"
                                                        href="/search/category-frozen-food/"
                                                        class=" c-navi-new__medium-display-title"><span>فرآورده‌های منجمد</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کنسرو و کمپوت - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کنسرو و کمپوت&quot;}"
                                                       href="/search/category-canned-food/"
                                                       class=" c-navi-new__big-display-title"><span>کنسرو و کمپوت</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کنسرو و کمپوت&quot;}"
                                                        href="/search/category-canned-food/"
                                                        class=" c-navi-new__medium-display-title"><span>کنسرو و کمپوت</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تنقلات - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تنقلات&quot;}"
                                                        href="/search/category-snacks/"
                                                        class=" c-navi-new__big-display-title"><span>تنقلات</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تنقلات&quot;}"
                                                        href="/search/category-snacks/"
                                                        class=" c-navi-new__medium-display-title"><span>تنقلات</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شکلات، تافی و آبنبات - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شکلات، تافی و آبنبات&quot;}"
                                                       href="/search/category-chocolate/"
                                                       class=" c-navi-new__big-display-title">
                                                        شکلات، تافی و آبنبات
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شکلات، تافی و آبنبات&quot;}"
                                                           href="/search/category-chocolate/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شکلات، تافی و آبنبات
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بیسکویت و ویفر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بیسکویت و ویفر&quot;}"
                                                       href="/search/category-biscuits-wafers/"
                                                       class=" c-navi-new__big-display-title">
                                                        بیسکویت و ویفر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بیسکویت و ویفر&quot;}"
                                                           href="/search/category-biscuits-wafers/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بیسکویت و ویفر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مغز طعم‌دار خشکبار - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مغز طعم‌دار خشکبار&quot;}"
                                                       href="/search/category-nuts-trail-mix/"
                                                       class=" c-navi-new__big-display-title">
                                                        مغز طعم‌دار خشکبار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مغز طعم‌دار خشکبار&quot;}"
                                                           href="/search/category-nuts-trail-mix/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مغز طعم‌دار خشکبار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیک و کلوچه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیک و کلوچه&quot;}"
                                                       href="/search/category-cookies/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیک و کلوچه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیک و کلوچه&quot;}"
                                                           href="/search/category-cookies/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیک و کلوچه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چیپس و پاپ کورن - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چیپس و پاپ کورن&quot;}"
                                                       href="/search/category-chips/"
                                                       class=" c-navi-new__big-display-title">
                                                        چیپس و پاپ کورن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چیپس و پاپ کورن&quot;}"
                                                           href="/search/category-chips/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چیپس و پاپ کورن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پفک و اسنک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پفک و اسنک&quot;}"
                                                       href="/search/category-cheese-puffs/"
                                                       class=" c-navi-new__big-display-title">
                                                        پفک و اسنک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پفک و اسنک&quot;}"
                                                           href="/search/category-cheese-puffs/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پفک و اسنک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آدامس و خوشبوکننده - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آدامس و خوشبوکننده&quot;}"
                                                       href="/search/category-chewing-gum-breath-fresheners/"
                                                       class=" c-navi-new__big-display-title">
                                                        آدامس و خوشبوکننده
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آدامس و خوشبوکننده&quot;}"
                                                           href="/search/category-chewing-gum-breath-fresheners/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آدامس و خوشبوکننده
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خشکبار و شیرینی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خشکبار و شیرینی&quot;}"
                                                       href="/search/category-dried-fruit-nuts/"
                                                       class=" c-navi-new__big-display-title"><span>خشکبار و شیرینی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خشکبار و شیرینی&quot;}"
                                                        href="/search/category-dried-fruit-nuts/"
                                                        class=" c-navi-new__medium-display-title"><span>خشکبار و شیرینی</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-6">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/personal-appliance/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های آرایشی و بهداشتی
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Accessories - category_fa: لوازم آرایشی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم آرایشی&quot;}"
                                                       href="/search/category-beauty/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم آرایشی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم آرایشی&quot;}"
                                                        href="/search/category-beauty/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم آرایشی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آرایش چشم و ابرو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آرایش چشم و ابرو&quot;}"
                                                       href="/search/category-eye-and-eyebrow/"
                                                       class=" c-navi-new__big-display-title">
                                                        آرایش چشم و ابرو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آرایش چشم و ابرو&quot;}"
                                                           href="/search/category-eye-and-eyebrow/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آرایش چشم و ابرو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آرایش لب - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آرایش لب&quot;}"
                                                       href="/search/category-lip/"
                                                       class=" c-navi-new__big-display-title">
                                                        آرایش لب
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آرایش لب&quot;}"
                                                           href="/search/category-lip/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آرایش لب
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آرایش صورت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آرایش صورت&quot;}"
                                                       href="/search/category-face/"
                                                       class=" c-navi-new__big-display-title">
                                                        آرایش صورت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آرایش صورت&quot;}"
                                                           href="/search/category-face/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آرایش صورت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مواد آرایش مو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مواد آرایش مو&quot;}"
                                                       href="/search/category-hair-products/"
                                                       class=" c-navi-new__big-display-title">
                                                        مواد آرایش مو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مواد آرایش مو&quot;}"
                                                           href="/search/category-hair-products/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مواد آرایش مو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سنگ پا، بهداشت و زیبایی ناخن - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سنگ پا، بهداشت و زیبایی ناخن&quot;}"
                                                       href="/search/category-nail-care/"
                                                       class=" c-navi-new__big-display-title">
                                                        سنگ پا، بهداشت و زیبایی ناخن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سنگ پا، بهداشت و زیبایی ناخن&quot;}"
                                                           href="/search/category-nail-care/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سنگ پا، بهداشت و زیبایی ناخن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تجهیزات جانبی آرایشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات جانبی آرایشی&quot;}"
                                                       href="/search/category-beauty-accesories/"
                                                       class=" c-navi-new__big-display-title">
                                                        تجهیزات جانبی آرایشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات جانبی آرایشی&quot;}"
                                                           href="/search/category-beauty-accesories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تجهیزات جانبی آرایشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Watches - category_fa: لوازم بهداشتی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم بهداشتی&quot;}"
                                                       href="/search/category-personal-care/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم بهداشتی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم بهداشتی&quot;}"
                                                        href="/search/category-personal-care/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم بهداشتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کرم و مراقبت پوست - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کرم و مراقبت پوست&quot;}"
                                                       href="/search/category-face-and-body-cream/"
                                                       class=" c-navi-new__big-display-title">
                                                        کرم و مراقبت پوست
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کرم و مراقبت پوست&quot;}"
                                                           href="/search/category-face-and-body-cream/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کرم و مراقبت پوست
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شامپو و مراقبت مو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شامپو و مراقبت مو&quot;}"
                                                       href="/search/category-hair-care/"
                                                       class=" c-navi-new__big-display-title">
                                                        شامپو و مراقبت مو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شامپو و مراقبت مو&quot;}"
                                                           href="/search/category-hair-care/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شامپو و مراقبت مو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بهداشت دهان و دندان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بهداشت دهان و دندان&quot;}"
                                                       href="/search/category-dental-hygienist/"
                                                       class=" c-navi-new__big-display-title">
                                                        بهداشت دهان و دندان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بهداشت دهان و دندان&quot;}"
                                                           href="/search/category-dental-hygienist/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بهداشت دهان و دندان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بهداشت و مراقبت بدن - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بهداشت و مراقبت بدن&quot;}"
                                                       href="/search/category-body-care/"
                                                       class=" c-navi-new__big-display-title">
                                                        بهداشت و مراقبت بدن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بهداشت و مراقبت بدن&quot;}"
                                                           href="/search/category-body-care/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بهداشت و مراقبت بدن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ضد تعریق - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ضد تعریق&quot;}"
                                                       href="/search/category-anti-sweat/"
                                                       class=" c-navi-new__big-display-title">
                                                        ضد تعریق
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ضد تعریق&quot;}"
                                                           href="/search/category-anti-sweat/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ضد تعریق
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم شخصی برقی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم شخصی برقی&quot;}"
                                                       href="/search/category-electrical-personal-care/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم شخصی برقی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم شخصی برقی&quot;}"
                                                        href="/search/category-electrical-personal-care/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم شخصی برقی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماشین اصلاح صورت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین اصلاح صورت&quot;}"
                                                       href="/search/category-shaver/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماشین اصلاح صورت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین اصلاح صورت&quot;}"
                                                           href="/search/category-shaver/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماشین اصلاح صورت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماشین اصلاح سر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین اصلاح سر&quot;}"
                                                       href="/search/category-hair-trimmer/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماشین اصلاح سر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین اصلاح سر&quot;}"
                                                           href="/search/category-hair-trimmer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماشین اصلاح سر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سشوار - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سشوار&quot;}"
                                                        href="/search/category-hair-drier/"
                                                        class=" c-navi-new__big-display-title">
                                                        سشوار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سشوار&quot;}"
                                                           href="/search/category-hair-drier/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سشوار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اصلاح بدن آقایان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اصلاح بدن آقایان&quot;}"
                                                       href="/search/category-body-groom/"
                                                       class=" c-navi-new__big-display-title">
                                                        اصلاح بدن آقایان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اصلاح بدن آقایان&quot;}"
                                                           href="/search/category-body-groom/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اصلاح بدن آقایان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اصلاح بدن بانوان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اصلاح بدن بانوان&quot;}"
                                                       href="/search/category-epilator/"
                                                       class=" c-navi-new__big-display-title">
                                                        اصلاح بدن بانوان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اصلاح بدن بانوان&quot;}"
                                                           href="/search/category-epilator/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اصلاح بدن بانوان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اصلاح موی گوش، بینی و ابرو - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اصلاح موی گوش، بینی و ابرو&quot;}"
                                                       href="/search/category-nose-clipping/"
                                                       class=" c-navi-new__big-display-title">
                                                        اصلاح موی گوش، بینی و ابرو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اصلاح موی گوش، بینی و ابرو&quot;}"
                                                           href="/search/category-nose-clipping/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اصلاح موی گوش، بینی و ابرو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: برس پاک سازی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;برس پاک سازی&quot;}"
                                                       href="/search/category-skin-care-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        برس پاک سازی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;برس پاک سازی&quot;}"
                                                           href="/search/category-skin-care-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        برس پاک سازی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اتو مو و حالت دهنده - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اتو مو و حالت دهنده&quot;}"
                                                       href="/search/category-hair-iron/"
                                                       class=" c-navi-new__big-display-title">
                                                        اتو مو و حالت دهنده
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اتو مو و حالت دهنده&quot;}"
                                                           href="/search/category-hair-iron/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اتو مو و حالت دهنده
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بیگودی و فر کننده - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بیگودی و فر کننده&quot;}"
                                                       href="/search/category-hair-shaping/"
                                                       class=" c-navi-new__big-display-title">
                                                        بیگودی و فر کننده
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بیگودی و فر کننده&quot;}"
                                                           href="/search/category-hair-shaping/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بیگودی و فر کننده
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Tooth ‌Brush - category_fa: مسواک برقی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مسواک برقی&quot;}"
                                                       href="/search/category-electric-brusher/"
                                                       class=" c-navi-new__big-display-title">
                                                        مسواک برقی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مسواک برقی&quot;}"
                                                           href="/search/category-electric-brusher/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مسواک برقی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لیزر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لیزر&quot;}"
                                                        href="/search/category-electrical-personal-care/?q=لیزر&amp;entry=mm"
                                                        class=" c-navi-new__big-display-title">
                                                        لیزر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لیزر&quot;}"
                                                           href="/search/category-electrical-personal-care/?q=لیزر&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        لیزر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ست هدیه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ست هدیه&quot;}"
                                                       href="/search/category-gift-set/"
                                                       class=" c-navi-new__big-display-title"><span>ست هدیه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ست هدیه&quot;}"
                                                        href="/search/category-gift-set/"
                                                        class=" c-navi-new__medium-display-title"><span>ست هدیه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عطر، ادکلن، اسپری و ست - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;عطر، ادکلن، اسپری و ست&quot;}"
                                                       href="/search/category-perfume-all/"
                                                       class=" c-navi-new__big-display-title"><span>عطر، ادکلن، اسپری و ست</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;عطر، ادکلن، اسپری و ست&quot;}"
                                                        href="/search/category-perfume-all/"
                                                        class=" c-navi-new__medium-display-title"><span>عطر، ادکلن، اسپری و ست</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مردانه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مردانه&quot;}"
                                                        href="/search/category-perfume/?q=%d9%85%d8%b1%d8%af%d8%a7%d9%86%d9%87&amp;entry=mm"
                                                        class=" c-navi-new__big-display-title">
                                                        مردانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مردانه&quot;}"
                                                           href="/search/category-perfume/?q=%d9%85%d8%b1%d8%af%d8%a7%d9%86%d9%87&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        مردانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زنانه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زنانه&quot;}"
                                                        href="/search/category-perfume/?q=%d8%b2%d9%86%d8%a7%d9%86%d9%87&amp;entry=mm"
                                                        class=" c-navi-new__big-display-title">
                                                        زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زنانه&quot;}"
                                                           href="/search/category-perfume/?q=%d8%b2%d9%86%d8%a7%d9%86%d9%87&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: جیبی - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جیبی&quot;}"
                                                        href="/search/category-pocket-perfumes/"
                                                        class=" c-navi-new__big-display-title">
                                                        جیبی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جیبی&quot;}"
                                                           href="/search/category-pocket-perfumes/"
                                                           class=" c-navi-new__medium-display-title">
                                                        جیبی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اسپری - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اسپری&quot;}"
                                                        href="/search/category-spray/"
                                                        class=" c-navi-new__big-display-title">
                                                        اسپری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اسپری&quot;}"
                                                           href="/search/category-spray/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اسپری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: طلا، نقره و زیورآلات زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;طلا، نقره و زیورآلات زنانه&quot;}"
                                                       href="/search/category-women-accessories/?q=%d8%b2%db%8c%d9%88%d8%b1%d8%a2%d9%84%d8%a7%d8%aa&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title"><span>طلا، نقره و زیورآلات زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;طلا، نقره و زیورآلات زنانه&quot;}"
                                                        href="/search/category-women-accessories/?q=%d8%b2%db%8c%d9%88%d8%b1%d8%a2%d9%84%d8%a7%d8%aa&amp;entry=mm"
                                                        class=" c-navi-new__medium-display-title"><span>طلا، نقره و زیورآلات زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیورآلات نقره زنانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زیورآلات نقره زنانه&quot;}"
                                                       href="/search/category-women-silver-jewelry/"
                                                       class=" c-navi-new__big-display-title">
                                                        زیورآلات نقره زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زیورآلات نقره زنانه&quot;}"
                                                           href="/search/category-women-silver-jewelry/"
                                                           class=" c-navi-new__medium-display-title">
                                                        زیورآلات نقره زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیورآلات طلا زنانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زیورآلات طلا زنانه&quot;}"
                                                       href="/search/category-women-gold-jewelry/"
                                                       class=" c-navi-new__big-display-title">
                                                        زیورآلات طلا زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زیورآلات طلا زنانه&quot;}"
                                                           href="/search/category-women-gold-jewelry/"
                                                           class=" c-navi-new__medium-display-title">
                                                        زیورآلات طلا زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حلقه و انگشتر طلای زنانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حلقه و انگشتر طلای زنانه&quot;}"
                                                       href="/search/category-women-gold-ring/"
                                                       class=" c-navi-new__big-display-title">
                                                        حلقه و انگشتر طلای زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حلقه و انگشتر طلای زنانه&quot;}"
                                                           href="/search/category-women-gold-ring/"
                                                           class=" c-navi-new__medium-display-title">
                                                        حلقه و انگشتر طلای زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دستبند طلا زنانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستبند طلا زنانه&quot;}"
                                                       href="/search/category-women-gold-bracelet/"
                                                       class=" c-navi-new__big-display-title">
                                                        دستبند طلا زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دستبند طلا زنانه&quot;}"
                                                           href="/search/category-women-gold-bracelet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دستبند طلا زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گردنبند طلا زنانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گردنبند طلا زنانه&quot;}"
                                                       href="/search/category-women-gold-necklace/"
                                                       class=" c-navi-new__big-display-title">
                                                        گردنبند طلا زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گردنبند طلا زنانه&quot;}"
                                                           href="/search/category-women-gold-necklace/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گردنبند طلا زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گوشواره طلا زنانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشواره طلا زنانه&quot;}"
                                                       href="/search/category-women-gold-earrings/"
                                                       class=" c-navi-new__big-display-title">
                                                        گوشواره طلا زنانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گوشواره طلا زنانه&quot;}"
                                                           href="/search/category-women-gold-earrings/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گوشواره طلا زنانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیورآلات نقره مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات نقره مردانه&quot;}"
                                                       href="/search/category-men-silver-jewelry/"
                                                       class=" c-navi-new__big-display-title"><span>زیورآلات نقره مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;زیورآلات نقره مردانه&quot;}"
                                                        href="/search/category-men-silver-jewelry/"
                                                        class=" c-navi-new__medium-display-title"><span>زیورآلات نقره مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار سلامت و طبی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار سلامت و طبی&quot;}"
                                                       href="/search/category-health-care/"
                                                       class=" c-navi-new__big-display-title"><span>ابزار سلامت و طبی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار سلامت و طبی&quot;}"
                                                        href="/search/category-health-care/"
                                                        class=" c-navi-new__medium-display-title"><span>ابزار سلامت و طبی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مچ بند و ساعت هوشمند - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مچ بند و ساعت هوشمند&quot;}"
                                                       href="/search/category-wearable-gadget/"
                                                       class=" c-navi-new__big-display-title">
                                                        مچ بند و ساعت هوشمند
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مچ بند و ساعت هوشمند&quot;}"
                                                           href="/search/category-wearable-gadget/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مچ بند و ساعت هوشمند
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ترازو - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترازو&quot;}"
                                                        href="/search/category-digital-scale/"
                                                        class=" c-navi-new__big-display-title">
                                                        ترازو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترازو&quot;}"
                                                           href="/search/category-digital-scale/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ترازو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کالای خواب و استراحت طبی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کالای خواب و استراحت طبی&quot;}"
                                                       href="/search/category-%20sleep-and-rest-medical/"
                                                       class=" c-navi-new__big-display-title">
                                                        کالای خواب و استراحت طبی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کالای خواب و استراحت طبی&quot;}"
                                                           href="/search/category-%20sleep-and-rest-medical/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کالای خواب و استراحت طبی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تست قند خون - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تست قند خون&quot;}"
                                                       href="/search/category-blood-sugar-meter/"
                                                       class=" c-navi-new__big-display-title">
                                                        تست قند خون
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تست قند خون&quot;}"
                                                           href="/search/category-blood-sugar-meter/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تست قند خون
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تب سنج - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تب سنج&quot;}"
                                                        href="/search/category-thermometers/"
                                                        class=" c-navi-new__big-display-title">
                                                        تب سنج
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تب سنج&quot;}"
                                                           href="/search/category-thermometers/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تب سنج
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فشارسنج - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فشارسنج&quot;}"
                                                       href="/search/category-digital-sphygmomanometer/"
                                                       class=" c-navi-new__big-display-title">
                                                        فشارسنج
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فشارسنج&quot;}"
                                                           href="/search/category-digital-sphygmomanometer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فشارسنج
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار مراقبت پا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار مراقبت پا&quot;}"
                                                       href="/search/category-heel-pads/"
                                                       class=" c-navi-new__big-display-title">
                                                        ابزار مراقبت پا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار مراقبت پا&quot;}"
                                                           href="/search/category-heel-pads/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ابزار مراقبت پا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نمایشگر ضربان قلب - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نمایشگر ضربان قلب&quot;}"
                                                       href="/search/category-heart-monitor-/"
                                                       class=" c-navi-new__big-display-title">
                                                        نمایشگر ضربان قلب
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نمایشگر ضربان قلب&quot;}"
                                                           href="/search/category-heart-monitor-/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نمایشگر ضربان قلب
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماساژور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماساژور&quot;}"
                                                       href="/search/category-massager/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماساژور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماساژور&quot;}"
                                                           href="/search/category-massager/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماساژور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تشک و پتوی برقی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تشک و پتوی برقی&quot;}"
                                                       href="/search/category-electric-underblankets-and-blanket/"
                                                       class=" c-navi-new__big-display-title">
                                                        تشک و پتوی برقی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تشک و پتوی برقی&quot;}"
                                                           href="/search/category-electric-underblankets-and-blanket/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تشک و پتوی برقی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ویلچر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ویلچر&quot;}"
                                                        href="/search/category-wheelchair/"
                                                        class=" c-navi-new__big-display-title">
                                                        ویلچر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ویلچر&quot;}"
                                                           href="/search/category-wheelchair/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ویلچر
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-7">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/home-and-kitchen/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های خانه، آشپزخانه و ابزار
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Home Audio &amp; Video - category_fa: صوتی و تصویری - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;صوتی و تصویری&quot;}"
                                                       href="/search/category-video-audio-entertainment/"
                                                       class=" c-navi-new__big-display-title"><span>صوتی و تصویری</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;صوتی و تصویری&quot;}"
                                                        href="/search/category-video-audio-entertainment/"
                                                        class=" c-navi-new__medium-display-title"><span>صوتی و تصویری</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تلویزیون - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تلویزیون&quot;}"
                                                       href="/search/category-tv2/"
                                                       class=" c-navi-new__big-display-title">
                                                        تلویزیون
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تلویزیون&quot;}"
                                                           href="/search/category-tv2/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تلویزیون
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سینمای خانگی و ساندبار - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سینمای خانگی و ساندبار&quot;}"
                                                       href="/search/category-home-theatre/"
                                                       class=" c-navi-new__big-display-title">
                                                        سینمای خانگی و ساندبار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سینمای خانگی و ساندبار&quot;}"
                                                           href="/search/category-home-theatre/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سینمای خانگی و ساندبار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گیرنده دیجیتال تلویزیون - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گیرنده دیجیتال تلویزیون&quot;}"
                                                       href="/search/category-set-top-box/"
                                                       class=" c-navi-new__big-display-title">
                                                        گیرنده دیجیتال تلویزیون
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گیرنده دیجیتال تلویزیون&quot;}"
                                                           href="/search/category-set-top-box/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گیرنده دیجیتال تلویزیون
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دکوراتیو - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دکوراتیو&quot;}"
                                                       href="/search/category-decorative/"
                                                       class=" c-navi-new__big-display-title"><span>دکوراتیو</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دکوراتیو&quot;}"
                                                        href="/search/category-decorative/"
                                                        class=" c-navi-new__medium-display-title"><span>دکوراتیو</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مبلمان خانگی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مبلمان خانگی&quot;}"
                                                       href="/search/category-household-furniture/"
                                                       class=" c-navi-new__big-display-title">
                                                        مبلمان خانگی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مبلمان خانگی&quot;}"
                                                           href="/search/category-household-furniture/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مبلمان خانگی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دکوراسیون اداری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دکوراسیون اداری&quot;}"
                                                       href="/search/category-office-furniture/"
                                                       class=" c-navi-new__big-display-title">
                                                        دکوراسیون اداری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دکوراسیون اداری&quot;}"
                                                           href="/search/category-office-furniture/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دکوراسیون اداری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آینه - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آینه&quot;}"
                                                        href="/search/category-decorative-mirror/"
                                                        class=" c-navi-new__big-display-title">
                                                        آینه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آینه&quot;}"
                                                           href="/search/category-decorative-mirror/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آینه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پرده - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پرده&quot;}"
                                                        href="/search/category-curtain/"
                                                        class=" c-navi-new__big-display-title">
                                                        پرده
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پرده&quot;}"
                                                           href="/search/category-curtain/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پرده
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تابلو - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تابلو&quot;}"
                                                        href="/search/category-decorative-board/"
                                                        class=" c-navi-new__big-display-title">
                                                        تابلو
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تابلو&quot;}"
                                                           href="/search/category-decorative-board/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تابلو
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ساعت دیواری و رومیزی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساعت دیواری و رومیزی&quot;}"
                                                       href="/search/category-clocks/"
                                                       class=" c-navi-new__big-display-title">
                                                        ساعت دیواری و رومیزی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ساعت دیواری و رومیزی&quot;}"
                                                           href="/search/category-clocks/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ساعت دیواری و رومیزی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شمع، گل و گلدان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شمع، گل و گلدان&quot;}"
                                                       href="/search/category-decorative-ac/"
                                                       class=" c-navi-new__big-display-title">
                                                        شمع، گل و گلدان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شمع، گل و گلدان&quot;}"
                                                           href="/search/category-decorative-ac/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شمع، گل و گلدان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فرش ماشینی، دستبافت، تابلو - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فرش ماشینی، دستبافت، تابلو&quot;}"
                                                       href="/search/category-carpet/"
                                                       class=" c-navi-new__big-display-title"><span>فرش ماشینی، دستبافت، تابلو</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فرش ماشینی، دستبافت، تابلو&quot;}"
                                                        href="/search/category-carpet/"
                                                        class=" c-navi-new__medium-display-title"><span>فرش ماشینی، دستبافت، تابلو</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Non Electrical Tools - category_fa: لوازم برقی خانگی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم برقی خانگی&quot;}"
                                                       href="/search/category-home-appliance/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم برقی خانگی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم برقی خانگی&quot;}"
                                                        href="/search/category-home-appliance/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم برقی خانگی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: یخچال و فریزر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;یخچال و فریزر&quot;}"
                                                       href="/search/category-refrigerator-freezer/"
                                                       class=" c-navi-new__big-display-title">
                                                        یخچال و فریزر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;یخچال و فریزر&quot;}"
                                                           href="/search/category-refrigerator-freezer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        یخچال و فریزر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماشین لباسشویی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین لباسشویی&quot;}"
                                                       href="/search/category-washing-machines/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماشین لباسشویی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین لباسشویی&quot;}"
                                                           href="/search/category-washing-machines/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماشین لباسشویی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماشین ظرفشویی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین ظرفشویی&quot;}"
                                                       href="/search/category-dishwasher/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماشین ظرفشویی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماشین ظرفشویی&quot;}"
                                                           href="/search/category-dishwasher/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماشین ظرفشویی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: جاروبرقی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جاروبرقی&quot;}"
                                                       href="/search/category-vaccum-cleaner/"
                                                       class=" c-navi-new__big-display-title">
                                                        جاروبرقی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جاروبرقی&quot;}"
                                                           href="/search/category-vaccum-cleaner/"
                                                           class=" c-navi-new__medium-display-title">
                                                        جاروبرقی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: جارو شارژی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جارو شارژی&quot;}"
                                                       href="/search/category-handheld-vaccum/"
                                                       class=" c-navi-new__big-display-title">
                                                        جارو شارژی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جارو شارژی&quot;}"
                                                           href="/search/category-handheld-vaccum/"
                                                           class=" c-navi-new__medium-display-title">
                                                        جارو شارژی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تلفن، بی سیم و سانترال - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تلفن، بی سیم و سانترال&quot;}"
                                                       href="/search/category-telephone/"
                                                       class=" c-navi-new__big-display-title">
                                                        تلفن، بی سیم و سانترال
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تلفن، بی سیم و سانترال&quot;}"
                                                           href="/search/category-telephone/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تلفن، بی سیم و سانترال
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کولر، پنکه، تصفیه هوا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کولر، پنکه، تصفیه هوا&quot;}"
                                                       href="/search/category-airtreatment/"
                                                       class=" c-navi-new__big-display-title">
                                                        کولر، پنکه، تصفیه هوا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کولر، پنکه، تصفیه هوا&quot;}"
                                                           href="/search/category-airtreatment/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کولر، پنکه، تصفیه هوا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قهوه و چای ساز، آب میوه گیر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قهوه و چای ساز، آب میوه گیر&quot;}"
                                                       href="/search/category-drink-maker/"
                                                       class=" c-navi-new__big-display-title">
                                                        قهوه و چای ساز، آب میوه گیر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قهوه و چای ساز، آب میوه گیر&quot;}"
                                                           href="/search/category-drink-maker/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قهوه و چای ساز، آب میوه گیر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ترازوی آشپزخانه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترازوی آشپزخانه&quot;}"
                                                       href="/search/category-kitchen-weighing-scale/"
                                                       class=" c-navi-new__big-display-title">
                                                        ترازوی آشپزخانه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترازوی آشپزخانه&quot;}"
                                                           href="/search/category-kitchen-weighing-scale/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ترازوی آشپزخانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اتو بخار و پرسی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اتو بخار و پرسی&quot;}"
                                                       href="/search/category-iron/"
                                                       class=" c-navi-new__big-display-title">
                                                        اتو بخار و پرسی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اتو بخار و پرسی&quot;}"
                                                           href="/search/category-iron/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اتو بخار و پرسی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حیوانات خانگی، غذا و لوازم - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;حیوانات خانگی، غذا و لوازم&quot;}"
                                                       href="/search/category-pet/"
                                                       class=" c-navi-new__big-display-title"><span>حیوانات خانگی، غذا و لوازم</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;حیوانات خانگی، غذا و لوازم&quot;}"
                                                        href="/search/category-pet/"
                                                        class=" c-navi-new__medium-display-title"><span>حیوانات خانگی، غذا و لوازم</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آکواریوم، غذا و لوازم آبزیان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آکواریوم، غذا و لوازم آبزیان&quot;}"
                                                       href="/search/category-aquaculture-equipment/"
                                                       class=" c-navi-new__big-display-title">
                                                        آکواریوم، غذا و لوازم آبزیان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آکواریوم، غذا و لوازم آبزیان&quot;}"
                                                           href="/search/category-aquaculture-equipment/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آکواریوم، غذا و لوازم آبزیان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Home &amp; kitchen Appliances - category_fa: سرو و پذیرایی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;سرو و پذیرایی&quot;}"
                                                       href="/search/category-serving/"
                                                       class=" c-navi-new__big-display-title"><span>سرو و پذیرایی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;سرو و پذیرایی&quot;}"
                                                        href="/search/category-serving/"
                                                        class=" c-navi-new__medium-display-title"><span>سرو و پذیرایی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سرویس غذاخوری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سرویس غذاخوری&quot;}"
                                                       href="/search/category-dinnerware-sets/"
                                                       class=" c-navi-new__big-display-title">
                                                        سرویس غذاخوری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سرویس غذاخوری&quot;}"
                                                           href="/search/category-dinnerware-sets/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سرویس غذاخوری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قاشق، چنگال و کارد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قاشق، چنگال و کارد&quot;}"
                                                       href="/search/category-forkandspoonnandknife/"
                                                       class=" c-navi-new__big-display-title">
                                                        قاشق، چنگال و کارد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قاشق، چنگال و کارد&quot;}"
                                                           href="/search/category-forkandspoonnandknife/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قاشق، چنگال و کارد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پارچ، بطری، لیوان و ماگ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پارچ، بطری، لیوان و ماگ&quot;}"
                                                       href="/search/category-mugandjugset/"
                                                       class=" c-navi-new__big-display-title">
                                                        پارچ، بطری، لیوان و ماگ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پارچ، بطری، لیوان و ماگ&quot;}"
                                                           href="/search/category-mugandjugset/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پارچ، بطری، لیوان و ماگ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ظروف پذیرایی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ظروف پذیرایی&quot;}"
                                                       href="/search/category-servingware/"
                                                       class=" c-navi-new__big-display-title">
                                                        ظروف پذیرایی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ظروف پذیرایی&quot;}"
                                                           href="/search/category-servingware/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ظروف پذیرایی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Home Appliance - category_fa: نور و روشنایی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نور و روشنایی&quot;}"
                                                       href="/search/category-lighting/"
                                                       class=" c-navi-new__big-display-title"><span>نور و روشنایی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نور و روشنایی&quot;}"
                                                        href="/search/category-lighting/"
                                                        class=" c-navi-new__medium-display-title"><span>نور و روشنایی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لامپ، چراغ و ریسه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لامپ، چراغ و ریسه&quot;}"
                                                       href="/search/category-lamp/"
                                                       class=" c-navi-new__big-display-title">
                                                        لامپ، چراغ و ریسه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لامپ، چراغ و ریسه&quot;}"
                                                           href="/search/category-lamp/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لامپ، چراغ و ریسه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوستر و چراغ تزیینی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوستر و چراغ تزیینی&quot;}"
                                                       href="/search/category-hanging-lamps/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوستر و چراغ تزیینی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوستر و چراغ تزیینی&quot;}"
                                                           href="/search/category-hanging-lamps/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوستر و چراغ تزیینی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آشپزخانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;آشپزخانه&quot;}"
                                                       href="/search/category-home-kitchen-appliances/"
                                                       class=" c-navi-new__big-display-title"><span>آشپزخانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;آشپزخانه&quot;}"
                                                        href="/search/category-home-kitchen-appliances/"
                                                        class=" c-navi-new__medium-display-title"><span>آشپزخانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سرویس و ظروف پخت و پز - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سرویس و ظروف پخت و پز&quot;}"
                                                       href="/search/category-kitchen-appliances/"
                                                       class=" c-navi-new__big-display-title">
                                                        سرویس و ظروف پخت و پز
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سرویس و ظروف پخت و پز&quot;}"
                                                           href="/search/category-kitchen-appliances/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سرویس و ظروف پخت و پز
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فلاسک و کلمن - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فلاسک و کلمن&quot;}"
                                                       href="/search/category-flasks/"
                                                       class=" c-navi-new__big-display-title">
                                                        فلاسک و کلمن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فلاسک و کلمن&quot;}"
                                                           href="/search/category-flasks/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فلاسک و کلمن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کتری، قوری، لوازم سرو چای - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کتری، قوری، لوازم سرو چای&quot;}"
                                                       href="/search/category-kettleandteapot/"
                                                       class=" c-navi-new__big-display-title">
                                                        کتری، قوری، لوازم سرو چای
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کتری، قوری، لوازم سرو چای&quot;}"
                                                           href="/search/category-kettleandteapot/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کتری، قوری، لوازم سرو چای
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ظروف یکبار مصرف - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ظروف یکبار مصرف&quot;}"
                                                       href="/search/category-disposablecontainer/"
                                                       class=" c-navi-new__big-display-title">
                                                        ظروف یکبار مصرف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ظروف یکبار مصرف&quot;}"
                                                           href="/search/category-disposablecontainer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ظروف یکبار مصرف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مواد شوینده - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مواد شوینده&quot;}"
                                                       href="/search/category-detergents/"
                                                       class=" c-navi-new__big-display-title"><span>مواد شوینده</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;مواد شوینده&quot;}"
                                                        href="/search/category-detergents/"
                                                        class=" c-navi-new__medium-display-title"><span>مواد شوینده</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شوینده ظروف - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شوینده ظروف&quot;}"
                                                       href="/search/category-dishes-detergents/"
                                                       class=" c-navi-new__big-display-title">
                                                        شوینده ظروف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شوینده ظروف&quot;}"
                                                           href="/search/category-dishes-detergents/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شوینده ظروف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شوینده لباس - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شوینده لباس&quot;}"
                                                       href="/search/category-clothes-detergents/"
                                                       class=" c-navi-new__big-display-title">
                                                        شوینده لباس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شوینده لباس&quot;}"
                                                           href="/search/category-clothes-detergents/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شوینده لباس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تمیزکننده سطوح - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تمیزکننده سطوح&quot;}"
                                                       href="/search/category-surface-cleaner/"
                                                       class=" c-navi-new__big-display-title">
                                                        تمیزکننده سطوح
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تمیزکننده سطوح&quot;}"
                                                           href="/search/category-surface-cleaner/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تمیزکننده سطوح
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دستمال کاغذی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دستمال کاغذی&quot;}"
                                                       href="/search/category-tissue-paper/"
                                                       class=" c-navi-new__big-display-title"><span>دستمال کاغذی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دستمال کاغذی&quot;}"
                                                        href="/search/category-tissue-paper/"
                                                        class=" c-navi-new__medium-display-title"><span>دستمال کاغذی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ملحفه، سرویس، لوازم خواب - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ملحفه، سرویس، لوازم خواب&quot;}"
                                                       href="/search/category-sleeping/"
                                                       class=" c-navi-new__big-display-title"><span>ملحفه، سرویس، لوازم خواب</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ملحفه، سرویس، لوازم خواب&quot;}"
                                                        href="/search/category-sleeping/"
                                                        class=" c-navi-new__medium-display-title"><span>ملحفه، سرویس، لوازم خواب</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حوله و وسایل حمام - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;حوله و وسایل حمام&quot;}"
                                                       href="/search/category-bath/"
                                                       class=" c-navi-new__big-display-title"><span>حوله و وسایل حمام</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;حوله و وسایل حمام&quot;}"
                                                        href="/search/category-bath/"
                                                        class=" c-navi-new__medium-display-title"><span>حوله و وسایل حمام</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پادری، کمد، لوازم اتاق خواب - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پادری، کمد، لوازم اتاق خواب&quot;}"
                                                       href="/search/category-bedroom/"
                                                       class=" c-navi-new__big-display-title"><span>پادری، کمد، لوازم اتاق خواب</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پادری، کمد، لوازم اتاق خواب&quot;}"
                                                        href="/search/category-bedroom/"
                                                        class=" c-navi-new__medium-display-title"><span>پادری، کمد، لوازم اتاق خواب</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم دستشویی و روشویی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم دستشویی و روشویی&quot;}"
                                                       href="/search/category-watercloset/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم دستشویی و روشویی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم دستشویی و روشویی&quot;}"
                                                        href="/search/category-watercloset/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم دستشویی و روشویی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فندک و لوازم جانبی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فندک و لوازم جانبی&quot;}"
                                                       href="/search/category-pesonal-appliance-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>فندک و لوازم جانبی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فندک و لوازم جانبی&quot;}"
                                                        href="/search/category-pesonal-appliance-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>فندک و لوازم جانبی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Dinnerware - category_fa: گُل، خاک، کود، لوازم باغبانی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;گُل، خاک، کود، لوازم باغبانی&quot;}"
                                                       href="/search/category-gardening-tools/"
                                                       class=" c-navi-new__big-display-title"><span>گُل، خاک، کود، لوازم باغبانی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;گُل، خاک، کود، لوازم باغبانی&quot;}"
                                                        href="/search/category-gardening-tools/"
                                                        class=" c-navi-new__medium-display-title"><span>گُل، خاک، کود، لوازم باغبانی</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-8">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/book-and-media/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های کتاب، لوازم تحریر و هنر
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Book &amp; Magazine - category_fa: کتاب و مجله - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کتاب و مجله&quot;}"
                                                       href="/search/book-and-media/publication/"
                                                       class=" c-navi-new__big-display-title"><span>کتاب و مجله</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کتاب و مجله&quot;}"
                                                        href="/search/book-and-media/publication/"
                                                        class=" c-navi-new__medium-display-title"><span>کتاب و مجله</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کتاب چاپی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کتاب چاپی&quot;}"
                                                       href="/search/category-book/"
                                                       class=" c-navi-new__big-display-title">
                                                        کتاب چاپی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کتاب چاپی&quot;}"
                                                           href="/search/category-book/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کتاب چاپی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مجلات خارجی و داخلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مجلات خارجی و داخلی&quot;}"
                                                       href="/search/category-magazines/"
                                                       class=" c-navi-new__big-display-title">
                                                        مجلات خارجی و داخلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مجلات خارجی و داخلی&quot;}"
                                                           href="/search/category-magazines/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مجلات خارجی و داخلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کتاب صوتی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کتاب صوتی&quot;}"
                                                       href="/search/category-audio-book/"
                                                       class=" c-navi-new__big-display-title"><span>کتاب صوتی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کتاب صوتی&quot;}"
                                                        href="/search/category-audio-book/"
                                                        class=" c-navi-new__medium-display-title"><span>کتاب صوتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Software &amp; Educational Content - category_fa: محتوای آموزشی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;محتوای آموزشی&quot;}"
                                                       href="/search/category-multimedia-training-pack/"
                                                       class=" c-navi-new__big-display-title"><span>محتوای آموزشی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;محتوای آموزشی&quot;}"
                                                        href="/search/category-multimedia-training-pack/"
                                                        class=" c-navi-new__medium-display-title"><span>محتوای آموزشی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آموزش موسیقی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش موسیقی&quot;}"
                                                       href="/search/category-music-training/"
                                                       class=" c-navi-new__big-display-title">
                                                        آموزش موسیقی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش موسیقی&quot;}"
                                                           href="/search/category-music-training/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آموزش موسیقی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آموزش ورزش و سرگرمی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش ورزش و سرگرمی&quot;}"
                                                       href="/search/category-sport-and-entertainment/"
                                                       class=" c-navi-new__big-display-title">
                                                        آموزش ورزش و سرگرمی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش ورزش و سرگرمی&quot;}"
                                                           href="/search/category-sport-and-entertainment/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آموزش ورزش و سرگرمی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آموزش زبان - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش زبان&quot;}"
                                                       href="/search/category-language-learning-software/"
                                                       class=" c-navi-new__big-display-title">
                                                        آموزش زبان
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش زبان&quot;}"
                                                           href="/search/category-language-learning-software/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آموزش زبان
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آموزش نرم افزار و کامپیوتر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش نرم افزار و کامپیوتر&quot;}"
                                                       href="/search/category-software-computer/"
                                                       class=" c-navi-new__big-display-title">
                                                        آموزش نرم افزار و کامپیوتر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آموزش نرم افزار و کامپیوتر&quot;}"
                                                           href="/search/category-software-computer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آموزش نرم افزار و کامپیوتر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نرم افزار - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نرم افزار&quot;}"
                                                       href="/search/category-software/"
                                                       class=" c-navi-new__big-display-title"><span>نرم افزار</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;نرم افزار&quot;}"
                                                        href="/search/category-software/"
                                                        class=" c-navi-new__medium-display-title"><span>نرم افزار</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Video Game - category_fa: بازی کنسول و کامپیوتر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بازی کنسول و کامپیوتر&quot;}"
                                                       href="/search/category-game/"
                                                       class=" c-navi-new__big-display-title"><span>بازی کنسول و کامپیوتر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;بازی کنسول و کامپیوتر&quot;}"
                                                        href="/search/category-game/"
                                                        class=" c-navi-new__medium-display-title"><span>بازی کنسول و کامپیوتر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Music &amp; Audio Content - category_fa: فیلم سینمایی، سریال و مستند - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فیلم سینمایی، سریال و مستند&quot;}"
                                                       href="/search/category-film-video-content/"
                                                       class=" c-navi-new__big-display-title"><span>فیلم سینمایی، سریال و مستند</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فیلم سینمایی، سریال و مستند&quot;}"
                                                        href="/search/category-film-video-content/"
                                                        class=" c-navi-new__medium-display-title"><span>فیلم سینمایی، سریال و مستند</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Musical Instruments - category_fa: آلبوم موسیقی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;آلبوم موسیقی&quot;}"
                                                       href="/search/category-music-audio-content/"
                                                       class=" c-navi-new__big-display-title"><span>آلبوم موسیقی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;آلبوم موسیقی&quot;}"
                                                        href="/search/category-music-audio-content/"
                                                        class=" c-navi-new__medium-display-title"><span>آلبوم موسیقی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Stationery - category_fa: لوازم التحریر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم التحریر&quot;}"
                                                       href="/search/category-stationery/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم التحریر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم التحریر&quot;}"
                                                        href="/search/category-stationery/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم التحریر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم اداری و اقلام مصرفی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم اداری و اقلام مصرفی&quot;}"
                                                       href="/search/category-office-supplies/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم اداری و اقلام مصرفی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم اداری و اقلام مصرفی&quot;}"
                                                           href="/search/category-office-supplies/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم اداری و اقلام مصرفی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف، کوله پشتی و جامدادی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف، کوله پشتی و جامدادی&quot;}"
                                                       href="/search/category-bags-backpacks/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیف، کوله پشتی و جامدادی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف، کوله پشتی و جامدادی&quot;}"
                                                           href="/search/category-bags-backpacks/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف، کوله پشتی و جامدادی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چراغ مطالعه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ مطالعه&quot;}"
                                                       href="/search/category-light/"
                                                       class=" c-navi-new__big-display-title">
                                                        چراغ مطالعه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ مطالعه&quot;}"
                                                           href="/search/category-light/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چراغ مطالعه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کاغذ کادو، پاکت و کارت هدیه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاغذ کادو، پاکت و کارت هدیه&quot;}"
                                                       href="/search/category-gift-tools/"
                                                       class=" c-navi-new__big-display-title">
                                                        کاغذ کادو، پاکت و کارت هدیه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاغذ کادو، پاکت و کارت هدیه&quot;}"
                                                           href="/search/category-gift-tools/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کاغذ کادو، پاکت و کارت هدیه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: نوشت افزار - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوشت افزار&quot;}"
                                                       href="/search/category-stationery-sub/"
                                                       class=" c-navi-new__big-display-title">
                                                        نوشت افزار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;نوشت افزار&quot;}"
                                                           href="/search/category-stationery-sub/"
                                                           class=" c-navi-new__medium-display-title">
                                                        نوشت افزار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دفتر و کاغذ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دفتر و کاغذ&quot;}"
                                                       href="/search/category-paper-notebook/"
                                                       class=" c-navi-new__big-display-title">
                                                        دفتر و کاغذ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دفتر و کاغذ&quot;}"
                                                           href="/search/category-paper-notebook/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دفتر و کاغذ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خودکار و روان نویس - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خودکار و روان نویس&quot;}"
                                                       href="/search/category-pen/"
                                                       class=" c-navi-new__big-display-title">
                                                        خودکار و روان نویس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خودکار و روان نویس&quot;}"
                                                           href="/search/category-pen/"
                                                           class=" c-navi-new__medium-display-title">
                                                        خودکار و روان نویس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار نقاشی و رنگ آمیزی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار نقاشی و رنگ آمیزی&quot;}"
                                                       href="/search/category-drawing-painting-tools/"
                                                       class=" c-navi-new__big-display-title">
                                                        ابزار نقاشی و رنگ آمیزی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ابزار نقاشی و رنگ آمیزی&quot;}"
                                                           href="/search/category-drawing-painting-tools/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ابزار نقاشی و رنگ آمیزی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: میز تحریر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;میز تحریر&quot;}"
                                                       href="/search/category-writing-desk/"
                                                       class=" c-navi-new__big-display-title">
                                                        میز تحریر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;میز تحریر&quot;}"
                                                           href="/search/category-writing-desk/"
                                                           class=" c-navi-new__medium-display-title">
                                                        میز تحریر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آلبوم عکس - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آلبوم عکس&quot;}"
                                                       href="/search/category-photo-box/"
                                                       class=" c-navi-new__big-display-title">
                                                        آلبوم عکس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آلبوم عکس&quot;}"
                                                           href="/search/category-photo-box/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آلبوم عکس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کاغذ چاپ و پرینتر - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاغذ چاپ و پرینتر&quot;}"
                                                       href="/search/category-paper/?type[0]=5072&amp;pageno=1&amp;last_filter=type&amp;last_value=5072&amp;sortby=4&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        کاغذ چاپ و پرینتر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاغذ چاپ و پرینتر&quot;}"
                                                           href="/search/category-paper/?type[0]=5072&amp;pageno=1&amp;last_filter=type&amp;last_value=5072&amp;sortby=4&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        کاغذ چاپ و پرینتر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مداد و مداد رنگی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مداد و مداد رنگی&quot;}"
                                                       href="/search/category-pencil/"
                                                       class=" c-navi-new__big-display-title">
                                                        مداد و مداد رنگی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مداد و مداد رنگی&quot;}"
                                                           href="/search/category-pencil/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مداد و مداد رنگی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آلات موسیقی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;آلات موسیقی&quot;}"
                                                       href="/search/category-musicalinstruments/"
                                                       class=" c-navi-new__big-display-title"><span>آلات موسیقی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;آلات موسیقی&quot;}"
                                                        href="/search/category-musicalinstruments/"
                                                        class=" c-navi-new__medium-display-title"><span>آلات موسیقی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی ادوات موسیقی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی ادوات موسیقی&quot;}"
                                                       href="/search/category-musicinstrumentsaccessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم جانبی ادوات موسیقی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی ادوات موسیقی&quot;}"
                                                           href="/search/category-musicinstrumentsaccessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم جانبی ادوات موسیقی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گیتار - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گیتار&quot;}"
                                                        href="/search/category-guitar/"
                                                        class=" c-navi-new__big-display-title">
                                                        گیتار
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گیتار&quot;}"
                                                           href="/search/category-guitar/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گیتار
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیبورد و ارگ - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیبورد و ارگ&quot;}"
                                                       href="/search/category-keybord-organ/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیبورد و ارگ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیبورد و ارگ&quot;}"
                                                           href="/search/category-keybord-organ/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیبورد و ارگ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پیانو دیجیتال - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پیانو دیجیتال&quot;}"
                                                       href="/search/category-pianos/"
                                                       class=" c-navi-new__big-display-title">
                                                        پیانو دیجیتال
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پیانو دیجیتال&quot;}"
                                                           href="/search/category-pianos/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پیانو دیجیتال
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: درام، پرکاشن و دف - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;درام، پرکاشن و دف&quot;}"
                                                       href="/search/category-percussion-instruments/"
                                                       class=" c-navi-new__big-display-title">
                                                        درام، پرکاشن و دف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;درام، پرکاشن و دف&quot;}"
                                                           href="/search/category-percussion-instruments/"
                                                           class=" c-navi-new__medium-display-title">
                                                        درام، پرکاشن و دف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تجهیزات استودیویی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات استودیویی&quot;}"
                                                       href="/search/category-studio-equipment/"
                                                       class=" c-navi-new__big-display-title">
                                                        تجهیزات استودیویی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات استودیویی&quot;}"
                                                           href="/search/category-studio-equipment/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تجهیزات استودیویی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ویولن - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ویولن&quot;}"
                                                        href="/search/category-violin/"
                                                        class=" c-navi-new__big-display-title">
                                                        ویولن
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ویولن&quot;}"
                                                           href="/search/category-violin/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ویولن
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سازهای ایرانی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سازهای ایرانی&quot;}"
                                                       href="/search/category-iranian-instruments/"
                                                       class=" c-navi-new__big-display-title">
                                                        سازهای ایرانی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سازهای ایرانی&quot;}"
                                                           href="/search/category-iranian-instruments/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سازهای ایرانی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Carpet - category_fa: فرش ماشینی، دستبافت، تابلو - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فرش ماشینی، دستبافت، تابلو&quot;}"
                                                       href="/search/category-carpet/"
                                                       class=" c-navi-new__big-display-title"><span>فرش ماشینی، دستبافت، تابلو</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;فرش ماشینی، دستبافت، تابلو&quot;}"
                                                        href="/search/category-carpet/"
                                                        class=" c-navi-new__medium-display-title"><span>فرش ماشینی، دستبافت، تابلو</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فرش ماشینی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فرش ماشینی&quot;}"
                                                       href="/search/category-machine-made-carpet/"
                                                       class=" c-navi-new__big-display-title">
                                                        فرش ماشینی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فرش ماشینی&quot;}"
                                                           href="/search/category-machine-made-carpet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فرش ماشینی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فرش دستباف - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فرش دستباف&quot;}"
                                                       href="/search/category-handmade-carpet/"
                                                       class=" c-navi-new__big-display-title">
                                                        فرش دستباف
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فرش دستباف&quot;}"
                                                           href="/search/category-handmade-carpet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فرش دستباف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تابلو فرش - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تابلو فرش&quot;}"
                                                       href="/search/category-pictorial-carpet/"
                                                       class=" c-navi-new__big-display-title">
                                                        تابلو فرش
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تابلو فرش&quot;}"
                                                           href="/search/category-pictorial-carpet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تابلو فرش
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en: Handicraft &amp; - category_fa: صنایع دستی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;صنایع دستی&quot;}"
                                                       href="/search/category-handicraft/"
                                                       class=" c-navi-new__big-display-title"><span>صنایع دستی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;صنایع دستی&quot;}"
                                                        href="/search/category-handicraft/"
                                                        class=" c-navi-new__medium-display-title"><span>صنایع دستی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کالاهای مسی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کالاهای مسی&quot;}"
                                                       href="/search/category-copper-products/"
                                                       class=" c-navi-new__big-display-title">
                                                        کالاهای مسی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کالاهای مسی&quot;}"
                                                           href="/search/category-copper-products/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کالاهای مسی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سفال، سرامیک و چینی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سفال، سرامیک و چینی&quot;}"
                                                       href="/search/category-clay-and-ceramic/"
                                                       class=" c-navi-new__big-display-title">
                                                        سفال، سرامیک و چینی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سفال، سرامیک و چینی&quot;}"
                                                           href="/search/category-clay-and-ceramic/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سفال، سرامیک و چینی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف چرمی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف چرمی&quot;}"
                                                       href="/search/category-leatherbag/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیف چرمی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف چرمی&quot;}"
                                                           href="/search/category-leatherbag/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف چرمی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ترمه،‌ قلمکار و دستبافت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترمه،‌ قلمکار و دستبافت&quot;}"
                                                       href="/search/category-textile-industry/"
                                                       class=" c-navi-new__big-display-title">
                                                        ترمه،‌ قلمکار و دستبافت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ترمه،‌ قلمکار و دستبافت&quot;}"
                                                           href="/search/category-textile-industry/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ترمه،‌ قلمکار و دستبافت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خاتم، منبت، حصیری و چوبی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خاتم، منبت، حصیری و چوبی&quot;}"
                                                       href="/search/category-woodcraft/"
                                                       class=" c-navi-new__big-display-title">
                                                        خاتم، منبت، حصیری و چوبی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خاتم، منبت، حصیری و چوبی&quot;}"
                                                           href="/search/category-woodcraft/"
                                                           class=" c-navi-new__medium-display-title">
                                                        خاتم، منبت، حصیری و چوبی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تابلو و ساعت - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تابلو و ساعت&quot;}"
                                                       href="/search/category-panel/"
                                                       class=" c-navi-new__big-display-title">
                                                        تابلو و ساعت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تابلو و ساعت&quot;}"
                                                           href="/search/category-panel/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تابلو و ساعت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: میناکاری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;میناکاری&quot;}"
                                                       href="/search/category-enamels/"
                                                       class=" c-navi-new__big-display-title">
                                                        میناکاری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;میناکاری&quot;}"
                                                           href="/search/category-enamels/"
                                                           class=" c-navi-new__medium-display-title">
                                                        میناکاری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: فیروزه کوبی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فیروزه کوبی&quot;}"
                                                       href="/search/category-turquoise-tattoo/"
                                                       class=" c-navi-new__big-display-title">
                                                        فیروزه کوبی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;فیروزه کوبی&quot;}"
                                                           href="/search/category-turquoise-tattoo/"
                                                           class=" c-navi-new__medium-display-title">
                                                        فیروزه کوبی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سوزن دوزی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سوزن دوزی&quot;}"
                                                       href="/search/category-traditional-sewing/"
                                                       class=" c-navi-new__big-display-title">
                                                        سوزن دوزی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سوزن دوزی&quot;}"
                                                           href="/search/category-traditional-sewing/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سوزن دوزی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: محصولات استخوانی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;محصولات استخوانی&quot;}"
                                                       href="/search/category-bone-product/"
                                                       class=" c-navi-new__big-display-title">
                                                        محصولات استخوانی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;محصولات استخوانی&quot;}"
                                                           href="/search/category-bone-product/"
                                                           class=" c-navi-new__medium-display-title">
                                                        محصولات استخوانی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: جعبه و دست سازه های هنری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جعبه و دست سازه های هنری&quot;}"
                                                       href="/search/category-art-structures/"
                                                       class=" c-navi-new__big-display-title">
                                                        جعبه و دست سازه های هنری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;جعبه و دست سازه های هنری&quot;}"
                                                           href="/search/category-art-structures/"
                                                           class=" c-navi-new__medium-display-title">
                                                        جعبه و دست سازه های هنری
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-9">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/sport-entertainment/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های ورزش و سفر
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی مردانه&quot;}"
                                                       href="/search/category-men-sportswear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی مردانه&quot;}"
                                                        href="/search/category-men-sportswear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی زنانه&quot;}"
                                                       href="/search/category-women-sportwear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی زنانه&quot;}"
                                                        href="/search/category-women-sportwear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی مردانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی مردانه&quot;}"
                                                       href="/search/category-men-sport-shoes-/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی مردانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی مردانه&quot;}"
                                                        href="/search/category-men-sport-shoes-/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی مردانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی زنانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی زنانه&quot;}"
                                                       href="/search/category-women-sport-shoes-/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی زنانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی زنانه&quot;}"
                                                        href="/search/category-women-sport-shoes-/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی زنانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی پسرانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی پسرانه&quot;}"
                                                       href="/search/category-boys-sportswear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی پسرانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی پسرانه&quot;}"
                                                        href="/search/category-boys-sportswear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی پسرانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک ورزشی دخترانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی دخترانه&quot;}"
                                                       href="/search/category-girls-sportswear/"
                                                       class=" c-navi-new__big-display-title"><span>پوشاک ورزشی دخترانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشاک ورزشی دخترانه&quot;}"
                                                        href="/search/category-girls-sportswear/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشاک ورزشی دخترانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی پسرانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی پسرانه&quot;}"
                                                       href="/search/category-boys-sport-shoes/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی پسرانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی پسرانه&quot;}"
                                                        href="/search/category-boys-sport-shoes/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی پسرانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش ورزشی دخترانه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی دخترانه&quot;}"
                                                       href="/search/category-girls-sport-shoes/"
                                                       class=" c-navi-new__big-display-title"><span>کفش ورزشی دخترانه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کفش ورزشی دخترانه&quot;}"
                                                        href="/search/category-girls-sport-shoes/"
                                                        class=" c-navi-new__medium-display-title"><span>کفش ورزشی دخترانه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تجهیزات سفر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تجهیزات سفر&quot;}"
                                                       href="/search/category-traveling-equipment/"
                                                       class=" c-navi-new__big-display-title"><span>تجهیزات سفر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;تجهیزات سفر&quot;}"
                                                        href="/search/category-traveling-equipment/"
                                                        class=" c-navi-new__medium-display-title"><span>تجهیزات سفر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چمدان و ساک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چمدان و ساک&quot;}"
                                                       href="/search/category-trolley-case-and-luggage/"
                                                       class=" c-navi-new__big-display-title">
                                                        چمدان و ساک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چمدان و ساک&quot;}"
                                                           href="/search/category-trolley-case-and-luggage/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چمدان و ساک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیف و کوله پشتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف و کوله پشتی&quot;}"
                                                       href="/search/category-bag-and-backpack/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیف و کوله پشتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیف و کوله پشتی&quot;}"
                                                           href="/search/category-bag-and-backpack/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیف و کوله پشتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دوچرخه - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوچرخه&quot;}"
                                                        href="/search/category-bicycle/"
                                                        class=" c-navi-new__big-display-title"><span>دوچرخه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دوچرخه&quot;}"
                                                        href="/search/category-bicycle/"
                                                        class=" c-navi-new__medium-display-title"><span>دوچرخه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی دوچرخه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی دوچرخه&quot;}"
                                                       href="/search/category-bicycles-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم جانبی دوچرخه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم جانبی دوچرخه&quot;}"
                                                           href="/search/category-bicycles-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم جانبی دوچرخه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کوهنوردی و کمپینگ - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کوهنوردی و کمپینگ&quot;}"
                                                       href="/search/category-hiking-and-camping/"
                                                       class=" c-navi-new__big-display-title"><span>کوهنوردی و کمپینگ</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;کوهنوردی و کمپینگ&quot;}"
                                                        href="/search/category-hiking-and-camping/"
                                                        class=" c-navi-new__medium-display-title"><span>کوهنوردی و کمپینگ</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کفش کوهنوردی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش کوهنوردی&quot;}"
                                                       href="/search/category-apparel/?q=%da%a9%d9%81%d8%b4%20%da%a9%d9%88%d9%87%d9%86%d9%88%d8%b1%d8%af%db%8c&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title">
                                                        کفش کوهنوردی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کفش کوهنوردی&quot;}"
                                                           href="/search/category-apparel/?q=%da%a9%d9%81%d8%b4%20%da%a9%d9%88%d9%87%d9%86%d9%88%d8%b1%d8%af%db%8c&amp;entry=mm"
                                                           class=" c-navi-new__medium-display-title">
                                                        کفش کوهنوردی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عصای کوهنوردی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عصای کوهنوردی&quot;}"
                                                       href="/search/category-staff/"
                                                       class=" c-navi-new__big-display-title">
                                                        عصای کوهنوردی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عصای کوهنوردی&quot;}"
                                                           href="/search/category-staff/"
                                                           class=" c-navi-new__medium-display-title">
                                                        عصای کوهنوردی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چراغ قوه و چراغ پیشانی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ قوه و چراغ پیشانی&quot;}"
                                                       href="/search/category-flashlight/"
                                                       class=" c-navi-new__big-display-title">
                                                        چراغ قوه و چراغ پیشانی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ قوه و چراغ پیشانی&quot;}"
                                                           href="/search/category-flashlight/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چراغ قوه و چراغ پیشانی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چاقو و ابزار چند کاره - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چاقو و ابزار چند کاره&quot;}"
                                                       href="/search/category-camping-knife/"
                                                       class=" c-navi-new__big-display-title">
                                                        چاقو و ابزار چند کاره
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چاقو و ابزار چند کاره&quot;}"
                                                           href="/search/category-camping-knife/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چاقو و ابزار چند کاره
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قمقمه و فلاسک - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قمقمه و فلاسک&quot;}"
                                                       href="/search/category-flask/"
                                                       class=" c-navi-new__big-display-title">
                                                        قمقمه و فلاسک
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قمقمه و فلاسک&quot;}"
                                                           href="/search/category-flask/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قمقمه و فلاسک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چادر - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چادر&quot;}"
                                                        href="/search/category-tent/"
                                                        class=" c-navi-new__big-display-title">
                                                        چادر
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چادر&quot;}"
                                                           href="/search/category-tent/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چادر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیسه خواب - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیسه خواب&quot;}"
                                                       href="/search/category-sleeping-bag/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیسه خواب
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیسه خواب&quot;}"
                                                           href="/search/category-sleeping-bag/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیسه خواب
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زیرانداز سفری - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زیرانداز سفری&quot;}"
                                                       href="/search/category-mat/"
                                                       class=" c-navi-new__big-display-title">
                                                        زیرانداز سفری
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زیرانداز سفری&quot;}"
                                                           href="/search/category-mat/"
                                                           class=" c-navi-new__medium-display-title">
                                                        زیرانداز سفری
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم جانبی کوهنوردی و سفر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی کوهنوردی و سفر&quot;}"
                                                       href="/search/category-travel-accessories/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم جانبی کوهنوردی و سفر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم جانبی کوهنوردی و سفر&quot;}"
                                                        href="/search/category-travel-accessories/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم جانبی کوهنوردی و سفر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چتر - level: 2"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;چتر&quot;}"
                                                        href="/search/category-umbrella-1/"
                                                        class=" c-navi-new__big-display-title"><span>چتر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;چتر&quot;}"
                                                        href="/search/category-umbrella-1/"
                                                        class=" c-navi-new__medium-display-title"><span>چتر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ساک ورزشی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ساک ورزشی&quot;}"
                                                       href="/search/category-trolley-case-and-luggage/?q=%d8%b3%d8%a7%da%a9%20%d9%88%d8%b1%d8%b2%d8%b4%db%8c&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title"><span>ساک ورزشی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ساک ورزشی&quot;}"
                                                        href="/search/category-trolley-case-and-luggage/?q=%d8%b3%d8%a7%da%a9%20%d9%88%d8%b1%d8%b2%d8%b4%db%8c&amp;entry=mm"
                                                        class=" c-navi-new__medium-display-title"><span>ساک ورزشی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قمقمه و شیکر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;قمقمه و شیکر&quot;}"
                                                       href="/search/category-sport-entertainment/?q=%d8%b4%db%8c%da%a9%d8%b1&amp;entry=mm"
                                                       class=" c-navi-new__big-display-title"><span>قمقمه و شیکر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;قمقمه و شیکر&quot;}"
                                                        href="/search/category-sport-entertainment/?q=%d8%b4%db%8c%da%a9%d8%b1&amp;entry=mm"
                                                        class=" c-navi-new__medium-display-title"><span>قمقمه و شیکر</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم ورزشی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم ورزشی&quot;}"
                                                       href="/search/category-sport/"
                                                       class=" c-navi-new__big-display-title"><span>لوازم ورزشی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;لوازم ورزشی&quot;}"
                                                        href="/search/category-sport/"
                                                        class=" c-navi-new__medium-display-title"><span>لوازم ورزشی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ورزش های هوازی و بدنسازی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش های هوازی و بدنسازی&quot;}"
                                                       href="/search/category-aerobic/"
                                                       class=" c-navi-new__big-display-title"><span>ورزش های هوازی و بدنسازی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش های هوازی و بدنسازی&quot;}"
                                                        href="/search/category-aerobic/"
                                                        class=" c-navi-new__medium-display-title"><span>ورزش های هوازی و بدنسازی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تجهیزات جانبی ایروبیک و تناسب اندام - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات جانبی ایروبیک و تناسب اندام&quot;}"
                                                       href="/search/category-stretching-tools/"
                                                       class=" c-navi-new__big-display-title">
                                                        تجهیزات جانبی ایروبیک و تناسب اندام
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تجهیزات جانبی ایروبیک و تناسب اندام&quot;}"
                                                           href="/search/category-stretching-tools/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تجهیزات جانبی ایروبیک و تناسب اندام
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دمبل - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دمبل&quot;}"
                                                        href="/search/category-dumbbell/"
                                                        class=" c-navi-new__big-display-title">
                                                        دمبل
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دمبل&quot;}"
                                                           href="/search/category-dumbbell/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دمبل
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: طناب - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;طناب&quot;}"
                                                        href="/search/category-rope/"
                                                        class=" c-navi-new__big-display-title">
                                                        طناب
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;طناب&quot;}"
                                                           href="/search/category-rope/"
                                                           class=" c-navi-new__medium-display-title">
                                                        طناب
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بارفیکس - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بارفیکس&quot;}"
                                                       href="/search/category-pullup/"
                                                       class=" c-navi-new__big-display-title">
                                                        بارفیکس
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بارفیکس&quot;}"
                                                           href="/search/category-pullup/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بارفیکس
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تردمیل - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تردمیل&quot;}"
                                                        href="/search/category-treadmill/"
                                                        class=" c-navi-new__big-display-title">
                                                        تردمیل
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تردمیل&quot;}"
                                                           href="/search/category-treadmill/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تردمیل
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لوازم پوششی و محافظتی ورزشی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم پوششی و محافظتی ورزشی&quot;}"
                                                       href="/search/category-cover-and-safety-equipment/"
                                                       class=" c-navi-new__big-display-title">
                                                        لوازم پوششی و محافظتی ورزشی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لوازم پوششی و محافظتی ورزشی&quot;}"
                                                           href="/search/category-cover-and-safety-equipment/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لوازم پوششی و محافظتی ورزشی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ورزش های توپی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش های توپی&quot;}"
                                                       href="/search/category-ball-sports/"
                                                       class=" c-navi-new__big-display-title"><span>ورزش های توپی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش های توپی&quot;}"
                                                        href="/search/category-ball-sports/"
                                                        class=" c-navi-new__medium-display-title"><span>ورزش های توپی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: توپ - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;توپ&quot;}"
                                                        href="/search/category-ball/"
                                                        class=" c-navi-new__big-display-title">
                                                        توپ
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;توپ&quot;}"
                                                           href="/search/category-ball/"
                                                           class=" c-navi-new__medium-display-title">
                                                        توپ
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: راکت - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;راکت&quot;}"
                                                        href="/search/category-racquet/"
                                                        class=" c-navi-new__big-display-title">
                                                        راکت
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;راکت&quot;}"
                                                           href="/search/category-racquet/"
                                                           class=" c-navi-new__medium-display-title">
                                                        راکت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ورزش‌های آبی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش‌های آبی&quot;}"
                                                       href="/search/category-water-games/"
                                                       class=" c-navi-new__big-display-title"><span>ورزش‌های آبی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش‌های آبی&quot;}"
                                                        href="/search/category-water-games/"
                                                        class=" c-navi-new__medium-display-title"><span>ورزش‌های آبی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ورزش‌های رزمی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش‌های رزمی&quot;}"
                                                       href="/search/category-martial-arts/"
                                                       class=" c-navi-new__big-display-title"><span>ورزش‌های رزمی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ورزش‌های رزمی&quot;}"
                                                        href="/search/category-martial-arts/"
                                                        class=" c-navi-new__medium-display-title"><span>ورزش‌های رزمی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اسکوتر برقی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسکوتر برقی&quot;}"
                                                       href="/search/category-sports-hoverboard/"
                                                       class=" c-navi-new__big-display-title"><span>اسکوتر برقی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسکوتر برقی&quot;}"
                                                        href="/search/category-sports-hoverboard/"
                                                        class=" c-navi-new__medium-display-title"><span>اسکوتر برقی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اسکیت و اسکوتر - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسکیت و اسکوتر&quot;}"
                                                       href="/search/category-skate/"
                                                       class=" c-navi-new__big-display-title"><span>اسکیت و اسکوتر</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;اسکیت و اسکوتر&quot;}"
                                                        href="/search/category-skate/"
                                                        class=" c-navi-new__medium-display-title"><span>اسکیت و اسکوتر</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="c-navi-new-list__options-list  js-mega-menu-category-options"
                                             id="categories-10">
                                            <div class="c-navi-new-list__sublist-top-bar"><a
                                                    href="/main/rural-products/"
                                                    class="c-navi-new-list__sublist-see-all-cats">
                                                    همه دسته‌بندی‌های محصولات بومی و محلی
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خوراکی‌های بومی محلی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خوراکی‌های بومی محلی&quot;}"
                                                       href="/search/category-rural-food-and-beverage/"
                                                       class=" c-navi-new__big-display-title"><span>خوراکی‌های بومی محلی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خوراکی‌های بومی محلی&quot;}"
                                                        href="/search/category-rural-food-and-beverage/"
                                                        class=" c-navi-new__medium-display-title"><span>خوراکی‌های بومی محلی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حلوا شکری، ارده و کنجد - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حلوا شکری، ارده و کنجد&quot;}"
                                                       href="/search/category-rural-halva-and-sesame/"
                                                       class=" c-navi-new__big-display-title">
                                                        حلوا شکری، ارده و کنجد
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حلوا شکری، ارده و کنجد&quot;}"
                                                           href="/search/category-rural-halva-and-sesame/"
                                                           class=" c-navi-new__medium-display-title">
                                                        حلوا شکری، ارده و کنجد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خرمای محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خرمای محلی&quot;}"
                                                       href="/search/category-rural-date/"
                                                       class=" c-navi-new__big-display-title">
                                                        خرمای محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;خرمای محلی&quot;}"
                                                           href="/search/category-rural-date/"
                                                           class=" c-navi-new__medium-display-title">
                                                        خرمای محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عسل محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عسل محلی&quot;}"
                                                       href="/search/category-rural-honey/"
                                                       class=" c-navi-new__big-display-title">
                                                        عسل محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عسل محلی&quot;}"
                                                           href="/search/category-rural-honey/"
                                                           class=" c-navi-new__medium-display-title">
                                                        عسل محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: عرقیات و گلاب اصیل - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عرقیات و گلاب اصیل&quot;}"
                                                       href="/search/category-rural-distillates-and-rosewater/"
                                                       class=" c-navi-new__big-display-title">
                                                        عرقیات و گلاب اصیل
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;عرقیات و گلاب اصیل&quot;}"
                                                           href="/search/category-rural-distillates-and-rosewater/"
                                                           class=" c-navi-new__medium-display-title">
                                                        عرقیات و گلاب اصیل
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ادویه و چاشنی محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ادویه و چاشنی محلی&quot;}"
                                                       href="/search/category-rural-flavors-and-spices/"
                                                       class=" c-navi-new__big-display-title">
                                                        ادویه و چاشنی محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ادویه و چاشنی محلی&quot;}"
                                                           href="/search/category-rural-flavors-and-spices/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ادویه و چاشنی محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چای محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چای محلی&quot;}"
                                                       href="/search/category-rural-tea/"
                                                       class=" c-navi-new__big-display-title">
                                                        چای محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چای محلی&quot;}"
                                                           href="/search/category-rural-tea/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چای محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: زعفران، زرشک و تزئینات غذا - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زعفران، زرشک و تزئینات غذا&quot;}"
                                                       href="/search/category-organic-rural-saffron-and-barberry/"
                                                       class=" c-navi-new__big-display-title">
                                                        زعفران، زرشک و تزئینات غذا
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;زعفران، زرشک و تزئینات غذا&quot;}"
                                                           href="/search/category-organic-rural-saffron-and-barberry/"
                                                           class=" c-navi-new__medium-display-title">
                                                        زعفران، زرشک و تزئینات غذا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سبزی خشک محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سبزی خشک محلی&quot;}"
                                                       href="/search/category-rural-dried-herbs/"
                                                       class=" c-navi-new__big-display-title">
                                                        سبزی خشک محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سبزی خشک محلی&quot;}"
                                                           href="/search/category-rural-dried-herbs/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سبزی خشک محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: حبوبات و سویا محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حبوبات و سویا محلی&quot;}"
                                                       href="/search/category-organic-beans-and-soy/"
                                                       class=" c-navi-new__big-display-title">
                                                        حبوبات و سویا محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;حبوبات و سویا محلی&quot;}"
                                                           href="/search/category-organic-beans-and-soy/"
                                                           class=" c-navi-new__medium-display-title">
                                                        حبوبات و سویا محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قند و نبات محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قند و نبات محلی&quot;}"
                                                       href="/search/category-rural-sugar-and-crystallized-sugar/"
                                                       class=" c-navi-new__big-display-title">
                                                        قند و نبات محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قند و نبات محلی&quot;}"
                                                           href="/search/category-rural-sugar-and-crystallized-sugar/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قند و نبات محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ماهی تازه - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماهی تازه&quot;}"
                                                       href="/search/category-rural-fish/"
                                                       class=" c-navi-new__big-display-title">
                                                        ماهی تازه
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;ماهی تازه&quot;}"
                                                           href="/search/category-rural-fish/"
                                                           class=" c-navi-new__medium-display-title">
                                                        ماهی تازه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: روغن محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;روغن محلی&quot;}"
                                                       href="/search/category-rural-oil/"
                                                       class=" c-navi-new__big-display-title">
                                                        روغن محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;روغن محلی&quot;}"
                                                           href="/search/category-rural-oil/"
                                                           class=" c-navi-new__medium-display-title">
                                                        روغن محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خانه و کاشانه بومی محلی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خانه و کاشانه بومی محلی&quot;}"
                                                       href="/search/category-rural-home/"
                                                       class=" c-navi-new__big-display-title"><span>خانه و کاشانه بومی محلی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خانه و کاشانه بومی محلی&quot;}"
                                                        href="/search/category-rural-home/"
                                                        class=" c-navi-new__medium-display-title"><span>خانه و کاشانه بومی محلی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ظروف سنتی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ظروف سنتی&quot;}"
                                                       href="/search/category-rural-dishes/"
                                                       class=" c-navi-new__big-display-title"><span>ظروف سنتی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ظروف سنتی&quot;}"
                                                        href="/search/category-rural-dishes/"
                                                        class=" c-navi-new__medium-display-title"><span>ظروف سنتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کاسه و کاسه بشقاب سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاسه و کاسه بشقاب سنتی&quot;}"
                                                       href="/search/category-rural-bowl/"
                                                       class=" c-navi-new__big-display-title">
                                                        کاسه و کاسه بشقاب سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کاسه و کاسه بشقاب سنتی&quot;}"
                                                           href="/search/category-rural-bowl/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کاسه و کاسه بشقاب سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: بشقاب سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بشقاب سنتی&quot;}"
                                                       href="/search/category-rural-plate/"
                                                       class=" c-navi-new__big-display-title">
                                                        بشقاب سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;بشقاب سنتی&quot;}"
                                                           href="/search/category-rural-plate/"
                                                           class=" c-navi-new__medium-display-title">
                                                        بشقاب سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پارچ سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پارچ سنتی&quot;}"
                                                       href="/search/category-rural-pitcher/"
                                                       class=" c-navi-new__big-display-title">
                                                        پارچ سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پارچ سنتی&quot;}"
                                                           href="/search/category-rural-pitcher/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پارچ سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: لیوان سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لیوان سنتی&quot;}"
                                                       href="/search/category-rural-glass/"
                                                       class=" c-navi-new__big-display-title">
                                                        لیوان سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;لیوان سنتی&quot;}"
                                                           href="/search/category-rural-glass/"
                                                           class=" c-navi-new__medium-display-title">
                                                        لیوان سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: قندان سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قندان سنتی&quot;}"
                                                       href="/search/category-rural-sugar-container/"
                                                       class=" c-navi-new__big-display-title">
                                                        قندان سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;قندان سنتی&quot;}"
                                                           href="/search/category-rural-sugar-container/"
                                                           class=" c-navi-new__medium-display-title">
                                                        قندان سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دیگ و قابلمه سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دیگ و قابلمه سنتی&quot;}"
                                                       href="/search/category-rural-pot-dig/"
                                                       class=" c-navi-new__big-display-title">
                                                        دیگ و قابلمه سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دیگ و قابلمه سنتی&quot;}"
                                                           href="/search/category-rural-pot-dig/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دیگ و قابلمه سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: شکلات خوری دست‌ساز - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شکلات خوری دست‌ساز&quot;}"
                                                       href="/search/category-rural-chocolate-container/"
                                                       class=" c-navi-new__big-display-title">
                                                        شکلات خوری دست‌ساز
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;شکلات خوری دست‌ساز&quot;}"
                                                           href="/search/category-rural-chocolate-container/"
                                                           class=" c-navi-new__medium-display-title">
                                                        شکلات خوری دست‌ساز
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: ابزار آشپزخانه سنتی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار آشپزخانه سنتی&quot;}"
                                                       href="/search/category-rural-kitchen-utensils/"
                                                       class=" c-navi-new__big-display-title"><span>ابزار آشپزخانه سنتی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;ابزار آشپزخانه سنتی&quot;}"
                                                        href="/search/category-rural-kitchen-utensils/"
                                                        class=" c-navi-new__medium-display-title"><span>ابزار آشپزخانه سنتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دیس و سینی سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دیس و سینی سنتی&quot;}"
                                                       href="/search/category-rural-tray/"
                                                       class=" c-navi-new__big-display-title">
                                                        دیس و سینی سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;دیس و سینی سنتی&quot;}"
                                                           href="/search/category-rural-tray/"
                                                           class=" c-navi-new__medium-display-title">
                                                        دیس و سینی سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: تخته سرو سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تخته سرو سنتی&quot;}"
                                                       href="/search/category-rural-serve-board/"
                                                       class=" c-navi-new__big-display-title">
                                                        تخته سرو سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;تخته سرو سنتی&quot;}"
                                                           href="/search/category-rural-serve-board/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تخته سرو سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: سبد دستبافت سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سبد دستبافت سنتی&quot;}"
                                                       href="/search/category-rural-hand-made-basket/"
                                                       class=" c-navi-new__big-display-title">
                                                        سبد دستبافت سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;سبد دستبافت سنتی&quot;}"
                                                           href="/search/category-rural-hand-made-basket/"
                                                           class=" c-navi-new__medium-display-title">
                                                        سبد دستبافت سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: دکوراتیو سنتی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دکوراتیو سنتی&quot;}"
                                                       href="/search/category-rural-decorative/"
                                                       class=" c-navi-new__big-display-title"><span>دکوراتیو سنتی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;دکوراتیو سنتی&quot;}"
                                                        href="/search/category-rural-decorative/"
                                                        class=" c-navi-new__medium-display-title"><span>دکوراتیو سنتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: آویز سرپرده سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آویز سرپرده سنتی&quot;}"
                                                       href="/search/category-rural-decorative-curtain/"
                                                       class=" c-navi-new__big-display-title">
                                                        آویز سرپرده سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;آویز سرپرده سنتی&quot;}"
                                                           href="/search/category-rural-decorative-curtain/"
                                                           class=" c-navi-new__medium-display-title">
                                                        آویز سرپرده سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کیس و کاور سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیس و کاور سنتی&quot;}"
                                                       href="/search/category-rural-traditional-case-and-cover/"
                                                       class=" c-navi-new__big-display-title">
                                                        کیس و کاور سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کیس و کاور سنتی&quot;}"
                                                           href="/search/category-rural-traditional-case-and-cover/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کیس و کاور سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گلدان سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گلدان سنتی&quot;}"
                                                       href="/search/category-rural-flower-pot/"
                                                       class=" c-navi-new__big-display-title">
                                                        گلدان سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گلدان سنتی&quot;}"
                                                           href="/search/category-rural-flower-pot/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گلدان سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: مجسمه سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مجسمه سنتی&quot;}"
                                                       href="/search/category-rural-sculpture/"
                                                       class=" c-navi-new__big-display-title">
                                                        مجسمه سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;مجسمه سنتی&quot;}"
                                                           href="/search/category-rural-sculpture/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مجسمه سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: چراغ خواب و آباژور - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ خواب و آباژور&quot;}"
                                                       href="/search/category-rural-bedside-lamp-and-table-lamp/"
                                                       class=" c-navi-new__big-display-title">
                                                        چراغ خواب و آباژور
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;چراغ خواب و آباژور&quot;}"
                                                           href="/search/category-rural-bedside-lamp-and-table-lamp/"
                                                           class=" c-navi-new__medium-display-title">
                                                        چراغ خواب و آباژور
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: خواب و حمام - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خواب و حمام&quot;}"
                                                       href="/search/category-rural-bed-and-bath/"
                                                       class=" c-navi-new__big-display-title"><span>خواب و حمام</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;خواب و حمام&quot;}"
                                                        href="/search/category-rural-bed-and-bath/"
                                                        class=" c-navi-new__medium-display-title"><span>خواب و حمام</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: کوسن سنتی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کوسن سنتی&quot;}"
                                                       href="/search/category-rural-cushion/"
                                                       class=" c-navi-new__big-display-title">
                                                        کوسن سنتی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;کوسن سنتی&quot;}"
                                                           href="/search/category-rural-cushion/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کوسن سنتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: انواع قالی و قالیچه - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;انواع قالی و قالیچه&quot;}"
                                                       href="/search/category-rural-carpets-and-rugs/"
                                                       class=" c-navi-new__big-display-title"><span>انواع قالی و قالیچه</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;انواع قالی و قالیچه&quot;}"
                                                        href="/search/category-rural-carpets-and-rugs/"
                                                        class=" c-navi-new__medium-display-title"><span>انواع قالی و قالیچه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: گلیم - level: 3"><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گلیم&quot;}"
                                                        href="/search/category-rural-gelim/"
                                                        class=" c-navi-new__big-display-title">
                                                        گلیم
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;گلیم&quot;}"
                                                           href="/search/category-rural-gelim/"
                                                           class=" c-navi-new__medium-display-title">
                                                        گلیم
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشیدنی‌های بومی محلی - level: 2">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشیدنی‌های بومی محلی&quot;}"
                                                       href="/search/category-rural-cloth-and-apparel/"
                                                       class=" c-navi-new__big-display-title"><span>پوشیدنی‌های بومی محلی</span></a><a
                                                        data-snt-event="dkMegaMenuClick"
                                                        data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;پوشیدنی‌های بومی محلی&quot;}"
                                                        href="/search/category-rural-cloth-and-apparel/"
                                                        class=" c-navi-new__medium-display-title"><span>پوشیدنی‌های بومی محلی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: پوشاک بومی و محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پوشاک بومی و محلی&quot;}"
                                                       href="/search/category-rural-clothing/"
                                                       class=" c-navi-new__big-display-title">
                                                        پوشاک بومی و محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;پوشاک بومی و محلی&quot;}"
                                                           href="/search/category-rural-clothing/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پوشاک بومی و محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                                                    data-event="megamenu_click" data-event-category="header_section"
                                                    data-event-label="category_en:  - category_fa: اکسسوری بومی و محلی - level: 3">
                                                    <a data-snt-event="dkMegaMenuClick"
                                                       data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اکسسوری بومی و محلی&quot;}"
                                                       href="/search/category-rural-accessories/"
                                                       class=" c-navi-new__big-display-title">
                                                        اکسسوری بومی و محلی
                                                    </a><a data-snt-event="dkMegaMenuClick"
                                                           data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;اکسسوری بومی و محلی&quot;}"
                                                           href="/search/category-rural-accessories/"
                                                           class=" c-navi-new__medium-display-title">
                                                        اکسسوری بومی و محلی
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-2">
                                        <div class="c-navi-new__ads--banners"><a data-id="79815"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/search/category-non-electrical-tools/?&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D8%A7%D8%A8%D8%B2%D8%A7%D8%B1&amp;promo_position=sponsored_menu_top&amp;promo_creative=79815&amp;bCode=79815">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/88a1496b90a07d6343ad10d3db5c4cb5582c0b88_1629698097.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - ابزار 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-3">
                                        <div class="c-navi-new__ads--banners"><a data-id="79814"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/product-list/plp_3978029/?&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D9%BE%D9%88%D8%B4%D8%A7%DA%A9&amp;promo_position=sponsored_menu_top&amp;promo_creative=79814&amp;bCode=79814">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/e307a873bbf9b07275549ed86defa8c57176c3e0_1629697731.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - پوشاک 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-4">
                                        <div class="c-navi-new__ads--banners"><a data-id="79811"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/product-list/plp_1631349/?&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D8%A7%D8%B3%D8%A8%D8%A7%D8%A8+%D8%A8%D8%A7%D8%B2%DB%8C&amp;promo_position=sponsored_menu_top&amp;promo_creative=79811&amp;bCode=79811">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/fee0c9f47b9a9a038175db3d65ff460aa0ba7a3d_1629697405.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - اسباب بازی 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-5">
                                        <div class="c-navi-new__ads--banners"><a data-id="79809"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/search/category-protein-foods/?fresh=1&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D8%B3%D9%88%D9%BE%D8%B1+%D9%85%D8%A7%D8%B1%DA%A9%D8%AA&amp;promo_position=sponsored_menu_top&amp;promo_creative=79809&amp;bCode=79809">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/a5ccd3e0877e197a4ae942edd6584de7f7d9b902_1629697043.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - سوپر مارکت 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-6">
                                        <div class="c-navi-new__ads--banners"><a data-id="79813"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/search/category-personal-appliance/&amp;/?&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D8%B2%DB%8C%D8%A8%D8%A7%DB%8C%DB%8C+%D9%88+%D8%B3%D9%84%D8%A7%D9%85%D8%AA&amp;promo_position=sponsored_menu_top&amp;promo_creative=79813&amp;bCode=79813">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/5bc1169a02c04b48f0e26d8c67437e0512e9492f_1629697627.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - زیبایی و سلامت 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-8">
                                        <div class="c-navi-new__ads--banners"><a data-id="52864"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/search/category-stationery/?&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D9%BE%D9%86%D8%AA%D8%B1&amp;promo_position=sponsored_menu_top&amp;promo_creative=52864&amp;bCode=52864">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/5cbd4bf62d163f2599425ab18e6a33413961a764_1619244687.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - پنتر 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-9">
                                        <div class="c-navi-new__ads--banners"><a data-id="77201"
                                                                                 class="js-menu-top-banner"
                                                                                 href="https://www.digikala.com/search/category-hiking-and-camping/?has_selling_stock=1&amp;pageno=1&amp;sortby=4&amp;promo_name=%D9%BE%D8%A7%D8%B1%D8%AA%D9%86%D8%B1%D8%B4%DB%8C%D9%BE+-+%D8%B3%D9%81%D8%B1&amp;promo_position=sponsored_menu_top&amp;promo_creative=77201&amp;bCode=77201">
                                                <div class="banner-item"><img
                                                        src="https://dkstatics-public.digikala.com/digikala-adservice-banners/a90f05f722e325707f7ac4e70b8e672ac6a5bbb6_1627367020.jpg?x-oss-process=image/quality,q_80"
                                                        alt="پارتنرشیپ - سفر 1">
                                                    <div class="c-adplacement__badge
        banner-item-ad">
                                                        <div class="c-adplacement__badge-container ">
                                                            <div class="c-adplacement__badge-container--img"><img
                                                                    src="https://www.digikala.com/static/files/52672319.svg"><span
                                                                    class="c-adplacement__badge-container--txt">Ad</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                </div>
                            </li>
                            <li class="js-categories-bar-item js-mega-menu-main-item"><a
                                    class="c-navi-new-list__category-link c-navi-new-list__category-link--bold c-navi-new-list__category-link--fresh"
                                    href="/main/food-beverage/">
                                    سوپرمارکت
                                </a>
                                <div
                                    class="c-navi-new-list__sublist c-navi-new-list__sublist--fmcg js-mega-menu-categories-options">
                                    <div class="c-fmcg-header-submenu">
                                        <div class="c-fmcg-header-submenu__content">
                                            <ul>
                                                <li class="c-fmcg-header-submenu__content-item c-fmcg-header-submenu__content-section">
                                                    <a href="/fresh-offers/">
                                                        شگفت‌انگیز سوپرمارکتی
                                                    </a></li>
                                                <li class="c-fmcg-header-submenu__content-item"><a
                                                        href="/main/food-beverage/">
                                                        سوپرمارکت دیجی‌کالا
                                                    </a>
                                                    <ul>
                                                        <li class="c-fmcg-header-submenu__content-subitem"><a
                                                                href="/search/category-protein-foods/?fresh=1">محصولات
                                                                پروتئینی</a></li>
                                                        <li class="c-fmcg-header-submenu__content-subitem"><a
                                                                href="/search/category-snacks/?fresh=1">تنقلات</a></li>
                                                        <li class="c-fmcg-header-submenu__content-subitem"><a
                                                                href="/search/category-breakfast/?fresh=1">صبحانه</a>
                                                        </li>
                                                        <li class="c-fmcg-header-submenu__content-subitem"><a
                                                                href="/search/category-beverages/?fresh=1">نوشیدنی</a>
                                                        </li>
                                                        <li class="c-fmcg-header-submenu__content-subitem"><a
                                                                href="/search/category-groceries/?fresh=1">کالاهای اساسی
                                                                و خوار و بار</a></li>
                                                        <li class="c-fmcg-header-submenu__content-subitem"><a
                                                                href="/search/category-dried-fruit-nuts/?fresh=1">خشکبار
                                                                و شیرینی</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="c-fmcg-header-submenu__banner-link" target="_blank"
                                           href="https://www.digikalajet.com/?utm_source=digikala-desktop&amp;utm_medium=megamenu&amp;utm_campaign=digikala-touchpoints"><img
                                                class="c-fmcg-header-submenu__banner-img"
                                                src="https://www.digikala.com/static/files/20a51c96.png" alt="Jet"><span
                                                class="c-fmcg-header-submenu__banner-touchpoint"><img
                                                    src="https://www.digikala.com/static/files/add09459.svg"
                                                    alt="Jet"><span
                                                    class="c-fmcg-header-submenu__banner-touchpoint-details"><span
                                                        class="c-fmcg-header-submenu__banner-touchpoint-title">
                            دیجی‌کالا جت <span>جدید</span></span><span
                                                        class="c-fmcg-header-submenu__banner-touchpoint-subtitle">
                            کالاهای سوپرمارکتی با <span>ارسال رایگان</span> زیر ۳۰ دقیقه
                        </span></span><span class="c-fmcg-header-submenu__banner-touchpoint-arrow"></span></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="js-categories-bar-item js-mega-menu-main-item js-promotion-mega-menu"><a
                                    href="/promotion-center/"
                                    class="c-navi-new-list__category-link c-navi-new-list__category-link--amazing c-navi-new-list__category-link--bold">تخفیف‌ها
                                    و پیشنهادها</a>
                                <div
                                    class="c-navi-new-list__sublist c-navi-new-list__sublist--promotion js-mega-menu-categories-options">
                                    <div class="c-navi-new-list__options-container">
                                        <div class="c-navi-new-list__options-list is-active">
                                            <div class="c-navi-new-list__sublist-top-bar"><a href="/promotion-center/"
                                                                                             class="c-navi-new-list__sublist-see-all-cats">
                                                    مشاهده همه تخفیف‌ها و پیشنهادها
                                                </a></div>
                                            <ul>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title">
                                                    <a href="/incredible-offers/"
                                                       class=" c-navi-new__big-display-title"><span>کالاهای شگفت‌انگیز</span></a><a
                                                        href="/incredible-offers/"
                                                        class=" c-navi-new__medium-display-title"><span>کالاهای شگفت‌انگیز</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title">
                                                    <a href="/fresh-offers/"
                                                       class=" c-navi-new__big-display-title"><span>شگفت‌انگیز سوپرمارکتی</span></a><a
                                                        href="/fresh-offers/" class=" c-navi-new__medium-display-title"><span>شگفت‌انگیز سوپرمارکتی</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title">
                                                    <a href="/landing-page/?promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title"><span>فروش ویژه</span></a><a
                                                        href="/landing-page/?promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title"><span>فروش ویژه</span></a>
                                                </li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=5966&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        کالای دیجیتال
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=5966&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        کالای دیجیتال
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=8450&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        خودرو، ابزار و تجهیزات صنعتی
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=8450&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        خودرو، ابزار و تجهیزات صنعتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=8749&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        مد و پوشاک
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=8749&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        مد و پوشاک
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=6741&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        اسباب بازی، کودک و نوزاد
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=6741&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        اسباب بازی، کودک و نوزاد
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=8895&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        کالاهای سوپرمارکتی
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=8895&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        کالاهای سوپرمارکتی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=5968&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        زیبایی و سلامت
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=5968&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        زیبایی و سلامت
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=5967&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        خانه و آشپزخانه
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=5967&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        خانه و آشپزخانه
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=8&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        کتاب، لوازم تحریر و هنر
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=8&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        کتاب، لوازم تحریر و هنر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=6124&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        ورزش و سفر
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=6124&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        ورزش و سفر
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item">
                                                    <a href="/landing-page/?category%5B0%5D=10170&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                       class=" c-navi-new__big-display-title">
                                                        محصولات بومی و محلی
                                                    </a><a
                                                        href="/landing-page/?category%5B0%5D=10170&amp;promotion_types%5B0%5D=incredible_offer&amp;promotion_types%5B1%5D=promotion&amp;promotion_times%5B0%5D=active"
                                                        class=" c-navi-new__medium-display-title">
                                                        محصولات بومی و محلی
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item c-navi-new-list__sublist-option--has-circle">
                                                    <a href="/promotion-center/category-based-products/30/"
                                                       class=" c-navi-new__big-display-title">
                                                        کرم ضد آفتاب تا ۶۵ درصد تخقیف
                                                    </a><a href="/promotion-center/category-based-products/30/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کرم ضد آفتاب تا ۶۵ درصد تخقیف
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item c-navi-new-list__sublist-option--has-circle">
                                                    <a href="/promotion-center/category-based-products/32/"
                                                       class=" c-navi-new__big-display-title">
                                                        عطر کمتر از ۹۹ هزار تومان
                                                    </a><a href="/promotion-center/category-based-products/32/"
                                                           class=" c-navi-new__medium-display-title">
                                                        عطر کمتر از ۹۹ هزار تومان
                                                    </a></li>
                                                <div class="c-navi-new-list__sublist-divider"></div>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--new-customer u-hidden">
                                                    <a href="/landings/new-customer/"
                                                       class=" c-navi-new__big-display-title">
                                                        مشتریان جدید
                                                    </a><a href="/landings/new-customer/"
                                                           class=" c-navi-new__medium-display-title">
                                                        مشتریان جدید
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--best-selling">
                                                    <a href="/best-selling/" class=" c-navi-new__big-display-title">
                                                        پرفروش‌ترین‌ کالاها
                                                    </a><a href="/best-selling/"
                                                           class=" c-navi-new__medium-display-title">
                                                        پرفروش‌ترین‌ کالاها
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--gift">
                                                    <a href="/promotion-center/products-with-gifts/"
                                                       class=" c-navi-new__big-display-title">
                                                        با هر خرید هدیه بگیرید!
                                                    </a><a href="/promotion-center/products-with-gifts/"
                                                           class=" c-navi-new__medium-display-title">
                                                        با هر خرید هدیه بگیرید!
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--last-season">
                                                    <a href="/promotion-page/cmp_109599/"
                                                       class=" c-navi-new__big-display-title">
                                                        تخفیف پایان فصل
                                                    </a><a href="/promotion-page/cmp_109599/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تخفیف پایان فصل
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--gift-card">
                                                    <a href="/search/category-dk-ds-gift-card/"
                                                       class=" c-navi-new__big-display-title">
                                                        کارت هدیه خرید از دیجی‌کالا
                                                    </a><a href="/search/category-dk-ds-gift-card/"
                                                           class=" c-navi-new__medium-display-title">
                                                        کارت هدیه خرید از دیجی‌کالا
                                                    </a></li>
                                                <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--has-icon c-navi-new-list__sublist-option--new-seller-product">
                                                    <a href="/promotion-center/new-sellers-products/"
                                                       class=" c-navi-new__big-display-title">
                                                        تازه‌های فروشنده‌های جدید
                                                    </a><a href="/promotion-center/new-sellers-products/"
                                                           class=" c-navi-new__medium-display-title">
                                                        تازه‌های فروشنده‌های جدید
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="c-navi-new-list__main-banner"><a data-observed="0"
                                                                                 class="js-promotion-mega-menu-banner"
                                                                                 href="https://www.digikala.com/promotion-center/?&amp;promo_name=%D8%AA%D8%AE%D9%81%DB%8C%D9%81+%D9%87%D8%A7+%D9%88+%D9%BE%DB%8C%D8%B4%D9%86%D9%87%D8%A7%D8%AF%D9%87%D8%A7&amp;promo_position=promotion_center_mega_menu&amp;promo_creative=58152&amp;bCode=58152"
                                                                                 data-id="58152"><img
                                                src="https://dkstatics-public.digikala.com/digikala-adservice-banners/560de61ce10e86ee53603192ed6e3320fd0d0923_1610191059.png?x-oss-process=image/quality,q_80"></a>
                                    </div>
                                </div>
                            </li>
                            <li class="js-categories-bar-item"><a
                                    class="c-navi-new-list__category-link c-navi-new-list__category-link--my-digikala c-navi-new-list__category-link--bold"
                                    href="/my-digikala/">
                                    دیجی‌کالای من
                                </a></li>
                            <li class="js-categories-bar-item js-mega-menu-main-item">
                                <a class="c-navi-new-list__category-link c-navi-new-list__category-link--bold c-navi-new-list__category-link--plus c-digiplus-sign--before"
                                   href="/plus/landing/">
                                    دیجی‌پلاس
                                </a>
                                <div
                                    class="c-navi-new-list__sublist c-navi-new-list__sublist--digiplus js-mega-menu-categories-options">


                                    <div class="c-dp-header-submenu">
                                        <div class="c-dp-header-submenu__content">
                                            <div class="c-dp-header-submenu__head-title">
                                                مشترک <img src="https://www.digikala.com/static/files/4a2895fc.svg"
                                                           alt="Digiplus"> هستید
                                            </div>
                                            <div class="c-dp-header-submenu__head-subtitle">
                                                ۶ روز از اشتراک شما باقی‌مانده
                                            </div>
                                            <ul class="c-dp-header-submenu__nav">
                                                <li class="c-dp-header-submenu__nav-item">
                                                    <a class="c-dp-header-submenu__nav-link" href="/profile/digiplus/">
                                                        مدیریت اشتراک
                                                    </a>
                                                </li>
                                                <li class="c-dp-header-submenu__nav-item">
                                                    <a class="c-dp-header-submenu__nav-link"
                                                       href="/plus/landing/#digiplus_register">
                                                        تمدید اشتراک
                                                    </a>
                                                </li>
                                                <li class="c-dp-header-submenu__nav-item c-dp-header-submenu__nav-item--plus-products">
                                                    <a class="c-dp-header-submenu__nav-link" href="/plus/products/">
                                                        کالاهای <img
                                                            src="https://www.digikala.com/static/files/4a2895fc.svg"
                                                            alt="Digiplus">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="c-dp-header-submenu__banner-link" href="/plus/landing/">
                                            <img class="c-dp-header-submenu__banner-img"
                                                 src="https://www.digikala.com/static/files/38492329.jpg" alt="Banner">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="js-categories-bar-item js-mega-menu-main-item"><a href="/digiclub/"
                                                                                         class="c-navi-new-list__category-link c-navi-new-list__category-link--digiclub c-navi-new-list__category-link--bold">
                                    دیجی‌کلاب
                                </a>
                                <div
                                    class="c-navi-new-list__sublist c-navi-new-list__sublist--digiclub js-mega-menu-categories-options">
                                    <div class="c-dc-header-submenu">
                                        <div class="c-dc-header-submenu__content">
                                            <div class="c-dc-points c-dc-points--gold">
                                                امتیاز شما:
                                                <span class="c-dc-points__number js-dc-point">۵۲۶</span>
                                                <img class="c-dc-points__coin"
                                                     src="https://www.digikala.com/static/files/5ca024e6.svg"
                                                     alt="Digiclub Points">
                                            </div>
                                            <ul class="c-dc-header-submenu__nav">
                                                <li class="c-dc-header-submenu__nav-item">
                                                    <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--main"
                                                       href="/digiclub/">
                                                        صفحه اصلی دیجی‌کلاب
                                                    </a>
                                                </li>
                                                <li class="c-dc-header-submenu__nav-item">
                                                    <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--rewards"
                                                       href="/digiclub/rewards/">
                                                        جوایز دیجی‌کلاب
                                                    </a>
                                                </li>
                                                <li class="c-dc-header-submenu__nav-item">
                                                    <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--history"
                                                       href="/digiclub/history/">
                                                        تاریخچه امتیازات دیجی‌کلاب
                                                    </a>
                                                </li>
                                                <li class="c-dc-header-submenu__nav-item">
                                                    <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--missions"
                                                       href="/digiclub/missions/">
                                                        ماموریت‌های دیجی‌کلابی
                                                    </a>
                                                </li>
                                                <li class="c-dc-header-submenu__nav-item">
                                                    <a class="c-dc-header-submenu__nav-link c-dc-header-submenu__nav-link--luckydraw"
                                                       href="/digiclub/luckydraw/">
                                                        قرعه‌کشی
                                                        <div
                                                            class="c-dc-lucky-counter c-dc-lucky-counter--header js-dc-counter">
                                                            <div
                                                                class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header c-dc-lucky-counter__time--first-child js-dc-counter-days">
                                                                ۷۴
                                                            </div>
                                                            <div
                                                                class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header js-dc-counter-hours">
                                                                ۰۹
                                                            </div>
                                                            <div
                                                                class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header js-dc-counter-minutes">
                                                                ۴۹
                                                            </div>
                                                            <div
                                                                class="c-dc-lucky-counter__time c-dc-lucky-counter__time--header js-dc-counter-seconds">
                                                                ۱۵
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="c-dc-header-submenu__banner-link"
                                           href="https://dgka.la/dcdkhomepaege">
                                            <img class="c-dc-header-submenu__banner-img"
                                                 src="https://dkstatics-public.digikala.com/digiclub/147496a316a037432ee0c0f5b95299a6409aefc9_1629201415.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="js-categories-bar-item js-mega-menu-main-item js-digipay-menu"><a
                                    href="/my-digipay/"
                                    class="c-navi-new-list__category-link c-navi-new-list__category-link--digipay c-navi-new-list__category-link--bold">
                                    دیجی‌پی
                                </a>
                                <div
                                    class="c-navi-new-list__sublist c-navi-new-list__sublist--digipay js-mega-menu-categories-options">
                                    <div class="c-digipay-submenu">
                                        <div class="c-digipay-submenu__content">
                                            <a target="_blank"
                                               class="c-digipay-submenu__link js-wallet-activation-url js-user-dropdown-wallet-has-url u-hidden"
                                               href="/users/login-register/">
                                                فعال‌سازی کیف پول
                                            </a>
                                            <div class="js-digipay-menu-loading ">
                                                در حال دریافت اطلاعات ...
                                            </div>
                                            <div
                                                class="c-digipay-submenu__wallet js-user-dropdown-wallet-has-amount u-hidden">
                                                <div class="c-digipay-submenu__wallet-amount-title">موجودی کیف پول:
                                                </div>
                                                <div class="u-flex u-items-center">
                                                    <span
                                                        class="c-digipay-submenu__wallet-amount js-user-drop-down-wallet-amount"></span>
                                                    <a class="c-digipay-submenu__wallet-re-charge"
                                                       href="/my-digipay/?action=251"></a>
                                                </div>
                                            </div>
                                            <a target="_blank" class="c-digipay-submenu__link" href="/my-digipay/">
                                                صفحه اصلی دیجی‌پی
                                            </a>

                                            <a class="c-digipay-submenu__action-link" target="_blank"
                                               data-icon="Icon-Badges-Top-up" href="/my-digipay/?action=402">
                                                خرید شارژ
                                            </a>

                                            <a class="c-digipay-submenu__action-link" href="/my-digipay/?action=403"
                                               target="_blank" data-icon="Icon-Badges-Data-Package">
                                                خرید بسته اینترنت
                                            </a>

                                            <a class="c-digipay-submenu__action-link" href="/my-digipay/?action=400"
                                               target="_blank" data-icon="Icon-Badges-Data-Bill">
                                                پرداخت قبض
                                            </a>
                                        </div>
                                        <a class="c-digipay-submenu__banner-link
                " href="https://express.mydigipay.com/service/credit/resolve">
                                            <img class="c-digipay-submenu__banner-img"
                                                 src="https://www.digikala.com/static/files/148f56c6.png" loading="lazy"
                                                 alt="Banner">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="js-categories-bar-item c-navi-new-list__category-link--visible-in-wide"><a
                                    class="c-navi-new-list__category-link" target="_blank" href="/faq/">
                                    سوالی دارید؟
                                </a></li>
                            <li class="js-categories-bar-item"><a
                                    class="c-navi-new-list__category-link c-navi-new-list__category-link--visible-in-wide"
                                    target="_blank"
                                    href="/landings/seller-introduction/?utm_source=Homepage-Web&amp;utm_medium=header&amp;utm_campaign=Seller%20Registration&amp;headerEntry=1">
                                    فروشنده شوید
                                </a></li>
                        </ul>
                    </li>
                    <li class="c-navi-new-list__categories">
                        <ul class="c-navi-new-list__category-item">
                            <li class="c-navi-new-list__category c-navi-new-list__category--location  js-general-location-bar">
                                <span class="c-navi-new-list__category-send-to">ارسال به </span>
                                <span class="c-navi-new-list__category-location">آذربایجان شرقی، بناب</span>
                            </li>
                        </ul>
                    </li>
                    <script>
                        var insider_object = {
                            "user": {
                                "uuid": "7406722",
                                "name": "\u062a\u0648\u062d\u06cc\u062f",
                                "surename": "\u062f\u0627\u0646\u0646\u062f\u0647",
                                "email": "tdanandeh@yahoo.com",
                                "phone_number": "+989120634157",
                                "gdpr_optin": true,
                                "email_optin": true
                            }
                        };
                    </script>

                    <input type="hidden" id="ESILogged" data-logged="0">

                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="c-navi-categories__overlay js-navi-overlay"></div>
