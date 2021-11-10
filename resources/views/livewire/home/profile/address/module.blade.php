<div id="adressbtnclick" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="adressbtnclick2"
         class=" c-modal c-modal--no-bottom-padding js-address-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="add-edit-address" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  ">
            <div class="c-modal__title js-address-modal-title">
                آدرس جدید
            </div>
            <div onclick="closeaddress()" class="c-modal__close" data-remodal-action="close">
            </div>
        </div>
        <form wire:submit.prevent="addressForm"
              id="add-edit-address-form" novalidate="novalidate">
            <div class="c-address__modal-content " id="address-modal-form">
                <div class="c-address__separator">
                </div>
                <div class="c-address__form">
                    <div class="c-address__form-row">
                        <div class="o-form__field-container">
                            <div class="o-form__field-label">
                                استان*
                            </div>
                            <input wire:model.defer="address.state"
                                   class="o-form__field js-input-field js-address-address">
                        </div>
                        <div class="o-form__field-container">
                            <div class="o-form__field-label">
                                شهر*
                            </div>
                            <input wire:model.defer="address.city"
                                   name="address[address]" type="" placeholder=""
                                   value=""
                                   class="o-form__field js-input-field js-address-address">
                        </div>
                    </div>

                    <div class="c-address__form-row c-address__form-row--full-width js-address-field"><label
                            class="o-form__field-container">
                            <div class="o-form__field-label">
                                نشانی پستی*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.address"
                                       name="address[address]" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-address">
                            </div>
                        </label>
                    </div>
                    <div class="c-address__form-row">
                        <div class="c-address__form-row
                 c-address__form-row--z-index-0 "><label class="o-form__field-container">
                                <div class="o-form__field-label">
                                    پلاک*
                                </div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.bld_num" type="" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-building-number"
                                           aria-invalid="false"></div>
                            </label>
                            <label class="o-form__field-container">
                                <div class="o-form__field-label">
                                    واحد
                                </div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.vahed" type="" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-apartment-number"
                                           aria-invalid="false"></div>
                            </label>
                        </div>
                        <div class="c-address__form-row"><label class="o-form__field-container">
                                <div class="o-form__field-label">
                                    کد پستی*
                                </div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.code_posti" type="" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-postal-code"
                                           aria-invalid="false"></div>
                                <div class="o-form__field-helper">
                                    کدپستی باید ۱۰ رقم و بدون خط تیره باشد
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="c-address__form">
                    <div class="c-address__form-row
                     c-address__form-row--z-index-0 "><input type="hidden" class="js-address-id" value=""><label
                            class="o-form__field-container">
                            <div class="o-form__field-label">
                                نام گیرنده*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.name" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-first-name">
                            </div>
                        </label>
                        <label class="o-form__field-container">
                            <div class="o-form__field-label">
                                نام خانوادگی گیرنده*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.lname" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-last-name">
                            </div>
                        </label>
                    </div>
                    <div class="c-address__form-row"><label class="o-form__field-container">
                            <div class="o-form__field-label">
                                شماره موبایل*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.mobile" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-mobile-phone">
                            </div>
                            <div class="o-form__field-helper">
                                مثل: ۰۹۱۲۳۴۵۶۷۸۹
                            </div>
                        </label>
                    </div>
                </div>
                <div class="c-address__separator"></div>
                <div class="c-address__modal-footer">
                    <button class="o-btn o-btn--contained-red-md js-submit-btn" type="submit">
                        تایید و ثبت آدرس
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="adressbtnclickupdate" class="remodal-wrapper remodal-is-closed" style="display: none;">
    <div id="adressbtnclickupdate2"
         class=" c-modal c-modal--no-bottom-padding js-address-modal remodal-is-initialized remodal-is-closed"
         data-remodal-id="add-edit-address" role="dialog" aria-labelledby="modalTitle" tabindex="-1"
         aria-describedby="modalDesc" data-remodal-options="closeOnOutsideClick: false">
        <div class="c-modal__top-bar  ">
            <div class="c-modal__title js-address-modal-title">
                ویرایش آدرس
            </div>
            <div onclick="closeaddressupdate()" class="c-modal__close" data-remodal-action="close">
            </div>
        </div>
        <form wire:submit.prevent="addressForm"
              id="add-edit-address-form" novalidate="novalidate">
            <div class="c-address__modal-content " id="address-modal-form">
                <div class="c-address__separator">
                </div>
                <div class="c-address__form">
                    <div class="c-address__form-row">
                        <div class="o-form__field-container">
                            <div class="o-form__field-label">
                                استان*
                            </div>
                            <input wire:model.defer="address.state"
                                   class="o-form__field js-input-field js-address-address">
                        </div>
                        <div class="o-form__field-container">
                            <div class="o-form__field-label">
                                شهر*
                            </div>
                            <input wire:model.defer="address.city"
                                   name="address[address]" type="" placeholder=""
                                   value=""
                                   class="o-form__field js-input-field js-address-address">
                        </div>
                    </div>
                    <div class="c-address__form-row c-address__form-row--full-width js-address-field"><label
                            class="o-form__field-container">
                            <div class="o-form__field-label">
                                نشانی پستی*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.address"
                                       name="address[address]" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-address">
                            </div>
                        </label>
                    </div>
                    <div class="c-address__form-row">
                        <div class="c-address__form-row
                 c-address__form-row--z-index-0 "><label class="o-form__field-container">
                                <div class="o-form__field-label">
                                    پلاک*
                                </div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.bld_num" type="" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-building-number"
                                           aria-invalid="false"></div>
                            </label>
                            <label class="o-form__field-container">
                                <div class="o-form__field-label">
                                    واحد
                                </div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.vahed" type="" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-apartment-number"
                                           aria-invalid="false">
                                </div>
                            </label>
                        </div>
                        <div class="c-address__form-row"><label class="o-form__field-container">
                                <div class="o-form__field-label">
                                    کد پستی*
                                </div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.code_posti" type="" placeholder=""
                                           value=""
                                           class="o-form__field js-input-field js-address-postal-code"
                                           aria-invalid="false">
                                </div>
                                <div class="o-form__field-helper">
                                    کدپستی باید ۱۰ رقم و بدون خط تیره باشد
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="c-address__form">
                    <div class="c-address__form-row
                     c-address__form-row--z-index-0 "><input type="hidden" class="js-address-id" value=""><label
                            class="o-form__field-container">
                            <div class="o-form__field-label">
                                نام گیرنده*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.name" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-first-name">
                            </div>
                        </label>
                        <label class="o-form__field-container">
                            <div class="o-form__field-label">
                                نام خانوادگی گیرنده*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.lname" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-last-name">
                            </div>
                        </label>
                    </div>
                    <div class="c-address__form-row"><label class="o-form__field-container">
                            <div class="o-form__field-label">
                                شماره موبایل*
                            </div>
                            <div class="o-form__field-frame">
                                <input wire:model.defer="address.mobile" type="" placeholder=""
                                       value=""
                                       class="o-form__field js-input-field js-address-mobile-phone">
                            </div>
                            <div class="o-form__field-helper">
                                مثل: ۰۹۱۲۳۴۵۶۷۸۹
                            </div>
                        </label>
                    </div>
                </div>
                <div class="c-address__separator"></div>
                <div class="c-address__modal-footer">
                    <button class="o-btn o-btn--contained-red-md js-submit-btn" type="submit">تایید و ثبت آدرس</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function address2() {
        document.getElementById("adressbtnclick").style = "display: block !important; ";
        document.getElementById("adressbtnclick").classList.remove("remodal-is-closed");
        document.getElementById("adressbtnclick").classList.add("remodal-is-opened");
        document.getElementById("adressbtnclick2").classList.remove("remodal-is-closed");
        document.getElementById("adressbtnclick2").classList.add("remodal-is-opened");
    }

    function closeaddress() {
        document.getElementById("adressbtnclick").style = "display: none !important; ";
        document.getElementById("adressbtnclick").classList.remove("remodal-is-opened");
        document.getElementById("adressbtnclick").classList.add("remodal-is-closed");
    }

    function address2update(id) {
        console.log(id)
        document.getElementById("adressbtnclickupdate").style = "display: block !important; ";
        document.getElementById("adressbtnclickupdate").classList.remove("remodal-is-closed");
        document.getElementById("adressbtnclickupdate").classList.add("remodal-is-opened");
        document.getElementById("adressbtnclickupdate2").classList.remove("remodal-is-closed");
        document.getElementById("adressbtnclickupdate2").classList.add("remodal-is-opened");
    }

    function closeaddressupdate() {
        document.getElementById("adressbtnclickupdate").style = "display: none !important; ";
        document.getElementById("adressbtnclickupdate").classList.remove("remodal-is-opened");
        document.getElementById("adressbtnclickupdate").classList.add("remodal-is-closed");
    }
</script>
