<div class="c-box c-super-deal js-products-container">
    <a href="/"
       class="c-super-deal__more">نمایش
        همه</a>
    <div
        class="c-super-deal__header-container c-super-deal__header-container--amazing">
        <div class="c-super-deal__header c-super-deal__header--amazing"></div>
    </div>
    <div class="c-super-deal__container">
        @foreach($amazings as $amazing)
            <div class="c-super-deal__content js-product-content" id="content-product-{{$amazing->id}}"
                 style="display: none;">
                <a
                    @foreach (\App\Models\Product::where('id',$amazing->product_id)->
                                where('status_product',1)->get() as $item)
                    href="{{$item->link}}"
                    @endforeach

                    class="c-super-deal__img js-ga-item-product-picture"
                    data-product-id="3479859">
                    @foreach (\App\Models\Product::where('id',$amazing->product_id)->
                      where('status_product',1)->get() as $item)
                        <img src="/storage/{{$item->img}}"
                             alt="{{$item->title}}">
                    @endforeach
                </a>

                <div class="c-super-deal__info">
                    <div class="c-super-deal__info-top">
                        @foreach (\App\Models\Product::where('id',$amazing->product_id)->
                   where('status_product',1)->get() as $item)
                            <div class="c-super-deal__main-title">
                                {{$item->title}}
                            </div>
                        @endforeach

                        <ul class="c-discount__ul">

                            <li>

                                @foreach (\App\Models\AttributeValue::where('id',$amazing->property1)->get() as $item)
                                    @foreach (\App\Models\Attribute::where('id',$item->attribute_id)->get() as $attribute)
                                        {{$attribute->title}}
                                        :
                                        {{$item->value}}
                                    @endforeach
                                @endforeach
                            </li>
                            <li>
                                @foreach (\App\Models\AttributeValue::where('id',$amazing->property2)->get() as $item)
                                    @foreach (\App\Models\Attribute::where('id',$item->attribute_id)->get() as $attribute)
                                        {{$attribute->title}}
                                        :
                                        {{$item->value}}
                                    @endforeach
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="c-super-deal__info-bottom">
                        <div class="c-price c-price--left">
                            <div class="c-price__value c-price__value--plp"><span
                                    style="color: #acacac;font-size: 16px;">اتمام تخفیف</span>
                                <div class="c-price__value-wrapper">
                                    @foreach (\App\Models\Product::where('id',$amazing->product_id)->
                  where('status_product',1)->get() as $item)
                                        <div class="c-super-deal__main-title">
                                            {{\App\Models\PersianNumber::translate($item->price)}}
                                            <span class="c-price__currency">تومان</span>
                                        </div>

                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div
                            class="c-product-box__add-to-cart-section c-product-box__add-to-cart-section--superdeal">
                            <div
                                class="c-product__add-container c-product__add-container--super-deal js-add-to-cart-container ">
                                <a class="btn-primary u-background-red u-border-red btn-primary--flex-center js-add-to-cart-data-layer js-add-to-cart js-product-add-to-card"
                                   data-product-id="3479859"
                                   href="/cart/add/16048278/1/">افزودن به سبد خرید</a>
                                <div
                                    class="c-product__add-substitute c-product__add-substitute--super-deal js-select-quantity js-quick-add-to-cart"
                                    data-variant="16048278" data-cart-item=""
                                    data-mode="add">
                                    <div
                                        class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select selectric-js-order-amount">
                                        <div
                                            class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select">
                                            <div class="selectric-hide-select"><select
                                                    class="c-ui-select js-ui-select"
                                                    name="order[amount]" tabindex="-1">
                                                    <option value="0"
                                                            class="c-product__add-cancel">
                                                        حذف
                                                    </option>
                                                    <option value="1">۱</option>
                                                    <option value="2">۲</option>
                                                </select></div>
                                            <div class="selectric"><span class="label">حذف</span><b
                                                    class="button">▾</b></div>
                                            <div class="selectric-items" tabindex="-1">
                                                <div class="selectric-scroll">
                                                    <ul>
                                                        <li data-index="0"
                                                            class="c-product__add-cancel selected">
                                                            حذف
                                                        </li>
                                                        <li data-index="1" class="">۱
                                                        </li>
                                                        <li data-index="2" class="last">
                                                            ۲
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <input class="u-hidden" tabindex="-1"></div>
                                        <input class="u-hidden" tabindex="0"></div>
                                    <span class="c-product__added-notice">
                                                    به سبد خرید افزوده شد
                                                </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="c-super-deal__thumbnails">
            @foreach($amazings as $amazing)
                <div class="c-super-deal__thumbnail js-super-deal-item c-super-deal__thumbnail--selected"

                     @foreach (\App\Models\Product::where('id',$amazing->product_id)->
                where('status_product',1)->get() as $item)
                     data-product-id="{{$item->id}}"
                     @endforeach
                     id="product-{{$amazing->id}}">

                    <div class="c-super-deal__thumbnail-img">
                        @foreach (\App\Models\Product::where('id',$amazing->product_id)->
                    where('status_product',1)->get() as $item)
                            <img src="/storage/{{$item->img}}"
                                 alt="{{$item->title}}">
                        @endforeach
                    </div>
                    @foreach (\App\Models\Product::where('id',$amazing->product_id)->
         where('status_product',1)->get() as $item)
                        <div class="c-super-deal__thumbnail-text">
                            {{$item->title}}
                        </div>
                    @endforeach

                </div>
            @endforeach
            <div
                class="c-super-deal__thumbnail-select c-super-deal__thumbnail-select--amazing js-ga-amazing-selected-item js-thumbnail-select"
                style="left: 0px; top: 120px;"></div>
        </div>
    </div>
</div>
