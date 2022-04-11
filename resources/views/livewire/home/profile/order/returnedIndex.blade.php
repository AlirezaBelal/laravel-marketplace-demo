<section class="o-page__content">
    <div class="o-box">
        <div class="o-box__header"><span class="o-box__title">تاریخچه سفارشات</span></div>
        @include('livewire.home.profile.order.tabs')
        <div class="c-profile-order__content js-ui-tab-content">
            @foreach(\App\Models\Order::where('user_id',auth()->user()->id)->where('status','returned')->get() as $payment)
                <div class="c-profile-order__content js-ui-tab-content">
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۴۰۰/۰۷/۲۵</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۲۲۲۱۷۲۳۴۸</div>
                                    <div class="c-profile-order__list-item-detail">کالا دریافت شد</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/5995052/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-4710969/%D9%BE%D8%A7%DB%8C%D8%A7%D9%86%D9%87-%D9%81%D8%B1%D9%88%D8%B4%DA%AF%D8%A7%D9%87%DB%8C-%D9%85%D9%88%D8%B1%D9%81%D8%A7%D9%86-%D9%85%D8%AF%D9%84-h9-4g"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/cbb6ceca6ab227d51e00ff8657345e7334415968_1618497112.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="پایانه فروشگاهی مورفان مدل H9"></a></div>
                                </div>
                            </div>
                            <div
                                class="c-profile-order__list-item-actions c-profile-order__list-item-actions--has-separator">
                                <a href="/profile/orders/5995052/127376756/return-invoice/" target="_blank"
                                   class="o-btn o-btn--link-blue-md">مشاهده فاکتور</a></div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۴۰۰/۰۳/۲۰</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۱۸۸۳۸۱۸۷۱</div>
                                    <div class="c-profile-order__list-item-detail">کالا دریافت شد</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/4653056/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-3048126/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%D9%85%D8%AF%D9%84-galaxy-a21s-sm-a217fds-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85%DA%A9%D8%A7%D8%B1%D8%AA-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-64-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/89e7f2abac447a018242a954f03f8a6926344f8b_1594023235.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="گوشی موبایل سامسونگ مدل Galaxy A21S SM-A217F/DS دو سیم‌کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت	"></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="c-profile-order__list-item-actions c-profile-order__list-item-actions--has-separator">
                                <a href="/profile/orders/4653056/109403211/return-invoice/" target="_blank"
                                   class="o-btn o-btn--link-blue-md">مشاهده فاکتور</a></div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۴۰۰/۰۲/۲۳</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۱۸۷۷۰۶۶۰۲</div>
                                    <div class="c-profile-order__list-item-detail">کالا دریافت شد</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/4391661/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-5068298/%D8%A2%D8%B3%DB%8C%D8%A7%D8%A8-%D9%85%D8%AF%D9%84-d56-%D9%85%D9%86%D8%A7%D8%B3%D8%A8-%D8%A8%D8%B1%D8%A7%DB%8C-%D8%A2%D8%B3%DB%8C%D8%A7%D8%A8-%D9%85%D9%88%D9%84%DB%8C%D9%86%DA%A9%D8%B3"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/b4e50070bcf209be58e4c81181d275046c0e709b_1619996927.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="آسیاب مدل D56 مناسب برای آسیاب مولینکس"></a></div>
                                </div>
                            </div>
                            <div
                                class="c-profile-order__list-item-actions c-profile-order__list-item-actions--has-separator">
                                <a href="/profile/orders/4391661/105841758/return-invoice/" target="_blank"
                                   class="o-btn o-btn--link-blue-md">مشاهده فاکتور</a></div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۹/۱۰/۱۰</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۱۵۲۷۴۱۷۱۹</div>
                                    <div class="c-profile-order__list-item-detail">کالا دریافت شد</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/3073218/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-2463050/%DA%A9%D9%81%D8%B4-%D9%BE%DB%8C%D8%A7%D8%AF%D9%87-%D8%B1%D9%88%DB%8C-%D9%85%D8%B1%D8%AF%D8%A7%D9%86%D9%87-%D9%85%D8%AF%D9%84-tiger-rd"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/90db5bcd0bbf69ad4905a6723a0e0630eba17c2b_1624364593.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="کفش پیاده روی مردانه مدل Tiger-Rd"></a></div>
                                </div>
                            </div>
                            <div
                                class="c-profile-order__list-item-actions c-profile-order__list-item-actions--has-separator">
                                <a href="/profile/orders/3073218/84986325/return-invoice/" target="_blank"
                                   class="o-btn o-btn--link-blue-md">مشاهده فاکتور</a></div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۹/۰۳/۳۰</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۱۱۵۱۷۶۳۶۶</div>
                                    <div class="c-profile-order__list-item-detail">کالا دریافت شد</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/1631095/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-510370/%D9%82%D9%87%D9%88%D9%87-%D8%AC%D9%88%D8%B4-%D9%BE%D8%B1%D9%84%D9%88-%D9%85%D8%AF%D9%84-m007-6-cups"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/442094.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="قهوه جوش پرلو مدل  M007-6 CUPS"></a></div>
                                </div>
                            </div>
                            <div
                                class="c-profile-order__list-item-actions c-profile-order__list-item-actions--has-separator">
                                <a href="/profile/orders/1631095/64358376/return-invoice/" target="_blank"
                                   class="o-btn o-btn--link-blue-md">مشاهده فاکتور</a></div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۹/۰۲/۳۰</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۱۰۸۸۳۰۹۷۹</div>
                                    <div class="c-profile-order__list-item-detail">لغو شده توسط مشتری</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/1455077/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-1116748/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D9%87%DB%8C%D9%88%D9%86%D8%AF%D8%A7%DB%8C-%D9%85%D8%AF%D9%84-seoul-9-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/5370441.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="گوشی موبایل هیوندای مدل seoul 9 دو سیم کارت"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۸/۱۱/۰۷</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۹۰۰۶۶۰۰۰</div>
                                    <div class="c-profile-order__list-item-detail">لغو شده توسط مشتری</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/875743/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-2034480/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D8%A7%DB%8C%D8%B3%D9%88%D8%B3-%D9%85%D8%AF%D9%84-zenfone-3s-max-zc521tl-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-32-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA-%D8%A8%D8%A7-%D8%A8%D8%B1%DA%86%D8%B3%D8%A8-%D9%82%DB%8C%D9%85%D8%AA-%D9%85%D8%B5%D8%B1%D9%81-%DA%A9%D9%86%D9%86%D8%AF%D9%87"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/113388300.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="گوشی موبایل ایسوس مدل Zenfone 3s Max ZC521TL دو سیم کارت ظرفیت 32 گیگابایت - با برچسب قیمت مصرف کننده"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۸/۰۹/۰۱</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۷۷۸۷۳۶۷۰</div>
                                    <div class="c-profile-order__list-item-detail">پیش نویس</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/561277/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-2089263/%D9%84%D9%BE-%D8%AA%D8%A7%D9%BE-15-%D8%A7%DB%8C%D9%86%DA%86%DB%8C-%D9%84%D9%86%D9%88%D9%88-%D9%85%D8%AF%D9%84-ideapad-330-f"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/113687302.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="لپ تاپ 15 اینچی لنوو مدل Ideapad 330 - F"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۸/۰۷/۰۶</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۶۹۸۹۵۰۵۹</div>
                                    <div class="c-profile-order__list-item-detail">رد شده</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/363417/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-269747/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D9%86%D9%88%DA%A9%DB%8C%D8%A7-%D9%85%D8%AF%D9%84-216-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/632660.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="گوشی موبایل نوکیا مدل 216 دو سیم‌ کارت"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-order__list-item">
                        <div class="c-profile-order__list-item-details">
                            <div class="c-profile-order__list-item-details-top ">
                                <div class="c-profile-order__list-item-details-row">
                                    <div class="c-profile-order__list-item-detail">۱۳۹۸/۰۶/۲۰</div>
                                    <div class="c-profile-order__list-item-detail">DKC-۶۸۴۰۳۱۸۵</div>
                                    <div class="c-profile-order__list-item-detail">تایید شده</div>
                                </div>
                                <a class="o-link o-link--has-arrow" href="/profile/orders-return/309349/">مشاهده
                                    جزییات</a></div>
                            <div class="c-profile-order__list-item-details-row"></div>
                        </div>
                        <div class="c-profile-order__list-item-parcels">
                            <div class="c-profile-order__list-item-parcel-products">
                                <div class="c-profile-order__list-item-parcel">
                                    <div class="c-profile-order__list-item-parcel-products"><a
                                            href="/product/dkp-1002278/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D8%A7%D8%B1%D8%AF-%D9%85%D8%AF%D9%84-216i-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA"
                                            class="c-profile-order__list-item-parcel-product"><img
                                                src="https://dkstatics-public.digikala.com/digikala-products/4705527.jpg?x-oss-process=image/resize,m_lfit,h_150,w_150/quality,q_80"
                                                alt="گوشی موبایل ارد مدل 216i دو سیم کارت"></a></div>
                                </div>
                            </div>
                            <div
                                class="c-profile-order__list-item-actions c-profile-order__list-item-actions--has-separator">
                                <a href="/profile/orders/309349/40767995/return-invoice/" target="_blank"
                                   class="o-btn o-btn--link-blue-md">مشاهده فاکتور</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="c-pager js-pagination"></div>
        <div class="js-search-results"></div>
    </div>
</section>
