<div id="openNotification" class="remodal-wrapper remodal-is-opened" style="display: none;">
    <div id="openNotification2" class="remodal2 c-remodal-notification remodal-is-initialized remodal-is-opened"
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
                <form class="c-form-notification" id="observed-form"
                      wire:submit.prevent="notificationReModal">
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
                                            class="js-observed-user-email">{{auth()->user()->email ?? ''}}</span></label><label
                                        class="c-ui-checkbox">
                                        <input type="checkbox" value="1" name="observed[email]"
                                               wire:model.defer="notification.email"
                                               id="notification-param-1">
                                        <span
                                            class="c-ui-checkbox__check"></span></label></li>
                                <li><label class="c-form-notification__label" for="notification-param-2">پیامک به <span
                                            class="js-observed-user-number">{{auth()->user()->mobile ?? ''}}</span></label><label
                                        class="c-ui-checkbox">
                                        <input type="checkbox" value="1" name="sms"
                                               wire:model.defer="notification.sms"
                                               checked="" id="notification-param-2">
                                        <span
                                            class="c-ui-checkbox__check"></span></label></li>
                                <li><label class="c-form-notification__label" for="notification-param-3">سیستم پیام شخصی
                                        دیجی‌کالا</label><label class="c-ui-checkbox">
                                        <input type="checkbox" value="1"
                                               name="system"
                                               wire:model.defer="notification.system"
                                               checked=""
                                               id="notification-param-3"><span
                                            class="c-ui-checkbox__check"></span></label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="c-form-notification__row c-form-notification__row--submit">
                        <div class="c-form-notification__col">
                            <button type="submit" id="add-to-observed" class="btn-remodal-primary">ثبت</button>
                            <button onclick="closemodalNotification()" class="btn-remodal-secondary">بازگشت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="opengift" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="opengift2"
         class=" c-modal c-profile-gifts__mini-modal js-gift-card-add-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="gift-cards-add-modal" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="">
        <form wire:submit.prevent="giftForm">
        <div class="c-modal__top-bar  c-modal__top-bar--has-line">
            <div class="c-modal__title ">ثبت کارت هدیه</div>
            <div onclick="closemodalGift()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <div class="c-profile-gifts__modal-desc">
            پس از خراشیدن بخش مخصوص بر روی کارت هدیه ، سریال کارت را در زیر وارد نمایید.
        </div>
        <div class="c-profile-gifts__modal-input">
            <label class="o-form__field-container has-error">
                <div class="o-form__field-frame">
                    <input  wire:model.defer="gift.newcard" type="text" placeholder="" value=""
                                                        class="o-form__field js-input-field "></div>
            </label></div>
        <div class="c-profile-gifts__modal-btn-container">
            <button type="submit" class="o-btn o-btn--contained-red-md js-add-gift-card">ثبت کارت</button>
        </div>
        </form>
    </div>
</div>
