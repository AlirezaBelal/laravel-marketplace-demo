<!DOCTYPE html>
<html class="" style="" dir="rtl">
@include('layouts.shipping.head')
<body class="t-header-light c-checkout-pages has-top-banner" style="">
@include('sweet::alert')
@include('layouts.shipping.header')
{{$slot}}
@include('layouts.shipping.footer')
@include('layouts.shipping.script')
</body>
</html>
