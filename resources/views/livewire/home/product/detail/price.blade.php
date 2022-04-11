<div class="c-product__summary js-product-summary">
    <div class="c-box">
        <div class="c-product__seller-info js-seller-info">
            <div class="js-seller-info-changable c-product__seller-box">
            @include('livewire.home.product.detail.price.product__seller-counter')
            @include('livewire.home.product.detail.price.seller')
            @include('livewire.home.product.detail.price.warranty')
            @include('livewire.home.product.detail.price.send_way')
            @include('livewire.home.product.detail.price.best_price')
            @include('livewire.home.product.detail.price.price')
            </div>
            @include('livewire.home.product.detail.price.addToCart')
        </div>
        @include('livewire.home.product.detail.price.suppliers')
    </div>
</div>
