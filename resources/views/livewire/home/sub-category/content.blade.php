<div class="o-page__content">
    <div class="js-sticky-2">
        <article class="js-products js-sticky-inner-2 c-listing-wrapper
                            c-listing-wrapper--white-breadcrumb" style="position: relative;">
            <nav class="js-breadcrumb ">
                <ul vocab="https://schema.org/" typeof="BreadcrumbList" class="c-breadcrumb">
                    <li property="itemListElement" typeof="ListItem"><a property="item"
                                                                        typeof="WebPage"
                                                                        href="https://www.digikala.com"><span
                                property="name">فروشگاه اینترنتی دیجی‌کالا</span></a>
                        <meta property="position" content="1">
                    </li>
                    <li property="itemListElement" typeof="ListItem">
                        <a property="item"
                           typeof="WebPage"
                           href="{{$first_category->link}}"><span
                                property="name">{{$first_category->title}}</span></a>
                        <meta property="position" content="2">
                    </li>
                    <li><span property="name">{{$category->title}}</span></li>
                </ul>
            </nav>
            <div class="c-listing js-listing">
                @include('livewire.home.sub-category.product.header')
                <ul class="c-listing__items js-plp-products-list">

                    @foreach($products as $product)
                        <li>
                            <div class="c-product-box c-promotion-box js-product-box
    has-more

     is-plp" data-observed="0" data-index="{{$first_category->id}}" data-id="{{$product->id}}"
                                 data-price="{{$product->price}}"
                                 data-title-fa="{{$product->title}}"
                                 data-title-en=""

                                 data-enhanced-ecommerce="{&quot;id&quot;:3141369,&quot;name&quot;:&quot;{{$product->title}}&quot;,&quot;category&quot;:&quot;{{$product->childcategory_id}}&quot;,&quot;brand&quot;:&quot;متفرقه&quot;,&quot;variant&quot;:16623120,&quot;price&quot;:{{$product->price}},&quot;quantity&quot;:0}"
                                 data-gtm-vis-first-on-screen-9070001_346="3778994"
                                 data-gtm-vis-total-visible-time-9070001_346="100"
                                 data-gtm-vis-has-fired-9070001_346="1">
                                <div data-csrf-token="" data-id="3141369"
                                     class="c-product-box__add-to-wish-list js-ab-add-to-wish-list u-hidden"></div>
                                <a class="c-product__seller-details--item-grid-link js-ab-plp-product-seller-link"
                                   href="https://www.digikala.com/seller/A35CU/"></a>
                                <div
                                    class="c-product__seller-details c-product__seller-details--item-grid"><span
                                        class="c-product__main-seller js-seller-text"><span
                                            class="c-product__seller-details-label">فروشنده: </span>
                        بازرگانی مهرسام
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                                <a class="c-product-box__img c-promotion-box__image js-url js-product-item js-product-url"
                                   target="_blank" data-adro-ad-click-id="3141369"
                                   data-snt-event="dkProductClicked"
                                   data-snt-params="{&quot;productId&quot;:3141369,&quot;position&quot;:6,&quot;product_url&quot;:&quot;/product/dkp-{{$product->id}}/{{$product->link}}&quot;}"
                                   href="/product/dkp-{{$product->id}}/{{$product->link}}">
                                    <div style=""
                                         class="c-promotion__badge c-promotion__badge--special-sale ">
                                        فروش ویژه
                                    </div>
                                    <div class="c-promotion__main-img-badges-container"></div>
                                    <img
                                        src="/storage/{{$product->img}}"
                                        alt="{{$product->title}}"></a>
                                <div class="c-product-box__content">
                                    <div class="c-product-box__content--row">
                                        <div class="c-product-box__title"><a class="js-product-url"
                                                                             href="/product/dkp-{{$product->id}}/{{$product->link}}"
                                                                             data-adro-ad-click-id="{{$product->id}}"
                                                                             target="_blank">
                                                {{$product->title}}</a>
                                        </div>
                                        <div class="c-product-box__title-en"></div>
                                        <ul class="c-product-box__variants" data-title="رنگ ها:"
                                            @if (\App\Models\Color::where('id',$product->color_id)->count() >3)
                                            data-more="+"
                                            @endif
                                        >
                                            @foreach(\App\Models\Color::where('id',$product->color_id)->get() as $color)
                                                <li class="js-variant"><span
                                                        class="c-variant c-variant--color"
                                                        style="background-color: {{$color->value}};border: 1px solid rgb(233, 233, 233);"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="c-product-box__rate-status">
                                        <div class="c-product-box__engagement-rating">
                                            ۴.۲
                                            <span class="c-product-box__engagement-rating-num">
                                (۷۵)
                            </span></div>
                                        <div
                                            class="c-product-box__status c-product-box__status--jet">
                                            امکان ارسال فوری
                                        </div>
                                    </div>
                                    <div class="c-product-box__row c-product-box__row--price">
                                        <div class="c-price">
                                            <div class="c-price__value c-price__value--plp ">
                                                <del>{{\App\Models\PersianNumber::translate($product->price)}}</del>
                                            @php
                                                $difPrice = $product->price - $product->discount_price;
                                                $per = ($difPrice * 100) / $product->price;
                                            @endphp
                                            @if($per>1)
                                                    <div class="c-price__discount-oval"><span>

                                                          {{\App\Models\PersianNumber::translate(number_format((float)($per),0))}}٪
                                                        </span>
                                                    </div>

                                            @endif
                                                <div class="c-price__value-wrapper">
                                                    {{\App\Models\PersianNumber::translate($product->discount_price)}}
                                                    <span class="c-price__currency">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c-product-box__tags ">
                                        <div class="c-product-box__tags-container"></div>
                                        <ul class="c-product__seller-details c-product__seller-details--item">
                                            <li class="c-product__main-seller js-seller-text">
                                                بازرگانی مهرسام
                                            </li>
                                            <li class="c-product__main-guarantee">
                                                گارانتی اصالت و سلامت فیزیکی کالا
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <div class="u-hidden">
                    <div
                        class="c-filter-touchpoint js-touchpoint-seller_condition js-touchpoint-filters js-ab-desktop-touchpoint u-hidden">
                        <label>فروشنده</label>
                        <div
                            class="c-filter-touchpoint__items-holder js-touchpoint-swiper-container swiper-container-horizontal swiper-container-rtl">
                            <ul class="swiper-wrapper" style="transition-duration: 0ms;">
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="seller_condition-param-digikala">
                                    دیجی‌کالا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="seller_condition-param-official">
                                    فروشنده رسمی برند
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="seller_condition-param-trusted">
                                    فروشنده برگزیده
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="seller_condition-param-roosta">
                                    کسب و کارهای بومی
                                </li>
                            </ul>
                        </div>
                        <button class="js-touchpoint-swiper-next"></button>
                    </div>
                    <div
                        class="c-filter-touchpoint js-touchpoint-brand js-touchpoint-filters js-ab-desktop-touchpoint u-hidden">
                        <label>برند</label>
                        <div
                            class="c-filter-touchpoint__items-holder js-touchpoint-swiper-container swiper-container-horizontal swiper-container-rtl">
                            <ul class="swiper-wrapper" style="transition-duration: 0ms;">
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5288">
                                    ماهوت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-56">
                                    تسکو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1662">
                                    شیائومی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-61">
                                    ای دیتا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-63">
                                    سن دیسک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-48">
                                    وسترن دیجیتال
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-213">
                                    باسئوس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1651">
                                    نیلکین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-83">
                                    سیلیکون پاور
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18">
                                    سامسونگ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1742">
                                    انکر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4989">
                                    کی اچ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5625">
                                    جوی روم
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-170">
                                    کملیون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10">
                                    اپل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-91">
                                    ریزر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1716">
                                    ریمکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3927">
                                    پارت الکتریک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-37">
                                    ای فورتک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16">
                                    پاناسونیک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7441">
                                    ایکس-انرژی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-202">
                                    ایکس پی-پروداکت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1">
                                    سونی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9">
                                    توشیبا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6">
                                    اچ‌پی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5473">
                                    وریتی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-38">
                                    لاجیتک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-146">
                                    ویفنگ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4180">
                                    ویکومن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1070">
                                    سادیتا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1250">
                                    اسپیگن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1151">
                                    رپو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4">
                                    ایسوس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2188">
                                    یانتنگ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3773">
                                    هادرون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5927">
                                    ایکس او
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2843">
                                    بیاند
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5302">
                                    سومگ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5738">
                                    ارلدام
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-704">
                                    انرجایزر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-28">
                                    سیگیت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-82">
                                    هوآوی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-41">
                                    گرین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7317">
                                    مکا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2898">
                                    یوسمز
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-136">
                                    دیپ کول
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4783">
                                    هانی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-8923">
                                    کینگ استار
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2120">
                                    اوریکو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7378">
                                    گروه صنعتی سارا ترانس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-51">
                                    مایکروسافت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2634">
                                    الدینیو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4153">
                                    یونیورسال
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5620">
                                    کارینو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4754">
                                    مولتی نانو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-128">
                                    اپیسر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5534">
                                    یسیدو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12">
                                    کانن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-172">
                                    دوراسل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1044">
                                    توتو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4225">
                                    راو پاور
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7886">
                                    جی.تی.آر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5086">
                                    وروان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1339">
                                    روموس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-68">
                                    فیلیپس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-187">
                                    فوروارد
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6288">
                                    وی آر باکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-100">
                                    جنیوس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-22">
                                    ال جی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1811">
                                    کولر مستر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6028">
                                    پی نت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2687">
                                    لوکین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6342">
                                    مک دودو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2361">
                                    هویت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1051">
                                    راک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3182">
                                    تیراژه
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-242">
                                    هوکو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1244">
                                    هترون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6387">
                                    جی بگ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4259">
                                    فردان الکتریک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1067">
                                    اس تی ام
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4575">
                                    پلوز
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2926">
                                    دی-نت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3663">
                                    داتیس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-8928">
                                    شاینکن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6052">
                                    یونیک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5355">
                                    آکو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-721">
                                    ایکس-دوریا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-94">
                                    لنوو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3574">
                                    المنت کیس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1755">
                                    لسی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1080">
                                    پیر کاردین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3801">
                                    اسکای
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-185">
                                    موشی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9559">
                                    مهرتاش
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3228">
                                    سایوتیم
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6307">
                                    آی دوژی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1012">
                                    یونیوو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-17">
                                    کداک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5678">
                                    پرایم
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6855">
                                    راک اسپیس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7828">
                                    ویوو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5834">
                                    ونوس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6370">
                                    خیام الکتریک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5380">
                                    امگا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1539">
                                    دایو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1915">
                                    جی سی پال
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-47">
                                    ترنسند
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2575">
                                    سومو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1027">
                                    لایت آن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-186">
                                    آبکاس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4642">
                                    مومکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2521">
                                    یوگرین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5299">
                                    کوتتسی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5901">
                                    ایکس-لول
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-95">
                                    ام اس آی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-135">
                                    بلکین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4911">
                                    وگر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-15">
                                    فوجی فیلم
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-243">
                                    مای گیگا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6113">
                                    کانفلون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-33">
                                    کینگستون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1154">
                                    مکسل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4657">
                                    اچ دی دی کدی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6333">
                                    آترون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7062">
                                    وی مکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6544">
                                    جی پی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1647">
                                    دی جی آی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7746">
                                    سگال
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4831">
                                    میرا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5084">
                                    کی نت پلاس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-240">
                                    لکسار
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2690">
                                    آکی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4550">
                                    استارست
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7425">
                                    لاین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-139">
                                    یونومات
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1153">
                                    دیتالایف
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4917">
                                    نگزنس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6012">
                                    ای نت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4715">
                                    رویال
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5861">
                                    پلی فکتوری
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1427">
                                    سواروسکی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-20">
                                    نوکیا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5740">
                                    جووی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13">
                                    نیکون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4210">
                                    گلکسبیت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1223">
                                    دلسی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5929">
                                    دبلیو یو دبلیو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7022">
                                    تی وی آرم
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1977">
                                    کیس-میت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2452">
                                    انرجیا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6550">
                                    گیگاسل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-705">
                                    مایپو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-44">
                                    کورسیر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1075">
                                    کاترپیلار
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6648">
                                    انی کست
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4585">
                                    اوی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1181">
                                    مکسیدر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5201">
                                    لالی الکترونیک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3238">
                                    وستینگهاوس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-25">
                                    جی وی سی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3851">
                                    فاران
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5461">
                                    آیپیرل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6136">
                                    آریا اچ پی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6319">
                                    آفر الکترونیک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2386">
                                    ایکیا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-36">
                                    فراسو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-4168">
                                    پرنیک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-59">
                                    ایکس ویژن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5765">
                                    چرم ما
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2">
                                    دل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-42">
                                    پایونیر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2753">
                                    روندا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5294">
                                    شیوا امواج
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5769">
                                    موفی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3">
                                    ایسر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-3452">
                                    آی واک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1128">
                                    ریوا کیس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-126">
                                    پی ان وای
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1612">
                                    گوگل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5235">
                                    نسیم
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6563">
                                    دیاموند
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1741">
                                    جی-کیس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-6267">
                                    لگرند
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-5466">
                                    تکسام
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-2886">
                                    سی جی موبایل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-72">
                                    تی پی-لینک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7251">
                                    زد ام آی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-7535">
                                    تاپیکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-719">
                                    متفرقه
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-19249">
                                    چرم جانتا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11006">
                                    ترانیو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18195">
                                    عصر بوژان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-23635">
                                    لیتو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11956">
                                    کوئین تک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13416">
                                    جی کی کی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11015">
                                    سامورایی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13566">
                                    گودزیلا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16198">
                                    ردراگون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10469">
                                    هورس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-19172">
                                    رینیکا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12095">
                                    تراستکتور
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18292">
                                    ژینوس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16102">
                                    موناکو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11811">
                                    یونیمات
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16783">
                                    آرمور
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-15383">
                                    آیرون من
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10463">
                                    لایونکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13288">
                                    ماسا دیزاین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11794">
                                    کینگ کونگ
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12117">
                                    کیس‌می
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-8562">
                                    کانواس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-19429">
                                    پی‌کی سل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9546">
                                    نمودار کنترل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-1642">
                                    بوف
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-21615">
                                    ایکس اکسلنت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18476">
                                    توییجین وموییجین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-17495">
                                    بادیگارد
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16051">
                                    فیرو پلاس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14336">
                                    رزلیانس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-22929">
                                    لولو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14210">
                                    وایت ولف
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18499">
                                    ایبیزا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9634">
                                    دکتر مموری
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9585">
                                    نست
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12409">
                                    دکین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10999">
                                    پرووان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14672">
                                    ولگا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12171">
                                    کاکو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11063">
                                    جی ماری
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13999">
                                    دیتا پلاس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12355">
                                    ژیپین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-23355">
                                    ایتوک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9054">
                                    کلومن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-19523">
                                    ری گان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14182">
                                    پاورولوجی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11301">
                                    کی-دوو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-17163">
                                    میلاد شاهکار
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-17696">
                                    لیکگاس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18122">
                                    دبو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10978">
                                    کوکوک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-17678">
                                    ای اِس آر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18387">
                                    ریلمی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11009">
                                    آها استایل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9696">
                                    آرسون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-22783">
                                    موبالینو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10921">
                                    سیماران
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12934">
                                    ماموت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-21763">
                                    مگافون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13157">
                                    گلادیاتور
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9919">
                                    گودکس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14415">
                                    زومی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-20593">
                                    کیوکسیا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18887">
                                    میشن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10452">
                                    آیپکی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12105">
                                    سمگپرس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18173">
                                    مورفی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-20675">
                                    مگپول
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-21442">
                                    گرین لاین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11961">
                                    وفس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10052">
                                    پاناتک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13765">
                                    مرکز بازی توفان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9208">
                                    اسپایدر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-8341">
                                    ایپیک گیر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12854">
                                    میتوبل
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11067">
                                    پرودو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9136">
                                    آی فیس
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16031">
                                    مهرپرتو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18115">
                                    راین
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-23604">
                                    گلدن نوت بوک جی ان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9948">
                                    ام تی چهار
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-23103">
                                    نیکلا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-10221">
                                    ایدابلو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11485">
                                    جی جی سی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14568">
                                    شبستان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-22127">
                                    زیفن
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-22416">
                                    گلس کام
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14800">
                                    بلادی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-23321">
                                    اکو پروتکت
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-16814">
                                    میکروپاور
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9656">
                                    پادرینو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12605">
                                    دودا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-9270">
                                    فروزش
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-19842">
                                    ام پی بلبری
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-20109">
                                    فنتک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-11395">
                                    تنسر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-22180">
                                    تی‌ولف
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-18609">
                                    کیس فایر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14892">
                                    رونکاتو
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-8886">
                                    کول کلد
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14960">
                                    کاردان
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-13798">
                                    اسکپتر
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-19409">
                                    ویرا سام
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14699">
                                    آکوا
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-20861">
                                    رز باد
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-15171">
                                    چویتک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-12545">
                                    ژیون
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-20535">
                                    جرتک
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-14815">
                                    پرلیت یو اس بی
                                </li>
                                <li class="swiper-slide js-touchpoint-item"
                                    data-value="brand-param-21205">
                                    رمزینه برچسب
                                </li>
                            </ul>
                        </div>
                        <button class="js-touchpoint-swiper-next"></button>
                    </div>
                </div>
                <div class="c-pager">
                    {{$products_paginate->links()}}
{{--                    <ul class="c-pager__items">--}}
{{--                        <li class="js-pagination__item"><a class="c-pager__item is-active"--}}
{{--                                                           href="javascript:"--}}
{{--                                                           data-page="1">۱</a></li>--}}
{{--                        <li class="js-pagination__item"><a class="c-pager__item"--}}
{{--                                                           href="/search/category-accessories-main/?sortby=4&amp;pageno=2"--}}
{{--                                                           data-page="2">۲</a></li>--}}
{{--                        <li class="js-pagination__item"><a class="c-pager__item"--}}
{{--                                                           href="/search/category-accessories-main/?sortby=4&amp;pageno=3"--}}
{{--                                                           data-page="3">۳</a></li>--}}
{{--                        <li class="js-pagination__item"><a class="c-pager__item"--}}
{{--                                                           href="/search/category-accessories-main/?sortby=4&amp;pageno=4"--}}
{{--                                                           data-page="4">۴</a></li>--}}
{{--                        <li class="js-pagination__item"><a class="c-pager__item"--}}
{{--                                                           href="/search/category-accessories-main/?sortby=4&amp;pageno=5"--}}
{{--                                                           data-page="5">۵</a></li>--}}
{{--                        <line class="c-pager__items--partition"></line>--}}
{{--                        <li class="js-pagination__item"><a class="c-pager__next"--}}
{{--                                                           href="/search/category-accessories-main/?sortby=4&amp;pageno=277"--}}
{{--                                                           data-page="277"></a></li>--}}
{{--                    </ul>--}}
                </div>
            </div>
        </article>
    </div>
</div>
