<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href=""></a>
    <a href="/">
        <img style="height: 30px;margin-top: 15px;margin-right: 50px" src="{{asset('img/weblogo.png')}}" alt=""></a>

    <ul>

        <li class="item-li i-dashboard {{Request::routeIs('admin.index') ? 'is-active': '' }} "><a
                href="/admin">پیشخوان</a></li>
        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
            دسته ها و محصولات
        </span>
        @can('show-category')
            <li class="item-li i-categories {{Request::routeIs('category.index') ? 'is-active': '' }}"><a href="/admin/category">دسته بندی ها</a></li>
        @endcan
        @can('show-product')
            <li class="item-li i-banners {{Request::routeIs('product.index') ? 'is-active': '' }}"><a href="/admin/product">محصولات</a></li>
        @endcan
        @can('show-brand')
        <li class="item-li i-my__purchases {{Request::routeIs('brand.index') ? 'is-active': '' }}"><a href="/admin/brand">برند محصولات</a></li>
        @endcan
            <li class="item-li i-transactions {{Request::routeIs('color.index') ? 'is-active': '' }}"><a
                href="/admin/color">رنگ محصولات</a></li>
        <li class="item-li i-articles {{Request::routeIs('gallery.index') ? 'is-active': '' }}"><a
                href="/admin/gallery">گالری تصاویر محصولات</a></li>
        <li class="item-li i-checkouts {{Request::routeIs('warranty.index') ? 'is-active': '' }}"><a
                href="/admin/warranty">گارانتی محصولات</a></li>
        <li class="item-li i-courses {{Request::routeIs('productVendor.index') ? 'is-active': '' }}"><a
                href="/admin/productVendor">تنوع قیمت محصولات</a></li>
        <li class="item-li i-user__inforamtion {{Request::routeIs('attribute.index') ? 'is-active': '' }}"><a
                href="/admin/attribute">مشخصات محصولات</a></li>
        <li class="item-li i-discounts {{Request::routeIs('special.product.index') ? 'is-active': '' }}"><a
                href="/admin/special/product">پیشنهاد شگفت انگیز</a></li>
        <li class="item-li i-comments {{Request::routeIs('admin.comment.index') ? 'is-active': '' }}"><a
                href="/admin/comment">نظرات و نقد ها</a></li>
        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
           کاربران و فروشندگان
        </span>
        <li class="item-li i-users {{Request::routeIs('users.index') ? 'is-active': '' }}"><a href="/admin/users">کاربران</a>
        </li>
        <li class="item-li i-user__inforamtion {{Request::routeIs('seller.index') ? 'is-active': '' }}"><a
                href="/admin/seller">فروشندگان</a></li>
        <li class="item-li i-slideshow {{Request::routeIs('role.index') ? 'is-active': '' }}"><a href="/admin/role">مقام
                ها</a></li>
        <li class="item-li i-checkout__request {{Request::routeIs('permission.index') ? 'is-active': '' }}"><a
                href="/admin/permission">دسترسی ها</a></li>
        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
           ابزارها و آدرس ها
        </span>
        <li class="item-li i-ads {{Request::routeIs('dashboard.address') ? 'is-active': '' }}"><a
                href="/admin/dashboard/address">آدرس و زمان ارسال</a></li>

        <li class="item-li i-dashboard {{Request::routeIs('dashboard.favorite') ? 'is-active': '' }}"><a
                href="/admin/dashboard/favorite">لیست ها</a></li>
        <li class="item-li i-notification__management {{Request::routeIs('newsletter.index') ? 'is-active': '' }}"><a
                href="/admin/newsletter">خبرنامه</a></li>
        <li class="item-li i-comments {{Request::routeIs('social.index') ? 'is-active': '' }}"><a href="/admin/social">شبکه
                های اجتماعی</a></li>
        <li class="item-li i-ads {{Request::routeIs('ads.index') ? 'is-active': '' }}"><a href="/admin/ads">تبلیغات</a>
        </li>
        <li class="item-li i-articles {{Request::routeIs('banner.index') ? 'is-active': '' }}"><a href="/admin/banner">بنرها</a>
        </li>
        <li class="item-li i-slideshow {{Request::routeIs('slider.index') ? 'is-active': '' }}"><a href="/admin/slider">اسلایدر</a>
        </li>
        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
           کدهای تخفیف
        </span>
        <li class="item-li i-discounts {{Request::routeIs('discount.index') ? 'is-active': '' }}"><a
                href="/admin/discount"> کدهای تخفیف</a></li>
        <li class="item-li i-slideshow {{Request::routeIs('admin.gift.index') ? 'is-active': '' }}"><a href="/admin/gift">کارت
                های هدیه</a></li>
        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
           سفارشات و پرداخت ها
        </span>
        <li class="item-li i-my__peyments {{Request::routeIs('admin.payment.index') ? 'is-active': '' }}"><a
                href="/admin/payment">پرداخت ها</a></li>
        <li class="item-li i-my__purchases {{Request::routeIs('admin.orders.index') ? 'is-active': '' }}"><a
                href="/admin/orders">سفارشات</a></li>
        <li class="item-li i-discounts {{Request::routeIs('admin.orders.wait') ? 'is-active': '' }}"><a
                href="/admin/orders/wait">سفارشات در حال انتظار</a></li>
        <li class="item-li i-banners {{Request::routeIs('admin.orders.progress') ? 'is-active': '' }}"><a
                href="/admin/orders/progress">سفارشات در حال پردازش</a></li>
        <li class="item-li i-checkout__request {{Request::routeIs('admin.orders.complete') ? 'is-active': '' }}"><a
                href="/admin/orders/complete">سفارشات تکمیل شده </a></li>
        <li class="item-li i-categories {{Request::routeIs('admin.orders.returned') ? 'is-active': '' }}"><a
                href="/admin/orders/returned">سفارشات مرجوعی</a></li>
        <li class="item-li i-checkouts {{Request::routeIs('admin.orders.cancel') ? 'is-active': '' }}"><a
                href="/admin/orders/cancel">سفارشات کنسل شده</a></li>
        <li class="item-li i-checkouts {{Request::routeIs('admin.orders.returndetail') ? 'is-active': '' }}"><a
                href="/admin/orders/returndetail">جزئیات مرجوعی</a></li>
        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
           ابزار های اصلی منوها
        </span>
        <li class="item-li i-slideshow {{Request::routeIs('category.slider') ? 'is-active': '' }}"><a
                href="/admin/category/slider">دسته ها</a></li>
        <li class="item-li i-slideshow {{Request::routeIs('category.level') ? 'is-active': '' }}"><a
                href="/admin/category-level/">زیر دسته ها</a></li>
        {{--        <li class="item-li i-slideshow {{Request::routeIs('category.electronic.slider') ? 'is-active': '' }}"><a href="/admin/category/electronic/slider">کالای دیجیتال</a></li>--}}
        {{--        <li class="item-li i-slideshow {{Request::routeIs('category.vehicle.slider') ? 'is-active': '' }}"><a href="/admin/category/vehicle/slider">خودرو، ابزار </a></li>--}}
        {{--        <li class="item-li i-slideshow {{Request::routeIs('category.apparel.slider') ? 'is-active': '' }}"><a href="/admin/category/apparel/slider">مد و پوشاک </a></li>--}}

        <li class="item-li i-articles {{Request::routeIs('menu.index') ? 'is-active': '' }}"><a href="/admin/menu">منو
                های دسته</a></li>
        <li class="item-li i-user__inforamtion {{Request::routeIs('index.title.index') ? 'is-active': '' }}"><a
                href="/admin/index/title">دسته های صفحه اصلی</a></li>
        <li class="item-li i-checkout__request {{Request::routeIs('index.newselected.index') ? 'is-active': '' }}"><a
                href="/admin/index/newselected">منتخب محصولات</a></li>
        <li class="item-li i-slideshow {{Request::routeIs('page.index') ? 'is-active': '' }}"><a href="/admin/page">صفحات
                سایت</a></li>


        <hr style="margin-left: 15px;margin-right: 25px">
        <span style="font-size: small;color: burlywood;">
            تنظیمات سایت
        </span>
        <li class="item-li i-slideshow {{Request::routeIs('footer.index') ? 'is-active': '' }}"><a href="/admin/footer">تنظیمات
                فوتر سایت</a></li>
        <li class="item-li i-courses {{Request::routeIs('header.index') ? 'is-active': '' }}"><a href="/admin/header">
                تنظیمات سایت</a></li>
        <li class="item-li i-my__peyments {{Request::routeIs('email.index') ? 'is-active': '' }}"><a
                href="/admin/email"> ایمیل ها</a></li>
        <li class="item-li i-articles {{Request::routeIs('log.index') ? 'is-active': '' }}"><a href="/admin/log">گزارشات
                سیستم</a></li>


        <hr style="margin-left: 15px;margin-right: 25px">

    </ul>

</div>
