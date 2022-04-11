<section class="o-page__content">
    <div class="c-profile-navbar">
        <a href="/profile/orders-return/{{$order_number}}/select-items/"
           class="c-profile-navbar__btn-back">بازگشت</a>
        <h4>تکمیل اطلاعات مرجوعی</h4>
    </div>
    <form class="c-profile-return js-order-return-items-form"
          wire:submit.prevent="itemReturnedOrder"
          enctype="multipart/form-data">
        @foreach(\App\Models\ReturnOrder::where('order_number', $order_number)->
        where('status',0)->get() as $return_order)
            <section class="c-profile-return__box js-item-return">
                <div class="c-profile-return__order-product">
                    <div class="c-profile-return__order-product-image-container">
                        <img
                            class="c-profile-return__order-product-image"
                            src="/storage/{{$return_order->order->product->img}}"
                            alt="{{$return_order->order->product->title}} ">
                    </div>
                    <div class="c-profile-return__order-product-desc">
                        <div class="c-profile-return__order-product-name">
                            {{$return_order->order->product->title}}
                        </div>
                        <div class="c-profile-return__order-product-details"><span
                                class="c-profile-return__order-product-label">فروشنده: </span><span
                                class="c-profile-return__order-product-value">
                            {{$return_order->order->vendor->name}}</span>
                        </div>
                        <div class="c-profile-return__order-product-details"></div>
                        <div class="c-profile-return__wrapper  js-item-return-details-form">
                            <div class="c-profile-return__row c-profile-return__row--grid">
                                <div class="c-profile-return__col">
                                    <label for="item-count-381183728"
                                           class="c-form-checkout__title">تعداد
                                        مرجوعی</label>
                                    <div id="op_1" onclick="op_one()"
                                         class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-amount selectric-js-must-fill">

                                        <div class="selectric">
                                            <select style="border: none"
                                                    wire:model.defer="returnOrder.count"
                                                    class="c-ui-select js-ui-select-amount js-must-fill"
                                                    name="items[381183728][quantity]"
                                                    tabindex="-1">
                                                <option value="" class="placeholder">لطفا تعداد مرجوعی را انتخاب کنید.
                                                </option>
                                                <option value="1" selected="">
                                                    ۱ عدد از ۱ عدد
                                                </option>
                                            </select>
                                        <input class="u-hidden" tabindex="0"></div>
                                </div>
                                </div>

                                <div class="c-profile-return__col">
                                    <label for="item-reason-381183728"
                                           class="c-form-checkout__title">علت
                                        مرجوعی</label>
                                    <div id="op_2" onclick="op_two()"
                                         class="selectric-wrapper selectric-c-ui-select selectric-c-ui-select-radios selectric-js-ui-select-reason selectric-js-must-fill selectric-js-return-reason">

                                        <div class="selectric">
                                           <select wire:model.defer="returnOrder.item_reason" style="border: none"
                                                   class="c-ui-select c-ui-select-radios "
                                                   name="items[381183728][reason]"
                                                   tabindex="-1">
                                               <option value="" class="placeholder">لطفا علت مرجوعی را انتخاب کنید.
                                               </option>
                                               @foreach(\App\Models\ReturnReason::all() as $return_reason)
                                               <option value="{{$return_reason->id}}" data-mandatory-picture="">
                                                   {{$return_reason->reason}}
                                               </option>
                                               @endforeach

                                           </select>
                                       </div>
                                        <input class="u-hidden" tabindex="0"></div>
                                    <div class="c-profile-return__form-suggest">در صورت وجود چند علت، در توضیحات این علل
                                        را
                                        بنویسید
                                    </div>
                                </div>
                            </div>
                            <div class="c-profile-return__row c-profile-return__row--grid">
                                <div class="c-profile-return__col"><label class="c-form-checkout__title"
                                                                          for="item-reasons-381183728">توضیحات <span
                                            class="c-profile-return__form-required">(اجباری)</span></label>
                                    <textarea wire:model.defer="returnOrder.detail"
                                              id="item-reasons-381183728" class="c-ui-textarea__field "
                                              name="items[381183728][comment]"
                                              placeholder="با نوشتن علت مرجوعی کالا، فرآیند مرجوعی سریعتر انجام می‌شود"
                                              maxlength="300"></textarea></div>
                                <div class="c-profile-return__col">
                                    <div class="c-profile-return__row">
                                        <label for="item-files-381183728"
                                               class="c-form-checkout__title">ارسال عکس
                                            <span
                                                class="c-profile-return__form-required "
                                                style="display: none"><span
                                                    class="c-profile-return__form-required">(اجباری)</span></span></label>
                                    </div>
                                    <label for="item-files-381183728" class="c-profile-return__upload-label">ارسال
                                        عکس</label>
                                    <div class="c-profile-return__form-suggest">با ارسال عکس، درخواست مرجوعی دقیق‌تر
                                        بررسی
                                        می شود.
                                    </div>
                                    <input id="item-files-381183728" type="file"
                                           wire:model.defer="img"
                                           class="c-profile-return__upload-origin "
                                           accept="image/jpeg,image/png" name="items[381183728][file]">
                                    <div class="c-profile-return__upload-item-container ">
                                        <div class="c-profile-return__upload-img js-thumbnail is-hidden">


                                            <div class="c-profile-return__upload-remove js-remove-file"></div>
                                            <div class="c-profile-return__upload-loading js-upload-loading">
                                                <div class="lds-ring">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="items[381183728][itemId]" value="8512833"></div>
                    </div>
                </div>
            </section>
        @endforeach
        <div class="c-profile-return__row c-profile-return__row--top-gap c-profile-return__row--left">
            <button href="#" type="submit"
                    class="c-profile-return__btn c-profile-return__btn--larger c-profile-return__btn--blue js-order-return-items-info"
                    data-return-request-id="6145432" style="width: 300px" >تایید اطلاعات
            </button>
        </div>
    </form>
</section>
@include('livewire.home.profile.order.detail.js')
