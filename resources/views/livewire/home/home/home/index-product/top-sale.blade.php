<section class="c-swiper c-swiper--products has-placeholder recommendation-swiper js-sntracker-carousel"
         id="recommendation-home_2">
    <div class="recommendation-swiper__mask js-swiper-mask-recommendation-home_2 u-hidden"><p>این پیشنهاد به شما
            نشان داده نخواهد شد با تشکر از باز‌خورد شما</p>
        <button class="js-cancel-swiper-mask" data-id="recommendation-home_2"><i></i>
            بازگرداندن
        </button>
    </div>
    @php
        $title_5 = \App\Models\TitleCategoryIndex::get()[5];
    @endphp
    <div class="o-headline"><span>{{$title_5->title}}</span></div>
    <div class="c-box">
        <div class="swiper-container swiper-container-horizontal swiper-container-rtl">
            <div class="swiper-wrapper js-products-container" id="js-products-container6" style="transform: translate3d(0px, 0px, 0px);">
                @foreach(\App\Models\CategoryIndex::where('title_id',$title_5->id)->where('status',1)->get() as $category)
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
            <div class="swiper-button-prev js-swiper-button-prev swiper-button-disabled6" id="swiper_button_disabled6"
                 onclick="js_swiper_button_prev6()"></div>
            <div class="swiper-button-next  js-swiper-button-next"  id="swiper_button_add6"
                 onclick="js_swiper_button_next6()"></div>
        </div>
    </div>
</section>
<script>
    function js_swiper_button_next6() {
        document.getElementById("js-products-container6").style ="transform: translate3d(530px, 0px, 0px);transition-duration: 0ms";
        document.getElementById("swiper_button_disabled6").classList.remove("swiper-button-disabled");
        document.getElementById("swiper_button_add6").style ="opacity: .15; cursor: auto;";

    }
    function js_swiper_button_prev6() {
        document.getElementById("js-products-container6").style ="transform: translate3d(0px, 0px, 0px)";
        document.getElementById("swiper_button_disabled6").classList.remove("swiper-button-disabled");
        document.getElementById("swiper_button_disabled6").style ="opacity: .15; cursor: auto;";
        document.getElementById("swiper_button_add6").style ="opacity: 1; cursor: poiner;";
    }
</script>
