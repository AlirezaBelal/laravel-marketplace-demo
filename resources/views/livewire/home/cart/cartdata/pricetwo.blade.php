<li>
    <div class="c-checkout-bill__item-title"><span>
                        هزینه ارسال
                    </span>
        <div class="c-checkout-bill__shipping-history js-normal-delivery ">
            ۱
            مرسوله
            <div class="c-checkout-bill__shipping-history-container">
                <div  class="c-checkout-bill__shipping-history-row js-0-1-1-package-row-normal js-package-row"
                    data-cost="0" data-alt-cost="" data-default-cost="0"
                    data-post-payed="0" data-plus-shipping="0"
                    data-dynamic-shipping="1"><span
                        class="c-checkout-bill__shipping-history-title js-package-row-title">
                        مرسوله
                        ۱
                        <span class="c-checkout-bill__shipping-history-title--expressShipping">
                            ارسال عادی
                        </span></span>
                    <span class="c-checkout-bill__shipping-history-price js-package-row-non-free-amount
                                     u-hidden"><span
                            class="c-checkout-bill__shipping-history-price--amount js-package-row-amount">
                                ۰
                            </span><span class="c-checkout-bill__shipping-history-price--currency">
                                تومان
                            </span></span><span
                        class="c-checkout-bill__shipping-history-price--free js-package-row-free-amount u-hidden">
                            رایگان
                        </span><span class="c-checkout-bill__shipping-history-price js-select-time-message">
                                زمان ارسال را انتخاب کنید
                            </span></div>
            </div>
        </div>
    </div>
    <span class="c-checkout-bill__item-title js-not-free-shipping hidden"><span
            class="js-shipping-cost">۰ </span>
                    تومان
                </span><span class="c-checkout-bill__item-title js-free-shipping hidden">
                    رایگان
                </span><span class="c-checkout-bill__item-title js-dynamic-shipping-msg">
                    وابسته به زمان ارسال
                </span><span class="c-checkout-bill__item-title js-shipping-divider hidden">
                    +
                </span><span class="c-checkout-bill__item-title js-shipping-post-paid hidden">
                    پس کرایه
                </span>
</li>
<li class="c-checkout-bill__shipping-cost-notice js-dynamic-shipping-cost-notice hidden">
    هزینه بر اساس وزن، حجم مرسوله و زمان تحویل تعیین شده است.
</li>
<li class="c-checkout-bill__total-price">
                    <span
                        class="c-checkout-bill__total-price--title">
                    مبلغ قابل پرداخت
                </span>
    <span class="c-checkout-bill__total-price--amount" id="cartPayablePrice">
                        <span class="js-price" data-price="{{$orders->sum('total_discount_price')}}0">
                            {{number_format($data = $orders->sum('total_discount_price'))}} </span><span
            class="c-checkout-bill__total-price--currency">
                        تومان
                    </span>
    </span>
</li>
<li class="c-checkout-bill__to-forward-button">
    <a href="" wire:click="addToPayment({{$orders->sum('total_discount_price')}})"
       class="o-btn o-btn--full-width o-btn--contained-red-lg js-save-shipping-data"
       style="display: none; pointer-events: all; cursor: pointer;">
        ادامه فرآیند خرید
    </a>
    <button type="button"
            class="o-btn o-btn--full-width o-btn--outlined-red-lg js-inform-package-section">
        برای ادامه، زمان ارسال را تعیین کنید
    </button>
</li>
