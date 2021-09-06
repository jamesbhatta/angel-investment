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
    }
}
