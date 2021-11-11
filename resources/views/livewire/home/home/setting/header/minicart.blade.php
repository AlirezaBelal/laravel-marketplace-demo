<div id="mini-cart" class="c-header__btn-container">
    <div class="c-header__btn-cart-container ">
        <a id="cart-button"
           class="c-header__btn-cart c-header__btn-adding--no-drop-down"
           data-snt-event="dkHeaderClick"
           data-snt-params='{"item":"mini-cart","item_option":null}'
           data-counter="۰"
           href="cart/index.html"
           data-event="mini_cart_click" data-event-category="header_section"
           data-event-label="items: 0 - total price: ">
        </a>
        <div class="c-header__cart-info js-mini-cart-dropdown">
            <div class="c-header__cart-info-header">
                <div class="c-header__cart-info-count">
                    ۰ کالا
                </div>
                <a data-snt-event="dkHeaderClick"
                   data-snt-params='{"item":"mini-cart","item_option":"cart-page"}'
                   href="cart/index.html" class="c-header__cart-info-link">
                    <span>مشاهده سبد خرید</span>
                </a>
            </div>


        </div>
    </div>
    <div class="remodal c-modal c-u-minicart__modal u-hidden js-minicart-modal"
         data-remodal-id="universal-mini-cart"
         role="dialog"
         aria-labelledby="modalTitle"
         tabindex="-1z"
         aria-describedby="modalDesc"
         data-remodal-options=""
    >
        <div class="c-modal__top-bar  ">
            <div>
                <div class="c-u-minicart__quantity">
                    سبد خرید
                    <span>۰ کالا</span>
                </div>
                <a href="cart/index.html" class="o-link o-link--has-arrow o-link--no-border o-link--sm">مشاهده
                    سبد خرید</a>
            </div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <div class="c-u-minicart">
        </div>
        <div class="c-modal__footer">
            <div class="c-header__cart-info-total">
                <span class="c-header__cart-info-total-text">مبلغ قابل پرداخت</span>
                <p class="c-header__cart-info-total-amount">
                    <span class="c-header__cart-info-total-amount-number"> </span>
                    <span> تومان</span>
                </p>
            </div>

            <div>
                <a data-snt-event="dkHeaderClick"
                   data-snt-params='{"item":"mini-cart","item_option":"confirm-cart"}'
                   href="#"
                   class="o-btn o-btn--contained-red-md">ورود و ثبت سفارش</a>
            </div>
        </div>
    </div>
</div>
