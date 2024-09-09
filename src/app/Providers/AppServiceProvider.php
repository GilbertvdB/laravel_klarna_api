<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\KlarnaSampleDataService::class, function ($app) {
            return new \App\Services\KlarnaSampleDataService();
        });
    
        $this->app->singleton('klarna.payment', function ($app) {
            return new \App\Services\KlarnaPaymentService(
                $app->make(\App\Services\KlarnaSampleDataService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
