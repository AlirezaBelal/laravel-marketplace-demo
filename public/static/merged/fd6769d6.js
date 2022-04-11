/*[PATH @digikala/supernova-digikala-desktop/static/landings/women-day/js/init.js]*/
womenDay = {
    init: function () {
        this.swiperInit();
        this.formSubmit()
        this.changeCat()
    },

    swiperInit: function () {
        new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 250,
            simulateTouch: true,
            // loopFillGroupWithBlank: false,
            grabCursor: true,
            loop: false,
            // width: 260,
            navigation: {
                nextEl: '.swiper-button-next.swiper-button-next-main',
                prevEl: '.swiper-button-prev.swiper-button-prev-main',
            },
            cubeEffect: {
                slideShadows: false,
            },
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
            },
            preventInteractionOnTransition: true,
            spaceBetween: 0,
            speed: 300,
        });
    },

    formSubmit: function () {
        $(".radio-container input").on("change", function() {
            $(this).parent(".radio-container").addClass("radio-container--active")
            let parent = $(this).parents(".question")
            let number = parent.attr("data-qNum");
            if( number != 6 ){
                setTimeout(()=> {
                    parent.hide()
                    parent.next().fadeIn(500)
                    $(".form-pagination-bullet").removeClass("form-pagination-bullet--active")

                    $(".form-pagination-bullet").eq(number).addClass("form-pagination-bullet--active")
                }, 600)
            } else {
                var formData = $('.form').serializeArray();
                Services.ajaxPOSTRequestJSON("/ajax/landings/women-day/", formData, function (result) {
                    $("#result").text(result.text)
                    $(".offer-link").attr("href",result.url)
                    $(".form").hide()
                    $(".form-result").fadeIn(500)
                }, function (e) {
                    bonyadAlavi.hideLoader()
                },
                    false,
                    true);
            }
        })
    },

    changeCat: function () {
        $(".catItem-card").on("click", function() {
            $(".catItem-card").removeClass("active");
            $(this).addClass("active")
            var catId = $(this).attr("data-catId")
            var url = `/ajax/landings/women-day/products/${catId}/`
            Services.ajaxPOSTRequestHTML(url, {}, function (result) {
                $("#list-top-container").html(result)
            },
            false,
            true);
        })
    },
};

$(function () {
    womenDay.init();
});