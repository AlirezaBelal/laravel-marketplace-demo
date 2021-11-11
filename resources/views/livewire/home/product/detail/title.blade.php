<div class="c-product__title-container"><a
        href="/brand/{{$product->brand->link}}"><img
            class="c-product__title-container--brand-img"
            src="/storage/{{$product->brand->img}}"
            alt="brand logo"></a>
    <div>
        <div class="u-flex u-items-center">

                <div class="c-product__title-container--brand"><a
                        class="c-product__title-container--brand-link"
                        href="/brand/{{$product->brand->link}}">{{$product->brand->name}}</a><span> / </span><a
                        class="c-product__title-container--brand-link"
                        href="/brand/{{$product->brand->link}}">
                        {{$product->subcategory->title}}
                        {{$product->brand->name}}
                    </a>
                </div>


        </div>
        <h1 class="c-product__title">
            {{$product->title}}
        </h1></div>
</div>
