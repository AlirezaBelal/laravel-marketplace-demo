@php
    $banner_15 = \App\Models\Banner::get()[15];
@endphp
<aside class="c-adplacement c-adplacement--main-page-inner c-adplacement__container-row">
    @if($banner_15)
        <a
            href="{{$banner_15->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="0" data-id="69120" target="_blank"
            data-is-trackable="" title="{{$banner_15->title}}" data-gtm-vis-first-on-screen-9070001_346="9010469"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_15->img}}"
                    alt="{{$banner_15->title}}" loading="lazy"></div>
        </a>
    @endif
</aside>


<div class="swiper-products-container" data-type="homepagelatest">

    <section class="c-swiper c-swiper--products js-sntracker-carousel " id="sn-carousels-2">
        <div class="o-headline">
            <div class="o-headline__title-box">
                <div class="o-headline__title-content"><h3>منتخب جدیدترین کالاها</h3></div>
            </div>
            <a href="/" class="c-swiper__show-more">مشاهده همه</a></div>
        <div class="c-box" id="sn-carousels-2">
            <div class="swiper-container swiper-container-horizontal js-swiper-products swiper-container-rtl">
                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                    @foreach(\App\Models\ProductNewSelected::where('status',1)->get() as $product)
                        <div class="swiper-slide js-sntracker-carousel-item swiper-slide-active"
                             data-carousel="sn-carousels-2" data-id="4851701" data-position="1"
                             style="width: 217.167px;" data-gtm-vis-first-on-screen-9070001_346="9010511"
                             data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
                            <div class="c-product-box">
                                <a
                                    class="c-product-box__img js-url js-carousel-ga-product-box"
                                    data-id="870282"
                                    href="{{$product->product->link}}"
                                    data-gtm-vis-recent-on-screen-9070001_346="2514"
                                    data-gtm-vis-first-on-screen-9070001_346="2514"
                                    data-gtm-vis-total-visible-time-9070001_346="100"
                                    data-gtm-vis-has-fired-9070001_346="1"><img
                                        data-img="/storage/{{$product->product->img}}"
                                        alt="{{$product->product->title}}"
                                        class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
                                        src="/storage/{{$product->product->img}}"><img
                                        class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                        src="/storage/{{$product->product->img}}"></a>
                                <div class="c-product-box__title"><a
                                        href="{{$product->product->link}}"
                                        data-id="870282" class="js-carousel-ga-product-box"
                                        data-gtm-vis-first-on-screen-9070001_346="2515"
                                        data-gtm-vis-total-visible-time-9070001_346="100"
                                        data-gtm-vis-has-fired-9070001_346="1">
                                        {{$product->product->title}}
                                    </a></div>
                                <div class="c-product-box__price-row">
                                    <div class="c-product-box__price-item">
                                        <div class="c-new-price">
                                            @if($product->product->discount_price == null)
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">
                                                        {{\App\Models\PersianNumber::translate($product->product->price)}}
                                                        <span
                                                            class="c-price__currency">تومان</span></div>
                                                </div>
                                            @else
                                                <div class="c-price__value c-price__value--plp">
                                                    <del>  {{\App\Models\PersianNumber::translate($product->product->price)}}</del>
                                                    @php
                                                        $difPrice = $product->product->price - $product->product->discount_price;
    $per = ($difPrice * 100) / $product->product->price;
                                                    @endphp
                                                    @if($per>1)
                                                        <div class="c-price__discount-oval">

                                                            <span>

                                                                {{\App\Models\PersianNumber::translate(number_format((float)($per),0))}}٪</span>

                                                        </div>
                                                    @endif
                                                    <div class="c-price__value-wrapper">
                                                        {{\App\Models\PersianNumber::translate($product->product->discount_price)}}
                                                        <span
                                                            class="c-price__currency">تومان</span></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
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
</div>
