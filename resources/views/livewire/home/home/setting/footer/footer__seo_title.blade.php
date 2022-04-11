<div class="c-footer__content">
    @php
        $footer_title_1 = \App\Models\FooterTitle::get()[0];
        $footer_title_2 = \App\Models\FooterTitle::get()[1];

    @endphp
    <article class="c-footer__seo">
        <h1>   {{$footer_title_1->title}}</h1>
        <p>
                                <span class="c-footer__seo--content" id="seo-main-content">
                                    {{$footer_title_2->title}}
                                </span>

            <br>
            @php
                $footer_title_9 = \App\Models\FooterTitle::get()[8];
                $footer_title_10 = \App\Models\FooterTitle::get()[9];
                $footer_title_11 = \App\Models\FooterTitle::get()[10];
                $footer_title_12 = \App\Models\FooterTitle::get()[11];
                $footer_title_13 = \App\Models\FooterTitle::get()[12];
                $footer_title_14 = \App\Models\FooterTitle::get()[13];
                $footer_title_15 = \App\Models\FooterTitle::get()[14];

            @endphp

            <a data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;search-term&quot;,&quot;item_option&quot;:&quot;{{$footer_title_9->childCategory->title}}&quot;}"
               href="{{$footer_title_9->childCategory->link}}">
                {{$footer_title_9->childCategory->title}}
            </a>
            <a data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;search-term&quot;,&quot;item_option&quot;:&quot;{{$footer_title_10->childCategory->title}}&quot;}"
               href="{{$footer_title_10->childCategory->link}}">
                {{$footer_title_10->childCategory->title}}
            </a>
            <a data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;search-term&quot;,&quot;item_option&quot;:&quot;{{$footer_title_12->childCategory->title}}&quot;}"
               href="{{$footer_title_12->childCategory->link}}">
                {{$footer_title_12->childCategory->title}}
            </a>
            <a data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;search-term&quot;,&quot;item_option&quot;:&quot;{{$footer_title_13->childCategory->title}}&quot;}"
               href="{{$footer_title_13->childCategory->link}}">
                {{$footer_title_13->childCategory->title}}
            </a>
            <a data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;search-term&quot;,&quot;item_option&quot;:&quot;{{$footer_title_14->childCategory->title}}&quot;}"
               href="{{$footer_title_14->childCategory->link}}">
                {{$footer_title_14->childCategory->title}}
            </a>
            <a data-snt-event="dkFooterClick"
               data-snt-params="{&quot;item&quot;:&quot;search-term&quot;,&quot;item_option&quot;:&quot;{{$footer_title_15->childCategory->title}}&quot;}"
               href="{{$footer_title_15->childCategory->link}}">
                {{$footer_title_15->childCategory->title}}
            </a>




        </p>
    </article>
</div>
