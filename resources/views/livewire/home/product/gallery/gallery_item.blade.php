<ul class="c-gallery__items js-album-usage-ga">
    @foreach(\App\Models\Gallery::where('product_id',$product->id)->where('status',1)->get() as $gallery)
{{--    @if (\App\Models\Gallery::where('product_id',$product->id)->where('status',1)->count() >2)--}}
{{--        <li class="is-diviter">--}}
{{--            <div class="thumb-wrapper thumb-wrapper--blur js-gallery-video" data-snt-event="dkProductPageClick"--}}
{{--                 data-snt-params="{&quot;item&quot;:&quot;gallery-option&quot;,&quot;item_option&quot;:&quot;video&quot;}">--}}
{{--                <img--}}
{{--                    data-src="/storage/{{$gallery->img}}"--}}
{{--title="{{$product->title}}"   alt="{{$product->title}}"--}}
{{--                     src="/storage/{{$gallery->img}}"--}}
{{--                    loading="lazy">--}}
{{--                <div class="c-gallery__count-circle">--}}
{{--                    <div class="btn-option btn-option--play-video"></div>--}}
{{--                    <span class="c-tooltip c-tooltip--left c-tooltip--short"></span></div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    @endif--}}

    <li class="js-product-thumb-img" data-num-of-pics="7" data-slide-index="{{$gallery->position}}">
        <div class="thumb-wrapper">
            <img data-snt-event="dkProductPageClick"
                data-src="/storage/{{$gallery->img}}"
                title="{{$product->title}}"   alt="{{$product->title}}"
                src="/storage/{{$gallery->img}}"
                loading="lazy">
            <div class="c-gallery__images-count"><span class="c-gallery__count-circle"><div
                        class="c-gallery__three-bullets"></div></span></div>
        </div>
    </li>
    @endforeach

</ul>
