<div>
    @section('title','فراموشی رمزعبور با موبایل')
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
                    <form class="c-login__form"  wire:submit.prevent="userForm"
                           id="otpForm" data-name="remember"
                          data-input-name="remember[code]" novalidate="novalidate">
                        <div class="c-login__header-logo">
                            <a href="" class="c-login__back-button"></a>
                            <a href="/">
                                <img alt="DIGIKALA.COM" src="https://www.digikala.com/static/files/bc60cf05.svg">
                            </a>
                        </div>


                        <div class="c-login__grow-column">
                            <div class="c-login__form-header">
                                کد تایید را وارد نمایید
                            </div>

                            <div class="c-login__opt-mobile-message">
                                کد تایید برای شماره موبایل
                                {{$this->user->mobile}}
                                ارسال گردید
                            </div>

                            <div class="c-login__form-row">
                                <label class="o-form__field-container">
                                    <div class="o-form__field-frame">
                                        <input wire:model.lazy="sms.code"  name="code" type="" placeholder="" value="" class="o-form__field js-input-field c-login__otp-input" maxlength="5">
                                    </div>
                                </label>

                            </div>

                        </div>
                        <div class="c-login__resend-otp-section">
                            <div x-data="{show: true}" x-show="show"
                                 x-init="setTimeout(() => show = false , 180000)"
                            >
                                <div class="c-login__resend-otp-message js-phone-code-container">
                                    ارسال مجدد کد تا
                                    <span class="js-phone-code-counter" data-countdownseconds="180"
                                          id="countdown">03:00</span>
                                    دیگر
                                </div>
                            </div>
                            <div x-data="{show: false}" x-show="show"
                                 x-init="setTimeout(() => show = true , 180000)"
                                 style="display: none">
                                <button type="button" wire:click="resendSMS({{$this->user->id}})"
                                        class="o-btn o-btn--full-width o-btn--link-blue-lg  js-send-otp-confirm-code"
                                        data-mode="login">
                                    دریافت مجدد کد تایید
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="o-btn o-btn--full-width o-btn--contained-red-lg  js-opt-button-submit">
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
