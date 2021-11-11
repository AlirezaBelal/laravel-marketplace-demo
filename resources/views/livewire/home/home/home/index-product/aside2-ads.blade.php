<aside class="c-about-digikala-items">
    @php
        $banner_9 = \App\Models\Banner::get()[9];
        $banner_10 = \App\Models\Banner::get()[10];
        $banner_11 = \App\Models\Banner::get()[11];
        $banner_12 = \App\Models\Banner::get()[12];
    @endphp
    <aside class="c-adplacement c-adplacement__container-row">
        <a
            href="{{$banner_9->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="1" data-id="{{$banner_9->id}}"
            target="_blank"
            data-is-trackable="" title="{{$banner_9->title}}" data-gtm-vis-first-on-screen-9070001_346="7025738"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_9->img}}"
                    alt="{{$banner_9->title}}" loading="lazy"></div>
        </a>
        <a
            href="{{$banner_10->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="1" data-id="{{$banner_10->id}}"
            target="_blank"
            data-is-trackable="" title="{{$banner_10->title}}" data-gtm-vis-first-on-screen-9070001_346="7025739"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_10->img}}"
                    alt="{{$banner_10->title}}" loading="lazy"></div>
        </a><a
            href="{{$banner_11->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="1" data-id="{{$banner_11->id}}"
            target="_blank"
            data-is-trackable="" title="{{$banner_11->title}}" data-gtm-vis-first-on-screen-9070001_346="7025739"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_11->img}}"
                    alt="{{$banner_11->title}}" loading="lazy"></div>
        </a><a
            href="{{$banner_12->link}}"
            class="c-adplacement__item js-banner-impression-adro" data-observed="1" data-id="{{$banner_12->id}}"
            target="_blank"
            data-is-trackable="" title="{{$banner_12->title}}" data-gtm-vis-first-on-screen-9070001_346="7025740"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
            <div class="c-adplacement__sponsored_box"><img
                    src="/storage/{{$banner_12->img}}"
                    alt="{{$banner_12->title}}" loading="lazy"></div>
        </a></aside>
</aside>
