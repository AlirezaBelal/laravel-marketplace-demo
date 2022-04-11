/*[PATH @digikala/supernova/assets/local/package/url.min.js]*/
function Url(t){void 0===t&&(t=window.location.pathname+window.location.search+window.location.hash),this.url=decodeURIComponent(t),this.params}Url.prototype={setParam:function(t,r){var e=this,n=new RegExp("([?&]"+e.escapeBrackets(t)+"=)[^&]+","");return 0===r.length||(-1===e.url.indexOf("?")?e.add("?",t,r):n.test(e.url)?e.change(n,r):e.add("&",t,r)),e.url},setParams:function(t){var s=this,o=function(t,r,e){var n,i;for(var a in t)t.hasOwnProperty(a)&&(n=e?r?r+a:a:r?r+"["+a+"]":a,"object"==typeof(i=t[a])?o(i,n):s.setParam(n,i))};o(t,"",!0)},getParams:function(){for(var t,r=/[?&]([^=#]+)=([^&#]*)/g,e={};t=r.exec(this.url);)e[t[1]]=t[2];return e},removeParam:function(t){var r=this.url.split("?")[0],e=[],n=-1!==this.url.indexOf("?")?this.url.split("?")[1]:"";if(""!==n){for(var i=(e=n.split("&")).length-1;0<=i;i-=1)e[i].split("=")[0]===t&&e.splice(i,1);var a=e.join("&");this.url=r+(a.length?"?":"")+a}return this.url},addHash:function(t){var r=this.url.split("#");r[1]?this.url=this.url.replace(r[1],t):this.url=this.url+"#"+t},getHash:function(){var t=this.url.split("#");return!!t[1]&&t[1]},getParam:function(t,r){return this.params||(this.params=this.getParams()),void 0!==this.params[t]?this.params[t]:r},getUrl:function(){return decodeURI(this.url)},add:function(t,r,e){this.url+=t+r+"="+encodeURIComponent(e)},change:function(t,r){this.url=this.url.replace(t,"$1"+encodeURIComponent(r))},escapeBrackets:function(t){return t.replace(/[[]/g,"\\[").replace(/]/g,"\\]")},update:function(){history.pushState({},null,this.getUrl())}};


/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/bestSalesController/indexAction.js]*/
IndexAction = {
    init: function () {
        var functions = [
            this.swiperInit,
            this.timeChangeListener,
            this.categoryChangeListener,
        ];

        if (isModuleActive('best_selling_data_layer')){
            functions.push(this.setImpressionEventClickHandler)
        }

        Services.callListInTryCatch(functions, this);
    },
    swiperInit: function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            // centeredSlides: true,
            spaceBetween: 5,
            speed: 100,
            loop: false,
            simulateTouch: true,
            // loopFillGroupWithBlank: false,
            grabCursor: true,
            // width: 560,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    },
    timeChangeListener: function () {
        $(document).on("click", ".js-time", function () {
            $(".js-time").removeClass("c-best-sales__time--active");
            $(this).addClass("c-best-sales__time--active");
            IndexAction.activeTimescope = $(this).data("js-time");
            Services.ajaxPOSTRequestHTML($(this).data("url"), [], function (response) {
                $(".js-content-wraper").html(response.data.data);
                IndexAction.swiperInit();
                IndexAction.insertUrlParam("last_days",IndexAction.activeTimescope);
            }, false, true);
        });
    },
    categoryChangeListener: function () {
        $(document).on("click", ".js-category", function () {
            $(".js-category").removeClass("c-best-sales__category--active");
            $(this).addClass("c-best-sales__category--active");
            IndexAction.activeCategory.id = $(this).data("id");
            IndexAction.activeCategory.name = $(this).text();
            Services.ajaxPOSTRequestHTML($(this).data("url"), [], function (response) {
                $(".js-content-wraper").html(response.data.data);
                IndexAction.swiperInit();
                if (IndexAction.activeCategory.id){
                    IndexAction.insertUrlParam("category_id",IndexAction.activeCategory.id);
                }else {
                    IndexAction.deleteUrlParam("category_id");
                }
            }, false, true);
        });
    },
    activeTimescope: "7",
    activeCategory: {
        id: "",
        name: "",
    },
    insertUrlParam: function (key, value) {
        const url = new Url();
        url.setParam(key,value);
        url.update();
        return true
    },
    deleteUrlParam: function (key) {
        const url = new Url();
        url.removeParam(key);
        url.update();
        return true
    },

    setImpressionEventClickHandler: function () {
        var thiz = this;
        $('.js-set-impression-click').on('click' , function () {
            var prodId = $(this).data('id');
            if (prodId){
                thiz.setGAClickImpressionEvent(prodId);
            }
        })
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

};

$(function () {
    IndexAction.init();
});