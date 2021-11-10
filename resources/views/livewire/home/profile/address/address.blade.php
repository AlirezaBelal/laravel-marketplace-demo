<section class="o-page__content">
    <div class="o-box" id="address-section">
        <div class="o-box__header">
            <span class="o-box__title">
                نشانی‌ها
            </span>
        </div>
        @foreach(\App\Models\Address::all() as $address)
            <div class="c-profile-address__item js-user-address-container"
                 data-address="{&quot;id&quot;:44140919,&quot;full_name&quot;:&quot;{{$address->name}} {{$address->lname}}&quot;,&quot;mobile_phone&quot;:&quot;09120634157&quot;,&quot;phone_code&quot;:null,&quot;post_code&quot;:&quot;8158756491&quot;,&quot;phone&quot;:null,&quot;address&quot;:&quot;تهران،خ. اقلیمی، خ. مسعود ملایری پور&quot;,&quot;description&quot;:null,&quot;active&quot;:true,&quot;default&quot;:false,&quot;city_id&quot;:1698,&quot;city_name&quot;:&quot;تهران&quot;,&quot;state_id&quot;:9,&quot;state_name&quot;:&quot;تهران&quot;,&quot;district_id&quot;:2834,&quot;district_name&quot;:&quot;15 خرداد&quot;,&quot;building_no&quot;:&quot;2543&quot;,&quot;unit&quot;:&quot;5&quot;,&quot;full_address&quot;:&quot;تهران، تهران، تهران،خ. اقلیمی، خ. مسعود ملایری پور، پلاک ۲۵۴۳، واحد ۵&quot;,&quot;map_lon&quot;:51.43535,&quot;map_lat&quot;:35.72,&quot;map_lon_mobile&quot;:&quot;0.00000&quot;,&quot;map_lat_mobile&quot;:&quot;0.00000&quot;,&quot;map_lon_web&quot;:&quot;0.00000&quot;,&quot;map_lat_web&quot;:&quot;0.00000&quot;,&quot;fmcg_support&quot;:true,&quot;is_shared_address&quot;:false,&quot;shared_address_id&quot;:null}">
                <div class="c-profile-address__item-top">
                    <div class="c-profile-address__item-title">
                        {{$address->address}}
                    </div>
                    <div class="c-ui-more">
                        <div class="o-btn o-btn--icon-gray-md o-btn--l-more js-ui-see-more">
                        </div>
                        <div class="c-ui-more__options js-ui-more-options" style="display: none;">
                            <div class="c-ui-more__option c-ui-more__option--red js-remove-address-btn"
                                 wire:click="deleteAddress({{$address->id}})"
                                 data-id="{{$address->id}}" data-token="">
                                حذف
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-profile-address__content">
                    <ul class="c-profile-address__info">
                        <li>
                            <div class="c-profile-address__info-item location">
                                {{$address->state}} ، {{$address->city}}
                            </div>
                        </li>
                        <li>
                            <div class="c-profile-address__info-item postal-code">
                                {{$address->code_posti}}
                            </div>
                        </li>
                        <li>
                            <div class="c-profile-address__info-item phone">
                                {{$address->mobile}}
                            </div>
                        </li>
                        <li>
                            <div class="c-profile-address__info-item name">
                                {{$address->name}} {{$address->lname}}
                            </div>
                        </li>
                        <li class="location-link">
                            <div class="o-link o-link--has-arrow o-link--sm js-edit-address-btn"
                                 id="{{$address->id}}"
                                 wire:click="sendEditForm({{$address->id}})">
                                ویرایش نشانی
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
        <div class="c-profile-address__add js-add-address-btn"
             onclick="address2()">
            اضافه کردن نشانی جدید
        </div>
    </div>
</section>
@include('livewire.home.profile.address.module')


{{--        <div id="map"></div>--}}
{{--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50251.13400739694!2d46.334760516764604!3d38.07746322199607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfa!2s!4v1633435132883!5m2!1sfa!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}

{{--<style>--}}
{{--    #map {--}}
{{--        height: 400px;--}}
{{--        /* The height is 400 pixels */--}}
{{--        width: 100%;--}}
{{--        /* The width is the width of the web page */--}}
{{--    }--}}
{{--</style>--}}

{{--<script>--}}
{{--    // Initialize and add the map--}}
{{--    function initMap() {--}}
{{--        // The location of Uluru--}}
{{--        const uluru = { lat: -25.344, lng: 131.036 };--}}
{{--        // The map, centered at Uluru--}}
{{--        const map = new google.maps.Map(document.getElementById("map"), {--}}
{{--            zoom: 4,--}}
{{--            center: uluru,--}}
{{--        });--}}
{{--        // The marker, positioned at Uluru--}}
{{--        const marker = new google.maps.Marker({--}}
{{--            position: uluru,--}}
{{--            map: map,--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
{{--<script--}}
{{--    src="https://maps.googleapis.com/maps/api/js?key=REDACTED_GOOGLE_API_KEY&callback=initMap&libraries=&v=weekly"--}}
{{--    async--}}
{{--></script>--}}
