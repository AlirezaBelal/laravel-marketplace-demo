<div class="o-box c-filter-shortcut">
    <div class="c-filter-shortcut__list-container">
        <div class="c-filter-shortcut__list-title">دسته‌بندی‌ها</div>
        <div class="c-filter-shortcut__list c-filter-shortcut__list--category">
            @foreach($categories as $category)
            <a href="/search/category-mobile-accessories/"
                class="c-filter-shortcut__category-item js-shortcut-category ">
                <div class="c-filter-shortcut__category-image">
                    @foreach(\App\Models\ChildCategory::where('id',$category->childCategory_id)->get() as $childCategory)
                        <img src="/storage/{{$childCategory->img}}">
                    @endforeach


                </div>
             @foreach(\App\Models\ChildCategory::where('id',$category->childCategory_id)->get() as $childCategory)
                <div class="c-filter-shortcut__category-title">{{$childCategory->title}}</div>
                @endforeach
            </a>
            @endforeach
        </div>
    </div>
</div>
