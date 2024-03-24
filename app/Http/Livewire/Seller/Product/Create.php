<?php

namespace App\Http\Livewire\Seller\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductSellTest;
use App\Models\Seller;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $search;

    protected $queryString = ['search'];

    public $brand;
    public $name_kala;
    public $nameEn_kala;
    public $tool;
    public $arz;
    public $ertfa;
    public $sharh;
    public $plus;
    public $min;
    public $vazn;
    public $img;
    public $brands;

    public function mount()
    {
        $this->brands = Brand::all();
    }

    public function step2Form()
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        $productSellTest->update([
            'brand_id' => $this->brand,
            'title' => $this->name_kala,
            'ename' => $this->nameEn_kala,
            'length' => $this->tool,
            'width' => $this->arz,
            'weight' => $this->vazn,
            'height' => $this->ertfa,
            'detail_product' => $this->sharh,
            'plus_product' => $this->plus,
            'minus_product' => $this->min,

        ]);
    }

    public function imgForm()
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();

        $productSellTest->update([
            'img' => $this->uploadImage(),
        ]);

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "seller2/$year/$month";
        $i = 0;
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";

    }


    public function addCategoryToSale($id)
    {
        $sellToAdd = ProductSellTest::where('cat_id', $id)->first();
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        if ($productSellTest) {
            $productSellTest->update([
                'cat_id' => $id,
            ]);
        } else {
            $seller = Seller::where('user_id', auth()->user()->id)->first();
            ProductSellTest::create([
                'cat_id' => $id,
                'user_id' => auth()->user()->id,
                'seller_id' => $seller->id,
            ]);
        }

    }

    public function addSubCategoryToSale($id)
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        $productSellTest->update([
            'cat2_id' => $id,
        ]);
    }

    public function addChildCategoryToSale($id)
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        $productSellTest->update([
            'cat3_id' => $id,
        ]);
    }

    public function add4CategoryToSale($id)
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        $productSellTest->update([
            'cat4_id' => $id,
        ]);
    }

    public function add5CategoryToSale($id)
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        $productSellTest->update([
            'cat5_id' => $id,
        ]);
    }

    public function OriginalOk($id)
    {
        $productSellTest = ProductSellTest::where('user_id', auth()->user()->id)->first();
        if ($productSellTest->original == 0 || $productSellTest->original == null) {
            $productSellTest->update([
                'original' => 1,
            ]);
        } else {
            $productSellTest->update([
                'original' => 0,
            ]);
        }

    }

    public function render()
    {
        $categories = Category::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('link', 'LIKE', "%{$this->search}%")->
        where('status', 1)->get();


        return view('livewire.seller.product.create', compact('categories')
        )->layout('layouts.seller_dashboard');
    }
}
