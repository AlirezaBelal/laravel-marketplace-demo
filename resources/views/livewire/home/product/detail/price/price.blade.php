
<div class="c-product__seller-row c-product__seller-row--price">
    <div class="c-product__seller-price-info">
        <div
            class="c-product__seller-price-prev js-rrp-price u-hidden">
            @if ($this->vendor_new)
                {{\App\Models\PersianNumber::translate($this->vendor_new->discount_price)}}
            @else
                @if($productSeller_max_price_first != null)
                {{\App\Models\PersianNumber::translate($productSeller_max_price_first->discount_price ?? $this->vendor_new->discount_price)}}
            @endif
            @endif
        </div>
        <div
            class="c-product__seller-price-off js-discount-value u-hidden">
            ۰٪
        </div>
    </div>
    <div class="c-product__seller-price-real">
        <div
            class="c-product__seller-price-pure u-hidden js-ab-price-value">
            ۴.۰۹۸ میلیون
        </div>
        <div class="c-product__seller-price-pure js-price-value">
            @if ($this->vendor_new)
                {{\App\Models\PersianNumber::translate($this->vendor_new->discount_price)}}
            @else
                @if($productSeller_max_price_first != null)
                {{\App\Models\PersianNumber::translate($productSeller_max_price_first->discount_price ?? $this->vendor_new->discount_price)}}
            @endif
            @endif

        </div>
        تومان
    </div>
    <div
        class="c-product__additional-item c-product__additional-item--no-icon js-price-discount-osm u-hidden">
        <span class="js-discount-osm-value"></span>&nbsp; تومان
        تخفیف سازمانی کسر گردیده است.
    </div>
</div>
<div class="c-product__remaining-in-stock--parent">
    <div class="c-cart-view-count">
        ۳۰+
        نفر در حال بازدید این کالا می‌باشند.
    </div>
</div>
