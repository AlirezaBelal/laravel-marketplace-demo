<div>
    <main class="c-main js-layout-main-content" data-is-production-mode="1">
        <div class="uk-container uk-container-large">

            <div class="c-grid ">
                <div class="c-grid__row c-product-list--align-header">
                    <div class="c-grid__col">
                        <div class="c-card c-card--transparent">
                            <h1 class="c-card__title c-card__title--dark c-card__title--desc">مدیریت محصولات
                                <span>
                                برای ویرایش و مدیریت مشخصات ، گروه ، تصویر محصولات و درج تنوع (گارانتی ، به همراه رنگ یا سایز) از این قسمت استفاده نمایید
                            </span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="c-grid__row">
                    <div class="c-grid__col">
                        <div class="c-card">
                            <div class="c-card__header">
                                <div class="c-card__title">جستجو و فیلتر</div>
                            </div>
                            <div class="c-card__body">
                                <form class="js-search-product-form" id="searchForm">
                                    <div class="c-ui-form__row c-ui-form__row--nowrap c-ui-form__row--wrap-xs">
                                        <div
                                            class="c-ui-form__col c-ui-form__col--12 c-ui-form__col--xs-12 c-ui-form__col--shrink c-product-text-search-container">
                                            <label class="c-ui-form__label">جستجو در</label>
                                            <div class="c-ui-form__row c-ui-form__row--group">

                                                <div
                                                    class="c-ui-form__col c-ui-form__col--shrink c-ui-form__col--9 c-ui-form__col--xs-12 c-ui-form__col--group-item c-ui-form__col--wrap-xs c-ui-form__col--xs-full uk-padding-remove-right c-ui--mr-10">
                                                    <label>
                                                        <div class="c-ui-input">
                                                            <input type="text" name="search[value]"
                                                                   wire:model.debounce.1000="search"
                                                                   class="c-ui-input__field c-ui-input__field--order js-form-clearable"
                                                                   id="variants-search" value=""
                                                                   placeholder="عبارت مورد نظرتان را وارد کنید...">
                                                        </div>
                                                    </label></div>
                                                <div
                                                    class="c-ui-form__col c-ui-form__col--xs-6 c-ui-form__col--group-item c-ui-form__col--wrap-xs">
                                                    <button
                                                        class="c-ui-btn c-ui-btn--xs-block c-ui-btn--active c-ui-btn--search-form"
                                                        id="submitButton" disabled=""><span>جستجو</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="js-table-container">
                    <div class="c-product-list__alert c-ui--mt-25 c-ui--mb-25">
                        محصول با وضعیت پیش نویس فقط برای شما قابل نمایش است و توسط مرکز فروشندگان قابل رویت نیست. محصول
                        پیش نویس
                        خود را انتشار داده و منتظر تأیید آن باشید.
                    </div>
                    <div class="c-grid__row">
                        <div class="c-grid__col">
                            <div class="c-card">
                                <div class="c-card__wrapper">
                                    <div class="c-card__header c-card__header--table">
                                        <a href="/seller/content/create/product/"
                                           target="_blank">
                                            <div class="c-mega-campaigns__btns-green-plus uk-margin-remove">
                                                ایجاد کالای جدید
                                            </div>
                                        </a>
                                        <div class="c-ui-paginator js-paginator">
                                            <div class="c-ui-paginator__total" data-rows="۰">
                                                جستجو نتیجه ای نداشت
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c-card__body c-ui-table__wrapper">
                                        <table class="c-ui-table table "
                                        >
                                            <thead>
                                            <tr class="c-ui-table__row">
                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap ">
                    ردیف
                </span></th>

                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap table-header-searchable--desc">
                    عنوان و کد کالا (DKP)
                </span></th>
                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap ">
                    گروه کالایی
                </span></th>
                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap ">
                    برند کالا
                </span></th>

                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap ">
                    وضعيت
                </span></th>
                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap ">
                    تعداد تنوع
                </span></th>
                                                <th class="c-ui-table__header"><span
                                                        class="table-header-searchable uk-text-nowrap table-header-searchable--desc"></span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $product = \App\Models\ProductSellTest::where('user_id', auth()->user()->id)->first();
 $i = 1;
                                            @endphp
                                            @if( \App\Models\ProductSellTest::where('user_id', auth()->user()->id)->first())

                                                <tr  >
                                                    <td>{{$i++}}</td>
                                                    <td>{{$product->title}} - DKP-{{$product->id}}</td>
                                                    <td class="c-ui-table__header">
                                                        {{$product->category->title}}
                                                        <br>
                                                        - {{$product->subcategory->title}}
                                                        <br>
                                                        -- {{$product->childcategory->title}}
                                                    </td>
                                                    <td>{{$product->brand->name}}</td>
                                                    <td class="bg bg-warning" >در انتظار تایید</td>
                                                    <td>1</td>
                                                </tr>


                                            @endif

                                            @foreach($products as $product)
                                                <tr class="">
                                                    <td>{{$i++}}</td>
                                                    <td>{{$product->title}} - DKP-{{$product->id}}</td>
                                                    <td class="c-ui-table__header">
                                                        {{$product->category->title}}
                                                        <br>
                                                        - {{$product->subcategory->title}}
                                                        <br>
                                                        -- {{$product->childcategory->title}}
                                                    </td>

                                                    <td>{{$product->brand->name}}</td>
                                                    <td class="bg bg-success"
                                                    >تایید شده</td>
                                                    <td>{{\App\Models\ProductSeller::where('product_id',$product->id)->count()}}</td>

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
            <div id="pageLoader" class="c-content-loader c-content-loader--fixed">
                <div class="c-content-loader__logo"></div>
                <div class="c-content-loader__spinner"></div>
            </div>
        </div>
    </main>
</div>
