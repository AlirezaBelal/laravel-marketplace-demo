<div id="openNotification" class="remodal-wrapper remodal-is-opened" style="display: block;">
    <div id="openNotification2" class=" c-remodal-notification remodal-is-initialized remodal-is-opened"
         data-remodal-id="observed"
         role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1">
        <button onclick="closemodalNotification()" data-remodal-action="close" class="remodal-close"
                aria-label="Close"></button>
        <div class="c-remodal-notification__main">
            <div class="c-remodal-notification__aside">
                <div class="c-remodal-notification__title-ilu">به من اطلاع بده</div>
                <div class="c-remodal-notification__ilu"></div>
            </div>
            <div class="c-remodal-notification__content">
                <form class="c-form-notification" id="observed-form">
                    <div class="c-form-notification__title">اطلاع به من در زمان:</div>
                    <div class="c-form-notification__row">
                        <div class="c-form-notification__col">
                            <div class="c-form-notification__status">
                                موجود شدن
                            </div>
                        </div>
                    </div>
                    <div class="c-form-notification__row js-observe-modal-errors u-hidden-visually">
                        <div class="c-form-notification__col">
                            <div class="c-message-light c-message-light--error js-form-error-items"></div>
                        </div>
                    </div>
                    <div class="c-form-notification__title">از طریق:</div>
                    <div class="c-form-notification__row">
                        <div class="c-form-notification__col">
                            <ul class="c-form-notification__params">
                                <li><label class="c-form-notification__label" for="notification-param-1">ایمیل به <span
                                            class="js-observed-user-email">{{auth()->user()->email}}</span></label><label
                                        class="c-ui-checkbox"><input type="checkbox" value="1" name="observed[email]"
                                                                     id="notification-param-1"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                                <li><label class="c-form-notification__label" for="notification-param-2">پیامک به <span
                                            class="js-observed-user-number">{{auth()->user()->mobile}}</span></label><label
                                        class="c-ui-checkbox"><input type="checkbox" value="1" name="observed[sms]"
                                                                     checked="" id="notification-param-2"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                                <li><label class="c-form-notification__label" for="notification-param-3">سیستم پیام شخصی
                                        دیجی‌کالا</label><label class="c-ui-checkbox"><input type="checkbox" value="1"
                                                                                             name="observed[notification]"
                                                                                             checked=""
                                                                                             id="notification-param-3"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="c-form-notification__row c-form-notification__row--submit">
                        <div class="c-form-notification__col">
                            <button type="button" id="add-to-observed" class="btn-remodal-primary">ثبت</button>
                            <button onclick="closemodalNotification()" class="btn-remodal-secondary">بازگشت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

