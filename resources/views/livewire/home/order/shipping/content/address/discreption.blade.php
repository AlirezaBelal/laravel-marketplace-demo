<div class="c-checkout-contact is-completed js-user-address-container"
     id="user-default-address-container">
    <div class="c-checkout-contact__content js-default-recipient-box">
        <div class="c-checkout-contact__title">
            آدرس تحویل سفارش
        </div>
        <input type="hidden" id="address-id" name="addressId" value="">
        @if ($order_last != null)
            @if ($this->orders[0]->address != null)
                <ul class="c-checkout-contact__items">
                    <li class="c-checkout-contact__item c-checkout-contact__item--address js-recipient-address-part">

                        {{\App\Models\PersianNumber::translate( $this->orders[0]->address->state)}}
                        ،
                        {{\App\Models\PersianNumber::translate($this->orders[0]->address->city)}}
                        ،
                        {{\App\Models\PersianNumber::translate($this->orders[0]->address->address)}}
                    </li>
                    <li class="c-checkout-contact__item c-checkout-contact__item--username">
                        {{$this->orders[0]->address->name}} {{$this->orders[0]->address->lname}}
                    </li>
                    <li class="c-checkout-contact__item">
                        <button type="button" class="o-link o-link--sm o-link--has-arrow"
                                id="change-address-btn">
                            تغییر یا ویرایش آدرس
                        </button>
                    </li>
                </ul>
            @else
                <ul class="c-checkout-contact__items">
                    <li class="c-checkout-contact__item c-checkout-contact__item--address js-recipient-address-part">

                        {{\App\Models\PersianNumber::translate($addresses['0']->state ?? $this->orders[0]->address->state)}}
                        ،
                        {{\App\Models\PersianNumber::translate($addresses['0']->city)}}
                        ،
                        {{\App\Models\PersianNumber::translate($addresses['0']->address)}}
                    </li>
                    <li class="c-checkout-contact__item c-checkout-contact__item--username">
                        {{$addresses['0']->name}} {{$addresses['0']->lname}}
                    </li>
                    <li class="c-checkout-contact__item">
                        <button type="button" class="o-link o-link--sm o-link--has-arrow"
                                id="change-address-btn">
                            تغییر یا ویرایش آدرس
                        </button>
                    </li>
                </ul>
            @endif
            @else
            <div class="c-checkout-contact__dropoff-address-action-container">
                <p>
لطفا آدرس دریافت خودتان را انتخاب کنید
                </p>
                <button type="button" class="o-link o-link--sm o-link--has-arrow"
                        id="change-to-dropoff-address">
                    انتخاب آدرس دریافت حضوری
                </button>
            </div>
        @endif

        <div class="c-checkout-contact__dropoff-address-action-container"><p>
                با انتخاب یکی از آدرس‌های دریافت حضوری می‌توانید کالاهای این سفارش
                را به
                صورت حضوری از مراکز دیجی‌کالا دریافت نمایید.
            </p>
            <button type="button" class="o-link o-link--sm o-link--has-arrow"
                    id="change-to-dropoff-address">
                انتخاب آدرس دریافت حضوری
            </button>
        </div>
    </div>
</div>
