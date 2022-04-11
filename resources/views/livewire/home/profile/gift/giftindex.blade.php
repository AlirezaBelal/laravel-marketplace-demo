<section class="o-page__content">
    <div class="o-box">
        <div class="o-box__header"><span class="o-box__title">کارت‌های هدیه</span></div>
        <div class="o-box__tabs o-box__tabs--full-width ">
            <div class="o-box__tab js-gift-cards-tab is-active" data-id="1" id="gifttab1" onclick="giftTab1()"
                 data-gtm-vis-recent-on-screen-9070001_346="7092" data-gtm-vis-first-on-screen-9070001_346="7092"
                 data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">کارت‌های هدیه
                فعال
            </div>
            <div class="o-box__tab js-gift-cards-tab" data-id="2" onclick="giftTab2()" id="gifttab2"
                 data-gtm-vis-recent-on-screen-9070001_346="7094"
                 data-gtm-vis-first-on-screen-9070001_346="7094" data-gtm-vis-total-visible-time-9070001_346="100"
                 data-gtm-vis-has-fired-9070001_346="1">کارت‌های هدیه استفاده شده
            </div>
        </div>
        <div class="c-profile-gifts">
            <div class="c-profile-gifts__cards-container js-gift-cards-content" id="gifts-content-1">
                <div class="c-profile-gifts__card c-profile-gifts__card--add-new">
                    <div class="c-profile-gifts__add-new-phrase js-gift-card-add"
                         onclick="giftCardModals()"
                    >افزودن کارت هدیه
                    </div>
                </div>
            </div>
            <div class="c-profile-gifts__cards-container js-gift-cards-content u-hidden" id="gifts-content-2">
                @foreach(\App\Models\Gift::where('user_id',auth()->user()->id)->where('type',1)->get() as $gift)
                    <div class="c-profile-gifts__card">
                        <div class="c-profile-gifts__card-header c-profile-gifts__card-header--disabled">

                            {{\App\Models\PersianNumber::translate($gift->code)}}
                            @if ($gift->value_price == 0)
                                <div class="c-profile-gifts__card-status">استفاده شده</div>
                            @else
                                <div class="c-profile-gifts__card-status">باقی مانده</div>
                            @endif

                        </div>
                        <div class="c-profile-gifts__card-content">
                            <div class="c-profile-gifts__card-item">
                                <div class="c-profile-gifts__card-item-title">تاریخ انقضا:</div>
                                <div class="c-profile-gifts__card-item-value">
                                    {{\App\Models\PersianNumber::translate(jdate($gift->date_expire)->format('%Y/%m/%d'))}}
                                </div>
                            </div>
                            <div class="c-profile-gifts__card-item">
                                <div class="c-profile-gifts__card-item-title">اعتبار اولیه:</div>
                                <div class="c-profile-gifts__card-item-value c-profile-gifts__card-item-value--toman">
                                    {{\App\Models\PersianNumber::translate($gift->price)}}
                                </div>
                            </div>
                            <div
                                class="c-profile-gifts__card-item js-gift-card-history c-profile-gifts__card-item--has-arrow "
                                data-id="649268" data-gtm-vis-first-on-screen-9070001_346="65894"
                                data-gtm-vis-total-visible-time-9070001_346="100"
                                data-gtm-vis-has-fired-9070001_346="1">
                                <div class="c-profile-gifts__card-item-title">اعتبار باقیمانده:</div>
                                <div class="c-profile-gifts__card-item-value c-profile-gifts__card-item-value--toman">
                                    {{\App\Models\PersianNumber::translate($gift->value_price)}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
