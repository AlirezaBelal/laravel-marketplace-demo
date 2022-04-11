@php
    $footer_title_3 = \App\Models\FooterTitle::get()[2];


@endphp
<div class="c-footer__copyright">
    <div class="c-footer__copyright--text">
       {{$footer_title_3->title}}
    </div>
</div>
