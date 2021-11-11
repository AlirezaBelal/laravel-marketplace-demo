<div class="c-navi-new-list__options-container">
    @foreach(\App\Models\Category::where('status',1)->get() as $category)
        <div class="c-navi-new-list__options-list js-mega-menu-category-options"
             id="categories-{{$category->id}}">
            <div class="c-navi-new-list__sublist-top-bar">
                <a href="{{$category->link}}"
                   class="c-navi-new-list__sublist-see-all-cats">
                    همه دسته‌بندی‌های
                    {{$category->title}}
                </a></div>
            <ul>

                @foreach(\App\Models\Menu::where('category_id',$category->id)->where('childCategory_id',null)
                    ->where('status',1)->get() as $menu)
                    <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--title"
                        data-event="megamenu_click" data-event-category="header_section"
                        data-event-label="category_en: mobile - category_fa: {{$menu->subCategory->title}} - level: 2">
                        <a
                            data-snt-event="dkMegaMenuClick"
                            data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;{{$menu->subCategory->title}}&quot;}"
                            href="{{$menu->subCategory->link}}"
                            class=" c-navi-new__big-display-title"><span>{{$menu->subCategory->title}}</span></a>
                        <a
                            data-snt-event="dkMegaMenuClick"
                            data-snt-params="{&quot;type&quot;:&quot;option-title&quot;,&quot;category_title&quot;:&quot;{{$menu->subCategory->title}}&quot;}"
                            href="{{$menu->subCategory->link}}"
                            class=" c-navi-new__medium-display-title"><span>{{$menu->subCategory->title}}</span></a>
                    </li>
                    @foreach(\App\Models\Menu::where('subCategory_id',$menu->subCategory_id)->
                        whereNotNull('childCategory_id')
                                ->where('status',1)->get() as $submenu)
                        <li class="c-navi-new-list__sublist-option c-navi-new-list__sublist-option--item"
                            data-event="megamenu_click" data-event-category="header_section"
                            data-event-label="category_en: cell phone pouch cover - category_fa:{{$submenu->childCategory->title}} - level: 3">
                            <a data-snt-event="dkMegaMenuClick"
                               data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;{{$submenu->childCategory->title}}&quot;}"
                               href="{{$submenu->childCategory->link}}" class=" c-navi-new__big-display-title">
                                {{$submenu->childCategory->title}}
                            </a>
                            <a data-snt-event="dkMegaMenuClick"
                               data-snt-params="{&quot;type&quot;:&quot;option-item&quot;,&quot;category_title&quot;:&quot;{{$submenu->childCategory->title}}&quot;}"
                               href="{{$submenu->childCategory->link}}"
                               class=" c-navi-new__medium-display-title">
                                {{$submenu->childCategory->title}}
                            </a></li>
                    @endforeach
                @endforeach


            </ul>
        </div>
    @endforeach

</div>
