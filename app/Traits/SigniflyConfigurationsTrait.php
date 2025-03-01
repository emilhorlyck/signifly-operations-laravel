<?php

declare(strict_types=1);

namespace App\Traits;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;

trait SigniflyConfigurationsTrait
{
    public function useSigniflyConfigurations(): void
    {
        $this->configureCommands();
        $this->configureDates();
        $this->configureModels();
        $this->configureUrls();
        // $this->configureVite();
    }

    public function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction(),
        );
    }

    public function configureDates(): void
    {
        Date::use(CarbonImmutable::class);
    }

    public function configureModels(): void
    {
        Model::unguard();

        Model::shouldBeStrict();
    }

    public function configureUrls(): void
    {
        URL::forceScheme('https');
    }

    public function configureVite(): void
    {
        Vite::useBuildDirectory(storage_path('app/public/build'));
    }
}
