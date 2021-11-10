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



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/profileController/indexAction.js]*/
var IndexAction = {
    init: function () {
        this.initSelects();
        this.initChangeAvatar();
        this.initUnClickable();
        this.initShareModal();
        this.initGiftCardModal();
        //this.initInviteFriendsModal();

        if (isModuleActive('dk_wallet')) {
            this.initCheckWalletStatus();
            this.initActivateWallet();
        }

        this.initOrdersSearch();

        if (activeMenu !== 'profile') {
            return;
        }

        this.initDashboardFavoriteProduct();
        this.initDigiclubAnimation();

        if(isModuleActive('ml_profile_ab_test')) {
            this.initMyLandingTestSwiper();
        }
    },

    initOrdersSearch: function () {
        var searchContainer = $('.js-order-search-container');
        var searchInput = $('.js-order-search-input');
        var searchResults = $('.js-search-results');
        var content = $('.js-ui-tab-content');
        var pagination = $('.js-pagination');
        var searchLag;
        var searchQuery = '';

        $('.js-order-search-btn').on('click', function () {
            searchContainer.addClass('order-search-open');
            searchInput.focus();
        });

        function updateSearch(pageNumber, successCallback) {
            searchResults.html('<div class="c-loading__container"><div class="c-loading"></div></div>');
            Services.ajaxGETRequestHTML(
                ('/ajax/profile/orders/search/?query=' + searchQuery + '&page=' + pageNumber),
                {},
                function (res) {
                    searchResults.html(res);
                    searchResults.removeClass('u-hidden');
                    content.addClass('u-hidden');
                    pagination.addClass('u-hidden');
                    if(successCallback)
                        successCallback();
                },
                function () {

                },
                false,
                false
            );
        }

        searchInput.on('input', function (e) {
            if(searchLag) {
                clearTimeout(searchLag);
            }
            searchLag = setTimeout(function () {
                searchQuery = e.target.value;
                if(searchQuery)
                    updateSearch(1);
            }, 700);
        });

        searchResults.on('click', '.js-search-pagination-item a', function (e) {
            e.preventDefault();
            var $this = $(this);
            updateSearch($(this).data('page'),function () {
                $this.parent().parent().find('.js-search-pagination-item').removeClass('is-active');
                $this.class('is-active');
            });
        });

        $('.js-order-search-close').on('click', function () {
            searchInput.val('');
            searchContainer.removeClass('order-search-open');
            searchResults.addClass('u-hidden');
            content.removeClass('u-hidden');
            pagination.removeClass('u-hidden');
        });
    },

    initCheckWalletStatus: function () {
        var activeContainer = $('.js-wallet-container-active');
        var notActiveContainer = $('.js-wallet-container-not-active');
        var profileWalletAmount = $('.js-wallet-amount');
        var $walletDropdownAmount = $('.js-user-dropdown-wallet-has-amount'),
            $walletDropdownUrl = $('.js-user-dropdown-wallet-has-url'),
            $walletAmount = $('.js-user-drop-down-wallet-amount'),
            $walletUrl = $('.js-wallet-activation-url');

        Services.ajaxGETRequestJSON(
            '/ajax/profile/wallet/',
            {},
            function (res) {
                var response = (res || {});
                if (!response.hasOwnProperty('amount') && !response.hasOwnProperty('activationUrl') && !response.hasOwnProperty('notVerified')) {
                    activeContainer.addClass('u-hidden');
                    notActiveContainer.addClass('u-hidden');
                } else if (response.notVerified) {

                } else if (typeof (response.amount) === 'number') {
                    activeContainer.removeClass('u-hidden');
                    notActiveContainer.addClass('u-hidden');
                    profileWalletAmount.text(window.Services.convertToFaDigit(window.Services.formatCurrency(response.amount, true, '')));
                    $walletAmount.text(Services.convertToFaDigit(Services.formatCurrency(response.amount, true, '')));
                    $walletDropdownAmount.removeClass('u-hidden');
                } else if (response.activationUrl) {
                    activeContainer.addClass('u-hidden');
                    notActiveContainer.removeClass('u-hidden');
                    notActiveContainer.attr('href', response.activationUrl);
                    $walletUrl.attr('href', response.activationUrl);
                    $walletDropdownUrl.removeClass('u-hidden');
                }
            },
            function () {
                activeContainer.hide();
                notActiveContainer.hide();
            },
            false,
            false
        );
    },

    initActivateWallet: function () {
        var modal = $('[data-remodal-id="activate-wallet-modal"]').remodal();

        if (typeof success_activation != 'undefined' && success_activation) {
            modal.open();
        }
    },

    initInviteFriendsModal: function () {
        var modal = $('[data-remodal-id="invite-friends-modal"]').remodal();
        var prevoiusText = '';
        $('.js-invite-friends-action').on('click', function () {
            modal.open();
        });

        $('.js-share-invite').on('click', function () {
            Services.ajaxGETRequestJSON(
                '/ajax/profile/activate-dc-user/',
                {},
                function (response) {

                },
                function (response) {

                },
                true,
                false
            );
            var aux = document.createElement("input");
            var textComponent = $(this).children('.js-url-invite');
            if ($(this).hasClass('not-active')) {
                Services.ajaxGETRequestJSON(
                    '/ajax/profile/activate-dc-user/',
                    {},
                    function (response) {

                    },
                    function (response) {

                    },
                    true,
                    false
                );
            }
            prevoiusText = textComponent.text();
            aux.setAttribute("value", prevoiusText);
            aux.setAttribute("contenteditable", true); //IOS compatibility
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
            textComponent.text('کپی شد');

            setTimeout(function () {
                textComponent.text(prevoiusText);
            }, 2500);
        })
    },

    initUnClickable: function () {
        $('.js-prevent-click').on('click', function (e) {
            e.preventDefault();
        })
    },

    initSelects: function () {
        $('.js-ui-select').selectric();
    },

    initChangeAvatar: function () {
        return false;

        $('.js-change-avatar').click(function () {
            var remodal = $('[data-remodal-id="avatar-modal"]').remodal();
            remodal.open();
        });

        $('.js-change-user-avatar').click(function () {
            var $this = $(this);
            var $avatarId = $(this).data('avatar-id');

            Services.ajaxPOSTRequestJSON(
                '/ajax/change-avatar/',
                {
                    'avatar': $avatarId
                },
                function (response) {
                    $('.js-user-avatar').css('background-image', $this.find('span').css('background-image'));
                    $this.siblings().removeClass('is-active');
                    $this.addClass('is-active');
                },
                function (response) {

                },
                true,
                true
            );
        });
    },

    initDashboardFavoriteProduct: function () {
        $(document).on('click', '.js-remove-favorite-product', function () {
            var $this = $(this);
            var $productId = $(this).data('product-id');
            DKConfirm(
                'آیا مطمئنید که این محصول از لیست مورد علاقه شما حذف شود؟',
                function () {
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/favorites/product/remove/' + $productId + '/',
                        null,
                        function (response) {
                            $this.closest('.js-favorite-product').remove();
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

    initShareModal: function () {
        if (!$('.js-share-product').length) return;

        $('.js-share-product').click(function () {
            var shareModal = $('[data-remodal-id=share]').remodal();
            $('#sendToFriend').validate().resetForm();
            $('.js-send-to-friend-error').addClass('u-hidden-visually').empty();
            $('.js-send-to-friend-message').addClass('u-hidden-visually');
            shareModal.open();
        });
    },

    initGiftCardModal: function () {
        if (!$('.js-send-gift-card').length) return;

        var $form = $('.js-send-giftcard-form');
        var giftCardModal = $('[data-remodal-id=send_giftcard]').remodal();

        $('.js-send-gift-card').click(function (e) {
            e.preventDefault();
            var giftcardName = $(this).data("giftcard-name");
            var giftcardImage = $(this).data("giftcard-image");
            var giftCardOrderItemId = $(this).data("giftcard-order-item-id");
            var $giftCard = $('[data-remodal-id=send_giftcard]');
            $('.js-send-to-friend-error').addClass('u-hidden-visually').empty();
            $('.js-send-to-friend-message').addClass('u-hidden-visually');
            $giftCard.find('.js-giftcard-name').text(giftcardName);
            $giftCard.find('.js-giftcard-image').attr(
                {
                    alt: giftcardName,
                    src: giftcardImage
                });
            $giftCard.find('.js-giftcard-order-item-id').attr('value', giftCardOrderItemId);

            giftCardModal.open();
            $form.validate().resetForm();
            $form.trigger("reset");
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

        $('.js-send-giftcard-form').on('submit', function (e) {
            e.preventDefault();

            var $email = $('.js-gift-card-form-email').val();
            var $text = $('.js-gift-card-form-text').val();
            var $orderItemId = $('.js-giftcard-order-item-id').val();

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/send-gift-card-email/',
                {
                    'email': $email,
                    'text': $text,
                    'orderItemId': $orderItemId,
                },
                function () {

                },
                function () {

                },
                true,
                true
            );
        });
    },

    initMyLandingTestSwiper: function() {
        new window.Swiper(".js-my-landing-wish-list", {
            slidesPerView: 5,
            slidesPerGroup: 4,
            spaceBetween: 15,
            lazy: {
                enabled: true
            },
            navigation: {
                nextEl: ".js-wish-swiper-button-next",
                prevEl: ".js-wish-swiper-button-prev"
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1125: {
                    slidesPerView: 4,
                    slidesPerGroup:3,
                    spaceBetween: 15,
                },
                1300: {
                    slidesPerView: 5,
                    slidesPerGroup:4,
                    spaceBetween: 15,
                },
            },
        });

        new window.Swiper(".js-my-landing-user-history", {
            slidesPerView: 5,
            slidesPerGroup: 4,
            spaceBetween: 25,
            lazy: {
                enabled: true
            },
            navigation: {
                nextEl: ".js-swiper-button-next",
                prevEl: ".js-swiper-button-prev"
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                    slidesPerGroup:3,
                    spaceBetween: 15,
                },
                1367: {
                    slidesPerView: 5,
                    slidesPerGroup: 4,
                    spaceBetweenSlides: 25
                },
            },
        });

        new window.Swiper(".js-my-landing-fmcg", {
            slidesPerView: 5,
            slidesPerGroup: 4,
            spaceBetween: 15,
            lazy: {
                enabled: true
            },
            navigation: {
                nextEl: ".js-fmcg-swiper-button-next",
                prevEl: ".js-fmcg-swiper-button-prev"
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1125: {
                    slidesPerView: 4,
                    slidesPerGroup:3,
                    spaceBetween: 15,
                },
                1300: {
                    slidesPerView: 5,
                    slidesPerGroup:4,
                    spaceBetween: 15,
                },
            },
        });
    },

    initDigiclubAnimation: function () {
        $('.js-digiclub-animation').addClass('c-message-hint--animation');
    }
};

var OrderDetailsAction = {
    init: function () {
        if (activeMenu !== 'orders') {
            return;
        }

        this.initPaymentRecords();
        this.initRepurchase();
        this.initShipBySeller();

        if(isModuleActive('gold_price')) {
            this.initGoldPrice();
        }

        this.initShipmentCancellation();
    },

    initGoldPrice: function () {
        $('.js-gold-price-btn').on('click', function () {
            var $this = $(this);
            $this.parent().siblings('.js-gold-price-dsc').toggleClass('u-hidden');
            $this.toggleClass('is-open');
        })
    },

    initShipBySeller: function () {
        $(document).on('click', '.js-ship-by-seller-response', function () {
            var value = $(this).data('value');
            var shipmentId = $(this).data('shipment');
            var sbsSection = $(this).closest('.js-sbs-section');

            Services.ajaxPOSTRequestHTML(
                '/ajax/shipping/' + shipmentId + '/verify/',
                {
                    response: value
                },

                function (response) {
                    sbsSection.html(response);
                },
                true,
                true
            );
        })

        $('.js-copy-delivery-code').on('click', function () {
            var thiz = $(this);
            Services.copyClipboard($(this).data('copy'));
            $(this).addClass('copied');
            $(this).html('کپی شد');
            setTimeout(function () {
                thiz.removeClass('copied');
                thiz.html('<span>شناسه تحویل مرسوله:</span>' + Services.convertToFaDigit(thiz.data('copy')))
            }, 2000)
        });
    },

    initRepurchase: function () {
        $('.js-repurchase-order-item').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();

            var variantId = $(this).data("variant");
            var $this = $(this);
            Services.ajaxGETRequestJSON(
                "/cart/add/" + variantId + "/1/?is_quick_view=true",
                {},
                function (response) {
                    Main.updateMiniCart(response);
                    DKToast('کالا با موفقیت به سبد خرید اضافه شد.');
                },
                function (response) {
                    if (response.errors !== undefined) {
                        DKToast(response.errors[0], {type: 'url', text: 'مشاهده صفحه کالا', url: $this.data('url')});
                    }
                },
                true,
                true
            );
        });
    },

    initPaymentRecords: function () {
        $('.js-payment-records-btn').on('click', function () {
            $(this).toggleClass('is-open');
            $(this).parent().siblings('.js-payment-records').toggle();
        })
    },

    initShipmentCancellation: function () {
        $('.js-cancel-shipment-button').click(function () {
            $('[data-remodal-id="order-cancellation-modal-' + $(this).data('id') + '"]').remodal().open();
            setTimeout(function () {
                new Swiper('.js-swiper-products-cancellation', {
                    slidesPerView: 5,
                    slidesPerGroup: 4,
                    navigation: {
                        nextEl: '.js-swiper-button-next',
                        prevEl: '.js-swiper-button-prev'
                    }
                });
            }, 200);
        });

        var $cancellationForm = $('.js-shipment-cancel-form');

        $cancellationForm.validate({
            rules: {
                'cancel_shipment[cancellation_reason]': {
                    required: true
                }
            },
            messages: {
                'cancel_shipment[cancellation_reason]': {
                    'required': 'لطفا دلیل لغو مرسوله را انتخاب کنید'
                }
            }
        });

        $cancellationForm.submit(function (e) {
            e.preventDefault();

            var $shipmentCancellationForm = $(this);

            if (!$shipmentCancellationForm.valid()) {
                return;
            }

            var shipmentId = $shipmentCancellationForm.find('[name*=shipment_id]').val();

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/cancel-shipment/',
                $shipmentCancellationForm.serialize(),
                function (response) {
                    var shipmentStatus = $shipmentCancellationForm.data('shipment-status'),
                        $title = $('.js-order-cancellation-success-title'),
                        $body = $('.js-order-cancellation-success-body');

                    $('[data-remodal-id="order-cancellation-success-modal"]').remodal().open();

                    if (shipmentStatus === 'new' || shipmentStatus === 'pending') {
                        $title.text('سفارش لغو شد');
                        $body.text('در صورتی که وجه سفارش را پرداخت کرده باشید مبلغ طی ۴۸ ساعت کاری آینده به حساب و یا کیف پول شما واریز خواهد شد.');
                    } else {
                        $title.text('درخواست لغو سفارش ثبت شد');
                        $body.text('در صورتی که وجه سفارش را پرداخت کرده باشید مبلغ طی ۴۸ ساعت کاری پس از لغو سفارش به حساب و یا کیف پول شما واریز خواهد شد.');
                    }

                    $(document).on('closed', '[data-remodal-id="order-cancellation-success-modal"]', function (e) {
                        location.reload();
                    });
                    $('.js-cancel-shipment-button[data-id=' + shipmentId + ']').remove();
                },
                function (response) {
                    console.log(response, '#error');
                }
            );
        });
    }
};

var OrderReturnAction = {
    init: function () {

        if (activeMenu !== 'orderReturn') {
            return;
        }

        this.initSearchOrderForm();
        this.initOrderItemsSubmitForm();
        this.initOrderItemsReturnRequestForm();
        // this.initPrevStep();
        this.initDigiclubAnimation();

    },

    initSearchOrderForm: function () {
        $('#search-order-form').validate({
            rules: {
                'order': {
                    required: true,
                    digits: true,
                    maxlength: 10
                }
            },
            messages: {
                'order': {
                    'required': 'شماره سفارش را وارد نمایید',
                    'digits': 'شماره سفارش فقط باید شامل اعداد انگلیسی باشد',
                    'maxlength': 'شماره سفارش طولانی است'
                }
            }
        });
    },

    initOrderItemsSubmitForm: function () {
        var $form = $('#submit-items-form');
        var $submitBtn = $('.js-submit-order-items-btn');

        $('#submit-items-form :checkbox').change(function () {
            if ($form.find(':checked').length > 0) {
                $submitBtn.removeClass('disabled');
            } else {
                $submitBtn.addClass('disabled');
            }
        });
    },

    initOrderItemsReturnRequestForm: function () {
        var thiz = this;
        var $returnRequestForm = $('#return-request-form');

        $returnRequestForm.validate();
        var $items = $('[name^="return_request_items"]');

        $items.filter('[name$="[id]"]').each(function () {
            $(this).rules("add", {
                required: true,
                digits: true,
                maxlength: 10,
                messages: {
                    'required': 'فیلد الزامی است',
                    'digits': 'مقدار فیلد فقط باید شامل اعداد انگلیسی باشد',
                    'maxlength': 'مقدار فیلد طولانی است'
                }
            });
        });

        $items.filter('[name$="[return_reason]"]').each(function () {
            $(this).rules("add", {
                required: true,
                digits: true,
                maxlength: 10,
                messages: {
                    'required': 'فیلد الزامی است',
                    'digits': 'مقدار فیلد فقط باید شامل اعداد انگلیسی باشد',
                    'maxlength': 'مقدار فیلد طولانی است'
                }
            });
        });

        $items.filter('[name$="[return_type]"]').each(function () {
            $(this).rules("add", {
                required: true,
                maxlength: 20,
                messages: {
                    'required': 'فیلد الزامی است',
                    'digits': 'مقدار فیلد فقط باید شامل اعداد انگلیسی باشد',
                    'maxlength': 'مقدار فیلد طولانی است'
                }
            });
        });

        $items.filter('[name$="[return_comment]"]').each(function () {
            $(this).rules("add", {
                required: true,
                maxlength: 250,
                messages: {
                    'required': 'فیلد الزامی است',
                    'maxlength': 'مقدار فیلد طولانی است'
                }
            });
        });

        $items.filter('[name$="[post_receipt_code]"]').each(function () {
            $(this).rules("add", {
                maxlength: 30,
                messages: {
                    'maxlength': 'مقدار فیلد طولانی است'
                }
            });
        });

        $returnRequestForm.on('submit', function (e) {
            e.preventDefault();

            if (!$returnRequestForm.valid())
                return false;

            $returnRequestForm.find('.js-form-errors').addClass('u-hidden-visually');

            var formData = new FormData(this);

            $.ajax({
                url: '/ajax/profile/order-items-return-form/',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    Framework.showLoader();
                },
                success: function (response) {
                    if (response.status === false) {
                        var $errorItems = $returnRequestForm.find('.js-form-error-items');
                        $errorItems.empty();
                        $.each(response.data.errors, function (i, item) {
                            $errorItems.append('<p>' + __(item) + '</p>');
                        });

                        $returnRequestForm.find('.js-form-errors').removeClass('u-hidden-visually');
                    } else {
                        thiz.initSuccessModal();
                    }
                },
                complete: function () {
                    Framework.hideLoader();
                }
            });
        });

        $('.js-post-receipt-image').change(function () {
            if ($(this).get(0).files.length === 0) {
                return;
            }

            var $receiptContainer = $(this).closest('.js-post-receipt-image-container');
            var $imageItemContainer = $receiptContainer.find('.js-post-receipt-image-item');
            $imageItemContainer.empty().append('<span class="c-upload-item">' + $(this).val().substr($(this).val().lastIndexOf('\\') + 1) + '</span>');
            if ($(this).get(0).files.length > 0) {
                $receiptContainer.find('.js-remove-post-receipt-image').removeClass('u-hidden');
            } else {
                $receiptContainer.find('.js-remove-post-receipt-image').addClass('u-hidden');
            }
        });

        $('.js-remove-post-receipt-image').click(function () {
            var $receiptContainer = $(this).closest('.js-post-receipt-image-container');
            $receiptContainer.find('.js-post-receipt-image').val('');
            $(this).addClass('u-hidden');
            $receiptContainer.find('.js-post-receipt-image-item').empty();
        });

        $('.js-defect-files').change(function () {
            if ($(this).get(0).files.length === 0) {
                return;
            }

            var $filesContainer = $(this).closest('.js-defect-files-container');
            var $itemsContainer = $filesContainer.find('.js-defect-file-items');
            var items = '';
            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                items += '<span class="c-upload-item">' + $(this).get(0).files[i].name + '</span>';
            }
            $itemsContainer.empty().append(items);

            if ($(this).get(0).files.length > 0) {
                $filesContainer.find('.js-remove-defect-files').removeClass('u-hidden');
            } else {
                $filesContainer.find('.js-remove-defect-files').addClass('u-hidden');
            }
        });

        $('.js-remove-defect-files').click(function () {
            var $filesContainer = $(this).closest('.js-defect-files-container');
            $filesContainer.find('.js-defect-files').val('');
            $(this).addClass('u-hidden');
            $filesContainer.find('.js-defect-file-items').empty();
        });
    },


    // initPrevStep: function(){
    //     var $activeStep =  $('.js-active-step');
    //     var $prevStep = $activeStep.prev('hr').prev('.js-step');
    //     $prevStep.addClass('pre-active');
    // },

    initSuccessModal: function () {
        var remodal = $('[data-remodal-id="submit-return-request-success-modal"]').remodal();
        remodal.open();

        $(document).on('closed', '[data-remodal-id="submit-return-request-success-modal"]', function (e) {
            window.location.href = $('#return-request-form').data('back-url');
        });
    },

    initDigiclubAnimation: function () {
        $('.js-digiclub-animation').addClass('c-message-hint--animation');
    }
};

var FavoritesAction = {
    init: function () {
        if (activeMenu !== 'favorites') {
            return;
        }

        this.initHandleTab();
        this.initRemoveObservation();
        this.initRemoveFavoriteProduct();

        if (isModuleActive('wish_list_data_layer')) {
            this.clickImpressionHandler();
        }

        if (isModuleActive('dk_public_favorite_list')) {
            this.initPublicListModals();
        }
    },

    initRemoveFavoriteProduct: function () {
        $('.js-remove-favorite-btn').click(function () {
            var $this = $(this);
            var $productId = $(this).data('product-id');

            DKConfirm(
                'آیا مطمئنید که این محصول از لیست مورد علاقه شما حذف شود؟',
                function () {
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/favorites/product/remove/' + $productId + '/',
                        null,
                        function () {
                            if ($('.js-favorite-container').length === 1) {
                                try {
                                    var currentPage = Services.getUrlSearchParams().get('page');
                                    if (currentPage) {
                                        var nextPage = (currentPage == 1) ? 1 : (currentPage - 1);
                                        window.location = Services.replaceUrlParam(window.location.href, 'page', nextPage);
                                    } else {
                                        window.location = window.location.pathname;
                                    }
                                } catch (e) {
                                    window.location = window.location.pathname;
                                }
                            } else {
                                window.location.reload()
                            }
                        },
                        null,
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

    initHandleTab: function () {
        $('.js-ui-tab-pill').click(function () {
            var $this = $(this);

            if (history.pushState) {
                var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname
                    + '?active_tab=' + $this.data('tab-pill-id')
                    + '&page=' + $this.data('current-page');

                window.history.pushState({path: newUrl}, '', newUrl);
            }
        })
    },

    initRemoveObservation: function () {
        $('.js-remove-observation-btn').click(function () {
            var $this = $(this),
                observedProductId = $(this).data('observed-product-id');
            var csrf = $this.data('token');

            DKConfirm(
                'آیا مطمئنید که دیگر نیاز به این مورد ندارید؟',
                function () {

                    Services.ajaxPOSTRequestJSON(
                        '/ajax/product/observed/remove/' + observedProductId + '/',
                        {token: csrf},
                        function () {
                            $this.closest('.js-notifier-container').remove();
                            if ($('.js-notifier-container').length === 0) {
                                window.location = window.location.pathname;
                            }
                        },
                        function (data) {
                            DKAlert(data.errors);
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

    clickImpressionHandler: function () {
        var thiz = this;
        $('.js-favorite-container').click(function () {
            var productId = $(this).data('product-id');
            if(productId){
                thiz.setGAClickImpressionEvent(productId);
            }
        })

        $('.js-notifier-container').click(function () {
            var productId = $(this).data('product-id');
            if(productId){
                thiz.setGAClickImpressionEvent(productId);
            }
        })
    },

    setGAClickImpressionEvent: function(productId) {
        console.log(productId)
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
            window.Sentry && window.Sentry.captureException(e);
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

    initPublicListModals: function () {
        var addModal = $('.js-add-public-list-modal').remodal();
        var shareModal = $('[data-remodal-id=share]').remodal();

        var title = $('.js-public-list-title'),
            description = $('.js-public-list-description'),
            errorMessage = $('.js-public-list-error-message'),
            descriptionErrorMessage = $('.js-public-list-description-error-message');

        function removeErrors(){
            title.removeClass('error');
            description.removeClass('error');
            errorMessage.addClass('u-hidden');
            descriptionErrorMessage.addClass('u-hidden');
        }

        $('.js-add-public-list').click(function () {
            addModal.open();
            title.val('');
            description.val('');
            removeErrors();
        })

        $('.js-submit-public-list').click(function () {
            removeErrors();
            var titleValue = title.val();
            var descriptionValue = description.val();

            if(titleValue.length < 4){
                title.addClass('error');
                errorMessage.removeClass('u-hidden');
                return;
            }
            if(descriptionValue.length > 250){
                description.addClass('error');
                descriptionErrorMessage.removeClass('u-hidden');
                return;
            }

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/wishlist/',
                {
                    title: titleValue,
                    description: descriptionValue
                },
                function (data) {
                    location.reload();
                },
                function (data) {
                    console.log(data.errors);
                }
            );

        })

        $('.js-share-public-list').click(function () {
            var btn = $(this),
                url = btn.data('url'),
                modal = $('#share-public-list-modal'),
                facebookIcon = modal.find('.js-facebook'),
                whatsappIcon = modal.find('.js-whatsapp'),
                twitterIcon = modal.find('.js-twitter'),
                whatsappUrl = btn.data('whatsapp'),
                twitterUrl = btn.data('twitter'),
                facebookUrl = btn.data('facebook');

            if(!whatsappUrl){
                whatsappIcon.addClass('u-hidden');
            }
            if(!twitterUrl){
                twitterIcon.addClass('u-hidden');
            }
            if(!facebookUrl){
                facebookIcon.addClass('u-hidden');
            }
            whatsappIcon.attr('href' , whatsappUrl);
            twitterIcon.attr('href' , twitterUrl);
            facebookIcon.attr('href' , facebookUrl);
            modal.find('.js-share-value').data('copy', url);
            shareModal.open();
        });

        function copyClipboard(text) {
            var aux = document.createElement("input");
            aux.setAttribute("value", text);
            aux.setAttribute("contenteditable", true); //IOS compatibility
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
        $('.js-copy-url').on('click', function () {
            var thiz = $(this);
            copyClipboard($(this).data('copy'));
            $(this).addClass('copied');
            $(this).html('کپی شد');
            setTimeout(function () {
                thiz.removeClass('copied');
                thiz.html('کپی لینک')
            }, 2000)
        });
    },

};

var UserHistory = {
    init: function () {
        if (activeMenu !== 'userHistory') {
            return;
        }

        this.initRemoveHistoryItem();
    },

    initRemoveHistoryItem: function () {
        $('.js-remove-item-profile-history').click(function () {
            var $productId = $(this).data('product-id');

            if(isModuleActive('dk_remove_confirmation_modal')) {
                Services.ajaxPOSTRequestJSON(
                    '/ajax/browsing-history/product/remove/' + $productId + '/',
                    null,
                    function () {
                        location.reload();
                    },
                    null,
                    true,
                    true
                );
            } else {
                DKConfirm(
                    'آیا از حذف این کالا از لیست بازدیدهای اخیر اطمینان دارید؟',
                    function () {
                        Services.ajaxPOSTRequestJSON(
                            '/ajax/browsing-history/product/remove/' + $productId + '/',
                            null,
                            function () {
                                location.reload();
                            },
                            null,
                            true,
                            true
                        );
                    },
                    function () {
                    },
                    'بله',
                    'خیر'
                );
            }

        });
    }
};

var CommentAction = {
    init: function () {
        if (activeMenu !== 'comments') {
            return;
        }

        this.initRemoveComment();
        this.initExpandCommentText();

        if (isModuleActive('new_comment')) {
            this.initHandleTab();
        }
    },

    initRemoveComment: function () {
        $('.js-remove-comment-btn').click(function () {
            var $this = $(this);
            var csrf = $this.data('token');
            var editUrl = $this.data('edit-url');

            DKConfirm(
                'آیا این نظر حذف شود؟',
                function () {
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/comment/remove/' + $this.data('id') + '/',
                        {token: csrf},
                        function (response) {

                            if (isModuleActive('dk_set_pdp_ga')) {
                                try {
                                    ga('set', 'nonInteraction', true);
                                    ga('send', 'event', {
                                        eventCategory: 'product_page',
                                        eventAction:'Comment Delete',
                                        eventLabel: editUrl
                                    });
                                } catch (e) {
                                    console.error('GA Error: Remove Comment');
                                }
                            }

                            $this.closest('.js-user-comment-container').remove();
                            if ($('.js-user-comment-container').length === 0) {
                                window.location = window.location.pathname;
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

        if (isModuleActive('dk_set_pdp_ga')) {
            $('.js-ga-edit-comment-btn').click(function () {
                var editUrl = $(this).data('edit-url');
                try {
                    ga('set', 'nonInteraction', true);
                    ga('send', 'event', {
                        eventCategory: 'product_page',
                        eventAction:'Comment Edit',
                        eventLabel: editUrl
                    });
                } catch (e) {
                    console.error('GA Error: Edit Comment');
                }
            })
        }
    },

    initExpandCommentText: function () {
        $('.js-comment-text-full').click(function () {
            var $parent = $(this).parent();

            $parent.addClass('u-hidden');
            $parent.parent().find('.js-comment-text-summary').parent().removeClass('u-hidden');
        });

        $('.js-comment-text-summary').click(function () {
            var $parent = $(this).parent();

            $parent.addClass('u-hidden');
            $parent.parent().find('.js-comment-text-full').parent().removeClass('u-hidden');
        });
    },

    initHandleTab: function () {
        $('.js-ui-tab-pill').click(function () {
            var $this = $(this);

            if (history.pushState) {
                var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname
                    + '?active_tab=' + $this.data('tab-pill-id')
                    + '&page=' + $this.data('current-page');

                window.history.pushState({path: newUrl}, '', newUrl);
            }
        })
    },
};

var GiftCardAction = {

    init: function () {
        if (activeMenu !== 'giftCards') {
            return;
        }

        if (isModuleActive('new_profile_gift_card')) {
            this.initGiftCardTabs();
            this.initAddGiftCard();
            this.initGiftCardsHistory();
            this.initGiftCardInactive();
            this.initSendGiftCard();
        }
    },

    initSendGiftCard: function () {
        var sendGiftCardModal = $('.js-gift-card-send-modal').remodal();
        var form = $('#send-e-gift-form');
        form.validate({
            rules: {
                'email-phone-gift': {
                    'required': true,
                    'email_phone': true
                },
            },
            messages: {
                'email-phone-gift': {
                    'required': 'ایمیل یا شماره موبایل را وارد نمایید',
                    'email_phone': 'ایمیل یا شماره موبایل نامعتبر است'
                },
            }
        });
        $('.js-gift-card-send').on('click', function () {
            form.data('e-gift-card-id', $(this).data('e-gift-card-id'));
            sendGiftCardModal.open();
        });
        form.on('submit', function (e) {
            e.preventDefault();
            var $this = $(this);
            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/send-gift-card-email/',
                {
                    emailOrPhone: form.find('.js-phone-email-input').val(),
                    eGiftCardId: $this.data('e-gift-card-id')
                },
                function (response) {
                    modal.close();
                    window.location.reload();
                },
                function (response) {
                    window.DKToast(response.errors[0]);
                },
                true,
                false
            );
        })
    },

    initGiftCardTabs: function () {
        var contents = $('.js-gift-cards-content');
        var tabs = $('.js-gift-cards-tab');
        tabs.on('click', function () {
            contents.addClass('u-hidden');
            $('#gifts-content-' + $(this).data('id')).removeClass('u-hidden');
            tabs.removeClass('is-active');
            $(this).addClass('is-active');
        });
    },

    initAddGiftCard: function () {
        var modal = $('.js-gift-card-add-modal').remodal();
        var addCardInput = $('[name="gift-cards[new-card]"]');

        $('.js-gift-card-add').on('click', function () {
            modal.open();
        });
        $('.js-add-gift-card').on('click', function () {
            addCardInput.closest('.o-form__field-container').removeClass('has-error');
            addCardInput.siblings('.o-form__error').remove();
            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/giftcard/add/',
                {
                    card_serial: addCardInput.val()
                },
                function () {
                    window.location.reload();
                },
                function (response) {
                    addCardInput.closest('.o-form__field-container').addClass('has-error').append('<div class="o-form__error">' + response.errors[0] + '</div>');
                },
                true,
                false
            );
        });
    },

    initGiftCardsHistory: function () {
        var modal = $('.js-gift-card-history-modal').remodal();
        var historyContainer = $('.js-gift-card-history-container');

        $('.js-gift-card-history').on('click', function () {
            var id = $(this).data('id');
            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/giftcard/gift-card-detail/' + id + '/',
                {},
                function (response) {
                    historyContainer.html(response.data);
                    modal.open();
                },
                function (response) {

                },
                true,
                true
            );
        });
    },

    initGiftCardInactive: function () {
        var moreOptions = $('.js-gift-card-more-options');
        var eGiftCardId = '';
        $('.js-gift-card-see-more').on('click', function (e) {
            e.stopPropagation();
            moreOptions.hide();
            $(this).siblings('.js-gift-card-more-options').toggle();
        });

        $('body').on('click', function () {
            moreOptions.hide();
        });

        var activationModal = $('.js-gift-card-activate-modal').remodal();
        $('.js-gift-card-activate').on('click', function () {
            activationModal.open();
            eGiftCardId = $(this).data("e-gift-card-id");
        });

        $('.js-activate-gift-card').on('click', function () {

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/activate-e-gift-card/',
                {
                    'eGiftCardId': eGiftCardId,
                },
                function () {
                    window.location.reload();
                },
                function (response) {
                    window.DKToast(response.errors[0]);
                },
                true,
                true
            );
        })
    },

    initSuccessModal: function () {
        var remodal = $('[data-remodal-id="activate-giftcard-success-modal"]').remodal();
        remodal.open();
    }
};

var AddressAction = {
    selectedDistrictId: 0,
    selectedCityId: 0,
    selectedCityName: '',
    recipient: null,

    init: function () {
        if (activeMenu !== 'addresses') {
            return;
        }
        if (isModuleActive('new_profile_addresses')) {
            this.initAddressFormSubmit();
        } else {
            this.initUpdateCities();
            this.initAddAddressModal();
            this.initEditAddressModal();
            this.initForeignerSwitch();
            this.initCancelAddressModal();
            this.initUpdateDistricts();
            this.initAddAddressFormSubmit();
            this.initEditAddressFormSubmit();
        }
        this.initRemoveAddress();
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
        $(document).on('change', '.js-select-city, .js-select-district, .js-select-state', function () {
            $(this).selectric('refresh');
        })
    },

    initUpdateDistricts: function () {
        var thiz = this;
        $('.js-district-wrapper').hide();
        $(document).on('change', '.js-select-city', function () {
            var $thiz = $(this);
            var $form = $thiz.closest('form');
            var cityId = $thiz.val();
            var $districtSelector = $form.find('.js-select-district');

            if (!cityId || cityId.length === "") {
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

        $(document).on('click', '.js-edit-address-btn', function () {
            var $container = $(this).closest('.js-user-address-container');
            recipient = $container.data('address');

            $('#edit-address-form .js-form-errors').addClass('u-hidden-visually');
            $('#edit-address-form .js-form-error-items').empty();
            var editAddressModel = $('[data-remodal-id=edit-address]').remodal();
            editAddressModel.open();
            $(document).off('change.map', '.js-select-state, .js-select-city, .js-select-district, textarea[name="address[address]"]');
            thiz.initEditAddressForm(recipient);
            isFirst = true;
        });

        $(document).on('mapInit', function () {
            if (isModuleActive('address_geolocation') && isFirst) {
                MapActions.initGoogleMap(thiz, 'map_edit', {lat: recipient.map_lat, lng: recipient.map_lon});
                isFirst = false;
            }
        })
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

    initAddAddressForm: function () {
        this.selectedDistrictId = 0;
        this.selectedCityId = 0;

        var $addAddressForm = $('#add-address-form');

        $addAddressForm.validate({
            rules: {
                'address[first_name]': {
                    required: true,
                    maxlength: 255
                },
                'address[last_name]': {
                    required: true,
                    maxlength: 255
                },
                'address[national_identity_number]': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    national_identity_number: true
                },
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
                    // required: true,
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
                    maxlength: 10
                }
            },
            messages: {
                'address[first_name]': {
                    'required': 'نام خود را وارد نمایید',
                    'maxlength': 'نام وارد شده باید کمتر از ۳۰ حرف باشد'
                },
                'address[last_name]': {
                    'required': 'نام خانوادگی را وارد نمایید',
                    'maxlength': 'نام خانوادگی طولانی است'
                },
                'address[national_identity_number]': {
                    'required': 'کد ملی نامعتبر است',
                    'digits': 'کد ملی را درست وارد نمایید',
                    'minlength': 'کد ملی را کامل وارد نمایید',
                    'maxlength': 'کد ملی را درست وارد نمایید',
                    'national_identity_number': 'کد ملی نامعتبر است'
                },
                'address[full_name]': {
                    'required': 'فیلد الزامی است',
                    'rangelength': 'نام را درست وارد نمایید'
                },
                'address[mobile_phone]': {
                    'required': 'فیلد الزامی است',
                    'digits': 'شماره موبایل را درست وارد نمایید',
                    'minlength': 'شماره موبایل را کامل وارد نمایید',
                    'maxlength': 'شماره موبایل را درست وارد نمایید'
                },
                'address[phone]': {
                    'required': 'شماره تلفن ثابت وارد نشده است',
                    'digits': 'شماره تلفن ثابت را درست وارد نمایید',
                    'minlength': 'شماره تلفن ثابت را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن ثابت را درست وارد نمایید'
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

        $('.remodal[data-remodal-id=add-address]').on('closed', function () {
            $addAddressForm.data('validator').resetForm();
        });
    },

    initAddAddressFormSubmit: function () {
        if (isModuleActive('new_profile_addresses')) {
            var $addAddressForm = $('#add-edit-address-form');
        } else {
            var $addAddressForm = $('#add-address-form');
        }

        $addAddressForm.on('submit', function (e) {
            e.preventDefault();

            if (!$addAddressForm.valid())
                return false;

            var addAddressModel = $('[data-remodal-id=add-address]').remodal();

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/addresses/add/',
                $addAddressForm.serialize(),
                function (response) {
                    $('#address-section').html(response.addresses);
                    addAddressModel.close();
                    $addAddressForm[0].reset();
                    if (isFirstAddress) {
                        window.location = window.location.pathname;
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

    initForeignerSwitch: function () {
        $('.js-foreigner-check').change(function () {
            if ($(this).is(':checked')) {
                $('.js-foreigner').find('input').attr('disabled', true).addClass('disabled');
            } else {
                $('.js-foreigner').find('input').attr('disabled', false).removeClass('disabled');
            }
        });

        $('.js-foreigner-check').change();
    },

    initEditAddressForm: function (recipient) {
        var thiz = this;
        thiz.recipient = recipient;

        var $editAddressForm = $('#edit-address-form');

        $editAddressForm.find('.js-input-full_name').val(recipient.full_name);
        if (isModuleActive('address_landline')) {
            var phone = '';
            if (recipient.phone_code !== null && recipient.phone !== null) {
                phone = recipient.phone_code + recipient.phone;
            }
            $editAddressForm.find('.js-input-phone').val(phone);
        }
        $editAddressForm.find('.js-input-mobile_phone').val(recipient.mobile_phone);
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
                    // required: true,
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
                    'maxlength': 'شماره موبایل را درست وارد نمایید'
                },
                'address[phone]': {
                    'required': 'شماره تلفن ثابت وارد نشده است',
                    'digits': 'شماره تلفن ثابت را درست وارد نمایید',
                    'minlength': 'شماره تلفن ثابت را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن ثابت را درست وارد نمایید'
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

        $('.remodal[data-remodal-id=edit-address]').on('closed', function () {
            $editAddressForm.data('validator').resetForm();
        });
    },

    initEditAddressFormSubmit: function () {
        var thiz = this;
        if (isModuleActive('new_profile_addresses')) {
            var $editAddressForm = $('#add-edit-address-form');
        } else {
            var $editAddressForm = $('#edit-address-form');
        }

        $editAddressForm.on('submit', function (e) {
            e.preventDefault();

            if (!$editAddressForm.valid())
                return false;

            var editAddressModel = $('[data-remodal-id=edit-address]').remodal();

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/addresses/edit/' + thiz.recipient.id + '/',
                $editAddressForm.serialize(),
                function (response) {
                    $('#address-section').html(response.addresses);
                    editAddressModel.close();
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

    initAddressFormSubmit: function () {
        var $addressForm = $('#add-edit-address-form');
        var url = '';
        var thiz = this;
        var modal = $('.js-address-modal').remodal();
        var addressModal = $('[data-remodal-id=add-edit-address]');
        var isSecondTry = false;

        $(document).on('closed', addressModal, function () {
            isSecondTry = false;
        });

        $addressForm.on('submit', function (e) {
            e.preventDefault();

            if (!$addressForm.valid()) {
                return false;
            }

            if ($addressForm.data('mode') === 'add') {
                url = '/ajax/profile/addresses/add/';
            } else if ($addressForm.data('mode') === 'edit') {
                url = '/ajax/profile/addresses/edit/' + addressActions.recipient.id + '/';
            } else {
                return;
            }

            var data = $addressForm.serialize();
            if(isSecondTry) {
                data = data + '&address[novalidate_point]=true';
                isSecondTry = false;
            }

            Services.ajaxPOSTRequestJSON(
                url,
                data,
                function (response) {
                    $('#address-section').html(response.addresses);
                    modal.close();
                },
                function (response) {
                    modal.open();
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

    initRemoveAddress: function () {
        $(document).on('click', '.js-remove-address-btn', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var $this = $(this);
            var csrf = $(this).data('token');

            DKConfirm(
                'آیا مطمئنید که این آدرس حذف شود؟',
                function () {
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/addresses/remove/' + $this.data('id') + '/',
                        {token: csrf},
                        function (response) {
                            $this.closest('.js-user-address-container').remove();
                        },
                        function (response) {
                            window.DKToast(response.errors[0]);
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
    }
};

var NotificationsAction = {
    init: function () {
        if (activeMenu !== 'notifications') {
            return;
        }
        this.initConfigNotification();
        this.initRemoveNotification();
    },
    initRemoveNotification: function () {
        if(isModuleActive('new_profile_notification')) {
            var $modalTrigger = $('.js-remove-notification-modal-trigger');

            $modalTrigger.on('click', function() {
                DKConfirm(
                    'آیا از پاک کردن همه‌ی پیام‌ها مطمئنید؟',
                    function () {},
                    function () {
                        Services.ajaxPOSTRequestJSON(
                            '/ajax/profile/notification/remove/all/',
                            {},
                            function (response) {
                                window.location.reload();
                            },
                            function (response) {
                                if(response) {
                                    DKAlert(response.errors);
                                } else {
                                    DKAlert('خطایی رخ داده است، لطفا مجددا تلاش کنید');
                                }
                            },
                            true,
                            true
                        );
                    },
                    'انصراف',
                    'پاک کردن'
                );
            })
        } else {
            $('.js-remove-notification-btn').click(function () {
                var $this = $(this);

                DKConfirm(
                    'پیام حذف شود؟',
                    function () {
                        Services.ajaxPOSTRequestJSON(
                            '/ajax/profile/notification/remove/' + $this.data('notification-id') + '/',
                            null,
                            function (response) {
                                $this.closest('.js-notification-container').remove();
                                if ($('.js-notification-container').length === 0) {
                                    window.location = window.location.pathname;
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
        }

    },

    initConfigNotification: function () {
        $('.js-config-notification-modal').click(function(){
            $('[data-remodal-id=notification-config-modal]').remodal().open();
        })

        $('.js-notification-config-modal-save-btn').click(function(){

            var smsOff = $('.js-notification-sms-off').checked;
            var smsReceive = $('.js-notification-sms-receive').checked;
            var smsProductStatus = $('.js-notification-sms-status').checked;

            var emailOff = $('.js-notification-email-off').checked;
            var emailComment = $('.js-notification-email-comment').checked;
            var emailProductStatus = $('.js-notification-email-status').checked;
            var emailCommentVerify = $('.js-notification-email-comment-verify').checked;


            $('[data-remodal-id=notification-config-modal]').remodal().close();
            window.DKToast('تنظیمات پیغام با موفقیت ذخیره‌سازی شد');
        })

    }
};

var personalInfo = {
    activeModal: null,
    activeModalTrigger: null,

    init: function () {
        if (activeMenu !== 'personalInfo') {
            return;
        }

        this.initEmailSubmissionToasts();
        if (isModuleActive('new_profile_additional_info')) {
            this.initValidations();
            this.initSubmissions();
            this.initModals();
            this.initModalInputs();
            this.initForeign();
            this.initPhoneVerification();
            this.initCardInput();
            this.initLegal();
            this.initSendConfirmCode();

            if(isModuleActive('delete_legal_info')) {
              this.initRemoveLegalInfo();
            }

        }
    },

    initLegal: function () {
        var contents = $('.js-legal-content');
        var form = $('.js-legal-form');

        $('.js-edit-legal').on('click', function () {
            form.addClass('is-active');
            var cityName = form.data('city-name');
            if(cityName) {
                addressActions.selectedCityName = cityName;
                addressActions.selectedCityId = form.data('city-id');
            }
            $('.js-select-state').change();
            contents.hide();
        })
    },

    initPhoneVerification: function () {
        $('.js-verify-phone-input').on('input', function (e) {
            if (e.target.value.length === 5) {
                $('.js-confirm-phone-form').submit();
            } else {
                $(this).removeError();
            }
        })
    },

    initValidations: function () {
        $('#personal-info-email-form').validate({
            rules: {
                'additionalinfo[email]': {
                    'required': 'ایمیل وارد نشده است',
                    'email': 'ایمیل نامعتبر است'
                },
            },

            messages: {
                'additionalinfo[email]': {
                    'required': 'ایمیل وارد نشده است',
                    'email': 'ایمیل نامعتبر است'
                },
            }
        });

        $('#personal-info-national-id-form').validate({
            rules: {
                'additionalinfo[national_identity_number]': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    national_identity_number: true
                }
            },

            messages: {
                'additionalinfo[national_identity_number]': {
                    'required': 'کد ملی نامعتبر است',
                    'digits': 'کد ملی را درست وارد نمایید',
                    'minlength': 'کد ملی را کامل وارد نمایید',
                    'maxlength': 'کد ملی را درست وارد نمایید',
                    'national_identity_number': 'کد ملی نامعتبر است'
                }
            }
        });

        $('#personal-info-name-form').validate({
            rules: {
                'additionalinfo[first_name]': {
                    required: true,
                    persian_english_letters_only: true,
                    maxlength: 255
                },
                'additionalinfo[last_name]': {
                    required: true,
                    persian_english_letters_only: true,
                    maxlength: 255
                }
            },

            messages: {
                'additionalinfo[first_name]': {
                    'required': 'نام خود را وارد نمایید',
                    'persian_english_letters_only': 'فقط حروف فارسی و انگلیسی مجاز است',
                    'maxlength': 'نام وارد شده باید کمتر از ۳۰ حرف باشد'
                },
                'additionalinfo[last_name]': {
                    'required': 'نام خانوادگی را وارد نمایید',
                    'persian_english_letters_only': 'فقط حروف فارسی و انگلیسی مجاز است',
                    'maxlength': 'نام خانوادگی طولانی است'
                }
            }
        });

        $('#personal-info-phone-form').validate({
            rules: {
                'additionalinfo[mobile_phone]': {
                    // required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 13
                }
            },

            messages: {
                'additionalinfo[mobile_phone]': {
                    'required': 'شماره موبایل وارد نشده است',
                    'digits': 'شماره موبایل را درست وارد نمایید',
                    'minlength': 'شماره موبایل را کامل وارد نمایید',
                    'maxlength': 'شماره موبایل را درست وارد نمایید'
                }
            }
        });

        $('#personal-info-legal-form').validate({
            rules: {
                'additionalinfo[company_name]': {
                    required: true,
                    minlength: 11,
                },
                'additionalinfo[company_economic_number]': {
                    required: function () {
                        return !($('[name="additionalinfo[company_national_identity_number]"]').val());
                    },
                    company_economic_number: function () {
                        if(isModuleActive('remove_legal_codes_validation'))
                        {
                            return false;
                        } else {
                            return !!($('[name="additionalinfo[company_economic_number]"]').val());
                        }
                    }
                },
                'additionalinfo[company_national_identity_number]': {
                    required: function () {
                        return !($('[name="additionalinfo[company_economic_number]"]').val());
                    },
                    company_national_identity_number: function () {
                        if(isModuleActive('remove_legal_codes_validation'))
                        {
                            return false;
                        } else {
                            return !!($('[name="additionalinfo[company_national_identity_number]"]').val());
                        }
                    }
                },
                'additionalinfo[company_registration_number]': {
                    required: true,
                    maxlength: 11,
                    digits: true
                },
                'additionalinfo[company_state_id]': {
                    required: true
                },
                'additionalinfo[company_city_id]': {
                    required: true
                },
                'additionalinfo[company_phone]': {
                    required: true,
                    minlength: 4,
                    maxlength: 11,
                    digits: true
                }
            },

            messages: {
                'additionalinfo[company_name]': {
                    'required': 'نام شرکت نمی تواند خالی باشد.',
                    'minlength': 'نام شرکت باید بلندتر از ۱۰ حرف باشد'
                },
                'additionalinfo[company_national_identity_number]': {
                    'required': 'شناسه ملی نمی تواند خالی باشد.',
                    'company_national_identity_number': 'شناسه ملی نادرست است.'
                },
                'additionalinfo[company_economic_number]': {
                    'required': 'کد اقتصادی نمی تواند خالی باشد.',
                    'company_economic_number': 'کد اقتصادی نادرست است.'
                },
                'additionalinfo[company_registration_number]': {
                    'required': 'شماره ثبت را وارد کنید.',
                    'maxlength': 'شماره ثبت طولانی است.',
                    'digits': 'شماره ثبت نادرست است.'
                },
                'additionalinfo[company_state_id]': {
                    'required': 'استان انتخاب نشده است'
                },
                'additionalinfo[company_city_id]': {
                    'required': 'شهر انتخاب نشده است'
                },
                'additionalinfo[company_phone]': {
                    'required': 'شماره تلفن را وارد کنید.',
                    'minlength': 'شماره تلفن را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن طولانی است.',
                    'digits': 'شماره تلفن نادرست است.'
                }
            }
        });

        $('#change-password-form').validate({
            rules: {
                'changepassword[password_old]': {
                    required: true,
                    minlength: 1,
                    maxlength: 255
                },
                'changepassword[password]': {
                    required: true,
                    minlength: 4,
                    maxlength: 255
                },
                'changepassword[password2]': {
                    required: true,
                    minlength: 6,
                    maxlength: 255,
                    equalTo: ".txtPassword"
                }
            },
            messages: {
                'changepassword[password_old]': {
                    'required': 'رمز عبور را وارد نمایید',
                    'minlength': 'رمز عبور باید بیش از ۸ حرف یا عدد باشد',
                    'maxlength': 'رمز عبور وارد شده طولانی است'
                },
                'changepassword[password]': {
                    'required': 'رمز عبور را وارد نمایید',
                    'minlength': 'رمز عبور باید بیش از ۸ حرف یا عدد باشد',
                    'maxlength': 'رمز عبور وارد شده طولانی است'
                },
                'changepassword[password2]': {
                    'required': 'رمز عبور را وارد نمایید',
                    'minlength': 'رمز عبور باید بیش از ۸ حرف یا عدد باشد',
                    'maxlength': 'رمز عبور وارد شده طولانی است',
                    'equalTo': 'رمز عبور را یکسان وارد نمایید'
                }
            }
        });

        $('#personal-info-sheba-form').validate({
            rules: {
                'additionalinfo[sheba]': {
                    required: true
                },
            },

            messages: {
                'additionalinfo[sheba]': {
                    'required': 'شماره شبا وارد نشده است',
                }
            },

            submitHandler: function(form) {
                // TODO: implement submit handler for checking sheba number
            }
        });
    },

    initSubmissions: function () {
        var self = this;
        var emailVerificationModal = $('.js-verification-email-modal').remodal();
        var phoneVerificationModal = $('.js-phone-verification-modal').remodal();

        if (isModuleActive('additional_info_changes')) {
            personalInfo.initPhoneEditForm();
        }

        $('.js-personal-info-form').submit(function (e) {
            e.preventDefault();
            url = '/ajax/profile/personal-info/update/'
            var $form = $(this);

            if (isModuleActive('dk_personal_info_name_changes')) {
                var modalId = $(this).parents('.remodal').data('remodal-id')
                switch (modalId) {
                    case 'personal-info-fullname-modal': {
                        url = '/ajax/profile/personal-info/name/';
                        break;
                    }
                }
            }

            if (!$form.valid()) {
                return;
            }

            Services.showLoader();
            Services.ajaxPOSTRequestJSON(
                url,
                $form.serialize(),
                function (response) {
                    if (response.phone === false && $form.hasClass('js-phone-modal')) {
                        phoneVerificationModal.open();
                        $('.js-changed-phone-number').text(Services.convertToFaDigit($('[name*=mobile_phone]').val()));

                        $('.js-confirm-phone-form').append(response.cryptFields);
                        $('.js-phone-code-counter').data('countdownseconds', response.phoneCodeTtl);
                        $('.js-send-confirm-code').addClass('u-hidden');
                        $('.js-phone-code-container').removeClass('u-hidden');
                        self.initCounter();
                        return;
                    } else if (response.email === false && $form.hasClass('js-email-modal')) {
                        //emailVerificationModal.open();
                    }
                    window.location.reload();
                },
                function (response) {
                    Services.hideLoader();
                    $.each(response.errors, function (field, error) {
                        var field = $form.find('[name*=' + field + ']');
                        if(field.length > 0)
                            field.showError(error);
                        else
                            DKToast(error);
                    });
                    if (!$form.hasClass('js-legal-form')) {
                        self.activeModal.remodal().open();
                    }
                },
                true,
                false
            );
        });

        $('.js-confirm-phone-form').submit(function (e) {
            e.preventDefault();
            var url = '/ajax/profile/personal-info/confirm-phone/'
            var $form = $(this);

            if (!$form.valid()) {
                return;
            }

            if (isModuleActive('additional_info_changes') && $form.data('new-edit-phone') ) {
                url = '/ajax/profile/personal-info/mobile-phone/current-phone/confirm/';
            } else if (isModuleActive('dk_card_edit_changes') && $form.data('validate-card')) {
                url = '/ajax/profile/personal-info/mobile-phone/current-phone/confirm/';
            }

            Services.ajaxPOSTRequestJSON(
                url,
                $form.serialize(),
                function (response) {
                    if (isModuleActive('additional_info_changes') && $form.data('new-edit-phone')) {
                        window.location.replace(response.redirect_url);
                    } else if (isModuleActive('dk_card_edit_changes') && $form.data('validate-card')) {
                        $('[data-remodal-id ="personal-info-bank_card_number-modal"]').remodal().open();
                        $('.js-edit-iban').data('virtual-click', true).click();
                    } else {
                        window.location.reload();
                    }
                },
                function (response) {
                    $.each(response.errors, function (filed, error) {
                        $form.find('[name*=' + filed + ']').showError(error);
                    });
                    $('[data-remodal-id = personal-info-phone-verification-modal]').remodal().open();
                    if (isModuleActive('additional_info_changes') && $form.data('new-edit-phone')) {
                        $form.find('.js-verify-phone-input').focus();
                        $form.trigger('reset')
                    }
                },
                true,
                true
            );
        });

        $('.js-change-password-form').submit(function (e) {
            e.preventDefault();

            var $form = $(this);

            if (!$form.valid()) {
                return;
            }

            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/personal-info/change-password/',
                $form.serialize(),
                function (response) {
                    //
                },
                function (response) {
                    $.each(response.errors, function (filed, error) {
                        $form.find('[name*=' + filed + ']').showError(error);
                    });
                    self.activeModal.remodal().open();
                },
                true,
                true
            );
        });

        $('.js-national-code-form').submit(function (e) {
            e.preventDefault();

            var $form = $(this);
            var imageFormData = new FormData($form[0]);

            if (!$form.valid()) {
                return;
            }

            var isForeigner = $form.find('input[name="additionalinfo[foreigner]"]').prop('checked');

            $.ajax({
                url: '/ajax/profile/personal-info/update/',
                type: 'POST',
                data: imageFormData,
                processData: false,
                contentType: false,

                beforeSend: function () {
                    Services.showLoader();
                },

                success: function (response) {
                    if (response.status !== true) {
                        $.each(response.errors, function (filed, error) {
                            $form.find('[name*=' + filed + ']').showError(error);
                        });
                        self.activeModal.remodal().open();
                    } else {
                        var $itemValue = self.activeModalTrigger
                            .parent('.c-profile-personal__grid-item')
                            .find('.c-profile-personal__grid-item-value');

                        $itemValue
                            .text(Services.convertToFaDigit(self.activeModal.find('[name*=national_identity_number]').val()) || '-');

                        Services.hideLoader();
                        if (isModuleActive('dk_foreigner_upload_success_modal')) {
                            if (isForeigner) {
                                var uploadSuccessModal = $('[data-remodal-id=personal-info-national_upload-success-modal]').remodal();
                                uploadSuccessModal.open();
                                $('.js-upload-success-confirm').on('click', function () {
                                    uploadSuccessModal.close();
                                })
                            }
                        }
                    }
                },

                complete: function () {
                    Services.hideLoader();
                }
            });
        });
    },

    initPhoneEditForm() {
        var phoneModal = $('[data-remodal-id=personal-info-mobile_phone-modal]').remodal();
        var phoneAlertModal = $('[data-remodal-id=personal-info-mobile_edit-alert-modal]').remodal();
        var phoneVerificationModal = $('.js-phone-verification-modal').remodal();
        var $confirmPhoneForm = $('.js-confirm-phone-form');

        $('.js-personal-info-modal-btn[data-remodal=mobile_phone]')
            .on('click', function () {
                phoneModal.open();
                $('#personal-info-phone-form').trigger('reset').valid();

                $confirmPhoneForm
                    .trigger('reset')
                    .find('.o-form__field-container')
                    .removeClass('has-error');
                $confirmPhoneForm.find('.o-form__error').addClass('u-hidden');
            });

        $('#personal-info-phone-form')
            .on('submit', function (e) {
                e.preventDefault();
                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/personal-info/mobile-phone/',
                    $(this).serialize(),
                    function (response) {
                        if (response.type === 'two_step') {
                            phoneAlertModal.open();
                        } else {
                            window.location.replace(response.redirect_url)
                        }
                    },
                    function (response) {
                        Services.hideLoader();
                        $.each(response.errors, function (field, error) {
                            var field = $(this).find('[name*=' + field + ']');
                            if(field.length > 0)
                                field.showError(error);
                            else
                                DKToast(error);
                        });
                        if (!$form.hasClass('js-legal-form')) {
                            self.activeModal.remodal().open();
                        }
                    },
                    true,
                    false
                );
            });

        $('.js-cancel-edit-verification')
            .on('click', function (e) {
                e.preventDefault();
               $(this).parents('.remodal').eq(0).find('.c-modal__close').click();
            });

        $('.js-get-verification-code')
            .on('click', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/personal-info/mobile-phone/current-phone/send-code/',
                    {},
                    function (response) {
                        phoneVerificationModal.open();
                        $('.js-changed-phone-number').text(Services.convertToFaDigit(response.phone));
                        $('.js-confirm-phone-form').append(response.cryptFields).data('new-edit-phone', true);
                        $('.js-phone-code-counter').data('countdownseconds', response.sms_ttl);
                        $('.js-send-confirm-code').addClass('u-hidden').addClass('js-send-code-edit-phone').off();
                        $('.js-phone-code-container').removeClass('u-hidden');
                        personalInfo.initCounter();

                        $(document)
                            .on('click', '.js-send-code-edit-phone', function() {
                                $('.js-get-verification-code').click();
                            });
                    },
                    function (response) {
                        Services.hideLoader();
                        $.each(response.errors, function (field, error) {
                            DKToast(error);
                        });
                    },
                    true,
                    false
                );
            });
    },

    initForeign: function () {
        var foreignerContent = $('.js-foreigner-content');
        var $foreignerCheckbox = $('.js-foreign-checkbox');
        var $nationalIdentityNumberInput = $('[name="additionalinfo[national_identity_number]"]');
        $foreignerCheckbox.on('change', function () {
            var defaultValue  = $nationalIdentityNumberInput.val();
            if ($(this).is(':checked')) {
                foreignerContent.removeClass('u-hidden');
                $nationalIdentityNumberInput.val('').prop('disabled', true).addClass('u-disabled');
            } else {
                foreignerContent.addClass('u-hidden');
                $nationalIdentityNumberInput.val(defaultValue).prop('disabled', false).removeClass('u-disabled');
            }
        });

        $foreignerCheckbox.change();
    },

    initModalInputs: function () {
        var re = new RegExp('([۰-۹]|[0-9]|Backspace|ArrowLeft|ArrowRight)');
        $('.js-not-empty-input').on('input change', function (e) {
            var parent = $(this).closest('.js-not-empty-parent');
            var inputs = parent.find('.js-not-empty-input');
            var btn = parent.find('.js-not-empty-btn');

            function checkInputs(inputs) {
                var result = true;
                $.map(inputs, function (item) {
                    if (!item.value) {
                        result = false;
                    }
                });
                return result;
            }

            if (e.target.value === '' && !btn.hasClass('disabled'))
                btn.addClass('disabled');
            else {
                if (checkInputs(inputs)) {
                    btn.removeClass('disabled');
                }
            }
        });

        $('.js-persian-digit-input').on('keydown', function (e) {
            if (!re.test(e.key)) {
                e.preventDefault();
            }
        });

        $('.js-persian-digit-input').on('input', function (e) {
            $(this).val(Services.convertToFaDigit($(this).val()));
        });
    },

    initCardInput: function () {
        var re = new RegExp('([۰-۹]|[0-9]|Backspace|ArrowLeft|ArrowRight)');
        var cardInput = $('.js-card-complete-input');
        var $ibanInput = $('.js-iban-input');
        var cardButton = $('.js-card-complete-btn');
        var $ibanButton = $('.js-check-iban-button');
        var confirmCardModal = $('[data-remodal-id ="personal-info-bank_card_confirm-modal"]').remodal();
        var bankCardModal = $('[data-remodal-id ="personal-info-bank_card_number-modal"]').remodal();
        var $selectorInput = $('.js-credit-card-selector-input');
        var submitedCardNumber, submitedIbanNumber;
        var $ibanState = $('.js-iban-state');
        var $cardNubmerState = $('.js-card-number-state');
        var $destinationState = $('.js-destination-state');
        var $editIbanButton = $('.js-edit-iban');
        var $ibanDestRowModalText = $('.js-iban-dest-row-text');
        var $ibanDestRowModalDsc = $('.js-iban-dest-row-dsc');
        var refundTableValue = $('[data-remodal="bank_card_number"]').parent().find('.c-profile-personal__grid-item-value');
        var dataId = '';
        var openConfirmModal = function (response) {
            $('.js-confirm-card-bank-number').text(response.cardNumber);
            $('.js-confirm-card-bank-name').text(response.bankName);
            $('.js-confirm-iban').text(response.iban);
            $('.js-confirm-card-bank-owner').text(response.owner);

            submitedCardNumber = response.cardNumber;
            submitedIbanNumber = response.iban;
            dataId = response.id
            confirmCardModal.open();
        }
        var setRefundDestination = function (is_wallet_preferred_for_refund, iban) {
            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/personal-info/update/',
                {
                    additionalinfo: {
                        is_wallet_preferred_for_refund: is_wallet_preferred_for_refund,
                    }
                },
                function (res) {
                    if(is_wallet_preferred_for_refund) {
                        refundTableValue.text('کیف پول');
                        window.DKToast('کیف پول به عنوان روش بازگشت وجه انتخاب شد.');
                    } else {
                        refundTableValue.text(iban);
                        window.DKToast('حساب بانکی به عنوان روش بازگشت وجه انتخاب شد.');
                        $editIbanButton.removeClass('u-hidden');
                        $ibanDestRowModalDsc.addClass('u-hidden');
                        $ibanDestRowModalText.removeClass('u-hidden').text('شماره شبا: ' + iban);
                    }
                },
                function (err) {
                    DKAlert(err.errors[0])
                },
                false,
                true
            );
        }
        var changeCardNumberModalState = function (state) {
            switch (state) {
                case 'getConfirmCode': {
                    var phoneVerificationModal = $('.js-phone-verification-modal').remodal();
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/profile/personal-info/mobile-phone/current-phone/send-code/',
                        {},
                        function (response) {
                            phoneVerificationModal.open();
                            $('.js-changed-phone-number').text(Services.convertToFaDigit(response.phone));
                            $('.js-confirm-phone-form').append(response.cryptFields).data('validate-card', true);
                            $('.js-phone-code-counter').data('countdownseconds', response.sms_ttl);
                            $('.js-send-confirm-code').addClass('u-hidden').addClass('js-send-code-edit-phone').off();
                            $('.js-phone-code-container').removeClass('u-hidden');
                            personalInfo.initCounter();
                        },
                        function (response) {
                            Services.hideLoader();
                            $.each(response.errors, function (field, error) {
                                DKToast(error);
                            });
                        },
                        true,
                        false
                    );
                    return;
                }

                case 'selectDestination': {
                    $destinationState.removeClass('u-hidden');
                    $cardNubmerState.addClass('u-hidden');
                    $ibanState.addClass('u-hidden');
                    return;
                }

                case 'inputCardNumber': {
                    $destinationState.addClass('u-hidden');
                    $cardNubmerState.removeClass('u-hidden');
                    $ibanState.addClass('u-hidden');
                    return;
                }

                case 'inputIban': {
                    $destinationState.addClass('u-hidden');
                    $cardNubmerState.addClass('u-hidden');
                    $ibanState.removeClass('u-hidden');
                    return;
                }
            }
        }

        cardInput.on('keydown', function (e) {
            if (!re.test(e.key)) {
                e.preventDefault();
            }

            if(isModuleActive('iban')) {
                $selectorInput.val('').prop("checked", false);
            }
        });

        cardInput.on('input', function (e) {

            function checkInputs(inputs)
            {
                var result = true;
                $.map(inputs, function (item) {
                    if (item.value.length !== 4) {
                        result = false;
                    }
                });
                return result;
            }

            if (e.target.value.length < 4 && !cardButton.hasClass('disabled'))
                cardButton.addClass('disabled');
            else {
                if (checkInputs(cardInput)) {
                    cardButton.removeClass('disabled');
                }
            }

            if (e.target.value.length === 4) {
                $(this).nextAll('.js-card-complete-input').first().focus();
            } else if (e.target.value.length === 0) {
                $(this).prevAll('.js-card-complete-input').first().focus();
            }

            $(this).val(Services.convertToFaDigit($(this).val()));
        });

        cardButton.on('click', function () {
            var bankCardNumber = '';

            $.map(cardInput, function (item) {
                bankCardNumber = bankCardNumber + Services.convertToEnDigit($(item).val());
            });

            if(isModuleActive('iban')) {
                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/convert-card-to-iban/',
                    {
                        'card_number': bankCardNumber
                    },
                    function (response) {
                        openConfirmModal(response);
                    },
                    function (response) {
                        if(response.errors.client_error) {
                            bankCardModal.open();
                            if(response.context) {
                                submitedCardNumber = bankCardNumber;
                                changeCardNumberModalState('inputIban');

                                $ibanState.find('.js-iban-bank-title').text(response.context.bankName);
                                $ibanState.find('.js-iban-credit-card-number').text(response.context.cardNumber);
                                $ibanState.find('.js-iban-bank-image').attr('src', response.context.bankLogo);
                            } else {
                                DKToast(response.errors.client_error);
                            }
                            return;
                        }

                        if(Object.values(response.errors).length > 0) {
                            DKToast(Object.values(response.errors)[0]);
                        }
                    },
                    true,
                    true
                );
            } else {
                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/bank-card-number/',
                    {
                        'card_number': bankCardNumber
                    },
                    function (response) {
                        $('.js-confirm-card-bank-number').text(response.cardNumber);
                        $('.js-confirm-card-bank-name').text(response.bankName);
                        $('.js-confirm-card-bank-owner').text(response.cardHolder);
                        confirmCardModal.open();
                    },
                    function (response) {
                        DKToast(response.errors);
                    },
                    true,
                    true
                );
            }
        });

        $('.js-card-confirm-btn').on('click', function () {
            if(isModuleActive('iban')) {
                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/verify-card-and-iban/',
                    {
                        card_number: submitedCardNumber,
                        iban: submitedIbanNumber,
                        id: dataId,
                    },
                    function (response) {
                        DKToast('اطلاعات شما با موفقیت بروزرسانی شد');
                        $('.js-destination-selector-input[value="iban"]').prop("checked", true);
                        refundTableValue.text(response.iban);
                        $editIbanButton.removeClass('u-hidden');
                        $ibanDestRowModalDsc.addClass('u-hidden');
                        $ibanDestRowModalText.removeClass('u-hidden').text('شماره شبا: ' + response.iban);
                    },
                    function (response) {
                        DKToast(response.errors);
                    },
                    true,
                    true
                );
            } else {
                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/bank-card-number/verify/',
                    null,
                    function (response) {
                        $('.js-card-info').removeClass('u-hidden');
                        // cardInfoModal.close();
                        if (!$('.js-card-confirmed').hasClass('c-profile-edit__label-verified')) {
                            $('.js-card-confirmed').addClass('c-profile-edit__label-verified');
                        }
                        $('.js-check-card').css('background', '#d6d6d6');
                        /*$('.js-check-card').attr('disabled', 'disabled');
                        $bankCardNumber.attr('disabled', 'disabled');
                        $bankCardNumber.css('border', '1px solid #c8c8c8');*/
                    },
                    function (response) {
                        DKToast(response.errors);
                    },
                    true,
                    true
                );
            }
        });

        $('.js-card-confirm-edit').on('click', function() {
            bankCardModal.open();
        });

        $editIbanButton.on('click', function (){
            var modalState = 'inputCardNumber';

            if (isModuleActive('dk_card_edit_changes')) {
                modalState = $(this).data('virtual-click') ? 'inputCardNumber' : 'getConfirmCode';
                $(this).data('virtual-click', false);
            }

            changeCardNumberModalState(modalState);
        })

        $ibanInput.on('input', function (e) {
            if (e.target.value.length < 4 && !$ibanButton.hasClass('disabled'))
                $ibanButton.addClass('disabled');
            else {
                $ibanButton.removeClass('disabled');
            }
        });

        $('#iban-input-form').on('submit', function (e){
            e.preventDefault();
            $ibanButton.click();
        })

        $ibanButton.click(function() {
            Services.ajaxPOSTRequestJSON(
                '/ajax/profile/match-card-to-iban/',
                {
                    'card_number': submitedCardNumber,
                    'iban': Services.convertToEnDigit($ibanInput.val()),
                },
                function (response) {
                    openConfirmModal(response);
                },
                function (response) {
                    if(response.errors.invalid_bank_iban_number) {
                        bankCardModal.open();
                        DKToast(response.errors.invalid_bank_iban_number);
                        return;
                    }

                    if(response.errors.unmatchable_iban_card_owner) {
                        bankCardModal.open();
                        DKToast(response.errors.unmatchable_iban_card_owner);
                        return;
                    }

                    var errorMessages = Object.values(response.errors)
                    if(errorMessages.length > 0) {
                        DKToast(errorMessages[0]);
                    }
                },
                true,
                true
            );
        })

        if(isModuleActive('iban')) {
            $selectorInput.on('change', function (){
                cardInput.val('');
                cardButton.removeClass('disabled');
            });

            $('.js-destination-selector-input').on('change', function (e){
                $this = $(this)

                if(e.target.value === 'iban') {
                    if($this.data('has-iban')) {
                        setRefundDestination(false, $this.data('iban'));
                    } else {
                        changeCardNumberModalState('inputCardNumber');
                        $this.prop('checked', false);
                    }
                } else {
                    setRefundDestination(true);
                }
            })

            $('[data-remodal="bank_card_number"]').click(function (){
                if($(this).data('verified-phone') !== 1){
                    return
                }
                changeCardNumberModalState('selectDestination');

                Services.ajaxGETRequestJSON(
                    '/ajax/profile/wallet/',
                    {},
                    function (res) {
                        var response = (res || {});
                        if (!response.hasOwnProperty('amount') &&
                            !response.hasOwnProperty('activationUrl') &&
                            !response.hasOwnProperty('notVerified')) {
                            $('.js-refund-wallet-disable').addClass('u-hidden');
                            $('.js-refund-wallet-available').addClass('u-hidden');
                            $('.js-refund-wallet-unavailable').removeClass('u-hidden');
                            $('.js-destination-selector-input[value="wallet"]').prop('disabled', true);
                        } else if(response.activationUrl != null) {
                            $('.js-refund-wallet-disable').removeClass('u-hidden');
                            $('.js-refund-wallet-available').addClass('u-hidden');
                            $('.js-refund-wallet-unavailable').addClass('u-hidden');
                            $('.js-destination-selector-input[value="wallet"]').prop("disabled", true);
                            $('.js-refund-wallet-activate-link').attr('href', response.activationUrl);
                        } else {
                            $('.js-refund-wallet-disable').addClass('u-hidden');
                            $('.js-refund-wallet-available').removeClass('u-hidden');
                            $('.js-refund-wallet-unavailable').addClass('u-hidden');
                            $('.js-destination-selector-input[value="wallet"]').prop("disabled", false);
                        }

                        bankCardModal.open();
                    },
                    function () {
                        $('.js-refund-wallet-disable').addClass('u-hidden');
                        $('.js-refund-wallet-available').addClass('u-hidden');
                        $('.js-refund-wallet-unavailable').removeClass('u-hidden');
                        $('.js-destination-selector-input[value="wallet"]').prop('disabled', true);
                    },
                    false,
                    true
                );
            });
        }
    },

    initModals: function () {
        var modals = $('.js-personal-info-modal'),
            self = this;

        $('.js-personal-info-modal-btn').on('click', function () {
            var $this = $(this),
                itemKey = $this.data('remodal');

            if(isModuleActive('iban') && itemKey === 'bank_card_number' && $this.data('verified-phone') !== 1) {
                window.DKConfirm(
                    'برای انتخاب روش بازگردانی وجه باید ابتدا شماره تلفن همراه خود را تایید کنید',
                    function (){
                        $('[data-remodal="mobile_phone"]').click();
                        $('[name="additionalinfo[mobile_phone]"]').change();
                    },
                    function (){},
                    'تایید شماره تلفن همراه',
                    'انصراف',
                );
                return;
            }

            self.activeModalTrigger = $this;
            self.activeModal = modals.filter('[data-remodal-id = personal-info-' + itemKey + '-modal]');
            self.activeModal.remodal().open();
        });
    },

    initEmailSubmissionToasts: function () {
        var notice = $('.js-notice');

        if (window.formSubmissionMsg) {
            notice.removeClass('u-hidden').find('.js-notice-text').text(window.formSubmissionMsg);
        }
    },

    initSendConfirmCode: function () {
        var self = this;

        $('.js-send-confirm-code').click(function (e) {
            e.preventDefault();

            var $this = $(this);

            window.Services.ajaxPOSTRequestJSON(
                '/ajax/users/change-login-phone/send-confirm-code/',
                {
                    rc: $this.closest('form').find('[name=rc]').val(),
                    rd: $this.closest('form').find('[name=rd]').val(),
                },
                function (data) {
                    $('.js-phone-code-counter').data('countdownseconds', data.phoneCodeTtl);
                    $('.js-send-confirm-code').addClass('u-hidden');
                    $('.js-phone-code-container').removeClass('u-hidden');
                    self.initCounter();
                    $('[data-remodal-id = personal-info-phone-verification-modal]').remodal().open();
                },
                function (data) {
                    console.log(data);
                },
                false,
                true
            );
        });
    },

    initRemoveLegalInfo: function () {
        var $removeLegalInfoBtn = $(".js-delete-legal-info-btn")
        var $approveBth = $(".js-remodal-general-alert__button--approve");
        var $cancelBtn = $(".js-remodal-general-alert__button--cancel");
        function addStyle() {
            $approveBth.css("margin-left", "16px");
            $cancelBtn.css("margin-left", "0");
        }
        function removeStyle() {
            $approveBth.css("margin-left", "");
            $cancelBtn.css("margin-left", "");
        }
        $removeLegalInfoBtn.on("click", function () {
            $(document).one("closed", "[data-remodal-id=alert]", function () {
                removeStyle()
            });

            DKConfirm(
                "آیا از پاک کردن اطلاعات حقوقی مطمئن هستید؟",
                function approve() {
                    removeStyle();
                    Services.showLoader();
                    setTimeout(function () {
                        $.ajax({
                            type: "POST",
                            url: "", // TODO
                            success: function () {
                                Services.hideLoader();
                            },
                            error: function () {
                                Services.hideLoader();
                            },
                        });
                    }, 1000)

                },
                function reject() { },
                "پاک کردن",
                "انصراف",
            );

            addStyle();
        });
    },

    initCounter: function () {
        var $counter = $('.js-phone-code-counter');

        $counter.countdown('destroy');
        var seconds = $counter.data('countdownseconds'),
            now;

        now = new Date();
        now.setSeconds(now.getSeconds() + seconds);

        if (!now) {
            return;
        }

        $counter.countdown({
            date: now,
            hoursOnly: true,
            rtlTemplate: '%i:%s',
            template: '%i:%s',
            leadingZero: true,
            onComplete: function () {
                $('.js-send-confirm-code').removeClass('u-hidden');
                $('.js-phone-code-container').addClass('u-hidden');
            }
        });
    }
};

var AdditionalInfoAction = {

    init: function () {
        if (activeMenu !== 'additionalInfo') {
            return;
        }

        this.initUpdateCompanyCities();
        this.initForeignerSwitch();
        this.initCompanyDetailsSwitch();
        this.initBankCardNumPrettifier();
        this.initAdditionalInfoForm();
    },

    initUpdateCompanyCities: function () {
        $(document).on('change', '.js-select-company-state', function () {
            /*if(!$('.js-legal-info-check').is(':checked')) {
                return;
            }*/

            var $this = $(this);
            var $form = $this.closest('form');
            var formCityId = $form.data('city-id');
            var stateId = $this.val();
            var $citySelector = $form.find('.js-select-company-city');

            if (!stateId) {
                return;
            }

            Services.ajaxGETRequestJSON(
                '/ajax/state/cities/' + stateId + '/',
                null,
                function (data) {
                    $citySelector.children('select .js-not-empty').remove();
                    var hasCityId = false;
                    $.each(data, function (index, city) {
                        if (!hasCityId) {
                            hasCityId = city.id === formCityId;
                        }
                        $('<option>').val(city.id).text(city.name).addClass('js-not-empty').appendTo($citySelector);
                    });

                    if (formCityId > 0 && hasCityId) {
                        $citySelector.val(formCityId);
                    }

                    $citySelector.selectric('refresh').change();
                    $this.val(stateId);
                    $this.selectric('refresh');
                },
                function (data) {
                    console.log(data.errors);
                    $citySelector.selectric('refresh').change();
                    $this.val(stateId);
                    $this.selectric('refresh');
                }
            );
        });

        $(document).on('change', '.js-select-company-city', function () {
            $(this).selectric('refresh');
        });

        $('.js-select-company-state').selectric('refresh').change();
        $('.js-select-company-city').selectric('refresh').change();
    },

    initForeignerSwitch: function () {
        var $jsForeignerCheck = $('.js-foreigner-check');
        $jsForeignerCheck.change(function () {
            if ($(this).is(':checked')) {
                $('.js-foreigner').find('input').attr('disabled', true).addClass('disabled');
            } else {
                $('.js-foreigner').find('input').attr('disabled', false).removeClass('disabled');
            }
        });

        $jsForeignerCheck.change();
    },

    initCompanyDetailsSwitch: function () {
        var $jsLegalInfoCheck = $('.js-legal-info-check');
        $jsLegalInfoCheck.change(function () {
            var $companyDetailsContainer = $('.js-legal-info');
            if ($(this).is(':checked')) {
                $companyDetailsContainer.find(':text').attr('disabled', false);
                $companyDetailsContainer.find('select').removeAttr('disabled').selectric('refresh');
            } else {
                $companyDetailsContainer.find(':text').attr('disabled', true);
                $companyDetailsContainer.find('select').attr('disabled', 'disabled').selectric('refresh');
            }
        });

        $jsLegalInfoCheck.change();

        $('.js-create-legal-info-btn').click(function () {
            $(this).remove();
            var $legalInfoCheck = $('.js-legal-info-check');
            $legalInfoCheck.prop('checked', true);
            $legalInfoCheck.trigger('change');
        });
    },

    initBankCardNumPrettifier: function () {
        var self = this;
        var $input = $('.js-bank-card-num');
        if (!$('.js-check-card').length) {
            $(document).on('keyup', $input, function () {
                var allDigits = $input.val().split('');
                var result = "";
                var pureResult = "";
                for (var i = 0; i < allDigits.length; i++) {
                    if (/[0-9۰۱۲۳۴۵۶۷۸۹]/.test(allDigits[i])) {

                        if (pureResult.length % 4 === 0 && pureResult.length > 0) {
                            result += "-" + allDigits[i];
                        } else {
                            result += allDigits[i];
                        }
                        pureResult += allDigits[i];
                    }
                }
                $input.val(result);
            });

            $input.keyup();

            $input.on('focus', function () {
                $('.js-bank-card-message').removeClass('u-hidden');
            });

            $input.on('blur', function () {
                $('.js-bank-card-message').addClass('u-hidden');
            });
        } else {
            $input.focus(function () {
                $(this).css('border', '1px solid #3d3d3d');
            });
            $(document).on('keyup', $input, function () {
                var allDigits = $input.val().split(''),
                    result = "",
                    pureResult = "",
                    cardRegex = /[0-9۰۱۲۳۴۵۶۷۸۹]/;
                for (var i = 0; i < allDigits.length; i++) {
                    if (cardRegex.test(allDigits[i])) {

                        if (pureResult.length % 4 === 0 && pureResult.length > 0) {
                            result += "-" + allDigits[i];
                        } else {
                            result += allDigits[i];
                        }
                        pureResult += allDigits[i];
                    }
                }
                $input.val(result);
                var cardNumber = $input.val().split('');
                if (cardNumber.length == 19 || cardNumber.length == 24) {
                    $('.js-check-card').css('background', '#00bfd6');
                    $('.js-check-card').unbind("click").on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (!$('.js-bank-card-num').hasClass('has-error')) {
                            self.checkBankCardNumber();
                        }
                    });
                } else {
                    $('.js-check-card').css('background', '#d6d6d6');
                }
            });
            $input.keyup();
        }
    },

    initAdditionalInfoForm: function () {

        var $form = $('#additionalInfoForm');

        $form.find('input').first().focus();

        $form.validate({
            rules: {
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
                'additionalinfo[national_identity_number]': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    national_identity_number: true
                },
                'additionalinfo[mobile_phone]': {
                    // required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 13
                },
                'additionalinfo[phone]': {
                    // required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
                'additionalinfo[bank_card_number]': {
                    minlength: 19,
                    maxlength: 23,
                    bank_card_number: true
                },
                'additionalinfo[email]': {
                    // required: true,
                    email: true
                },
                'additionalinfo[state_id]': {
                    required: true
                },
                'additionalinfo[city_id]': {
                    required: true
                },
                'additionalinfo[company_name]': {
                    required: true,
                    maxlength: 255
                },
                'additionalinfo[company_economic_number]': {
                    digits: true,
                    maxlength: 12,
                    company_economic_number: true
                },
                'additionalinfo[company_national_identity_number]': {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11,
                    company_national_identity_number: true
                },
                'additionalinfo[company_registration_number]': {
                    required: true,
                    digits: true,
                    maxlength: 20
                },
                'additionalinfo[company_phone]': {
                    required: true,
                    digits: true,
                    minlength: 8,
                    maxlength: 11
                },
                'additionalinfo[company_state_id]': {
                    required: true
                },
                'additionalinfo[company_city_id]': {
                    required: true
                }

            },
            messages: {
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
                'additionalinfo[national_identity_number]': {
                    'required': 'کد ملی نامعتبر است',
                    'digits': 'کد ملی را درست وارد نمایید',
                    'minlength': 'کد ملی را کامل وارد نمایید',
                    'maxlength': 'کد ملی را درست وارد نمایید',
                    'national_identity_number': 'کد ملی نامعتبر است'
                },
                'additionalinfo[mobile_phone]': {
                    'required': 'شماره موبایل وارد نشده است',
                    'digits': 'شماره موبایل را درست وارد نمایید',
                    'minlength': 'شماره موبایل را کامل وارد نمایید',
                    'maxlength': 'شماره موبایل را درست وارد نمایید'
                },
                'additionalinfo[phone]': {
                    'required': 'شماره تلفن ثابت وارد نشده است',
                    'digits': 'شماره تلفن ثابت را درست وارد نمایید',
                    'minlength': 'شماره تلفن ثابت را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن ثابت را درست وارد نمایید'
                },
                'additionalinfo[bank_card_number]': {
                    // 'digits': 'فقط مقدار عددی مجاز است',
                    'minlength': 'شماره کارت بانکی نامعتبر است',
                    'maxlength': 'شماره کارت بانکی نامعتبر است',
                    'bank_card_number': 'شماره کارت بانکی نامعتبر است'
                },
                'additionalinfo[email]': {
                    'required': 'ایمیل وارد نشده است',
                    'email': 'ایمیل نامعتبر است'
                },
                'additionalinfo[company_name]': {
                    'required': 'نام شرکت نمی تواند خالی باشد.',
                    'maxlength': 'نام شرکت را کوتاه‌تر وارد نمایید'
                },
                'additionalinfo[company_economic_number]': {
                    'digits': 'کد اقتصادی نادرست است.',
                    'minlength': 'کد اقتصادی را کامل وارد نمایید',
                    'maxlength': 'کد اقتصادی طولانی است.',
                    'company_economic_number': 'کد اقتصادی نادرست است.'
                },
                'additionalinfo[company_national_identity_number]': {
                    'required': 'شناسه ملی نمی تواند خالی باشد.',
                    'digits': 'شناسه ملی نادرست است.',
                    'minlength': 'شناسه ملی باید ۱۰ رقم باشد.',
                    'maxlength': 'شناسه ملی باید ۱۰ رقم باشد.',
                    'company_national_identity_number': 'کد ملی نامعتبر است'
                },
                'additionalinfo[company_registration_number]': {
                    'required': 'شماره ثبت را وارد کنید.',
                    'digits': 'شماره ثبت نادرست است.',
                    'maxlength': 'شماره ثبت طولانی است.'
                },
                'additionalinfo[company_phone]': {
                    'required': 'شماره تلفن را وارد کنید.',
                    'digits': 'شماره تلفن فقط باید شامل اعداد انگلیسی باشد',
                    'minlength': 'شماره تلفن را کامل وارد نمایید',
                    'maxlength': 'شماره تلفن طولانی است.'
                },
                'additionalinfo[state_id]': {
                    'required': 'استان انتخاب نشده است'
                },
                'additionalinfo[city_id]': {
                    'required': 'شهر انتخاب نشده است'
                },
                'additionalinfo[company_state_id]': {
                    'required': 'استان انتخاب نشده است'
                },
                'additionalinfo[company_city_id]': {
                    'required': 'شهر انتخاب نشده است'
                }

            }
        }).showBackendErrors();
    },

    checkBankCardNumber: function () {
        var $bankCardNumber = $('.js-bank-card-num');
        var cardNumber = Services.convertToEnDigit($bankCardNumber.val().replace(/-/g, ''));
        Services.ajaxPOSTRequestJSON(
            '/ajax/profile/bank-card-number/',
            {
                'card_number': cardNumber
            },
            function (response) {
                $('.js-card-info-number').text(cardNumber);
                $('.js-card-info-bank').text(response.bankName);
                $('.js-card-info-owner').text(response.cardHolder);

                var cardInfoModal = $('[data-remodal-id=bank-card]').remodal();
                cardInfoModal.open();
                $('.js-confirm-card').unbind('click').on('click', function () {
                    Services.ajaxPOSTRequestJSON(
                        '/ajax/profile/bank-card-number/verify/',
                        null,
                        function (response) {
                            $('.js-card-info').removeClass('u-hidden');
                            // cardInfoModal.close();
                            if (!$('.js-verified-card').hasClass('c-form-legal__label-verified')) {
                                $('.js-verified-card').addClass('c-form-legal__label-verified');
                            }
                            $('.js-check-card').css('background', '#d6d6d6');
                            /*$('.js-check-card').attr('disabled', 'disabled');*/
                            /*$bankCardNumber.attr('disabled', 'disabled');*/
                            $bankCardNumber.css('border', '1px solid #c8c8c8');
                        },
                        function (response) {
                            DKAlert(response.errors);
                        },
                        true,
                        true
                    );
                });
            },
            function (response) {
                DKAlert(response.errors);
            },
            true,
            true
        );
    },
};

var GiftCardDetailsAction = {
    init: function () {
        this.initOrdersCollapse();
    },

    initOrdersCollapse: function () {
        $('.js-gift-details__order-head').on('click', function () {
            var header = $(this),
                orderBox = header.parent();
            if (orderBox.hasClass('c-gift-details__order--collapsed')) {
                orderBox.removeClass('c-gift-details__order--collapsed');
            } else {
                orderBox.addClass('c-gift-details__order--collapsed');
            }
        });
    }
};

var PersonalInfoAction = {
    init: function () {
        try {
            this.initPhoneVerificationModal();
        } catch (e) {
        }
    },

    initPhoneVerificationModal: function () {
        var addAddressModel = $('[data-remodal-id=phone-verification]').remodal();
        addAddressModel.open();
    },
};

$(function () {
    IndexAction.init();
    OrderDetailsAction.init();
    OrderReturnAction.init();
    FavoritesAction.init();
    UserHistory.init();
    CommentAction.init();
    GiftCardAction.init();
    AddressAction.init();
    NotificationsAction.init();
    personalInfo.init();
    AdditionalInfoAction.init();
    GiftCardDetailsAction.init();
    PersonalInfoAction.init();
});