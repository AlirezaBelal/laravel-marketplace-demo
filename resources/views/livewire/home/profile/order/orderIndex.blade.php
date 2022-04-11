<section class="o-page__content">
    <div class="o-box">
        <div class="o-box__header"><span class="o-box__title">تاریخچه سفارشات</span></div>
        @include('livewire.home.profile.order.tabs')
        @if (\App\Models\Payment::where('user_id',auth()->user()->id)->first() == null)


            <div class="c-profile-order__content js-ui-tab-content">
                <div class="c-profile-empty-temporary">
                    <div class="c-profile-empty-temporary__img"><img
                            src="https://www.digikala.com/static/files/d4fa2ec1.svg"></div>
                    <div class="c-profile-empty-temporary__desc">
                        سفارش فعالی در این بخش وجود ندارد.
                    </div>
                </div>
            </div>
        @else
            <div class="c-profile-order__content js-ui-tab-content">
                @foreach(\App\Models\Order::where('user_id',auth()->user()->id)->
                    where('status','wait')->get() as $payment)
                    @php
                        $date1 = new DateTime(\Illuminate\Support\Carbon::now());
                        $dete2 = new DateTime($payment->updated_at);
                        $diff = $dete2->diff($date1);
                        $time= $diff->format('%h')
                    @endphp
                    @if ($time <1)
                        @if (\App\Models\Order::where('user_id',auth()->user()->id)
                        ->where('order_number',$payment->order_number)->count() > 2)
                            @php
                                $count = 0;
                                $count++;
                            @endphp
                            @if ($count ==1)
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
                                    @php
                                        $date3 = new DateTime(\Illuminate\Support\Carbon::now());
                                        $dete4 = new DateTime($payment->updated_at);
                                        $diff = $date3->diff($dete4);
                                        $time2= $diff->format('%i')
                                    @endphp
                                    <div
                                        class="c-profile-order__list-item-actions c-profile-order__list-item-actions--between">
                                        <a
                                            wire:click="PaymentBank({{$payment->id}})"
                                            class="o-btn o-btn--contained-red-md">پرداخت</a>
                                        <div class="c-profile-order__warning">در صورت عدم پرداخت تا
                                            {{\App\Models\PersianNumber::translate(60-$time2)}}
                                            دقیقه دیگر،تمام یا بخشی از
                                            این
                                            سفارش به‌صورت خودکار لغو خواهد شد.
                                        </div>
                                    </div>
                                </div>
                                @php
                                    break;
                                @endphp
                            @endif

                        @else
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
                                @php
                                    $date3 = new DateTime(\Illuminate\Support\Carbon::now());
                                    $dete4 = new DateTime($payment->updated_at);
                                    $diff = $date3->diff($dete4);
                                    $time2= $diff->format('%i')
                                @endphp
                                <div
                                    class="c-profile-order__list-item-actions c-profile-order__list-item-actions--between">
                                    <a
                                        wire:click="PaymentBank({{$payment->id}})"
                                        class="o-btn o-btn--contained-red-md">پرداخت</a>
                                    <div class="c-profile-order__warning">در صورت عدم پرداخت تا
                                        {{\App\Models\PersianNumber::translate(60-$time2)}}
                                        دقیقه دیگر،تمام یا بخشی از
                                        این
                                        سفارش به‌صورت خودکار لغو خواهد شد.
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif

                @endforeach
            </div>
        @endif
        <div class="c-pager js-pagination"></div>
        <div class="js-search-results"></div>
    </div>
</section>
