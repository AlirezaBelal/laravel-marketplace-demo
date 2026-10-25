@if (\App\Models\FooterTitle::count() >= 5)
<div class="c-footer__community">
    @php
        $footer_title_3 = \App\Models\FooterTitle::get()[4];
    @endphp
    <div class="c-footer__social"><span>{{$footer_title_3->title}}</span>
        <div class="c-footer__social-images">
            <div class="c-footer__social-links">
                @foreach(\App\Models\Social::all() as $social)
                    <a href="{{$social->link}}"
                       class="c-footer__social-link c-footer__social-link--{{$social->icon}}"
                       target="_blank"></a>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endif
