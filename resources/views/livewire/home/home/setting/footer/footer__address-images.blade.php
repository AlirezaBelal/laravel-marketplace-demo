
<div class="c-footer__address-images">
    @foreach(\App\Models\FooterInnerBox::where('top',0)->get() as $pages)

        @foreach(\App\Models\Page::where('id',$pages->page_id)->get() as $page)
    <a
        href="{{$page->link}}"
        target="_blank" class="c-footer__address-appstore"
        data-snt-event="dkFooterClick"
        data-snt-params='{"item":"download-app","item_option":"android"}'
        data-event-category="footer_section"
        data-event-label="link: {{$page->link}} - current_page: /">
        <img
            data-src="/storage/{{$page->img}}"
            alt="playstore" width="150px" loading="lazy"></a>

        @endforeach
        @endforeach

</div>
