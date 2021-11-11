<div>
    <main id="main">
        @section('title','درخواست بازیابی رمز عبور')
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
                    <form class="c-login__form" id="rememberForm"
                          data-name="remember" novalidate="novalidate"
                          wire:submit.prevent="userForm">
                        <div class="c-login__header-logo">
                            <a href="{{route('user.login-register')}}" class="c-login__back-button"></a>
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="{{asset('css/bc60cf05.svg')}}">
                            </a>
                        </div>

                        <div class="c-login__grow-column">
                            <div class="c-login__form-header">
                                درخواست بازیابی رمز عبور
                            </div>

                            <div class="c-login__opt-mobile-message">
                                &nbsp;&nbsp;لطفا پست الکترونیک یا شماره موبایل خود را وارد نمایید.
                            </div>

                            <div class="c-login__form-row c-login__form-row--margin-bottom">
                                <label class="o-form__field-container">
                                    <div class="o-form__field-frame">
                                        <input wire:model.lazy="sms.email_phone" name="email_phone" type=""
                                               placeholder="{{$user->mobile}}" value="{{$user->mobile}}"
                                               class="o-form__field js-input-field ">
                                    </div>
                                </label>

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
