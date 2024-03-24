<div>
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">

            <div data-category-id="11" data-product-id="3048126" class="o-page js-product-page c-product-page">
                <div class="container">
                    <div class="c-product__nav-container">
                        @include('livewire.home.product.detail.nav')
                        @include('livewire.home.product.detail.article')
                        @include('livewire.home.product.detail.seller')
                        @include('livewire.home.product.detail.buybox')
                        @include('livewire.home.product.detail.buy_product')
                    </div>
                </div>
            </div>
            </div>
    </main>
</div>

@include('livewire.home.product.cssjs')
@include('livewire.home.product.modals')

