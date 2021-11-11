<div class="o-box">
    <div class="o-box__header profile__legal-header">
        <div class="o-box__title u-flex u-justify-between"><span>
                افزودن اطلاعات حقوقی
            </span></div>
    </div>
    <div id="hooghooghi" class="c-profile-personal__legal-desc js-legal-content">با تکمیل اطلاعات حقوقی،
        می‌توانید اقدام به خرید سازمانی با دریافت فاکتور رسمی و گواهی ارزش افزوده نمایید.
    </div>
    <div id="hooghooghi2" onclick="hoogh()" class="c-profile-personal__legal-link js-legal-content">
        <div class="o-link o-link--sm o-link--has-arrow js-edit-legal">ویرایش اطلاعات
            حقوقی
        </div>
    </div>
    <form id="hooghooghi3" class="c-profile-personal__legal-form js-legal-form js-personal-info-form"
          id="personal-info-legal-form"
          wire:submit.prevent="companyForm"
          data-city-id="" data-city-name=""
          novalidate="novalidate">

        <input type="hidden" name="additionalinfo[company]"
               value="1">
        <label class="o-form__field-container">
            <div class="o-form__field-label">نام سازمان</div>
            <div class="o-form__field-frame">
                <input wire:model.defer="user.name_company" name="name_company"
                       type="text" placeholder="{{auth()->user()->name_company}}" value="{{auth()->user()->name_company}}"
                       class="o-form__field js-input-field ">
            </div>
        </label><label class="o-form__field-container">
            <div class="o-form__field-label">کد اقتصادی</div>
            <div class="o-form__field-frame"><input
                    wire:model.defer="user.code_company"
                    name="code_company" type="text"
                     placeholder="{{auth()->user()->code_company}}" value="{{auth()->user()->code_company}}" class="o-form__field js-input-field "></div>
        </label><label class="o-form__field-container">
            <div class="o-form__field-label">شناسه ملی</div>
            <div class="o-form__field-frame"><input
                    wire:model.defer="user.national_code_company"
                    name="national_code_company" type="text"
                     placeholder="{{auth()->user()->national_code_company}}" value="{{auth()->user()->national_code_company}}" class="o-form__field js-input-field "></div>
        </label><label class="o-form__field-container">
            <div class="o-form__field-label">شناسه ثبت</div>
            <div class="o-form__field-frame"><input
                    wire:model.defer="user.sabt_company"
                    name="sabt_company" type="text"
                     placeholder="{{auth()->user()->sabt_company}}" value="{{auth()->user()->sabt_company}}" class="o-form__field js-input-field "></div>
        </label>
        <div class="o-form__field-container">
            <div class="o-form__field-label">استان محل دفتر مرکزی</div>
            <div
                class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-dropdown-universal selectric-js-select-company-state selectric-js-select-state">
                <input
                    wire:model.defer="user.state_company"
                    name="state_company" type="text"
                     placeholder="{{auth()->user()->state_company}}" value="{{auth()->user()->state_company}}" class="o-form__field js-input-field ">
            </div>
        </div>
        <div class="o-form__field-container">
            <div class="o-form__field-label">شهر محل دفتر مرکزی</div>
            <div
                class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-dropdown-universal selectric-js-select-company-city selectric-js-select-city">
                <input
                    wire:model.defer="user.city_company"
                    name="city_company" type="text"
                     placeholder="{{auth()->user()->city_company}}" value="{{auth()->user()->city_company}}" class="o-form__field js-input-field ">
            </div>
        </div>
        <label class="o-form__field-container">
            <div class="o-form__field-label">شماره تلفن ثابت</div>
            <div class="o-form__field-frame">
                <input wire:model.defer="user.phone_company"
                       name="phone_company"
                       type="text"  placeholder="{{auth()->user()->phone_company}}" value="{{auth()->user()->phone_company}}"
                       class="o-form__field js-input-field ">
            </div>
        </label>
        <div class="c-profile-personal__legal-actions">
            <button class="o-btn o-btn--contained-blue-lg">ثبت اطلاعات</button>
        </div>
    </form>
</div>
