<div class="o-grid">
    <div class="row">
        @if (auth()->user()->favorite)
            <div class="col-6">
                <div class="o-headline o-headline--profile"><span>اطلاعات شخصی</span></div>
                <div class="c-profile-stats">
                    <div class="c-profile-stats__row">
                        <div class="c-profile-stats__col"><p><span>نام و نام خانوادگی:</span>
                                @if (auth()->user()->name)
                                    {{auth()->user()->name}}
                                @else
                                    -
                                @endif

                            </p></div>
                        <div class="c-profile-stats__col"><p><span>پست الکترونیک :</span><span
                                    class="c-profile-stats__value">
                                     @if (auth()->user()->email)
                                        {{auth()->user()->email}}
                                    @else
                                        -
                                    @endif
                                    </span>
                            </p></div>
                    </div>
                    <div class="c-profile-stats__row">
                        <div class="c-profile-stats__col"><p><span>شماره تلفن همراه:</span>
                                @if (auth()->user()->mobile)
                                    {{\App\Models\PersianNumber::translate(auth()->user()->mobile)}}
                                @else
                                    -
                                @endif

                            </p></div>
                        <div class="c-profile-stats__col"><p><span>کد ملی:</span>
                                @if (auth()->user()->national_code)
                                    {{\App\Models\PersianNumber::translate(auth()->user()->national_code)}}
                                @else
                                    -
                                @endif
                            </p></div>
                    </div>
                    <div class="c-profile-stats__row">
                        <div class="c-profile-stats__col"><p><span>دریافت خبرنامه:</span>
                                @if (auth()->user()->newsletter ==0 )
                                    خیر
                                @else
                                    بله
                                @endif

                            </p></div>
                        <div class="c-profile-stats__col"><p><span>روش بازگشت وجه:</span><span
                                    class="c-profile-stats__value">
                                           @if (auth()->user()->money_back)
                                        {{\App\Models\PersianNumber::translate(auth()->user()->money_back)}}
                                    @else
                                        -
                                    @endif

                                                                            </span></p></div>
                    </div>
                    <div class="c-profile-stats__action"><a href="{{route('profile.personal-info')}}"
                                                            class="btn-link-spoiler btn-link-spoiler--edit">ویرایش
                            اطلاعات شخصی</a></div>
                </div>
            </div>
            <div class="col-6">
                <div class="o-headline o-headline--profile">
                    <span>لیست آخرین علاقه‌مندی‌ها</span></div>
                <div class="c-profile-recent-fav">
                    <div class="c-profile-recent-fav__content">
                        <div class="c-profile-recent-fav__row js-favorite-product"><a
                                href="https://www.digikala.com/product/dkp-2334881/"
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--thumb"><img
                                    data-src="https://dkstatics-public.digikala.com/digikala-products/119224368.jpg?x-oss-process=image/resize,m_fill,h_150,w_150/quality,q_60"
                                    alt="ست 9 تکه لباس نوزاد کد t77285493  _7109845"
                                    src="https://dkstatics-public.digikala.com/digikala-products/119224368.jpg?x-oss-process=image/resize,m_fill,h_150,w_150/quality,q_60"
                                    loading="lazy"></a>
                            <div
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--title">
                                <a href="https://www.digikala.com/product/dkp-2334881/"><h4
                                        class="c-profile-recent-fav__name">ست 9 تکه لباس نوزاد
                                        کد t77285493 _7109845</h4></a>
                                <div class="c-profile-recent-fav__price">۲۲۰,۰۰۰
                                    تومان
                                </div>
                            </div>
                            <div
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--actions">
                                <button
                                    class="btn-action btn-action--remove js-remove-favorite-product"
                                    data-product-id="2334881"></button>
                            </div>
                        </div>
                        <div class="c-profile-recent-fav__row js-favorite-product"><a
                                href="https://www.digikala.com/product/dkp-2694359/"
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--thumb"><img
                                    data-src="https://dkstatics-public.digikala.com/digikala-products/120498265.jpg?x-oss-process=image/resize,m_fill,h_150,w_150/quality,q_60"
                                    alt="کتاب علی از زبان علی اثر محمد محمدیان نشر معارف"
                                    src="https://dkstatics-public.digikala.com/digikala-products/120498265.jpg?x-oss-process=image/resize,m_fill,h_150,w_150/quality,q_60"
                                    loading="lazy"></a>
                            <div
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--title">
                                <a href="https://www.digikala.com/product/dkp-2694359/"><h4
                                        class="c-profile-recent-fav__name">کتاب علی از زبان علی
                                        اثر محمد محمدیان نشر معارف</h4></a>
                                <div class="c-profile-recent-fav__price">۵۱,۸۰۰
                                    تومان
                                </div>
                            </div>
                            <div
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--actions">
                                <button
                                    class="btn-action btn-action--remove js-remove-favorite-product"
                                    data-product-id="2694359"></button>
                            </div>
                        </div>
                        <div class="c-profile-recent-fav__row js-favorite-product"><a
                                href="https://www.digikala.com/product/dkp-5271207/"
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--thumb"><img
                                    data-src="https://dkstatics-public.digikala.com/digikala-products/0ceb15c221aee52f2a35c25779eed2ff446a4532_1621943320.jpg?x-oss-process=image/resize,m_fill,h_150,w_150/quality,q_60"
                                    alt="لپ تاپ 15.6  اینچی دل مدل G3 15 3500 Gaming-B"
                                    src="https://dkstatics-public.digikala.com/digikala-products/0ceb15c221aee52f2a35c25779eed2ff446a4532_1621943320.jpg?x-oss-process=image/resize,m_fill,h_150,w_150/quality,q_60"
                                    loading="lazy"></a>
                            <div
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--title">
                                <a href="https://www.digikala.com/product/dkp-5271207/"><h4
                                        class="c-profile-recent-fav__name">لپ تاپ 15.6 اینچی دل
                                        مدل G3 15 3500 Gaming-B</h4></a>
                                <div class="c-profile-recent-fav__price">ناموجود</div>
                            </div>
                            <div
                                class="c-profile-recent-fav__col c-profile-recent-fav__col--actions">
                                <button
                                    class="btn-action btn-action--remove js-remove-favorite-product"
                                    data-product-id="5271207"></button>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-recent-fav__action"><a href="/profile/favorites/"
                                                                 class="btn-link-spoiler btn-link-spoiler--edit">مشاهده
                            و
                            ویرایش لیست مورد علاقه</a></div>
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="o-headline o-headline--profile"><span>اطلاعات شخصی</span></div>
                <div class="c-profile-stats">
                    <div class="c-profile-stats__row">
                        <div class="c-profile-stats__col"><p><span>نام و نام خانوادگی:</span>
                                @if (auth()->user()->name)
                                    {{auth()->user()->name}}
                                @else
                                    -
                                @endif

                            </p></div>
                        <div class="c-profile-stats__col"><p><span>پست الکترونیک :</span><span
                                    class="c-profile-stats__value">
                                     @if (auth()->user()->email)
                                        {{auth()->user()->email}}
                                    @else
                                        -
                                    @endif
                                    </span>
                            </p></div>
                    </div>
                    <div class="c-profile-stats__row">
                        <div class="c-profile-stats__col"><p><span>شماره تلفن همراه:</span>
                                @if (auth()->user()->mobile)
                                    {{\App\Models\PersianNumber::translate(auth()->user()->mobile)}}
                                @else
                                    -
                                @endif

                            </p></div>
                        <div class="c-profile-stats__col"><p><span>کد ملی:</span>
                                @if (auth()->user()->national_code)
                                    {{\App\Models\PersianNumber::translate(auth()->user()->national_code)}}
                                @else
                                    -
                                @endif
                            </p></div>
                    </div>
                    <div class="c-profile-stats__row">
                        <div class="c-profile-stats__col"><p><span>دریافت خبرنامه:</span>
                                @if (auth()->user()->newsletter ==0 )
                                    خیر
                                @else
                                    بله
                                @endif

                            </p></div>
                        <div class="c-profile-stats__col"><p><span>روش بازگشت وجه:</span><span
                                    class="c-profile-stats__value">
                                           @if (auth()->user()->money_back)
                                        {{\App\Models\PersianNumber::translate(auth()->user()->money_back)}}
                                    @else
                                        -
                                    @endif

                                                                            </span></p></div>
                    </div>
                    <div class="c-profile-stats__action"><a href="{{route('profile.personal-info')}}"
                                                            class="btn-link-spoiler btn-link-spoiler--edit">ویرایش
                            اطلاعات شخصی</a></div>
                </div>
            </div>
        @endif

    </div>
</div>
