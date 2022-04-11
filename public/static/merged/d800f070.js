/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/categoryController/indexAction.js]*/
var categoryClassJs = {
    init: function () {
        var functions = [
            this.initCategoryTree,
            this.initCategoryCardsView,
            this.initShowMore,
            this.initCategoryTreeFmcg,
            this.initHeadSlider,
            this.initStickySideBarFMCG,
            this.initSuperDeal,
            this.initTimers,
            this.initDigiClubCarousel,
            this.initIncredibleFmcgCarousel,
        ];

        if(location.hostname === 'demo.digikala.com') {
            functions.push(this.initCommingSoonWithObserver);
        } else {
            functions.push(this.initCommingSoon);
        }

        if(isModuleActive('DK_Recommendation')) {
            //functions.push(this.initDKRecommendations)
        }

        if(isModuleActive('data_layer_carousels')) {
            functions.push(this.setImpressionEventClickHandler);
        }

        Services.callListInTryCatch(functions, this);
    },

    createTemplate: function (s, d) {
        for (var p in d)
            s = s.replace(new RegExp('{' + p + '}', 'g'), d[p]);
        return s;
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
                                thiz.initSinglePromoBoxSwiper();
                            });
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
                        var carouselDataTemp = {
                            'id': 'recommendation-'+item.id,
                            'carouselPosition': 'sn-'+item.id,
                            'title': item.title,
                            'title_en': 'SN '+item.id,
                            'products': item.products_tracker
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

    initIncredibleFmcgCarousel: function() {
        new window.Swiper(".js-incredible-fmcg-carousel", {
            slidesPerView: 5,
            slidesPerGroup: 4,
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
                    slidesPerGroup: 3
                }
            }
        });
    },

    initDigiClubCarousel: function () {
        if (isModuleActive('digiclub_promotion_center')) {
            new window.Swiper(".js-swiper-digiclub-promotion-vouchers", {
                slidesPerView: 'auto',
                spaceBetween: 0,
                slidesPerGroup: 6,
                lazy: {
                    enabled: true
                },
                navigation: {
                    nextEl: ".js-swiper-button-next",
                    prevEl: ".js-swiper-button-prev"
                },
                breakpoints: {
                    1367: {
                        slidesPerGroup: 4,
                    },
                    1679: {
                        slidesPerGroup: 5,
                    }
                },
                on: {
                    reachEnd: function() {
                        var activeInstance = this;
                        var carouselType = activeInstance.$el
                            .closest(".swiper-products-container")
                            .attr("data-type");

                        if (typeof carouselType == "undefined") {
                            return;
                        }
                        var pageNo = "pageNo" in activeInstance ? activeInstance.pageNo : 2;

                        activeInstance.pageNo = pageNo + 1;

                        // Services.ajaxGETRequestJSON(
                        //     '/ajax/carousel/' + carouselType,
                        //     {
                        //         'pageno': pageNo
                        //     },
                        //     function (data) {
                        //         if (data.products) {
                        //             var template = self.createSliderItemTemplate(data.products);
                        //             self.appendNewItemsToSliderInstance(activeInstance, template);
                        //         }
                        //     },
                        //     null, null, null,
                        //     'execute'
                        // );
                    }
                }
            });
            new window.Swiper(".js-swiper-digiclub-promotion-products", {
                slidesPerView: 'auto',
                spaceBetween: 0,
                slidesPerGroup: 3,
                lazy: {
                    enabled: true
                },
                navigation: {
                    nextEl: ".js-swiper-button-next",
                    prevEl: ".js-swiper-button-prev"
                },
                breakpoints: {
                    1367: {
                        slidesPerGroup: 2,
                    },
                    1679: {
                        slidesPerGroup: 2,
                    }
                },
                on: {
                    reachEnd: function() {
                        var activeInstance = this;
                        var carouselType = activeInstance.$el
                            .closest(".swiper-products-container")
                            .attr("data-type");

                        if (typeof carouselType == "undefined") {
                            return;
                        }
                        var pageNo = "pageNo" in activeInstance ? activeInstance.pageNo : 2;

                        activeInstance.pageNo = pageNo + 1;

                        // Services.ajaxGETRequestJSON(
                        //     '/ajax/carousel/' + carouselType,
                        //     {
                        //         'pageno': pageNo
                        //     },
                        //     function (data) {
                        //         if (data.products) {
                        //             var template = self.createSliderItemTemplate(data.products);
                        //             self.appendNewItemsToSliderInstance(activeInstance, template);
                        //         }
                        //     },
                        //     null, null, null,
                        //     'execute'
                        // );
                    }
                }
            });
        } else {
            new window.Swiper(".js-swiper-products-promotion-digiclub", {
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
                    1367: {
                        slidesPerView: 3,
                        slidesPerGroup: 2,
                    },
                },
                on: {
                    reachEnd: function () {
                        var activeInstance = this;
                        var carouselType = activeInstance.$el
                            .closest(".swiper-products-container")
                            .attr("data-type");

                        if (typeof carouselType == "undefined") {
                            return;
                        }
                        var pageNo = "pageNo" in activeInstance ? activeInstance.pageNo : 2;

                        activeInstance.pageNo = pageNo + 1;
                    }
                }
            });
        }
    },

    initTimers: function () {
        var $counter = $('.js-counter');

        $counter.each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');

            if (!finalDate) {
                return true;
            }

            $this.countdown({
                date: finalDate,
                hoursOnly: true,
                rtlTemplate: '%s : %i : %h',
                template: '%h : %i : %s'
            });
        });
    },

    initCommingSoonWithObserver: function () {
        var index = -1;
        var slider = $('.js-comming-soon-slider');
        var timebar = $('.js-time-bar');
        var pagination = $('.js-comming-soon-pagination');
        var length = slider.children().length;
        var container = $('.js-comming-soon-container');
        var intervalId;

        if(IntersectionObserver && container.length > 0) {
            var observer = new IntersectionObserver(function (entries) {
                entries.map(function (entry) {
                    if(entry.isIntersecting) {
                        changeProduct();
                        intervalId = setInterval(changeProduct, 6000);
                    } else {
                        stop()
                    }
                })
            });

            observer.observe(container.get(0));
        } else {
            changeProduct();
            intervalId = setInterval(changeProduct, 6000);
        }

        function changeProduct() {
            if (index === length - 1)
                index = -1;
            index++;
            timebar.addClass('c-promotion__comming-soon-time-bar--animated');
            slider.css('transform', 'translate(' + (length === 1 ? 0 : ((index * 198) - ((container.width() - 190) / 2))) + 'px,0)');
            pagination.children().removeClass('c-promotion__comming-soon-pagination-bullet--active');
            slider.children().removeClass('c-promotion__comming-soon-product--active');
            pagination.children(':eq(' + index + ')').addClass('c-promotion__comming-soon-pagination-bullet--active');
            slider.children(':eq(' + index + ')').addClass('c-promotion__comming-soon-product--active');
        }

        function stop() {
            timebar.removeClass('c-promotion__comming-soon-time-bar--animated');
            clearInterval(intervalId);
        }
    },

    initCommingSoon: function () {
        var index = -1;
        var slider = $('.js-comming-soon-slider');
        var pagination = $('.js-comming-soon-pagination');
        var length = slider.children().length;
        var container = $('.js-comming-soon-container');

        function changeProduct() {
            if (index === length - 1)
                index = -1;
            index++;
            slider.css('transform', 'translate(' + (length === 1 ? 0 : ((index * 198) - ((container.width() - 190) / 2))) + 'px,0)');
            pagination.children().removeClass('c-promotion__comming-soon-pagination-bullet--active');
            slider.children().removeClass('c-promotion__comming-soon-product--active');
            pagination.children(':eq(' + index + ')').addClass('c-promotion__comming-soon-pagination-bullet--active');
            slider.children(':eq(' + index + ')').addClass('c-promotion__comming-soon-product--active');
        }

        changeProduct();

        setInterval(changeProduct, 6000);
    },

    initShowMore: function () {
        $('.js-expandable-text').each(function () {
            var expandableText = $(this);
            var $container = expandableText.closest('.js-expandable-text-container');
            var expandBtn = $container.find('.js-expand-btn');

            if (expandableText.height() > 100) {
                $container.addClass('collapsed');
                expandBtn.removeClass('hidden');
            } else {
                $container.removeClass('collapsed');
                expandBtn.addClass('hidden');
            }

            expandBtn.on('click', function () {
                $container.toggleClass('collapsed')
            });
        });
    },

    initSuperDeal: function () {
        var thiz = this;
        var $container = $('.js-products-container');
        var counter = 1;
        var $pointer = $('.js-thumbnail-select');
        var $currentThumbnail;
        var currentThumbnailPosition;
        var isFirst = true;
        var maxCount = $('.js-super-deal-item').length;

        if (!$pointer.length) {
            return;
        }

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

        if(isModuleActive('main_category_amazing_data_layer')) {
            $('.js-add-to-cart-data-layer').on('click', function () {
                var productId = $(this).data('product-id');
                thiz.setGAClickAddToCartImpressionEvent(productId);
            })

            $('.js-ga-item-product-picture').on('click', function () {
                var pID = $(this).data('product-id');
                thiz.setGAClickImpressionEvent(pID);
            })
        }


        $('.js-super-deal-item').on('click', function () {


            if(isModuleActive('main_category_amazing_data_layer')) {
                var productId = $(this).data('product-id');
                thiz.setGAClickImpressionEvent(productId);
            }


            $pointer.animate({
                left: $(this).position().left,
                top: $(this).position().top,
            }, 500);
            $container.find('.js-product-content').hide();

            if (isFirst) {
                $container.find('.js-product-content').removeClass('u-hidden');
                isFirst = false;
            }

            $container.find('#content-' + $(this).attr('id')).fadeIn(500);
            counter = $(this).index();
        });

        var sliderInterval = new pausingInterval(function () {
            if (counter === maxCount)
                counter = 1;
            else
                counter = counter + 1;

            $container.find('.js-product-content').hide();

            if (isFirst) {
                $container.find('.js-product-content').removeClass('u-hidden');
                isFirst = false;
            }

            $container.find('#content-product-' + counter).fadeIn(500);
            $currentThumbnail = $('.js-super-deal-item:nth-child(' + counter + ')');
            currentThumbnailPosition = $currentThumbnail.position() || {};

            $pointer.animate({
                left: currentThumbnailPosition.left,
                top: currentThumbnailPosition.top,
            }, 500);
        }, 5000);

        $container.hover(function () {
            sliderInterval.pause();
        }, function () {
            sliderInterval.resume();
        });

        $(window).on('blur', function () {
            sliderInterval.pause();
        });

        $(window).on('focus', function () {
            sliderInterval.resume();
        });
    },

    initCategoryCardsShowMore: function () {


        var $allCards = $('.js-category-card');

        $allCards.each(function () {

            var $container = $(this);

            var $showMoreContainer = $container.find('.js-category-cards-show-more');
            var $showMore = $container.find('.js-category-cards-show-more a');
            var $list = $container.find('.js-category-cards-list');

            var listMaxHeight = 0;
            try {
                listMaxHeight = parseInt($list.css('max-height').replace("px", ""));
            } catch (e) {

            }

            $list.css('max-height', 'unset');
            var listRealHeight = $list.height();

            $list.css('height', listRealHeight < listMaxHeight ? listRealHeight : listMaxHeight);

            if (listRealHeight <= listMaxHeight) {
                $showMoreContainer.hide();
                $container.removeClass('show-more');
            } else {
                $showMoreContainer.show();
                $container.addClass('show-more');
            }


            $showMore.on('click', function () {

                if ($container.hasClass('is-full')) {
                    $list.css('height', listMaxHeight);
                    $container.removeClass('is-full');
                    $showMore.text('مشاهده بیشتر');

                } else {
                    $container.addClass('is-full');
                    $list.css('height', listRealHeight);
                    $showMore.text('مشاهده کمتر');
                }
            });

        });
    },

    initCategoryCardsView: function () {
        $('.js-category-cards-list').masonry({
            itemSelector: '.js-category-card',
            originLeft: false,
            horizontalOrder: true
            // gutter: 20,
            // columnWith: '25%'
        });

        $('.js-category-cards-list img').on('load', function () {
            var $container = $(this).closest('.js-category-cards-list');
            $container.css('width', $container.width() + 0.1);
            dispatchEvent(new Event('resize'));
        });
    },

    initCategoryTree: function () {
        var $showMore = $('.js-catalog-show-more'),
            $list = $('.js-catalog-list'),
            $container = $list.parent();

        var listMaxHeight = 0;
        try {
            listMaxHeight = parseInt($list.css('max-height').replace("px", ""));
        } catch (e) {

        }

        $list.css('max-height', 'unset');
        var listRealHeight = $list.height();
        $list.css('height', listRealHeight < listMaxHeight ? listRealHeight : listMaxHeight);

        if (listRealHeight <= listMaxHeight) {
            $showMore.hide();
            $container.removeClass('show-more');
        } else {
            $showMore.show();
            $container.addClass('show-more');
        }


        $(document).on('click', '.js-catalog-show-more', function () {
            if ($container.hasClass('is-full')) {
                $list.css('height', listMaxHeight);
                $container.removeClass('is-full');
                $(this).text('مشاهده همه دسته‌بندی‌ها');
            } else {
                $container.addClass('is-full');
                $list.css('height', listRealHeight);
                $(this).text('بستن');
            }
        });
    },

    initCategoryTreeFmcg: function () {
        var $showMore = $(document.querySelectorAll('.js-show-more'));
        if (!$showMore.length) return;
        var subCategoryClass = '.c-catalog__plain-list-subcategory';
        var subcategoryExpandClass = 'c-catalog__plain-list-subcategory--height-controller';
        var expandedClass = 'c-catalog__plain-list-more--expanded';
        var less = 'موارد کمتر';
        var more;

        $showMore.each(checkHeight);
        $showMore.on('click', toggleShowMore);

        function checkHeight() {
            var $this = $(this);
            var $ul = $this.parent().children(subCategoryClass)
            var maxHeight = parseInt($ul.css('max-height'), 10);

            if (maxHeight > $ul.height()) {
                $this.hide();
            }
        }

        function toggleShowMore() {
            var $this = $(this);
            more = more || $this.text();

            $this.text($this.hasClass(expandedClass) ? more : less);
            $this.toggleClass(expandedClass);
            $this.parent().find(subCategoryClass).toggleClass(subcategoryExpandClass);
        }
    },

    initHeadSlider: function () {
        var $slider = $('.js-main-page-slider');
        if (!$slider.length) return;

        var $w = $(window),
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
                }
            }
        });
    },

    initStickySideBarFMCG: function () {
        if (!$('.js-sticky').length && !$('.js-sticky-2').length) return;
        var topSpacing = 15;

        try {
            if (isModuleActive('new_desktop_header')) {
                if(isModuleActive('top_banner_make_unsticky'))
                    topSpacing = 135;
                else
                    topSpacing = $('body').hasClass('has-top-banner') ? 195 : 135;
            }

            this.stickySidebar = new StickySidebar('.js-sticky', {
                containerSelector: false,
                innerWrapperSelector: '.js-sticky-inner',
                topSpacing: topSpacing,
                bottomSpacing: 15,
                leftSpacing: 15,
                resizeSensor: true,
                stickyClass: "is-sticky",
                transformDelta: 0
            });
        } catch (e) {
        }

        try {
            this.stickyContent = new StickySidebar('.js-sticky-2', {
                containerSelector: false,
                innerWrapperSelector: '.js-sticky-inner-2',
                topSpacing: topSpacing,
                bottomSpacing: 15,
                leftSpacing: 15,
                resizeSensor: true,
                stickyClass: "is-sticky",
                transformDelta: 0
            });
        } catch (e) {
        }
    },

    setImpressionEventClickHandler: function() {
        var thiz = this;

        $('.js-ga-category-based-product').on('click', function() {
            var productItem = $(this),
                productId = productItem.data('id');

            thiz.setGAClickImpressionEvent(productId);
        })

        $(document).on('click', '.js-product-url', function() {
            var $productLink = $(this),
                productId = $productLink.data('id');

            if( window.isPromotionCenter ||
                window.isFreshOffer ||
                window.isIncredibleOffer) {
                thiz.setGAClickImpressionEvent(productId);
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

    setGAClickAddToCartImpressionEvent: function (productId) {
        try {
            var productObject = Services.retrieveProductFromDataLayer({
                productId: productId,
                eventName: "eec.productImpression",
                pathArray: ['ecommerce','impressions']
            });

            var productData = removeListNameFromProductObject(productObject);

            var previousPage = document.referrer;
            var impressionObject = createImpressionObj(productData, Main.getGaListName(previousPage));

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
                'event': 'eec.addToCart',
                'ecommerce': {
                    'currencyCode': 'EUR',
                    'add': {
                        'actionField': {
                            'list': listName
                        },
                        'products': [productData]
                    }
                }
            }
        }
    }
};

$(function () {
    categoryClassJs.init();
});



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/libs/jquery.stick.in.parent.min.js]*/
"use strict";!function(e,t){"function"==typeof define&&define.amd?define(t):"object"==typeof exports?module.exports=t():e.ResizeSensor=t()}("undefined"!=typeof window?window:this,function(){if("undefined"==typeof window)return null;var S=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||function(e){return window.setTimeout(e,20)};function o(e,t){var i=Object.prototype.toString.call(e),n="[object Array]"===i||"[object NodeList]"===i||"[object HTMLCollection]"===i||"[object Object]"===i||"undefined"!=typeof jQuery&&e instanceof jQuery||"undefined"!=typeof Elements&&e instanceof Elements,o=0,s=e.length;if(n)for(;o<s;o++)t(e[o]);else t(e)}function w(e){if(!e.getBoundingClientRect)return{width:e.offsetWidth,height:e.offsetHeight};var t=e.getBoundingClientRect();return{width:Math.round(t.width),height:Math.round(t.height)}}var s=function(t,i){var n;function T(){var i,n,o=[];this.add=function(e){o.push(e)},this.call=function(e){for(i=0,n=o.length;i<n;i++)o[i].call(this,e)},this.remove=function(e){var t=[];for(i=0,n=o.length;i<n;i++)o[i]!==e&&t.push(o[i]);o=t},this.length=function(){return o.length}}"undefined"!=typeof ResizeObserver?(n=new ResizeObserver(function(e){o(e,function(e){i.call(this,{width:e.contentRect.width,height:e.contentRect.height})})}),void 0!==t&&o(t,function(e){n.observe(e)})):o(t,function(e){!function(e,t){if(e)if(e.resizedAttached)e.resizedAttached.add(t);else{e.resizedAttached=new T,e.resizedAttached.add(t),e.resizeSensor=document.createElement("div"),e.resizeSensor.dir="ltr",e.resizeSensor.className="resize-sensor";var i="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;",n="position: absolute; left: 0; top: 0; transition: 0s;";e.resizeSensor.style.cssText=i,e.resizeSensor.innerHTML='<div class="resize-sensor-expand" style="'+i+'"><div style="'+n+'"></div></div><div class="resize-sensor-shrink" style="'+i+'"><div style="'+n+' width: 200%; height: 200%"></div></div>',e.appendChild(e.resizeSensor);var o=window.getComputedStyle(e).getPropertyValue("position");"absolute"!==o&&"relative"!==o&&"fixed"!==o&&(e.style.position="relative");var s,r,a,c=e.resizeSensor.childNodes[0],d=c.childNodes[0],l=e.resizeSensor.childNodes[1],p=w(e),h=p.width,f=p.height,u=!0,v=function(){d.style.width="100000px",d.style.height="100000px",c.scrollLeft=1e5,c.scrollTop=1e5,l.scrollLeft=1e5,l.scrollTop=1e5},m=function(){if(u){if(!c.scrollTop&&!c.scrollLeft)return v(),void(a||(a=S(function(){a=0,m()})));u=!1}v()};e.resizeSensor.resetSensor=m;var b=function(){r=0,s&&(h=p.width,f=p.height,e.resizedAttached&&e.resizedAttached.call(p))},g=function(){p=w(e),(s=p.width!==h||p.height!==f)&&!r&&(r=S(b)),m()},y=function(e,t,i){e.attachEvent?e.attachEvent("on"+t,i):e.addEventListener(t,i)};y(c,"scroll",g),y(l,"scroll",g),S(m)}}(e,i)}),this.detach=function(e){"undefined"!=typeof ResizeObserver?o(t,function(e){n.unobserve(e)}):s.detach(t,e)},this.reset=function(){t.resizeSensor.resetSensor()}};return s.reset=function(e,t){o(e,function(e){e.resizeSensor.resetSensor()})},s.detach=function(e,t){o(e,function(e){e&&(e.resizedAttached&&"function"==typeof t&&(e.resizedAttached.remove(t),e.resizedAttached.length())||e.resizeSensor&&(e.contains(e.resizeSensor)&&e.removeChild(e.resizeSensor),delete e.resizeSensor,delete e.resizedAttached))})},s}),function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t(e.StickySidebar={})}(this,function(e){"undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self&&self;var t,i,n=(function(e,t){(function(e){Object.defineProperty(e,"__esModule",{value:!0});var l,n,t=function(){function n(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(e,t,i){return t&&n(e.prototype,t),i&&n(e,i),e}}(),i=(n={topSpacing:0,bottomSpacing:0,containerSelector:!(l=".stickySidebar"),innerWrapperSelector:".inner-wrapper-sticky",stickyClass:"is-affixed",resizeSensor:!0,minWidth:!1},function(){function d(e){var t=this,i=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{};if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,d),this.options=d.extend(n,i),this.sidebar="string"==typeof e?document.querySelector(e):e,void 0===this.sidebar||!this.sidebar)throw new Error("There is no specific sidebar element.");this.sidebarInner=!1,this.container=this.sidebar.parentElement,this.affixedType="STATIC",this.direction="down",this.support={transform:!1,transform3d:!1},this._initialized=!1,this._reStyle=!1,this._breakpoint=!1,this.dimensions={translateY:0,maxTranslateY:0,topSpacing:0,lastTopSpacing:0,bottomSpacing:0,lastBottomSpacing:0,sidebarHeight:0,sidebarWidth:0,containerTop:0,containerHeight:0,viewportHeight:0,viewportTop:0,lastViewportTop:0},["handleEvent"].forEach(function(e){t[e]=t[e].bind(t)}),this.initialize()}return t(d,[{key:"initialize",value:function(){var i=this;if(this._setSupportFeatures(),this.options.innerWrapperSelector&&(this.sidebarInner=this.sidebar.querySelector(this.options.innerWrapperSelector),null===this.sidebarInner&&(this.sidebarInner=!1)),!this.sidebarInner){var e=document.createElement("div");for(e.setAttribute("class","inner-wrapper-sticky"),this.sidebar.appendChild(e);this.sidebar.firstChild!=e;)e.appendChild(this.sidebar.firstChild);this.sidebarInner=this.sidebar.querySelector(".inner-wrapper-sticky")}if(this.options.containerSelector){var t=document.querySelectorAll(this.options.containerSelector);if((t=Array.prototype.slice.call(t)).forEach(function(e,t){e.contains(i.sidebar)&&(i.container=e)}),!t.length)throw new Error("The container does not contains on the sidebar.")}"function"!=typeof this.options.topSpacing&&(this.options.topSpacing=parseInt(this.options.topSpacing)||0),"function"!=typeof this.options.bottomSpacing&&(this.options.bottomSpacing=parseInt(this.options.bottomSpacing)||0),this._widthBreakpoint(),this.calcDimensions(),this.stickyPosition(),this.bindEvents(),this._initialized=!0}},{key:"bindEvents",value:function(){window.addEventListener("resize",this,{passive:!0,capture:!1}),window.addEventListener("scroll",this,{passive:!0,capture:!1}),this.sidebar.addEventListener("update"+l,this),this.options.resizeSensor&&"undefined"!=typeof ResizeSensor&&(new ResizeSensor(this.sidebarInner,this.handleEvent),new ResizeSensor(this.container,this.handleEvent))}},{key:"handleEvent",value:function(e){this.updateSticky(e)}},{key:"calcDimensions",value:function(){if(!this._breakpoint){var e=this.dimensions;e.containerTop=d.offsetRelative(this.container).top,e.containerHeight=this.container.clientHeight-35,e.containerBottom=e.containerTop+e.containerHeight,e.sidebarHeight=this.sidebarInner.offsetHeight,e.sidebarWidth=this.sidebarInner.offsetWidth,e.viewportHeight=window.innerHeight,e.maxTranslateY=e.containerHeight-e.sidebarHeight,this._calcDimensionsWithScroll()}}},{key:"_calcDimensionsWithScroll",value:function(){var e=this.dimensions;e.sidebarLeft=d.offsetRelative(this.sidebar).left,e.viewportTop=document.documentElement.scrollTop||document.body.scrollTop,e.viewportBottom=e.viewportTop+e.viewportHeight,e.viewportLeft=document.documentElement.scrollLeft||document.body.scrollLeft,e.topSpacing=this.options.topSpacing,e.bottomSpacing=this.options.bottomSpacing,"function"==typeof e.topSpacing&&(e.topSpacing=parseInt(e.topSpacing(this.sidebar))||0),"function"==typeof e.bottomSpacing&&(e.bottomSpacing=parseInt(e.bottomSpacing(this.sidebar))||0),"VIEWPORT-TOP"===this.affixedType?e.topSpacing<e.lastTopSpacing&&(e.translateY+=e.lastTopSpacing-e.topSpacing,this._reStyle=!0):"VIEWPORT-BOTTOM"===this.affixedType&&e.bottomSpacing<e.lastBottomSpacing&&(e.translateY+=e.lastBottomSpacing-e.bottomSpacing,this._reStyle=!0),e.lastTopSpacing=e.topSpacing,e.lastBottomSpacing=e.bottomSpacing}},{key:"isSidebarFitsViewport",value:function(){var e=this.dimensions,t="down"===this.scrollDirection?e.lastBottomSpacing:e.lastTopSpacing;return this.dimensions.sidebarHeight+t<this.dimensions.viewportHeight}},{key:"observeScrollDir",value:function(){var e=this.dimensions;if(e.lastViewportTop!==e.viewportTop){var t="down"===this.direction?Math.min:Math.max;e.viewportTop===t(e.viewportTop,e.lastViewportTop)&&(this.direction="down"===this.direction?"up":"down")}}},{key:"getAffixType",value:function(){this._calcDimensionsWithScroll();var e=this.dimensions,t=e.viewportTop+e.topSpacing,i=this.affixedType;return t<=e.containerTop||e.containerHeight<=e.sidebarHeight?(e.translateY=0,i="STATIC"):i="up"===this.direction?this._getAffixTypeScrollingUp():this._getAffixTypeScrollingDown(),e.translateY=Math.max(0,e.translateY),e.translateY=Math.min(e.containerHeight,e.translateY),e.translateY=Math.round(e.translateY),e.lastViewportTop=e.viewportTop,i}},{key:"_getAffixTypeScrollingDown",value:function(){var e=this.dimensions,t=e.sidebarHeight+e.containerTop,i=e.viewportTop+e.topSpacing,n=e.viewportBottom-e.bottomSpacing,o=this.affixedType;return this.isSidebarFitsViewport()?e.sidebarHeight+i>=e.containerBottom?(e.translateY=e.containerBottom-t,o="CONTAINER-BOTTOM"):i>=e.containerTop&&(e.translateY=i-e.containerTop,o="VIEWPORT-TOP"):e.containerBottom<=n?(e.translateY=e.containerBottom-t,o="CONTAINER-BOTTOM"):t+e.translateY<=n?(e.translateY=n-t,o="VIEWPORT-BOTTOM"):e.containerTop+e.translateY<=i&&0!==e.translateY&&e.maxTranslateY!==e.translateY&&(o="VIEWPORT-UNBOTTOM"),o}},{key:"_getAffixTypeScrollingUp",value:function(){var e=this.dimensions,t=e.sidebarHeight+e.containerTop,i=e.viewportTop+e.topSpacing,n=e.viewportBottom-e.bottomSpacing,o=this.affixedType;return i<=e.translateY+e.containerTop?(e.translateY=i-e.containerTop,o="VIEWPORT-TOP"):e.containerBottom<=n?(e.translateY=e.containerBottom-t,o="CONTAINER-BOTTOM"):this.isSidebarFitsViewport()||e.containerTop<=i&&0!==e.translateY&&e.maxTranslateY!==e.translateY&&(o="VIEWPORT-UNBOTTOM"),o}},{key:"_getStyle",value:function(e){if(void 0!==e){var t={inner:{},outer:{}},i=this.dimensions;switch(e){case"VIEWPORT-TOP":t.inner={position:"fixed",top:i.topSpacing,left:i.sidebarLeft-i.viewportLeft,width:i.sidebarWidth};break;case"VIEWPORT-BOTTOM":t.inner={position:"fixed",top:"auto",left:i.sidebarLeft,bottom:i.bottomSpacing,width:i.sidebarWidth};break;case"CONTAINER-BOTTOM":case"VIEWPORT-UNBOTTOM":var n=this._getTranslate(0,i.translateY+"px");t.inner=n?{transform:n}:{position:"absolute",top:i.translateY,width:i.sidebarWidth}}switch(e){case"VIEWPORT-TOP":case"VIEWPORT-BOTTOM":case"VIEWPORT-UNBOTTOM":case"CONTAINER-BOTTOM":t.outer={height:i.sidebarHeight,position:"relative"}}return t.outer=d.extend({height:"",position:""},t.outer),t.inner=d.extend({position:"relative",top:"",left:"",bottom:"",width:"",transform:""},t.inner),t}}},{key:"stickyPosition",value:function(e){if(!this._breakpoint){e=this._reStyle||e||!1,this.options.topSpacing,this.options.bottomSpacing;var t=this.getAffixType(),i=this._getStyle(t);if((this.affixedType!=t||e)&&t){var n="affix."+t.toLowerCase().replace("viewport-","")+l;for(var o in d.eventTrigger(this.sidebar,n),"STATIC"===t?d.removeClass(this.sidebar,this.options.stickyClass):d.addClass(this.sidebar,this.options.stickyClass),i.outer){var s="number"==typeof i.outer[o]?"px":"";this.sidebar.style[o]=i.outer[o]+s}for(var r in i.inner){var a="number"==typeof i.inner[r]?"px":"";this.sidebarInner.style[r]=i.inner[r]+a}var c="affixed."+t.toLowerCase().replace("viewport-","")+l;d.eventTrigger(this.sidebar,c)}else this._initialized&&(this.sidebarInner.style.left=i.inner.left);this.affixedType=t}}},{key:"_widthBreakpoint",value:function(){window.innerWidth<=this.options.minWidth?(this._breakpoint=!0,this.affixedType="STATIC",this.sidebar.removeAttribute("style"),d.removeClass(this.sidebar,this.options.stickyClass),this.sidebarInner.removeAttribute("style")):this._breakpoint=!1}},{key:"updateSticky",value:function(){var e,t=this,i=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{};this._running||(this._running=!0,e=i.type,requestAnimationFrame(function(){switch(e){case"scroll":t._calcDimensionsWithScroll(),t.observeScrollDir(),t.stickyPosition();break;case"resize":default:t._widthBreakpoint(),t.calcDimensions(),t.stickyPosition(!0)}t._running=!1}))}},{key:"_setSupportFeatures",value:function(){var e=this.support;e.transform=d.supportTransform(),e.transform3d=d.supportTransform(!0)}},{key:"_getTranslate",value:function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:0,t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:0,i=2<arguments.length&&void 0!==arguments[2]?arguments[2]:0;return this.support.transform3d?"translate3d("+e+", "+t+", "+i+")":!!this.support.translate&&"translate("+e+", "+t+")"}},{key:"destroy",value:function(){window.removeEventListener("resize",this,{capture:!1}),window.removeEventListener("scroll",this,{capture:!1}),this.sidebar.classList.remove(this.options.stickyClass),this.sidebar.style.minHeight="",this.sidebar.removeEventListener("update"+l,this);var e={inner:{},outer:{}};for(var t in e.inner={position:"",top:"",left:"",bottom:"",width:"",transform:""},e.outer={height:"",position:""},e.outer)this.sidebar.style[t]=e.outer[t];for(var i in e.inner)this.sidebarInner.style[i]=e.inner[i];this.options.resizeSensor&&"undefined"!=typeof ResizeSensor&&(ResizeSensor.detach(this.sidebarInner,this.handleEvent),ResizeSensor.detach(this.container,this.handleEvent))}}],[{key:"supportTransform",value:function(e){var i=!1,t=e?"perspective":"transform",n=t.charAt(0).toUpperCase()+t.slice(1),o=document.createElement("support").style;return(t+" "+["Webkit","Moz","O","ms"].join(n+" ")+n).split(" ").forEach(function(e,t){if(void 0!==o[e])return i=e,!1}),i}},{key:"eventTrigger",value:function(e,t,i){try{var n=new CustomEvent(t,{detail:i})}catch(e){(n=document.createEvent("CustomEvent")).initCustomEvent(t,!0,!0,i)}e.dispatchEvent(n)}},{key:"extend",value:function(e,t){var i={};for(var n in e)void 0!==t[n]?i[n]=t[n]:i[n]=e[n];return i}},{key:"offsetRelative",value:function(e){var t={left:0,top:0};do{var i=e.offsetTop,n=e.offsetLeft;isNaN(i)||(t.top+=i),isNaN(n)||(t.left+=n),e="BODY"===e.tagName?e.parentElement:e.offsetParent}while(e);return t}},{key:"addClass",value:function(e,t){d.hasClass(e,t)||(e.classList?e.classList.add(t):e.className+=" "+t)}},{key:"removeClass",value:function(e,t){d.hasClass(e,t)&&(e.classList?e.classList.remove(t):e.className=e.className.replace(new RegExp("(^|\\b)"+t.split(" ").join("|")+"(\\b|$)","gi")," "))}},{key:"hasClass",value:function(e,t){return e.classList?e.classList.contains(t):new RegExp("(^| )"+t+"( |$)","gi").test(e.className)}},{key:"defaults",get:function(){return n}}]),d}());e.default=i,window.StickySidebar=i})(t)}(t={exports:{}},t.exports),t.exports),o=(i=n)&&i.__esModule&&Object.prototype.hasOwnProperty.call(i,"default")?i.default:i;e.default=o,e.__moduleExports=n,Object.defineProperty(e,"__esModule",{value:!0})});



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/libs/masonry.pkgd.min.js]*/
/*!
 * Masonry PACKAGED v4.2.1
 * Cascading grid layout library
 * https://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */

!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,r,a){function h(t,e,n){var o,r="$()."+i+'("'+e+'")';return t.each(function(t,h){var u=a.data(h,i);if(!u)return void s(i+" not initialized. Cannot call methods, i.e. "+r);var d=u[e];if(!d||"_"==e.charAt(0))return void s(r+" is not a valid method");var l=d.apply(u,n);o=void 0===o?l:o}),void 0!==o?o:t}function u(t,e){t.each(function(t,n){var o=a.data(n,i);o?(o.option(e),o._init()):(o=new r(n,e),a.data(n,i,o))})}a=a||e||t.jQuery,a&&(r.prototype.option||(r.prototype.option=function(t){a.isPlainObject(t)&&(this.options=a.extend(!0,this.options,t))}),a.fn[i]=function(t){if("string"==typeof t){var e=o.call(arguments,1);return h(this,t,e)}return u(this,t),this},n(a))}function n(t){!t||t&&t.bridget||(t.bridget=i)}var o=Array.prototype.slice,r=t.console,s="undefined"==typeof r?function(){}:function(t){r.error(t)};return n(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},n=i[t]=i[t]||[];return-1==n.indexOf(e)&&n.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},n=i[t]=i[t]||{};return n[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=i.indexOf(e);return-1!=n&&i.splice(n,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var n=this._onceEvents&&this._onceEvents[t],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(t,r),delete n[r]),r.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("get-size/get-size",[],function(){return e()}):"object"==typeof module&&module.exports?module.exports=e():t.getSize=e()}(window,function(){"use strict";function t(t){var e=parseFloat(t),i=-1==t.indexOf("%")&&!isNaN(e);return i&&e}function e(){}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0;u>e;e++){var i=h[e];t[i]=0}return t}function n(t){var e=getComputedStyle(t);return e||a("Style returned "+e+". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"),e}function o(){if(!d){d=!0;var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style.boxSizing="border-box";var i=document.body||document.documentElement;i.appendChild(e);var o=n(e);r.isBoxSizeOuter=s=200==t(o.width),i.removeChild(e)}}function r(e){if(o(),"string"==typeof e&&(e=document.querySelector(e)),e&&"object"==typeof e&&e.nodeType){var r=n(e);if("none"==r.display)return i();var a={};a.width=e.offsetWidth,a.height=e.offsetHeight;for(var d=a.isBorderBox="border-box"==r.boxSizing,l=0;u>l;l++){var c=h[l],f=r[c],m=parseFloat(f);a[c]=isNaN(m)?0:m}var p=a.paddingLeft+a.paddingRight,g=a.paddingTop+a.paddingBottom,y=a.marginLeft+a.marginRight,v=a.marginTop+a.marginBottom,_=a.borderLeftWidth+a.borderRightWidth,z=a.borderTopWidth+a.borderBottomWidth,E=d&&s,b=t(r.width);b!==!1&&(a.width=b+(E?0:p+_));var x=t(r.height);return x!==!1&&(a.height=x+(E?0:g+z)),a.innerWidth=a.width-(p+_),a.innerHeight=a.height-(g+z),a.outerWidth=a.width+y,a.outerHeight=a.height+v,a}}var s,a="undefined"==typeof console?e:function(t){console.error(t)},h=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"],u=h.length,d=!1;return r}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var n=e[i],o=n+"MatchesSelector";if(t[o])return o}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e},i.makeArray=function(t){var e=[];if(Array.isArray(t))e=t;else if(t&&"object"==typeof t&&"number"==typeof t.length)for(var i=0;i<t.length;i++)e.push(t[i]);else e.push(t);return e},i.removeFrom=function(t,e){var i=t.indexOf(e);-1!=i&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,n){t=i.makeArray(t);var o=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!n)return void o.push(t);e(t,n)&&o.push(t);for(var i=t.querySelectorAll(n),r=0;r<i.length;r++)o.push(i[r])}}),o},i.debounceMethod=function(t,e,i){var n=t.prototype[e],o=e+"Timeout";t.prototype[e]=function(){var t=this[o];t&&clearTimeout(t);var e=arguments,r=this;this[o]=setTimeout(function(){n.apply(r,e),delete r[o]},i||100)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var n=t.console;return i.htmlInit=function(e,o){i.docReady(function(){var r=i.toDashed(o),s="data-"+r,a=document.querySelectorAll("["+s+"]"),h=document.querySelectorAll(".js-"+r),u=i.makeArray(a).concat(i.makeArray(h)),d=s+"-options",l=t.jQuery;u.forEach(function(t){var i,r=t.getAttribute(s)||t.getAttribute(d);try{i=r&&JSON.parse(r)}catch(a){return void(n&&n.error("Error parsing "+s+" on "+t.className+": "+a))}var h=new e(t,i);l&&l.data(t,o,h)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["ev-emitter/ev-emitter","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("ev-emitter"),require("get-size")):(t.Outlayer={},t.Outlayer.Item=e(t.EvEmitter,t.getSize))}(window,function(t,e){"use strict";function i(t){for(var e in t)return!1;return e=null,!0}function n(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}var r=document.documentElement.style,s="string"==typeof r.transition?"transition":"WebkitTransition",a="string"==typeof r.transform?"transform":"WebkitTransform",h={WebkitTransition:"webkitTransitionEnd",transition:"transitionend"}[s],u={transform:a,transition:s,transitionDuration:s+"Duration",transitionProperty:s+"Property",transitionDelay:s+"Delay"},d=n.prototype=Object.create(t.prototype);d.constructor=n,d._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},d.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},d.getSize=function(){this.size=e(this.element)},d.css=function(t){var e=this.element.style;for(var i in t){var n=u[i]||i;e[n]=t[i]}},d.getPosition=function(){var t=getComputedStyle(this.element),e=this.layout._getOption("originLeft"),i=this.layout._getOption("originTop"),n=t[e?"left":"right"],o=t[i?"top":"bottom"],r=this.layout.size,s=-1!=n.indexOf("%")?parseFloat(n)/100*r.width:parseInt(n,10),a=-1!=o.indexOf("%")?parseFloat(o)/100*r.height:parseInt(o,10);s=isNaN(s)?0:s,a=isNaN(a)?0:a,s-=e?r.paddingLeft:r.paddingRight,a-=i?r.paddingTop:r.paddingBottom,this.position.x=s,this.position.y=a},d.layoutPosition=function(){var t=this.layout.size,e={},i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop"),o=i?"paddingLeft":"paddingRight",r=i?"left":"right",s=i?"right":"left",a=this.position.x+t[o];e[r]=this.getXValue(a),e[s]="";var h=n?"paddingTop":"paddingBottom",u=n?"top":"bottom",d=n?"bottom":"top",l=this.position.y+t[h];e[u]=this.getYValue(l),e[d]="",this.css(e),this.emitEvent("layout",[this])},d.getXValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&!e?t/this.layout.size.width*100+"%":t+"px"},d.getYValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&e?t/this.layout.size.height*100+"%":t+"px"},d._transitionTo=function(t,e){this.getPosition();var i=this.position.x,n=this.position.y,o=parseInt(t,10),r=parseInt(e,10),s=o===this.position.x&&r===this.position.y;if(this.setPosition(t,e),s&&!this.isTransitioning)return void this.layoutPosition();var a=t-i,h=e-n,u={};u.transform=this.getTranslate(a,h),this.transition({to:u,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},d.getTranslate=function(t,e){var i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop");return t=i?t:-t,e=n?e:-e,"translate3d("+t+"px, "+e+"px, 0)"},d.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},d.moveTo=d._transitionTo,d.setPosition=function(t,e){this.position.x=parseInt(t,10),this.position.y=parseInt(e,10)},d._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},d.transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var n=this.element.offsetHeight;n=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var l="opacity,"+o(a);d.enableTransition=function(){if(!this.isTransitioning){var t=this.layout.options.transitionDuration;t="number"==typeof t?t+"ms":t,this.css({transitionProperty:l,transitionDuration:t,transitionDelay:this.staggerDelay||0}),this.element.addEventListener(h,this,!1)}},d.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},d.onotransitionend=function(t){this.ontransitionend(t)};var c={"-webkit-transform":"transform"};d.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,n=c[t.propertyName]||t.propertyName;if(delete e.ingProperties[n],i(e.ingProperties)&&this.disableTransition(),n in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[n]),n in e.onEnd){var o=e.onEnd[n];o.call(this),delete e.onEnd[n]}this.emitEvent("transitionEnd",[this])}},d.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(h,this,!1),this.isTransitioning=!1},d._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var f={transitionProperty:"",transitionDuration:"",transitionDelay:""};return d.removeTransitionStyles=function(){this.css(f)},d.stagger=function(t){t=isNaN(t)?0:t,this.staggerDelay=t+"ms"},d.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},d.remove=function(){return s&&parseFloat(this.layout.options.transitionDuration)?(this.once("transitionEnd",function(){this.removeElem()}),void this.hide()):void this.removeElem()},d.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},d.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},d.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},d.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},d.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},d.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},n}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["ev-emitter/ev-emitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.EvEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,n,o){"use strict";function r(t,e){var i=n.getQueryElement(t);if(!i)return void(h&&h.error("Bad element for "+this.constructor.namespace+": "+(i||t)));this.element=i,u&&(this.$element=u(this.element)),this.options=n.extend({},this.constructor.defaults),this.option(e);var o=++l;this.element.outlayerGUID=o,c[o]=this,this._create();var r=this._getOption("initLayout");r&&this.layout()}function s(t){function e(){t.apply(this,arguments)}return e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e}function a(t){if("number"==typeof t)return t;var e=t.match(/(^\d*\.?\d*)(\w*)/),i=e&&e[1],n=e&&e[2];if(!i.length)return 0;i=parseFloat(i);var o=m[n]||1;return i*o}var h=t.console,u=t.jQuery,d=function(){},l=0,c={};r.namespace="outlayer",r.Item=o,r.defaults={containerStyle:{position:"relative"},initLayout:!0,originLeft:!0,originTop:!0,resize:!0,resizeContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}};var f=r.prototype;n.extend(f,e.prototype),f.option=function(t){n.extend(this.options,t)},f._getOption=function(t){var e=this.constructor.compatOptions[t];return e&&void 0!==this.options[e]?this.options[e]:this.options[t]},r.compatOptions={initLayout:"isInitLayout",horizontal:"isHorizontal",layoutInstant:"isLayoutInstant",originLeft:"isOriginLeft",originTop:"isOriginTop",resize:"isResizeBound",resizeContainer:"isResizingContainer"},f._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),n.extend(this.element.style,this.options.containerStyle);var t=this._getOption("resize");t&&this.bindResize()},f.reloadItems=function(){this.items=this._itemize(this.element.children)},f._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,n=[],o=0;o<e.length;o++){var r=e[o],s=new i(r,this);n.push(s)}return n},f._filterFindItemElements=function(t){return n.filterFindElements(t,this.options.itemSelector)},f.getItemElements=function(){return this.items.map(function(t){return t.element})},f.layout=function(){this._resetLayout(),this._manageStamps();var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;this.layoutItems(this.items,e),this._isLayoutInited=!0},f._init=f.layout,f._resetLayout=function(){this.getSize()},f.getSize=function(){this.size=i(this.element)},f._getMeasurement=function(t,e){var n,o=this.options[t];o?("string"==typeof o?n=this.element.querySelector(o):o instanceof HTMLElement&&(n=o),this[t]=n?i(n)[e]:o):this[t]=0},f.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},f._getItemsForLayout=function(t){return t.filter(function(t){return!t.isIgnored})},f._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){var i=[];t.forEach(function(t){var n=this._getItemLayoutPosition(t);n.item=t,n.isInstant=e||t.isLayoutInstant,i.push(n)},this),this._processLayoutQueue(i)}},f._getItemLayoutPosition=function(){return{x:0,y:0}},f._processLayoutQueue=function(t){this.updateStagger(),t.forEach(function(t,e){this._positionItem(t.item,t.x,t.y,t.isInstant,e)},this)},f.updateStagger=function(){var t=this.options.stagger;return null===t||void 0===t?void(this.stagger=0):(this.stagger=a(t),this.stagger)},f._positionItem=function(t,e,i,n,o){n?t.goTo(e,i):(t.stagger(o*this.stagger),t.moveTo(e,i))},f._postLayout=function(){this.resizeContainer()},f.resizeContainer=function(){var t=this._getOption("resizeContainer");if(t){var e=this._getContainerSize();e&&(this._setContainerMeasure(e.width,!0),this._setContainerMeasure(e.height,!1))}},f._getContainerSize=d,f._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},f._emitCompleteOnItems=function(t,e){function i(){o.dispatchEvent(t+"Complete",null,[e])}function n(){s++,s==r&&i()}var o=this,r=e.length;if(!e||!r)return void i();var s=0;e.forEach(function(e){e.once(t,n)})},f.dispatchEvent=function(t,e,i){var n=e?[e].concat(i):i;if(this.emitEvent(t,n),u)if(this.$element=this.$element||u(this.element),e){var o=u.Event(e);o.type=t,this.$element.trigger(o,i)}else this.$element.trigger(t,i)},f.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},f.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},f.stamp=function(t){t=this._find(t),t&&(this.stamps=this.stamps.concat(t),t.forEach(this.ignore,this))},f.unstamp=function(t){t=this._find(t),t&&t.forEach(function(t){n.removeFrom(this.stamps,t),this.unignore(t)},this)},f._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=n.makeArray(t)):void 0},f._manageStamps=function(){this.stamps&&this.stamps.length&&(this._getBoundingRect(),this.stamps.forEach(this._manageStamp,this))},f._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},f._manageStamp=d,f._getElementOffset=function(t){var e=t.getBoundingClientRect(),n=this._boundingRect,o=i(t),r={left:e.left-n.left-o.marginLeft,top:e.top-n.top-o.marginTop,right:n.right-e.right-o.marginRight,bottom:n.bottom-e.bottom-o.marginBottom};return r},f.handleEvent=n.handleEvent,f.bindResize=function(){t.addEventListener("resize",this),this.isResizeBound=!0},f.unbindResize=function(){t.removeEventListener("resize",this),this.isResizeBound=!1},f.onresize=function(){this.resize()},n.debounceMethod(r,"onresize",100),f.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},f.needsResizeLayout=function(){var t=i(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},f.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},f.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},f.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},f.reveal=function(t){if(this._emitCompleteOnItems("reveal",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.reveal()})}},f.hide=function(t){if(this._emitCompleteOnItems("hide",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.hide()})}},f.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},f.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},f.getItem=function(t){for(var e=0;e<this.items.length;e++){var i=this.items[e];if(i.element==t)return i}},f.getItems=function(t){t=n.makeArray(t);var e=[];return t.forEach(function(t){var i=this.getItem(t);i&&e.push(i)},this),e},f.remove=function(t){var e=this.getItems(t);this._emitCompleteOnItems("remove",e),e&&e.length&&e.forEach(function(t){t.remove(),n.removeFrom(this.items,t)},this)},f.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="",this.items.forEach(function(t){t.destroy()}),this.unbindResize();var e=this.element.outlayerGUID;delete c[e],delete this.element.outlayerGUID,u&&u.removeData(this.element,this.constructor.namespace)},r.data=function(t){t=n.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&c[e]},r.create=function(t,e){var i=s(r);return i.defaults=n.extend({},r.defaults),n.extend(i.defaults,e),i.compatOptions=n.extend({},r.compatOptions),i.namespace=t,i.data=r.data,i.Item=s(o),n.htmlInit(i,t),u&&u.bridget&&u.bridget(t,i),i};var m={ms:1,s:1e3};return r.Item=o,r}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window,function(t,e){var i=t.create("masonry");i.compatOptions.fitWidth="isFitWidth";var n=i.prototype;return n._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns(),this.colYs=[];for(var t=0;t<this.cols;t++)this.colYs.push(0);this.maxY=0,this.horizontalColIndex=0},n.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var n=this.columnWidth+=this.gutter,o=this.containerWidth+this.gutter,r=o/n,s=n-o%n,a=s&&1>s?"round":"floor";r=Math[a](r),this.cols=Math.max(r,1)},n.getContainerWidth=function(){var t=this._getOption("fitWidth"),i=t?this.element.parentNode:this.element,n=e(i);this.containerWidth=n&&n.innerWidth},n._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,i=e&&1>e?"round":"ceil",n=Math[i](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var o=this.options.horizontalOrder?"_getHorizontalColPosition":"_getTopColPosition",r=this[o](n,t),s={x:this.columnWidth*r.col,y:r.y},a=r.y+t.size.outerHeight,h=n+r.col,u=r.col;h>u;u++)this.colYs[u]=a;return s},n._getTopColPosition=function(t){var e=this._getTopColGroup(t),i=Math.min.apply(Math,e);return{col:e.indexOf(i),y:i}},n._getTopColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,n=0;i>n;n++)e[n]=this._getColGroupY(n,t);return e},n._getColGroupY=function(t,e){if(2>e)return this.colYs[t];var i=this.colYs.slice(t,t+e);return Math.max.apply(Math,i)},n._getHorizontalColPosition=function(t,e){var i=this.horizontalColIndex%this.cols,n=t>1&&i+t>this.cols;i=n?0:i;var o=e.size.outerWidth&&e.size.outerHeight;return this.horizontalColIndex=o?i+t:this.horizontalColIndex,{col:i,y:this._getColGroupY(i,t)}},n._manageStamp=function(t){var i=e(t),n=this._getElementOffset(t),o=this._getOption("originLeft"),r=o?n.left:n.right,s=r+i.outerWidth,a=Math.floor(r/this.columnWidth);a=Math.max(0,a);var h=Math.floor(s/this.columnWidth);h-=s%this.columnWidth?0:1,h=Math.min(this.cols-1,h);for(var u=this._getOption("originTop"),d=(u?n.top:n.bottom)+i.outerHeight,l=a;h>=l;l++)this.colYs[l]=Math.max(d,this.colYs[l])},n._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this._getOption("fitWidth")&&(t.width=this._getContainerFitWidth()),t},n._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},n.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!=this.containerWidth},i});