@section('title')
    پروفایل -
    {{auth()->user()->name}}
@endsection
<section class="o-page__content">
    <div class="c-profile-navbar">
        <a href="/profile/orders-return/" class="c-profile-navbar__btn-back">بازگشت</a><h4>
            انتخاب کالاهای مرجوعی</h4>
    </div>
    <form class="c-profile-return c-profile-return__box return-select-items__container"
          wire:submit.prevent="ReturnedForm">
        <p
            class="return-select-items__header-desc">
            کالاهای مورد نظر خود برای مرجوعی در این مرسوله را انتخاب کنید. توجه کنید که کالاها، اقلام همراه و هدایای
            همراه باید در شرایط بسته بندی اولیه به همراه برچسب سریال کالا باشند.
        </p>
        @foreach($returnedPayments as $returnedPayment)
            <section>
                <div style="" class="c-profile-return__order-product return-select-items__item ">
                    <label
                        class="c-profile-return__select-item">
                        <input class="c-profile-return__select-item-origin js-select-order-item"
                               wire:model.defer="status" value="{{$returnedPayment->id}}"
{{--                               wire:click="newPrice('{{$returnedPayment->id}}')"--}}
                               data-price="644779"
                               type="checkbox" name="items[381183727][itemId]" value="{{$returnedPayment->id}}">
                        <span
                            class="c-profile-return__select-item-check"></span>
                    </label>
                    <div class="c-profile-return__order-product-image-container">
                        @php
                            $i =0;
                        @endphp
                        <div class="c-profile-return__order-product-counter">{{$i ++}}</div>
                        <a href="/product/dkp-{{$returnedPayment->order->product->id}}/{{$returnedPayment->order->product->link}}"
                           target="_blank">
                            <img class="c-profile-return__order-product-image"
                                 src="/storage/{{$returnedPayment->order->product->img}}"
                                 alt="{{$returnedPayment->order->product->title}}"></a></div>
                    <div class="c-profile-return__order-product-desc">
                        <div
                            class="c-profile-return__order-product-name">{{$returnedPayment->order->product->title}}</div>
                        <div class="c-profile-return__order-product-details"><span
                                class="c-profile-return__order-product-value return-select-items__seller return-select-items__attr">
                                {{$returnedPayment->order->vendor->name}}</span>
                        </div>
                        <div class="c-profile-return__order-product-subinfo return-select-items__price-wrapper">
                            <div class="c-profile-return__order-details-container return-select-items__price"><span
                                    class="c-profile-return__order-product-value">
               {{\App\Models\PersianNumber::translate(number_format( $returnedPayment->order->total_price))}}
                                        </span></div>
                        </div>
                    </div>
                </div>
                <div class="c-profile-return__divider c-profile-return__divider--form"></div>
            </section>
        @endforeach
        <div class="return-select-items__actions">
            <div>
                <button type="submit"
                        class="o-btn o-btn--contained-red-lg return-select-items__submit-btn js-submit-items">تایید
                </button>
                <a href="/profile/my-orders/{{$order_number}}/"
                   class="o-btn o-btn--outlined-gray-lg return-select-items__cancel-btn">
                    انصراف
                </a></div>
            <div class="return-select-items__total-price-wrapper">
                مبلغ کالاهای انتخاب شده برای مرجوعی
                <span class="return-select-items__total-price js-return-select-items__total-price">
                    {{\App\Models\PersianNumber::translate(number_format($this->newPrice))}} </span>
            </div>
        </div>
    </form>
</section>

