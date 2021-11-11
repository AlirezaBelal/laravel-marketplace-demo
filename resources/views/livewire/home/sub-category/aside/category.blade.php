<script>
    if (true)
        document.getElementById('js-list-aside-wrapper').classList.add('has-pager');
    else
        document.getElementById('js-list-aside-wrapper').classList.remove('has-pager');
</script>
<div class="c-box-free-shipping js-ga-free-shipping-badge--disabled">
    <div class="c-box-free-shipping__content"><h3>ارسال رایگان سفارش</h3>
        <p class="js-free-shipping-badge-text">اولین سفارش کاربران جدید</p></div>
    <img class="c-box-free-shipping__image"
         src="/img/0f0ce3bb.png"></div>
<div class="c-box">
    <div class="c-box__header">دسته‌بندی نتایج</div>
    <div class="c-filter c-filter--catalog js-box-content">
        <div class=" js-box-content-items">
            <div class="c-catalog show-more" id="collapsed">
                <ul class="c-catalog__list--depth js-catalog-list" id="he"
                    style="max-height: unset; height: 250px;">
                    <li class="c-catalog__cat-item "><span
                            class="c-catalog__cat-item c-catalog__cat-item--arrow-left"><a
                                class="c-catalog__link "
                                data-snt-event="dkSearchPageClick"
                                data-snt-params="{&quot;item&quot;:&quot;catalog-filter&quot;,&quot;item_option&quot;:&quot;کالای دیجیتال&quot;}"
                                href="{{$first_category->link}}">{{$first_category->title}}</a></span>
                        <div class=" show-more  ">
                            <ul class="c-catalog__list--depth ">
                                <li class="c-catalog__cat-item "><span
                                        class="c-catalog__cat-item c-catalog__cat-item--arrow-down"><a
                                            class="c-catalog__link  is-active"
                                            data-snt-event="dkSearchPageClick"
                                            data-snt-params="{&quot;item&quot;:&quot;catalog-filter&quot;,&quot;item_option&quot;:&quot;لوازم جانبی کالای دیجیتال&quot;}"
                                            href="{{$category->link}}">{{$category->title}}
                                        </a></span>
                                    <ul class="c-catalog__list--depth">
                                        @foreach($category_tags as $category_tag)
                                            <li class="c-catalog__cat-item"><a
                                                    class="c-catalog__link  "
                                                    data-snt-event="dkSearchPageClick"
                                                    data-snt-params="{&quot;item&quot;:&quot;catalog-filter&quot;,&quot;item_option&quot;:&quot;{{$category_tag->title}}&quot;}"
                                                    href="/{{$category_tag->link}}">{{$category_tag->title}}
                                                    </a></li>
                                        @endforeach

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div data-snt-event="dkSearchPageClick"
                     data-snt-params="{&quot;item&quot;:&quot;catalog-filter&quot;,&quot;item_option&quot;:&quot;show-all&quot;}"
                     class="c-catalog__show-more js-catalog-show-more" onclick="open_collapsed()">
                    مشاهده همه دسته‌بندی‌ها
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function open_collapsed() {
        if(document.getElementById("collapsed").classList.contains('is-full')){
            document.getElementById("collapsed").classList.remove("is-full");
            document.getElementById("he").style="height: 250px";
        }else{
            document.getElementById("collapsed").classList.add("is-full");
            document.getElementById("he").style="max-height: unset";
        }
    }
</script>
