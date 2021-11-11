<div class="c-profile-list__content js-ui-tab-content" data-tab-content-id="favorites">
    <div class="c-profile-list__container">
        @foreach(\App\Models\Favorite::where('user_id',auth()->user()->id)->get() as $favorite)
            <div data-product-id="2694359" class="c-profile-list__item-cart js-favorite-container">
                <div class="c-profile-list__item-card-thumb">
                    <a href="/product/dkp-{{$favorite->products->id ?? '' }}/{{$favorite->products->link ?? '' }}"
                       target="_blank"><img
                            src="/storage/{{$favorite->products->img ?? ''}}"
                            alt="{{$favorite->products->title ?? ''}}"></a></div>
                <div class="c-profile-list__item-card-content">
                    <div class="c-profile-list__item-card-title"><a
                            href="/product/dkp-{{$favorite->products->id ?? '' }}/{{$favorite->products->link ?? '' }}"
                            target="_blank">
                            {{$favorite->products->title ?? ''}}
                        </a>
                        <div class="c-ui-more">
                            <div class="o-btn o-btn--icon-gray-md o-btn--l-more js-ui-see-more"></div>
                            <div class="c-ui-more__options js-ui-more-options" style="display: none;">
                                <div class="c-ui-more__option c-ui-more__option--red js-remove-favorite-btn"
                                     wire:click="deleteFavorite({{$favorite->id}})"
                                     data-product-id="2694359">حذف کالا
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-profile-list__item-cart-price">
                        <div class="c-new-price">
                            <div class="c-new-price__old-value">

                                {{--                                    @if ($favorite->products->discount_price)--}}
                                <del>
                                    {{\App\Models\PersianNumber::translate($favorite->products->price ?? '') }}
                                </del>
                                {{--                                    @endif--}}

                                <span class="c-new-price__discount">۲۶٪</span></div>
                            <div class="c-new-price__value">
                                {{\App\Models\PersianNumber::translate($favorite->products->discount_price ?? '') }}


                                <span class="c-new-price__currency">تومان</span></div>
                        </div>
                    </div>

                    <a href="/product/dkp-{{$favorite->products->id ?? '' }}/{{$favorite->products->link ?? '' }}"
                       target="_blank"
                       class="c-profile-list__item-cart-link">مشاهده محصول</a></div>
            </div>
        @endforeach
    </div>
    <div class="c-pager">

    </div>
</div>
