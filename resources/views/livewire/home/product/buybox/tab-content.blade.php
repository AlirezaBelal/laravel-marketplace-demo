<div class="c-params js-product-tab-content" id="params" data-method="params">
    <article class="c-params__border-bottom">
        <div class="o-box__header"><span
                class="o-box__title">مشخصات کالا</span><span
                class="o-box__header-desc">{{$product->name}}</span>
        </div>
        @foreach(\App\Models\Attribute::where('childCategory',$product->childcategory_id)
->where('parent',0)->where('status',1)->orderBy('position')->get() as $attribute)
        <section style="    border-top: 1px solid #dfdfdf;padding-top: 25px">
            <h3 class="c-params__title">{{$attribute->title}}</h3>

            <ul class="c-params__list">
                @foreach(\App\Models\Attribute::where('childCategory',$product->childcategory_id)
->where('parent',$attribute->id)->where('status',1)->orderBy('position')->get() as $attr)
                <li>
                    <div class="c-params__list-key"><span class="block">{{$attr->title}}</span>
                    </div>
                    @foreach(\App\Models\AttributeValue::where('product_id',$product->id)
->where('attribute_id',$attr->id)->where('status',1)->get() as $att)
                    <div class="c-params__list-value"><span class="block">
                            {{$att->value}}
                                                                                    </span></div>
                    @endforeach
                </li>
                @endforeach
            </ul>

        </section>
        @endforeach
        <a href="#" class="c-params__collapse--link js-open-product-params">نمایش
            همه
            مشخصات کالا</a></article>
</div>
