<div>
    @yield('title','ثبت نام')
    <main id="main">
        <div class="c-toast__container js-toast-container">
            <div class="c-toast js-toast" style="display: none">
                <div class="c-toast__text js-toast-text">

                </div>
                <div class="c-toast__btn-container">
                    <button type="button" class="js-toast-btn o-link o-link--sm o-link--no-border o-btn">
                        متوجه شدم
                    </button>
                </div>
            </div>
        </div>
        <div class="semi-modal-layout">
            <section class="o-page o-page--account-box">
                <div class="c-login__box">

                    <form class="c-login__form" method="post" id="authForm" data-phone-number="09378589767"
                          novalidate="novalidate">
                        <input type="hidden" name="rc" value="UVo2aEhtTmYycFN1TmpDNU9pSm4yUT09"><input type="hidden"
                                                                                                       name="rd"
                                                                                                       value="WGR6QUJaSy9JQmVjM20xZHdEV0c0S0tkTmJPaVNNcUpUL3FPRU1uc0hyUGdTS214aUNCSHhqZ3U2UkhoTTJzVg~~">

                        <div class="c-login__header-logo">
                            <a href="" class="c-login__back-button"></a>
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="https://www.digikala.com/static/files/bc60cf05.svg">
                            </a>
                        </div>

                        <div class="c-login__form-header">
                            کد تایید را وارد نمایید
                        </div>
                        <div class="c-login__opt-mobile-message">
                            حساب کاربری با شماره موبایل
                            ۰۹۳۷۸۵۸۹۷۶۷
                            وجود ندارد.
                            <br>
                            برای ساخت حساب جدید، کد تایید برای این شماره ارسال گردید.
                        </div>
                        <div class="c-login__form-row">
                            <label class="o-form__field-container">
                                <div class="o-form__field-frame">
                                    <input name="login[code]" type="" placeholder="" value=""
                                           class="o-form__field js-input-field c-login__otp-input" maxlength="5">
                                </div>
                            </label>

                        </div>
                        <div class="c-login__resend-otp-section">
                            <div class="c-login__resend-otp-message js-phone-code-container u-hidden">
                                ارسال مجدد کد تا
                                <span class="js-phone-code-counter" data-countdownseconds="152">۰۰:۰۰</span>
                                دیگر
                            </div>
                            <button type="button"
                                    class="o-btn o-btn--full-width o-btn--link-blue-lg js-send-otp-confirm-code"
                                    data-mode="register">
                                دریافت مجدد کد تایید
                            </button>
                        </div>
                        <button type="submit" class="o-btn o-btn--full-width o-btn--contained-red-lg">
                            ادامه
                        </button>

                    </form>
                </div>
            </section>
        </div>
    </main>
</div>
