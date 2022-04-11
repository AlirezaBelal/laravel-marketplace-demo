<aside class="c-adplacement">
    @foreach($banners as $banner)
    <a
        href="{{$banner->link}}"
        class="c-adplacement__item js-banner-impression-adro" data-observed="1"
        title="{{$banner->title}}" data-id="39870" data-is-trackable=""
        target="_blank" data-gtm-vis-first-on-screen-9070001_346="841"
        data-gtm-vis-total-visible-time-9070001_346="100"
        data-gtm-vis-has-fired-9070001_346="1">
        <div class="c-adplacement__sponsored_box"><img
                src="/storage/{{$banner->img}}"
                alt="{{$banner->title}}"></div>
    </a>
    @endforeach
</aside>
