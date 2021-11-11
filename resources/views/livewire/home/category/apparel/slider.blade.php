<section class="c-adplacement-head-slider">
    <div class="c-swiper c-swiper--promo-box c-main-slider-container ">
        <div
            class="swiper-container swiper-container-horizontal js-main-page-slider swiper-container-fade swiper-container-rtl">
            <div class="swiper-wrapper dkms-placement-slider c-adplacement" data-dkms="1"
                 style="transition-duration: 0ms;">
                @foreach($sliders as $slider)
                    <a href="{{$slider->link}}"
                       class="c-main-slider__slide swiper-slide js-main-page-slider-image swiper-slide-duplicate-active"
                       title="{{$slider->title}}" data-id="46028" data-is-trackable="" target="_blank"
                       style="background-image: url('/storage/{{$slider->img}}'); width: 1325px; transition-duration: 0ms; opacity: 1; transform: translate3d(0px, 0px, 0px);"
                       data-swiper-slide-index="2">

                    </a>
                @endforeach
            </div>
            <div class="swiper-pagination c-main-slider__actions swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span
                    class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
            <div class="swiper-button-next c-swiper--fmcg-swiper"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
