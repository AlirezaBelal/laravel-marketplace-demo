<div class="c-RD-profile__dis-none" data-name="workCalendar" style="display: none;">

    <div class="c-grid__row c-RD-profile__mt-0" id="workCalendar"><div class="c-grid__col">
            <div class="c-card c-RD-profile__bdrs-top-0 o-border-seller-error-1 js-profile-content-spinner" id="profile-step-1" style="box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.05);">
                <div class="c-card__header c-card__header--with-controls business_info uk-hidden"></div>
                <div class="c-card__body c-card__body--form">
                    <div class="c-grid__row">
                        <div class="c-grid__col uk-flex-row uk-flex-between@l c-grid__col--sm-6 c-grid__col--lg-10 c-RD-profile__section-title">
                            <span class="c-RD-profile__title uk-flex-1">تقویم کاری</span>
                            <span class="uk-flex-1 uk-text-left">
                            <span class="c-calendar__remaining-holiday-title">
                            مانده تعطیلات کل :‌
                            </span>
                            <span class="c-calendar__remaining-holiday-count js-used-holiday-count"></span>
                            <span class="c-calendar__remaining-holiday-total">
                                از
                                <span class="js-total-holiday-count"></span>
                            </span>
                        </span>
                        </div>
                    </div>
                    <div class="c-grid__row js-profile-workCalendar-calendar">
                        <div class="col-12 col-xs-12 c-grid__col c-grid__col--calendar">
                            <div class="c-calendar">
                                <div class="c-calendar__top js-workCalendar-top-info">
                <span class="c-calendar__highlight-box c-calendar__month-remaining-holiday js-month-remaining-holiday">
                    <span class="c-calendar__remaining-time">
                        <span class="c-calendar__remaining-holiday-title">
                        مانده تعطیلات این ماه :‌
                        </span>
                        <span class="js-month-used-holiday-count c-calendar__remaining-holiday-count"></span>
                        <span class="c-calendar__remaining-holiday-total">
                            از
                            <span class="js-month-total-holiday-count"></span>
                        </span>
                    </span>
                </span>
                                    <div class="c-calendar__controls">
                                        <a class="c-calendar__month c-calendar__month--previous js-calendar-prev" data-command="prev"></a>
                                        <span class="c-calendar__month c-calendar__month--current js-calendar-month js-calendar-current" data-month-index="{persian.monthIndex}" data-year="{persian.year}">{persian.month} {persian.year| convertToFaDigit}</span>
                                        <div id="dropdown-block" class="c-calendar__month-box uk-hidden">
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="1" data-year="{persian.year}">فروردین
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="2" data-year="{persian.year}">اردیبهشت
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="3" data-year="{persian.year}">خرداد
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="4" data-year="{persian.year}">تیر
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="5" data-year="{persian.year}">مرداد
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="6" data-year="{persian.year}">شهریور
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="7" data-year="{persian.year}">مهر
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="8" data-year="{persian.year}">آبان
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="9" data-year="{persian.year}">آذر
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="10" data-year="{persian.year}">دی
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="11" data-year="{persian.year}">بهمن
                                            </div>
                                            <div class="c-calendar__month-box--item js-calendar-select-month" data-month="12" data-year="{persian.year}">اسفند
                                            </div>
                                        </div>
                                        <a class="c-calendar__month c-calendar__month--next  js-calendar-next" data-command="next"></a>
                                    </div>

                                    <span class="c-calendar__year js-calendar-year">{persian.currentDate | convertToFaDigit}</span>
                                </div>
                                <ul class="c-calendar__box js-calendar">
                                    <li class="c-calendar__week c-calendar__week--header">                     <div class="c-calendar__day c-calendar__day--header">شنبه</div>
                                        <div class="c-calendar__day c-calendar__day--header">یکشنبه</div>
                                        <div class="c-calendar__day c-calendar__day--header">دوشنبه</div>
                                        <div class="c-calendar__day c-calendar__day--header">سه‌شنبه</div>
                                        <div class="c-calendar__day c-calendar__day--header">چهارشنبه</div>
                                        <div class="c-calendar__day c-calendar__day--header">پنجشنبه</div>
                                        <div class="c-calendar__day c-calendar__day--header">جمعه</div>
                                    </li>
                                    <div class="js-calendar-days-row">
                                        <li class="c-calendar__week js-calendar-days-tile-{index}" data-index="{index}">                                                                         <div class="c-calendar__day js-calendar-day-{iterator}" style="cursor: default">
                                                <div class="c-calendar__day-wrapper c-calendar__day-wrapper--holiday c-RD-profile__holiday-text--gray-light uk-padding-remove">
                                                    <span class="c-calendar__add-holiday--active js-calendar-add-holiday" data-date="{date}" data-orders="{orderCommitmentDetail.totalCount}" data-ship-by-digikala="{orderCommitmentDetail.ShipByDigikalaCount}" data-ship-by-seller="{orderCommitmentDetail.shipBySellerCount}"></span>
                                                    <span class="c-calendar__add-holiday--deactive js-tooltip" data-tooltip="امکان اضافه کردن روز تعطیل از ۲ روز تا ۱۸۰ روز بعد امکان‌پذیر است."></span>
                                                    <span class="c-calendar__add-holiday--active o-color-seller-secondary js-calendar-add-workday" data-date="{date}" data-orders="{orderCommitmentDetail.totalCount}" data-ship-by-digikala="{orderCommitmentDetail.ShipByDigikalaCount}" data-ship-by-seller="{orderCommitmentDetail.shipBySellerCount}">
                                    </span>
                                                    <span class="c-calendar__date">
                                    {day}
                                </span>
                                                    <div class="c-calendar__promo-cluster uk-flex uk-flex-column">
                                                        <div data-show="{sellerHoliday:true}" class="c-calendar__day-label">
                                                            تعطیل
                                                        </div>
                                                        <div data-show="{officialHoliday:true}" class="c-calendar__day-label js-official-holiday-text" style="width: 42px;">
                                                            تعطیل رسمی
                                                        </div>
                                                        <div class="uk-flex uk-flex-center">
                                        <span class="c-calendar__counter c-ui-tooltip__trigger js-tooltip" data-show="{orderCommitmentDetail:true}" data-tooltip="<div style='padding: 10px;'>
                                                    <p style='display: flex;
                                                        justify-content: space-between;
                                                        align-items: center;
                                                        margin-bottom: 15px;'>
                                                        <span style='color: #a1a3a8'>تعهد ارسال به دیجی‌کالا</span>
                                                        <span style='font-size: 14px' class='em'>{orderCommitmentDetail.ShipByDigikalaCount}</span>
                                                    </p>
                                                    <p style='display: flex;
                                                        justify-content: space-between;
                                                        align-items: center;'>
                                                        <span style='color: #a1a3a8'>تعهد ارسال به مشتری</span>
                                                        <span style='font-size: 14px' class='em'>{orderCommitmentDetail.shipBySellerCount}</span>
                                                    </p>
                                                            </div>">
                                                {orderCommitmentDetail.totalCount}
                                        </span>

                                                            <span class="c-calendar__badge js-tooltip" data-show="{orderCommitmentDetail.shipBySellerCount: 1}" data-tooltip="به دلیل تایید سفارش مشتری پیش از اعلام تعطیلی توسط شما، موظف به رساندن محصول به دست مشتری هستید."></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="c-RD-profile__separator"></div>
                    <div class="c-ship-by-seller__tabs o-spacing-m-t-4 c-grid__row">
                        <a class="c-ship-by-seller__tab-option c-ship-by-seller__tab-option--active js-calendar-table-tab-item" data-content-id="seller_holidays">تعطیلات پیش رو</a>
                        <a class="c-ship-by-seller__tab-option js-calendar-table-tab-item" data-content-id="seller_workdays">روزهای کاری افزوده شده</a>
                    </div>
                    <div id="seller_holidays" class="js-calendar-table-tab-content c-grid__row c-RD-profile--mt-40 js-profile-workCalendar-table-section">
                        <div class="col-12 col-xs-12 c-grid__col c-grid__col--calendar c-RD-profile--jc-sb">
                            <div class="c-ui-form__row c-RD-profile--ai-c">
                                <label class="c-ui-form__label c-RD-profile--mb-0 c-RD-profile--ml-20">وضعیت تعطیلات</label>
                                <div class="c-ui-filters__sort-options c-ui-filters__filter-form c-ui-form__row c-ui-form__row--no-gap">
                                    <label class="c-ui-filters__radio-label c-ui-filters__radio-label--form c-profile__work-calendar-switch-button c-ui-form__col--4 js-profile-workCalendar-search-filter">
                                        <input class="c-ui-filters__radio js-profile-workCalendar-search-button" type="radio" name="search[active]" value="ahead_holidays">
                                        <span class="c-ui-filters__radio-option c-ui-filters__radio-option--form c-profile__work-calender-switch c-RD-profile--mw-100">پیش‌ رو</span>
                                    </label>
                                    <label class="c-ui-filters__radio-label c-ui-filters__radio-label--form c-profile__work-calendar-switch-button c-ui-form__col--4 js-profile-workCalendar-search-filter">
                                        <input class="c-ui-filters__radio js-profile-workCalendar-search-button" type="radio" name="search[active]" value="past_holidays">
                                        <span class="c-ui-filters__radio-option c-ui-filters__radio-option--form c-profile__work-calender-switch c-RD-profile--mw-100">گذشته</span>
                                    </label>
                                    <label class="c-ui-filters__radio-label c-ui-filters__radio-label--form c-profile__work-calendar-switch-button c-ui-form__col--4 js-profile-workCalendar-search-filter">
                                        <input class="c-ui-filters__radio js-profile-workCalendar-search-button" type="radio" name="search[active]" value="removed_holidays">
                                        <span class="c-ui-filters__radio-option c-ui-filters__radio-option--form c-profile__work-calender-switch c-RD-profile--mw-100">پاک شده</span>
                                    </label>
                                </div>
                            </div>
                            <div class="c-ui-form__row c-RD-profile--ai-c c-RD-profile--mt-0">
                                <label class="c-calendar__remaining-holiday-title c-RD-profile--mb-0">
                                    <span class="js-calendar-table-count-label"></span>
                                    &nbsp;
                                    <span class="c-calendar__remaining-holiday-total js-profile-workCalendar-table-count"></span>
                                </label>

                            </div>
                        </div>
                        <div class="c-grid__row c-RD-profile--mt-34">
                            <div class="c-ui-table__wrapper c-RD-profile--w-100p c-RD-profile__holiday-list-wrapper">
                                <table class="c-ui-table js-table-fixed-header js-profile-workCalendar-table-view">
                                    <thead class="c-package-create__thead ">
                                    <tr class="c-ui-table__row c-ui-table__row--head">
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>تاریخ تعطیلی کاری</span>
                                        </th>
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>وضعیت</span>
                                        </th>
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>تعهد ارسال</span>
                                        </th>
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>عملیات</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="js-profile-workCalendar-table">
                                    <tr class="c-ui-table__row c-ui-table__row--body c-ui-table__row--with-hover c-ui-table__row--selected">
                                        <td class="c-ui-table__cell c-ui-table__cell--item-title">{date | persianDate}</td>
                                        <td class="c-ui-table__cell">
                                            <div class="c-RD-profile__work-calendar-status c-RD-profile__work-calendar-status--{status}">{status | holidayStatus}</div>
                                        </td>
                                        <td class="c-ui-table__cell">
                                            <span class="c-RD-profile__holiday-responsibility">{commitmentCount | convertToFaDigit}</span>
                                        </td>
                                        <td class="c-ui-table__cell c-ui-table__cell--counter-control" data-show="{ type : ahead_holidays }">
                                            <div class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-2">
                                                <div class="c-RD-profile__delete-warehouse c-RD-profile__delete-warehouse--gray js-profile-workCalendar-delete-holiday" data-id="{id}" data-date="{date}"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="c-ui-table js-table-fixed-header js-profile-workCalendar-table-empty-view uk-hidden">
                                    <tbody><tr>
                                        <td class="c-RD-profile__holiday-empty">
                                            <div id="message-ahead" style="display: none">
                                                <h5 class="uk-text-emphasis">شما تعطیلاتی پیش روی خود ندارید.</h5>
                                                <p class="uk-text-muted">برای اضافه کردن تعطیلات کاری، روی روز مورد نظر خود در تقویم کلیک کنید</p>
                                            </div>
                                            <div id="message-past" style="display: none">
                                                <h5 class="uk-text-emphasis">تعطیلات ثبت شده‌ای که روز آن‌ها گذشته است، در اینجا نمایش داده می‌شوند</h5>
                                            </div>
                                            <div id="message-deleted" style="display: none">
                                                <h5 class="uk-text-emphasis">تعطیلاتی که پس از تایید پاک کرده اید، اینجا نمایش داده می‌شود.</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <div id="seller_workdays" class="js-calendar-table-tab-content c-grid__row c-RD-profile--mt-40 js-profile-workdays-table-section uk-hidden">
                        <div class="col-12 col-xs-12 c-grid__col c-grid__col--calendar c-RD-profile--jc-sb">
                            <div class="c-ui-form__row c-RD-profile--ai-c">
                                <label class="c-ui-form__label c-RD-profile--mb-0 c-RD-profile--ml-20">وضعیت روزهای کاری</label>
                                <div class="c-ui-filters__sort-options c-ui-filters__filter-form c-ui-form__row c-ui-form__row--no-gap">
                                    <label class="c-ui-filters__radio-label c-ui-filters__radio-label--form c-profile__work-calendar-switch-button c-ui-form__col--4 js-profile-workdays-search-filter">
                                        <input checked="" class="c-ui-filters__radio js-profile-workdays-search-button" type="radio" name="search[workdays]" value="ahead_workdays">
                                        <span class="c-ui-filters__radio-option c-ui-filters__radio-option--form c-profile__work-calender-switch c-RD-profile--mw-100">پیش‌ رو</span>
                                    </label>
                                    <label class="c-ui-filters__radio-label c-ui-filters__radio-label--form c-profile__work-calendar-switch-button c-ui-form__col--4 js-profile-workdays-search-filter">
                                        <input class="c-ui-filters__radio js-profile-workdays-search-button" type="radio" name="search[workdays]" value="past_workdays">
                                        <span class="c-ui-filters__radio-option c-ui-filters__radio-option--form c-profile__work-calender-switch c-RD-profile--mw-100">گذشته</span>
                                    </label>
                                    <label class="c-ui-filters__radio-label c-ui-filters__radio-label--form c-profile__work-calendar-switch-button c-ui-form__col--4 js-profile-workdays-search-filter">
                                        <input class="c-ui-filters__radio js-profile-workdays-search-button" type="radio" name="search[workdays]" value="removed_workdays">
                                        <span class="c-ui-filters__radio-option c-ui-filters__radio-option--form c-profile__work-calender-switch c-RD-profile--mw-100">پاک شده</span>
                                    </label>
                                </div>
                            </div>

                            <div class="c-ui-form__row c-RD-profile--ai-c c-RD-profile--mt-0">
                                <label class="c-calendar__remaining-holiday-title c-RD-profile--mb-0">
                                    <span class="js-workdays-table-count-label"></span>
                                    &nbsp;
                                    <span class="c-calendar__remaining-holiday-total js-profile-workdays-table-count"></span>
                                </label>

                            </div>
                        </div>
                        <div class="c-grid__row c-RD-profile--mt-34">
                            <div class="c-ui-table__wrapper c-RD-profile--w-100p c-RD-profile__holiday-list-wrapper">
                                <table class="c-ui-table js-table-fixed-header js-profile-workdays-table-view">
                                    <thead class="c-package-create__thead ">
                                    <tr class="c-ui-table__row c-ui-table__row--head">
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>تاریخ روز کاری</span>
                                        </th>
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>وضعیت</span>
                                        </th>
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>تعهد ارسال</span>
                                        </th>
                                        <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                            <span>عملیات</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="js-profile-workdays-table">
                                    <tr class="c-ui-table__row c-ui-table__row--body c-ui-table__row--with-hover c-ui-table__row--selected">
                                        <td class="c-ui-table__cell c-ui-table__cell--item-title">{date}</td>
                                        <td class="c-ui-table__cell">
                                            <div class="c-RD-profile__work-calendar-status c-RD-profile__work-calendar-status--{status}">{status | workDayStatus}</div>
                                        </td>
                                        <td class="c-ui-table__cell">
                                            <span class="c-RD-profile__holiday-responsibility">{commitmentCount | convertToFaDigit}</span>
                                        </td>
                                        <td class="c-ui-table__cell c-ui-table__cell--counter-control">
                                            <div class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-2">
                                                <div class="c-RD-profile__delete-warehouse c-RD-profile__delete-warehouse--gray js-profile-workCalendar-delete-workday" data-shipment-type="{shipment_type}" data-id="{id}" data-date="{date}"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="c-ui-table js-table-fixed-header js-profile-workdays-table-empty-view uk-hidden">
                                    <tbody><tr>
                                        <td class="c-RD-profile__holiday-empty">
                                            <div id="message-ahead" style="display: none">
                                                <h5 class="uk-text-emphasis">شما هیچ روز کاری در پیش رو ندارید.</h5>
                                                <p class="uk-text-muted">برای اضافه کردن روز کاری، روی تعطیلات رسمی مورد نظر خود در تقویم کلیک کنید</p>
                                            </div>
                                            <div id="message-past" style="display: none">
                                                <h5 class="uk-text-emphasis">روزهای کاری ثبت شده‌ای که روز آن‌ها گذشته است، در اینجا نمایش داده می‌شوند</h5>
                                            </div>
                                            <div id="message-deleted" style="display: none">
                                                <h5 class="uk-text-emphasis">روزهای کاری که پس از تایید پاک کرده اید، اینجا نمایش داده می‌شود.</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>            </div>
            </div>
        </div><div id="workCalendarDeleteHoliday" uk-modal="esc-close:false;bg-close:false;" class="c-RD-profile__profile-modal uk-modal">
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default uk-close uk-icon" type="button" uk-close="ratio: 1.5"><svg width="21" height="21" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1.5"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>
                <div class="c-RD-profile__profile-modal-alignment">
                    <p class="c-RD-profile__profile-modal-title uk-text-center">آیا حذف شدن این تعطیلی را تایید می‌کنید؟</p>
                </div>
                <div class="c-RD-profile__profile-modal-warninig uk-margin-remove-top uk-flex uk-margin-medium-bottom js-profile-holiday-delete-notice">
                    <span uk-icon="icon:warning; ratio:2.2;" class="uk-flex uk-flex-middle c-RD-profile__profile-modal-warninig--icon-color uk-icon"><svg width="44" height="44" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" ratio="2.2"> <circle cx="10" cy="14" r="1"></circle> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <path d="M10.97,7.72 C10.85,9.54 10.56,11.29 10.56,11.29 C10.51,11.87 10.27,12 9.99,12 C9.69,12 9.49,11.87 9.43,11.29 C9.43,11.29 9.16,9.54 9.03,7.72 C8.96,6.54 9.03,6 9.03,6 C9.03,5.45 9.46,5.02 9.99,5 C10.53,5.01 10.97,5.44 10.97,6 C10.97,6 11.04,6.54 10.97,7.72 L10.97,7.72 Z"></path></svg></span>
                    <p>
                        با توجه به این که روزهای تعطیل شما باید دو روز زودتر در سیستم ثبت شوند، اعلام روز جاری و فردا به عنوان روز تعطیل پس از حذف امکان پذیر نخواهد بود.
                    </p>
                </div>
                <div class="c-ui-checkbox c-RD-profile__profile-modal-action uk-flex uk-flex-center uk-margin-remove-top">
                    <div class="c-ui-btn c-ui-btn--danger uk-flex uk-flex-center uk-flex-middle uk-width-1-5 js-profile-workCalendar-delete-warehouse-btn" style="width : 128px">حذف روز تعطیل</div>
                    <div class="c-ui-btn uk-flex uk-flex-center uk-flex-middle uk-margin-small-right uk-width-1-5 uk-modal-close">بازگشت</div>
                </div>
            </div>
        </div><div id="workCalendarDeleteWorkdayModal" uk-modal="esc-close:false;bg-close:false;" class="c-RD-profile__profile-modal uk-modal">
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default uk-close uk-icon" type="button" uk-close="ratio: 1.5"><svg width="21" height="21" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1.5"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>
                <div class="c-RD-profile__profile-modal-alignment">
                    <p class="c-RD-profile__profile-modal-title uk-text-center">آیا حذف شدن این روز کاری را تایید می‌کنید؟</p>
                </div>
                <div class="c-ui-checkbox c-RD-profile__profile-modal-action uk-flex uk-flex-center uk-margin-remove-top">
                    <button class="o-btn o-btn--contained-error-lg-text uk-width-1-5 js-profile-submit-workday-deletion o-spacing-m-l-2">حذف روز کاری</button>
                    <div class="o-btn o-btn--outlined-gray-lg-text o-color-seller-background-light uk-modal-close o-text-color-n-600">بازگشت</div>
                </div>
            </div>
        </div></div>


</div>
