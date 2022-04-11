<div class="o-page">
    @php
        $banner_7 = \App\Models\Banner::get()[7];
        $banner_8 = \App\Models\Banner::get()[8];
    @endphp
    <aside class="c-adplacement">
        @if($banner_7)
        <a
            href="{{$banner_7->link}}"
            class="js-banner-impression-adro c-adplacement__item c-adplacement__item--b" data-id="69470"
            data-observed="1" target="_blank" title="{{$banner_7->title}}" data-is-trackable=""
            data-gtm-vis-first-on-screen-9070001_346="4135341" data-gtm-vis-total-visible-time-9070001_346="100"
            data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_7->img}}"
                    alt="{{$banner_7->title}}" loading="lazy"></div>
        </a>
        @endif
            @if($banner_8)
            <a
            href="{{$banner_8->link}}"
            class="js-banner-impression-adro c-adplacement__item c-adplacement__item--b" data-id="69482"
            data-observed="1" target="_blank" title="{{$banner_8->title}}" data-is-trackable=""
            data-gtm-vis-first-on-screen-9070001_346="4135351" data-gtm-vis-total-visible-time-9070001_346="100"
            data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_8->img}}"
                    alt="{{$banner_8->title}}" loading="lazy"></div>
        </a>
            @endif
    </aside>
    <div class="o-page__row o-grid o-page__row--main-page js-recommendation-home_1-row">
        <div class="col-9">
            <section class="c-swiper c-swiper--products has-placeholder recommendation-swiper js-sntracker-carousel"
                     id="recommendation-home_1">
                <div class="recommendation-swiper__mask js-swiper-mask-recommendation-home_1 u-hidden"><p>این
                        پیشنهاد به شما نشان داده نخواهد شد با تشکر از باز‌خورد شما</p>
                    <button class="js-cancel-swiper-mask" data-id="recommendation-home_1"><i></i>
                        بازگرداندن
                    </button>
                </div>
                @php
                    $title_0 = \App\Models\TitleCategoryIndex::get()[0];
                @endphp
                <div class="o-headline"><span>{{$title_0->title}}</span></div>
                <div class="c-box">
                    <div class="swiper-container swiper-container-horizontal swiper-container-rtl">

                        <div class="swiper-wrapper js-products-container" id="js-products-container"
                             style="transform: translate3d(0px, 0px, 0px);">
                            @foreach(\App\Models\CategoryIndex::where('title_id',$title_0->id)->where('status',1)->get() as $category)
                                <div class="swiper-slide js-sntracker-carousel-item" data-id="870282"
                                     data-gtm-vis-recent-on-screen-9070001_346="2493"
                                     data-gtm-vis-first-on-screen-9070001_346="2493"
                                     data-gtm-vis-total-visible-time-9070001_346="100"
                                     data-gtm-vis-has-fired-9070001_346="1" style="width: 176.667px;">
                                    <div class="c-product-box"><a
                                            class="c-product-box__img js-url js-carousel-ga-product-box"
                                            data-id="870282"
                                            href="{{$category->product->link}}"
                                            data-gtm-vis-recent-on-screen-9070001_346="2514"
                                            data-gtm-vis-first-on-screen-9070001_346="2514"
                                            data-gtm-vis-total-visible-time-9070001_346="100"
                                            data-gtm-vis-has-fired-9070001_346="1"><img
                                                data-img="/storage/{{$category->product->img}}"
                                                alt="{{$category->product->title}}"
                                                class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
                                                src="/storage/{{$category->product->img}}"><img
                                                class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                                src="/storage/{{$category->product->img}}"></a>
                                        <div class="c-product-box__title"><a
                                                href="{{$category->product->link}}"
                                                data-id="870282" class="js-carousel-ga-product-box"
                                                data-gtm-vis-first-on-screen-9070001_346="2515"
                                                data-gtm-vis-total-visible-time-9070001_346="100"
                                                data-gtm-vis-has-fired-9070001_346="1">
                                                {{$category->product->title}}
                                            </a></div>
                                        <div class="c-product-box__price-row">
                                            <div class="c-product-box__price-item">
                                                <div class="c-new-price">
                                                    @if($category->product->discount_price == null)
                                                        <div class="c-price__value c-price__value--plp">
                                                            <div class="c-price__value-wrapper">
                                                                {{\App\Models\PersianNumber::translate($category->product->price)}}
                                                                <span
                                                                    class="c-price__currency">تومان</span></div>
                                                        </div>
                                                    @else
                                                        <div class="c-price__value c-price__value--plp">
                                                            <del>  {{\App\Models\PersianNumber::translate($category->product->price)}}</del>
                                                            @php
                                                                $difPrice = $category->product->price - $category->product->discount_price;
        $per = ($difPrice * 100) / $category->product->price;
                                                            @endphp
                                                            @if($per>1)
                                                                <div class="c-price__discount-oval">

                                                            <span>

                                                                {{\App\Models\PersianNumber::translate(number_format((float)($per),0))}}٪</span>

                                                                </div>
                                                            @endif
                                                            <div class="c-price__value-wrapper">
                                                                {{\App\Models\PersianNumber::translate($category->product->discount_price)}}
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
                        <div class="swiper-button-prev js-swiper-button-prev swiper-button-disabled" id="swiper_button_disabled"
                             onclick="js_swiper_button_prev()"></div>
                        <div class="swiper-button-next  js-swiper-button-next"  id="swiper_button_add"
                             onclick="js_swiper_button_next()"></div>

                    </div>
                </div>
            </section>
        </div>
        <div class="col-3">
            <aside class="c-box c-box--promo-single">
                <div class="c-promo-single js-promo-single" id="promo-single">
                    <div class="c-promo-single__headline js-promo-single-bar">پیشنهادهای لحظه‌ای برای شما</div>
                    <div class="swiper-container swiper-container-horizontal js-promo-single-box swiper-container-rtl">
                        <div class="swiper-wrapper js-promo-single-wrapper" style="transition-duration: 20ms; transform: translate3d(0px, 0px, 0px);">
                            <div class="swiper-slide js-sntracker-carousel-item swiper-slide-duplicate swiper-slide-active"
                                data-id="2073053" data-swiper-slide-index="8" style="width: 221px;"
                                data-gtm-vis-first-on-screen-9070001_346="4136052"
                                data-gtm-vis-total-visible-time-9070001_346="100"
                                data-gtm-vis-has-fired-9070001_346="1">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="2073053"
                                        href="/product/dkp-2073053/شارژر-همراه-شیائومی-مدل-redmi-ظرفیت-10000-میلی-آمپرساعت"
                                        data-gtm-vis-first-on-screen-9070001_346="4136053"
                                        data-gtm-vis-total-visible-time-9070001_346="100"
                                        data-gtm-vis-has-fired-9070001_346="1"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/113600779.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="شارژر همراه شیائومی مدل Redmi ظرفیت 1000..."
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/113600779.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-2073053/شارژر-همراه-شیائومی-مدل-redmi-ظرفیت-10000-میلی-آمپرساعت"
                                            data-id="2073053" class="js-carousel-ga-product-box"
                                            data-gtm-vis-first-on-screen-9070001_346="4136067"
                                            data-gtm-vis-total-visible-time-9070001_346="100"
                                            data-gtm-vis-has-fired-9070001_346="1">
                                            شارژر همراه شیائومی مدل Redmi ظرفیت 1000...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۲۶۴,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۲۶۴,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item swiper-slide-next swiper-slide-duplicate-prev"
                                data-id="1099874" data-swiper-slide-index="0" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="1099874"
                                        href="/product/dkp-1099874/پرینتر-چندکاره-جوهرافشان-کانن-مدل-pixma-g3411"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/5211047.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="پرینتر چندکاره جوهرافشان کانن مدل PIXMA ..."
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/5211047.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-1099874/پرینتر-چندکاره-جوهرافشان-کانن-مدل-pixma-g3411"
                                            data-id="1099874" class="js-carousel-ga-product-box">
                                            پرینتر چندکاره جوهرافشان کانن مدل PIXMA ...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۵,۰۹۰,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۵,۰۹۰,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="2959368" data-swiper-slide-index="1" style="width: 221px;"
                                 data-gtm-vis-first-on-screen-9070001_346="9008326"
                                 data-gtm-vis-total-visible-time-9070001_346="100"
                                 data-gtm-vis-has-fired-9070001_346="1">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="2959368"
                                        href="/product/dkp-2959368/شارژر-همراه-انرجایزر-مدل-ue20009-ظرفیت-20000-میلی-آمپر-ساعت"
                                        data-gtm-vis-first-on-screen-9070001_346="9008407"
                                        data-gtm-vis-total-visible-time-9070001_346="100"
                                        data-gtm-vis-has-fired-9070001_346="1"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/121795599.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt=" شارژر همراه انرجایزر مدل UE20009  ظرفیت..."
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/121795599.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-2959368/شارژر-همراه-انرجایزر-مدل-ue20009-ظرفیت-20000-میلی-آمپر-ساعت"
                                            data-id="2959368" class="js-carousel-ga-product-box"
                                            data-gtm-vis-first-on-screen-9070001_346="9008410"
                                            data-gtm-vis-total-visible-time-9070001_346="100"
                                            data-gtm-vis-has-fired-9070001_346="1">
                                            شارژر همراه انرجایزر مدل UE20009 ظرفیت...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value ">
                                                    <del>۴۲۰,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۱۲</span></div>
                                                <div class="c-new-price__value">
                                                    ۳۶۹,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="441652"
                                 data-swiper-slide-index="2" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="441652"
                                        href="/product/dkp-441652/شارژر-همراه-انرجایزر-مدل-ue18000-ظرفیت-18000-میلی-آمپرساعت"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/112348329.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="شارژر همراه انرجایزر مدل UE18000 ظرفیت 1..."
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/112348329.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-441652/شارژر-همراه-انرجایزر-مدل-ue18000-ظرفیت-18000-میلی-آمپرساعت"
                                            data-id="441652" class="js-carousel-ga-product-box">
                                            شارژر همراه انرجایزر مدل UE18000 ظرفیت 1...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۳۹۸,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۳۹۸,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="319868"
                                 data-swiper-slide-index="3" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="319868"
                                        href="/product/dkp-319868/شارژر-همراه-سیلیکون-پاور-مدل-s200-ظرفیت-20000-میلی-آمپر-ساعت"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/2554415.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="شارژر همراه سیلیکون پاور مدل S200 ظرفیت ..."
                                            class="swiper-lazy js-template-img" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/2554415.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-319868/شارژر-همراه-سیلیکون-پاور-مدل-s200-ظرفیت-20000-میلی-آمپر-ساعت"
                                            data-id="319868" class="js-carousel-ga-product-box">
                                            شارژر همراه سیلیکون پاور مدل S200 ظرفیت ...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۷۳۸,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۷۳۸,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="1905221"
                                 data-swiper-slide-index="4" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="1905221"
                                        href="/product/dkp-1905221/پرینتر-لیزری-کانن-مدل-i-sensys-lbp6030b"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/112705169.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="پرینتر لیزری کانن مدل i-Sensys LBP6030B"
                                            class="swiper-lazy js-template-img" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/112705169.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-1905221/پرینتر-لیزری-کانن-مدل-i-sensys-lbp6030b"
                                            data-id="1905221" class="js-carousel-ga-product-box">
                                            پرینتر لیزری کانن مدل i-Sensys LBP6030B
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۳,۹۶۰,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۳,۹۶۰,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="530113"
                                 data-swiper-slide-index="5" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="530113"
                                        href="/product/dkp-530113/کارت-حافظه-microsdhc-ویکو-من-مدل-extre600x-کلاس-10-استاندارد-uhs-i-u3-سرعت-90mbps-ظرفیت-32گیگابایت-همراه-با-آداپتور-sd"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/2525920.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="کارت حافظه microSDHC ویکو من مدل Extre60..."
                                            class="swiper-lazy js-template-img" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/2525920.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-530113/کارت-حافظه-microsdhc-ویکو-من-مدل-extre600x-کلاس-10-استاندارد-uhs-i-u3-سرعت-90mbps-ظرفیت-32گیگابایت-همراه-با-آداپتور-sd"
                                            data-id="530113" class="js-carousel-ga-product-box">
                                            کارت حافظه microSDHC ویکو من مدل Extre60...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value ">
                                                    <del>۱۲۹,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۷</span></div>
                                                <div class="c-new-price__value">
                                                    ۱۱۹,۵۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="58108"
                                 data-swiper-slide-index="6" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box" data-id="58108"
                                        href="/product/dkp-58108/شارژر-همراه-ای-دیتا-مدل-pt100-ظرفیت-10000-میلی-آمپر-ساعت"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/114316988.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="شارژر همراه ای دیتا مدل PT100 ظرفیت 1000..."
                                            class="swiper-lazy js-template-img" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/114316988.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-58108/شارژر-همراه-ای-دیتا-مدل-pt100-ظرفیت-10000-میلی-آمپر-ساعت"
                                            data-id="58108" class="js-carousel-ga-product-box">
                                            شارژر همراه ای دیتا مدل PT100 ظرفیت 1000...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۳۲۰,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۳۲۰,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item" data-id="1774519"
                                 data-swiper-slide-index="7" style="width: 221px;">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="1774519"
                                        href="/product/dkp-1774519/پرینتر-لیزری-اچ-پی-مدل-laserjet-pro-m15a"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/112004160.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="پرینتر لیزری اچ پی مدل LaserJet Pro M15a"
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/112004160.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-1774519/پرینتر-لیزری-اچ-پی-مدل-laserjet-pro-m15a"
                                            data-id="1774519" class="js-carousel-ga-product-box">
                                            پرینتر لیزری اچ پی مدل LaserJet Pro M15a
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۳,۰۲۰,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۳,۰۲۰,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item swiper-slide-duplicate-active"
                                 data-id="2073053" data-swiper-slide-index="8" style="width: 221px;"
                                 data-gtm-vis-first-on-screen-9070001_346="4141635"
                                 data-gtm-vis-total-visible-time-9070001_346="100"
                                 data-gtm-vis-has-fired-9070001_346="1">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="2073053"
                                        href="/product/dkp-2073053/شارژر-همراه-شیائومی-مدل-redmi-ظرفیت-10000-میلی-آمپرساعت"
                                        data-gtm-vis-first-on-screen-9070001_346="4141635"
                                        data-gtm-vis-total-visible-time-9070001_346="100"
                                        data-gtm-vis-has-fired-9070001_346="1"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/113600779.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="شارژر همراه شیائومی مدل Redmi ظرفیت 1000..."
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/113600779.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-2073053/شارژر-همراه-شیائومی-مدل-redmi-ظرفیت-10000-میلی-آمپرساعت"
                                            data-id="2073053" class="js-carousel-ga-product-box"
                                            data-gtm-vis-first-on-screen-9070001_346="4141636"
                                            data-gtm-vis-total-visible-time-9070001_346="100"
                                            data-gtm-vis-has-fired-9070001_346="1">
                                            شارژر همراه شیائومی مدل Redmi ظرفیت 1000...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۲۶۴,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۲۶۴,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide js-sntracker-carousel-item swiper-slide-duplicate swiper-slide-prev swiper-slide-duplicate-next"
                                data-id="1099874" data-swiper-slide-index="0" style="width: 221px;"
                                data-gtm-vis-first-on-screen-9070001_346="4141944"
                                data-gtm-vis-total-visible-time-9070001_346="100"
                                data-gtm-vis-has-fired-9070001_346="1">
                                <div class="c-product-box"><a
                                        class="c-product-box__img js-url js-carousel-ga-product-box"
                                        data-id="1099874"
                                        href="/product/dkp-1099874/پرینتر-چندکاره-جوهرافشان-کانن-مدل-pixma-g3411"
                                        data-gtm-vis-first-on-screen-9070001_346="4141945"
                                        data-gtm-vis-total-visible-time-9070001_346="100"
                                        data-gtm-vis-has-fired-9070001_346="1"><img
{{--                                            data-img="https://dkstatics-public.digikala.com/digikala-products/5211047.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"--}}
                                            alt="پرینتر چندکاره جوهرافشان کانن مدل PIXMA ..."
                                            class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
{{--                                            src="https://dkstatics-public.digikala.com/digikala-products/5211047.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"><img--}}
                                            class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                            src="https://www.digikala.com/static/files/31a78819.svg"></a>
                                    <div class="c-product-box__title"><a
                                            href="/product/dkp-1099874/پرینتر-چندکاره-جوهرافشان-کانن-مدل-pixma-g3411"
                                            data-id="1099874" class="js-carousel-ga-product-box"
                                            data-gtm-vis-first-on-screen-9070001_346="4141946"
                                            data-gtm-vis-total-visible-time-9070001_346="100"
                                            data-gtm-vis-has-fired-9070001_346="1">
                                            پرینتر چندکاره جوهرافشان کانن مدل PIXMA ...
                                        </a></div>
                                    <div class="c-product-box__price-row">
                                        <div class="c-product-box__price-item">
                                            <div class="c-new-price">
                                                <div class="c-new-price__old-value u-hidden">
                                                    <del>۵,۰۹۰,۰۰۰</del>
                                                    <span class="c-new-price__discount">٪۰</span></div>
                                                <div class="c-new-price__value">
                                                    ۵,۰۹۰,۰۰۰
                                                    <span class="c-new-price__currency">تومان</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<script>
function js_swiper_button_next() {
    document.getElementById("js-products-container").style ="transform: translate3d(530px, 0px, 0px);transition-duration: 0ms";
    document.getElementById("swiper_button_disabled").classList.remove("swiper-button-disabled");
    document.getElementById("swiper_button_add").style ="opacity: .15; cursor: auto;";

}
function js_swiper_button_prev() {
    document.getElementById("js-products-container").style ="transform: translate3d(0px, 0px, 0px)";
    document.getElementById("swiper_button_disabled").classList.remove("swiper-button-disabled");
    document.getElementById("swiper_button_disabled").style ="opacity: .15; cursor: auto;";
    document.getElementById("swiper_button_add").style ="opacity: 1; cursor: poiner;";
}
</script>
