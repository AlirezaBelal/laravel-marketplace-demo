<div class="c-comments__content-section">
    @php
        $one_rate_c = \App\Models\Review::where('product_id',$product->id)->where('ok_buy' ,1)->count();

    @endphp
    @if ($one_rate_c > 2)


        <div class="c-product__guaranteed c-product__guaranteed--lg">

                        <span>
                            بیش از
                            {{\App\Models\PersianNumber::translate($one_rate_c)}}
                            نفر از خریداران این محصول را پیشنهاد داده‌اند
                        </span>
        </div>
    @endif
    {{--    <div class="c-comments__uploaded-bar">--}}
    {{--        <div--}}
    {{--            class="c-product__uploaded-container c-product__uploaded-container--ugc-list">--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/72ed56bb5095a10582e936fcc78f4082542a9024_1596822476.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="0" data-comment-id="10818481">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/72ed56bb5095a10582e936fcc78f4082542a9024_1596822476.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/759a019be5cd2c872110a5c38b768510f97750b4_1596822490.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="1" data-comment-id="10818481">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/759a019be5cd2c872110a5c38b768510f97750b4_1596822490.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/e7ec8fe702bd4e39d2790434d158aac3f96a0e57_1596822502.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="2" data-comment-id="10818481">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/e7ec8fe702bd4e39d2790434d158aac3f96a0e57_1596822502.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/24a2a86197db83cb305c8deeef09f45f3456e8d2_1596822505.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="3" data-comment-id="10818481">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/24a2a86197db83cb305c8deeef09f45f3456e8d2_1596822505.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/5f51fc286d979dcf5d6c9cb2b02ac6870c79792a_1596822505.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="4" data-comment-id="10818481">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/5f51fc286d979dcf5d6c9cb2b02ac6870c79792a_1596822505.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/ba8e882825fd3b944aad14529f65cfef30a5e3a5_1597216171.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="0" data-comment-id="10944464">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/ba8e882825fd3b944aad14529f65cfef30a5e3a5_1597216171.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="c-product__uploaded-thumb  js-uploaded-thumbnail"--}}
    {{--                data-src="https://dkstatics-public.digikala.com/digikala-comment-files/d77356b87c667eb6f8bffd72a96bb4b6b789701d_1598012181.jpg?x-oss-process=image/resize,m_lfit,h_1024,w_1024/quality,q_80"--}}
    {{--                data-index="0" data-comment-id="11213230">--}}
    {{--                <img--}}
    {{--                    src="https://dkstatics-public.digikala.com/digikala-comment-files/d77356b87c667eb6f8bffd72a96bb4b6b789701d_1598012181.jpg?x-oss-process=image/resize,m_lfit,h_240,w_240/quality,q_80"--}}
    {{--                    alt="">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div--}}
    {{--            class="o-btn o-btn--link-blue-sm o-btn--remove-padding o-btn--l-chevron js-comment-see-more-imgs">--}}
    {{--            مشاهده همه ۱۸۷ تصویر کاربران--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="c-sort-row">


        <i class="c-icon-font c-icon-font--large  js-icon-font"
           data-icon="Icon-Action-Sort"
           data-icon-active="Icon-Action-Sort"
           data-icon-deactive=""></i>

        <span
            class="c-sort-row__text">مرتب‌سازی دیدگاه‌ها بر اساس:</span>
        <ul class="c-sort-row__items js-filter-items">
            <li class="c-sort-row__item">
                <a href="#" class="c-sort-row__label is-active"
                   data-sort-mode="newest_comment">
                    جدیدترین دیدگاه‌ها
                </a>
            </li>
            <li class="c-sort-row__item">
                <a href="#" class="c-sort-row__label "
                   data-sort-mode="most_liked">
                    مفیدترین دیدگاه‌ها
                </a>
            </li>
            <li class="c-sort-row__item">
                <a href="#" class="c-sort-row__label "
                   data-sort-mode="buyers">
                    دیدگاه خریداران
                </a>
            </li>
        </ul>
    </div>

    <div id="product-comment-list">

        <div class="c-comments__list">

            @foreach(\App\Models\Review::where('product_id',$product->id)->where('status' ,1)->
where('parent',0)->get() as $review)
                <div class="c-comments__item c-comments__item--pdp">
                    <div class="c-comments__row">
                        <span class="c-comments__title">{{$review->review_title}}</span>
                    </div>
                    <div class="c-comments__row">
                        <span class="c-comments__detail">
                        {{\App\Models\PersianNumber::translate(jdate($review->created_at)->format(' %d %B %Y'))}}
                        </span>
                        <span class="c-comments__detail">کاربر دیجی‌کالا</span>
                    </div>
                    <div class="c-comments__separator c-comments__separator--half"></div>
                    <div class="c-comments__row">
                    </div>
                    <div class="c-comments__row c-comments__row--grow c-comments__row--comment">
                        <div class="c-comments__content">
                            {!! $review->review !!}
                        </div>
                        <div class="c-comments__separator c-comments__separator--half"></div>
                        <div class="c-comments__modal-evaluation">
                            <div class="c-comments__modal-evaluation-item c-comments__modal-evaluation-item--positive">
                                {{$review->plus_rate}}
                            </div>

                            <div class="c-comments__modal-evaluation-item c-comments__modal-evaluation-item--negative">
                                {{$review->plus_min}}
                            </div>
                        </div>
                    </div>
                    <div class="c-comments__separator c-comments__separator--half"></div>

                    @php
                        $one_rate_review_like = \App\Models\Review::where('product_id',$product->id)->
where('id',$review->id)->sum('liked');
                        $one_rate_review_dislike = \App\Models\Review::where('product_id',$product->id)->where('id',$review->id)->sum('dislike');

                    @endphp
                    <div class="c-comments__row">
                        <div class="c-comments__helpful">
                            <div class="c-comments__helpful-question">آیا این دیدگاه برایتان مفید بود؟</div>
                            <div class="c-comments__helpful-items js-comment-like-container is-modal">
                                <div wire:click="likeReview({{$review->id}})" class="c-comments__helpful-yes  js-comment-like" data-comment="30687876">
                                    {{\App\Models\PersianNumber::translate($one_rate_review_like)}}
                                </div>
                                <div wire:click="dislikeReview({{$review->id}})" class="c-comments__dislike u-ml-20  js-comment-dislike" data-comment="30687876">
                                    {{\App\Models\PersianNumber::translate($one_rate_review_dislike)}}
                                </div>

                                <div wire:click="reportReview({{$review->id}})" class="c-comments__helpful-no  js-comment-report" data-comment="30687876"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>


    </div>
</div>
