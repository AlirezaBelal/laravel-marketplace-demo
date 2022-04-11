<aside class="o-page__aside js-checkout-aside-container">
    <div class="c-checkout-aside js-checkout-aside">
        <div class="c-checkout-bill">
            <ul class="c-checkout-bill__summary">
                <li><span class="c-checkout-bill__item-title">
                    قیمت کالاها
                    ({{\App\Models\PersianNumber::translate($orders->count())}})
                </span><span class="c-checkout-bill__price">
                      {{\App\Models\PersianNumber::translate($orders->sum('total_price'))}}
                    <span class="c-checkout-bill__currency">
                        تومان
                    </span></span></li>
                <li><span class="c-checkout-bill__item-title">
                        تخفیف کالاها
                    </span><span class="c-checkout-bill__price c-checkout-bill__price--discount">
                        @php
                            $discPrice = $orders->sum('total_price') - $orders->sum('total_discount_price');
                            $disc = $orders->sum('total_discount_price');
                            $totalPriced = $orders->sum('total_price');
                            $darsad = ($discPrice/$totalPriced)*100;
                            $d = (int)$darsad
                        @endphp
                        <span>
                               ({{\App\Models\PersianNumber::translate($d)}}٪)
                            </span>
{{\App\Models\PersianNumber::translate(number_format($orders->sum('total_price') - $orders->sum('total_discount_price') ))}}

                        <span class="c-checkout-bill__currency">
                           تومان
                        </span></span></li>
                <li class="c-checkout-bill__sum-price"><span
                        class="c-checkout-bill__item-title">
                    جمع
                </span><span class="c-checkout-bill__price">
                     {{\App\Models\PersianNumber::translate($orders->sum('total_discount_price'))}}
                    <span class="c-checkout-bill__currency">
                        تومان
                    </span></span></li>
                <li>
                    <div class="c-checkout-bill__item-title">
                        هزینه ارسال
                    </div>
                    <span class="c-checkout-bill__item-title "
                          data-shipping-cost="{{$payments->last()->shipping_price}}"><span>
                           {{\App\Models\PersianNumber::translate($payments->last()->shipping_price)}}
                        </span>  <span class="c-checkout-bill__currency">
                            &nbsp;
                            تومان
                        </span></span></li>

                @if ($this->discount_type == 1)
                    <li id="typehiddendiscount">
                    <span
                        class="c-checkout-bill__item-title c-checkout-bill__item-title--voucher">
                    کد تخفیف
                </span><span class="c-checkout-bill__price c-checkout-bill__price--discount">
                        <span>
                            -
                            {{\App\Models\PersianNumber::translate($this->discount_price)}}
                    </span><span class="c-checkout-bill__currency">
                       تومان
                    </span></span></li>
                @elseif ($this->discount_type==0)
                    <li id="typehiddendiscount">
                        <span
                            class="c-checkout-bill__item-title c-checkout-bill__item-title--voucher">
                    کد تخفیف
                </span>
                        <span class="c-checkout-bill__price c-checkout-bill__price--discount">
                        <span>
                            -
                            {{\App\Models\PersianNumber::translate($this->discount_price)}} %
                    </span><span class="c-checkout-bill__currency">
                       تومان
                    </span></span></li>
                @endif

                <li class="js-gift-card-code-discount"><span
                        class="c-checkout-bill__item-title c-checkout-bill__item-title--gift">
                    کارت هدیه
                </span>
                    <span class="c-checkout-bill__price c-checkout-bill__price--discount"><span>
                            {{\App\Models\PersianNumber::translate($this->dgift)}}
                        </span>
                        <span
                            class="c-checkout-bill__currency">
                       تومان
                    </span></span></li>
                <li class="c-checkout-bill__total-price">
                    <span
                        class="c-checkout-bill__total-price--title">
                    مبلغ قابل پرداخت
                </span>
                    <span class="c-checkout-bill__total-price--amount">

                    @if($this->discount_type == null)
                            @if ($this->dgift == null)
                                {{\App\Models\PersianNumber::translate($orders->sum('total_discount_price'))}}
                            @else
                                {{\App\Models\PersianNumber::translate($orders->sum('total_discount_price') - $this->dgift)}}
                            @endif


                        @elseif($this->discount_type==1)

                            {{\App\Models\PersianNumber::translate($orders->sum('total_discount_price') - $this->discount_price)}}
                        @elseif ($this->discount_type ==0)

                            {{\App\Models\PersianNumber::translate($this->dTotalPercent)}}

                        @endif
                    <span
                        class="c-checkout-bill__total-price--currency">
                        تومان
                    </span>
                         </span>
                </li>
                <li class="c-checkout-bill__to-forward-button">
                    <button type="submit" wire:click="continuePayment({{$order_number}})"
                            class="o-btn o-btn--full-width o-btn--contained-red-lg js-save-payment-data selenium-next-step-shipping">
                        پرداخت و ثبت نهایی سفارش
                    </button>
                </li>
            </ul>
            <div class="c-checkout-bill__cash-back"></div>
        </div>
        <p class="c-checkout-bill__reserve-note">
            در صورت تمایل برای خرید حقوقی، لطفا در قسمت اطلاعات شخصی، اطلاعات حقوقی خود را
            وارد کنید.
        </p></div>
</aside>
