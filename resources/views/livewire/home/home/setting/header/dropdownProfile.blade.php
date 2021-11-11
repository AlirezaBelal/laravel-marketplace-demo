<div class="c-header__profile-dropdown js-dropdown-menu" style="display: none;">
    <div class="c-header__profile-dropdown-account-container">
        <div class="c-header__profile-dropdown-user">
            <div class="c-header__profile-dropdown-user-img">
                @if (auth()->user()->img)
                    <img src="{{asset(auth()->user()->img)}}">
                @else
                    <img src="https://www.digikala.com/static/files/2a5b1e32.svg">
                @endif

            </div>
            <div class="c-header__profile-dropdown-user-info">
                <p class="c-header__profile-dropdown-user-name">{{auth()->user()->name}}</p>
                <span class="c-header__profile-dropdown-user-profile-link">مشاهده حساب کاربری</span>
            </div>
        </div>
        <div class="c-header__profile-dropdown-account">
            <div
                class="c-header__profile-dropdown-account-item js-user-dropdown-wallet-has-amount">
                <span class="c-header__profile-dropdown-account-item-title">کیف پول</span>
                <div class="c-header__profile-dropdown-account-item-amount">
              <span
                  class="c-header__profile-dropdown-account-item-amount-number js-user-drop-down-wallet-amount">
                  {{\App\Models\PersianNumber::translate(auth()->user()->wallet)}} </span>
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
                            <span class="c-header__profile-dropdown-account-item-amount-number js-dc-point">۳۴۹۶</span>
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
               class="c-header__profile-dropdown-action c-header__profile-dropdown-action--orders ">سفارش‌های
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
