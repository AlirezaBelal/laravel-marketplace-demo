@section('title')
    پروفایل -
    {{auth()->user()->name}}
@endsection
<div class="o-box__tabs  js-order-search-container">

    <div class="o-box__tab {{Request::routeIs('order.profile.index') ? 'is-active': '' }}  " data-tab-pill-id="0"><a
            href="/profile/orders">
            در انتظار پرداخت
            <span class="o-box__tab-counter">

                {{\App\Models\PersianNumber::translate(\App\Models\Order::where('user_id',auth()->user()->id)->
                where('status','wait')->count())}}
            </span></a></div>
    <div class="o-box__tab  {{Request::routeIs('order.profile.paid') ? 'is-active': '' }}" data-tab-pill-id="1">
        <a href="/profile/my-orders/paid-in-progress">
            در حال پردازش
            <span class="o-box__tab-counter">  {{\App\Models\PersianNumber::translate(\App\Models\Order::where('user_id',auth()->user()->id)->
                where('status','paid')->count())}}</span></a></div>
    <div class="o-box__tab {{Request::routeIs('order.profile.delivered') ? 'is-active': '' }} " data-tab-pill-id="2">
        <a href="/profile/my-orders/delivered">
            تحویل شده
            <span class="o-box__tab-counter">{{\App\Models\PersianNumber::translate(\App\Models\Order::where('user_id',auth()->user()->id)->
                where('status','delivered')->count())}}</span></a></div>
    <div class="o-box__tab {{Request::routeIs('order.profile.returned') ? 'is-active': '' }}" data-tab-pill-id="3">
        <a href="/profile/my-orders/returned">
            مرجوعی
            <span class="o-box__tab-counter">{{\App\Models\PersianNumber::translate(\App\Models\Order::where('user_id',auth()->user()->id)->
                where('status','returned')->count())}}</span></a></div>
    <div class="o-box__tab {{Request::routeIs('order.profile.canceled') ? 'is-active': '' }}" data-tab-pill-id="4">
        <a href="/profile/my-orders/canceled">
            لغو شده
            <span class="o-box__tab-counter">{{\App\Models\PersianNumber::translate(\App\Models\Order::where('user_id',auth()->user()->id)->
                where('status','cancel')->count())}}</span></a></div>
    {{--    <div class="c-profile-order__search-input-container">--}}
    {{--        <div class="o-btn c-profile-order__search-close js-order-search-close"></div>--}}
    {{--        <input class="c-profile-order__search-input js-order-search-input"--}}
    {{--               placeholder="عنوان کالا یا شماره سفارش موردنظرتان را وارد کنید"></div>--}}
    {{--    <div class="o-btn c-profile-order__search-btn js-order-search-btn"></div>--}}
</div>
