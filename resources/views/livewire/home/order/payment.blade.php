<div>
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container c-payment-page">
                @include('livewire.home.order.payment.tabs')
                    <section class="o-page">
                        <div class="o-page__row">
                            <section class="o-page__content">
                                <div class="c-payment">
                                    @include('livewire.home.order.payment.payment_type')
                                    @include('livewire.home.order.payment.discount_code')
                                    @include('livewire.home.order.payment.code_vo')
                                    @include('livewire.home.order.payment.payment_summ')
                                </div>
                                @include('livewire.home.order.payment.check_order')
                            </section>
                            @include('livewire.home.order.payment.aside')
                        </div>
                    </section>
            </div>
        </div>
        <div id="sidebar">
            <aside></aside>
        </div>
    </main>
</div>
