<?php

namespace App\Http\Livewire\Home\SubCategory;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryLevel;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;

class Index extends Component
{
    public $selected = [
        'brands' => [],
        'status' => [],
        'original' => [],
        'min_price' => [],
        'max_price' => [],
    ];

    public $category;

    public $search;

    public function mount($category)
    {

        $subCategory = SubCategory::where('link', '/' . $category . '/')->first();

        $product = Product::where('subcategory_id', $subCategory->id)->get();

    }

    public function brandSetToProduct($id)
    {
        $brand = Brand::find($id);
        dd($brand);
    }

    public function priceform()
    {

    }

    public function render()
    {

        $subCategory = SubCategory::where('link', '/' . $this->category . '/')->first();
        $first_category = Category::where('id', $subCategory->parent)->first();
        $category_tag_latest = ChildCategory::where('parent', $subCategory->id)->where('status', 1)->get()->last();
        $category_tags = ChildCategory::where('parent', $subCategory->id)->where('status', 1)->get();
        $product_random = Product::where('subcategory_id', $subCategory->id)->inRandomOrder()->get();
        $products = Product::where('subcategory_id', $subCategory->id)->get();


        if (!empty($this->search) || $this->selected['brands'] || $this->selected['status'] ||
            $this->selected['original'] || $this->selected['min_price'] || $this->selected['max_price']) {


            if ($this->selected['brands']) {
                foreach ($this->selected['brands'] as $key => $value) {
                    $products = Product::where('subcategory_id', $subCategory->id)->
                    where('title', 'LIKE', '%' . $this->search . '%')
                        ->where('brand_id', $value)
                        ->get();
                }


            } elseif ($this->selected['status']) {
                $products = Product::where('subcategory_id', $subCategory->id)->
                where('title', 'LIKE', '%' . $this->search . '%')
                    ->where('status_product', 1)
                    ->get();
            } elseif ($this->selected['original']) {
                $products = Product::where('subcategory_id', $subCategory->id)->
                where('title', 'LIKE', '%' . $this->search . '%')
                    ->where('original', 1)
                    ->get();
            } elseif ($this->selected['min_price'] && $this->selected['max_price']) {

                $products = Product::where('subcategory_id', $subCategory->id)
                    ->where('price', '>=', $this->selected['min_price'])
                    ->where('price', '<', $this->selected['max_price'])
                    ->get();
            } elseif ($this->selected['min_price']) {

                $products = Product::where('subcategory_id', $subCategory->id)
                    ->where('price', '>=', $this->selected['min_price'])
                    ->get();

            } elseif ($this->selected['max_price']) {
                $products = Product::where('subcategory_id', $subCategory->id)
                    ->where('price', '<=', $this->selected['max_price'])
                    ->get();
            } else {
                $products = Product::where('subcategory_id', $subCategory->id)->
                where('title', 'LIKE', '%' . $this->search . '%')
                    ->get();

            }

//                $products = $products->where('title', 'LIKE', '%' . $value . '%');

        }


//            $products->orderBy('created_at','desc');
//        $products = Product::where('subcategory_id', $category->id)->get();


        $products_paginate = Product::where('subcategory_id', $subCategory->id)->paginate();
        $product_count = Product::where('subcategory_id', $subCategory->id)->count();

        $categories = CategoryLevel::where('subCategory_id', $subCategory->id)->where('property', 1)->get();
        $brands = \App\Models\Brand::where('parent', $first_category->id)->get();

        return view('livewire.home.sub-category.index',
            compact('categories', 'category_tags', 'category_tag_latest', 'product_random'
                , 'first_category', 'subCategory', 'product_count', 'products', 'products_paginate'
                , 'brands')
        )->layout('layouts.home');
    }
}
