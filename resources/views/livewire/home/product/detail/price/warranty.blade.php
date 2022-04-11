<div
    class="c-product__seller-row c-product__seller-row--guarantee c-product__seller-row--clickable js-seller-info-guarantee"
    style="pointer-events: none;">
    <div class="c-product__seller-row-main js-guarantee-text">
        @if ($this->vendor_new)
            {{$this->vendor_new->warranty['name']}}
        @else
            {{$productSeller_max_price_first->warranty['name'] ?? $this->vendor_new->warranty['name']}}
        @endif

    </div>
    <div
        class="c-product__seller-extra js-guarantee-extra-toggle u-hidden"></div>
</div>
<div class="c-product-info-box js-guarantee-info-expand">
    <div class="c-product-info-box__header">
        <div
            class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>
        جزئیات گارانتی
    </div>
    <div class="c-product-info-box__body-wrapper">
        <div class="c-product-info-box__body">
            <div class="c-guarantee-info-box__row">
                <div class="u-text-bold m-b-md js-guarantee-text">
                    @if ($this->vendor_new)
                        {{$this->vendor_new->warranty['name']}}
                    @else
                        {{$productSeller_max_price_first->warranty['name'] ?? $this->vendor_new->warranty['name']}}
                    @endif

                </div>
                <div
                    class="u-text-spaced js-guarantee-description"></div>
            </div>
        </div>
    </div>
</div>
