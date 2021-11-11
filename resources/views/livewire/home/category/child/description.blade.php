<article class="c-category-desc">
    <h1 class="c-category-desc__title">{{$category->title}}
        </h1>
    <div class="c-expandable-text c-expandable-text--shadowed js-expandable-text-container collapsed"
          onclick="open_collapsed()" id="collapsed">
        <div
            class="c-category-desc__text c-expandable-text__text js-expandable-text">
            <p><strong>{{$category->description}}
                    &nbsp;</strong></p>
            <p>{!! $category->body !!}</p>
        </div>
        <span
            class="c-expandable-text__expand-btn c-expandable-text__expand-btn--shadowed js-expand-btn"
            data-collapsed="نمایش بیشتر" data-expanded="بستن"></span></div>
</article>
<script>
    function open_collapsed() {
        if(document.getElementById("collapsed").classList.contains('collapsed')){
            document.getElementById("collapsed").classList.remove("collapsed");
        }else{
            document.getElementById("collapsed").classList.add("collapsed");
        }
    }
</script>
