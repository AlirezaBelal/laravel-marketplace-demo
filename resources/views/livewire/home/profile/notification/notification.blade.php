<section class="o-page__content">
    <div class="o-box">
        <div class="o-box__header o-box__header--two-sided">
            <div class="o-box__title">پیغام</div>
            @if(\App\Models\Notification::where('user_id',auth()->user()->id)->
           where('type','1')->first())
            <div>
                <div
                      wire:click="deleteAllNotification({{auth()->user()->id}})"
                    class="o-btn o-btn--link-blue-sm
                 js-remove-notification-modal-trigger" >پاک کردن همه</div>
            </div>
                @endif
        </div>
        @if(\App\Models\Notification::where('user_id',auth()->user()->id)->
            where('type','1')->first())
        <div class="c-profile-notification">
            @foreach(\App\Models\Notification::where('user_id',auth()->user()->id)->
            where('type','1')->get() as $notification)
                <a
                    href="/product/dkp-{{$notification->product_id}}/{{$notification->product->slug}}"
                    class="c-profile-notification__item ">
                    <div class="c-profile-notification__info-container">
                        <div class="c-profile-notification__title">
                            🔔
                          @if($notification->type == 1)
                                کالا موجود شد.
                            @endif
                        </div>
                        <div class="c-profile-notification__description">
                            {{$notification->product->title}}
                        </div>
                        <div class="c-profile-notification__date">
                            {{\App\Models\PersianNumber::translate(jdate($notification->updated_at)->format('%Y/%m/%d'))}}
                        </div>
                    </div>
                    <div class="c-profile-notification__img-container">
                        <img class="c-profile-notification__img"
                             src="/storage/{{$notification->product->img}}"
                             alt="Item Image"></div>
                </a>
            @endforeach
        </div>
            @endif
    </div>
</section>
