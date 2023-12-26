<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaAppVersionManager;

use Illuminate\Support\ServiceProvider;

class LaravelNovaAppVersionManagerProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Export Nova resource
            $this->publishNovaResource();

            // Export translations
            $this->publishTranslations();
        }

        $this->registerTranslations();
    }

    private function publishNovaResource(): void
    {
        $this->publishes(
            paths: [__DIR__ . '/Nova/AppVersion.php.stub' => base_path(path: 'app/Nova/AppVersion.php')],
            groups: 'nova-resource',
        );
    }

    private function publishTranslations(): void
    {
        $this->publishes(
            paths: [__DIR__ . '/../resources/lang' => resource_path(path: 'lang/vendor/laravel-nova-app-version-manager')],
            groups: 'translations',
        );
    }

    private function registerTranslations(): void
    {
        $this->loadTranslationsFrom(
            path: __DIR__ . '/../resources/lang',
            namespace: 'laravel-nova-app-version-manager',
        );
    }
}
