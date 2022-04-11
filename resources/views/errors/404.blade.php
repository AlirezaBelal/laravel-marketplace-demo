<!DOCTYPE html>
<html lang="fa">
<head>
    @include('livewire.home.home.head')
    @section('title', 'Page Not Found')
</head>
<body class=" t-index" style="">
@include('sweet::alert')
@include('livewire.home.home.header')
<main id="main">
    <div id="HomePageTopBanner"></div>
    <div id="content">
        <div class="c-404">
            <div class="c-404__title"><h1>صفحه‌ای که دنبال آن بودید پیدا نشد!</h1></div>
            <div class="c-404__actions"><a href="/" class="c-404__action c-404__action--primary">صفحه اصلی</a></div>
            <div class="c-404__image"><img data-src="{{asset('img/644d3f75.png')}}"
                                           src="{{asset('img/644d3f75.png')}}" loading="lazy">
            </div>
        </div>
    </div>
</main>
@include('livewire.home.home.footer')
@include('livewire.home.home.jscript')
</body>

</html>
