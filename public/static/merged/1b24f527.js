/*[PATH @digikala/supernova-digikala-desktop/static/landings/attari/js/init.js]*/
attari = {
    init: function () {
        this.loadPosts();
        this.swiper();
        this.toggleText();
    },
    swiper: function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 2,
            // centeredSlides: true,
            spaceBetween: 20,
            speed: 1500,
            loop: false,
            simulateTouch: true,
            // loopFillGroupWithBlank: false,
            grabCursor: true,
            loop: true,
            // width: 560,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    },
    loadPosts: function () {
        var blogSwiper = new Swiper('.c-landing__mag-post-slider', {
            slidesPerView: 3,
            // centeredSlides: true,
            spaceBetween: 20,
            speed: 1500,
            loop: false,
            simulateTouch: true,
            // loopFillGroupWithBlank: false,
            grabCursor: true,
            // loop: true,
            // width: 900,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        $.ajax({
            url: "https://www.digikala.com/mag/api/theme/v1/posts/?post_tag=dk-attari-landing&size=6",
            success: function (response) {
                response.map(function (post) {
                    $(".js-mag-posts").append(
                        '<a href="'+ post.permalink +'" target="_blank">' +
                            '<div class="c-landing__mag-post swiper-slide" style="margin-left:20px">' +
                            '<div style=" padding: 20px ">'+
                            '                <img src="' + post.thumbnails["big-wide-img"] + '" alt="' + post.title + '">\n' +
                            '                <h5>' + post.title + '</h5>\n' +
                            '                <p>' + post.excerpt + '</p>\n' +
                            '                <div class="c-landing__mag-post-time-ago">\n' +
                            '                </div>\n'+
                            '</div>'+
                            '</div>'+
                        '</a>');
                });
                $(".c-landing__mag-post--loading").hide();
                blogSwiper.reInit;
            },
            error: function (response) {
                // console.log(response);
            },
        });
    },
    toggleText: function () {
        $(".js-see-all-text").on("click", function () {
            $(".js-text").removeClass("c-landing__text--hide");
            $(".js-see-all-text").hide();
        });
    },
}

$(function () {
    attari.init();
});