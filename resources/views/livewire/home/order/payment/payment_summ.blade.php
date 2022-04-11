<div class="c-payment__summary">
    <div class="c-payment__header"><span>
            خلاصه سفارش
        </span></div>
    <section class="c-payment__summary__item">
        <header data-snt-event="dkPaymentPageClick"
                data-snt-params="{&quot;item&quot;:&quot;consignment&quot;,&quot;item_option&quot;:null}"
                class="c-payment__summary__row-header js-checkout-order-summary__header is-active">
            <div class="c-payment__summary__col c-payment__summary__col--package">
                مرسوله ۱
                <span>
                        {{\App\Models\PersianNumber::translate($orders->count())}}
                        کالا
                    </span></div>
            <div
                class="c-payment__summary__col c-payment__summary__col--shipment-type">
                ارسال عادی
                <span>

                            {{\App\Models\AddressTime::where('id',$payments->last()->time_id)->first()->day ?? ''}}
                            {{\App\Models\PersianNumber::translate(\App\Models\AddressTime::where('id',$payments->last()->time_id)->first()->date) ?? ''}}

                                                            -
                                بازه
                   {{\App\Models\PersianNumber::translate(\App\Models\AddressTime::where('id',$payments->last()->time_id)->first()->time) ?? ''}}

                                                    </span></div>
            <div
                class="c-payment__summary__col c-payment__summary__col--package-amount">
                <span>مبلغ مرسوله : </span>
                <div class="c-payment__summary__price">
                    {{\App\Models\PersianNumber::translate($orders->sum('total_discount_price'))}}
                    <span>تومان</span></div>
            </div>
        </header>
        <section
            class="c-swiper c-payment__summary__swiper c-swiper--order-summary">
            <div
                class="swiper-container swiper-container-horizontal js-package-swiper swiper-container-rtl">
                <div class="swiper-wrapper">
                    @foreach($orders as $ord)
                    <div class="swiper-slide swiper-slide-active">
                        <div class="c-product-box c-product-box--compact">
                            <a
                                class="c-product-box__img"><img
                                    src="/storage/{{$ord->product->img}}"
                                    alt="{{$ord->product->title}}"></a>
                            <div class="c-product-box__swiper-title">
                                {{$ord->product->title}}
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
                <div
                    class="swiper-button-prev js-swiper-button-prev swiper-button-disabled"></div>
                <div
                    class="swiper-button-next js-swiper-button-next swiper-button-disabled"></div>
            </div>
        </section>
    </section>
</div>
