<div class="c-faq " id="questions" wire:init="loadComment"
     data-method="questions" data-fetch-from-service="1">
    <div class="o-box__header"><span class="o-box__title">پرسش و پاسخ</span><span
            class="o-box__header-desc">{{$product->name}}</span>
    </div>
    <div class="">
        <div class="c-question__container">
            @include('livewire.home.product.detail.comtop')
            @include('livewire.home.product.detail.com23')
            @include('livewire.home.product.detail.comremodal')
        </div>
    </div>
</div>
@include('livewire.home.product.detail.remodal')
