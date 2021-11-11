<!DOCTYPE html>
<html lang="fa">
<head>
    @include('livewire.home.home.head')

    <link rel="stylesheet" href="{{asset('digikala/css/8ba74341.css')}}">
</head>
<body class=" is-access-page account-pages">
@include('sweet::alert')
{{--@include('livewire.home.home.header')--}}
{{$slot}}
{{--@include('livewire.home.home.footer')--}}
@include('livewire.home.home.jscript')
</body>

</html>
