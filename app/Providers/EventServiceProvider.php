<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Laravel\Fortify\Features;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // The user model implements MustVerifyEmail, but email verification
        // routes are optional in Fortify. Only send verification notices when
        // that feature (and its routes) is actually enabled.
        if (in_array(Features::emailVerification(), config('fortify.features', []), true)) {
            Event::listen(Registered::class, SendEmailVerificationNotification::class);
        }
    }
}
