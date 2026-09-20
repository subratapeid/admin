<?php

namespace Pagelyne\Admin\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Pagelyne\Admin\Assets\AssetManager;
use Pagelyne\Admin\Assets\AssetServiceProvider;
use Pagelyne\Admin\Context\AdminContext;
use Pagelyne\Admin\Context\AdminRoutes;
use Pagelyne\Admin\Layout\LayoutManager;
use Pagelyne\Admin\Navigation\NavigationManager;
use Illuminate\Support\Facades\Route;

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

        $this->app->singleton(AssetManager::class);

        $this->app->register(AssetServiceProvider::class);

        $this->app->singleton(AdminRoutes::class);

        $this->app->singleton(AdminContext::class);

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