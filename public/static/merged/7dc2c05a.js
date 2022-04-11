/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/referralController/indexAction.js]*/
IndexAction = {
    init: function () {
        var functions = [
            this.initFAQ,
            this.initModal,
            this.initCopyToClipboard,
            this.initGetVoucher,
            this.initLockVoucher
        ];
        for (var i = 0; i < functions.length; ++i) {
            try {
                functions[i].call(this);
            } catch (e) {
                window.Sentry && window.Sentry.captureException(e);
                // eslint-disable-next-line no-console
                console.warn(e);
            }
        }
    },

    initFAQ: function () {
        var questions = $('.js-faq-question');
        questions.on('click', function () {
            if($(this).hasClass('selected')) {
                $(this).prev().removeClass('no-border');
                $(this).removeClass('selected');
            } else {
                questions.removeClass('selected');
                questions.removeClass('no-border');
                $(this).addClass('selected');
                $(this).prev().addClass('no-border');
            }
        })
    },

    initModal: function () {
        var modal = $('.js-vouchers-modal').remodal();
        $('.js-vouchers-modal-link').on('click', function () {
            modal.open();
        });

        var user = new UserClass;
        $('.js-login-btn').on('click', function () {
            user.displayLoginForm('');
        })
    },

    initGetVoucher: function () {
        var field = $('.js-voucher-field');
        var container = $('.js-code-container');
        $('.js-generate-voucher').on('click', function () {
            var thiz = $(this);
            Services.ajaxGETRequestJSON(
                '/ajax/digiclub/referral-voucher-code/',
                {},
                function (response) {
                    field.text(response.code);
                    thiz.off();
                    thiz.addClass('u-hidden');
                    container.removeClass('u-hidden');
                },
                function (response) {},
                true,
                true
            );
        })
    },

    initCopyToClipboard: function () {
        $(document).on('click', '.js-copy-clip-board', function () {
            var copyBtn = $(this);
            var voucherItem = copyBtn.closest('.js-voucher-item');
            var voucherNotif = voucherItem.find('.js-copy-notif');
            var text = voucherItem.find('.js-voucher-field').text();

            copyToClipboard(text);
            voucherNotif.addClass('show');
            copyBtn.addClass('c-referral__invite-input-icon--used');

            setTimeout(function () {
                voucherNotif.removeClass('show');
            }, 3000)
        });

        function copyToClipboard(text) {
            var aux = document.createElement("input");
            aux.setAttribute("value", text);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
    },

    initLockVoucher: function () {
        $(document).on('click', '.js-voucher-lock', function () {
            var thiz = $(this);
            var voucherItem = thiz.closest('.js-voucher-item');
            var voucherItemHolder = thiz.closest('.js-voucher-lock-item');
            var voucherNotif = voucherItemHolder.find('.js-voucher-lock-text');

            voucherItem.addClass('u-hidden');
            voucherNotif.addClass('show');

            setTimeout(function () {
                voucherNotif.removeClass('show');
                voucherItem.removeClass('u-hidden');
            }, 3000)
        });
    }

};

$(function () {
    IndexAction.init();
});