<?php

namespace App\Http\Livewire\Home\Product;


use App\Http\Livewire\Admin\Dashboard\Observed;
use App\Http\Livewire\Home\Profile\UserHistory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Favorite;
use App\Models\Log;
use App\Models\Product;
use App\Models\ProductSeller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Index extends Component
{
    public $product;
    public $color = 'سفید';

    public function mount($id)
    {
        $this->product = Product::find($id);
    }


    public function changeColor($id)
    {
        $color = Color::find($id);
        $c_value = $color->name;
        $this->color = $c_value;
    }


    public function updateFavoriteDisable($id)
    {
        $favorites = Favorite::where('product_id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        $favorites->delete();

        $this->emit('toast', 'success', 'محصول از علاقه مندی ها حذف شد.');
    }


    public function updateFavoriteEnable($id)
    {
        $favarites = Favorite::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        $this->emit('toast', 'success', 'محصول به علاقه مندی ها اضافه شد.');
    }


    public function updateObservedDisable($id)
    {
        $observed = \App\Models\Observed::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        $observed->delete();
        $this->emit('toast', 'success', 'محصول از اطلاع رسانی ها حذف شد.');
    }


    public function updateObservedEnable($id)
    {
        $observed = \App\Models\Observed::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        $this->emit('toast', 'success', 'محصول به اطلاع رسانی ها اضافه شد.');
    }


    public function render()
    {
        $product = $this->product;
        if (auth()->user()) {
            $userhistory = \App\Models\UserHistory::where('user_id', auth()->user()->id)
                ->where('product_id', $product->id)
                ->first();

            if ($userhistory == null) {
                \App\Models\UserHistory::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id
                ]);
            }
        }

        $productSeller = ProductSeller::where('product_id', $product->id)
            ->get();

        $productSeller_max_price = ProductSeller::where('product_id', $product->id)
            ->orderBy('discount_price', 'ASC')
            ->get();

        $productSeller_max_price_first = ProductSeller::where('product_id', $product->id)
            ->orderBy('discount_price', 'ASC')
            ->first();

        $productSeller_max_price_all = ProductSeller::where('product_id', $product->id)
            ->orderBy('discount_price', 'ASC')
            ->take('3')
            ->get();

        $productSeller_max_price_all_init = ProductSeller::where('product_id', $product->id)
            ->orderBy('discount_price', 'ASC')
            ->skip('3')
            ->take(PHP_INT_MAX)
            ->get();

        $productSeller_count = ProductSeller::where('product_id', $product->id)
            ->count();

        return view('livewire.home.product.index', compact('product', 'productSeller_count'
                , 'productSeller', 'productSeller_max_price', 'productSeller_max_price_first',
                'productSeller_max_price_all', 'productSeller_max_price_all_init')
        )->layout('layouts.home');
    }
}
