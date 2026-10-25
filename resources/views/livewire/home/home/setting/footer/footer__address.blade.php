@if (\App\Models\FooterTitle::count() >= 8)
<ul class="c-footer__contact">
    @php
        $footer_title_6 = \App\Models\FooterTitle::get()[5];
        $footer_title_7 = \App\Models\FooterTitle::get()[6];
        $footer_title_8 = \App\Models\FooterTitle::get()[7];
    @endphp
    <li>
        {{$footer_title_6->title}}
    </li>
    <li>
        {{$footer_title_7->title}}
    </li>
    <li>
        {{$footer_title_8->title}}
    </li>
</ul>
@endif
