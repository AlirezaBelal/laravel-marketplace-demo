@if($product->publish_product == 1)
@include('livewire.home.product.detail.price')
@else
    <div class="c-product__summary js-product-summary">
        <div class="c-product__stock-status c-product__stock-status--out-of-stock">
            <div class="c-product-stock__title">
                ناموجود
            </div>
            <div class="c-product-stock__body">
                متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق لیست بالای صفحه، از محصولات مشابه این کالا
                دیدن نمایید
            </div>


                @if(\App\Models\Notification::where('product_id',$this->product->id)->
        where('user_id',auth()->user()->id)->first())
                <button data-snt-event="dkProductPageClick" type="button"
                        onclick="publish_product()"
                        data-snt-params="{&quot;item&quot;:&quot;main-alarm-for-instock&quot;,&quot;item_option&quot;:&quot;out-of-stock&quot;}"
                        class="o-btn o-btn--full-width o-btn--contained-red-lg c-product-stock__action js-add-to-notify-button">
                    <i class="c-product-stock__action--alarm-icon"></i>
                    <label>دیگه لازم نیست اطلاع بدی</label>
                </button>
                @else
                        <button data-snt-event="dkProductPageClick" type="button"
                                onclick="publish_product()"
                                data-snt-params="{&quot;item&quot;:&quot;main-alarm-for-instock&quot;,&quot;item_option&quot;:&quot;out-of-stock&quot;}"
                                class="o-btn o-btn--full-width o-btn--contained-red-lg c-product-stock__action js-add-to-notify-button">
                    <i class="c-product-stock__action--alarm-icon"></i>
                    <label>موجود شد به من اطلاع بده</label>
                        </button>
                @endif

        </div>
    </div>

@endif
@include('livewire.home.modals')
@include('livewire.home.script')
