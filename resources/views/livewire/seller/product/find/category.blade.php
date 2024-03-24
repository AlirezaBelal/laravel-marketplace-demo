<div id="findProductAjaxContent" class="mt-30">
    <div id="resultsSection" class="c-grid__row">
        <div class="c-grid__col c-grid__col--lg-3 c-grid__col--flex-initial">

            <div class="c-grid__row">
                <div class="c-grid__col">
                    <div class="c-card c-card--filter">
                        <div class="c-card__header c-card__header--dark-border c-card__header--filters c-card__header--with-controls">
                            <h2 class="c-card__title c-card__title--dark c-card__title--search">دسته بندی نتایج</h2>
                        </div>
                        <div class="c-card__body c-card__body--overflow-hidden">
                            <ul class="c-catalog__list--depth js-catalog-list c-catalog__list">
                                @foreach(\App\Models\Category::where('status',1)->get() as $category)
                                <li class="c-catalog__cat-item">
                                    <div>
                                        <label class="c-catalog__link">
                                            <input type="radio" class="c-ui-radio__origin js-filter-category" data-category_id="5966">
                                            <span>{{$category->name}}</span>
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="c-grid__col c-grid__col--block c-grid__col--lg-9">
            <div class="c-grid__row">
                <div class="c-grid__col">
                    <div class="c-card c-card--auto">


                        <div class="c-card__body uk-flex">
                            <span class="ml-20">کالای شما در میان نتایج وجود ندارد؟</span>

                            <a href="/seller/content/create/product/" class="search-link">ایجاد کالای جدید</a>
                         </div>
                    </div>
                </div>
            </div>
           @include('livewire.seller.product.find.product')
        </div>

        <div class="c-content-loader c-content-loader--fixed">
            <span class="c-content-loader__logo"></span>
            <span class="c-content-loader__spinner"></span>
        </div>
    </div>
</div>
