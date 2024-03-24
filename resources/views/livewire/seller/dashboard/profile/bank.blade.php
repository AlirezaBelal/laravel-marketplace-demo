<div class="c-RD-profile__dis-none" data-name="bankInfo" style="display: none;">

    <div class="c-grid__row c-RD-profile__mt-0" id="bankInfo">
        <div class="c-grid__col js-profile-bank-info-form">
            <div class="c-card c-RD-profile__bdrs-top-0 js-profile-content-spinner"
                 style="box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.05);">
                <div class="c-card__header c-card__header--with-controls uk-hidden">

                </div>
                <div class="c-card__body c-card__body--form">
                    <div class="c-grid__row">
                        <div
                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-10 c-RD-profile__section-title">
                            <span class="c-RD-profile__title">اطلاعات حساب بانکی</span>
                        </div>

                        <div
                            class="c-RD-profile__action-btn c-RD-profile__action-btn--cancel js-profile-cancel-edit-form uk-hidden"></div>
                    </div>
                    <div class="c-ui-form__row js-bank-info">
                        <div
                            class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12 c-ui-form__col--wrap-xs">
                            <label class="c-RD-profile__input-name"
                                   for="bankInfo[shabaNumber]">شماره شبا</label>

                            <div class="c-ui-input ">


                                <input type="text" name="bankInfo[shabaNumber]"
                                       class="c-ui-input__field c-ui-input__RD-field c-ui-input__field c-ui-input__RD-field--ltr accept-only-digits"
                                       id="bankInfo[shabaNumber]" value="{{$seller->bank_shaba}}"
                                       placeholder="IR ________________________"
                                       maxlength="26" required="" readonly="" tabindex="-1"
                                       data-exceptions="73, 82">


                            </div>

                            <div class="c-RD-profile__checking">
                                <div
                                    class="c-RD-profile__checking--waiting js-new-sheba-num ">
                                    در انتظار تایید
                                </div>
                                <div
                                    class="c-RD-profile__checking--verified js-vrified-sheba-num uk-hidden">
                                    تایید شده
                                </div>
                                <div
                                    class="c-RD-profile__checking--conflict js-conflict-sheba-num uk-hidden">
                                    رد شده
                                </div>
                                <div
                                    class="c-RD-profile__checking--conflict js-invalid-sheba-num uk-hidden">
                                    شماره شبا نامعتبر است
                                </div>
                            </div>
                        </div>
                        <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                            <div class="c-form">
                                <label class="c-RD-profile__input-name"
                                       for="bank-account-owner">صاحب / صاحبان حساب</label>

                                <div class="c-ui-input ">


                                    <input type="text" name=""
                                           class="c-ui-input__field c-ui-input__RD-field js-read-only-bank-item"
                                           id="bank-account-owner" value="{{$seller->bank_account_name}}"
                                    >


                                </div>

                            </div>
                        </div>
                    </div>
                    <div
                        class="c-ui-form__row c-RD-profile__form-action js-profile-form-action  ">
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
        <div id="approve-bank-info" uk-modal="esc-close:false;bg-close:false;"
             class="c-RD-profile__profile-modal uk-modal">
            <div class="uk-modal-dialog c-RD-profile__profile-modal--bank">
                <button
                    class="uk-modal-close-default c-RD-profile__profile-modal-close uk-close uk-icon"
                    type="button" uk-close="ratio: 1.5">
                    <svg width="21" height="21" viewBox="0 0 14 14"
                         xmlns="http://www.w3.org/2000/svg" ratio="1.5">
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1"
                              x2="13" y2="13"></line>
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1"
                              x2="1" y2="13"></line>
                    </svg>
                </button>
                <div class="c-RD-profile__profile-modal-alignment">
                <span class="uk-flex uk-flex-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="56" viewBox="0 0 128 56">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#57CFB1"
                                  d="M12.42 0h110.16c2.994 0 5.42 2.354 5.42 5.258v39.484c0 2.904-2.426 5.258-5.42 5.258H12.42C9.426 50 7 47.646 7 44.742V5.258C7 2.354 9.426 0 12.42 0z"></path>
                            <path fill="#62666D" fill-rule="nonzero"
                                  d="M116.696 4C119.626 4 122 6.425 122 9.417v41.166c0 2.992-2.375 5.417-5.304 5.417H5.304C2.374 56 0 53.575 0 50.583V9.417C0 6.425 2.375 4 5.304 4h111.392zm0 2H5.304C3.49 6 2 7.52 2 9.417v41.166C2 52.48 3.489 54 5.304 54h111.392c1.815 0 3.304-1.52 3.304-3.417V9.417C120 7.52 118.511 6 116.696 6z"></path>
                            <path fill="#FFF" fill-rule="nonzero"
                                  d="M74.887 38.913h36.082c.57 0 1.031.467 1.031 1.044 0 .548-.419.998-.95 1.04l-.08.003H74.886c-.57 0-1.031-.467-1.031-1.043 0-.55.418-1 .95-1.04l.08-.004h36.083-36.082zm-10.31-10.435h46.392c.57 0 1.031.467 1.031 1.044 0 .549-.419.998-.95 1.04l-.08.003H64.576c-.569 0-1.03-.467-1.03-1.043 0-.55.418-.999.95-1.04l.08-.004h46.392-46.392zM90.351 17h20.618c.57 0 1.031.467 1.031 1.043 0 .55-.419 1-.95 1.04l-.08.004H90.35c-.569 0-1.03-.467-1.03-1.044 0-.548.418-.998.95-1.04l.08-.003h20.62-20.62zm-25.774 0h20.619c.57 0 1.03.467 1.03 1.043 0 .55-.418 1-.95 1.04l-.08.004H64.577c-.569 0-1.03-.467-1.03-1.044 0-.548.418-.998.95-1.04l.08-.003h20.619-20.619zm-25.773 0h20.619c.569 0 1.03.467 1.03 1.043 0 .55-.418 1-.95 1.04l-.08.004H38.804c-.57 0-1.03-.467-1.03-1.044 0-.548.418-.998.95-1.04l.08-.003h20.619-20.619zm-25.773 0h20.618c.57 0 1.031.467 1.031 1.043 0 .55-.418 1-.95 1.04l-.08.004H13.03c-.568 0-1.03-.467-1.03-1.044 0-.548.419-.998.95-1.04l.08-.003h20.62-20.62z"></path>
                        </g>
                    </svg>
                </span>
                    <p class="c-RD-profile__profile-modal-sheba-title">
                        تایید اطلاعات حساب
                    </p>
                    <div class="c-RD-profile__profile-modal-sheba-info uk-flex">
                        <div class="uk-flex-column">
                            <p class="c-RD-profile__profile-modal-sheba-item">شماره شبای
                                شما:</p>
                            <p class="c-RD-profile__profile-modal-sheba-item uk-text-nowrap">
                                نام صاحب حساب:</p>
                            <p class="c-RD-profile__profile-modal-sheba-item">بانک عامل:</p>
                        </div>
                        <div
                            class="uk-flex-column uk-margin-small-right js-profile-bank-info-iban">
                            <p class="c-RD-profile__profile-modal-sheba-item uk-text-nowrap">
                                &nbsp;{shabaNumber}</p>
                            <p class="c-RD-profile__profile-modal-sheba-item uk-text-nowrap">
                                &nbsp;{accountOwner}</p>
                            <p class="c-RD-profile__profile-modal-sheba-item uk-text-nowrap">
                                &nbsp;{accountBank}</p>
                        </div>
                    </div>

                </div>
                <div
                    class="c-RD-profile__profile-modal-action c-RD-profile__profile-modal-action--bank uk-flex uk-flex-between uk-flex-middle uk-margin-remove-top">
                    <p style="font-size: 13px;">
                        آیا صحت اطلاعات فوق را تأیید می کنید؟
                    </p>
                    <div class="uk-flex">
                        <div
                            class="c-RD-profile__approve-btn c-RD-profile__approve-btn--modal uk-flex uk-flex-center uk-flex-middle js-profile-bank-info-iban-verify">
                            بله، تأیید می‌کنم
                        </div>
                        <div
                            class="c-RD-profile__cancel-btn c-RD-profile__cancel-btn--modal uk-flex uk-flex-center uk-flex-middle uk-margin-small-right uk-modal-close"
                            uk-modal-close="">خیر، اصلاح می‌کنم
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="js-profile-bank-info-save-iban" uk-modal="esc-close:false;bg-close:false;"
         class="c-ui-modal-new uk-modal">
        <div class="uk-modal-dialog">
            <button
                class="uk-modal-close-default c-RD-profile__profile-modal-close uk-close uk-icon"
                type="button" uk-close="ratio: 1.5">
                <svg width="21" height="21" viewBox="0 0 14 14"
                     xmlns="http://www.w3.org/2000/svg" ratio="1.5">
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13"
                          y2="13"></line>
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1"
                          y2="13"></line>
                </svg>
            </button>
            <div class="c-modal-notification">
                <div
                    class="c-modal-notification__content c-modal-notification__content--limited">
                    <div
                        class="c-modal-notification__bg-img c-modal-notification__bg-img--success"></div>
                    <h2 class="c-modal-notification__header">کد شبای شما با موفقیت ثبت
                        گردید</h2>
                    <p class="c-modal-notification__text">
                        توجه داشته باشید که صورتحساب‌ فعلی شما که در دست اقدام می‌باشد با کد
                        شبای قبلی تسویه خواهد شد و تسویه صورتحساب‌های آتی شما با کد شبای
                        جدید صورت خواهد پذیرفت.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
