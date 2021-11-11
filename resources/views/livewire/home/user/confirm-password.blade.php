<div>
    @section('title','ورود با رمز موقت')
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
                            <a href="/users/login-register/?_back=https://www.digikala.com/"
                               class="c-login__back-button"></a>
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="https://www.digikala.com/static/files/bc60cf05.svg">
                            </a>
                        </div>

                        <div class="c-login__form-header">
                            کد تایید را وارد نمایید
                        </div>
                        <div class="c-login__opt-mobile-message">
                            کد تایید برای شماره موبایل
                            <span class="js-otp-phone-number">{{$this->user->mobile}}</span>
                            ارسال شود اگر شماره موبایل درست است وارد کنید
                        </div>

                        <div class="c-login__form-row">
                            <label class="o-form__field-container">
                                <div class="o-form__field-frame">
                                    <input wire:model.lazy="sms.email_phone" name="email_phone" type=""
                                           placeholder="{{$user->mobile}}" value="{{$user->mobile}}"
                                           class="o-form__field js-input-field ">
                                </div>
                            </label>

                        </div>

                        <div class="c-login__form-row">
                            <a href="/users/login/confirm/{{$this->user->id}}">
                                <button type="button" class="c-login__arrow-link">
                                    ورود با رمز عبور
                                </button>
                            </a>
                        </div>


                        <button type="submit" class="o-btn o-btn--full-width o-btn--contained-red-lg">
                            ادامه
                        </button>

                    </form>
                </div>
            </section>
        </div>
    </main>
    <script>
        var seconds, temp;
        var GivenTime = document.getElementById('countdown').innerHTML;

        function countdown() {
            time = document.getElementById('countdown').innerHTML;
            timeArray = time.split(':')
            seconds = timeToSeconds(timeArray);
            console.log(seconds);
            if (seconds === 0) {
                clearTimeout(timeoutMyOswego);
                return;
            }
            seconds--;
            temp = document.getElementById('countdown');
            temp.innerHTML = secondsToTime(seconds);
            timeoutMyOswego = setTimeout(countdown, 1000);
        };
        countdown();

        function timeToSeconds(timeArray) {
            var minutes = (timeArray[0] * 1);
            var seconds = (minutes * 60) + (timeArray[1] * 1);
            return seconds;
        }

        function secondsToTime(secs) {
            var hours = Math.floor(secs / (60 * 60));
            hours = hours < 10 ? '0' + hours : hours;
            var divisor_for_minutes = secs % (60 * 60);
            var minutes = Math.floor(divisor_for_minutes / 60);
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var divisor_for_seconds = divisor_for_minutes % 60;
            var seconds = Math.ceil(divisor_for_seconds);
            seconds = seconds < 10 ? '0' + seconds : seconds;
            return minutes + ':' + seconds;
        }

    </script>
</div>
