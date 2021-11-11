<section class="c-swiper c-swiper--products js-sntracker-carousel "
         id="sn-carousels-best-price-products">
    <div class="o-headline"><span class="o-headline__title-box"><div
                class="o-headline__title-content"><h3>بهترین فرصت خرید</h3></div></span></div>
    <div class="c-box" id="sn-carousels-best-price-products">
        <div
            class="swiper-container swiper-container-horizontal js-swiper-products swiper-container-rtl">
            <div class="swiper-wrapper">
                <div class="swiper-slide js-sntracker-carousel-item swiper-slide-active"
                     data-carousel="sn-carousels-best-price-products" data-id="3352714"
                     data-position="1" style="width: 310px;">
                    <div class="c-product-box"><a data-id="3352714"
                                                  class="c-product-box__img js-url js-product-url js-carousel-ga-product-box"
                                                  href="/product/dkp-3352714/محافظ-کابل-و-هندزفری-مدل-cl"><img
                                alt="محافظ کابل و هندزفری مدل CL"
                                class="swiper-lazy swiper-lazy-loaded"
                                data-src="https://dkstatics-public.digikala.com/digikala-products/ded0c584935cbbd0ccfd67a231e2a0f7765663c7_1599403408.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"
                                src="https://dkstatics-public.digikala.com/digikala-products/ded0c584935cbbd0ccfd67a231e2a0f7765663c7_1599403408.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"
                                loading="lazy"></a>
                        <div class="c-product-box__title"><a data-id="3352714"
                                                             class="js-product-url js-carousel-ga-product-box"
                                                             href="/product/dkp-3352714/محافظ-کابل-و-هندزفری-مدل-cl">
                                محافظ کابل و هندزفری مدل CL
                            </a></div>
                        <div class="c-product-box__price-row">
                            <div class="c-product-box__price-item"><a data-id="3352714"
                                                                      class="js-product-url js-carousel-ga-product-box"
                                                                      href="/product/dkp-3352714/محافظ-کابل-و-هندزفری-مدل-cl">
                                    <div class="c-new-price">
                                        <div class="c-new-price__old-value"></div>
                                        <div class="c-new-price__value">
                                            ۵,۶۱۰
                                            <span class="c-new-price__currency">تومان</span></div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide js-sntracker-carousel-item swiper-slide-next"
                     data-carousel="sn-carousels-best-price-products" data-id="1167888"
                     data-position="2" style="width: 310px;">
                    <div class="c-product-box"><a data-id="1167888"
                                                  class="c-product-box__img js-url js-product-url js-carousel-ga-product-box"
                                                  href="/product/dkp-1167888/محافظ-کابل-مکا-مدل-mco1-طول-15-متر"><img
                                alt="محافظ کابل مدل MCO1 طول 1.5 متر"
                                class="swiper-lazy swiper-lazy-loaded"
                                data-src="https://dkstatics-public.digikala.com/digikala-products/5559191.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"
                                src="https://dkstatics-public.digikala.com/digikala-products/5559191.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"
                                loading="lazy"></a>
                        <div class="c-product-box__title"><a data-id="1167888"
                                                             class="js-product-url js-carousel-ga-product-box"
                                                             href="/product/dkp-1167888/محافظ-کابل-مکا-مدل-mco1-طول-15-متر">
                                محافظ کابل مدل MCO1 طول 1.5 متر
                            </a></div>
                        <div class="c-product-box__price-row">
                            <div class="c-product-box__price-item"><a data-id="1167888"
                                                                      class="js-product-url js-carousel-ga-product-box"
                                                                      href="/product/dkp-1167888/محافظ-کابل-مکا-مدل-mco1-طول-15-متر">
                                    <div class="c-new-price">
                                        <div class="c-new-price__old-value"></div>
                                        <div class="c-new-price__value">
                                            ۹,۳۷۰
                                            <span class="c-new-price__currency">تومان</span></div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
                @foreach($product_random as $product)
                    <div class="swiper-slide js-sntracker-carousel-item"
                         data-carousel="sn-carousels-best-price-products" data-id="1587799"
                         data-position="3" style="width: 310px;">
                        <div class="c-product-box"><a data-id="1587799"
                                                      class="c-product-box__img js-url js-product-url js-carousel-ga-product-box"
                                                      href="{{$product->link}}"><img
                                    alt="{{$product->title}}"
                                    class="swiper-lazy swiper-lazy-loaded"
                                    data-src="/storage/{{$product->img}}"
                                    src="/storage/{{$product->img}}"
                                    loading="lazy"></a>
                            <div class="c-product-box__title">
                                <a data-id="1587799" class="js-product-url js-carousel-ga-product-box"
                             href="{{$product->link}}">
                                    {{$product->title}}
                                </a></div>
                            <div class="c-product-box__price-row">
                                <div class="c-product-box__price-item">
                                    <a data-id="1587799" class="js-product-url js-carousel-ga-product-box"
                                       href="{{$product->link}}">
                                        <div class="c-new-price">
                                            <div class="c-new-price__old-value">
                                                <del>{{\App\Models\PersianNumber::translate($product->price)}}</del>
                                                @php
                                                    $difPrice = $product->price - $product->discount_price;
                                                $per = ($difPrice * 100) / $product->price;
                                                @endphp
                                                @if($per>1)

                                                            <span class="c-new-price__discount">

                                                                {{\App\Models\PersianNumber::translate(number_format((float)($per),0))}}٪</span>

                                                @endif
                                                </div>
                                            <div class="c-new-price__value">

                                                {{\App\Models\PersianNumber::translate($product->discount_price)}}
                                                <span class="c-new-price__currency">تومان</span></div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev js-swiper-button-prev swiper-button-disabled"></div>
            <div class="swiper-button-next js-swiper-button-next"></div>
        </div>
    </div>
</section>
