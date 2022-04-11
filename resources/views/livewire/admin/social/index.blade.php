@section('title','شبکه های اجتماعی')
<div>
    <div class="main-content" wire:init="loadCategory">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/social">شبکه های اجتماعی
                </a>

                |
                <a class="tab__item">جستجو: </a>

                <a class="t-header-search">
                    <form action="" onclick="event.preventDefault();">
                        <input wire:model.debounce.1000="search"
                               type="text" class="text" placeholder="جستجوی شبکه اجتماعی ...">
                    </form>
                </a>

            </div>
        </div>
        <div class="row">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>آیدی</th>
                            <th>آیکون شبکه اجتماعی</th>
                            <th>عنوان شبکه اجتماعی</th>
                            <th>لینک شبکه اجتماعی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        @if($readyToLoad)
                            <tbody>
                            @foreach($socials as $social)
                                <tr role="row">
                                    <td><a href="">{{$social->id}}</a></td>
                                    <td>
                                        <a href="{{$social->link}}"
                                           class="c-footer__social-link c-footer__social-link--{{$social->icon}}" target="_blank"></a>
                                    </td>
                                    <td><a href="">{{$social->title}}</a></td>
                                    <td><a target="_blank" href="{{$social->link}}">{{$social->link}}</a></td>

                                    <td>
                                        <a wire:click="deleteCategory({{$social->id}})" type="submit"
                                           class="item-delete mlg-15" title="حذف"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$socials->render()}}
                        @else



                            <div class="alert-warning alert">
                                در حال خواندن اطلاعات از دیتابیس ...
                            </div>


                        @endif


                    </table>
                </div>


            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد شبکه اجتماعی جدید</p>
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')


                    <div class="form-group">
                        <input type="text" wire:model.lazy="social.icon" placeholder="آیکون شبکه اجتماعی "
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="social.title" placeholder="عنوان شبکه اجتماعی "
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" wire:model.lazy="social.link" placeholder="لینک شبکه اجتماعی "
                               class="form-control">
                    </div>



                    <button class="btn btn-brand">افزودن شبکه اجتماعی</button>
                </form>
            </div>
        </div>


    </div>

</div>
