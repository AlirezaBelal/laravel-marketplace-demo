<div class="c-product__seller-row c-product__seller-row--add-to-cart">
    <div class="u-w-full js-ab-app-incredible-pdp-action u-hidden"><span
            class=" c-product-gallery__application-only-user-label">تنها برای کاربران اپلیکیشن دیجی‌کالا</span><a
            href="/landings/new-app/" target="_blank"
            class="btn-add-to-cart btn-add-to-cart--outline btn-add-to-cart--full-width btn-add-to-cart--cta-icon btn-add-to-cart--navigate-to-application  js-app-incredible"
            data-android="https://cafebazaar.ir/app/com.digikala/?l=fa"
            data-ios="https://sibapp.com/applications/digikala"
            data-id="3048126">
            مشاهده در اپلیکیشن دیجی‌کالا
        </a>
    </div>
    <a class="js-ab-product-action btn-add-to-cart btn-add-to-cart--full-width js-add-to-cart js-cart-page-add-to-cart js-btn-add-to-cart"
       data-event="add_to_cart"
       data-event-category="ecommerce"
       @if ($this->vendor_new)
       wire:click="addToCart({{$this->vendor_new->id}})"
       @else
       wire:click="addToCart({{$productSeller_max_price_first->id ?? $this->vendor_new->id}})"
       @endif

       data-event-label="price: 40980000 - seller: marketplace - seller_name: دیجی‌کالا - seller_rating: 0 - multiple_configs: True - position: 0"><span
            class="btn-add-to-cart__txt">افزودن به سبد خرید</span></a>
</div>
