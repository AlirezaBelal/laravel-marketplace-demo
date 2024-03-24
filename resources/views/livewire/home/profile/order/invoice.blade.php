<div>
    <div id="__next" data-reactroot="">

        <div class="h-100 d-flex flex-column bg-000 ai-center">
            <div
                class="fixed w-full top-0 left-0 bg-000 z-4 w-100 shadow-1-bottom BaseLayoutDesktop_BaseLayoutDesktop__header__CYMZY"
                id="base_layout_desktop_fixed_header" width="1217" height="0"></div>
            <div id="base_layout_desktop_side_bar"
                 class="fixed h-100 left-0 top-0 overflow-y-auto d-none d-flex-lg flex-column BaseLayoutDesktop_BaseLayoutDesktop__sideBar__4zCCX"
                 width="0" height="373"></div>
            <div class="grow-1 bg-000 d-flex flex-column w-100 ai-center shrink-0"
                 style="padding-top: 0px; padding-left: 0px; padding-bottom: 0px;">
                <div id="base_layout_desktop_static_header" class="w-100"></div>
                <div id="base_layout_desktop_sticky_header"
                     class="sticky bg-000 z-3 w-100 BaseLayoutDesktop_BaseLayoutDesktop__stickyHeader__EDgOE"></div>
                <div
                    class="grow-1 bg-000 d-flex flex-column w-100 ai-center BaseLayoutDesktop_BaseLayoutDesktop__content__qBCkO container-xl-w">
                    <div class="PageLoader_PageLoader--hasPageContainer__lznbR d-none"></div>
                    <div class="h-full">
                        <div class="px-4 pb-4 d-flex jc-between ai-center">
                            <div style="width: 113px; height: 30px;"><img
                                    class="w-100 d-inline-block ls-is-cached lazyloaded"
                                    data-src="/logo.svg" width="113" height="30" alt="digikala"
                                    style="object-fit: contain;" src="/logo.svg"></div>
                            <div class="d-flex ai-center gap-x-2">
                                <button onclick="window.print()"
                                        class="relative d-flex ai-center user-select-none Button-module_btn__daEdK text-button-2 Button-module_btn--medium__7lzYn Button-module_btn--primary__RKxUy radius-medium text-button-1">
                                    <div class="d-flex ai-center jc-center Button-module_btn__loading__47UHk">
                                        <div
                                            class="rounded-circle Loading-module_Loading__circle__VPFX- Loading-module_Loading__circle--low-emphasis__BFY3N"></div>
                                        <div
                                            class="rounded-circle Loading-module_Loading__circle__VPFX- Loading-module_Loading__circle--low-emphasis__BFY3N"></div>
                                        <div
                                            class="rounded-circle Loading-module_Loading__circle__VPFX- Loading-module_Loading__circle--low-emphasis__BFY3N"></div>
                                    </div>
                                    <div class="d-flex ai-center jc-center relative grow-1">پرینت / دانلود</div>
                                </button>
                            </div>
                        </div>
                        <div class="bg-100 pt-1 overflow-auto hide-scrollbar">
                            <div class="bg-000 p-5 px-0-lg orderInvoce_orderInvoice__aMH3C">
                                <div>


                                    <meta charset="UTF-8">
                                    <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>فاکتور فروش</title>
                                    <style>
                                        @font-face {
                                            font-family: 'Libre Barcode 128';
                                            font-style: normal;
                                            font-weight: 400;
                                            src: local('Libre Barcode 128 Regular'), local('LibreBarcode128-Regular'), url(https://api.digikala.com/static/files/87c6c4b6.ttf) format('truetype');
                                        }
                                    </style>
                                    <style>
                                        html, body {
                                            padding: 0;
                                            margin: 0 auto;
                                            max-width: 29.7cm;
                                            -webkit-print-color-adjust: exact;
                                        }

                                        body {
                                            padding: 0.5cm
                                        }

                                        * {
                                            box-sizing: border-box;
                                            -moz-box-sizing: border-box;
                                        }

                                        table {
                                            width: 100%;
                                            table-layout: fixed;
                                            border-spacing: 0;
                                        }

                                        .header-table {
                                            table-layout: fixed;
                                            border-spacing: 0;
                                        }

                                        .header-table td {
                                            padding: 0;
                                            vertical-align: top;
                                        }

                                        body {
                                            font: 9pt IRANYekanWeb;
                                            direction: rtl;
                                        }

                                        .print-button {
                                            cursor: pointer;
                                            -webkit-box-shadow: none;
                                            box-shadow: none;
                                            -webkit-user-select: none;
                                            -moz-user-select: none;
                                            -ms-user-select: none;
                                            user-select: none;
                                            display: -webkit-inline-box;
                                            display: -ms-inline-flexbox;
                                            display: inline-flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center;
                                            border-radius: 5px;
                                            background: none;
                                            -webkit-transition: all .3s ease-in-out;
                                            transition: all .3s ease-in-out;
                                            position: relative;

                                            outline: none;
                                            text-align: center;

                                            padding: 8px 16px;
                                            font-size: 12px;
                                            font-size: .857rem;
                                            line-height: 1.833;
                                            font-weight: 700;
                                            background-color: #0fabc6;
                                            color: #fff;
                                            border: 1px solid #0fabc6;
                                        }

                                        .page {
                                            background: white;
                                            page-break-after: always;
                                        }

                                        .flex {
                                            display: flex;
                                        }

                                        .flex > * {
                                            float: left;
                                        }

                                        .flex-grow {
                                            flex-grow: 10000000;
                                        }

                                        .barcode {
                                            text-align: center;
                                            margin: 12px 0 0 0;
                                            height: 30px;
                                        }

                                        .barcode span {
                                            font-size: 35pt;
                                            font-family: 'Libre Barcode 128';
                                        }

                                        .portait {
                                            transform: rotate(-90deg) translate(0, 40%);
                                            text-align: center;
                                        }

                                        .header-item-wrapper {
                                            border: 1px solid #000;
                                            width: 100%;
                                            height: 100%;
                                            background: #eee;
                                            display: flex;
                                            align-content: center;
                                        }

                                        thead, tfoot {
                                            background: #eee;
                                        }

                                        .header-item-data {
                                            height: 100%;
                                            width: 100%;
                                        }

                                        .bordered {
                                            border: 1px solid #000;
                                            padding: 0.12cm;
                                        }

                                        .header-table table {
                                            width: 100%;
                                            vertical-align: middle;
                                        }

                                        .content-table {
                                            border-collapse: collapse;
                                        }

                                        .content-table td, th {
                                            border: 1px solid #000;
                                            text-align: center;
                                            padding: 0.1cm;
                                            font-weight: normal;
                                        }

                                        table.centered td {
                                            vertical-align: middle;
                                        }

                                        .serials {
                                            direction: ltr;
                                            text-align: left;
                                        }

                                        .title {
                                            text-align: right;
                                        }

                                        .grow {
                                            width: 100%;
                                            height: 100%;
                                        }

                                        .font-small {
                                            font-size: 8pt;
                                        }

                                        .font-medium {
                                            font-size: 10pt;
                                        }

                                        .font-big {
                                            font-size: 15pt;
                                        }

                                        .label {
                                            font-weight: bold;
                                            padding: 0 0 0 2px;
                                        }

                                        @page {
                                            size: A4 landscape;
                                            margin: 0;
                                            margin-bottom: 0.5cm;
                                            margin-top: 0.5cm;
                                        }

                                        .ltr {
                                            direction: ltr;
                                            display: block;
                                        }

                                        @media print {
                                            .print-button {
                                                display: none;
                                                visibility: hidden;
                                            }
                                        }
                                    </style>


                                    <div class="page">
                                        <h1 style="text-align: center;">
                                            صورت حساب الکترونیکی
                                            فروش
                                        </h1>
                                        <table class="header-table" style="width: 100%">
                                            <tbody>
                                            <tr>
                                                <td style="width: 1.8cm; height: 2.5cm;vertical-align: middle;padding-bottom: 4px;">
                                                    <div class="header-item-wrapper">
                                                        <div class="portait" style="margin:20px">فروشنده</div>
                                                    </div>
                                                </td>
                                                <td style="padding: 0 4px 4px;height: 2cm;">
                                                    <div class="bordered grow header-item-data">
                                                        <table class="grow centered">
                                                            <tbody>
                                                            <tr>
                                                                <td style="width: 7cm">
                                                                    <span class="label">فروشنده:</span> شركت نوآوران
                                                                    فن‌آوازه (سهامی خاص)
                                                                </td>
                                                                <td style="width: 5cm">
                                                                    <span class="label">شناسه ملی:</span> ۱۰۳۲۰۸۴۵۸۵۷
                                                                </td>
                                                                <td>
                                                                    <span class="label">شماره ثبت:</span> ۴۳۳۸۴۵
                                                                </td>
                                                                <td>
                                                                    <span class="label">شماره اقتصادی:</span>
                                                                    ۴۱۱۴۱۹۱۳۶۵۱۱
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <span class="label">نشانی شرکت:</span>تهران - گاندی
                                                                    جنوبی - نبش خیابان بیست و
                                                                    یکم - پلاک ۲۸
                                                                </td>
                                                                <td>
                                                                    <span class="label">کدپستی:</span> ۱۵۱۷۸۶۳۳۳۲
                                                                </td>
                                                                <td>
                                                                    <span class="label">تلفن و فکس:</span> ۰۲۱۶۱۹۳۰۰۰۰
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td style="width: 7cm; height: 2cm; padding: 0 4px 4px 0;">
                                                    <div class="bordered"
                                                         style="text-align: center; height: 100%; padding: 0.4cm 0.2cm;">
                                                        <div class="flex">
                                                            <div class="font-small">شماره فاکتور:</div>
                                                            <div class="flex-grow"
                                                                 style="text-align: left">{{\App\Models\PersianNumber::translate($order->id)}}
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <div>تاریخ:</div>
                                                            <div class="flex-grow" style="text-align: left">
                                                                {{\App\Models\PersianNumber::translate(jdate($order->created_at)->format('%Y/%m/%d'))}}
                                                            </div>
                                                        </div>
                                                        <div class="flex" style="margin-bottom: 4px;">
                                                            <div>پیگیری:</div>
                                                            <div class="flex-grow font-medium" style="text-align: left">
                                                                {{\App\Models\PersianNumber::translate($order->order_number)}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 1.8cm; height: 2cm;vertical-align: center; padding: 0 0 4px">
                                                    <div class="header-item-wrapper">
                                                        <div class="portait" style="margin: 20px">خریدار</div>
                                                    </div>
                                                </td>
                                                <td style="height: 2cm;vertical-align: center; padding: 0 4px 4px">
                                                    <div class="bordered header-item-data">
                                                        <table style="height: 100%" class="centered">
                                                            <tbody>
                                                            <tr>
                                                                <td style="width: 6.7cm">
                                                                    <span class="label">خریدار:</span>
                                                                    {{$order->user->name}}
                                                                </td>
                                                                <td style="width: 6.7cm">
                                                                    <span
                                                                        class="label">شماره‌اقتصادی / شماره‌ملی:</span>
                                                                    {{$order->user->national_code}}
                                                                </td>
                                                                <td>
                                                                    <span class="label">شناسه ملی:</span>
                                                                    {{$order->user->code_company}}
                                                                </td>
                                                                <td>
                                                                    <span class="label">شماره ثبت:</span>
                                                                    {{$order->user->sabt_company}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <span class="label">نشانی:</span>
                                                                    {{$order->address->state}}،{{$order->address->city}}
                                                                    ، {{$order->address->address}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <span class="label">شماره تماس:</span>
                                                                    {{\App\Models\PersianNumber::translate($order->address->mobile)}}
                                                                </td>
                                                                <td colspan="2">
                                                                    <span class="label">کد پستی:</span>
                                                                    {{\App\Models\PersianNumber::translate($order->address->code_posti)}}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td style="width: 7cm;padding: 0 4px 4px 0;">
                                                    <div class="bordered" style="text-align: center; height: 100%;">
                                                        <div class="flex" style="margin-bottom: 4px;">
                                                            <div>شماره مالیاتی:</div>
                                                            <div class="flex-grow font-medium" style="text-align: left">
                                                                KGWNG۰۴AB۹۲۵۱۲B۰۲۹
                                                            </div>
                                                        </div>
                                                        <div class="flex" style="margin-bottom: 4px;">
                                                            <div>ستومان حافظه مالیاتی:</div>
                                                            <div class="flex-grow font-medium" style="text-align: left">
                                                                S۰۵۴۰۰۱۰۰۰۰۰۰۱۰۰
                                                            </div>
                                                        </div>
                                                        <div class="flex" style="margin-bottom: 4px;">
                                                            <div>ستومان پایانه فروشگاهی:</div>
                                                            <div class="flex-grow font-medium" style="text-align: left">
                                                                A۰۵۴۰۰۱۰۰۰۰۰۰۱۹۰
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="content-table">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>شناسه کالا یا خدمت</th>
                                                <th style="width: 30%" colspan="2.3">شرح کالا یا خدمت</th>
                                                <th>تعداد</th>
                                                <th style="width: 2.3cm">مبلغ واحد (تومان)</th>
                                                <th style="width: 2.3cm">مبلغ کل (تومان)</th>
                                                <th style="width: 2.3cm">تخفیف (تومان)</th>
                                                <th style="width: 2.3cm">مبلغ کل پس از تخفیف (تومان)</th>
                                                <th style="width: 2.3cm">جمع مالیات و عوارض ارزش افزوده (تومان)</th>
                                                <th style="width: 2.5cm"> جمع کل پس از تخفیف و مالیات و عوارض (تومان)
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach(\App\Models\Order::where('order_number',$order->order_number)->get() as $order)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$order->product_id}}</td>
                                                    <td>
                                                        <div class="title">گوشی موبایل سامسونگ مدل Galaxy A13
                                                          {{$order->product->title}} |{{$order->color->name}} | {{$order->warranty->name}}
                                                        </div>

                                                    </td>
                                                    <td><span>{{$order->vendor->name}} </span></td>
                                                    <td><span class="ltr">{{$order->count}}</span></td>
                                                    <td><span class="ltr">
                                           {{\App\Models\PersianNumber::translate(number_format($order->total_price))}}
                                    </span></td>

                                                    <td><span class="ltr">
                                          {{\App\Models\PersianNumber::translate(number_format($order->total_price * $order->count)) }}
                                        </span></td>

                                                    <td><span class="ltr">
                                    {{\App\Models\PersianNumber::translate(number_format(($order->total_price * $order->count) -($order->total_discount_price * $order->count))) }}
                                        </span></td>

                                                    <td><span class="ltr">
                                            {{\App\Models\PersianNumber::translate(number_format( $order->total_discount_price)) }}
                                        </span></td>

                                                    <td><span class="ltr">
                                         0
                                        </span></td>

                                                    <td><span class="ltr">
                                                                                  {{\App\Models\PersianNumber::translate(number_format( $order->total_discount_price)) }}

                                        </span></td>

                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4">
                                                    <b>جمع کل</b>
                                                </td>
                                                <td>{{\App\Models\Order::where('order_number',$order->order_number)->sum('count')}}</td>
                                                <td><span class="ltr">
                                                  {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('total_price')))}}
                                                       </span></td>
                                                <td><span class="ltr">
  {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('proPriceCount')))}}

                                                    </span></td>
                                                <td>
                                                    <span class="ltr">
                                                          {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('proPriceCountD')))}}
                                                    </span>
                                                </td>
                                                <td>
                    <span class="ltr">
                                                                                                      {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('proPriceCountDiscount')))}}

                                            </span>
                                                </td>
                                                <td><span class="ltr">0</span></td>
                                                <td>
                    <span class="ltr">
                                                                                                                                                   {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('proPriceCountDiscount')))}}

                                            </span>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                </td>
                                                <td colspan="4" class="font-small">
                                                    جمع کل پس از کسر تخفیف با احتساب مالیات و عوارض (تومان):
                                                </td>

                                                <td><span class="ltr">
                                                                                                                                        {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('proPriceCountDiscount')))}}

                                </span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    اعتبار مالیاتی قابل استفاده توسط خریدار
                                                </td>
                                                <td colspan="7" class="font-small">
                                                </td>
                                            </tr>
                                            <tr style="background: #fff">
                                                <td colspan="11" style="height: 2.5cm;vertical-align: top">
                                                    <div class="flex">
                                                        <div class="flex-grow">مهر و امضای فروشنده:</div>
                                                        <div class="flex-grow">تاریخ تحویل:</div>
                                                        <div class="flex-grow">ساعت تحویل:</div>

                                                        <div class="flex-grow">روش‌های پرداخت:</div>

                                                        <div class="flex-grow">مهر و امضای خریدار:</div>

                                                        <div class="flex-grow" style="width: 1.8cm"></div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="flex-grow">
                                                            <img class="footer-img uk-align-center" width="150px"
                                                                 src="https://api.digikala.com/static/files/acb0d08c.jpg">
                                                        </div>
                                                        <div class="flex-grow">  {{\App\Models\PersianNumber::translate(jdate($order->updated_at)->format('%Y/%m/%d'))}}</div>
                                                        <div class="flex-grow">۱۰ -
                                                            ۲۳
                                                        </div>

                                                        <div class="flex-grow">
                                                            <ul>
                                                                <li style="text-align: right">
                                                                    اعتباری :
                                                                    {{\App\Models\PersianNumber::translate(number_format(\App\Models\Order::where('order_number',$order->order_number)->sum('proPriceCountDiscount')))}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="flex-grow"></div>

                                                        <div
                                                            style="display: flex; align-items: center; justify-content: center; margin-top: 4px; margin-left: 10px;">
                                                            <img class="footer-img uk-align-center"
                                                                 style="width: 1.5cm; margin-left: 4px;"
                                                                 src="https://api.digikala.com/static/files/40417d6f.jpg">
                                                            <span style="width: 2cm;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="qr-svg "
                                     style="width: 100%; height: auto;" viewBox="0 0 49 49">
<defs><style>rect {
            shape-rendering: crispEdges
        }</style></defs>
<path class="qr-4 " stroke="transparent" fill="#fff" fill-opacity="1"
      d="M14 0 h5 v1 h-5Z M21 0 h3 v1 h-3Z M28 0 h2 v1 h-2Z M31 0 h1 v1 h-1Z M33 0 h5 v1 h-5Z M11 1 h2 v1 h-2Z M15 1 h1 v1 h-1Z M17 1 h2 v1 h-2Z M22 1 h1 v1 h-1Z M25 1 h1 v1 h-1Z M27 1 h2 v1 h-2Z M33 1 h2 v1 h-2Z M36 1 h2 v1 h-2Z M9 2 h1 v1 h-1Z M14 2 h1 v1 h-1Z M23 2 h2 v1 h-2Z M30 2 h4 v1 h-4Z M9 3 h2 v1 h-2Z M15 3 h1 v1 h-1Z M20 3 h1 v1 h-1Z M24 3 h1 v1 h-1Z M27 3 h1 v1 h-1Z M29 3 h4 v1 h-4Z M34 3 h4 v1 h-4Z M9 4 h5 v1 h-5Z M21 4 h1 v1 h-1Z M30 4 h3 v1 h-3Z M37 4 h1 v1 h-1Z M13 5 h1 v1 h-1Z M17 5 h1 v1 h-1Z M19 5 h1 v1 h-1Z M27 5 h6 v1 h-6Z M35 5 h3 v1 h-3Z M9 7 h2 v1 h-2Z M12 7 h2 v1 h-2Z M15 7 h3 v1 h-3Z M19 7 h3 v1 h-3Z M28 7 h4 v1 h-4Z M36 7 h2 v1 h-2Z M40 7 h1 v1 h-1Z M10 8 h4 v1 h-4Z M15 8 h4 v1 h-4Z M20 8 h1 v1 h-1Z M29 8 h1 v1 h-1Z M31 8 h1 v1 h-1Z M34 8 h1 v1 h-1Z M36 8 h3 v1 h-3Z M1 9 h1 v1 h-1Z M3 9 h1 v1 h-1Z M8 9 h2 v1 h-2Z M11 9 h2 v1 h-2Z M15 9 h3 v1 h-3Z M25 9 h1 v1 h-1Z M27 9 h1 v1 h-1Z M31 9 h2 v1 h-2Z M36 9 h2 v1 h-2Z M43 9 h2 v1 h-2Z M47 9 h1 v1 h-1Z M2 10 h4 v1 h-4Z M12 10 h2 v1 h-2Z M16 10 h3 v1 h-3Z M20 10 h3 v1 h-3Z M24 10 h2 v1 h-2Z M27 10 h1 v1 h-1Z M29 10 h1 v1 h-1Z M32 10 h1 v1 h-1Z M34 10 h7 v1 h-7Z M42 10 h1 v1 h-1Z M47 10 h2 v1 h-2Z M3 11 h3 v1 h-3Z M7 11 h2 v1 h-2Z M10 11 h1 v1 h-1Z M12 11 h1 v1 h-1Z M15 11 h6 v1 h-6Z M24 11 h2 v1 h-2Z M27 11 h2 v1 h-2Z M30 11 h2 v1 h-2Z M35 11 h1 v1 h-1Z M38 11 h3 v1 h-3Z M42 11 h2 v1 h-2Z M45 11 h3 v1 h-3Z M0 12 h2 v1 h-2Z M4 12 h1 v1 h-1Z M7 12 h1 v1 h-1Z M11 12 h1 v1 h-1Z M14 12 h4 v1 h-4Z M21 12 h1 v1 h-1Z M25 12 h2 v1 h-2Z M28 12 h1 v1 h-1Z M30 12 h1 v1 h-1Z M36 12 h1 v1 h-1Z M38 12 h1 v1 h-1Z M41 12 h2 v1 h-2Z M46 12 h1 v1 h-1Z M48 12 h1 v1 h-1Z M0 13 h1 v1 h-1Z M2 13 h1 v1 h-1Z M4 13 h1 v1 h-1Z M8 13 h1 v1 h-1Z M12 13 h1 v1 h-1Z M15 13 h1 v1 h-1Z M17 13 h4 v1 h-4Z M28 13 h4 v1 h-4Z M33 13 h1 v1 h-1Z M35 13 h2 v1 h-2Z M38 13 h2 v1 h-2Z M42 13 h2 v1 h-2Z M46 13 h1 v1 h-1Z M0 14 h6 v1 h-6Z M9 14 h1 v1 h-1Z M13 14 h1 v1 h-1Z M18 14 h2 v1 h-2Z M22 14 h1 v1 h-1Z M25 14 h2 v1 h-2Z M28 14 h1 v1 h-1Z M30 14 h5 v1 h-5Z M36 14 h1 v1 h-1Z M42 14 h1 v1 h-1Z M48 14 h1 v1 h-1Z M0 15 h1 v1 h-1Z M3 15 h1 v1 h-1Z M5 15 h1 v1 h-1Z M9 15 h3 v1 h-3Z M13 15 h1 v1 h-1Z M15 15 h1 v1 h-1Z M21 15 h3 v1 h-3Z M25 15 h1 v1 h-1Z M29 15 h1 v1 h-1Z M31 15 h4 v1 h-4Z M38 15 h3 v1 h-3Z M43 15 h4 v1 h-4Z M48 15 h1 v1 h-1Z M3 16 h2 v1 h-2Z M11 16 h2 v1 h-2Z M14 16 h1 v1 h-1Z M16 16 h2 v1 h-2Z M19 16 h1 v1 h-1Z M21 16 h2 v1 h-2Z M25 16 h1 v1 h-1Z M29 16 h5 v1 h-5Z M35 16 h3 v1 h-3Z M39 16 h1 v1 h-1Z M42 16 h1 v1 h-1Z M44 16 h4 v1 h-4Z M0 17 h1 v1 h-1Z M2 17 h1 v1 h-1Z M4 17 h1 v1 h-1Z M7 17 h3 v1 h-3Z M13 17 h2 v1 h-2Z M17 17 h2 v1 h-2Z M20 17 h1 v1 h-1Z M22 17 h4 v1 h-4Z M27 17 h1 v1 h-1Z M30 17 h1 v1 h-1Z M32 17 h1 v1 h-1Z M35 17 h2 v1 h-2Z M38 17 h2 v1 h-2Z M42 17 h2 v1 h-2Z M45 17 h2 v1 h-2Z M2 18 h2 v1 h-2Z M5 18 h1 v1 h-1Z M7 18 h1 v1 h-1Z M14 18 h3 v1 h-3Z M18 18 h2 v1 h-2Z M22 18 h3 v1 h-3Z M26 18 h3 v1 h-3Z M30 18 h1 v1 h-1Z M35 18 h2 v1 h-2Z M38 18 h1 v1 h-1Z M41 18 h1 v1 h-1Z M43 18 h1 v1 h-1Z M45 18 h1 v1 h-1Z M0 19 h2 v1 h-2Z M3 19 h2 v1 h-2Z M7 19 h2 v1 h-2Z M12 19 h1 v1 h-1Z M15 19 h1 v1 h-1Z M17 19 h1 v1 h-1Z M19 19 h3 v1 h-3Z M27 19 h2 v1 h-2Z M34 19 h3 v1 h-3Z M39 19 h2 v1 h-2Z M42 19 h1 v1 h-1Z M44 19 h4 v1 h-4Z M3 20 h3 v1 h-3Z M7 20 h1 v1 h-1Z M9 20 h4 v1 h-4Z M15 20 h2 v1 h-2Z M18 20 h2 v1 h-2Z M22 20 h2 v1 h-2Z M26 20 h3 v1 h-3Z M30 20 h1 v1 h-1Z M34 20 h1 v1 h-1Z M36 20 h1 v1 h-1Z M38 20 h2 v1 h-2Z M42 20 h1 v1 h-1Z M47 20 h1 v1 h-1Z M1 21 h2 v1 h-2Z M4 21 h2 v1 h-2Z M7 21 h1 v1 h-1Z M9 21 h1 v1 h-1Z M13 21 h2 v1 h-2Z M16 21 h5 v1 h-5Z M22 21 h6 v1 h-6Z M31 21 h6 v1 h-6Z M39 21 h1 v1 h-1Z M41 21 h1 v1 h-1Z M44 21 h2 v1 h-2Z M47 21 h2 v1 h-2Z M0 22 h1 v1 h-1Z M9 22 h2 v1 h-2Z M12 22 h5 v1 h-5Z M18 22 h1 v1 h-1Z M21 22 h1 v1 h-1Z M28 22 h2 v1 h-2Z M31 22 h2 v1 h-2Z M34 22 h1 v1 h-1Z M39 22 h1 v1 h-1Z M46 22 h1 v1 h-1Z M0 23 h1 v1 h-1Z M2 23 h1 v1 h-1Z M13 23 h2 v1 h-2Z M16 23 h1 v1 h-1Z M18 23 h1 v1 h-1Z M21 23 h1 v1 h-1Z M28 23 h1 v1 h-1Z M33 23 h1 v1 h-1Z M36 23 h2 v1 h-2Z M39 23 h1 v1 h-1Z M45 23 h2 v1 h-2Z M0 24 h2 v1 h-2Z M14 24 h1 v1 h-1Z M16 24 h2 v1 h-2Z M21 24 h1 v1 h-1Z M27 24 h1 v1 h-1Z M30 24 h1 v1 h-1Z M33 24 h3 v1 h-3Z M39 24 h1 v1 h-1Z M46 24 h1 v1 h-1Z M1 25 h1 v1 h-1Z M12 25 h2 v1 h-2Z M18 25 h1 v1 h-1Z M20 25 h2 v1 h-2Z M27 25 h1 v1 h-1Z M30 25 h2 v1 h-2Z M34 25 h3 v1 h-3Z M38 25 h1 v1 h-1Z M45 25 h2 v1 h-2Z M48 25 h1 v1 h-1Z M0 26 h1 v1 h-1Z M9 26 h1 v1 h-1Z M11 26 h1 v1 h-1Z M17 26 h1 v1 h-1Z M19 26 h2 v1 h-2Z M45 26 h3 v1 h-3Z M2 27 h1 v1 h-1Z M4 27 h2 v1 h-2Z M7 27 h3 v1 h-3Z M12 27 h1 v1 h-1Z M14 27 h2 v1 h-2Z M17 27 h2 v1 h-2Z M20 27 h1 v1 h-1Z M22 27 h2 v1 h-2Z M25 27 h3 v1 h-3Z M29 27 h1 v1 h-1Z M31 27 h1 v1 h-1Z M34 27 h1 v1 h-1Z M39 27 h1 v1 h-1Z M41 27 h4 v1 h-4Z M47 27 h2 v1 h-2Z M1 28 h2 v1 h-2Z M4 28 h1 v1 h-1Z M9 28 h3 v1 h-3Z M13 28 h1 v1 h-1Z M15 28 h1 v1 h-1Z M17 28 h1 v1 h-1Z M19 28 h1 v1 h-1Z M21 28 h1 v1 h-1Z M23 28 h1 v1 h-1Z M29 28 h1 v1 h-1Z M31 28 h1 v1 h-1Z M34 28 h1 v1 h-1Z M37 28 h1 v1 h-1Z M41 28 h2 v1 h-2Z M45 28 h2 v1 h-2Z M48 28 h1 v1 h-1Z M3 29 h1 v1 h-1Z M5 29 h1 v1 h-1Z M7 29 h1 v1 h-1Z M10 29 h5 v1 h-5Z M16 29 h1 v1 h-1Z M21 29 h2 v1 h-2Z M24 29 h2 v1 h-2Z M29 29 h2 v1 h-2Z M32 29 h1 v1 h-1Z M35 29 h3 v1 h-3Z M39 29 h3 v1 h-3Z M44 29 h2 v1 h-2Z M47 29 h1 v1 h-1Z M0 30 h1 v1 h-1Z M2 30 h1 v1 h-1Z M4 30 h1 v1 h-1Z M8 30 h1 v1 h-1Z M10 30 h2 v1 h-2Z M14 30 h3 v1 h-3Z M20 30 h3 v1 h-3Z M25 30 h1 v1 h-1Z M28 30 h1 v1 h-1Z M30 30 h1 v1 h-1Z M34 30 h2 v1 h-2Z M38 30 h1 v1 h-1Z M42 30 h6 v1 h-6Z M1 31 h2 v1 h-2Z M7 31 h1 v1 h-1Z M12 31 h1 v1 h-1Z M15 31 h6 v1 h-6Z M22 31 h2 v1 h-2Z M26 31 h2 v1 h-2Z M30 31 h1 v1 h-1Z M32 31 h1 v1 h-1Z M36 31 h2 v1 h-2Z M40 31 h2 v1 h-2Z M43 31 h3 v1 h-3Z M47 31 h2 v1 h-2Z M1 32 h1 v1 h-1Z M7 32 h1 v1 h-1Z M13 32 h2 v1 h-2Z M17 32 h1 v1 h-1Z M20 32 h4 v1 h-4Z M27 32 h2 v1 h-2Z M34 32 h1 v1 h-1Z M36 32 h2 v1 h-2Z M39 32 h1 v1 h-1Z M42 32 h1 v1 h-1Z M44 32 h1 v1 h-1Z M46 32 h1 v1 h-1Z M48 32 h1 v1 h-1Z M1 33 h2 v1 h-2Z M5 33 h1 v1 h-1Z M10 33 h1 v1 h-1Z M15 33 h1 v1 h-1Z M21 33 h1 v1 h-1Z M23 33 h1 v1 h-1Z M25 33 h1 v1 h-1Z M28 33 h2 v1 h-2Z M31 33 h1 v1 h-1Z M33 33 h4 v1 h-4Z M38 33 h2 v1 h-2Z M42 33 h1 v1 h-1Z M45 33 h1 v1 h-1Z M0 34 h1 v1 h-1Z M2 34 h1 v1 h-1Z M5 34 h1 v1 h-1Z M8 34 h4 v1 h-4Z M13 34 h2 v1 h-2Z M16 34 h1 v1 h-1Z M18 34 h1 v1 h-1Z M20 34 h1 v1 h-1Z M26 34 h1 v1 h-1Z M29 34 h5 v1 h-5Z M36 34 h2 v1 h-2Z M39 34 h2 v1 h-2Z M43 34 h1 v1 h-1Z M47 34 h1 v1 h-1Z M0 35 h1 v1 h-1Z M2 35 h1 v1 h-1Z M5 35 h1 v1 h-1Z M7 35 h1 v1 h-1Z M9 35 h1 v1 h-1Z M13 35 h1 v1 h-1Z M15 35 h3 v1 h-3Z M19 35 h4 v1 h-4Z M28 35 h4 v1 h-4Z M33 35 h2 v1 h-2Z M36 35 h3 v1 h-3Z M41 35 h2 v1 h-2Z M44 35 h1 v1 h-1Z M0 36 h4 v1 h-4Z M5 36 h1 v1 h-1Z M10 36 h1 v1 h-1Z M12 36 h2 v1 h-2Z M16 36 h2 v1 h-2Z M20 36 h5 v1 h-5Z M27 36 h1 v1 h-1Z M31 36 h1 v1 h-1Z M37 36 h1 v1 h-1Z M41 36 h1 v1 h-1Z M43 36 h1 v1 h-1Z M45 36 h4 v1 h-4Z M0 37 h2 v1 h-2Z M3 37 h2 v1 h-2Z M9 37 h2 v1 h-2Z M13 37 h3 v1 h-3Z M17 37 h3 v1 h-3Z M21 37 h2 v1 h-2Z M26 37 h1 v1 h-1Z M28 37 h1 v1 h-1Z M34 37 h2 v1 h-2Z M37 37 h2 v1 h-2Z M40 37 h1 v1 h-1Z M42 37 h1 v1 h-1Z M46 37 h2 v1 h-2Z M8 38 h2 v1 h-2Z M11 38 h2 v1 h-2Z M14 38 h4 v1 h-4Z M19 38 h1 v1 h-1Z M23 38 h2 v1 h-2Z M26 38 h4 v1 h-4Z M31 38 h3 v1 h-3Z M35 38 h1 v1 h-1Z M38 38 h5 v1 h-5Z M44 38 h1 v1 h-1Z M47 38 h2 v1 h-2Z M8 39 h3 v1 h-3Z M16 39 h2 v1 h-2Z M21 39 h1 v1 h-1Z M23 39 h1 v1 h-1Z M26 39 h6 v1 h-6Z M33 39 h1 v1 h-1Z M35 39 h1 v1 h-1Z M37 39 h3 v1 h-3Z M41 39 h1 v1 h-1Z M43 39 h2 v1 h-2Z M47 39 h1 v1 h-1Z M7 40 h2 v1 h-2Z M10 40 h1 v1 h-1Z M12 40 h2 v1 h-2Z M17 40 h1 v1 h-1Z M19 40 h1 v1 h-1Z M27 40 h2 v1 h-2Z M31 40 h1 v1 h-1Z M34 40 h6 v1 h-6Z M45 40 h4 v1 h-4Z M9 41 h1 v1 h-1Z M11 41 h1 v1 h-1Z M16 41 h1 v1 h-1Z M18 41 h1 v1 h-1Z M21 41 h1 v1 h-1Z M27 41 h3 v1 h-3Z M31 41 h2 v1 h-2Z M34 41 h1 v1 h-1Z M36 41 h1 v1 h-1Z M39 41 h1 v1 h-1Z M46 41 h3 v1 h-3Z M10 42 h1 v1 h-1Z M14 42 h1 v1 h-1Z M18 42 h4 v1 h-4Z M31 42 h2 v1 h-2Z M34 42 h1 v1 h-1Z M38 42 h1 v1 h-1Z M45 42 h2 v1 h-2Z M48 42 h1 v1 h-1Z M9 43 h4 v1 h-4Z M17 43 h2 v1 h-2Z M20 43 h1 v1 h-1Z M27 43 h1 v1 h-1Z M30 43 h4 v1 h-4Z M35 43 h2 v1 h-2Z M39 43 h1 v1 h-1Z M48 43 h1 v1 h-1Z M9 44 h1 v1 h-1Z M11 44 h1 v1 h-1Z M14 44 h1 v1 h-1Z M21 44 h1 v1 h-1Z M29 44 h2 v1 h-2Z M32 44 h1 v1 h-1Z M34 44 h3 v1 h-3Z M45 44 h1 v1 h-1Z M47 44 h2 v1 h-2Z M11 45 h1 v1 h-1Z M14 45 h2 v1 h-2Z M19 45 h2 v1 h-2Z M22 45 h2 v1 h-2Z M29 45 h4 v1 h-4Z M36 45 h1 v1 h-1Z M38 45 h2 v1 h-2Z M43 45 h1 v1 h-1Z M45 45 h3 v1 h-3Z M11 46 h1 v1 h-1Z M13 46 h1 v1 h-1Z M19 46 h1 v1 h-1Z M22 46 h1 v1 h-1Z M26 46 h4 v1 h-4Z M31 46 h5 v1 h-5Z M38 46 h2 v1 h-2Z M47 46 h2 v1 h-2Z M9 47 h1 v1 h-1Z M11 47 h1 v1 h-1Z M16 47 h2 v1 h-2Z M21 47 h1 v1 h-1Z M24 47 h3 v1 h-3Z M29 47 h1 v1 h-1Z M31 47 h6 v1 h-6Z M38 47 h1 v1 h-1Z M40 47 h3 v1 h-3Z M44 47 h1 v1 h-1Z M46 47 h3 v1 h-3Z M9 48 h2 v1 h-2Z M15 48 h1 v1 h-1Z M17 48 h1 v1 h-1Z M19 48 h2 v1 h-2Z M23 48 h1 v1 h-1Z M25 48 h1 v1 h-1Z M29 48 h5 v1 h-5Z M35 48 h1 v1 h-1Z M37 48 h1 v1 h-1Z M41 48 h3 v1 h-3Z M45 48 h1 v1 h-1Z M47 48 h1 v1 h-1Z "></path><path
                                        class="qr-6 " stroke="transparent" fill="#fff" fill-opacity="1"
                                        d="M1 1 h5 v1 h-5Z M43 1 h5 v1 h-5Z M1 2 h1 v1 h-1Z M5 2 h1 v1 h-1Z M43 2 h1 v1 h-1Z M47 2 h1 v1 h-1Z M1 3 h1 v1 h-1Z M5 3 h1 v1 h-1Z M43 3 h1 v1 h-1Z M47 3 h1 v1 h-1Z M1 4 h1 v1 h-1Z M5 4 h1 v1 h-1Z M43 4 h1 v1 h-1Z M47 4 h1 v1 h-1Z M1 5 h5 v1 h-5Z M43 5 h5 v1 h-5Z M1 43 h5 v1 h-5Z M1 44 h1 v1 h-1Z M5 44 h1 v1 h-1Z M1 45 h1 v1 h-1Z M5 45 h1 v1 h-1Z M1 46 h1 v1 h-1Z M5 46 h1 v1 h-1Z M1 47 h5 v1 h-5Z "></path><path
                                        class="qr-8 " stroke="transparent" fill="#fff" fill-opacity="1"
                                        d="M7 0 h1 v1 h-1Z M41 0 h1 v1 h-1Z M7 1 h1 v1 h-1Z M41 1 h1 v1 h-1Z M7 2 h1 v1 h-1Z M41 2 h1 v1 h-1Z M7 3 h1 v1 h-1Z M41 3 h1 v1 h-1Z M7 4 h1 v1 h-1Z M41 4 h1 v1 h-1Z M7 5 h1 v1 h-1Z M41 5 h1 v1 h-1Z M7 6 h1 v1 h-1Z M41 6 h1 v1 h-1Z M0 7 h8 v1 h-8Z M41 7 h8 v1 h-8Z M0 41 h8 v1 h-8Z M7 42 h1 v1 h-1Z M7 43 h1 v1 h-1Z M7 44 h1 v1 h-1Z M7 45 h1 v1 h-1Z M7 46 h1 v1 h-1Z M7 47 h1 v1 h-1Z M7 48 h1 v1 h-1Z "></path><path
                                        class="qr-10 " stroke="transparent" fill="#fff" fill-opacity="1"
                                        d="M23 5 h3 v1 h-3Z M23 6 h1 v1 h-1Z M25 6 h1 v1 h-1Z M23 7 h3 v1 h-3Z M5 23 h3 v1 h-3Z M23 23 h3 v1 h-3Z M41 23 h3 v1 h-3Z M5 24 h1 v1 h-1Z M7 24 h1 v1 h-1Z M23 24 h1 v1 h-1Z M25 24 h1 v1 h-1Z M41 24 h1 v1 h-1Z M43 24 h1 v1 h-1Z M5 25 h3 v1 h-3Z M23 25 h3 v1 h-3Z M41 25 h3 v1 h-3Z M23 41 h3 v1 h-3Z M41 41 h3 v1 h-3Z M23 42 h1 v1 h-1Z M25 42 h1 v1 h-1Z M41 42 h1 v1 h-1Z M43 42 h1 v1 h-1Z M23 43 h3 v1 h-3Z M41 43 h3 v1 h-3Z "></path><path
                                        class="qr-12 " stroke="transparent" fill="#fff" fill-opacity="1"
                                        d="M9 6 h1 v1 h-1Z M11 6 h1 v1 h-1Z M13 6 h1 v1 h-1Z M15 6 h1 v1 h-1Z M17 6 h1 v1 h-1Z M19 6 h1 v1 h-1Z M21 6 h1 v1 h-1Z M27 6 h1 v1 h-1Z M29 6 h1 v1 h-1Z M31 6 h1 v1 h-1Z M33 6 h1 v1 h-1Z M35 6 h1 v1 h-1Z M37 6 h1 v1 h-1Z M39 6 h1 v1 h-1Z M6 9 h1 v1 h-1Z M6 11 h1 v1 h-1Z M6 13 h1 v1 h-1Z M6 15 h1 v1 h-1Z M6 17 h1 v1 h-1Z M6 19 h1 v1 h-1Z M6 21 h1 v1 h-1Z M6 27 h1 v1 h-1Z M6 29 h1 v1 h-1Z M6 31 h1 v1 h-1Z M6 33 h1 v1 h-1Z M6 35 h1 v1 h-1Z M6 37 h1 v1 h-1Z M6 39 h1 v1 h-1Z "></path><path
                                        class="qr-14 " stroke="transparent" fill="#fff" fill-opacity="1"
                                        d="M8 1 h1 v1 h-1Z M8 2 h1 v1 h-1Z M1 8 h3 v1 h-3Z M5 8 h1 v1 h-1Z M46 8 h2 v1 h-2Z M8 43 h1 v1 h-1Z M8 45 h1 v1 h-1Z M8 46 h1 v1 h-1Z M8 47 h1 v1 h-1Z "></path><path
                                        class="qr-16 " stroke="transparent" fill="#fff" fill-opacity="1"
                                        d="M38 0 h2 v1 h-2Z M38 2 h1 v1 h-1Z M38 3 h1 v1 h-1Z M40 3 h1 v1 h-1Z M38 4 h3 v1 h-3Z M39 5 h2 v1 h-2Z M0 38 h1 v1 h-1Z M2 38 h3 v1 h-3Z M0 39 h1 v1 h-1Z M4 39 h2 v1 h-2Z M3 40 h3 v1 h-3Z "></path><path
                                        class="qr-512 " stroke="transparent" fill="#000" fill-opacity="1"
                                        d="M8 41 h1 v1 h-1Z "></path><path class="qr-1024 " stroke="transparent"
                                                                           fill="#000" fill-opacity="1"
                                                                           d="M9 0 h5 v1 h-5Z M19 0 h2 v1 h-2Z M24 0 h4 v1 h-4Z M30 0 h1 v1 h-1Z M32 0 h1 v1 h-1Z M9 1 h2 v1 h-2Z M13 1 h2 v1 h-2Z M16 1 h1 v1 h-1Z M19 1 h3 v1 h-3Z M23 1 h2 v1 h-2Z M26 1 h1 v1 h-1Z M29 1 h4 v1 h-4Z M35 1 h1 v1 h-1Z M10 2 h4 v1 h-4Z M15 2 h8 v1 h-8Z M25 2 h5 v1 h-5Z M34 2 h4 v1 h-4Z M11 3 h4 v1 h-4Z M16 3 h4 v1 h-4Z M21 3 h3 v1 h-3Z M25 3 h2 v1 h-2Z M28 3 h1 v1 h-1Z M33 3 h1 v1 h-1Z M14 4 h7 v1 h-7Z M27 4 h3 v1 h-3Z M33 4 h4 v1 h-4Z M9 5 h4 v1 h-4Z M14 5 h3 v1 h-3Z M18 5 h1 v1 h-1Z M20 5 h2 v1 h-2Z M33 5 h2 v1 h-2Z M11 7 h1 v1 h-1Z M14 7 h1 v1 h-1Z M18 7 h1 v1 h-1Z M27 7 h1 v1 h-1Z M32 7 h4 v1 h-4Z M38 7 h2 v1 h-2Z M9 8 h1 v1 h-1Z M14 8 h1 v1 h-1Z M19 8 h1 v1 h-1Z M21 8 h1 v1 h-1Z M27 8 h2 v1 h-2Z M30 8 h1 v1 h-1Z M32 8 h2 v1 h-2Z M35 8 h1 v1 h-1Z M39 8 h2 v1 h-2Z M0 9 h1 v1 h-1Z M2 9 h1 v1 h-1Z M4 9 h2 v1 h-2Z M7 9 h1 v1 h-1Z M10 9 h1 v1 h-1Z M13 9 h2 v1 h-2Z M18 9 h7 v1 h-7Z M26 9 h1 v1 h-1Z M28 9 h3 v1 h-3Z M33 9 h3 v1 h-3Z M38 9 h5 v1 h-5Z M45 9 h2 v1 h-2Z M48 9 h1 v1 h-1Z M0 10 h2 v1 h-2Z M7 10 h5 v1 h-5Z M14 10 h2 v1 h-2Z M19 10 h1 v1 h-1Z M23 10 h1 v1 h-1Z M26 10 h1 v1 h-1Z M28 10 h1 v1 h-1Z M30 10 h2 v1 h-2Z M33 10 h1 v1 h-1Z M41 10 h1 v1 h-1Z M43 10 h4 v1 h-4Z M0 11 h3 v1 h-3Z M9 11 h1 v1 h-1Z M11 11 h1 v1 h-1Z M13 11 h2 v1 h-2Z M21 11 h3 v1 h-3Z M26 11 h1 v1 h-1Z M29 11 h1 v1 h-1Z M32 11 h3 v1 h-3Z M36 11 h2 v1 h-2Z M41 11 h1 v1 h-1Z M44 11 h1 v1 h-1Z M48 11 h1 v1 h-1Z M2 12 h2 v1 h-2Z M5 12 h1 v1 h-1Z M8 12 h3 v1 h-3Z M12 12 h2 v1 h-2Z M18 12 h3 v1 h-3Z M22 12 h3 v1 h-3Z M27 12 h1 v1 h-1Z M29 12 h1 v1 h-1Z M31 12 h5 v1 h-5Z M37 12 h1 v1 h-1Z M39 12 h2 v1 h-2Z M43 12 h3 v1 h-3Z M47 12 h1 v1 h-1Z M1 13 h1 v1 h-1Z M3 13 h1 v1 h-1Z M5 13 h1 v1 h-1Z M7 13 h1 v1 h-1Z M9 13 h3 v1 h-3Z M13 13 h2 v1 h-2Z M16 13 h1 v1 h-1Z M21 13 h7 v1 h-7Z M32 13 h1 v1 h-1Z M34 13 h1 v1 h-1Z M37 13 h1 v1 h-1Z M40 13 h2 v1 h-2Z M44 13 h2 v1 h-2Z M47 13 h2 v1 h-2Z M7 14 h2 v1 h-2Z M10 14 h3 v1 h-3Z M14 14 h4 v1 h-4Z M20 14 h2 v1 h-2Z M23 14 h2 v1 h-2Z M27 14 h1 v1 h-1Z M29 14 h1 v1 h-1Z M35 14 h1 v1 h-1Z M37 14 h5 v1 h-5Z M43 14 h5 v1 h-5Z M1 15 h2 v1 h-2Z M4 15 h1 v1 h-1Z M7 15 h2 v1 h-2Z M12 15 h1 v1 h-1Z M14 15 h1 v1 h-1Z M16 15 h5 v1 h-5Z M24 15 h1 v1 h-1Z M26 15 h3 v1 h-3Z M30 15 h1 v1 h-1Z M35 15 h3 v1 h-3Z M41 15 h2 v1 h-2Z M47 15 h1 v1 h-1Z M0 16 h3 v1 h-3Z M5 16 h1 v1 h-1Z M7 16 h4 v1 h-4Z M13 16 h1 v1 h-1Z M15 16 h1 v1 h-1Z M18 16 h1 v1 h-1Z M20 16 h1 v1 h-1Z M23 16 h2 v1 h-2Z M26 16 h3 v1 h-3Z M34 16 h1 v1 h-1Z M38 16 h1 v1 h-1Z M40 16 h2 v1 h-2Z M43 16 h1 v1 h-1Z M48 16 h1 v1 h-1Z M1 17 h1 v1 h-1Z M3 17 h1 v1 h-1Z M5 17 h1 v1 h-1Z M10 17 h3 v1 h-3Z M15 17 h2 v1 h-2Z M19 17 h1 v1 h-1Z M21 17 h1 v1 h-1Z M26 17 h1 v1 h-1Z M28 17 h2 v1 h-2Z M31 17 h1 v1 h-1Z M33 17 h2 v1 h-2Z M37 17 h1 v1 h-1Z M40 17 h2 v1 h-2Z M44 17 h1 v1 h-1Z M47 17 h2 v1 h-2Z M0 18 h2 v1 h-2Z M4 18 h1 v1 h-1Z M8 18 h6 v1 h-6Z M17 18 h1 v1 h-1Z M20 18 h2 v1 h-2Z M25 18 h1 v1 h-1Z M29 18 h1 v1 h-1Z M31 18 h4 v1 h-4Z M37 18 h1 v1 h-1Z M39 18 h2 v1 h-2Z M42 18 h1 v1 h-1Z M44 18 h1 v1 h-1Z M46 18 h3 v1 h-3Z M2 19 h1 v1 h-1Z M5 19 h1 v1 h-1Z M9 19 h3 v1 h-3Z M13 19 h2 v1 h-2Z M16 19 h1 v1 h-1Z M18 19 h1 v1 h-1Z M22 19 h5 v1 h-5Z M29 19 h5 v1 h-5Z M37 19 h2 v1 h-2Z M41 19 h1 v1 h-1Z M43 19 h1 v1 h-1Z M48 19 h1 v1 h-1Z M0 20 h3 v1 h-3Z M8 20 h1 v1 h-1Z M13 20 h2 v1 h-2Z M17 20 h1 v1 h-1Z M20 20 h2 v1 h-2Z M24 20 h2 v1 h-2Z M29 20 h1 v1 h-1Z M31 20 h3 v1 h-3Z M35 20 h1 v1 h-1Z M37 20 h1 v1 h-1Z M40 20 h2 v1 h-2Z M43 20 h4 v1 h-4Z M48 20 h1 v1 h-1Z M0 21 h1 v1 h-1Z M3 21 h1 v1 h-1Z M8 21 h1 v1 h-1Z M10 21 h3 v1 h-3Z M15 21 h1 v1 h-1Z M21 21 h1 v1 h-1Z M28 21 h3 v1 h-3Z M37 21 h2 v1 h-2Z M40 21 h1 v1 h-1Z M42 21 h2 v1 h-2Z M46 21 h1 v1 h-1Z M1 22 h3 v1 h-3Z M11 22 h1 v1 h-1Z M17 22 h1 v1 h-1Z M19 22 h2 v1 h-2Z M27 22 h1 v1 h-1Z M30 22 h1 v1 h-1Z M33 22 h1 v1 h-1Z M35 22 h4 v1 h-4Z M45 22 h1 v1 h-1Z M47 22 h2 v1 h-2Z M1 23 h1 v1 h-1Z M3 23 h1 v1 h-1Z M9 23 h4 v1 h-4Z M15 23 h1 v1 h-1Z M17 23 h1 v1 h-1Z M19 23 h2 v1 h-2Z M27 23 h1 v1 h-1Z M29 23 h4 v1 h-4Z M34 23 h2 v1 h-2Z M38 23 h1 v1 h-1Z M47 23 h2 v1 h-2Z M2 24 h2 v1 h-2Z M9 24 h5 v1 h-5Z M15 24 h1 v1 h-1Z M18 24 h3 v1 h-3Z M28 24 h2 v1 h-2Z M31 24 h2 v1 h-2Z M36 24 h3 v1 h-3Z M45 24 h1 v1 h-1Z M47 24 h2 v1 h-2Z M0 25 h1 v1 h-1Z M2 25 h2 v1 h-2Z M9 25 h3 v1 h-3Z M14 25 h4 v1 h-4Z M19 25 h1 v1 h-1Z M28 25 h2 v1 h-2Z M32 25 h2 v1 h-2Z M37 25 h1 v1 h-1Z M39 25 h1 v1 h-1Z M47 25 h1 v1 h-1Z M1 26 h3 v1 h-3Z M10 26 h1 v1 h-1Z M12 26 h5 v1 h-5Z M18 26 h1 v1 h-1Z M21 26 h1 v1 h-1Z M27 26 h13 v1 h-13Z M48 26 h1 v1 h-1Z M0 27 h2 v1 h-2Z M3 27 h1 v1 h-1Z M10 27 h2 v1 h-2Z M13 27 h1 v1 h-1Z M16 27 h1 v1 h-1Z M19 27 h1 v1 h-1Z M21 27 h1 v1 h-1Z M24 27 h1 v1 h-1Z M28 27 h1 v1 h-1Z M30 27 h1 v1 h-1Z M32 27 h2 v1 h-2Z M35 27 h4 v1 h-4Z M40 27 h1 v1 h-1Z M45 27 h2 v1 h-2Z M0 28 h1 v1 h-1Z M3 28 h1 v1 h-1Z M5 28 h1 v1 h-1Z M7 28 h2 v1 h-2Z M12 28 h1 v1 h-1Z M14 28 h1 v1 h-1Z M16 28 h1 v1 h-1Z M18 28 h1 v1 h-1Z M20 28 h1 v1 h-1Z M22 28 h1 v1 h-1Z M24 28 h5 v1 h-5Z M30 28 h1 v1 h-1Z M32 28 h2 v1 h-2Z M35 28 h2 v1 h-2Z M38 28 h3 v1 h-3Z M43 28 h2 v1 h-2Z M47 28 h1 v1 h-1Z M0 29 h3 v1 h-3Z M4 29 h1 v1 h-1Z M8 29 h2 v1 h-2Z M15 29 h1 v1 h-1Z M17 29 h4 v1 h-4Z M23 29 h1 v1 h-1Z M26 29 h3 v1 h-3Z M31 29 h1 v1 h-1Z M33 29 h2 v1 h-2Z M38 29 h1 v1 h-1Z M42 29 h2 v1 h-2Z M46 29 h1 v1 h-1Z M48 29 h1 v1 h-1Z M1 30 h1 v1 h-1Z M3 30 h1 v1 h-1Z M5 30 h1 v1 h-1Z M7 30 h1 v1 h-1Z M9 30 h1 v1 h-1Z M12 30 h2 v1 h-2Z M17 30 h3 v1 h-3Z M23 30 h2 v1 h-2Z M26 30 h2 v1 h-2Z M29 30 h1 v1 h-1Z M31 30 h3 v1 h-3Z M36 30 h2 v1 h-2Z M39 30 h3 v1 h-3Z M48 30 h1 v1 h-1Z M0 31 h1 v1 h-1Z M3 31 h3 v1 h-3Z M8 31 h4 v1 h-4Z M13 31 h2 v1 h-2Z M21 31 h1 v1 h-1Z M24 31 h2 v1 h-2Z M28 31 h2 v1 h-2Z M31 31 h1 v1 h-1Z M33 31 h3 v1 h-3Z M38 31 h2 v1 h-2Z M42 31 h1 v1 h-1Z M46 31 h1 v1 h-1Z M0 32 h1 v1 h-1Z M2 32 h4 v1 h-4Z M8 32 h5 v1 h-5Z M15 32 h2 v1 h-2Z M18 32 h2 v1 h-2Z M24 32 h3 v1 h-3Z M29 32 h5 v1 h-5Z M35 32 h1 v1 h-1Z M38 32 h1 v1 h-1Z M40 32 h2 v1 h-2Z M43 32 h1 v1 h-1Z M45 32 h1 v1 h-1Z M47 32 h1 v1 h-1Z M0 33 h1 v1 h-1Z M3 33 h2 v1 h-2Z M7 33 h3 v1 h-3Z M11 33 h4 v1 h-4Z M16 33 h5 v1 h-5Z M22 33 h1 v1 h-1Z M24 33 h1 v1 h-1Z M26 33 h2 v1 h-2Z M30 33 h1 v1 h-1Z M32 33 h1 v1 h-1Z M37 33 h1 v1 h-1Z M40 33 h2 v1 h-2Z M43 33 h2 v1 h-2Z M46 33 h3 v1 h-3Z M1 34 h1 v1 h-1Z M3 34 h2 v1 h-2Z M7 34 h1 v1 h-1Z M12 34 h1 v1 h-1Z M15 34 h1 v1 h-1Z M17 34 h1 v1 h-1Z M19 34 h1 v1 h-1Z M21 34 h5 v1 h-5Z M27 34 h2 v1 h-2Z M34 34 h2 v1 h-2Z M38 34 h1 v1 h-1Z M41 34 h2 v1 h-2Z M44 34 h3 v1 h-3Z M48 34 h1 v1 h-1Z M1 35 h1 v1 h-1Z M3 35 h2 v1 h-2Z M8 35 h1 v1 h-1Z M10 35 h3 v1 h-3Z M14 35 h1 v1 h-1Z M18 35 h1 v1 h-1Z M23 35 h5 v1 h-5Z M32 35 h1 v1 h-1Z M35 35 h1 v1 h-1Z M39 35 h2 v1 h-2Z M43 35 h1 v1 h-1Z M45 35 h4 v1 h-4Z M4 36 h1 v1 h-1Z M7 36 h3 v1 h-3Z M11 36 h1 v1 h-1Z M14 36 h2 v1 h-2Z M18 36 h2 v1 h-2Z M25 36 h2 v1 h-2Z M28 36 h3 v1 h-3Z M32 36 h5 v1 h-5Z M38 36 h3 v1 h-3Z M42 36 h1 v1 h-1Z M44 36 h1 v1 h-1Z M2 37 h1 v1 h-1Z M5 37 h1 v1 h-1Z M7 37 h2 v1 h-2Z M11 37 h2 v1 h-2Z M16 37 h1 v1 h-1Z M20 37 h1 v1 h-1Z M23 37 h3 v1 h-3Z M27 37 h1 v1 h-1Z M29 37 h5 v1 h-5Z M36 37 h1 v1 h-1Z M39 37 h1 v1 h-1Z M41 37 h1 v1 h-1Z M43 37 h3 v1 h-3Z M48 37 h1 v1 h-1Z M7 38 h1 v1 h-1Z M10 38 h1 v1 h-1Z M13 38 h1 v1 h-1Z M18 38 h1 v1 h-1Z M20 38 h3 v1 h-3Z M25 38 h1 v1 h-1Z M30 38 h1 v1 h-1Z M34 38 h1 v1 h-1Z M36 38 h2 v1 h-2Z M43 38 h1 v1 h-1Z M45 38 h2 v1 h-2Z M7 39 h1 v1 h-1Z M11 39 h5 v1 h-5Z M18 39 h3 v1 h-3Z M22 39 h1 v1 h-1Z M24 39 h2 v1 h-2Z M32 39 h1 v1 h-1Z M34 39 h1 v1 h-1Z M36 39 h1 v1 h-1Z M40 39 h1 v1 h-1Z M42 39 h1 v1 h-1Z M45 39 h2 v1 h-2Z M48 39 h1 v1 h-1Z M9 40 h1 v1 h-1Z M11 40 h1 v1 h-1Z M14 40 h3 v1 h-3Z M18 40 h1 v1 h-1Z M20 40 h2 v1 h-2Z M29 40 h2 v1 h-2Z M32 40 h2 v1 h-2Z M10 41 h1 v1 h-1Z M12 41 h4 v1 h-4Z M17 41 h1 v1 h-1Z M19 41 h2 v1 h-2Z M30 41 h1 v1 h-1Z M33 41 h1 v1 h-1Z M35 41 h1 v1 h-1Z M37 41 h2 v1 h-2Z M45 41 h1 v1 h-1Z M9 42 h1 v1 h-1Z M11 42 h3 v1 h-3Z M15 42 h3 v1 h-3Z M27 42 h4 v1 h-4Z M33 42 h1 v1 h-1Z M35 42 h3 v1 h-3Z M39 42 h1 v1 h-1Z M47 42 h1 v1 h-1Z M13 43 h4 v1 h-4Z M19 43 h1 v1 h-1Z M21 43 h1 v1 h-1Z M28 43 h2 v1 h-2Z M34 43 h1 v1 h-1Z M37 43 h2 v1 h-2Z M45 43 h3 v1 h-3Z M10 44 h1 v1 h-1Z M12 44 h2 v1 h-2Z M15 44 h6 v1 h-6Z M27 44 h2 v1 h-2Z M31 44 h1 v1 h-1Z M33 44 h1 v1 h-1Z M37 44 h3 v1 h-3Z M46 44 h1 v1 h-1Z M9 45 h2 v1 h-2Z M12 45 h2 v1 h-2Z M16 45 h3 v1 h-3Z M21 45 h1 v1 h-1Z M24 45 h5 v1 h-5Z M33 45 h3 v1 h-3Z M37 45 h1 v1 h-1Z M40 45 h3 v1 h-3Z M44 45 h1 v1 h-1Z M48 45 h1 v1 h-1Z M9 46 h2 v1 h-2Z M12 46 h1 v1 h-1Z M14 46 h5 v1 h-5Z M20 46 h2 v1 h-2Z M23 46 h3 v1 h-3Z M30 46 h1 v1 h-1Z M36 46 h2 v1 h-2Z M40 46 h7 v1 h-7Z M10 47 h1 v1 h-1Z M12 47 h4 v1 h-4Z M18 47 h3 v1 h-3Z M22 47 h2 v1 h-2Z M27 47 h2 v1 h-2Z M30 47 h1 v1 h-1Z M37 47 h1 v1 h-1Z M39 47 h1 v1 h-1Z M43 47 h1 v1 h-1Z M45 47 h1 v1 h-1Z M11 48 h4 v1 h-4Z M16 48 h1 v1 h-1Z M18 48 h1 v1 h-1Z M21 48 h2 v1 h-2Z M24 48 h1 v1 h-1Z M26 48 h3 v1 h-3Z M34 48 h1 v1 h-1Z M36 48 h1 v1 h-1Z M38 48 h3 v1 h-3Z M44 48 h1 v1 h-1Z M46 48 h1 v1 h-1Z M48 48 h1 v1 h-1Z "></path><path
                                        class="qr-1536 " stroke="transparent" fill="#000" fill-opacity="1"
                                        d="M0 0 h7 v1 h-7Z M42 0 h7 v1 h-7Z M0 1 h1 v1 h-1Z M6 1 h1 v1 h-1Z M42 1 h1 v1 h-1Z M48 1 h1 v1 h-1Z M0 2 h1 v1 h-1Z M2 2 h3 v1 h-3Z M6 2 h1 v1 h-1Z M42 2 h1 v1 h-1Z M44 2 h3 v1 h-3Z M48 2 h1 v1 h-1Z M0 3 h1 v1 h-1Z M2 3 h3 v1 h-3Z M6 3 h1 v1 h-1Z M42 3 h1 v1 h-1Z M44 3 h3 v1 h-3Z M48 3 h1 v1 h-1Z M0 4 h1 v1 h-1Z M2 4 h3 v1 h-3Z M6 4 h1 v1 h-1Z M42 4 h1 v1 h-1Z M44 4 h3 v1 h-3Z M48 4 h1 v1 h-1Z M0 5 h1 v1 h-1Z M6 5 h1 v1 h-1Z M42 5 h1 v1 h-1Z M48 5 h1 v1 h-1Z M0 6 h7 v1 h-7Z M42 6 h7 v1 h-7Z M0 42 h7 v1 h-7Z M0 43 h1 v1 h-1Z M6 43 h1 v1 h-1Z M0 44 h1 v1 h-1Z M2 44 h3 v1 h-3Z M6 44 h1 v1 h-1Z M0 45 h1 v1 h-1Z M2 45 h3 v1 h-3Z M6 45 h1 v1 h-1Z M0 46 h1 v1 h-1Z M2 46 h3 v1 h-3Z M6 46 h1 v1 h-1Z M0 47 h1 v1 h-1Z M6 47 h1 v1 h-1Z M0 48 h7 v1 h-7Z "></path><path
                                        class="qr-2560 " stroke="transparent" fill="#000" fill-opacity="1"
                                        d="M22 4 h5 v1 h-5Z M22 5 h1 v1 h-1Z M26 5 h1 v1 h-1Z M22 6 h1 v1 h-1Z M24 6 h1 v1 h-1Z M26 6 h1 v1 h-1Z M22 7 h1 v1 h-1Z M26 7 h1 v1 h-1Z M22 8 h5 v1 h-5Z M4 22 h5 v1 h-5Z M22 22 h5 v1 h-5Z M40 22 h5 v1 h-5Z M4 23 h1 v1 h-1Z M8 23 h1 v1 h-1Z M22 23 h1 v1 h-1Z M26 23 h1 v1 h-1Z M40 23 h1 v1 h-1Z M44 23 h1 v1 h-1Z M4 24 h1 v1 h-1Z M6 24 h1 v1 h-1Z M8 24 h1 v1 h-1Z M22 24 h1 v1 h-1Z M24 24 h1 v1 h-1Z M26 24 h1 v1 h-1Z M40 24 h1 v1 h-1Z M42 24 h1 v1 h-1Z M44 24 h1 v1 h-1Z M4 25 h1 v1 h-1Z M8 25 h1 v1 h-1Z M22 25 h1 v1 h-1Z M26 25 h1 v1 h-1Z M40 25 h1 v1 h-1Z M44 25 h1 v1 h-1Z M4 26 h5 v1 h-5Z M22 26 h5 v1 h-5Z M40 26 h5 v1 h-5Z M22 40 h5 v1 h-5Z M40 40 h5 v1 h-5Z M22 41 h1 v1 h-1Z M26 41 h1 v1 h-1Z M40 41 h1 v1 h-1Z M44 41 h1 v1 h-1Z M22 42 h1 v1 h-1Z M24 42 h1 v1 h-1Z M26 42 h1 v1 h-1Z M40 42 h1 v1 h-1Z M42 42 h1 v1 h-1Z M44 42 h1 v1 h-1Z M22 43 h1 v1 h-1Z M26 43 h1 v1 h-1Z M40 43 h1 v1 h-1Z M44 43 h1 v1 h-1Z M22 44 h5 v1 h-5Z M40 44 h5 v1 h-5Z "></path><path
                                        class="qr-3072 " stroke="transparent" fill="#000" fill-opacity="1"
                                        d="M8 6 h1 v1 h-1Z M10 6 h1 v1 h-1Z M12 6 h1 v1 h-1Z M14 6 h1 v1 h-1Z M16 6 h1 v1 h-1Z M18 6 h1 v1 h-1Z M20 6 h1 v1 h-1Z M28 6 h1 v1 h-1Z M30 6 h1 v1 h-1Z M32 6 h1 v1 h-1Z M34 6 h1 v1 h-1Z M36 6 h1 v1 h-1Z M38 6 h1 v1 h-1Z M40 6 h1 v1 h-1Z M6 8 h1 v1 h-1Z M6 10 h1 v1 h-1Z M6 12 h1 v1 h-1Z M6 14 h1 v1 h-1Z M6 16 h1 v1 h-1Z M6 18 h1 v1 h-1Z M6 20 h1 v1 h-1Z M6 28 h1 v1 h-1Z M6 30 h1 v1 h-1Z M6 32 h1 v1 h-1Z M6 34 h1 v1 h-1Z M6 36 h1 v1 h-1Z M6 38 h1 v1 h-1Z M6 40 h1 v1 h-1Z "></path><path
                                        class="qr-3584 " stroke="transparent" fill="#000" fill-opacity="1"
                                        d="M8 0 h1 v1 h-1Z M8 3 h1 v1 h-1Z M8 4 h1 v1 h-1Z M8 5 h1 v1 h-1Z M8 7 h1 v1 h-1Z M0 8 h1 v1 h-1Z M4 8 h1 v1 h-1Z M7 8 h2 v1 h-2Z M41 8 h5 v1 h-5Z M48 8 h1 v1 h-1Z M8 42 h1 v1 h-1Z M8 44 h1 v1 h-1Z M8 48 h1 v1 h-1Z "></path><path
                                        class="qr-4096 " stroke="transparent" fill="#000" fill-opacity="1"
                                        d="M40 0 h1 v1 h-1Z M38 1 h3 v1 h-3Z M39 2 h2 v1 h-2Z M39 3 h1 v1 h-1Z M38 5 h1 v1 h-1Z M1 38 h1 v1 h-1Z M5 38 h1 v1 h-1Z M1 39 h3 v1 h-3Z M0 40 h3 v1 h-3Z "></path></svg>

                            </span>
                                                        </div>
                                                    </div>
                                                    <h3></h3>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <script>
                                        var printButton = document.getElementById('print-button');
                                        printButton.addEventListener('click', function () {
                                            window.print();
                                        })


                                        window.onload = function () {
                                            try {
                                                // var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
                                                //
                                                // if(!isSafari) {
                                                //     return;
                                                // }

                                                if (screen.width >= 300 && screen.width < 500) {
                                                    var mvp = document.getElementById('vp');
                                                    mvp.setAttribute('content', 'initial-scale=0.35,width=device-width');
                                                } else if (screen.width > 500 && screen.width < 600) {
                                                    var mvp = document.getElementById('vp');
                                                    mvp.setAttribute('content', 'initial-scale=0.6,width=device-width');
                                                } else if (screen.width > 600 && screen.width < 700) {
                                                    var mvp = document.getElementById('vp');
                                                    mvp.setAttribute('content', 'initial-scale=0.7,width=device-width');
                                                }

                                            } catch (e) {

                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pos-absolute z-2 d-flex flex-column ai-end hide-scrollbar layout_Layout__eyRoc d-none">
                        <div
                            class="grow-1 bg-000 radius-large-lg d-flex flex-column overflow-hidden layout_Layout__content__6lcnp">
                            <header class="w-full bg-primary-500 color-white px-5 py-2">
                                <div class="d-flex ai-center jc-between"><h2 class="text-h4">پشتیبانی آنلاین</h2>
                                    <div class="d-flex pointer">
                                        <svg style="width: 24px; height: 24px; fill: var(--color-icon-white);">
                                            <use xlink:href="#arrowLeft"></use>
                                        </svg>
                                    </div>
                                </div>
                            </header>
                            <div class=""></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-100 bg-000 z-3 fixed left-0 bottom-0 d-flex ai-center jc-center" width="1217" height="0">
                <div class="shadow-1-top m-auto radius container-xl-w" id="base_layout_desktop_fixed_footer"></div>
            </div>
        </div>
        <div id="modal-root">
            <div class="ReactModalPortal"></div>
            <div class="ReactModalPortal"></div>
            <div class="ReactModalPortal"></div>
            <div class="ReactModalPortal"></div>
        </div>
    </div>
</div>
