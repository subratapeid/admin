<?php

namespace Pagelyne\Admin\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Pagelyne\Admin\Layout\LayoutManager;
use Pagelyne\Admin\Navigation\NavigationManager;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->singleton(
            NavigationManager::class,
            fn() => new NavigationManager()
        );

        $this->app->singleton(
            LayoutManager::class,
            fn() => new LayoutManager()
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/admin.php',
            'admin'
        );
    }

    public function boot(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'admin'
        );

        Blade::componentNamespace(
            'Pagelyne\\Admin\\Components',
            'admin'
        );
    }
}