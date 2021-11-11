<script>
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
</script>
