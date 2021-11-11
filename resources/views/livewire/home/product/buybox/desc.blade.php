<div class="c-content-expert js-product-tab-content is-active" id="desc"
     data-method="desc">
    <article>
        <div class="o-box__header"><span
                class="o-box__title">نقد و بررسی اجمالی</span><span
                class="o-box__header-desc">{{$product->name}}</span>
        </div>
        <section class="c-content-expert__summary">
            <div class="c-mask js-mask">
                <div
                    class="c-mask__text c-mask__text--product-summary js-mask__text is-active">
                  {!! $product->description !!}
                </div>
                <a data-snt-event="dkProductPageClick"
                   data-snt-params="{&quot;item&quot;:&quot;tab-show-more-less&quot;,&quot;item_option&quot;:null}"
                   class="o-btn o-btn--link-blue-sm o-btn--l-expand-more o-btn--no-x-padding c-mask__handler js-mask-handler-btn u-hidden"
                   data-updateparantmask="true">
                    ادامه مطلب
                </a></div>
        </section>
        <div class="c-content-expert__separator"></div>
    </article>
</div>
