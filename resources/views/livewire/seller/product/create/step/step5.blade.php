<section class="c-content-accordion__row js-content-section "
         id="stepImagesAccordion">
    <h2 class="c-content-accordion__title ">
        <div class="c-content-accordion__title-text">
        <span class="js-step-images-header">
            گام سوم: بارگذاری تصاویر
        </span>
            <span class="c-content-accordion__guid-line js-guideline-icon uk-hidden"
                  data-guideline-modal="media"></span>
        </div>
    </h2>
    <div class="c-content-accordion__content c-content-accordion__content--last"
         id="stepImagesContainer" hidden="" aria-hidden="true">
        <div class="c-card__body c-card__body--content marketplace-redesign"
             id="stepImagesContent">
            <form wire:submit.prevent="imgForm">


                <div id="imagesSelfServiceContainer"
                     class="c-grid__row c-grid__row--gap-lg">
                    <div class="c-grid__col">
                        <fieldset class="c-content-upload">
                            <legend class="c-content-upload__title">تصویر اصلی و گالری
                                تصاویر
                            </legend>
                            <div>
                                <label class="c-content-upload__trigger"
                                       id="uploadGalleryContainer">
                                    <div  class="uk-form-custom">
                                        <input type="file" class="hidden"
                                               wire:model.lazy="img">

                                    </div>
                                    <span class="c-content-upload__ui-btn">بارگذاری تصاویر</span>
                                    <ul class="c-content-upload__list c-content-upload__list--tooltips">
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            ابعاد
                                            تصویر بایستی در بازه ۶۰۰x۶۰۰ تا ۲۵۰۰x۲۵۰۰ و
                                            حجم آن باید کمتر از ۶ مگابایت باشد.
                                        </li>
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            کالا
                                            باید
                                            ۸۵٪ کل تصویر را در برگیرد و پس زمینه تصویر
                                            اصلی باید کاملاً سفید باشد.
                                        </li>
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            تصویر
                                            باید
                                            فقط کالایی که قصد فروش آن را دارید نمایش دهد
                                            و بدون هیچ لوگو، نوشته و یا
                                            واترمارکی
                                            باشد..
                                        </li>
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            تصویر شما باید مربعی باشد یا ابعاد یک در یک
                                            داشته باشد
                                        </li>
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            فرمت تصاویر بایستی JPG باشد
                                        </li>
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            امکان آپلود چندین تصویر به صورت همزمان وجود
                                            دارد
                                        </li>
                                        <li class="c-content-upload__list-item c-content-upload__list-item--tooltips">
                                            امکان تغییر ترتیب نمایش تصاویر با کشیدن و
                                            رها کردن وجود دارد
                                        </li>
                                    </ul>
                                </label>

                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="c-grid__col c-grid__col--flex-initial">
                    <div class="c-content-error c-content-error--list hidden" id="saveAjaxErrors">
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <button type="submit" class="c-ui-btn c-ui-btn--next mr-a   " id="saveButton">
                            ذخیره کالا
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>
