@php
    $banner_3 = \App\Models\Banner::get()[3];
    $banner_4 = \App\Models\Banner::get()[4];
    $banner_5 = \App\Models\Banner::get()[5];
    $banner_6 = \App\Models\Banner::get()[6];
@endphp
<article class="container container--home">
    <div class="o-page">
        <div class="o-page__row"></div>
        <aside class="c-adplacement c-adplacement__container-row">

            <a
                href="{{$banner_3->link}}"
                class="c-adplacement__item js-banner-impression-adro"
                data-id="59847"
                target="_blank"
                data-is-trackable=""
                title="{{$banner_3->title}}">
                <div class="c-adplacement__sponsored_box"><img
                        src="/storage/{{$banner_3->img}}"
                        alt={{$banner_3->title}}" loading=" lazy"/>
                </div>
            </a>
            <a
                href="{{$banner_4->link}}"
                class="c-adplacement__item js-banner-impression-adro"
                data-id="60877"
                target="_blank"
                data-is-trackable=""
                title="{{$banner_4->title}}">
                <div class="c-adplacement__sponsored_box"><img
                        src="/storage/{{$banner_4->img}}"
                        alt="{{$banner_4->title}}" loading="lazy"/></div>
            </a><a
                href="{{$banner_5->link}}"
                class="c-adplacement__item js-banner-impression-adro"
                data-id="60865"
                target="_blank"
                data-is-trackable=""
                title="{{$banner_5->title}}">
                <div class="c-adplacement__sponsored_box"><img
                        src="/storage/{{$banner_5->img}}"
                        alt="{{$banner_5->title}}" loading="lazy"/></div>
            </a><a
                href="{{$banner_6->link}}"
                class="c-adplacement__item js-banner-impression-adro"
                data-id="59855"
                target="_blank"
                data-is-trackable=""
                title="{{$banner_6->title}}">
                <div class="c-adplacement__sponsored_box"><img
                        src="/storage/{{$banner_6->img}}"
                        alt="{{$banner_6->title}}" loading="lazy"/></div>
            </a></aside>
    </div>
</article>
