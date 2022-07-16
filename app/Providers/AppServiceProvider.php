<?php

namespace App\Providers;

use App\Http\Views\Admin\Composers\AdminAppComposer;
use App\Http\Views\Admin\Composers\SalesComposer as ComposersSalesComposer;
use App\Http\Views\Composers\AppComposer;
use App\Http\Views\Composers\SalesComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

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
        if(env('APP_ENV') !== 'local'){
            URL::forceScheme('https');
        }

        Str::macro('partnumber',function($part){
            return 'AB-'.substr($part,0,3).'_'.substr($part,3);
        });
        Schema::defaultStringLength(191);


        View::composer(['home','client.*' ], AppComposer::class);
        View::composer(['admin.*',], AdminAppComposer::class);
        View::composer(['supplier.*',], AdminAppComposer::class);

    }
}
