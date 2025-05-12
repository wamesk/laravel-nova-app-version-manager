<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaAppVersionManager\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Wame\LaravelNovaAppVersionManager\Nova\AppVersion;

class LaravelNovaAppVersionManagerProvider extends ServiceProvider
{
    public function register(): void
    {
        Nova::resources([
            AppVersion::class,
        ]);

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'laravel-nova-app-version-manager');
    }
}
