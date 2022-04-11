{{--<div class="c-checkout__tab-container">--}}
<section class="o-page__content">
    @include('livewire.home.cart.cartdata.message')
    @include('livewire.home.cart.cartdata.script')
    <div class="c-checkout js-checkout" style="margin-left: 25px">
        <div class="c-checkout__group">
            <ul class="c-checkout__items">
                @include('livewire.home.cart.cartdata.check')
            </ul>
        </div>
    </div>
</section>
@include('livewire.home.cart.cartdata.aside')
{{--</div>--}}
