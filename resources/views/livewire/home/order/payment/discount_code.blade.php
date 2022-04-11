<div class="c-payment__voucher">
    <div id="discountTab" class="c-payment__voucher-header js-voucher-header" onclick="discountTab()" >
        کد تخفیف
    </div>
    <div id="discountTab2" class="c-payment__gift-card-list js-voucher-list u-hidden">
        <div
            class="c-payment__voucher-input-row js-voucher js-voucher-discount-value"
            data-amount="0">
            <div class="c-payment__serial-input-container">
                <form wire:submit.prevent="checkDiscountCode">
                <input wire:model.defer="discount.code"
                    class="c-payment__serial-input "
                    type="text" placeholder="افزودن کد تخفیف"
                    id="payment-voucher-input">
                <button type="submit" style="border: none;background: no-repeat;"
                        onclick="showHidden()"
                    class="c-payment__serial-input-icon  "></button><span
                    class="c-payment__serial-input-clear "></span>
                </form>
            </div>
            <div class="c-payment__serial-error js-voucher-error"></div>
            <div class="c-payment__serial-success js-voucher-success"></div>
        </div>
    </div>
</div>
<script>
    function discountTab() {
        if (! document.getElementById("discountTab").classList.contains("c-payment__voucher-header--open")){
            document.getElementById("discountTab").classList.add("c-payment__voucher-header--open");
            document.getElementById("discountTab2").classList.remove("u-hidden");
        }else{
            document.getElementById("discountTab2").classList.add("u-hidden");
            document.getElementById("discountTab").classList.remove("c-payment__voucher-header--open");
        }
    }
    function showHidden() {
            document.getElementById("typehiddendiscount").classList.remove("hidden");

    }

</script>
