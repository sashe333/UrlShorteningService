<?php

namespace App\Providers;

use Hashids\Hashids;
use App\Domain\URL\Interfaces\UrlShortenerInterface;
use Illuminate\Support\ServiceProvider;
use App\Domain\URL\Services\UrlShortenerService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Hashids::class, function ($app) {
            return new Hashids(env('HASHIDS_SALT', '!@#$%^sajadhiuh12y187h%^&*9221'), 4); // Limiting hash length to a maximum of 4 characters
        });

        $this->app->bind(UrlShortenerInterface::class, UrlShortenerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
