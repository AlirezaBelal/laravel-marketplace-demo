<div class="betternet-wrapper"></div>
<div id="fullname" class="remodal-wrapper remodal-is-closed " style="display: none;">
    <div id="fullname2"
         class=" c-modal c-modal--sm js-personal-info-modal
         remodal-is-initialized remodal-is-closed"
    >
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">نام و نام خانوادگی</div>
            <div id="closemodal" onclick="closemodal()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form class="c-modal__content js-not-empty-parent js-personal-info-form"
              id="personal-info-name-form"
              wire:submit.prevent="userForm"
              method="post" novalidate="novalidate">
            <div class="o-form__row">
                <label class="o-form__field-container">
                    <div class="o-form__field-label">نام</div>
                    <div class="o-form__field-frame">
                        <input wire:model.lazy="user.name" name="name" type="" placeholder="{{auth()->user()->name}}"
                               value="{{auth()->user()->name}}"
                               class="o-form__field js-input-field js-not-empty-input">
                    </div>
                </label>
            </div>
            <div class="c-modal__btn-container">
                <button type="submit" class="o-btn o-btn--contained-blue-md js-not-empty-btn ">ثبت اطلاعات</button>
            </div>
        </form>
    </div>
</div>
<div id="nationalcode" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="nationalcode2" class=" c-modal c-modal--sm js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-national_identity_number-modal" role="dialog" aria-labelledby="modalTitle"
         tabindex="-1" aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">کد ملی</div>
            <div onclick="closemodal2()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form class="c-modal__content js-national-code-form"
              wire:submit.prevent="userForm"
              id="personal-info-national-id-form"
              novalidate="novalidate">
            <div class="o-form__row"><label class="o-form__field-container">
                    <div class="o-form__field-frame">
                        <input wire:model.lazy="user.national_code" name="national_code" type="text"
                               placeholder="{{auth()->user()->national_code}}" value=""
                               class="o-form__field js-input-field">
                    </div>
                </label></div>


            <div class="c-modal__btn-container">
                <button type="submit" class="o-btn o-btn--contained-blue-md">ثبت اطلاعات</button>
            </div>
        </form>
    </div>
</div>
<div id="mobileNumber" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="mobileNumber2" class=" c-modal c-modal--sm js-personal-info-modal remodal-is-initialized remodal-is-opened"
         data-remodal-id="personal-info-mobile_phone-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">شماره موبایل</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form class="c-modal__content js-not-empty-parent
        js-phone-modal"
              wire:submit.prevent="userForm"
              id="personal-info-phone-form" novalidate="novalidate">
            <label class="o-form__field-container">
                <div class="o-form__field-frame">
                    <input name="mobile" type="" placeholder="{{auth()->user()->mobile}}"
                           value=""
                           wire:model.lazy="user.mobile"
                           class="o-form__field js-input-field js-not-empty-input"></div>
            </label>
            <div class="c-modal__btn-container">
                <button class="o-btn o-btn--left-icon o-btn--contained-red-md js-not-empty-btn ">
                    تغییر شماره
                </button>
            </div>
        </form>
    </div>
</div>
<div id="email" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="email2" class=" c-modal c-modal--sm js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-email-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">ایمیل</div>
            <div onclick="closemodal8()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form
            wire:submit.prevent="userForm"
            class="c-modal__content js-not-empty-parent js-personal-info-form js-email-modal"
            id="personal-info-email-form" novalidate="novalidate">
            <label class="o-form__field-container">
                <div class="o-form__field-frame">
                    <input name="email" type="" placeholder="{{auth()->user()->email}}"
                           value="" wire:model.lazy="user.email"
                           class="o-form__field js-input-field js-not-empty-input"></div>
            </label>
            <div class="c-modal__btn-container">
                <button type="submit"
                        class="o-btn o-btn--contained-blue-md js-not-empty-btn  js-personal-info-email-submit">
                    تایید
                </button>
            </div>
        </form>
    </div>
</div>
<div id="birthdate" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="birthdate2"
         class=" c-modal c-modal--sm c-modal--not-scroll js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-birth-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">تاریخ تولد</div>
            <div onclick="closemodal7()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form
            wire:submit.prevent="userForm"
            class="c-modal__content js-not-empty-parent js-personal-info-form">
            <div class="o-form__row o-form__row--flex">
                <div class="o-form__field-container">

                    <input wire:model.lazy="user.birthday" name="birthday" type="" style="text-align: left"
                           placeholder="{{auth()->user()->birthday}}"
                           value="{{auth()->user()->birthday}}"
                           class="o-form__field js-input-field js-not-empty-input">

                </div>

            </div>
            <div class="c-modal__btn-container">
                <button type="submit" class="o-btn o-btn--contained-blue-md js-not-empty-btn ">ثبت تاریخ تولد
                </button>
            </div>
        </form>
    </div>
</div>
<div id="job" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="job2"
         class=" c-modal c-modal--sm c-modal--not-scroll js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-job_title-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">شغل</div>
            <div onclick="closemodal4()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form
            wire:submit.prevent="userForm"
            class="c-modal__content js-not-empty-parent js-personal-info-form">
            <div class="o-form__field-container">
                <div
                    class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-dropdown-universal selectric-js-not-empty-input">

                    <input wire:model.lazy="user.job" name="job" type=""
                           placeholder="{{auth()->user()->job}}"
                           value="{{auth()->user()->job}}"
                           class="o-form__field js-input-field js-not-empty-input">
                </div>
            </div>
            <div class="c-modal__btn-container">
                <button type="submit" class="o-btn o-btn--contained-blue-md js-not-empty-btn ">ثبت شغل</button>
            </div>
        </form>
    </div>
</div>
<div id="moback" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="moback2"
         class=" c-modal c-modal--xs c-profile-iban js-personal-info-modal remodal-is-initialized remodal-is-opened"
         data-remodal-id="personal-info-bank_card_number-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">اطلاعات حساب بانکی برای بازگرداندن وجه</div>
            <div onclick="closemodal6()" class="c-modal__close" data-remodal-action="close"></div>
        </div>

        <div class="c-modal__content js-card-number-state"><p class="c-profile-iban__dsc">
                برای محاسبه شبا، شماره کارت متصل به حسابی که می‌خواهید واریز وجه به آن انجام شود را وارد کنید
            </p>
            <form id="iban-input-form"
                  wire:submit.prevent="userForm">
                <div class="o-form__row js-credit-card-input">
                    <label class="c-profile-personal__card-container">
                        <input style="width: 100% !important;" wire:model.lazy="user.money_back"
                               class="c-profile-personal__card-input js-card-complete-input" maxlength="23">
                    </label>
                </div>
                <div class="c-modal__btn-container">
                    <button type="submit" class="o-btn o-btn--contained-red-md js-card-complete-btn">
                        محاسبه شماره شبا
                    </button>
                </div>
        </div>
        <div class="c-modal__content o-text-right u-hidden js-iban-state">
            <p class="c-profile-iban__dsc">
                تبدیل شماره شبای کارت شما با خطا مواجه شد. لطفا شماره شبای خود را به صورت دستی وارد نمایید
            </p>
            <div>
                <div class="c-profile-iban__credit-data-row"><span
                        class="c-profile-iban__credit-card-number js-iban-credit-card-number"></span><span
                        class="c-profile-iban__bank-logo"><img class="js-iban-bank-image" alt="" src=""></span></div>
                <div class="c-profile-iban__bank-title js-iban-bank-title"></div>
            </div>


            <div class="c-profile-iban__input-row">
                <label class="o-form__field-container">
                    <div class="o-form__field-frame">
                        <input name="ibanCodeInput" type="" placeholder="" value=""
                               class="o-form__field js-input-field js-iban-input">
                    </div>
                </label>
            </div>
            </form>
            <div class="o-hint o-hint--small o-hint--text o-hint--neutral">
                شماره شبا را به همراه IR و بدون فاصله وارد نمایید.
            </div>
            <div class="c-modal__btn-container">
                <button type="button" class="o-btn o-btn--contained-red-md disabled js-check-iban-button">
                    بررسی اطلاعات
                </button>
            </div>
        </div>
    </div>
</div>
<div id="password" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="password" class=" c-modal c-modal--sm js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-reset_password-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">ویرایش رمز عبور</div>
            <div onclick="closemodal5()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form
            wire:submit.prevent="userForm"
            class="c-modal__content js-not-empty-parent js-change-password-form" id="change-password-form"
              novalidate="novalidate">
            <div class="o-form__row">
                <div class="c-profile-personal__info">رمز عبور باید حداقل ۶ حرف باشد.</div>
            </div>

            <div class="o-form__row"><label class="o-form__field-container">
                    <div class="o-form__field-label">رمز عبور جدید</div>
                    <div class="o-form__field-frame">
                        <input  wire:model.defer="user.password2" name="password2" type="password"
                               placeholder="" value=""
                               class="o-form__field js-input-field js-not-empty-input txtPassword">
                    </div>
                </label></div>
            <div class="o-form__row"><label class="o-form__field-container">
                    <div class="o-form__field-label">تکرار رمز عبور جدید</div>
                    <div class="o-form__field-frame">
                        <input name="password3" type="password"
                               wire:model.defer="user.password3"
                               placeholder="" value=""
                               class="o-form__field js-input-field js-not-empty-input">
                    </div>
                </label></div>
            <div class="c-modal__btn-container">
                <button type="submit" class="o-btn o-btn--contained-blue-md js-not-empty-btn ">ثبت</button>
            </div>
        </form>
    </div>
</div>


<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-modal c-modal--xs js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-bank_card_confirm-modal" role="dialog" aria-labelledby="modalTitle"
         tabindex="-1" aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">بررسی اطلاعات بازگردانی وجه</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <div class="c-modal__content js-card-complete-parent">
            <div class="o-form__row">
                لطفا اطلاعات زیر را جهت واریز وجوه به دقت بررسی کرده و اقدام لازم را انجام دهید
            </div>
            <div class="o-form__row">
                <div class="c-profile-personal__card-info">
                    <div class="c-profile-personal__card-info-item"><span>شماره کارت</span><span
                            class="js-confirm-card-bank-number"></span></div>
                    <div class="c-profile-personal__card-info-item"><span>شماره شبا</span><span
                            class="js-confirm-iban"></span></div>
                    <div class="c-profile-personal__card-info-item"><span>بانک صادر کننده</span><span
                            class="js-confirm-card-bank-name"></span></div>
                    <div class="c-profile-personal__card-info-item"><span>صاحب حساب</span><span
                            class="js-confirm-card-bank-owner"></span></div>
                </div>
            </div>
            <div class="c-modal__btn-container">
                <button type="button" class="o-btn o-btn--outlined-red-md js-card-confirm-edit">
                    بازگشت
                </button>
                <button type="button" class="o-btn o-btn--contained-red-md js-card-confirm-btn">
                    تایید اطلاعات
                </button>
            </div>
        </div>
    </div>
</div>

<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-modal c-modal--sm js-verification-email-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-email-verification-modal" role="dialog" aria-labelledby="modalTitle"
         tabindex="-1" aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">ایمیل تایید ارسال شد</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <div class="c-modal__content">
            <div class=""><img src="https://www.digikala.com/static/files/ba53f9b1.svg"></div>
            <div class="c-modal__desc">لطفا به ایمیل خود مراجعه نموده و بر روی لینک ارسال‌شده کلیک کنید.</div>
            <div class="c-modal__btn-container">
                <button type="button" class="o-btn o-btn--outlined-blue-md" data-remodal-action="close">متوجه شدم
                </button>
            </div>
        </div>
    </div>
</div>


<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div
        class="remodal c-modal c-modal--sm js-personal-info-modal js-phone-verification-modal remodal-is-initialized remodal-is-closed"
        data-remodal-id="personal-info-phone-verification-modal" role="dialog" aria-labelledby="modalTitle"
        tabindex="-1" aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">تایید شماره موبایل</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form class="c-modal__content js-confirm-phone-form">
            <div class="o-form__row">
                <div class="c-profile-personal__info">کد تایید برای شماره موبایل <span
                        class="js-changed-phone-number"></span> ارسال گردید.
                </div>
            </div>
            <div class="o-form__row">
                <div class="o-form__field-container"><label
                        class="c-profile-personal__verify-phone-container o-form__field-frame"><input
                            name="confirm[code]"
                            class="c-profile-personal__verify-phone-input js-verify-phone-input js-persian-digit-input"
                            type="text" maxlength="5">
                        <div class="c-profile-personal__verify-phone-input-hider"></div>
                    </label></div>
            </div>
            <div class="c-form__row">
                <div class="js-phone-code-container">
                    <div class="c-profile-personal__verify-phone-text">ارسال مجدد تا <span class="js-phone-code-counter"
                                                                                           data-countdownseconds=""></span>
                        ثانیه دیگر
                    </div>
                </div>
                <a href="#" class="c-profile-personal__verify-phone-text u-hidden js-send-confirm-code">دریافت مجدد کد
                    تایید</a></div>
        </form>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-modal c-modal--sm js-personal-info-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="personal-info-mobile_phone-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">شماره موبایل</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form class="c-modal__content js-not-empty-parent
        js-phone-modal" id="personal-info-phone-form" novalidate="novalidate"><label class="o-form__field-container">
                <div class="o-form__field-frame"><input name="additionalinfo[mobile_phone]" type="" placeholder=""
                                                        value="09120634157"
                                                        class="o-form__field js-input-field js-not-empty-input"></div>
            </label>
            <div class="c-modal__btn-container">
                <button class="o-btn o-btn--left-icon o-btn--contained-red-md js-not-empty-btn disabled">
                    دریافت کد تایید و تغییر شماره
                </button>
            </div>
        </form>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-avatar remodal-is-initialized remodal-is-closed" data-remodal-id="avatar-modal"
         role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="c-remodal-avatar__main">
            <div class="c-remodal-avatar__content">
                <div class="c-remodal-avatar__title">تغییر نمایه کاربری شما</div>
                <ul class="c-profile-avatars">
                    <li data-avatar-id="default" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                     style="background-image: url(https://www.digikala.com/static/files/fd4840b2.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_01" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                       style="background-image: url(https://www.digikala.com/static/files/df110dcf.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_02" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                       style="background-image: url(https://www.digikala.com/static/files/b5f7d7b8.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_03" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                       style="background-image: url(https://www.digikala.com/static/files/e8e1a8b5.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_04" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                       style="background-image: url(https://www.digikala.com/static/files/a5a6ccef.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_05" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                       style="background-image: url(https://www.digikala.com/static/files/6cdbab30.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_06" class="js-change-user-avatar is-active"><span
                            class="c-profile-avatars__item"
                            style="background-image: url(https://www.digikala.com/static/files/2a5b1e32.svg)"></span>
                    </li>
                    <li data-avatar-id="avatar_07" class="js-change-user-avatar"><span class="c-profile-avatars__item"
                                                                                       style="background-image: url(https://www.digikala.com/static/files/61f2d6e4.svg)"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-invite-friends remodal-is-initialized remodal-is-closed"
         data-remodal-id="invite-friends-modal" role="dialog" aria-labelledby="modal1Title"
         aria-describedby="modal1Desc" tabindex="-1">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="c-remodal-invite-friends__content">
            <div class="c-remodal-invite-friends__img"><img src="https://www.digikala.com/static/files/0fcf7a77.svg">
            </div>
            <div class="c-remodal-invite-friends__desc">
                لینک زیر را برای دوستانتان ارسال کنید. بعد از اولین خریدشان <span
                    class="c-remodal-invite-friends__point">۵۰ امتیاز</span> هدیه بگیرید و یک کد تخفیف نیز به دوستتان
                هدیه دهید.
            </div>
            <div class="c-remodal-invite-friends__btn js-share-invite ">
                <div class="c-remodal-invite-friends__btn-text js-url-invite"></div>
            </div>
        </div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-account remodal-is-initialized remodal-is-closed" data-remodal-id="login"
         role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="c-remodal-account__headline">ورود به دیجی‌کالا</div>
        <div class="c-remodal-account__content">
            <form class="c-form-account" id="loginFormModal" novalidate="novalidate">
                <div class="c-message-light c-message-light--info" id="login-form-msg"></div>
                <div class="c-form-account__title">پست الکترونیک یا شماره موبایل</div>
                <div class="c-form-account__row">
                    <div class="c-form-account__col"><label class="c-ui-input c-ui-input--account-login"><input
                                class="c-ui-input__field" type="text" name="login[email_phone]"
                                autocomplete="current-email" placeholder="info@digikala.com"></label></div>
                </div>
                <div class="c-form-account__title">کلمه عبور</div>
                <div class="c-form-account__row">
                    <div class="c-form-account__col"><label class="c-ui-input c-ui-input--account-password"><input
                                class="c-ui-input__field" name="login[password]" type="password"
                                autocomplete="current-password" placeholder=""></label></div>
                </div>
                <div class="c-form-account__agree"><label class="c-ui-checkbox c-ui-checkbox--primary"><input
                            type="checkbox" value="1" name="login[remember]" id="accountAutoLogin"><span
                            class="c-ui-checkbox__check"></span></label><label for="accountAutoLogin">مرا به خاطر داشته
                        باش</label></div>
                <div class="c-form-account__row c-form-account__row--submit">
                    <div class="c-form-account__col">
                        <button class="btn-login login-button-js">ورود به دیجی‌کالا</button>
                    </div>
                </div>
                <div class="c-form-account__link"><a data-snt-event="dkLoginClick"
                                                     data-snt-params="{&quot;type&quot;:&quot;forgetPassword&quot;,&quot;site&quot;:&quot;login-modal&quot;}"
                                                     href="/users/password/forgot/" class="btn-link-spoiler">رمز عبور
                        خود را فراموش کرده ام</a></div>
                <div class="c-message-light c-message-light--error has-oneline" id="loginFormError">نام کاربری
                    یا کلمه عبور اشتباه است.
                </div>
            </form>
        </div>
        <div class="c-remodal-account__footer is-highlighted"><span>کاربر جدید هستید؟</span><a
                data-snt-event="dkLoginClick"
                data-snt-params="{&quot;type&quot;:&quot;signup&quot;,&quot;site&quot;:&quot;login-modal&quot;}"
                href="/users/login-register/?_back=https://www.digikala.com/profile/personal-info/"
                class="btn-link-spoiler">ثبت‌نام در دیجی‌کالا</a></div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-loader remodal-is-initialized remodal-is-closed" data-remodal-id="loader"
         data-remodal-options="hashTracking: false, closeOnOutsideClick: false" role="dialog"
         aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1">
        <div class="c-remodal-loader__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="115" height="30" viewBox="0 0 115 30">
                <path fill="#EE384E" fill-rule="evenodd"
                      d="M76.916 19.024h6.72v-8.78h-6.72c-1.16 0-2.24 1.061-2.24 2.195v4.39c0 1.134 1.08 2.195 2.24 2.195zm26.883 0h6.72v-8.78h-6.72c-1.16 0-2.24 1.061-2.24 2.195v4.39c0 1.134 1.08 2.195 2.24 2.195zM88.117 6.951v15.366c0 .484-.625 1.098-1.12 1.098l-2.24.023c-.496 0-1.12-.637-1.12-1.12v-.733l-1.017 1.196c-.31.413-1.074.634-1.597.634h-4.107c-3.604 0-6.721-3.063-6.721-6.586v-4.39c0-3.523 3.117-6.585 6.72-6.585h10.082c.495 0 1.12.613 1.12 1.097zm26.883 0v15.366c0 .484-.624 1.098-1.12 1.098l-2.24.023c-.496 0-1.12-.637-1.12-1.12v-.733l-1.017 1.196c-.31.413-1.074.634-1.597.634h-4.107c-3.604 0-6.721-3.063-6.721-6.586v-4.39c0-3.523 3.117-6.585 6.72-6.585h10.082c.495 0 1.12.613 1.12 1.097zm-74.675 3.293h-6.721c-1.16 0-2.24 1.061-2.24 2.195v4.39c0 1.134 1.08 2.195 2.24 2.195h6.72v-8.78zm4.48-3.293V23.78c0 3.523-3.117 6.22-6.72 6.22H34.62c-.515 0-1-.236-1.311-.638l-1.972-2.55c-.327-.424-.144-1.202.399-1.202h6.347c1.16 0 2.24-.696 2.24-1.83v-.365h-6.72c-3.604 0-6.72-3.063-6.72-6.586v-4.39c0-3.523 3.116-6.585 6.72-6.585h4.107c.514 0 1.074.405 1.437.731l1.177 1.098V6.95c0-.483.625-1.097 1.12-1.097h2.24c.496 0 1.12.613 1.12 1.097zM4.481 16.83c0 1.134 1.08 2.195 2.24 2.195h6.72v-8.78h-6.72c-1.16 0-2.24 1.061-2.24 2.195v4.39zM16.8 0c.497 0 1.121.613 1.121 1.098v21.22c0 .483-.624 1.097-1.12 1.097h-2.24c-.496 0-1.12-.613-1.12-1.098v-.732l-1.175 1.232c-.318.346-.932.598-1.44.598H6.722C3.117 23.415 0 20.352 0 16.829v-4.356c0-3.523 3.117-6.62 6.72-6.62h6.722V1.099c0-.485.624-1.098 1.12-1.098h2.24zm46.3 14.634L69.336 6.9c.347-.421.04-1.048-.513-1.048h-3.566c-.27 0-.525.119-.696.323l-6.314 7.727V1.098c0-.485-.625-1.098-1.12-1.098h-2.24c-.496 0-1.12.613-1.12 1.098v21.22c0 .483.624 1.097 1.12 1.097h2.24c.495 0 1.12-.614 1.12-1.098v-6.951l6.317 7.744c.17.207.428.328.7.328h3.562c.554 0 .86-.627.514-1.048l-6.24-7.756zM48.166 0c-.496 0-1.12.613-1.12 1.098v2.195c0 .484.624 1.097 1.12 1.097h2.24c.495 0 1.12-.613 1.12-1.097V1.098c0-.485-.625-1.098-1.12-1.098h-2.24zm0 5.854c-.496 0-1.12.613-1.12 1.097v15.366c0 .484.8 1.12 1.295 1.12l2.065-.022c.495 0 1.12-.614 1.12-1.098V6.951c0-.484-.625-1.097-1.12-1.097h-2.24zM21.282 0c-.495 0-1.12.613-1.12 1.098v2.195c0 .484.625 1.097 1.12 1.097h2.24c.496 0 1.12-.613 1.12-1.097V1.098c0-.485-.624-1.098-1.12-1.098h-2.24zm0 5.854c-.495 0-1.12.613-1.12 1.097v15.366c0 .484.625 1.098 1.12 1.098h2.24c.496 0 1.12-.614 1.12-1.098V6.951c0-.484-.624-1.097-1.12-1.097h-2.24zm73.556-4.756v21.22c0 .483-.625 1.097-1.12 1.097h-2.24c-.496 0-1.12-.614-1.12-1.098V1.097c0-.484.624-1.097 1.12-1.097h2.24c.495 0 1.12.613 1.12 1.098z"></path>
            </svg>
        </div>
        <div class="c-remodal-loader__bullets"><i class="c-remodal-loader__bullet c-remodal-loader__bullet--1"></i><i
                class="c-remodal-loader__bullet c-remodal-loader__bullet--2"></i><i
                class="c-remodal-loader__bullet c-remodal-loader__bullet--3"></i><i
                class="c-remodal-loader__bullet c-remodal-loader__bullet--4"></i></div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-general-alert remodal-is-initialized remodal-is-closed" data-remodal-id="alert"
         role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1">
        <div class="c-remodal-general-alert__main">
            <div class="c-remodal-general-alert__content"><p class="js-remodal-general-alert__text"></p>
                <p class="c-remodal-general-alert__description js-remodal-general-alert__description"></p></div>
            <div class="c-remodal-general-alert__actions">
                <button
                    class="c-remodal-general-alert__button c-remodal-general-alert__button--approve js-remodal-general-alert__button--approve"></button>
                <button
                    class="c-remodal-general-alert__button c-remodal-general-alert__button--cancel js-remodal-general-alert__button--cancel"></button>
            </div>
        </div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-general-information remodal-is-initialized remodal-is-closed"
         data-remodal-id="information" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"
         tabindex="-1">
        <div class="c-remodal-general-information__main">
            <div class="c-remodal-general-information__content"><p class="js-remodal-general-information__text"></p>
            </div>
            <div class="c-remodal-general-information__actions">
                <button
                    class="c-remodal-general-information__button c-remodal-general-information__button--approve js-remodal-general-information__button--approve"></button>
            </div>
        </div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal c-remodal-quick-view remodal-is-initialized remodal-is-closed"
         data-remodal-id="quick-view" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"
         tabindex="-1">
        <button data-remodal-action="close" class="remodal-close c-remodal__close" aria-label="Close"></button>
        <div class="c-quick-view__content js-quick-view-section"></div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-fmcg remodal-is-initialized remodal-is-closed" data-remodal-id="fmcg-modal"
         data-remodal-options="hashTracking: false, closeOnOutsideClick: false" role="dialog" tabindex="-1">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="c-remodal-fmcg__container"><img src="https://www.digikala.com/static/files/cbaed462.png"
                                                    class="c-remodal-fmcg__logo">
            <div class="c-remodal-fmcg__content"><p class="c-remodal-fmcg__head-text">ارسال سریع کالای <span> سوپر مارکتی </span>
                    فقط در تهران و کرج امکان پذیر است.</p>
                <p class="c-remodal-fmcg__question">با توجه به محدودیت ارسال، آیا مایل هستید این کالا به سبد خرید شما
                    افزوده شود؟</p>
                <div class="c-remodal-fmcg__actions">
                    <button class="c-remodal-fmcg__button c-remodal-fmcg__button--reject js-fmcg-modal-reject">خیر
                    </button>
                    <button class="c-remodal-fmcg__button c-remodal-fmcg__button--approve js-fmcg-modal-approve">بله
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-location js-general-location remodal-is-initialized remodal-is-closed"
         data-remodal-id="general-location" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"
         tabindex="-1">
        <div class="c-remodal-location__header"><span class="js-general-location-title">انتخاب استان</span>
            <div class="c-remodal-location__close js-close-modal"></div>
        </div>
        <div class="c-remodal-location__content js-states-container">
            <div class="c-general-location__row c-general-location__row--your-location js-your-location">
                مکان‌یابی خودکار
            </div>
        </div>
        <div class="c-remodal-location__content js-cities-container" style="display: none;">
            <div class="c-general-location__row c-general-location__row--back js-back-to-states">
                بازگشت به لیست استان‌ها
            </div>
        </div>
    </div>
</div>
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div
        class="remodal c-remodal-location c-remodal-location--addresses js-general-location-addresses remodal-is-initialized remodal-is-closed"
        data-remodal-id="general-location" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"
        tabindex="-1">
        <div class="c-remodal-location__header"><span class="js-general-location-title">انتخاب آدرس</span>
            <div class="c-remodal-location__close js-close-modal"></div>
        </div>
        <div class="c-remodal-location__content js-addresses-container">
            <div class="c-ui-radio-wrapper c-ui-radio--general-location js-sample-address u-hidden"><label
                    class="c-filter__label " for="generalLocationAddress"></label><label class="c-ui-radio"><input
                        type="radio" value="" name="generalLocationAddress" class="" id="generalLocationAddress"
                        data-title=""><span class="c-ui-radio__check"></span></label></div>
            <a href="/addresses/add/" class="c-general-location__add-address js-general-location-add-address">
                افزودن آدرس جدید
            </a></div>
    </div>
</div><!---->
<style id="ins-free-style" innerhtml=""></style>
<div style="display: none; visibility: hidden;">
    <script type="text/javascript" src="//cdn-3.convertexperiments.com/js/10004913-10005940.js" async="null"
            defer="defer"></script>
</div>
<script type="text/javascript" id="">window.ga && (ga("create", "UA-13212406-1"), ga("require", "ec"));</script>
<script type="text/javascript"
        id="">window.matchMedia("(display-mode: standalone)").matches ? (window.dataLayer = window.dataLayer || [], window.dataLayer.push({pwa: "true"})) : (window.dataLayer = window.dataLayer || [], window.dataLayer.push({pwa: "false"}));</script>
</body>
