@section('title')
    {{$product->name}}
@endsection
@section('topcss')
    <style class="vjs-styles-defaults">
        .video-js {
            width: 300px;
            height: 150px;
        }

        .vjs-fluid {
            padding-top: 56.25%
        }
    </style>
    <style class="vjs-styles-dimensions">
        .pdp-video-container-dimensions {
            width: 300px;
            height: 300px;
        }

        .pdp-video-container-dimensions.vjs-fluid {
            padding-top: 100%;
        }
    </style>
@endsection
@section('newcss')
    <link rel="stylesheet" href="{{asset('digikalanew/67c706bd.css')}}">
@endsection
@section('newjs')
    <script src="{{asset('digikalanew/jwplayer.js')}}"></script>
    <script src="{{asset('digikalanew/jwpsrv.js')}}"></script>
    <script src="{{asset('digikalanew/jwplayer.core.controls.js')}}"></script>
    <script src="{{asset('digikalanew/jwplayer.core.controls.html5.js')}}"></script>
    <script src="{{asset('digikalanew/provider.hlsjs.js')}}"></script>
    <script src="{{asset('digikalanew/video-js.min.js')}}"></script>
    <script src="{{asset('digikalanew/video-js/videojs-contrib-quality-levels.min.js')}}"></script>
    <script src="{{asset('digikalanew/video-js/videojs-hls-quality-selector.min.js')}}"></script>
    <script src="{{asset('digikalanew/7808523d.js')}}"></script>
@endsection
@section('bottomjs')
    <div style="display: none; visibility: hidden;">
        <script type="text/javascript" src="//cdn-3.convertexperiments.com/js/10004913-10005940.js" async="null"
                defer="defer"></script>
    </div>
    <script type="text/javascript" id="">window.ga && (ga("create", "UA-13212406-1"), ga("require", "ec"));</script>
    <script type="text/javascript"
            id="">window.matchMedia("(display-mode: standalone)").matches ? (window.dataLayer = window.dataLayer || [], window.dataLayer.push({pwa: "true"})) : (window.dataLayer = window.dataLayer || [], window.dataLayer.push({pwa: "false"}));</script>

    <div class="zoomContainer"
         style="transform: translateZ(0px); position: absolute; left: 930.703px; top: 204.688px; height: 248.188px; width: 248.188px;">
        <div class="zoomLens"
             style="background-position: 0px 0px; float: right; display: none; overflow: hidden; z-index: 999; transform: translateZ(0px); opacity: 0.4; zoom: 1; width: 168.006px; height: 143.55px; background-color: rgba(239, 57, 78, 0.1); cursor: crosshair; border: 2.5px solid rgb(239, 86, 97); background-repeat: no-repeat; position: absolute; left: 172.266px; top: 0px;">
            &nbsp;
        </div>
    </div>
    <div class="zoomWindowContainer" style="width: 632px;">
        <div
            style="overflow: hidden; background-position: -648px 0px; text-align: center; background-color: rgb(255, 255, 255); width: 632px; height: 540px; float: left; background-size: 1280px 1280px; display: none; z-index: 100;
                border: 0px solid rgb(136, 136, 136); background-repeat: no-repeat; position: absolute;
                background-image: url(/storage/{{$product->img}}); top: 226.828px; left: 24px;"
            class="zoomWindow">&nbsp;
        </div>
    </div>
    <script>
        initUniversalGallery: function () {
            var $modal = $('.c-remodal-gallery');
            var tabs = $('.js-gallery-tab');
            var tabContents = $('.js-gallery-tab-content');
            var imageThumbs = $('.js-image-thumb');
            var images = $('.js-gallery-main-img');
            var activeCommentContent, comments;
            var levelOneContent = $('.js-level-one-gallery');
            var levelTwoContent = $('.js-level-two-gallery');
            var modalGalleryMain;
            var thiz = this;
            var videoIndex = 1;
            var videoInstances = [];
            var commentsContent = $('#gallery-content-2');
            var commentsTab = $('.js-gallery-tab[data-id="2"]');
            var hasData = false;
            var modalGallery;
            var commentVideoIndex = 1;
            var commentVideoInstances = [];
            var officialThumbs = $('.js-official-thumbs');
            var officialContent = $('#gallery-content-1');
            var answersSection = $('.js-answers');

            function initGallerySwiper() {
                modalGallery = activeCommentContent.find('.js-comment-gallery');
                modalGalleryMain = new Swiper(modalGallery, {
                    init: false,
                    effect: 'fade',
                    slidesPerView: 1,
                    on: {
                        init: function () {
                            //initCommentVideos();
                        },
                    }
                });
                modalGalleryMain.init();
            }

            function stopGalleryVideos() {
                if(isModuleActive('video_js')) {
                    if(videoInstances && typeof videoInstances.pause === 'function') {
                        videoInstances.pause();
                    }
                } else {
                    $.each(videoInstances, function (key, val) {
                        jwplayer(val).stop();
                    });
                }
            }

            function stopCommentVideos() {
                $.each(commentVideoInstances, function (key, val) {
                    if(isModuleActive('video_js')) {
                        if(typeof val.pause === 'function'){
                            val.pause();
                        }
                    } else {
                        jwplayer(val).stop();
                    }
                });
            }

            $(document).on('click', '.js-gallery-main-img', function (e) {
                $(this).toggleClass('is-zoom');
                var img = $(this).children('img');
                img.css('right', 'unset');
                img.css('bottom', 'unset');
                if($(this).hasClass('is-zoom')) {
                    var eve = $.Event('mousemove');
                    eve.pageX = e.pageX;
                    eve.pageY = e.pageY;
                    $(this).trigger(eve);
                }
            });

            $(document).on('mousemove', '.js-gallery-main-img.is-zoom', function (e) {
                var mouseX = e.pageX;
                var mouseY = e.pageY;
                var boxPosition = $(this).offset();
                var img = $(this).children('img');
                var containerX = $(this).width();
                var containerY = $(this).height();
                var xRatio = (((mouseX - boxPosition.left) / containerX) - 0.5) * 1;
                var yRatio = (((mouseY - boxPosition.top) / containerY) - 0.5) * 1;
                img.css('right', xRatio * containerX);
                img.css('bottom', yRatio * containerY);
            });

            $(document).on('mouseleave', '.js-gallery-main-img.is-zoom', function (e) {
                var mouseX = e.pageX;
                var mouseY = e.pageY;
                var boxPosition = $(this).offset();
                var containerX = $(this).width();
                var containerY = $(this).height();
                var img = $(this).children('img');
                if(mouseX < boxPosition.left) {
                    img.css('right', ((-0.5) * containerX));
                } else if(mouseX > (boxPosition.left + containerX)) {
                    img.css('right', (0.5 * containerX));
                } else if(mouseY < boxPosition.top) {
                    img.css('bottom', ((-0.5) * containerY));
                } else if(mouseY > (boxPosition.top + containerY)) {
                    img.css('bottom', (0.5 * containerY));
                }
            });

            $(document).on('click', '.js-gallery-tab', function() {
                tabs.removeClass('c-remodal-gallery__tab--selected');
                $(this).addClass('c-remodal-gallery__tab--selected');
                tabContents.removeClass('is-active');
                $('#gallery-content-' + $(this).data('id')).addClass('is-active');

                stopGalleryVideos();
                stopCommentVideos();
            });

            $(document).on('click', '.js-comment-see-more-imgs', function() {
                if(hasData) {
                    $modal.remodal().open();
                    levelOneContent.addClass('is-open');
                    $('.js-see-more-imgs').click();
                } else {
                    getCommentsData($(this));
                }
            });

            $(document).on('click', '.js-see-more-imgs', function () {
                tabs.removeClass('c-remodal-gallery__tab--selected');
                commentsTab.addClass('c-remodal-gallery__tab--selected');
                tabContents.removeClass('is-active');
                commentsContent.addClass('is-active');

                stopGalleryVideos();
            });

            imageThumbs.on('click', function() {
                var $this = $(this);

                if ($this.hasClass('is-3dimage')) {
                    imageThumbs.removeClass('c-remodal-gallery__thumb--selected');
                    $this.addClass('c-remodal-gallery__thumb--selected');
                    images.removeClass('is-active');
                    $('.js-3d-content').addClass('is-active');
                    thiz.init3DImage();
                } else if($this.hasClass('is-video')) {
                    imageThumbs.removeClass('c-remodal-gallery__thumb--selected');
                    $this.addClass('c-remodal-gallery__thumb--selected');
                    images.removeClass('is-active');

                    if(isModuleActive('video_js')) {
                        $('.js-video-container').addClass('is-active');
                        if(videoInstances) {
                            videoInstances.src({
                                src: $this.data('video-src'),
                                type: "application/x-mpegURL",
                            });

                            videoInstances.poster($this.data('video-cover'));

                            if(typeof videoInstances.hlsQualitySelector === 'function') {
                                try {
                                    videoInstances.hlsQualitySelector({
                                        displayCurrentQuality: true,
                                    });
                                } catch (e) {
                                }
                            }
                        }
                    } else {
                        $('.js-video-container-' + $this.data('id')).addClass('is-active');
                    }
                } else {
                    imageThumbs.removeClass('c-remodal-gallery__thumb--selected');
                    $this.addClass('c-remodal-gallery__thumb--selected');
                    images.removeClass('is-active');
                    $('.js-img-main-' + $this.data('order')).addClass('is-active');
                }

                stopGalleryVideos();
            });

            $('.js-gallery-3d').on('click', function () {
                $('.js-image-thumb.is-3dimage').click();
                levelTwoContent.removeClass('is-open');
                if(isModuleActive('new_question_gallery'))
                    answersSection.removeClass('is-open')
                levelOneContent.addClass('is-open');
                $modal.remodal().open();
                if(!hasData)
                    getCommentsData($(this), true);
            });

            $('.js-gallery-video').on('click', function () {
                $('.js-image-thumb.is-video').first().click();
                levelTwoContent.removeClass('is-open');
                if(isModuleActive('new_question_gallery'))
                    answersSection.removeClass('is-open')
                levelOneContent.addClass('is-open');
                $modal.remodal().open();
                if(!hasData)
                    getCommentsData($(this), true);
            });

            $('.js-product-thumb-img').on('click', function() {
                $(imageThumbs[parseInt($(this).data('slide-index')) - 1]).click();
                $('.js-gallery-tab[data-id=1]').click();
                levelTwoContent.removeClass('is-open');
                if(isModuleActive('new_question_gallery'))
                    answersSection.removeClass('is-open')
                levelOneContent.addClass('is-open');
                $modal.remodal().open();
                if(!hasData)
                    getCommentsData($(this), true);
            });

            $(document).on('click', '.js-uploaded-thumbnail', function() {
                if(hasData) {
                    levelOneContent.removeClass('is-open');
                    if(isModuleActive('new_question_gallery'))
                        answersSection.removeClass('is-open')
                    levelTwoContent.addClass('is-open');
                    comments.removeClass('is-active');
                    $('#comment-content-' + $(this).data('comment-id')).addClass('is-active');
                    activeCommentContent = $('.js-comment-content.is-active');
                    $modal.remodal().open();
                    initGallerySwiper();
                    changeSlide($(this).data('index'));
                } else {
                    getCommentsData($(this));
                }
            });

            $(document).on('click', '.js-comment-thumbnail', function() {
                levelOneContent.removeClass('is-open');
                if(isModuleActive('new_question_gallery'))
                    answersSection.removeClass('is-open')
                levelTwoContent.addClass('is-open');
                comments.removeClass('is-active');
                $('#comment-content-' + $(this).data('comment-id')).addClass('is-active');
                activeCommentContent = $('.js-comment-content.is-active');
                initGallerySwiper();
                changeSlide($(this).data('index'));
            });

            $(document).on('click', '.js-back-comment', function () {
                levelOneContent.addClass('is-open');
                levelTwoContent.removeClass('is-open');
                if(isModuleActive('new_question_gallery'))
                    answersSection.removeClass('is-open')
                tabs.removeClass('c-remodal-gallery__tab--selected');
                commentsTab.addClass('c-remodal-gallery__tab--selected');
                tabContents.removeClass('is-active');
                commentsContent.addClass('is-active');
                comments.removeClass('is-active');

                stopCommentVideos();
            });

            function getCommentsData(element, noOpen) {
                Services.ajaxPOSTRequestHTML(
                    '/ajax/product/comments/' + productId + '/user-files/',
                    null,
                    function (response) {
                        $('.js-comments-with-thumbnails').html(response.data.commentsThumbnails);
                        $('.js-comments').html(response.data.commentsWithFiles);
                        $('.js-comments-files-thumbnails-summary').html(response.data.commentsFilesThumbnailsSummary);
                        $('.js-top-bar-tabs').html(response.data.commentsTopBarTab);
                        tabs = $('.js-gallery-tab');
                        commentsTab = $('.js-gallery-tab[data-id="2"]');
                        levelTwoContent = $('.js-level-two-gallery');
                        comments = $('.js-comment-content');
                        initCommentVideos();
                        activeCommentContent = $('.js-comment-content.is-active');
                        hasData = true;
                        thiz.initLikeComment();
                        if(!noOpen) {
                            $modal.remodal().open();
                            element.click();
                        }
                    },
                    null,
                    false,
                    false
                );
            }

            function changeSlide(index) {
                var thumbnails = modalGallery.find('.js-gallery-comment-thumbnail');
                thumbnails.removeClass('is-active');
                thumbnails.eq(index).addClass('is-active');
                modalGalleryMain.slideTo(index);
                if (modalGalleryMain.slides.eq(index).hasClass('is-3dimage')) {
                    thiz.init3DImage();
                }

                stopGalleryVideos();
                stopCommentVideos();
            }

            $(document).on('click', '.js-comment-swiper-next', function () {
                if(modalGalleryMain.activeIndex === (modalGalleryMain.slides.length - 1)) {
                    if(activeCommentContent.next('.js-comment-content').length > 0) {
                        activeCommentContent.removeClass('is-active');
                        activeCommentContent = activeCommentContent.next();
                        activeCommentContent.addClass('is-active');
                        initGallerySwiper();
                        changeSlide(0);
                    }
                } else {
                    changeSlide(modalGalleryMain.activeIndex + 1);
                }
            });

            $(document).on('click', '.js-comment-swiper-prev', function () {
                if(modalGalleryMain.activeIndex === 0) {
                    if(activeCommentContent.prev('.js-comment-content').length > 0) {
                        activeCommentContent.removeClass('is-active');
                        activeCommentContent = activeCommentContent.prev();
                        activeCommentContent.addClass('is-active');
                        initGallerySwiper();
                        changeSlide(modalGalleryMain.slides.length - 1);
                    }
                } else {
                    changeSlide(modalGalleryMain.activeIndex - 1);
                }
            });

            $(document).on('keydown', function (e) {
                if (!comments) {
                    return;
                }


                if (!$modal.hasClass('remodal-is-opened')) {

                } else if (e.keyCode === 37) { //left
                    if(comments.hasClass('is-active')) {
                        activeCommentContent.find('.js-comment-swiper-next').click();
                    } else if(officialContent.hasClass('is-active')) {
                        officialThumbs.find('.js-image-thumb.c-remodal-gallery__thumb--selected').next().click();
                    }
                } else if (e.keyCode === 39) { //right
                    if(comments.hasClass('is-active')) {
                        activeCommentContent.find('.js-comment-swiper-prev').click();
                    } else if(officialContent.hasClass('is-active')){
                        officialThumbs.find('.js-image-thumb.c-remodal-gallery__thumb--selected').prev().click();
                    }
                } else if (e.keyCode === 38) { //top
                    if(officialContent.hasClass('is-active')){
                        var prev = officialThumbs.find('.js-image-thumb.c-remodal-gallery__thumb--selected').prevAll()[3];
                        if (prev) {
                            prev.click();
                        }
                    }
                } else if (e.keyCode === 40) { //down
                    if(officialContent.hasClass('is-active')){
                        var next = officialThumbs.find('.js-image-thumb.c-remodal-gallery__thumb--selected').nextAll()[3];
                        if (next) {
                            next.click();
                        }
                    }
                }
            });

            $(document).on('click', '.js-gallery-comment-thumbnail', function () {
                changeSlide($(this).index());
            });

            if (videos && Object.keys(videos).length){
                if(isModuleActive('video_js')) {
                    var options = {
                        fluid: true,
                        controls: true,
                        autoplay: false,
                        preload: "none",
                        aspectRatio: '1:1'
                    };

                    videoInstances = videojs('pdp-video-container', options);
                } else {
                    jwplayer.key = 'xvL6N99kDeQc/zbwOjepmCxMmno93aNtiEVgXrACbgI=';

                    $.each(videos, function (key, val) {
                        var playerInstance = jwplayer('product-video-' + videoIndex);
                        videoInstances.push('product-video-' + videoIndex);
                        playerInstance && playerInstance.setup && playerInstance.setup({
                            id: 'product-video-' + videoIndex,
                            width: '640',
                            height: '360',
                            onResize: function (e) {
                                console.log("Shot", e);
                            },
                            playlist: [{
                                image: val.cover_big,
                                sources: val.sources
                            }]
                        });
                        playerInstance && playerInstance.on && playerInstance.on('resize', function () {
                            setTimeout(function () {
                                var e = new Event('resize');
                                window.dispatchEvent(e);
                            }, 150);
                        });
                        videoIndex++;
                    });
                }
            }

            $(document).on('closed', $modal, function () {
                stopGalleryVideos();
                stopCommentVideos();
            });

            function initCommentVideos() {
                commentVideoIndex = 1;
                commentVideoInstances = [];
                var commentVideos = comments.find('.js-gallery-comment-thumbnail.is-video');
                if (commentVideos && Object.keys(commentVideos).length) {
                    if(isModuleActive('video_js')) {
                        var consistPlayer = videojs.getAllPlayers();

                        if(consistPlayer.length) {
                            $.each(consistPlayer, function (key, val) {
                                if (val.id_.indexOf('comment-video-js-') === 0) {
                                    val.dispose();
                                }
                            });
                        }

                        $.each(commentVideos, function (key, val) {
                            var commentId = $(this).data('comment-id');

                            var options = {
                                fluid: true,
                                controls: true,
                                autoplay: false,
                                preload: "none",
                                aspectRatio: '1:1'
                            };

                            var newPlayer = videojs('comment-video-js-' + commentId + '-' + $(val).data('video-index'), options);

                            newPlayer.on("play", function () {
                                try {
                                    ga('set', 'nonInteraction', true);
                                    ga('send', 'event', {
                                        eventCategory: 'product_page',
                                        eventAction:'Playing Video in Comments',
                                        eventLabel: window.productId,
                                    });
                                } catch (e) {
                                }
                            });

                            commentVideoInstances.push(newPlayer);
                        });
                    } else {
                        $.each(commentVideos, function (key, val) {
                            var commentId = $(this).data('comment-id');
                            var playerInstance = jwplayer('comment-video-' + commentId + '-' + (key + 1));
                            commentVideoInstances.push('comment-video-' + commentId + '-' + (key + 1));
                            playerInstance && playerInstance.setup && playerInstance.setup({
                                id: 'comment-video-' + commentId + '-' + (key + 1),
                                width: '640',
                                height: '360',
                                onResize: function (e) {
                                    console.log("Shot", e);
                                },
                                file: $(this).data('url'),
                            });
                            playerInstance && playerInstance.on && playerInstance.on('resize', function () {
                                setTimeout(function () {
                                    var e = new Event('resize');
                                    window.dispatchEvent(e);
                                }, 150);
                            });
                            // commentVideoIndex++;
                        });
                    }
                }
            }

            if (isModuleActive('new_question_gallery')) {
                $(document).on('click', '.js-question-file', function () {
                    levelOneContent.removeClass('is-open');
                    levelTwoContent.removeClass('is-open');
                    $('.js-comment-content').removeClass('is-active');
                    $('#answer-content-' + $(this).data('answer-id')).addClass('is-active');
                    activeCommentContent = $('.js-comment-content.is-active');
                    answersSection.addClass('is-open');
                    $modal.remodal().open();
                    initGallerySwiper();
                });
            }

        },
    </script>
@endsection
