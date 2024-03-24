<script>
    // initSubmitQuestion: function() {
    //     var thiz = this;
    //     var $form = $('#save-question');
    //
    //     if(isModuleActive('dk_pdp_redesign')) {
    //         $form = $('.js-add-question-form');
    //         var questionModal;
    //         $(document).on('click', '.js-add-question', function () {
    //             if(!questionModal)
    //                 questionModal = $('.js-add-question-modal').remodal();
    //             questionModal.open();
    //         });
    //         $(document).on('change input', '.js-question-body', function () {
    //             var submit = $('.js-add-question-submit');
    //             if($(this).val()) {
    //                 submit.removeClass('disabled');
    //             } else {
    //                 submit.addClass('disabled');
    //             }
    //         })
    //     }
    //
    //     if($form.length === 0)
    //         return;
    //
    //     $form.validate({
    //         rules: {
    //             'qa[body]': {
    //                 required: true
    //             }
    //         },
    //         messages: {
    //             'qa[body]': {
    //                 'required': 'متن وارد نشده است'
    //             }
    //         }
    //     }).showBackendErrors();
    //
    //     $form.submit(function (e) {
    //         e.preventDefault();
    //         var user = thiz.getUser();
    //         if (!user.checkLogged()) {
    //             user.displayLoginForm('ابتدا باید وارد حساب کاربری خود شوید');
    //             return;
    //         }
    //
    //         if (!$form.valid()) {
    //             return;
    //         }
    //
    //         Services.ajaxPOSTRequestJSON(
    //             '/ajax/product/save-question/' + productId + '/',
    //             $(this).serializeArray(),
    //             function (data) {
    //                 $('[name="qa[body]"]').val('');
    //                 $form[0].reset();
    //
    //                 thiz.initQuestionSuccessModal();
    //
    //             },
    //             function (data) {
    //                 DKToast(data.errors);
    //             },
    //             true,
    //             true
    //         );
    //
    //         return false;
    //     });
    // },
    // $(document).on('click', '.js-add-question-submit', function () {
    //     var dkp = $(this).data('product-id');
    //     try {
    //         ga('set', 'nonInteraction', true);
    //         ga('send', 'event', {
    //             eventCategory: 'product_page',
    //             eventAction:'Question Final Submit',
    //             eventLabel: dkp
    //         });
    //     } catch (e) {
    //         console.log('GA Error : submit-question');
    //     }
    // })
    // $(document).on('click', '.js-add-question', function () {
    //     var dkp = $('.js-product-page').data('product-id');
    //     try {
    //         ga('set', 'nonInteraction', true);
    //         ga('send', 'event', {
    //             eventCategory: 'product_page',
    //             eventAction:'Question Submit',
    //             eventLabel: dkp
    //         });
    //     } catch (e) {
    //         console.log('GA Error : question-submit');
    //     }
    // })
    function addque() {
        document.getElementById("add-que").style = "display: block !important; ";
    }
    function closeque() {
        document.getElementById("add-que").style = "display: none !important; ";
    }
</script>
<div id="add-que" class="remodal-wrapper remodal-is-opened" style="display: none;">
    <div class="remodal c-modal c-question__modal js-add-question-modal remodal-is-initialized remodal-is-opened"
         data-remodal-id="add-question" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="">
        <div class="c-modal__top-bar  ">
            <div class="c-modal__title ">پرسش خود را در مورد کالا مطرح کنید</div>
            <div id="closequestion" onclick="closeque()" class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form wire:submit.prevent="addQuestion">
            <label class="o-form__field-container">
                <div class="o-form__field-frame">
            <textarea  wire:model.defer="comment" placeholder=""
                      class="o-form__textarea  js-ui-char-counter" maxlength="100">
            </textarea>
                </div>
                <div class="o-form__field-counter">
                    <span class="js-ui-counter-value">۰</span>
                    /۱۰۰
                </div>
            </label>

            <div class="c-question__modal-actions">
                <div class="c-question__modal-action-desc">
                    ثبت پرسش به معنی موافقت با
                    <a href="/page/comments-rules/" target="_blank" class="o-link o-link--no-border o-link--sm">قوانین
                        انتشار دیجی‌کالا</a> است.
                </div>
                <button type="submit" class="o-btn o-btn--contained-red-md js-add-question-submit ">ثبت پرسش
                </button>
            </div>
        </form>
    </div>
</div>
