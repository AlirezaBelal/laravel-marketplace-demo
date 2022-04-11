<div>
    @section('title')
        ورود به حساب کاربری
    @endsection
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
                <div class="u-hidden js-invalid-login-message" data-invalid="0">

                </div>
                <div class="c-login__box">

                    <form class="c-login__form"  id="loginForm"
                          wire:submit.prevent="userForm"
                          novalidate="novalidate">

                        <div class="c-login__header-logo c-login__header-logo--lg">
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="{{asset('css/bc60cf05.svg')}}">
                            </a>
                        </div>

                        <div class="c-login__form-header">
                            ورود / ثبت ‌نام
                        </div>
                        <div class="c-login__opt-mobile-message">
                            شماره موبایل یا پست الکترونیک  خود را وارد کنید
                        </div>
                        <div class="c-login__form-row">
                            <label class="o-form__field-container">
                                <div class="o-form__field-frame">
                                    <input wire:model.lazy="user.email_phone" name="email_phone" type="" placeholder="" value="" class="o-form__field js-input-field ">
                                    <span type="button" class="o-form__field-clear-button js-ui-field-cleaner u-hidden"></span>
                                </div>
                            </label>

                        </div>
                        <button type="submit" class="o-btn o-btn--contained-red-lg c-login__form-action">
                            ورود به دیجی‌کالا
                        </button>
                        <p class="c-login__footer">
                            با ورود و یا ثبت نام در دیجی‌کالا شما
                            <a href="/page/terms/" target="_blank">
                                شرایط و قوانین
                            </a>
                            استفاده از سرویس های سایت دیجی‌کالا و
                            <a href="/page/privacy/" target="_blank">
                                قوانین حریم خصوصی
                            </a>
                            آن را می‌پذیرید.
                        </p>

                    </form>
                </div>
            </section>
        </div>
    </main>
</div>
