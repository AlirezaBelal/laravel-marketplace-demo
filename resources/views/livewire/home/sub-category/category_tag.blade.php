<article
    class="c-category-desc c-expandable-text c-expandable-text--shadowed js-expandable-text-container">
    <div class="c-expandable-text__text js-expandable-text"><span>دسته‌بندی‌ها: </span>
        @foreach($category_tags as $category_tag)
            <a href="{{$category_tag->link}}">{{$category_tag->title}} </a>
            @if (! $loop->last)
                -
            @endif
        @endforeach
        <br><br>
        <span
            class="c-expandable-text__expand-btn c-expandable-text__expand-btn--shadowed js-expand-btn hidden"
            data-collapsed="نمایش بیشتر" data-expanded="بستن"></span></div>
</article>
