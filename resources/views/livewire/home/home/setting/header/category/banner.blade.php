@foreach(\App\Models\Category::where('status',1)->get() as $category)
    <div class="c-navi-new__ads js-categories-ad " id="categories-ad-{{$category->id}}">
        <div class="c-navi-new__ads--banners">
            @foreach(\App\Models\AdsCategory::where('category_id',$category->id)->where('status',1)->get() as $ads)
            <a data-id="52847"
               class="js-menu-top-banner"
               href="{{$ads->category->link}}">
                <div class="banner-item">
                    <img
                    src="{{\Illuminate\Support\Facades\Storage::url($ads->img)}}"
                        alt="{{$ads->title}}"/>
                    <div class="c-adplacement__badge banner-item-ad">
                        <div class="c-adplacement__badge-container ">
                            <div class="c-adplacement__badge-container--img"><span
                                    class="c-adplacement__badge-container--txt">Ad</span><img></div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="c-navi-new__ads--brand-holder">
            @if(\App\Models\Brand::where('parent',$category->id)->where('vip',1)->first())
            <h3>برند های ویژه</h3>
            <div class="c-navi-new__ads--brands">
                @foreach(\App\Models\Brand::where('parent',$category->id)->where('vip',1)->get() as $brand)
                    <a data-id="52848" class="js-menu-ad-brands"
                       href="{{$brand->link}}"
                       data-gtm-vis-first-on-screen-9070001_346="927362"
                       data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1">
                        <div class="brand-item"><img
                                src="/storage/{{$brand->img}}"
                                alt="{{$brand->title}}"></div>
                    </a>
                @endforeach
            </div>
                @endif
        </div>


    </div>

@endforeach
