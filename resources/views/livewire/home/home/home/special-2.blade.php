<div class="c-swiper-specials c-swiper-specials--fresh">
    <section class="container container--home" id="sn-carousels-fresh-incredible-offer"><a
            href="/" class="c-swiper-specials__title c-swiper-specials__title--fresh"
            title="شگفت‌انگیز سوپرمارکتی"><img src="{{asset('img/offer-supermarket.png')}}" alt="شگفت‌انگیز سوپرمارکتی">
            <div class="o-btn c-swiper-specials__btn">مشاهده همه</div>
        </a>
        <div class="c-swiper c-swiper--products c-swiper--specials">
            <div class="c-box">
                <div class="swiper-container swiper-container-horizontal js-swiper-specials">
                    <div class="swiper-wrapper">
                        @foreach(\App\Models\SpecialProduct::where('supermarket',1)->where('status',1)->get() as $specialProduct)
                            <div class="swiper-slide" data-carousel="sn-carousels-incredible-offer"
                                 data-id="{{$specialProduct->id}}">
                                <li>

                                    <a href="/product/dkp-{{$specialProduct->product->id}}/{{$specialProduct->product->link}}"
                                       data-id="1429756"
                                       class="c-product-box__box-link js-product-url js-carousel-ga-product-box"></a>
                                    <div
                                        class="js-product-cart c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro c-product-box--plus-badge "
                                        title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product"
                                             title="{{$specialProduct->product->title}}">
                                            <img alt="وازلین کامان مدل 01 حجم 300 میلی لیتر"
                                                 src="/storage/{{$specialProduct->product->img}}"
                                                 class="swiper-lazy swiper-lazy-loaded" loading="lazy"/>
                                            <img class="c-product-box__fmcg-symbol" loading="lazy"
                                                 src="/storage/{{$specialProduct->product->img}}"/></div>
                                        <div class="c-product-box__title">
                                            {{$specialProduct->product->title}}
                                        </div>
                                        {{--                                        <div--}}
                                        {{--                                            class="c-product-box__digiplus c-product-box__digiplus--full "><span--}}
                                        {{--                                                class="c-product-box__digiplus-data c-digiplus-sign--before">--}}
                                        {{--                    ۲,۳۰۰ تومان هدیه نقدی--}}
                                        {{--                </span>--}}
                                        {{--                                        </div>--}}
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                @if($specialProduct->product->discount_price == null)
                                                    <div class="c-price__value c-price__value--plp">
                                                        <div class="c-price__value-wrapper">
                                                            {{\App\Models\PersianNumber::translate($specialProduct->product->price)}}
                                                            <span
                                                                class="c-price__currency">تومان</span></div>
                                                    </div>
                                                @else
                                                    <div class="c-price__value c-price__value--plp">
                                                        <del>  {{\App\Models\PersianNumber::translate($specialProduct->product->price)}}</del>
                                                        @php
                                                            $difPrice = $specialProduct->product->price - $specialProduct->product->discount_price;
    $per = ($difPrice * 100) / $specialProduct->product->price;
                                                        @endphp
                                                        @if($per>1)
                                                            <div class="c-price__discount-oval">

                                                            <span>

                                                                {{\App\Models\PersianNumber::translate(number_format((float)($per),0))}}٪</span>

                                                            </div>
                                                        @endif
                                                        <div class="c-price__value-wrapper">
                                                            {{\App\Models\PersianNumber::translate($specialProduct->product->discount_price)}}
                                                            <span
                                                                class="c-price__currency">تومان</span></div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="c-product-box__add-to-cart-section">
                                                <div class="c-product__add-container js-fresh-add-container"><a
                                                        class=" btn-add-to-cart-mini js-fresh-add-to-cart"
                                                        data-cart-item="" data-variant="6668292"></a>
                                                    <div class="js-fresh-select-counter u-hidden">
                                                        <div class="js-quick-carousel-add-to-cart"
                                                             data-variant="6668292"
                                                             data-cart-item=""
                                                             data-mode="add"
                                                             data-enhanced-ecommerce='null'
                                                        ><select
                                                                class="c-ui-select js-ui-select js-order-amount"
                                                                name="order[amount]">
                                                                <option value="0" class="c-product__add-cancel">
                                                                    حذف
                                                                </option>
                                                                <option value="1">۱ عدد</option>
                                                                <option value="2">۲ عدد</option>
                                                                <option value="3">۳ عدد</option>
                                                                <option value="4">۴ عدد</option>
                                                                <option value="5">۵ عدد</option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="c-product-box__progress-bar">
                                            <div class="c-product-box__progress-bar-value" style="width: 44%"></div>
                                        </div>
                                        <div class="c-product-box__amazing">
                                            <div class="c-product-box__timer   js-counter"
                                                 data-countdown="2021-05-06 00:00:00">۰۷:۱۳:۵۵

                                            </div>


                                            <div class="c-product-box__remained"><span
                                                    class="c-product-box__remained-value">۴۴٪
                                            </span>
                                                <span class="c-product-box__remained-phrase">فروش رفته</span></div>
                                        </div>

                                    </div>
                                </li>
                            </div>
                        @endforeach

                        <div class="swiper-slide c-swiper__show-more-cart--auto-height"><a
                                href="/"
                                class="c-swiper__show-more-cart"><span></span>
                                <p>
                                    مشاهده همه
                                </p></a></div>
                    </div>
                    <div class="swiper-button-prev js-swiper-button-prev"></div>
                    <div class="swiper-button-next js-swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
</div>
