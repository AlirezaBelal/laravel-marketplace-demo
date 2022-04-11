@include('livewire.home.cart.tab')
<div id="cart-data" class="o-page__row">
    <div id="uhd1" class="js-cart-tab-main c-checkout__tab-container--full-width ">
        <div class="c-checkout__tab-container">

            @if ($carts == null)
                <div class="c-tab-checkout-empty">
                    @include('livewire.home.cart.cartempty')
                </div>
                {{--                    @include('livewire.home.cart.ads')--}}
            @else
                @include('livewire.home.cart.cartFull')
            @endif


        </div>
        @include('livewire.home.cart.view_last')
    </div>
    <div id="uhd2" class="c-checkout__tab-container js-cart-tab-sfl u-hidden">
        @include('livewire.home.cart.cartdata.cart2')
    </div>
</div>
{{--<div class="c-message-light-small c-message-light-small--info c-message-light-small--cart"><h6>توجه : قیمت یا موجودی--}}
{{--        بعضی از کالاهای سبد خرید شما تغییر کرده است:</h6>--}}
{{--    <ul>--}}
{{--        <li>گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت ناموجود شده--}}
{{--            است و به طور خودکار از سبد خرید شما حذف--}}
{{--            می‌شود.--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}
{{--<li class="c-checkout__item"><div class="c-cart-item"><div class="c-cart-item__thumb c-cart-item__thumb--inactive  "><a data-product-id="3048126" class="c-cart-item__thumb-img js-save-for-later-card" href="/product/dkp-3048126/گوشی-موبایل-سامسونگ-مدل-galaxy-a21s-sm-a217fds-دو-سیمکارت-ظرفیت-64-گیگابایت" target="_blank"><img alt="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت	" src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"></a></div><div class="c-cart-item__data"><div class="c-cart-item__product-notice-container"><div class="c-cart-notification c-cart-notification--error c-cart-notification--info">--}}
{{--                    کالا ناموجود شده و به صورت خودکار از سبد حذف می‌شود.--}}
{{--                </div><span class="btn-link-spoiler btn-link-spoiler--arrow-left-to-left btn-link-spoiler--no-underline js-same-product-modal" data-id="1488336745" data-product="3048126" data-variant="14398264" data-gtm-vis-recent-on-screen-9070001_346="44905" data-gtm-vis-first-on-screen-9070001_346="44905" data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">--}}
{{--                        مشاهده کالاهای مشابه--}}
{{--                </span></div><div class="c-cart-item__title c-cart-item__title--inactive">--}}
{{--                گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت--}}
{{--            </div><div class="c-cart-item__product-data c-cart-item__product-data--inactive c-cart-item__product-data--color"><span style="background-color:#FFFFFF;"></span>--}}
{{--                سفید--}}
{{--            </div><div class="c-cart-item__product-data c-cart-item__product-data--inactive c-cart-item__product-data--warranty">--}}
{{--                گارانتی ۱۸ ماهه ویراسرویس (تجارت گستر فخیم)--}}
{{--            </div><div class="c-cart-item__product-data c-cart-item__product-data--inactive c-cart-item__product-data--seller">--}}
{{--                مرکز تامین کالای دیجیتال ایران--}}
{{--            </div><div class="c-cart-item__price-row"><div class="c-cart-item__inactive-text">--}}
{{--                    ناموجود--}}
{{--                </div></div></div></div></li>--}}
