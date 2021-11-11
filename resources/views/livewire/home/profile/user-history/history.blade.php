<section class="o-page__content">
    <div class="o-box c-profile-user-history">
        <div class="o-box__header"><span class="o-box__title">بازدید‌های اخیر</span></div>
        <ul class="c-profile-user-history__listing">
            @foreach(\App\Models\UserHistory::where('user_id',auth()->user()->id)->get() as $userHistory)
            <li class="c-profile-user-history__list-item js-history-container ">
                <div class="c-profile-user-history__list-item-thumb"><a
                        href="/product/dkp-{{$userHistory->product_id}}/{{$userHistory->product->link}}"
                        class="c-profile-user-history__list-item-img" target="_blank"><img
                            data-src="/storage/{{$userHistory->product->img}}"
                            alt="{{$userHistory->product->title}}"
                            src="/storage/{{$userHistory->product->img}}"
                            loading="lazy"></a></div>
                <div class="c-profile-user-history__list-item-content">
                    <div class="c-profile-user-history__list-item-content__container"><a
                            href="/product/dkp-{{$userHistory->product_id}}/{{$userHistory->product->link}}"
                            target="_blank"><h4>{{$userHistory->product->title}}</h4></a>
                        <div class="c-ui-more">
                            <div class="o-btn o-btn--icon-gray-md o-btn--l-more js-ui-see-more"></div>
                            <div class="c-ui-more__options js-ui-more-options" style="display: none;">
                                <div class="c-ui-more__option c-ui-more__option--red js-remove-item-profile-history"
                                     wire:click="deleteUserHistory({{$userHistory->id}})"
                                     data-product-id="1956748" >حذف
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-user-history__list-item-content__container">
                        <div class="c-new-price">
                            <div class="c-new-price__old-value">
                                <del>۲۴,۰۰۰</del>
                                <span class="c-new-price__discount">۲۵٪</span></div>
                            <div class="c-new-price__value">
                                ۱۸,۰۰۰
                                <span class="c-new-price__toman-icon"></span></div>
                        </div>
                        <div class="c-profile-user-history__list-item-button-group"><a
                                class="o-btn o-btn--outlined-blue-md js-history-same-product-modal"
                                data-product-id="1956748">
                                کالاهای مشابه
                            </a></div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="c-pager"></div>
    </div>
</section>
