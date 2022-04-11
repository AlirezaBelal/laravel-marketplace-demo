<script>
    //for Notification
    function publish_product() {
        document.getElementById("openNotification").style = "display: block !important; ";
        document.getElementById("openNotification").classList.remove("remodal-is-closed");
        document.getElementById("openNotification").classList.add("remodal-is-opened");
        document.getElementById("openNotification2").classList.remove("remodal-is-closed");
        document.getElementById("openNotification2").classList.add("remodal-is-opened");
    }

    function closemodalNotification() {
        document.getElementById("openNotification").style = "display: none !important; ";
        document.getElementById("openNotification").classList.remove("remodal-is-opened");
        document.getElementById("openNotification").classList.add("remodal-is-closed");
    }
    //for Gift Cart
    function giftCardModals() {
        document.getElementById("opengift").style = "display: block !important; ";
        document.getElementById("opengift").classList.remove("remodal-is-closed");
        document.getElementById("opengift").classList.add("remodal-is-opened");
        document.getElementById("opengift2").classList.remove("remodal-is-closed");
        document.getElementById("opengift2").classList.add("remodal-is-opened");
    }

    function closemodalGift() {
        document.getElementById("opengift").style = "display: none !important; ";
        document.getElementById("opengift").classList.remove("remodal-is-opened");
        document.getElementById("opengift").classList.add("remodal-is-closed");
    }
    function giftTab1() {
        document.getElementById("gifttab2").classList.remove("is-active");
        document.getElementById("gifttab1").classList.add("is-active");
        document.getElementById("gifts-content-1").classList.remove("u-hidden");
        document.getElementById("gifts-content-2").classList.add("u-hidden");
    }
    function giftTab2() {
        document.getElementById("gifttab1").classList.remove("is-active");
        document.getElementById("gifttab2").classList.add("is-active");
        document.getElementById("gifts-content-2").classList.remove("u-hidden");
        document.getElementById("gifts-content-1").classList.add("u-hidden");
    }

</script>
