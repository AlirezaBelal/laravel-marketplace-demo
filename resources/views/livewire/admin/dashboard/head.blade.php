
    <meta charset="UTF-8">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دیجی کالا | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive_991.css')}}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{asset('css/responsive_768.css')}}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{asset('css/font.css')}}">
{{--    <link href="{{asset('js/jquery.select2.js')}}" rel="stylesheet" />--}}
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/select2-bootstrap.min.css')}}" rel="stylesheet" />

{{--    <link rel="stylesheet" href="{{asset('css/bootstrap-iconpicker.min.css')}}">--}}
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('/js/sweetalert.min.js')}}"></script>


    <livewire:styles />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .breadcrumb {
            display: block;
        }
        .form-group
        {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .dropdown-select
        {
            display: none;
        }
        .item-restore::before {
            content: "\E0e5";
            font-size: 20px;
            top: 10px;
            right: 15px;
            color: #636e72;
        }
        .table td {
            white-space: nowrap;
            color: #444;
            padding: 13px 5px;
            font-size: 13px;
        }
        html, body, h1, h2, h3, h4, h5, h6, p, section, td, div, a, button {
            font-family: IRANYekan !important;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple
        {
            width: 315px !important;
        }
        .select2-container--default .select2-selection--multiple
        {
            width: 315px !important;
        }
    </style>
