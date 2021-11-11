<div class="c-product__bottom-section u-mt-12 has-mini-buybox">
    <div id="tabs" class="o-box o-box--no-border o-box--grow c-product__tabs-container">
        @include('livewire.home.product.buybox.tabs')
        <div>
            @if($product->description)
                @include('livewire.home.product.buybox.desc')
            @endif

            @include('livewire.home.product.buybox.rate')
            @include('livewire.home.product.buybox.rate')
            @if($product->body)
                @include('livewire.home.product.buybox.review')
            @endif
            @include('livewire.home.product.buybox.tab-content')
            @include('livewire.home.product.buybox.comment')
            @include('livewire.home.product.buybox.faq')
        </div>
    </div>
    <div class="c-mini-buy-box-fixed">
        @include('livewire.home.product.buybox.mini_buy_box')
        @include('livewire.home.product.buybox.suppliers')
    </div>
</div>
