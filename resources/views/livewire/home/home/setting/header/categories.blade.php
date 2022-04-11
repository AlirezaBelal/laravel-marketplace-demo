<li class="c-navi-new-list__a-hover js-navi-new-list-category-hover">
    <div></div>
</li>

<li class="js-categories-bar-item js-mega-menu-main-item c-navi-new-list__category-container-main">
    @php
        $header_8 = \App\Models\SiteHeader::get()[7];
    @endphp
    <div class="c-navi-new-list__category c-navi-new-list__category--main menut" >
        {{$header_8->title}}
    </div>
    <style>
        .menut:hover .menud{
            display: flex !important;
        }
    </style>
    <div class="c-navi-new-list__sublist js-mega-menu-categories-options c-navi-new__ads-holder menud" style="display: none">
        @include('livewire.home.home.setting.header.category.category')
        @include('livewire.home.home.setting.header.category.subcategory')
        @include('livewire.home.home.setting.header.category.banner')
    </div>
</li>
{{--<script>--}}
{{--    function categoryOption2() {--}}
{{--        document.getElementById("category_option2").style = "display : block !important";--}}
{{--    }--}}
{{--</script>--}}
