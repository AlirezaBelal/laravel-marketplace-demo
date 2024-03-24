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
        <li><a  wire:click="compareAdd({{$product->id}})"
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
