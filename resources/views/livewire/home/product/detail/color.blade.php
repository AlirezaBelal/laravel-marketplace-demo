<div class="c-product__circle-variants">
    @if($product->publish_product == 1)
        <div class="c-product__circle-variants__title">
            <header>رنگ :</header>

            <span class="js-color-title">{{$this->color ?? $productSeller_min_price_first->color->name}}</span>


        </div>

        <ul class="js-product-variants">
            @foreach($productSeller as $seller)

                <li class="js-c-ui-variant c-circle-variant__item"
                    data-event="config_change" data-event-category="product_page"
                    data-event-label="change: color"><label
                        class="js-circle-variant-color c-circle-variant c-circle-variant--color"
                        data-code="{{$seller->color->value}}">
                        <input type="radio" value="2" name="color"
                               id="variant"
                               wire:click="changeProductDetail({{$seller->id}})"
                               wire:change="changeColor({{$seller->color->id}})"
                               class="js-variant-selector js-color-filter-item"
                               checked="" data-title="{{$seller->color->name}}"
                               data-type="color"><span
                            class="c-circle-variant__border"></span>
                        <span
                            wire:click="changeProductDetail({{$seller->id}})"
                            class="c-tooltip c-tooltip--small-bottom c-tooltip--short">{{$seller->color->name}}</span>
                        <span
                            class="c-circle-variant__shape"
                            style="background-color: {{$seller->color->value}}">

                        </span>
                    </label>
                </li>
            @endforeach

        </ul>
    @endif
</div>
