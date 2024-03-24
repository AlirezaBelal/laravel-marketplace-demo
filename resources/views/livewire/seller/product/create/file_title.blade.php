<div class="c-grid">
    <div class="c-content-page c-content-page--plain c-grid__row">
        <div class="c-grid__col">
            <div class="c-content-page__header">
                <span class="c-content-page__header-action">درج محصول</span>
                <span class="c-content-page__header-desc">اطلاعات محصول‌تان را در این صفحه وارد کنید</span>
            </div>
        </div>
    </div>
    <div class="c-grid__row">
        <div class="c-grid__col">
            <div class="c-card">
                <div class="c-grid__row">
                    <div class="c-grid__col">
                        <div class="product-form">
                            <div class="c-content-accordion js-accordion uk-accordion">
                                @include('livewire.seller.product.create.step.step1')
                                @include('livewire.seller.product.create.step.step2')
{{--                                @include('livewire.seller.product.create.step.step3')--}}
{{--                                @include('livewire.seller.product.create.step.step4')--}}
                                @include('livewire.seller.product.create.step.step5')
                            </div>
{{--                            @include('livewire.seller.product.create.step.form')--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
