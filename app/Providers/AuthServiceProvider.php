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
        // 'App\Model' => ' App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        #################### start Can Gate Middleware Roles ##################
        Gate::define('users-manger',function ($user){
            if($user->hasAnyRoles(['admin','author','user']))
                return true;
        });

        Gate::define('users-access',function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('users-delete',function ($user){
           return $user->hasRole('admin');
        });

        Gate::define('users-add',function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('users-edit',function ($user){
            return $user->hasRole(['admin','author']);
        });

        Gate::define('users-update',function ($user){
            return $user->hasRole(['admin','author']);
        });
        #################### end Can Gate Middleware Roles ##################

    }
}
