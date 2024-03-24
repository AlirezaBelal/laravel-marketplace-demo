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
                <form  wire:submit.prevent="registerEmailVerify">

                    <div class="c-reg-form__row">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <p class="c-reg-form__text c-reg-form__text--condensed c-reg-form__text--pane c-reg-form__text--pane-light">
                                <span class="c-reg-form__text--highlight c-reg-form__text-label">توجه: </span> ایمیل
                                فعالسازی برای شما ارسال شده است. در صورتی که ایمیل مربوطه در <span
                                    class="c-reg-form__text--highlight">Inbox</span> شما نیست، پوشه <span
                                    class="c-reg-form__text--highlight">Spam</span> ایمیل خود را نیز بررسی نمایید و
                                حتماً در ایمیل دریافتی بر روی <span
                                    class="c-reg-form__text--highlight">Report Not Spam</span> کلیک کنید تا ایمیل های
                                ارسالی از طرف دیجی‌کالا در پوشه <span class="c-reg-form__text--highlight">Inbox</span>
                                شما قرار بگیرد.
                            </p>
                        </div>
                    </div>
                    <div class="c-reg-form__row c-reg-form__row--gap-40">
                        <div class="c-reg-form__col c-reg-form__col--12">

                            <div class="c-ui-input">


                                <input type="text" name=""
                                       class="c-ui-input__field c-ui-input__field--ltr c-ui-input__field--has-icon c-ui-input__field--has-btn"
                                       value="{{$seller->email}}" readonly="" tabindex="-1" disabled="">

                                <div class="c-ui-input__icon c-ui-input__icon--email"></div>
                                <a href="{{route('seller.register')}}" class="c-ui-input__btn c-ui-input__btn--edit"></a>


                            </div>

                        </div>
                    </div>
                    <div class="c-reg-form__row c-reg-form__row--align-center">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <p class="c-reg-form__text c-reg-form__text--gap">کد ارسال شده به ایمیلتان را وارد کنید.</p>

                            <div class="c-ui-input">


                                <input type="text" name="register[code]" wire:model.lazy="code"
                                       class="c-ui-input__field " style="direction: ltr;width: 256px" id="register[code]"
                                       value="" minlength="4" maxlength="4" >



                            </div>

                        </div>
                    </div>
                    <div class="c-reg-form__row c-reg-form__row--align-center c-reg-form__row--gap-50">
                        <div class="c-reg-form__col">
                            <button type="submit" class="c-reg-form__submit-btn" >ثبت کد تأیید</button>
                        </div>
                    </div>
                    <div class="c-reg-form__row c-reg-form__row--align-center c-reg-form__row--gap-40">
                        <div class="c-reg-form__col" id="countdown-target">
                            <p class="c-reg-form__text" style="visibility: hidden;">کد تأیید دریافت نکرده‌اید؟ <a
                                    href="#" id="resend-email-verification-code" class="c-reg-form__link">ارسال مجدد کد
                                    تأیید</a></p>
                            <div class="c-reg-form__timer"><span>۴:۴۲</span> ثانیه</div>
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
