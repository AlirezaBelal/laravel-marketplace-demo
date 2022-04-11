<div>
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container c-shipment-page">
                @include('livewire.home.order.shipping.steps')
                <section class="o-page">
                    <div class="o-page__row">
                        @include('livewire.home.order.shipping.content.content')
                        @include('livewire.home.order.shipping.aside')
                    </div>
                </section>
            </div>
        </div>
        <div id="sidebar">
            <aside></aside>
        </div>
    </main>
</div>
@include('livewire.home.order.modals')
