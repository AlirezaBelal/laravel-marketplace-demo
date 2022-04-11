@section('title','آپدیت منو')
<div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش منو -
            {{$menu->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-8">
                <form wire:submit.prevent="categoryForm"
                      enctype="multipart/form-data" role="form"
                      class="padding-10 categoryForm">

                    @include('errors.error')
                    <div class="form-group">
                        <select wire:model.lazy="menu.category_id" name="category_id" id="" class="form-control">
                            <option value="-1" >- دسته منو -</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="menu.subCategory_id" name="subCategory_id" id="" class="form-control">
                            <option value="-1" >- زیردسته منو -</option>
                            @foreach(\App\Models\SubCategory::where('parent',$this->menu->category_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model.lazy="menu.childCategory_id" name="childCategory_id" id="" class="form-control">
                            <option value=" ">- دسته کودک منو -</option>
                            @foreach(\App\Models\ChildCategory::where('parent',$this->menu->subCategory_id)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="notificationGroup">
                            <input id="option4" type="checkbox" wire:model.lazy="menu.status" name="status"
                                   class="form-control">
                            <label for="option4">نمایش در منو اصلی:</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-brand">آپدیت دسته</button>
                </form>
            </div>
        </div>
    </div>
</div>
