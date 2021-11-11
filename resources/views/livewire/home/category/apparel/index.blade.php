@section('title')
    {{$category->title}}
@endsection
<div>
    @include('livewire.home.category.electronic.css')
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container">
                <div class="o-page">
                    <div class="o-page__row o-page__row--listing">
                        @include('livewire.home.category.apparel.aside')
                        <div class="o-page__content">
                            <div class="js-sticky-2">
                                <div class="js-products js-sticky-inner-2 c-listing-wrapper"
                                     style="position: relative;">
                                    @include('livewire.home.category.apparel.slider')
                                    @include('livewire.home.category.apparel.super-deal')
                                    @include('livewire.home.category.apparel.aside2')
                                    @include('livewire.home.category.apparel.swiper-product')
                                    @include('livewire.home.category.apparel.aside3')
                                    @include('livewire.home.category.apparel.brand')

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
