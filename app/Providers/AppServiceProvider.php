<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Signifly\Configurations\SigniflyConfigurationsTrait;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    use SigniflyConfigurationsTrait;

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->useSigniflyConfigurations();
    }
}
