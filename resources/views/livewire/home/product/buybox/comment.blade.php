<div class="c-comments js-product-tab-content" id="comments" data-method="comments"
     data-fetch-from-service="1">
    <div class="o-box__header"><span
            class="o-box__title">امتیاز و دیدگاه کاربران</span><span
            class="o-box__header-desc">{{$product->name}}</span>
    </div>
    <div class="js-content">
        <div class="c-comments__container">
            @include('livewire.home.product.review.sidebar')
            @include('livewire.home.product.review.review')

        </div>
    </div>
    <div class="c-content-expert__separator"></div>
</div>
