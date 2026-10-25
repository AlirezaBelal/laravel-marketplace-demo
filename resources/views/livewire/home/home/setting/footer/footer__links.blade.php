@if (\App\Models\FooterLinkTitle::count() >= 2)
<div class="c-footer__links">
    <nav class="c-footer__links--col">
        <div class="o-headline-links">
            <div>
                @php
                    $footer_title = \App\Models\FooterLinkTitle::get()[0];

            $footer_link_title =   \App\Models\Page::where('id',$footer_title['page_id'])->first();

                @endphp
                <a data-snt-event="dkFooterClick"
                   data-snt-params='{"item":"index-title","item_option":"{{$footer_link_title->title}}"}'
                   href="{{url($footer_link_title->link)}}">{{$footer_link_title->title}}</a>
            </div>
        </div>
        <ul class="c-footer__links-ul">
            @foreach(\App\Models\FooterLinkOne::all() as $pages)

                @foreach(\App\Models\Page::where('id',$pages->page_id)->get() as $page)
                    <li><a data-snt-event="dkFooterClick"
                           data-snt-params='{"item":"index-item","item_option":"{{$page->title}}"}'
                           href="{{url($page->link)}}">{{$page->title}}</a></li>
                @endforeach
            @endforeach
        </ul>
    </nav>
    <nav class="c-footer__links--col">
        <div class="o-headline-links">
            <div>

                @php
                    $footer_title = \App\Models\FooterLinkTitle::get()[1];

            $footer_link_title =   \App\Models\Page::where('id',$footer_title['page_id'])->first();

                @endphp
                <a data-snt-event="dkFooterClick"
                   data-snt-params='{"item":"index-title","item_option":"{{$footer_link_title->title}}"}'
                   href="{{url($footer_link_title->link)}}">{{$footer_link_title->title}}</a>

            </div>
        </div>
        <ul class="c-footer__links-ul">
            @foreach(\App\Models\FooterLinkTwo::all() as $pages)

                @foreach(\App\Models\Page::where('id',$pages->page_id)->get() as $page)
                    <li><a data-snt-event="dkFooterClick"
                           data-snt-params='{"item":"index-item","item_option":"{{$page->title}}"}'
                           href="{{url($page->link)}}">{{$page->title}}</a></li>
                @endforeach
            @endforeach

        </ul>
    </nav>
    <nav class="c-footer__links--col">
        <div class="o-headline-links">
            <div>
                @php
                    $footer_title_2 = \App\Models\FooterLinkTitle::get()[2];

            $footer_link_title =   \App\Models\Page::where('id',$footer_title_2['page_id'])->first();

                @endphp
                <a data-snt-event="dkFooterClick"
                   data-snt-params='{"item":"index-title","item_option":"{{$footer_link_title->title}}"}'
                   href="{{url($footer_link_title->link)}}">{{$footer_link_title->title}}</a>


            </div>
        </div>
        <ul class="c-footer__links-ul">
            @foreach(\App\Models\FooterLinkThree::all() as $pages)

                @foreach(\App\Models\Page::where('id',$pages->page_id)->get() as $page)
                    <li><a data-snt-event="dkFooterClick"
                           data-snt-params='{"item":"index-item","item_option":"{{$page->title}}"}'
                           href="{{url($page->link)}}">{{$page->title}}</a></li>
                @endforeach
            @endforeach
        </ul>
    </nav>
</div>
@endif
