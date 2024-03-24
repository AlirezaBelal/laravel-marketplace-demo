<div>
    <main class="c-main js-layout-main-content" data-is-production-mode="1">
        <div class="uk-container uk-container-large">
            <div class="c-grid c-order">
                <div class="c-grid__row">
                    <div class="c-grid__col">
                        <form action="/packages/setup-varaints/" method="post" id="create-package-form">
                            <input type="hidden" value="" id="variant-ids" name="product_variant_ids">
                            <input type="hidden" value="" id="type" name="type">
                        </form>
                        <input type="hidden" value="1" name="has-warehouses">
                        <div class="c-card c-card--transparent c-ui--my-5">
                            <h1 class="c-card__title c-card__title--dark c-card__title--desc">سفارش‌های تایید شده <span>لطفا توجه کنید فقط در صورت انتخاب فیلتر های <b>"گذشته و امروز"</b> یا <b>"فردا به بعد"</b> امکان ایجاد محموله وجود دارد.</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="c-card c-card--transparent uk-alert" style="padding: 0" uk-alert="">
                    <a class="uk-alert-close uk-close uk-icon" style="z-index: 2;" uk-close="">
                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1">
                            <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                            <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
                        </svg>
                    </a>
                    <div class="c-ui-info">
                        <br>
                        <p>
                            به منظور حفظ سلامت شما، همکاران محترم انبار و سایر فروشندگان عزیز، تقاضا داریم از این پس از
                            ورود به انبار بدون استفاده از ماسک بهداشتی خودداری کنید. از روز شنبه 27 اردیبهشت برای حفظ
                            سلامت همکاران و فروشندگان محترم، از ورود مراجعینی که از ماسک بهداشتی استفاده نکنند تا اطلاع
                            ثانوی جلوگیری خواهد شد. لطفا پیک یا راننده خود را نیز از این قانون مطلع کرده و با فراهم کردن
                            ماسک از مرجوع شدن محموله جلوگیری کنید.
                        </p>
                    </div>
                </div>


                <div class="c-grid__row js-table-container">
                    <div class="c-grid__col">
                        <div class="c-card">
                            <div class="c-card__wrapper">
                                <div class="c-card__header c-card__header--table">
                                    <div class="c-card__header-controls">
                                        <div class="c-grid__row">
                                            <div class="c-grid__col c-grid__col--lg-3">
                                                <div class="c-ui-tooltip__anchor"
                                                     data-ui-tooltip="جهت ساخت محموله سفارش، ابتدا یکی از فیلترهای &quot;گذشته و امروز&quot; یا &quot;فردا به بعد&quot; یا هردو گزینه را انتخاب کنید، سپس روی مربع‌های کنار ستون &quot;ردیف&quot; کلیک کنید تا تیک سبزرنگ نمایش داده شود، سپس روی دکمه ایجاد محموله کلیک کنید.">
                                                    <button
                                                        class="c-ui-btn c-ui-btn--primary c-ui-btn--add js-create-package js-ui-tooltip"
                                                        id="orders-step-9" disabled="">ایجاد محموله
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="c-grid__col c-grid__col--lg-4">
                                                <button class="c-ui-btn js-view-all-orders"
                                                        data-search-url="/ajax/order/view/all/" id="orders-step-8">
                                                    مشاهده جزییات همه سفارش‌ها
                                                </button>
                                            </div>
                                            <div class="c-grid__col c-grid__col--lg-3">
         <span id="orders-step-7" class="c-ui-btn__inline-wrapper">
            <button class="c-ui-btn c-package__export-excel c-package__export-excel--excel-icon js-export-orders"
                    id="export-button">دریافت خروجی اکسل</button>
        </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="c-card__paginator">
                                        <div class="c-ui-paginator js-paginator">
                                            <div class="c-ui-paginator__total" data-rows="۰">
                                                جستجو نتیجه ای نداشت
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="c-card__body c-ui-table__wrapper">
                                    <table class="c-ui-table   js-search-table js-table-fixed-header"
                                           data-sort-column="order_created_at" data-sort-order="desc"
                                           data-search-url="/ajax/order/search/" data-auto-reload-seconds="0"
                                           data-new-ui="1" data-is-header-floating="1" data-has-checkboxes="1"
                                           data-export-url="/order/export/">
                                        <thead>
                                        <tr class="c-ui-table__row">
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <label class="c-ui-checkbox">
                                                    <input type="checkbox" class="c-ui-checkbox__origin all-checkbox">
                                                    <span class="c-ui-checkbox__check"></span>
                                                </label>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">ردیف</span>
                                            </th>

                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">عنوان</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">کد محصول</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">کد تنوع</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">کد فروشنده</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">تعداد سفارش</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">موجودی</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">تعهد ارسال<br>امروز و گذشته</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column">تعهد ارسال<br>فردا به بعد</span>
                                            </th>
                                            <th class="c-ui-table__header c-ui-table__header--nowrap ">
                                                <span class="js-search-table-column"></span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach(\App\Models\Order::where('user_id',auth()->user()->id)->where('payment',1)->get() as $order )
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>{{$i++}}</td>
                                                <td> {{$order->product->title}}</td>
                                                <td>{{$order->product_id}}</td>
                                                <td>{{$order->product_seller_id}}</td>
                                                <td>{{$order->user_id}}</td>
                                                <td>{{$order->count}}</td>
                                                <td>
                                                    {{\App\Models\ProductSeller::where('vendor_id',$order->user_id)->where('product_id',$order->product_id)->first()->product_count}}
                                                </td>
                                                <td>
                                                    {{\App\Models\ProductSeller::where('vendor_id',$order->user_id)->where('product_id',$order->product_id)->first()->time}}
                                                </td>
                                                <td>
                                                    {{\App\Models\ProductSeller::where('vendor_id',$order->user_id)->where('product_id',$order->product_id)->first()->time}}
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="c-card__footer">

                                    <div class="c-card__paginator">
                                        <div class="c-ui-paginator js-paginator">
                                            <div class="c-ui-paginator__total" data-rows="۰">
                                                جستجو نتیجه ای نداشت
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="c-card__loading"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="c-walkthrough js-walkthrough"></div>
        </div>
    </main>
</div>
