<div class="c-checkout-pack__row js-shipment-submit-type active"
     data-shipping-id="shipping-type-normal-0-1-1">
    <div class="c-checkout-time-table js-time-table">
        <div class="c-checkout-time-table__table-title">
            انتخاب زمان ارسال
        </div>
        <span class="js-package-shipping-cost u-hidden" data-price="0"
              data-cost-id="js-0-1-1-package-row-normal"
              data-post-payed="">
                    هزینه ارسال : <span class="">رایگان</span></span>
        <div class="c-time-table js-time-table-container js-dynamic-time-table-container">
            <div
                class="c-time-table__table swiper-container js-time-table-swiper swiper-container-horizontal swiper-container-rtl">
                <ul class=" swiper-wrapper">
                    @foreach(\App\Models\AddressTime::all() as $adtime)
                        <li class="swiper-slide c-time-table__day-details "
                            id="day-normal-0-1-1-1"><span class="c-time-table__day-name ">
                        {{$adtime->day}}
                    </span><span class="c-time-table__date">
                          {{\App\Models\PersianNumber::translate($adtime->date)}}
                    </span>
                            <ul class="c-time-table__hour-container">
                                <li class="c-outline-radio c-time-table__hour-item js-handle-dynamic-shipping-hour">
                                    <input type="radio" name="shipping[time_scopes][0-1-1]"

                                           value="{{$this->dateId =  $adtime->id}}"
                                           id="hour-radio-0-1-1-{{$adtime->id}}-normal">
                                    <label class="c-time-table__radio-label

                                            " for="hour-radio-0-1-1-{{ $adtime->id}}-normal"><span>
                                        بازه
                                          {{\App\Models\PersianNumber::translate($adtime->time)}}
                                          </span>
                                        <span
                                            class="c-time-table__hour-shipping-cost js-dynamic-shipping-cost"
                                            data-history-row-id=".js-0-1-1-package-row-normal"
                                            {{--                                            wire:click=""--}}
                                            data-dynamic-shipping-cost="{{ $adtime->price}}0">
                                         {{\App\Models\PersianNumber::translate(number_format(  $this->dPrice = $adtime->price))}}
                                                تومان
                                               </span>
                                    </label>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div
                    class="c-time-table__navigation c-time-table__navigation--prev js-swiper-button-prev swiper-button-disabled">
                    <div class="c-time-table__navigation-button"
                         data-icon="Icon-Navigation-Chevron-Right"></div>
                </div>
                <div
                    class="c-time-table__navigation c-time-table__navigation--next js-swiper-button-next swiper-button-disabled">
                    <div class="c-time-table__navigation-button"
                         data-icon="Icon-Navigation-Chevron-Left"></div>
                </div>
            </div>
        </div>

    </div>
</div>
