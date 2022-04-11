<section class="o-page__aside">
    <div class="c-profile-aside">
        <a class="c-profile-box__dc-banner"
           href="/users/referral/"><img
                src="https://www.digikala.com/static/files/a6cda4ab.jpg"></a>
        <div class="c-profile-box">
            <div class="c-profile-box__section">
                <div class="c-profile-box__header">
                    <div class="c-profile-box__avatar js-user-avatar js-change-avatar"
                         style="background-image: url(https://www.digikala.com/static/files/2a5b1e32.svg)"></div>
                    <div class="c-profile-box__header-content">
                        <div class="c-profile-box__username">توحید داننده</div>
                        <div class="c-profile-box__phone">۰۹۱۲۰۶۳۴۱۵۷</div>
                    </div>
                </div>
                <a class="c-profile-box__row c-profile-box__row--has-next js-wallet-container-active"
                   href="/profile/wallet/cash-in/">
                    <div class="c-profile-box__title">کیف پول</div>
                    <div>
                        <div
                            class="c-profile-box__amount c-profile-box__amount--toman js-wallet-amount">
                            ۹,۱۶۷
                        </div>
                        <p class="o-link o-link--sm o-link--has-arrow">افزایش موجودی</p></div>
                </a><a class="c-profile-box__row u-hidden js-wallet-container-not-active"
                       href=""><p class="c-profile-box__title">فعال سازی کیف پول</p></a><a
                    class="c-profile-box__row" href="/digiclub/">
                    <div class="c-profile-box__title">
                        دیجی‌کلاب
                    </div>
                    <span class="c-profile-box__amount ">
                                                    ۹۰۲
                                                    <span class="c-profile-box__point">امتیاز</span></span>
                    <div
                        class="c-message-hint c-message-hint--right c-message-hint--digiclub js-digiclub-animation c-message-hint--animation">
                        با هر خرید، ثبت نظر و دعوت از دوستان امتیاز دیجی‌کلاب بگیرید.
                    </div>
                </a>
            </div>
            <div class="c-profile-box__section"><a href="/profile/digiplus/"
                                                   class="c-profile-menu__item c-profile-menu__item--plus c-digiplus-sign--before">دیجی‌پلاس</a>
            </div>
            <div class="c-profile-box__section">
                <ul class="c-profile-menu">
                    <li><a href="/profile/orders/"
                           class="c-profile-menu__item c-profile-menu__item--orders
{{--                                {{Request::routeIs('dashboard.favorite') ? 'is-active': '' }}--}}
                               ">سفارش‌های
                            من</a></li>
                    <li><a href="/profile/favorites/"
                           class="c-profile-menu__item c-profile-menu__item--wishlist
                                {{Request::routeIs('profile.favorite') ? 'is-active': '' }}">
                            لیست‌ها </a></li>
                    <li><a href="/profile/comments/"
                           class="c-profile-menu__item c-profile-menu__item--comments ">نظرات</a>
                    </li>
                    <li><a href="/profile/addresses/"
                           class="c-profile-menu__item c-profile-menu__item--address ">نشانی‌ها</a>
                    </li>
                    <li><a href="/profile/giftcards/"
                           class="c-profile-menu__item c-profile-menu__item--gifts ">کارت‌های
                            هدیه</a></li>
                    <li><a href="/profile/notification/"
                           class="c-profile-menu__item c-profile-menu__item--message ">پیغام‌ها</a>
                    </li>
                    <li><a href="/profile/user-history/"
                           class="c-profile-menu__item c-profile-menu__item--user-history ">
                            بازدیدهای اخیر
                        </a></li>
                    <li><a href="/profile/personal-info/"
                           class="c-profile-menu__item c-profile-menu__item--user-info ">اطلاعات
                            حساب</a></li>
                </ul>
            </div>
            <div class="c-profile-box__section"><a href="/users/logout/"
                                                   class="js-logout-button c-profile-menu__item c-profile-menu__item--sign-out">خروج</a>
            </div>
        </div>
    </div>
</section>
@include('livewire.home.modals')
@include('livewire.home.script')
