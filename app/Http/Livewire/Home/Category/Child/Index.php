<?php

namespace App\Http\Livewire\Home\Category\Child;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $category_name = request()->path();

        $category = Category::where('link', '/'.$category_name.'/')->first();

        $sliders = DB::connection('mysql-child')->table('category_child_slider')
            ->where('status', 1)->get();
        $amazings = DB::connection('mysql-child')->table('category_child_amazing')
            ->get();
        $banners = DB::connection('mysql-child')->table('category_child_banner')->
        where('type', 0)->take(4)->get();
        $bigbanners = DB::connection('mysql-child')->table('category_child_banner')->
        where('type', 1)->take(2)->get();
        $bigbanners2 = DB::connection('mysql-child')->table('category_child_banner')->
        where('type', 1)->skip(2)->take(2)->get();
        $title_count = DB::connection('mysql-child')->table('category_child_title_swiper')->
        get();
        $products = DB::connection('mysql-child')->table('category_child_product_swiper')->
        where('status', 1)->get();
        $brands = DB::connection('mysql-child')->table('category_child_brand')->get();

        return view('livewire.home.category.child.index', compact('category', 'sliders', 'amazings', 'banners',
            'bigbanners', 'bigbanners2', 'title_count', 'products', 'brands'))->layout('layouts.home');
    }
}
