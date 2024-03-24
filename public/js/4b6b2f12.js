/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/productController/AddCommentAction.js]*/
var AddCommentAction = {
    init: function () {
        this.initForm();
        this.initSliders();
        this.initTextField();

        if (isModuleActive('dk_set_pdp_ga')) {
            this.setSubmitCommentGA();
        }

        if (isModuleActive('comments_file')) {
            this.initFilesUpload();
        }
    },

    setSubmitCommentGA: function(){
      $('.js-comment-submit-button').on('click' , function () {
            var productId = $(this).data('id');
            try {
                ga('set', 'nonInteraction', true);
                ga('send', 'event', {
                    eventCategory: 'product_page',
                    eventAction: 'Comment Submit',
                    eventLabel: productId
                });
            } catch (e) {
                console.error('GA Error: Submit Comment');
            }
      })
    },

    initFilesUpload: function () {
        var VIDEO_COUNT_LIMIT;
        if(isModuleActive('increase_comment_video_limit_count')) {
            VIDEO_COUNT_LIMIT = 3;
        } else {
            VIDEO_COUNT_LIMIT = 1;
        }

        var fileInput = $('.js-upload-btn');
        var thumbnailContainer = $('.js-thumbnails');
        var ajaxes = [];
        var container = $('.js-new-file-btn');
        var videoCount = thumbnailContainer.children('.is-video').length;
        var imageComplete = false;
        var videoMaxSize = 314572800; //300MB
        var imageMaxSize = 5242880; //5MB
        var acceptanceImages = 'image/png,image/jpeg,';
        var acceptanceVideos = 'video/mp4, .mov, video/x-msvideo, video/mpeg, video/x-ms-wmv, .m4v, .avi, .wmv, .3gp,';

        if (isModuleActive('vod')) {
            acceptanceVideos = 'video/mp4, .m4v, .avi,';
        }

        fileInput.on('change', function () {
            var file = this.files[0];
            $(this).val('');
            var imageRegEx = new RegExp('image\/(jpeg|png)');
            var videoRegEx = new RegExp('video\/(mp4|quicktime|x-msvideo|x-ms-wmv|mpeg|avi|3gpp)');

            if (isModuleActive('vod')) {
                videoRegEx = new RegExp('video\/(mp4|avi)');
            }

            removeFileError();
            if (imageRegEx.test(file.type)) {
                if (file.size < imageMaxSize) {
                    var quantity = thumbnailContainer.children('.js-thumbnail:not(.is-video)').length;
                    if (quantity < 5) {
                        sendFile(file, 'image');
                        if (quantity === 4) {
                            imageComplete = true;
                            changeAddFileStatus();
                        }
                    }
                    else {
                        showFileError(file, 'مجاز به بارگذاری حداکثر پنج عکس می‌باشید');
                    }
                } else {
                    showFileError(file, 'حجم عکس نباید بیش از ۱ مگا بایت باشد');
                }
            }
            else if (videoRegEx.test(file.type)) {
                if (file.size < videoMaxSize) {
                    if (videoCount < VIDEO_COUNT_LIMIT) {
                        videoCount += 1;
                        sendFile(file, 'file');
                        changeAddFileStatus();
                    } else {
                        showFileError(file, 'مجاز به بارگذاری حداکثر یک ویديو می‌باشید');
                    }
                } else {
                    showFileError(file, 'حجم ویدیو نباید بیش از ۳۰۰ مگا بایت باشد');
                }
            }
            else {
                showFileError(file, 'فرمت فایل معتبر نمی‌باشد');
            }

            function showFileError(file, error) {
                container.addClass('has-error');
                container.append('<span class="error c-ui-feedback-hint">' + error + '</span>');
            }

            function removeFileError() {
                container.removeClass('has-error');
                container.children('.error').remove();
            }
        });

        function showImage(file, thumb) {
            var reader = new FileReader();

            reader.onload = function (e) {
                thumb.find('img').attr('src', e.target.result);
                thumb.find('img').show();
            };

            reader.readAsDataURL(file);
        }

        function sendFile(file, label) {
            var formData = new FormData();
            var thumbnail;

            function progress(e, dom){
                if(e.lengthComputable){
                    var max = e.total;
                    var current = e.loaded;

                    var Percentage = (current * 100)/max;
                    if(Percentage < 98) {
                        dom.children('.js-upload-progress').html(Services.convertToFaDigit(Math.round(Percentage)) + '٪');
                    } else {
                        dom.children('.js-upload-progress').html(Services.convertToFaDigit(98) + '٪');
                    }

                    if(Percentage >= 100) {

                    }
                }
            };

            function deleteByNetwork() {
                if (thumbnail.hasClass('is-video')) {
                    if (videoCount > 0) {
                        videoCount -= 1;
                    }
                } else {
                    imageComplete = false;
                }
                changeAddFileStatus();
                thumbnail.remove();
                var index = thumbnailContainer.children('.js-thumbnail:not(.is-uploaded)').index(thumbnail);
                ajaxes.splice(index, 1);
            }

            formData.append('file', file);
            var xhr = $.ajax({
                type:'POST',
                url: '/ajax/comments/tmp-files/',
                data:formData,
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress', function (e) { progress(e, thumbnail) }, false);
                    }
                    return myXhr;
                },
                cache:false,
                contentType: false,
                processData: false,

                beforeSend: function () {
                    thumbnailContainer.append('<div class="c-form-comment__thumbnail js-thumbnail in-progress ' + (label === 'file' ? 'is-video' : '') + '">\n' +
                        (label === 'file' ? '' : '<img src=""/>\n') +
                        '                                                    <div class="c-form-comment__thumbnail-cancel js-upload-cancel"></div>\n' +
                        '                                                    <div class="c-form-comment__thumbnail-progress js-upload-progress"></div>\n' +
                        '                                                    <div class="c-form-comment__thumbnail-progress-overlay"></div>\n' +
                        '                                                </div>');
                    thumbnail = thumbnailContainer.children('.js-thumbnail').last();
                    if (label !== 'file')
                        showImage(file, thumbnail);
                },

                success:function(response){
                    if(response.status) {
                        thumbnail.append('<input type="hidden" name="comment[files][' + (thumbnail.prevAll('.js-thumbnail').length + ']" ') + 'value =' + response.data.id + '>');
                        /*var index = thumbnail.index() - 1;
                        ajaxes.splice(index, 1);*/
                        thumbnail.removeClass('in-progress');
                        thumbnail.children('.js-upload-cancel').remove();
                        thumbnail.append('<div class="c-form-comment__thumbnail-remove js-upload-remove">حذف</div>');
                    } else {
                        if(response.data.errors)
                            window.DKToast(response.data.errors);
                        deleteByNetwork();
                    }
                },

                error: function(response){
                    deleteByNetwork();
                }
            });
            ajaxes.push(xhr);
        };

        $(document).on('click', '.js-upload-cancel', function () {
            var container = $(this).closest('.js-thumbnail');
            var index = thumbnailContainer.children('.js-thumbnail:not(.is-uploaded)').index(container);
            ajaxes[index].abort();
            ajaxes.splice(index, 1);
            changeAddFileStatus();
            container.remove();
        });

        $(document).on('click', '.js-upload-remove', function () {
            var container = $(this).closest('.js-thumbnail');
            if (container.hasClass('is-video')) {
                if (videoCount > 0) {
                    videoCount -= 1;
                }
            } else {
                imageComplete = false;
            }
            changeAddFileStatus();
            container.remove();
        });

        function changeAddFileStatus() {
            if (videoCount === VIDEO_COUNT_LIMIT) {
                if (imageComplete) {
                    container.hide();
                } else {
                    if (container.is(':hidden')) {
                        container.show();
                    }
                    container.find('input[type="file"]').attr('accept', acceptanceImages);
                }
            } else {
                if (container.is(':hidden')) {
                    container.show();
                }
                if (imageComplete) {
                    container.find('input[type="file"]').attr('accept', acceptanceVideos);
                }
                else {
                    container.find('input[type="file"]').attr('accept', (acceptanceImages + acceptanceVideos));
                }
            }
        }
    },
    
    escapeHtml: function (text) {
        return text.replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
    },

    initTextField: function () {
        var inputs = $('#advantage-input, #disadvantage-input');
        var inputChangeCallback = function () {
            var self = $(this);
            if (self.val().trim().length > 0) {
                self.siblings('.js-icon-form-add').show();
            } else {
                self.siblings('.js-icon-form-add').hide();
            }
        } ;
        inputs.each(function () {
           inputChangeCallback.bind(this)();
           $(this).on('change keyup', inputChangeCallback.bind(this));
        });
        $("#advantages").delegate(".js-icon-form-add", 'click', function (e) {

            var parent = $('.js-advantages-list');
            if (parent.find(".js-advantage-item").length >= 5) {
                return;
            }

            var advantageInput = $('#advantage-input');

            if (advantageInput.val().trim().length > 0) {
                parent.append('<div class="c-ui-dynamic-label c-ui-dynamic-label--positive js-advantage-item">\n' +
                    AddCommentAction.escapeHtml(advantageInput.val()) +
                    '<button type="button" class="c-ui-dynamic-label__remove js-icon-form-remove"></button>\n' +
                    '<input type="hidden" name="comment[advantages][]" value="' + AddCommentAction.escapeHtml(advantageInput.val()) + '">\n' +
                    '</div>');

                advantageInput.val('').change();
                advantageInput.focus();
            }

        }).delegate(".js-icon-form-remove", 'click', function (e) {
            $(this).parent('.js-advantage-item').remove();
        });

        $("#disadvantages").delegate(".js-icon-form-add", 'click', function (e) {

            var parent = $('.js-disadvantages-list');
            if (parent.find(".js-disadvantage-item").length >= 5) {
                return;
            }

            var disadvantageInput = $('#disadvantage-input');

            if (disadvantageInput.val().trim().length > 0) {
                parent.append('<div class="c-ui-dynamic-label c-ui-dynamic-label--negative js-disadvantage-item">\n' +
                    AddCommentAction.escapeHtml(disadvantageInput.val()) +
                    '<button type="button" class="c-ui-dynamic-label__remove js-icon-form-remove"></button>\n' +
                    '<input type="hidden" name="comment[disadvantages][]" value="' + AddCommentAction.escapeHtml(disadvantageInput.val()) + '">\n' +
                    '</div>');

                disadvantageInput.val('').change();
                disadvantageInput.focus();
            }

        }).delegate(".js-icon-form-remove", 'click', function (e) {
            $(this).parent('.js-disadvantage-item').remove();
        });

    },

    initForm: function () {
        var $addCommentForm = $('#addCommentForm');
        var $this = this;
        var $textarea = $('.js-comment');

        $addCommentForm.on('submit', function (e) {
            e.preventDefault();

            if (!$addCommentForm.valid()) {
                return false;
            }

            $('.js-comment-submit-button').addClass('is-inactive');

            if (isModuleActive('comments_file')) {
                var formData = new FormData(this);

                $.ajax({
                    url: '/ajax/product/comments/add/' + productId + '/',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        Framework.showLoader();
                    },
                    success: function (response) {
                        if (response.status) {
                            $('.js-comment-submit-button').removeClass('is-inactive');
                            $this.initSuccessModal();
                        } else {
                            $('.js-comment-submit-button').removeClass('is-inactive');
                            $textarea.addClass('has-error');
                            $textarea.append('<div class = "c-ui-feedback-hint" >'+ response.data.errors +'</div>');
                        }
                    },
                    error: function () {
                        $('.js-comment-submit-button').removeClass('is-inactive');
                        $textarea.addClass('has-error');
                        $textarea.append('<div class = "c-ui-feedback-hint" >'+ data.errors +'</div>');
                    },
                    complete: function () {
                        Framework.hideLoader();
                    }
                });
            } else {
                Services.ajaxPOSTRequestJSON(
                    '/ajax/product/comments/add/' + productId + '/',
                    $addCommentForm.serialize(),
                    function () {
                        $('.js-comment-submit-button').removeClass('is-inactive');
                        $this.initSuccessModal();
                    },
                    function (data) {
                        $('.js-comment-submit-button').removeClass('is-inactive');
                        $textarea.addClass('has-error');
                        $textarea.append('<div class = "c-ui-feedback-hint" >' + data.errors + '</div>');
                    },
                    true,
                    true
                );
            }
        });

        $('.js-comment-files').change(function () {
            if ($(this).get(0).files.length === 0) {
                return;
            }

            var $filesContainer = $(this).closest('.js-comment-files-container');
            var $itemsContainer = $filesContainer.find('.js-comment-file-items');
            var items = '';
            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                items += '<span class="c-upload-item">' + $(this).get(0).files[i].name + '</span>';
            }
            $itemsContainer.empty().append(items);

            if ($(this).get(0).files.length > 0) {
                $filesContainer.find('.js-remove-comment-files').removeClass('u-hidden');
            } else {
                $filesContainer.find('.js-remove-comment-files').addClass('u-hidden');
            }
        });

        $('.js-remove-comment-files').click(function () {
            var $filesContainer = $(this).closest('.js-comment-files-container');
            $filesContainer.find('.js-comment-files').val('');
            $(this).addClass('u-hidden');
            $filesContainer.find('.js-comment-file-items').empty();
        });
    },

    initFormValidation: function (rules, errors) {
        var $addCommentForm = $('#addCommentForm');

        if(isModuleActive('remove_title_mandatory')) {
            rules = $.extend({}, {
                'comment[comment]': {
                    required: true,
                    rangelength: [5, 10000]
                },
                'comment[recommend]': {
                    required: true
                }
            }, rules);

            errors = $.extend({}, {
                'comment[comment]': {
                    'required': 'متن وارد نشده است',
                    'rangelength': 'متن نقد و بررسی شما باید بین ۵ تا ۱۰۰۰ کاراکتر باشد'
                },
                'comment[recommend]': {
                    'required': 'لطفا یک گزینه را انتخاب کنید'
                }
            }, errors);
        } else {
            rules = $.extend({}, {
                'comment[comment]': {
                    required: true,
                    rangelength: [5, 10000]
                },
                'comment[title]': {
                    required: true,
                    rangelength: [5, 250]
                },
                'comment[recommend]': {
                    required: true
                }
            }, rules);

            errors = $.extend({}, {
                'comment[comment]': {
                    'required': 'متن وارد نشده است',
                    'rangelength': 'متن نقد و بررسی شما باید بین ۵ تا ۱۰۰۰ کاراکتر باشد'
                },
                'comment[title]': {
                    'required': 'متن وارد نشده است',
                    'rangelength': 'عنوان نقد و بررسی شما باید بین ۵ تا ۲۵۰ کاراکتر باشد'
                },
                'comment[recommend]': {
                    'required': 'لطفا یک گزینه را انتخاب کنید'
                }
            }, errors);
        }

        $addCommentForm.validate({
            errorPlacement: function (error, element) {
                if (element.hasClass('js-rate-input')) {
                    element.closest('.js-valid-row').addClass('has-error');
                    element.closest('.js-valid-row').append(error.addClass('c-ui-feedback-hint c-ui-feedback-hint--right'));
                } else {
                    if (element.parent().is('label')) {
                        error.appendTo(element.parent()).addClass('c-ui-feedback-hint');
                        element.parent().addClass('has-error');
                        element.closest('.js-valid-row').addClass('has-error');

                    } else if (element.parent().hasClass('selectric-hide-select')) {
                        element.parent().parent().addClass('has-error');
                        element.parent().parent().append(error.addClass('c-ui-feedback-hint'));
                    }
                }
            },
            rules: rules,
            messages: errors
        });
    },

    initSliders: function () {
        var start;
        var element;
        var rateRules = {};
        var rateErrors = {};

        for (var i in factors) {
            if (ratings && ratings[i]) {
                start = ratings[i];
            } else if(isModuleActive('required_comment_rate')) {
                start = 0;
            } else {
                start = 60;
            }


            rateRules['comment[rating][' + i + ']'] = {
                required: true,
                digits: true,
                minlength: 2,
                rangelength: [2, 3]
            };

            rateErrors['comment[rating][' + i + ']'] = {
                required: 'امتیاز دهید!',
                digits: '"امتیاز" دهید!',
                minlength: 'امتیاز دهید!',
                rangelength: '"امتیاز" دهید!'
            };

            var $allRates = $('#rating-bar-' + i + ' .js-slider-step');
            var activeRate = $allRates.eq((start / 20));
            activeRate.addClass('active');


            element = document.getElementById('rating-bar-' + i);
            slider = noUiSlider.create(element, {
                direction: 'rtl',
                connect: [true, false],
                start: start,
                step: 20,
                format: wNumb({
                    decimals: 0
                }),
                range: {
                    min: isModuleActive('required_comment_rate') ? 0 : 20,
                    max: 100
                }
            });

            $allRates.on('click', function () {
                var $slider = $(this).parent();
                var slider = $slider.get(0);
                slider.noUiSlider.set($(this).attr('data-rate-value'));
                var rateTitle = $(this).attr('data-rate-title');
                $slider.attr('data-rate-title', rateTitle);
                $slider.attr('data-rate-title-orig', '');
            });

            $allRates.on('mouseenter', function () {
                var $slider = $(this).parent();
                var hoverRateTitle = $(this).attr('data-rate-title');
                var currentRateTitle = $slider.attr('data-rate-title');
                $slider.attr('data-rate-title-orig', currentRateTitle);
                $slider.attr('data-rate-title', hoverRateTitle);
            });

            $allRates.on('mouseleave', function () {
                var $slider = $(this).parent();
                var backupRateTitle = $slider.attr('data-rate-title-orig');
                if (backupRateTitle.length > 0) {
                    $slider.attr('data-rate-title', backupRateTitle);
                    $slider.attr('data-rate-title-orig', '');
                }
            });


            element.noUiSlider.on('update', function (values, handle) {
                var value = values[handle];
                var factorId = $("#" + this.target.id).data('factor-id');
                var currentRatingBar = $('#rating-bar-' + factorId);
                $("#rating-" + factorId).val(value);

                var rateTitles = ['بدون امتیاز', 'خیلی بد', 'بد', 'معمولی', 'خوب', 'عالی'];
                var rateTitle = rateTitles[value / 20];

                var $allRates = currentRatingBar.find('.js-slider-step');

                if(isModuleActive('required_comment_rate')) {
                    var activeRate = $allRates.eq(((value) / 20));
                } else {
                    var activeRate = $allRates.eq(((value - 20) / 20));
                }

                $allRates.removeClass('active');
                activeRate.addClass('active');


                var $error = $('#rating-bar-' + factorId + ' + .c-ui-feedback-hint');
                $error.hide();


                currentRatingBar.attr('data-rate-digit', '(' + value / 20 + ')');
                currentRatingBar.attr('data-rate-title', rateTitle);
                currentRatingBar.find('.js-rating-value').attr('data-rate-value', value + '%');
            });
        }

        this.initFormValidation(rateRules, rateErrors);
    },

    initSuccessModal: function () {
        var remodal = $('[data-remodal-id="add-comment-success-modal"]').remodal();
        remodal.open();

        $(document).on('closed', '[data-remodal-id="add-comment-success-modal"]', function (e) {
            window.location.href = productPageUrl;
        });
    }
};


$(function () {
    AddCommentAction.init();
});