/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/paymentController/indexAction.js]*/
var IndexAction = {
    isVoucherInputDirty: false,
    isGiftCardInputDirty: false,
    isVoucherActive: false,
    activePaymentMethod: '',
    init: function () {
        this.initSwipers();
        this.initSelects();
        this.initVoucherCode();
        this.initCollapseButtons();
        this.initEnableSubmitButton();
        this.initRadioButtonsAction();
        this.initRemoveVoucher();
        this.initGiftsModal();
        this.initApplyGiftCard();
        this.initRemoveGiftCard();
        this.initParcelDiscount();
        this.showMorePaymethod();
        this.initVoucherAndGiftCardEvent();

        if(isModuleActive('set_order_type_ga')) {
            this.setOrderTypeGa();
        }

        if (isModuleActive('dk_wallet'))
            this.initCheckWalletStatus();

        if(isModuleActive('lazy_actions')) {
            this.handleLazySubmit();
        }

    },

    handleLazySubmit: function (){
        var $paymentForm = $('#paymentForm'),
            $submitButton = $('.js-save-payment-data');

        $paymentForm.on('submit', function (){
            $submitButton.css('pointer-events', 'none');
            setTimeout(function(){
                $submitButton.css('pointer-events', 'auto');
            }, 5000);
        })
    },

    showMorePaymethod: function () {
        var $creditMethod = $('.js-credit-paymethod-container');
        var $showMore = $('.js-more-paymethod');
        var showed = false;
        $creditMethod.hide();

        $showMore.on('click', function () {
            if(!showed) {
                $creditMethod.show("slow");
                $showMore.hide();
                showed = true;
            }
        });
    },

    initSwipers: function () {
        new Swiper('.js-package-swiper', {
            slidesPerView: 'auto',
            slidesPerGroup: 3,
            navigation: {
                nextEl: '.js-swiper-button-next',
                prevEl: '.js-swiper-button-prev'
            },
        })
    },

    initSelects: function () {
        if(!isModuleActive('new_payment')) {
            $('.js-ui-select').selectric();
            $('.js-ui-cc').selectric({
                optionsItemBuilder: function (itemData, element, index) {
                    var $this = $(element).find('option').eq(index)[0];
                    return '<div class="c-ui-select-item c-ui-select-item--cc">' + itemData.text + '<div><span>' + $this.dataset.remaining + '</span><span>' + $this.dataset.expiry + '</span></div></div>';
                }
            });
        }
    },

    clearSerial: function(serialType) {
        $('.js-' + serialType + '-serial-input').removeClass('c-payment__serial-input--error').val('').attr('readonly', false);
        $('.js-' + serialType + '-error').html('');
        $('.js-' + serialType + '-success').html('');
        $('.js-clear-' + serialType).hide();
        $('.js-apply-' + serialType).show().addClass('c-payment__serial-input-icon--disabled');
    },

    initVoucherCode: function () {
        var thiz = this;

        if(isModuleActive('new_payment')) {
            var $voucherSerialInput = $('.js-voucher-serial-input');
            var $applyVoucherButton = $('.js-apply-voucher');
            var validateVoucherInput = function(value) {
                if(!!value) {
                    $applyVoucherButton.removeClass('c-payment__serial-input-icon--disabled');
                } else {
                    $applyVoucherButton.addClass('c-payment__serial-input-icon--disabled');
                }
            };

            $voucherSerialInput.on('keyup', function (e) {
                if(e.which === 13){
                    e.preventDefault();
                    if(!!e.target.value && !$(e.target).hasClass('c-payment__serial-input--error')) {
                        $('.js-apply-voucher').click();
                    }
                } else if(thiz.isVoucherInputDirty) {
                    thiz.isVoucherInputDirty = false;
                    $voucherSerialInput.removeClass('c-payment__serial-input--error');
                    $('.js-voucher-error').html('');
                    $('.js-clear-voucher').hide();
                    $('.js-apply-voucher').show();
                }

                setTimeout(function(){
                    validateVoucherInput(e.target.value);
                },100);
            });

            $voucherSerialInput.bind("paste", function(e){
                var pastedData = e.originalEvent.clipboardData.getData('text');
                validateVoucherInput(pastedData);
            });

            $('.js-clear-voucher').click(function () {
                if(thiz.isVoucherActive) {
                    thiz.isVoucherActive = false;
                    Services.ajaxGETRequestJSON(
                        '/ajax/voucher/remove/',
                        {},
                        function () {
                            thiz.clearSerial('voucher');
                            $('.js-voucher-code-discount-value').text('');
                            $('.js-voucher-code-discount').addClass('hidden');
                            $('.js-voucher-discount-value').data('amount', '0');
                            thiz.updatePayablePrice();
                        },
                        function (data) {
                            DKAlert(data.errors);
                        },
                        true,
                        true
                    );
                } else {
                    thiz.clearSerial('voucher');
                    $('.js-voucher-code-discount-value').text('');
                    $('.js-voucher-code-discount').addClass('hidden');
                    $('.js-voucher-discount-value').data('amount', '0');
                }
            });

            $('.js-apply-voucher').click(function() {
                var $this = $(this);
                var $voucherCodeForm = $('#voucherCodeForm');
                var $inputContainer = $this.closest('.js-voucher');
                $voucherCodeForm.find('.js-voucher-msg-error,.js-voucher-msg-success').addClass("hidden");

                Services.ajaxPOSTRequestJSON(
                    '/ajax/voucher/set/',
                    {'code': $voucherSerialInput.val()},
                    function (data) {
                        var currentPayablePrice = $('#cartPayablePrice .js-price').data('current-amount'),
                            discount = currentPayablePrice - data.voucherDiscount > 0 ? data.voucherDiscount : currentPayablePrice,
                            tanslateDiscount = Services.convertToFaDigit(Services.formatCurrency(discount, true, '')),
                            voucherMessage = 'مبلغ ' + tanslateDiscount + 'تومان تخفیف برای شما محاسبه شد.';

                        $('.js-voucher').data('amount', discount);
                        $('.js-voucher-code-discount-value').text(tanslateDiscount).data('amount', discount);
                        $inputContainer.find('input').attr('readonly', true);

                        thiz.updatePayablePrice();
                        thiz.isVoucherActive = true;
                        $voucherCodeForm.find('.js-voucher-msg-success').removeClass("hidden");
                        $('.js-voucher-success').html(Services.convertToFaDigit(voucherMessage));
                        $('.js-voucher-code-discount').removeClass('hidden');
                        $('.js-clear-voucher').show();
                        $('.js-apply-voucher').hide();
                    },
                    function (data) {
                        $inputContainer.find('input').addClass('c-payment__serial-input--error');
                        $('.js-voucher-code-discount').addClass('hidden');
                        $('.js-voucher-error').html(data.errors);
                        thiz.isVoucherInputDirty = true;
                        $('.js-clear-voucher').show();
                        $('.js-apply-voucher').hide();
                        try {
                            ga('set', 'nonInteraction', true);
                            ga('send', 'event', {
                                eventCategory: 'voucher error',
                                eventAction: $voucherSerialInput.val(),
                                eventLabel: window.userId,
                                eventValue: $('#cartPayablePrice .js-price').data('amount'),
                            });
                        } catch (e) {
                            console.log("GA Error: Voucher code is not true :(");
                        }
                    },
                    true,
                    true
                );
            });

        } else {
            $('#applyVoucherCode').addClass('disabled');
            $(document).on('input', '.js-voucher-code-input', function () {
                if($(this).val().length !=0) {
                    $('#applyVoucherCode').removeClass('disabled');
                } else {
                    $('#applyVoucherCode').addClass('disabled');
                }
            });

            $('.js-voucher-code-input').on('keypress', function (e) {
                if(e.which === 13){
                    e.preventDefault();
                    $('#applyVoucherCode').click();
                }
            });

            $(document).on('click', '#applyVoucherCode:not(.is-important)', function (e) {
                var $this = $(this);
                var $voucherCodeForm = $('#voucherCodeForm');

                $voucherCodeForm.find('.js-voucher-msg-error,.js-voucher-msg-success').addClass("hidden");

                Services.ajaxPOSTRequestJSON(
                    '/ajax/voucher/set/',
                    {'code': $voucherCodeForm.find('input').val()},
                    function (data) {
                        var discount = Services.convertToFaDigit(Services.formatCurrency(data.voucherDiscount, true, ''));

                        $voucherCodeForm.find('.js-voucher-discount-value').text(discount).data('amount', data.voucherDiscount);
                        $('.js-voucher-code-discount-value').text(discount).data('amount', data.voucherDiscount);
                        $voucherCodeForm.find('.js-voucher-msg-success')
                            .removeClass("hidden")
                            .find('.js-voucher-discount-value').text(discount);
                        $this.addClass('is-important').text('حذف کد تخفیف');
                        $voucherCodeForm.find('input').attr('readonly', true);
                        $voucherCodeForm.find('input').val();

                        var giftSerial = $('.js-gift-card-input').val();
                        if(giftSerial !== undefined && giftSerial.length > 0) {
                            $("#applyGiftCard.is-important").click();
                            $('.js-gift-card-input').val(giftSerial);
                            $("#applyGiftCard").click();
                        }

                        thiz.updatePayablePrice();

                        $voucherCodeForm.find('.js-voucher-msg-success')
                            .removeClass("hidden")
                            .find('.js-voucher-discount-value').text(discount);
                        $('.js-voucher-code-discount').removeClass('hidden');
                    },
                    function (data) {
                        $('.js-voucher-code-discount').addClass('hidden');
                        $voucherCodeForm.find('.js-voucher-msg-error').removeClass("hidden").html(data.errors);
                    },
                    true,
                    true
                );
            });
        }
    },

    initRemoveVoucher: function () {
        if(!isModuleActive('new_payment')) {
            var thiz = this;
            $(document).on('click', '#applyVoucherCode.is-important', function (e) {
                var $this = $(this);
                var $voucherCodeForm = $('#voucherCodeForm');

                Services.ajaxGETRequestJSON(
                    '/ajax/voucher/remove/',
                    {},
                    function () {
                        $voucherCodeForm.find('.js-voucher-discount-value').text('').data('amount', 0);
                        $('.js-voucher-code-discount-value').text('').data('amount', 0);
                        $voucherCodeForm.find('.js-voucher-msg-success').addClass("hidden");
                        $this.removeClass('is-important').text('ثبت کد تخفیف');
                        $voucherCodeForm.find('input').val('').attr('readonly', false);
                        $('.js-voucher-code-discount').addClass('hidden');
                        $('.js-gift-card-selector').change();
                    },
                    function (data) {
                        DKAlert(data.errors);
                    },
                    true,
                    true
                );
            });
        }
    },

    updateWallet: function (NewPayablePrice) {
        var $wallet = $('.js-wallet'),
            $walletNeededMoney = $('.js-wallet-needed-money'),
            $walletPayingMoney = $('.js-wallet-paying-money'),
            walletAmount = (window.walletAmount || 0),
            newWalletNeededMoney = (NewPayablePrice - walletAmount > 0) ? NewPayablePrice - walletAmount : 0;


        $walletPayingMoney.data('amount', NewPayablePrice)
            .text(Services.convertToFaDigit(Services.formatCurrency(NewPayablePrice, true, '')));
        $walletNeededMoney.data('amount', newWalletNeededMoney)
            .text(Services.convertToFaDigit(Services.formatCurrency(newWalletNeededMoney, true, '')));

        if(walletAmount >= NewPayablePrice) {
            $walletNeededMoney.closest('.js-wallet-extra-info').addClass('u-hidden');
            $walletPayingMoney.closest('.js-wallet-extra-info').removeClass('u-hidden');
        } else {
            $walletNeededMoney.closest('.js-wallet-extra-info').removeClass('u-hidden');
            $walletPayingMoney.closest('.js-wallet-extra-info').addClass('u-hidden');
        }
    },

    updatePayablePrice: function () {
        var rawPayablePrice = parseInt($('#cartPayablePrice .js-price').data('amount'));
        var voucherDiscount = parseInt($('.js-voucher-discount-value').data('amount')) || 0;
        var giftCardDiscount = parseInt($('.js-gift-card-discount-value').data('amount')) || 0;

        if(isModuleActive('new_payment')) {
            var payablePrice = Math.max(0, (rawPayablePrice - voucherDiscount - giftCardDiscount));

            if(isModuleActive('dk_wallet')) this.updateWallet(payablePrice);

            var translatePayablePrice = Services.convertToFaDigit(Services.formatCurrency(payablePrice, true, ''));

            $('#cartPayablePrice .js-price').text(translatePayablePrice).data('current-amount', payablePrice);
        } else {
            if (voucherDiscount>0 || giftCardDiscount > 0) {
                $('.js-discount-divider').removeClass('hidden');
            } else {
                $('.js-discount-divider').addClass('hidden');
            }

            var oldCartPayablePrice = Services.convertToFaDigit(Services.formatCurrency(rawPayablePrice, true, ''));
            var oldCartPayablePriceWithVoucher = Services.convertToFaDigit(Services.formatCurrency(rawPayablePrice - voucherDiscount, true, ''));
            $('.js-voucher-msg-success').find('.js-payable-old').text(oldCartPayablePrice);
            $('.js-gift-msg-success').find('.js-payable-old').text(oldCartPayablePriceWithVoucher);

            var payablePrice = Math.max(0, (rawPayablePrice - voucherDiscount - giftCardDiscount));

            if(isModuleActive('dk_wallet')) this.updateWallet(payablePrice);

            payablePrice = Services.convertToFaDigit(Services.formatCurrency(payablePrice, true, ''));
            var payablePriceWithVoucher = Services.convertToFaDigit(Services.formatCurrency(rawPayablePrice - voucherDiscount, true, ''));

            $('#cartPayablePrice .js-price, .js-gift-msg-success .js-payable-new').text(payablePrice);
            $('.js-voucher-msg-success .js-payable-new').text(payablePriceWithVoucher);
        }
    },

    initCollapseButtons: function () {
        if(isModuleActive('dk_wallet')) {

            var orderSummaryHeader = $('.js-checkout-order-summary__header');
            orderSummaryHeader.on('click', function() {
                var box = $(this).closest('.js-checkout-order-summary__header');
                box.hasClass('is-active') ? box.removeClass('is-active') : box.addClass('is-active');
                dispatchEvent(new Event('scroll'));
            });

            var firstBank;
            var container = $('.js-paymethod-container');
            var paymentMethodInputs = $('input[name=payment_method]');
            var checkedPaymentMethodInputs = $('input[name=payment_method]:checked');

            paymentMethodInputs.on('change', function() {
                var $this = $(this),
                    box = $this.closest('.c-checkout-paymethod__item');

                $('.c-checkout-paymethod__item').removeClass('is-select-mode');
                box.toggleClass('is-select-mode');
                container.find('label.is-selected').removeClass('is-selected');

                if ($this.val() === 'wallet') {
                    $this.closest('li').find('.js-wallet-extra-info').show()
                } else {
                    $this.closest('ul').find('.js-wallet-extra-info').hide()
                }

                if ($this.val() === 'online' || $this.val() === 'credit' || $this.val() === 'wallet') {
                    firstBank = $this.closest('li').find('input[name="bank_id"]').first();
                    firstBank.prop('checked', true);
                    firstBank.parent().parent().siblings('.is-selected').removeClass('is-selected');
                    firstBank.parent().parent().addClass('is-selected');
                }
            });
            orderSummaryHeader.click();

            if(checkedPaymentMethodInputs.length === 0) {
                paymentMethodInputs.first().prop('checked', true).change();
            } else {
                checkedPaymentMethodInputs.change();
            }

        } else {

            var orderSummaryHeader = $('.js-checkout-order-summary__header');
            orderSummaryHeader.on('click', function() {
                var box = $(this).closest('.js-checkout-order-summary__header');
                box.hasClass('is-active') ? box.removeClass('is-active') : box.addClass('is-active');
                dispatchEvent(new Event('scroll'));
            });

            var firstBank;
            var container = $('.js-paymethod-container');

            $('input[name=payment_method]').on('change', function() {
                var box = $(this).closest('.c-checkout-paymethod__item');
                $('.c-checkout-paymethod__item').removeClass('is-select-mode');
                box.toggleClass('is-select-mode');
                container.find('label.is-selected').removeClass('is-selected');

                if ($(this).val() === 'online' || $(this).val() === 'credit') {
                    firstBank = $(this).parent().parent().parent().find('input[name="bank_id"]').first();
                    firstBank.prop('checked', true);
                    firstBank.parent().parent().siblings('.is-selected').removeClass('is-selected');
                    firstBank.parent().parent().addClass('is-selected');
                }
            });
            $('input[name=payment_method]:checked').change();
            orderSummaryHeader.click();

        }
    },
    initRadioButtonsAction: function () {
        if(isModuleActive('new_payment')) {
            var $bankIdInput = $('.js-bank-id-input');

            $('input[name="payment_method"]').change(function(){
                $bankIdInput.val($(this).data('bank-id'));

                IndexAction.activePaymentMethod = $(this).val();
                if(window.PaymentAction && isModuleActive('data_layer')) {
                    window.PaymentAction.setGAPaymentMethodEvent(IndexAction.activePaymentMethod);
                }
            });

            // set bank id for default value
            $bankIdInput.val($('input[name="payment_method"]:checked').data('bank-id'));
        } else {
            var bankOptions = $('input[name=bank_id]');
            var creditInput = $('input[name="payment_method"][value="credit"]');
            var onlineInput = $('input[name="payment_method"][value="online"]');
            var container = $('.js-paymethod-container');
            bankOptions.on('change', function () {
                container.find('label.is-selected').removeClass('is-selected');
                if ($(this).data('type') === 'Online') {
                    if (onlineInput.prop('checked') === false) {
                        container.find('.is-select-mode').removeClass('is-select-mode');
                        onlineInput.prop('checked', true);
                        onlineInput.parent().parent().addClass('is-select-mode');
                    }
                } else if ($(this).data('type') === 'Credit') {
                    if (creditInput.prop('checked') === false) {
                        container.find('.is-select-mode').removeClass('is-select-mode');
                        creditInput.prop('checked', true);
                        creditInput.parent().parent().addClass('is-select-mode');
                    }
                }

                var radioButton = $(this);
                radioButton.parent().parent().siblings('.is-selected').removeClass('is-selected');
                radioButton.parent().parent().addClass('is-selected');
            });

            $('input[name="payment_method"]').change(function(){
                IndexAction.activePaymentMethod = $(this).val();
                if(window.PaymentAction && isModuleActive('data_layer')) {
                    window.PaymentAction.setGAPaymentMethodEvent(IndexAction.activePaymentMethod);
                }
            });
        }
    },

    initEnableSubmitButton: function () {
        if(!isModuleActive('new_payment')) {
            var button = $('.js-save-payment-data');

            button.addClass('disabled');

            var radio = $('input[type="radio"][name="payment_method"]');

            if (radio.is(':checked')) {
                button.removeClass('disabled');
            }

            radio.on('change', function () {
                if (radio.is(':checked')) {
                    button.removeClass('disabled');
                }
            });
        }
    },

    initGiftsModal: function () {
        var thiz = this;

        if(isModuleActive('new_payment')) {
            $(document).on('change', 'input[name="gift_card_serial"]', function () {
                var $this = $(this),
                    cartPayablePrice = parseInt($('#cartPayablePrice .js-price').data('amount')),
                    voucherValue = parseInt($('.js-voucher-discount-value').data('amount')),
                    amount = Math.min($this.data('amount'), (cartPayablePrice - voucherValue));

                $('.js-gift-card-code-discount-value')
                    .text(Services.convertToFaDigit(Services.formatCurrency(amount ,true, '')));
                $('.js-gift-card-discount-value').data('amount', amount);
                $('.js-gift-card-dsc').hide();
                $('.js-gift-card-code-discount').removeClass('hidden');
                $('input[name="gift_card_serial"]:checked').parent().parent().find('.js-gift-card-dsc').show();
                thiz.updatePayablePrice();
            });
        } else {
            $(document).on('change', '.js-gift-card-selector', function () {
                var $this = $(this);
                var $option = $('.js-gift-card-selector option:selected');

                if ($this.val().length > 0) {
                    $('.js-gift-msg-success, .js-gift-msg-error').addClass("hidden");
                    var amount = Math.min($option.data('value'), (parseInt($('#cartPayablePrice .js-price').data('amount')) - parseInt($('.js-voucher-discount-value').data('amount'))));
                    var serial = $this.val();
                    $('.js-gift-card-input').val(serial).attr('readonly', true);
                    var persianAmount = Services.convertToFaDigit(Services.formatCurrency(amount, true, ''));
                    $('.js-gift-card-discount').removeClass('hidden').find('.js-gift-card-discount-value').text(persianAmount).data('amount', amount);
                    $('#applyGiftCard').addClass('is-important').text('حذف کد هدیه').removeClass('disabled');

                    $('.js-gift-msg-success').removeClass("hidden");
                    $('.js-gift-card-value').text(persianAmount);
                }

                thiz.updatePayablePrice();
            });
        }
    },

    createGiftCardRow: function(data) {
        var giftCardContainer = $('.js-gift-card-container'),
            expireDate = !data.expireDate ? 'بدون تاریخ انقضا' : ('انقضا' + '<span>' + Services.convertToFaDigit(data.expireDate) + '</span>');

        giftCardContainer.append('<div class="c-payment__gift-card-data-row">' +
            '<label class="c-outline-radio">' +
            '<input type="radio" name="gift_card_serial" value="' + data.serial + '"' +
            'data-amount="' + data.remainingAmount + '"' +
            'id="gift-card-' + data.serial + '">' +
            '<span class="c-outline-radio__check"></span>' +
            '</label>' +
            '<label class="c-payment__gift-card-data" for="gift-card-' + data.serial + '">' +
            '<div class="c-payment__gift-card-info">' +
            '<div class="c-payment__gift-card-info--serial">' +
            data.serial +
            '</div>' +
            '<div class="c-payment__gift-card-info--balance">' +
            'موجودی' +
            '<span class="c-payment__gift-card-info--balance--price">' +
            Services.convertToFaDigit(Services.formatCurrency(data.remainingAmount, true, '')) +
            '</span>' +
            '<span class="c-payment__gift-card-info--balance--currency">' +
            'تومان' +
            '</span>' +
            '</div>' +
            '<div class="c-payment__gift-card-info--expire">' +
            expireDate +
            '</div>' +
            '</div>' +
            '<span class="c-payment__gift-card-data--dsc js-gift-card-dsc">' +
            'مبلغ ' +
            '<span class="js-gift-card-code-discount-value"></span>' +
            'تومان از سفارش شما با کارت هدیه پرداخت خواهد شد.' +
            '</span>' +
            '</label>' +
            '</div>');
    },

    initApplyGiftCard: function () {
        var thiz = this;
        if(isModuleActive('new_payment')) {
            var $giftCardSerialInput = $('.js-gift-card-serial-input');
            var $applygiftCardButton = $('.js-apply-gift-card');
            var validateGiftCardInput = function(value) {
                if(!!value) {
                    $applygiftCardButton.removeClass('c-payment__serial-input-icon--disabled');
                } else {
                    $applygiftCardButton.addClass('c-payment__serial-input-icon--disabled');
                }
            };

            $giftCardSerialInput.on('keydown', function (e) {
                if(e.which === 13){
                    e.preventDefault();
                    if(!!e.target.value && !$(e.target).hasClass('c-payment__serial-input--error')) {
                        $('.js-apply-gift-card').click();
                    }
                } else if(thiz.isGiftCardInputDirty) {
                    thiz.isGiftCardInputDirty = false;
                    $giftCardSerialInput.removeClass('c-payment__serial-input--error');
                    $('.js-gift-card-error').html('');
                    $('.js-clear-gift-card').hide();
                    $('.js-apply-gift-card').show();
                }

                setTimeout(function(){
                    validateGiftCardInput(e.target.value);
                }, 100);
            });

            $giftCardSerialInput.bind("paste", function(e){
                var pastedData = e.originalEvent.clipboardData.getData('text');
                validateGiftCardInput(pastedData);
            });

            $('.js-clear-gift-card').click(function () {
                thiz.clearSerial('gift-card');
            });

            $('.js-apply-gift-card').click(function() {
                var csrf = $(this).data('token');

                if($('.js-gift-card-container input[value="' + $giftCardSerialInput.val() + '"]').length > 0) {
                    $giftCardSerialInput.addClass('c-payment__serial-input--error');
                    $('.js-gift-card-error').html('این کارت هدیه قبلاً افزوده شده است.');
                    thiz.isGiftCardInputDirty = true;
                    $('.js-clear-gift-card').show();
                    $('.js-apply-gift-card').hide();

                    return false;
                }

                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/giftcards/activate/',
                    {
                        'card_serial': $giftCardSerialInput.val(),
                        token: csrf
                    },
                    function (data) {
                        $('.js-gift-card-code-discount').removeClass('hidden');
                        thiz.createGiftCardRow(data);
                        $('#gift-card-' + data.serial).click();
                        $giftCardSerialInput.val('').trigger('keydown');
                    },
                    function (data) {
                        $giftCardSerialInput.addClass('c-payment__serial-input--error');
                        $('.js-gift-card-error').html(data.errors);
                        thiz.isGiftCardInputDirty = true;
                        $('.js-clear-gift-card').show();
                        $('.js-apply-gift-card').hide();
                        try {
                            ga('set', 'nonInteraction', true);
                            ga('send', 'event', {
                                eventCategory: 'gift card error',
                                eventAction: $giftCardSerialInput.val(),
                                eventLabel: window.userId,
                                eventValue: $('#cartPayablePrice .js-price').data('amount'),
                            });
                        } catch (e) {
                            console.log("GA Error: Voucher code is not true :(");
                        }
                    },
                    true,
                    true
                );
            });
        } else {
            $('#applyGiftCard').addClass('disabled');

            $(document).on('input', '.js-gift-card-input', function (e) {
                if ($(this).val().length != 0) {
                    $('#applyGiftCard').removeClass('disabled');
                } else {
                    $('#applyGiftCard').addClass('disabled');
                }
                if (e.keyCode == 13) {
                    $('#applyGiftCard').click();
                    e.preventDefault();
                }
            });

            $('.js-gift-card-input').on('keypress', function (e) {
                if (e.which === 13) {
                    e.preventDefault();
                    $('#applyGiftCard').click();
                }
            });

            $(document).on('click', '#applyGiftCard:not(.is-important)', function (e) {
                var $this = $(this);
                var serial = $('.js-gift-card-input').val();

                if (serial.length < 1) {
                    return;
                }

                var alreadyAdded = false;
                $('.js-gift-card-selector .js-gift-serial').each(function () {
                    if ($(this).attr('value') == serial) {
                        $('.js-gift-card-selector').val(serial).change().selectric('refresh');
                        $(this).click();
                        alreadyAdded = true;
                        return false;
                    }
                });

                if (alreadyAdded) {
                    return;
                }

                Services.ajaxPOSTRequestJSON(
                    '/ajax/profile/giftcards/activate/',
                    {'card_serial': serial},
                    function (data) {
                        var $newItem = $('.js-gift-serial').first().clone().removeClass('hidden');
                        var persianAmount = Services.convertToFaDigit(Services.formatCurrency(data.remainingAmount, true, ''));
                        $newItem.val(serial).text(serial);
                        $newItem.data('value', data.remainingAmount);
                        $newItem.attr('data-value', data.remainingAmount);
                        $newItem.data('remaining', 'باقی مانده: ' + persianAmount + ' تومان');
                        $newItem.attr('data-remaining', 'باقی مانده: ' + persianAmount + ' تومان');
                        var expireDate = data.expireDate ? Services.convertToFaDigit(data.expireDate) : 'ندارد';
                        $newItem.data('expiry', 'تاریخ انقضا: ' + expireDate);
                        $newItem.attr('data-expiry', 'تاریخ انقضا: ' + expireDate);

                        $('.js-gift-card-selector').prepend($newItem).val(serial).change().selectric('refresh');
                    },
                    function (data) {
                        $('.js-gift-msg-error').removeClass("hidden");
                        // $('.js-gift-msg-error').removeClass("hidden").find('.js-gift-msg-error-text').text(data.errors[Object.keys(data.errors)[0]]);
                    },
                    true,
                    true
                );
            });
        }
    },

    initRemoveGiftCard: function () {
        var thiz = this;
        $(document).on('click', '#applyGiftCard.is-important', function (e) {
            var $this = $(this);

            $('.js-gift-card-discount').addClass('hidden').find('.js-gift-card-discount-value').text('').data('amount', 0);
            $('.js-gift-msg-success').addClass("hidden");
            $('.js-gift-card-selector').val('').selectric('refresh');
            $('#applyGiftCard').removeClass('is-important').text('ثبت کد هدیه').addClass('disabled');
            $('.js-gift-card-input').val('').attr('readonly', false);

            thiz.updatePayablePrice();
        });
    },

    initParcelDiscount: function() {
        $('.js-discount-container').on('click', function(event) {
            event.stopPropagation();
            $(this).hide();
        });
    },

    initCheckWalletStatus: function () {
        var walletContainer = $('.js-wallet-container');
        var $walletAmount = $('.js-wallet-amount');
        var thiz = this;

        Services.ajaxGETRequestJSON(
            '/ajax/profile/wallet/',
            {},
            function (res) {
                var response = (res || {});
                if (!response.hasOwnProperty('amount') && !response.hasOwnProperty('activationUrl')) {
                    walletContainer.addClass('u-hidden');
                } else if (typeof(response.amount) === 'number') {
                    window.walletAmount = response.amount;
                    thiz.updatePayablePrice();
                    $walletAmount.text(Services.convertToFaDigit(Services.formatCurrency(response.amount, true, '')));
                    walletContainer.removeClass('u-hidden');
                    if (response.amount - window.payablePrice >= 0) {
                        $('.js-wallet-option').click();
                        walletContainer.find('.js-paymethod-title').text('پرداخت از کیف پول');
                    } else {
                        if ((window.payablePrice - response.amount) > window.cashInDailyLimit) {
                            walletContainer.addClass('u-hidden');
                        } else {
                            $('.js-online-option').click();
                        }
                    }
                } else if (response.activationUrl) {
                    walletContainer.addClass('u-hidden');
                }
            },
            function () {
                walletContainer.addClass('u-hidden');
            },
            false,
            false
        );
    },
    
    initVoucherAndGiftCardEvent: function () {
        var $voucherHeader = $('.js-voucher-header'),
            $voucherList = $('.js-voucher-list');

        $voucherHeader.click(function(){
            $voucherHeader.toggleClass('c-payment__voucher-header--open');
            $voucherList.toggleClass('u-hidden');
        });
    },

    setOrderTypeGa: function () {
        if(!window.userOrderType) return

        var orderType = window.userOrderType;

        try {

            if (orderType === 'First Fresh') {
                ga('set', 'nonInteraction', true);
                ga('send', 'event', {
                    eventCategory: 'Ecommerce',
                    eventAction: 'Purchase',
                    eventLabel: 'First fresh'
                });
            }

            if (orderType === 'New Customer First Fresh') {
                ga('set', 'nonInteraction', true);
                ga('send', 'event', {
                    eventCategory: 'Ecommerce',
                    eventAction: 'Purchase',
                    eventLabel: 'New Customer First Fresh'
                });
            }

            if (orderType === 'Fresh') {
                ga('set', 'nonInteraction', true);
                ga('send', 'event', {
                    eventCategory: 'Ecommerce',
                    eventAction: 'Purchase',
                    eventLabel: 'Fresh'
                });
            }

            // if (orderType === 'Non Fresh'){}

        } catch (e) {
            console.error('Erorr: Set Order Type For GA');
        }
    }

};

$(function () {
    IndexAction.init();
});



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/paymentController/paymentAction.js]*/
var PaymentAction = {
    init: function () {
        var functions = [
            this.setGACODAvailability
        ]

        Services.callListInTryCatch(functions, this);
    },

    setGACODAvailability: function () {
        if(window.isCODAvailable) {
            window.dataLayer.push({'codAvailable': '1'});
        } else {
            window.dataLayer.push({'codAvailable': '0'});
        }
    },

    setGAPaymentMethodEvent: function(paymentMethod) {
        var GAPaymentMethod;

        if(paymentMethod === 'online') {
            GAPaymentMethod = 'IPG';
        } else if(paymentMethod === 'wallet') {
            GAPaymentMethod = 'Wallet';
        } else if(paymentMethod === 'credit') {
            GAPaymentMethod = 'Credit';
        } else if(paymentMethod === 'pos') {
            GAPaymentMethod = 'COD';
        }

        if(!GAPaymentMethod) return false;

        window.dataLayer.push({
            event: 'eec.checkoutOption',
            ecommerce: {
                checkout_option: {
                    actionField: {
                        step: 3,
                        option: GAPaymentMethod
                    }
                }
            }
        })
    }
};

$(function () {
    PaymentAction.init();
});



/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/shared/kyc.js]*/
var KYCAction = {
    init: function () {
        if (isModuleActive('dk_kyc_payment')) {
            KYCAction.initKYCModal();
        }
    },

    initKYCModal() {
        var $kycModal = $('[data-remodal-id=kyc-modal]').remodal();
        var $kycForm = $('#kyc-info-form');
        var file,
            shouldHaveFile = false,
            hasFile = false;
        var formOptions = {
            rules: {
                'kyc[national_identity_number]': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    national_identity_number: true
                },
                'kyc[first_name]': {
                    required: true,
                    persian_english_letters_only: true,
                    maxlength: 255
                },
                'kyc[last_name]': {
                    required: true,
                    persian_english_letters_only: true,
                    maxlength: 255
                },
                'kyc[foreigner_document]': {
                    required: false,
                },
            },

            messages: {
                'kyc[national_identity_number]': {
                    'required': 'کد ملی نامعتبر است',
                    'digits': 'کد ملی را درست وارد نمایید',
                    'minlength': 'کد ملی را کامل وارد نمایید',
                    'maxlength': 'کد ملی را درست وارد نمایید',
                    'national_identity_number': 'کد ملی نامعتبر است'
                },
                'kyc[first_name]': {
                    'required': 'نام خود را وارد نمایید',
                    'persian_english_letters_only': 'فقط حروف فارسی و انگلیسی مجاز است',
                    'maxlength': 'نام وارد شده باید کمتر از ۳۰ حرف باشد'
                },
                'kyc[last_name]': {
                    'required': 'نام خانوادگی را وارد نمایید',
                    'persian_english_letters_only': 'فقط حروف فارسی و انگلیسی مجاز است',
                    'maxlength': 'نام خانوادگی طولانی است'
                },
            }
        };
        $kycForm.validate(formOptions);

        $('.js-kyc-btn')
            .on('click', function (e) {
                e.preventDefault();
                $kycModal.open();
                $('.js-kyc-normal-body').removeClass('u-hidden');
                $('.js-kyc-error-body').addClass('u-hidden');
            });
        var isForeign = false;
        $('.js-foreign-checkbox')
            .on('change', function () {
                if (!isForeign) {
                    $('.js-foreign-element').removeClass('u-hidden');
                    $('.js-native-element').addClass('u-hidden');
                    isForeign = true;
                } else {
                    $('.js-foreign-element').addClass('u-hidden');
                    $('.js-native-element').removeClass('u-hidden');
                    isForeign = false;
                }
                formOptions.rules['kyc[national_id]'].required = !formOptions.rules['kyc[national_id]'].required;
                shouldHaveFile = !shouldHaveFile;
                $kycForm.validate(formOptions);
            });

        $('.js-upload-input')
            .on('change', function () {
                var successCallback = function () {
                    hasFile = true;
                    $(this).parent().find('.js-button-text').text('تغییر مدرک بارگذاری شده');
                    $('.js-file-name').text(file.name).removeClass('u-hidden');
                };
                file = this.files[0];
                KYCAction.sendFile(file, successCallback);
            });

        $kycForm
            .on('submit', function (e) {
                e.preventDefault();

                if ($('.js-kyc-submit-btn').hasClass('js-submit-disabled')) {
                    $kycModal.close();
                    return;
                }

                if (!$kycForm.valid() || (shouldHaveFile && !hasFile)) {
                    return;
                }

                Services.ajaxPOSTRequestJSON(
                    '/ajax/payment/user-verification/update/',
                    $kycForm.serialize(),
                    function () {
                        $('.js-kyc-success-message').removeClass('u-hidden');
                        $('.js-kyc-error').addClass('u-hidden');
                        $('.js-kyc-submit-btn').text('ادامه فرایند خرید').addClass('js-submit-disabled');
                    },
                    function (response) {
                        KYCAction.showKYCError(response.errors);
                    }
                );
            });
    },

    sendFile(file, successCallback, failCallback) {
        //Todo Url needs to be set
        var sendFileUrl = '/ajax/shipping/';
        var formData = new FormData();

        formData.append('file', file);

        $.ajax({
            type: 'POST',
            url: sendFileUrl,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function () {

            },

            success: function (response) {
                if (response.status) {
                    successCallback();
                }
            },

            error: function (response) {
                console.log(response.stat)
            }
        });
    },
    showKYCError(errorText) {
        $('.js-kyc-error').removeClass('u-hidden').text(errorText);
    }
}

$(function () {
    KYCAction.init();
});