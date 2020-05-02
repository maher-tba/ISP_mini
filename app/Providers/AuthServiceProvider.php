<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('users-manger',function ($user){
            return $user->hasAnyRoles(['admin','user']);
        });

        Gate::define('users-delete',function ($user){
           return $user->hasRole('admin');
        });

        Gate::define('users-edit',function ($user){
            return $user->hasRole('user');
        });

    }
}
