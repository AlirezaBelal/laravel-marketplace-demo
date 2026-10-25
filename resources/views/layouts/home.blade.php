<!DOCTYPE html>
<html lang="fa">
<head>
    @include('livewire.home.home.head')

</head>
<body class=" t-index">
{{--@includeIf('sweet::alert')--}}
@include('livewire.home.home.header')
{{$slot}}
@include('livewire.home.home.footer')
@include('livewire.home.home.jscript')
</body>

</html>
