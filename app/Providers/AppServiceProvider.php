<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind('path.public', function () {
//            return realpath(base_path().'/digikala/public');
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (auth()->user()) {
            $carts = \App\Models\Cart::where('user_id', auth()->user()->id)->where('type', 0)->get();
            $userIp2 = Request::ip();
            $cart2s = \App\Models\Cart::where('ip', $userIp2)->get();
            if ($cart2s) {
                foreach ($cart2s as $cart) {
                    $cart->update([
                        'user_id' => auth()->user()->id,
                    ]);
                }

            }
        } else {
            $userIp = Request::ip();
            $carts = \App\Models\Cart::where('ip', $userIp)->where('type', 0)->get();
        }
        View::share('carts', $carts);

        Validator::extend('max_mb', function ($attribute, $value, $parameters, $validator) {
            $this->requireParameterCount(1, $parameters, 'max_mb');
            if ($value instanceof UploadedFile && ! $value->isValid()) {
                return false;
            }
            $mb = $value->getSize() / 1024 / 1024;

            return $this->getSize($attribute, $mb) <= $parameters[0];
        });

    }
}
