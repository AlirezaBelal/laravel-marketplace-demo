<div class="c-gallery__item">

    @include('livewire.home.product.gallery.gallery_option')

    <div class="c-gallery__img">
        <img class="js-gallery-img"
             data-src="/storage/{{$product->img}}"
             title="{{$product->title}}"
             alt="{{$product->title}}"
             data-zoom-image="/storage/{{$product->img}}"
             src="/storage/{{$product->img}}"
             loading="lazy">
        <div class="c-gallery__main-img-badges-container"></div>
    </div>




</div>

@include('livewire.home.product.gallery.gallery_item')

@section('footer_home')

    <div class="zoomContainer"
         style="transform: translateZ(0px); position: absolute; left: 834.562px; top: 440.047px; height: 300.891px; width: 300.891px;">
        <div class="zoomLens"
             style="background-position: 0px 0px; float: right; overflow: hidden; z-index: 999; transform: translateZ(0px); opacity: 0.4; zoom: 1; width: 177.714px; height: 126.938px; background-color: rgba(239, 57, 78, 0.1); cursor: crosshair; border: 2.5px solid rgb(239, 86, 97); background-repeat: no-repeat; position: absolute; left: 88.6485px; top: 0px; display: none;">
            &nbsp;
        </div>
    </div>
    <div class="zoomWindowContainer" style="width: 756px;display: none">
        <div style="overflow: hidden; background-position: -308.76px -389.176px; text-align: center; background-color: rgb(255, 255, 255); width: 756px; height: 540px; float: left; background-size: 1280px 1280px; z-index: 100; border: 0px solid rgb(136, 136, 136); background-repeat: no-repeat; position: absolute;
            background-image: url('/storage/.{{$product->img}}');
            top: 319.594px; left: 24px; display: none;" class="zoomWindow">&nbsp;</div>
    </div>
@endsection

