<div class="c-question__side-bar">
    <div class="c-question__filter">
        <label class="o-form__check-box">
            <input class="o-form__check-box-input js-answered-questions js-question-filter"
                   name="answered_questions" value="1" type="checkbox">
            <span class="o-form__check-box-sign"></span>
            <span class="js-ui-checkbox-label">
            پرسش‌های پاسخ داده شده
        </span>
        </label>

        <label class="o-form__check-box">
            <input class="o-form__check-box-input js-unanswered-questions js-question-filter"
                   name="unanswered_questions" value="1" type="checkbox">
            <span class="o-form__check-box-sign"></span>
            <span class="js-ui-checkbox-label">
            پرسش‌های بی‌پاسخ
        </span>
        </label>

        <div class="c-question__filter-bottom">
            <label class="c-ui-new-switch">
                <input class="u-hidden js-question-filter js-my-questions" name="user_questions"
                       type="checkbox">
                <span class="c-ui-new-switch__slider">
            <span class="c-ui-new-switch__slider__toggle"></span>
        </span>
            </label> پرسش‌های من

        </div>
    </div>
    <div class="c-question__side-bar-action-text">پرسش خود را درباره این کالا بیان کنید</div>
    <button type="button" data-product-id="" onclick="addque()"
            class="o-btn o-btn--outlined-red-md o-btn--full-width js-add-question">ثبت پرسش
    </button>


</div>
