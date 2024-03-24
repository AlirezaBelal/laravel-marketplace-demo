<div class="c-content-page c-content-page--plain c-grid__row">
    <div class="c-grid__col">
        <div class="c-content-page__header">
            <span class="c-content-page__header-action">جستجو یا درج محصول</span>
            <span class="c-content-page__header-desc">محصولی که قصد فروش آن را دارید، جستجو کنید. در غیر این‌صورت از "ایجاد کالای جدید" اقدام به درج کالای خود کنید</span>
        </div>
    </div>
</div>
<div class="c-grid__row">
    <div class="c-grid__col">

        <form class="c-card search-form" id="findProductForm" autocomplete="off">
            <input type="hidden" name="find_product[category_id]" value="" id="searchCategoryId">
            <input type="hidden" name="find_product[brand_id]" value="" id="searchBrandId">
            <input type="hidden" name="find_product[fake]" value="" id="searchFake">
            <input type="hidden" name="find_product[status]" value="" id="searchStatus">
            <input type="hidden" name="find_product[keyword]" value="" id="searchKeyword">
            <input type="hidden" name="find_product[page]" value="1" id="searchPage">
            <input type="hidden" name="find_product[itemsPerPage]" value="10" id="searchItemsPerPage">

            <div class="c-card__body c-card__body--content">
                <label for="" class="search-form__action-label">جستجوی کالا در میان کالاهای دیجی‌کالا بر
                    اساس:</label>
                <div class="search-form__autocomplete-container">
                    <div class="search-form__autocomplete js-autosuggest-box">

                        <input id="searchKeywordInput"
                               wire:model.debounce.1000="search"
                               class="uk-input js-prevent-submit" type="text" placeholder="نام محصول یا DKP"><ul class="c-autosuggest__list-container" style="display: none;"></ul></div>

                    <div class="c-content-accordion__step-controls c-content-accordion__step-controls--category">
                        <button id="searchButton" class="search-form__btn search-form__btn--search" type="button" disabled="">
                            جستجو
                        </button>
                        <button id="searchReset" type="button" class="c-content-categories__search-reset " disabled=""></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
