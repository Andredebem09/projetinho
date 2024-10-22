<?php

namespace App\Providers;

use App\Http\Controllers\controllerteste;
use App\Services\SupportService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SupportService::class, function ($app) {
            return new SupportService(
                $app->make(AppServiceProvider::class) // Injeta o AppServiceProvider no SupportService
            );
        });
        

    }
    
    public function boot(): void
    {
        //
    }
}
