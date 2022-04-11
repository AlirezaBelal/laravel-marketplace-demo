<?php

namespace App\Http\Livewire\Home\SubCategory;

use App\Models\Category;
use App\Models\CategoryLevel;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
//        $category_name = request()->path();
        $category_name = Request::segment(2);

        $category = SubCategory::where('link', '/' . $category_name . '/')->first();
        $first_category = Category::where('id', $category->parent)->first();
        $category_tag_latest = ChildCategory::where('parent', $category->id)->where('status', 1)->get()->last();
        $category_tags = ChildCategory::where('parent', $category->id)->where('status', 1)->get();
        $product_random = Product::where('subcategory_id', $category->id)->inRandomOrder()->get();
        $products = Product::where('subcategory_id', $category->id)->get();
        $products_paginate = Product::where('subcategory_id', $category->id)->paginate();
        $product_count = Product::where('subcategory_id', $category->id)->count();

        $categories = CategoryLevel::where('subCategory_id', $category->id)->where('property', 1)->get();
        $brands = \App\Models\Brand::where('parent', $first_category->id)->get();


        return view('livewire.home.sub-category.index',
            compact('categories', 'category_tags', 'category_tag_latest', 'product_random'
                , 'first_category', 'category', 'product_count', 'products', 'products_paginate'
            ,'brands')
        )->layout('layouts.home');
    }
}
