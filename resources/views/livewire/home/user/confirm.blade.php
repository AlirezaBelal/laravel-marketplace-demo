<div>
    @section('title','ورود')
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

                    <form class="c-login__form"
                          wire:submit.prevent="userForm"
                          id="authForm" novalidate="novalidate">

                        <div class="c-login__header-logo">
                            <a href="/users/login-register/?_back=https://www.digikala.com/yosdgd7epjksneuaiqm2ms%26amp;type%3Dregister%26amp;_back%3Dhttps://www.digikala.com//"
                               class="c-login__back-button"></a>
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="https://www.digikala.com/static/files/bc60cf05.svg">
                            </a>
                        </div>

                        <div class="c-login__grow-column">
                            <div class="c-login__form-header">
                                رمز عبور را وارد کنید
                            </div>
                            <div class="c-login__opt-mobile-message">
                                رمز عبور حساب کاربری خود را وارد کنید
                            </div>
                            <div class="c-login__form-row">
                                <label class="o-form__field-container">
                                    <div class="o-form__field-frame">
                                        <input wire:model.lazy="user.password2" name="password2" type="password" id=""
                                               placeholder="" value=""
                                               class="o-form__field js-input-field ">
                                        <span type="button"
                                              class="o-form__password-field-button js-ui-toggle-password"></span>
                                    </div>
                                </label>

                            </div>

                            <div class="c-login__form-row">
                                <a href="{{route('users.confirm.password',$user->id)}}">
                                    <button type="button" class="c-login__arrow-link">
                                        ورود با رمز یک‌بار مصرف
                                    </button>
                                </a>
                            </div>
                            <div class="c-login__form-row">
                                <a href="{{route('users.password.confirm',$user)}}"
                                   data-snt-event="dkLoginClick"
                                   data-snt-params="{&quot;type&quot;:&quot;forgetPassword&quot;,&quot;site&quot;:&quot;login-page&quot;}"
                                   class="c-login__arrow-link">
                                    بازیابی رمز عبور
                                </a>
                            </div>
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
