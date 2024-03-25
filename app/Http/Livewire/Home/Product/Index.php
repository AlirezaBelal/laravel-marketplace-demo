<?php

namespace App\Http\Livewire\Home\Product;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Compare;
use App\Models\Favorite;
use App\Models\Notification;
use App\Models\PriceDate;
use App\Models\Product;
use App\Models\ProductSeller;
use App\Models\Rate;
use App\Models\Review;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class Index extends Component
{
    public $product;

    public $color;

    public $comment;

    public $vendor_new;

    public $new_price;

    public $queryString = ['filters'];

    public Notification $notification;

    //    public Comment $comment;
    public $readyToLoad = false;

    public array $filterOptions = [
        'like' => ['1'],
        'parent_a' => ['1'],
        'parent_b' => ['0'],
        'my_q' => ['1'],
    ];

    public array $filters = [];

    public array $filterToMerge = [
        'like' => [],
        'parent_a' => [],
        'parent_b' => [],
        'my_q' => [],
    ];

    public $orderSelect;

    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc',
    ];

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->notification = new Notification();
        //        $this->comment = new Comment();
    }

    protected $rules = [
        'notification.sms' => 'nullable',
        'notification.email' => 'nullable',
        'notification.system' => 'nullable',
        'comment.comment' => 'nullable',
    ];

    public function updated($sms)
    {
        $this->validateOnly($sms);
    }

    public function likequestion($id)
    {
        if (auth()->user()) {
            $com = Comment::find($id);
            $rate = Rate::where('comment_id', $id)->where('user_id', auth()->user()->id)
                ->where('product_id', $com->product_id)->first();
            if ($rate) {
                $rate->delete();
                $this->emit('toast', 'success', ' امتیاز شما حذف شد.');

            } else {
                Rate::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $com->product_id,
                    'comment_id' => $id,
                    'like' => 1,
                ]);
            }
            $this->emit('toast', 'success', ' امتیاز شما ثبت شد.');

        } else {
            return $this->redirect('/login');
        }
    }

    public function reportquestion($id)
    {
        if (auth()->user()) {
            $com = Comment::find($id);

            if ($com->report == 1) {
                $this->emit('toast', 'success', ' گزارش شما ثبت شد.');

            } else {
                $com->update([
                    'report' => 1,
                ]);
            }
            $this->emit('toast', 'success', ' گزارش شما ثبت شد.');

        } else {
            return $this->redirect('/login');
        }
    }

    public function likeReview($id)
    {
        if (auth()->user()) {
            $review = Review::find($id);
            $review->update([
                'liked' => 1,
                'dislike' => 0,
            ]);
            $rate = Rate::where('review_id', $id)->where('user_id', auth()->user()->id)
                ->where('product_id', $review->product_id)->first();
            if ($rate) {
                $rate->delete();
                $this->emit('toast', 'success', ' امتیاز شما حذف شد.');

            } else {
                Rate::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $review->product_id,
                    'review_id' => $id,
                    'like' => 1,
                ]);
            }

            $this->emit('toast', 'success', ' امتیاز شما ثبت شد.');

        } else {
            return $this->redirect('/login');
        }
    }

    public function dislikeReview($id)
    {
        if (auth()->user()) {
            $review = Review::find($id);
            $review->update([
                'liked' => 0,
                'dislike' => 1,
            ]);
            $this->emit('toast', 'success', ' امتیاز شما ثبت شد.');

        } else {
            return $this->redirect('/login');
        }
    }

    public function reportReview($id)
    {
        if (auth()->user()) {
            $review = Review::find($id);

            if ($review->report == 1) {
                $this->emit('toast', 'success', ' گزارش شما ثبت شد.');

            } else {
                $review->update([
                    'report' => 1,
                ]);
            }
            $this->emit('toast', 'success', ' گزارش شما ثبت شد.');

        } else {
            return $this->redirect('/login');
        }
    }

    public function addQuestion()
    {

        if (auth()->user()) {
            Comment::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product->id,
                'comment' => $this->comment,
                'like' => 0,
                'report' => 0,
                'parent' => 0,
                'status' => 0,
            ]);
            $this->emit('toast', 'success', ' نظر شما با موفقیت ثبت شد و پس از تایید مدیریت نمایش داده خواهد شد.');

            return back();
        } else {
            return $this->redirect('/login');
        }

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

    public function loadComment()
    {
        $this->readyToLoad = true;
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
            'user_id' => auth()->user()->id,
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
            'user_id' => auth()->user()->id,
        ]);
        $this->emit('toast', 'success', 'محصول به اطلاع رسانی ها اضافه شد.');
    }

    public function compareAdd($id)
    {
        if (auth()->user()) {
            //dd(Compare::where('user_id',auth()->user()->id)->first());
            if (Compare::where('user_id', auth()->user()->id)->first()) {
                if (Compare::where('product_id', $id)->where('user_id', auth()->user()->id)->first() == null) {
                    $com = Compare::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $id,
                    ]);
                    $first = Compare::where('user_id', auth()->user()->id)->first();
                    $url = '/compare/dkp-'.$first->product_id.'/dkp-'.$id;

                    return $this->redirect($url);
                } else {
                    return $this->redirect(route('compare.step1', $id));
                }

            } else {
                Compare::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $id,
                ]);

                return $this->redirect(route('compare.step1', $id));
            }

        } else {
            $this->redirect('/login');
        }

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
                    'product_id' => $product->id,
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
            $different = $date2->diff($date1);

        }
        $day = $different->format('%d');
        $mo = $different->format('%m');

        SEOMeta::setTitle($product->title);
        SEOMeta::setDescription($product->resume);
        SEOMeta::addMeta('product:published_time', $product->created_at, 'property');
        SEOMeta::addMeta('product:section', $product->category, 'property');
        SEOMeta::addKeyword(['key1', 'key2', 'key3']);

        OpenGraph::setDescription($product->resume);
        OpenGraph::setTitle($product->title);
        OpenGraph::setUrl('http://digikala.ir');
        OpenGraph::addProperty('type', 'product');
        OpenGraph::addProperty('locale', 'fa_IR');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us', 'fa_IR']);

        OpenGraph::addImage($product->img);
        OpenGraph::addImage($product->img);
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($product->title);
        JsonLd::setDescription($product->title);
        JsonLd::setType('product');
        JsonLd::addImage($product->img);

        // OR with multi

        JsonLdMulti::setTitle($product->title);
        JsonLdMulti::setDescription($product->title);
        JsonLdMulti::setType('product');
        JsonLdMulti::addImage($product->img);
        if (! JsonLdMulti::isEmpty()) {
            JsonLdMulti::newJsonLd();
            JsonLdMulti::setType('WebPage');
            JsonLdMulti::setTitle('Page product - '.$product->title);
        }

        // Namespace URI: http://ogp.me/ns/product#
        // product
        OpenGraph::setTitle('product')
            ->setDescription('Some product')
            ->setType('product')
            ->setproduct([
                'published_time' => 'datetime',
                'modified_time' => 'datetime',
                'expiration_time' => 'datetime',
                'author' => 'profile / array',
                'section' => 'string',
                'tag' => 'string / array',
            ]);

        // Namespace URI: http://ogp.me/ns/book#
        // book
        OpenGraph::setTitle('product')
            ->setDescription('Some product')
            ->setType('product')
            ->setBook([
                'author' => 'profile / array',
                'isbn' => 'string',
                'release_date' => 'datetime',
                'Availability' => 'new',
                'tag' => 'string / array',
            ]);

        // Namespace URI: http://ogp.me/ns/profile#
        // profile
        OpenGraph::setTitle('Profile')
            ->setDescription('Some Person')
            ->setType('profile')
            ->setProfile([
                'first_name' => 'string',
                'last_name' => 'string',
                'username' => 'string',
                'gender' => 'enum(male, female)',
            ]);

        // Namespace URI: http://ogp.me/ns/music#
        // music.song
        OpenGraph::setType('music.song')
            ->setMusicSong([
                'duration' => 'integer',
                'album' => 'array',
                'album:disc' => 'integer',
                'album:track' => 'integer',
                'musician' => 'array',
            ]);

        // music.album
        OpenGraph::setType('music.album')
            ->setMusicAlbum([
                'song' => 'music.song',
                'song:disc' => 'integer',
                'song:track' => 'integer',
                'musician' => 'profile',
                'release_date' => 'datetime',
            ]);

        //music.playlist
        OpenGraph::setType('music.playlist')
            ->setMusicPlaylist([
                'song' => 'music.song',
                'song:disc' => 'integer',
                'song:track' => 'integer',
                'creator' => 'profile',
            ]);

        // music.radio_station
        OpenGraph::setType('music.radio_station')
            ->setMusicRadioStation([
                'creator' => 'profile',
            ]);

        // Namespace URI: http://ogp.me/ns/video#
        // video.movie
        OpenGraph::setType('video.movie')
            ->setVideoMovie([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array',
            ]);

        // video.episode
        OpenGraph::setType('video.episode')
            ->setVideoEpisode([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array',
                'series' => 'video.tv_show',
            ]);

        // video.tv_show
        OpenGraph::setType('video.tv_show')
            ->setVideoTVShow([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array',
            ]);

        // video.other
        OpenGraph::setType('video.other')
            ->setVideoOther([
                'actor' => 'profile / array',
                'actor:role' => 'string',
                'director' => 'profile /array',
                'writer' => 'profile / array',
                'duration' => 'integer',
                'release_date' => 'datetime',
                'tag' => 'string / array',
            ]);

        // og:video
        OpenGraph::addVideo('http://example.com/movie.swf', [
            'secure_url' => 'https://example.com/movie.swf',
            'type' => 'application/x-shockwave-flash',
            'width' => 400,
            'height' => 300,
        ]);

        // og:audio
        OpenGraph::addAudio('http://example.com/sound.mp3', [
            'secure_url' => 'https://secure.example.com/sound.mp3',
            'type' => 'audio/mpeg',
        ]);

        // og:place
        OpenGraph::setTitle('Place')
            ->setDescription('Some Place')
            ->setType('place')
            ->setPlace([
                'location:latitude' => 'float',
                'location:longitude' => 'float',
            ]);

        $comments = $this->readyToLoad ? Comment::where('status', 1)->
        where('product_id', $product->id)->where('parent', 0)->
        latest()->paginate(15) : [];

        return view('livewire.home.product.index', compact('product', 'productSeller_count', 'productSeller', 'productSeller_max_price', 'productSeller_max_price_first',
            'productSeller_max_price_all', 'mo', 'day', 'priceDate_min_price_first',
            'productSeller_max_price_all_init', 'productSeller_min_price_first', 'comments')
        )->layout('layouts.home');
    }
}
