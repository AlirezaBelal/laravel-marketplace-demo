<header class="c-header   js-header">
    <div class="container">
        <div class="c-header__row js-header-sticky">
            <div class="c-header__right-side">
                @include('livewire.home.home.setting.header.logo')
                @livewire('global-search')
{{--                @include('livewire.home.home.setting.header.search')--}}
            </div>
            @include('livewire.home.home.setting.header.login')
        </div>
    </div>
    @include('livewire.home.home.setting.header.navbar')
</header>
<div class="c-navi-categories__overlay js-navi-overlay"></div>
