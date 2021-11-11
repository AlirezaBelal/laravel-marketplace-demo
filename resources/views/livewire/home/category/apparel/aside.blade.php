<div class="o-page__aside" id="js-list-aside-wrapper">
    <div class="o-page__aside--listing js-list-aside-container js-sticky">
        <div class="c-listing-sidebar js-list-aside js-sticky-inner">
            <div class="c-box">

                <div class="c-box__header">دسته بندی کالاها</div>
                <div class="c-filter c-filter--catalog">
                    <ul class="c-catalog__plain-list">
                        @foreach(\App\Models\SubCategory::where('parent',$category->id)->where('status',1)->get() as $subcategory)
                            <li class="c-catalog__plain-list--formatting">
                                <a
                                    class="c-catalog__plain-list--category-title"
                                    data-snt-event="dkSearchPageClick"
                                    data-snt-params='{"item":"catalog-filter","item_option":"{{$subcategory->title}}"}'
                                    href="{{$subcategory->link}}">{{$subcategory->title}}</a>
                                <ul class="c-catalog__plain-list-subcategory  js-more-subcategory">
                                    @foreach(\App\Models\ChildCategory::where('parent',$subcategory->id)
                                    ->where('status',1)->get() as $childcategory)
                                        <li class="c-catalog__plain-list-item"><a
                                                class="c-catalog__plain-list-link"
                                                data-snt-event="dkSearchPageClick"
                                                data-snt-params='{"item":"catalog-filter","item_option":"{{$childcategory->title}}"}'
                                                href="{{$childcategory->link}}">{{$childcategory->title}}
                                            </a></li>
                                    @endforeach
                                </ul>
                                <div class="c-catalog__plain-list-more js-show-more">موارد بیشتر
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
