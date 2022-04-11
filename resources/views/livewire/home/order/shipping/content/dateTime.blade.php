<form method="post" class="c-checkout-shipment__form" data-has-fresh="0"
      data-has-heavy="0"
      data-has-normal="0" data-multi-shipment="0" id="shipping-data-form"><input
        type="hidden" name="shipping[is_jet_delivery_enabled]" value=""
        id="js-jet-delivery-enabled-input">
    <input type="hidden"
           name="shipping[skipItemIds]"
           value=" "
           id="js-skip-item-id-input">
    <div class="u-hidden">
        <div class="c-checkout-shipment js-shippment-type">
            <div class="c-checkout-shipment__title">
                شیوه و زمان ارسال
            </div>
            <div class="c-checkout-shipment__tab-row">
                <div class="c-checkout-shipment__tab-pill"><label><input type="radio"
                                                                         name="shipping[type]"
                                                                         value="normal"
                                                                         checked=""
                                                                         id="shipment-option-1"><span
                            class="c-checkout-shipment__tab-pill-title c-checkout-shipment__tab-pill-title--normal">
                پیشنهادی
                            </span><span class="c-checkout-shipment__tab-pill-dsc">
                چینش مرسوله‌ها به پیشنهاد ما
            </span></label></div>
            </div>
        </div>
    </div>

    <div class="js-normal-delivery ">

        <div>
            <div data-is-sbs="0" data-item-count="2"
                 data-shipping-type="expressShipping"
                 class="c-checkout-pack js-checkout-pack " data-parcel="0-1-1">
                <div class="c-checkout-pack__header">
                    <div class="c-checkout-pack__header-title">
                        <span>مرسوله ۱ از {{\App\Models\PersianNumber::translate($orders->count())}}</span>
                    </div>
                    <div class="c-checkout-pack__header-dsc"><span>
                    {{\App\Models\PersianNumber::translate($orders->count())}}
                    کالا
                 </span><span class="c-checkout-time-table__shipping-lead-time">
                                            موجود در انبار دیجی‌کالا
                                    </span></div>
                </div>
                <div class="c-checkout-pack__sub-header ">
                    <div
                        class="c-checkout-time-table__shipping-type c-checkout-time-table__shipping-type--express">
                        ارسال

                        عادی
                    </div>
                </div>
                <div class="c-checkout-pack__row">
                    <script>
                        var carouselDataTracker = null;
                        if (carouselDataTracker) {
                            if (!window.carouselData)
                                window.carouselData = [carouselDataTracker];
                            else
                                window.carouselData.push(carouselDataTracker);
                        }
                    </script>
                    <section
                        class="c-swiper c-swiper--products-compact js-swiper-box-container">
                        <div class="c-box">
                            <div
                                class="swiper-container swiper-container-horizontal js-swiper-container js-swiper-cart-parcel swiper-container-rtl">
                                <div class="swiper-wrapper">
                                    @foreach($orders as $order)
                                        <div
                                            class="swiper-slide js-product-box-container swiper-slide-active"
                                            data-item-id="{{$order->id}}"
                                            style="width: 160.6px;">
                                            <div
                                                class="c-product-box c-product-box--compact js-product-box">
                                                <a class="c-product-box__img js-url">
                                                    <img
                                                        alt="{{$order->product->title}}"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="/storage/{{$order->product->img}}"></a>
                                                @if ($order->color->name !=null)


                                                    <div
                                                        class="c-product-box__variant c-product-box__variant--color">
                                                                            <span
                                                                                style="background-color: {{$order->color['value']}};"></span>
                                                        {{$order->color['name']}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div
                                    class="swiper-button-prev js-swiper-button-prev swiper-button-disabled"></div>
                                <div
                                    class="swiper-button-next js-swiper-button-next swiper-button-disabled"></div>
                            </div>
                        </div>
                    </section>
                </div>
              @include('livewire.home.order.shipping.content.address.time')
            </div>
        </div>
    </div>
    <div class="c-checkout-shipment__invoice-type">
        <input type="hidden" name="is_legal"
               value="0">
        <p class="c-checkout-shipment__invoice-type-info">
            شما می‌توانید فاکتور خرید را پس از تحویل سفارش از بخش جزییات سفارش در حساب
            کاربری خود دریافت کنید.
        </p></div>
</form>
