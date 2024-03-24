/*[PATH @digikala/supernova-digikala-marketplace/assets/local/js/tags.js]*/
/*
* Tags class
* ES5 syntax
*
* @constructor
* @param {string} selector - this is the Dom element selector
* @param {string} position - this defines the position in which the gas will be placed. Possible values are null || 'after'
* @param {object} validation - this defines the valid tags length. Validation param could be null or {}. Possible object params are 'min' and 'max'
*
* TODO: Create Submit() method
* */

function Tags(selector, position, validation) {
    if (!selector) {
        Services.logToConsole('Selector is required');
        return;
    }

    this.selector = selector;
    this.position = position || null;
    this.validation = validation || null;
    this.containerSelector = '';
    this.phrase = '';
    this.htmlSelect = $(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-select');
    this.tagsArray = this.htmlSelect.val() || [];
    if (validation) {
        this.invalidTags = this.htmlSelect.find('option[data-valid="false"]').map(function () {
            return $(this).val();
        });
    }
    this.removeTriggers = [];
    this.eventListeners();
}

/*
* All event listeners
* */
Tags.prototype.eventListeners = function () {
    let that = this;

    if (this.tagsArray.length > 0) {
        this.printTags();
    }

    $(this.selector).on('keypress', function (e) {
        that.submitInputHandler(e);
    });
    $(this.selector).siblings('.js-tag-submit-btn').on('click', function () {
        that.createTag();
    });

    /* Init remove tags listeners */
    let $removeContext = null;
    if (this.position === 'after') {
        $removeContext = $(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-container');
    } else {
        $removeContext = $(this.selector).closest('.js-textarea-tags');
    }
    $removeContext.on('click', '.js-tag-remove', function (e) {
        that.removeTag($(e.target));
    });

    /* Removes 'focus' class from wrapping div */
    $(document).on('click', function () {
        if (!$(that.selector).is(':focus')) {
            $(that.selector).closest('.js-textarea-tags').removeClass('focus');
        }
    });

    /* Focuses element when wrapping div is clicked */
    $('.js-textarea-tags').on('click', function (e) {
        if (e.target !== this) {
            return;
        }
        $(this).addClass('focus').find($(that.selector)).focus();
    });

};

/*
* Get input and create Tag
*
* @param {string} e - input character
* */
Tags.prototype.submitInputHandler = function (e) {

    /* If pressed key is Enter, Comma, Semicolon */
    /*
    * 13 = Enter
    * 44 = Comma
    * 59 = Semi-colon
    * 1548 = Persian Comma
    * 1563 = Persian semi-colon
    * */
    const submitKeys = [13, 44, 59, 1563, 1548];

    if (submitKeys.includes(e.keyCode)) {
        e.preventDefault();
        this.createTag();
    }
};

/*
* Get input and create Tag
*
* @param {string} e - input character
* */
Tags.prototype.createTag = function () {
    const regex = /[;,\u060c\u061B]/g;
    this.phrase = $(this.selector).val().trim().split(regex);
    let $that = this;
    let initCount = this.tagsArray.length;

    /*check for duplicates */
    if (this.phrase.length < 1) {
        return
    } else {
        $(this.phrase).each(function (e) {
            if (!$that.tagsArray.includes($($that.phrase)[e].trim()) && $($that.phrase)[e].trim().length > 1) {
                /* Update array with tags */
                $that.tagsArray.push($($that.phrase)[e].trim().toString());
            }
        })
    }

    /* Update select with latest data */
    this.initTextareaTagsUpdate();

    /* Add UI tags */
    for (let i = initCount; i < this.tagsArray.length; i++) {
        if (this.position === 'after') {
            $(`
                <span class="c-ui-tag__label ${$.inArray(this.tagsArray[i], this.invalidTags) > -1 ? 'has-error' : ''}" data-value="${this.tagsArray[i]}">
                    ${this.tagsArray[i]}
                    <span class="c-ui-tag__remove js-tag-remove"></span>
                </span>
            `).appendTo($(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-container'));
        } else {
            $(`
                <span class="c-ui-tag__label ${$.inArray(this.tagsArray[i], this.invalidTags) > -1 ? 'has-error' : ''}" data-value="${this.tagsArray[i]}">
                    ${this.tagsArray[i]}
                    <span class="c-ui-tag__remove js-tag-remove"></span>
                </span>
            `).insertBefore($(this.selector));
        }
    }

    /* reset input value */
    $(this.selector).val('');
    this.removeTriggers = $(this.selector).siblings().find('.js-tag-remove');
    $(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-select').trigger('change')
};

/*
* Remove Tag method
* */
Tags.prototype.removeTag = function (trigger) {

    /* Remove tag logic */
    let $target = trigger.parent().data('value').toString();
    let $index = this.tagsArray.indexOf($target);

    if ($index > -1) {
        this.tagsArray.splice($index, 1);
    }

    /* Update select with latest data */
    this.initTextareaTagsUpdate();
    $(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-select').trigger('change');

    /* Update Tags UI */
    trigger.parent().remove();
};

/*
* Update the html select for native behavior
* */
Tags.prototype.initTextareaTagsUpdate = function () {
    if (this.validation) {
        let $validation = this.validation;
        let $container = this.htmlSelect.parent();

        $container.removeClass('has-error');
        $container.find('.error-msg').remove();

        $(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-select').html(`
            ${this.tagsArray.map(tag =>
                `<option value="${tag}" selected="selected" ${tag.length < $validation.min || tag.length > $validation.max ? 'data-valid="false"' : ''}>${tag}</option>`
            ).join('')}
        `);

        let $showMsg = false;
        this.invalidTags = this.htmlSelect.find('option[data-valid="false"]').map(function () {
            let $tag = $(this).val();

            if ($tag.length < $validation.min || $tag.length > $validation.max) {
                $showMsg = true;
            }
            return $tag;
        });

        if ($showMsg) {
            $container.addClass('has-error');
            $container.append('<div class="error-msg">'+$validation.message+'</div>');
        }
    } else {
        $(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-select').html(`
            ${this.tagsArray.map(tag =>
                `<option value="${tag}" selected="selected">${tag}</option>`
            ).join('')}
        `);
    }

};

/*
* Initial preview tags print if any
* */
Tags.prototype.printTags = function () {
    if (this.position === 'after') {
        $(`
            ${this.tagsArray.map(tag =>
            `<span class="c-ui-tag__label ${$.inArray(tag, this.invalidTags) > -1 ? 'has-error' : ''}" data-value="${tag}">
                ${tag}
                <span class="c-ui-tag__remove js-tag-remove"></span>
            </span>
            `
        ).join('')}
        `).appendTo($(this.selector).closest('.js-textarea-tags').siblings('.js-textarea-tags-container'));
    } else {
        $(`
            ${this.tagsArray.map(tag =>
            `<span class="c-ui-tag__label ${$.inArray(tag, this.invalidTags) > -1 ? 'has-error' : ''}" data-value="${tag}">
                ${tag}
                <span class="c-ui-tag__remove js-tag-remove"></span>
            </span>
            `
        ).join('')}
        `).insertBefore($(this.selector));
    }
};

window.Tags = Tags;


/*[PATH @digikala/supernova-digikala-marketplace/assets/js/circle-progress.js]*/
/*
jquery-circle-progress - jQuery Plugin to draw animated circular progress bars

URL: http://kottenator.github.io/jquery-circle-progress/
Author: Rostyslav Bryzgunov <kottenator@gmail.com>
Version: 1.1.3
License: MIT
*/
(function($) {
    function CircleProgress(config) {
        this.init(config);
    }

    CircleProgress.prototype = {
        //----------------------------------------------- public options -----------------------------------------------
        /**
         * This is the only required option. It should be from 0.0 to 1.0
         * @type {number}
         */
        value: 0.0,

        /**
         * Size of the circle / canvas in pixels
         * @type {number}
         */
        size: 100.0,

        /**
         * Initial angle for 0.0 value in radians
         * @type {number}
         */
        startAngle: -Math.PI,

        /**
         * Width of the arc. By default it's auto-calculated as 1/14 of size, but you may set it explicitly in pixels
         * @type {number|string}
         */
        thickness: 'auto',

        /**
         * Fill of the arc. You may set it to:
         *   - solid color:
         *     - { color: '#3aeabb' }
         *     - { color: 'rgba(255, 255, 255, .3)' }
         *   - linear gradient (left to right):
         *     - { gradient: ['#3aeabb', '#fdd250'], gradientAngle: Math.PI / 4 }
         *     - { gradient: ['red', 'green', 'blue'], gradientDirection: [x0, y0, x1, y1] }
         *   - image:
         *     - { image: 'http://i.imgur.com/pT0i89v.png' }
         *     - { image: imageObject }
         *     - { color: 'lime', image: 'http://i.imgur.com/pT0i89v.png' } - color displayed until the image is loaded
         */
        fill: {
            gradient: ['#3aeabb', '#fdd250']
        },

        /**
         * Color of the "empty" arc. Only a color fill supported by now
         * @type {string}
         */
        emptyFill: 'rgba(0, 0, 0, .1)',

        /**
         * Animation config (see jQuery animations: http://api.jquery.com/animate/)
         */
        animation: {
            duration: 1200,
            easing: 'circleProgressEasing'
        },

        /**
         * Default animation starts at 0.0 and ends at specified `value`. Let's call this direct animation.
         * If you want to make reversed animation then you should set `animationStartValue` to 1.0.
         * Also you may specify any other value from 0.0 to 1.0
         * @type {number}
         */
        animationStartValue: 0.0,

        /**
         * Reverse animation and arc draw
         * @type {boolean}
         */
        reverse: false,

        /**
         * Arc line cap ('butt', 'round' or 'square')
         * Read more: https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D.lineCap
         * @type {string}
         */
        lineCap: 'butt',

        //-------------------------------------- protected properties and methods --------------------------------------
        /**
         * @protected
         */
        constructor: CircleProgress,

        /**
         * Container element. Should be passed into constructor config
         * @protected
         * @type {jQuery}
         */
        el: null,

        /**
         * Canvas element. Automatically generated and prepended to the {@link CircleProgress.el container}
         * @protected
         * @type {HTMLCanvasElement}
         */
        canvas: null,

        /**
         * 2D-context of the {@link CircleProgress.canvas canvas}
         * @protected
         * @type {CanvasRenderingContext2D}
         */
        ctx: null,

        /**
         * Radius of the outer circle. Automatically calculated as {@link CircleProgress.size} / 2
         * @protected
         * @type {number}
         */
        radius: 0.0,

        /**
         * Fill of the main arc. Automatically calculated, depending on {@link CircleProgress.fill} option
         * @protected
         * @type {string|CanvasGradient|CanvasPattern}
         */
        arcFill: null,

        /**
         * Last rendered frame value
         * @protected
         * @type {number}
         */
        lastFrameValue: 0.0,

        /**
         * Init/re-init the widget
         * @param {object} config - Config
         */
        init: function(config) {
            $.extend(this, config);
            this.radius = this.size / 2;
            this.initWidget();
            this.initFill();
            this.draw();
        },

        /**
         * @protected
         */
        initWidget: function() {
            var canvas = this.canvas = this.canvas || $('<canvas>').prependTo(this.el)[0];
            canvas.width = this.size;
            canvas.height = this.size;
            this.ctx = canvas.getContext('2d');
        },

        /**
         * This method sets {@link CircleProgress.arcFill}
         * It could do this async (on image load)
         * @protected
         */
        initFill: function() {
            var self = this,
                fill = this.fill,
                ctx = this.ctx,
                size = this.size;

            if (!fill)
                throw Error("The fill is not specified!");

            if (fill.color)
                this.arcFill = fill.color;

            if (fill.gradient) {
                var gr = fill.gradient;

                if (gr.length == 1) {
                    this.arcFill = gr[0];
                } else if (gr.length > 1) {
                    var ga = fill.gradientAngle || 0, // gradient direction angle; 0 by default
                        gd = fill.gradientDirection || [
                            size / 2 * (1 - Math.cos(ga)), // x0
                            size / 2 * (1 + Math.sin(ga)), // y0
                            size / 2 * (1 + Math.cos(ga)), // x1
                            size / 2 * (1 - Math.sin(ga))  // y1
                        ];

                    var lg = ctx.createLinearGradient.apply(ctx, gd);

                    for (var i = 0; i < gr.length; i++) {
                        var color = gr[i],
                            pos = i / (gr.length - 1);

                        if ($.isArray(color)) {
                            pos = color[1];
                            color = color[0];
                        }

                        lg.addColorStop(pos, color);
                    }

                    this.arcFill = lg;
                }
            }

            if (fill.image) {
                var img;

                if (fill.image instanceof Image) {
                    img = fill.image;
                } else {
                    img = new Image();
                    img.src = fill.image;
                }

                if (img.complete)
                    setImageFill();
                else
                    img.onload = setImageFill;
            }

            function setImageFill() {
                var bg = $('<canvas>')[0];
                bg.width = self.size;
                bg.height = self.size;
                bg.getContext('2d').drawImage(img, 0, 0, size, size);
                self.arcFill = self.ctx.createPattern(bg, 'no-repeat');
                self.drawFrame(self.lastFrameValue);
            }
        },

        draw: function() {
            if (this.animation)
                this.drawAnimated(this.value);
            else
                this.drawFrame(this.value);
        },

        /**
         * @protected
         * @param {number} v - Frame value
         */
        drawFrame: function(v) {
            this.lastFrameValue = v;
            this.ctx.clearRect(0, 0, this.size, this.size);
            this.drawEmptyArc(v);
            this.drawArc(v);
        },

        /**
         * @protected
         * @param {number} v - Frame value
         */
        drawArc: function(v) {
            var ctx = this.ctx,
                r = this.radius,
                t = this.getThickness(),
                a = this.startAngle;

            ctx.save();
            ctx.beginPath();

            if (!this.reverse) {
                ctx.arc(r, r, r - t / 2, a, a + Math.PI * 2 * v);
            } else {
                ctx.arc(r, r, r - t / 2, a - Math.PI * 2 * v, a);
            }

            ctx.lineWidth = t;
            ctx.lineCap = this.lineCap;
            ctx.strokeStyle = this.arcFill;
            ctx.stroke();
            ctx.restore();
        },

        /**
         * @protected
         * @param {number} v - Frame value
         */
        drawEmptyArc: function(v) {
            var ctx = this.ctx,
                r = this.radius,
                t = this.getThickness(),
                a = this.startAngle;

            if (v < 1) {
                ctx.save();
                ctx.beginPath();

                if (v <= 0) {
                    ctx.arc(r, r, r - t / 2, 0, Math.PI * 2);
                } else {
                    if (!this.reverse) {
                        ctx.arc(r, r, r - t / 2, a + Math.PI * 2 * v, a);
                    } else {
                        ctx.arc(r, r, r - t / 2, a, a - Math.PI * 2 * v);
                    }
                }

                ctx.lineWidth = t;
                ctx.strokeStyle = this.emptyFill;
                ctx.stroke();
                ctx.restore();
            }
        },

        /**
         * @protected
         * @param {number} v - Value
         */
        drawAnimated: function(v) {
            var self = this,
                el = this.el,
                canvas = $(this.canvas);

            // stop previous animation before new "start" event is triggered
            canvas.stop(true, false);
            el.trigger('circle-animation-start');

            canvas
                .css({ animationProgress: 0 })
                .animate({ animationProgress: 1 }, $.extend({}, this.animation, {
                    step: function (animationProgress) {
                        var stepValue = self.animationStartValue * (1 - animationProgress) + v * animationProgress;
                        self.drawFrame(stepValue);
                        el.trigger('circle-animation-progress', [animationProgress, stepValue]);
                    }
                }))
                .promise()
                .always(function() {
                    // trigger on both successful & failure animation end
                    el.trigger('circle-animation-end');
                });
        },

        /**
         * @protected
         * @returns {number}
         */
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 14;
        },

        getValue: function() {
            return this.value;
        },

        setValue: function(newValue) {
            if (this.animation)
                this.animationStartValue = this.lastFrameValue;
            this.value = newValue;
            this.draw();
        }
    };

    //-------------------------------------------- Initiating jQuery plugin --------------------------------------------
    $.circleProgress = {
        // Default options (you may override them)
        defaults: CircleProgress.prototype
    };

    // ease-in-out-cubic
    $.easing.circleProgressEasing = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1)
            return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

    /**
     * Draw animated circular progress bar.
     *
     * Appends <canvas> to the element or updates already appended one.
     *
     * If animated, throws 3 events:
     *
     *   - circle-animation-start(jqEvent)
     *   - circle-animation-progress(jqEvent, animationProgress, stepValue) - multiple event;
     *                                                                        animationProgress: from 0.0 to 1.0;
     *                                                                        stepValue: from 0.0 to value
     *   - circle-animation-end(jqEvent)
     *
     * @param configOrCommand - Config object or command name
     *     Example: { value: 0.75, size: 50, animation: false };
     *     you may set any public property (see above);
     *     `animation` may be set to false;
     *     you may use .circleProgress('widget') to get the canvas
     *     you may use .circleProgress('value', newValue) to dynamically update the value
     *
     * @param commandArgument - Some commands (like 'value') may require an argument
     */
    $.fn.circleProgress = function(configOrCommand, commandArgument) {
        var dataName = 'circle-progress',
            firstInstance = this.data(dataName);

        if (configOrCommand == 'widget') {
            if (!firstInstance)
                throw Error('Calling "widget" method on not initialized instance is forbidden');
            return firstInstance.canvas;
        }

        if (configOrCommand == 'value') {
            if (!firstInstance)
                throw Error('Calling "value" method on not initialized instance is forbidden');
            if (typeof commandArgument == 'undefined') {
                return firstInstance.getValue();
            } else {
                var newValue = arguments[1];
                return this.each(function() {
                    $(this).data(dataName).setValue(newValue);
                });
            }
        }

        return this.each(function() {
            var el = $(this),
                instance = el.data(dataName),
                config = $.isPlainObject(configOrCommand) ? configOrCommand : {};

            if (instance) {
                instance.init(config);
            } else {
                var initialConfig = $.extend({}, el.data());
                if (typeof initialConfig.fill == 'string')
                    initialConfig.fill = JSON.parse(initialConfig.fill);
                if (typeof initialConfig.animation == 'string')
                    initialConfig.animation = JSON.parse(initialConfig.animation);
                config = $.extend(initialConfig, config);
                config.el = el;
                instance = new CircleProgress(config);
                el.data(dataName, instance);
            }
        });
    };
})(jQuery);



/*[PATH @digikala/supernova-digikala-marketplace/assets/local/js/controllers/Content/ContentCreation/productController/indexAction.js]*/
let IndexAction = {
    data: {
        galleryRequests: [],
        fileRequests: null,
        saved: false,
        fakePolicyApproved:false,
        selectedCategoryFromSearchResult: null, // used to detect the category which has been selected from search results
    },

    init: function () {
        /** @var window.formMode */
        this.formMode = window.formMode;
        /** @var window.isContentUser */
        this.isContentUserVariable = window.isContentUser;
        if (this.isContentUser()) {
            this.forceMarketplaceSellerId = null;
            this.initForceMarketplaceSellerChange();
        }
        this.initUiSelect();
        this.initUiSelectSeller();
        this.initTextareaWordCount();
        this.initTextareaTags();
        this.initAccordion();
        this.initTooltips();
        this.extendValidator();

        this.productFormValidator = null;

        this.initAttributesFormValidator();

        if (this.isEditAfterModerationApprovedMode() && !this.isContentUser()) {
            Services.logToConsole('Moderated and not content user');
            this.initProductNextStep();
        } else {
            this.initCategoryThreeView();
            this.initCategorySearchView();
            this.initCategoryNextStep();
            this.initCategoryReset();

            this.initProductChanges();
            this.initProductNextStep();

            this.initAttributesNextStep();
            if(isModuleActive('auto_title_suggestion')) {
                this.initTitleNextStep();
            }
        }

        this.imagesFormValidator = null;
        this.initImagesUpload();
        this.initSortableFiles();
        this.initSwapArrPositions();
        this.initUploadsControlsHandler();
        this.initImagesNextStep();

        if (this.isContentUser()) {
            this.initImages3dUpload();
            this.initVideoSearchView();
            this.initSelectVideosHandler();
            this.initDragOrderUi();
        } else {
            this.initImagesOwnerHandler();
        }

        this.initConfirmNewCategory();
        this.initNewBrandRequestModal();
        this.initBrandLogoUpload();
        this.initBrandSheetUpload();

        this.initPreventSubmit();
        this.initSave();

        this.initAfterModerationImageControls();

        this.initAutoSuggestBox();
        this.initSaveToClipboard();
        this.initBrandFromReset();

        this.initDimension(window.dimensionLevel, window.dimensionConfig);
        this.initGuidelineModalAction();

        this.initHidingTitleFieldsOnAutoTitle();
    },

    initHidingTitleFieldsOnAutoTitle: function() {
        if ( $('[data-hide-when-auto-title]').attr('data-hide-when-auto-title') === 'true' )
            $('[data-hide-when-auto-title]').addClass('uk-hidden');
    },

    isNewMode: function () {
        return this.formMode === 'new';
    },

    isEditBeforeSubmitMode: function () {
        return this.formMode === 'edit_before_submit';
    },

    isEditBeforeModerationMode: function () {
        return this.formMode === 'edit_before_moderation';
    },

    isEditAfterModerationApprovedMode: function () {
        return this.formMode === 'edit_after_moderation_approved';
    },

    isEditAfterModerationRejectedMode: function () {
        return this.formMode === 'edit_after_moderation_Rejected';
    },

    isContentUser: function () {
        return this.isContentUserVariable === true;
    },

    getForceMarketplaceSellerId: function () {
        if (!this.isContentUser()) {
            return null;
        }

        return this.forceMarketplaceSellerId;
    },

    hasForceMarketplaceSeller: function () {
        return this.getForceMarketplaceSellerId() !== null;
    },

    initPreventSubmit: function () {
        $(document).on('keydown', '.js-prevent-submit', function (e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
    },

    initForceMarketplaceSellerChange: function () {
        let $forceMarketplaceSellerId = $('#forceMarketplaceSellerId');

        if ($forceMarketplaceSellerId.length) {
            this.forceMarketplaceSellerId = $forceMarketplaceSellerId.val();
        }

        $('#marketplaceSellersList').change(function () {
            window.location.href = '/content/create/product/for/marketplace/seller/' + $(this).val() + '/';
        });
    },

    initUiSelect: function () {
        $('.js-select-origin').each(function () {
            const $this = $(this);
            const isMultiSelect = $this.attr('multiple');
            const $placeholder = $this.attr('data-placeholder') || '';
            const inProductStep = $this.hasClass('js-in-product');

            $this.select2({
                placeholder: $placeholder,
                closeOnSelect: !isMultiSelect,
                allowClear: (isMultiSelect && inProductStep),
                sorter: function (data) {
                    return data.sort(function (a, b) {
                        a = $(a).prop('selected');
                        b = $(b).prop('selected');
                        return b - a;
                    });
                }
            }).on('select2:opening', function () {
                $('body').addClass('ui-select');
            }).on('select2:select', function () {
                let $sortedOptions = $('li.select2-results__option').sort(function (a, b) {
                    return ($(b).attr('aria-selected') === 'true') - ($(a).attr('aria-selected') === 'true');
                });
                $('.select2-results__options').prepend($sortedOptions);
            }).on('select2:unselect', function () {
                let $sortedOptions = $('li.select2-results__option').sort(function (a, b) {
                    return ($(b).attr('aria-selected') === 'true') - ($(a).attr('aria-selected') === 'true');
                });
                $('.select2-results__options').prepend($sortedOptions);
            }).on('change', function () {
                if (isMultiSelect && inProductStep) {
                    let $selectionsContainerWidth = $this.siblings('.select2-container').find('ul.select2-selection__rendered').width() - 77;
                    const $selections = $this.siblings('.select2-container').find('li.select2-selection__choice');

                    $selections.removeClass('hidden');
                    $selections.each(function () {
                        $selectionsContainerWidth -= $(this).outerWidth(true);
                        if ($selectionsContainerWidth < 0) {
                            $(this).addClass('hidden');
                        }
                    });

                    let $selectionsCount = $this.siblings('.select2-container').find('li.select2-selection__choice.hidden').length;
                    let $counter = $this.siblings('.select-counter');

                    if ($selectionsCount > 0) {
                        $counter.css('display', 'flex');
                    } else {
                        $counter.css('display', 'none');
                    }
                    $counter.text($selectionsCount.toLocaleString('fa-IR'));
                }
                $(this).trigger('blur');
            }).on('select2:close', function () {
                $(this).valid();
                $('body').removeClass('ui-select');
            });

            if (isMultiSelect && inProductStep) {
                let $selectionsContainerWidth = $this.siblings('.select2-container').find('ul.select2-selection__rendered').width() - 77;
                const $selections = $this.siblings('.select2-container').find('li.select2-selection__choice');

                $selections.removeClass('hidden');
                $selections.each(function () {
                    $selectionsContainerWidth -= $(this).outerWidth(true);
                    if ($selectionsContainerWidth < 0) {
                        $(this).addClass('hidden');
                    }
                });

                let $counter = $this.siblings('.select-counter');
                let $selectionsCount = $this.siblings('.select2-container').find('li.select2-selection__choice.hidden').length;

                if ($selectionsCount > 0) {
                    $counter.text($selectionsCount.toLocaleString('fa-IR'));
                    $counter.css('display', 'flex');
                }
            }

        });
    },

    initUiSelectSeller: function () {
        $('#marketplaceSellersList').select2({
            minimumInputLength: 1,
            language: {
                noResults: function () {
                    return 'جستجوی شما نتیجه‌ای نداشت';
                },
                searching: function () {
                    return 'در حال جستجو برای این آیتم هستیم';
                },
                inputTooShort: function () {
                    return 'لطفا حداقل دو حرف یا عدد وارد کنید';
                }
            },
            ajax: {
                url: '/content/create/marketplace/seller/search/',
                dataType: 'json',
                delay: 100,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    Services.logToConsole(data.data.options);
                    return {
                        results: data.data.options
                    };
                }
            }
        }).on('select2:opening', function () {
            $('body').addClass('ui-select');
        }).on('select2:select', function () {
        }).on('select2:unselect', function () {
        }).on('change', function () {
            // $(this).trigger('blur');
        }).on('select2:close', function () {
            // $(this).valid();
            $('body').removeClass('ui-select');
        });
    },

    initFilterInputs: function () {
        $(document).on('keyup', '.js-filter-input', function () {
            let val = $(this).val();
            let patt;
            let $content = $(this).closest('.js-box-content');

            if (val) {
                $('.js-box-content-item', $content).each(function () {
                    patt = new RegExp(val, 'i');
                    if (patt.test($(this).data('value'))) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            } else {
                $('li', $content).show();
            }
        });
    },

    initTextareaWordCount: function () {
        let $textarea = $('.js-textarea-words');

        $textarea.each(function () {
            wordCount($(this));
        });

        $textarea.on('keyup keypress', function () {
            wordCount($(this));
        });

        function wordCount(textarea) {
            let $wordCount = textarea.val().trim().length;
            textarea.siblings().find('.js-wordcount-target').text($wordCount);
        }
    },

    initTextareaTags: function () {
        new window.Tags('.js-textarea-tags-product-titles');
        new window.Tags('.js-textarea-tags-pros', 'after', {
            min: 5,
            max: 50,
            message: 'متن وارد شده در هر نقطه قوت بایستی بین 5 تا 50 کاراکتر باشد'
        });
        new window.Tags('.js-textarea-tags-cons', 'after', {
            min: 5,
            max: 50,
            message: 'متن وارد شده در هر نقطه ضعف بایستی بین 5 تا 50 کاراکتر باشد'
        });
        new window.Tags('.js-textarea-tags-dkpc', 'after');
    },

    initAccordion: function () {
        window.UIkit.accordion('.js-accordion', {
            multiple: true,
            toggle: '> .c-content-accordion__title',
            content: '> .c-content-accordion__content',
        });
    },

    initTooltips: function () {
        const tooltipContainers = document.querySelectorAll('.js-tooltip');
        if (tooltipContainers.length) {
            $(document).on('mouseenter', '.js-tooltip', this.showTooltip);
        }

        const tooltipInputContainers = document.querySelectorAll('.js-tooltip-input');
        if (tooltipInputContainers.length) {
            $(document).on('focusin', '.js-tooltip-input', this.showTooltip);
        }
    },

    extendValidator: function () {
        $.validator.addMethod("not_same_as_old_value", function (value, element) {
            let $oldValue = $(element).data('old-value');
            if (typeof $oldValue === 'undefined') {
                return true;
            }
            return String($oldValue) !== String(value);
        }, 'new value same as old moderated value');

        $.validator.addMethod("persian_letters_only", function (value) {
            if ($.trim(value).length === 0) {
                return true;
            }

            return /[ابپتثجچحخدذرزژسشصضطظعغفقکكگلمنوهیئي]$/i.test(
                value
            );
        }, 'only persian characters allowed');

        $.validator.addMethod("english_letters_only", function (value) {
            if ($.trim(value).length === 0) {
                return true;
            }

            return /[abcdefghijklmnopqrstuvwxyz]$/i.test(
                value
            );
        }, 'only english characters allowed');
    },

    createTooltip: function (id, text) {
        const tooltip = document.createElement('div');

        if (id && text) {
            $(tooltip).addClass('c-content-tooltip').attr('id', id);
            $(tooltip).append($.parseHTML(text));
        }

        return $(tooltip);
    },

    showTooltip: function (e) {
        const $target = $(e.currentTarget);

        const tooltipText = $target.data('tooltip');

        if (!tooltipText) {
            return;
        }
        const tooltipHalfMaxWidth = 235 / 2;
        const targetHalfWidth = $target.offsetWidth / 2;
        const tooltipId = 'tooltip-block';
        const targetPosition = $target[0].getBoundingClientRect();
        const $tooltip = IndexAction.createTooltip(tooltipId, tooltipText);
        const $body = $('body');

        function removeTooltip()
        {
            $tooltip.remove();
            if ($target.hasClass('js-tooltip-input')) {
                $target.off('focusout', removeTooltip);
            } else {
                $target.off('mouseleave', removeTooltip);
            }
            $(window).off('scroll', removeTooltip);
        }

        $body.append($tooltip);

        if (targetPosition.left + tooltipHalfMaxWidth + targetHalfWidth >= $body.innerWidth()) {
            $tooltip.addClass('c-content-tooltip--left');
        } else if (targetPosition.left + targetHalfWidth - tooltipHalfMaxWidth <= 0) {
            $tooltip.addClass('c-content-tooltip--right');
        }

        if (targetPosition.top + targetPosition.height + $tooltip.offsetHeight >= document.body.clientHeight) {
            $tooltip.addClass('c-content-tooltip--top');
            $tooltip.css('top', targetPosition.top - $tooltip.outerHeight() + 'px');
        } else {
            $tooltip.css('top', targetPosition.top + targetPosition.height + 'px');
        }

        if ($target.hasClass('js-tooltip-input')) {
            $tooltip.addClass('c-content-tooltip--left');
            $tooltip.css('left', targetPosition.left + $target.outerWidth() - 20 + 'px');
        } else {
            $tooltip.css('left', targetPosition.left + $target.outerWidth() / 2 + 'px');
        }

        $tooltip.css('opacity', 1);

        if ($target.hasClass('js-tooltip-input')) {
            $target.on('focusout', removeTooltip);
        } else {
            $target.on('mouseleave', removeTooltip);
        }
        $(window).on('scroll', removeTooltip);
    },

    initCategoryThreeView: function () {
        let $that = this;
        $('#categoriesContainer').on('click', '.js-category-link', function (e) {
            e.preventDefault();
            let $errorContainer = $('#ajaxErrorCategory');
            $errorContainer.html('');
            $errorContainer.addClass('hidden');
            let $category = $(this);
            let $column = $category.closest('.js-category-column');
            if (!$category.parent().hasClass('has-children')) {
                $column.nextAll('.js-category-column').each(function () {
                    $(this).remove();
                });
                $that.selectCategoryFromThree($category);
                IndexAction.data.selectedCategoryFromSearchResult = null;
                return;
            }
            $('#stepCategoryContainer').find('.js-continue-btn').addClass('disabled');
            Services.showLoader = function () {
                $('#categoriesContainer').addClass('c-content-loading');
            };

            Services.hideLoader = function () {
                $('#categoriesContainer').removeClass('c-content-loading');
            };

            Services.ajaxPOSTRequestHTML(
                '/content/create/category/tree/',
                {
                    parent_id: $category.find('.js-category-data:first').data('id'),
                    force_marketplace_seller_id: $that.getForceMarketplaceSellerId()
                },
                function (html) {
                    $column.nextAll('.js-category-column').each(function () {
                        $(this).remove();
                    });
                    $column.parent().append(html);
                    $that.selectCategoryFromThree($category);
                },
                true,
                true
            );
        });
    },

    initCategorySearchView: function () {
        let $that = this;
        $('#searchKeyword').keyup(function () {
            let $value = $(this).val();

            if ($value.length < 2 || $value.length > 255) {
                if ($value.length !== 0) {
                    return;
                }
            }

            $that.searchForCategoryByQuery($value);

        });

        $('#categoriesContainer').on('change', '.js-category-change', function () {
            let $this = $(this);
            let leafCategoryId = $this.val();
            let $selectedCategoriesContainers = $this.parent().find('li.c-content-categories__selected-category');

            let $selectedCategoriesPathContainer = $('.js-selected-category');
            $selectedCategoriesPathContainer.find('li').remove();

            $selectedCategoriesContainers.each(function () {
                let $li = $('<li class="c-content-categories__selected-category"/>');
                $li.text($(this).text());
                $selectedCategoriesPathContainer.append($li);
            });

            if (leafCategoryId) {
                $('#selectedCategoryId').val(leafCategoryId);
                $('#stepCategoryContainer').find('.js-continue-btn').removeClass('disabled');
                $('#selectedCategoryTheme').val($this.data('theme'));
            }
            IndexAction.data.selectedCategoryFromSearchResult = {
                keyword: $('#searchKeyword').val(),
                mainCategory: $this.attr('data-title'),
                position: $this.attr('data-position')
            };
        });
    },

    selectCategoryFromThree: function ($category) {
        $category.parent().parent().find('li').removeClass('is-active');
        $category.parent().addClass('is-active');

        let $selectedCategoriesContainers = $('.c-content-categories__container').find('li.is-active');
        let $selectedCategoriesPathContainer = $('.js-selected-category');
        $selectedCategoriesPathContainer.find('li').remove();

        let leafCategoryId = null;
        let leafCategoryTheme = null;
        $selectedCategoriesContainers.each(function () {
            let $this = $(this);
            let $categoryDataInput = $this.find('.js-category-data:first');
            let $li = $('<li class="c-content-categories__selected-category"/>');
            $li.text($categoryDataInput.val());
            $selectedCategoriesPathContainer.append($li);

            if (leafCategoryId === null && !$this.hasClass('has-children')) {
                leafCategoryId = $categoryDataInput.data('id');
                leafCategoryTheme = $categoryDataInput.data('theme');
            }
        });

        if (leafCategoryId) {
            $('#selectedCategoryId').val(leafCategoryId);
            $('#stepCategoryContainer').find('.js-continue-btn').removeClass('disabled');
            $('#selectedCategoryTheme').val(leafCategoryTheme);
        } else {
            $('#stepCategoryContainer').find('.js-continue-btn').addClass('disabled');
        }
    },

    onConfirmFakePrivacyModal : function($that){
        let $selectedCategoryId = $('#selectedCategoryId').val();
        let $selectedCategoryIdConfirmed = $('#selectedCategoryIdConfirmed');
        let selectedCategoryIdConfirmedValue = $selectedCategoryIdConfirmed.val();
        let selectedCategoryIdConfirmedValueChangeApproved = $selectedCategoryIdConfirmed.data('change-approved');

        if (!($selectedCategoryId > 0)) {
            return;
        }

        if (selectedCategoryIdConfirmedValue > 0) {
            if ($selectedCategoryId !== selectedCategoryIdConfirmedValue) {
                if (!selectedCategoryIdConfirmedValueChangeApproved) {
                    const confirmModal = window.UIkit.modal('#confirmCategoryChangeModal');
                    new Promise(function (resolve, reject) {
                        let $selectedCategoryThemeConfirmed = $('#selectedCategoryThemeConfirmed').val();

                        if ($selectedCategoryThemeConfirmed && $('#selectedCategoryTheme').val() !== $selectedCategoryThemeConfirmed) {
                            $('#differentCategoryThemeMessageContainer').removeClass('hidden');
                        } else {
                            $('#differentCategoryThemeMessageContainer').addClass('hidden');
                        }
                        confirmModal.show();
                        $('.js-accept').on('click', function () {


                            resolve();
                            if(isModuleActive('ccp_guideline')) {
                                $('.js-guideline-icon').each(function (index, item) {
                                    $(item).hasClass('uk-hidden') ? '' : $(item).addClass('uk-hidden');
                                });
                            }
                        });
                        $('.js-decline').on('click', function () {
                            reject();
                        });
                    }).then(function () {
                        $selectedCategoryIdConfirmed.data('change-approved', true);
                        $that.categoryNextStep($selectedCategoryId);
                        $('#stepAttributesForm').html('');
                        let $stepAttributesAccordion = $('#stepAttributesAccordion');
                        $stepAttributesAccordion.removeClass('uk-open');
                        $stepAttributesAccordion.addClass('disabled');
                        let $productStepNext = $('#productStepNext');
                        $productStepNext.removeClass('disabled');
                        $productStepNext.removeClass('hidden');
                        $('.js-model-field').val('');
                    }).catch(function () {
                    }).finally(function () {
                        confirmModal.hide();
                    });
                } else {
                    $that.categoryNextStep($selectedCategoryId);
                }
            } else {
                let $stepContainer = $('#stepProductAccordion');
                $stepContainer.addClass('uk-open');
                $stepContainer.removeClass('disabled');
                $that.scrollTo($stepContainer, 55);
            }
        } else {
            $that.categoryNextStep($selectedCategoryId);
        }

        if ( IndexAction.data.selectedCategoryFromSearchResult ) {
            const data = IndexAction.data.selectedCategoryFromSearchResult;

            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event': 'selectCateogryCreateProduct',
                'categorydetail': `${data.keyword} - ${data.mainCategory}, ${data.position}`
            });
        }
    },

    initCategoryNextStep: function () {
        let $that = this;

        $('#categoryStepNext').on('click', function () {
            if(isModuleActive("marketplace_content_create_fake_policy_confirm") && !($that.data.fakePolicyApproved)){

                if(window.FakePolicyConfirmation.checkShouldShowModal()){
                    $that.onConfirmFakePrivacyModal($that);
                }else{
                    const confirmModal = window.UIkit.modal('#confirmFakeProductPolicyModal');
                    confirmModal.show();
                    $('.js-accept').on('click', function () {
                        window.FakePolicyConfirmation.setModalShownDate()
                        $that.data.fakePolicyApproved = true
                        confirmModal.hide();
                        $that.onConfirmFakePrivacyModal($that);
                    });
                }

            } else{
                $that.onConfirmFakePrivacyModal($that)
            }

        });
    },



    initDimension: function (dimensionLevel, dimensionConfig) {
        if (dimensionLevel) {
            this.dimensionLevel = dimensionLevel;
            this.dimensionConfig = dimensionConfig;
            if (this.dimensionLevel !== 'product') {
                $(".js-product-package-dimension").hide();
                $('#noteDimensionLevelProduct').hide();
                $('#noteDimensionLevelItem').show();
            } else {
                $(".js-product-package-dimension").show();
                $('#noteDimensionLevelProduct').show();
                $('#noteDimensionLevelItem').hide();
            }
            this.initProductFormValidation();
            $('[name="categoryTitleSpan"]').each(function () {
                $(this).html($('.c-content-categories__selected-category:last').html())
            });
        }
    },

    categoryNextStep: function ($selectedCategoryId) {
        let $that = this;
        Services.showLoader = function () {
            $('#stepCategoryContainer').addClass('c-content-loading');
        };

        Services.hideLoader = function () {
            $('#stepCategoryContainer').removeClass('c-content-loading');
        };

        Services.ajaxPOSTRequestJSON(
            '/content/create/product/step/product/',
            {
                category_id: $selectedCategoryId,
                force_marketplace_seller_id: $that.getForceMarketplaceSellerId()
            },
            /**
             * @param data
             * @param data.forceUrl force url to go
             * @param data.categoryFormValid Product Form is valid
             * @param data.categoryForm.errors Backend validation errors
             * @param data.productFormValid Product Form is valid
             * @param data.productForm.jsErrors Backend validation errors
             * @param data.productForm.errors Backend validation errors
             * @param data.attributesFormValid Attribute Form is valid
             * @param data.attributesForm.jsErrors Backend validation errors
             * @param data.attributesForm.errors Backend validation errors
             * @param data.imagesFormValid Images Form is valid
             * @param data.imagesForm.jsErrors Backend validation errors
             * @param data.imagesForm.errors Backend validation errors
             * @param data.images3dFormValid Images3d Form is valid
             * @param data.images3dForm.jsErrors Backend validation errors
             * @param data.images3dForm.errors Backend validation errors
             * @param data.videosFormValid Videos Form is valid
             * @param data.videosForm.errors Backend validation errors
             * @param data.fields Fields to be populated from backend
             * @param data.fields.select Selects to be populated from backend
             * @param data.fields.input Inputs to be populated from backend
             * @param data.fields.checkboxes Checkboxes to be populated from backend
             * @param data.fields.spans Spans to be populated from backend
             * @param data.autoTitleSuggestion.hint_fa
             * @param data.autoTitleSuggestion.hint_en
             * @param data.autoTitleSuggestion.division
             */
            function (data) {
                $that.handleErrors(data);
                if (typeof data.categoryFormValid === 'undefined' || data.categoryFormValid === false) {
                    return;
                }

                let $selectedCategoryIdConfirmed = $('#selectedCategoryIdConfirmed');
                $selectedCategoryIdConfirmed.val($selectedCategoryId);
                $selectedCategoryIdConfirmed.data('change-approved', false);

                $that.initDimension(data.dimension_level, data.dimension_config);

                if (data.fields !== 'undefined') {
                    if (data.fields.select !== 'undefined') {
                        $.each(data.fields.select, function (selectSelector) {
                            let $select = $('#' + selectSelector + 'Select');

                            if (!$select.length) {
                                return;
                            }

                            $select.find('option').remove();

                            if (this.options.length === 0) {
                                $select.prop('disabled', true);
                                return;
                            }

                            $.each(this.options, function (optionIndex, optionData) {
                                let $option = $('<option/>');
                                $option.attr('value', optionData.value);
                                $option.text(optionData.text);
                                if (typeof optionData.selected !== 'undefined') {
                                    $option.prop('selected', optionData.selected)
                                }
                                $select.append($option);
                            });

                            $select.prop('disabled', false);
                        });
                    }

                    if (data.fields.input !== 'undefined') {
                        $.each(data.fields.input, function (inputSelector, inputValue) {
                            let $input = $('#' + inputSelector + 'Input');
                            if (!$input.length) {
                                return;
                            }
                            $input.val(inputValue);
                        });
                    }

                    if (data.fields.span !== 'undefined') {
                        $.each(data.fields.span, function (spanSelector, spanHtml) {
                            let $span = $('#' + spanSelector + 'Span');
                            if (!$span.length) {
                                return;
                            }
                            $span.html(spanHtml);
                        });
                    }

                    if (data.fields.checkboxes !== 'undefined') {
                        $.each(data.fields.checkboxes, function (checkboxSelector, isChecked) {
                            let $checkbox = $('#' + checkboxSelector + 'Checkbox');
                            if (!$checkbox.length) {
                                return;
                            }
                            $checkbox.prop('checked', isChecked);
                        });
                    }

                    /** @var data.fields.extra.allow_fake */
                    if (data.fields.extra.allow_fake !== 'undefined') {
                        $('#productIsFake')
                            .prop('disabled', !data.fields.extra.allow_fake)
                            .prop('checked', false);

                        if (data.fields.extra.allow_fake) {
                            $('#productIsFakeContainerLabel').removeClass('disabled');
                            $('#productIsFakeLabel').removeClass('disabled');
                            if ($that.isContentUser()) {
                                $that.enableFakeReasons();
                            }
                        } else {
                            $('#productIsFakeContainerLabel').addClass('disabled');
                            $('#productIsFakeLabel').addClass('disabled');
                            if ($that.isContentUser()) {
                                $that.clearAndDisableFakeReasons();
                            }
                        }
                    }

                    /** @var data.fields.select.sites */
                    if (data.fields.select.sites !== 'undefined') {
                        let $select = $('#newBrandRequestSitesSelect');

                        if ($select.length) {
                            $select.find('option').remove();

                            if (data.fields.select.sites.options.length === 0) {
                                $select.prop('disabled', true);
                            } else {
                                $.each(data.fields.select.sites.options, function (optionIndex, optionData) {
                                    let $option = $('<option/>');
                                    $option.attr('value', optionData.value);
                                    $option.text(optionData.text);
                                    if (typeof optionData.selected !== 'undefined') {
                                        $option.prop('selected', optionData.selected)
                                    }
                                    $select.append($option);
                                });

                                $select.prop('disabled', false);
                            }
                        }
                    }

                    $that.initUiSelect();
                    $('.js-select-origin').trigger('change');

                    if(isModuleActive('ccp_guideline') && data.guideline) {
                        $that.initGuidelineModals(data.guideline);
                    }

                    if ( isModuleActive('marketplace_ccp_product_color') ) {
                        if ( !data.fields.extra.show_colors ) {
                            $('.js-select-colors-wrapper').addClass('uk-hidden');
                            $('.js-select-dkp-color').prop('disabled', true);
                        } else {
                            $('.js-select-colors-wrapper').removeClass('uk-hidden');
                            $('.js-select-dkp-color').prop('disabled', false);
                        }
                    }
                }

                if (isModuleActive('auto_title_suggestion')) {
                    if ( data.autoTitleSuggestion ) {
                        $('[data-hide-when-auto-title]').addClass('uk-hidden');
                        $('[data-hide-when-auto-title]').attr('data-hide-when-auto-title', 'true');
                    } else {
                        $('[data-hide-when-auto-title]').removeClass('uk-hidden');
                        $('[data-hide-when-auto-title]').attr('data-hide-when-auto-title', 'false');
                    }


                    var titlePlaceholderFa = 'نام کالای خود را با رعایت این ترتیب درج نمائید: ماهیت کالا + برند + مدل';
                    var titlePlaceholderEn = 'Enter the name of your item in the following order: Brand + Model + Nature of the Product';
                    var stepImagesHeader = 'گام چهارم: بارگذاری تصاویر';
                    var $divisionsSelect = $('.js-divisions-select'),
                        $productModel = $('.js-product-model');

                    $('#stepTitleAccordion').hide();
                    $('.js-step-product-title').show();

                    //todo: disable extra title fields
                    if (data.autoTitleSuggestion) {
                        if(isModuleActive('ccp_guideline') && data.guideline) {
                            $('.js-modal-section').text('پنجم');
                        }
                        $('.js-auto-title-message').removeClass('uk-hidden');

                        $productModel.removeClass('uk-hidden');

                        if (data.autoTitleSuggestion.division) {
                            stepImagesHeader = 'گام پنجم: بارگذاری تصاویر';
                            $('.js-step-product-title').hide();
                            $('#stepTitleAccordion').show();

                            $divisionsSelect.removeClass('uk-hidden');
                            $divisionsSelect.find('select').attr('disabled', false);
                            var selectedDivision = $divisionsSelect.find(':selected').attr('value');

                            // $divisionsSelect.on('select2:select', function () {
                            //     selectedDivision = $divisionsSelect.find(':selected').attr('value');
                            // })

                            $('#divisionsSelect').change(function () {
                                selectedDivision = $(this).val();
                                checkEnableEdit();
                            })

                            var checkEnableEdit = function () {
                                if ((!isModuleActive('auto_title_enable_edit') && !$that.isContentUser()) || (isModuleActive('auto_title_enable_edit') && !$that.isContentUser())) {
                                    if (selectedDivision !== '' && (!data.autoTitleSuggestion.division[selectedDivision].enable_edit)) {
                                        $('#editSubjectSuggested').attr('disabled', true);
                                    }
                                }
                            }

                            checkEnableEdit();
                        }

                        titlePlaceholderFa = data.autoTitleSuggestion.hint_fa ? data.autoTitleSuggestion.hint_fa : titlePlaceholderFa;
                        titlePlaceholderEn = data.autoTitleSuggestion.hint_en ? data.autoTitleSuggestion.hint_en : titlePlaceholderEn;

                        if(data.autoTitleSuggestion.hint_fa){
                            $('.js-suggested-title-fa').attr('placeholder', data.autoTitleSuggestion.hint_fa);
                        }
                    } else if((!$divisionsSelect.hasClass('uk-hidden')) && (!$productModel.hasClass('uk-hidden'))) {
                        $divisionsSelect.addClass('uk-hidden');
                        $productModel.addClass('uk-hidden');
                        $divisionsSelect.find('select').attr('disabled', true);
                        $('.js-auto-title-message').addClass('uk-hidden');
                    }

                    if (!data.autoTitleSuggestion) {
                        if ($('.js-step-product-title').length && ($('.js-step-product-title').data('status') === 'in_review') || ($('.js-step-product-title').data('content-user') === 1)) {
                            $('.js-step-product-title').removeClass('uk-hidden').css('display', 'flex');

                        }

                        if ($('.js-step-product-title').data('content-user') === 1) {
                            $('#stepTitleAccordion').addClass('disabled');
                        }
                    }

                    $('.js-step-images-header')[0].innerHTML = stepImagesHeader;

                    $('[name="product[title_fa]"]').each(function () {
                        this.setAttribute('placeholder', titlePlaceholderFa);
                    });
                    $('[name="product[title_en]"]').each(function () {
                        this.setAttribute('placeholder', titlePlaceholderEn);
                    });

                }

                let $stepContainer = $('#stepProductAccordion');

                $stepContainer.addClass('uk-open');
                $stepContainer.removeClass('disabled');

                let $productStepNext = $('#productStepNext');

                $productStepNext.removeClass('hidden');
                $productStepNext.removeClass('disabled');

                $that.scrollTo($stepContainer, 55);
                $('#stepCategoryAccordion .c-content-progress').removeClass('active failed').addClass('passed');
                $('#stepProductAccordion .c-content-progress').removeClass('passed failed').addClass('active');


                Services.ajaxPOSTRequestHTML(
                    '/content/create/product/step/attributes/',
                    {
                        category_id: $selectedCategoryId,
                    },
                    function (data) {
                        let $form = $('#stepAttributesForm');
                        $form.html(data);

                        $that.initAttributesFormValidator();
                        $that.initUiSelect();
                    },
                    true
                );

            },
            function (data) {
                Services.logToConsole(data);
            },
            true,
            true
        );
    },

    initAttributesFormValidator: function () {
        let $form = $('#stepAttributesForm');

        this.attributeFormValidator = $form.validate();

        if (this.attributeFormValidator !== null) {
            $form.validate().destroy();
        }

        this.attributeFormValidator = $form.validate();

        $('.js-required-attribute').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: 'وارد کردن مقدار برای این فیلد اجباری است',
                }
            });
        });

        $('.js-attribute-old-value').each(function () {
            $(this).rules('add', {
                not_same_as_old_value: true,
                messages: {
                    not_same_as_old_value: 'content.creation.forms.attributes.attributes_id.validation.same_are_moderated',
                }
            });
        });

        $('.js-required-attribute-length').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: 'در طول فقط از \".\" برای ممیز استفاده کنید',
                }
            });
        });

        $('.js-required-attribute-width').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: 'در عرض فقط از \".\" برای ممیز استفاده کنید',
                }
            });
        });

        $('.js-required-attribute-height').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: 'در ارتفاع فقط از \".\" برای ممیز استفاده کنید',
                }
            });
        });

        $('.js-required-attribute-weight').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: 'در وزن فقط از \".\" برای ممیز استفاده کنید',
                }
            });
        });
    },

    initTitleFormValidation: function () {
        let $form = $('#titleForm');
        let rules = {
            'title[title_fa]': {
                required: true,
                minlength: 7,
                maxlength: 255,
                not_same_as_old_value: true
            },
            'title[title_en]': {
                validate_only_english: true,
                minlength: 7,
                maxlength: 255,
                not_same_as_old_value: true
            },
        };

        let messages = {
            'title[title_fa]': {
                'required': 'وارد کردن عنوان فارسی اجباری است',
                'minlength': 'عنوان فارسی وارد شده کوتاه‌تر از حد مجاز است، این عنوان نمی‌تواند کوتاه‌تر از 7 کاراکتر باشد',
                'maxlength': 'عنوان فارسی وارد شده طولانی‌تر از حد مجاز است، این عنوان نمی‌تواند طولانی‌تر از 200 کاراکتر باشد'
            },
            'title[title_en]': {
                'validate_only_english': 'از کاراکترهای انگلیسی برای عنوان انگلیسی استفاده کنید',
                'minlength': 'عنوان انگلیسی وارد شده کوتاه‌تر از حد مجاز است، این عنوان نمی‌تواند کوتاه‌تر از 7 کاراکتر باشد',
                'maxlength': 'عنوان انگلیسی وارد شده طولانی‌تر از حد مجاز است، این عنوان نمی‌تواند طولاتی‌تر از 200 کاراکتر باشد',
            },
        };

        $form.validate().destroy();

        this.productFormValidator = $form.validate({
            rules: rules,
            messages: messages
        });
    },

    initCategoryReset: function () {
        let $that = this;
        $('#categoryReset').on('click', function () {
            $that.searchForCategoryByQuery('');

            $('.js-selected-category')
                .find('li')
                .remove();

            $('#categoriesContainerContent').removeClass('disabled');
            $('#categoryStepNext').addClass('disabled');

            $('#searchKeyword')
                .val('')
                .removeClass('disabled');
        });
    },

    searchForCategoryByQuery: function (query) {
        let $errorContainer = $('#ajaxErrorCategory');
        $errorContainer.html('');
        $errorContainer.addClass('hidden');

        Services.showLoader = function () {
            $('#categoriesContainer').addClass('c-content-loading');
        };

        Services.hideLoader = function () {
            $('#categoriesContainer').removeClass('c-content-loading');
        };

        Services.ajaxPOSTRequestHTML(
            '/content/create/category/search/',
            {
                q: query,
                force_marketplace_seller_id: this.getForceMarketplaceSellerId()
            },
            function (html) {
                let $categoriesContainer = $('#categoriesContainerContent');
                $categoriesContainer.html('');
                $categoriesContainer.html(html);
            },
            true,
            true,
            'execute'
        );
    },

    initProductChanges: function () {
        let $that = this;
        $('#brandsSelect').change(function () {
            let value = $(this).val();
            let $productIsFake = $('#productIsFake');
            if ($productIsFake.length && $productIsFake.prop('checked') && $productIsFake.data('brand-other-id').toString() !== value) {
                $productIsFake.prop('checked', false);
                $that.clearAndDisableFakeReasons();
            }

            if ($that.isContentUser() && !$that.hasForceMarketplaceSeller()) {
                return;
            }

            let $commissionsValueContainer = $('#commissionValueContainer');
            let $commissionsContainer = $('#commissionContainer');

            if (!value) {
                if (!$that.hasForceMarketplaceSeller()) {
                    $commissionsValueContainer.html('');
                    $commissionsContainer.addClass('hidden');
                }
                return;
            }

            Services.showLoader = function () {
                $('#stepProductContainer').addClass('c-content-loading');
            };

            Services.hideLoader = function () {
                $('#stepProductContainer').removeClass('c-content-loading');
            };

            Services.ajaxPOSTRequestJSON(
                '/content/create/product/step/product/commission/',
                {
                    category_id: $('#selectedCategoryIdConfirmed').val(),
                    brand_id: $(this).val(),
                    force_marketplace_seller_id: $that.getForceMarketplaceSellerId()
                },
                /**
                 * @param data
                 * @param data.forceUrl force url to go
                 * @param data.categoryFormValid Product Form is valid
                 * @param data.categoryForm.errors Backend validation errors
                 * @param data.productFormValid Product Form is valid
                 * @param data.productForm.jsErrors Backend validation errors
                 * @param data.productForm.errors Backend validation errors
                 * @param data.attributesFormValid Attribute Form is valid
                 * @param data.attributesForm.jsErrors Backend validation errors
                 * @param data.attributesForm.errors Backend validation errors
                 * @param data.imagesFormValid Images Form is valid
                 * @param data.imagesForm.jsErrors Backend validation errors
                 * @param data.imagesForm.errors Backend validation errors
                 * @param data.images3dFormValid Images3d Form is valid
                 * @param data.images3dForm.jsErrors Backend validation errors
                 * @param data.images3dForm.errors Backend validation errors
                 * @param data.videosFormValid Videos Form is valid
                 * @param data.videosForm.errors Backend validation errors
                 * @param data.productForm.commission Commission value
                 */
                function (data) {
                    $that.handleErrors(data);
                    let $productStepNext = $('#productStepNext');
                    if (typeof data.productFormValid !== 'undefined' && data.productFormValid === false) {
                        if (!$that.hasForceMarketplaceSeller()) {
                            $commissionsValueContainer.html('');
                            $commissionsContainer.addClass('hidden');
                        }
                        $productStepNext.addClass('disabled');
                        return;
                    }
                    if (!$that.hasForceMarketplaceSeller()) {
                        $commissionsValueContainer.html(data.productForm.commission);
                        $commissionsContainer.removeClass('hidden');
                    }

                    $productStepNext.removeClass('disabled');

                },
                function () {
                },
                true,
                true
            );
        });
    },

    initProductFormValidation: function () {
        let $form = $('#stepProductForm');
        let rules = {
            'product[status]': {
                required: true
            },
            'product[product_type]': {
                required: true
            },
            'product[product_nature]': {
                required: true
            },
            'product[site]': {
                required: true
            },
            'product[sensitivity]': {
                required: true
            },
            'product[brand_id]': {
                required: true,
                not_same_as_old_value: true
            },
            'product[model]': {
                minlength: 2,
                maxlength: 255
            },
            'product[category_product_type_id][]': {
                // required: true
            },
            'product[title_alt]': {
                maxlength: 150
            },
            'product[description]': {
                minlength: 150,
                maxlength: 2000,
                not_same_as_old_value: true
            }
        };

        if((!isModuleActive('auto_title_suggestion')) || ($('.js-step-product-title').css('display') !== "none" )) {
            rules['product[title_fa]'] = {
                required: true,
                minlength: 7,
                maxlength: 200,
                not_same_as_old_value: true
            };

            rules['product[title_en]'] = {
                validate_only_english: true,
                minlength: 7,
                maxlength: 200,
                not_same_as_old_value: true
            }
        }


        if (this.dimensionLevel === 'product') {
            rules["product[package_weight]"] = {
                required: !this.isContentUser(),
                digits: true,
                min: (this.dimensionConfig ? (this.dimensionConfig.weight.min) : 1),
                max: (this.dimensionConfig ? (this.dimensionConfig.weight.max) : 9999000)
            };
            rules['product[package_length]'] = {
                required: !this.isContentUser(),
                digits: true,
                min: (this.dimensionConfig ? (this.dimensionConfig.length.min) : 1),
                max: (this.dimensionConfig ? (this.dimensionConfig.length.max) : 20000)
            };
            rules['product[package_width]'] = {
                required: !this.isContentUser(),
                digits: true,
                min: (this.dimensionConfig ? (this.dimensionConfig.width.min) : 1),
                max: (this.dimensionConfig ? (this.dimensionConfig.width.max) : 20000)
            };
            rules['product[package_height]'] = {
                required: !this.isContentUser(),
                digits: true,
                min: (this.dimensionConfig ? (this.dimensionConfig.height.min) : 1),
                max: (this.dimensionConfig ? (this.dimensionConfig.height.max) : 20000)
            };
        }

        let dimensionValidationMessages = {
            width: {
                min: 'عرض بسته‌بندی نمی‌تواند کمتر از 1 سانتیمتر باشد',
                max: 'عرض بسته‌بندی نمی‌تواند بیش از 20000 سانتیمتر باشد'
            },
            height: {
                min: 'ارتفاع بسته‌بندی نمی‌تواند کمتر از 1 سانتیمتر باشد',
                max: 'ارتفاع بسته‌بندی نمی‌تواند بیش از 20000 سانتیمتر باشد'
            },
            length: {
                min: 'طول بسته‌بندی نمی‌تواند کمتر از 1 سانتیمتر باشد',
                max: 'طول بسته‌بندی نمی‌تواند بیش از 20000 سانتیمتر باشد'
            },
            weight: {
                min: 'وزن بسته‌بندی نمی‌تواند کمتر از 1 گرم باشد',
                max: 'وزن بسته‌بندی نمی‌تواند بیش از 9999000 گرم باشد'
            }
        };

        if (this.dimensionConfig) {
            dimensionValidationMessages.width.min = 'ابعاد وارد شده در بازه صحیح ابعاد این گروه کالایی قرار ندارد.';
            dimensionValidationMessages.width.max = 'ابعاد وارد شده در بازه صحیح ابعاد این گروه کالایی قرار ندارد.';
            dimensionValidationMessages.height.min = 'ابعاد وارد شده در بازه صحیح ابعاد این گروه کالایی قرار ندارد.';
            dimensionValidationMessages.height.max = 'ابعاد وارد شده در بازه صحیح ابعاد این گروه کالایی قرار ندارد.';
            dimensionValidationMessages.length.min = 'ابعاد وارد شده در بازه صحیح ابعاد این گروه کالایی قرار ندارد.';
            dimensionValidationMessages.length.max = 'ابعاد وارد شده در بازه صحیح ابعاد این گروه کالایی قرار ندارد.';

            dimensionValidationMessages.weight.min = 'وزن وارد شده در بازه صحیح وزن این گروه کالایی قرار ندارد.';
            dimensionValidationMessages.weight.max = 'وزن وارد شده در بازه صحیح وزن این گروه کالایی قرار ندارد.';
        }

        let messages = {
            'product[status]': {
                'required': 'وارد کردن وضعیت محصول اجباری است'
            },
            'product[product_type]': {
                'required': 'وارد کردن نوع محصول اجباری است'
            },
            'product[product_nature]': {
                'required': 'وارد کردن ماهیت محصول اجباری است'
            },
            'product[site]': {
                'required': 'وارد کردن کانال فروش کالا اجباری است'
            },
            'product[sensitivity]': {
                'required': 'وارد کردن سطح حساسیت محصول اجباری است'
            },
            'product[brand_id]': {
                'required': 'وارد کردن برند کالا اجباری است'
            },
            'product[model]': {
                'minlength': 'مدل وارد شده کوتاه‌تر از حد مجاز است، مدل نمی‌تواند کوتاه‌تر از 2 کاراکتر باشد',
                'maxlength': 'مدل وارد شده طولانی‌تر از حد مجاز است، مدل نمی‌تواند طولاتی‌تر از 255 کاراکتر باشد'
            },
            'product[category_product_type_id][]': {
                'required': 'وارد کردن نوع کالا اجباری است'
            },
            'product[title_alt]': {
                'maxlength': 'عناوین دیگر طولانی‌تر از حد مجاز است، عناوین دیگر نمی‌تواند طولانی‌تر از 200 کاراکترباشد'
            },
            'product[package_weight]': {
                'required': 'وارد کردن وزن بسته‌بندی اجباری است',
                'digits': 'فقط مجاز به وارد کردن عدد  و استفاده از اعداد صحیح برای وزن هستید',
                'min': dimensionValidationMessages.weight.min,
                'max': dimensionValidationMessages.weight.max
            },
            'product[package_length]': {
                'required': 'وارد کردن طول بسته‌بندی اجباری است',
                'digits': 'فقط مجاز به وارد کردن عدد  و استفاده از اعداد صحیح برای طول هستید',
                'min': dimensionValidationMessages.length.min,
                'max': dimensionValidationMessages.length.max
            },
            'product[package_width]': {
                'required': 'وارد کردن عرض بسته‌بندی اجباری است',
                'digits': 'فقط مجاز به وارد کردن عدد  و استفاده از اعداد صحیح برای عرض هستید',
                'min': dimensionValidationMessages.width.min,
                'max': dimensionValidationMessages.width.max
            },
            'product[package_height]': {
                'required': 'وارد کردن ارتفاع بسته‌بندی اجباری است',
                'digits': 'فقط مجاز به وارد کردن عدد  و استفاده از اعداد صحیح برای ارتفاع هستید',
                'min': dimensionValidationMessages.height.min,
                'max': dimensionValidationMessages.height.max
            },
            'product[description]': {
                'minlength': 'متن شرح کوتاه‌تر از حد مجاز است، شرح کالا نمی‌تواند کوتاه‌تر از 150 کاراکتر باشد',
                'maxlength': 'متن شرح طولانی‌تر از حد مجاز است، شرح کالا نمی‌تواند طولانی‌تر از 2000 کاراکتر باشد',
            }
        };

        if((!isModuleActive('auto_title_suggestion')) || ($('.js-step-product-title').css('display') !== "none" )) {

            messages['product[title_fa]'] = {
                'required': 'وارد کردن عنوان فارسی اجباری است',
                'minlength': 'عنوان فارسی وارد شده کوتاه‌تر از حد مجاز است، این عنوان نمی‌تواند کوتاه‌تر از 7 کاراکتر باشد',
                'maxlength': 'عنوان فارسی وارد شده طولانی‌تر از حد مجاز است، این عنوان نمی‌تواند طولانی‌تر از 200 کاراکتر باشد'
            };

            messages['product[title_en]'] = {
                'validate_only_english': 'از کاراکترهای انگلیسی برای عنوان انگلیسی استفاده کنید',
                'minlength': 'عنوان انگلیسی وارد شده کوتاه‌تر از حد مجاز است، این عنوان نمی‌تواند کوتاه‌تر از 7 کاراکتر باشد',
                'maxlength': 'عنوان انگلیسی وارد شده طولانی‌تر از حد مجاز است، این عنوان نمی‌تواند طولاتی‌تر از 200 کاراکتر باشد'
            }
        }

        $form.validate().destroy();

        this.productFormValidator = $form.validate({
            rules: rules,
            messages: messages
        });
    },

    initProductNextStep: function () {
        let $that = this;
        let $form = $('#stepProductForm');

        $('#productStepNext').on('click', function () {
            $form.submit();
            return false;
        });

        $form.on('submit', function () {
            if (!$form.valid()) {
                return false;
            }
            let $tagsSelect = $('.js-textarea-tags-select');

            Services.showLoader = function () {
                $('#stepProductContainer').addClass('c-content-loading');
                $('html').addClass('c-loader-overflow');
            };

            Services.hideLoader = function () {
                $('#stepProductContainer').removeClass('c-content-loading');
                $('html').removeClass('c-loader-overflow');
            };

            let $showAttributeStep = false;
            $.when(Services.ajaxPOSTRequestJSON(
                '/content/create/product/step/product/save/',
                $that.serializeForm(true),
                /**
                 * @param data
                 * @param data.forceUrl force url to go
                 * @param data.categoryFormValid Product Form is valid
                 * @param data.categoryForm.errors Backend validation errors
                 * @param data.productFormValid Product Form is valid
                 * @param data.productForm.jsErrors Backend validation errors
                 * @param data.productForm.errors Backend validation errors
                 * @param data.attributesFormValid Attribute Form is valid
                 * @param data.attributesForm.jsErrors Backend validation errors
                 * @param data.attributesForm.errors Backend validation errors
                 * @param data.imagesFormValid Images Form is valid
                 * @param data.imagesForm.jsErrors Backend validation errors
                 * @param data.imagesForm.errors Backend validation errors
                 * @param data.images3dFormValid Images3d Form is valid
                 * @param data.images3dForm.jsErrors Backend validation errors
                 * @param data.images3dForm.errors Backend validation errors
                 * @param data.videosFormValid Videos Form is valid
                 * @param data.videosForm.errors Backend validation errors
                 */
                function (data) {
                    $tagsSelect.siblings('.error-msg').remove();
                    $tagsSelect.parent().removeClass('has-error');
                    $that.handleErrors(data);

                    if (typeof data.categoryFormValid !== 'undefined'
                        && data.categoryFormValid === true
                        && typeof data.productFormValid !== 'undefined'
                        && data.productFormValid === true
                    ) {
                        $showAttributeStep = true;
                        $('#stepProductAccordion .c-content-progress').removeClass('active failed').addClass('passed');
                        $('#stepAttributesAccordion .c-content-progress').removeClass('passed failed').addClass('active');
                    }
                },
                function () {
                },
                true,
                true
            )).then(function () {
                if (!$showAttributeStep) {
                    return false;
                }
                let $stepContainer = $('#stepAttributesAccordion');
                // $('#stepProductAccordion').removeClass('uk-open');
                $stepContainer.append('<span></span>');
                $stepContainer.removeClass('disabled');
                $stepContainer.addClass('uk-open');

                let $attributesStepNext = $('#attributesStepNext');

                $that.initUiSelect();
                $attributesStepNext.removeClass('hidden');
                $attributesStepNext.removeClass('disabled');
                $that.scrollTo($stepContainer, 55);
            });

            return false;
        });

        $that.initProductFormValidation();

        $('#productIsFake').on('click', function () {
            let $this = $(this);
            if ($this.prop('disabled')) {
                return false;
            }

            if ($this.prop('checked')) {
                let otherBrandId = $this.data('brand-other-id').toString();
                if (!otherBrandId) {
                    return;
                }
                let brandSelectValue = $('#brandsSelect').val();

                if (!brandSelectValue) {
                    $that.changeBrandValue(otherBrandId);
                    if ($that.isContentUser()) {
                        $that.enableFakeReasons();
                    }
                    return;
                } else if (brandSelectValue === otherBrandId) {
                    if ($that.isContentUser()) {
                        $that.enableFakeReasons();
                    }
                    return;
                }
                const confirmModal = window.UIkit.modal('#confirmFakeSelectionBrandChangeModal');
                new Promise(function (resolve, reject) {
                    confirmModal.show();
                    $('.js-accept').on('click', function () {
                        resolve();
                    });
                    $('.js-decline').on('click', function () {
                        reject();
                    });
                }).then(function () {
                    $that.changeBrandValue(otherBrandId);
                    if ($that.isContentUser()) {
                        $that.enableFakeReasons();
                    }
                }).catch(function () {
                    $this.prop('checked', false);
                }).finally(function () {
                    confirmModal.hide();
                });
            } else {
                if ($that.isContentUser()) {
                    $that.clearAndDisableFakeReasons();
                }
            }
        });
    },

    clearAndDisableFakeReasons: function () {
        let $fakeReasonsSelect = $('#fakeReasonsSelect');

        $fakeReasonsSelect.find('option').prop('selected', false);
        $fakeReasonsSelect.prop('disabled', true);
        $fakeReasonsSelect.trigger('change');

        $('#fakeReasonsContainer').addClass('disabled');
    },

    enableFakeReasons: function () {
        let $fakeReasonsSelect = $('#fakeReasonsSelect');

        $fakeReasonsSelect.prop('disabled', false);
        $fakeReasonsSelect.trigger('change.select2');

        $('#fakeReasonsContainer').removeClass('disabled');
    },

    changeBrandValue: function (brandId) {
        let $brandSelect = $('#brandsSelect');

        $brandSelect.find('option[selected="selected"]').prop('selected', false);
        $brandSelect.find('option[value="' + brandId + '"]').prop('selected', true);

        $brandSelect.trigger('change.select2');
        $brandSelect.change();
    },

    initAttributesNextStep: function () {
        let $that = this;
        let $form = $('#stepAttributesForm');

        $('#stepAttributesContainer').on('click', '#attributesStepNext', function () {
            $form.submit();
            return false;
        });

        $form.on('submit', function () {
            if (!$form.valid()) {
                return false;
            }

            Services.showLoader = function () {
                $('#stepAttributesContainer').addClass('c-content-loading');
                $('html').addClass('c-loader-overflow');
            };

            Services.hideLoader = function () {
                $('#stepAttributesContainer').removeClass('c-content-loading');
                $('html').removeClass('c-loader-overflow');
            };

            Services.ajaxPOSTRequestJSON(
                '/content/create/product/step/attributes/save/',
                $that.serializeForm(true, true),
                /**
                 * @param data
                 * @param data.forceUrl force url to go
                 * @param data.categoryFormValid Product Form is valid
                 * @param data.categoryForm.errors Backend validation errors
                 * @param data.productFormValid Product Form is valid
                 * @param data.productForm.jsErrors Backend validation errors
                 * @param data.productForm.errors Backend validation errors
                 * @param data.attributesFormValid Attribute Form is valid
                 * @param data.attributesForm.jsErrors Backend validation errors
                 * @param data.attributesForm.errors Backend validation errors
                 * @param data.imagesFormValid Images Form is valid
                 * @param data.imagesForm.jsErrors Backend validation errors
                 * @param data.imagesForm.errors Backend validation errors
                 * @param data.images3dFormValid Images3d Form is valid
                 * @param data.images3dForm.jsErrors Backend validation errors
                 * @param data.images3dForm.errors Backend validation errors
                 * @param data.videosFormValid Videos Form is valid
                 * @param data.videosForm.errors Backend validation errors
                 */
                function (data) {
                    $that.handleErrors(data);
                    if (typeof data.categoryFormValid !== 'undefined'
                        && data.categoryFormValid === true
                        && typeof data.productFormValid !== 'undefined'
                        && data.productFormValid === true
                        && typeof data.attributesFormValid !== 'undefined'
                        && data.attributesFormValid === true
                    ) {
                        if((!isModuleActive('auto_title_suggestion')) || ($('#stepTitleAccordion').css('display') === "none")) {
                            $('#stepProductAccordion').removeClass('uk-open');
                            $('#stepImagesContent').append('<span></span>'); //dirty fix to open accordion

                            let $stepContainer = $('#stepImagesAccordion');
                            $stepContainer.addClass('uk-open');
                            $stepContainer.removeClass('disabled');
                            $that.scrollTo($stepContainer, 55);
                            $('#saveButton').removeClass('disabled');
                            $('#stepAttributesAccordion .c-content-progress').removeClass('active failed').addClass('passed');
                            $('#stepImagesAccordion .c-content-progress').removeClass('passed failed').addClass('active');

                        } else if(($('#stepTitleAccordion').css('display') !== "none")) {

                            $('.js-suggested-title-fa').html(data.attributesForm.bind.autoTitleSuggestion.fa);
                            $('.js-suggested-title-fa').val(data.attributesForm.bind.autoTitleSuggestion.fa);
                            // $('.js-suggested-title-en').html(data.attributesForm.bind.autoTitleSuggestion.en);
                            // $('.js-suggested-title-en').val(data.attributesForm.bind.autoTitleSuggestion.en);

                            $('#stepAttributesAccordion .c-content-progress').removeClass('active failed').addClass('passed');
                            $('#stepTitleAccordion .c-content-progress').removeClass('passed failed').addClass('active');

                            let $stepContainer = $('#stepTitleAccordion');
                            $('#stepProductAccordion').removeClass('uk-open');
                            $stepContainer.addClass('uk-open');
                            $stepContainer.removeClass('disabled');
                            $stepContainer.append('<span></span>');

                            let $setSubjectStepNext = $('#setSubjectStepNext');
                            $that.initUiSelect();
                            $setSubjectStepNext.removeClass('hidden');
                            $('#editSubjectSuggested').removeClass('hidden');
                            $setSubjectStepNext.removeClass('disabled');
                            $('#editSubjectSuggested').removeClass('disabled');
                            $that.scrollTo($stepContainer, 55);
                        }
                    }
                },
                function () {
                },
                true,
                true
            );

            return false;
        });
    },

    initTitleNextStep: function () {
        let $that = this;
        let $form = $('#titleForm');
        let $confirmBtn = $('#setSubjectStepNext');
        let $cancelBtn = $('#cancelEditSubjectSuggested');
        let $editBtn = $('#editSubjectSuggested');

        $editBtn.on('click', function () {
            $('.js-edite-title-suggested').removeClass('uk-hidden disabled').addClass('uk-open');
            $cancelBtn.removeClass('uk-hidden disabled');
            $editBtn.addClass('uk-hidden')
        });

        $cancelBtn.on('click', function () {
            if($(this).data('edit-mode')) return;
            $('.js-edite-title-suggested').addClass('uk-hidden disabled').removeClass('uk-open');
            $cancelBtn.addClass('uk-hidden disabled');
            $editBtn.removeClass('uk-hidden')
        });

        $('#stepTitleContainer').on('click', '#setSubjectStepNext', function () {
            $('.js-guide-line').addClass('uk-hidden');
            $form.submit();
            return false;
        });

        $form.on('submit', function () {
            if (!$form.valid()) {
                return false;
            }

            Services.showLoader = function () {
                $('#stepTitleContainer').addClass('c-content-loading');
                $('html').addClass('c-loader-overflow');
            };

            Services.hideLoader = function () {
                $('#stepTitleContainer').removeClass('c-content-loading');
                $('html').removeClass('c-loader-overflow');
            };

            Services.ajaxPOSTRequestJSON(
                '/content/create/product/step/title/save/',
                $that.serializeForm(true, true, false, true),
                /**
                 * @param data
                 * @param data.forceUrl force url to go
                 * @param data.categoryFormValid Product Form is valid
                 * @param data.categoryForm.errors Backend validation errors
                 * @param data.productFormValid Product Form is valid
                 * @param data.productForm.jsErrors Backend validation errors
                 * @param data.productForm.errors Backend validation errors
                 * @param data.attributesFormValid Attribute Form is valid
                 * @param data.attributesForm.jsErrors Backend validation errors
                 * @param data.attributesForm.errors Backend validation errors
                 * @param data.imagesFormValid Images Form is valid
                 * @param data.imagesForm.jsErrors Backend validation errors
                 * @param data.imagesForm.errors Backend validation errors
                 * @param data.images3dFormValid Images3d Form is valid
                 * @param data.images3dForm.jsErrors Backend validation errors
                 * @param data.images3dForm.errors Backend validation errors
                 * @param data.videosFormValid Videos Form is valid
                 * @param data.videosForm.errors Backend validation errors
                 */
                function (data) {
                    $that.handleErrors(data);
                    if (typeof data.categoryFormValid !== 'undefined'
                        && data.categoryFormValid === true
                        && typeof data.productFormValid !== 'undefined'
                        && data.productFormValid === true
                        && typeof data.attributesFormValid !== 'undefined'
                        && data.attributesFormValid === true
                    ) {

                        $('#stepAttributesAccordion').removeClass('uk-open');
                        $('#stepImagesContent').append('<span></span>'); //dirty fix to open accordion

                        let $stepContainer = $('#stepImagesAccordion');
                        $stepContainer.addClass('uk-open');
                        $stepContainer.removeClass('disabled');
                        $that.scrollTo($stepContainer, 55);
                        $('#saveButton').removeClass('disabled');
                        $('#stepTitleAccordion .c-content-progress').removeClass('active failed').addClass('passed');
                        $('#stepImagesAccordion .c-content-progress').removeClass('passed failed').addClass('active');
                    }
                },
                function () {
                },
                true,
                true
            );

            return false;
        });

        $that.initTitleFormValidation();
    },

    initImagesNextStep: function () {
        let $form = $('#stepImagesForm');

        this.imagesFormValidator = $form.validate();
    },

    initGetAutoTitleEditMode: function () {
        let $that = this;

        Services.showLoader = function () {
            $('#pageLoader').addClass('c-content-loading');
            $('html').addClass('c-loader-overflow');
        };

        Services.hideLoader = function () {
            $('#pageLoader').removeClass('c-content-loading');
            $('html').removeClass('c-loader-overflow');
        };

        Services.ajaxPOSTRequestJSON(
            '/content/create/product/step/attributes/save/',
            $that.serializeForm(true, true, true),
            /**
             * @param data
             * @param data.forceUrl force url to go
             * @param data.categoryFormValid Product Form is valid
             * @param data.categoryForm.errors Backend validation errors
             * @param data.productFormValid Product Form is valid
             * @param data.productForm.jsErrors Backend validation errors
             * @param data.productForm.errors Backend validation errors
             * @param data.attributesFormValid Attribute Form is valid
             * @param data.attributesForm.jsErrors Backend validation errors
             * @param data.attributesForm.errors Backend validation errors
             * @param data.imagesFormValid Images Form is valid
             * @param data.imagesForm.jsErrors Backend validation errors
             * @param data.imagesForm.errors Backend validation errors
             * @param data.images3dFormValid Images3d Form is valid
             * @param data.images3dForm.jsErrors Backend validation errors
             * @param data.images3dForm.errors Backend validation errors
             * @param data.videosFormValid Videos Form is valid
             * @param data.videosForm.errors Backend validation errors
             */
            function (data) {
                if (data.attributesForm.bind.autoTitleSuggestion) {
                    var $autoTitleField = $('.js-edite-title-suggested');

                    $autoTitleField.data('edit-mode', false);
                    $('.js-edit-mode-suggested-title-fa').val(data.attributesForm.bind.autoTitleSuggestion.fa);
                    $('.js-edit-mode-suggested-title-en').val(data.attributesForm.bind.autoTitleSuggestion.en);
                    if($autoTitleField.hasClass('disabled')) {
                        $autoTitleField.find('.js-suggested-title-fa').val(data.attributesForm.bind.autoTitleSuggestion.fa);
                        $autoTitleField.find('.js-suggested-title-en').val(data.attributesForm.bind.autoTitleSuggestion.en);
                        if($autoTitleField.data('status') === 'draft' || $autoTitleField.data('status') === 'in_review'){
                            $autoTitleField.addClass('uk-hidden');
                        }
                    }

                    $('#cancelEditSubjectSuggested').removeClass('uk-hidden disabled').attr('data-edit-mode', true);
                    $('#setSubjectStepNext').html('تأیید عنوان و ذحیره').removeClass('hidden disabled').attr('data-edit-mode', true);
                    $('#stepProductForm').addClass('disabled');
                    $('#stepAttributesForm').addClass('disabled');
                    $('#categoryStepNext').addClass('disabled').attr('disabled', true);
                    $('#setSubjectStepNext').on('click', function () {
                        if($(this).data('edit-mode')) {
                            $('#saveButton').click();
                            return false;
                        }
                    });
                    $('#cancelEditSubjectSuggested').on('click', function () {
                        if($(this).data('edit-mode')) {
                            $autoTitleField.data('edit-mode', true);
                            $('#cancelEditSubjectSuggested').addClass('uk-hidden disabled').attr('data-edit-mode', false);
                            $('#setSubjectStepNext').addClass('hidden disabled').attr('data-edit-mode', false);
                            $('#stepProductForm').removeClass('disabled');
                            $('#stepAttributesForm').removeClass('disabled');
                            $('#categoryStepNext').removeClass('disabled').attr('disabled', false);
                            $that.scrollTo($('#stepProductAccordion'), 55);
                            $('#saveButton').prop('disabled', false);
                            $('#saveButton').removeClass('disabled');
                            return false;
                        }
                    });
                }
            },
            function () {
            },
            true,
            true
        );
    },

    initSave: function () {
        let $that = this;

        $('#saveButton').on('click', function () {
            if ($that.data.saved) {
                $that.showSuccessModal();
                return false;
            }

            let $this = $(this);
            let $productForm = $('#stepProductForm');
            let $attributeForm = $('#stepAttributesForm');
            let $imagesForm = $('#stepImagesForm');

            if (!$('#selectedCategoryIdConfirmed').val()) {
                let $p = $('<p/>');
                $p.html('وارد کردن گروه کالایی اجباری است');
                $('#ajaxErrorCategory').html($p).removeClass('hidden');
                $that.scrollTo($('#stepCategoryAccordion'), 55);
                return false;
            }

            if (!$productForm.valid()) {
                $that.scrollTo($('#stepProductAccordion'), 55);
                return false;
            }

            if (!$attributeForm.valid()) {
                $that.scrollTo($('#stepAttributesAccordion'), 55);
                return false;
            }

            if(isModuleActive('auto_title_suggestion') && ($('.js-edit-mode-title-fa').val() !== '')) {
                if (!$('#titleForm').valid()) {
                    $that.scrollTo($('#stepTitleAccordion'), 55);
                    return false;
                }
            } else if (isModuleActive('auto_title_suggestion') && ($('.js-edit-mode-title-fa').val() === '') && (!$('.js-edite-title-suggested').data('edit-mode'))) {
                $('.js-edit-mode-title-fa').val($('.js-edit-mode-suggested-title-fa').val());
                $('.js-edit-mode-title-en').val($('.js-edit-mode-suggested-title-en').val());
            }

            if($('.js-product-model').length &&  $('.js-product-model').hasClass('uk-hidden')) {
                if($('.js-model-field').val() === '-' || $('.js-model-field').val() === '/') {
                    $('.js-model-field').val('');
                }
            }

            let $afterModerationErrorImageContainer = $('#afterModerationErrorImageContainer');

            if ($afterModerationErrorImageContainer.length) {
                $that.scrollTo($afterModerationErrorImageContainer, 55);
                return false;
            }

            let hasImageErrors = false;
            let $imagesCount = $('#imagesContainer').find('li').length;

            let $ajaxErrorImages = $('#ajaxErrorImages');

            $ajaxErrorImages.addClass('hidden');

            let $imagesErrorsContainer = $('#imageErrorsContainer');

            $imagesErrorsContainer.html('');
            $imagesErrorsContainer.addClass('hidden');

            let $mainImageErrorContainer = $('#mainImageErrorContainer');

            $mainImageErrorContainer.addClass('hidden');

            if (($that.imagesRequired() || $imagesCount > 0) && $imagesCount < 2) {
                hasImageErrors = true;
                let $div = $('<div/>');
                $div.html('حداقل دو تصویر آپلود کنید');
                $imagesErrorsContainer.append($div);
                $ajaxErrorImages.removeClass('hidden');
            }

            let $mainImageId = $('#mainImageContainer').val();
            if (!hasImageErrors && !$mainImageId && $imagesCount > 0) {
                hasImageErrors = true;

                $mainImageErrorContainer.removeClass('hidden');
                $ajaxErrorImages.removeClass('hidden');
            }

            if (!$imagesForm.valid() || hasImageErrors) {
                $imagesErrorsContainer.removeClass('hidden');
                $that.scrollTo($imagesErrorsContainer, 55);
                return false;
            }

            $that.imagesFormValidator.resetForm();

            $this.prop('disabled', true);
            $this.addClass('disabled');
            Services.showLoader = function () {
                $('#pageLoader').addClass('c-content-loading');
                $('html').addClass('c-loader-overflow');
            };

            Services.hideLoader = function () {
                $('#pageLoader').removeClass('c-content-loading');
                $('html').removeClass('c-loader-overflow');
            };

            if ( $('[data-hide-when-auto-title]').attr('data-hide-when-auto-title') === 'true' ) {
                if ($('.js-edite-title-suggested').length && $('.js-edite-title-suggested').data('edit-mode')) {
                    if (!$('.js-edite-title-suggested').parents('section#stepTitleAccordion').hasClass('disabled')) {
                        $that.initGetAutoTitleEditMode();
                        $that.scrollTo($('#stepTitleAccordion'), 55);
                        return false;
                    }
                }
            }

            Services.ajaxPOSTRequestJSON(
                '/content/create/product/save/',
                $that.serializeForm(true, true, true, true),
                /**
                 * @param data.forceUrl force url to go
                 * @param data.categoryFormValid Product Form is valid
                 * @param data.categoryForm.errors Backend validation errors
                 * @param data.productFormValid Product Form is valid
                 * @param data.productForm.jsErrors Backend validation errors
                 * @param data.productForm.errors Backend validation errors
                 * @param data.attributesFormValid Attribute Form is valid
                 * @param data.attributesForm.jsErrors Backend validation errors
                 * @param data.attributesForm.errors Backend validation errors
                 * @param data.imagesFormValid Images Form is valid
                 * @param data.imagesForm.jsErrors Backend validation errors
                 * @param data.imagesForm.errors Backend validation errors
                 * @param data.images3dFormValid Images3d Form is valid
                 * @param data.images3dForm.jsErrors Backend validation errors
                 * @param data.images3dForm.errors Backend validation errors
                 * @param data.videosFormValid Videos Form is valid
                 * @param data.videosForm.errors Backend validation errors
                 * @param data.save Save data
                 * @param data.save.status Save status
                 * @param data.save.message Save status message
                 * @param data.save.id Id data
                 * @param data.save.redirectTo redirectTo url after product is saved (edit mode only)
                 */
                function (data) {
                    $that.handleErrors(data);
                    let $saveAjaxErrors = $('#saveAjaxErrors');
                    $saveAjaxErrors.html('');
                    $saveAjaxErrors.addClass('hidden');
                    if (typeof data.save !== 'undefined' && typeof data.save.status !== 'undefined') {
                        if (data.save.status === true) {
                            $('#productIdContainer').val(data.save.id);
                            if ($that.isNewMode()) {
                                $that.data.saved = true;
                                let $dkpcText = $('#afterSaveProductId');
                                $dkpcText.text(data.save.id);
                                $that.showSuccessModal();
                                return false;
                            } else {
                                if (data.save.redirectTo !== 'undefined') {
                                    window.location.href = data.save.redirectTo;
                                } else {
                                    window.location.reload();
                                }
                                return false;
                            }
                        } else {
                            $saveAjaxErrors.html('');
                            let $p = $('<p/>');
                            $p.html(data.save.message);
                            $saveAjaxErrors.append($p);
                            $saveAjaxErrors.removeClass('hidden');
                        }
                    }

                    $this.prop('disabled', false);
                    $this.removeClass('disabled');
                },
                function () {
                },
                true,
                true
            );

            return false;
        });
    },

    initVideoSearchView: function () {
        $('#videoSearchKeyword').keyup(function (e) {

            let $value = $(this).val();
            let $videoSuggestionsContainer = $('#videoSuggestionsContainer');
            let $videoSuggestionsList = $('#videoSuggestionsList');

            if ($value.length < 2 || $value.length > 255) {
                if ($value.length < 2) {
                    $videoSuggestionsContainer.addClass('hidden');
                    return;
                }
            }

            if (e.keyCode === 27) {
                $videoSuggestionsContainer.addClass('hidden');
                return false;
            }

            $videoSuggestionsList.html('');

            Services.ajaxPOSTRequestJSON(
                '/content/create/video/search/',
                {
                    q: $value
                },
                function (data) {
                    if (data.length < 1) {
                        $videoSuggestionsContainer.addClass('hidden');
                        return;
                    }

                    $.each(data, function (videoPosition, videoData) {
                        let $suggestionItem = $('#suggestionTemplateVideos > li').clone();

                        $suggestionItem.data('id', videoData.id);
                        $suggestionItem.find('.js-suggestion-img').attr('src', videoData.cover);
                        $suggestionItem.find('.js-suggestion-name').text(videoData.title);
                        $suggestionItem.find('.js-suggestion-id').text(videoData.id);
                        $suggestionItem.find('.js-video-duration').text(videoData.duration);

                        $videoSuggestionsList.append($suggestionItem);
                    });

                    $videoSuggestionsContainer.removeClass('hidden');
                },
                function () {
                },
                true,
                true,
                'execute'
            );
            return false;
        });
    },

    imagesRequired: function () {
        if (this.isContentUser()) {
            return !(this.isNewMode() || this.isEditBeforeSubmitMode())
        } else {
            if (this.isNewMode() || this.isEditBeforeSubmitMode()) {
                let $sellerWillUpload = $('#sellerWillUpload');

                return $sellerWillUpload.length === 0 || $sellerWillUpload.prop('checked') === true;
            }

            return true;
        }
    },

    serializeForm: function (productForm = false, attributesForm = false, imagesForm = false, titleForm = false) {
        let $serializedForms = [];

        if (productForm) {
            let $productForm = $('#stepProductForm');
            if ($productForm.length) {
                $serializedForms = $.merge(
                    $serializedForms,
                    $productForm.serializeArray()
                );
            }
        }

        if (attributesForm) {
            let $attributesForm = $('#stepAttributesForm');
            if ($attributesForm.length) {
                $serializedForms = $.merge(
                    $serializedForms,
                    $attributesForm.serializeArray()
                );
            }
        }

        if (imagesForm) {
            let $imagesForm = $('#stepImagesForm');
            if ($imagesForm.length) {
                let imagesOrder = [];
                $('#imagesContainer').find('li').each(function () {
                    imagesOrder.push($(this).attr('id'));
                });

                $('#imagesOrderContainer').val(imagesOrder.join(','));

                if (this.isContentUser()) {
                    let videosOrder = [];
                    $('#videoContainer').find('li').each(function () {
                        videosOrder.push($(this).data('id'));
                    });

                    $('#videosOrderContainer').val(videosOrder.join(','));
                }

                $serializedForms = $.merge(
                    $serializedForms,
                    $imagesForm.serializeArray()
                );
            }
        }

        if (titleForm && isModuleActive('auto_title_suggestion')) {
            let $titleForm = $('#titleForm');
            if ($titleForm.length) {
                $serializedForms = $.merge(
                    $serializedForms,
                    $titleForm.serializeArray()
                );
            }
        }

        $serializedForms.forEach(function (e) {
            e.value = e.value.split('*').join('x');
        });

        return $serializedForms;
    },

    /**
     * @param data
     * @param data.forceUrl force url to go
     * @param data.categoryFormValid Product Form is valid
     * @param data.categoryForm.errors Backend validation errors
     * @param data.productFormValid Product Form is valid
     * @param data.productForm.jsErrors Backend validation errors
     * @param data.productForm.errors Backend validation errors
     * @param data.attributesFormValid Attribute Form is valid
     * @param data.attributesForm.jsErrors Backend validation errors
     * @param data.attributesForm.errors Backend validation errors
     * @param data.imagesFormValid Images Form is valid
     * @param data.imagesForm.jsErrors Backend validation errors
     * @param data.imagesForm.errors Backend validation errors
     * @param data.imagesForm.globalErrors Backend validation errors
     * @param data.imagesForm.global_main_image Backend validation errors for main image
     * @param data.images3dFormValid Images3d Form is valid
     * @param data.images3dForm.jsErrors Backend validation errors
     * @param data.images3dForm.errors Backend validation errors
     * @param data.videosFormValid Videos Form is valid
     * @param data.videosForm.errors Backend validation errors
     */
    handleErrors: function (data) {
        if (typeof data.forceUrl !== 'undefined') {
            window.location.href = data.forceUrl;
            return;
        }
        let $scrollTo = null;
        let $categoryErrorContainer = $('#ajaxErrorCategory');
        $categoryErrorContainer.addClass('hidden');
        if (typeof data.categoryFormValid !== 'undefined' && data.categoryFormValid !== true) {
            $categoryErrorContainer.html('');
            if (typeof data.categoryForm.errors !== 'undefined') {
                if (typeof data.categoryForm.errors !== 'undefined') {
                    $.each(data.categoryForm.errors, function (messageKey, messageText) {
                        let $p = $('<p/>');
                        $p.html(messageText);
                        $categoryErrorContainer.append($p);
                    });
                }
                $categoryErrorContainer.removeClass('hidden');
                $('#stepCategoryAccordion').addClass('uk-open');
                $scrollTo = $categoryErrorContainer;
            }
        }

        let $productErrorContainer = $('#ajaxErrorProduct');
        $productErrorContainer.html('');
        if (typeof data.productFormValid !== 'undefined' && data.productFormValid !== true) {
            $('#stepCategoryAccordion').addClass('uk-open');
            if (typeof data.productForm.jsErrors !== 'undefined') {
                this.productFormValidator.showErrors(data.productForm.jsErrors);
                if ($scrollTo == null) {
                    $scrollTo = $('#stepProductAccordion');
                }
            } else {
                this.productFormValidator.resetForm();
            }
            if (typeof data.productForm.errors !== 'undefined') {
                Services.logToConsole(data.productForm.errors);
                $.each(data.productForm.errors, function (messageKey, messageText) {
                    let $p = $('<p/>');
                    $p.html(messageText);
                    $productErrorContainer.append($p);
                });
                $productErrorContainer.removeClass('hidden');
                if ($scrollTo == null) {
                    $scrollTo = $productErrorContainer;
                }
            } else {
                $productErrorContainer.addClass('hidden');
            }
        } else {
            $productErrorContainer.addClass('hidden');
            this.productFormValidator.resetForm();
        }

        if (typeof data.attributesFormValid !== 'undefined' && data.attributesFormValid !== true) {
            this.attributeFormValidator.showErrors(data.attributesForm.jsErrors);
            if ($scrollTo == null) {
                $scrollTo = $('#stepAttributesContainer');
            }
        } else {
            if (this.attributeFormValidator !== null) {
                this.attributeFormValidator.resetForm();
            }
        }

        let $stepImagesAccordion = $('#stepImagesAccordion');
        let $imagesAjaxErrorContainer = $('#ajaxErrorImages');
        $imagesAjaxErrorContainer.addClass('hidden');

        let $mainImageErrorContainer = $('#mainImageErrorContainer');
        $mainImageErrorContainer.addClass('hidden');

        let $imagesErrorContainer = $('#imageErrorsContainer');
        $imagesErrorContainer.addClass('hidden');
        $imagesErrorContainer.html('');

        if (typeof data.imagesFormValid !== 'undefined' && data.imagesFormValid !== true) {
            if (typeof data.imagesForm.jsErrors !== 'undefined') {
                this.imagesFormValidator.showErrors(data.imagesForm.jsErrors);
                if ($scrollTo == null) {
                    $scrollTo = $stepImagesAccordion;
                }
            } else {
                this.imagesFormValidator.resetForm();
            }

            if (typeof data.imagesForm.globalErrors !== 'undefined') {
                $imagesAjaxErrorContainer.removeClass('hidden');
                if (typeof data.imagesForm.globalErrors.global_main_image !== 'undefined') {
                    $mainImageErrorContainer.removeClass('hidden');
                    if ($scrollTo == null) {
                        $scrollTo = $imagesAjaxErrorContainer;
                    }
                    delete data.imagesForm.globalErrors.global_main_image;
                }
                if (!$.isEmptyObject(data.imagesForm.globalErrors)) {
                    $imagesErrorContainer.removeClass('hidden');
                    $.each(data.imagesForm.globalErrors, function (messageKey, messageText) {
                        if (messageKey === 'global_main_image') {
                            return;
                        }
                        let $div = $('<div/>');
                        $div.html(messageText);
                        $imagesErrorContainer.append($div);
                    });
                    if ($scrollTo == null) {
                        $scrollTo = $stepImagesAccordion;
                    }
                }
            }

            let $imagesContainer = $('#imagesContainer');

            $imagesContainer.find('li').each(function () {
                $(this).find('ul.js-upload-error-list:first').html('');
                $(this).find('ul.js-upload-error-list:first').css('display', 'none');
            });

            if (typeof data.imagesForm.errors !== 'undefined') {
                Services.logToConsole(data.imagesForm.errors);
                $.each(data.imagesForm.errors, function (elementId, errorText) {
                    let $errorsContainer = $('#' + elementId).find('ul.js-upload-error-list:first');
                    let $li = $('<li/>');
                    $li.text(errorText);
                    $errorsContainer.append($li);
                    $errorsContainer.css('display', 'block');
                });
                if ($scrollTo == null) {
                    $scrollTo = $imagesErrorContainer;
                }
            }
        } else {
            $imagesErrorContainer.addClass('hidden');
            this.imagesFormValidator.resetForm();
        }


        if ($scrollTo) {
            this.scrollTo($scrollTo, 55);
        }
    },

    scrollTo: function (element, topOffset) {
        $('html, body').animate({
            scrollTop: element.offset().top - topOffset
        }, 500);
    },

    initImagesUpload: function () {
        let counter = 1;
        let $allFiles = [];
        let $that = this;
        let $uploadGalleryContainer = $('#uploadGalleryContainer');

        window.UIkit.upload($uploadGalleryContainer, {
            url: '/content/create/product/step/images/upload/images/',
            multiple: true,
            concurrent: 1,
            beforeSend: function (environment) {
                $that.data.galleryRequests.push(environment.xhr);
                environment.data.append('slot', counter++);
            },
            beforeAll: function () {
                $('#ajaxErrorImages')
                    .addClass('hidden');

                let $file = arguments[1];
                let _URL = window.URL || window.webkitURL;
                const $uploadingSection = $('#imagesLoadingSection');
                const $uploadsList = $('#imagesUploadList');

                for (let i = 0; i < $file.length; i++) {
                    $allFiles.push($file[i]);
                }

                $uploadingSection.removeClass('hidden');
                for (let i = $allFiles.length - $file.length; i < $allFiles.length; i++) {
                    let $uploadsItem = $('#uploadingTemplate > li').clone();
                    let $img = new Image;
                    let $cfPreview = $uploadsItem.find('.js-cf-upload-preview');

                    $img.src = _URL.createObjectURL($allFiles[i]);

                    $uploadsItem.appendTo($uploadsList);
                    $uploadsItem.attr('id', 'uploadedFileId_' + (i + 1));
                    $uploadsItem.find('select').addClass('js-select-origin');
                    if ($cfPreview) {
                        $cfPreview.attr('href', $img.src);
                    }
                    $uploadsItem.find('.js-upload-thumb').attr('src', $img.src);
                    $uploadsItem.find('.js-upload-name').text($allFiles[i].name);
                    $uploadsItem.find('.js-upload-size').text(Math.round($allFiles[i].size / 1024) + ' KB');
                }
                $that.initUiSelect();
                $('.js-uploading-section').show();
            },
            load: function () {
            },
            error: function () {
            },
            complete: function () {
                let result = JSON.parse(arguments[0].response);

                let $uploadFileSection = $('#uploadedFileId_' + result.data.slot);

                let $errorsSection = $uploadFileSection.find('ul.js-upload-error-list:first');
                $errorsSection.html('');
                $errorsSection.removeClass('has-error');
                /**
                 * @param result
                 * @param result.data.errors errors related to image validation
                 * @param result.data.error_server error related to cloud upload
                 */
                if (typeof result.data.errors !== 'undefined') {
                    $uploadFileSection.addClass('has-error');
                    $.each(result.data.errors, function (messageKey, messageText) {
                        let $li = $('<li/>');
                        $li.html(messageText);
                        $errorsSection.append($li);
                    });
                    $uploadFileSection.find('.js-refresh-upload').remove();
                    return;
                }

                if (typeof result.data.error_server !== 'undefined') {
                    $uploadFileSection.addClass('has-error');
                    let $li = $('<li/>');
                    $li.html(result.data.error_server);
                    $errorsSection.append($li);
                    return;
                }

                let $imagesSection = $('#imagesSection');
                let $imagesContainer = $('#imagesContainer');
                $imagesSection.removeClass('hidden');

                let $loader = $uploadFileSection.find('.c-content-upload__img-loader');
                $loader.fadeOut('fast');

                $imagesContainer.append($uploadFileSection);
                $uploadFileSection.find('.ui-select__container').removeClass('disabled');

                let $imageInput = $uploadFileSection.find('.js-image-id-input:first');
                let $idKeyPrefix = !$that.isNewMode() ? 'new_' : '';

                $imageInput.attr('name', 'images[' + $idKeyPrefix + 'images][]');
                $imageInput.val(result.data.id);
                $uploadFileSection.prop('id', $idKeyPrefix + result.data.id);
                $uploadFileSection.attr('data-image-id', result.data.id);

                if ($that.isContentUser()) {
                    let $imageTypeSelect = $uploadFileSection.find('.js-image-type-select:first');
                    $imageTypeSelect.attr('name', 'images[type_' + $idKeyPrefix + result.data.id + ']');

                    let $imageActiveCheckbox = $uploadFileSection.find('.js-image-active-checkbox:first');
                    $imageActiveCheckbox.attr('name', 'images[active_' + $idKeyPrefix + result.data.id + ']');

                    let $imageWatermarkCheckbox = $uploadFileSection.find('.js-image-watermark-checkbox:first');
                    $imageWatermarkCheckbox.attr('name', 'images[watermark_' + $idKeyPrefix + result.data.id + ']');

                    let $imageCopyrightCheckbox = $uploadFileSection.find('.js-image-copyright-checkbox:first');
                    $imageCopyrightCheckbox.attr('name', 'images[copyright_' + $idKeyPrefix + result.data.id + ']');
                }

                $that.initDragOrderUi($uploadFileSection);

                let $uploadingSection = $('#imagesLoadingSection');

                if ($uploadingSection.find('.js-uploads-row').length < 1) {
                    $uploadingSection.hide();
                }

                if ( window.isModuleActive('marketplace_send_image_to_ai') ) {
                    IndexAction.sendPhotoToAI(result);
                }
            },
            loadStart: function () {
            },
            progress: function () {
            },
            loadEnd: function () {
            },
            completeAll: function () {
                Services.logToConsole('uploaded');
            }
        });
    },

    checkForPhotoAiIssue:function(id,url){
        IndexAction.sendPhotoToAI({
            data: {
                id: id,
                url: url
            }
        }, true);
    }
    ,
    sendPhotoToAI: function (res, isMain = false) {
        const reqData = {
            url: res.data.url,
            image_id: res.data.id,
            is_main: isMain
        };

        const $imageContainer = $(`[data-image-id="${res.data.id}"]`);

        $imageContainer.find('.js-ai-checking-loading').removeClass('uk-hidden').addClass('uk-flex');


        Services.ajaxPOSTRequestJSON('/content/send/image/ai/', reqData, function (res) {
            $imageContainer.find('.js-ai-checking-loading').removeClass('uk-flex').addClass('uk-hidden');
            $imageContainer.find('.js-ai-checking-succeeded').removeClass('uk-hidden').addClass('uk-flex');
            IndexAction.showPhotoAIErrors(res);
        }, function () {
            $imageContainer.find('.js-ai-checking-loading').removeClass('uk-flex').addClass('uk-hidden');
            $imageContainer.find('.js-ai-checking-failed').removeClass('uk-hidden').addClass('uk-flex');
        });
    },


    errorOnBoth : function(err){
        const type11 = err.includes("واترمارک")
        const type12 = err.includes("آدرس") &&err.includes("گارانتی")
        const type73 = err.includes("کیفیت") &&err.includes("مات")
        return type11 ||type12||type73
    },

    showPhotoAIErrors: function (errors) {
        Object.keys(errors).forEach(function (errorKey) {
            const $errorsContainer = $(`[data-image-id=${errorKey}]`).find('.js-upload-error-list');
            if(isModuleActive("marketplace_content_create_fake_policy_confirm")){
                $errorsContainer.empty();
                const $isPrimary = $errorsContainer.closest(".js-uploads-row").hasClass("primary")

                const imageErrors = errors[errorKey];
                $errorsContainer.css({ display: imageErrors.length ? 'block' : 'none'})
                imageErrors.forEach(function (error) {
                    if(!$isPrimary && !IndexAction.errorOnBoth(error) ){ }
                    else{
                        $errorsContainer.append(`<li>${error}</li>`);
                    }
                });

            }else{
                const imageErrors = errors[errorKey];
                $errorsContainer.css({ display: imageErrors.length ? 'block' : 'none'})
                imageErrors.forEach(function (error) {
                    $errorsContainer.append(`<li>${error}</li>`);
                });
            }

        });
    },

    initImages3dUpload: function () {
        let $that = this;
        let $this = $('#upload3dTrigger');
        let $uploadsList = $('#upload3dContainer');
        let $uploadsItem;

        window.UIkit.upload($this, {
            url: '/content/create/product/step/images/upload/images3d/',
            beforeSend: function (environment) {
                $that.data.fileRequests = environment.xhr;
            },
            beforeAll: function () {
                let $file = arguments[1][0];

                $uploadsItem = $('#uploadingTemplate3d > li').clone();

                if ($uploadsList[0].hasChildNodes()) {
                    $uploadsList.find('li').remove();
                }

                $uploadsItem.appendTo($uploadsList);
                $this.addClass('hidden');
                $uploadsItem.attr('id', 'upload3dItem').addClass('loading');
                $uploadsItem.find('.js-upload-name').text($file.name);
                $uploadsItem.find('.js-upload-size').text(Math.round($file.size / 1024) + ' KB');
            },
            load: function () {
            },
            error: function () {
            },
            complete: function () {
                let result = JSON.parse(arguments[0].response);

                if (!result.status) {
                    return;
                }

                let hasError = false;
                let $errorsSection = $uploadsItem.find('ul.js-upload-error-list:first');
                $errorsSection.html('');
                $errorsSection.removeClass('has-error');
                /**
                 * @param result
                 * @param result.data.errors errors related to image validation
                 * @param result.data.error_server error related to cloud upload
                 */
                if (typeof result.data.errors !== 'undefined') {
                    hasError = true;
                    $uploadsItem.addClass('has-error');
                    $.each(result.data.errors, function (messageKey, messageText) {
                        let $li = $('<li/>');
                        $li.html(messageText);
                        $errorsSection.append($li);
                    });
                    $uploadsItem.find('.js-refresh-upload').remove();
                }

                if (!hasError && typeof result.data.error_server !== 'undefined') {
                    hasError = true;
                    $uploadsItem.addClass('has-error');
                    let $li = $('<li/>');
                    $li.html(result.data.error_server);
                    $errorsSection.append($li);
                }

                if (!hasError) {
                    $('#image3dId').val(result.data.id);
                }

                $uploadsItem.removeClass('loading');
                $uploadsItem.find('.js-img-loader').fadeOut('fast');
            },
            loadStart: function () {
            },
            progress: function () {
            },
            loadEnd: function () {
            },
            completeAll: function () {
            }
        });
    },

    initSortableFiles: function () {
        $('.js-sortable-list').each(function () {
            let $this = $(this);

            window.UIkit.sortable($this, {
                handle: '.c-content-upload__drag-handler--outer',
            });
            $this.on('moved', function () {
                $('.js-uploads-row.primary').each(function () {
                    $(this).prependTo($(this).parent('.js-sortable-list'))
                });

                let $rows = $this.find('.c-content-upload__gallery-row:not(.primary):not(.afterimage):not(.loading):not(.has-error)');
                $rows.removeClass('first last').first().addClass('first');
                $rows.last().addClass('last');
            })
        });
    },

    initUploadsControlsHandler: function () {
        let $that = this;

        $(document).on('click', '.js-remove-upload', function () {
            let $isInLoadingSection = $(this).closest('.js-uploading-section');
            let $section = $(this).closest('.c-content-upload__uploads');
            let $row = $(this).closest('.js-uploads-row');

            if ($isInLoadingSection.length > 0) {
                $row.remove();
            }

            if ($section.find('.js-uploads-row').length < 1) {
                $section.hide();
            }

            $row.removeClass('primary').addClass('afterimage');

            if ($row.attr('id') === 'upload3dItem') {
                $('#upload3dTrigger').removeClass('hidden');
                $('#image3dId').prop('disabled', true);
            } else {
                $row.find('.js-image-id-input:first').prop('disabled', true);
                if(isModuleActive('not_production') && $('#videoContainer').find('.js-video-id-input').length < 2) {
                    $row.find('.js-video-id-input:first').attr('name', 'videos[videos]')
                    $row.find('.js-video-id-input:first').val('');
                } else {
                    $row.find('.js-video-id-input:first').prop('disabled', true);
                }
            }

            $that.initDragOrderUi(this);
        });

        $(document).on('click', '.js-remove-all', function () {
            let $section = $(this).closest('.js-edit-uploads-section');
            let $selected = $section.find('input[type=checkbox]:checked');
            $selected.closest('.js-uploads-row').remove();

            if ($section.find('.js-uploads-row').length < 1) {
                $section.hide();
            }
        });

        $(document).on('click', '.js-cancel-upload', function () {
            let $this = $(this);
            let $section = $this.closest('.c-content-upload__uploads');
            let is3dImage = $this.closest('#upload3dContainer').length > 0;
            let slot = $this.closest('.js-uploads-row').attr('id').split('_')[1];

            if (is3dImage) {
                $that.data.fileRequests.abort();
                $('#upload3dTrigger').removeClass('hidden');
            } else {
                if (typeof $that.data.galleryRequests[slot - 1] === 'undefined') {
                    return;
                }
                $that.data.galleryRequests[slot - 1].abort();
            }
            $(this).closest('.js-uploads-row').remove();

            if ($section.find('.js-uploads-row').length < 1) {
                $section.hide();
            }
        });



        $(document).on('click', '.js-flag-primary', function () {
            let $imageLi = $(this).closest('.js-uploads-row');
            const $imageLiId  =$imageLi.attr('data-image-id')
            const $imageLiUrl  =$imageLi.attr('data-image-url')
            let $mainImageContainer = $('#mainImageContainer');
            if ($imageLi.hasClass('primary')) {
                $imageLi.removeClass('primary');
                $imageLi.find('.js-flag-primary:first').removeClass('checked');
                $imageLi.find('.js-image-options:first').removeClass('hidden');
                $mainImageContainer.val('');
                $that.initDragOrderUi(this);
                if(isModuleActive("marketplace_content_create_fake_policy_confirm")) {
                    IndexAction.checkForPhotoAiIssue($imageLiId, $imageLiUrl)
                }
                return;
            }

            let $imagesContainer = $('#imagesContainer');
            $imagesContainer.find('li').removeClass('primary');
            $imagesContainer.find('.js-flag-primary:first').removeClass('checked');
            $imagesContainer.find('.js-image-options:first').removeClass('hidden');
            $imageLi.addClass('primary');
            $imageLi.find('.js-image-options:first').addClass('hidden');
            $imagesContainer.prepend($imageLi);
            $mainImageContainer.val($imageLi.prop('id'));

            $imageLi.removeClass('afterimage');

            $that.initDragOrderUi(this);
            if ( window.isModuleActive('marketplace_send_image_to_ai') ) {
                IndexAction.checkForPhotoAiIssue($imageLiId,$imageLiUrl )
            }
        });

        $(document).on('click', '.js-undo-remove', function () {
            let $row = $(this).closest('.js-uploads-row');
            $row.removeClass('afterimage');

            if ($row.attr('id') === 'upload3dItem') {
                $('#upload3dTrigger').addClass('hidden');
                $('#image3dId').prop('disabled', false);
            } else {
                $row.find('.js-image-id-input:first').prop('disabled', false);
                if(isModuleActive('not_production')) {
                    $row.find('.js-video-id-input:first').val($row.find('.js-video-id-input:first').data('id'));
                } else {
                    $row.find('.js-video-id-input:first').prop('disabled', false);
                }
            }

            $that.initDragOrderUi(this);
        });
    },


    initProgressLoaderCircle: function (selector, value) {
        let circumference = 2 * Math.PI * 16;

        selector.style.strokeDashoffset = circumference * (1 - value / 100);
        selector.style.strokeDasharray = circumference;
    },

    initSelectVideosHandler: function () {
        let $that = this;

        $(document).on('click', '.js-video-suggestion', function () {
            let $this = $(this);
            let id = $this.find('.js-suggestion-id').text();
            let $suggestionItem = $('#uploadingTemplateVideos > li').clone();
            let $videoContainer = $('#videoContainer');
            let existingVideos = [];

            $videoContainer.find('.js-video-id').each(function () {
                existingVideos.push($(this).text());
            });

            if (existingVideos.includes(id)) {
                return;
            }

            $suggestionItem.find('.js-video-img').attr('src', $this.find('.js-suggestion-img').attr('src'));
            $suggestionItem.find('.js-video-name').text($this.find('.js-suggestion-name').text());
            $suggestionItem.find('.js-video-id').text(id);
            $suggestionItem.find('.js-video-duration').text($this.find('.js-video-duration').text());
            $suggestionItem.find('.js-video-id-input').val(id);
            $suggestionItem.data('id', id);

            $videoContainer.append($suggestionItem);

            $('#selectedVideosSection').removeClass('hidden');

            $this.addClass('added');
            $that.initDragOrderUi($videoContainer);

            $('#videoSuggestionsContainer').addClass('hidden');
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('#videoSuggestionsContainer').length) {
                $('#videoSuggestionsContainer').addClass('hidden');
            }
        })
    },

    initImagesOwnerHandler: function () {
        $('.js-images-owner').change(function () {
            if ($(this).val() === '0') {
                $('#imagesSelfServiceContainer').addClass('hidden');
                $('#imagesDKServiceContainer').removeClass('hidden');
            } else {
                $('#imagesDKServiceContainer').addClass('hidden');
                $('#imagesSelfServiceContainer').removeClass('hidden');
            }
        })
    },

    initDragOrderUi: function (trigger) {
        if (!trigger) {
            let $containers = [$('#imagesContainer'), $('#videoContainer')];
            $containers.forEach(function (e) {
                let $rows = $(e).closest('.js-sortable-list').find('.c-content-upload__gallery-row:not(.primary):not(.afterimage)');
                $rows.removeClass('first last').first().addClass('first');
                $rows.last().addClass('last');
            });
            return;
        }
        let $rows = $(trigger).closest('.js-sortable-list').find('.c-content-upload__gallery-row:not(.primary):not(.afterimage)');
        $rows.removeClass('first last').first().addClass('first');
        $rows.last().addClass('last');
    },

    initSwapArrPositions: function () {
        let $that = this;
        $(document).on('click', '.js-sort-up', function () {
            const $parentRow = $(this).closest('.js-uploads-row');
            const $sortableList = $(this).closest('.js-sortable-list').find('.c-content-upload__gallery-row:not(.primary):not(.afterimage)');
            const arrIndex = $sortableList.index($parentRow);

            if (arrIndex > 0) {
                $parentRow.insertBefore($sortableList[arrIndex - 1]);
                $that.initDragOrderUi($(this));
            }
        });
        $(document).on('click', '.js-sort-down', function () {
            const $parentRow = $(this).closest('.js-uploads-row');
            const $sortableList = $(this).closest('.js-sortable-list').find('.c-content-upload__gallery-row:not(.primary):not(.afterimage)');
            const arrIndex = $sortableList.index($parentRow);

            if (arrIndex < $sortableList.length - 1) {
                $parentRow.insertAfter($sortableList[arrIndex + 1]);
                $that.initDragOrderUi($(this));
            }
        });
    },

    initConfirmNewCategory: function () {
        $(document).on('click', '#newCategoryConfirmBtn', function () {
            const confirmModal = window.UIkit.modal('#newCategoryConfirmModal');
            new Promise(function (resolve, reject) {
                confirmModal.show();
                $('.js-accept').on('click', function () {
                    resolve();
                });
                $('.js-decline').on('click', function () {
                    reject();
                });
            }).then(function () {
            }).catch(function () {
            }).finally(function () {
                confirmModal.hide();
            });

            return false;
        })
    },

    initNewBrandRequestModal: function () {
        let $that = this;
        let $originRadios = $('.js-brand-origin');
        $originRadios.change(function () {
            let $selectedOrigin = $originRadios.filter(function () {
                return $(this).prop('checked');
            });

            if ($selectedOrigin.val() === 'iranian') {
                $('#iranianBrandContainer1').removeClass('hidden');
                $('#iranianBrandContainer2').removeClass('hidden');
                $('#foreignBrandContainer1').addClass('hidden');
            } else {
                $('#iranianBrandContainer1').addClass('hidden');
                $('#iranianBrandContainer2').addClass('hidden');
                $('#foreignBrandContainer1').removeClass('hidden');
            }
        });


        let $form = $('#newBrandRequestForm');
        let $ajaxBrandErrorsList = $('#ajaxBrandErrorsList');

        let $formValidator = $form.validate({
            rules: {
                'brand[name_fa]': {
                    required: true,
                    minlength: 2,
                    maxlength: 255,
                    persian_letters_only: true
                },
                'brand[name_en]': {
                    required: true,
                    minlength: 2,
                    maxlength: 255,
                    english_letters_only: true
                },
                'brand[description]': {
                    required: true,
                    minlength: 100,
                    maxlength: 750
                },
                'brand[origin]': {
                    required: true
                },
                'brand[site]': {
                    required: $that.isContentUser()
                },
                'brand[url]': {
                    required: function () {
                        let $originRadios = $('.js-brand-origin');
                        let $selectedOrigin = $originRadios.filter(function () {
                            return $(this).prop('checked');
                        });

                        return $selectedOrigin.val() === 'foreign';
                    },
                    minlength: 5,
                    maxlength: 255
                },
                'brand[logo_id]': {
                    required: true
                },
                'brand[registration_image_id]': {
                    required: function () {
                        let $originRadios = $('.js-brand-origin');
                        let $selectedOrigin = $originRadios.filter(function () {
                            return $(this).prop('checked');
                        });

                        return $selectedOrigin.val() === 'iranian' && $('#registrationUrlValue').val().length < 5;
                    }
                },
                'brand[registration_url]': {
                    required: function () {
                        let $originRadios = $('.js-brand-origin');
                        let $selectedOrigin = $originRadios.filter(function () {
                            return $(this).prop('checked');
                        });

                        return $selectedOrigin.val() === 'iranian' && $('#registrationImageTempId').val().length === 0;
                    },
                    minlength: 5,
                    maxlength: 255
                },
            },
            messages: {
                'brand[name_fa]': {
                    'required': 'وارد کردن عنوان فارسی برند اجباری است',
                    'minlength': 'عنوان فارسی برند نمی‌تواند کوتاه‌تر از 2 کاراکتر باشد',
                    'maxlength': 'عنوان فارسی برند نمی‌تواند طولانی‌تر از 255 کاراکتر باشد',
                    'persian_letters_only': 'تنها حروف فارسی مجاز است'
                },
                'brand[name_en]': {
                    'required': 'وارد کردن عنوان انگلیسی برند اجباری است',
                    'minlength': 'عنوان انگلیسی برند نمی‌تواند کوتاه‌تر از 2 کاراکتر باشد',
                    'maxlength': 'عنوان فارسی برند نمی‌تواند طولانی‌تر از 255 کاراکتر باشد',
                    'english_letters_only': 'تنها حروف انگلیسی مجاز است'
                },
                'brand[description]': {
                    'required': 'وارد کردن شرح برای برند اجباری است',
                    'minlength': 'متن وارد شده برای شرح برند نمی‌تواند کوتاه‌تر از 100 کاراکتر باشد',
                    'maxlength': 'متن وارد شده برای شرح برند نمی‌تواند طولانی‌تر از 750 کاراکتر باشد',
                },
                'brand[site]': {
                    'required': 'وارد کردن محل نمایش برند اجباری است'
                },
                'brand[url]': {
                    'required': 'وارد کردن آدرس اینترنتی اجباری است',
                    'minlength': 'آدرس وارد شده نمی‌تواند کوتاه‌تر از 5 کاراکتر باشد',
                    'maxlength': 'آدرس وارد شده نمی‌تواند طولانی‌تر از 255 کاراکتر باشد',
                },
                'brand[logo_id]': {
                    'required': 'آپلود کردن لوگو برای برند اجباری است'
                },
                'brand[registration_image_id]': {
                    'required': 'آپلود تصویر برگه ثبت برند اجباری است'
                },
                'brand[registration_url]': {
                    'required': 'وارد کردن آدرس اینترنتی ثبت برند اجباری است',
                    'minlength': 'آدرس وارد شده نمی‌تواند کوتاه‌تر از 5 کاراکتر باشد',
                    'maxlength': 'آدرس وارد شده نمی‌تواند طولانی‌تر از 255 کاراکتر باشد',
                },
            }
        });

        const confirmModal = window.UIkit.modal('#newBrandRequestModal', {
            bgClose: false,
        });

        $('#cancelBrandRequestButton').click(function () {
            confirmModal.hide();
        });

        $('#saveBrandRequestButton').click(function () {
            if ($('[name="brand[product_id]"]').val()) {
                confirmModal.hide();
                let $brandSelect = $('#brandsSelect');
                $brandSelect.change();

                return;
            }

            if (!$form.valid()) {
                return;
            }

            let $this = $(this);

            let $modalContainer = $('#newBrandRequestModalContent');

            $ajaxBrandErrorsList.addClass('hidden');
            $ajaxBrandErrorsList.html('');

            $('#newBrandRequestCategoryIdContainer').val($('#selectedCategoryIdConfirmed').val());

            Services.showLoader = function () {
                $modalContainer.addClass('c-content-loading');
                $this.addClass('disabled');
            };

            Services.hideLoader = function () {
                $modalContainer.removeClass('c-content-loading');
                $this.removeClass('disabled');
            };

            Services.ajaxPOSTRequestJSON(
                '/content/request/brand/save/',
                $form.serializeArray(),
                function () {
                    confirmModal.hide();
                },
                function (data) {
                    Services.logToConsole(data);
                    if (typeof data.globalErrors !== 'undefined') {
                        $.each(data.globalErrors, function (messageKey, messageText) {
                            let $div = $('<div/>');
                            $div.html(messageText);
                            $ajaxBrandErrorsList.append($div);
                        });
                        $ajaxBrandErrorsList.removeClass('hidden');
                        $that.scrollTo($ajaxBrandErrorsList, 55);
                    }

                    if (typeof data.jsErrors !== 'undefined') {
                        $formValidator.showErrors(data.jsErrors);
                    } else {
                        $formValidator.resetForm();
                    }
                },
                true,
                true
            );
        });

        $('#newBrandRequestModalBtn').click(function () {
            $that.resetBrandRequestModal();
            confirmModal.show();
            $formValidator.resetForm();
        });
    },

    resetBrandRequestModal: function() {
        let $form = $('#newBrandRequestForm');
        let $ajaxBrandErrorsList = $('#ajaxBrandErrorsList');

        $form[0].reset();
        $ajaxBrandErrorsList.addClass('hidden');
        $ajaxBrandErrorsList.html('');
        $('#iranianBrandContainer').prop('checked', true).change();
        $('#newBrandSheetUploadPreview').prop('src', '');
        $('#newBrandSheetUpload').addClass('empty');
        $('#registrationImageTempId').val('');
        $('#newBrandLogoUploadPreview').prop('src', '');
        $('#newBrandLogoUpload').addClass('empty');
        $('#logoImageTempId').val('');
        $('[name="brand[product_id]"]').val('');
        $('[name="brand[description]"]').html('');
        $('#foreignBrandContainer1').removeClass('disabled');
        $('#iranianBrandContainer1').removeClass('disabled');
        $('#iranianBrandContainer2').removeClass('disabled');
        $('#newBrandRequestSitesSelect').parent().removeClass('disabled');
        $('#brandOrigin').removeClass('disabled');
        $('#iranianBrandLogo').removeClass('disabled');
        $('#brandDescription').removeClass('disabled');
        $('#newBrandRequestForm .js-autosuggest-box').removeClass('disabled');
        $('#brandSuggestBtnLabel').addClass('hidden');
        $('#brandRequestBtnLabel').removeClass('hidden');
        $('#resetBrandRequestBtn').addClass('hidden');
        $('.js-autosuggest-box').removeClass('has-error');
    },

    initBrandFromReset: function () {
        $('#resetBrandRequestBtn').click(this.resetBrandRequestModal);
    },

    showSuccessModal: function () {
        const confirmModal = window.UIkit.modal('#afterProductSaveModal', {
            bgClose: false,
            escClose: false,
        });
        confirmModal.show();
    },

    initBrandLogoUpload: function () {
        let $newBrandLogoUpload = $('#newBrandLogoUpload');
        let $previewImg = $('#newBrandLogoUploadPreview');
        let $errorsSection = $('#newBrandLogoUploadErrors');
        window.UIkit.upload($newBrandLogoUpload, {
            url: '/content/request/brand/logo/upload/',
            beforeSend: function () {
                $errorsSection.html('');
            },
            beforeAll: function () {
                $newBrandLogoUpload.addClass('loading');
                $errorsSection.html('');
            },
            load: function () {
            },
            error: function () {
            },
            complete: function () {
                let result = JSON.parse(arguments[0].response);
                if (typeof result.status === 'undefined') {
                    return;
                }
                $errorsSection.html('');
                $errorsSection.addClass('hidden');
                /**
                 * @param result
                 * @param result.data.errors errors related to image validation
                 * @param result.data.error_server error related to cloud upload
                 */
                if (typeof result.data.errors !== 'undefined') {
                    $.each(result.data.errors, function (messageKey, messageText) {
                        let $div = $('<div/>');
                        $div.html(messageText);
                        $errorsSection.append($div);
                    });
                    $errorsSection.removeClass('hidden');
                    $newBrandLogoUpload.removeClass('loading');
                    return;
                }

                if (typeof result.data.error_server !== 'undefined') {
                    let $div = $('<div/>');
                    $div.html(result.data.error_server);
                    $errorsSection.append($div);
                    $errorsSection.removeClass('hidden');
                    $newBrandLogoUpload.removeClass('loading');
                    return;
                }
                $newBrandLogoUpload.removeClass('empty loading');
                $previewImg.attr('src', result.data.url);
                $('#logoImageTempId').val(result.data.id);
            },
            loadStart: function () {
            },
            progress: function () {
            },
            loadEnd: function () {
            },
            completeAll: function () {
            }
        });

    },

    initBrandSheetUpload: function () {
        let $newBrandSheetUpload = $('#newBrandSheetUpload');
        let $previewImg = $('#newBrandSheetUploadPreview');
        let $errorsSection = $('#newBrandRegistrationImageUploadErrors');
        window.UIkit.upload($newBrandSheetUpload, {
            url: '/content/request/upload/',
            beforeSend: function () {
                $errorsSection.html('');
            },
            beforeAll: function () {
                $newBrandSheetUpload.addClass('loading');
                $errorsSection.html('');
            },
            load: function () {
            },
            error: function () {
            },
            complete: function () {
                let result = JSON.parse(arguments[0].response);
                if (typeof result.status === 'undefined') {
                    return;
                }
                $errorsSection.html('');
                $errorsSection.addClass('hidden');
                /**
                 * @param result
                 * @param result.data.errors errors related to image validation
                 * @param result.data.error_server error related to cloud upload
                 */
                if (typeof result.data.errors !== 'undefined') {
                    $.each(result.data.errors, function (messageKey, messageText) {
                        let $div = $('<div/>');
                        $div.html(messageText);
                        $errorsSection.append($div);
                    });
                    $errorsSection.removeClass('hidden');
                    $newBrandSheetUpload.removeClass('loading');
                    return;
                }

                if (typeof result.data.error_server !== 'undefined') {
                    let $div = $('<div/>');
                    $div.html(result.data.error_server);
                    $errorsSection.append($div);
                    $errorsSection.removeClass('hidden');
                    $newBrandSheetUpload.removeClass('loading');
                    return;
                }
                $newBrandSheetUpload.removeClass('empty loading');
                $previewImg.attr('src', result.data.url);
                $('#registrationImageTempId').val(result.data.id);
            },
            loadStart: function () {
            },
            progress: function () {
            },
            loadEnd: function () {
            },
            completeAll: function () {
            }
        });

    },

    initAfterModerationImageControls: function () {
        let $removeBtn = $('#afterModerationImagesBtn');

        $removeBtn.on('click', function () {
            $('#afterModerationErrorImageContainer').remove();
        });
    },

    initAutoSuggestBox: function () {
        let $form = $('#newBrandRequestForm');
        let $formValidator = $form.validate({
            rules: {
                'brand[name_fa]': {
                    required: true,
                    minlength: 2,
                    maxlength: 255,
                    persian_letters_only: true
                },
                'brand[name_en]': {
                    required: true,
                    minlength: 2,
                    maxlength: 255,
                    english_letters_only: true
                },
                'brand[description]': {
                    required: true,
                    minlength: 100,
                    maxlength: 750
                },
                'brand[logo_id]': {
                    required: true
                }
            },
            messages: {
                'brand[name_fa]': {
                    'required': 'وارد کردن عنوان فارسی برند اجباری است',
                    'minlength': 'عنوان فارسی برند نمی‌تواند کوتاه‌تر از 2 کاراکتر باشد',
                    'maxlength': 'عنوان فارسی برند نمی‌تواند طولانی‌تر از 255 کاراکتر باشد',
                    'persian_letters_only': 'تنها حروف فارسی مجاز است'
                },
                'brand[name_en]': {
                    'required': 'وارد کردن عنوان انگلیسی برند اجباری است',
                    'minlength': 'عنوان انگلیسی برند نمی‌تواند کوتاه‌تر از 2 کاراکتر باشد',
                    'maxlength': 'عنوان فارسی برند نمی‌تواند طولانی‌تر از 255 کاراکتر باشد',
                    'english_letters_only': 'تنها حروف انگلیسی مجاز است'
                },
                'brand[description]': {
                    'required': 'وارد کردن شرح برای برند اجباری است',
                    'minlength': 'متن وارد شده برای شرح برند نمی‌تواند کوتاه‌تر از 100 کاراکتر باشد',
                    'maxlength': 'متن وارد شده برای شرح برند نمی‌تواند طولانی‌تر از 750 کاراکتر باشد',
                },
                'brand[logo_id]': {
                    'required': 'آپلود کردن لوگو برای برند اجباری است'
                },
            }
        });

        let $modalSuggest = $('#newBrandRequestForm .js-autosuggest-box');
        $modalSuggest.each(function () {
            window.AutoSuggestBox.init($(this), {
                requestUrl: '/content/request/brand/search/',
                isBrandRequest: true,
                onChange: function () {
                    $('#newBrandType').addClass('disabled');
                    $('#foreignBrandContainer1').addClass('disabled');
                    $('#iranianBrandContainer1').addClass('disabled');
                    $('#iranianBrandContainer2').addClass('disabled');
                    $('#brandOrigin').addClass('disabled');
                    $('#iranianBrandLogo').addClass('disabled');
                    $('#brandDescription').addClass('disabled');
                    $('#newBrandRequestSitesSelect').parent().addClass('disabled');
                    $modalSuggest.addClass('disabled');

                    $formValidator.resetForm();

                    let $brandRequestId = $('[name="brand[product_id]"]').val();
                    let $newBrandOption = $('<option value="'+$brandRequestId+'">'+$('[name="brand[name_fa]').val()+'</option>');
                    let $brandSelect = $('#brandsSelect');

                    $formValidator.element($('[name="brand[name_fa]"]'));

                    $('#brandSuggestBtnLabel').removeClass('hidden');
                    $('#brandRequestBtnLabel').addClass('hidden');
                    $('#resetBrandRequestBtn').removeClass('hidden');

                    $brandSelect.append($newBrandOption);
                    $brandSelect.val($brandRequestId);
                }
            });
        });
    },

    initSaveToClipboard: function () {
        $(document).on('click', '.js-copy-to-clipboard', function () {
            let $tempInput = $("<input>");
            $("body").append($tempInput);
            $tempInput.val($(this).text()).select();
            document.execCommand("copy");
            $tempInput.remove();
            return false;
        })
    },

    initGuidelineModalAction: function () {
        if(!isModuleActive('ccp_guideline')) return;
        var $guideline = $('.js-guideline-icon');
        var that = this;

        $guideline.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var $modalId = $(this).data('guideline-modal');
            if(location.href.includes('/edit/')) {
                var categoryId = parseInt($('#selectedCategoryId').val());
                Services.ajaxGETRequestJSON(
                    '/content/create/product/guideline/',
                    {
                        'category_id': categoryId
                    },
                    function (res) {
                        that.initGuidelineModals(data.guideline);
                        UIkit.modal(`#${$modalId}`, {
                            bgClose: false,
                        }).show();
                    },
                    function (err) {
                        console.log(err);
                    }
                );
            } else {
                UIkit.modal(`#${$modalId}`, {
                    bgClose: false,
                }).show();
            }

            var swiper = new Swiper('.swiper-container', {
                simulateTouch: false,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'fraction',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

        });

        $('.js-expand-item').on('click', function () {
            $(this).siblings('.js-guideline-desc').toggleClass('uk-hidden');
            $(this).find('span').toggleClass('c-content-accordion__modal-guidelines-expand-icon--expanded');
        });

        $('.js-show-video').on('click', function() {
            $(this).parents('#guidelineModalContent').find('.js-modal-item[data-item="items"]')
                .fadeOut('slow', 'swing', function () {
                    $(this).addClass('uk-hidden');
                });
            $(this).parents('#guidelineModalContent').find('.js-modal-item[data-item="video"]')
                .fadeIn('slow', 'swing', function () {
                    $(this).removeClass('uk-hidden');
                });
            $(this).addClass('uk-hidden');
            $(this).siblings().removeClass('uk-hidden');
        });

        $('.js-hide-video').on('click', function () {
            $(this).parents('#guidelineModalContent').find('.js-modal-item[data-item="items"]')
                .fadeIn('slow', 'swing', function () {
                    $(this).removeClass('uk-hidden');
                });
            $(this).parents('#guidelineModalContent').find('.js-modal-item[data-item="video"]')
                .fadeOut('slow', 'swing', function () {
                    $(this).addClass('uk-hidden');
                });
            $(this).siblings().removeClass('uk-hidden');
            $(this).addClass('uk-hidden');
        });

        $('.uk-modal').on('hide', function () {
            $(this).find('video').trigger('pause');
            $(this).find('.js-expand-item').each(function () {
                if(!$(this).siblings('.js-guideline-desc').hasClass('uk-hidden')) {
                    $(this).click();
                }
            })

            if(!$(this).find('.js-hide-video').hasClass('uk-hidden')) {
                $(this).find('.js-hide-video').click();
            }
        });
    },

    initGuidelineModals: function (data) {
        var that = this;
        $('.js-modal-item').each(function(index, item) {
            if(!$(this).hasClass('uk-hidden')) {
                $(this).addClass('uk-hidden');
            }
        });

        Object.entries(data).forEach(function([key, value]) {
            var $sectionModal = $(`#${key}`);
            $(`.js-guideline-icon[data-guideline-modal=${key}]`).removeClass('uk-hidden');
            Object.entries(value).forEach(function([sectionKey, sectionValue]) {
                if(sectionValue) {
                    switch (sectionKey) {
                        case 'short_description':
                            $sectionModal.find(`.js-modal-item[data-item=${sectionKey}]`).empty().html(sectionValue);
                            $sectionModal.find(`.js-modal-item[data-item=${sectionKey}]`).removeClass('uk-hidden');
                            break;
                        case 'video':
                            $sectionModal.find(`.js-modal-item[data-item=${sectionKey}] > figure > video > source`).attr('src', sectionValue);
                            if(value.items || value.gallery){
                                $sectionModal.find('.js-video-btn').removeClass('uk-hidden');
                            } else {
                                $sectionModal.find(`.js-modal-item[data-item=${sectionKey}]`).removeClass('uk-hidden');
                            }
                            break;
                        case 'items':
                            generateItems(sectionValue, $sectionModal);
                            $sectionModal.find(`.js-modal-item[data-item=${sectionKey}]`).removeClass('uk-hidden');
                            break;
                        case 'gallery':
                            generateGallery(sectionValue, $sectionModal);
                            $sectionModal.find(`.js-modal-item[data-item=${sectionKey}]`).removeClass('uk-hidden');
                            break;
                    }
                }
            });
        });

        function generateItems($items, $modal) {
            var $item = $modal.find('.js-modal-item[data-item="items"] > div').first().clone();
            var $modalItemsContainer = $modal.find('.js-modal-item[data-item="items"]');
            $modalItemsContainer.empty();
            for(var val of $items) {
                $item.find('.js-expand-item > p').empty().html(val.title);
                $item.find('.js-guideline-desc').empty().append(val.content);
                $item.clone().appendTo($modalItemsContainer);
            }
        }

        function generateGallery ($slides, $modal) {
            var $swiperContainer = $modal.find('.swiper-wrapper');
            var $slide = $modal.find('.swiper-slide').first().clone();
            $swiperContainer.empty();
            for(var slide of $slides) {
                $slide.find('.js-gellery-title').html(slide.title);
                $slide.find('.js-gellery-des').html(slide.description);
                $slide.find('img').attr('src', slide.image);
                $slide.clone().appendTo($swiperContainer);
            }

        }

        that.initGuidelineModalAction();
    }
};

$(function () {
    IndexAction.init();
});



/*[PATH @digikala/supernova-digikala-marketplace/assets/local/js/controllers/Content/ContentCreation/shared/fakePolicyConfirmation.js]*/
let FakePolicyConfirmation = {
        init: function () {
        window.FakePolicyConfirmation ={
            FAKE_POLICY_LAST_DATE_SHOWN:"FAKE_POLICY_LAST_DATE_SHOWN",
            checkShouldShowModal:FakePolicyConfirmation.checkShouldShowModal,
            setModalShownDate:FakePolicyConfirmation.setModalShownDate
        }
    },
    checkShouldShowModal:function(){
        const NEXT_WEEK_MS = new Date().getTime()+3600*1000*24*7
        const lastDate = window.localStorage.getItem(window.FakePolicyConfirmation.FAKE_POLICY_LAST_DATE_SHOWN)
        return lastDate && !isNaN(+lastDate) && +lastDate < NEXT_WEEK_MS

    },
    setModalShownDate:function(){
        const now =new Date().getTime()
        window.localStorage.setItem(window.FakePolicyConfirmation.FAKE_POLICY_LAST_DATE_SHOWN,''+now)
    }

}
$(function () {
    FakePolicyConfirmation.init();
})