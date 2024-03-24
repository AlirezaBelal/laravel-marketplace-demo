<div class="c-RD-profile__dis-none" data-name="docUpload" style="display: none;">


    <div class="c-grid__row c-RD-profile__mt-0 c-profile-doc-upload-container"
         id="docUpload">
        <div class="c-grid__col">
            <div class="c-card c-RD-profile__bdrs-top-0 js-profile-content-spinner"
                 style="box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.05);">
                <div
                    class="c-card__header c-card__header--with-controls business_info   ">

                </div>
                <div class="c-card__body c-card__body--form">
                    <div class="c-grid__row">
                        <div
                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-10 c-RD-profile__section-title">
                            <span class="c-RD-profile__title">بارگذاری مدارک</span>
                        </div>
                        <div class="c-card c-RD-profile__bdrs-top-0 " id="profile-step-3" style="box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.05);">
                            <div class="c-card__body c-card__body--form js-location-container">

                                <div class="c-ui-form__row c-ui-form__row--extra-gap">


                                    <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                        <label class="c-RD-profile__input-name" for="profile[website]">نوع مدرک</label>

                                        <div class="c-ui-input ">


                                            <input type="text" name="contactInfo[website]"

                                                   class="c-ui-input__field c-ui-input__RD-field"
                                                   wire:model.defer="docType" value="" placeholder="">


                                        </div>

                                    </div>
                                    <div class="c-ui-form__col c-ui-form__col--4 c-ui-form__col--xs-12">
                                        <label class="c-RD-profile__input-name" for="profile[website]">تصویر مدرک</label>
                                        <div class="c-grid__row c-RD-profile__logo--placeholder uk-margin-remove js-upload-seller-logo" id="logo-upload-input">
                                             <label class="c-RD-profile__upload-btn">
                                                <input
                                                       wire:model="docImage"
                                                       type="file" class="js-profile-business-info-logo" accept="image/jpg,image/png,image/jpeg">

                                            </label>





                                        </div>


                                    </div>
                                </div>



                                <div class="c-ui-form__row c-RD-profile__form-action js-profile-form-action " wire:ignore>

                                    <button type="submit" class="c-RD-profile__approve-btn uk-flex uk-flex-center uk-flex-middle uk-margin-small-right js-profile-submit-changes">
                                        ثبت تغییرات
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="c-grid__row">
                        <div class="c-ui-table__wrapper c-RD-profile--w-100p">
                            <table class="c-ui-table js-table-fixed-header">
                                <thead class="c-package-create__thead ">
                                <tr class="c-ui-table__row c-ui-table__row--head">
                                    <th class="c-ui-table__header c-ui-table__header--smaller c-ui-table__header--nowrap ">
                                        <span>ردیف</span>
                                    </th>
                                    <th class="c-ui-table__header c-ui-table__header--smaller c-ui-table__header--nowrap ">
                                        <span>تصویر مدرک</span>
                                    </th>
                                    <th class="c-ui-table__header c-ui-table__header--smaller c-ui-table__header--nowrap ">
                                        <span>عنوان مدرک</span>
                                    </th>
                                    <th class="c-ui-table__header c-ui-table__header--smaller c-ui-table__header--nowrap ">
                                        <span>وضعیت</span>
                                    </th>
                                    <th class="c-ui-table__header c-ui-table__header--smaller c-ui-table__header--nowrap ">
                                        <span>تاریخ انقضا</span>
                                    </th>
                                    <th class="c-ui-table__header c-ui-table__header--smaller c-ui-table__header--nowrap ">
                                        <span>عملیات</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="js-doc-upload-body">
                                @foreach(\App\Models\SellerDoc::where('user_id',auth()->user()->id)->get() as $doc)
                                <tr class="c-ui-table__row c-ui-table__row--body c-ui-table__row--with-hover c-ui-table__row--selected js-doc-upload-row"
                                    data-index="{index}" style="height: 102px;">
                                    <td class="c-ui-table__cell">
                                        @php
                                        $i = 1;
                                        @endphp
                                        {{$i++}}
                                    </td>
                                    <td class="c-ui-table__cell c-ui-table__cell--img"
                                        style="padding-left: 72px">
                                        <img
                                            class="c-ui-table__cell--img-rounded js-doc-upload-table-image-{index}"
                                            src="/storage/{{$doc->img}}" style="width: 70px;height: 70px;">
                                    </td>
                                    <td class="c-ui-table__cell c-ui-table__cell--item-title"
                                        style="max-width: 342px;">
                                        {{$doc->type}}
                                    </td>
                                    <td class="c-ui-table__cell">
                                        @if($doc->status == 1)

                                        <div
                                            class="c-RD-profile__doc-upload-status c-RD-profile__doc-upload-status--approved js-approved-doc"
                                            data-show="{status_en : approved}">تایید شده
                                        </div>
                                        @elseif($doc->status == 0)
                                        <div
                                            class="c-RD-profile__doc-upload-status c-RD-profile__doc-upload-status--waiting js-waiting-doc"
                                            data-show="{status_en : new}">در انتظار تایید
                                        </div>
                                        @elseif($doc->status ==-1)
                                        <div
                                            class="c-RD-profile__doc-upload-status c-RD-profile__doc-upload-status--rejected js-rejected-doc"
                                            data-show="{status_en : rejected}"
                                            style="padding: 5px 12px 5px 6px;">
                                            رد شده

                                        </div>
                                            @endif
                                    </td>
                                    <td class="c-ui-table__cell">
                                        {{\App\Models\PersianNumber::translate(jdate($doc->date_expire)->format(' %d %B %Y'))}}</td>


                                    <td class="c-ui-table__cell c-ui-table__cell--counter-control"
                                        style="padding-right: 0">
                                        <div
                                            class="c-grid__col c-grid__col--sm-6 c-grid__col--lg-2"
                                            data-show="{status_en : rejected}"
                                            style="padding: 0">
                                            <div  wire:click="deleteDoc({{$doc->id}})"
                                                 class="c-RD-profile__action-btn c-RD-profile__action-btn--s-edit "
                                                 >حذف
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
