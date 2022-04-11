<section class="c-checkout-empty__container" style="margin-left: 25px">
    <div class="c-checkout">
        <div class="c-checkout__group">
            <div class="c-checkout__header c-checkout__header--sfl c-checkout__header--express">
                <div><span class="c-checkout__header-title">ارسال عادی</span><span
                        class="c-checkout__header-extra-info">
                                (
                        {{\App\Models\PersianNumber::translate($cart_others->count())}}
                                کالا)
                            </span></div>
                <a class="c-checkout__sfl-add-all js-move-this-shipping-category-to-card"
                   data-shipping-key="express" wire:click="addAllToCArt()">
                    افزودن همه به سبد خرید
                </a></div>
            <div class="c-checkout__body">
                <ul class="c-checkout__items">
                    @foreach($cart_others as $cart)
                        <li class="c-checkout__item">
                            <div class="c-cart-item" data-price-change="0" data-min-price-badge="1">
                                <div class="c-cart-item__thumb">
                                    <a data-product-id="2980504"
                                       class="c-cart-item__thumb-img js-save-for-later-card"
                                       href="/product/dkp-{{$cart->product_id}}/{{$cart->product->link}}"
                                       target="_blank">
                                        <img alt="{{$cart->product->title}}"
                                             src="/storage/{{$cart->product->img}}"></a>
                                </div>
                                <div class="c-cart-item__data">
                                    <div class="c-cart-item__title">
                                        {{$cart->product->title}}
                                    </div>
                                    <div class="c-cart-item__product-data c-cart-item__product-data--color">
                    <span
                        style="background-color:{{$cart->color->value}};"></span>
                                        {{$cart->color->name}}
                                    </div>
                                    <div class="c-cart-item__product-data c-cart-item__product-data--warranty">
                                        {{$cart->warranty->name}}
                                    </div>
                                    <div class="c-cart-item__product-data c-cart-item__product-data--seller">
                                        {{$cart->vendor->name}}
                                    </div>
                                    <div class="c-cart-item__discount">
                                        تخفیف
                                        <span>
                        {{\App\Models\PersianNumber::translate(number_format($cart->product_price - $cart->product_price_discount))}}
                    </span>
                                        تومان
                                    </div>
                                    <div class="c-cart-item__price-row">
                                        <div class="c-cart-item__quantity-row">
                                            <a class="c-cart-item__move-to-cart js-add-to-cart-from-sfl"
                                               data-variant-id="20875819"
                                               wire:click="addToCartFromCartOther({{$cart->id}})">
                                                افزودن به سبد خرید
                                            </a>
                                            <a class="c-cart-item__remove-from-sfl js-remove-from-cart"
                                               wire:click="deleteCartProduct({{$cart->id}})"
                                               data-id="1479697580" data-product="2980504">
                                                حذف محصول
                                            </a>

                                        </div>
                                        <div class="c-cart-item__product-price">
                                            {{\App\Models\PersianNumber::translate(number_format($cart->product_price_discount))}}
                                            <span>تومان</span></div>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</section>
<aside class="o-page__aside">
    <div class="c-checkout-aside">
        <div class="c-checkout-summary c-checkout-summary--sfl"
             data-gtm-vis-recent-on-screen-9070001_92="4922674"
             data-gtm-vis-first-on-screen-9070001_92="4922674" data-gtm-vis-total-visible-time-9070001_92="100"
             data-gtm-vis-has-fired-9070001_92="1">
            <header>
                لیست خرید بعدی چیست؟
            </header>
            <p>
                شما می‌توانید محصولاتی که به سبد خرید
                خود افزوده اید و موقتا قصد خرید آن‌ها را ندارید، در لیست خرید بعدی خود قرار داده و
                هر زمان مایل بودید آن‌ها را مجدداً به سبد خرید اضافه کرده و خرید آن‌ها را تکمیل کنید.
            </p>
            <div class="c-checkout-summary__sfl-count-info"><span>
                    {{\App\Models\PersianNumber::translate($cart_others->count())}}
                     کالا
                </span>
                در لیست خرید بعدی شماست
            </div>
            <button wire:click="addAllToCArt()"
                    class="c-checkout-summary__sfl-add-all-button js-move-all-from-sfl-to-cart">
                افزودن همه به سبد خرید
            </button>
        </div>
    </div>
</aside>
