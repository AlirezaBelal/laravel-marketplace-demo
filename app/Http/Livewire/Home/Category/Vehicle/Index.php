<?php

namespace App\Http\Livewire\Home\Category\Vehicle;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $category_name = request()->path();

        $category = Category::where('link', '/'.$category_name.'/')->first();

        $sliders = DB::connection('mysql-vehicle')->table('category_vehicle_slider')
            ->where('status', 1)->get();
        $amazings = DB::connection('mysql-vehicle')->table('category_vehicle_amazing')
            ->get();
        $banners = DB::connection('mysql-vehicle')->table('category_vehicle_banner')->
        where('type', 0)->take(3)->get();
        $bigbanners = DB::connection('mysql-vehicle')->table('category_vehicle_banner')->
        where('type', 0)->skip(3)->take(3)->get();
        $bigbanners2 = DB::connection('mysql-vehicle')->table('category_vehicle_banner')->
        where('type', 0)->skip(6)->take(3)->get();
        $title_count = DB::connection('mysql-vehicle')->table('category_vehicle_title_swiper')->
        get();
        $products = DB::connection('mysql-vehicle')->table('category_vehicle_product_swiper')->
        where('status', 1)->get();

        return view('livewire.home.category.vehicle.index',
            compact('category', 'sliders', 'amazings', 'banners',
                'bigbanners', 'bigbanners2', 'title_count', 'products'))->layout('layouts.home');
    }
}
