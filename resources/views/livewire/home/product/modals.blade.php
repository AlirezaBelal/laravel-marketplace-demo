<div class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div class="remodal c-remodal-gallery remodal-is-initialized remodal-is-closed" data-remodal-id="gallery"
         role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" tabindex="-1">
        <div class="c-remodal-gallery__main js-level-one-gallery">
            <div class="c-remodal-gallery__top-bar">
                <div class="c-remodal-gallery__tabs js-top-bar-tabs">
                    <div class="c-remodal-gallery__tab c-remodal-gallery__tab--selected js-gallery-tab" data-id="1">
                        تصاویر رسمی
                    </div>
                </div>
                <button data-remodal-action="close" class="c-remodal-gallery__close" aria-label="Close"></button>
            </div>
            <div class="c-remodal-gallery__content is-active js-gallery-tab-content" id="gallery-content-1">
                <div class="c-remodal-gallery__main-img js-gallery-main-img js-video-container">
                    <video id="pdp-video-container" class="video-js vjs-default-skin vjs-big-play-centered"></video>
                </div>

                @foreach(\App\Models\Gallery::where('product_id',$product->id)->where('status',1)->get() as $gallery)
                    <div class="c-remodal-gallery__main-img js-gallery-main-img is-active js-img-main-{{$gallery->position}}"
                         data-slide-title="Slide ">

                        <img
                            data-src="/storage/{{$gallery->img}}"
                            data-high-res-src="/storage/{{$gallery->img}}"
                            class="pannable-image" title=""
                            alt="{{$product->title}}"
                            data-type=""
                            src="/storage/{{$gallery->img}}"
                            loading="lazy">
                    </div>
                <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-2" data-slide-title="Slide {{$gallery->position}}">
                    <img
                        data-src="/storage/{{$gallery->img}}"
                        data-high-res-src="/storage/{{$gallery->img}}"
                        class="pannable-image" title=""
                        alt="{{$product->title}}"
                        data-type=""
                        src="/storage/{{$gallery->img}}"
                        loading="lazy"></div>
                @endforeach
                <div class="c-remodal-gallery__info">
                    <div class="c-remodal-gallery__title">
                        {{$product->title}}
                    </div>
                    <div class="c-remodal-gallery__thumbs js-official-thumbs">
                        @foreach(\App\Models\Gallery::where('product_id',$product->id)->where('status',1)->get() as $gallery)
                        <div class="c-remodal-gallery__thumb js-image-thumb" data-order="{{$gallery->position}}"><img
                                data-src="/storage/{{$gallery->img}}"
                                title=""
                                alt="{{$product->title}}"
                                data-type=""
                                src="/storage/{{$gallery->img}}"
                                loading="lazy"></div>
                        @endforeach

                    </div>
                    <div
                        class="c-remodal-gallery__other-imgs js-comments-files-thumbnails-summary js-see-more-imgs"></div>
                </div>
            </div>
            <div
                class="c-remodal-gallery__content c-remodal-gallery__content--comments js-gallery-tab-content js-comments-with-thumbnails"
                id="gallery-content-2"></div>
        </div>
        <div class="c-remodal-gallery__main js-level-two-gallery js-comments"></div>
        <div class="c-remodal-gallery__main js-answers">
            <div class="c-remodal-gallery__top-bar">
                <div class="c-remodal-gallery__head-title">
                    پاسخ فروشنده
                </div>
                <button data-remodal-action="close" class="c-remodal-gallery__close" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
