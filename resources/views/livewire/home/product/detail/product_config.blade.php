<div id="zoom-box"></div>
<div class="c-product__config">
    <span class="c-product__title-en">{{\App\Models\PersianNumber::translate($product->name)}}</span>
    <div class="c-product__user-suggestion-line">
        ۸۵٪
        (بیشتر از ۹۹۹ نفر)
        از خریداران، این کالا را پیشنهاد کرده‌اند.
        <div
            class="js-dk-wiki-trigger c-wiki c-wiki__holder c-product__user-suggestion-line-info-icon">
            <div class="c-wiki__container js-dk-wiki   is-black">
                <div class="c-wiki__arrow"></div>
                <p class="c-wiki__text">
                    خریداران کالا با انتخاب یکی از گزینه‌های پیشنهاد یا عدم پیشنهاد،
                    تجربه خرید خود را با کاربران به اشتراک می‌گذارند.
                </p></div>
        </div>
    </div>
    <div class="c-product__engagement">
        <div class="c-product__engagement-item">
            <div class="c-product__engagement-rating">
                ۴.۳
                <span class="c-product__engagement-rating-num">
                                        (۵۱۱۲)
                                    </span></div>
        </div>
        <div class="c-product__engagement-item js-scroll-to-tab" data-id="comments"
             data-gtm-vis-recent-on-screen-9070001_346="2978"
             data-gtm-vis-first-on-screen-9070001_346="2978"
             data-gtm-vis-total-visible-time-9070001_346="100"
             data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-product__engagement-link" data-activate-tab="comments">
                ۵۴۲۰
                دیدگاه کاربران
            </div>
        </div>
        <div class="c-product__engagement-item js-scroll-to-tab" data-id="questions"
             data-gtm-vis-recent-on-screen-9070001_346="2979"
             data-gtm-vis-first-on-screen-9070001_346="2979"
             data-gtm-vis-total-visible-time-9070001_346="100"
             data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-product__engagement-link" data-activate-tab="questions">
                ۹۵۰
                پرسش و پاسخ
            </div>
        </div>
    </div>

    <div class="c-product__config-wrapper">
        <div class="c-product__circle-variants">
            @if($product->publish_product == 1)
            <div class="c-product__circle-variants__title">
                <header>رنگ :</header>

                <span class="js-color-title">{{$this->color}}</span>


            </div>

            <ul class="js-product-variants">
                @foreach(\App\Models\ProductSeller::where('product_id',$product->id)->get() as $seller)
                    <li class="js-c-ui-variant c-circle-variant__item"
                        data-event="config_change" data-event-category="product_page"
                        data-event-label="change: color"><label
                            data-snt-event="dkProductPageClick"
                            data-snt-params="{&quot;item&quot;:&quot;change-color&quot;,&quot;item_option&quot;:&quot;سفید&quot;}"
                            class="js-circle-variant-color c-circle-variant c-circle-variant--color"
                            data-code="{{$seller->color->value}}">
                            <input type="radio" value="2" name="color"
                                   id="variant"
                                   wire:change="changeColor({{$seller->color->id}})"
                                   class="js-variant-selector js-color-filter-item"
                                   checked="" data-title="{{$seller->color->name}}"
                                   data-type="color"><span
                                class="c-circle-variant__border"></span><span
                                class="c-tooltip c-tooltip--small-bottom c-tooltip--short">{{$seller->color->name}}</span><span
                                class="c-circle-variant__shape"
                                style="background-color: {{$seller->color->value}}"></span></label></li>
                @endforeach

            </ul>
            @endif
        </div>
        <div class="c-product__params js-is-expandable" data-collapse-count="3">
            <ul data-title="ویژگی‌های کالا">

                @foreach(\App\Models\Attribute::where('childCategory',$product->childcategory_id)->take(10)->get() as $att)




                    @if (\App\Models\AttributeValue::where('attribute_id',$att->id)
                           -> where('product_id',$product->id)->first())
                        <li>
                            <span>{{\App\Models\PersianNumber::translate($att->title)}}: </span>


                            <span>
                        @foreach(\App\Models\AttributeValue::where('attribute_id',$att->id)
                               -> where('product_id',$product->id)->get() as $val)
                                    {{\App\Models\PersianNumber::translate($val->value)}}
                                @endforeach
                    </span>

                        </li>
                    @endif

                @endforeach
                @foreach(\App\Models\Attribute::where('childCategory',$product->childcategory_id)->
                     skip('10')->take(PHP_INT_MAX)->get() as $att)

                    @if (\App\Models\AttributeValue::where('attribute_id',$att->id)
                         -> where('product_id',$product->id)->first())
                        <li class="js-more-attrs c-product__params-more" id="d3">
                            <span>{{\App\Models\PersianNumber::translate($att->title)}}: </span>


                            <span>
                        @foreach(\App\Models\AttributeValue::where('attribute_id',$att->id)
                               -> where('product_id',$product->id)->get() as $val)
                                    {{\App\Models\PersianNumber::translate($val->value)}}
                                @endforeach
                    </span>

                        </li>
                    @endif

                @endforeach
                @if (\App\Models\Attribute::where('childCategory',$product->childcategory_id)->count() > 10)


                    <li class="c-product__params-more-handler" data-sign="+">
                        <button data-snt-event="dkProductPageClick" onclick="dkProductPageClick()"
                           id="btn-close"     data-snt-params="{&quot;item&quot;:&quot;more-attributes&quot;,&quot;item_option&quot;:null}"
                                class="btn-link-spoiler js-more-attr-button c-product__show-more-btn">
                            مشاهده بیشتر
                        </button>

                    </li>
                @endif
            </ul>


            @if ($product->subcategory_id ==2)
                <div class="c-product__additional-info">
                    <div class="c-product__additional-item ">
                        هشدار سامانه همتا: در صورت انجام معامله، از فروشنده کد فعالسازی را
                        گرفته و حتما در حضور ایشان، دستگاه را از طریق #7777*، برای سیمکارت
                        خود فعالسازی نمایید. آموزش تصویری در آدرس اینترنتی
                        hmti.ir/06
                    </div>
                </div>
            @endif
        </div>
        <div class="c-product__plus-box js-pdp-plus-box">
            <div class="c-product__plus-box-row c-product__plus-box-row--between"><span
                    class="c-product__plus-box-title c-digiplus-sign--before">
                                        خدمات ویژه کاربران دیجی‌پلاس
                                                                            </span><a href="/plus/landing/"
                                                                                      class="c-product__plus-box-link">شما
                    هم عضو شوید</a></div>
            <div class="c-product__plus-box-row c-product__plus-box-row--specs"><span
                    class="c-product__plus-box-description js-plus-feature-cash-back u-hidden">
                                        ۰ تومان هدیه نقدی
                                    </span><span class="c-product__plus-box-description">ارسال رایگان</span><span
                    class="c-product__plus-box-description u-hidden">۳۰ روز بازگشت کالا</span><span
                    class="c-product__plus-box-description js-plus-feature-jet">
                                        امکان ارسال فوری
                                    </span></div>
        </div>


        <div class="c-product__plus-box js-pdp-roosta-badge u-hidden">
            <div class="c-product__plus-box-row c-product__plus-box-row--between"><span
                    class="c-product__rostaee-box-title"><img
                        src="/img/8d65c2cb.svg"
                        alt="Rostaee Badge">
                کسب و کارهای بومی
            </span><a href="/landings/village-businesses/" class="c-product__plus-box-link">اطلاعات بیشتر</a></div>
            <div class="c-product__plus-box-row c-product__plus-box-row--specs"><span
                    class="c-product__plus-box-description">
                این کالا جزو تولیدات بومی - محلی می باشد.
            </span></div>
        </div>
        <div
            class="c-product__plus-box u-select-none js-ga-free-shipping-badge--disabled js-pdp-free-shipping-badge">
            <div class="c-product__plus-box-row c-product__plus-box-row--between"><span
                    class="c-product__free-shipping-box-title"><img
                        src="/img/73ace9f5.svg"
                        alt="Rostaee Badge">
            ارسال رایگان سفارش
        </span></div>
            <div class="c-product__plus-box-row c-product__plus-box-row--specs"><span
                    class="c-product__plus-box-description js-free-shipping-badge-text">اولین سفارش کاربران جدید</span>
            </div>
            <img class="c-product__free-shipping-box-image"
                 src="/img/331b8ca9.png" alt=""></div>
        {{--        <div data-variant-id="9832233"--}}
        {{--             class="c-product__plus-box js-pdp-digipay-credit-badge">--}}
        {{--            <div class="c-product__plus-box-row c-product__plus-box-row--between"><span--}}
        {{--                    class="c-product__rostaee-box-title"><img--}}
        {{--                        src="https://www.digikala.com/static/files/7ea98a42.svg"--}}
        {{--                        alt="DigiPay Badge">--}}
        {{--                به اعتبار دیجی‌پی، قسطی بخرید--}}
        {{--            </span><a target="_blank" href="https://www.mydigipay.com/credit/?utm_source=PDP&amp;utm_medium=DKBanner"--}}
        {{--                      class="c-product__plus-box-link js-digipay-badge-ga">اطلاعات بیشتر</a></div>--}}
        {{--            <div class="c-product__plus-box-row c-product__plus-box-row--specs">--}}
        {{--                <div class="c-product__digipay-box-desc"><span--}}
        {{--                        class="js-digipay-payment-amount">۴۴۹,۹۰۰ </span> تومان--}}
        {{--                    پیش‌پرداخت--}}
        {{--                    <div class="dot"></div>--}}
        {{--                    <span class="js-digipay-installment-amount">۳۸۴,۶۰۰ </span> تومان--}}
        {{--                    ماهانه--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

</div>
<script>
    function dkProductPageClick() {
        let elements = document.getElementsByClassName('c-product__params-more');
        console.log(elements.length);
        if (document.getElementById("d3").classList.contains('is-active')) {
            for (let i = 0; i < elements.length ; i++)
            {
                elements[i].classList.remove('is-active')
            }
            document.querySelector('#btn-close').textContent ='مشاهده بیشتر';
        } else {
            for (let i = 0; i < elements.length ; i++)
            {
                elements[i].classList.add('is-active')
            }
           document.querySelector('#btn-close').textContent ='بستن';
        }
    }
</script>
