@foreach($carts as $cart)
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
                @if ($cart->product_price_discount_old != null || $cart->price_old != null)
                    @if ($cart->read_cart == 0)
                @if ($cart->product_price_discount_old > $cart->product_price_discount )
                        <div class="c-cart-notification c-cart-notification--success c-cart-notification--arrow-down">
                            قیمت این کالا
                            {{\App\Models\PersianNumber::translate(number_format($cart->product_price_discount_old - $cart->product_price_discount))}}
                            تومان کاهش یافته است.
                        </div>
                    @else
                        <div class="c-cart-notification c-cart-notification--warning c-cart-notification--arrow-up">
                            قیمت این کالا
                            {{\App\Models\PersianNumber::translate(number_format($cart->product_price_discount - $cart->product_price_discount_old))}}
                            تومان افزایش یافته است.
                        </div>
                @endif
                @endif
                @endif

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
                <div class="c-cart-item__product-data
                c-cart-item__product-data--lead-time">
                    @if($cart->productSeller->anbar ==1)
                        موجود در انبار فروشنده
                    @else
                        موجود در انبار دیجی‌کالا
                    @endif
                    @if ($cart->productSeller->time == 0)
                        <span class="c-cart-item__product-sender-row"><span class="c-cart-item__product-sender-item
                                 c-cart-item__product-sender-item--digikala-no-leadtime">
                        ارسال دیجی‌کالا
                    </span></span>
                    @else
                        <span class="c-cart-item__product-sender-row">
                        <span class="c-cart-item__product-sender-item
                                 c-cart-item__product-sender-item--digikala-leadtime">
                        ارسال دیجی‌کالا از
                            {{\App\Models\PersianNumber::translate($cart->productSeller->time)}}
                            روز کاری دیگر
                    </span>
                    </span>
                    @endif


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
                        <div class="c-quantity-selector ">
                            <button type="button"
                                    class="c-quantity-selector__add js-quantity-selector-add "
                                    wire:click="addToCount({{$cart->id}})"></button>
                            <div class="c-quantity-selector__number js-quantity-selector-count"
                                 data-max="20" data-id="11255438">
                                {{\App\Models\PersianNumber::translate($cart->count)}}
                            </div>
                            @if ($cart->count >1)
                                <button type="button"
                                        wire:click="minToCount({{$cart->id}})"
                                        class="c-quantity-selector__remove
                                     js-quantity-selector-remove"></button>
                            @else
                                <button type="button"
                                        wire:click="minToCount({{$cart->id}})"
                                        class="c-quantity-selector__remove
                                    c-quantity-selector__add--disabled js-quantity-selector-remove"></button>
                            @endif

                        </div>
                        <a class="c-cart-item__delete js-remove-from-cart"
                           wire:click="deleteCartProduct({{$cart->id}})"
                           data-id="1479697580" data-product="2980504">
                            حذف
                        </a>
                        <a wire:click="addToCartOtherFromCart({{$cart->id}})"
                           class="c-cart-item__save-for-later js-add-to-sfl">
                            ذخیره در لیست خرید بعدی
                        </a>
                    </div>
                    <div class="c-cart-item__product-price">
                        {{\App\Models\PersianNumber::translate(number_format($cart->product_price_discount))}}
                        <span>تومان</span></div>
                </div>
                @php
                    $productSeller = \App\Models\ProductSeller::where('id', $cart->product_seller_id)->first();
                @endphp
                  @if ($productSeller->product_count < 10)
                    <div class="c-cart-item__price-row">
                        <div>
                            <div class="c-cart-item__stock-info js-product-warehouse-stock"><span>
                            {{\App\Models\PersianNumber::translate($productSeller->product_count)}}
                             عدد در انبار باقیست - پیش از اتمام بخرید
                        </span></div>
                        </div>
                        <div></div>
                    </div>
                @endif

                @if ($priceDate_min_price_first->discount_price ==$cart->product_price_discount )
                    @if ($mo > 0)
                        <div class="c-cart-item__price-row">
                            <div></div>
                            <div>
                                <div class="c-cart-item__best-price">
                                    بهترین قیمت ۳۰ روز گذشته
                                </div>
                            </div>
                        </div>
                    @endif
                @endif


            </div>
        </div>
    </li>
@endforeach
