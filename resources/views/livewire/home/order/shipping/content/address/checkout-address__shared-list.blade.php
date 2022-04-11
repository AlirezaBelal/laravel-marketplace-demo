<div class="js-ui-tab-content u-hidden" data-tab-content-id="dropOff">
    <div class="c-checkout-address__shared-list"><p
            class="o-hint o-hint--medium o-hint--text o-hint--neutral">
            با انتخاب آدرس مرکز تحویل، تا ۲ روز پس از ارسال کالا مهلت دارید
            تا با مراجعه به آدرس انتخاب شده، کالای خود را دریافت نمایید.
        </p>
        <div
            class="c-checkout-address__content c-checkout-address__content--shared">
            @foreach(\App\Models\ReceiptCenter::where('status',1)->get() as $rec)
                <div wire:click="anbaradd({{$rec->id}})"
                    class="c-checkout-address__item js-recipient-box js-user-address-container js-address-box js-dropoff-return"
                    data-id="5" data-is-shared="true">
                    <div class="c-checkout-address__item-headline">
                        <label
                            class="c-outline-radio">

                            @if ($order_last->anbar_id == $rec->id )
                                <input type="radio" wire:click="anbaradd({{$rec->id}})" checked="checked"
                                       name="address">
                            @else
                                <input type="radio" name="address">
                            @endif
                            <span
                                class="c-outline-radio__check"></span>
                        </label>
                        ارسال به این آدرس
                    </div>
                    <ul class="c-checkout-address__item-content">
                        <li class="c-checkout-address__item-address">
                            {{$rec->address}}
                        </li>
                        <li class="c-checkout-address__item-detail c-checkout-address__item-detail--username">
                            {{auth()->user()->name}}
                        </li>
                    </ul>
                    <div class="c-checkout-address__actions"></div>
                </div>
            @endforeach
        </div>
    </div>
</div>
