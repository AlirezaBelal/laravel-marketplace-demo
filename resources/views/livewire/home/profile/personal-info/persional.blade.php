<div class="o-box">
    <div class="o-box__header">
        <span class="o-box__title">اطلاعات شخصی</span></div>
    <div class="c-profile-personal__grid">
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    نام و نام خانوادگی
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->name)
                        {{auth()->user()->name}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="fullname()"></div>
        </div>
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    کد ملی
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->national_code)
                        {{\App\Models\PersianNumber::translate(auth()->user()->national_code)}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="nationalcode()"></div>
        </div>
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    شماره تلفن همراه
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->mobile)
                        {{\App\Models\PersianNumber::translate(auth()->user()->mobile)}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="mobileNumber()"
                data-verified-phone="1" data-remodal="mobile_phone"></div>
        </div>

        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    پست الکترونیک
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->email)
                        {{auth()->user()->email}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="email()"
                data-verified-phone="1" data-remodal="email"></div>
        </div>
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    تاریخ تولد
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->birthday)
                        {{\App\Models\PersianNumber::translate(auth()->user()->birthday)}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="birthdate()"
                data-verified-phone="1" data-remodal="birth"></div>
        </div>
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    شغل
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->job)
                        {{\App\Models\PersianNumber::translate(auth()->user()->job)}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="jobwork()"
                data-verified-phone="1" data-remodal="job_title"></div>
        </div>
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    روش بازگرداندن وجه
                </div>
                <div class="c-profile-personal__grid-item-value">
                    @if (auth()->user()->money_back)
                        IR{{\App\Models\PersianNumber::translate(auth()->user()->money_back)}}
                    @else
                        -
                    @endif
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="moback()"
                data-verified-phone="1" data-remodal="bank_card_number"></div>
        </div>
        <div class="c-profile-personal__grid-item">
            <div>
                <div class="c-profile-personal__grid-item-title">
                    رمز عبور
                </div>
                <div class="c-profile-personal__grid-item-value">
                    ******
                </div>
            </div>
            <div
                class="c-profile-personal__grid-item-btn js-personal-info-modal-btn is-edit"
                onclick="password()"
                data-verified-phone="1" data-remodal="reset_password"></div>
        </div>
    </div>
</div>
