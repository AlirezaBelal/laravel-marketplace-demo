@php
    $banner_13 = \App\Models\Banner::get()[13];
    $banner_14 = \App\Models\Banner::get()[14];
@endphp
<aside class="c-adplacement c-adplacement__container-row">
    @if($banner_13)
        <a
            href="{{$banner_13->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="1" data-id="69601" target="_blank"
            data-is-trackable="" title="{{$banner_13->title}}" data-gtm-vis-first-on-screen-9070001_346="5173"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_13->img}}"
                    alt="{{$banner_13->title}}" loading="lazy"></div>
        </a>
    @endif
    @if($banner_14)
        <a
            href="{{$banner_14->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="1" data-id="69604" target="_blank"
            data-is-trackable="" title="{{$banner_14->title}}" data-gtm-vis-first-on-screen-9070001_346="5174"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_14->img}}"
                    alt="{{$banner_14->title}}" loading="lazy"></div>
        </a>
    @endif
</aside>
