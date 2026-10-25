<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laravel\Fortify\Features;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /** Laravel 13 registers this listener by default even with an empty map. */
    protected function configureEmailVerification()
    {
        if (in_array(Features::emailVerification(), config('fortify.features', []), true)) {
            parent::configureEmailVerification();
        }
    }
}
