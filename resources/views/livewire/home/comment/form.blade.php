<form  wire:submit.prevent="commentForm" >
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <div class="c-box">
        <div class="c-comments-product">
            <div class="c-comments-product__row js-valid-row">
                <div class="c-comments-product__col c-comments-product__col--gallery"><a
                        href="/product/dkp-{{$product->id}}/{{$product->link}}"><img
                            src="/storage/{{$product->img}}"
                            title={{$product->title}}"
                                                alt=" {{$product->title}}"></a>
                </div>
                <div class="c-comments-product__col c-comments-product__col--info">
                    <div class="c-comments-product__headline"><h3 class="c-comments-product__title">
                            {{$product->title}}
                            <span>{{$product->name}}</span>
                        </h3></div>
                    <div class="c-comments-product__attributes">
                        <div class="c-comments-product__attributes-row">
                            <div class="c-comments-product__attributes-col  js-valid-row">
                                <div class="c-comments-product__attributes-title">
                                    کیفیت ساخت
                                </div>
                                <select class="form-control" wire:model.lazy="review.keyfiat_sakht" id="" style="    width: inherit;">
                                    <option value="1">امتیاز ۱</option>
                                    <option value="2">امتیاز ۲</option>
                                    <option value="3">امتیاز ۳</option>
                                    <option value="4">امتیاز ۴</option>
                                    <option value="5">امتیاز ۵</option>
                                </select>

{{--                                <div id="rating-bar-100" data-factor-id="100"--}}
{{--                                     class="c-slider c-slider--one js-rating noUi-target noUi-rtl noUi-horizontal"--}}
{{--                                     data-rate-digit="(3)" data-rate-title="معمولی">--}}
{{--                                    <span--}}
{{--                                        class="c-slider__step c-slider__step--two js-slider-step"--}}
{{--                                        data-rate-title="خیلی بد" data-rate-value="20"></span>--}}
{{--                                    <span--}}
{{--                                        class="c-slider__step c-slider__step--three js-slider-step"--}}
{{--                                        data-rate-title="بد" data-rate-value="40"></span>--}}
{{--                                    <span--}}
{{--                                        class="c-slider__step c-slider__step--four js-slider-step active"--}}
{{--                                        data-rate-title="معمولی" data-rate-value="60"></span>--}}
{{--                                    <span--}}
{{--                                        class="c-slider__step c-slider__step--five js-slider-step"--}}
{{--                                        data-rate-title="خوب" data-rate-value="80"></span>--}}
{{--                                    <span--}}
{{--                                        class="c-slider__step c-slider__step--six js-slider-step"--}}
{{--                                        data-rate-title="عالی" data-rate-value="100"></span>--}}
{{--                                    <input wire:model.lazy="review.keyfiat_sakht"--}}
{{--                                           class="c-ui-hidden-input js-rate-input" type="text"--}}
{{--                                           value="0"--}}
{{--                                           id="rating-100" >--}}
{{--                                    <div class="noUi-base">--}}
{{--                                        <div class="noUi-connect"--}}
{{--                                             style="right: 0%; left: 50%;"></div>--}}
{{--                                        <div class="noUi-origin" style="right: 50%;">--}}
{{--                                            <div class="noUi-handle noUi-handle-lower"--}}
{{--                                                 data-handle="0"--}}
{{--                                                 tabindex="0" role="slider"--}}
{{--                                                 aria-orientation="horizontal" aria-valuemin="0.0"--}}
{{--                                                 aria-valuemax="100.0" aria-valuenow="50.0"--}}
{{--                                                 aria-valuetext="60" style="z-index: 4;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="c-comments-product__attributes-col  js-valid-row">
                                <div class="c-comments-product__attributes-title">
                                    ارزش خرید به نسبت قیمت
                                </div>
                                <select class="form-control" wire:model.lazy="review.arzesh_kharid" id="" style="    width: inherit;">
                                    <option value="1">امتیاز ۱</option>
                                    <option value="2">امتیاز ۲</option>
                                    <option value="3">امتیاز ۳</option>
                                    <option value="4">امتیاز ۴</option>
                                    <option value="5">امتیاز ۵</option>
                                </select>
{{--                                <div id="rating-bar-99" data-factor-id="99"--}}
{{--                                     class="c-slider c-slider--one js-rating noUi-target noUi-rtl noUi-horizontal"--}}
{{--                                     data-rate-digit="(3)" data-rate-title="معمولی"><span--}}
{{--                                        class="c-slider__step c-slider__step--two js-slider-step"--}}
{{--                                        data-rate-title="خیلی بد" data-rate-value="20"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--three js-slider-step"--}}
{{--                                        data-rate-title="بد" data-rate-value="40"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--four js-slider-step active"--}}
{{--                                        data-rate-title="معمولی" data-rate-value="60"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--five js-slider-step"--}}
{{--                                        data-rate-title="خوب" data-rate-value="80"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--six js-slider-step"--}}
{{--                                        data-rate-title="عالی" data-rate-value="100"></span><input--}}
{{--                                        wire:model.lazy="review.arzesh_kharid"--}}
{{--                                        class="c-ui-hidden-input js-rate-input" type="text"--}}
{{--                                        value="0"--}}
{{--                                        id="rating-99" name="comment[rating][99]">--}}
{{--                                    <div class="noUi-base">--}}
{{--                                        <div class="noUi-connect"--}}
{{--                                             style="right: 0%; left: 50%;"></div>--}}
{{--                                        <div class="noUi-origin" style="right: 50%;">--}}
{{--                                            <div class="noUi-handle noUi-handle-lower"--}}
{{--                                                 data-handle="0"--}}
{{--                                                 tabindex="0" role="slider"--}}
{{--                                                 aria-orientation="horizontal" aria-valuemin="0.0"--}}
{{--                                                 aria-valuemax="100.0" aria-valuenow="50.0"--}}
{{--                                                 aria-valuetext="60" style="z-index: 4;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="c-comments-product__attributes-row">
                            <div class="c-comments-product__attributes-col  js-valid-row">
                                <div class="c-comments-product__attributes-title">
                                    نوآوری
                                </div>
                                <select class="form-control" wire:model.lazy="review.noavari" id="" style="    width: inherit;">
                                    <option value="1">امتیاز ۱</option>
                                    <option value="2">امتیاز ۲</option>
                                    <option value="3">امتیاز ۳</option>
                                    <option value="4">امتیاز ۴</option>
                                    <option value="5">امتیاز ۵</option>
                                </select>
{{--                                <div id="rating-bar-141" data-factor-id="141"--}}
{{--                                     class="c-slider c-slider--one js-rating noUi-target noUi-rtl noUi-horizontal"--}}
{{--                                     data-rate-digit="(3)" data-rate-title="معمولی"><span--}}
{{--                                        class="c-slider__step c-slider__step--two js-slider-step"--}}
{{--                                        data-rate-title="خیلی بد" data-rate-value="20"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--three js-slider-step"--}}
{{--                                        data-rate-title="بد" data-rate-value="40"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--four js-slider-step active"--}}
{{--                                        data-rate-title="معمولی" data-rate-value="60"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--five js-slider-step"--}}
{{--                                        data-rate-title="خوب" data-rate-value="80"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--six js-slider-step"--}}
{{--                                        data-rate-title="عالی" data-rate-value="100"></span><input--}}
{{--                                        wire:model.lazy="review.noavari"--}}
{{--                                        class="c-ui-hidden-input js-rate-input" type="text"--}}
{{--                                        value="0"--}}
{{--                                        id="rating-141" name="comment[rating][141]">--}}
{{--                                    <div class="noUi-base">--}}
{{--                                        <div class="noUi-connect"--}}
{{--                                             style="right: 0%; left: 50%;"></div>--}}
{{--                                        <div class="noUi-origin" style="right: 50%;">--}}
{{--                                            <div class="noUi-handle noUi-handle-lower"--}}
{{--                                                 data-handle="0"--}}
{{--                                                 tabindex="0" role="slider"--}}
{{--                                                 aria-orientation="horizontal" aria-valuemin="0.0"--}}
{{--                                                 aria-valuemax="100.0" aria-valuenow="50.0"--}}
{{--                                                 aria-valuetext="60" style="z-index: 4;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="c-comments-product__attributes-col  js-valid-row">
                                <div class="c-comments-product__attributes-title">
                                    امکانات و قابلیت ها
                                </div>
                                <select class="form-control" wire:model.lazy="review.emkanat" id="" style="    width: inherit;">
                                    <option value="1">امتیاز ۱</option>
                                    <option value="2">امتیاز ۲</option>
                                    <option value="3">امتیاز ۳</option>
                                    <option value="4">امتیاز ۴</option>
                                    <option value="5">امتیاز ۵</option>
                                </select>
{{--                                <div id="rating-bar-101" data-factor-id="101"--}}
{{--                                     class="c-slider c-slider--one js-rating noUi-target noUi-rtl noUi-horizontal"--}}
{{--                                     data-rate-digit="(3)" data-rate-title="معمولی"><span--}}
{{--                                        class="c-slider__step c-slider__step--two js-slider-step"--}}
{{--                                        data-rate-title="خیلی بد" data-rate-value="20"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--three js-slider-step"--}}
{{--                                        data-rate-title="بد" data-rate-value="40"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--four js-slider-step active"--}}
{{--                                        data-rate-title="معمولی" data-rate-value="60"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--five js-slider-step"--}}
{{--                                        data-rate-title="خوب" data-rate-value="80"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--six js-slider-step"--}}
{{--                                        data-rate-title="عالی" data-rate-value="100"></span><input--}}
{{--                                        wire:model.lazy="review.emkanat"--}}
{{--                                        class="c-ui-hidden-input js-rate-input" type="text"--}}
{{--                                        value="0"--}}
{{--                                        id="rating-101" name="comment[rating][101]">--}}
{{--                                    <div class="noUi-base">--}}
{{--                                        <div class="noUi-connect"--}}
{{--                                             style="right: 0%; left: 50%;"></div>--}}
{{--                                        <div class="noUi-origin" style="right: 50%;">--}}
{{--                                            <div class="noUi-handle noUi-handle-lower"--}}
{{--                                                 data-handle="0"--}}
{{--                                                 tabindex="0" role="slider"--}}
{{--                                                 aria-orientation="horizontal" aria-valuemin="0.0"--}}
{{--                                                 aria-valuemax="100.0" aria-valuenow="50.0"--}}
{{--                                                 aria-valuetext="60" style="z-index: 4;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="c-comments-product__attributes-row">
                            <div class="c-comments-product__attributes-col  js-valid-row">
                                <div class="c-comments-product__attributes-title">
                                    سهولت استفاده
                                </div>
                                <select class="form-control" wire:model.lazy="review.sohoolate_estefade" id="" style="    width: inherit;">
                                    <option value="1">امتیاز ۱</option>
                                    <option value="2">امتیاز ۲</option>
                                    <option value="3">امتیاز ۳</option>
                                    <option value="4">امتیاز ۴</option>
                                    <option value="5">امتیاز ۵</option>
                                </select>
{{--                                <div id="rating-bar-102" data-factor-id="102"--}}
{{--                                     class="c-slider c-slider--one js-rating noUi-target noUi-rtl noUi-horizontal"--}}
{{--                                     data-rate-digit="(3)" data-rate-title="معمولی"--}}
{{--                                     data-rate-title-orig=""><span--}}
{{--                                        class="c-slider__step c-slider__step--two js-slider-step"--}}
{{--                                        data-rate-title="خیلی بد" data-rate-value="20"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--three js-slider-step"--}}
{{--                                        data-rate-title="بد" data-rate-value="40"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--four js-slider-step active"--}}
{{--                                        data-rate-title="معمولی" data-rate-value="60"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--five js-slider-step"--}}
{{--                                        data-rate-title="خوب" data-rate-value="80"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--six js-slider-step"--}}
{{--                                        data-rate-title="عالی" data-rate-value="100"></span><input--}}
{{--                                        wire:model.lazy="review.sohoolate_estefade"--}}
{{--                                        class="c-ui-hidden-input js-rate-input" type="text"--}}
{{--                                        value="0"--}}
{{--                                        id="rating-102" name="comment[rating][102]">--}}
{{--                                    <div class="noUi-base">--}}
{{--                                        <div class="noUi-connect"--}}
{{--                                             style="right: 0%; left: 50%;"></div>--}}
{{--                                        <div class="noUi-origin" style="right: 50%;">--}}
{{--                                            <div class="noUi-handle noUi-handle-lower"--}}
{{--                                                 data-handle="0"--}}
{{--                                                 tabindex="0" role="slider"--}}
{{--                                                 aria-orientation="horizontal" aria-valuemin="0.0"--}}
{{--                                                 aria-valuemax="100.0" aria-valuenow="50.0"--}}
{{--                                                 aria-valuetext="60" style="z-index: 4;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="c-comments-product__attributes-col  js-valid-row">
                                <div class="c-comments-product__attributes-title">
                                    طراحی و ظاهر
                                </div>
                                <select class="form-control" wire:model.lazy="review.zaher" id="" style="    width: inherit;">
                                    <option value="1">امتیاز ۱</option>
                                    <option value="2">امتیاز ۲</option>
                                    <option value="3">امتیاز ۳</option>
                                    <option value="4">امتیاز ۴</option>
                                    <option value="5">امتیاز ۵</option>
                                </select>
{{--                                <div id="rating-bar-103" data-factor-id="103"--}}
{{--                                     class="c-slider c-slider--one js-rating noUi-target noUi-rtl noUi-horizontal"--}}
{{--                                     data-rate-digit="(3)" data-rate-title="معمولی"><span--}}
{{--                                        class="c-slider__step c-slider__step--two js-slider-step"--}}
{{--                                        data-rate-title="خیلی بد" data-rate-value="20"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--three js-slider-step"--}}
{{--                                        data-rate-title="بد" data-rate-value="40"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--four js-slider-step active"--}}
{{--                                        data-rate-title="معمولی" data-rate-value="60"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--five js-slider-step"--}}
{{--                                        data-rate-title="خوب" data-rate-value="80"></span><span--}}
{{--                                        class="c-slider__step c-slider__step--six js-slider-step"--}}
{{--                                        data-rate-title="عالی" data-rate-value="100"></span><input--}}
{{--                                        wire:model.lazy="review.zaher"--}}
{{--                                        class="c-ui-hidden-input js-rate-input" type="text"--}}
{{--                                        value="0"--}}
{{--                                        id="rating-103" name="comment[rating][103]">--}}
{{--                                    <div class="noUi-base">--}}
{{--                                        <div class="noUi-connect"--}}
{{--                                             style="right: 0%; left: 50%;"></div>--}}
{{--                                        <div class="noUi-origin" style="right: 50%;">--}}
{{--                                            <div class="noUi-handle noUi-handle-lower"--}}
{{--                                                 data-handle="0"--}}
{{--                                                 tabindex="0" role="slider"--}}
{{--                                                 aria-orientation="horizontal" aria-valuemin="0.0"--}}
{{--                                                 aria-valuemax="100.0" aria-valuenow="50.0"--}}
{{--                                                 aria-valuetext="60" style="z-index: 4;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-box">
        <div class="c-comments-add">
            <div class="c-comments-add__row">
                <div class="c-comments-add__col c-comments-add__col--form">
                    <div class="c-form-comment">
                        <div class="c-form-comment__row">
                            <div class="c-form-comment__col ">
                                <div class="c-form-comment__title">عنوان نظر شما</div>
                                <label class="c-ui-input">
                                    <input class="c-ui-input__field"
                                           wire:model.lazy="review.review_title"
                                           type="text"
                                           name="comment[title]" value=""
                                           placeholder="عنوان نظر خود را بنویسید"></label>
                            </div>
                        </div>
                        <div class="c-form-comment__row">
                            <div id="advantages"
                                 class="c-form-comment__col c-form-comment__col--point">
                                <div class="c-form-comment__title c-form-comment__title--positive">
                                    نقاط
                                    قوت
                                </div>
                                <div class="c-ui-input c-ui-input--add-point"><input
                                        wire:model.lazy="review.plus_rate"
                                        title="advantages"
                                        class="c-ui-input__field"
                                        type="text"
                                        id="advantage-input"
                                        value="">
                                    <button class="c-ui-input__point js-icon-form-add" type="button"
                                            style="display: none;"></button>
                                </div>
                                <div
                                    class="c-form-comment__dynamic-labels js-advantages-list"></div>
                            </div>
                            <div id="disadvantages"
                                 class="c-form-comment__col c-form-comment__col--point">
                                <div class="c-form-comment__title c-form-comment__title--negative">
                                    نقاط
                                    ضعف
                                </div>
                                <div class="c-ui-input c-ui-input--add-point"><input
                                        wire:model.lazy="review.plus_min"
                                        title="disadvantages" class="c-ui-input__field" type="text"
                                        id="disadvantage-input" value="">
                                    <button class="c-ui-input__point js-icon-form-add" type="button"
                                            style="display: none;"></button>
                                </div>
                                <div
                                    class="c-form-comment__dynamic-labels js-disadvantages-list"></div>
                            </div>
                        </div>
                        <div class="c-form-comment__row js-valid-row">
                            <div class="c-form-comment__col">
                                <div class="c-form-comment__title">متن نظر شما (اجباری)</div>
                                <label class="c-ui-textarea js-comment"><textarea
                                        wire:model.lazy="review.review"
                                        class="c-ui-textarea__field" name="comment[comment]"
                                        placeholder="متن نظر خود را بنویسید"></textarea></label>
                            </div>
                        </div>
                        <div class="c-form-comment__row">
                            <div class="c-form-comment__col c-comments-anonymous"><label
                                    class="c-ui-checkbox"><input type="checkbox"
                                                                 wire:model.lazy="review.review_hidden"
                                                                 name="comment[is_anonymous]"
                                                                 value=""
                                                                 id="add_comment_anonymous"><span
                                        class="c-ui-checkbox__check"></span></label><label
                                    for="add_comment_anonymous">ارسال دیدگاه به صورت ناشناس</label>
                            </div>
                        </div>
                        <div class="c-form-comment__row">
                            <div class="c-form-comment__col c-form-comment__col--half-width">
                                <button data-id="6241822"
                                        class="btn-default "
                                        type="submit">
                                    ثبت نظر
                                </button>
                            </div>
                            <div
                                class="c-form-comment__col c-form-comment__col--half-width c-form-comment__col--digiclub-touchpoints">
                                <img src="https://www.digikala.com/static/files/0be847dc.png"
                                     alt="Digi Point">
                                <div style="display: inline"><span>۵</span>
                                    امتیاز دیجی‌کلاب با ثبت دیدگاه برای این کالا
                                </div>
                                <div class="u-text-12">
                                    پس از تایید دیدگاه، برای دریافت امتیاز به صفحه ماموریت‌های کلابی
                                    سر
                                    بزنید.
                                </div>
                            </div>
                        </div>
                        <div class="c-form-comment__row c-form-comment__row--space-between">
                            <div class="c-form-comment__col c-form-comment__col--agreement"><p>با
                                    “ثبت
                                    نظر” موافقت خود را با <a href="/page/comments-rules/"
                                                             class="btn-link-spoiler"
                                                             target="_blank">قوانین
                                        انتشار نظرات</a> در دیجی‌کالا اعلام می‌کنم.</p></div>
                            <div class="c-form-comment__col c-form-comment__col--cancellation"><a
                                    href="/product/dkp-{{$product->id}}/{{$product->link}}"
                                    class="btn-link-spoiler">انصراف و بازگشت »</a></div>
                        </div>
                    </div>
                </div>
                <div class="c-comments-add__col c-comments-add__col--content"><h3>دیگران را با نوشتن
                        نظرات خود، برای انتخاب این محصول راهنمایی کنید.</h3>
                    <p><span
                            style="color:#2980b9"><strong>لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:</strong></span>
                    </p>
                    <ul>
                        <li>لازم است محتوای ارسالی منطبق برعرف و شئونات جامعه و با بیانی رسمی و عاری
                            از
                            لحن تند، تمسخرو توهین باشد.
                        </li>
                        <li>از ارسال لینک‌های سایت‌های دیگر و ارایه‌ی اطلاعات شخصی خودتان مثل شماره
                            تماس، ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.
                        </li>
                        <li><strong>در نظر داشته باشید هدف نهایی از ارائه‌ی نظر درباره‌ی کالا
                                ارائه‌ی
                                اطلاعات مشخص و دقیق برای راهنمایی سایر کاربران در فرآیند خرید یک
                                محصول
                                توسط ایشان است.</strong></li>
                        <li>با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در این
                            بخش
                            خودداری کرده و سوالات خود را در بخش «پرسش و پاسخ» مطرح کنید.
                        </li>
                    </ul>
                    <h3><span
                            style="color:#e74c3c"><strong>نکات مهم افزودن عکس و ویدیو به نظرات:</strong></span>
                    </h3>
                    <ul>
                        <li><strong>ثبت یا مشخص بودن شماره تلفن، ‌آدرس، مشخصات شبکه‌های اجتماعی
                                غیرمجاز
                                است.</strong></li>
                        <li>پیش از ارسال ویدیو برای کمپین&nbsp;آنباکسینگ، به دقت صفحه‌ی ویژه‌ی
                            مسابقه را
                            مطالعه کنید. از <u><strong><a
                                        href="https://www.digikala.com/mag/?p=641330&amp;utm_source=digikala&amp;utm_medium=comments-infobox&amp;&amp;utm_campaign=ugc"><span
                                            style="color:#2980b9">این لینک وارد صفحه‌ی ویژه‌ی مسابقه</span></a></strong></u>
                            شوید.
                        </li>
                        <li>با مطالعه‌ی <u><strong><a
                                        href="https://www.digikala.com/mag/how-to-create-compelling-lifestyle-product-photographs/"><span
                                            style="color:#2980b9">این لینک</span></a></strong></u>
                            می‌توانید مفید‌ترین&nbsp;الگوی عکاسی از کالایی که خریداری کرده‌اید را
                            مشاهده
                            کنید.
                        </li>
                    </ul>
                    <p><strong><span
                                style="color:#2980b9">پیشنهاد می‌شود قوانین کامل ثبت نظر را در </span><u><a
                                    href="https://www.digikala.com/page/comments-rules/"><span
                                        style="color:#2980b9">این صفحه</span></a></u><span
                                style="color:#2980b9"> مطالعه کنید.</span></strong></p>
                    <p>هرگونه نقد و نظر در خصوص سایت دیجی‌کالا،&nbsp;مشکلات&nbsp;دریافت خدمات و
                        درخواست
                        کالا&nbsp;و نیز گزارش تخلف فروش (نظیر گزارش کالای غیراصل یا مغایر)&nbsp;را
                        با
                        ایمیل&nbsp;&nbsp;<a
                            href="mailto:info@digikala.com">info@digikala.com&nbsp;</a>&nbsp;یا
                        با شماره‌ی&nbsp;&nbsp;<a href="tel: +982161930000">۶۱۹۳۰۰۰۰ - ۰۲۱&nbsp;</a>&nbsp;در
                        میان بگذارید و از نوشتن آن‌ها در بخش نظرات خودداری کنید.</p>
                </div>
            </div>
        </div>
    </div>
</form>
