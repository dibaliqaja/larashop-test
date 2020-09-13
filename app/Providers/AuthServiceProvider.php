<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-products', function($user){
            return $user->role == 'ADMIN';
        });

        Gate::define('manage-orders', function($user){
            return $user->role == 'ADMIN';
        });

        Gate::define('manage-buyer', function($user){
            return $user->role == 'CUSTOMER' || 'ADMIN';
        });
    }
}
