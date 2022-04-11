<h2 class="c-fashion__title">برندهای برتر</h2>
<div class="c-fashion__row c-fashion__row--no-gap" data-length="6">
    @foreach($brands as $brand)
        @foreach(\App\Models\Brand::where('id',$brand->brand_id)->get() as $cat)

        <a
            href="{{$cat->link}}"
            class="js-banner-impression-adro c-fashion__brand" title="{{$cat->name}}" data-observed="0" data-id="44957"
            target="_blank" data-gtm-vis-first-on-screen-9070001_346="12375" style="width: 157px !important"
            data-gtm-vis-total-visible-time-9070001_346="100" data-gtm-vis-has-fired-9070001_346="1"><img
                src="/storage/{{$cat->img}}"
                alt="{{$cat->name}}"></a>
        @endforeach
    @endforeach
</div>
