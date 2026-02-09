<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model; // N'oublie pas l'import !



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bloque le Lazy Loading (N+1) mais seulement en local, pas en production
        Model::preventLazyLoading(!app()->isProduction());
    }
}
