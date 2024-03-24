<div class="c-grid__row">
    <div class="c-grid__col">
        <div class="c-card c-card--auto js-table-container">
            <div class="c-card__header c-card__header--dark-border c-card__header--content">
                <h2 class="c-card__title c-card__title--inline c-card__title--dark">نتایج جستجو</h2>
                <div class="c-ui-paginator">
                    <div class="c-ui-paginator__total" data-rows="۷۳۵۸۴۷۹">
                        تعداد نتایج: <span>
                            {{\App\Models\PersianNumber::translate(\App\Models\Product::count())}}
                            مورد</span>
                    </div>


                </div>
            </div>
            <div class="c-card__body">
                <div class="search-results">
                    <ul class="search-results__list js-products-list js-search-table" data-sort-column=""
                        data-sort-order="asc" data-search-url="/ajax/product/new/search/">
                        @foreach($products as $product)
                            <li class="search-results__item js-product-row">
                                <div class="search-results__item-container">
                                    <div class="search-results__primary-details">
                                        <div class="search-results__product-summary">
                                            <div class="search-results__image-container">
                                                <img
                                                    src="/storage/{{$product->img}}"
                                                    alt="" class="search-results__image js-product-image">
                                            </div>
                                            <div class="search-results__info-container">
                                                <div class="">
                                                    <a href="/product/dkp-{{$product->id}}/{{$product->link}}"
                                                       target="_blank"
                                                       class="search-results__title js-product-title">
                                                        {{$product->title}}
                                                    </a>
                                                </div>
                                                <div class="search-results__secondary-title js-product-sub-title"></div>
                                            </div>
                                        </div>
                                        <div class="search-results__action-btn">
                                            @if(\App\Models\ProductSeller::where('product_id',$product->id)->where('vendor_id',auth()->user()->id)->first())
                                                <div class="search-results__success-label js-success-label-btn  ">
                                                    فروشنده هستید
                                                </div>
                                            @else
                                                <button type="button" wire:click="addToSale({{$product->id}})"
                                                        class="c-ui-btn c-ui-btn--add-similar js-add-similar"
                                                        data-product-id="2635428">شما هم بفروشید
                                                </button>

@endif
                                            <div class="search-results__danger-label js-disabled-label-btn hidden">
                                                غیرفعال توسط ادمین
                                            </div>

                                        </div>
                                    </div>
                                    <div class="search-results__secondary-details">
                                        <ul class="search-results__secondary-list ">
                                            <li class="search-results__secondary-item">
                                                <span class="search-results__secondary-property">گروه:</span>
                                                <span
                                                    class="search-results__secondary-value js-product-brand">{{$product->category->title}}</span>
                                            </li>
                                            <li class="search-results__secondary-item">
                                                <span class="search-results__secondary-property">وضعیت جاری:</span>
                                                <span
                                                    class="search-results__secondary-value js-product-status">قابل فروش</span>
                                            </li>
                                            <li class="search-results__secondary-item">
                                                <span class="search-results__secondary-property">تعداد تنوع فعال:</span>
                                                <span class="search-results__secondary-value js-product-variants">
                                                {{\App\Models\PersianNumber::translate(\App\Models\ProductSeller::where('product_id',$product->id)->where('status',1)->count())}}
                                            </span>
                                            </li>
                                            <li class="search-results__secondary-item">
                                            <span
                                                class="search-results__secondary-property">کمترین قیمت روی سایت:</span>
                                                @php

                                                    @endphp
                                                @if(\App\Models\ProductSeller::where('product_id',$product->id)->
where('status',1)->first())
                                                <span class="search-results__secondary-value js-product-price"><span
                                                        dir="ltr"
                                                        data-debug="1900000">
{{\App\Models\PersianNumber::translate(number_format(\App\Models\ProductSeller::where('product_id',$product->id)->
where('status',1)->orderBy('price','ASC')->first()->price))}}
                                                </span> <span>تومان</span>

                                                </span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
