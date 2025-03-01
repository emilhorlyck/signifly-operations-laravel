<?php

namespace App\Providers;

use App\Traits\SigniflyConfigurationsTrait;
use Illuminate\Support\ServiceProvider;

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
