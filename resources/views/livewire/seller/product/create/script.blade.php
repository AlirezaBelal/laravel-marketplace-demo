@section('script')
    <script type="text/javascript" id="">document.getElementById("categoryStepNext").addEventListener("click",function(){var a=document.getElementById("searchKeyword"),f=document.querySelectorAll(".c-ui-radio"),b=0,c="",d="";console.log("!! searchinput !!",a);f.forEach(function(e,g){var h=e.getAttribute("for");document.getElementById(h).checked&&(b=g,c=e.querySelector(".c-ui-radio__label").innerText,d=a.value)});window.dataLayer=window.dataLayer||[];window.dataLayer.push({event:"CreateNewProduct",cnpkeyword:d,cnpposition:b,cnpcategory:c})},
            !1);
    </script>
    <script async="" src="https://script.hotjar.com/modules.5923ebad1321802c309c.js" charset="utf-8"></script>
    <script src="{{asset('/59638025.js')}}"></script>
    <script src="{{asset('/3a3e8a6d.js')}}"></script>
    <script>
        var supernova_mode = "production";
        var supernova_tracker_url = "";
        var formMode = "new";
        var isContentUser = false;
        var seller_panel_b2b_module = false;
        var showRejectedMessage = 0;
        var rejectedMessage = "";
        var isLoggedSeller = 1;
        var walkthroughSteps = [];
        var showPriceModal = 0;
        var newSeller = 1;
        var is_yalda = 0;
    </script>
@endsection
