<!DOCTYPE html>
<html class="" style="" dir="rtl">
@include('layouts.seller.head')
<body class=" c-modal-map__body" style="" data-select2-id="20">
@include('sweet::alert')


{{$slot}}

@include('layouts.seller.footer')
<livewire:scripts />
</body>

</html>
