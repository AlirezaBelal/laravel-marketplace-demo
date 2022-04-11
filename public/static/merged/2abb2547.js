/*[PATH @digikala/supernova/assets/local/package/url.min.js]*/
function Url(t){void 0===t&&(t=window.location.pathname+window.location.search+window.location.hash),this.url=decodeURIComponent(t),this.params}Url.prototype={setParam:function(t,r){var e=this,n=new RegExp("([?&]"+e.escapeBrackets(t)+"=)[^&]+","");return 0===r.length||(-1===e.url.indexOf("?")?e.add("?",t,r):n.test(e.url)?e.change(n,r):e.add("&",t,r)),e.url},setParams:function(t){var s=this,o=function(t,r,e){var n,i;for(var a in t)t.hasOwnProperty(a)&&(n=e?r?r+a:a:r?r+"["+a+"]":a,"object"==typeof(i=t[a])?o(i,n):s.setParam(n,i))};o(t,"",!0)},getParams:function(){for(var t,r=/[?&]([^=#]+)=([^&#]*)/g,e={};t=r.exec(this.url);)e[t[1]]=t[2];return e},removeParam:function(t){var r=this.url.split("?")[0],e=[],n=-1!==this.url.indexOf("?")?this.url.split("?")[1]:"";if(""!==n){for(var i=(e=n.split("&")).length-1;0<=i;i-=1)e[i].split("=")[0]===t&&e.splice(i,1);var a=e.join("&");this.url=r+(a.length?"?":"")+a}return this.url},addHash:function(t){var r=this.url.split("#");r[1]?this.url=this.url.replace(r[1],t):this.url=this.url+"#"+t},getHash:function(){var t=this.url.split("#");return!!t[1]&&t[1]},getParam:function(t,r){return this.params||(this.params=this.getParams()),void 0!==this.params[t]?this.params[t]:r},getUrl:function(){return decodeURI(this.url)},add:function(t,r,e){this.url+=t+r+"="+encodeURIComponent(e)},change:function(t,r){this.url=this.url.replace(t,"$1"+encodeURIComponent(r))},escapeBrackets:function(t){return t.replace(/[[]/g,"\\[").replace(/]/g,"\\]")},update:function(){history.pushState({},null,this.getUrl())}};


/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/shared/search.js]*/
var SearchAction = {
    addTOHistory: true,
    listingType: 'gallery',
    priceFilterUpdated: false,

    init: function () {
        var functions = [
            this.initStickySideBar,
            this.initFilterControls,
            this.initPagination,
            this.initFilterInputs,
            this.initFilterRange,
            this.initSortOptions,
            this.initUrlChange,
            this.initListingType,
            this.initCategoryTree
        ], self = this;

        if(isModuleActive('data_layer')) {
            functions.push(this.initGAImpressionClickHandler);
            functions.push(this.initBrandCarouselGAImpressionClickHandler);
        }

        for (var i = 0; i < functions.length; ++i) {
            try {
                functions[i].bind(self)();
            } catch (e) {
                window.Sentry && window.Sentry.captureException(e);
                // eslint-disable-next-line no-console
                console.warn(e);
            }
        }

        if (window.click_impression) {
            this.adroRetargetingSearchResult(window.click_impression);
        }
    },

    initBrandCarouselGAImpressionClickHandler: function() {
        $(document).on('click', '.c-brand-campaign .js-product-url', function() {
            var $productLink = $(this),
                $productItem = $productLink.closest('.js-product-box'),
                productId = $productLink.data('id') || $productItem.data('id');

            try {
                var productData = Services.retrieveProductFromDataLayer({
                    productId: productId,
                    eventName: 'eec.productImpression',
                    pathArray: ['ecommerce', 'impressions']
                } , function (product) {
                    return product.dimension19 === 'sponsored-brand';
                });
                var impressionObject = createImpressionObj(productData);

                window.dataLayer.push(impressionObject);
            } catch (e) {
                window.Sentry && window.Sentry.captureException(e);
                // eslint-disable-next-line no-console
                console.warn(e);
            }
        });

        function createImpressionObj(productObject) {
            var productObjectCopy = Object.assign({}, productObject),
                list = Main.gaListName;

            delete productObjectCopy.list;

            return {
                'event': 'eec.impressionClick',
                'ecommerce': {
                    'click': {
                        'actionField': {
                            'list': list
                        },
                        'products': [productObjectCopy]
                    }
                }
            }
        }
    },

    initGAImpressionClickHandler: function() {
        $(document).on('click', '.js-product-url', function() {

            var isBrandCarousel = $(this).parents('.c-brand-campaign');
            if (isBrandCarousel.length > 0) return

            var $productLink = $(this),
                $productItem = $productLink.closest('.js-product-box'),
                productId = $productLink.data('id') || $productItem.data('id');

            try {
                var productData = Services.retrieveProductFromDataLayer({
                    productId: productId,
                    eventName: 'eec.productImpression',
                    pathArray: ['ecommerce', 'impressions']
                });
                var impressionObject = createImpressionObj(productData);

                window.dataLayer.push(impressionObject);
            } catch (e) {
                window.Sentry && window.Sentry.captureException(e);
                // eslint-disable-next-line no-console
                console.warn(e);
            }
        });

        function createImpressionObj(productObject) {
            var productObjectCopy = Object.assign({}, productObject),
                list = Main.gaListName;

            delete productObjectCopy.list;

            return {
                'event': 'eec.impressionClick',
                'ecommerce': {
                    'click': {
                        'actionField': {
                            'list': list
                        },
                        'products': [productObjectCopy]
                    }
                }
            }
        }
    },

    initListingType: function () {
        var self = this;

        var listingTypes = $('.js-listing-type');

        listingTypes.off();
        if (self.listingType === 'list') {
            listingTypes.removeClass('is-active');
            listingTypes.filter('[data-type="list"]').addClass('is-active');
            $('.js-listing').addClass('is-list');
        } else {
            listingTypes.removeClass('is-active');
            listingTypes.filter('[data-type="gallery"]').addClass('is-active');
            $('.js-listing').removeClass('is-list');
        }
        listingTypes.on('click', function (e) {
            var $this = $(this);
            var $type = $this.data('type');
            var $container = $('.js-listing');

            if ($this.hasClass('is-active')) {
                return;
            }

            $('.js-listing-type').removeClass('is-active');
            $this.addClass('is-active');

            if ($type === 'list') {
                $container.addClass('is-list');
                self.listingType = 'list';
            } else {
                $container.removeClass('is-list');
                self.listingType = 'grid';
            }

            e.preventDefault();
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
            $container.addClass('show-more')
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

    initStickySideBar: function () {
        var thiz = this;
        this.stickySideBar = $(".js-sticky");

        var topSpacing = 15;
        if (isModuleActive('new_desktop_header')) {
            if(isModuleActive('top_banner_make_unsticky'))
                topSpacing = 135;
            else
                topSpacing = $('body').hasClass('has-top-banner') ? 195 : 135;
        }

        try {
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

            this.stickyContent = new StickySidebar('.js-sticky-2', {
                containerSelector: false,
                innerWrapperSelector: '.js-sticky-inner-2',
                topSpacing: 15,
                bottomSpacing: 15,
                leftSpacing: 15,
                resizeSensor: true,
                stickyClass: "is-sticky",
                transformDelta: 0
            });
        } catch (e) {

        }

        setTimeout(function (){
            try {
                thiz.stickySidebar = new StickySidebar('.js-sticky', {
                    containerSelector: false,
                    innerWrapperSelector: '.js-sticky-inner',
                    topSpacing: topSpacing,
                    bottomSpacing: 15,
                    leftSpacing: 15,
                    resizeSensor: true,
                    stickyClass: "is-sticky",
                    transformDelta: 0
                });

                thiz.stickyContent = new StickySidebar('.js-sticky-2', {
                    containerSelector: false,
                    innerWrapperSelector: '.js-sticky-inner-2',
                    topSpacing: 15,
                    bottomSpacing: 15,
                    leftSpacing: 15,
                    resizeSensor: true,
                    stickyClass: "is-sticky",
                    transformDelta: 0
                });

                $('html').animate({
                    scrollTop: window.pageYOffset + 5
                }, 0);
            } catch (e) {
            }
        }, 1000);
    },

    scrollWindowToProductList: function () {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
    },

    initFilterRange: function () {
        var thiz = this;
        var $slider = document.querySelector('.js-slider-range');
        var $sliderFrom = document.querySelector('.js-slider-range-from');
        var $sliderTo = document.querySelector('.js-slider-range-to');
        if (!$slider || !$sliderFrom || !$sliderTo) return;
        var $inputs = [$sliderFrom, $sliderTo];
        var min = parseInt($sliderFrom.dataset.range),
            max = parseInt($sliderTo.dataset.range);

        if (!$slider) {
            return;
        }

        noUiSlider.create($slider, {
            start: [$sliderFrom.value, $sliderTo.value],
            connect: true,
            direction: 'rtl',
            format: wNumb({
                decimals: 0
            }),
            step: 1,
            range: {
                'min': min,
                'max': max
            }
        });

        $slider.noUiSlider.on('update', function (values, handle) {
            if (parseInt(values[0]) !== min || parseInt(values[1]) !== max) {
                thiz.priceFilterUpdated = true;
                $('.js-price-filter').removeClass('disabled');
            } else {
                thiz.priceFilterUpdated = false;
                if (!thiz.url.getParam('price[min]') && !thiz.url.getParam('price[max]')) {
                    $('.js-price-filter').addClass('disabled');
                }
            }

            $inputs[handle].value = Services.convertToFaDigit(Services.formatCurrency(parseInt(values[handle]), false, ''));
            $inputs[handle].dataset.value = values[handle];
        });
    },

    initFilterInputs: function () {

        $(document).on('keyup', '.js-filter-input', function () {
            var val;
            var $content = $(this).closest('.js-box-content');
            if (val = $(this).val()) {
                $('.js-box-content-item', $content).each(function () {
                    var patt = new RegExp(val, 'i');
                    if (patt.test($(this).data('en')) || patt.test($(this).data('fa')) || patt.test($(this).data('search'))) {
                        $(this).closest('li').show();
                    } else {
                        $(this).closest('li').hide();
                    }
                });
            } else {
                $('li', $content).show();
            }
        });

        var cleanableInputs = $('.js-cleanable-input');
        cleanableInputs.each(function () {
            var cleanableInput = $(this);
            var inputCleaner = cleanableInput.siblings('.js-input-cleaner').first();

            cleanableInput.on('keyup', function () {
                if ($(this).val().length > 0) {
                    inputCleaner.css('display', 'inline-flex');
                } else {
                    inputCleaner.css('display', 'none');
                }
            });
            inputCleaner.on('click', function () {
                cleanableInput.val('');
                cleanableInput.keyup();
                $(this).css('display', 'none');
            });
        });
    },

    initSortOptions: function () {
        var thiz = this;
        $('.js-sort-options a').on('click', function () {
            $('.js-sort-options a').removeClass('is-active');
            $(this).addClass('is-active');
            thiz.getProductsForFilters();
            try {
                ga('send', {
                    hitType: 'pageview',
                    page: location.href
                });
            } catch (e) {

            }
        });
    },

    initFilterControls: function () {
        var thiz = this;
        thiz.url = new Url(window.location.pathname + window.location.search);

        $(document).on('click', '.js-listing-options-clear', function (e) {
            e.preventDefault();
            $('input[name=searchInput]').val('');
            thiz.queryRemoved = true;

            var $checked = $('.js-box-content-items input:checked');
            if ($checked.length) {
                $checked.prop('checked', false);
            }

            thiz.url = new Url(window.location.pathname);
            thiz.getProductsForFilters();
        });

        var flags = ["has_selling_stock", "has_ready_to_shipment", "is_fake"];

        $(document).on('click', '.js-listing-option-remove', function () {
            var key = $(this).data('key');
            if (key === 'searchInput') {
                $('input[name=searchInput]').val('');
                thiz.queryRemoved = true;
            } else if (key === 'price') {
                $('input[name="price[min]"], input[name="price[max]"]').val('').attr('data-value', '');
                thiz.preparePriceFilter();
            } else if (flags.indexOf(key) >= 0) {
                $(".js-box-content-items input[name='" + key + "']").prop('checked', false);
                thiz.url.removeParam(key);
            } else {
                $('#' + key + '-param-' + $(this).data('value')).prop('checked', false);
            }
            $(this).closest('li').remove();

            thiz.getProductsForFilters();
        });

        $(document).on('change', '.js-box-content-items input', function (e) {
            var lastFilter = $(e.target).data('search-uid');
            var lastFilterValue = $(e.target).val();

            thiz.getProductsForFilters(1, {filter: lastFilter, value: lastFilterValue});
        });

        $(document).on('keyup', 'input[name=searchInput]', function (e) {
            if (e.keyCode === 13) {
                thiz.getProductsForFilters();
            }
        });

        $(document).on('click', '.js-price-filter', function () {
            thiz.preparePriceFilter();
            thiz.getProductsForFilters(1, 'price');
        });
    },

    adroRetargetingSearchResult: function (productsList) {
        // try {
        //     var adroRetargetingProductList = productsList.map(function (product) {
        //         return {
        //             ProductId: product.id,
        //             Name: product.name,
        //             Category: product.category,
        //             Description: null,
        //             Price: product.price,
        //             Available: (product.status === "marketable"),
        //             PageAddress: product.product_url,
        //             ImageAddress: product.image_src,
        //         }
        //     });
        //     if (window.adroRCActivation) StickyRetargeting.EventListener(StickyRetargeting.View_Products.bind(StickyRetargeting, adroRetargetingProductList));
        // } catch (e) {
        //     return;
        // }
    },

    getProductsForFilters: function (page, lastFilter, scrollToProductsList) {
        var thiz = this;
        var val;
        var checkboxParams = {};

        thiz.url = new Url(window.location.pathname);

        var bannerId = this.parseUrl('bCode');

        if (bannerId) {
            thiz.url.setParam('bCode', bannerId);
        }

        $('.js-box-content-items input:checked').each(function () {
            var name = $(this).attr('name');
            if (name.slice(-2) === '[]') {
                name = $(this).attr('name').slice(0, -2);
                if (typeof checkboxParams[name] === 'undefined') {
                    checkboxParams[name] = [];
                }
                checkboxParams[name].push($(this).val());
            } else {
                checkboxParams[name] = $(this).val();
            }
        });

        if (checkboxParams) {
            thiz.url.setParams(checkboxParams);
        }

        var url = new Url(window.location.search);

        if ((val = $('input[name=searchInput]').val() || (!thiz.queryRemoved && url.getParam('q')))) {
            thiz.url.setParam('q', (!!url.getParam('q') && url.getParam('q') !== val ? url.getParam('q') + ' ' : '') + val);
            $('input[name=searchInput]').val('');
        } else {
            thiz.queryRemoved = false;
        }

        if (page) {
            thiz.url.setParam('pageno', page);
        }

        if (!!lastFilter && !!lastFilter.filter && !!lastFilter.value) {
            thiz.url.setParam('last_filter', lastFilter.filter);
            thiz.url.setParam('last_value', lastFilter.value);
        }

        if (val = $('.js-sort-options a.is-active').data('sort')) {
            thiz.url.setParam('sortby', val);
        }

        if (url.getParam('fresh')) {
            thiz.url.setParam('fresh', 1);
        }

        if (url.getParam('has_shopping_opportunity')) {
            thiz.url.setParam('has_shopping_opportunity', 1);
        }

        if (url.getParam('trend')) {
            thiz.url.setParam('trend', url.getParam('trend'));
        }

        if (url.getParam('keyword')) {
            thiz.url.setParam('keyword', url.getParam('keyword'));
        }

        if (url.getParam('token')) {
            thiz.url.setParam('token', url.getParam('token'));
        }

        $.ajax({
            url: '/ajax' + thiz.url.getUrl(),
            type: "GET",
            dataType: "html",
            beforeSend: function (jqxhr) {
                if (thiz.jqxhr) {
                    thiz.jqxhr.abort();
                }
                if (thiz.addTOHistory) {
                    thiz.url.update();
                }
                thiz.jqxhr = jqxhr;
                Services.showLoader();
            },
            success: function (data) {
                data = JSON.parse(data);
                Services.hideLoader();

                $('.js-products').html(data.data.products);
                $('.js-list-aside').html(data.data.filters);
                click_impression = data.data.click_impression;
                Main.initCounter();
                thiz.initListingType();
                // thiz.initStickySideBar();
                try {
                    initCompared();
                } catch (e) {
                }
                thiz.initSortOptions();
                thiz.initFilterRange();
                thiz.initCategoryTree();

                setTimeout(function () {
                    if (thiz.stickySidebar) {
                        thiz.stickySidebar.calcDimensions();
                        thiz.stickySidebar.updateSticky();
                    }
                    if (thiz.stickyContent) {
                        thiz.stickyContent.calcDimensions();
                        thiz.stickyContent.updateSticky();
                    }
                }, 200);

                window['snTrackerGlobals'] = data.data.trackerData;

                thiz.adroRetargetingSearchResult(click_impression);

                if(data.data.data_layer && isModuleActive('data_layer')) {
                    window.Main.setImpressionEventOnAjax(data.data.data_layer);
                }

                if (scrollToProductsList) {
                    thiz.scrollWindowToProductList();
                }

                if(isModuleActive('ab_desktop_topbar_filters')){
                    try {
                        ProductsIndexAction.initDropDown();
                        ProductsIndexAction.initFilterDropDown();
                        ProductsIndexAction.topbarFiltersClick();
                        ProductsIndexAction.initListFilterInput();
                    } catch (e) {
                        console.log('AB test error : topbar filters')
                    }
                }
            },
            error: function () {
                Services.hideLoader();
                if (scrollToProductsList) {
                    thiz.scrollWindowToProductList();
                }
            }
        });
    },

    preparePriceFilter: function () {
        var thiz = this;
        var val;

        if (val = $('input[name="price[min]"]').attr('data-value')) {
            val = parseInt(val);
            if (!!val) {
                thiz.url.setParams({price: {min: val}});
                $('.js-min-price').val(val).prop('checked', true);
            }
        }

        if (val = $('input[name="price[max]"]').attr('data-value')) {
            val = parseInt(val);
            if (!!val) {
                thiz.url.setParams({price: {max: val}});
                $('.js-max-price').val(val).prop('checked', true);
            }
        }

        if (!thiz.priceFilterUpdated) {
            $('.js-max-price, .js-min-price').prop('checked', false);
        }
    },

    initUrlChange: function () {
        var that = this;
        window.onpopstate = function () {
            var url = new Url(window.location);
            var pageNumber = '';
            that.addTOHistory = false;
            $(".js-box-content-items input:checked").prop("checked", false);
            $(".js-sort-options a").removeClass('is-active');
            $('input[name=searchInput]').val('');

            var flags = ["has_selling_stock", "has_ready_to_shipment", "is_fake"];

            jQuery.each(url.getParams(), function (name, value) {

                if (name === 'sortby') {
                    $(".js-sort-options a[data-sort='" + value + "']").addClass('is-active');
                } else if (name === 'pageno') {
                    pageNumber = value;
                } else if (name === 'price[min]') {
                    $('input[name="price[min]"]').val(value).attr('data-value', value);
                    that.priceFilterUpdated = true;
                    that.preparePriceFilter();
                } else if (name === 'price[max]') {
                    $('input[name="price[max]"]').val(value).attr('data-value', value);
                    that.priceFilterUpdated = true;
                    that.preparePriceFilter();
                } else if (name === 'q') {
                    $('input[name=searchInput]').val(value);
                } else if (flags.indexOf(name) >= 0) {
                    $(".js-box-content-items input[name='" + name + "']").prop('checked', true);
                } else {
                    var elName;
                    elName = name.substr(0, name.lastIndexOf('['));
                    $(".js-box-content-items input[name='" + elName + "[]'][value='" + value + "']").prop("checked", true);
                }
            });
            that.getProductsForFilters(pageNumber, null, true);
            that.addTOHistory = true;
        };
    },

    initPagination: function () {
        var thiz = this;
        $(document).on('click', '.js-pagination__item', function (e) {
            e.preventDefault();
            if ($(this).find('a')) {
                thiz.getProductsForFilters($(this).find('a').data('page'), null, true);
            }
        });
    },

    parseUrl: function getParameterByName(name) {
        var url = window.location.href;

        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);

        if (!results) {
            return null;
        }
        if (!results[2]) {
            return '';
        }
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
};

$(function () {
    SearchAction.init();
});



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/libs/jquery.stick.in.parent.min.js]*/
"use strict";!function(e,t){"function"==typeof define&&define.amd?define(t):"object"==typeof exports?module.exports=t():e.ResizeSensor=t()}("undefined"!=typeof window?window:this,function(){if("undefined"==typeof window)return null;var S=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||function(e){return window.setTimeout(e,20)};function o(e,t){var i=Object.prototype.toString.call(e),n="[object Array]"===i||"[object NodeList]"===i||"[object HTMLCollection]"===i||"[object Object]"===i||"undefined"!=typeof jQuery&&e instanceof jQuery||"undefined"!=typeof Elements&&e instanceof Elements,o=0,s=e.length;if(n)for(;o<s;o++)t(e[o]);else t(e)}function w(e){if(!e.getBoundingClientRect)return{width:e.offsetWidth,height:e.offsetHeight};var t=e.getBoundingClientRect();return{width:Math.round(t.width),height:Math.round(t.height)}}var s=function(t,i){var n;function T(){var i,n,o=[];this.add=function(e){o.push(e)},this.call=function(e){for(i=0,n=o.length;i<n;i++)o[i].call(this,e)},this.remove=function(e){var t=[];for(i=0,n=o.length;i<n;i++)o[i]!==e&&t.push(o[i]);o=t},this.length=function(){return o.length}}"undefined"!=typeof ResizeObserver?(n=new ResizeObserver(function(e){o(e,function(e){i.call(this,{width:e.contentRect.width,height:e.contentRect.height})})}),void 0!==t&&o(t,function(e){n.observe(e)})):o(t,function(e){!function(e,t){if(e)if(e.resizedAttached)e.resizedAttached.add(t);else{e.resizedAttached=new T,e.resizedAttached.add(t),e.resizeSensor=document.createElement("div"),e.resizeSensor.dir="ltr",e.resizeSensor.className="resize-sensor";var i="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;",n="position: absolute; left: 0; top: 0; transition: 0s;";e.resizeSensor.style.cssText=i,e.resizeSensor.innerHTML='<div class="resize-sensor-expand" style="'+i+'"><div style="'+n+'"></div></div><div class="resize-sensor-shrink" style="'+i+'"><div style="'+n+' width: 200%; height: 200%"></div></div>',e.appendChild(e.resizeSensor);var o=window.getComputedStyle(e).getPropertyValue("position");"absolute"!==o&&"relative"!==o&&"fixed"!==o&&(e.style.position="relative");var s,r,a,c=e.resizeSensor.childNodes[0],d=c.childNodes[0],l=e.resizeSensor.childNodes[1],p=w(e),h=p.width,f=p.height,u=!0,v=function(){d.style.width="100000px",d.style.height="100000px",c.scrollLeft=1e5,c.scrollTop=1e5,l.scrollLeft=1e5,l.scrollTop=1e5},m=function(){if(u){if(!c.scrollTop&&!c.scrollLeft)return v(),void(a||(a=S(function(){a=0,m()})));u=!1}v()};e.resizeSensor.resetSensor=m;var b=function(){r=0,s&&(h=p.width,f=p.height,e.resizedAttached&&e.resizedAttached.call(p))},g=function(){p=w(e),(s=p.width!==h||p.height!==f)&&!r&&(r=S(b)),m()},y=function(e,t,i){e.attachEvent?e.attachEvent("on"+t,i):e.addEventListener(t,i)};y(c,"scroll",g),y(l,"scroll",g),S(m)}}(e,i)}),this.detach=function(e){"undefined"!=typeof ResizeObserver?o(t,function(e){n.unobserve(e)}):s.detach(t,e)},this.reset=function(){t.resizeSensor.resetSensor()}};return s.reset=function(e,t){o(e,function(e){e.resizeSensor.resetSensor()})},s.detach=function(e,t){o(e,function(e){e&&(e.resizedAttached&&"function"==typeof t&&(e.resizedAttached.remove(t),e.resizedAttached.length())||e.resizeSensor&&(e.contains(e.resizeSensor)&&e.removeChild(e.resizeSensor),delete e.resizeSensor,delete e.resizedAttached))})},s}),function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t(e.StickySidebar={})}(this,function(e){"undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self&&self;var t,i,n=(function(e,t){(function(e){Object.defineProperty(e,"__esModule",{value:!0});var l,n,t=function(){function n(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(e,t,i){return t&&n(e.prototype,t),i&&n(e,i),e}}(),i=(n={topSpacing:0,bottomSpacing:0,containerSelector:!(l=".stickySidebar"),innerWrapperSelector:".inner-wrapper-sticky",stickyClass:"is-affixed",resizeSensor:!0,minWidth:!1},function(){function d(e){var t=this,i=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{};if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,d),this.options=d.extend(n,i),this.sidebar="string"==typeof e?document.querySelector(e):e,void 0===this.sidebar||!this.sidebar)throw new Error("There is no specific sidebar element.");this.sidebarInner=!1,this.container=this.sidebar.parentElement,this.affixedType="STATIC",this.direction="down",this.support={transform:!1,transform3d:!1},this._initialized=!1,this._reStyle=!1,this._breakpoint=!1,this.dimensions={translateY:0,maxTranslateY:0,topSpacing:0,lastTopSpacing:0,bottomSpacing:0,lastBottomSpacing:0,sidebarHeight:0,sidebarWidth:0,containerTop:0,containerHeight:0,viewportHeight:0,viewportTop:0,lastViewportTop:0},["handleEvent"].forEach(function(e){t[e]=t[e].bind(t)}),this.initialize()}return t(d,[{key:"initialize",value:function(){var i=this;if(this._setSupportFeatures(),this.options.innerWrapperSelector&&(this.sidebarInner=this.sidebar.querySelector(this.options.innerWrapperSelector),null===this.sidebarInner&&(this.sidebarInner=!1)),!this.sidebarInner){var e=document.createElement("div");for(e.setAttribute("class","inner-wrapper-sticky"),this.sidebar.appendChild(e);this.sidebar.firstChild!=e;)e.appendChild(this.sidebar.firstChild);this.sidebarInner=this.sidebar.querySelector(".inner-wrapper-sticky")}if(this.options.containerSelector){var t=document.querySelectorAll(this.options.containerSelector);if((t=Array.prototype.slice.call(t)).forEach(function(e,t){e.contains(i.sidebar)&&(i.container=e)}),!t.length)throw new Error("The container does not contains on the sidebar.")}"function"!=typeof this.options.topSpacing&&(this.options.topSpacing=parseInt(this.options.topSpacing)||0),"function"!=typeof this.options.bottomSpacing&&(this.options.bottomSpacing=parseInt(this.options.bottomSpacing)||0),this._widthBreakpoint(),this.calcDimensions(),this.stickyPosition(),this.bindEvents(),this._initialized=!0}},{key:"bindEvents",value:function(){window.addEventListener("resize",this,{passive:!0,capture:!1}),window.addEventListener("scroll",this,{passive:!0,capture:!1}),this.sidebar.addEventListener("update"+l,this),this.options.resizeSensor&&"undefined"!=typeof ResizeSensor&&(new ResizeSensor(this.sidebarInner,this.handleEvent),new ResizeSensor(this.container,this.handleEvent))}},{key:"handleEvent",value:function(e){this.updateSticky(e)}},{key:"calcDimensions",value:function(){if(!this._breakpoint){var e=this.dimensions;e.containerTop=d.offsetRelative(this.container).top,e.containerHeight=this.container.clientHeight-35,e.containerBottom=e.containerTop+e.containerHeight,e.sidebarHeight=this.sidebarInner.offsetHeight,e.sidebarWidth=this.sidebarInner.offsetWidth,e.viewportHeight=window.innerHeight,e.maxTranslateY=e.containerHeight-e.sidebarHeight,this._calcDimensionsWithScroll()}}},{key:"_calcDimensionsWithScroll",value:function(){var e=this.dimensions;e.sidebarLeft=d.offsetRelative(this.sidebar).left,e.viewportTop=document.documentElement.scrollTop||document.body.scrollTop,e.viewportBottom=e.viewportTop+e.viewportHeight,e.viewportLeft=document.documentElement.scrollLeft||document.body.scrollLeft,e.topSpacing=this.options.topSpacing,e.bottomSpacing=this.options.bottomSpacing,"function"==typeof e.topSpacing&&(e.topSpacing=parseInt(e.topSpacing(this.sidebar))||0),"function"==typeof e.bottomSpacing&&(e.bottomSpacing=parseInt(e.bottomSpacing(this.sidebar))||0),"VIEWPORT-TOP"===this.affixedType?e.topSpacing<e.lastTopSpacing&&(e.translateY+=e.lastTopSpacing-e.topSpacing,this._reStyle=!0):"VIEWPORT-BOTTOM"===this.affixedType&&e.bottomSpacing<e.lastBottomSpacing&&(e.translateY+=e.lastBottomSpacing-e.bottomSpacing,this._reStyle=!0),e.lastTopSpacing=e.topSpacing,e.lastBottomSpacing=e.bottomSpacing}},{key:"isSidebarFitsViewport",value:function(){var e=this.dimensions,t="down"===this.scrollDirection?e.lastBottomSpacing:e.lastTopSpacing;return this.dimensions.sidebarHeight+t<this.dimensions.viewportHeight}},{key:"observeScrollDir",value:function(){var e=this.dimensions;if(e.lastViewportTop!==e.viewportTop){var t="down"===this.direction?Math.min:Math.max;e.viewportTop===t(e.viewportTop,e.lastViewportTop)&&(this.direction="down"===this.direction?"up":"down")}}},{key:"getAffixType",value:function(){this._calcDimensionsWithScroll();var e=this.dimensions,t=e.viewportTop+e.topSpacing,i=this.affixedType;return t<=e.containerTop||e.containerHeight<=e.sidebarHeight?(e.translateY=0,i="STATIC"):i="up"===this.direction?this._getAffixTypeScrollingUp():this._getAffixTypeScrollingDown(),e.translateY=Math.max(0,e.translateY),e.translateY=Math.min(e.containerHeight,e.translateY),e.translateY=Math.round(e.translateY),e.lastViewportTop=e.viewportTop,i}},{key:"_getAffixTypeScrollingDown",value:function(){var e=this.dimensions,t=e.sidebarHeight+e.containerTop,i=e.viewportTop+e.topSpacing,n=e.viewportBottom-e.bottomSpacing,o=this.affixedType;return this.isSidebarFitsViewport()?e.sidebarHeight+i>=e.containerBottom?(e.translateY=e.containerBottom-t,o="CONTAINER-BOTTOM"):i>=e.containerTop&&(e.translateY=i-e.containerTop,o="VIEWPORT-TOP"):e.containerBottom<=n?(e.translateY=e.containerBottom-t,o="CONTAINER-BOTTOM"):t+e.translateY<=n?(e.translateY=n-t,o="VIEWPORT-BOTTOM"):e.containerTop+e.translateY<=i&&0!==e.translateY&&e.maxTranslateY!==e.translateY&&(o="VIEWPORT-UNBOTTOM"),o}},{key:"_getAffixTypeScrollingUp",value:function(){var e=this.dimensions,t=e.sidebarHeight+e.containerTop,i=e.viewportTop+e.topSpacing,n=e.viewportBottom-e.bottomSpacing,o=this.affixedType;return i<=e.translateY+e.containerTop?(e.translateY=i-e.containerTop,o="VIEWPORT-TOP"):e.containerBottom<=n?(e.translateY=e.containerBottom-t,o="CONTAINER-BOTTOM"):this.isSidebarFitsViewport()||e.containerTop<=i&&0!==e.translateY&&e.maxTranslateY!==e.translateY&&(o="VIEWPORT-UNBOTTOM"),o}},{key:"_getStyle",value:function(e){if(void 0!==e){var t={inner:{},outer:{}},i=this.dimensions;switch(e){case"VIEWPORT-TOP":t.inner={position:"fixed",top:i.topSpacing,left:i.sidebarLeft-i.viewportLeft,width:i.sidebarWidth};break;case"VIEWPORT-BOTTOM":t.inner={position:"fixed",top:"auto",left:i.sidebarLeft,bottom:i.bottomSpacing,width:i.sidebarWidth};break;case"CONTAINER-BOTTOM":case"VIEWPORT-UNBOTTOM":var n=this._getTranslate(0,i.translateY+"px");t.inner=n?{transform:n}:{position:"absolute",top:i.translateY,width:i.sidebarWidth}}switch(e){case"VIEWPORT-TOP":case"VIEWPORT-BOTTOM":case"VIEWPORT-UNBOTTOM":case"CONTAINER-BOTTOM":t.outer={height:i.sidebarHeight,position:"relative"}}return t.outer=d.extend({height:"",position:""},t.outer),t.inner=d.extend({position:"relative",top:"",left:"",bottom:"",width:"",transform:""},t.inner),t}}},{key:"stickyPosition",value:function(e){if(!this._breakpoint){e=this._reStyle||e||!1,this.options.topSpacing,this.options.bottomSpacing;var t=this.getAffixType(),i=this._getStyle(t);if((this.affixedType!=t||e)&&t){var n="affix."+t.toLowerCase().replace("viewport-","")+l;for(var o in d.eventTrigger(this.sidebar,n),"STATIC"===t?d.removeClass(this.sidebar,this.options.stickyClass):d.addClass(this.sidebar,this.options.stickyClass),i.outer){var s="number"==typeof i.outer[o]?"px":"";this.sidebar.style[o]=i.outer[o]+s}for(var r in i.inner){var a="number"==typeof i.inner[r]?"px":"";this.sidebarInner.style[r]=i.inner[r]+a}var c="affixed."+t.toLowerCase().replace("viewport-","")+l;d.eventTrigger(this.sidebar,c)}else this._initialized&&(this.sidebarInner.style.left=i.inner.left);this.affixedType=t}}},{key:"_widthBreakpoint",value:function(){window.innerWidth<=this.options.minWidth?(this._breakpoint=!0,this.affixedType="STATIC",this.sidebar.removeAttribute("style"),d.removeClass(this.sidebar,this.options.stickyClass),this.sidebarInner.removeAttribute("style")):this._breakpoint=!1}},{key:"updateSticky",value:function(){var e,t=this,i=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{};this._running||(this._running=!0,e=i.type,requestAnimationFrame(function(){switch(e){case"scroll":t._calcDimensionsWithScroll(),t.observeScrollDir(),t.stickyPosition();break;case"resize":default:t._widthBreakpoint(),t.calcDimensions(),t.stickyPosition(!0)}t._running=!1}))}},{key:"_setSupportFeatures",value:function(){var e=this.support;e.transform=d.supportTransform(),e.transform3d=d.supportTransform(!0)}},{key:"_getTranslate",value:function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:0,t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:0,i=2<arguments.length&&void 0!==arguments[2]?arguments[2]:0;return this.support.transform3d?"translate3d("+e+", "+t+", "+i+")":!!this.support.translate&&"translate("+e+", "+t+")"}},{key:"destroy",value:function(){window.removeEventListener("resize",this,{capture:!1}),window.removeEventListener("scroll",this,{capture:!1}),this.sidebar.classList.remove(this.options.stickyClass),this.sidebar.style.minHeight="",this.sidebar.removeEventListener("update"+l,this);var e={inner:{},outer:{}};for(var t in e.inner={position:"",top:"",left:"",bottom:"",width:"",transform:""},e.outer={height:"",position:""},e.outer)this.sidebar.style[t]=e.outer[t];for(var i in e.inner)this.sidebarInner.style[i]=e.inner[i];this.options.resizeSensor&&"undefined"!=typeof ResizeSensor&&(ResizeSensor.detach(this.sidebarInner,this.handleEvent),ResizeSensor.detach(this.container,this.handleEvent))}}],[{key:"supportTransform",value:function(e){var i=!1,t=e?"perspective":"transform",n=t.charAt(0).toUpperCase()+t.slice(1),o=document.createElement("support").style;return(t+" "+["Webkit","Moz","O","ms"].join(n+" ")+n).split(" ").forEach(function(e,t){if(void 0!==o[e])return i=e,!1}),i}},{key:"eventTrigger",value:function(e,t,i){try{var n=new CustomEvent(t,{detail:i})}catch(e){(n=document.createEvent("CustomEvent")).initCustomEvent(t,!0,!0,i)}e.dispatchEvent(n)}},{key:"extend",value:function(e,t){var i={};for(var n in e)void 0!==t[n]?i[n]=t[n]:i[n]=e[n];return i}},{key:"offsetRelative",value:function(e){var t={left:0,top:0};do{var i=e.offsetTop,n=e.offsetLeft;isNaN(i)||(t.top+=i),isNaN(n)||(t.left+=n),e="BODY"===e.tagName?e.parentElement:e.offsetParent}while(e);return t}},{key:"addClass",value:function(e,t){d.hasClass(e,t)||(e.classList?e.classList.add(t):e.className+=" "+t)}},{key:"removeClass",value:function(e,t){d.hasClass(e,t)&&(e.classList?e.classList.remove(t):e.className=e.className.replace(new RegExp("(^|\\b)"+t.split(" ").join("|")+"(\\b|$)","gi")," "))}},{key:"hasClass",value:function(e,t){return e.classList?e.classList.contains(t):new RegExp("(^| )"+t+"( |$)","gi").test(e.className)}},{key:"defaults",get:function(){return n}}]),d}());e.default=i,window.StickySidebar=i})(t)}(t={exports:{}},t.exports),t.exports),o=(i=n)&&i.__esModule&&Object.prototype.hasOwnProperty.call(i,"default")?i.default:i;e.default=o,e.__moduleExports=n,Object.defineProperty(e,"__esModule",{value:!0})});



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/shared/yektanet.js]*/
try {
    if(window.isNewCustomer  || !window.userId) {
        !function (t, e, n) {
            t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
                t[n].q.push(arguments)
            }, t[n].q = t[n].q || [];
            var a = new Date,
                r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
                c = e.getElementsByTagName("script")[0], s = e.createElement("script");
            s.id = "ua-script-7GVP306B";
            s.dataset.analyticsobject = n;
            s.async = 1;
            s.type = "text/javascript";
            s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/7GVP306B/rg.lite.js?v=" + r, c.parentNode.insertBefore(s, c)
        }(window, document, "yektanet");
    }
} catch (e) {
    window.Sentry && window.Sentry.captureException(e);
    // eslint-disable-next-line no-console
    console.warn(e);
}



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/productsController/indexAction.js]*/
var ProductsIndexAction = {
    addTOHistory: true,
    init: function () {
        this.initCompare();
        this.initShowMore();
        this.setHeightSponsoredAd();
        this.initRenderMainSwiper();
        this.initFilterShortcut();
        this.initRenderBrandCampainSwiper();
        this.setGAAdImpressionEvent();

        if(isModuleActive('ab_desktop_touchpoint_filters')){
            this.initTouchpointFilters();
            this.touchpointFilterClick();
        }

        if(isModuleActive('ab_desktop_topbar_filters')){
            this.initDropDown();
            this.initFilterDropDown();
            this.topbarFiltersClick();
            this.initListFilterInput();
        }

        if(isModuleActive('dk_ab_add_to_wish_list')) {
            this.initABAddToWishList();
        }
    },

    initABAddToWishList: function () {
        $('.js-ab-add-to-wish-list').on('click' , function (event) {
            event.preventDefault();
            var thiz = $(this);
            var productId = thiz.data('id');

            if(!window.userId) window.location.replace('/users/login-register/');

            if (thiz.hasClass('c-product-box__add-to-wish-list--on')) {
              Services.ajaxPOSTRequestJSON(
                  '/ajax/favorites/product/remove/' + productId + '/',
                  null,
                  function () {
                      thiz.removeClass('c-product-box__add-to-wish-list--on');
                  },
                  null,
                  true,
                  true
              );
              return;
            }

            var csrf = "";
            Services.ajaxPOSTRequestJSON(
              '/ajax/favorites/product/add/' + productId + '/', {token: csrf},
              function () {
                  thiz.addClass('c-product-box__add-to-wish-list--on');
              },
              null,
              true,
              true
            );

        })
    },

    initFilterShortcut: function () {
        $('.js-show-more-categories').on('click', function () {
            $(this).siblings('.js-shortcut-category').removeClass('u-hidden');
            $(this).remove();
        });
    },

    setHeightSponsoredAd: function () {
        return;
        var adContainer = $('.js-listing-sidebar__sponsoredProduct');
        var cw = adContainer.width();
        adContainer.css({'height':(cw+10)+'px'});
    },

    initShowMore: function () {
        $('.js-expandable-text').each(function () {
            var expandableText = $(this);
            var $container = expandableText.closest('.js-expandable-text-container');
            var expandBtn = $container.find('.js-expand-btn');

            if (expandableText.height() > 100) {
                $container.addClass('collapsed');
                expandBtn.removeClass('hidden');
            }else{
                $container.removeClass('collapsed');
                expandBtn.addClass('hidden');
            }

            expandBtn.on('click', function () {
                $container.toggleClass('collapsed')
            });
        });
    },

    initCompare: function () {
        var thiz = this;
        thiz.compareCount = 0;
        thiz.compared = [];
        var $compareContainer = $('.js-compare-footer');

        $(document).on('change', '.js-product-compare-btn :checkbox', function (e) {
            var $product = $(this).closest('.js-product-box');
            var $compareBtn = $(this);
            if ($compareBtn.is(':checked') && thiz.compareCount < 4) {

                var sntParams = {"product_id" : $product.data('id')};
                snt('dkCompareButtonClick',sntParams,true);

                thiz.compareCount++;
                thiz.compared.push($product.data('id'));

                thiz.updateCompareCounterLink();

                var $content = $('.js-compare-footer-template').clone(true);
                $content.find('.js-compare-product-image').prop('src', $product.find('img').attr('src'));
                $content.find('.js-compare-product-image').prop('alt', $product.find('img').attr('alt'));
                $content.find('.js-compare-product-title').text($product.data('title-fa'));
                $content = '<div data-id="' + $product.data('id') + '" class="js-compare-list-product">' + $content.html() + '</div>';
                $('.js-compare-footer-content').append($content);
                $product.addClass('is-in-compare');
                var $quickImage = $('.js-compare-image-preview img');
                $quickImage.attr('src', $product.find('img').attr('src'));
                $quickImage.attr('alt', $product.find('img').attr('alt'));
                $quickImage.parent().show();
                $quickImage.parent().removeClass('is-fading-out');
                setTimeout(function () {
                    $quickImage.parent().addClass('is-fading-out');
                }, 100);
                if (thiz.compareTimeout) {
                    clearTimeout(thiz.compareTimeout);
                }
                thiz.compareTimeout = setTimeout(function () {
                    $quickImage.parent().hide();
                    $quickImage.parent().removeClass('is-fading-out');
                }, 2500);
                if (thiz.compareCount === 4) {
                    $('.js-product-compare-btn :not(:checked)').attr('disabled', 'disabled');
                }
            } else if(!$compareBtn.is(':checked')) {
                thiz.updateCompareCounterLink();
                thiz.removeCompare($product.data('id'));
                $product.removeClass('is-in-compare');
                $('.js-product-compare-btn :not(:checked)').removeAttr('disabled');
            }
        });

        $(document).on('click', '.js-product-compare-btn:has(input:disabled)', function () {
            var $product = $(this).closest('.js-product-box');
            $('.full-compare').removeClass('full-compare');
            if (thiz.compareCount >= 4) {
                $product.addClass('full-compare');
                setTimeout(function () {
                    $product.removeClass('full-compare');
                }, 3000);
            }
        });

        $(document).on('click', '.js-compare-container .js-product-remove', function () {
            thiz.removeCompare($(this).closest('.js-compare-list-product').data('id'));
        });

        $('.js-compare-all-remove', $compareContainer).on('click', function (e) {
            e.preventDefault();
            var allCompared = thiz.compared.slice();
            $.each(allCompared, function (k, v) {
                thiz.removeCompare(v);
            })
        });
    },

    updateCompareCounterLink: function () {
        var thiz = this;
        var $compareContainer = $('.js-compare-footer');
        $compareContainer.find('.js-compare-count').html(Services.convertToFaDigit(thiz.compareCount));

        if (thiz.compareCount === 0) {
            $compareContainer.find('.js-start-compare-btn').prop('href', '');
            $compareContainer.addClass('u-hidden');
        } else {
            var allCompared = thiz.compared.slice();
            var href = '/compare/';
            $.each(allCompared, function (k, v) {
                href += 'dkp-' + v + '/';
            });

            $compareContainer.find('.js-start-compare-btn').prop('href', href);
            $compareContainer.removeClass('u-hidden');
        }
    },

    removeCompare: function (id) {
        var thiz = this;
        var $compareContainer = $('.js-compare-footer');
        $compareContainer.find('.js-compare-list-product').each(function () {
            if ($(this).data('id') === id) {
                $(this).remove();
                thiz.compareCount--;
                thiz.compared.splice(thiz.compared.indexOf(id), 1);

                thiz.updateCompareCounterLink();

                $('.js-product-compare-btn :checked').each(function () {
                    var $product = $(this).closest('.js-product-box');
                    if ($product.data('id') === id) {
                        $(this).prop('checked', false);
                        $product.removeClass('is-in-compare');
                    }
                });
            }
        });

        if (thiz.compareCount < 4) {
            $('.js-product-compare-btn :not(:checked)').removeAttr('disabled');
        }
    },

    initShowMore: function () {
      $('.js-expandable-text').each(function () {
          var expandableText = $(this);
          var $container = expandableText.closest('.js-expandable-text-container');
          var expandBtn = $container.find('.js-expand-btn');

          if (expandableText.height() > 100) {
              $container.addClass('collapsed');
              expandBtn.removeClass('hidden');
          }else{
              $container.removeClass('collapsed');
              expandBtn.addClass('hidden');
          }

          expandBtn.on('click', function () {
              $container.toggleClass('collapsed')
          });
      });
  },

    initCompare: function () {
      var thiz = this;
      thiz.compareCount = 0;
      thiz.compared = [];
      var $compareContainer = $('.js-compare-footer');

      $(document).on('change', '.js-product-compare-btn :checkbox', function (e) {
          var $product = $(this).closest('.js-product-box');
          var $compareBtn = $(this);
          if ($compareBtn.is(':checked') && thiz.compareCount < 4) {

              var sntParams = {"product_id" : $product.data('id')};
              snt('dkCompareButtonClick',sntParams,true);

              thiz.compareCount++;
              thiz.compared.push($product.data('id'));

              thiz.updateCompareCounterLink();

              var $content = $('.js-compare-footer-template').clone(true);
              $content.find('.js-compare-product-image').prop('src', $product.find('img').attr('src'));
              $content.find('.js-compare-product-image').prop('alt', $product.find('img').attr('alt'));
              $content.find('.js-compare-product-title').text($product.data('title-fa'));
              $content = '<div data-id="' + $product.data('id') + '" class="js-compare-list-product">' + $content.html() + '</div>';
              $('.js-compare-footer-content').append($content);
              $product.addClass('is-in-compare');
              var $quickImage = $('.js-compare-image-preview img');
              $quickImage.attr('src', $product.find('img').attr('src'));
              $quickImage.attr('alt', $product.find('img').attr('alt'));
              $quickImage.parent().show();
              $quickImage.parent().removeClass('is-fading-out');
              setTimeout(function () {
                  $quickImage.parent().addClass('is-fading-out');
              }, 100);
              if (thiz.compareTimeout) {
                  clearTimeout(thiz.compareTimeout);
              }
              thiz.compareTimeout = setTimeout(function () {
                  $quickImage.parent().hide();
                  $quickImage.parent().removeClass('is-fading-out');
              }, 2500);
              if (thiz.compareCount === 4) {
                  $('.js-product-compare-btn :not(:checked)').attr('disabled', 'disabled');
              }
          } else if(!$compareBtn.is(':checked')) {
              thiz.updateCompareCounterLink();
              thiz.removeCompare($product.data('id'));
              $product.removeClass('is-in-compare');
              $('.js-product-compare-btn :not(:checked)').removeAttr('disabled');
          }
      });

      $(document).on('click', '.js-product-compare-btn:has(input:disabled)', function () {
          var $product = $(this).closest('.js-product-box');
          $('.full-compare').removeClass('full-compare');
          if (thiz.compareCount >= 4) {
              $product.addClass('full-compare');
              setTimeout(function () {
                  $product.removeClass('full-compare');
              }, 3000);
          }
      });

      $(document).on('click', '.js-compare-container .js-product-remove', function () {
          thiz.removeCompare($(this).closest('.js-compare-list-product').data('id'));
      });

      $('.js-compare-all-remove', $compareContainer).on('click', function (e) {
          e.preventDefault();
          var allCompared = thiz.compared.slice();
          $.each(allCompared, function (k, v) {
              thiz.removeCompare(v);
          })
      });
  },

    updateCompareCounterLink: function () {
      var thiz = this;
      var $compareContainer = $('.js-compare-footer');
      $compareContainer.find('.js-compare-count').html(Services.convertToFaDigit(thiz.compareCount));

      if (thiz.compareCount === 0) {
          $compareContainer.find('.js-start-compare-btn').prop('href', '');
          $compareContainer.addClass('u-hidden');
      } else {
          var allCompared = thiz.compared.slice();
          var href = '/compare/';
          $.each(allCompared, function (k, v) {
              href += 'dkp-' + v + '/';
          });

          $compareContainer.find('.js-start-compare-btn').prop('href', href);
          $compareContainer.removeClass('u-hidden');
      }
  },

    removeCompare: function (id) {
      var thiz = this;
      var $compareContainer = $('.js-compare-footer');
      $compareContainer.find('.js-compare-list-product').each(function () {
          if ($(this).data('id') === id) {
              $(this).remove();
              thiz.compareCount--;
              thiz.compared.splice(thiz.compared.indexOf(id), 1);

              thiz.updateCompareCounterLink();

              $('.js-product-compare-btn :checked').each(function () {
                  var $product = $(this).closest('.js-product-box');
                  if ($product.data('id') === id) {
                      $(this).prop('checked', false);
                      $product.removeClass('is-in-compare');
                  }
              });
          }
      });

      if (thiz.compareCount < 4) {
          $('.js-product-compare-btn :not(:checked)').removeAttr('disabled');
      }
  },

    initRenderMainSwiper: function () {
      var $slider = $('.js-main-page-slider');
      if (!$slider.length) return;

      var $w = $(window),
          top = $slider.offset().top,
          height = $slider.height(),
          bottom = top + height,
          sentBanners = [];

      var self = this;
      self.slidersImpressionsData = [];
      new Swiper('.js-main-page-slider',  {
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

    initRenderBrandCampainSwiper: function () {
        new Swiper($('.js-brand-campaign-slider'),  {
            slidesPerView: 5,
            spaceBetween: 0,
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
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

    setGAAdImpressionEvent: function () {
        var items = $('.js-adplacement-item-ga');
        items.on('click' , function () {
            var itemId = $(this).data('id');
            ProductsIndexAction.setGAClickImpressionEvent(itemId);
        })
    },

    initTouchpointFilters: function () {
        var brands_holder , types_holder , sellers_holder;
        var types = $('.js-touchpoint-type').clone();
        var brands = $('.js-touchpoint-brand').clone();
        var sellers = $('.js-touchpoint-seller_condition').clone();

        init();

        var resizeTime;
        var delta = 500;
        var timeOut = false;
        $(window).resize(function() {
            resizeTime = new Date();
            if (timeOut === false) {
                timeOut = true;
                setTimeout(resizeEnd, delta);
            }
        });

        function resizeEnd() {
            if (new Date() - resizeTime < delta) {
                setTimeout(resizeEnd, delta);
            } else {
                timeOut = false;
                $('.js-plp-products-list > .js-touchpoint-filters').remove();
                init();
            }
        }

        function init() {
            var containerWidth = $('.js-plp-products-list').width();

            if(containerWidth < 1065){
                types_holder = $('.js-plp-products-list li:not([class]):nth-child(9)');
                brands_holder = $('.js-plp-products-list li:not([class]):nth-child(3)');
                sellers_holder = $('.js-plp-products-list li:not([class]):nth-child(6)');
            } else {
                brands_holder = $('.js-plp-products-list li:not([class]):nth-child(4)');
                types_holder = $('.js-plp-products-list li:not([class]):nth-child(12)');
                sellers_holder = $('.js-plp-products-list li:not([class]):nth-child(8)');
            }

            types_holder.after(types);
            brands_holder.after(brands);
            sellers_holder.after(sellers);

            new Swiper('.js-touchpoint-swiper-container', {
                slidesPerView: 'auto',
                spaceBetween: 16,
                navigation: {
                    nextEl: '.js-touchpoint-swiper-next'
                },
            });
        }

    },

    touchpointFilterClick: function (){
        $('.js-touchpoint-item').click(function () {
            var item = $(this);
            var value = item.data('value')
            var filter = $('#'+value);
            filter.click();
        })
    },

    topbarFiltersClick: function () {
        $('.js-topbar-filters').on('click' , 'button' , function () {
            $('.js-topbar-filters button').removeClass('is-active');

            var btn = $(this);
            var val = btn.data('value');
            var original = btn.data('original');
            btn.addClass('is-active');

            if (original){
                $('#'+val+'[name='+original+']').click();
            } else  {
                $('#'+val).click();
            }

        })

        // remove check box drop down
        $('.js-filter-checkbox').click(function () {
            var item = $(this);
            var val = item.data('value');
            var filter = $('#'+val);
            if(filter.is(":checked")){
                $('#remove-btn-'+val).click();
            }
        })
    },

    initFilterDropDown: function() {
        var thiz = this,
            $filterForm = $('.js-dc-filter'),
            $dropdownFilterAll = $(".js-dc-dropdown"),
            emptyFilterFormOnLoad = $filterForm.find("input[type=checkbox]:checked.js-filter-checkbox").length > 0;

        $dropdownFilterAll.each(function() {

            var $dropdownFilter = $(this),
                $checkboxInput = $dropdownFilter.find(".js-filter-checkbox"),
                $submitBtn = $dropdownFilter.find(".js-filter-dropdown-submit"),
                $clearBtn = $dropdownFilter.find(".js-filter-dropdown-clear");

            if(emptyFilterFormOnLoad) {
                $submitBtn.removeClass("disabled");
            } else {
                $checkboxInput.on("change", function() {
                    if($checkboxInput.is(":checked")) {
                        $submitBtn.removeClass("disabled");
                    } else {
                        $submitBtn.addClass("disabled");
                    }
                });
            }

            $submitBtn.on('click', function() {
                thiz.submitFiltersAndSorts();
                // $filterForm.submit();
            });

            $clearBtn.on('click', function() {
                $checkboxInput.prop('checked', false);
                // $filterForm.submit();
            });

        });

    },

    initDropDown: function() {
        var $dropdownAll = $(".js-dc-dropdown"),
            $dropdownTriggerAll = $dropdownAll.find(".js-dc-dropdown-trigger"),
            $dropdownContentAll = $dropdownAll.find(".js-dc-dropdown-content");

        $dropdownAll.each(function() {
            var $dropdownFilter = $(this),
                $dropdownTrigger = $dropdownFilter.find(".js-dc-dropdown-trigger"),
                $dropdownContent = $dropdownFilter.find(".js-dc-dropdown-content");

            $dropdownTrigger.on("click", function(event) {
                $dropdownTrigger.toggleClass("is-open");
                $dropdownContent.toggleClass("u-hidden");
                $dropdownTriggerAll.not($dropdownTrigger).removeClass("is-open");
                $dropdownContentAll.not($dropdownContent).addClass("u-hidden");
                event.stopPropagation();
            });
        });

        $(document).on("click", function(event) {
            if (!$(event.target).closest($dropdownAll).length) {
                $dropdownTriggerAll.removeClass("is-open");
                $dropdownContentAll.addClass("u-hidden");
            }
        });
    },

    initListFilterInput: function() {
        var $listFilterInputAll = $(".js-filter-input");

        $listFilterInputAll.each(function() {
            var $listFilterInput = $(this),
                $filterContent = $listFilterInput.closest(".js-filter-content"),
                $filterItemsAll = $filterContent.find(".js-filter-item"),
                $filterLabelsAll = $filterContent.find(".js-filter-label");

            $listFilterInput.on("keyup", function() {
                var val = $listFilterInput.val();

                if (val) {
                    $filterLabelsAll.each(function() {
                        var $filterLabel = $(this),
                            $filterItem = $filterLabel.closest(".js-filter-item");

                        if ($filterLabel.data("en").indexOf(val) >= 0 ||
                            $filterLabel.data("fa").indexOf(val) >= 0 ||
                            $filterLabel.data("search").indexOf(val) >= 0 ||
                            $filterItem.find(".js-filter-checkbox").is(":checked")) {
                            $filterItem.show();
                        } else {
                            $filterItem.hide();
                        }
                    });
                } else {
                    $filterItemsAll.show();
                }
            });

            var $cleanableInput = $filterContent.find(".js-cleanable-input"),
                $inputCleaner = $cleanableInput.siblings(".js-input-cleaner");

            $cleanableInput.on("keyup", function() {
                if ($cleanableInput.val()) {
                    $inputCleaner.css("display", "inline-flex");
                } else {
                    $inputCleaner.css("display", "none");
                }
            });

            $inputCleaner.on("click", function() {
                $inputCleaner.css("display", "none");
                $cleanableInput.val("");
                $cleanableInput.keyup();
            });
        })
    },

};

$(function () {
  ProductsIndexAction.init();
});

function initCompared() {
  if (ProductsIndexAction.compareCount > 0) {
      $('.js-product-box').each(function () {
          var id = $(this).data('id');
          if (ProductsIndexAction.compared.indexOf(id) !== -1) {
              $(this).find('.js-product-compare-btn :checkbox').prop('checked', true);
          }
          if (ProductsIndexAction.compareCount >= 4) {
              $('.js-product-compare-btn :not(:checked)', document).attr('disabled', 'disabled');
          }
          $('.js-product-compare-btn :checked', document).removeAttr('disabled');
      });
  }
}