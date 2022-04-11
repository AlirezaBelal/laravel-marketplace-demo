<div class="c-checkout-address__content js-ui-tab-content"
     data-tab-content-id="userAddresses">
    <div class="c-checkout-address__content">
        @foreach($addresses as $address)
            <div class="c-checkout-address__item    js-recipient-box js-user-address-container js-address-box "
                 data-id="{{$address->id}}" data-event="change_address"
                 data-event-category="funnel"

                 wire:click="checkout_address({{$address->id}})">
                <div class="c-checkout-address__item-headline">
                    <label class="c-outline-radio">

                        @if ($order_last->address_id == $address->id )
                            <input type="radio" name="address" >
                        @else
                            <input type="radio" name="address">
                        @endif

                        <span class="c-outline-radio__check"></span>
                    </label>
                    به این آدرس ارسال می‌شود
                </div>
                <ul class="c-checkout-address__item-content">
                    <li class="c-checkout-address__item-address">
                        {{\App\Models\PersianNumber::translate($address->state)}}
                        ،
                        {{\App\Models\PersianNumber::translate($address->city)}}
                        ،
                        {{\App\Models\PersianNumber::translate($address->address)}}
                        ،
                        پلاک
                        {{\App\Models\PersianNumber::translate($address->bld_num)}}
                        ،
                        واحد
                        {{\App\Models\PersianNumber::translate($address->vahed)}}
                    </li>
                    <li class="c-checkout-address__item-detail c-checkout-address__item-detail--postal-code">
                        {{\App\Models\PersianNumber::translate($address->code_posti)}}
                    </li>
                    <li class="c-checkout-address__item-detail c-checkout-address__item-detail--phone">
                        {{\App\Models\PersianNumber::translate($address->mobile)}}
                    </li>
                    <li class="c-checkout-address__item-detail c-checkout-address__item-detail--username">
                        {{$address->name}} {{$address->lname}}
                    </li>
                </ul>
{{--                <div class="c-checkout-address__actions">--}}
{{--                    <form action="{{route('address.shipping.delete',$address->id)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                    <button type="submit" class="o-btn o-btn--link-blue-sm">حذف--}}
{{--                    </button>--}}
{{--                    </form>--}}
{{--                    <button class="o-btn o-btn--link-blue-sm js-edit-address-btn"--}}
{{--                            data-event="edit_address" data-event-category="funnel"--}}
{{--                            data-event-label="addresses: 3, position: list of addresses"--}}
{{--                            data-id="44140919">ویرایش--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>
        @endforeach
        <button type="button"
                class="o-btn c-checkout-address__item c-checkout-address__item--new js-add-address-btn"><span
                class="c-checkout-address__add-btn">
                        ایجاد آدرس جدید
                    </span>
        </button>
    </div>
</div>
