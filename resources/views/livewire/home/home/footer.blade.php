<div id="footer-data-ux"></div>
<footer class="c-footer">
    <div class="container">
        @include('livewire.home.home.setting.footer.footer__feature-innerbox')
        <div class="c-footer__middlebar">
            @include('livewire.home.home.setting.footer.footer__links')
            <nav class="c-footer__form">
                @include('livewire.home.home.setting.footer.footer__form')
                @include('livewire.home.home.setting.footer.footer__social')
            </nav>
        </div>
        <hr/>
        <nav class="c-footer__address">
            @include('livewire.home.home.setting.footer.footer__address')
            @include('livewire.home.home.setting.footer.footer__address-images')
        </nav>
    </div>
    <div class="c-footer__more-info">
        <div class="container">
            <div class="c-footer__description-content" style="    display: inline-flex">
                @include('livewire.home.home.setting.footer.footer__seo_title')
                @include('livewire.home.home.setting.footer.footer__safety-partner')
            </div>
            @include('livewire.home.home.setting.footer.footer__partners')
            @include('livewire.home.home.setting.footer.footer__copyright')
        </div>
    </div>
</footer>

@yield('footer_home')
