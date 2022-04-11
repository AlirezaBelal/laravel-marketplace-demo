/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/indexController/indexAction.js]*/
var IndexAction = {

    init: function () {
        var functions = [
            this.initHeadSlider,
            this.initDiscountBox,
        ];

        if (isModuleActive('DK_Recommendation')) {
            functions.push(this.initDKRecommendations);
        }

        if(isModuleActive('ml_main_page_ab_test')) {
            functions.push(this.initMyLandingMainPageTestSwiper);
        }

        if(isModuleActive('data_layer_carousels')) {
            functions.push(this.setGACarouselsImpressionEvent);
        }

        if (isModuleActive('dk_ask_to_login_tooltip')) {
            this.initAskUserToLoginBox();
        }

        Services.callListInTryCatch(functions, this);
    },

    initDKRecommendations: function () {
        var template = $('#product-template').clone()[0].innerHTML;
        var thiz = this;

        Services.ajaxGETRequestJSON(
            '/recommendation/v1/',
            {},
            function (response) {

                $.map(response, function (item) {
                    var products = '';
                    var dom;

                    if (item.id === 'personal') {
                        try {
                            dom = $('.js-promo-single-box');
                            $.map(item.products, function (product) {
                                if (product.image) {
                                    products += thiz.createTemplate(template, {
                                        id: product.id,
                                        image: product.image,
                                        title: (product.title.length > 40 ? (product.title.substr(0, 40) + '...') : product.title),
                                        url: product.url,
                                        discount: Services.convertToFaDigit(product.price.discount_percent),
                                        isFMCG: (product.fast_shopping_badge ? '' : 'u-hidden'),
                                        hasDiscount: (product.price.discount_percent > 0 ? '' : 'u-hidden'),
                                        price: Services.convertToFaDigit(Services.formatCurrency(product.price.selling_price, true, '')),
                                        oldValue: Services.convertToFaDigit(Services.formatCurrency(product.price.rrp_price, true, '')),
                                    });
                                }
                                dom.find('.js-promo-single-wrapper').html(products);
                                $.map(dom.find('.js-template-img'), function (item) {
                                    $(item).attr('src', $(item).data('img'));
                                });
                            });

                            thiz.initSinglePromoBoxSwiperWithObservers();
                        } catch (e) {
                            console.log(11, e);
                        }
                    } else {
                        dom = $('#recommendation-' + item.id);

                        if (dom.length > 0) {
                            dom.find('.o-headline').find('span').html(item.title)
                            $.map(item.products, function (product) {
                                if (product.image) {
                                    products += thiz.createTemplate(template, {
                                        id: product.id,
                                        image: product.image,
                                        title: product.title,
                                        url: product.url,
                                        discount: Services.convertToFaDigit(product.price.discount_percent),
                                        isFMCG: (product.fast_shopping_badge ? '' : 'u-hidden'),
                                        hasDiscount: (product.price.discount_percent > 0 ? '' : 'u-hidden'),
                                        price: Services.convertToFaDigit(Services.formatCurrency(product.price.selling_price, true, '')),
                                        oldValue: Services.convertToFaDigit(Services.formatCurrency(product.price.rrp_price, true, '')),
                                    });
                                }
                            });
                            dom.find('.js-products-container').html(products);
                            $.map(dom.find('.js-template-img'), function (item) {
                                $(item).attr('src', $(item).data('img'));
                            });
                            dom.removeClass('u-hidden');

                            new window.Swiper(dom.find('.swiper-container'), {
                                slidesPerView: 6,
                                slidesPerGroup: 5,
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
                                    1367: {
                                        slidesPerView: 4,
                                        slidesPerGroup: 3,
                                        spaceBetweenSlides: 1
                                    },
                                    1679: {
                                        slidesPerView: 5,
                                        slidesPerGroup: 4,
                                        spaceBetweenSlides: 1
                                    }
                                },
                            });
                        }
                    }
                    try {
                        if (item.data_layer) {
                            var dimension19Content = item.id === 'personal' ? 'instant-offer' : 'recommendation-' + item.id,
                                modifiedDataLayerEvent =  IndexAction.replaceGaImpressionDimension19(item.data_layer, dimension19Content);

                            window.Main.setImpressionEventOnAjax(modifiedDataLayerEvent);
                        }

                        var carouselDataTemp = {
                            'id': 'recommendation-'+item.id,
                            'carouselPosition': 'sn-'+item.id,
                            'title': item.title,
                            'title_en': 'SN '+item.id,
                            'products': item.products_tracker,
                            'recomm':true,
                            'page': window.dataGTM
                        };
                        window.carouselData.push(carouselDataTemp);
                    } catch (e) {


                    }
                });
            },
            function (response) {
            },
            false,
            false
        );
    },

    replaceGaImpressionDimension19: function (dataLayerString, replacingString) {
        return dataLayerString.replace(
            /"dimension19":"carousel-recommendation"/g,
            '"dimension19":"' + replacingString + '"'
        )
    },

    initDiscountBox: function () {
        var $item = $('.js-discount-item'),
            $container = $('.js-discount-container'),
            sliderInterval = null;

        $('.js-counter-incredible').each(function () {
            var that = $(this), seconds = $(this).data('countdownseconds'), now;

            if (!!that.attr('data-countdownseconds') && !!seconds) {
                now = new Date();
                now.setSeconds(now.getSeconds() + seconds);
            } else {
                now = ('' + $(this).data('countdown')).replace(/-/g, '/');
            }

            if (!now) return;

            that.countdown({
                hoursOnly: true,
                rtlTemplate: '<span>%h</span>:<span>%i</span>:<span>%s</span>',
                template: '<span>%h</span>:<span>%i</span>:<span>%s</span>',
                leadingZero: true,
                date: now,
                onComplete: function () {
                    var product = that.closest('.js-discount-product');
                    if (!product.hasClass('c-discount__product--invisible'))
                        product.addClass('c-discount__product--finished-incredible');
                }
            });
        });

        if ($item.length <= 1) return;

        $container.off();
        $item.off();

        $container.hover(function () {
            sliderInterval.pause();
        }, function () {
            sliderInterval.resume();
        });

        var changeActive = function ($this, id) {
            $item.removeClass('is-active');
            $this.addClass('is-active');

            setTimeout(function () {
                $container.removeClass('is-active');
                $container.filter('[data-id="' + id + '"]')
                    .addClass('is-active')
                    .animateCss('fadeIn');
                dispatchEvent(new Event('scroll'));
            }, 100);
            if (!!discountSlider) {
                try {
                    discountSlider.slideTo(id - 3);
                } catch (e) {
                    // console.log(e)
                }
            }
        };

        var pausingInterval = function (callback, delay) {
            if (!callback || typeof callback !== typeof function () {
            })
                throw TypeError("Callback should be a Function");
            if (!delay || typeof delay !== typeof 1)
                throw TypeError("Delay should be a Number");

            this.callback = callback;
            this.delay = delay;
            this.startDate = new Date();
            this.remaining = this.delay;
            this.currentInterval = null;
            this.currentTimeout = null;

            this.resume = function () {
                this.clear();
                this.currentTimeout = setTimeout((function () {
                    this.startDate = new Date();
                    this.callback();
                    this.remaining = this.delay;
                    this.currentInterval = setInterval((function () {
                        this.startDate = new Date();
                        this.callback();
                    }).bind(this), this.delay);
                }).bind(this), this.remaining);
                this.startDate = new Date();
                return this;
            };

            this.pause = function () {
                this.clear();
                this.remaining = (this.remaining > 0 ? this.remaining : this.delay) - (new Date() - this.startDate);
                this.remaining = this.remaining > 0 && this.remaining <= this.delay ? this.remaining : this.delay;
                return this;
            };

            this.clear = function () {
                if (this.currentInterval) clearInterval(this.currentInterval);
                if (this.currentTimeout) clearTimeout(this.currentTimeout);
                return this;
            };

            this.callCallback = function () {
                this.clear();
                this.callback();
                return this.resume();
            };

            this.reset = function () {
                this.remaining = this.delay;
                return this;
            };

            return this.resume();
        };

        var createInterval = function () {
            if (sliderInterval) sliderInterval.clear();
            sliderInterval = new pausingInterval(function () {
                var $activeItem = $item.filter('.is-active'),
                    activeId = Number($activeItem.attr('data-id')) + 1;

                if (activeId > $item.length) {
                    activeId = 1;
                }

                var $nextItem = $item.filter('[data-id="' + activeId + '"]');

                changeActive($nextItem, activeId);
            }, 7000);

        };

        createInterval();

        $item.on('click', function (e) {
            var $this = $(this),
                id = $this.attr('data-id');

            sliderInterval.clear();
            changeActive($this, id);
            createInterval();

            e.preventDefault();
        });

        var $user = new UserClass();
        if (!$user.isLogged()) {
            $('.btn-light--sign-up').click(function () {
                $user.showLoginForm();
            });
        }

        var discountSlider;

        enquire.register("screen and (max-width:1365px)", {
            match: function () {
                discountSlider = new Swiper('.js-discount-slider', {
                    slidesPerView: 'auto',
                    slidesPerGroup: 1,
                    slideClass: 'c-discount__aside-li',
                    slideActiveClass: 'c-discount__aside-ul--active',
                    wrapperClass: 'c-discount__aside-ul',
                    // navigation: {
                    //     nextEl: '.js-discount-slider-next',
                    //     prevEl: '.js-discount-slider-prev'
                    // }
                });
                $('.js-discount-slider-next').on('click', function () {
                    if (sliderInterval) sliderInterval.callCallback();
                });
                $('.js-discount-slider-prev').on('click', function () {
                    var $activeItem = $item.filter('.is-active'),
                        activeId = Number($activeItem.attr('data-id')) - 1;

                    if (activeId > $item.length) {
                        activeId = 1;
                    } else if (activeId <= 0) {
                        activeId = $item.length
                    }

                    var $nextItem = $item.filter('[data-id="' + activeId + '"]');

                    changeActive($nextItem, activeId);
                })
            },
            unmatch: function () {
                if (!!discountSlider)
                    discountSlider.destroy();
            }
        });
    },

    seedSinglePromoBoxSwiper: function (data) {

        var template =
            '<a class="swiper-slide {extraClass}" href="/product/dkp-{id}/" title="{title}" data-id="{id}" data-carousel="emarsys-promo-single">' +
            '<span class="c-promo-single__img"> ' +
            '<img data-src-swiper="{image}" class="swiper-lazy"/>' +
            '{badge}' +
            '</span>' +
            '<span class="c-promo-single__desc">' +
            '<span class="c-promo-single__title">{title}</span>' +
            '<span class="c-promo-single__prince-container">' +
            '<del class="c-promo-single__discount">{discount}</del>' +
            '<span class="c-promo-single__price">{price} تومان</span>' +
            '</span>' +
            '</span>' +
            '</a>';
        var items = '';

        $.each(data, $.proxy(function (index, item) {
            items += this.createTemplate(template, {
                title: item.title.slice(0, 50) + (item.title.length > 50 ? '...' : ''),
                image: item.image.replace('/120/', '/220/'),
                price: Emarsys.convertToFaDigit(Emarsys.formatCurrency(String(item.price), false, '')),
                id: item.id,
                discount: item.msrp > 0 && item.msrp != item.price ? Emarsys.convertToFaDigit(Emarsys.formatCurrency(String(item.msrp), false, '')) : '',
                extraClass: item.c_has_quick_view ? 'js-fast-shopping has-more' : '',
                badge: item.c_fast_shopping_badge ? '<img class="c-product-box__fmcg-symbol" src="/fresh-badge.svg">' : ''
            });
        }, this));

        $('.js-promo-single-loader').fadeOut(500, $.proxy(function () {
            $('.js-promo-single-wrapper').html(items);
            this.initSinglePromoBoxSwiper();
        }, this));

    },

    createTemplate: function (s, d) {
        for (var p in d)
            s = s.replace(new RegExp('{' + p + '}', 'g'), d[p]);
        return s;
    },

    initSinglePromoBoxSwiperWithObservers() {
        window.swipers = [];
        $('.js-promo-single').each(function (i) {
            var $this = $(this),
            $promoBar = $this.find('.js-promo-single-bar'),
            $promoBox = $this.find('.js-promo-single-box');

            swipers[i] = new Swiper($promoBox.get(0), {
                slidesPerView: 1,
                speed: 500,
                allowTouchMove: false,
                autoplay: {
                    delay: 7000
                },
                lazy: true,
                loop: true,
                on: {
                    slideChangeTransitionEnd: function () {
                        $promoBar.addClass('is-active');
                    },
                    slideChange: function () {
                        $promoBar.removeClass('is-active');
                    },
                    resize: function () {
                        setTimeout($.proxy(function () {
                            this.detachEvents();
                            this.attachEvents();
                            this.update();
                            this.autoplay.run();
                        }, this), 500);
                    }
                }
            });

            function pause() {
                swipers[i].pauseTime = new Date().getTime();
                swipers[i].autoplay.stop();
                $promoBar.removeClass('is-active');
                swipers[i].autoplay.stop();
            }

            function play() {
                swipers[i].autoplay.start();
                swipers[i].pauseTime = 0;
                $promoBar.addClass('is-active');
            }

            var $box = $('.js-promo-single-box');

            $box.on('mouseenter', function (e) {
                pause();
            });
            $box.on('mouseleave', function (e) {
                play();
            });

            if(IntersectionObserver) {
                // for now we only have one "js-promo-single" so there'll be one observer (despite the loop that this resides in)
                // change this in case we got more than one "js-promo-single"
                var observer = new IntersectionObserver(function observerCb(entries) {
                    "use strict";
                    entries.map(function(entry) {
                        if(entry.isIntersecting) {
                            play();
                        } else {
                            pause();
                        }
                    });
                });

                observer.observe(this);
            }
        });
    },

    initSinglePromoBoxSwiper: function () {
        window.swipers = [];
        $('.js-promo-single').each(function (i) {
            var $this = $(this),
                $promoBar = $this.find('.js-promo-single-bar'),
                $promoBox = $this.find('.js-promo-single-box');

            swipers[i] = new Swiper($promoBox.get(0), {
                slidesPerView: 1,
                speed: 500,
                allowTouchMove: false,
                autoplay: {
                    delay: 7000
                },
                lazy: true,
                loop: true,
                on: {
                    init: function () {
                        $promoBar.addClass('is-active');
                    },
                    slideChangeTransitionEnd: function () {
                        $promoBar.addClass('is-active');
                    },
                    slideChange: function () {
                        $promoBar.removeClass('is-active');
                    },
                    resize: function () {
                        setTimeout($.proxy(function () {
                            this.detachEvents();
                            this.attachEvents();
                            this.update();
                            this.autoplay.run();
                        }, this), 500);
                    }
                }
            });


            var $box = $('.js-promo-single-box');
            $box.on('mouseenter', function (e) {
                swipers[i].pauseTime = new Date().getTime();
                swipers[i].autoplay.stop();
                $promoBar.addClass('is-paused');
                console.log(swipers[i].autoplay.stop());
            });
            $box.on('mouseleave', function (e) {
                swipers[i].autoplay.start();
                swipers[i].pauseTime = 0;
                $promoBar.removeClass('is-paused');
            });

        });
    },

    initMyLandingMainPageTestSwiper: function() {
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

        new window.Swiper(".js-my-landing-last-buy", {
            slidesPerView: 4,
            slidesPerGroup: 3,
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
        });

        new window.Swiper(".js-my-landing-category-carousel", {
            slidesPerView: 4,
            slidesPerGroup: 3,
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
                1125: {
                    slidesPerView: 3,
                    slidesPerGroup: 2,
                },
                1367: {
                    slidesPerView: 4,
                    slidesPerGroup: 3,
                },
            },
        });
    },

    initHeadSlider: function () {
        var $w = $(window),
            $slider = $('.js-main-page-slider'),
            top = $slider.offset().top,
            height = $slider.height(),
            bottom = top + height,
            sentBanners = [];

        var self = this;
        self.slidersImpressionsData = [];
        new Swiper('.js-main-page-slider', {
            autoplay: {
                delay: 5000
            },
            effect: 'fade',
            cubeEffect: {
                slideShadows: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'bullets'
            },
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                slideChange: function () {
                    var currentTop = $w.scrollTop();
                    var id = $(this.slides[this.activeIndex]).data('id');
                    if (id && sentBanners.indexOf(id) < 0 && ((top >= currentTop && top <= currentTop + height) || (bottom >= currentTop && bottom <= currentTop + height))) {
                        snt('dkBannerViewed', {bannerId: id, created_at: Date.now()});
                        sentBanners.push(id);
                    }


                },
                click: function () {
                    var id = $(this.slides[this.activeIndex]).data('id');

                }
            }
        });
    },

    setGAClickImpressionEvent: function(productId) {
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

    setGACarouselsImpressionEvent: function () {
        $(document).on('click', '.js-carousel-ga-product-box' , function (event) {
            event.stopPropagation();
            var itemId = $(this).data('id');
            IndexAction.setGAClickImpressionEvent(itemId);
        })
    },

    initAskUserToLoginBox: function () {
        var box = $('.js-ask-to-login-box');
        var carousel = $('.js-ask-to-login-recommendation');
        if(window.userId){
            box.addClass('u-hidden');
            carousel.removeClass('u-hidden');
        } else {
            box.removeClass('u-hidden');
            carousel.addClass('u-hidden');
        }
    },

};

$(function () {
    IndexAction.init();
});