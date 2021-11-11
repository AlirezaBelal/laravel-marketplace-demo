@include('livewire.home.profile.favorite.css')
<div class="c-profile-list__content js-ui-tab-content u-hidden" data-tab-content-id="public-lists">
    <div class="c-profile-list__public-list-row-action">
        <div>اینجا می‌توانید مجموعه‌ای از محصولات را با هر کسی به اشتراک بگذارید.</div>
        <button onclick="modallist()" class="o-btn o-btn--contained-red-sm js-add-public-list">لیست جدید</button>
    </div>

    <div class="c-profile-list__container u-justify-between">
        @foreach(\App\Models\FavList::where('user_id',auth()->user()->id)->get() as $favlist)
            @if (DB::table('favlist_product')->where('favlist_id',$favlist->id)->
                                first())
                <div class="c-profile-list__public-list-item">

                    <div class="c-profile-list__public-list-item-images"><a

                            href="/product/dkp-{{$favlist->products->id ?? '' }}/{{$favlist->products->link ?? '' }}"><img
                                src=/storage/{{$favlist->products->img ?? ''}}"
                                alt=""></a>
                    </div>

                    <div><h3>{{$favlist->title ?? '' }}</h3>
                        <p>{{$favlist->description ?? '' }}</p></div>
                    <div class="c-profile-list__public-list-item-actions">
                        <button data-url="https://www.digikala.com/wishlist/{{$favlist->link ?? '' }}/" data-facebook=""
                                id="{{$favlist->link}}" onclick="share(this.id)"
                                data-whatsapp="https://wa.me?text=https://www.digikala.com/wishlist/{{$favlist->link ?? '' }}/"
                                data-twitter="https://twitter.com/intent/tweet?url=https://www.digikala.com/wishlist/{{$favlist->link ?? '' }}/"
                                class="js-share-public-list">به اشتراک گذاری
                        </button>
                        <a href="/profile/wishlist/{{$favlist->link}}/details/">مشاهده جزئیات</a></div>
                </div>

            @else
                <div class="c-profile-list__public-list-item">
                    <div class="c-profile-list__public-list-item-images">
                        <div
                            style="margin-left: 7px; background: rgba(70, 150, 227, 0.1); width: 42px; height: 42px; border-radius: 8px;"></div>
                        <div
                            style="margin-left: 7px; background: rgba(70, 150, 227, 0.1); width: 42px; height: 42px; border-radius: 8px;"></div>
                        <div
                            style="margin-left: 7px; background: rgba(70, 150, 227, 0.1); width: 42px; height: 42px; border-radius: 8px;"></div>
                        <div
                            style="margin-left: 7px; background: rgba(70, 150, 227, 0.1); width: 42px; height: 42px; border-radius: 8px;"></div>
                        <div
                            style="margin-left: 7px; background: rgba(70, 150, 227, 0.1); width: 42px; height: 42px; border-radius: 8px;"></div>
                        <div
                            style="margin-left: 7px; background: rgba(70, 150, 227, 0.1); width: 42px; height: 42px; border-radius: 8px;"></div>
                    </div>
                    <div><h3>{{$favlist->title ?? '' }}</h3>
                        <p>{{$favlist->description ?? '' }}</p></div>
                    <div class="c-profile-list__public-list-item-actions">
                        <button data-url="https://www.digikala.com/wishlist/{{$favlist->link ?? '' }}/" data-facebook=""
                                id="{{$favlist->link}}" onclick="share(this.id)"
                                data-whatsapp="https://wa.me?text=https://www.digikala.com/wishlist/{{$favlist->link ?? '' }}/"
                                data-twitter="https://twitter.com/intent/tweet?url=https://www.digikala.com/wishlist/{{$favlist->link ?? '' }}/"
                                class="js-share-public-list">به اشتراک گذاری
                        </button>
                        <a href="/profile/wishlist/{{$favlist->link}}/details/">مشاهده جزئیات</a></div>
                </div>
            @endif

        @endforeach

    </div>

    <div class="c-pager"></div>
</div>


