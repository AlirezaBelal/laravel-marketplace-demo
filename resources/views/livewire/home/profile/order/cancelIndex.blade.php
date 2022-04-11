<section class="o-page__content">
    <div class="o-box">
        <div class="o-box__header"><span class="o-box__title">تاریخچه سفارشات</span></div>
        @include('livewire.home.profile.order.tabs')
        <div class="c-profile-order__content js-ui-tab-content">
            @foreach(\App\Models\Order::where('user_id',auth()->user()->id)->where('status','cancel')->get() as $payment)
                <div class="c-profile-order__list-item">
                    <div class="c-profile-order__list-item-details">
                        <div class="c-profile-order__list-item-details-top ">
                            <div class="c-profile-order__list-item-details-row">
                                <div
                                    class="c-profile-order__list-item-detail">{{\App\Models\PersianNumber::translate(jdate($payment->created_at)->format(' %d %B %Y'))}}</div>
                                <div class="c-profile-order__list-item-detail">
                                    DKC-{{\App\Models\PersianNumber::translate($payment->order_number)}}</div>
                                <div class="c-profile-order__list-item-detail">در انتظار پرداخت</div>
                            </div>
                            <a class="o-link o-link--has-arrow"
                               href="/profile/my-orders/{{\App\Models\PersianNumber::translate($payment->order_number)}}">مشاهده
                                سفارش</a></div>
                        <div class="c-profile-order__list-item-details-row">
                            <div
                                class="c-profile-order__list-item-detail c-profile-order__list-item-detail--currency">
                                <span class="c-profile-order__list-item-detail-title">مبلغ کل:</span>
                                {{\App\Models\PersianNumber::translate(number_format($payment->total_price))}}
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item-parcels">
                        <div class="c-profile-order__list-item-parcel">
                            <div class="c-profile-order__list-item-parcel-top">
                                <div class="c-profile-order__list-item-parcel-details">
                                    <div class="c-profile-order__list-item-parcel-title">مرسوله ۱ از
                                        {{\App\Models\PersianNumber::translate(\App\Models\Order::where('order_number',$payment->order_number)->count())}}</div>
                                    <div class="c-profile-order__list-item-parcel-date-time"></div>
                                </div>
                            </div>

                            <div class="c-profile-order__list-item-parcel-products">
                                @foreach(\App\Models\Order::where('order_number',$payment->order_number)->get() as $order)
                                    <a
                                        href="/product/dkp-{{$order->product->id}}/{{$order->product->link}}"
                                        class="c-profile-order__list-item-parcel-product"><img
                                            src="/storage/{{$order->product->img}}"
                                            alt="{{$order->product->title}} ">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <div class="c-pager js-pagination"></div>
        <div class="js-search-results"></div>
    </div>
</section>
