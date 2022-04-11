<section class="o-page__content">
    @include('livewire.home.order.shipping.content.detail')
    <div class="c-shipment-page__container" id="shipping-data">
        @include('livewire.home.order.shipping.content.address')
        @include('livewire.home.order.shipping.content.dateTime')
    </div>
   @include('livewire.home.order.shipping.content.cart')
</section>
