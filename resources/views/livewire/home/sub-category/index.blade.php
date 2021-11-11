<div>
    @include('livewire.home.sub-category.css')
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container">
                <div class="o-page">
                    @include('livewire.home.sub-category.categorylevel')
                    @include('livewire.home.sub-category.listing')


                    @include('livewire.home.sub-category.best-sell')
                </div>
                @include('livewire.home.sub-category.category_tag')
            </div>
        </div>
    </main>
</div>
