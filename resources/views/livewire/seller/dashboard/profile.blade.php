<div>
    @include('livewire.seller.dashboard.profile.other')
    <main class="c-main js-layout-main-content" data-is-production-mode="1">
        <div class="uk-container uk-container-large">
            <div class="c-grid">
                <div class="c-grid__row c-grid__row--lg-top">
                    @include('livewire.seller.dashboard.profile.sidebar')
                    <form   id="profile-form" data-name="profile"
                          class="c-grid__col c-grid__col--lg-9 c-grid__col--xs-gap c-grid__col--sm-gap js-profile-page"
                            wire:submit.prevent="form_seller">
                        @include('livewire.seller.dashboard.profile.nav')
                        <div class="c-RD-profile--w-100p js-profile-content">
                            <div class="c-RD-profile__dis-none " data-name="businessInfo" style="display: block;">
                                @include('livewire.seller.dashboard.profile.learning')
                            </div>
                            @include('livewire.seller.dashboard.profile.bank')
                            @include('livewire.seller.dashboard.profile.countInfo')
                            @include('livewire.seller.dashboard.profile.docUpload')
{{--                            @include('livewire.seller.dashboard.profile.cal')--}}




                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
