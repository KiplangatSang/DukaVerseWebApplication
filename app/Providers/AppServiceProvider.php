<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *e

     * @return void
     */
    public function register()
    {
        //


            $this->app->singleton(PaymentGatewayContract::class,function($app){
                return new RepositoryServiceProvider(  $this->app);
            });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }
}
