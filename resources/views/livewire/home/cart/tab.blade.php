<div class="c-checkout__tab">
    <div
        class="c-checkout__tab-pill c-checkout__tab-pill--main-cart js-cart-tab c-checkout__tab-pill--active"
        data-type="main"
        id="tab1add"  onclick="tabid1()">
        سبد خرید
        <span class="c-checkout__tab-counter">
                {{\App\Models\PersianNumber::translate($carts->count())}}
                </span>
    </div>
    <div class="c-checkout__tab-pill c-checkout__tab-pill--sfl js-cart-tab" data-type="sfl"
       id="tab2add"  onclick="tabid2()">
        لیست خرید بعدی
        <span class="c-checkout__tab-counter">
                 {{\App\Models\PersianNumber::translate($cart_others->count())}}
            </span>
    </div>
</div>
<script>
    function tabid1() {
        document.getElementById("tab1add").classList.add("c-checkout__tab-pill--active");
        document.getElementById("tab2add").classList.remove("c-checkout__tab-pill--active");
        document.getElementById("uhd2").classList.add("u-hidden");
        document.getElementById("uhd1").classList.remove("u-hidden");

    }
    function tabid2() {
        document.getElementById("tab1add").classList.remove("c-checkout__tab-pill--active");
        document.getElementById("tab2add").classList.add("c-checkout__tab-pill--active");
        document.getElementById("uhd1").classList.add("u-hidden");
        document.getElementById("uhd2").classList.remove("u-hidden");
    }
</script>
