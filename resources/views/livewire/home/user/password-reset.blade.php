<div>
    @section('title','بازیابی رمزعبور')
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

                    <form class="c-login__form" id="changepasswordForm"
                          wire:submit.prevent="userForm"
                          data-name="changepassword" novalidate="novalidate">
                        <div class="c-login__header-logo">
                            <a href="" class="c-login__back-button"></a>
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="https://www.digikala.com/static/files/bc60cf05.svg">
                            </a>
                        </div>
                        <input type="hidden" name="rc" value="cVR0VVYvdlIxU01qWmNpOWFabjRsZz09"><input type="hidden" name="rd" value="Uk16YSt3NUh5NnIwdzBheDZiTDlFekM0WnI0bXNSUVY1d3J6UFd3RW10UEpCQVZHWUlkcmpYNGZwSVM5dDA2eFA5ZEZlZmtnVWtZN1E2NExoTVp2RHc9PQ~~">
                        <div class="c-login__grow-column">
                            <div class="c-login__form-header">
                                تغییر رمز عبور
                            </div>

                            <div class="c-login__opt-mobile-message">
                                رمز عبور شما باید حداقل ۶ حرف باشد
                            </div>

                            <div class="c-login__form-row">
                                <label class="o-form__field-container has-error">
                                    <div class="o-form__field-label">رمز عبور جدید*</div>
                                    <div class="o-form__field-frame">
                                        <input wire:model.lazy="sms.password2" name="changepassword[password]" type="password" id="txtPassword" placeholder="رمز عبور جدید خود را وارد نمایید" value="" class="o-form__field js-input-field " aria-describedby="txtPassword-error">
                                        <span type="button" class="o-form__password-field-button js-ui-toggle-password o-form__password-field-button--show-password"></span>
                                    </div>
                                    <div id="txtPassword-error" class="error o-form__error" style="">رمز عبور را وارد نمایید</div></label>

                            </div>

                            <div class="c-login__form-row">
                                <label class="o-form__field-container">
                                    <div class="o-form__field-label">تکرار رمز عبور جدید*</div>
                                    <div class="o-form__field-frame">
                                        <input wire:model.lazy="sms.password_confirmed"  name="changepassword[password2]" type="password" id="" placeholder="تکرار رمز عبور جدید خود را وارد نمایید" value="" class="o-form__field js-input-field ">
                                        <span type="button" class="o-form__password-field-button js-ui-toggle-password"></span>
                                    </div>
                                </label>

                            </div>
                        </div>

                        <button type="submit" class="o-btn o-btn--full-width o-btn--contained-red-lg">
                            تغییر رمز عبور
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</div>
