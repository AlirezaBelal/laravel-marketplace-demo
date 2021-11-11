<div class="c-table-orders">
    @if (auth()->user()->order)
        <div class="o-headline o-headline--profile"><span>آخرین سفارش‌ها </span></div>
        <div class="c-table-orders__head c-table-orders__head--highlighted">
            <div class="c-table-orders__row">
                <div class="c-table-orders__cell c-table-orders__cell--hash">#</div>
                <div class="c-table-orders__cell c-table-orders__cell--id">شماره سفارش</div>
                <div class="c-table-orders__cell c-table-orders__cell--date">تاریخ ثبت سفارش
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--price">مبلغ قابل پرداخت
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--price">مبلغ کل</div>
                <div class="c-table-orders__cell c-table-orders__cell--payment">عملیات پرداخت
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--detail"> جزییات</div>
            </div>
        </div>
        <div class="c-table-orders__body">
            <div class="c-table-orders__row">
                <div class="c-table-orders__cell c-table-orders__cell--hash">۱</div>
                <div class="c-table-orders__cell c-table-orders__cell--id">DKC-218250065</div>
                <div class="c-table-orders__cell c-table-orders__cell--date">۲۵ شهریور ۱۴۰۰
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--price">
                    <div>۰</div>
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--price">۱,۵۸۹,۲۰۰
                    تومان
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--payment"><span
                        class="c-table-orders__payment-status c-table-orders__payment-status--ok">پرداخت موفق</span>
                </div>
                <div class="c-table-orders__cell c-table-orders__cell--detail"><a
                        href="/profile/orders/125050719/" class="btn-order-more"></a></div>
            </div>
            <a href="/profile/orders/" class="c-table-orders__show-more">مشاهده لیست
                سفارش‌ها</a></div>
    @else
        <div class="o-headline o-headline--profile"><span>آخرین سفارش‌ها </span></div>
        <div class="c-profile-empty">
            موردی برای نمایش وجود ندارد!
        </div>
    @endif

</div>
