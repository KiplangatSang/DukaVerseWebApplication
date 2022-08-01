<?php

namespace App\Providers;

use App\Helpers\Billing\BankPaymentGateway;
use App\Helpers\Billing\CreditPaymentGateway;
use App\Helpers\Billing\DukaVerseGateway;
use App\Helpers\Billing\MPESAGateway;
use App\Helpers\Billing\PaymentGateway;
use App\Helpers\Billing\PaymentGatewayContract;
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

        // $this->app->bind(PaymentGateway::class,function($app){
        //     return new PaymentGateway(  'ksh');
        // });

        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            $gateway = "DUKAVERSE";

           // dd(request()->all());

            if (request()->has('gateway')) {
                $gateway =  request()->gateway;
            }


            switch ($gateway) {
                case "CREDIT":
                    return new CreditPaymentGateway('ksh', 2);
                    break;
                case "BANK":
                    return new BankPaymentGateway('ksh', 2);
                    break;
                case "DUKAVERSE":
                    return new DukaVerseGateway('ksh', 1);
                    break;
                case "MPESA":
                    return new MPESAGateway('ksh', 2);
                    break;
                default:
                    return new DukaVerseGateway('ksh', 1);
            }
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
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        Str::macro('partnumber', function ($part) {
            return 'AB-' . substr($part, 0, 3) . '_' . substr($part, 3);
        });
        Schema::defaultStringLength(191);


        View::composer(['home', 'client.*'], AppComposer::class);
        View::composer(['admin.*',], AdminAppComposer::class);
        View::composer(['supplier.*',], AdminAppComposer::class);
    }
}
