<section class="c-content-accordion__row js-content-section "
         id="stepProductAccordion">
    @php
        $productSellTest =  \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();
    @endphp
    <h2 class="c-content-accordion__title">
        <div class="c-content-accordion__title-text">گام دوم: درج اطلاعات کالا
            <span class="c-content-accordion__guid-line js-guideline-icon uk-hidden"
                  data-guideline-modal="product_info"></span>
        </div>
    </h2>
    <div class="c-content-accordion__content" id="stepProductContainer" hidden=""
         aria-hidden="true">
        <div class="c-card__body c-card__body--content">
            <form wire:submit.prevent="step2Form">
                <input type="hidden" id="selectedCategoryId" value="216">
                <input type="hidden" id="selectedCategoryTheme"
                       value="no_color_no_size">
                <input type="hidden" name="product[category_id]"
                       id="selectedCategoryIdConfirmed" value="">
                <input type="hidden" id="selectedCategoryThemeConfirmed" value="">
                <input type="hidden" name="product[product_id]" value=""
                       id="productIdContainer">
                <ul id="ajaxErrorProduct"
                    class="c-content-error c-content-error--list hidden">
                </ul>
                <ul id="moderationErrorProduct"
                    class="c-content-error c-content-error--list hidden">
                    <li class="c-content-error__item">
                    </li>
                </ul>

                <div class="c-grid__row c-grid__row--gap-lg">
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--sm-4 c-grid__col--xs-gap">
                        <label for="productIsFake" class="uk-form-label disabled"
                               id="productIsFakeContainerLabel">
                            اصالت کالا:
                        </label>

                        <div wire:ignore
                             class="field-wrapper field-wrapper--justify field-wrapper--background">
                            <label
                                class="c-ui-checkbox c-ui-checkbox--small c-ui-checkbox--auto "
                                id="productIsFakeLabel">
                                <input type="checkbox" class="c-ui-checkbox__origin"
                                       wire:click="OriginalOk({{$productSellTest->id}})"
                                       @if($productSellTest->original == 1)
                                       checked
                                       @endif
                                       name="product[fake]" id="productIsFake" value="1"
                                       data-brand-other-id="719">
                                <span class="c-ui-checkbox__check"></span>
                                <span class="c-ui-checkbox__label">
                    نشان کالای غیراصل
                    (<span class="c-ui-checkbox__strong">غیر اصل</span>)
                </span>
                            </label>


                        </div>
                    </div>
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--sm-4 c-grid__col--xs-gap">
                        <label for="" class="uk-form-label uk-flex uk-flex-between">
                            برند یا نام سازنده کالا:
                            <span class="uk-form-label__required"></span>

                        </label>
                        <style>
                            .ui-select__container:before {
                                z-index: 1;
                                position: absolute;
                                top: 17px;
                                left: 7px !important;
                                font-size: 6px;
                                font-size: .429rem;
                                line-height: 6px;
                                color: #606265;
                            }
                        </style>
                        <div wire:ignore class="field-wrapper ui-select ui-select__container">
                            <select
                                class="uk-input uk-input--select  " style="    appearance: revert;"
                                name="brand"
                                @if($productSellTest->brand_id)
                                @foreach(\App\Models\Brand::where('id',$productSellTest->brand_id)->get() as $brand)
                                    value="{{$brand->name}}"
                                @endforeach
                                @endif
                                wire:model.defer="brand"
                                data-select2-id="brandsSelect"
                            >
                                @foreach($brands as $brand)
                                    <option value="{{$this->brand = $brand->id}}"

                                            @if($productSellTest->brand_id == $brand->id)
                                            selected
                                        @endif

                                    >{{$brand->name}}</option>
                                @endforeach
                            </select>

                            <div class="js-select-options"></div>
                        </div>
                        <div>
                        </div>
                    </div>

                </div>


                <div class="c-grid__row c-grid__row--gap-lg js-step-product-title">
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                        <label for="" class="uk-form-label">
                            نام فارسی کالا:
                            <span class="uk-form-label__required"></span>
                        </label>
                        <div class="field-wrapper">
                            <input type="text"
                                   @if($productSellTest->title)
                                    value="{{$productSellTest->title}}"
                                   placeholder="{{$productSellTest->title}}"
                                   @endif
                                   wire:model.defer="name_kala"
                                   class="c-content-input__origin"
                                   name="product[title_fa]" required="">
                        </div>
                        <div>
                        </div>
                    </div>

                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--xs-gap">
                        <label for="" class="uk-form-label">نام انگلیسی کالا:</label>
                        <div class="field-wrapper">
                            <input type="text"
                                   @if($productSellTest->ename)
                                   value="{{$productSellTest->ename}}"
                                   placeholder="{{$productSellTest->ename}}"
                                   @endif
                                   wire:model.defer="nameEn_kala"
                                   placeholder="Enter the name of your item in the following order: Brand + Model + Nature of the Product"
                                   class="c-content-input__origin" value=""
                                   name="product[title_en]">
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="c-grid__row c-grid__row--gap-lg">
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-12 ">
                        <div
                            class="c-grid__row c-grid__row--gap-lg c-grid__row--nowrap-sm">
                            <div
                                class="c-grid__col js-product-package-dimension c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                                <label for="" class="uk-form-label">
                                    ابعاد بسته‌بندی (سانتیمتر):
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div
                                    class="c-grid__row c-grid__row--gap-small c-grid__row--nowrap-sm">
                                    <div
                                        class=" c-grid__col c-grid__col--gap-small c-grid__col--flex-initial">
                                        <div class="field-wrapper">
                                            <label class="c-content-input">
                                                                                <span
                                                                                    class="c-content-input__text c-content-input__text--overlay">طول</span>
                                                <input type="text" placeholder=""
                                                       @if($productSellTest->length)
                                                       value="{{$productSellTest->length}}"
                                                       placeholder="{{$productSellTest->length}}"
                                                       @endif
                                                       wire:model.defer="tool"
                                                       class="c-content-input__origin c-content-input__origin--overlay"
                                                       value=""
                                                       name="product[package_length]">
                                            </label>
                                        </div>
                                    </div>
                                    <div
                                        class=" c-grid__col c-grid__col--gap-small c-grid__col--flex-initial c-grid__col--xs-gap">
                                        <div class="field-wrapper">
                                            <label class="c-content-input">
                                                                                <span
                                                                                    class="c-content-input__text c-content-input__text--overlay">عرض</span>
                                                <input type="text" placeholder=""
                                                       @if($productSellTest->width)
                                                       value="{{$productSellTest->width}}"
                                                       placeholder="{{$productSellTest->width}}"
                                                       @endif
                                                       wire:model.defer="arz"
                                                       class="c-content-input__origin c-content-input__origin--overlay"
                                                       value=""
                                                       name="product[package_width]">
                                            </label>
                                        </div>
                                    </div>
                                    <div
                                        class=" c-grid__col c-grid__col--gap-small c-grid__col--flex-initial c-grid__col--xs-gap">
                                        <div class="field-wrapper">
                                            <label class="c-content-input">
                                                                                <span
                                                                                    class="c-content-input__text c-content-input__text--overlay">ارتفاع</span>
                                                <input type="text"
                                                       @if($productSellTest->height)
                                                       value="{{$productSellTest->height}}"
                                                       placeholder="{{$productSellTest->height}}"
                                                       @endif
                                                       wire:model.defer="ertfa"
                                                       class="c-content-input__origin c-content-input__origin--overlay"
                                                       value=""
                                                       name="product[package_height]">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="c-grid__col js-product-package-dimension c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--xs-gap">
                                <label for="" class="uk-form-label">
                                    وزن بسته بندی (گرم):
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper">
                                    <label class="c-content-input">
                                                                        <span
                                                                            class="c-content-input__text c-content-input__text--overlay">وزن</span>
                                        <input type="text" placeholder=""
                                               @if($productSellTest->weight)
                                               value="{{$productSellTest->weight}}"
                                               placeholder="{{$productSellTest->weight}}"
                                               @endif
                                               wire:model.defer="vazn"
                                               class="c-content-input__origin c-content-input__origin--overlay"
                                               value="" name="product[package_weight]">
                                    </label>
                                </div>
                            </div>
                            <div
                                class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--xs-gap js-select-colors-wrapper uk-hidden">
                                <label for="" class="uk-form-label">
                                    رنگ:
                                </label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-grid__row c-grid__row--gap-lg">
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial">
                        <label for="" class="uk-form-label">شرح کالا:</label>
                        <div class="field-wrapper field-wrapper--textarea">
                                                            <textarea name="product[description]"
                                                                      wire:model.defer="sharh"
                                                                      @if($productSellTest->detail_product)
                                                                      value="{{$productSellTest->detail_product}}"
                                                                      placeholder="{{$productSellTest->detail_product}}"
                                                                      @endif
                                                                       class="c-content-input__origin c-content-input__origin--textarea js-textarea-words"
                                                                      rows="5" maxlength="2000"></textarea>
                            <span class="textarea__wordcount">
                            <span class="js-wordcount-target">0</span>/2000
                        </span>
                        </div>
                    </div>
                </div>
                <div class="c-grid__row c-grid__row--gap-lg">
                    <div
                        class="c-grid__col c-grid__col--gap-attr c-grid__col--flex-initial c-grid__col--sm-6">
                        <label for="" class="uk-form-label">
                            نقاط قوت:
                        </label>
                        <div class="field-wrapper field-wrapper--textarea">
                            <div
                                class="c-ui-tag__textarea c-ui-tag__textarea--inline js-textarea-tags">
                                <input type="text"
                                       wire:model.defer="plus"
                                       @if($productSellTest->plus_product)
                                       value="{{$productSellTest->plus_product}}"
                                       placeholder="{{$productSellTest->plus_product}}"
                                       @endif
                                       class="js-textarea-tags-pros c-ui-tag__input c-ui-tag__input--inline">
                                <button type="button"
                                        class="c-ui-tag__submit js-tag-submit-btn">+
                                </button>
                            </div>

                        </div>
                        <div>
                        </div>
                    </div>
                    <div
                        class="c-grid__col c-grid__col--gap-attr c-grid__col--flex-initial c-grid__col--sm-6 c-grid__col--xs-gap">
                        <label for="" class="uk-form-label">
                            نقاط ضعف:
                        </label>
                        <div class="field-wrapper field-wrapper--textarea">
                            <div
                                class="c-ui-tag__textarea c-ui-tag__textarea--inline js-textarea-tags">
                                <input type="text"
                                       @if($productSellTest->minus_product)
                                       value="{{$productSellTest->minus_product}}"
                                       placeholder="{{$productSellTest->minus_product}}"
                                       @endif
                                       wire:model.defer="min"
                                       class="js-textarea-tags-cons c-ui-tag__input c-ui-tag__input--inline">
                                <button type="button"
                                        class="c-ui-tag__submit js-tag-submit-btn">+
                                </button>
                            </div>

                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="uk-flex uk-flex-left">
                    <button type="submit" class="c-ui-btn c-ui-btn--next mr-a  disabled" id="saveButton">
                        ذخیره کالا
                    </button>
                </div>
            </form>
        </div>
        <div class="c-content-accordion__step-controls">
            <button class="c-ui-btn c-ui-btn--next mr-a hidden disabled"
                    id="productStepNext">
                ادامه دادن
            </button>
        </div>
        <div class="c-content-loader c-content-loader--fixed">
            <div class="c-content-loader__logo"></div>
            <div class="c-content-loader__spinner"></div>
        </div>
    </div>
    <div class="c-content-progress ">
        <span class="c-content-progress__step"></span>
    </div>
    <div id="confirmFakeSelectionBrandChangeModal" class="marketplace-redesign uk-modal"
         uk-modal="">
        <div class="uk-modal-dialog uk-modal-dialog--confirm uk-modal-body">
            <button class="uk-modal-close uk-modal-close--search uk-close uk-icon"
                    type="button" uk-close="">
                <svg width="14" height="14" viewBox="0 0 14 14"
                     xmlns="http://www.w3.org/2000/svg" ratio="1">
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1"
                          x2="13" y2="13"></line>
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1"
                          x2="1" y2="13"></line>
                </svg>
            </button>

            <div class="modal-product modal-product--confirm">
                <h2 class="modal-message--title">اگر نمایش عدم اصالت کالا را انتخاب
                    کنید</h2>
                <p class="modal-message--center">برند به "متفرقه" تغییر خواهد کرد،
                    اطمینان دارید؟</p>
            </div>

            <div class="modal-footer modal-footer--center">
                <div class="uk-flex">
                    <button
                        class="modal-footer__btn modal-footer__btn--confirm modal-footer__btn--wide js-modal-uploads-confirm js-accept"
                        type="button">
                        بله،‌ مطمئن هستم
                    </button>
                    <button
                        class="modal-footer__btn modal-footer__btn--wide uk-modal-close js-decline"
                        type="button">انصراف
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="newBrandRequestModal" class="marketplace-redesign uk-modal c-variant"
         uk-modal="">
        <div
            class="uk-modal-dialog uk-modal-dialog--confirm uk-modal-body c-content-modal"
            id="newBrandRequestModalContent">
            <button class="uk-modal-close uk-modal-close--search uk-close uk-icon"
                    type="button" uk-close="">
                <svg width="14" height="14" viewBox="0 0 14 14"
                     xmlns="http://www.w3.org/2000/svg" ratio="1">
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1"
                          x2="13" y2="13"></line>
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1"
                          x2="1" y2="13"></line>
                </svg>
            </button>
            <form id="newBrandRequestForm" novalidate="novalidate">
                <input type="hidden" name="brand[product_id]" value="">
                <input type="hidden" name="brand[category_id]"
                       id="newBrandRequestCategoryIdContainer">
                <div class="c-content-modal__header c-content-modal__header--overflow">
                    <h3 class="c-content-modal__title"> درخواست ایجاد برند جدید</h3>
                </div>
                <div class="c-content-modal__body c-content-modal__body--overflow">
                    <div class="c-content-modal__body-container">
                        <div class="c-content-modal__intro">فروشگاه اینترنتی دیجی‌کالا
                            این امکان را برای فروشنده فراهم
                            کرده
                            تا کالایش را با برند (نام
                            تجاری) خودش نمایش دهد و به فروش برساند. برای ایجاد و ثبت
                            برندتان، فرم زیر را تکمیل کنید.
                        </div>
                        <div class="c-content-modal__notes">
                            <span class="c-content-modal__notes-title">توجه:</span>
                            <ul class="c-content-modal__notes-list">
                                <li>نام برند مورد نظرتان را وارد کنید و درصورتی‌که برند
                                    را در این لیست پیدا نکردید، در صفحه‌ی درخواست برند،
                                    برند مورد نظرتان را جست‌و‌جو کرده و در صورت یافتن
                                    آن، روی دکمه‌ی افزودن برند به گروه کالایی کلیک کنید.
                                </li>
                                <li>چنانچه، برند مورد نظر در این لیست وجود نداشت، برای
                                    ساخت برند جدید، اطلاعات ذکر شده در این صفحه را ارسال
                                    کنید.
                                </li>
                                <li class="c-content-modal__notes-item">- برندهای ایرانی
                                    باید گواهی ثبت علامت تجاری
                                    داشته باشند و تصویر آن را باید همراه با
                                    درخواست در فرم ارسال فرمایید.
                                </li>
                                <li class="c-content-modal__notes-item">- برندهای ایرانی
                                    که دارای گواهی ثبت علامت تجاری
                                    نیستند، ثبت نمی‌شوند.
                                </li>
                                <li class="c-content-modal__notes-item">- برای ثبت برند،
                                    اظهار نامه‌ قابل قبول نیست و
                                    حتما باید گواهی ثبت برند را ارسال
                                    کنید.
                                </li>
                            </ul>
                        </div>
                        <div
                            class="c-variant-error hidden c-variant-error__box c-variant-error__box--modal mt-20 mb-20"
                            id="ajaxBrandErrorsList">
                        </div>
                        <div class="c-grid__row c-grid__row--gap-lg mt-30">
                            <div
                                class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                                <label for="" class="uk-form-label">
                                    نام فارسی برند:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper c-autosuggest">
                                    <div
                                        class="search-form__autocomplete js-autosuggest-box">

                                        <input id="searchKeywordInput"
                                               class="uk-input js-prevent-submit"
                                               type="text" name="brand[name_fa]"
                                               placeholder="نام فارسی برند را وارد کنید …">
                                        <ul class="c-autosuggest__list-container"
                                            style="display: none;"></ul>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                                <label for="" class="uk-form-label">
                                    نام انگلیسی برند:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper c-autosuggest">
                                    <div
                                        class="search-form__autocomplete js-autosuggest-box">

                                        <input id="searchKeywordInput"
                                               class="uk-input js-prevent-submit"
                                               type="text" name="brand[name_en]"
                                               placeholder="عنوان انگلیسی برند …">
                                        <ul class="c-autosuggest__list-container"
                                            style="display: none;"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c-grid__row c-grid__row--gap-lg">
                            <div
                                class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial">
                                <label class="uk-form-label">
                                    شرح برند:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div id="brandDescription" class="field-wrapper">
                                                                    <textarea name="brand[description]"
                                                                              class="uk-textarea" cols="" rows="3"
                                                                              placeholder="توضیحات برند باید بین ۷۰ تا ۱۰۰ کلمه درباره‌ی تاریخچه و محصولات برند باشد …"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="c-grid__row c-grid__row--gap-lg">
                            <div
                                class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--row-attr">
                                <label class="uk-form-label">
                                    نوع برند:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div id="brandOrigin" class="field-wrapper">
                                    <label
                                        class="c-ui-radio c-ui-radio--content c-ui-checkbox--auto">
                                        <input type="radio"
                                               class="c-ui-radio__origin js-brand-origin"
                                               name="brand[origin]" value="iranian"
                                               id="iranianBrandContainer" checked="">
                                        <span
                                            class="c-ui-radio__check c-ui-radio__check--content"></span>
                                        <span
                                            class="c-ui-radio__label c-ui-radio__label--content">ایرانی</span>
                                    </label>
                                    <label
                                        class="c-ui-radio c-ui-radio--content c-ui-checkbox--auto">
                                        <input type="radio"
                                               class="c-ui-radio__origin js-brand-origin"
                                               name="brand[origin]"
                                               id="foreignBrandContainer"
                                               value="foreign">
                                        <span
                                            class="c-ui-radio__check c-ui-radio__check--content"></span>
                                        <span
                                            class="c-ui-radio__label c-ui-radio__label--content">خارجی</span>
                                    </label>
                                </div>
                            </div>
                            <div id="foreignBrandContainer1"
                                 class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--row-attr hidden">
                                <label class="uk-form-label">
                                    لینک سایت معتبر خارجی:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper">
                                    <input name="brand[url]"
                                           class="uk-input uk-input--ltr"
                                           placeholder="http://">
                                </div>
                            </div>
                        </div>
                        <div class="c-grid__row c-grid__row--gap-lg">
                            <div id="iranianBrandContainer1"
                                 class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--row-attr">
                                <label class="uk-form-label">
                                    برگه ثبت برند یا لینک سایت قوه قضاییه:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper">
                                    <div id="newBrandSheetUpload"
                                         for="brandRegistrationSheet"
                                         class="c-content-modal__uploads-label empty">
                                    <span uk-form-custom="" class="uk-form-custom">
                                        <input id="brandRegistrationSheet" type="file" class="hidden">
                                    </span>
                                        <label for="brandRegistrationSheet"
                                               class="c-content-modal__uploads-preview">
                                            <img src="" id="newBrandSheetUploadPreview"
                                                 class="c-content-modal__uploads-img"
                                                 alt="">
                                            <span
                                                class="c-content-upload__img-loader js-img-loader">
                                            <span class="progress__wrapper">
                                                <span class="progress"></span>
                                            </span>
                                        </span>
                                        </label>
                                        <span
                                            class="c-content-modal__list c-content-modal__uploads-tooltips">
                                        <span class="c-content-modal__uploads-text">ابعاد
                                            برگه ثبت برند را با حداکثر حجم ۷۰۰ مگابایت و فرمت PNG یا JPEG  بارگذاری کنید.
                                        </span>
                                    </span>
                                    </div>
                                    <input type="hidden"
                                           name="brand[registration_image_id]"
                                           class="force-validation"
                                           id="registrationImageTempId">
                                    <div class="c-content-modal__errors-full"
                                         id="newBrandRegistrationImageUploadErrors"></div>
                                </div>
                            </div>
                            <div id="iranianBrandLogo"
                                 class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--row-attr">
                                <label class="uk-form-label">
                                    لوگوی برند:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper">
                                    <div id="newBrandLogoUpload"
                                         class="c-content-modal__uploads-label empty">
                                    <span uk-form-custom="" class="uk-form-custom">
                                        <input id="brandLogoFile" type="file" class="hidden">
                                    </span>
                                        <label for="brandLogoFile"
                                               class="c-content-modal__uploads-preview">
                                            <img src="" id="newBrandLogoUploadPreview"
                                                 class="c-content-modal__uploads-img"
                                                 alt="">
                                            <span
                                                class="c-content-upload__img-loader js-img-loader">
                                            <span class="progress__wrapper">
                                                <span class="progress"></span>
                                            </span>
                                        </span>
                                        </label>
                                        <span
                                            class="c-content-modal__list c-content-modal__uploads-tooltips">
                                        <span class="c-content-modal__uploads-text">
                                            لوگو برند را در ابعاد ۶۰۰×۶۰۰ پیکسل و با فرمت PNG یا JPEG و پس‌زمینه‌ی سفید بارگذاری کنید.
                                        </span>
                                    </span>
                                    </div>
                                    <input type="hidden" name="brand[logo_id]"
                                           class="force-validation"
                                           id="logoImageTempId">
                                    <div class="c-content-modal__errors-full"
                                         id="newBrandLogoUploadErrors"></div>
                                </div>
                            </div>
                            <div id="iranianBrandContainer2"
                                 class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                                <label class="uk-form-label">
                                    یا لینک سایت قوه قضاییه را وارد کنید. لینک را به
                                    صورت کامل وارد کنید:
                                    <span class="uk-form-label__required"></span>
                                </label>
                                <div class="field-wrapper">
                                    <input name="brand[registration_url]" type="text"
                                           class="uk-input uk-input--ltr"
                                           placeholder="http://"
                                           id="registrationUrlValue">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="c-content-modal__footer c-content-modal__footer--overflow">
                    <button
                        class="modal-footer__btn modal-footer__btn--confirm modal-footer__btn--wide js-modal-uploads-confirm js-accept"
                        type="button" id="saveBrandRequestButton">
                                                        <span
                                                            id="brandSuggestBtnLabel">افزودن برند به گروه کالایی</span>
                        <span id="brandRequestBtnLabel">ارسال درخواست</span>
                    </button>
                    <button class="modal-footer__btn modal-footer__btn--wide"
                            type="button" id="resetBrandRequestBtn">انتخاب مجدد
                    </button>
                    <button
                        class="modal-footer__btn modal-footer__btn--wide uk-modal-close js-decline"
                        type="button" id="cancelBrandRequestButton">انصراف
                    </button>
                </div>
            </form>
            <div class="c-content-loader">
                <div class="c-content-loader__logo"></div>
                <div class="c-content-loader__spinner"></div>
            </div>
        </div>
    </div>


</section>
