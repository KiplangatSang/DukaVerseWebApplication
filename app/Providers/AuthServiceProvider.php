<?php

namespace App\Providers;

use App\Sales;
use App\User;
use Illuminate\Auth\Access\Response;
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


        // Gate::define('update-post', function (User $user, Sales ) {
        //     return $user->id === $post->user_id;
        // });
        Gate::define('view-retaildata', function (User $user) {
            return $user->isOwner
                        ? Response::allow()
                        : Response::deny('You must be an administrator.');
        });

        Gate::define('view-sales', function (User $user) {
            return $user->isOwner
                        ? Response::allow()
                        : Response::deny('You must be an administrator.');
        });
        //
    }
}
