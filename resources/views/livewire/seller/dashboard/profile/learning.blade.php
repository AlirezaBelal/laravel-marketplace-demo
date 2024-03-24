<div class="c-grid__row c-RD-profile__mt-0" id="businessInfo">
    <div class="c-grid__col">
        <div class="c-card c-RD-profile__bdrs-top-0 js-profile-content-spinner"
             id="profile-step-1" style="box-shadow: 0 10px 12px 0 rgba(0, 0, 0, 0.05);">
            <div
                class="c-card__header c-card__header--with-controls business_info  uk-hidden">

            </div>
            <div class="c-card__body c-card__body--form">
                <div class="c-grid__row js-profile-business-info-form-section">


                    <div class="c-grid__row c-RD-profile__aife">
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <label class="c-RD-profile__input-name"
                                       for="training_status">وضعیت آموزش</label>
                                @if($seller->learning_status ==1)
                                    <div
                                        class="c-RD-profile__contract-status c-RD-profile__contract-status--confirmed js-passed-traning"
                                        data-show="{trainingStatus : finished}"
                                    >
                                        آموزش را گذرانده‌اید
                                    </div>
                                @elseif($seller->learning_status == null)
                                    <div
                                        class="c-RD-profile__contract-status c-RD-profile__contract-status--rejected js-rejected-traning"
                                        data-show="{trainingStatus : new}">
                                    <span class="uk-text-nowrap">
                                        ثبت‌نام نکرده‌اید
                                    </span>

                                        <div class="uk-width-1-1 uk-text-left">
                                   <span
                                       class="c-RD-profile__contract-tool-tip js-dropdown-desc"
                                       aria-expanded="false"></span>
                                            <div
                                                class="c-rating-chart__description-tooltip uk-dropdown uk-dropdown-stack uk-dropdown-bottom-center"
                                                uk-dropdown="boundary: .js-dropdown-desc; pos: bottom-center"
                                                style="left: 517.297px; top: 153px;">
                                                در صورت عدم گذراندن دوره آموزشی، برخی از
                                                امکانات پنل برای شما غیرفعال خواهد بود.
                                            </div>
                                        </div>
                                    </div>
                                @elseif($seller->learning_status == 0)
                                    <div
                                        class="c-RD-profile__contract-status c-RD-profile__contract-status--pending js-passed-traning"
                                        data-show="{trainingStatus : subscribed}"
                                    >
                                        شرکت نکرده اید
                                    </div>

                                @endif
                            </div>
                        </div>
                        @if( $seller->learning_status == null)
                            <div class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-6">
                                <div wire:click="addToLearning({{$seller->id}})"
                                     class="c-RD-profile__action-btn c-RD-profile__action-btn--outline c-RD-profile__asfe js-enroll-training "
                                     data-show="{trainingStatus : new}">ثبت نام دوره آموزشی
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="c-grid__row">
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <label class="c-RD-profile__input-name"
                                       for="seller-code">کد فروشنده</label>

                                <div class="c-ui-input ">


                                    <input type="text" name="" placeholder="{{$seller->code_seller}}"
                                           class="c-ui-input__field c-ui-input__RD-field"
                                          value="{{$seller->code_seller}}" readonly=""
                                          >


                                </div>

                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <label class="c-RD-profile__input-name"
                                       for="seller-type">نوع فروشنده</label>

                                <div class="c-ui-input ">


                                    <input type="text" name=""
                                           class="c-ui-input__field c-ui-input__RD-field"
                                           id="seller-type" value="{{$seller->type_seller}}" readonly=""
                                           tabindex="-1">


                                </div>

                            </div>
                        </div>

                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-last-name">نوع شرکت</label>

                                    <select
                                        class="c-ui-select c-ui-select--common c-ui-select--small c-RD-profile js-profile-business-company-type-select select2-hidden-accessible"
                                        name="businessInfo[companyType]"
                                        id="businessInfo[companyType]" disabled=""
                                        data-no-access="{registerStatus : approved}"
                                        placeholder="انتخاب"
                                        data-select2-id="businessInfo[companyType]"
                                        tabindex="-1" aria-hidden="true">

                                    </select><span
                                        class="select2 select2-container select2-container--default select2-container--disabled"
                                        dir="rtl" data-select2-id="7"
                                        style="width: auto;"><span
                                            class="selection"><span
                                                class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true"
                                                aria-expanded="false" tabindex="-1"
                                                aria-labelledby="select2-businessInfocompanyType-container"><span
                                                    class="select2-selection__rendered"
                                                    id="select2-businessInfocompanyType-container"
                                                    role="textbox"
                                                    aria-readonly="true"></span><span
                                                    class="select2-selection__arrow"
                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper"
                                            aria-hidden="true"></span></span>
                                </div>
                                <div data-show="{sellerType:private}">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-business-name">نام تجاری</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[businessName]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-business-name"
                                               value="{{$seller->brand_name}}"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-grid__row">


                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:private}">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-first-name">نام</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[firstName]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-first-name" value="{{$seller->name}}"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-business-name">نام تجاری</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[businessName]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-business-name"
                                               value="{{$seller->brand_name}}"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:private}">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-last-name">نام خانوادگی</label>

                                    <div class="c-ui-input ">


                                        <input type="text" name="businessInfo[lastName]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-last-name" value="{{$seller->lname}}"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-company-name">نام شرکت</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[companyName]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-company-name" value="{{$seller->company_name}}"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-company-representative">صاحبان حق
                                        امضا</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[companyAuthorizedRepresentative]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-company-representative"
                                               value=""
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                                <div data-show="{sellerType:private}">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-last-name">جنسیت</label>

                                    <select
                                        class="c-ui-select c-ui-select--common c-ui-select--small c-RD-profile js-profile-business-info-gender-select  "
                                        name="businessInfo[gender]"
                                        id="businessInfo[gender]" disabled=""
                                        data-no-access="{registerStatus : approved}"
                                        placeholder="انتخاب"
                                        data-select2-id="businessInfo[gender]"
                                        tabindex="-1" aria-hidden="true">
                                        @if($seller->gender =='male')
                                            <option value="male" data-select2-id="4">مرد
                                            </option>
                                        @else
                                            <option value="female" data-select2-id="5">زن
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-grid__row">
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4"
                             data-show="{sellerType:private}">
                            <div class="c-form">
                                <label class="c-RD-profile__input-name">تاریخ
                                    تولد:</label>

                                <div class="c-ui-input ">


                                    <input type="text" name="businessInfo[birthDate]"
                                           class="c-ui-input__field c-ui-input__RD-field js-profile-business-info-birth-date pwt-datepicker-input-element"
                                           value="{{\Morilog\Jalali\CalendarUtils::strftime('Y-m-d',strtotime($seller->birth))}}"
                                           data-no-access="{registerStatus : approved}"
                                           readonly="" tabindex="-1">


                                </div>

                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:private}">
                                    <label class="c-RD-profile__input-name"
                                           for="national-id-number">کد ملی</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[nationalIdentityNumber]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="national-id-number"
                                               value="{{$seller->national_code}}" minlength="10"
                                               maxlength="10"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="company-national-id-number">شناسه
                                        ملی</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[companyNationalIdentityNumber]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="company-national-id-number"
                                               value="{{$seller->shenasname_code}}"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:private}">
                                    <label class="c-RD-profile__input-name"
                                           for="identity-card-number">شماره
                                        شناسنامه</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[identityCardNumber]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="identity-card-number"
                                               value="{{$seller->shenasname_code}}" minlength="1"
                                               maxlength="10"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="company-registration-number">شماره
                                        ثبت</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[companyRegistrationNumber]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="company-registration-number"
                                               value="undefined"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <div data-show="{sellerType:business}"
                                     style="display: none;">
                                    <label class="c-RD-profile__input-name"
                                           for="seller-economic-number">کد
                                        اقتصادی</label>

                                    <div class="c-ui-input ">


                                        <input type="text"
                                               name="businessInfo[companyEconomicNumber]"
                                               class="c-ui-input__field c-ui-input__RD-field"
                                               id="seller-economic-number"
                                               value="undefined"
                                               data-no-access="{registerStatus : approved}"
                                               readonly="" tabindex="-1">


                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">

                            </div>
                        </div>
                    </div>

                    <div class="c-grid__row">
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form">
                                <label class="c-RD-profile__input-name"
                                       for="vat-register">مشمولیت مالیات بر ارزش
                                    افزوده</label>
                                <select
                                    class="c-ui-select c-ui-select--common c-ui-select--small c-RD-profile js-profile-business-info-vat-select  "
                                    name="businessInfo[isSubjectedToVat]"
                                    id="vat-register" data-active="false"
                                    data-no-access="{registerStatus : approved}"
                                    placeholder="انتخاب" data-select2-id="vat-register"
                                    tabindex="-1" aria-hidden="true"
                                    disabled="disabled">
                                    @if($seller->maliat ==1)
                                        <option value="1" data-select2-id="1">بله</option>
                                    @else
                                        <option value="2" data-select2-id="2">خیر</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4 "
                             data-hide="{isSubjectedToVat : false} {sellerType : business}">
                            <div class="c-form"
                                 data-hide="{isSubjectedToVat : false} {sellerType : private}"
                                 style="display: none;">
                                <label class="c-RD-profile__input-name"
                                       for="seller-code">تاریخ انقضای گواهی مالیات بر
                                    ارزش افزوده</label>

                                <div class="c-ui-input ">


                                    <input type="text"
                                           name="businessInfo[subjectedToVatDocument.expireDate]"
                                           class="c-ui-input__field c-ui-input__RD-field js-profile-business-info-vat-date pwt-datepicker-input-element"
                                           id="businessInfo[subjectedToVatDocument.expireDate]"
                                           value=""
                                           data-no-access="{registerStatus : approved} {subjectedToVatDocument.isExpireAtUnlimited : true}"
                                           readonly="" tabindex="-1">


                                </div>

                                <label class="c-ui-checkbox uk-margin-small-top">
                                    <input name="businessInfo[unlimited]"
                                           type="checkbox"
                                           data-no-access="{registerStatus : approved}"
                                           class="c-ui-checkbox__origin all-checkbox js-unlimited-expiration-date"
                                           readonly="true" disabled="true">
                                    <span
                                        class="c-ui-checkbox__check c-cpo__cp 0-checkbox-small"></span><span
                                        class="uk-margin-small-right">نامحدود</span>
                                </label>
                            </div>
                        </div>
                        <div class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4">
                            <div class="c-form"
                                 data-hide="{isSubjectedToVat : false} {sellerType : private}"
                                 style="display: none;">
                                                                <span
                                                                    class="c-RD-profile__input-name uk-margin-small-right">تصویر آخرین تغییرات گواهینامه ارزش افزوده</span>
                                <div
                                    class="c-grid__row c-RD-profile__logo--placeholder uk-margin-remove-top uk-margin-small-right"
                                    id="vat-upload-input">
                                    <img src=""
                                         class="js-profile-business-info-vat-logo-preview c-RD-profile__add-doc-img uk-height-1-1 uk-width-1-1 uk-hidden">
                                    <label class="c-RD-profile__add-doc-upload">
                                        <input name="businessInfo[vatDocInput]"
                                               class="js-profile-business-info-vat-logo"
                                               type="file"
                                               accept="image/jpg,image/png,image/jpeg"
                                               data-no-access="{registerStatus : approved}"
                                               disabled="">
                                        <input name="businessInfo[document_image_id]"
                                               type="hidden">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="c-RD-profile__profile-modal-warninig uk-flex uk-width-1-1 uk-hidden">
                        <span class="c-RD-profile__alert-icon"></span>
                        <p>
                            فروشنده گرامی، لطفاً در بخش بارگذاری مدارک، گواهی مالیات بر
                            ارزش افزوده خود را بارگذاری کنید.
                        </p>
                    </div>
                    <div class="c-grid__row uk-margin-medium-top">
                        <div class="o-spacing-m-r-3">

                            <label class="c-RD-profile__input-name"
                                   for="company-economic-number">لوگوی فروشنده</label>

                            <div
                                class="c-grid__row c-RD-profile__logo--placeholder uk-margin-remove js-upload-seller-logo"
                                id="logo-upload-input">
                                <img src="" id="selectImg" onclick="selectImage()"
                                     class="js-profile-business-info-logo-preview c-RD-profile__add-doc-img uk-height-1-1 uk-width-1-1 uk-hidden">
                                <label class="c-RD-profile__upload-btn">
                                    <input name="businessInfo[logoInput]" type="file"
                                           class="js-profile-business-info-logo"
                                           accept="image/jpg,image/png,image/jpeg"
                                    >
                                    <input name="businessInfo[logoImageId]"
                                           type="hidden">
                                </label>
                                {{--                                <script>--}}
                                {{--                                    function selectImage() {--}}
                                {{--                                        --}}
                                {{--                                    }--}}
                                {{--                                </script>--}}
                            </div>
                            <div>
                                <div
                                    class="c-RD-profile__checking c-RD-profile__checking--verified"
                                    data-show="{sellerPageLogoStatus:approved}"
                                    style="display: none;">تایید شده
                                </div>
                                <div
                                    class="c-RD-profile__checking c-RD-profile__checking--waiting "
                                    data-show="{sellerPageLogoStatus:waiting}"
                                    style="display: none;">در انتظار تایید
                                </div>
                                <div
                                    class="c-RD-profile__checking c-RD-profile__checking--conflict "
                                    data-show="{sellerPageLogoStatus:rejected}"
                                    style="display: none;">تایید نشده
                                </div>
                            </div>
                        </div>
                        <div class="c-profile-seller-description-container">
                            <div class="c-ui-form__col--12">
                                <div class="uk-flex">
                                    <label class="c-RD-profile__input-name"
                                           for="company-economic-number">درباره
                                        فروشنده</label>
                                    <button
                                        class="c-profile-info-seller-description uk-hidden"
                                        id="aboutSellerSampleButton"> نمونه متن درباره
                                        فروشنده
                                    </button>
                                </div>

                                <div class="c-ui-input">


                            <textarea
                                      class="c-ui-input__field c-ui-input__field--order c-ui-input__field--textarea"
                                      maxlength="1500" rows="3"
                                      style="height: 80px; border-color: #dddddd; font-weight: bold;" wire:model.defer="aboutUs" placeholder="{{$seller->about}}">{{$seller->about}}</textarea>
                                </div>

                                <div
                                    class="uk-margin-auto-right uk-text-left o-spacing-m-t-1 uk-hidden"
                                    style="font-size: 12px; color: #c0c2c5">
                                        <span>
                                            ۱۵۰
                                        </span>
                                    <span>
                                            /
                                        </span>
                                    <span class="js-letter-count">
                                           ۰
                                        </span>
                                </div>
                                <div>
                                    <div
                                        class="c-RD-profile__checking c-RD-profile__checking--verified"
                                        data-show="{sellerPageDescriptionStatus: approved}"
                                        style="display: none;">
                                        تایید شده
                                    </div>
                                    <div
                                        class="c-RD-profile__checking c-RD-profile__checking--waiting "
                                        data-show="{sellerPageDescriptionStatus:waiting}"
                                        style="display: none;">
                                        در انتظار تایید
                                    </div>
                                    <div
                                        class="c-RD-profile__checking c-RD-profile__checking--conflict "
                                        data-show="{sellerPageDescriptionStatus:rejected}"
                                        style="display: none;">
                                        تایید نشده
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-flex uk-flex-column uk-width-1-1">
                        <div
                            class="c-profile-business-info-logo-error o-spacing-m-t-6 o-spacing-m-b-2  uk-margin-remove-right"
                            data-show="{sellerPageLogoStatus:rejected}"
                            style="display: none;">

                        </div>
                        <div
                            class="c-profile-business-info-logo-error  uk-margin-remove-right o-spacing-m-b-2"
                            data-show="{sellerPageDescriptionStatus:rejected}"
                            style="display: none;">

                        </div>
                    </div>
                    <div class="c-grid__row uk-margin-medium-top uk-hidden"
                         id="logoCriteria">
                        <div class="c-profile-business-info-logo-hint">
                            شرایط لوگو: ۱- پس‌زمینه ترجیحا سفید باشد ۲- قالب مربع ۲-
                            حداقل ۶۰۰ در ۶۰۰ پیکسل ۴- فرمت PNG یا JPG
                        </div>
                        <div class="c-profile-business-info-logo-hint">
                            متن پیشنهادی را با توجه به نکات زیر ارسال کنید:
                            <br>
                            • شرح حال کسب‌ و کارتان را در خصوص تاریخچه، تنوع و
                            محصولاتتان بین 100 تا 150 کلمه یادداشت کنید.
                            <br>
                            • حتما به سال شروع فعالیتتان در متن ارسالی اشاره کنید.
                            <br>
                            • متن ارسالی باید فاقد آدرس سایت و صفحات مجازی هرگونه شماره
                            تماس باشد
                        </div>
                    </div>


                    <div class="c-grid__row uk-margin-medium-top">
                        <div
                            class="c-grid__col c-grid__col--sm-12 c-dgrid__col--lg-12 c-RD-profile--document-border"
                            style="margin-left: 12.5px; margin-right:12.5px">
                            <label
                                class="c-RD-profile__input-name c-RD-profile--document-label"
                                for="company-economic-number">مدارک فروشنده</label>
                            <div class="c-grid__row">
                                <div
                                    class="c-grid__col c-grid__col--sm-4 c-grid__col--lg-4 c-RD-profile--mb-34 c-RD-profile--mt-34 js-profile-business-info-docs-section">
                                    <div class="c-grid__row"
                                         style="margin-top:0;width: 221px;"
                                         data-index="0">
                                        @foreach(\App\Models\SellerDoc::where('user_id',auth()->user()->id)->get() as $doc)

                                        <div
                                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-6">

                                            <div
                                                class="c-RD-profile__logo--placeholder c-RD-profile--ai-i">
                                                <img
                                                    class="c-RD-profile__obf-c js-profile-info-docs-images-0"
                                                    src="/storage/{{$doc->img}}">
                                            </div>

                                        </div>
                                        @endforeach
                                        <div
                                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-6">
                                            <div class="c-grid__row">
                                                <label class="c-RD-profile__input-name"
                                                       for="company-economic-number"></label>
                                            </div>
                                            <div class="c-grid__row c-RD-profile__mt-0">
                                                <div
                                                    class="c-RD-profile__checking c-RD-profile__checking--verified"
                                                    data-show="{status : approved}"
                                                    style="display: none;">تایید شده
                                                </div>
                                                <div
                                                    class="c-RD-profile__checking c-RD-profile__checking--waiting "
                                                    data-show="{status : waiting}"
                                                    style="display: none;">در انتظار
                                                    تایید
                                                </div>
                                                <div
                                                    class="c-RD-profile__checking c-RD-profile__checking--waiting "
                                                    data-show="{status : new}"
                                                    style="display: none;">تایید نشده
                                                </div>
                                                <div
                                                    class="c-RD-profile__checking c-RD-profile__checking--conflict "
                                                    data-show="{status : rejected}"
                                                    style="display: none;">رد شده
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="c-ui-form__row c-RD-profile__form-action js-profile-form-action  "
                        style="margin-right: auto">
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

<div class="c-profile-business-info-about-seller-sample-modal uk-modal" uk-modal=""
     id="aboutSellerSampleModal">
    <div>
        <div class="c-profile-business-info-about-seller-sample-modal__main-container">
            <div
                class="c-profile-business-info-about-seller-sample-modal__close js-sample-modal-close">
            </div>
            <div class="c-profile-business-info-about-seller-sample-modal__title">
                نمونه متن درباره فروشنده
            </div>
            <div class="c-profile-business-info-about-seller-sample-modal__description">
                فروشگاه اینترنتی دیجی‌کالا، فعالیتش را از سال 1385 آغاز نموده است. این
                فروشگاه در ابتدای کارش مانند همه‌ی فروشگاه‌های اینترنتی بسیار ساده و با
                محصولات کمی شروع کرد و اکنون یکی از بزرگترین بازارهای آنلاین در
                خاورمیانه محسوب می شود. امروز به غیر از فروشگاه آنلاین دیجی‌کالا
                شرکت‌های دیگری از قبیل دیجی‌استایل، فیدیبو، دیجی‌پی، دیجی‌کالا نکست و
                دیجی‌کلاب از زیرمجموعه‌های این فروشگاه هستند.
            </div>
            <button
                class="c-profile-business-info-about-seller-sample-modal__return-button js-sample-modal-close">
                بازگشت
            </button>
        </div>
    </div>
</div>
