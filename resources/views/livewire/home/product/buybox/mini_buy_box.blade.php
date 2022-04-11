<div class="c-mini-buy-box js-mini-buy-box">
    <div style="" class="c-mini-buy-box__amazing-text  u-hidden">
        فروش ویژه
    </div>
    <div class="c-mini-buy-box__product-info"><img
            class="c-mini-buy-box__product-info--img"
            src="/storage/{{$product->img}}"
            alt="{{$product->title}}	">
        <div class="c-mini-buy-box__product-info--info">
            <div class="title">{{$product->title}}
            </div>

            <div class="colors ">
                @foreach(\App\Models\ProductSeller::where('product_id',$product->id)->get() as $seller)
                <label data-color-code="{{$seller->color->value}}"
                                        class="js-variant-color"
                                        style="background-color: {{$seller->color->value}}"></label>
{{--                    <span--}}
{{--                    class="js-color-title">{{$seller->color->name}}</span>--}}
                @endforeach
            </div>
            <div class="sizes u-hidden"><span class="js-size-title"></span></div>
        </div>
    </div>
    <div
        class="c-mini-buy-box__row c-mini-buy-box__seller-digikala js-mini-digikala-seller">
        دیجی‌کالا
    </div>
    <div
        class="c-mini-buy-box__row c-mini-buy-box__seller u-hidden js-mini-not-digikala-seller">
        <i class="green-verified js-mini-is-trusted u-hidden"></i><i
            class="blue-verified js-mini-is-official u-hidden"></i><label
            class="js-mini-seller-name">{{$productSeller_max_price_first->vendor['name'] ?? ''}}</label></div>
    <div
        class="c-mini-buy-box__row c-mini-buy-box__warranty js-mini-buy-box-guarantee-text ">
        گارانتی ۱۸ ماهه داریا همراه پایتخت
    </div>
    <div class="c-mini-buy-box__row c-mini-buy-box__stock ">
        موجود در انبار دیجی‌کالا
    </div>

    @if ($priceDate_min_price_first->discount_price == $productSeller_max_price_first->discount_price ?? $this->vendor_new->discount_price )
        @if ($mo > 0)
            <div
                class="c-mini-buy-box__row c-mini-buy-box__best-price js-data-best-price ">
                بهترین قیمت ۳۰ روز گذشته
            </div>
        @endif
    @endif
    <div
        class="c-product__seller-row c-product__seller-row--price c-mini-buy-box__price-row">
        <div class="c-product__seller-price-info">
            <del class="c-product__mini-seller-price-prev js-rrp-price u-hidden">
                {{$product->price}}
            </del>
            <div class="c-product__seller-price-off js-discount-value u-hidden">
                ٪
            </div>
        </div>
        <div class="c-product__mini-seller-price-real">
            <div class="c-product__mini-seller-price-pure js-price-value">{{\App\Models\PersianNumber::translate($product->price)}}
            </div>
            <div class="c-product__mini-seller-price-pure js-ab-price-value u-hidden">
                ۴.۰۹۸
                میلیون
            </div>
            <span class="c-mini-buy-box__toman">تومان</span></div>
    </div>
    <div class="c-mini-buy-box__btn-row js-mini-buy-box"><a
            class="o-btn o-btn--contained-red-lg c-product__add-to-cart-btn js-add-to-cart js-btn-add-to-cart js-mini-add-to-cart js-ab-product-action"
            data-product-id="3048126" data-variant="9832233" href="/cart/add/9832233/1/"
            data-event="add_to_cart" data-event-category="ecommerce"
            data-event-label="price: 40980000 - seller: marketplace - seller_name: دیجی‌کالا - seller_rating: 0 - multiple_configs: True - position: 0">
            افزودن به سبد خرید
        </a>
        <div class="u-w-full js-ab-app-incredible-pdp-action u-hidden"><span
                class=" c-product-gallery__application-only-user-label">تنها برای کاربران اپلیکیشن دیجی‌کالا</span><a
                href="/landings/new-app/" target="_blank"
                class="btn-add-to-cart btn-add-to-cart--outline btn-add-to-cart--full-width btn-add-to-cart--cta-icon btn-add-to-cart--navigate-to-application  js-app-incredible"
                data-android="https://cafebazaar.ir/app/com.digikala/?l=fa"
                data-ios="https://sibapp.com/applications/digikala" data-id="3048126">
                مشاهده در اپلیکیشن دیجی‌کالا
            </a></div>
    </div>
</div>
