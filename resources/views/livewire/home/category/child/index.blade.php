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
                        @include('livewire.home.category.child.aside')
                        <div class="o-page__content">
                            <div class="js-sticky-2">
                                <div class="js-products js-sticky-inner-2 c-listing-wrapper"
                                     style="position: relative;">
                                    @include('livewire.home.category.child.slider')
{{--                                    @include('livewire.home.category.child.super-deal')--}}
{{--                                    @include('livewire.home.category.child.aside2')--}}
{{--                                    @include('livewire.home.category.child.swiper-product')--}}
{{--                                    @include('livewire.home.category.child.aside3')--}}
{{--                                    @include('livewire.home.category.child.brand')--}}

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
