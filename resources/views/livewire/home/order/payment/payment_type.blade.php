<div class="c-payment__payment-types">
    <div class="c-payment__header"><span>
                شیوه پرداخت
     </span>
    </div>
    <ul class="c-payment__paymethod js-paymethod-container">
        <input
            class="js-bank-id-input" type="hidden" name="bank_id" value="304">

        <li data-event="change_payment_method" data-event-category="funnel"
            data-event-label="addresses: default: , province: آذربایجان شرقی, shipping: normal, cart_payable: 704000">
            <div class="c-payment__paymethod-item "><label
                    class="c-outline-radio js-online-option c-payment__paymethod-item-radio selenium-payment-pos"><input
                        type="radio" data-bank-id="304" name="payment_method"
                        wire:click="paymentTypeInternet({{$order_number}})"
                        value="online" id="payment-option-online" checked="checked"><span
                        class="c-outline-radio__check"></span><span
                        class="c-payment__paymethod-icon c-payment__paymethod-icon--online"></span></label><label
                    class="c-payment__paymethod-title-row"
                    for="payment-option-online">
                    <div class="c-payment__paymethod-title"><span
                            class="js-paymethod-title">پرداخت اینترنتی</span>
                        <div class="c-wiki c-wiki__holder">
                            <div class="c-wiki__info-sign"></div>
                            <div class="c-wiki__container js-dk-wiki   ">
                                <div class="c-wiki__arrow"></div>
                                <p class="c-wiki__text">
                                    با پرداخت اینترنتی، سفارش شما با اولویت بیشتری
                                    نسبت به پرداخت در محل پردازش و ارسال می شود. در
                                    صورت پرداخت ناموفق هزینه کسر شده حداکثر طی ۷۲
                                    ساعت به حساب شما بازگردانده می‌شود.
                                </p></div>
                        </div>
                    </div>
                    <div class="c-payment__paymethod-dsc" data-amount="">
                        آنلاین با تمامی کارت‌های بانکی
                    </div>
                </label></div>
        </li>
        <li data-event="change_payment_method" data-event-category="funnel"
            data-event-label="addresses: default: , province: آذربایجان شرقی, shipping: normal, cart_payable: 704000">
            <div class="c-payment__paymethod-item "><label
                    class="c-outline-radio js-pos-option c-payment__paymethod-item-radio selenium-payment-pos"><input
                        type="radio" data-bank-id="" name="payment_method"

                        wire:click="paymentTypeManual({{$order_number}})"
                        value="pos" id="payment-option-pos"><span
                        class="c-outline-radio__check"></span><span
                        class="c-payment__paymethod-icon c-payment__paymethod-icon--cc-delivery"></span></label><label
                    class="c-payment__paymethod-title-row" for="payment-option-pos">
                    <div class="c-payment__paymethod-title"><span
                            class="js-paymethod-title">پرداخت در محل با کارت بانکی</span>
                        <div class="c-wiki c-wiki__holder">
                            <div class="c-wiki__info-sign"></div>
                            <div class="c-wiki__container js-dk-wiki   ">
                                <div class="c-wiki__arrow"></div>
                                <p class="c-wiki__text">
                                    با انتخاب پرداخت در محل، این امکان را دارید که
                                    هزینه سفارش‌ها را هنگام تحویل و با کارت بانکی
                                    بپردازید.<br>
                                    قوانین پرداخت در محل با کارت بانکی:<br>
                                    الف) مرسولات باید کمتر از سه میلیون تومان ارزش
                                    داشته باشند.<br>
                                    ب) سفارش شامل تنها یک مرسوله باشد.<br>
                                    ج) ارسال توسط دیجی‌کالا انجام شود.
                                </p></div>
                        </div>
                    </div>
                    <div class="c-payment__paymethod-dsc" data-amount="">
                        پرداخت پس از دریافت سفارش با تمامی کارتهای بانکی
                    </div>
                </label></div>
        </li>
        <li class="c-payment__disabled-cod-container">
            برای کاستن از احتمال انتقال ویروس کرونا پیشنهاد می‌کنیم از شیوه پرداخت
            اینترنتی استفاده کنید.
            در صورت انتخاب روش پرداخت در محل تنها امکان پرداخت با دستگاه کارتخوان
            مقدور است.
        </li>
    </ul>
</div>
