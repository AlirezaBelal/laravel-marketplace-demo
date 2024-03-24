<div id="notification" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="notification2" class=" c-remodal-notification remodal-is-initialized remodal-is-closed"
         data-remodal-id="incredible-observed" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"
         tabindex="-1">
        <button onclick="closemodalnotification()" data-remodal-action="close" class="remodal-close"
                aria-label="Close"></button>
        <div class="c-remodal-notification__main">
            <div class="c-remodal-notification__aside">
                <div class="c-remodal-notification__title-ilu">به من اطلاع بده</div>
                <div class="c-remodal-notification__ilu"></div>
            </div>
            <div class="c-remodal-notification__content">
                <form class="c-form-notification" id="incredible-observed-form">
                    <div class="c-form-notification__title">اطلاع به من در زمان:</div>
                    <div class="c-form-notification__row">
                        <div class="c-form-notification__col">
                            <div class="c-form-notification__status">
                                پیشنهاد شگفت‌انگیز
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
                                <li><label class="c-form-notification__label" for="incredible-notification-param-1">ایمیل
                                        به <span class="js-observed-user-email">tdanandeh@yahoo.com</span></label><label
                                        class="c-ui-checkbox"><input type="checkbox" value="1" name="observed[email]"
                                                                     id="incredible-notification-param-1"
                                                                     checked="checked"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                                <li><label class="c-form-notification__label" for="incredible-notification-param-2">پیامک
                                        به <span class="js-observed-user-number">09120634157</span></label><label
                                        class="c-ui-checkbox"><input type="checkbox" value="1" name="observed[sms]"
                                                                     checked="checked"
                                                                     id="incredible-notification-param-2"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                                <li><label class="c-form-notification__label" for="incredible-notification-param-3">سیستم
                                        پیام شخصی دیجی‌کالا</label><label class="c-ui-checkbox"><input type="checkbox"
                                                                                                       value="1"
                                                                                                       name="observed[notification]"
                                                                                                       checked="checked"
                                                                                                       id="incredible-notification-param-3"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="c-form-notification__row c-form-notification__row--submit">
                        <div class="c-form-notification__col">
                            <button type="button" id="add-to-incredible-observed" class="btn-remodal-primary">ثبت
                            </button>
                            <button data-remodal-action="cancel" class="btn-remodal-secondary">بازگشت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function modalnotification() {
        document.getElementById("notification").style = "display: block !important; ";
        document.getElementById("notification").classList.remove("remodal-is-closed");
        document.getElementById("notification").classList.add("remodal-is-opened");
        document.getElementById("notification2").classList.remove("remodal-is-closed");
        document.getElementById("notification2").classList.add("remodal-is-opened");
    }

    function closemodalnotification() {
        document.getElementById("notification").style = "display: none !important; ";
        document.getElementById("notification").classList.remove("remodal-is-opened");
        document.getElementById("notification").classList.add("remodal-is-closed");
    }
</script>
<style>
    .c-remodal-notification__main {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0;
        margin-left: 0;
    }

    .c-remodal-notification__aside {
        position: relative;
        width: 100%;
        min-height: 1px;
        -ms-flex: 0 0 43%;
        -webkit-box-flex: 0;
        flex: 0 0 43%;
        max-width: 43%;
        padding: 15px 30px;
    }

    .c-remodal-notification__content {
        position: relative;
        width: 100%;
        min-height: 1px;
        -ms-flex: 0 0 57%;
        -webkit-box-flex: 0;
        flex: 0 0 57%;
        max-width: 57%;
        background: #fcfcfc;
        padding: 43px 25px 55px;
    }

    .c-remodal-notification__title-ilu {
        font-size: 17px;
        font-size: 1.214rem;
        line-height: 1.294;
        letter-spacing: -.4px;
        color: #565656;
    }

    .c-remodal-notification__ilu {
        height: 389px;
        position: relative;
    }

    .c-form-notification__title {
        margin-bottom: 15px;
        color: #aaa;
        font-size: 14px;
        font-size: 1rem;
        line-height: 1.571;
        letter-spacing: -.3px;
    }

    .c-form-notification__row {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -10px 20px;
    }

    .c-form-notification__col {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 10px;
        padding-left: 10px;
    }

    .c-form-notification__status {
        border-bottom: 1px solid #eee;
        padding-bottom: 29px;
        color: #565656;
        letter-spacing: -.4px;
        font-size: 20px;
        font-size: 1.429rem;
        line-height: 1.1;
    }

    .c-form-notification__row {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -10px 20px;
    }

    .u-hidden-visually {
        border: 0 !important;
        clip: rect(0 0 0 0) !important;
        -webkit-clip-path: inset(50%) !important;
        clip-path: inset(50%) !important;
        height: 1px !important;
        margin: -1px !important;
        overflow: hidden !important;
        padding: 0 !important;
        position: absolute !important;
        white-space: nowrap !important;
        width: 1px !important;
    }

    .c-form-notification__col {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 10px;
        padding-left: 10px;
    }

    .c-form-notification__row--submit {
        margin-top: 30px;
        margin-bottom: 0;
    }

    .c-form-notification__col {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 10px;
        padding-left: 10px;
    }
</style>

