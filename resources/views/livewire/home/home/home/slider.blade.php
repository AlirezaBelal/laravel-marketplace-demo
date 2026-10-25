{{-- An empty catalog has no promotional banners yet. --}}
@if (\App\Models\Banner::count() >= 3)
@php
    $banner_0 = \App\Models\Banner::get()[0];
    $banner_1 = \App\Models\Banner::get()[1];
    $banner_2 = \App\Models\Banner::get()[2];
@endphp
<article class="container container--home">
    <div class="o-page">
        <div class="o-page__row o-page__row--main-top">
            <aside class="c-adplacement c-adplacement__margin-bottom">
                <a href="{{$banner_0->link}}" class="c-adplacement__item" data-id="60843" target="_blank"
                   title="{{$banner_0->title}}">
                    <img src="/storage/{{$banner_0->img}}" alt="{{$banner_0->title}}" loading="lazy"/></a>
            </aside>
            <div class="o-page__two-thirds o-page__two-thirds--right">
                <section class="c-adplacement-head-slider c-adplacement-head-slider--home">
                    <div class="c-swiper c-swiper--promo-box c-main-slider-container ">
                        <div class="swiper-container swiper-container-horizontal js-main-page-slider">
                            <div class="swiper-wrapper dkms-placement-slider c-adplacement" data-dkms="1">
                                @foreach(\App\Models\Slider::where('status',1)->get() as $slider)
                                    <a href="{{$slider->link}}"
                                       class="c-main-slider__slide swiper-slide js-main-page-slider-image"
                                       title="{{$slider->title}}"
                                       data-id="58296"
                                       data-is-trackable=""
                                       target="_blank"
                                       style="background-image: url('/storage/{{$slider->img}}')"></a>
                                @endforeach
                            </div>
                            <div class="swiper-pagination c-main-slider__actions"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="o-page__one-thirds o-page__one-thirds--left">
                <aside class="c-adplacement c-adplacement__container-column">
                    <a href="={{$banner_1->link}}"
                       class="c-adplacement__item c-adplacement__item--column js-banner-impression-adro"
                       data-id="60892" target="_blank" data-is-trackable="" title="{{$banner_1->title}}">
                        <div class="c-adplacement__sponsored_box"><img
                                src="/storage/{{$banner_1->img}}"
                                alt="{{$banner_1->title}}" loading="lazy"/></div>
                    </a>
                    <a href="{{$banner_2->link}}"
                       class="c-adplacement__item c-adplacement__item--column js-banner-impression-adro" data-id="59632"
                       target="_blank" data-is-trackable="" title="{{$banner_2->title}}">
                        <div class="c-adplacement__sponsored_box"><img
                                src="/storage/{{$banner_2->img}}"
                                alt="{{$banner_2->title}}" loading="lazy"/></div>
                    </a>
                </aside>
            </div>
        </div>
    </div>
</article>
@endif
