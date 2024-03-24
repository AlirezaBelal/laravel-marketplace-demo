<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مرکز فروشندگان دیجی‌کالا - ثبت سفارش
    </title>
</head>
<body>
<div>
    <div class="yiv5106906908page">
        <div
            style="color:black;padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;max-width:1024px;font-family:'IRANSans', Tahoma, serif;direction:rtl;"
            class="yiv5106906908c-invoice-email">
            <div style="text-align:center;margin-bottom:20px;" class="yiv5106906908c-invoice-email__logo">
                <a rel="nofollow noopener noreferrer" target="_blank" href="https://www.digikala.com"
                   style="width:150px;display:block;margin-top:auto;margin-bottom:auto;margin-right:auto;margin-left:auto;"
                   class="yiv5106906908c-invoice-email__logo-img">
                    <img
                        src="https://ecp.yusercontent.com/mail?url=https%3A%2F%2Fadmin.digikala.com%2Fstatic%2Ffiles%2F86e4609e.png&amp;t=1652692094&amp;ymreqid=acaf8295-2cdc-7db8-1ce9-99000101ed00&amp;sig=ruNUhIbCA1Yh.y3b2z98Ig--~D"
                        style="width:100%;max-height:100%;">
                </a>
            </div>
            <div
                style="margin-bottom:30px;padding-top:0;padding-bottom:0;padding-right:15px;padding-left:15px;position:relative;"
                class="yiv5106906908c-invoice-email__header">
                <span style="font-weight:bold;"
                      class="yiv5106906908c-invoice-email__header-bold">{{auth()->user()->name}} عزیز</span>
                <span style="display:block;margin-top:10px;" class="yiv5106906908c-invoice-email__header-greeting">امیدواریم خرید لذت‌بخشی را تجربه کرده باشید</span>
            </div>
            <div class="yiv5106906908c-invoice-email__body">
                <div
                    style="border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#d8d8d8;padding-top:0;padding-bottom:12px;padding-right:15px;padding-left:15px;position:relative;width:100%;"
                    class="yiv5106906908c-invoice-email__body-header">

                    <div style="font-size:14px;" class="yiv5106906908c-invoice-email__body-header-msg">
                        <span style="font-weight:bold;" class="yiv5106906908c-invoice-email__header-bold">رسید خرید شما برای سفارش</span>
                        <a rel="nofollow noopener noreferrer" target="_blank"
                           href="https://www.digikala.com/profile/orders/158958848/"
                           style="color:#00bfd6;text-decoration:underline;padding-right:3px;display:inline-block;"
                           class="yiv5106906908c-invoice-email__order-id">DKC-268894782</a>
                    </div>
                    <div style="text-align:left;margin-top:8px;" class="yiv5106906908c-invoice-email__body-header-date">
                    <span style="white-space:nowrap;" class="yiv5106906908c-invoice-email__date">
                        تاریخ : ۲۲ اردیبهشت ۱۴۰۱
                    </span>
                    </div>
                </div>
                <div
                    style="color:#6f6f6f;margin-top:16px;padding-top:0;padding-bottom:0;padding-right:15px;padding-left:15px;"
                    class="yiv5106906908c-invoice-email__body-header-receiver">
                <span>
                    تحویل گیرنده: {{$user->name}}
                </span>
                    <span>
                     ‌بناب،
                </span>
                </div>
                <div style="margin-top:30px;" class="yiv5106906908c-invoice-email__body-orders">
                    <div
                        style="font-weight:bold;padding-top:0;padding-bottom:12px;padding-right:15px;padding-left:15px;border-bottom-width:2px;border-bottom-style:solid;border-bottom-color:#ef394e;display:block;"
                        class="yiv5106906908c-invoice-email__header-bold">
                        <span>لیست کالاهای خریداری شده</span>
                    </div>
                    <div class="yiv5106906908c-invoice-email__body-orders-container">
                        <ul style="list-style-type:none;list-style-position:outside;list-style-image:none;padding-right:0;">

                            <li style="border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#8d8d8d;padding-top:10px;padding-bottom:10px;padding-right:15px;padding-left:15px;position:relative;">
                                <div style="border-bottom:1px solid #f0f0f0;"
                                     class="yiv5106906908c-invoice-email__order">

                                    <a rel="nofollow noopener noreferrer" target="_blank"
                                       href="https://www.digikala.com/product/dkp-2528279"
                                       style="width:60px;min-height:60px;display:inline-block;margin-left:13px;"
                                       class="yiv5106906908c-invoice-email__product-image">
                                        <img
                                            src="{{url('/')}}/storage/{{$order->product->img}}"
                                            style="width:100%;max-height:100%;">
                                    </a>

                                    <div style="display:inline-block;" class="yiv5106906908c-invoice-email__order-info">
                                        <div style="font-size:14px;line-height:24px;font-weight:bold;"
                                             class="yiv5106906908c-invoice-email__product-title yiv5106906908c-invoice-email__header-bold">
                                            <span>
                                                {{$order->product->title}}
                                             </span>
                                            <a rel="nofollow noopener noreferrer" target="_blank"
                                               href="https://www.digikala.com/product/dkp-2528279"
                                               style="width:16px;min-height:16px;display:inline-block;margin-right:4px;"
                                               class="yiv5106906908c-invoice-email__product-title-link-to">
                                                <img
                                                    src="{{url('/')}}/storage/{{$order->product->img}}"
                                                    style="width:100%;min-height:100%;">
                                            </a>
                                        </div>
                                        <div
                                            style="padding-top:15px;padding-bottom:15px;padding-right:0;padding-left:0;"
                                            class="yiv5106906908c-invoice-email__product-info">
                                                                                            <span
                                                                                                style="color:#a8a8a8;margin-left:35px;display:inline-block;font-size:12px;"
                                                                                                class="yiv5106906908c-invoice-email__value">
                                        گارانتی: گارانتی اصالت و سلامت فیزیکی کالا
                                        </span>

                                            <span
                                                style="color:#a8a8a8;margin-left:35px;display:inline-block;font-size:12px;"
                                                class="yiv5106906908c-invoice-email__value">
                                        رنگ : بی رنگ شفاف
                                        </span>


                                            <span
                                                style="color:#a8a8a8;margin-left:35px;display:inline-block;font-size:12px;"
                                                class="yiv5106906908c-invoice-email__value">
                                        تعداد : ۱ عدد
                                    </span>
                                        </div>
                                    </div>
                                </div>

                                <div style="padding-top:15px;color:#a8a8a8;font-size:12px;"
                                     class="yiv5106906908c-invoice-email__seller">
                                <span>
                                    فروشنده : فروشگاه ارن
                                </span>
                                </div>
                                <div style="font-weight:bold;text-align:left;margin-top:8px;"
                                     class="yiv5106906908c-invoice-email__product-price yiv5106906908c-invoice-email__header-bold">
                                    <span>۱,۷۲۹,۴۰۰</span>
                                    <span style="font-size:10px;vertical-align:bottom;"
                                          class="yiv5106906908c-invoice-email__product-price__currency">ریال</span>
                                </div>
                            </li>

                            <li style="border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#8d8d8d;padding-top:10px;padding-bottom:10px;padding-right:15px;padding-left:15px;position:relative;">
                                <div style="font-size:14px;line-height:24px;font-weight:bold;"
                                     class="yiv5106906908c-invoice-email__product-title yiv5106906908c-invoice-email__header-bold">
                                    <span>
                                        هزینه ارسال
                                    </span>
                                </div>
                                <div style="font-weight:bold;text-align:left;margin-top:8px;"
                                     class="yiv5106906908c-invoice-email__product-price yiv5106906908c-invoice-email__header-bold">
                                    <span>رایگان</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    style="margin-top:20px;display:block;padding-top:0;padding-bottom:0;padding-right:15px;padding-left:15px;"
                    class="yiv5106906908c-invoice-email__total-price-container">
                    <div style="width:250px;margin-right:auto;" class="yiv5106906908c-invoice-email__total-price">
                        <div style="font-weight:bold;position:relative;margin-top:8px;"
                             class="yiv5106906908c-invoice-email__price">
                            <span>مبلغ کل:‌</span>
                            <div style="display:inline;">
                                <span>{{number_format($order->total_price)}}</span>
                                <span style="font-size:10px;vertical-align:bottom;"
                                      class="yiv5106906908c-invoice-email__product-price__currency">تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top:30px;" class="yiv5106906908c-invoice-email__extra">
                <div style="font-size:12px;margin-bottom:8px;" class="yiv5106906908c-invoice-email__extra-text">
                    <span>برای پیگیری وضعیت سفارش، ویرایش و دریافت فاکتور رسمی میتوانید به</span>
                    <a rel="nofollow noopener noreferrer" target="_blank"
                       href="https://www.digikala.com/profile/orders/158958848/"><span
                            style="text-decoration:underline;color:#00bfd6;"
                            class="yiv5106906908c-invoice-email__extra-link"> صفحه این سفارش </span></a>
                    <span>در وب‌سایت مراجعه کنید.</span>
                </div>
                <div style="font-size:12px;margin-bottom:8px;" class="yiv5106906908c-invoice-email__extra-text">
                    <span> در صورت نياز ميتوانيد راهنماي استفاده از سرويس خدمات پس از فروش دیجی‌کالا را از </span>
                    <a rel="nofollow noopener noreferrer" target="_blank"
                       href="https://admin.digikala.com/static/files/0ad4aff8.pdf"><span
                            style="text-decoration:underline;color:#00bfd6;"
                            class="yiv5106906908c-invoice-email__extra-link">اينجا</span></a>
                    <span> دانلود نماييد.</span>
                </div>

            </div>
            <div style="margin-top:30px;" class="yiv5106906908c-invoice-email__ad">
                <p><a rel="nofollow noopener noreferrer" target="_blank"
                      href="https://www.digikala.com/main/food-beverage/?utm_source=Invoice-DK&amp;utm_medium=ECRM&amp;utm_campaign=DKF-invoice-980125"
                      style="width:100%;"><img
                            src="https://ecp.yusercontent.com/mail?url=https%3A%2F%2Fdkstatics-public-2.digikala.com%2Fdigikala-adservice-banners%2F1000001253.jpg&amp;t=1652692094&amp;ymreqid=acaf8295-2cdc-7db8-1ce9-99000101ed00&amp;sig=pafEUUuQbNnU59dYg8Vghw--~D"
                            style="width:100%;"></a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
