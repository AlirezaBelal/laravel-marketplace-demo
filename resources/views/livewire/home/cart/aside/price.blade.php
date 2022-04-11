<div class="c-checkout-bill">
    <ul class="c-checkout-bill__summary">
        <li><span class="c-checkout-bill__item-title">
                        قیمت کالاها
                        ({{\App\Models\PersianNumber::translate($carts->count())}})
                    </span><span class="c-checkout-bill__price js-card-sidebar-price">
                        {{\App\Models\PersianNumber::translate(number_format($carts->sum('product_price')))}}

                            <span class="c-checkout-bill__currency">تومان</span></span>
        </li>
        <li><span class="c-checkout-bill__item-title">
                            تخفیف کالاها
                        </span><span class="c-checkout-bill__price c-checkout-bill__price--discount">
                                                      {{\App\Models\PersianNumber::translate(number_format($carts->sum('product_price') - $carts->sum('product_price_discount') ))}}
                                <span class="c-checkout-bill__currency">تومان</span></span></li>
        <li class="c-checkout-bill__sum-price"><span class="c-checkout-bill__item-title">
                                                    جمع سبد خرید
                                            </span><span class="c-checkout-bill__price js-card-sidebar-price">
                      {{\App\Models\PersianNumber::translate(number_format($carts->sum('product_price_discount')))}}
                            <span class="c-checkout-bill__currency">تومان</span></span><span
                class="c-checkout-bill__price u-hidden js-ab-card-sidebar-price">
                            ۴.۲۷۸۶
                            <span class="c-checkout-bill__currency">میلیون تومان</span></span></li>
        <li class="c-checkout-bill__additional-shipping-cost">
            هزینه‌ی ارسال در ادامه بر اساس آدرس، زمان و
            نحوه‌ی ارسال انتخابی شما‌ محاسبه و به این مبلغ اضافه خواهد شد
        </li>
        <li class="c-checkout-bill__to-forward-button">
            <a  wire:click="shipping()"
                                                          class="o-btn o-btn--full-width o-btn--contained-red-lg selenium-next-step-shipping">
                ادامه فرآیند خرید
            </a></li>
    </ul>
    <div class="c-checkout-bill__cash-back"></div>
</div>
<p class="c-checkout-bill__reserve-note">
    کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.
</p>
<div
    class=" c-checkout-bill__plus-box c-checkout-bill__plus-box--white-bg js-ga-free-shipping-badge--disabled c-box-free-shipping">
    <div class="c-box-free-shipping__content"><h3>ارسال رایگان سفارش</h3>
        <p class="js-free-shipping-badge-text">سفارش‌های بالای ۳۰۰ هزار تومان</p></div>
    <img class="c-box-free-shipping__image" src="{{asset('/img/0f0ce3bb.png')}}">
</div>
