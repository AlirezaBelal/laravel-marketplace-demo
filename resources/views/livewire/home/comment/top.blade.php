<nav class="js-breadcrumb ">
    <ul vocab="https://schema.org/" typeof="BreadcrumbList" class="c-breadcrumb">
        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage"
               href="/"><span
                    property="name">فروشگاه اینترنتی دیجی‌کالا</span></a>
            <meta property="position" content="1">
        </li>
        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage"
               href="/{{$product->category->link}}"><span
                    property="name">{{$category}}</span></a>
            <meta property="position" content="2">
        </li>
        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage"
               href="/{{$product->subcategory->link}}"><span
                    property="name">{{$subcategory}}</span></a>
            <meta property="position" content="3">
        </li>
        @if ($childcategory != null)
            <li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage"
                   href="/{{$product->childcategory->link}}"><span
                        property="name">{{$childcategory}}</span></a>
                <meta property="position" content="4">
            </li>
        @endif

        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage"
               href="/product/dkp-{{$product->id}}/{{$product->link}}"><span
                    property="name">
                                            {{$product->title}}
                                        </span></a>
            <meta property="position" content="5">
        </li>


        <li><span property="name">ارسال نظر</span></li>
    </ul>
</nav>
