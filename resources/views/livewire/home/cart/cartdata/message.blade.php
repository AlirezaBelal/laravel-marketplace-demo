
@if ($cart_read_cart)
@if ($cart_read_cart->view < 1)
<div class="c-message-light-small c-message-light-small--info c-message-light-small--cart">
    <h6>توجه : قیمت یا موجودی
        بعضی از کالاهای سبد خرید شما تغییر کرده است:</h6>

    <ul>
        @foreach($carts as $cart)
            @if ($cart->product_price_discount_old != null || $cart->price_old != null)
                @if ($cart->read_cart == 0)
                    <li>قیمت
                        {{\App\Models\PersianNumber::translate($cart->product->title)}}
                        @if ($cart->product_color != null)
                            رنگ
                            {{$cart->color->name}}
                        @endif
                        به
                        {{\App\Models\PersianNumber::translate(number_format($cart->product_price_discount))}}
                        تومان تغییر کرده
                        است.
                    </li>
                @endif

                @endif

                @endforeach
    </ul>
</div>
@endif
@endif
