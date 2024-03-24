<div class="c-question__content">
    <div class="c-sort-row">


        <i class="c-icon-font c-icon-font--large  js-icon-font" data-icon="Icon-Action-Sort"
           data-icon-active="Icon-Action-Sort" data-icon-deactive=""></i>

        <span class="c-sort-row__text">مرتب‌سازی پرسش‌ها بر اساس:</span>
        <ul class="c-sort-row__items js-filter-items">
            <li class="c-sort-row__item">
                <a href="#" class="c-sort-row__label is-active" data-sort-mode="newest">
                    جدیدترین پرسش‌ها
                </a>
            </li>
            <li class="c-sort-row__item">
                <a href="#" class="c-sort-row__label " data-sort-mode="most_answers">
                    مفیدترین پاسخ‌ها
                </a>
            </li>
        </ul>
    </div>
    <div id="product-questions-list">
        <div class="c-question__list">
            @foreach($comments as $comment)
                <div class="c-question__item js-question-container ">
                    <div class="c-question__item-title">
                        {{$comment->comment}}
                    </div>
                    @if (\App\Models\Comment::where('parent',$comment->id)->count()>0)
                        @foreach(\App\Models\Comment::where('status', 1)->
          where('product_id', $product->id)->where('parent', $comment->id)->
          latest()->get() as $comm)
                            <div class="c-question__reply js-answer ">
                                <div class="c-question__reply-body">
                                    {{$comm->comment}}
                                </div>
                                <div class="c-question__reply-bar">
                                    <div>
                        <span class="c-question__reply-name">
                                                                      <span>{{$comm->user->name}}</span>

                        </span>

                                        @if (\App\Models\Order::where('product_id',$comm->product_id)
->where('user_id',$comm->user_id)->where('payment',1)->first())
                                            <span class="c-comments__buyer-badge">خریدار</span>
                                        @endif

                                    </div>
                                    <div class="c-question__feed-back js-answer-like-container">
                                        <div class="c-question__feed-back-desc">آیا این پاسخ برای شما مفید بود؟</div>
                                        <div wire:click="likequestion({{$comm->id}})"
                                             class="o-btn c-question__feed-back-btn c-question__feed-back-btn--positive js-answer-like">
                                            {{\App\Models\PersianNumber::translate(\App\Models\Rate::where('comment_id',$comm->id)
                ->where('product_id',$comm->product_id)->count())}}
                                        </div>

                                        <div wire:click="reportquestion({{$comm->id}})"
                                             class="o-btn c-question__feed-back-btn c-question__feed-back-btn--negative js-answer-dislike"
                                             data-counter="۰" data-answer="1384371"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if (\App\Models\Comment::where('parent',$comment->id)->count()>1)
                        <div class="c-question__reply js-answer u-hidden">
                            <div class="c-question__reply-body">
                                کلگی 15 وات و ویتنام هست مال من. هندزفری هم نداشت.
                            </div>
                            <div class="c-question__reply-bar">
                                <div>
                        <span class="c-question__reply-name">
                                                                      <span>حسین لطفعلی</span>

                        </span>
                                </div>
                                <div class="c-question__feed-back js-answer-like-container">
                                    <div class="c-question__feed-back-desc">آیا این پاسخ برای شما مفید بود؟</div>
                                    <div
                                        class="o-btn c-question__feed-back-btn c-question__feed-back-btn--positive js-answer-like"
                                        data-counter="۱" data-answer="1338649">۱
                                    </div>
                                    <div
                                        class="o-btn c-question__feed-back-btn c-question__feed-back-btn--negative js-answer-dislike"
                                        data-counter="۰" data-answer="1338649"></div>
                                </div>
                            </div>
                        </div>
                        <div class="c-question__item-action  js-question-actions">
                            <div
                                class="o-btn o-btn--link-blue-sm o-btn--l-expand-more o-btn--remove-padding js-show-more-answers"
                                data-question-id="{{$comment->id}}">مشاهده پاسخ‌های دیگر
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
        <div class="c-pager" id="question-pagination">
            {{--            {{$comments->links()}}--}}
        </div>
    </div>
    <form class="c-question__reply-form js-answer-form js-answer-form-template u-hidden">

        <label class="o-form__field-container">
            <div class="o-form__field-label">به این پرسش پاسخ دهید*</div>
            <div class="o-form__field-frame">
            <textarea name="answer[body]" placeholder=""
                      class="o-form__textarea js-input-textarea js-answer-body js-ui-char-counter" maxlength="100">
            </textarea>
            </div>
            <div class="o-form__field-counter">
                <span class="js-ui-counter-value">۰</span>
                /۱۰۰
            </div>
        </label>

        <div class="c-question__empty-bar">
            <div class="c-question__terms">ثبت پرسش به معنی موافقت با <a href="/page/comments-rules/"
                                                                         class="o-link o-link--sm o-link--no-border">قوانین
                    انتشار دیجی‌کالا</a> است.
            </div>
            <div>
                <button type="button" class="o-btn o-btn--outlined-red-md js-cancel-add-answer">انصراف</button>
                <button type="submit" class="o-btn o-btn--contained-red-md js-add-answer-submit disabled">ثبت پاسخ
                </button>
            </div>
        </div>
    </form>
    <div class="remodal c-modal c-question__modal js-add-question-modal" data-remodal-id="add-question" role="dialog"
         aria-labelledby="modalTitle" tabindex="-1z" aria-describedby="modalDesc" data-remodal-options="">
        <div class="c-modal__top-bar  ">
            <div class="c-modal__title ">پرسش خود را در مورد کالا مطرح کنید</div>
            <div class="c-modal__close" data-remodal-action="close"></div>
        </div>
        <form class="js-add-question-form" novalidate="novalidate">

            <label class="o-form__field-container">
                <div class="o-form__field-frame">
            <textarea name="qa[body]" placeholder=""
                      class="o-form__textarea js-input-textarea js-question-body js-ui-char-counter" maxlength="100">
            </textarea>
                </div>
                <div class="o-form__field-counter">
                    <span class="js-ui-counter-value">۰</span>
                    /۱۰۰
                </div>
            </label>

            <div class="c-question__modal-actions">
                <div class="c-question__modal-action-desc">
                    ثبت پرسش به معنی موافقت با
                    <a href="/page/comments-rules/" target="_blank" class="o-link o-link--no-border o-link--sm">قوانین
                        انتشار دیجی‌کالا</a> است.
                </div>
                <button type="submit" class="o-btn o-btn--contained-red-md js-add-question-submit disabled">ثبت پرسش
                </button>
            </div>
        </form>
    </div>
</div>
