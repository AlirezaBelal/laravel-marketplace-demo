<aside class="c-adplacement c-adplacement-html">
    @foreach(\App\Models\ProfileBanner::all() as $banner)
        <a
            class="js-banner-impression-adro c-adplacement__item c-adplacement-html__item c-adplacement-html__item--a c-adplacement-html__item--red"
            href="{{$banner->link}}"
            data-observed="0" title="{{$banner->title}}" target="_blank" data-id="82406">
            <div class="c-adplacement-html__item-wrapper"><img class="c-adplacement-html__item-image"
                                                               src="/storage/{{$banner->img}}"
                                                               alt="{{$banner->title}}"
                                                               loading="lazy">
                <div class="c-adplacement-html__item-content"><span
                        class="c-adplacement-html__item-discount">تخفیف تا <span
                            class="c-adplacement-html__item-discount-value">{{\App\Models\PersianNumber::translate($banner->discount)}}
                                        ٪</span></span><span class="c-adplacement-html__item-title">{{$banner->title}}</span><span
                        class="c-adplacement-html__item-button">خرید</span></div>
            </div>
        </a>
    @endforeach
</aside>
