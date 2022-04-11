@section('title','آپدیت سفارش')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش سفارش -
            {{$order->order_number}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <select wire:model.lazy="order.status" name="status" id="" class="form-control">
                                <option value="wait">در انتظار پرداخت</option>
                                <option value="delivered">تحویل داده شده</option>
                                <option value="returned">مرجوعی</option>
                                <option value="paid">پرداخت شده</option>
                                <option value="progress">در حال آماده سازی سفارش</option>
                                <option value="sended">در حال ارسال سفارش</option>
                                <option value="cancel">لغو شده</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-brand">آپدیت سفارش</button>
                </form>
            </div>
        </div>
    </div>
</div>
