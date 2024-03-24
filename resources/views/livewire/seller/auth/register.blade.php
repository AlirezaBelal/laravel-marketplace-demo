<div>
    <div class="c-new-login">
        <aside class="c-new-login__sidebar c-new-login__sidebar--xs">
            <div class="c-new-login__sidebar-content">
                <header class="c-new-login__sidebar-header">
                    <a href="/registration/" class="c-new-login__logo">
                        <img src="https://seller.digikala.com/static/files/9eb66c4d.svg"
                             alt="Digikala marketplace seller center logo">
                    </a>

                    <h1 class="c-new-login__header">ثبت‌نام در مرکز فروشندگان</h1>
                </header>


                <ul class="c-reg-steps">
                    <li class="c-reg-steps__item">

                        <div class="c-reg-steps__icon c-reg-steps__icon--info c-reg-steps__icon--current"></div>
                        <h2 class="c-reg-steps__header">۱. اطلاعات فروشنده</h2>
                        <p class="c-reg-steps__description">اطلاعات شخصی فروشنده، اطلاعات تجاری، اطلاعات تماس</p>
                    </li>
                    <li class="c-reg-steps__item c-reg-steps__item--next">

                        <div class="c-reg-steps__icon c-reg-steps__icon--documents"></div>
                        <h2 class="c-reg-steps__header">۲. بارگذاری مدارک</h2>
                        <p class="c-reg-steps__description">اطلاعات مربوط به مالیات بر ارزش افزوده، تصویر مدارک شخصی و
                            تجاری</p>
                    </li>
                    <li class="c-reg-steps__item c-reg-steps__item--next">

                        <div class="c-reg-steps__icon c-reg-steps__icon--checkout"></div>
                        <h2 class="c-reg-steps__header">۳. اتمام ثبت نام</h2>
                        <p class="c-reg-steps__description">به جمع فروشندگان دیجی‌کالا خوش آمدید.</p>
                    </li>
                </ul>


                <footer class="c-new-login__footer">
                    <p>Copyright © 2006 - 2020 Digikala.com</p>
                </footer>
            </div>
        </aside>

        <aside class="c-new-login__sidebar c-new-login__sidebar--xs-visible">
            <div class="c-new-login__sidebar-content">
                <header class="c-new-login__sidebar-header">
                    <a href="/registration/" class="c-new-login__logo">
                        <img src="https://seller.digikala.com/static/files/9eb66c4d.svg"
                             alt="Digikala marketplace seller center logo">
                    </a>

                    <h1 class="c-new-login__header">ثبت‌نام در مرکز فروشندگان</h1>
                </header>
            </div>
        </aside>

        <main class="c-new-login__main">
            <div class="c-reg-form">
                <form wire:submit.prevent="registerSellerForm" >
                    @include('errors.error')

                    <div class="c-reg-form__row c-reg-form__row--gap-60">
                        <div class="c-reg-form__col c-reg-form__col--12 has-error">

                            <div class="c-ui-input has-error">


                                <input type="text" name="register[email]" wire:model.lazy="seller.email"
                                       class="c-ui-input__field c-ui-input__field--ltr c-ui-input__field--has-icon"
                                       placeholder="ایمیل خود را وارد کنید" maxlength="255" autocomplete="email"
                                       required="" aria-invalid="true" aria-describedby="register[email]-error">

                                <div class="c-ui-input__icon c-ui-input__icon--email"></div>

                            </div>

{{--                            <div id="register[email]-error" class="error c-reg-form__error">وارد نمودن ایمیل اجباری--}}
{{--                                است--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="c-reg-form__row">
                        <div class="c-reg-form__col c-reg-form__col--12 has-error">

                            <div class="c-ui-input has-error">


                                <input type="password" name="register[password]" wire:model.lazy="seller.password"
                                       class="c-ui-input__field c-ui-input__field--ltr c-ui-input__field--has-icon c-ui-input__field--has-btn"
                                       placeholder="رمز عبور خود را انتخاب کنید" minlength="4" maxlength="255"
                                       autocomplete="current-password" required="" aria-invalid="true"
                                       aria-describedby="register[password]-error">

                                <div class="c-ui-input__icon c-ui-input__icon--password"></div>
                                <div class="c-ui-input__btn c-ui-input__btn--password "></div>


                            </div>

{{--                            <div id="register[password]-error" class="error c-reg-form__error">وارد کردن رمز عبور اجباری--}}
{{--                                می‌باشد--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="c-reg-form__row">
                        <div class="c-reg-form__col c-reg-form__col--12">

                            <div class="c-ui-input">


                                <input type="text" name="register[register_phone]" wire:model.lazy="seller.phone"
                                       class="c-ui-input__field c-ui-input__field--ltr c-ui-input__field--has-icon accept-only-digits"
                                       id="mobile-phone" placeholder="۰۹" minlength="11" maxlength="11" required=""
                                       data-exceptions="9">

                                <div class="c-ui-input__icon c-ui-input__icon--phone"></div>

                            </div>

                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--align-center c-reg-form__row--gap-50">
                        <div class="c-reg-form__col">
                            <button type="submit" class="c-reg-form__submit-btn" >ثبت نام</button>
                        </div>
                    </div>


                    <div class="c-reg-form__row c-reg-form__row--align-center c-reg-form__row--gap-40">
                        <div class="c-reg-form__col">
                            <p class="c-reg-form__text">قبلاً ثبت نام کرده‌ام. <a href="/seller/account/login"
                                                                                  class="c-reg-form__link">ورود</a></p>
                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-40">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <p class="c-reg-form__text c-reg-form__text--condensed c-reg-form__text--pane">
                                <span class="c-reg-form__text-label">توجه: </span> در صورتی که مراحل ثبت نام را نیمه
                                تمام گذاشته
                                اید، می توانید با همان ایمیل ثبت نام خود را ادامه دهید.
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="c-new-login__content-footer">
                <li class="c-new-login__content-footer-item">
                    <a target="_blank" href="/fbs-courier/">ثبت رسید سفارش</a>
                </li>
                <li class="c-new-login__content-footer-item">
                    <a target="_blank" href="http://www.digikala.com/">فروشگاه اینترنتی دیجی‌کالا</a>
                </li>
                <li class="c-new-login__content-footer-item">
                    <a target="_blank" href="https://selleracademy.digikala.com/">مرکز آموزش فروشندگان</a>
                </li>
                <li class="c-new-login__content-footer-item">
                    <a target="_blank"
                       href="https://selleracademy.digikala.com/%D8%B3%D9%88%D8%A7%D9%84%D8%A7%D8%AA-%D9%85%D8%AA%D8%AF%D8%A7%D9%88%D9%84/">سوالات
                        متداول</a>
                </li>
                <li class="c-new-login__content-footer-item">
                    <a target="_blank" href="https://www.digikala.com/s/9stgvs">مراحل ثبت نام</a>
                </li>
            </ul>
        </main>
    </div>
</div>
