{{--//address create--}}
<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-modal c-modal--no-bottom-padding js-address-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="add-edit-address" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  ">
            <div class="c-modal__title js-address-modal-title">افزودن آدرس</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form method="post" action="{{route('address.shipping.create')}}">
            @csrf
            <div class="c-address__modal-content js-map-interactive" id="address-modal-map">
                <div class="c-map__address-container js-map-address-container u-hidden">
                    <div class="c-map__address-title">برای ادامه دادن فرآیند خرید موقعیت آدرس زیر را بر روی نقشه تعیین
                        کنید:
                    </div>
                    <div class="c-map__address js-map-address"></div>
                </div>
                <div class="c-map__container  js-map-container">
                    <div class="c-map " id="map"
                         data-current-icon="https://www.digikala.com/static/files/c1d18c6c.png"></div>
                    <div class="c-map__search-field">
                        <input class="js-search-map-input" placeholder="جستجو آدرس">
                        <button type="button" class="o-btn c-map__search-cancel js-search-map-cancel u-hidden"></button>
                    </div>
                    <div class="c-map__search-content">
                        <div class="c-map__search-content-list js-search-map-content"></div>
                    </div>
                    <input type="hidden" name="address[lat]">
                    <input type="hidden" name="address[lng]" wire:model.lazy="address.address[lng]">
                    <div class="c-map__overlay"></div>
                    <div class="c-map__marker">
                        <img src="https://www.digikala.com/static/files/7ab27ed3.svg"></div>
                </div>
                <div class="c-address__modal-footer">
                    <div class="c-address__modal-footer-title">مرسوله شما به این موقعیت ارسال خواهد شد.</div>
                    <div class="o-btn o-btn--contained-red-md js-select-address-map">ثبت و افزودن جزییات</div>
                </div>
            </div>
            <div class="c-address__modal-content u-hidden" id="address-modal-form">
                <div class="c-address__separator"></div>
                <div class="c-address__form">
                    <div class="c-address__form-row">
                        <div class="o-form__field-container">
                            <div class="o-form__field-label">استان*</div>
                            <div
                                class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-dropdown-universal selectric-js-select-state selectric-js-address-state-id">
                                <div class="selectric-select">
                                    <select name="state"
                                            class="c-ui-select js-ui-select-search js-dropdown-universal js-select-state js-address-state-id"
                                            name="state" tabindex="-1">
                                        <option value="">انتخاب استان</option>
                                        <option value="تهران">تهران</option>
                                        <option value="البرز">البرز</option>
                                        <option value="اصفهان">اصفهان</option>
                                        <option value="خراسان رضوی">خراسان رضوی</option>
                                        <option value="مازندران">مازندران</option>
                                        <option value="18">فارس</option>
                                        <option value="14">خوزستان</option>
                                        <option value="2">آذربایجان شرقی</option>
                                        <option value="3">آذربایجان غربی</option>
                                        <option value="4">اردبیل</option>
                                        <option value="7">ایلام</option>
                                        <option value="8">بوشهر</option>
                                        <option value="10">چهار محال و بختیاری</option>
                                        <option value="11">خراسان جنوبی</option>
                                        <option value="13">خراسان شمالی</option>
                                        <option value="15">زنجان</option>
                                        <option value="16">سمنان</option>
                                        <option value="17">سیستان و بلوچستان</option>
                                        <option value="19">قزوین</option>
                                        <option value="20">قم</option>
                                        <option value="21">کردستان</option>
                                        <option value="22">کرمان</option>
                                        <option value="23">کرمانشاه</option>
                                        <option value="24">کهگیلویه و بویراحمد</option>
                                        <option value="25">گلستان</option>
                                        <option value="26">گیلان</option>
                                        <option value="27">لرستان</option>
                                        <option value="29">مرکزی</option>
                                        <option value="30">هرمزگان</option>
                                        <option value="31">همدان</option>
                                        <option value="32">یزد</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="o-form__field-container">
                            <div class="o-form__field-label">شهر*</div>
                            <div
                                class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-dropdown-universal selectric-js-select-city selectric-js-address-city-id">
                                <div class="selectric-select">
                                    <select name="city"
                                            class="c-ui-select js-ui-select-search js-dropdown-universal js-select-city js-address-city-id"
                                            name="city" value="" tabindex="-1">
                                        <option value="">انتخاب شهر</option>
                                        <option value="تهران" class="js-not-empty">تهران</option>
                                        <option value="شهریار" class="js-not-empty">شهریار</option>
                                        <option value="اسلامشهر" class="js-not-empty">اسلامشهر</option>
                                        <option value="ملارد" class="js-not-empty">ملارد</option>
                                        <option value="1697" class="js-not-empty">پردیس</option>
                                        <option value="1723" class="js-not-empty">قدس</option>
                                        <option value="1714" class="js-not-empty">اندیشه</option>
                                        <option value="1693" class="js-not-empty">پاکدشت</option>
                                        <option value="1699" class="js-not-empty">آبعلی</option>
                                        <option value="3249" class="js-not-empty">ابباریک</option>
                                        <option value="3268" class="js-not-empty">ابراهیم اباد</option>
                                        <option value="3293" class="js-not-empty">احمدآبادجانسپار</option>
                                        <option value="3298" class="js-not-empty">احمدابادمستوفی</option>
                                        <option value="1721" class="js-not-empty">ارجمند</option>
                                        <option value="3278" class="js-not-empty">اسلام اباد</option>
                                        <option value="3294" class="js-not-empty">اسماعیل آباد</option>
                                        <option value="3311" class="js-not-empty">امیریه</option>
                                        <option value="3248" class="js-not-empty">ایجدان</option>
                                        <option value="3247" class="js-not-empty">باغخواص</option>
                                        <option value="1715" class="js-not-empty">باغستان</option>
                                        <option value="1708" class="js-not-empty">باقرشهر</option>
                                        <option value="1696" class="js-not-empty">بومهن</option>
                                        <option value="3256" class="js-not-empty">پارچین</option>
                                        <option value="3287" class="js-not-empty">پرند</option>
                                        <option value="1695" class="js-not-empty">پیشوا</option>
                                        <option value="3303" class="js-not-empty">جابان</option>
                                        <option value="3260" class="js-not-empty">جاجرود(خسروآباد)</option>
                                        <option value="3262" class="js-not-empty">جعفرابادباقراف</option>
                                        <option value="3251" class="js-not-empty">جلیل اباد</option>
                                        <option value="1727" class="js-not-empty">جواد آباد</option>
                                        <option value="3269" class="js-not-empty">چرمشهر</option>
                                        <option value="1686" class="js-not-empty">چهاردانگه</option>
                                        <option value="1706" class="js-not-empty">حسن آباد</option>
                                        <option value="4613" class="js-not-empty">حسن آباد فشافویه</option>
                                        <option value="3257" class="js-not-empty">حصارامیر</option>
                                        <option value="3310" class="js-not-empty">حصاربن</option>
                                        <option value="3291" class="js-not-empty">حصارک بالا</option>
                                        <option value="3290" class="js-not-empty">حصارک پایین</option>
                                        <option value="3258" class="js-not-empty">خاتون اباد</option>
                                        <option value="3277" class="js-not-empty">خاورشهر</option>
                                        <option value="3250" class="js-not-empty">خاوه</option>
                                        <option value="3282" class="js-not-empty">خلازیر</option>
                                        <option value="3255" class="js-not-empty">داوداباد</option>
                                        <option value="3309" class="js-not-empty">درده</option>
                                        <option value="1702" class="js-not-empty">دماوند</option>
                                        <option value="3246" class="js-not-empty">دهماسین</option>
                                        <option value="1704" class="js-not-empty">رباط کریم</option>
                                        <option value="1700" class="js-not-empty">رودهن</option>
                                        <option value="3292" class="js-not-empty">سبزدشت</option>
                                        <option value="3304" class="js-not-empty">سربندان</option>
                                        <option value="3295" class="js-not-empty">سعیدآباد</option>
                                        <option value="3289" class="js-not-empty">سلطان اباد</option>
                                        <option value="4621" class="js-not-empty">سه راه سنگی</option>
                                        <option value="3302" class="js-not-empty">شاطره</option>
                                        <option value="1716" class="js-not-empty">شاهدشهر</option>
                                        <option value="1692" class="js-not-empty">شریف آباد</option>
                                        <option value="3267" class="js-not-empty">شمس اباد</option>
                                        <option value="1710" class="js-not-empty">شمشک</option>
                                        <option value="1705" class="js-not-empty">شهر جدید پرند</option>
                                        <option value="3288" class="js-not-empty">شهر صنعتی پرند</option>
                                        <option value="4620" class="js-not-empty">شهر قدس</option>
                                        <option value="3261" class="js-not-empty">شهرصنعتی خرمدشت</option>
                                        <option value="4618" class="js-not-empty">شهرک صنعتی چهاردانگه</option>
                                        <option value="4609" class="js-not-empty">شهرک صنعتی خاوران</option>
                                        <option value="4619" class="js-not-empty">شهرک صنعتی گلگون</option>
                                        <option value="3283" class="js-not-empty">شهرک صنعتی نصیرشهر</option>
                                        <option value="3254" class="js-not-empty">شهرک عباس آباد</option>
                                        <option value="3284" class="js-not-empty">شهرک قلعه میر</option>
                                        <option value="3301" class="js-not-empty">صالح آباد</option>
                                        <option value="1689" class="js-not-empty">صالحیه</option>
                                        <option value="1718" class="js-not-empty">صبا شهر</option>
                                        <option value="1725" class="js-not-empty">صفادشت</option>
                                        <option value="3264" class="js-not-empty">طورقوزاباد</option>
                                        <option value="4615" class="js-not-empty">عباس آباد علاقبند</option>
                                        <option value="3245" class="js-not-empty">عسگرابادعباسی</option>
                                        <option value="1719" class="js-not-empty">فردوسیه</option>
                                        <option value="3271" class="js-not-empty">فرودگاه امام خمینی</option>
                                        <option value="1694" class="js-not-empty">فرون آباد</option>
                                        <option value="3276" class="js-not-empty">فرون اباد</option>
                                        <option value="1711" class="js-not-empty">فشم</option>
                                        <option value="3299" class="js-not-empty">فیروزبهرام</option>
                                        <option value="1722" class="js-not-empty">فیروزکوه</option>
                                        <option value="3265" class="js-not-empty">قاسم ابادشوراباد</option>
                                        <option value="1724" class="js-not-empty">قرچک</option>
                                        <option value="3253" class="js-not-empty">قلعه خواجه</option>
                                        <option value="3244" class="js-not-empty">قلعه سین</option>
                                        <option value="3270" class="js-not-empty">قلعه محمدعلی خان</option>
                                        <option value="3273" class="js-not-empty">قلعه نوخالصه</option>
                                        <option value="3266" class="js-not-empty">قمصر</option>
                                        <option value="3281" class="js-not-empty">قو,چ حصار</option>
                                        <option value="4616" class="js-not-empty">قیام دشت</option>
                                        <option value="3280" class="js-not-empty">قیامدشت</option>
                                        <option value="3252" class="js-not-empty">کریم اباد</option>
                                        <option value="3286" class="js-not-empty">کلمه</option>
                                        <option value="1709" class="js-not-empty">کهریزک</option>
                                        <option value="1703" class="js-not-empty">کیلان</option>
                                        <option value="4612" class="js-not-empty">گردنه تنباکویی</option>
                                        <option value="3259" class="js-not-empty">گرمدره</option>
                                        <option value="3274" class="js-not-empty">گل تپه کبیر</option>
                                        <option value="3300" class="js-not-empty">گلدسته</option>
                                        <option value="1690" class="js-not-empty">گلستان</option>
                                        <option value="3279" class="js-not-empty">لپه زنگ</option>
                                        <option value="3297" class="js-not-empty">لم اباد</option>
                                        <option value="3296" class="js-not-empty">لواسان بزرگ</option>
                                        <option value="1713" class="js-not-empty">لواسان کوچک</option>
                                        <option value="3275" class="js-not-empty">محمودابادپیرزاده</option>
                                        <option value="3307" class="js-not-empty">مرا</option>
                                        <option value="3263" class="js-not-empty">مرقدامام ره</option>
                                        <option value="3306" class="js-not-empty">مشا</option>
                                        <option value="3305" class="js-not-empty">مهرآباد</option>
                                        <option value="1688" class="js-not-empty">نسیم شهر</option>
                                        <option value="3285" class="js-not-empty">نصیرآباد</option>
                                        <option value="1691" class="js-not-empty">نصیرشهر</option>
                                        <option value="1720" class="js-not-empty">وحیدیه</option>
                                        <option value="1728" class="js-not-empty">ورامین</option>
                                        <option value="3272" class="js-not-empty">وهن اباد</option>
                                        <option value="3308" class="js-not-empty">هرانده</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-address__form-row c-address__form-row--full-width js-address-field"><label
                            class="o-form__field-container">
                            <div class="o-form__field-label">نشانی پستی*</div>
                            <div class="o-form__field-frame">
                                <input name="address" type="text" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-address">
                            </div>
                        </label></div>
                    <div class="c-address__form-row">
                        <div class="c-address__form-row
                 c-address__form-row--z-index-0 "><label class="o-form__field-container">
                                <div class="o-form__field-label">پلاک*</div>
                                <div class="o-form__field-frame">
                                    <input name="bld_num" type="text" placeholder=""
                                           class="o-form__field js-input-field js-address-building-number">
                                </div>
                            </label><label class="o-form__field-container">
                                <div class="o-form__field-label">واحد</div>
                                <div class="o-form__field-frame">
                                    <input name="vahed" type="text" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-apartment-number">
                                </div>
                            </label></div>
                        <div class="c-address__form-row"><label class="o-form__field-container">
                                <div class="o-form__field-label">کد پستی*</div>
                                <div class="o-form__field-frame">
                                    <input name="code_posti" type="text" placeholder=""
                                           class="o-form__field js-input-field js-address-postal-code">
                                </div>
                                <div class="o-form__field-helper">کدپستی باید ۱۰ رقم و بدون خط تیره باشد</div>
                            </label></div>
                    </div>
                </div>
                <div class="c-address__form">
                    <div class="c-address__form-row
                     c-address__form-row--z-index-0 "><input type="hidden" class="js-address-id"><label
                            class="o-form__field-container">
                            <div class="o-form__field-label">نام گیرنده*</div>
                            <div class="o-form__field-frame">
                                <input name="name" type="text" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-first-name">
                            </div>
                        </label><label class="o-form__field-container">
                            <div class="o-form__field-label">نام خانوادگی گیرنده*</div>
                            <div class="o-form__field-frame">
                                <input name="lname" type="text" placeholder=""
                                       class="o-form__field js-input-field js-address-last-name">
                            </div>
                        </label></div>
                    <div class="c-address__form-row"><label class="o-form__field-container">
                            <div class="o-form__field-label">شماره موبایل*</div>
                            <div class="o-form__field-frame">
                                <input name="mobile" type="text" placeholder=""
                                       class="o-form__field js-input-field js-address-mobile-phone">
                            </div>
                            <div class="o-form__field-helper">مثل: ۰۹۱۲۳۴۵۶۷۸۹</div>
                        </label></div>
                </div>
                <div class="c-address__separator"></div>
                <div class="c-address__modal-footer">
                    <div class="o-btn o-btn--link-blue-sm js-back-to-map">اصلاح موقعیت بر روی نقشه</div>
                    <button class="o-btn o-btn--contained-red-md js-submit-btn"
                            type="submit">تایید و ثبت آدرس</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--//address delete--}}
