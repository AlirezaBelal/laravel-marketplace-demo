<form wire:submit.prevent="loginForm">
    <div class="c-reg-form__row">
        <div class="c-reg-form__col c-reg-form__col--12 has-error">

            <div class="c-ui-input has-error">


                <input type="text" name="login[email]"
                       wire:model.defer="email"
                       class="c-ui-input__field c-ui-input__field--ltr c-ui-input__field--has-icon" value=""
                       placeholder="ایمیل خود را وارد کنید" maxlength="255" autocomplete="email" required=""
                       aria-invalid="true" aria-describedby="login[email]-error">

                <div class="c-ui-input__icon c-ui-input__icon--email"></div>

            </div>

{{--            <div id="login[email]-error" class="error c-reg-form__error">وارد نمودن ایمیل اجباری است</div>--}}
        </div>
    </div>
    <div class="c-reg-form__row">
        <div class="c-reg-form__col c-reg-form__col--12 has-error">

            <div class="c-ui-input has-error">


                <input type="text" name="login[password]"
                       wire:model.defer="password"
                       class="c-ui-input__field c-ui-input__field--ltr c-ui-input__field--has-icon c-ui-input__field--has-btn"
                       placeholder="کلمه عبور خود را وارد کنید"   maxlength="255"
                       autocomplete="current-password" required="" aria-invalid="true"
                        >

                <div class="c-ui-input__icon c-ui-input__icon--password"></div>
                <div class="c-ui-input__btn c-ui-input__btn--password "></div>


            </div>

{{--            <div id="login[password]-error" class="error c-reg-form__error" style="">وارد کردن رمز عبور--}}
{{--                اجباری می‌باشد--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="c-reg-form__row c-reg-form__row--gap-40 c-reg-form__row--align-center">
        <div class="c-reg-form__col">
            <div class="c-ui-checkbox__group">


                <label class="c-ui-checkbox">
                    <input class="c-ui-checkbox__origin " type="checkbox" name="login[remember]"
                           value="true">
                    <span class="c-ui-checkbox__check"></span>
                    <span class="c-ui-checkbox__label">مرا به خاطر بسپار</span>
                </label>
            </div>

        </div>
    </div>


    <div class="c-reg-form__row c-reg-form__row--align-center">
        <div class="c-reg-form__col">
            <button class="c-reg-form__submit-btn" id="btnSubmit">ورود</button>
        </div>
    </div>

    <div class="c-reg-form__row c-reg-form__row--align-center c-reg-form__row--gap-40">
        <div class="c-reg-form__col">
            <p class="c-reg-form__text"><a href="/seller/account/forgotpassword/" class="c-reg-form__link">رمز
                    عبورم را
                    فراموش کرده ام.</a></p>
        </div>
    </div>
    <div class="c-reg-form__row c-reg-form__row--align-center c-reg-form__row--gap-40">
        <div class="c-reg-form__col">
            <p class="c-reg-form__text">هنوز ثبت نام نکرده‌اید؟ <a href="/seller/registration/"
                                                                   class="c-reg-form__link">همین حالا ثبت
                    نام کنید</a></p>
        </div>
    </div>
</form>
