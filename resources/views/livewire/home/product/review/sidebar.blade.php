<div class="c-comments__side-bar">
    <div class="c-comments__side-rating-container">
        <div class="c-comments__side-rating">
            @php
                $one_rate_1 = \App\Models\Review::where('product_id',$product->id)->sum('keyfiat_sakht');
                $one_rate_2 = \App\Models\Review::where('product_id',$product->id)->sum('arzesh_kharid');
                $one_rate_3 = \App\Models\Review::where('product_id',$product->id)->sum('noavari');
                $one_rate_4 = \App\Models\Review::where('product_id',$product->id)->sum('emkanat');
                $one_rate_5 = \App\Models\Review::where('product_id',$product->id)->sum('sohoolate_estefade');
                $one_rate_6 = \App\Models\Review::where('product_id',$product->id)->sum('zaher');
                $one_rate_count = \App\Models\Review::where('product_id',$product->id)->count();
                $new_rate = $one_rate_1 +$one_rate_2 + $one_rate_3 + $one_rate_4 +$one_rate_5 +$one_rate_6;
            if($one_rate_count == 0){
                  $newc = 1;
            }else{
                  $newc = $new_rate/$one_rate_count;
            }


                $total_rate = $newc/6;
                $per = $total_rate *100/5;
            @endphp
            <div
                class="c-comments__side-rating-main">{{\App\Models\PersianNumber::translate(round($total_rate,1))}}</div>
            <div class="c-comments__side-rating-desc">از ۵</div>
        </div>
        <div class="c-comments__side-rating-bottom">
            <div class="c-stars">
                <span class="c-stars__item"></span>
                <span class="c-stars__item"></span>
                <span class="c-stars__item"></span>
                <span class="c-stars__item"></span>
                <span class="c-stars__item"></span>
                <div class="c-stars__selected" style="width: {{$per}}%">
                    <span class="c-stars__item"></span>
                    <span class="c-stars__item"></span>
                    <span class="c-stars__item"></span>
                    <span class="c-stars__item"></span>
                    <span class="c-stars__item"></span>
                </div>
            </div>


            <div class="c-comments__side-rating-all">
                از مجموع {{\App\Models\PersianNumber::translate($one_rate_count)}} امتیاز
            </div>
        </div>
    </div>
    @php
        if($one_rate_count == 0){
                      $one_rate_k = 1;
                }else{
                      $one_rate_k = $one_rate_1/$one_rate_count;
                }

            $one_rate_k_p = $one_rate_k *100/5;
    @endphp
    <ul class="c-content-expert__rating">
        <li>
            <div class="c-content-expert__rating-title">کیفیت ساخت</div>
            <div class="c-content-expert__rating-value">
                <div class="c-rating c-rating--general js-rating">
                    <div class="c-rating__rate js-rating-value"
                         data-rate-value="{{$one_rate_k_p}}%"
                         style="width: {{$one_rate_k_p}}%;"></div>
                </div>
                <span
                    class="c-rating__overall-word">{{\App\Models\PersianNumber::translate(round($one_rate_k,1))}}</span>
            </div>
        </li>
        <li>
            @php

     if($one_rate_count == 0){
                      $one_rate_k2 = 1;
                }else{
                      $one_rate_k2 = $one_rate_2/$one_rate_count;
                }
                $one_rate_k_p2 = $one_rate_k2 *100/5;
            @endphp
            <div class="c-content-expert__rating-title">ارزش خرید به
                نسبت
                قیمت
            </div>
            <div class="c-content-expert__rating-value">
                <div class="c-rating c-rating--general js-rating">
                    <div class="c-rating__rate js-rating-value"
                         data-rate-value="78%"
                         style="width: {{$one_rate_k_p2}}%;"></div>
                </div>
                <span class="c-rating__overall-word">
                                {{\App\Models\PersianNumber::translate(round($one_rate_k2,1))}}
                            </span>
            </div>
        </li>
        <li>
            @php

 if($one_rate_count == 0){
                      $one_rate_k3 = 1;
                }else{
                      $one_rate_k3 = $one_rate_3/$one_rate_count;
                }
                $one_rate_k_p3 = $one_rate_k3 *100/5;
            @endphp
            <div class="c-content-expert__rating-title">نوآوری</div>
            <div class="c-content-expert__rating-value">
                <div class="c-rating c-rating--general js-rating">
                    <div class="c-rating__rate js-rating-value"
                         data-rate-value="78%"
                         style="width: {{$one_rate_k_p3}}%;"></div>
                </div>
                <span class="c-rating__overall-word">
                                   {{\App\Models\PersianNumber::translate(round($one_rate_k3,1))}}
                            </span>
            </div>
        </li>
        <li>
            <div class="c-content-expert__rating-title">امکانات و قابلیت
                ها
            </div>
            @php
  if($one_rate_count == 0){
                      $one_rate_k4 = 1;
                }else{
                      $one_rate_k4 = $one_rate_4/$one_rate_count;
                }
                $one_rate_k_p4 = $one_rate_k4 *100/5;
            @endphp
            <div class="c-content-expert__rating-value">
                <div class="c-rating c-rating--general js-rating">
                    <div class="c-rating__rate js-rating-value"
                         data-rate-value="78%"
                         style="width: {{$one_rate_k_p4}}%;"></div>
                </div>
                <span class="c-rating__overall-word">
                                {{\App\Models\PersianNumber::translate(round($one_rate_k4,1))}}</span>
            </div>
        </li>
        <li>
            <div class="c-content-expert__rating-title">سهولت استفاده
            </div>
            @php

 if($one_rate_count == 0){
                      $one_rate_k5 = 1;
                }else{
                      $one_rate_k5 = $one_rate_5/$one_rate_count;
                }
                $one_rate_k_p5 = $one_rate_k5 *100/5;
            @endphp
            <div class="c-content-expert__rating-value">
                <div class="c-rating c-rating--general js-rating">
                    <div class="c-rating__rate js-rating-value"
                         data-rate-value="78%"
                         style="width: {{$one_rate_k_p5}}%;"></div>
                </div>
                <span class="c-rating__overall-word">
                       {{\App\Models\PersianNumber::translate(round($one_rate_k5,1))}}
                            </span>
            </div>
        </li>
        <li>
            <div class="c-content-expert__rating-title">طراحی و ظاهر
            </div>
            @php

 if($one_rate_count == 0){
                      $one_rate_k6 = 1;
                }else{
                      $one_rate_k6 = $one_rate_6/$one_rate_count;
                }

                $one_rate_k_p6 = $one_rate_k6 *100/5;
            @endphp
            <div class="c-content-expert__rating-value">
                <div class="c-rating c-rating--general js-rating">
                    <div class="c-rating__rate js-rating-value"
                         data-rate-value="80%"
                         style="width: {{ $one_rate_k_p6}}%;"></div>
                </div>
                <span class="c-rating__overall-word">
                                                 {{\App\Models\PersianNumber::translate(round($one_rate_k6,1))}}
                            </span>
            </div>
        </li>
    </ul>


    <div class="c-comments__add-comment-desc">دیدگاه خود را درباره این
        کالا
        بیان کنید
    </div>
    <a href="/product/comment/dkp-{{$product->id}}/{{$product->link}}" data-product-id="{{$product->id}}"
       class="o-btn o-btn--outlined-red-md o-btn--full-width js-add-new-comment">افزودن
        دیدگاه</a>
    <div class="c-comments__dc-touch">
        <div class="c-comments__dc-touch-title">۵ امتیاز دیجی‌کلاب</div>
        <div class="c-comments__dc-touch-desc">با بیان دیدگاه برای این
            کالا
            دریافت کنید
        </div>
    </div>
</div>
