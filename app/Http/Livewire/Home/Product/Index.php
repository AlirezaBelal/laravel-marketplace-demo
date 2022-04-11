<?php

namespace App\Http\Livewire\Home\Product;


use App\Http\Livewire\Admin\Dashboard\Observed;
use App\Http\Livewire\Home\Profile\UserHistory;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Favorite;
use App\Models\Log;
use App\Models\Notification;
use App\Models\PriceDate;
use App\Models\Product;
use App\Models\ProductSeller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class Index extends Component
{
    public $product;
    public $color;
    public $vendor_new;
    public $new_price;

    public Notification $notification;

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->notification = new Notification();
    }

    protected $rules = [
        'notification.sms' => 'nullable',
        'notification.email' => 'nullable',
        'notification.system' => 'nullable',
    ];

    public function updated($sms)
    {
        $this->validateOnly($sms);
    }

    public function addToCart($id)
    {
        $productSeller = ProductSeller::find($id);
        $carts = Cart::where('product_seller_id', $id)->first();
        $userIp = Request::ip();
        if ($carts) {
            $carts->update([
                'count' => $carts->count + 1,
            ]);
        } else {
            if ($userIp = '127.0.0.1') {
                if (auth()->user()) {
                    $cart = Cart::create([
                        'ip' => $userIp,
                        'user_id' => auth()->user()->id,
                        'product_seller_id' => $productSeller->id,
                        'product_id' => $productSeller->product_id,
                        'count' => 1,
                        'product_price' => $productSeller->price,
                        'product_price_discount' => $productSeller->discount_price,
                        'product_color' => $productSeller->color_id,
                        'product_vendor' => $productSeller->vendor_id,
                        'product_warranty' => $productSeller->warranty_id,
                    ]);
                } else {
                    $cart = Cart::create([
                        'ip' => $userIp,
                        'product_seller_id' => $productSeller->id,
                        'product_id' => $productSeller->product_id,
                        'count' => 1,
                        'product_price' => $productSeller->price,
                        'product_price_discount' => $productSeller->discount_price,
                        'product_color' => $productSeller->color_id,
                        'product_vendor' => $productSeller->vendor_id,
                        'product_warranty' => $productSeller->warranty_id,
                    ]);
                }

            } else {
                $userIp2 = Request::ip();
                $location = Location::get($userIp2);
                if (auth()->user()) {
                    $cart = Cart::create([
                        'user_id' => auth()->user()->id,
                        'ip' => $userIp2,
                        'product_seller_id' => $productSeller->id,
                        'product_id' => $productSeller->product_id,
                        'count' => 1,
                        'product_price' => $productSeller->price,
                        'product_price_discount' => $productSeller->discount_price,
                        'product_color' => $productSeller->color_id,
                        'product_vendor' => $productSeller->vendor_id,
                        'product_warranty' => $productSeller->warranty_id,
                        'countryName' => $location->countryName,
                        'regionName' => $location->regionName,
                        'cityName' => $location->cityName,
                        'countryCode' => $location->countryCode,
                        'regionCode' => $location->regionCode,
                        'zipCode' => $location->zipCode,
                        'areaCode' => $location->areaCode,
                        'latitude' => $location->latitude,
                        'longitude' => $location->longitude,
                    ]);
                } else {
                    $cart = Cart::create([
                        'ip' => $userIp2,
                        'product_seller_id' => $productSeller->id,
                        'product_id' => $productSeller->product_id,
                        'count' => 1,
                        'product_price' => $productSeller->price,
                        'product_price_discount' => $productSeller->discount_price,
                        'product_color' => $productSeller->color_id,
                        'product_vendor' => $productSeller->vendor_id,
                        'product_warranty' => $productSeller->warranty_id,
                        'countryName' => $location->countryName,
                        'regionName' => $location->regionName,
                        'cityName' => $location->cityName,
                        'countryCode' => $location->countryCode,
                        'regionCode' => $location->regionCode,
                        'zipCode' => $location->zipCode,
                        'areaCode' => $location->areaCode,
                        'latitude' => $location->latitude,
                        'longitude' => $location->longitude,
                    ]);
                }
            }
        }

        return $this->redirect('/cart');

    }

    public function changeColor($id)
    {
        $color = Color::find($id);
        $this->color = $color->name;
    }

    public function changeProductDetail($id)
    {
        $seller = ProductSeller::where('id', $id)->first();

        $this->vendor_new = $seller;
    }

    public function notificationReModal()
    {
        $this->validate();
        $notification = Notification::where('product_id', $this->product->id)->
        where('user_id', auth()->user()->id)->first();
        if ($notification) {

            if ($this->notification->sms == null && $this->notification->email == null && $this->notification->system == null) {
                $notification->delete();
            } else {
                $notification->update([
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->product->id,
                    'sms' => $this->notification->sms,
                    'email' => $this->notification->email,
                    'system' => $this->notification->system,
                    'type' => 'موجود شدن',
                ]);
            }

        } else {
            Notification::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product->id,
                'sms' => $this->notification->sms,
                'email' => $this->notification->email,
                'system' => $this->notification->system,
                'type' => 'موجود شدن',
            ]);
        }

        $this->emit('toast', 'success', ' محصول ثبت شد و در صورت موجود بودن با روش های انتخابی اطلاع رسانی خواهد شد.');
//        return $this->redirect(request()->header('Referer'));
    }

    public function updateFavoriteDisable($id)
    {
        $favorites = Favorite::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
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
            $userhistory = \App\Models\UserHistory::where('user_id', auth()->user()->id)->
            where('product_id', $product->id)->first();

            if ($userhistory == null) {
                \App\Models\UserHistory::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id
                ]);
            }
        }
        $productSeller = ProductSeller::where('product_id', $product->id)->get();
        $productSeller = $productSeller->unique('color_id');
        $productSeller_max_price = ProductSeller::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->get();

        $productSeller_min_price_first = ProductSeller::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->first();
        $productSeller_max_price_first = ProductSeller::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->first();

        $productSeller_max_price_all = ProductSeller::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->take('3')->get();
        $productSeller_max_price_all_init = ProductSeller::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->skip('3')->take(PHP_INT_MAX)->get();
        $productSeller_count = ProductSeller::where('product_id', $product->id)->count();


        $priceDate = PriceDate::where('product_id', $product->id)->get();

        $priceDate_min_price = PriceDate::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->get();

        ///
        $priceDate_min_price_first = PriceDate::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->first();
        $priceDate_min_price_first1 = PriceDate::where('product_id', $product->id)->
        orderBy('discount_price', 'ASC')->get()[1];


        if ($priceDate_min_price_first1) {
            $date1 = $priceDate_min_price_first->created_at;
            $date2 = $priceDate_min_price_first1->created_at;
            $different =  $date2->diff($date1);

        }
        $day = $different->format('%d');
        $mo = $different->format('%m');

        return view('livewire.home.product.index', compact('product', 'productSeller_count'
                , 'productSeller', 'productSeller_max_price', 'productSeller_max_price_first',
                'productSeller_max_price_all','mo','day','priceDate_min_price_first',
                'productSeller_max_price_all_init', 'productSeller_min_price_first')
        )->layout('layouts.home');
    }
}
