<div id="address-section">
    @include('livewire.home.order.shipping.content.address.discreption')
    <div class="c-checkout-address js-user-address-container" id="user-address-list-container" style="display: none">

      @include('livewire.home.order.shipping.content.address.tab')
      @include('livewire.home.order.shipping.content.address.checkout-address')
      @include('livewire.home.order.shipping.content.address.checkout-address__shared-list')
    </div>
</div>
