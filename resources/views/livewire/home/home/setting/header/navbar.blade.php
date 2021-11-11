
<nav class="c-navi js-navi">
    <div class="container">
        <div class="c-navi__row">
            <ul class="c-navi-new-list">
                <li class="c-navi-new-list__categories">
                    <ul class="c-navi-new-list__category-item">
                        @include('livewire.home.home.setting.header.categories')
                        @include('livewire.home.home.setting.header.menu')
                    </ul>
                </li>
                <li class="c-navi-new-list__categories">
                    <ul class="c-navi-new-list__category-item">
                        <li class="c-navi-new-list__category c-navi-new-list__category--location has-notification js-general-location-bar">
                                <span
                                    class="c-navi-new-list__category-location">لطفا شهر و استان خود را انتخاب کنید</span>
                        </li>
                    </ul>
                </li>
                <script>
                    var insider_object = {
                        "user": {
                            "uuid": null,
                            "name": null,
                            "surename": null,
                            "email": null,
                            "phone_number": null,
                            "gdpr_optin": true,
                            "email_optin": true
                        }
                    };
                </script>

                <input type="hidden"
                       id="ESILogged" data-logged=0/>

            </ul>
        </div>
    </div>
</nav>
