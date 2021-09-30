<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        \Spatie\Flash\Flash::levels([
            'info' => 'text-white bg-primary',
            'success' => 'text-white bg-success',
            'warning' => 'text-white bg-warning',
            'error' => 'text-white bg-danger',
        ]);

        // Braintree setup
        // \Braintree_Configuration::environment(env(‘BRAINTREE_ENV’));
        // \Braintree_Configuration::environment(env(‘BRAINTREE_ENV’));
        // \Braintree_Configuration::merchantId(env(‘BRAINTREE_MERCHANT_ID’));
        // \Braintree_Configuration::publicKey(env(‘BRAINTREE_PUBLIC_KEY’));
        // \Braintree_Configuration::privateKey(env(‘BRAINTREE_PRIVATE_KEY’));

        
    }
}
