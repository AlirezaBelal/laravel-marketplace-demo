<article data-product-id="3048126" class="c-product js-product">
    <section class="c-product__info">
        @include('livewire.home.product.detail.title')
        <div class="c-product__attributes js-product-attributes u-relative">
            @include('livewire.home.product.detail.product_config')
            @include('livewire.home.product.detail.product_price')
        </div>
        @include('livewire.home.product.detail.product_usp')
    </section>
    @include('livewire.home.product.detail.gallery')
</article>
