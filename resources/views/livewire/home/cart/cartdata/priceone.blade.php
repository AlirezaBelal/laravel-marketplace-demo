<li><span class="c-checkout-bill__item-title">
                    قیمت کالاها
                    ({{\App\Models\PersianNumber::translate($orders->count())}})
                </span>
    <span class="c-checkout-bill__price">
                 {{\App\Models\PersianNumber::translate(number_format($orders->sum('total_price')))}}
                    <span class="c-checkout-bill__currency">
                        تومان
                    </span></span>
</li>
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
                            </span></span>
</li>
<li class="c-checkout-bill__sum-price"><span
        class="c-checkout-bill__item-title">
                    جمع
                </span><span class="c-checkout-bill__price">
{{\App\Models\PersianNumber::translate(number_format($orders->sum('total_discount_price')))}}

                        <span class="c-checkout-bill__currency">
                            تومان
                        </span></span>
</li>
