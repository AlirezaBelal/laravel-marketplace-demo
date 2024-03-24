<div>
    <div class="c-new-login">
        <aside class="c-new-login__sidebar c-new-login__sidebar--xs">
            <div class="c-new-login__sidebar-content">
                <header class="c-new-login__sidebar-header">
                    <a href="/seller/registration/" class="c-new-login__logo">
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
{{--                    <li class="c-reg-steps__item c-reg-steps__item--next">--}}

{{--                        <div class="c-reg-steps__icon c-reg-steps__icon--documents"></div>--}}
{{--                        <h2 class="c-reg-steps__header">۲. بارگذاری مدارک</h2>--}}
{{--                        <p class="c-reg-steps__description">اطلاعات مربوط به مالیات بر ارزش افزوده، تصویر مدارک شخصی و--}}
{{--                            تجاری</p>--}}
{{--                    </li>--}}
{{--                    <li class="c-reg-steps__item c-reg-steps__item--next">--}}

{{--                        <div class="c-reg-steps__icon c-reg-steps__icon--checkout"></div>--}}
{{--                        <h2 class="c-reg-steps__header">۳. اتمام ثبت نام</h2>--}}
{{--                        <p class="c-reg-steps__description">به جمع فروشندگان دیجی‌کالا خوش آمدید.</p>--}}
{{--                    </li>--}}
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

        <main class="c-new-login__main" data-select2-id="24" >

            <div class="c-reg-form c-reg-form--full" data-select2-id="23">
                <form   wire:submit.prevent="sellerForm"
                      data-select2-id="details-form">
                    <div class="c-reg-form__row">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <p class="c-reg-form__text">
                                <span class="c-reg-form__text-label">توجه: </span>پر کردن تمامی موارد الزامیست.
                            </p>
                        </div>
                    </div>
                    @include('errors.error')
                    <div class="c-reg-form__row c-reg-form__row--gap-20">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <h2 class="c-reg-form__header">چه نوع فروشنده ای هستید؟</h2>
                            <input type="hidden" name="seconds" id="seconds" value="137">
                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20">
                        <div class="c-reg-form__col">
                            <div class="c-ui-radio__group">


                                <label class="c-ui-radio">
                                    <input class="c-ui-radio__origin "
                                           onclick="noshowshow()"
                                           type="radio" name="register[private_business]"
                                           value="private" checked="" data-role="tab" data-target="real-account">
                                    <span class="c-ui-radio__check"></span>
                                    <span class="c-ui-radio__label">شخص حقیقی</span>
                                </label>


                                <label class="c-ui-radio"  >
                                    <input class="c-ui-radio__origin "
                                           onclick="shownoshow()"
                                           type="radio" name="register[private_business]"
                                           value="business" data-role="tab" data-target="business-account">
                                    <span class="c-ui-radio__check"></span>
                                    <span class="c-ui-radio__label" >شخص حقوقی</span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <script>

                        function shownoshow() {
                             document.getElementById("show1").classList.remove("c-reg-form__tab--active");
                             document.getElementById("show2").classList.add("c-reg-form__tab--active");

                        }
                        function noshowshow() {
                            document.getElementById("show1").classList.add("c-reg-form__tab--active");
                            document.getElementById("show2").classList.remove("c-reg-form__tab--active");
                        }
                    </script>

                    <div class="c-reg-form__row  c-reg-form__row--gap-10">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <p class="c-reg-form__text c-reg-form__text--condensed c-reg-form__text--gap">
                                <span class="c-reg-form__text--highlight">شخص حقیقی</span> فردی است که دارای خصوصیاتی
                                مختص به خود مانند نام، نام خانوادگی، تاریخ تولد، کد ملی، شماره شناسنامه و غیره می باشد.
                            </p>
                            <p class="c-reg-form__text c-reg-form__text--condensed">
                                <span class="c-reg-form__text--highlight">شخص حقوقی</span> موسسات یا شرکت هایی هستند که
                                پس از طی مراحل قانونی به ثبت می‌رسند و دارای مشخصاتی مانند نام شخص حقوقی، تاریخ ثبت،
                                شماره ثبت، کد شناسایی، کد اقتصادی، موضوع فعالیت و غیره می باشند.
                            </p>
                        </div>
                    </div>

                    <div id="show1" class="c-reg-form__tab c-reg-form__tab--active" data-role="tab-content" id="real-account">


                        <div class="c-reg-form__row">
                            <div class="c-reg-form__col c-reg-form__col--12">
                                <h2 class="c-reg-form__header">اطلاعات شخصی</h2>
                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="first-name">نام</label>

                                <div class="c-ui-input">


                                    <input type="text"
                                           wire:model.lazy="name"
                                           name="register[first_name]" class="c-ui-input__field"
                                           id="first-name" value="" placeholder="" maxlength="255" required="">


                                </div>

                            </div>

                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="surname">نام خانوادگی</label>

                                <div class="c-ui-input">


                                    <input type="text"
                                           wire:model.lazy="lname"
                                           name="register[last_name]" class="c-ui-input__field" id="surname"
                                           value="" placeholder="" maxlength="255" required="">


                                </div>

                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--limited c-reg-form__row--gap-20">
                            <div class="c-reg-form__col c-reg-form__col--12">
                                <label class="c-reg-form__text">تاریخ تولد ( مثال:‌ ۶۵/۱۲/۰۶ )</label>
                            </div>

                            <div class="c-reg-form__col c-reg-form__col--8 c-reg-form__col--no-gap">
                                <input type="date"
                                       wire:model.lazy="birth"
                                       name="register[last_name]" class="c-ui-input__field" id="surname"
                                       value="" placeholder="روز" maxlength="255" required="">
                            </div>


                        </div>

                        <div class="c-reg-form__row c-reg-form__row--limited c-reg-form__row--gap-20">
                            <div class="c-reg-form__col c-reg-form__col--12">
                                <label class="c-reg-form__text">جنسیت</label>
                            </div>
                            <div class="c-reg-form__col c-reg-form__col--no-gap">
                                <div class="c-ui-radio__group">


                                    <label class="c-ui-radio">
                                        <input class="c-ui-radio__origin "
                                               wire:model.lazy="gender"
                                               type="radio" name="register[gender]"
                                               value="male" checked="">
                                        <span class="c-ui-radio__check"></span>
                                        <span class="c-ui-radio__label">مرد</span>
                                    </label>


                                    <label class="c-ui-radio">
                                        <input class="c-ui-radio__origin "
                                               wire:model.lazy="gender"
                                               type="radio" name="register[gender]"
                                               value="female">
                                        <span class="c-ui-radio__check"></span>
                                        <span class="c-ui-radio__label">زن</span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="card_number">شماره شناسنامه</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[identity_card_number]"
                                           wire:model.lazy="shenasname_code"
                                           class="c-ui-input__field c-ui-input__field--ltr accept-only-digits with-fa-digit"
                                           id="card_number" value="" placeholder="۱۲۳۴۵" required=""
                                           data-exceptions="9">


                                </div>

                            </div>

                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="identity_number">کد ملی</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[national_identity_number]"
                                           wire:model.lazy="national_code"
                                           class="c-ui-input__field c-ui-input__field--ltr with-fa-digit accept-only-digits"
                                           id="identity_number" value="" placeholder="۱۲۳۴۵۶۷۸۹۰" minlength="1"
                                           maxlength="20" required="">


                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="show2" class="c-reg-form__tab " data-role="tab-content" id="business-account">


                        <div class="c-reg-form__row">
                            <div class="c-reg-form__col c-reg-form__col--12">
                                <h2 class="c-reg-form__header">اطلاعات شرکتی</h2>
                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                            <div class="c-reg-form__col c-reg-form__col--12">
                                <label class="c-reg-form__text" for="company_name">نام شرکت</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[company_name]" class="c-ui-input__field"
                                           id="company_name" value="" placeholder="نام شرکت را وارد کنید ..."
                                           maxlength="255" >


                                </div>

                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--gap-20">
                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="company_type">نوع شرکت</label>
                                <input type="text" name="register[last_name]" class="c-ui-input__field" id="surname"
                                       value="" placeholder="نوع سهام (عام یا خاص)" maxlength="255" >
                            </div>

                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="company_registration_number">شماره ثبت</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[company_registration_number]"
                                           class="c-ui-input__field c-ui-input__field--ltr accept-only-digits"
                                           id="company_registration_number" value="" placeholder="۱۲۳۴۵" maxlength="255"
                                            data-exceptions="9" >


                                </div>

                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--gap-20">
                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="company_national_identity_number">شناسه ملی</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[company_national_identity_number]"
                                           class="c-ui-input__field c-ui-input__field--ltr accept-only-digits"
                                           id="company_national_identity_number" value="" placeholder="۱۲۳۴۵۶۷۸۹۰"
                                           maxlength="255"  data-exceptions="9" >


                                </div>

                            </div>

                            <div class="c-reg-form__col c-reg-form__col--6">
                                <label class="c-reg-form__text" for="company_economic_number">کد اقتصادی</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[company_economic_number]"
                                           class="c-ui-input__field c-ui-input__field--ltr accept-only-digits"
                                           id="company_economic_number" value="" placeholder="۱۲۳۴۵۶۷۸۹۰" minlength="12"
                                           maxlength="12"  data-exceptions="9">


                                </div>

                            </div>
                        </div>

                        <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                            <div class="c-reg-form__col c-reg-form__col--12">
                                <label class="c-reg-form__text" for="company_authorized_representative">صاحبان حق
                                    امضا</label>

                                <div class="c-ui-input">


                                    <input type="text" name="register[company_authorized_representative]"
                                           class="c-ui-input__field" id="company_authorized_representative" value=""
                                           maxlength="255" >


                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="c-reg-form__row c-reg-form__row--gap-60">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <h2 class="c-reg-form__header">اطلاعات تماس</h2>
                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                        <div class="c-reg-form__col c-reg-form__col--6">
                            <label class="c-reg-form__text" for="state-id">استان</label>
                            <div class="c-reg-form__col  ">
                                <input type="text"
                                       wire:model.lazy="state"
                                       name="register[last_name]" class="c-ui-input__field" id="surname"
                                       value="" placeholder="استان" maxlength="255" required="">
                            </div>
                        </div>

                        <div class="c-reg-form__col c-reg-form__col--6">
                            <label class="c-reg-form__text" for="city-id">شهر</label>
                            <div class="c-reg-form__col  ">
                                <input type="text" name="register[last_name]"
                                       wire:model.lazy="city"
                                       class="c-ui-input__field" id="surname"
                                       value="" placeholder="شهر" maxlength="255" required="">
                            </div>
                    </div>
                    </div>
                    <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <label class="c-reg-form__text" for="address">آدرس</label>

                            <div class="c-ui-input">


                                <input type="text" name="register[address]"
                                       wire:model.lazy="address"
                                       class="c-ui-input__field" id="address"
                                       value=""
                                       placeholder="آدرس خود را به صورت کامل (محله - خیابان اصلی - کوچه - پلاک – واحد ) وارد نمایید"
                                       maxlength="255" required="">


                            </div>

                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <label class="c-reg-form__text" for="postal-code">کد پستی</label>

                            <div class="c-ui-input">


                                <input type="text" name="register[post_code]"
                                       wire:model.lazy="pin_code"
                                       class="c-ui-input__field c-ui-input__field--ltr accept-only-digits with-fa-digit"
                                       id="postal-code" value="" placeholder="۱۲۳۴۵ - ۶۷۸۹۰" minlength="10"
                                       maxlength="10" required="" data-exceptions="9">


                            </div>

                        </div>


                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20">
                        <div class="c-reg-form__col c-reg-form__col--6">
                            <div class="c-reg-form__row">
                                <div class="c-reg-form__col c-reg-form__col--12">
                                    <label class="c-reg-form__text" for="landing-phone">تلفن ثابت</label>
                                </div>
                                <div
                                    class="c-reg-form__col c-reg-form__col--6 c-reg-form__col--xs-8 c-reg-form__col--no-gap">

                                    <div class="c-ui-input">


                                        <input type="text" name="register[phone]"
                                               wire:model.lazy="telephone"
                                               class="c-ui-input__field c-ui-input__field--ltr accept-only-digits with-fa-digit"
                                               id="landing-phone" value="" placeholder="۶۱۹۳ ۰۰۰۰" minlength="8"
                                               maxlength="8" required="" data-exceptions="9">


                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="c-reg-form__col c-reg-form__col--6">
                            <label class="c-reg-form__text" for="mobile-phone">تلفن همراه</label>

                            <div class="c-ui-input">


                                <input type="text" name="register[mobile_phone]"
                                       wire:model.lazy="mobile"
                                       class="c-ui-input__field c-ui-input__field--ltr accept-only-digits with-fa-digit"
                                       id="mobile-phone" value="" placeholder="۰۹" minlength="11" maxlength="11"
                                      data-exceptions="9">


                            </div>

                        </div>
                    </div>


                    <div class="c-reg-form__row c-reg-form__row--gap-50">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <h2 class="c-reg-form__header">اطلاعات تجاری</h2>
                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <label class="c-reg-form__text" for="business_name">نام فروشگاه</label>

                            <div class="c-ui-input">


                                <input type="text" name="register[business_name]"
                                       wire:model.lazy="brand_name"
                                       class="c-ui-input__field"
                                       id="business_name" value="" placeholder="نام فروشگاه شما در سایت دیجی‌کالا"
                                       maxlength="255" required="">


                            </div>

                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <label class="c-reg-form__text" for="shaba-number">شماره شبا (به نام شخص یا شرکت ثبت نام
                                کننده)</label>

                            <div class="c-ui-input">


                                <input type="text" name="register[shaba_number]"
                                       wire:model.lazy="bank_shaba"
                                       class="c-ui-input__field c-ui-input__field--ltr accept-only-digits js-sheba-field"
                                       id="shaba-number" value="" placeholder="IR __-____-____-____-____-____-__"
                                       maxlength="33" required="" data-exceptions="73, 82"
                                       data-ui-tooltip="با کلیک راست بر روی کادر و انتخاب گزینه Paste می توانید شماره شبا خود را اضافه نمایید.">


                            </div>

                        </div>
                    </div>

                    <div class="c-reg-form__row c-reg-form__row--gap-20 ">
                        <div class="c-reg-form__col c-reg-form__col--12">
                            <label class="c-reg-form__text" for="description_of_products">قصد فروش چه کالاهایی را
                                دارید؟</label>
                            <input type="text"
                                   wire:model.lazy="about"
                                   name="register[last_name]" class="c-ui-input__field" id="surname"
                                   value="" placeholder="نوع کالا" maxlength="255" required="">

                        </div>
                    </div>

{{--                    <div class="c-reg-form__row c-reg-form__row--gap-20 ">--}}
{{--                        <div class="c-reg-form__col c-reg-form__col--6" data-select2-id="22">--}}
{{--                            <label class="c-reg-form__text" for="number-of-products">تعداد حدودی تنوع کالای آماده--}}
{{--                                فروش</label>--}}
{{--                            <input type="text" name="register[last_name]" class="c-ui-input__field" id="surname"--}}
{{--                                   value="" placeholder="تعداد فروش" maxlength="255" required="">--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="c-reg-form__row c-reg-form__row--gap-50">
                        <div class="c-reg-form__col">
                            <button type="submit" class="c-reg-form__submit-btn c-reg-form__submit-btn--xs-block">
                                ثبت نام
                            </button>
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
