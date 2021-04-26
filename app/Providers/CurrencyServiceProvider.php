<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Currency as CurrencyServices;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CurrencyServices::class, function ($app) {
            return new CurrencyServices();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
