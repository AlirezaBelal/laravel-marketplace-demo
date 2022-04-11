<div class="c-profile-order__details-top-bar">
    <div class="c-profile-order__details-header"><a
            href="/profile/my-orders/delivered"
            class="o-btn o-btn--back"></a>
        <div class="c-profile-order__details-title">جزئیات سفارش</div>
        <div class="c-profile-order__list-item-detail">
            {{\App\Models\PersianNumber::translate(jdate($order_first->created_at)->format(' %d %B %Y'))}}
        </div>
        <div class="c-profile-order__list-item-detail">
            DKC-{{\App\Models\PersianNumber::translate($order_first->order_number)}}</div>
    </div>
    <div class="c-ui-more">
        <div class="o-btn o-btn--icon-gray-md o-btn--l-more js-ui-see-more"></div>
        <div class="c-ui-more__options js-ui-more-options" style="display: none;">
            <a class="c-ui-more__option "
               href="/profile/orders/{{$order_first->order_number}}/invoice/">مشاهده
                فاکتور سفارش</a>
        </div>
    </div>
</div>
<div class="c-profile-order__list-item-details">
    <div class="c-profile-order__list-item-details-row">
        <div class="c-profile-order__list-item-detail">
            <span class="c-profile-order__list-item-detail-title">تحویل گیرنده:</span>
            {{$order_first->address->name}} {{$order_first->address->lname}}
        </div>
        <div class="c-profile-order__list-item-detail"><span class="c-profile-order__list-item-detail-title">شماره تماس:</span>
            {{$order_first->address->mobile}}
        </div>
    </div>
    <div class="c-profile-order__list-item-details-row c-profile-order__list-item-details-row--space-between">
        <div class="c-profile-order__list-item-detail"><span class="c-profile-order__list-item-detail-title">ارسال به:</span>
            {{$order_first->address->state}}،
            {{$order_first->address->city}}،
            {{$order_first->address->address}}
        </div>
    </div>
</div>
<div class="c-profile-order__list-item-details c-profile-order__list-item-details--between">
    <div class="c-profile-order__list-item-details-row">
        <div class="c-profile-order__list-item-detail c-profile-order__list-item-detail--currency"><span
                class="c-profile-order__list-item-detail-title">مبلغ کل:</span>
            {{\App\Models\PersianNumber::translate($order_first->total_discount_price)}}
        </div>
        <div class="c-profile-order__list-item-detail c-profile-order__list-item-detail--currency"><span
                class="c-profile-order__list-item-detail-title">تخفیف:</span>
            {{\App\Models\PersianNumber::translate($order_first->total_price - $order_first->total_discount_price)}}
        </div>
    </div>
    <div id="btn_open_detail1" onclick="btn_open_detail()" class="o-btn o-btn--link-gray-md o-btn--black o-btn--l-expand-more js-payment-records-btn">
        تاریخچه تراکنش
    </div>
</div>
<div id="btn_open_detail2" class="c-profile-order__payment-records js-payment-records">
    <div class="c-profile-order__payment-records-row">
        <div class="c-profile-order__payment-record c-profile-order__payment-record--title">تاریخ</div>
        <div class="c-profile-order__payment-record c-profile-order__payment-record--title">توضیحات</div>
        <div class="c-profile-order__payment-record c-profile-order__payment-record--title">وضعیت</div>
        <div class="c-profile-order__payment-record c-profile-order__payment-record--title">مبلغ</div>
    </div>
    @foreach($payments as $payment)
    <div class="c-profile-order__payment-records-row">
        <div class="c-profile-order__payment-record">
            {{\App\Models\PersianNumber::translate(jdate($payment->created_at)->format(' %d %B %Y'))}}
        </div>
        <div class="c-profile-order__payment-record">
            <div>پرداخت مبلغ سفارش</div>
            <div>پرداخت توسط
            {{$payment->driver}}
            </div>
        </div>
        @if ($payment->status ==1)
            <div
                class="c-profile-order__payment-record c-profile-order__payment-record-status c-profile-order__payment-record-status--positive"></div>

        @else
            <div
                class="c-profile-order__payment-record c-profile-order__payment-record-status c-profile-order__payment-record-status--negative"></div>
        @endif

        <div class="c-profile-order__payment-record">
            {{\App\Models\PersianNumber::translate(number_format($payment->total_price))}}
        </div>
    </div>
    @endforeach

</div>
<div class="o-box__separator"></div>
<script>
    function btn_open_detail() {
        if(document.getElementById("btn_open_detail1").classList.contains('js-payment-records-btn')){
            document.getElementById("btn_open_detail1").classList.remove("js-payment-records-btn");
            document.getElementById("btn_open_detail1").classList.add("js-payment-records-btn_open");
            document.getElementById("btn_open_detail2").style = "display: block !important; ";
        }else {
            document.getElementById("btn_open_detail1").classList.remove("js-payment-records-btn_open");
            document.getElementById("btn_open_detail1").classList.add("js-payment-records-btn");
            document.getElementById("btn_open_detail2").style = "display: none !important; ";
        }

    }
</script>
