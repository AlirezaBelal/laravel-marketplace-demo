<div>
        <div class="o-box" id="address-section" style="margin-right: 200px">
            <div class="o-box__header"><span class="o-box__title">ویرایش آدرس
               {{$address->name}} {{$address->lname}}
                </span></div>
            <div class="c-profile-address__item js-user-address-container">
            <form wire:submit.prevent="addressForm"
                  id="add-edit-address-form" novalidate="novalidate">
                <div class="c-address__modal-content " id="address-modal-form">
                    <div class="c-address__separator"></div>
                    <div class="c-address__form">
                        <div class="c-address__form-row">
                            <div class="o-form__field-container">
                                <div class="o-form__field-label">استان*</div>
                                <input wire:model.defer="address.state"
                                       class="o-form__field js-input-field js-address-address">
                            </div>
                            <div class="o-form__field-container">
                                <div class="o-form__field-label">شهر*</div>
                                <input wire:model.defer="address.city"
                                       name="address[address]" type=""
                                       class="o-form__field js-input-field js-address-address">
                            </div>
                        </div>

                        <div class="c-address__form-row c-address__form-row--full-width js-address-field"><label
                                class="o-form__field-container">
                                <div class="o-form__field-label">نشانی پستی*</div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.address"
                                           name="address[address]" type=""
                                           class="o-form__field js-input-field js-address-address">
                                </div>
                            </label></div>
                        <div class="c-address__form-row">
                            <div class="c-address__form-row
                 c-address__form-row--z-index-0 "><label class="o-form__field-container">
                                    <div class="o-form__field-label">پلاک*</div>
                                    <div class="o-form__field-frame">
                                        <input wire:model.defer="address.bld_num" type=""
                                               class="o-form__field js-input-field js-address-building-number"
                                               aria-invalid="false"></div>
                                </label><label class="o-form__field-container">
                                    <div class="o-form__field-label">واحد</div>
                                    <div class="o-form__field-frame">
                                        <input wire:model.defer="address.vahed" type=""
                                               class="o-form__field js-input-field js-address-apartment-number"
                                               aria-invalid="false"></div>
                                </label></div>
                            <div class="c-address__form-row"><label class="o-form__field-container">
                                    <div class="o-form__field-label">کد پستی*</div>
                                    <div class="o-form__field-frame">
                                        <input wire:model.defer="address.code_posti" type=""
                                               class="o-form__field js-input-field js-address-postal-code"
                                               aria-invalid="false"></div>
                                    <div class="o-form__field-helper">کدپستی باید ۱۰ رقم و بدون خط تیره باشد</div>
                                </label></div>
                        </div>
                    </div>
                    <div class="c-address__form">
                        <div class="c-address__form-row
                     c-address__form-row--z-index-0 "><input type="hidden" class="js-address-id" placeholder=" "><label
                                class="o-form__field-container">
                                <div class="o-form__field-label">نام گیرنده*</div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.name" type=""
                                           class="o-form__field js-input-field js-address-first-name">
                                </div>
                            </label><label class="o-form__field-container">
                                <div class="o-form__field-label">نام خانوادگی گیرنده*</div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.lname" type=""
                                           class="o-form__field js-input-field js-address-last-name">
                                </div>
                            </label></div>
                        <div class="c-address__form-row"><label class="o-form__field-container">
                                <div class="o-form__field-label">شماره موبایل*</div>
                                <div class="o-form__field-frame">
                                    <input wire:model.defer="address.mobile" type=""
                                           class="o-form__field js-input-field js-address-mobile-phone">
                                </div>
                                <div class="o-form__field-helper">مثل: ۰۹۱۲۳۴۵۶۷۸۹</div>
                            </label></div>
                    </div>
                    <div class="c-address__separator"></div>
                    <div class="c-address__modal-footer">
                        <button class="o-btn o-btn--contained-red-md js-submit-btn" type="submit">تایید و ثبت آدرس</button>
                    </div>
                </div>
            </form>

</div>
</div>

</div>
