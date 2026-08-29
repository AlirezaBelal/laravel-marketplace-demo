<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $carts = collect();

        // Composer, Artisan and CI must be able to boot the framework without an
        // operational database. Cart hydration belongs only to HTTP runtime.
        if (! $this->app->runningInConsole()) {
            if (auth()->check()) {
                $userId = auth()->id();
                $carts = Cart::where('user_id', $userId)->where('type', 0)->get();

                Cart::where('ip', Request::ip())
                    ->whereNull('user_id')
                    ->update(['user_id' => $userId]);
            } else {
                $carts = Cart::where('ip', Request::ip())->where('type', 0)->get();
            }
        }

        View::share('carts', $carts);

        Validator::extend('max_mb', function ($attribute, $value, $parameters) {
            if (count($parameters) !== 1 || ! is_numeric($parameters[0])) {
                return false;
            }

            if (! $value instanceof UploadedFile || ! $value->isValid()) {
                return false;
            }

            $maxMegabytes = (float) $parameters[0];
            if ($maxMegabytes < 0) {
                return false;
            }

            return ($value->getSize() / 1024 / 1024) <= $maxMegabytes;
        });
    }
}
