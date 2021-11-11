
@if(Request::routeIs('home.index'))
    <title>فروشگاه اینترنتی دیجی‌کالا</title>
@else
    <title>@yield('title')
        |
        فروشگاه اینترنتی دیجی‌کالا</title>
@endif


<script type="text/javascript">
    window.sntrackerActivation = true;
</script>
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
    _atrk_opts = {atrk_acct: "qfWte1awQa00Uf", domain: "digikala.com", dynamic: true};
    (function () {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "{{asset('digikala/js/atrk.js')}}";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();
</script>
<!-- End Alexa Certify Javascript -->

{{--    <!-- Google Tag Manager -->--}}
{{--    <script>(function (w, d, s, l, i) {--}}
{{--            w[l] = w[l] || [];--}}
{{--            w[l].push({--}}
{{--                'gtm.start':--}}
{{--                    new Date().getTime(), event: 'gtm.js'--}}
{{--            });--}}
{{--            var f = d.getElementsByTagName(s)[0],--}}
{{--                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';--}}
{{--            j.async = true;--}}
{{--            j.src =--}}
{{--                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;--}}
{{--            f.parentNode.insertBefore(j, f);--}}
{{--        })(window, document, 'script', 'dataLayer', 'GTM-TJWK7Z7');</script>--}}
{{--    <!-- End Google Tag Manager -->--}}

{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-13212406-1"></script>--}}

{{--<script>--}}
{{--    window.dataLayer = window.dataLayer || [];--}}

{{--    function gtag() {--}}
{{--        dataLayer.push(arguments);--}}
{{--    }--}}

{{--    window.emarsysCategoryBreadcrumb = window.emarsysCategoryBreadcrumb || "";--}}
{{--    var GTMurl = document.location.href, dataGTM = "";--}}
{{--    "/" === document.location.pathname ? dataGTM = "HOME" : 1 < GTMurl.indexOf("/users") ? dataGTM = 1 < GTMurl.indexOf("/login") ? "LOGIN" : 1 < GTMurl.indexOf("/register") ? "REGISTER" : "USERS" : 1 < GTMurl.indexOf("/product-list") ? dataGTM = "PRODUCT-LIST" : 1 < GTMurl.indexOf("profile/index.html") ? dataGTM = "PROFILE" : 1 < GTMurl.indexOf("page/index.html") ? dataGTM = "STATIC-PAGE" : 1 < GTMurl.indexOf("/brand") ? dataGTM = "BRAND" : 1 < GTMurl.indexOf("/seller") ? dataGTM = "SELLER" : 1 < GTMurl.indexOf("/product") ? dataGTM = "PDP" : 1 < GTMurl.indexOf("/cart") ? dataGTM = "CART" : 1 < GTMurl.indexOf("/shipping") ? dataGTM = "CHECKOUT - Shipping" : 1 < GTMurl.indexOf("/checkout") || 1 < GTMurl.lastIndexOf("/cash-on-delivery") ? dataGTM = "THANKYOUPAGE" : 1 < GTMurl.indexOf("payment/index.html") ? dataGTM = "CHECKOUT - Payment" : 1 < GTMurl.indexOf("/landing-page") ? dataGTM = "LANDING PAGES" : 1 < GTMurl.indexOf("/compare") ? dataGTM = "COMPARE" : 1 < GTMurl.indexOf("/search") ? dataGTM = 1 < GTMurl.indexOf("q=") ? 1 < GTMurl.indexOf("entry=mm") ? "megamenu" : "SEARCH" : "PLP" : 1 < GTMurl.indexOf("main") ? dataGTM = "CMP" : 1 < GTMurl.indexOf("/incredible-offers") ? dataGTM = "INCREDIBLE OFFER" : 1 < GTMurl.indexOf("/my-digikala") ? dataGTM = "MYDIGIKAL" : 1 < GTMurl.indexOf("promotion-page/index.html") && (dataGTM = "PROMOTION");--}}
{{--    dataLayer.push({--}}
{{--        "pageCategory": [dataGTM]--}}
{{--    });--}}

{{--    gtag('js', new Date());--}}
{{--    if (!window.module_GTM_demo) {--}}
{{--        gtag('config', 'UA-13212406-1', {'send_page_view': false});--}}
{{--    }--}}
{{--</script>--}}
<!-- Start Insider Javascript -->
<script async src="{{asset('/digikala/js/ins74e8.js')}}"></script>
<!-- End Insider Javascript -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msvalidate.01" content="15B2F9DC1A9D64AEB0134F21A3D8A683"/>

<link rel="shortcut icon"
      href="{{asset('/digikala/static/files/283b32ca.ico')}}" type="image/icon">

<meta name="fontiran.com:license" content="THJBT"/>
<meta name="robots" content="index, follow"/>

<link rel="canonical" href="/"/>


<link rel="apple-touch-icon" sizes="57x57" href="{{asset('/digikala/iphone-pwa-icon-57.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/digikala/iphone-pwa-icon-114.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('/digikala/iphone-pwa-icon-144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('/digikala/iphone-pwa-icon-152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/digikala/iphone-pwa-icon-180.png')}}">
<link rel="icon" type="image/png" sizes="192x192" href="{{asset('/digikala/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/digikala/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('/digikala/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/digikala/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('/digikala/manifestffaf.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{asset('/digikala/ms-icon-144x144.png')}}">
<meta name="theme-color" content="#fb3449">
<meta name="msapplication-navbutton-color" content="#fb3449">
<meta name="apple-mobile-web-app-status-bar-style" content="#fb3449">
{{--<script>--}}
{{--    try {--}}
{{--        var _ajax = $.ajax;--}}
{{--        if (_ajax) {--}}
{{--            $.ajax = function () {--}}
{{--                if (arguments && arguments[0] && arguments[0].url && /mal{1,2}tina/gi.test(arguments[0].url)) {--}}
{{--                    return;--}}
{{--                }--}}
{{--                return _ajax.apply($, arguments);--}}
{{--            };--}}
{{--        }--}}
{{--    } catch (e) {--}}
{{--    }--}}
{{--</script>--}}
{{--<link rel="stylesheet" href="{{asset('/new-digikala/e5a06f44.css')}}">--}}
<link rel="stylesheet" href="{{asset('/new-digikala/e5a06f44.css')}}">
<meta name="apple-itunes-app" content="app-id=1016290651, affiliate-data=myAffiliateData, app-argument=myURL"/>
<meta name="description"
      content="هر آنچه که نیاز دارید با بهترین قیمت از دیجی‌کالا بخرید! جدیدترین انواع گوشی موبایل، لپ تاپ، لباس، لوازم آرایشی و بهداشتی، کتاب، لوازم خانگی، خودرو و... با امکان تعویض و مرجوعی آسان | ✓ارسال رايگان ✓پرداخت در محل ✓ضمانت بازگشت کالا - برای خرید کلیک کنید!"/>
<meta name="keywords"
      content="فروشگاه اینترنتی, خرید آنلاین، موبایل, تبلت, لپ تاپ, تلویزیون, کامپیوتر, دوربین, کتاب,لوازم خانگی, عطر و ادکلن, فروش اینترنتی، دیجی‌کالا، دیجی‌کالا"/>
{{--<link rel="stylesheet" href="{{asset('/new-digikala/8ba74341.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('/new-digikala/5393898d.css')}}">--}}
<link rel="stylesheet"
      href="{{asset('/digikala/static/merged/996b0245.css')}}"/>
<link rel="stylesheet"
      href="{{asset('/digikala/static/merged/aee78a28.css')}}" media="screen and (max-height: 1184px)"/>
<link rel="stylesheet"
      href="{{asset('/digikala/static/merged/7db661d6.css')}}" media="screen and (max-width: 1365px)"/>
<link rel="stylesheet"
      href="{{asset('/digikala/static/merged/ef7951b2.css')}}" media="screen and (min-width: 1025px)"/>
<link rel="stylesheet"
      href="{{asset('/digikala/static/merged/9e335ca6.css')}}" media="screen and (min-width: 1366px)"/>
<link rel="stylesheet"
      href="{{asset('/digikala/static/merged/2e2007d6.css')}}" media="screen and (min-width: 1680px)"/>
<link rel="stylesheet" href="{{asset('css/bootstrap-iconpicker.min.css')}}">

<script>
    var supernova_mode = "production";
    var supernova_tracker_url = "/\/\/etrackerd.digikala.com\/tracker\/events\/";
    var isHomePage = true;
    var userId = null;
    var adroRCActivation = true;
    var loginRegisterUrlWithBack = "#\/users\/login-register\/?_back=https:\/\/www.digikala.com\/";
    var isNewCustomer = false;
    var digiclubLuckyDrawEndTime = "2021-03-15 15:00:54";
    var activateUrl = "\/digiclub\/activate\/";
    var activateUrl = "\/digiclub\/activate\/";
</script>


<script src="{{asset('/digikala/static/merged/d208ffc7.js')}}"></script>
<script src="{{asset('/digikala/static/merged/9e986686.js')}}"></script>
<script src="{{asset('/digikala/static/merged/222f3f4a.js')}}"></script>
<script src="{{asset('/js/sweetalert.min.js')}}"></script>
<script src="{{asset('/fonts/font.css')}}"></script>


<script src="{{mix('/js/app.js')}}" defer></script>
<script src="{{asset('js/alpine.min.js')}}" defer></script>

<livewire:styles/>
<style>
    @media screen and (-ms-high-contrast: none) {
        .c-shipment-page__to-payment-sticky, .c-checkout__to-shipping-sticky {
            position: relative !important;
        }

        .c-checkout-aside {
            position: relative !important;
        }
    }

    /* all edge versions */
    @supports (-ms-ime-align:auto) {
        .c-shipment-page__to-payment-sticky, .c-checkout__to-shipping-sticky {
            position: relative !important;
        }

        .c-checkout-aside {
            position: relative !important;
        }
    }

    html, body, h1, h2, h3, h4, h5, h6, p, section, td, div, a, button {
        font-family: IRANYekan !important;
    }
</style>
<style>
    .remodal-wrapper .remodal2 {
        display: inline-block;
    }
    .remodal2, [data-remodal-id] {
        display: none;
    }
    .remodal2 {
        position: relative;
        outline: none;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -moz-text-size-adjust: 100%;
        text-size-adjust: 100%;
    }
    .remodal-is-initialized {
        display: inline-block;
    }
    .remodal2 {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 10px;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        color: #2b2e38;
        background: #fff;
    }




    .remodal2, .remodal-wrapper:after {
        vertical-align: middle;
    }
    .remodal2 {
        line-height: 22px;
        max-width: 820px;
    }
    .remodal2 {
        display: none;
    }

    .c-public-fav-list__modal {
        padding: 0 20px;
        max-width: 460px;
        border-radius: 8px;
    }
    .remodal-wrapper .remodal2 {
        max-height: 95vh;
        overflow: auto;
    }
    .o-btn--contained-red-md:active {
        background: #e3122a !important;
        border: 1px solid #e3122a !important;
    }
</style>
