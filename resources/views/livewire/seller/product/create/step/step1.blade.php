<section class="c-content-accordion__row js-content-section uk-open"
         id="stepCategoryAccordion">


    <h2 class="c-content-accordion__title ">
        <div class="c-content-accordion__title-text">گام اول: انتخاب گروه کالا
            <span class="c-content-accordion__guid-line js-guideline-icon "
                  data-guideline-modal="category_selection"></span>
        </div>
    </h2>
    <div class="c-content-accordion__content" id="stepCategoryContainer"
         aria-hidden="false">
        <div class="c-card__body c-card__body--content">
            <div id="ajaxErrorCategory" class="c-content-error hidden"></div>
            <h3 class="search-form__search-heading">برای درج کالای جدید ابتدا گروه کالای
                خود را انتخاب کنید:</h3>
            <label for="" class="search-form__action-label">جستجوی گروه کالای
                شما:</label>
            <div class="search-form__autocomplete-container">
                <div class="search-form__autocomplete js-autosuggest-box">
                    <input id="searchKeyword"
                           wire:model.debounce.1000="search"
                           class="c-content-input__origin js-prevent-submit" type="text"
                           placeholder="نام کالا،  دسته بندی و یا کد دسته بندی مورد نظر خود را بنویسید، مثال: گوشی موبایل">
                </div>
            </div>
        </div>
        <div class="c-card__body c-card__body--content">
            <div id="categoriesContainer" class="c-content-categories">
                <div class="c-content-categories__container"
                     id="categoriesContainerContent">
                    <div class="c-content-categories__wrapper js-category-column">
                        <ul class="c-content-categories__list">
                            @php
                                $cat = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();
                            @endphp
                            @foreach($categories as $category)
                                <li class="c-content-categories__item has-children
 @if($cat->cat_id == $category->id) is-active @endif
                                    ">
                                    <label
                                        class="c-content-categories__link js-category-link">
                                        <input type="radio"
                                               wire:click="addCategoryToSale({{$category->id}})"
                                               class="uk-hidden js-category-data"
                                               data-id="10170" value="{{$category->title}}"
                                               data-theme="no_color_no_size">
                                        {{$category->title}}
                                    </label>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="c-content-categories__wrapper js-category-column">
                        <ul class="c-content-categories__list">
                            @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first())
                                @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat_id != null)
                                    @php
                                        $subCategory = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat_id;
                                        $subCategory2 = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();
                                    @endphp

                                    @foreach(\App\Models\SubCategory::where('parent',$subCategory)->get() as $sub)
                                        <li class="c-content-categories__item has-children  @if($subCategory2->cat2_id == $sub->id) is-active @endif"

                                        >
                                            <label
                                                class="c-content-categories__link js-category-link">
                                                <input type="radio"
                                                       wire:click="addSubCategoryToSale({{$sub->id}})"
                                                       class="uk-hidden"
                                                       data-id="{{$sub->id}}" value="{{$sub->id}}"
                                                       data-theme="no_color_no_size">
                                                {{$sub->title}}
                                            </label>
                                        </li>
                                    @endforeach
                                @endif
                            @endif
                        </ul>
                    </div>
                    <div class="c-content-categories__wrapper js-category-column">
                        <ul class="c-content-categories__list">
                            @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first())
                                @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat_id != null)
                                    @php
                                        $childCategory = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat2_id;
                                        $childCategory2 = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();
                                    @endphp

                                    @foreach(\App\Models\ChildCategory::where('parent',$childCategory)->get() as $child)
                                        <li class="c-content-categories__item has-children
@if($childCategory2->cat3_id == $child->id) is-active @endif">
                                            <label
                                                class="c-content-categories__link js-category-link">
                                                <input type="radio"
                                                       wire:click="addChildCategoryToSale({{$child->id}})"
                                                       class="uk-hidden"
                                                       data-id="{{$child->id}}" value="{{$child->id}}"
                                                       data-theme="">
                                                {{$child->title}}
                                            </label>
                                        </li>
                                    @endforeach
                                @endif
                            @endif

                        </ul>
                    </div>
                    <div class="c-content-categories__wrapper js-category-column">
                        <ul class="c-content-categories__list">
                            @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first())
                                @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat_id != null)
                                    @php
                                        $Category4 = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat3_id;
                                        $Category42 = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();
                                    @endphp

                                    @foreach(\App\Models\ChildCategory::where('parent',$Category4)->get() as $c4)

                                        <li class="c-content-categories__item has-children
@if($Category42->cat4_id == $c4->id) is-active @endif">
                                            <label
                                                class="c-content-categories__link ">
                                                <input type="radio"
                                                       wire:click="add4CategoryToSale({{$c4->id}})"
                                                       class="uk-hidden "
                                                       data-id="{{$c4->id}}" value="{{$c4->id}}"
                                                       data-theme="">
                                                {{$c4->title}}
                                            </label>
                                        </li>
                                    @endforeach
                                @endif
                            @endif

                        </ul>
                    </div>
{{--                    <div class="c-content-categories__wrapper js-category-column">--}}
{{--                        <ul class="c-content-categories__list">--}}
{{--                            @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first())--}}
{{--                                @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat_id != null)--}}
{{--                                    @php--}}
{{--                                        $Category4 = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first()->cat4_id;--}}
{{--                                        $Category42 = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();--}}
{{--                                    @endphp--}}

{{--                                    @foreach(\App\Models\ChildCategory::where('parent',$Category4)->get() as $c5)--}}

{{--                                        <li class="c-content-categories__item has-children--}}
{{--@if($Category42->cat5_id == $c5->id) is-active @endif">--}}
{{--                                            <label--}}
{{--                                                class="c-content-categories__link ">--}}
{{--                                                <input type="radio"--}}
{{--                                                       wire:click="add5CategoryToSale({{$c5->id}})"--}}
{{--                                                       class="uk-hidden "--}}
{{--                                                       data-id="{{$c5->id}}" value="{{$c5->id}}"--}}
{{--                                                       data-theme="">--}}
{{--                                                {{$c5->title}}--}}
{{--                                            </label>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            @endif--}}

{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <div class="c-content-loader">
                    <div class="c-content-loader__logo"></div>
                    <div class="c-content-loader__spinner"></div>
                </div>
            </div>

            <div class="c-content-categories__summary">
                <div class="c-content-categories__summary-breadcrumbs">
                    <span class="">گروه کالایی انتخابی شما:</span>
                    @php
                        $group = \App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first();
                    @endphp
                    @if(\App\Models\ProductSellTest::where('user_id',auth()->user()->id)->first())
                    <ul class="js-selected-category c-content-categories__selected-list">
                        <li class="c-content-categories__selected-category">
                            {{$group->category->title}}
                        </li>
                        <li class="c-content-categories__selected-category">
                            {{$group->subcategory->title}}
                        </li>
                        <li class="c-content-categories__selected-category">
                            {{$group->childcategory->title}}

                        </li>
                        <li class="c-content-categories__selected-category">

{{--                            {{$group->categorylevel4->title}}--}}
                        </li>
                    </ul>
                        @endif
                </div>


            </div>


        </div>
        <div class="c-content-loader">
            <div class="c-content-loader__logo"></div>
            <div class="c-content-loader__spinner"></div>
        </div>
    </div>
    <div class="c-content-progress active">
        <span class="c-content-progress__step"></span>
    </div>
    <div id="confirmFakeProductPolicyModal" class="marketplace-redesign uk-modal"
         uk-modal="">
        <style>
            .fake-product-modal-container {
                padding: 0px !important;
                width: 1000px;
            }
        </style>
        <div
            class="uk-modal-dialog uk-modal-dialog--confirm fake-product-modal-container">
            <div class="uk-flex">
                <button class="uk-modal-close uk-modal-close--search uk-close uk-icon"
                        type="button" uk-close="">
                    <svg width="14" height="14" viewBox="0 0 14 14"
                         xmlns="http://www.w3.org/2000/svg" ratio="1">
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1"
                              x2="13" y2="13"></line>
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="13"
                              y1="1" x2="1" y2="13"></line>
                    </svg>
                </button>
                <div class="uk-flex-1 uk-modal-body uk-flex-between">
                    <div class="modal-product modal-product--confirm">
                        <h2 class="modal-message--title o-font-size-20 o-text-color-n-700 o-spacing-m-b-4">
                            نکات لازم هنگام درج کالا:</h2>
                        <p class="modal-message--center ">
                            همان طور که اطلاع دارید فروش کالای غیر اصل فقط با نشان «غیر
                            اصل» ممکن است.
                            حتما از اصالت کالای خود مطمئن شوید و در صورت غیر اصل بودن،
                            در هنگام درج کالا از نشان «غیر اصل» استفاده کنید.
                        </p>
                    </div>

                    <div class="modal-footer modal-footer--center">
                        <div class="uk-flex uk-flex-column">
                            <button
                                class="modal-footer__btn modal-footer__btn--confirm modal-footer__btn--wide uk-flex-1 o-spacing-m-b-4 o-spacing-p-2 js-modal-uploads-confirm js-accept"
                                type="button">
                                متوجه شدم
                            </button>
                            <a target="_blank"
                               href="https://selleracademy.digikala.com/%d9%81%d8%b1%d9%88%d8%b4-%da%a9%d8%a7%d9%84%d8%a7%db%8c-%d8%ba%db%8c%d8%b1%d8%a7%d8%b5%d9%84-%d8%af%d8%b1-%d8%af%db%8c%d8%ac%db%8c%e2%80%8c%da%a9%d8%a7%d9%84%d8%a7/?utm_source=seller-pop-up&amp;utm_medium=pop-up&amp;utm_campaign=fake-products"
                               class="modal-footer__btn  modal-footer__btn--info modal-footer__btn--wide uk-flex-1 o-spacing-p-2"
                               type="button">
                                برای اطلاعات بیشتر اینجا کلیک کنید</a>
                        </div>
                    </div>
                </div>
                <div class="uk-flex-1  uk-modal-body o-color-seller-background">

                    <div class="modal-product modal-product--confirm">
                        <img alt="هشدار"
                             src="https://seller.digikala.com/static/files/89f1d173.png">

                        <h2 class="modal-message--title o-font-size-20 o-text-color-n-700">
                            فروش کالای غیر اصل:</h2>
                        <p class="modal-message--center">
                            همان طور که اطلاع دارید فروش کالای غیر اصل فقط با نشان «غیر
                            اصل» ممکن است.
                            در صورت فروش کالای غیر اصل بدون داشتن نشان «غیر اصل»،
                            فروشنده موظف به پرداخت جریمه ای معادل 10 برابر کل فروش آن
                            کالای غیر اصل است.
                        </p>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <div id="confirmCategoryChangeModal" class="marketplace-redesign uk-modal"
         uk-modal="">
        <div class="uk-modal-dialog uk-modal-dialog--confirm uk-modal-body">
            <button class="uk-modal-close uk-modal-close--search uk-close uk-icon"
                    type="button" uk-close="">
                <svg width="14" height="14" viewBox="0 0 14 14"
                     xmlns="http://www.w3.org/2000/svg" ratio="1">
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1"
                          x2="13" y2="13"></line>
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1"
                          x2="1" y2="13"></line>
                </svg>
            </button>

            <div class="modal-product modal-product--confirm">
                <h2 class="modal-message--title">فروشنده گرامی،</h2>
                <p class="modal-message--center">در صورت تغییر گروه کالایی؛ مقداری از
                    اطلاعاتی که در مرحله‌های بعد وارد کرده‌اید، حذف خواهند شد. از انجام
                    این تغییر اطمینان دارید ؟</p>
                <p class="modal-message--center hidden"
                   id="differentCategoryThemeMessageContainer">شما گروه کالایی با تم
                    متفاوت با گروه کالایی قبلی انتخاب کرده‌اید، توجه داشته باشید تمام
                    تنوع‌های این محصول غیرفعال خواهند شد
                </p>
            </div>

            <div class="modal-footer modal-footer--center">
                <div class="uk-flex">
                    <button
                        class="modal-footer__btn modal-footer__btn--confirm modal-footer__btn--wide js-modal-uploads-confirm js-accept"
                        type="button">
                        بله،‌ مطمئن هستم
                    </button>
                    <button
                        class="modal-footer__btn modal-footer__btn--wide uk-modal-close js-decline"
                        type="button">انصراف
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
