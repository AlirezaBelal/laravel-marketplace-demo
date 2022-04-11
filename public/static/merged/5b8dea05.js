/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/digiclubController/indexAction.js]*/
var IndexAction = {
    displayName: "IndexAction",
    init: function() {
        var functions = [
            this.initCopyToClipboard,
            this.initMembershipActivation,
            this.initDropDown,
            this.initToggle,
        ];

        if(window.currentPage === 'index') {
            functions = functions.concat([
                this.initMainSlider,
                this.initPartnersSlider,
                this.initNewsletterSlider,
            ]);

            if(!isModuleActive('digiclub_game_center_content')) {
                functions.push(this.initVoucherSlider);
            }
        }

        else if(window.currentPage === 'rewards') {
            functions = functions.concat([
                this.initRewardBox,
                this.initRewardInteractions,
                this.initStopPropagation,
                this.initFilterDropDown,
                this.initListFilterInput,
                this.initSort,
                this.initHandleQueryParameters,
            ]);

        }

        else if(window.currentPage === 'history') {
            functions = functions.concat([
                this.initHistoryDetailsSwitch,
                this.initBoxTabsSwitch,
                this.initFilterDropDown,
                this.initSort,
                // this.initRemovePendingHistory,
            ]);
        }

        else if(window.currentPage === 'luckyDraw') {
            functions = functions.concat([
                this.initLuckyDrawPageCounter,
                this.initDCScrollToTerms,
                this.initShowWinners,
            ]);
            
            this.initLuckyDrawInteractions('dc-luckydraw-purchase', 10, window.endpoints.luckyDrawChanceAction);

        }

        else if(window.currentPage === 'luckySpinner') {
            functions = functions.concat([
                this.initSpin,
            ]);

            this.initLuckyDrawInteractions('lucky-spinner-add-chance', 10, window.endpoints.spinnerChanceAction);
        }

        window.Services.callListInTryCatch(functions, this);
    },

    initHandleQueryParameters: function() {
        var queryParams = Services.getQueryString(location.href),
            queryParamsObject = {};

        if(queryParams) queryParamsObject = Services.parseQueryString(queryParams);

        var triggerSource = queryParamsObject['trigger-source'];

        if(triggerSource) {
            var $dcSectionTarget = $('.js-digiclub-section[data-digiclub-section-name=' + triggerSource + ']'),
                dcRewardStickyHeaderHeight = $('.js-dc-reward-sticky-header').height();

            window.IndexAction.dcScrollToElement($dcSectionTarget, -dcRewardStickyHeaderHeight);
        }
    },

    initToggle: function() {
        $(document).on('click', '.js-dc-toggle-switch', function () {
            var $toggleSwitch = $(this),
                isActive = $toggleSwitch.hasClass('is-active'),
                $toggleBox = $toggleSwitch.closest('.js-dc-toggle-box'),
                $toggleContentAll = $toggleBox.find('.js-dc-toggle-content'),
                $toggleContentActive = $toggleContentAll.filter('[data-toggle-state="active"]'),
                $toggleContentInactive = $toggleContentAll.filter('[data-toggle-state="inactive"]');

            $toggleSwitch.toggleClass("is-active");
            $toggleContentAll.addClass("u-hidden");
            if (isActive) {
                $toggleContentInactive.removeClass("u-hidden");
            } else {
                $toggleContentActive.removeClass("u-hidden");
            }
        });
    },

    initDropDown: function() {
        var $dropdownAll = $(".js-dc-dropdown"),
            $dropdownTriggerAll = $dropdownAll.find(".js-dc-dropdown-trigger"),
            $dropdownContentAll = $dropdownAll.find(".js-dc-dropdown-content");

        $dropdownAll.each(function() {
            var $dropdownFilter = $(this),
                $dropdownTrigger = $dropdownFilter.find(".js-dc-dropdown-trigger"),
                $dropdownContent = $dropdownFilter.find(".js-dc-dropdown-content");

            $dropdownTrigger.on("click", function(event) {
                $dropdownTrigger.toggleClass("is-open");
                $dropdownContent.toggleClass("u-hidden");
                $dropdownTriggerAll.not($dropdownTrigger).removeClass("is-open");
                $dropdownContentAll.not($dropdownContent).addClass("u-hidden");
                event.stopPropagation();
            });
        });

        $(document).on("click", function(event) {
            if (!$(event.target).closest($dropdownAll).length) {
                $dropdownTriggerAll.removeClass("is-open");
                $dropdownContentAll.addClass("u-hidden");
            }
        });
    },

    initSpin: function() {
        var rewardsImg = $('.js-lucky-spinner-rewards'),
            luckySpinnerBtn = $('.js-lucky-spinner-button'),
            chances = $('.js-lucky-spinner-chances'),
            luckySpinnerModal = $('.js-lucky-spinner-modal'),
            modalTicketBackground = luckySpinnerModal.find('.js-lucky-spinner-ticket-background'),
            modalAmount = luckySpinnerModal.find('.js-lucky-spinner-modal-amount'),
            modalBrand = luckySpinnerModal.find('.js-lucky-spinner-modal-brand'),
            modalInstruction = luckySpinnerModal.find('.js-lucky-spinner-modal-instruction'),
            modalRewardType = luckySpinnerModal.find('.js-lucky-spinner-reward-type'),
            modalReward = luckySpinnerModal.find('.js-lucky-spinner-modal-reward'),
            csrf = luckySpinnerBtn.data('token'),
            color = 'white',
            wheelDeg = -15,
            reward,
            prevReward = 0;

        var luckySpinnerRespondModal = $('[data-remodal-id=lucky-spinner-response]').remodal({
            modifier: "remodal-lucky-spinner"
        });

        luckySpinnerBtn.on('click', function() {
            Services.ajaxPOSTRequestJSON(
                window.endpoints.spinAction,
                {
                    token: csrf
                },
                function (res) {
                    reward = res.prize;
                    wheelDeg += 3600 + (30 * reward) - prevReward;
                    prevReward = (30 * reward);
                    color = rewardsImg.find('#'+ res.prize).data('color');

                    rewardsImg.css('transform', 'translate(270px, 20px) rotate(' + -wheelDeg + 'deg)');

                    modalTicketBackground.css('color', color);
                    if(res.type === 'free-delivery') {
                        modalAmount.text('');
                        modalRewardType.text('ارسال رایگان');
                    } else {
                        modalAmount.text(Services.convertToFaDigit(Services.formatCurrency(res.amount, false, '')));
                        modalRewardType.text(res.type === 'percent' ? 'درصد' : 'تومان');
                    }
                    modalBrand.text(res.brand);
                    modalInstruction.text(res.instruction);
                    modalReward.text(res.voucherCode);

                    rewardsImg.on('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(){
                        luckySpinnerRespondModal.open();
                        chances.text(Services.convertToFaDigit(res.chances));
                        if(res.chances === 0) luckySpinnerBtn.addClass('disabled');

                        rewardsImg.off('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd');
                    });


                },
                function (res) {
                    alert(res.data);
                }
            );
        })
    },

    initMembershipActivation: function() {
        var $termsModalElement = $('[data-remodal-id=dc-terms]'),
            $termsModalBtn = $('.js-terms-modal-trigger'),
            termsModal = $termsModalElement.remodal(),
            $activationBtn = $termsModalElement.find(".js-dc-activate-membership"),
            $termsCheckbox = $termsModalElement.find(".js-dc-terms-checkbox");

        $termsModalBtn.on('click', function() {
            termsModal.open();
        });

        $termsCheckbox.on('change', function() {
            if($termsCheckbox.is(':checked')) $activationBtn.removeClass('disabled');
            else $activationBtn.addClass('disabled');
        });

        $activationBtn.on('click', function () {
            Services.ajaxPOSTRequestJSON(
                activateUrl,
                {
                },
                function (res) {
                    window.location.reload();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                })
        });
    },

    initMainSlider: function() {
        var $sliderElement = $(".js-main-slider"),
            sliderOptions = {
                loop: true,
                autoplay: {
                    delay: 5000
                },
                effect: "fade",
                centeredSlides: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                }
            },
            $swiper = new Swiper($sliderElement, sliderOptions);
    },

    initVoucherSlider: function() {
        var $sliderElement = $(".js-main-voucher-slider"),
            sliderOptions = {
                loop: true,
                slidesPerView: 4,
                loopedSlides: 1,
                navigation: {
                    nextEl: ".js-main-voucher-next",
                    prevEl: ".js-main-voucher-prev"
                }
            },
            $swiper = new Swiper($sliderElement, sliderOptions);
    },

    initLuckyDrawPageCounter: function() {
        var $dcLuckydrawCounter = $(".js-dc-luckydraw-counter"),
            endTime = Date.parse(window.digiclubLuckyDrawEndTime) / 1000,
            now = Date.now() / 1000,
            timeLeft = (endTime - now > 0)
                ? endTime - now
                : 0;

        $dcLuckydrawCounter.FlipClock(
            timeLeft,
            {
                clockFace: 'DailyCounter',
                countdown: true
        });
    },

    initLuckyDrawInteractions: function(remodalId, unitPoint, url) {
        var $luckyDrawModalElement = $('[data-remodal-id=' + remodalId + ']'),
            $luckyDrawModalBtn = $('.js-luckydraw-modal-trigger'),
            luckyDrawModal = $luckyDrawModalElement.remodal(),
            $dcCountInput = $luckyDrawModalElement.find('.js-dc-luckydraw-points-input'),
            $dcCountResult = $luckyDrawModalElement.find('.js-dc-luckydraw-points-result'),
            $dcPointsCurrent = $luckyDrawModalElement.find('.js-dc-points-current'),
            $dcPointsAfterPurchase = $luckyDrawModalElement.find('.js-dc-points-after-purchase'),
            $getluckydrawChanceBtn = $luckyDrawModalElement.find('.js-get-luckydraw-chance'),
            csrf = $getluckydrawChanceBtn.data('token'),
            count = null,
            pointsNeeded = null,
            pointsCurrent = null,
            pointsAfterPurchase = null;
        $luckyDrawModalBtn.on('click', function() {
            luckyDrawModal.open();
        });

        $luckyDrawModalElement.on('opened', function () {
            $dcCountInput.focus();
        });

        $dcCountInput.on('keypress', function(event) {
            var $this = $(this),
                keyNum = event.which,
                keyChar = event.key;

            event.preventDefault();

            if(isNumKeyPressed(keyNum)) {
                if(isTextSelected(this) || $this.val() === "") $this.val(Services.convertToFaDigit(keyChar));
                else $this.val($this.val().replace(/^0+|^۰+/, '') + Services.convertToFaDigit(keyChar));
            }

            $this.trigger('change');
        });

        $dcCountInput.on('change', function() {
            count = Services.convertToEnDigit($dcCountInput.val());
            pointsNeeded = multiply(count, unitPoint);
            pointsCurrent = Services.convertToEnDigit($dcPointsCurrent.text());
            pointsAfterPurchase = pointsCurrent - pointsNeeded;

            $dcCountResult.text(Services.convertToFaDigit(pointsNeeded));
            if(pointsAfterPurchase >= 0) {
                $dcPointsAfterPurchase.text(Services.convertToFaDigit(pointsAfterPurchase));
                $getluckydrawChanceBtn.removeClass('disabled');
            } else {
                $dcPointsAfterPurchase.text(Services.convertToFaDigit(0));
                $getluckydrawChanceBtn.addClass('disabled');
            }
            
        });

        $dcCountInput.trigger('change');

        $getluckydrawChanceBtn.on('click', function() {
            Services.ajaxPOSTRequestJSON(
                url,
                {
                    "count": count,
                    token: csrf
                },
                function (res) {
                    location.reload();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                }
            )
        });

        function multiply(num1, num2) {
            return num1 * num2;
        }

        function isTextSelected(input) {
            if (typeof input.selectionStart == "number") {
                return input.selectionStart === 0 && input.selectionEnd === input.value.length;
            } else if (typeof document.selection != "undefined") {
                input.focus();
                return document.selection.createRange().text === input.value;
            }
        }

        function isNumKeyPressed(keyNum) {
            return 48 <= keyNum && keyNum <= 59 || 1775 <= keyNum && keyNum <= 1785
        }
    },

    initShowWinners: function () {
        $('.js-winners-see-more').on('click', function () {
            $(this).siblings('.js-winners-container').addClass('is-open');
            $(this).hide();
        })
    },

    initDCScrollToTerms: function() {
        var $luckyDrawInternalLink = $('.js-dc-terms-link'),
            selector = '#'+ $luckyDrawInternalLink.attr('target'),
            $terms = $(selector);

        $luckyDrawInternalLink.on('click', function(e){
            window.IndexAction.dcScrollToElement($terms);
            e.preventDefault();
        });
    },

    dcScrollToElement: function($element, alter) {
        if (!$element || !($element instanceof jQuery) ) return false;
        if (!alter) alter = 0;

        var headerHeight = $('.js-header-sticky').outerHeight() || 0,
            newPosition = $element.offset();

        $('html, body').stop().animate({ scrollTop: newPosition.top + (alter - headerHeight) }, 500);
    },

    initPartnersSlider: function() {
        var $sliderElement = $(".js-main-partners-slider"),
            sliderOptions = {
                loop: true,
                freeMode: true,
                mousewheel: true,
                spaceBetween: 30,
                slidesPerView: "auto"
            },
            $swiper = new Swiper($sliderElement, sliderOptions);

    },

    initNewsletterSlider: function() {
        var $sliderElement = $(".js-main-newsletter-slider"),
            sliderOptions = {
                loop: true,
                slidesPerView: 2,
                loopedSlides: 1,
                navigation: {
                    nextEl: ".js-main-newsletter-next",
                    prevEl: ".js-main-newsletter-prev"
                }
            },
            $swiper = new Swiper($sliderElement, sliderOptions);
    },

    initBoxTabsSwitch: function() {
        var $tabs = $(".js-box-tab");

        $tabs.on("click", function() {
            var $tab = $(this),
                tabId = $tab.data("id"),
                $box = $tab.closest(".js-box"),
                $tabs = $box.find(".js-box-tab"),
                $contents = $box.find(".js-box-content"),
                $content = $contents.filter("[data-id=\"" + tabId + "\"]");

            $tabs.removeClass("is-active");
            $tab.addClass("is-active");
            $contents.addClass("u-hidden");
            $content.removeClass("u-hidden");
            $box.trigger('tab-switch');
        });

    },

    initRemovePendingHistory: function() {
        var pendingHistoryTempItems = $('.js-dc-history-pending-temp'),
            pendingCountElement = $('.js-dc-pending-count'),
            pendingCount = pendingCountElement.data('pending-count') || 0;

        pendingCountElement.closest('.js-box').on('tab-switch', function() {
            var newPendingCount = Math.max(0, pendingCount - pendingHistoryTempItems.length);

            if(newPendingCount > 0) {
                pendingCountElement
                    .text(newPendingCount)
                    .data('pending-count', newPendingCount);
            } else {
                pendingCountElement.remove()
            }

            pendingHistoryTempItems.remove();
        })

    },

    initHistoryDetailsSwitch: function() {
        var $allShowMoreBtn = $(".js-dc-history-table-show-more"),
            $allDetails = $(".js-dc-history-table-details");

        $allShowMoreBtn.on("click", function() {
            var $showMoreBtn = $(this),
                $row = $showMoreBtn.closest(".js-dc-history-table-row"),
                $details = $row.find(".js-dc-history-table-details");

            if ($showMoreBtn.hasClass("is-open")) {
                $allShowMoreBtn.removeClass("is-open");
                $allDetails.addClass("u-hidden");
            } else {
                $allShowMoreBtn.removeClass("is-open");
                $allDetails.addClass("u-hidden");
                $showMoreBtn.addClass("is-open");
                $details.removeClass("u-hidden");
            }
        });
    },

    initRewardBox: function() {
        var rewardBox = $(".js-reward-box"),
            rewardContainer = rewardBox.find(".js-reward-container"),
            showMoreBtn = rewardBox.find(".js-reward-show-more-btn");

        showMoreBtn.on("click", function() {
            showMoreBtn.hide().off("click");
            rewardContainer.removeClass("c-dc-reward__container--reward-limited");
        });
    },

    initRewardInteractions: function() {
        var $dcRewardAll = $('.js-dc-reward'),
            $dcInfoModalElement = $('[data-remodal-id=dc-reward-info]'),
            $dcRewardModalElement = $('[data-remodal-id=dc-reward-code]'),
            $dcRewardTitle = $('.js-dc-modal-reward-title'),
            $dcRewardInstruction = $dcInfoModalElement.find('.js-de-modal-reward-instruction'),
            $dcInfoContainer = $dcInfoModalElement.find('.js-dc-info-modal-details'),
            $dcLinkContainer = $dcInfoModalElement.find('.js-dc-info-modal-link'),
            $dcInteractionAll = $dcInfoModalElement.find('.js-dc-reward-info-modal-interaction'),
            $dcGetRewardBox = $dcInfoModalElement.find('.js-dc-get-reward-box'),
            $dcGetRewardInstruction = $dcInfoModalElement.find('.js-dc-get-reward-instruction'),
            $dcGetCodeBox = $dcInfoModalElement.find('.js-dc-get-code-box'),
            $dcLogin = $dcInfoModalElement.find('.js-dc-login'),
            $dcInfoCodeContainer = $dcInfoModalElement.find('.js-dc-info-modal-code'),
            $dcRewardCodeContainer = $dcRewardModalElement.find('.js-dc-reward-modal-code'),
            $getReward = $dcInfoModalElement.find('.js-dc-get-reward'),
            csrf = $getReward.data('token'),
            dcInfoModal = $dcInfoModalElement.remodal(),
            dcRewardModal = $dcRewardModalElement.remodal(),
            rewardCode = null,
            rewardState = null,
            rewardType = null,
            rewardId = 0;
        $dcRewardAll.on('click', function() {
            var $dcReward = $(this);

            rewardId = $dcReward.data('reward-id');
            rewardType = $dcReward.data('reward-type');
            rewardState = $dcReward.data('reward-state');
            rewardCode = $dcReward.data('reward-code') || null;

            if(rewardState === "notLoggedIn") {
                $dcInteractionAll.addClass('u-hidden');
                $dcLogin.removeClass('u-hidden')
            } else if(rewardState === "boughtToday") {
                $dcInteractionAll.addClass('u-hidden');
                $dcGetCodeBox.removeClass('u-hidden');
                $dcInfoCodeContainer.text(rewardCode);
            } else if(rewardState === "notEnoughPoints") {
                $dcInteractionAll.addClass('u-hidden');
                $dcGetRewardInstruction.removeClass('u-hidden');
            } else {
                $dcInteractionAll.addClass('u-hidden');
                $dcGetRewardBox.removeClass('u-hidden');
            }

            Services.ajaxGETRequestJSON(
                window.endpoints.infoAction,
                {
                    "reward_id": rewardId,
                    "reward_type": rewardType
                },
                function (res) {
                    if(isModuleActive('digiclub_reward_ajax_modification')) {
                        $dcRewardInstruction.html(res.instruction);

                        if(rewardState === "available") {
                            $getReward.removeClass('disabled');
                        } else {
                            $getReward.addClass('disabled');
                        }
                    } else {
                        $dcRewardTitle.text(res.title);
                        $dcInfoContainer.html(res.details);
                        if (rewardState === "available") {
                            $getReward.removeClass('disabled');
                        } else {
                            $getReward.addClass('disabled');
                        }
                        if (rewardType === "product") {
                            $dcLinkContainer.attr('href', res.link).removeClass('u-hidden');
                        } else {
                            $dcLinkContainer.attr('href', '').addClass('u-hidden');
                        }
                    }

                    dcInfoModal.open();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                }
            )
        });

        $getReward.on('click', function() {
            Services.ajaxGETRequestJSON(
                window.endpoints.rewardAction,
                {
                    "reward_id": rewardId,
                    "reward_type": rewardType,
                    token: csrf
                },
                function (res) {
                    $dcRewardCodeContainer.text(res.code);
                    dcRewardModal.open();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                }
            )
        });

        $dcRewardModalElement.on('closing', function() {
            window.location.reload();
        })

    },

    initFilterDropDown: function() {
        var thiz = this,
            $filterForm = $('.js-dc-filter'),
            $dropdownFilterAll = $(".js-dc-dropdown"),
            emptyFilterFormOnLoad = $filterForm.find("input[type=checkbox]:checked.js-filter-checkbox").length > 0;

        $dropdownFilterAll.each(function() {

            var $dropdownFilter = $(this),
                $checkboxInput = $dropdownFilter.find(".js-filter-checkbox"),
                $submitBtn = $dropdownFilter.find(".js-filter-dropdown-submit"),
                $clearBtn = $dropdownFilter.find(".js-filter-dropdown-clear");

            if(emptyFilterFormOnLoad) {
                $submitBtn.removeClass("disabled");
            } else {
                $checkboxInput.on("change", function() {
                    if($checkboxInput.is(":checked")) {
                        $submitBtn.removeClass("disabled");
                    } else {
                        $submitBtn.addClass("disabled");
                    }
                });
            }

            $submitBtn.on('click', function() {
                thiz.submitFiltersAndSorts();
                // $filterForm.submit();
            });

            $clearBtn.on('click', function() {
                $checkboxInput.prop('checked', false);
                // $filterForm.submit();
            });

        });

    },

    initListFilterInput: function() {
        var $listFilterInputAll = $(".js-filter-input");

        $listFilterInputAll.each(function() {
            var $listFilterInput = $(this),
                $filterContent = $listFilterInput.closest(".js-filter-content"),
                $filterItemsAll = $filterContent.find(".js-filter-item"),
                $filterLabelsAll = $filterContent.find(".js-filter-label");

            $listFilterInput.on("keyup", function() {
                var val = $listFilterInput.val();

                if (val) {
                    $filterLabelsAll.each(function() {
                        var $filterLabel = $(this),
                            $filterItem = $filterLabel.closest(".js-filter-item");

                        if ($filterLabel.data("en").indexOf(val) >= 0 ||
                            $filterLabel.data("fa").indexOf(val) >= 0 ||
                            $filterLabel.data("search").indexOf(val) >= 0 ||
                            $filterItem.find(".js-filter-checkbox").is(":checked")) {
                            $filterItem.show();
                        } else {
                            $filterItem.hide();
                        }
                    });
                } else {
                    $filterItemsAll.show();
                }
            });

            var $cleanableInput = $filterContent.find(".js-cleanable-input"),
                $inputCleaner = $cleanableInput.siblings(".js-input-cleaner");

            $cleanableInput.on("keyup", function() {
                if ($cleanableInput.val()) {
                    $inputCleaner.css("display", "inline-flex");
                } else {
                    $inputCleaner.css("display", "none");
                }
            });

            $inputCleaner.on("click", function() {
                $inputCleaner.css("display", "none");
                $cleanableInput.val("");
                $cleanableInput.keyup();
            });
        })
    },

    initSort: function() {
        var thiz = this,
            $sortForm = $('.js-dc-sort, .js-dc-filter-radio'),
            $radioBtn = $sortForm.find('input[type=radio]');

        $radioBtn.on('change', function() {
            var triggerSrouce = $(this).closest('.js-digiclub-section').data('digiclub-section-name');
            thiz.submitFiltersAndSorts(triggerSrouce);
        });
    },

    submitFiltersAndSorts: function(triggerSource) {
        var origin   = location.origin,
            pathname = location.pathname,
            formsSerialized = $('.js-dc-filter, .js-dc-sort, .js-dc-filter-radio').serialize(),
            triggerSourceQueryParam = (triggerSource) ? '&trigger-source=' + triggerSource : '',
            newUrl = [ origin, pathname, '?', formsSerialized, triggerSourceQueryParam ].join('');

        $(location).attr('href', newUrl);
    },

    initCopyToClipboard: function() {
        $(document).on("click", ".js-copy", function(e) {
            e.stopPropagation();
            e.preventDefault();
            var $this = $(this);
            var txt = $this.text().trim();
            var code = $this.html();
            var hook = $this.closest("div");

            $this.removeClass("js-copy");
            copyToClipboard(txt, hook);
            $this.text("کپی شد");

            setTimeout(function() {
                $this.html(code);
                $this.addClass("js-copy");
            }, 2000);
        });

        function copyToClipboard(text, appendHook) {

            var aux = $(document.createElement("textarea"));
            aux.addClass("u-hidden-visually");
            aux.text(text);
            aux.attr("contenteditable", true); //IOS compatibility
            // aux.attr("readonly", true); //IOS compatibility
            appendHook.append(aux);
            aux[0].focus();
            aux[0].setSelectionRange(0, 999999); //IOS compatibility
            document.execCommand("copy");
            aux.remove();
        }
    },

    initStopPropagation: function() {
        $('.js-stop-propagation').on('click', function(e) {
            e.stopPropagation();
        })
    },
};

$(function() {
    IndexAction.init();
});




/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/digiclubController/mission.js]*/
var MissionAction = {
    displayName: "MissionAction",
    init: function () {
        var functions = [
            this.initSetProgressBarWidth,
            this.activateMissionNotifications,
        ]

        Services.callListInTryCatch(functions, this);
    },

    initSetProgressBarWidth: function() {
        var $missionItemAll = $('.js-mission-item');

        $missionItemAll.each(function() {
            var $missionItem = $(this),
                $progress = $missionItem.find('.js-mission-progress');

                setProgressDetailsColor($progress);
        });

        function setProgressDetailsColor($progressContainer) {
            if(!($progressContainer instanceof jQuery)) return false;

            var $progressBar = $progressContainer.find('.js-mission-progress-bar'),
                $progressDetails = $progressContainer.find('.js-mission-progress-details'),
                maxWidth = $progressContainer.width(),
                progressbarWidth = $progressBar.width(),
                progressDetailsWidth = $progressDetails.width();

            if(progressbarWidth > (maxWidth + progressDetailsWidth) / 2) {
                $progressDetails.addClass('c-dc-mission__progress-details--white');
            }
        }
    },

    activateMissionNotifications: function() {
        var $BtnNotifications = $('.js-activate-mission-notifications');

        $BtnNotifications.on('click', function() {
            var $btn = $(this),
                labelActivate = $btn.data('label-activate'),
                labelDeactivate = $btn.data('label-deactivate'),
                activatedClass = $btn.data('active-class');

            if($btn.hasClass(activatedClass)) {
                toggleDigiclubNotificationAjax(true, function() {
                    $btn.removeClass(activatedClass).text(labelActivate);
                })
            } else {
                toggleDigiclubNotificationAjax(false, function() {
                    $btn.addClass(activatedClass).text(labelDeactivate);
                })
            }
        });

        function toggleDigiclubNotificationAjax(newNotificationState, callback) {
            // ToDo test and check different scenarios after the backend is done.
            Services.ajaxPOSTRequestJSON(
                window.endpoints.subscription,
                {
                    activate: newNotificationState
                },
                function (response) {
                    callback();
                },
                function (response) {
                    // DKAlert(response.errors)
                },
                true,
                true
            );
        }
    }
};

$(function () {
    MissionAction.init();
});