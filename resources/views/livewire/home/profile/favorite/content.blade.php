<section class="o-page__content">

    <div class="c-profile-list">
        <div class="o-box__tabs">
            <div class="o-box__tab js-ui-tab-pill is-active" data-tab-pill-id="favorites" data-current-page="1">
                کالاهای موردعلاقه
            </div>
            <div class="o-box__tab js-ui-tab-pill" data-tab-pill-id="public-lists" data-current-page="1">
                لیست‌های عمومی
            </div>
            <div class="o-box__tab js-ui-tab-pill" data-tab-pill-id="observed" data-current-page="1">
                اطلاع‌رسانی‌ها
            </div>
        </div>
        @include('livewire.home.profile.favorite.favorites')
        @include('livewire.home.profile.favorite.public-lists')
        @include('livewire.home.profile.favorite.observed')
    </div>
</section>

