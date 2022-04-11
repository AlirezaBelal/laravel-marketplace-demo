/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/shared/map.js]*/
var MapActions = {
    mapUpdatedFromInputs: false,
    inputsUpdatedFromMap: false,
    firstInitialized: false,
    maps: {},
    init: function () {
        var functions = [
            this.initGoogleMap()
        ], self = this;

        for (var i = 0; i < functions.length; ++i) {
            try {
                functions[i].bind(self)();
            } catch (e) {
                window.Sentry && window.Sentry.captureException(e);
                // eslint-disable-next-line no-console
                console.warn(e);
            }
        }
    },

    initMapSearch: function (id) {
        var $map = $('#' + id);
        var mapContainer = $map.closest('.js-map-container');
        var addressSidebarContainer = $('.js-address-sidebar-container')
        var addressModuleActive = isModuleActive('address_modal_v3')
        var mapSearchContent = isModuleActive('address_modal_v3') ?
            addressSidebarContainer.find('.js-search-map-content')
            :
            mapContainer.find('.js-search-map-content')
        ;
        var mapSearchInput = isModuleActive('address_modal_v3') ?
            addressSidebarContainer.find('.js-search-map-input')
            :
            mapContainer.find('.js-search-map-input');

        var searchAjax;
        var thiz = this;
        var searchMapCancel =$('.js-search-map-cancel');
        var searchLag;

        mapSearchInput.focus(function () {
            mapContainer.addClass('search-open');
            try {
                gtag('event', 'click', {
                    'event_category': 'Map Tracking',
                    'event_action': 'Focus on Search Bar in Map',
                    'event_label': window.pageName,
                    'non_interaction': true
                });
            } catch (e) {

            }
        });

        mapSearchInput.on('click', function (e) {
            e.stopPropagation();
        });

        mapContainer.on('click', function () {
            mapContainer.removeClass('search-open')
        });

        mapSearchInput.on('input', function () {
            if(searchLag) {
                clearTimeout(searchLag);
            }
            if($(this).val() === '') {
                searchMapCancel.addClass('u-hidden');
            } else {
                searchMapCancel.removeClass('u-hidden');
            }
            var center = isModuleActive('parsi_map') ? thiz.maps[id].getCenter() : thiz.maps[id].center;

            if (center) {
                searchLag = setTimeout(function () {
                    searchAjax = Services.ajaxPOSTRequestJSON(
                        '/addresses/search-address/',
                        {
                            address: mapSearchInput.val(),
                            latitude: isModuleActive('parsi_map') ? center.lat : center.lat(),
                            longitude: isModuleActive('parsi_map') ? center.lng : center.lng()
                        },
                        function (data) {
                            mapSearchContent.html('');
                            var mapResult = '';
                            $.map(data, function (val, i) {
                                if (addressModuleActive) {
                                    mapResult = mapResult + `<div class="c-map__search-item-container">
                                                            <div data-icon="Icon-Location-Pin" class="c-map__search-item-icon">
                                                                
                                                            </div>
                                                            <div class="c-map__search-item c-map__search-item--address-v3 js-map-search-item" data-lng="${val.longitude}" data-lat="${val.latitude}">
                                                                <div class="c-map__search-item-title js-map-search-item-title">${val.title}</div>
                                                                <div class="c-map__search-item-desc">${val.address}</div>
                                                            </div>
                                                        </div>
                                                        `
                                } else {
                                    mapResult = mapResult + '<div class="c-map__search-item js-map-search-item" data-lng="' + val.longitude +'" data-lat="' + val.latitude +'">\n' +
                                        '                <div class="c-map__search-item-title js-map-search-item-title">' + val.title + '</div>\n' +
                                        '                <div class="c-map__search-item-desc">' + val.address + '</div>\n' +
                                        '            </div>'
                                }
                            });
                            mapSearchContent.html(mapResult);
                        },
                        function (data) {
                            console.log(data.errors);
                        }
                    );
                }, 500);
            }
        });

        $(document).on('click', '.js-map-search-item', function (e) {
            e.stopPropagation();
            if (isModuleActive('parsi_map')) {
                thiz.maps[id].setCenter([$(this).data('lng'), $(this).data('lat')]);
                if (isModuleActive('address_modal_v3')) {
                    thiz.maps[id].fire('dragend')
                }
            } else {
                thiz.maps[id].setCenter(new google.maps.LatLng($(this).data('lat'), $(this).data('lng')));
            }
            mapSearchInput.val($(this).find('.js-map-search-item-title').html());
            searchMapCancel.removeClass('u-hidden');
        });

        searchMapCancel.on('click', function (e) {
            e.stopPropagation();
            mapSearchInput.val('');
            mapContainer.removeClass('search-open');
            $(this).addClass('u-hidden');
        })
    },

    initGoogleMap: function (upperThis, id, position, hasSearch) {
        var thiz = this;
        var $map = $('#' + id);
        var mapContent = $('#address-modal-map');
        var formContent = $('#address-modal-form');
        var currentLocationMap = null;
        var currentLocationIcon = $map.data('current-icon');
        var currentLocationBtn = $('.js-go-to-my-location');
        var addressModal = $('[data-remodal-id=add-edit-address]').remodal();
        var $addressForm = $('#add-edit-address-form');
        var addLocationBtn = $('.js-add-location-btn');

        position = (position && (position.lat && position.lng)) ? position : {
            lat: 0,
            lng: 0
        };

        try {
            ga('set', 'nonInteraction', true);
            ga('send', 'event', {
                eventCategory: 'DK-Address-Modal',
                eventAction:'AddressModalOpenDesktop',
                eventLabel: id
            });
        } catch (e) {

        }

        if (parseInt(position.lat) !== 0 && parseInt(position.lng) !== 0) {
            $map.closest('.js-map-interactive').addClass('c-map__container--static');
        } else {
            $map.closest('.js-map-interactive').removeClass('c-map__container--static');
        }

        function initMapInner(position) {
            var interactiveMap;

            function initMap() {
                if(isModuleActive('parsi_map')) {
                    thiz.maps[id] = new parsimap.Map(document.getElementById(id), {
                        center: [parseFloat(position.lng), parseFloat(position.lat)],
                        zoom: 14,
                        style: "parsimap://street"
                    });
                } else {
                    thiz.maps[id] = new google.maps.Map(document.getElementById(id), {
                        center: {lat: parseFloat(position.lat), lng: parseFloat(position.lng)},
                        zoom: 15,
                        fullscreenControl: false,
                        streetViewControl: false,
                        mapTypeControl: false,
                        scaleControl: false,
                    });
                }

                thiz.maps[id].addListener('click', function (e) {
                    e.stop()
                });

                try {
                    ga('set', 'nonInteraction', true);
                    ga('send', 'event', {
                        eventCategory: 'DK-Address-Modal',
                        eventAction:'GoogleMapInitDesktop',
                        eventLabel: id
                    });
                } catch (e) {

                }
            }

            function updateInputs(lat, lng, $form) {
                var $addressField = $form.find('.js-address-field');

                if (thiz.mapUpdatedFromInputs) {
                    return;
                }

                if (lat > 0 && lng > 0) {
                    Services.ajaxPOSTRequestJSON(
                        '/addresses/search-address-reverse/',
                        {'latitude': lat, 'longitude': lng},
                        function (data) {
                            upperThis.selectedCityId = data.city_id;
                            $form.find('.js-select-state').val(data.state_id).selectric('refresh').change();
                            $form.find('.js-select-city').val(data.city_id).selectric('refresh').change();
                            /*$form.find("textarea[name='address[address]']").val(data.address);*/

                            if(isModuleActive('parsi_map')) {
                                $addressField.find('.js-input-field').val(data.address);
                            } else {
                                if ($addressField.children('textarea').val() !== data.address) {
                                    if ($addressField.children('.c-map__address-tip').length === 0) {
                                        $addressField.append('<div class="c-map__address-tip">تغییر بر اساس موقعیت جدید نقشه<div class="c-map__address-tip-link js-update-address-map" data-address="' + data.address + '">تایید</div></div>');
                                        $addressField.children('textarea').addClass('c-ui-textarea__field--has-tip');
                                    } else {
                                        $addressField.find('.js-update-address-map').data('address', data.address);
                                    }
                                }
                            }

                            thiz.inputsUpdatedFromMap = true;
                        },
                        function (data) {
                            console.log(data.errors);
                        }
                    );
                }
            }

            try {
                if (thiz.maps[id]) {
                    if (isModuleActive('parsi_map')) {
                        thiz.maps[id].flyTo([position.lng, position.lat], 14, 1);
                    } else {
                        thiz.maps[id].setCenter(new google.maps.LatLng(position.lat, position.lng));
                    }
                } else {
                    initMap();
                }
            } catch (e) {

            }

            if (!thiz.firstInitialized) {
                $('.js-edit-map-btn').on('click', function () {
                    $(this).closest('.js-map-interactive').removeClass('c-map__container--static');
                });

                $('.js-select-address-map').on('click', function () {
                    interactiveMap = $(this).closest('.js-map-interactive');
                    var $this = $(this);

                    try {
                        gtag('event', 'click', {
                            'event_category': 'Map Tracking',
                            'event_action': 'Submit the Map',
                            'event_label': window.pageName,
                            'non_interaction': true
                        });
                    } catch (e) {

                    }

                    var location = {};
                    if (isModuleActive('parsi_map')) {
                        location.lat = thiz.maps[id].getCenter().lat;
                        location.lng = thiz.maps[id].getCenter().lng;
                    } else {
                        location.lat = thiz.maps[id].center.lat();
                        location.lng = thiz.maps[id].center.lng();
                    }

                    if(Math.ceil(location.lng * 10000000) === 513353777 && Math.ceil(location.lat * 10000000) === 357013221) {
                        window.DKToast('لطفا موقعیت مکانی خود را انتخاب کنید');
                        return;
                    }

                    if(isModuleActive('mandatory_location_shipping') && $(this).data('mode') === 'location') {
                        $(this).data('mode', '');
                        var rawAddressData = $('#user-default-address-container').data('address');
                        var addressData = {
                            'address': {
                                'first_name': rawAddressData.first_name,
                                'last_name': rawAddressData.last_name,
                                'full_name': rawAddressData.full_name,
                                'national_id': rawAddressData.national_id,
                                'mobile_phone': rawAddressData.mobile_phone,
                                'state_id': rawAddressData.state_id,
                                'city_id': rawAddressData.city_id,
                                'district_id': rawAddressData.district_id,
                                'address': rawAddressData.address,
                                'post_code': rawAddressData.post_code,
                                'apt_id': rawAddressData.apt_id,
                                'bld_num': rawAddressData.bld_num,
                                'lat': location.lat,
                                'lng': location.lng,
                                'novalidate_point': true
                            }
                        };
                        Services.ajaxPOSTRequestJSON(
                            '/ajax/addresses/edit/' + rawAddressData.id + '/',
                            addressData,
                            function () {
                                addLocationBtn.remove();
                                $addressForm[0].reset();

                                if($this.data('has-submit')) {
                                    $this.data('has-submit', false);
                                    $('#shipping-data-form').submit();
                                } else {
                                    addressModal.close();
                                }
                            },
                            function (response) {
                                addressModal.open();
                                var $errorItems = $addressForm.find('.js-form-error-items');
                                $errorItems.empty();
                                $.each(response.errors, function (i, item) {
                                    $errorItems.append('<p>' + __(item) + '</p>');
                                });

                                $addressForm.find('.js-form-errors').removeClass('u-hidden-visually');
                            },
                            true,
                            true
                        );
                    } else {
                        if(!isModuleActive('new_address_modal')) {
                            $(this).closest('.js-map-interactive').addClass('c-map__container--static');
                        };

                        interactiveMap.find('[name = "address[lat]"]').val(location.lat);
                        interactiveMap.find('[name = "address[lng]"]').val(location.lng);
                        updateInputs(location.lat, location.lng, $(this).closest('form'));

                        if(isModuleActive('new_address_modal')) {
                            mapContent.addClass('u-hidden');
                            formContent.removeClass('u-hidden');
                        }
                    }
                });

                if(isModuleActive('new_address_modal')) {
                    if(isModuleActive('map_current_location')) {
                        if (isModuleActive('parsi_map')) {
                            thiz.maps[id].on('load', function () {
                                window.navigator.geolocation.watchPosition(
                                    function (pos) {
                                        var position = pos.coords;

                                        if (currentLocationMap === null) {
                                            thiz.maps[id].addSource("current_location", {
                                                type: "FeatureCollection",
                                                features: [
                                                    {
                                                        type: "Feature",
                                                        properties: { image: "current", width: 5 },
                                                        geometry: {
                                                            type: "Point",
                                                            coordinates: [position.longitude, position.latitude]
                                                        }
                                                    }
                                                ]
                                            });
                                            currentLocationMap = thiz.maps[id].getSource("current_location");
                                            var imageCollection = [{ name: "current", url: currentLocationIcon }];
                                            thiz.maps[id].loadImageCollection(imageCollection, function() {
                                                thiz.maps[id].addSymbolLayer("marker", "current_location", { layout: { "icon-image": "current", "icon-anchor": "center" } });
                                            });
                                        }

                                        currentLocationBtn.removeClass('u-hidden');

                                        var data = currentLocationMap.data;
                                        data.features[0].geometry.coordinates = [position.longitude, position.latitude];
                                        currentLocationMap.setData(data);

                                    },
                                    function () {
                                    },
                                );
                            })
                        } else {
                            window.navigator.geolocation.watchPosition(
                                function (pos) {
                                    var position = pos.coords;

                                    if (currentLocationMap === null) {
                                        currentLocationMap = new google.maps.Marker({
                                            position: {lat: position.latitude, lng: position.longitude},
                                            map: thiz.maps[id],
                                            icon: {url: currentLocationIcon, origin: new google.maps.Point(0, 0), anchor: new google.maps.Point(17, 17)}
                                        });
                                    }

                                    currentLocationBtn.removeClass('u-hidden');

                                    currentLocationMap.setPosition(new google.maps.LatLng(position.latitude, position.longitude));

                                },
                                function () {
                                },
                            );
                        }

                        currentLocationBtn.on('click', function () {
                            navigator.geolocation.getCurrentPosition(function (pos) {
                                    var position = {};
                                    currentLocationBtn.removeClass('is-unavailable');
                                    position.lat = pos.coords.latitude;
                                    position.lng = pos.coords.longitude;
                                    initMapInner(position);
                                }, function () {
                                    currentLocationBtn.addClass('is-unavailable');
                                },
                                {
                                    enableHighAccuracy: true,
                                    timeout: 8000
                                });
                        });
                    };
                }

                $(document).on('click', '.js-update-address-map', function () {
                    var $addressField = $(this).closest('.js-address-field');
                    $addressField.children('textarea').val($(this).data('address'));
                    $addressField.children('textarea').removeClass('c-ui-textarea__field--has-tip');
                    $(this).parent().remove();
                });

                thiz.firstInitialized = true;

                if (hasSearch) {
                   thiz.initMapSearch(id);
                }
            }
        }

        try {
            if (parseInt(position.lat) === 0 || parseInt(position.lng) === 0) {
                initMapInner({lat: 35.7013221, lng: 51.3353777});
                navigator.geolocation.getCurrentPosition(function (pos) {
                    if (isModuleActive('map_current_location'))
                        currentLocationBtn.removeClass('is-unavailable');
                    position.lat = pos.coords.latitude;
                    position.lng = pos.coords.longitude;
                    initMapInner(position);
                }, function () {
                    if (isModuleActive('map_current_location'))
                        currentLocationBtn.addClass('is-unavailable');
                },
                {
                    enableHighAccuracy: true,
                    timeout: 8000
                });
            } else {
                initMapInner(position);
            }
        } catch (e) {

        }
    },
    initAddressV3(id) {
        function updateAddressOnChange(e) {
            $(document).trigger('changeReverseAddressInProgress');
            Services.ajaxPOSTRequestJSON(
                '/addresses/search-address-reverse/',
                {'latitude': map.getCenter().lat, 'longitude': map.getCenter().lng},
                function (data) {
                    $(document).trigger('changeReverseAddress', data);
                },
                function (data) {
                    console.log(data.errors);
                }
            );

        }
        var map = MapActions.maps[id];

        map.on('dragend', updateAddressOnChange);
        map.on('dblclick', updateAddressOnChange);
        map.on('zoomend', updateAddressOnChange);
    }
};



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/shippingController/indexAction.js]*/
var IndexAction = {
    isJetDeliveryApplied: 0,
    selectedDistrictId: 0,
    selectedCityId: 0,
    mapUpdatedFromInputs: false,
    inputsUpdatedFromMap: false,
    selectedCityName: '',
    recipient: null,
    shippingMode: 'eco',
    selectedAddressId: null,
    runningTestVersion: null,
    init: function () {
        this.shippingMode = defaultShippingMode;
        this.initSelects();
        this.initCancelAddressModal();
        this.initChangeAddress();
        this.initChangeDefaultAddress();
        this.initShippingType();
        this.initSaveShippingData();
        this.initDeliveryDateListener();
        this.initInvoiceSelects();
        this.initPackagesHoverStates();
        this.initShippingCost(this.shippingMode);
        this.initRemoveAddress();
        this.initEnableSubmitButton();
        this.initUserFastShippingHistory();

        if (hasInvalidItem)
            this.initDeliveryLimit();

        this.initProductCartAmount();
        this.initCartPage();
        this.initShippingTimeTable();
        this.initSeparateProducts();
        this.initShippingTimeLine();
        this.initGiftCardModal();
        this.initSNTracker();
        this.initHandleGaEvents();
        this.initPackageInformSection();

        if (isModuleActive('new_address_modal')) {
            this.initAddressSubmit();
        } else {
            this.initUpdateCities();
            this.initAddAddressModal();
            this.initAddAddressFormSubmit();
            this.initEditAddressModal();
            this.initEditAddressFormSubmit();
            this.initUpdateDistricts();
        }

        this.initJetDeliveryButtonListener();
        if(isModuleActive('shipping_v2')) {
            this.initShippingTypeSelector();
        }

        if(isModuleActive('drop_off')) {
            this.initDropOffModal();
        }

        if(isModuleActive('jet_delivery')){
            this.initQuickDelivery();
        }

        if(isModuleActive('ship_by_seller_checkout')) {
            this.initShipBySellerActions();
            this.initDynamicShippingCost();
        }

        if(isModuleActive('shipping_user_personal_data')) {
            this.initPersonalData();
        }

        this.initHandleBackButton();
    },

    initJetDeliveryButtonListener: function () {
        if (this.initializedJetListener) {
            return;
        }
        this.initializedJetListener = true;
        this.toggleJetDelivery = this.toggleJetDelivery.bind(this);
        $('body').on('click', '.js-toggle-jet-delivery', this.toggleJetDelivery);
    },

    toggleJetDelivery: function (event) {
        var self = this;
        event.stopPropagation();
        this.updateShipmentsAndCartHtml = this.updateShipmentsAndCartHtml.bind(this);
        Services.ajaxGETRequestJSON(
            '/ajax/shipping/',
            {
                with_jet: this.isJetDeliveryApplied === 1 ? 0 : 1
            },
            function (res){
                if(!self.isJetDeliveryApplied) {
                    try {
                        ga('set', 'nonInteraction', true);
                        ga('send', 'event', {
                            eventCategory: 'Shipping Page',
                            eventAction:'Jet Delivery'
                        });
                    } catch (e) {
                    }
                }
                self.updateShipmentsAndCartHtml(res);
            },
            function (err) {

            },
            true,
            true
        );
    },

    updateShipmentsAndCartHtml: function (response) {
        $('#shipping-data').html(response.shippingData);
        $('.js-sticky-cart').html(response.cart);
        this.isJetDeliveryApplied = this.isJetDeliveryApplied == 1 ? 0 : 1;
        $('#js-jet-delivery-enabled-input').val(this.isJetDeliveryApplied);
        this.init();
    },

    initHandleGaEvents: function () {
        if(window.nonInteraction) {
            try {
                ga('set', 'nonInteraction', true);
                ga('send', 'event', {
                    eventCategory: 'Shipping Page',
                    eventAction:'Out of Time Slot',
                });
            } catch (e) {

            }
        }

        // shipping type event
        try {
            var SBSCount = 0;
            var eventActionLabel = "";
            $('.js-normal-delivery [data-is-sbs=1]').map(function () {
                SBSCount += $(this).data('item-count');
            });
            $('.js-normal-delivery [data-is-sbs=0]').map(function () {
                eventActionLabel += $(this).data('shipping-type') + "=" + $(this).data('item-count') + " - ";
            });
            eventActionLabel += "sbs=" + SBSCount;

            ga('set', 'nonInteraction', true);
            ga('send', 'event', {
                eventCategory: 'Shipping Page',
                eventAction: eventActionLabel,
            });
        } catch (e) {
            console.log("GA Error: Shipping Types");
        }

        // Ship by seller event
        try {
            var $toggleToDk = $('.js-toggle-to-dk');

            if($toggleToDk.length > 0) {
                ga('set', 'nonInteraction', true);
                ga('send', 'event', {
                    eventCategory: 'Shipping Page',
                    eventAction:'Ship by seller',
                });
            }

            $(document).on('click', '.js-toggle-to-dk', function(){
                try {
                    ga('set', 'nonInteraction', true);
                    ga('send', 'event', {
                        eventCategory: 'Shipping Page',
                        eventAction: 'Change to DK express',
                    });
                    ga('set', 'nonInteraction', true);
                    ga('send', 'event', {
                        eventCategory: 'Shipping Page',
                        eventAction: 'merge shipping'
                    });
                } catch (e) {
                    console.log("GA Error: Seller Types");
                }
            })

            $(document).on('click', '.js-toggle-to-sbs', function(){
                try {
                    ga('set', 'nonInteraction', true);
                    ga('send', 'event', {
                        eventCategory: 'Shipping Page',
                        eventAction:'Change to ship by seller',
                    });
                }catch (e) {
                }
            })
        } catch (e) {
        }

        // var shippingForm = $('#shipping-data-form');
        // handle multi shipment event
        // var isMultiShipment = !!Number(shippingForm.data('multi-shipment'));
        // types
        // var shipmentType = '';
        // shipmentType += !!Number(shippingForm.data('has-normal')) ? 'normal,' : '';
        // shipmentType += !!Number(shippingForm.data('has-fresh')) ? 'fresh,' : '';
        // shipmentType += !!Number(shippingForm.data('has-heavy')) ? 'heavy' : '';

        // if(isMultiShipment){
        //     try {
        //         ga('set', 'nonInteraction', true);
        //         ga('send', 'event', {
        //             eventCategory: 'Shipping Page',
        //             eventAction: 'Multi Shippment',
        //             eventLabel: shipmentType
        //         });
        //     } catch (e) {}
        // } else {
        //     try {
        //         ga('set', 'nonInteraction', true);
        //         ga('send', 'event', {
        //             eventCategory: 'Shipping Page',
        //             eventAction: 'Single Shippment',
        //             eventLabel: shipmentType
        //         });
        //     } catch (e) {}
        // }
    },

    initShippingTypeSelector: function () {
        var thiz = this;

        $(document).on('change', '.js-shipping-type-selector', function () {
            var $this = $(this),
                shippingId = $this.attr('name'),
                $timeTableContainer = $('[data-shipping-id="' + shippingId + '"'),
                $dropOffContainer = $('[data-drop-off-id="' + shippingId + '"'),
                $altShippingContainer = $('[data-alt-shipping-id="' + shippingId + '"');

            if(isModuleActive('time_table_ab_test')) {
                IndexAction.resetABTestForms();
            }

            if($this.val() === 'alt') {
                $altShippingContainer.removeClass('u-hidden');
                $timeTableContainer.addClass('u-hidden');
                $dropOffContainer.addClass('u-hidden');

                $('#additional-' + shippingId).prop("checked", true).change();
            } else if($this.val() === 'drop-off') {
                $dropOffContainer.removeClass('u-hidden');
                $timeTableContainer.addClass('u-hidden');
                $altShippingContainer.addClass('u-hidden');
                $('#additional-' + shippingId).prop("checked", false).change();
            } else {
                $timeTableContainer.removeClass('u-hidden');
                $dropOffContainer.addClass('u-hidden');
                $altShippingContainer.addClass('u-hidden');

                if(isModuleActive('digiplus_shipping')) {
                    var $additionalOption = $(this).closest('.c-checkout-pack').find('.js-checkout-additional-option'),
                        historyPackageRow = $("." + $additionalOption.data('cost-id')),
                        defaultCost = parseInt(historyPackageRow.data('default-cost')),
                        isPlusPackage = parseInt(historyPackageRow.data('plus-shipping')),
                        isDynamicShipping = parseInt(historyPackageRow.data('dynamic-shipping'));

                    historyPackageRow.data('cost', defaultCost);
                    historyPackageRow.data('post-delivery', 0);

                    historyPackageRow.find('.js-package-row-alt-title').addClass('u-hidden');
                    historyPackageRow.find('.js-package-row-title').removeClass('u-hidden');

                    if(defaultCost > 0) {
                        if (isPlusPackage == 1) {
                            historyPackageRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-plus-free-amount').removeClass('u-hidden');
                            historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                        } else {
                            historyPackageRow.find('.js-package-row-non-free-amount').removeClass('u-hidden');
                            historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-amount').html(Services.convertToFaDigit(Services.formatCurrency(defaultCost, true, '')));
                        }
                    } else {
                        if(isModuleActive('dynamic_shipping_cost_phase_2') && !!isDynamicShipping) {
                            historyPackageRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-select-time-message').removeClass('u-hidden');
                            historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                        } else {
                            historyPackageRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-free-amount').removeClass('u-hidden');
                            historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-select-time-message').addClass('u-hidden');
                        }
                    }
                }

                // FIXME: this is a TOFF way to reset shipping history and should be fixed
                // $('.js-' + thiz.shippingMode + '-delivery input[type="radio"]')
                //     .not('.js-shipping-type-selector').filter(':enabled').first()
                //     .prop('checked', true).change().prop('checked', false);

                $('#additional-' + shippingId).prop("checked", false).change();
            }
        });
    },

    initHandleBackButton: function() {
        window.addEventListener( "pageshow", function ( event ) {
            try {
                var historyTraversal = event.persisted ||
                    ( typeof window.performance != "undefined" &&
                        window.performance.navigation.type === 2 );

                if ( historyTraversal ) {
                    window.location.reload();
                }
            } catch (e) {
            }
        });
    },

    initAddressSubmit: function () {
        var thiz = this;
        var $addressForm = $('#add-edit-address-form');
        var url = '';
        var isSecondTry = false;
        var addressModal = $('[data-remodal-id=add-edit-address]');

        $(document).on('closed', addressModal, function () {
            isSecondTry = false;
        });

        $addressForm.on('submit', function (e) {
            e.preventDefault();

            if (!$addressForm.valid())
                return false;

            if ($(this).data('mode') === 'add') {
                url = '/ajax/shipping/addresses/add/';
            } else if ($(this).data('mode') === 'edit') {
                url = '/ajax/shipping/addresses/edit/' + addressActions.recipient.id + '/'
            } else {
                return ;
            }

            var data = $addressForm.serialize();
            if(isSecondTry) {
                data = data + '&address[novalidate_point]=true';
                isSecondTry = false;
            }

            var addressModal = $('[data-remodal-id=add-edit-address]').remodal();

            Services.ajaxPOSTRequestJSON(
                url,
                data,
                function (response) {
                    IndexAction.ABTestRemoveTimeTableModals();
                    $('#shipping-data').html(response.data);
                    thiz.initCartPage();
                    thiz.initShippingTimeTable();
                    if (response.hasInvalidItems) {
                        $('.js-invalid-items').html(response.invalidData);
                        $('.js-invalid-items-message').text(response.errorMessageForInvalidItems);
                        thiz.initDeliveryLimit();
                    }
                    thiz.initShippingCost(thiz.shippingMode);
                    thiz.initEnableSubmitButton();
                    addressModal.close();
                    $addressForm[0].reset();
                    if (response.changeAddress) {
                        $('.js-sticky-cart').addClass('hidden');
                    } else {
                        $('.js-sticky-cart').removeClass('hidden');
                    }

                    if(isModuleActive('time_table_ab_test')) {
                        IndexAction.initABTest();
                    }
                },
                function (response) {
                    addressModal.open();
                    var $errorItems = $addressForm.find('.js-form-error-items');
                    $errorItems.empty();
                    $.each(response.errors, function (i, item) {
                        if(i === 'point') {
                            isSecondTry = true;
                        }
                        window.DKToast(item);
                    });

                    if(response.shouldReload) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    }

                    $addressForm.find('.js-form-errors').removeClass('u-hidden-visually');
                },
                true,
                true
            );
        });
    },

    initPackageInformSection: function() {
        var thiz = this;

        $(document).on('click', '.js-inform-package-section', function() {
            var radios = $('.js-' + thiz.shippingMode + '-delivery input[type="radio"]');
            var keys = {};

            $.map(radios, function (el) {
                var radioName;

                if (el.name.indexOf('additional-option') === -1) {
                    radioName = el.name;
                } else {
                    radioName = el.name.replace('[additional-option][' + thiz.shippingMode + ']','[time_scopes]');
                }

                keys[radioName] = el.checked || keys[radioName];
            });

            var keysList = Object.keys(keys);

            for(var i=0; i < keysList.length; i++) {
                if(!keys[keysList[i]]) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $('.js-' + thiz.shippingMode + '-delivery input[name="' + keysList[i] + '"]').closest('.js-checkout-pack').offset().top
                    }, 100);
                    break;
                }
            }
        });
    },

    initSelects: function () {
        $('.js-ui-select').selectric();
    },

    setGAClickImpressionEvent: function(productId) {
        if(!productId) return;
        try {
            var productObject = Services.retrieveProductFromDataLayer({
                productId: productId,
                eventName: "eec.productImpression",
                pathArray: ['ecommerce','impressions']
            });

            var productData = removeListNameFromProductObject(productObject);
            var impressionObject = createImpressionObj(productData, Main.gaListName);

            window.dataLayer.push(impressionObject);
        } catch (e) {
            // window.Sentry && window.Sentry.captureException(e);
            // eslint-disable-next-line no-console
            console.warn(e);
        }

        function removeListNameFromProductObject(productObject) {
            var productObjectCopy = Object.assign({}, productObject);

            delete productObjectCopy.list;

            return productObjectCopy;
        }

        function createImpressionObj(productData, listName) {
            return {
                'event': 'eec.impressionClick',
                'ecommerce': {
                    'click': {
                        'actionField': {
                            'list': listName
                        },
                        'products': [productData]
                    }
                }
            }
        }
    },

    initUserFastShippingHistory: function () {
        if (!window.userFastShippingPurchaseHistory ||
            !window.userFastShippingPurchaseHistory.products ||
            window.userFastShippingPurchaseHistory.products.length === 0) {
            return;
        }

        var thiz = this;

        if(isModuleActive('new_shipping_fresh_carousel')) {
            new window.Swiper(".js-shipping-fresh-carousel", {
                slidesPerView: 1,
                slidesPerGroup: 1,
                lazy: {
                    enabled: true
                },
                navigation: {
                    nextEl: ".js-fmcg-recommend-next",
                    prevEl: ".js-fmcg-recommend-prev"
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: true
                },
                on: {
                    slideChange: function () {
                        try{
                            ga('require', 'ec');
                        } catch (e) {
                        }

                        var activeIndex = this.activeIndex;
                        for (var i=activeIndex * 4; i<activeIndex * 4 + 4; i++) {
                            var product = window.userFastShippingPurchaseHistory.products[i];

                            try {
                                ga('ec:addImpression', {
                                    'id': '' + product.id,
                                    'name': product.name,
                                    'category': product.category,
                                    'brand': product.brand,
                                    'list': 'Shipping-FMCG-Recommendation-repeated' + pageNumber,
                                    'price': product.price,
                                    'status': product.status,
                                    'position': i + 1
                                });
                            } catch (e) {
                            }
                        }
                    }
                }
            });

            $('.js-shipping-add-to-cart').click(function () {
                var $this = $(this),
                    idx = $this.data('index'),
                    productId = $this.data('id'),
                    userHasHistory = window.userHasFastShippingPurchaseHistory,
                    product = window.userFastShippingPurchaseHistory.products[idx];

                if(userHasHistory && isModuleActive('ga_shipping_carousel_add_to_cart')) {
                    IndexAction.setGAClickImpressionEvent(productId);
                }

                Services.ajaxGETRequestHTML(
                    $this.data('add-to-cart-url'),
                    null,
                    function () {
                        window.location.reload();
                    },
                    function (data) {
                    },
                    true,
                    true
                );

                try {
                    ga('ec:addProduct', {
                        'id': product.id,
                        'name': product.name,
                        'category': product.category,
                        'brand': product.brand,
                        'variant': product.buy_box_winner,
                        'price': product.price
                    });
                    ga('ec:setAction', 'add');
                    ga('send', 'event', 'Shipping Recommendation', 'add to cart', 'add product from shipping recommendation repeated');
                } catch(e) {
                }
            });

            $(document).on('click', '.js-quantity-selector-add', function () {
                var $this = $(this);
                var itemData = thiz.getQuantityData($this);
                itemData.count += 1;
                thiz.changeItemQuantity(itemData);

            });

            $(document).on('click', '.js-quantity-selector-remove', function () {
                var $this = $(this);
                var itemData = thiz.getQuantityData($this);
                itemData.count -= 1;
                thiz.changeItemQuantity(itemData);
            });

        } else {
            var $container = $('.js-user-fast-shipping-history-products-container');
            var pageNumber = 0;
            var pages = Math.ceil(window.userFastShippingPurchaseHistory.products.length / 4);

            var pagesData = [];
            var temporary = [];
            var products = [];
            var userHasHistory = window.userHasFastShippingPurchaseHistory;

            for (var i = 0; i < pages; i++) {
                for (var j = 0; j < 4; j++) {
                    if (i * 4 + j < (window.userFastShippingPurchaseHistory.products.length)) {
                        temporary.push(window.userFastShippingPurchaseHistory.products[i * 4 + j]);
                    }
                }
                if (temporary.length !== 0)
                    pagesData.push(temporary);
                temporary = [];
            }

            pages = pages - 1;

            function updateProducts() {
                try{
                    ga('require', 'ec');
                } catch (e) {
                }
                products = pagesData[pageNumber];
                $container.html('');
                var product;
                for (var i = 0; i < products.length; i++) {
                    product = products[i];

                    $container.append('<li class="c-fmcg-recommend__product" style="display: block">\n' +
                        '                <div class="c-fmcg-recommend__product-image">\n' +
                        '                    <img title ="' + product.title + '" src="' + product.image + '">\n' +
                        '                </div>\n' +
                        '                <div class="">\n' +
                        '                    <p class="c-fmcg-recommend__product-title">\n' +
                        (product.title.length > 40 ? product.title.slice(0, 40 - 1) + "…" : product.title) + '\n' +
                        '                    </p>\n' +
                        '                    <div class="c-fmcg-recommend__product-price">\n' +
                        '                        <p class="c-fmcg-recommend__product-price-number">\n' +
                        Services.convertToFaDigit(Services.formatCurrency(product.price.selling_price, true, '')) + ' \n' +
                        '                        </p>\n' +
                        '                        <p class="c-fmcg-recommend__product-currency"> تومان</p>\n' +
                        '                    </div>\n' +
                        '                    <div data-add-to-cart-url="' + product.add_to_cart_url + '"' +
                        'class="btn-add-to-cart-mini btn-add-to-cart-mini--centered js-shipping-add-to-cart btn-add-to-cart-mini--shipping">\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '            </li>');

                    try {
                        ga('ec:addImpression', {
                            'id': '' + product.id,
                            'name': product.name,
                            'category': product.category,
                            'brand': product.brand,
                            'list': 'Shipping-FMCG-Recommendation-repeated' + pageNumber,
                            'price': product.price,
                            'status': product.status,
                            'position': i + 1
                        });
                    } catch (e) {
                    }
                }

                $container.on('click', '.js-shipping-add-to-cart', function () {
                    var idx = $(this).parent().parent().index();
                    var product = products[idx];
                    try {
                        ga('ec:addProduct', {
                            'id': product.id,
                            'name': product.name,
                            'category': product.category,
                            'brand': product.brand,
                            'variant': product.buy_box_winner,
                            'price': product.price
                        });
                        ga('ec:setAction', 'add');
                        ga('send', 'event', 'Shipping Recommendation', 'add to cart', 'add product from shipping recommendation repeated');
                    } catch(e) {
                    }
                })
            }

            $('.js-user-fast-shipping-history-arrow-next').on('click', function () {
                pageNumber = (pageNumber < pages ? pageNumber + 1 : pageNumber = 0);
                updateProducts();
            });

            $('.js-user-fast-shipping-history-arrow-prev').on('click', function () {
                pageNumber = (pageNumber > 0 ? pageNumber - 1 : pageNumber = pages);
                updateProducts();
            });

            $container.on('click', '.js-shipping-add-to-cart', function () {

                if (userHasHistory && isModuleActive('ga_shipping_carousel_add_to_cart')) {
                    var productId = $(this).data('id');
                    IndexAction.setGAClickImpressionEvent(productId);
                }

                Services.ajaxGETRequestHTML(
                    $(this).data('add-to-cart-url'),
                    null,
                    function () {
                        window.location.reload();
                    },
                    function (data) {
                    }
                );

            });

            updateProducts();
        }
    },

    getQuantityData: function (thiz) {
        var $countDiv = thiz.closest('.c-quantity-selector').find('.js-quantity-selector-count');

        return {
            variantId: $countDiv.data('id'),
            count: Number(Services.convertToEnDigit($countDiv.text())),
        };
    },

    changeItemQuantity: function (itemData) {
        Services.ajaxGETRequestJSON(
            '/cart/change/' + itemData.variantId + '/' + itemData.count + '/',
            {},
            function () {
                window.location.reload();
            }, function (response) {
                if (response.errors !== undefined) {
                    DKAlert(response.errors[0]);
                }
            },
            false,
            true
        );
    },

    initSelectProvince: function (provinceName) {
        var id = $('.js-select-state option').filter(function () {
            return $(this).html() == provinceName;
        }).val();
        $('.js-select-state').val(id).selectric('refresh').change();
    },

    initUpdateCities: function () {
        var thiz = this;
        $(document).on('change', '.js-select-state', function () {
            var $thiz = $(this);
            var $form = $thiz.closest('form');
            var stateId = $thiz.val();
            var $citySelector = $form.find('.js-select-city');

            if (!stateId || stateId.length === 0)
                return;

            Services.ajaxGETRequestJSON(
                '/ajax/state/cities/' + stateId + '/',
                null,
                function (data) {
                    $citySelector.children('select .js-not-empty').remove();
                    $.each(data, function (index, city) {
                        $('<option>').val(city.id).text(city.name).addClass('js-not-empty').appendTo($citySelector);
                        if (thiz.selectedCityName.length > 0 && city.name == thiz.selectedCityName) {
                            thiz.selectedCityId = city.id;
                        }
                    });

                    if (thiz.selectedCityId > 0) {
                        $citySelector.val(thiz.selectedCityId);
                    }

                    $citySelector.selectric('refresh').change();
                    $('.js-district-wrapper').hide();
                },
                function (data) {
                    console.log(data.errors);
                }
            );
        });
    },

    initUpdateDistricts: function () {
        var thiz = this;
        $('.js-district-wrapper').hide();
        $(document).on('change', '.js-select-city', function () {
            var $thiz = $(this);
            var $form = $thiz.closest('form');
            var cityId = $thiz.val();
            var $districtSelector = $form.find('.js-select-district');

            if (!cityId || cityId.length === 0) {
                return;
            }

            Services.ajaxGETRequestJSON(
                '/ajax/city/districts/' + cityId + '/',
                null,
                function (data) {
                    if (data.length !== 0) {
                        $('.js-district-wrapper').show();
                    } else {
                        $('.js-district-wrapper').hide();
                        $districtSelector.children('select .js-not-empty').remove();
                        $districtSelector.selectric('refresh');
                    }

                    $districtSelector.children('select .js-not-empty').remove();
                    $.each(data, function (index, district) {
                        $('<option>').val(district.id).text(district.name).addClass('js-not-empty').appendTo($districtSelector);
                    });

                    if (thiz.selectedDistrictId > 0) {
                        $districtSelector.val(thiz.selectedDistrictId);
                    }

                    $districtSelector.selectric('refresh').change();

                    $(document).trigger(jQuery.Event('mapInit'));
                },
                function (data) {
                    console.log(data.errors);
                }
            );
        });
        $(document).on('change', '.js-select-city, .js-select-district, .js-select-state', function () {
            $(this).selectric('refresh');
        })
    },

    initAddAddressModal: function () {
        var thiz = this;

        $(document).on('click', '.js-add-address-btn', function () {
            $('#add-address-form .js-form-errors').addClass('u-hidden-visually');
            $('#add-address-form .js-form-error-items').empty();
            var addAddressModal = $('[data-remodal-id=add-address]').remodal();
            $(document).off('change.map', '.js-select-state, .js-select-city, .js-select-district, textarea[name="address[address]"]');
            thiz.initAddAddressForm();
            addAddressModal.open();
            // $('#add-address-form [name = "address[lat]"]').val('35.732474329636865').change();
            // $('#add-address-form [name = "address[lng]"]').val('51.42287135124207').change();
            if (isModuleActive('address_geolocation')) {
                $(document).off('change.map', '.js-select-state, .js-select-city, .js-select-district, textarea[name="address[address]"]');
                MapActions.initGoogleMap(thiz, 'map_add');
            }
        });
    },

    initEditAddressModal: function () {
        var thiz = this;
        var recipient;
        var isFirst = false;

        $(document).on('click', '.js-edit-address-btn', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var $container = $(this).closest('.js-user-address-container');
            recipient = $container.data('address');
            $('#edit-address-form .js-form-errors').addClass('u-hidden-visually');
            $('#edit-address-form .js-form-error-items').empty();
            var editAddressModel = $('[data-remodal-id=edit-address]').remodal();
            editAddressModel.open();
            $(document).off('change.map', '.js-select-state, .js-select-city, .js-select-district, textarea[name="address[address]"]');
            thiz.initEditAddressForm(recipient);
            isFirst = true;
            // $('#edit-address-form [name = "address[lat]"]').val('35.732474329636865').change();
            // $('#edit-address-form [name = "address[lng]"]').val('51.42287135124207').change();
        });

        $(document).on('mapInit', function () {
            if (isModuleActive('address_geolocation') && isFirst) {
                MapActions.initGoogleMap(thiz, 'map_edit', {lat: recipient.map_lat, lng: recipient.map_lon});
                isFirst = false;
            }
        })
    },

    initChangeDefaultAddress: function () {
        var thiz = this;
        $(document).on('click', '.js-change-default-address, .js-address-box', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var addressId = $(this).attr('data-id');
            var isShared = $(this).data('is-shared');
            var $isSharedAddressMessage = $('.js-is-shared-address-message');

            Services.ajaxGETRequestJSON(
                '/ajax/shipping/' + (isShared ? 'shared-addresses' : 'address') + '/default/' + addressId + '/',
                {},
                function (response) {
                    IndexAction.ABTestRemoveTimeTableModals();
                    if(response.nonInteraction) {
                        try {
                            ga('set', 'nonInteraction', true);
                            ga('send', 'event', {
                                eventCategory: 'Shipping Page',
                                eventAction:'Out of Time Slot',
                            });
                        } catch (e) {

                        }
                    }
                    $('#shipping-data').html(response.data);
                    thiz.initCartPage();
                    thiz.initShippingTimeTable();
                    if (response.hasInvalidItems) {
                        $('.js-invalid-items').html(response.invalidData);
                        $('.js-invalid-items-message').text(response.errorMessageForInvalidItems);
                        thiz.initDeliveryLimit();
                    }

                    $('.js-sticky-cart').html(response.stickyCart);
                    $('.js-shippment-type input[name="shipping[type]"]').first().change();

                    thiz.initShippingCost(thiz.shippingMode);
                    thiz.initEnableSubmitButton();
                    $('#cancel-change-address-btn').click();
                    if (response.changeAddress) {
                        $('.js-sticky-cart').addClass('hidden');
                    } else {
                        $('.js-sticky-cart').removeClass('hidden');
                    }

                    if (isModuleActive('shared_address')) {
                        if (isShared) {
                            $isSharedAddressMessage.removeClass('u-hidden').show();
                        } else {
                            $isSharedAddressMessage.hide();
                        }
                    }

                    if(isModuleActive('time_table_ab_test')) {
                        IndexAction.initABTest();
                    }

                    if(response.errorMessage) {
                        window.DKToast(response.errorMessage)
                    }
                },
                function (response) {
                    if(isModuleActive('shipping_user_personal_data') && response.meta &&  response.meta.required.length > 0) {
                        thiz.openUserPersonalInfoModal(response.meta.required, addressId);
                    } else if(response.errors) {
                        window.DKAlert(response.errors[0]);
                    }
                },
                true,
                true
            );

        });
    },

    initRemoveAddress: function () {
        var thiz = this;
        $(document).on('click', '.js-remove-address-btn', function (e) {
            e.stopPropagation();
            var $this = $(this);
            var csrf = $(this).data('token');

            DKConfirm(
                'آیا مطمئنید که این آدرس حذف شود؟',
                function () {
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/shipping/address/remove/' + $this.data('id') + '/',
                        {token: csrf},
                        function (response) {
                            IndexAction.ABTestRemoveTimeTableModals();
                            $('#shipping-data').html(response.data);
                            thiz.initCartPage();
                            thiz.initShippingTimeTable();
                            if (response.hasInvalidItems) {
                                $('.js-invalid-items').html(response.invalidData);
                                $('.js-invalid-items-message').text(response.errorMessageForInvalidItems);
                                thiz.initDeliveryLimit();
                            }
                            thiz.initShippingCost(thiz.shippingMode);
                            thiz.initEnableSubmitButton();
                            $('#cancel-change-address-btn').click();
                            if (response.changeAddress) {
                                $('.js-sticky-cart').addClass('hidden');
                            } else {
                                $('.js-sticky-cart').removeClass('hidden');
                            }

                            if(isModuleActive('time_table_ab_test')) {
                                IndexAction.initABTest();
                            }
                        },
                        function (response) {

                        },
                        true,
                        true
                    );
                },
                function () {
                },
                'بله',
                'خیر'
            );
        });
    },

    initCancelAddressModal: function () {
        $('.js-cancel-add-address').click(function (e) {
            e.preventDefault();
            var addAddressModel = $('[data-remodal-id=add-address]').remodal();
            addAddressModel.close();
        });

        $('.js-cancel-edit-address').click(function (e) {
            e.preventDefault();
            var editAddressModel = $('[data-remodal-id=edit-address]').remodal();
            editAddressModel.close();
        });
    },

    initPackagesHoverStates: function () {
        $(document).on('mouseover', '.js-checkout-pack-items', function (e) {
            $(this).closest('.js-checkout-pack').addClass('is-hover-items');
            setTimeout(function () {
                dispatchEvent(new Event('scroll'));
            }, 100);
        });

        $(document).on('mouseout', '.js-checkout-pack-items', function (e) {
            $(this).closest('.js-checkout-pack').removeClass('is-hover-items');
        });
    },

    initChangeAddress: function () {
        $(document).on('click', '#change-address-btn', function (e) {
            e.stopPropagation();
            e.preventDefault();
            if ($('.js-recipient-box').length === 1) {
                $('.js-add-address-btn').trigger('click');
            } else {
                $('#user-default-address-container').hide();
                $('#user-address-list-container').show();

                if(isModuleActive('drop_off')) {
                    $('.js-ui-tab-pill[data-tab-pill-id="userAddresses"]').click();
                }
            }
        });

        $(document).on('click', '#change-to-dropoff-address', function (e) {
            e.stopPropagation();
            e.preventDefault();

            $('#user-default-address-container').hide();
            $('#user-address-list-container').show();
            $('.js-ui-tab-pill[data-tab-pill-id="dropOff"]').click();
        });

        $(document).on('click', '#cancel-change-address-btn', function () {
            $('#user-address-list-container').hide();
            $('#user-default-address-container').show();
        });
    },

    initAddAddressForm: function () {
        this.selectedDistrictId = 0;
        this.selectedCityId = 0;

        var $addAddressForm = $('#add-address-form');

        $addAddressForm.validate({
            ignore: [],
            rules: {
                'address[full_name]': {
                    required: true,
                    rangelength: [3, 255]
                },
                'address[mobile_phone]': {
                    mobile_phone: true,
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
                'address[phone]': {
                    required: false,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
                'address[state_id]': {
                    required: true
                },
                'address[city_id]': {
                    required: true
                },
                'province': {
                    required: true
                },
                'address[district_id]': {
                    required: {
                        depends: function (element) {
                            return $('.js-district-wrapper').is(':visible');
                        }
                    }
                },
                'address[post_code]': {
                    required: true,
                    digits: true,
                    rangelength: [10, 10]
                },
                'address[address]': {
                    required: true,
                    minlength: 10,
                    maxlength: 350,
                    notOnlyNumber: true,
                    notEmailAddress: true
                },
                'address[bld_num]': {
                    required: true,
                    maxlength: 10,
                }
            },
            messages: {
                'address[full_name]': {
                    'required': 'فیلد الزامی است',
                    'rangelength': 'نام را درست وارد نمایید'
                },
                'address[mobile_phone]': {
                    'required': 'فیلد الزامی است',
                    'digits': 'شماره موبایل را درست وارد نمایید',
                    'minlength': 'شماره موبایل را کامل وارد نمایید',
                    'maxlength': 'شماره موبایل را درست وارد نمایید',
                    'mobile_phone': 'شماره موبایل نامعتبر است'
                },
                'address[phone]': {
                    'digits': 'شماره تلفن ثابت را درست وارد نمایید',
                    'minlength': 'شماره تلفن ثابت را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن ثابت را درست وارد نمایید',
                    'landline_phone': 'شماره تلفن ثابت نامعتبر است'
                },
                'province': {
                    'required': 'فیلد الزامی است'
                },
                'address[state_id]': {
                    'required': 'فیلد الزامی است'
                },
                'address[city_id]': {
                    'required': 'فیلد الزامی است'
                },
                'address[district_id]': {
                    'required': 'فیلد الزامی است'
                },
                'address[post_code]': {
                    'required': 'کد پستی الزامی است',
                    'digits': 'فقط مقدار عددی مجاز است',
                    'rangelength': 'کد پستی را درست وارد نمایید'
                },
                'address[address]': {
                    'required': 'فیلد الزامی است',
                    'minlength': 'آدرس وارد شده کوتاه است',
                    'maxlength': 'لطفا آدرس را کوتاه‌تر وارد نمایید',
                    'notOnlyNumber': 'آدرس وارد شده نمی تواند فقط شامل اعداد باشد',
                    'notEmailAddress': 'آدرس نمی تواند شامل ایمیل باشد'
                },
                'address[bld_num]': {
                    'required': 'پلاک را وارد نمایید',
                    'maxlength': 'شماره پلاک را درست وارد نمایید'
                }
            }
        });

        $('.js-ui-select').on('change', function () {
            $(this).valid();
        });

        $('.remodal[data-remodal-id=add-address]').on('closed', function(){
            $addAddressForm.data('validator').resetForm();
        });
    },

    initAddAddressFormSubmit: function () {
        var thiz = this;
        var $addAddressForm = $('#add-address-form');

        $addAddressForm.on('submit', function (e) {
            e.preventDefault();

            if (!$addAddressForm.valid())
                return false;

            var addAddressModel = $('[data-remodal-id=add-address]').remodal();

            Services.ajaxPOSTRequestJSON(
                '/ajax/shipping/addresses/add/',
                $addAddressForm.serialize(),
                function (response) {
                    IndexAction.ABTestRemoveTimeTableModals();
                    $('#shipping-data').html(response.data);
                    thiz.initCartPage();
                    thiz.initShippingTimeTable();
                    if (response.hasInvalidItems) {
                        $('.js-invalid-items').html(response.invalidData);
                        $('.js-invalid-items-message').text(response.errorMessageForInvalidItems);
                        thiz.initDeliveryLimit();
                    }
                    thiz.initShippingCost(thiz.shippingMode);
                    thiz.initEnableSubmitButton();
                    addAddressModel.close();
                    $addAddressForm[0].reset();
                    if (response.changeAddress) {
                        $('.js-sticky-cart').addClass('hidden');
                    } else {
                        $('.js-sticky-cart').removeClass('hidden');
                    }

                    $('.js-sticky-cart').html(response.stickyCart);
                    $('.js-shippment-type input[name="shipping[type]"]').first().change();

                    if(isModuleActive('time_table_ab_test')) {
                        IndexAction.initABTest();
                    }
                },
                function (response) {
                    addAddressModel.open();
                    var $errorItems = $addAddressForm.find('.js-form-error-items');
                    $errorItems.empty();
                    $.each(response.errors, function (i, item) {
                        $errorItems.append('<p>' + __(item) + '</p>');
                    });

                    $addAddressForm.find('.js-form-errors').removeClass('u-hidden-visually');
                },
                true,
                true
            );
        });
    },

    initEditAddressForm: function (recipient) {
        var thiz = this;
        thiz.recipient = recipient;

        var $editAddressForm = $('#edit-address-form');

        $editAddressForm.find('.js-input-full_name').val(recipient.full_name);
        $editAddressForm.find('.js-input-mobile_phone').val(recipient.mobile_phone);
        if (isModuleActive('address_landline')) {
            var landLinePhone = '';
            if (recipient.phone_code !== null && recipient.phone !== null) {
                landLinePhone = recipient.phone_code + recipient.phone;
            }
            $editAddressForm.find('.js-input-landline_phone').val(landLinePhone);
        }
        $editAddressForm.find('.js-input-post_code').val(recipient.post_code);
        $editAddressForm.find('.js-input-address').val(recipient.address);
        $editAddressForm.find('.js-input-bld_num').val(recipient.building_no);
        $editAddressForm.find('.js-input-apt_id').val(recipient.unit);
        $editAddressForm.find('.js-select-state').val(recipient.state_id).selectric('refresh').change();
        thiz.selectedCityId = recipient.city_id;
        $editAddressForm.find('.js-select-city').val(thiz.selectedCityId);

        if (recipient.district_id) {
            thiz.selectedDistrictId = recipient.district_id;
            $editAddressForm.find('.js-select-district').val(thiz.selectedDistrictId).selectric('refresh');
        }

        $editAddressForm.validate({
            rules: {
                'address[full_name]': {
                    required: true,
                    rangelength: [3, 255]
                },
                'address[mobile_phone]': {
                    mobile_phone: true,
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
                'address[phone]': {
                    required: false,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
                'address[state_id]': {
                    required: true
                },
                'address[city_id]': {
                    required: true
                },
                'province': {
                    required: true
                },
                'address[district_id]': {
                    required: {
                        depends: function (element) {
                            return $('.js-district-wrapper').is(':visible');
                        }
                    }
                },
                'address[post_code]': {
                    required: true,
                    digits: true,
                    rangelength: [10, 10]
                },
                'address[address]': {
                    required: true,
                    minlength: 10,
                    maxlength: 350,
                    notOnlyNumber: true,
                    notEmailAddress: true
                },
                'address[bld_num]': {
                    required: true,
                    maxlength: 10,
                }
            },
            messages: {
                'address[full_name]': {
                    'required': 'فیلد الزامی است',
                    'rangelength': 'نام را درست وارد نمایید'
                },
                'address[mobile_phone]': {
                    'required': 'فیلد الزامی است',
                    'digits': 'شماره موبایل را درست وارد نمایید',
                    'minlength': 'شماره موبایل را کامل وارد نمایید',
                    'maxlength': 'شماره موبایل را درست وارد نمایید',
                    'mobile_phone': 'شماره موبایل نامعتبر است'
                },
                'address[phone]': {
                    'digits': 'شماره تلفن ثابت را درست وارد نمایید',
                    'minlength': 'شماره تلفن ثابت را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن ثابت را درست وارد نمایید',
                    'landline_phone': 'شماره تلفن ثابت نامعتبر است'
                },
                'province': {
                    'required': 'فیلد الزامی است'
                },
                'address[state_id]': {
                    'required': 'فیلد الزامی است'
                },
                'address[city_id]': {
                    'required': 'فیلد الزامی است'
                },
                'address[post_code]': {
                    'required': 'فیلد الزامی است',
                    'digits': 'فقط مقدار عددی مجاز است',
                    'rangelength': 'کد پستی را درست وارد نمایید'
                },
                'address[address]': {
                    'required': 'فیلد الزامی است',
                    'minlength': 'آدرس وارد شده کوتاه است',
                    'maxlength': 'لطفا آدرس را کوتاه‌تر وارد نمایید',
                    'notOnlyNumber': 'آدرس وارد شده نمی تواند فقط شامل اعداد باشد',
                    'notEmailAddress': 'آدرس نمی تواند شامل ایمیل باشد'
                },
                'address[bld_num]': {
                    'required': 'پلاک را وارد نمایید',
                    'maxlength': 'شماره پلاک را درست وارد نمایید'
                }
            }
        });
        $('.js-ui-select').on('change', function () {
            $(this).valid();
        });

        $('.remodal[data-remodal-id=edit-address]').on('closed', function(){
            $editAddressForm.data('validator').resetForm();
        });
    },

    initEditAddressFormSubmit: function () {
        var thiz = this;
        var $editAddressForm = $('#edit-address-form');

        $editAddressForm.on('submit', function (e) {
            e.preventDefault();

            if (!$editAddressForm.valid())
                return false;

            var editAddressModel = $('[data-remodal-id=edit-address]').remodal();

            Services.ajaxPOSTRequestJSON(
                '/ajax/shipping/addresses/edit/' + thiz.recipient.id + '/',
                $editAddressForm.serialize(),
                function (response) {
                    $('#shipping-data').html(response.data);
                    thiz.initCartPage();
                    thiz.initShippingTimeTable();
                    if (response.hasInvalidItems) {
                        $('.js-invalid-items').html(response.invalidData);
                        $('.js-invalid-items-message').text(response.errorMessageForInvalidItems);
                        thiz.initDeliveryLimit();
                    }
                    thiz.initShippingCost(thiz.shippingMode);
                    thiz.initEnableSubmitButton();
                    editAddressModel.close();

                    $('.js-sticky-cart').html(response.stickyCart);
                    $('.js-shippment-type input[name="shipping[type]"]').first().change();

                    if (response.changeAddress) {
                        $('.js-sticky-cart').addClass('hidden');
                    } else {
                        $('.js-sticky-cart').removeClass('hidden');
                    }

                    if(isModuleActive('time_table_ab_test')) {
                        IndexAction.initABTest();
                    }
                },
                function (response) {
                    editAddressModel.open();
                    var $errorItems = $editAddressForm.find('.js-form-error-items');
                    $errorItems.empty();
                    $.each(response.errors, function (i, item) {
                        $errorItems.append('<p>' + __(item) + '</p>');
                    });

                    $editAddressForm.find('.js-form-errors').removeClass('u-hidden-visually');
                },
                true,
                true
            );
        });
    },

    initShippingType: function () {
        var self = this;
        $(document).on('change', '.js-shippment-type input[name="shipping[type]"]', function () {
            var mode = $(this).val();
            var container = $(this).parent().parent();
            container.siblings('.is-active').removeClass('is-active');
            container.addClass('is-active');
            if (mode === 'fast') {
                $('.js-eco-delivery').hide();
                $('.js-normal-delivery').hide();
                $('.js-fast-delivery').show();
                self.shippingMode = 'fast';

                if(isModuleActive('digiclub_multiple_shipment')) {
                    $('.js-digiclub-eco-delivery-point').hide();
                    $('.js-digiclub-normal-delivery-point').hide();
                    $('.js-digiclub-fast-delivery-point').show();
                }
            } else if (mode === 'eco') {
                $('.js-fast-delivery').hide();
                $('.js-normal-delivery').hide();
                $('.js-eco-delivery').show();
                self.shippingMode = 'eco';

                if(isModuleActive('digiclub_multiple_shipment')) {
                    $('.js-digiclub-fast-delivery-point').hide();
                    $('.js-digiclub-normal-delivery-point').hide();
                    $('.js-digiclub-eco-delivery-point').show();
                }
            } else {
                $('.js-fast-delivery').hide();
                $('.js-eco-delivery').hide();
                $('.js-normal-delivery').show();
                self.shippingMode = 'normal';

                if(isModuleActive('digiclub_multiple_shipment')) {
                    $('.js-digiclub-eco-delivery-point').hide();
                    $('.js-digiclub-fast-delivery-point').hide();
                    $('.js-digiclub-normal-delivery-point').show();
                }
            }
            if(isModuleActive('time_table_ab_test')) {
                IndexAction.resetABTestForms('shippingType');
            }
            self.initShippingCost(mode);
            self.initEnableSubmitButton();
        });
    },

    initDynamicShippingCost: function() {
        var costDayClass, costRowClass, dataAttrName;
        if(isModuleActive('dynamic_shipping_cost_phase_2')) {
            costDayClass = '.js-handle-dynamic-shipping-hour';
            costRowClass = '.js-dynamic-shipping-cost';
            dataAttrName = 'dynamic-shipping-cost';
        } else {
            costDayClass = '.js-handle-sbs-day';
            costRowClass = '.js-seller-shipping-cost';
            dataAttrName = 'seller-shipping-cost';
        }

        $(document).on('click', costDayClass, function(){
            var $dayRow = $(this).find(costRowClass),
                dayCost = $dayRow.data(dataAttrName),
                $dayHistoryRow = $($dayRow.data('history-row-id'));

            $dayHistoryRow.data('cost', dayCost);
            $dayHistoryRow.find('.js-select-time-message').addClass('u-hidden');

            if(isModuleActive('dynamic_shipping_cost_phase_2')) {
                $dayHistoryRow.data('default-cost', dayCost);
            }

            if(dayCost > 0) {
                $dayHistoryRow.find('.js-package-row-non-free-amount').removeClass('u-hidden');
                $dayHistoryRow.find('.js-package-row-free-amount').addClass('u-hidden');
                $dayHistoryRow.find('.js-package-row-amount').html(Services.convertToFaDigit(Services.formatCurrency(dayCost, true, '')));
            } else {
                $dayHistoryRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                $dayHistoryRow.find('.js-package-row-free-amount').removeClass('u-hidden');
            }
        })
    },

    initShippingCost: function (shippingType) {
        var totalCost = 0;
        var hasPostPayed = false;
        var hasPostDelivery = false;
        var hasPlusPackage = false;
        var hasDynamicShipping = false;
        var cartPayablePrice = parseInt($('#cartPayablePrice .js-price').attr('data-price'));
        var $dynamicShippingMsg = $('.js-dynamic-shipping-msg');
        var $billBox = $('.js-checkout-aside');

        $('.js-' + shippingType + '-delivery .js-package-row').each(function (index, elem) {
            var $elem = $(elem),
                cost = parseInt($elem.data('cost')),
                isPlusPackage = parseInt($elem.data('plus-shipping'));

            if(isModuleActive('digiplus_shipping')) {
                hasPostDelivery = (parseInt($elem.data("post-delivery")) == 1) ? true : false;

                if(isPlusPackage) {
                    hasPlusPackage = true;
                    if (hasPostDelivery) {
                        totalCost += cost;
                    }
                } else {
                    totalCost += cost;

                    if(!hasPostDelivery && parseInt($elem.data("dynamic-shipping")) == 1) {
                        hasDynamicShipping = true;
                    }
                }

            } else {
                totalCost += cost;
            }

            if (parseInt($elem.data("post-payed")) == 1) {
                hasPostPayed = true;
            }
        });

        if (totalCost > 0) {
            $('.js-not-free-shipping').removeClass('hidden');
            $('.js-free-shipping').addClass('hidden');
            $dynamicShippingMsg.addClass('hidden');
            $('.js-dynamic-shipping-cost-notice').removeClass('hidden');
            if(isModuleActive('digiplus_shipping')) {
                $('.js-plus-free-shipping').addClass('hidden');
            }
        } else {
            // $('.js-time-table-container input[type=radio]:checked').length > 0)
            var dynamicTimeTableCount =  $('.js-dynamic-time-table-container:visible').length;
            var dynamicCheckedTimeTableCount =  $('.js-dynamic-time-table-container:visible input[type=radio]:checked').length;

            // show dynamic shipping message
            if(isModuleActive('dynamic_shipping_cost_phase_2') && hasDynamicShipping && dynamicCheckedTimeTableCount < dynamicTimeTableCount) {
                $('.js-free-shipping').addClass('hidden');
                $('.js-not-free-shipping').addClass('hidden');
                $('.js-dynamic-shipping-cost-notice').addClass('hidden');
                $dynamicShippingMsg.removeClass('hidden');
                $('.js-plus-free-shipping').addClass('hidden');
            } else {
                $dynamicShippingMsg.addClass('hidden');
                $('.js-free-shipping').removeClass('hidden');
                $('.js-not-free-shipping').addClass('hidden');
                $('.js-dynamic-shipping-cost-notice').addClass('hidden');
                if(isModuleActive('digiplus_shipping')) {
                    if(hasPlusPackage) {
                        $('.js-plus-free-shipping').removeClass('hidden');
                        $('.js-free-shipping').addClass('hidden');
                    } else {
                        $('.js-plus-free-shipping').addClass('hidden');
                    }
                }
            }
        }

        if (hasPostPayed) {
            if (totalCost === 0) {
                $('.js-shipping-divider').addClass('hidden');
                $('.js-free-shipping').addClass('hidden');
                $('.js-plus-free-shipping').addClass('hidden');
                $('.js-shipping-post-paid').removeClass('hidden');
            } else {
                $('.js-shipping-divider').removeClass('hidden');
                $('.js-shipping-post-paid').removeClass('hidden');
            }
        } else {
            $('.js-shipping-divider').addClass('hidden');
            $('.js-shipping-post-paid').addClass('hidden');
        }

        cartPayablePrice += totalCost;
        totalCost = Services.convertToFaDigit(Services.formatCurrency(totalCost, true, ''));
        cartPayablePrice = Services.convertToFaDigit(Services.formatCurrency(cartPayablePrice, true, ''));
        $('.js-shipping-cost').text(totalCost);
        $('.js-price').text(cartPayablePrice);
    },

    initSaveShippingData: function () {

        if (false) {
            var $form = $('#shipping-data-form');

            $form.validate({
                rules: {
                    'giftCardEmail': {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    'giftCardEmail': {
                        'required': 'ایمیل وارد نشده است',
                        'email': 'ایمیل نامعتبر است'
                    }
                }
            });
        }

        $('.js-save-shipping-data').click(function () {
            $('#shipping-data-form').submit();
        });
    },

    initShippingTimeLine: function () {
        $('.js-shipping-timeline').off().on('click', function (e) {
            e.preventDefault();
            $('.js-save-shipping-data').trigger('click')
        });
    },

    initEnableSubmitButton: function () {
        var button = $('.js-save-shipping-data');
        var nextToPayment = $('.js-shipping-timeline');
        var additionalButton = $('.js-checkout-additional-option');//.not(':hidden');
        var informPackageSection = $('.js-inform-package-section');
        var uncheckedPackageCount = $('.js-unchecked-package-count');
        var self = this;
        var radios = $('.js-' + this.shippingMode + '-delivery input[type="radio"]').not('.js-shipping-type-selector');

        var keys = {};
        var arr = $.map(radios, function (el) {
            if (el.name.indexOf('additional-option') === -1 &&
                el.name.indexOf('shipping-type') === -1 &&
                el.name.indexOf('time-table') === -1) {
                keys[el.name] = true;
            }

            return el.name;
        });

        var groups = Object.keys(keys).length;

        var activeRadioCount = radios.filter(':visible').filter(':checked').length;

        activeRadioCount < groups ? nextToPayment.removeAttr('href') : nextToPayment.attr('href', '/payment/');

        if(activeRadioCount < groups) {
            button.hide();
            informPackageSection.show();
            uncheckedPackageCount.text(Services.convertToFaDigit(groups - activeRadioCount));
        } else {
            button.show();
            informPackageSection.hide();
        }

        radios.on('change', function () {
            var changedActiveRadioCount = radios.filter(':visible').filter(':checked').length;
            changedActiveRadioCount < groups ? nextToPayment.removeAttr('href') : nextToPayment.attr('href', '/payment/');
            if ($(this).is(':checked')) {
                $(this).closest('.js-shipment-submit-type').addClass('active');
                var $additionalOption = $(this).closest('.c-checkout-pack').find('.js-checkout-additional-option');
                var historyPackageRow = $("." + $additionalOption.data('cost-id')),
                    defaultCost = parseInt(historyPackageRow.data('default-cost')),
                    isPlusPackage = parseInt(historyPackageRow.data('plus-shipping'));

                historyPackageRow.data('cost', defaultCost);
                historyPackageRow.data('post-delivery', 0);

                historyPackageRow.find('.js-package-row-alt-title').addClass('u-hidden');
                historyPackageRow.find('.js-package-row-title').removeClass('u-hidden');

                if(defaultCost > 0) {
                    if(isModuleActive('digiplus_shipping')) {
                        if (isPlusPackage == 1) {
                            historyPackageRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-plus-free-amount').removeClass('u-hidden');
                            historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                        } else {
                            historyPackageRow.find('.js-package-row-non-free-amount').removeClass('u-hidden');
                            historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                            historyPackageRow.find('.js-package-row-amount').html(Services.convertToFaDigit(Services.formatCurrency(defaultCost, true, '')));
                        }
                    } else {
                        historyPackageRow.find('.js-package-row-non-free-amount').removeClass('u-hidden');
                        historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                        historyPackageRow.find('.js-package-row-amount').html(Services.convertToFaDigit(Services.formatCurrency(defaultCost, true, '')));
                    }
                } else {
                    historyPackageRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                    historyPackageRow.find('.js-package-row-free-amount').removeClass('u-hidden');
                    if(isModuleActive('digiplus_shipping')) {
                        historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                    }
                }

                $additionalOption.prop('checked', false);
                $additionalOption.closest('.js-shipment-submit-type').removeClass('active');
                self.initShippingCost(self.shippingMode);
            }

            changedActiveRadioCount = radios.filter(':visible').filter(':checked').length;

            if(changedActiveRadioCount < groups) {
                button.hide();
                informPackageSection.show();
                uncheckedPackageCount.text(Services.convertToFaDigit(groups - changedActiveRadioCount));
            } else {
                button.show();
                informPackageSection.hide();
            }
        });

        button.css('pointer-events', 'all');
        button.css('cursor', 'pointer');

        button.off();
        button.on('click', function (e) {
            e.preventDefault();
            if (!$(this).hasClass('disabled')) {
                if(isModuleActive('mandatory_location_shipping')) {
                    var addressData = $('#user-default-address-container').data('address');
                    if(parseFloat(addressData.map_lat) === 0.0 && parseFloat(addressData.map_lon) === 0.0) {
                        $('.js-add-location-btn').data('is-submit', true).data('address', Services.convertToFaDigit(addressData.full_address)).click();
                        return;
                    }
                }
                $('#shipping-data-form').submit();
            }
        });

        additionalButton.off();
        additionalButton.on('change', function (e) {
            var changedActiveRadioCount = radios.filter(':visible').filter(':checked').length;

            if(changedActiveRadioCount < groups) {
                button.hide();
                informPackageSection.show();
                uncheckedPackageCount.text(Services.convertToFaDigit(groups - changedActiveRadioCount));
            } else {
                button.show();
                informPackageSection.hide();
            }

            if ($(this).is(':checked')) {
                $(this).closest('.js-shipment-submit-type').addClass('active');
                var $checkoutPack = $(this).closest('.c-checkout-pack'),
                    $mainOption = $checkoutPack.find('input[type="radio"]').not($(this)).not('.js-shipping-type-selector'),
                    historyPackageRow = $("." + $checkoutPack.find('.js-package-shipping-cost').data('cost-id')),
                    altCost = parseInt(historyPackageRow.data('alt-cost'));

                historyPackageRow.data('cost', altCost);
                historyPackageRow.data('post-delivery', 1);

                historyPackageRow.find('.js-package-row-alt-title').removeClass('u-hidden');
                historyPackageRow.find('.js-package-row-title').addClass('u-hidden');

                if(altCost > 0) {
                    historyPackageRow.find('.js-package-row-non-free-amount').removeClass('u-hidden');
                    historyPackageRow.find('.js-package-row-free-amount').addClass('u-hidden');
                    historyPackageRow.find('.js-select-time-message').addClass('u-hidden');
                    historyPackageRow.find('.js-package-row-amount').html(Services.convertToFaDigit(Services.formatCurrency(altCost, true, '')));
                    if(isModuleActive('digiplus_shipping')) {
                        historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                    }
                } else {
                    historyPackageRow.find('.js-package-row-non-free-amount').addClass('u-hidden');
                    historyPackageRow.find('.js-select-time-message').addClass('u-hidden');
                    historyPackageRow.find('.js-package-row-free-amount').removeClass('u-hidden');
                    if(isModuleActive('digiplus_shipping')) {
                        historyPackageRow.find('.js-package-row-plus-free-amount').addClass('u-hidden');
                    }
                }

                $mainOption.prop('checked', false).change();
                $mainOption.closest('.js-shipment-submit-type').removeClass('active');
            }

            self.initShippingCost(self.shippingMode);
        })
    },

    initDeliveryDateListener: function () {
        $(document).on('change', '.js-timescope-input', function () {
            var $container = $(this).closest('.js-shipping-info');
            var $parent = $(this).closest('.js-delivery-label');
            var $shippingInfo = $container.find('.js-delivery-info');
            var startHour = $parent.find('.js-start-hour').text();
            var endHour = $parent.find('.js-end-hour').text();
            var dayNumber = $(this).attr('data-day-number');
            var dayOfWeek = $container.find('.js-table-delivery').find('.js-timescope-day-of-week').eq(dayNumber).text();

            $(this).closest('.js-checkout-pack').removeClass('error-not-selected');

            $shippingInfo.show();
            $shippingInfo.find('.js-start-hour').text(startHour);
            $shippingInfo.find('.js-end-hour').text(endHour);
            $shippingInfo.find('.js-date').text(endHour);
            $shippingInfo.find('.js-day-of-week').text(dayOfWeek);
        });
    },

    initInvoiceSelects: function () {
        $('.js-c-message-invoice-needed').hide();
        $("[name='shipping\[need_invoice\]']").on('change', function () {
            if ($(this).is(':checked')) {
                $(".js-c-message-invoice-needed").show();
                $('.js-legal-invoice').show();
            } else {
                $('.js-c-message-invoice-needed').hide();
                $('.js-legal-invoice').hide();
            }
        });
    },

    initDeliveryLimit: function () {
        var deliveryLimitModal = $('[data-remodal-id=delivery-limit]').remodal({
            closeOnEscape: false,
            closeOnOutsideClick: false
        });
        deliveryLimitModal.open();

        setTimeout(function () {
            new Swiper('.js-swiper-delivery-limit', {
                slidesPerView: 5,
                slidesPerGroup: 4,
                watchOverflow: true,
                lazy: {
                    enabled: true
                },
                navigation: {
                    nextEl: '.js-swiper-button-next',
                    prevEl: '.js-swiper-button-prev'
                },
            });
        }, 50);

        $(document).on('click', '.js-choose-address', function () {
            deliveryLimitModal.close();
            $('#change-address-btn').click();
        });
    },

    initProductCartAmount: function () {
        $('.js-product-cart-increase').on('click', function (e) {
            var $numContainer = $(this).siblings('.js-product-cart-current-num');
            $numContainer.data('num', $numContainer.data('num') + 1);
            $numContainer.text(Services.convertToFaDigit($numContainer.data('num')));

            $(this).siblings('.js-product-cart-decrease').removeClass('c-product-box__decrease--last-one');


        });
        $('.js-product-cart-decrease').on('click', function () {
            var $numContainer = $(this).siblings('.js-product-cart-current-num');

            if ($(this).hasClass('c-product-box__decrease--last-one')) {
                $(this).closest('.js-product-box').addClass('is-temp-deleted');
            } else {
                $numContainer.data('num', $numContainer.data('num') - 1);
                $numContainer.text(Services.convertToFaDigit($numContainer.data('num')));

                if (parseInt($numContainer.data('num')) === 1) {
                    $(this).addClass('c-product-box__decrease--last-one');
                }
            }
        });

        $('.js-recover-deleted-product').on('click', function (e) {
            $(this).closest('.js-product-box').removeClass('is-temp-deleted');
            e.preventDefault();
        })
    },

    initCartPage: function () {
        $('.js-swiper-cart-parcel').each(function () {
            var self = this;
            var swiper = new Swiper($(this), {
                slidesPerView: 6,
                slidesPerGroup: 5,
                watchOverflow: true,
                simulateTouch: false,
                lazy: {
                    enabled: true
                },
                navigation: {
                    nextEl: '.js-swiper-button-next',
                    prevEl: '.js-swiper-button-prev'
                },
                breakpoints: {
                    1365: {
                        slidesPerView: 5,
                        slidesPerGroup: 4,
                    }
                }
            });

            setTimeout(function () {
                $(self).closest('.js-delivery-packages-hidden').hide();
            }, 50);
        });

        $('.js-shipping-history-hidden, .js-digiclub-delivery-packages-hidden').hide();
    },

    initShippingTimeTable: function () {
        if(isModuleActive('new_desktop_time_table')) {
            var $timeTableContainer = $('.js-time-table-container');

            if($timeTableContainer.length > 0) {
                $timeTableContainer.each(function() {
                    new window.Swiper($(this).find('.js-time-table-swiper'), {
                        slidesPerView: 'auto',
                        slidesPerGroup: 1,
                        watchOverflow: true,
                        navigation: {
                            nextEl: '.js-swiper-button-next',
                            prevEl: '.js-swiper-button-prev'
                        },
                    })
                })
            }
        } else {
            new Swiper($('.js-swiper-time-table-days'), {
                slidesPerView: 6,
                slidesPerGroup: 5,
                watchOverflow: true,
                simulateTouch: false,
                navigation: {
                    nextEl: '.js-swiper-button-next',
                    prevEl: '.js-swiper-button-prev'
                },
                breakpoints: {
                    1365: {
                        slidesPerView: 5,
                        slidesPerGroup: 4,
                    }
                },
            });

            $('.js-time-table-day-header').on('click', function () {
                $(this).siblings('.js-time-table-day-header').removeClass('is-active');
                $(this).addClass('is-active');

                $(this).closest('.js-time-table-container').find('.js-time-table-day-details').addClass('u-hidden');
                $('#day-' + $(this).data('day-id')).removeClass('u-hidden');
            })
        }
    },

    initSeparateProducts: function () {
        var separateProductsModal = $('[data-remodal-id=separate-products]').remodal();
        $('.js-make-concurrent').on('click', function () {
            separateProductsModal.open();

            setTimeout(function () {
                new Swiper('.js-swiper-separated-parcel', {
                    slidesPerView: 5,
                    slidesPerGroup: 4,
                    watchOverflow: true,
                    lazy: {
                        enabled: true
                    },
                    navigation: {
                        nextEl: '.js-swiper-button-next',
                        prevEl: '.js-swiper-button-prev'
                    },
                });
            }, 50);

            e.preventDefault()
        });
    },

    initGiftCardModal: function () {
        if (!$('.js-send-to-friend').length) return;

        var giftCardModal = $('[data-remodal-id=send_giftcard_to_friend]').remodal();
        var $form = $('.js-send-to-friend-form');

        $('.js-send-to-friend').click(function (e) {
            e.preventDefault();

            // $('.js-send-to-friend-error').addClass('u-hidden-visually').empty();
            // $('.js-send-to-friend-message').addClass('u-hidden-visually');
            // $giftCard.find('.js-giftcard-name').text(giftcardName);
            // $giftCard.find('.js-giftcard-image').attr(
            //     {
            //         alt: giftcardName,
            //         src: giftcardImage
            //     });

            giftCardModal.open();
            // $form.validate().resetForm();
            // $form.trigger("reset");
        });

        $form.validate({
            rules: {
                'send_giftcard[email]': {
                    required: true,
                    email: true
                }
            },
            messages: {
                'send_giftcard[email]': {
                    'required': 'ایمیل وارد نشده است',
                    'email': 'ایمیل نامعتبر است'
                }
            }
        });

        $('.js-send-to-friend-form').on('submit', function (e) {
            e.preventDefault();

            var giftCardModal = $('[data-remodal-id=send_giftcard_to_friend]').remodal();
            giftCardModal.close();
            $('.c-form-legal__label--giftcard-email').removeClass('c-form-legal__label--required').text('ارسال به آدرس ایمیل دوست');
            $('.c-form-send-giftcard__email-input').hide();
            $('.js-send-to-friend').text('مشاهده و ویرایش');
        });

        $('.js-send-to-friend-cancel').on('click', function (e) {
            e.preventDefault();

            var giftCardModal = $('[data-remodal-id=send_giftcard_to_friend]').remodal();
            giftCardModal.close();
            $('.c-form-legal__label--giftcard-email').addClass('c-form-legal__label--required').text('ارسال به آدرس ایمیل شما');
            $('.c-form-send-giftcard__email-input').show();
            $('.js-send-to-friend').text('ارسال به دوست');
        });

    },

    initSNTracker: function () {
        snt("dkDeliveryOptions", snDeliveryOptions);
    },

    initDropOffModal: function() {
        var $centerList = $('.js-drop-off-center-list'),
            $timeList = $('.js-drop-off-time-list'),
            dropOffModal;

        $('.js-drop-off-action').click(function(){
            var $this = $(this);

            dropOffModal = $('[data-remodal-id=' + $this.data('drop-off-id') + ']').remodal();

            $centerList.removeClass('u-hidden');
            $timeList.addClass('u-hidden');
            dropOffModal.open();
        });

        $('.js-drop-off-select-center').click(function(e){
            e.preventDefault();

            $centerList.addClass('u-hidden');
            $timeList.removeClass('u-hidden');
        });

        $('.js-drop-off-back-to-centers').click(function(e){
            $centerList.removeClass('u-hidden');
            $timeList.addClass('u-hidden');
        });

        $('.js-drop-off-select-time').click(function(e){
            dropOffModal.close();
        });
    },

    initShipBySellerActions: function(){
        var thiz = this;

        var makeToggleRequest = function(itemIdsObject) {
            var itemIdsArray = Object.keys(itemIdsObject);
            $('#js-skip-item-id-input').val(JSON.stringify(itemIdsArray));

            Services.ajaxPOSTRequestJSON(
                '/ajax/shipping/toggle/provider/',
                {
                    skipItemIds: itemIdsArray,
                },
                function (response) {
                    IndexAction.ABTestRemoveTimeTableModals();
                    $('#shipping-data').html(response.data);
                    $('.js-sticky-cart').html(response.stickyCart);
                    window.skipItemIds = response.skipItemIds;

                    thiz.initCartPage();
                    thiz.initShippingTimeTable();
                    thiz.initShippingCost(thiz.shippingMode);
                    thiz.initEnableSubmitButton();
                    if (response.hasInvalidItems) {
                        $('.js-invalid-items').html(response.invalidData);
                        $('.js-invalid-items-message').text(response.errorMessageForInvalidItems);
                        thiz.initDeliveryLimit();
                    }

                    if (response.changeAddress) {
                        $('.js-sticky-cart').addClass('hidden');
                    } else {
                        $('.js-sticky-cart').removeClass('hidden');
                    }

                    if(isModuleActive('time_table_ab_test')) {
                        IndexAction.initABTest();
                    }
                },
                function (err) {
                },
                true,
                true
            );
        }

        $(document).on('click','.js-toggle-to-dk', function(e){
            e.preventDefault();
            e.stopPropagation();

            var parcelId = $(this).data('parcel-id'),
                skipItems = Services.arrayToObjectKey(window.skipItemIds),
                parcelProductList = $('.js-' + thiz.shippingMode + '-delivery')
                    .find('[data-parcel="' + parcelId + '"]')
                    .find('.js-product-box-container');

            $.map(parcelProductList, function (item) {
                var itemId =$(item).data('item-id');
                skipItems[itemId] = 1;
            });

            makeToggleRequest(skipItems);
        });

        $(document).on('click','.js-toggle-to-sbs', function(e){
            e.preventDefault();
            e.stopPropagation();

            var parcelId = $(this).data('parcel-id'),
                skipItems = Services.arrayToObjectKey(window.skipItemIds),
                parcelProductList = $('.js-' + thiz.shippingMode + '-delivery')
                    .find('[data-parcel="' + parcelId + '"]')
                    .find('.js-product-box-container');

            $.map(parcelProductList, function (item) {
                var itemId =$(item).data('item-id');
                delete skipItems[itemId];
            });

            makeToggleRequest(skipItems);
        });
    },

    initQuickDelivery: function() {
        new Swiper('.js-quick-delivery-products-swiper', {
            slidesPerView: 13,
            slidesPerGroup: 12,
            watchOverflow: true,
            navigation: {
                nextEl: '.js-swiper-button-next',
                prevEl: '.js-swiper-button-prev'
            },
        });
    },

    resetABTestForms: function(source) {
        if(!isModuleActive('time_table_ab_test')) {
            return false;
        }

        if(this.runningTestVersion === 5) {
            if(IndexAction.ABTest5Swiper && (source === 'afterInit' || source === 'shippingType') ) {
                if(IndexAction.ABTest5Swiper.length && IndexAction.ABTest5Swiper.length > 0) {
                    IndexAction.ABTest5Swiper.map(function(swiperItem) {
                        swiperItem.update();
                    });
                } else {
                    IndexAction.ABTest5Swiper.update();
                }
            }
        } else if(this.runningTestVersion === 6) {
            var deliveryType = IndexAction.shippingMode,
                $deliveryContainer = $('.js-'+ deliveryType +'-delivery'),
                $radioInputInForm6Typed = $deliveryContainer.find('.js-shipping-radio-ab-test-main');

            $radioInputInForm6Typed.each(function() {
                var $radioInputInFrom6Item = $(this),
                    $radioInputTypeSelector = $radioInputInFrom6Item.closest(".js-checkout-pack").find(".js-shipping-type-selector:checked"),
                    shippingType = $radioInputTypeSelector.val(),
                    isRadioInputForm6Touched = $radioInputInFrom6Item.data("is-touched") ? true : false,
                    isShippingNormal = (shippingType !== "alt" && shippingType !== "drop-off") ? true : false;

                if(isShippingNormal && isRadioInputForm6Touched) {
                    $radioInputInFrom6Item.click();
                }
            });
        } else if(this.runningTestVersion === 7) {
            $('.js-time-table-ab7 .js-delivery-time').text('')
        }
    },

    ABTestRemoveTimeTableModals: function() {
        if(isModuleActive('time_table_ab_test')) {
            $('.js-time-table-ab6-modal').parent().remove();
        }
    },

    updateTestModalWithMainInput: function($mainInput, $modal) {
        var selectedTimeScope = $mainInput.val(),
            $checkboxToBeSelected = $modal.find('input[value="'+ selectedTimeScope +'"]'),
            $activeTimeTableDayItem = $checkboxToBeSelected.closest('.js-time-table-day-details'),
            activeDayData = $activeTimeTableDayItem.data('day-id'),
            $activeTimeTableHeaderItem = $activeTimeTableDayItem.closest('.js-time-table-container').find('.js-time-table-day-header[data-day-id="'+ activeDayData +'"]');



        $activeTimeTableHeaderItem.click();
        $checkboxToBeSelected.click();
    },

    initABTest: function(testVersion) {
        if(!isModuleActive('time_table_ab_test')) {
            return false;
        }

        if(testVersion && Number.isInteger(testVersion)) {
            this.runningTestVersion = testVersion;
        }

        if (this.runningTestVersion === 5) {
            testVersion5();
            IndexAction.resetABTestForms('afterInit');
        } else if (this.runningTestVersion === 6) {
            testVersion6();
            IndexAction.resetABTestForms();
        } else if (this.runningTestVersion === 7) {
            testVersion7();
            IndexAction.resetABTestForms();
        }

        function testVersion5() {
            var ABTest5 = $('.js-time-table-ab5');

            if(ABTest5.length > 0) {
                IndexAction.ABTest5Swiper = []
                ABTest5.each(function() {
                    var carouselItem = new Swiper($(this).find('.js-time-table-swiper'), {
                        slidesPerView: 'auto',
                        slidesPerGroup: 1,
                        watchOverflow: true,
                        navigation: {
                            nextEl: '.js-swiper-button-next',
                            prevEl: '.js-swiper-button-prev'
                        },
                    })

                    IndexAction.ABTest5Swiper.push(carouselItem);
                })
            }

            $('.js-shipment-submit-type > .c-checkout-time-table').addClass('u-hidden');
            $('.js-shipment-submit-type > .js-time-table-ab5').removeClass('u-hidden');
        }

        function testVersion6() {
            var $timeTable6 = $('.js-time-table-ab6');

            $timeTable6.each(function() {
                var $timeTable6Item = $(this),
                    timeTableParcelType = $timeTable6Item.data("parcel-type"),
                    timeTableParcelId = $timeTable6Item.data("parcel-id"),
                    $modalTrigger = $timeTable6Item.find('.js-time-table-modal'),
                    $modalEl = $('[data-remodal-id=time-table-ab6-' + timeTableParcelType + '-' + timeTableParcelId + ']'),
                    modal = $modalEl.remodal(),
                    $modalConfirmBtn = $modalEl.find('.js-time-tables-modal-confirm'),
                    $radioInput6 = $modalEl.find('input[type="radio"]'),
                    $radioInputInForm6 = $timeTable6Item.find('input[type="radio"]'),
                    $deliveryTime6 = $timeTable6Item.find('.js-delivery-time'),
                    modalConfirmClicked = false,
                    timeSlotLabel = "",
                    $activeInput = null;

                $modalTrigger.on('click', function() {
                    IndexAction.updateTestModalWithMainInput($radioInputInForm6, $modalEl);
                    modal.open();
                });

                $radioInput6.on("change", function() {
                    $activeInput = $(this);
                    timeSlotLabel = $activeInput.data("time-label");

                    $modalConfirmBtn.removeClass('disabled');
                });

                $modalEl.on('confirmation', function() {
                    if(!modalConfirmClicked) {
                        modalConfirmClicked = true;
                        $radioInputInForm6.attr('data-is-touched', true);
                    }
                    updateTimeTable()
                })

                $modalEl.on('cancellation', function() {
                    if(!modalConfirmClicked) {
                        resetTimeTableForm();
                        resetTimeTable();
                    }
                })

                $modalEl.on('closed', function(e) {
                    if(!e.reason) $modalEl.trigger('cancellation')
                })

                function resetTimeTableForm() {
                    timeSlotLabel = "";
                    $activeInput = null;
                    $radioInput6.prop('checked', false);
                    $modalConfirmBtn.addClass('disabled');
                }

                function updateTimeTable() {
                    $radioInputInForm6
                        .attr('value', $activeInput.attr('value'))
                        .attr('checked', 'checked')
                        .prop('checked', 'checked')
                        .trigger('change')

                    $deliveryTime6
                        .text(timeSlotLabel)
                        .removeClass("c-checkout-time-table__delivery-time--not-selected");
                    $modalTrigger
                        .text('تغییر زمان ارسال')
                        .removeClass("c-checkout-time-table__modal-button--not-chosen");
                }

                function resetTimeTable() {
                    $radioInput6.prop('checked', false);
                    $deliveryTime6
                        .text('یکی از بازه‌های موجود را انتخاب کنید')
                        .addClass('c-checkout-time-table__delivery-time--not-selected');
                    $modalTrigger
                        .text('تعیین زمان ارسال')
                        .addClass('c-checkout-time-table__modal-button--not-chosen');
                }
            });

            $('.js-shipment-submit-type > .c-checkout-time-table').addClass('u-hidden');
            $('.js-shipment-submit-type > .js-time-table-ab6').removeClass('u-hidden');
        }

        function testVersion7() {
            var $timeTable7 = $('.js-time-table-ab7');

            $timeTable7.each(function() {
                var $timeTable7Item = $(this),
                    $deliveryTime7 = $timeTable7Item.find('.js-delivery-time'),
                    $radioInput7 = $timeTable7Item.find('input[type="radio"]');

                $radioInput7.on('change', function() {
                    var activeInput = $(this),
                        timeSlotLabel = activeInput.data('time-label');

                    $deliveryTime7.text(timeSlotLabel);
                });
            });

            $('.js-shipment-submit-type > .c-checkout-time-table').addClass('u-hidden');
            $('.js-shipment-submit-type > .js-time-table-ab7').removeClass('u-hidden');
        }
    },

    openUserPersonalInfoModal: function (fields, addressId) {
        $.map(fields, function (item){
            $('input[name="additionalinfo[' + item + ']"]')
                .parents("div.js-personal-info-input")
                .removeClass('u-hidden');
        })

        $('.js-personal-info-input').each(function(){
            if($(this).hasClass('u-hidden')){
                $(this).remove();
            }
        })

        this.selectedAddressId = addressId;
        $('[data-remodal-id=personal-info]').remodal().open();
    },

    initPersonalData: function () {
        var self = this,
            $personalDataForm = $('#personal-data');

        $personalDataForm.validate({
            rules: {
                'additionalinfo[national_identity_number]': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    national_identity_number: true
                },
                'additionalinfo[first_name]': {
                    required: true,
                    persian_english_letters_only: true,
                    maxlength: 255
                },
                'additionalinfo[last_name]': {
                    required: true,
                    persian_english_letters_only: true,
                    maxlength: 255
                },
                'additionalinfo[mobile_phone]': {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 13
                },
            },

            messages: {
                'additionalinfo[national_identity_number]': {
                    'required': 'کد ملی نامعتبر است',
                    'digits': 'کد ملی را درست وارد نمایید',
                    'minlength': 'کد ملی را کامل وارد نمایید',
                    'maxlength': 'کد ملی را درست وارد نمایید',
                    'national_identity_number': 'کد ملی نامعتبر است'
                },
                'additionalinfo[first_name]': {
                    'required': 'نام خود را وارد نمایید',
                    'persian_english_letters_only': 'فقط حروف فارسی و انگلیسی مجاز است',
                    'maxlength': 'نام وارد شده باید کمتر از ۳۰ حرف باشد'
                },
                'additionalinfo[last_name]': {
                    'required': 'نام خانوادگی را وارد نمایید',
                    'persian_english_letters_only': 'فقط حروف فارسی و انگلیسی مجاز است',
                    'maxlength': 'نام خانوادگی طولانی است'
                },
                'additionalinfo[mobile_phone]': {
                    'required': 'شماره موبایل وارد نشده است',
                    'digits': 'شماره موبایل را درست وارد نمایید',
                    'minlength': 'شماره موبایل را کامل وارد نمایید',
                    'maxlength': 'شماره موبایل را درست وارد نمایید'
                }
            }
        })

        $personalDataForm.on('submit', function(e){
            e.preventDefault();

            if(!$personalDataForm.valid()) {
                return ;
            }

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/personal-info/update/',
                $personalDataForm.serialize(),
                function () {
                    if(self.selectedAddressId) {
                        $('.js-address-box[data-id="' + self.selectedAddressId + '"]').click();
                        self.selectedAddressId = null;
                    }
                },
                function (response) {
                    if(response.errors) {
                        window.DKAlert(response.errors[0]);
                    }
                },
                true,
                true,
            );
        })
    },
};

$(function () {
    IndexAction.init();
});