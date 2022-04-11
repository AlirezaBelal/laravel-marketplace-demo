/*[PATH @digikala/supernova/assets/local/package/url.min.js]*/
function Url(t){void 0===t&&(t=window.location.pathname+window.location.search+window.location.hash),this.url=decodeURIComponent(t),this.params}Url.prototype={setParam:function(t,r){var e=this,n=new RegExp("([?&]"+e.escapeBrackets(t)+"=)[^&]+","");return 0===r.length||(-1===e.url.indexOf("?")?e.add("?",t,r):n.test(e.url)?e.change(n,r):e.add("&",t,r)),e.url},setParams:function(t){var s=this,o=function(t,r,e){var n,i;for(var a in t)t.hasOwnProperty(a)&&(n=e?r?r+a:a:r?r+"["+a+"]":a,"object"==typeof(i=t[a])?o(i,n):s.setParam(n,i))};o(t,"",!0)},getParams:function(){for(var t,r=/[?&]([^=#]+)=([^&#]*)/g,e={};t=r.exec(this.url);)e[t[1]]=t[2];return e},removeParam:function(t){var r=this.url.split("?")[0],e=[],n=-1!==this.url.indexOf("?")?this.url.split("?")[1]:"";if(""!==n){for(var i=(e=n.split("&")).length-1;0<=i;i-=1)e[i].split("=")[0]===t&&e.splice(i,1);var a=e.join("&");this.url=r+(a.length?"?":"")+a}return this.url},addHash:function(t){var r=this.url.split("#");r[1]?this.url=this.url.replace(r[1],t):this.url=this.url+"#"+t},getHash:function(){var t=this.url.split("#");return!!t[1]&&t[1]},getParam:function(t,r){return this.params||(this.params=this.getParams()),void 0!==this.params[t]?this.params[t]:r},getUrl:function(){return decodeURI(this.url)},add:function(t,r,e){this.url+=t+r+"="+encodeURIComponent(e)},change:function(t,r){this.url=this.url.replace(t,"$1"+encodeURIComponent(r))},escapeBrackets:function(t){return t.replace(/[[]/g,"\\[").replace(/]/g,"\\]")},update:function(){history.pushState({},null,this.getUrl())}};


/*[PATH @digikala/supernova-digikala-desktop/static/landings/general/js/init.js]*/
var landingsGeneral = {
    init: function () {
        try {
            this.initSwiper();
        } catch (e) {
            window.Sentry && window.Sentry.captureException(e);
            // eslint-disable-next-line no-console
            console.warn(e);
        }
    },

    toPersianNumber: function (str) {
        return str.replace(/\d/g, function(d) {
            return '۰۱۲۳۴۵۶۷۸۹'[d];
        })
    },

    initSwiper: function () {
        new window.Swiper(".js-landing-swiper-products", {
            slidesPerView: 4,
            slidesPerGroup: 4,
            lazy: {
                enabled: true
            },
            navigation: {
                nextEl: ".js-swiper-button-next",
                prevEl: ".js-swiper-button-prev"
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
    },

    initCopyToClipboard: function (triggerClass, targetClass, callback) {
        $('body').on('click', triggerClass, function (e) {
            e.preventDefault();
            var txt = $(targetClass).text();
            copyToClipboard(txt);
            if (callback){
                callback.call($(targetClass));
            }
        });

        function copyToClipboard(text) {
            var aux = document.createElement("input");
            aux.setAttribute("value", text);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
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
}

$(function () {
    landingsGeneral.init();
});