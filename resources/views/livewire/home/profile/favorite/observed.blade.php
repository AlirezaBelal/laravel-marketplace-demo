<div class="c-profile-list__content js-ui-tab-content u-hidden" data-tab-content-id="observed">
    <div class="c-profile-list__container">
        @foreach(\App\Models\Observed::where('user_id',auth()->user()->id)->get() as $observed)
        <div data-product-id="814826" class="c-profile-list__item-cart js-notifier-container">
            <div class="c-profile-list__item-card-thumb"><a
                    href="/product/dkp-{{$observed->products->id ?? '' }}/{{$observed->products->link ?? '' }}"
                    target="_blank"><img
                        src="/storage/{{$observed->products->img ?? ''}}"
                        alt="{{$observed->products->title ?? '' }}"></a></div>
            <div class="c-profile-list__item-card-content">
                <div class="c-profile-list__item-card-title"><a
                        href="/product/dkp-{{$observed->products->id ?? '' }}/{{$observed->products->link ?? '' }}"
                        target="_blank">
                        {{$observed->products->title ?? '' }}
                    </a>
                    <div class="c-ui-more">
                        <div class="o-btn o-btn--icon-gray-lg o-btn--l-more js-ui-see-more"></div>
                        <div class="c-ui-more__options js-ui-more-options" style="display: none;">
                            <div class="c-ui-more__option js-remove-observation-btn" data-observed-product-id="43293700"
                                 wire:click="deleteObserved({{$observed->id}})"
                                 data-token="">
                                حذف اطلاع رسانی
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-profile-list__item-notification-type">
                    موجود شدن
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="c-pager"></div>
</div>
