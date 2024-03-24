<div class="o-page__aside has-pager" id="js-list-aside-wrapper">
    <div class="o-page__aside--listing js-list-aside-container js-sticky" style="">
        <div class="c-listing-sidebar js-list-aside js-sticky-inner" id="js-list-aside"
             style="position: relative;">

            @include('livewire.home.sub-category.aside.category')
            <div class="c-box">
                <div class="c-box__header">جستجو در نتایج:</div>
                <div class="c-box__content">
                    <div class="c-ui-input c-ui-input--quick-search">
                        <input type="text"
                               class="c-ui-input__field c-ui-input__field--cleanable js-cleanable-input"
                               value=""
                               wire:model.debounce.1000="search"
                               name="searchInput"
                               data-event="search_in_category"
                               data-event-category="search_page"
                               placeholder="نام محصول یا برند مورد نظر را بنویسید…"><span
                            class="c-ui-input-cleaner js-input-cleaner"></span></div>
                </div>
            </div>
            <div class="c-box c-box--brands-filter js-ab-sidebar-filter">
                <div class="">
                    <div class="c-box__header c-box__header--toggleable js-box-toggle ">برند

                    </div>
                    <div class="c-filter c-filter--params js-box-content">
                        <div class="c-ui-input c-ui-input--quick-search">
                            <input type="text"
                                   class="c-ui-input__field c-ui-input__field--cleanable js-filter-input js-cleanable-input"
                                   placeholder="جستجوی نام برند…"><span
                                class="c-ui-input-cleaner js-input-cleaner"></span></div>
                        <div
                            class="c-message c-message-light c-message-light--info js-message-error u-hidden">
                            <p>برند یا سازنده‌ای با این نام پیدا نشد!</p></div>
                        <div class="c-box__divider c-box__divider--full">
                            <div></div>
                        </div>
                        <div class="c-box__scroll-container">
                            <div class="c-box__scroll js-box-content-items">
                                <ul>
                                    @foreach($brands as $brand)
                                        <li><label class="c-filter__label js-box-content-item"
                                                   for="brand-param-{{$brand->id}}" data-fa="  {{$brand->name}}"
                                                   data-en="  {{$brand->link}}"
                                                   data-search="  {{$brand->name}}   {{$brand->link}}">
                                                {{$brand->name}}
                                            </label>
                                            <label class="c-ui-checkbox">
                                                <input wire:model="selected.brands"

                                                       type="checkbox" value="{{$brand->id}}" name="brand[]"
                                                       data-search-uid="brand"
                                                       id="brand{{$brand->id}}"><span
                                                    class="c-ui-checkbox__check"></span></label>
                                        </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="c-box js-ab-sidebar-filter">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher">
                        <input type="checkbox" value="1" wire:model="selected.status"
                               name="has_selling_stock"
                               id="stock_status-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>فقط
                    کالاهای موجود
                </div>
            </div>

            <div class="c-box js-ab-sidebar-filter" id="digikala_fake_section">
                <div class="c-filter c-filter--switcher js-box-content-items"><label
                        class="c-ui-statusswitcher">
                        <input type="checkbox" value="1" wire:model="selected.original"
                                                           name="only_original"
                                                           id="stock_status-param-1"><span
                            class="c-ui-statusswitcher__slider"><span
                                class="c-ui-statusswitcher__slider__toggle"></span></span></label>فقط
                    کالاهای اصل
                </div>
            </div>
            <form  wire:submit.prevent="priceform">
            <div class="c-box">
                <div class="c-box__header c-box__header--toggleable js-box-toggle is-hidden">
                    محدوده قیمت مورد نظر
                </div>

                    <div wire:ignore class="c-filter c-filter--range js-box-content" style="display: none">

                        <ul class="c-filter__range">
                            <li data-label="از" data-currency=" تومان">
                                <input type="text" wire:model.defer="selected.min_price"
                                       data-value="0"
                                       value="0"
                                       name="price[min]"
                                       data-range="0"
                                       class="js-slider-range-from  "
                                >
                            </li>
                            <li data-label="تا" data-currency="تومان">
                                <input type="text"
                                       wire:model.defer="selected.max_price"
                                       data-value="117900000"
                                       value="117900000"
                                       name="price[max]"
                                       data-range="117900000"
                                       class="js-slider-range-to  "
                                >
                            </li>
                        </ul>
                        <div class="c-filter__action">

                            <button type="submit"
                                class="btn-primary btn-primary--filter js-price-filter  ">
                                اعمال محدوده قیمت
                            </button>
                        </div>
                    </div>


            </div>
            </form>
        </div>

    </div>
</div>
