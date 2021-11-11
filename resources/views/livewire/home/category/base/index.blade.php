@section('title')
    {{$category->title}}
@endsection
<div>
    @include('livewire.home.category.base.css')
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container">
                <div class="o-page">
                    <div class="o-page__row o-page__row--listing">
                        @include('livewire.home.category.base.aside')
                        <div class="o-page__content">
                            <div class="js-sticky-2">
                                <div class="js-products js-sticky-inner-2 c-listing-wrapper"
                                     style="position: relative;">
                                    @if (DB::connection('mysql-category')->table('category_slider')->where('c_id',$category->id)->where('status', 1)->exists())
                                        @include('livewire.home.category.base.slider')
                                    @endif
                                    @if (DB::connection('mysql-category')->table('category_amazing')->where('c_id',$category->id) ->exists())
                                        @include('livewire.home.category.base.super-deal')
                                    @endif
                                    @if (DB::connection('mysql-category')->table('category_banner')->where('type', 0)-> where('c_id',$category->id) ->exists())
                                        @include('livewire.home.category.base.aside2')
                                    @endif
                                    @if (DB::connection('mysql-category')->table('category_product_swiper')->where('c_id',$category->id) -> where('status', 1)->exists())
                                        @include('livewire.home.category.base.swiper-product')
                                    @endif
                                    @if (DB::connection('mysql-category')->table('category_banner')->where('type', 1)->where('c_id',$category->id) ->take(2)->exists())
                                        @include('livewire.home.category.base.aside3')
                                    @endif
                                    @if (DB::connection('mysql-category')->table('category_brand')->where('c_id',$category->id) ->exists())
                                        @include('livewire.home.category.base.brand')
                                    @endif
                                    @if ($category->description != null)
                                        @include('livewire.home.category.base.Desc')
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar">
            <aside></aside>
        </div>
    </main>

</div>
