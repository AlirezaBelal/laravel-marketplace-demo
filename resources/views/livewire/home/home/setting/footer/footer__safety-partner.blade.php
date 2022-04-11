<aside>
    @php
        $footer_title_16 = \App\Models\FooterTitle::get()[15];
        $footer_title_17 = \App\Models\FooterTitle::get()[16];
        $footer_title_18 = \App\Models\FooterTitle::get()[17];


    @endphp
    <ul class="c-footer__safety-partner">
        <li>
         {!! $footer_title_16->title !!}
        </li>
        <li class="c-footer__safety-partner-2">
            {!! $footer_title_17->title !!}
        </li>

        <li class="c-footer__safety-partner-3">
            {!! $footer_title_18->title !!}
        </li>
    </ul>
</aside>
