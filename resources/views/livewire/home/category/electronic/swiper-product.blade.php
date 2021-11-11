@foreach($title_count as $title)
    <section class="c-swiper c-swiper--products js-sntracker-carousel " id="">
        <div class="o-headline">
            <div class="o-headline__title-box">
                <div class="o-headline__title-content"><h3>{{$title->title}}
                    </h3></div>
            </div>
            <a href="{{$title->link}}"
               class="c-swiper__show-more">مشاهده همه</a></div>
        <div class="c-box">
            <div
                class="swiper-container swiper-container-horizontal js-swiper-products swiper-container-rtl">
                <div class="swiper-wrapper"
                     style="transform: translate3d(0px, 0px, 0px);">
                    @foreach(DB::connection('mysql-electronic')->table('category_electronic_product_swiper')->
                        where('title_id',$title->id)-> where('status',1)->get() as $cat)
                        <div class="swiper-slide js-sntracker-carousel-item" data-id="870282"
                             data-gtm-vis-recent-on-screen-9070001_346="2493"
                             data-gtm-vis-first-on-screen-9070001_346="2493"
                             data-gtm-vis-total-visible-time-9070001_346="100"
                             data-gtm-vis-has-fired-9070001_346="1" style="width: 176.667px;">
                            <div class="c-product-box"><a
                                    class="c-product-box__img js-url js-carousel-ga-product-box"
                                    data-id="870282"
                                    @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)

                                    href="{{$product->link}}"
                                    @endforeach

                                    data-gtm-vis-recent-on-screen-9070001_346="2514"
                                    data-gtm-vis-first-on-screen-9070001_346="2514"
                                    data-gtm-vis-total-visible-time-9070001_346="100"
                                    data-gtm-vis-has-fired-9070001_346="1"><img
                                        @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)
                                        data-img="/storage/{{$product->img}}"
                                        alt="{{$product->title}}"
                                        @endforeach

                                        class="swiper-lazy js-template-img swiper-lazy-loaded" loading="lazy"
                                        @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)
                                        src="/storage/{{$product->img}}         ">
                                        @endforeach

                                    <img
                                        class="c-product-box__fmcg-symbol u-hidden" loading="lazy"
                                        @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)
                                        src="/storage/{{$product->img}}         ">
                                    @endforeach
                                </a>
                                <div class="c-product-box__title"><a
                                        @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)
                                        href="{{$product->link}}"
                                        @endforeach
                                        data-id="870282" class="js-carousel-ga-product-box"
                                        data-gtm-vis-first-on-screen-9070001_346="2515"
                                        data-gtm-vis-total-visible-time-9070001_346="100"
                                        data-gtm-vis-has-fired-9070001_346="1">
                                        @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)
                                            {{$product->title}}
                                        @endforeach

                                    </a></div>
                                <div class="c-product-box__price-row">
                                    <div class="c-product-box__price-item">
                                        <div class="c-new-price">
                                            @foreach (\App\Models\Product::where('id',$cat->product_id)->get() as $product)

                                            @if($product->discount_price == null)
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">
                                                        {{\App\Models\PersianNumber::translate($product->price)}}
                                                        <span
                                                            class="c-price__currency">تومان</span></div>
                                                </div>
                                            @else
                                                <div class="c-price__value c-price__value--plp">
                                                    <del>  {{\App\Models\PersianNumber::translate($product->price)}}</del>
                                                    @php
                                                        $difPrice = $product->price - $product->discount_price;
    $per = ($difPrice * 100) / $product->price;
                                                    @endphp
                                                    @if($per>1)
                                                        <div class="c-price__discount-oval">

                                                            <span>

                                                                {{\App\Models\PersianNumber::translate(number_format((float)($per),0))}}٪</span>

                                                        </div>
                                                    @endif
                                                    <div class="c-price__value-wrapper">
                                                        {{\App\Models\PersianNumber::translate($product->discount_price)}}
                                                        <span
                                                            class="c-price__currency">تومان</span></div>
                                                </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div
                    class="swiper-button-prev js-swiper-button-prev swiper-button-disabled"></div>
                <div class="swiper-button-next js-swiper-button-next"></div>
            </div>
        </div>
    </section>
@endforeach

