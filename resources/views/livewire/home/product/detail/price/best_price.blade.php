<div class="c-product__seller-row c-product__seller-row--gift c-product__seller-row--clickable js-seller-info-gift u-hidden"
     style="pointer-events: none;">
    <div
        class="c-product__seller-row-main js-gift-text js-single-gift "></div>
    <div
        class="c-product__seller-row-main js-gift-text js-multi-gift u-hidden">
        <span class="js-gift-count">۰</span>
        هدیه
    </div>
    <div
        class="c-product__seller-extra js-gift-extra-toggle "></div>
</div>
<div class="c-product-info-box js-gift-info-expand">
    <div class="c-product-info-box__header">
        <div
            class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>
        لیست هدیه‌ها
    </div>
    <div class="c-product-info-box__body-wrapper">
        <div class="c-product-info-box__body">
            <div>
                <div class="c-product__gift-title">
                    لیست هدیه ها
                </div>
                <div
                    class="c-product__gift-content js-gift-items"></div>
            </div>
        </div>
    </div>
</div>
@if($productSeller_max_price_first != null)
@if ($priceDate_min_price_first->discount_price == $productSeller_max_price_first->discount_price ?? $this->vendor_new->discount_price )
    @if ($mo > 0)
        <div
            class="c-mini-buy-box__row c-mini-buy-box__best-price js-data-best-price ">
            بهترین قیمت ۳۰ روز گذشته
        </div>
    @endif
@endif
@endif
