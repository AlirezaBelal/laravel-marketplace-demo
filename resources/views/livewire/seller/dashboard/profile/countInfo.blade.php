<div class="c-RD-profile__dis-none" data-name="contactInfo" style="display: none;">


    <div id="contactInfo">
        <div class="c-grid__row c-RD-profile__mt-0">
            <div class="c-grid__col js-profile-contact-form js-profile-content-spinner">
                <div class="c-card c-RD-profile__bdrs-top-0 " id="profile-step-3"
                     style="box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.05);">
                    <div class="c-card__body c-card__body--form js-location-container">
                        <div class="c-grid__row">
                            <div
                                class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-10 c-RD-profile__section-title">
                                <span class="c-RD-profile__title">اطلاعات تماس و آدرس</span>
                            </div>

                            <div
                                class="c-RD-profile__action-btn c-RD-profile__action-btn--cancel js-profile-cancel-edit-form uk-hidden"></div>

                        </div>
                        <div class="c-ui-form__row c-ui-form__row--extra-gap">
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                <label class="c-RD-profile__input-name">ایمیل</label>

                                <div class="c-ui-input ">


                                    <input type="text" name=""
                                           class="c-ui-input__field c-ui-input__RD-field"
                                           value="{{$seller->email}}" data-no-access="{disable : true}"
                                           readonly="" tabindex="-1" disabled="">


                                </div>

                            </div>
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs">
                                <label class="c-RD-profile__input-name">تلفن همراه</label>

                                <div class="c-ui-input ">


                                    <input type="text" name=""
                                           class="c-ui-input__field c-ui-input__RD-field"
                                           value="{{$seller->mobile}}"
                                           data-no-access="{disable : true}"
                                           >


                                </div>

                            </div>
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                <label class="c-RD-profile__input-name"
                                       for="profile[website]">وب سایت</label>

                                <div class="c-ui-input ">


                                    <input type="text" name="contactInfo[website]"
                                           class="c-ui-input__field c-ui-input__RD-field"
                                           id="contactInfo[website]"
                                           wire:model.defer="website"
                                           value="{{$seller->website}}" placeholder="{{$seller->website}}"
                                            >


                                </div>

                            </div>
                        </div>
                        <div class="c-ui-form__row c-ui-form__row--extra-gap">
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                <label class="c-RD-profile__input-name">استان</label>
                                <select
                                    class="c-ui-select c-ui-select--common c-ui-select--small c-RD-profile js-profile-contact-state-select"
                                    name="contactInfo[state_id]" id="select-state"
                                    data-id="{address.state.id}" data-index="{index}"
                                    data-no-access="{registerStatus : approved}"
                                    disabled="true">
                                    <option value="{id}"></option>
                                    <option value=""></option>
                                    <option value="2" data-code="041">آذربایجان شرقی
                                    </option>
                                    <option value="3" data-code="044">آذربایجان غربی
                                    </option>
                                    <option value="4" data-code="045">اردبیل</option>
                                    <option value="5" data-code="031">اصفهان</option>
                                    <option value="6" data-code="026">البرز</option>
                                    <option value="7" data-code="084">ایلام</option>
                                    <option value="8" data-code="077">بوشهر</option>
                                    <option value="9" data-code="021">تهران</option>
                                    <option value="10" data-code="038">چهار محال و بختیاری
                                    </option>
                                    <option value="11" data-code="056">خراسان جنوبی</option>
                                    <option value="12" data-code="051">خراسان رضوی</option>
                                    <option value="13" data-code="058">خراسان شمالی</option>
                                    <option value="14" data-code="061">خوزستان</option>
                                    <option value="15" data-code="024">زنجان</option>
                                    <option value="16" data-code="023">سمنان</option>
                                    <option value="17" data-code="054">سیستان و بلوچستان
                                    </option>
                                    <option value="18" data-code="071">فارس</option>
                                    <option value="19" data-code="028">قزوین</option>
                                    <option value="20" data-code="025">قم</option>
                                    <option value="21" data-code="087">کردستان</option>
                                    <option value="22" data-code="034">کرمان</option>
                                    <option value="23" data-code="083">کرمانشاه</option>
                                    <option value="24" data-code="074">کهگیلویه و بویراحمد
                                    </option>
                                    <option value="25" data-code="017">گلستان</option>
                                    <option value="26" data-code="013">گیلان</option>
                                    <option value="27" data-code="066">لرستان</option>
                                    <option value="28" data-code="011">مازندران</option>
                                    <option value="29" data-code="086">مرکزی</option>
                                    <option value="30" data-code="076">هرمزگان</option>
                                    <option value="31" data-code="081">همدان</option>
                                    <option value="32" data-code="035">یزد</option>

                                </select>
                            </div>
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                <label class="c-RD-profile__input-name">شهر</label>
                                <select
                                    class="c-ui-select c-ui-select--common c-ui-select--small c-RD-profile js-profile-contact-city-select"
                                    name="contactInfo[city_id]" id="select-city"
                                    data-id="{address.city.id}"
                                    data-no-access="{registerStatus : approved}"
                                    disabled="true">
                                    <option value="{id}"></option>
                                </select>

                            </div>
                        </div>

                        <div class="c-ui-form__row c-ui-form__row--extra-gap">
                            <div class="c-ui-form__col c-ui-form__col--12">
                                <label class="c-RD-profile__input-name"
                                       for="profile[address_address]">آدرس</label>
                                <div
                                    class="c-ui-form__row c-ui-form__row--group c-ui-form__row--nowrap c-ui-form__row--wrap-xs">
                                    <div
                                        class="c-ui-form__col c-ui-form__col--12 c-ui-form__col--group-item  c-ui-form__col--shrink">

                                        <div class="c-ui-input ">


                                            <input type="text" name="contactInfo[address]"
                                                   wire:model.defer="address"
                                                   class="c-ui-input__field c-ui-input__RD-field"
                                                   id="contactInfo[address]"
                                                   value=" "
                                                   data-no-access="{registerStatus : approved}"
                                                   readonly="" tabindex="-1" disabled="">


                                        </div>

                                        <div
                                            class="c-RD-profile__tool-tip-container js-profile-contact-address-tootip uk-hidden">
                                                                        <span
                                                                            class="c-RD-profile__contract-tool-tip js-dropdown-desc"></span>
                                            <div
                                                class="c-rating-chart__description-tooltip c-rating-chart__description-tooltip--right uk-dropdown"
                                                uk-dropdown="boundary: .js-dropdown-desc; pos: bottom-left"
                                                style="width: 260px !important;">
                                                <p style="    font-size: 12px;padding-bottom: 6px;">
                                                    برای تغییر آدرس می‌بایست روزنامه رسمی
                                                    خود را به روز‌رسانی کنید
                                                </p>
                                                <a href="#docUpload"
                                                   class="c-RD-profile__action-btn c-RD-profile__action-btn--outline uk-text-nowrap js-profile-contact-address-change"
                                                   style="margin: auto;font-size:12px">
                                                    به روزرسانی روزنامه رسمی
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="c-ui-form__row c-ui-form__row--extra-gap">
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                <label class="c-RD-profile__input-name"
                                       for="profile[post_code]">کد پستی</label>

                                <div class="c-ui-input ">


                                    <input type="text" name="contactInfo[postal_code]"
                                           class="c-ui-input__field c-ui-input__RD-field accept-only-digits js-editable-field"
                                           id="contactInfo[postal_code]"

                                           minlength="10" maxlength="10"
                                           data-no-access="{registerStatus : approved}"
                                           readonly="" tabindex="-1" disabled=""
                                           data-exceptions="9">


                                </div>

                            </div>
                            <div
                                class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs">
                                <label class="c-RD-profile__input-name"
                                       for="profile[phone]">تلفن ثابت</label>
                                <div
                                    class="c-ui-form__col c-ui-form__col--12 c-ui-form__col--group-item c-ui-form__col--shrink">

                                    <div class="c-ui-input ">


                                        <input type="text" name="contactInfo[phone]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="contactInfo[phone]"
                                               wire:model.defer="telephone"
                                               minlength="12" maxlength="12"
                                               data-no-access="{registerStatus : approved}"
                                            >


                                    </div>

                                </div>
                            </div>

                        </div>
                        <div
                            class="c-ui-form__row c-RD-profile__form-action js-profile-form-action uk-hidden">
                            <div
                                class="c-RD-profile__cancel-btn uk-flex uk-flex-center uk-flex-middle js-profile-cancel-edit-form">
                                بازگشت
                            </div>
                            <div
                                class="c-RD-profile__approve-btn uk-flex uk-flex-center uk-flex-middle uk-margin-small-right js-profile-submit-changes">
                                ثبت تغییرات
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-grid__row c-RD-profile__mt-0" style="padding-top: 25px">
            <div class="c-grid__col">
                <div class="c-card" id="profile-step-3">
                    <div class="c-card__body c-card__body--form js-warehouse-form"
                         style="padding-top: 32px;">
                        <div class="c-grid__row">
                            <div
                                class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-8 c-RD-profile__section-title">
                                <span class="c-RD-profile__title">اطلاعات انبارها</span>
                            </div>

                            <div
                                class="c-RD-profile__action-btn c-RD-profile__action-btn--cancel js-profile-cancel-edit-form uk-hidden"></div>

                        </div>


                        <div
                            class="c-profile__warehouse js-location-container  js-profile-warehouse-form">
                            <div data-warehouse-id="{index}" data-contacts-validation="">
                                <div
                                    class="c-ui-form__row c-ui-form__row--extra-gap c-RD-profile--mt-20">
                                    <div
                                        class="uk-flex uk-flex-left c-ui-form__col c-ui-form__col--6 c-ui-form__col--xs-12">
                                        <div class="c-RD-profile__gray-title">
                                                                        <span
                                                                            class="c-RD-profile__title c-RD-profile--w-fc js-profile-contact-warehouse-title-{index}">انبار شماره
                                                                        {{\App\Models\PersianNumber::translate(auth()->user()->id)}}
                                                                        </span>
                                        </div>
                                        <div
                                            class="c-ui-form__col c-ui-form__col--wrap-xs c-ui-form__col--pull-left uk-margin-remove-right uk-hidden">
                                            <div class="c-RD-profile__delete-warehouse c-RD-profile__delete-warehouse--danger
                        js-profile-delete-warehouse" data-id="{index}" data-name="{title}" data-row="{row}"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="c-ui-form__col c-ui-form__col--6 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs c-RD-profile__center-end">
                                        <label
                                            class="c-ui-form__label c-RD-profile--ml-12 c-RD-profile--mb-0">انبار
                                            مرجوعی</label>

                                        <div class="c-ui-toggle__group">


                                            <label class="c-ui-toggle">
                                                <input
                                                    class="c-ui-toggle__origin js-profile-warehouse-retrun-button-{index}"
                                                    type="checkbox"
                                                    wire:click="updateRet({{auth()->user()->id}})"

                                                    @if(\App\Models\Store::where('user_id',auth()->user()->id)->first())
                                                    @if(\App\Models\Store::where('user_id',auth()->user()->id)->first()->store_back == 1)
                                                    value="1" checked
                                                    @else
                                                    value="0"
                                                        @endif
                                                        @endif
                                                      >
                                                <span class="c-ui-toggle__check"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div
                                    class="uk-flex-bottom c-ui-form__row c-profile__warehouse-actions js-warehouse-action">
                                    <div
                                        class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                        <label class="c-RD-profile__input-name">نام
                                            انبار</label>

                                        <div class="c-ui-input ">



                                            <input type="text"    wire:model.defer="store_name"
                                                   name="contactInfo[warehouses.title#{index}]"
                                                   class="c-ui-input__field c-ui-input__RD-field js-editable-field js-warehouse-name"
                                                   id="contactInfo[warehouses.title#{index}]"
                                                   value="{{$this->store_name}}" maxlength="20"
                                                 >


                                        </div>

                                    </div>
                                    <div
                                        class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                        <label
                                            class="c-RD-profile__input-name">استان</label>
                                        <input type="text"    wire:model.defer="store_state"
                                               name="contactInfo[warehouses.title#{index}]"
                                               class="c-ui-input__field c-ui-input__RD-field js-editable-field js-warehouse-name"
                                               id="contactInfo[warehouses.title#{index}]"
                                               value="{{$this->store_state}}" maxlength="20"
                                        >
                                    </div>
                                    <div
                                        class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                        <label class="c-RD-profile__input-name">شهر</label>
                                        <input type="text"    wire:model.defer="store_city"
                                               name="contactInfo[warehouses.title#{index}]"
                                               class="c-ui-input__field c-ui-input__RD-field js-editable-field js-warehouse-name"
                                               id="contactInfo[warehouses.title#{index}]"
                                               value="{{$this->store_city}}" maxlength="20"
                                        >

                                    </div>
                                </div>
                                <div class="c-ui-form__row c-ui-form__row--extra-gap">
                                    <div class="c-ui-form__col c-ui-form__col--12">
                                        <label class="c-RD-profile__input-name"
                                               for="contactInfo[warehouses.address#{index}]">آدرس</label>
                                        <div
                                            class="c-ui-form__row c-ui-form__row--group c-ui-form__row--nowrap c-ui-form__row--wrap-xs">
                                            <div
                                                class="c-ui-form__col c-ui-form__col--12 c-ui-form__col--group-item  c-ui-form__col--shrink">

                                                <div class="c-ui-input ">


                                                    <input type="text"
                                                           wire:model.defer="store_address"
                                                           name="contactInfo[warehouses.address#{index}]"
                                                           class="c-ui-input__field c-ui-input__RD-field"
                                                           id="contactInfo[warehouses.address#{index}]"
                                                           value="{{$this->store_address}}"
                                                           >


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-ui-form__row c-ui-form__row--extra-gap">
                                    <div
                                        class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                        <label class="c-RD-profile__input-name"
                                               for="contactInfo[warehouses.postal_code#{index}]">کد
                                            پستی</label>

                                        <div class="c-ui-input ">


                                            <input type="text"
                                                   wire:model.defer="store_code"
                                                   name="contactInfo[warehouses.postal_code#{index}]"
                                                   class="c-ui-input__field c-ui-input__RD-field accept-only-digits js-input-with-fa-number"
                                                   id="contactInfo[warehouses.postal_code#{index}]"

                                                   minlength="10" maxlength="10"
                                                   value="{{$this->store_code}}"
                                                   data-exceptions="9">


                                        </div>

                                    </div>
                                    <div
                                        class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs">
                                        <label class="c-RD-profile__input-name"
                                               for="contactInfo[warehouses.phone#{index}]">تلفن
                                            ثابت</label>
                                        <div
                                            class="c-ui-form__col c-ui-form__col--12 c-ui-form__col--group-item c-ui-form__col--shrink">

                                            <div class="c-ui-input ">


                                                <input type="text"
                                                       wire:model.defer="store_telephone"
                                                       name="contactInfo[warehouses.phone#{index}]"
                                                       class="c-ui-input__field c-ui-input__RD-field"
                                                       id="contactInfo[warehouses.phone#{index}]"
                                                       value="{{$this->store_telephone}}"
                                                       minlength="12" maxlength="12"
                                                        tabindex="-1">


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="profile-warehouse-delete"
                             uk-modal="esc-close:false;bg-close:false;"
                             class="c-RD-profile__profile-modal uk-modal">
                            <div class="uk-modal-dialog">
                                <button
                                    class="uk-modal-close-default c-RD-profile__profile-modal-close uk-close uk-icon"
                                    type="button" uk-close="ratio: 1.5">
                                    <svg width="21" height="21" viewBox="0 0 14 14"
                                         xmlns="http://www.w3.org/2000/svg" ratio="1.5">
                                        <line fill="none" stroke="#000" stroke-width="1.1"
                                              x1="1" y1="1" x2="13" y2="13"></line>
                                        <line fill="none" stroke="#000" stroke-width="1.1"
                                              x1="13" y1="1" x2="1" y2="13"></line>
                                    </svg>
                                </button>
                                <div class="c-RD-profile__profile-modal-alignment">
                                    <p class="c-RD-profile__profile-modal-title uk-text-center">
                                        آیا از حذف “{title}” اطمینان دارید؟</p>
                                </div>
                                <div
                                    class="c-ui-checkbox c-RD-profile__profile-modal-action uk-flex uk-flex-center uk-margin-remove-top">
                                    <div
                                        class="c-ui-btn c-ui-btn--danger uk-flex uk-flex-center uk-flex-middle uk-width-1-5 js-profile-delete-warehouse-btn">
                                        حذف انبار
                                    </div>
                                    <div
                                        class="c-ui-btn uk-flex uk-flex-center uk-flex-middle uk-margin-small-right uk-width-1-5 uk-modal-close">
                                        بازگشت
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="c-ui-form__row c-RD-profile__form-action js-profile-form-action ">
                            <div
                                class="c-RD-profile__cancel-btn uk-flex uk-flex-center uk-flex-middle js-profile-cancel-edit-form">
                                بازگشت
                            </div>
                            <button type="submit"
                                class="c-RD-profile__approve-btn uk-flex uk-flex-center uk-flex-middle uk-margin-small-right js-profile-submit-changes">
                                ثبت تغییرات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="c-RD-profile__dis-none" data-name="contractInfo" style="display: none;">


    <div class="c-grid__row c-RD-profile__mt-0" id="contractInfo">
        <div class="c-grid__col">
            <div class="c-card c-RD-profile__bdrs-top-0 js-profile-content-spinner"
                 id="profile-step-4" style="box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.05);">
                <div class="c-card__header c-card__header--with-controls uk-hidden">

                </div>
                <div class="c-card__body c-card__body--form">
                    <div class="c-grid__row">
                        <div class="uk-width-1-1 c-grid__col c-RD-profile__section-title">
                            <span class="c-RD-profile__title">اطلاعات قرارداد</span>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-2">

                        </div>
                    </div>
                    <div class="c-ui-form__row">
                        <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                            <label class="c-RD-profile__input-name" for="training_status">وضعیت
                                قرارداد</label>
                            <div
                                class="c-RD-profile__contract-status c-RD-profile__contract-status--confirmed js-confirmed-contract uk-hidden">
                                پذیرفته شده
                            </div>
                            <div
                                class="c-RD-profile__contract-status c-RD-profile__contract-status--rejected js-rejected-contract uk-hidden">
                                پذیرفته نشده
                            </div>

                        </div>
                        <div
                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-6 c-RD-profile__ai-fe js-profile-contract-again-review">
                            <a id="review-contract-btn"
                               class="c-reg-form__submit-btn c-reg-form__submit-btn--secondary c-reg-form__submit-btn--inline  c-RD-profile__action-button-size"
                               target="_blank"
                               data-ui-tooltip="در صورت تمایل میتوانید قرارداد خود را مجددا بررسی کنید.">
                                نمایش قرارداد
                            </a>
                        </div>
                    </div>
                    <div class="c-ui-form__row c-ui-form__row--extra-gap">
                        <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                            <label class="c-RD-profile__input-name"
                                   for="seller-contract-number">شماره قرارداد</label>

                            <div class="c-ui-input ">


                                <input type="text" name=""
                                       class="c-ui-input__field c-ui-input__RD-field"
                                       id="seller-contract-number" value="123"
                                       readonly="" tabindex="-1" >


                            </div>

                        </div>
                        <div
                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-6 c-RD-profile__ai-fe">
                            <a id="download-contract-btn"
                               class="c-reg-form__submit-btn c-reg-form__submit-btn--secondary c-reg-form__submit-btn--inline c-RD-profile__action-button-size js-profile-contract-download"
                               target="_blank"
                               data-ui-tooltip="قرارداد آنلاین (شرایط همکاری) جهت مشاهده شما است و نیازی به چاپ و ارسال نسخه آنلاین نیست.">دانلود
                                قرارداد</a>
                        </div>
                    </div>

                    <div class="c-ui-form__row c-ui-form__row--extra-gap">
                        <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                            <label class="c-RD-profile__input-name"
                                   for="contract-start-date">تاریخ شروع قرارداد</label>

                            <div class="c-ui-input ">


                                <input type="text" name=""
                                       class="c-ui-input__field c-ui-input__RD-field"
                                       id="contract-start-date" value=""
                                      tabindex="-1">


                            </div>

                        </div>
                        <div
                            class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs">
                            <label class="c-RD-profile__input-name" for="contract-end-date">تاریخ
                                پایان قرارداد</label>

                            <div class="c-ui-input ">


                                <input type="text" name=""
                                       class="c-ui-input__field c-ui-input__RD-field"
                                       id="contract-end-date" value="" readonly=""
                                       tabindex="-1">


                            </div>

                        </div>
                    </div>

                    <div class="c-ui-form__row c-ui-form__row--extra-gap">
                        <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                            <label class="c-RD-profile__input-name"
                                   for="contract-calculation-info">بازه محاسبه صورت
                                حساب</label>

                            <div class="c-ui-input ">


                                <input type="text" name=""
                                       class="c-ui-input__field c-ui-input__RD-field"
                                       id="contract-calculation-info"
                                       value=""
                                       readonly="" tabindex="-1" disabled="">


                            </div>

                        </div>
                        <div
                            class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs">
                            <label class="c-RD-profile__input-name"
                                   for="contract-payment-info">بازه پرداخت</label>

                            <div class="c-ui-input ">


                                <input type="text" name=""
                                       class="c-ui-input__field c-ui-input__RD-field"
                                       id="contract-payment-info"
                                       value=""
                                       readonly="" tabindex="-1" disabled="">


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
