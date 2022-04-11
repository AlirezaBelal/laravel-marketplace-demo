@section('title','ایمیل ها')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/email">ایمیل
                    ها</a>


                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی ایمیل ...">
                    </form>
                </a>


            </div>
        </div>
        <div class="row">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table table-bordered">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی</th>
                            <th>نام دریافت کننده</th>
                            <th>ایمیل دریافت کننده</th>
                            <th>موبایل دریافت کننده</th>
                            <th>عنوان</th>
                            <th>متن</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($emails as $email)
                                <tr role="row">
                                    <td><a href="">{{$email->id}}</a></td>

                                    <td><a href="">{{$email->user_name}}</a></td>
                                    <td><a href="">{{$email->user_email}}</a></td>
                                    <td><a href="">{{$email->user_mobile}}</a></td>
                                    <td><a href="">{{$email->title}}</a></td>
                                    <td><a href="">{{$email->text}}</a></td>



                                </tr>
                            @endforeach

                            </tbody>
                            {{$emails->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>

        </div>


    </div>


</div>
