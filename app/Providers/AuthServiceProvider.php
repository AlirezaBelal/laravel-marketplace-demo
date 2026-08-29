<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        // Composer package discovery and most CI/Artisan commands should not require
        // a live application database. Dynamic permission gates are only needed for
        // the HTTP runtime where the permission records are available.
        if ($this->app->runningInConsole()) {
            return;
        }

        foreach (Permission::with('roles')->get() as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
    }
}
