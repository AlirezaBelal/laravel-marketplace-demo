<div class="c-payment__voucher">
    <div class="c-payment__voucher-header c-payment__voucher-header--no-icon">
        کارت هدیه
    </div>
    <div class="c-payment__gift-card-list">
        <div
            class="c-payment__voucher-input-row js-gift-card js-gift-card-discount-value"
            data-amount="0">
            <div class="c-payment__serial-input-container">
                <form wire:submit.prevent="checkDiscountCode">
                <input wire:model.defer="gift.code"
                    class="c-payment__serial-input js-gift-card-serial-input"
                    name="" type="text" placeholder="افزودن کارت هدیه جدید"
                    id="payment-gift-card-input">
                <style>
                    .c-payment__serial-input-icon::before {
                        content: "ثبت";
                        font-size: 0.929rem;
                        line-height: 25px;
                        cursor: pointer;
                    }
                </style>
                <button type="submit" style="border: none;background: no-repeat;"
                    class="c-payment__serial-input-icon "
                        data-token=""></button>
                <span
                    class="c-payment__serial-input-clear js-clear-gift-card"></span>
                </form>
            </div>
            <div class="c-payment__serial-error js-gift-card-error"></div>
        </div>
        <div class="c-payment__gift-card-container js-gift-card-container"></div>
    </div>
</div>
