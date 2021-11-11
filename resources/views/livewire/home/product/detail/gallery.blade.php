<section class="c-product__gallery">
    <div style="" class="c-product__headline--gallery u-hidden">
        فروش ویژه
    </div>
    <div class="c-product-gallery__offer js-amazing-offer u-hidden"><img
            class="c-product-gallery__offer-img"
            src="https://www.digikala.com/static/files/6fbe3569.svg"></div>
    <div class="c-gallery ">
        <div class="c-gallery__item">
            <ul class="c-gallery__options">
                @auth
                    <li>
                        @if (\App\Models\Favorite::where('product_id',$product->id)
                               ->where('user_id',auth()->user()->id)->first())
                            <button data-snt-event="dkProductPageClick"
                                    wire:click="updateFavoriteDisable({{$product->id}})"
                                    data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;add-to-favorites&quot;}"
                                    id="add-to-favorite-button" class="btn-option btn-option--wishes is-active"
                                    data-token=""></button>
                            <span class="c-tooltip c-tooltip--left c-tooltip--short">حذف از علاقه مندی ها</span>
                        @else
                            <button data-snt-event="dkProductPageClick"
                                    wire:click="updateFavoriteEnable({{$product->id}})"
                                    data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;add-to-favorites&quot;}"
                                    id="add-to-favorite-button"
                                    class="btn-option btn-option--wishes"
                                    data-token=""></button>
                            <span class="c-tooltip c-tooltip--left c-tooltip--short">افزودن به علاقه‌مندی</span>

                        @endif
                    </li>
                @endauth
                <li>
                    <button data-snt-event="dkProductPageClick"
                            data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;share&quot;}"
                            class="btn-option btn-option--social js-btn-option--social"
                            data-event="share" data-event-category="engagement"></button>
                    <span
                        class="c-tooltip c-tooltip--left c-tooltip--short">اشتراک گذاری</span>
                </li>
                @auth
                    <li>
                        @if (\App\Models\Observed::where('product_id',$product->id)
                             ->where('user_id',auth()->user()->id)->first())
                            <button data-snt-event="dkProductPageClick"
                                    wire:click="updateObservedDisable({{$product->id}})"
                                    data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;alarm&quot;}"
                                    class="btn-option btn-option--alarm js-add-to-incredible-notify-button is-active"></button>
                            <span class="c-tooltip c-tooltip--left c-tooltip--short">
                                اطلاع‌رسانی شگفت‌انگیز
                        </span>
                        @else
                            <button data-snt-event="dkProductPageClick"
                                    wire:click="updateObservedEnable({{$product->id}})"
                                    data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;alarm&quot;}"
                                    class="btn-option btn-option--alarm js-add-to-incredible-notify-button"></button>
                            <span class="c-tooltip c-tooltip--left c-tooltip--short">
                                اطلاع‌رسانی شگفت‌انگیز
                        </span>
                        @endif
                    </li>
                    <li>
                        @endauth
                        <button class="btn-option btn-option--stats" id="price-chart-button"
                                data-snt-event="dkProductPageClick"
                                data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;price-chart&quot;}"
                                data-event="price_chart" data-event-category="product_page"
                                data-event-label="category: گوشی موبایل, available:True"></button>
                        <span
                            class="c-tooltip c-tooltip--left c-tooltip--short">نمودار قیمت</span>
                    </li>
                    <li><a data-snt-event="dkProductPageClick"
                           data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;compare&quot;}"
                           href="/compare/dkp-3048126/"
                           class="btn-option btn-option--compare"></a><span
                            class="c-tooltip c-tooltip--left c-tooltip--short">مقایسه</span>
                    </li>
                    <li>
                        <button data-event="share" id="add-to-public-list-button"
                                data-event-category="engagement"
                                data-snt-event="dkProductPageClick"
                                data-token="" class="btn-option btn-option--lists"
                                data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;public-list&quot;}"></button>
                        <span
                            class="c-tooltip c-tooltip--left c-tooltip--short">لیست‌های عمومی</span>
                    </li>
            </ul>
            <div class="c-gallery__img"><img class="js-gallery-img"
                                             data-src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,m_lfit,h_600,w_600/quality,q_80"
                                             title="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت	"
                                             alt="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت	"
                                             data-zoom-image="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,w_1280/quality,q_80"
                                             src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,m_lfit,h_600,w_600/quality,q_80"
                                             loading="lazy">
                <div class="c-gallery__main-img-badges-container"></div>
            </div>
        </div>
        <ul class="c-gallery__items js-album-usage-ga">
            <li class="is-diviter">
                <div class="thumb-wrapper thumb-wrapper--blur js-gallery-video"
                     data-snt-event="dkProductPageClick"
                     data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;video&quot;}">
                    <img
                        data-src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                        title="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت	 video button"
                        alt="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت	 video button"
                        src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                        loading="lazy">
                    <div class="c-gallery__count-circle">
                        <div class="btn-option btn-option--play-video"></div>
                        <span
                            class="c-tooltip c-tooltip--left c-tooltip--short">نمایش ویدیو</span>
                    </div>
                </div>
            </li>
            <li class="js-product-thumb-img" data-num-of-pics="17" data-slide-index="5">
                <div class="thumb-wrapper"><img
                        data-src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023233.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                        title="" data-snt-event="dkProductPageClick"
                        data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;thumbnail-image&quot;}"
                        alt="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت	 thumb 1 1"
                        data-type=""
                        src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023233.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                        loading="lazy">
                    <div class="c-gallery__images-count"><span
                            class="c-gallery__count-circle"><div
                                class="c-gallery__three-bullets"></div></span></div>
                </div>
            </li>

        </ul>
        <div class="c-product__feedback js-feedback-survey" data-variant="9832233"><a
                class="js-feedback-survey-btn" href="javascript:">بازخورد درباره این
                کالا</a>
        </div>
    </div>
</section>

<div id="notification" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="notification2" class=" c-remodal-notification remodal-is-initialized remodal-is-closed"
         data-remodal-id="incredible-observed" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc"
         tabindex="-1">
        <button onclick="closemodalnotification()" data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
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
        document.getElementById("notification").style ="display: block !important; ";
        document.getElementById("notification").classList.remove("remodal-is-closed");
        document.getElementById("notification").classList.add("remodal-is-opened");
        document.getElementById("notification2").classList.remove("remodal-is-closed");
        document.getElementById("notification2").classList.add("remodal-is-opened");
    }
    function closemodalnotification(){
        document.getElementById("notification").style="display: none !important; ";
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
        border: 0!important;
        clip: rect(0 0 0 0)!important;
        -webkit-clip-path: inset(50%)!important;
        clip-path: inset(50%)!important;
        height: 1px!important;
        margin: -1px!important;
        overflow: hidden!important;
        padding: 0!important;
        position: absolute!important;
        white-space: nowrap!important;
        width: 1px!important;
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
