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
                    <li><span property="name">{{$subCategory->title}}</span></li>
                </ul>
            </nav>
            <div class="c-listing js-listing">
                @include('livewire.home.sub-category.product.header')
                <ul class="c-listing__items js-plp-products-list">

                    @foreach($products as $product)

{{--                        @php--}}
{{--                        $product = \App\Models\Product::find($key);--}}
{{--                        @endphp--}}
                        <li>

                            <div class="c-product-box c-promotion-box js-product-box
    has-more

     is-plp" data-observed="0" data-index="{{$first_category->id}}"
                                 data-id="{{$product->id}}"
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

                <div class="c-pager">
                    {{$products_paginate->links()}}

                </div>
            </div>
        </article>
    </div>
</div>
