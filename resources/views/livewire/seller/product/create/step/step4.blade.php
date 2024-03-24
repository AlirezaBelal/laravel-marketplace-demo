<section class="c-content-accordion__row js-content-section "
         id="stepTitleAccordion" >
    <h2 class="c-content-accordion__title">
        <div class="c-content-accordion__title-text js-step-title-header">گام سوم:
            عنوان پیشنهادی کالا
            <span class="c-content-accordion__guid-line js-guideline-icon uk-hidden"
                  data-guideline-modal="auto_title"></span>
        </div>
    </h2>
    <div class="c-content-accordion__content c-content-accordion__content--small"
         id="stepTitleContainer" hidden="" aria-hidden="true">
        <div class="c-card__body  c-card__body--content" id="stepTitleContent">
            <form id="titleForm" novalidate="novalidate">
                <ul id="ajaxErrorTitle"
                    class="c-content-error c-content-error--list hidden">
                </ul>
                <ul id="moderationErrorTitle"
                    class="c-content-error c-content-error--list hidden">
                    <li class="c-content-error__item">
                    </li>
                </ul>
                <div class="c-grid__row c-grid__row--gap-lg">
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                        <label for="" class="uk-form-label">
                            نام فارسی پیشنهادی کالا:
                        </label>
                        <div class="field-wrapper">
                            <input value=""
                                   class="c-content-input__origin c-ui-input--deactive js-suggested-title-fa js-edit-mode-suggested-title-fa"
                                   disabled="">
                        </div>
                    </div>

                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--xs-gap">
                        <label for="" class="uk-form-label">نام انگلیسی پیشنهادی
                            کالا:</label>
                        <div class="field-wrapper">
                            <input value=""
                                   class="c-content-input__origin c-ui-input--deactive js-suggested-title-en js-edit-mode-suggested-title-en"
                                   disabled="">
                        </div>
                    </div>
                </div>
                <div
                    class="c-grid__row c-grid__row--gap-lg uk-hidden disabled js-edite-title-suggested disabled"
                    data-edit-mode="" data-status="">
                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6">
                        <label for="" class="uk-form-label">
                            نام فارسی کالا:
                            <span class="uk-form-label__required"></span>
                        </label>
                        <div class="field-wrapper ">
                            <input type="text"
                                   placeholder="شیوه نامگذاری صحیح کالا : ماهیت کالا + برند + مدل"
                                   class="c-content-input__origin js-suggested-title-fa js-edit-mode-title-fa"
                                   value="" name="title[title_fa]" required="">
                        </div>
                        <div>
                        </div>
                    </div>

                    <div
                        class="c-grid__col c-grid__col--gap-lg c-grid__col--flex-initial c-grid__col--lg-6 c-grid__col--xs-gap">
                        <label for="" class="uk-form-label">نام انگلیسی کالا:</label>
                        <div class="field-wrapper">
                            <input type="text"
                                   placeholder="Syntax for naming product : Brand + Model + Nature of the Product"
                                   class="c-content-input__origin js-suggested-title-en js-edit-mode-title-en"
                                   value="" name="title[title_en]">
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </form>
            <div
                class="c-content-accordion__step-controls c-content-accordion__step-controls--spacer">
                <button class="c-ui-btn c-ui-btn--gray uk-hidden disabled"
                        id="cancelEditSubjectSuggested">
                    انصراف
                </button>
                <button class="c-ui-btn c-ui-btn--outline-blue hidden disabled"
                        id="editSubjectSuggested">
                    ویرایش عنوان
                </button>
                <button class="c-ui-btn c-ui-btn--next  "
                        id="setSubjectStepNext">
                    تأیید عنوان و ادامه
                </button>
            </div>
        </div>
        <div class="c-content-loader c-content-loader--fixed">
            <div class="c-content-loader__logo"></div>
            <div class="c-content-loader__spinner"></div>
        </div>
    </div>
    <div class="c-content-progress ">
        <span class="c-content-progress__step"></span>
    </div>
</section>
