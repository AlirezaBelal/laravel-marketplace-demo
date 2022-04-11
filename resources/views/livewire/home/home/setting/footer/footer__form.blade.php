@include('errors.error')
<form id="SubscribeNewsletter" class="c-form-newsletter" action="{{route('post.newsletter')}}" method="post" >
    @csrf
    <fieldset>
        @php
            $footer_title = \App\Models\FooterTitle::get()[3];
        @endphp
        <legend class="c-form-newsletter__title">
            {{$footer_title->title}}
        </legend>
        <div class="c-form-newsletter__row">
            <input
                class="c-ui-input__field c-ui-input__field--right-placeholder" type="text"
                name="email"
                placeholder="آدرس ایمیل خود را وارد کنید"/>
            <button type="submit" class="btn-secondary"
                    id="btnSubmitNewsletterSubscription"
                    data-snt-event="dkFooterClick"
                    data-snt-params='{"item":"send-email","item_option":null}'
                    data-event="newsletter_subscription"
                    data-event-category="footer_section"
                    data-event-label="logged_in: False - current-page: /">
                ارسال
            </button>
        </div>
    </fieldset>
</form>
