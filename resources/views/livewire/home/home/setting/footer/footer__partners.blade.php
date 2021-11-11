<nav class="c-footer__partners-container">
    <ul class="c-footer__partners">
        @foreach(\App\Models\FooterPartner::all() as $footerPartner)
            @foreach(\App\Models\Page::where('id',$footerPartner->page_id)->get() as $page)
        <li><a href="{{$page->link}}" target="_blank" title="{{$page->title}}"
               data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;partners&quot;,&quot;item_option&quot;:&quot;digikalamag&quot;}"
               data-event="footer_links" data-event-category="footer_section"
               data-event-label="link: {{$page->link}} - current_page: /"><img
                    data-src="/storage/{{$page->img}}" loading="lazy"
                    alt="مجله اینترنتی دیجی‌کالا مگ"
                    src="/storage/{{$page->img}}"></a></li>
        @endforeach
        @endforeach
    </ul>
</nav>
