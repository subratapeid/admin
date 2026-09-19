<?php

namespace AdminPanel\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/admin-panel.php',
            'admin-panel'
        );
    }

    public function boot(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'admin-panel'
        );

        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        /*
       |--------------------------------------------------------------------------
       | API Routes
       |--------------------------------------------------------------------------
       */

        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/api.php'
        );

        Blade::componentNamespace(
            'AdminPanel\\View\\Components',
            'admin-panel'
        );

        $this->publishes([
            __DIR__ . '/../../config/admin-panel.php' =>
                config_path('admin-panel.php'),
        ], 'admin-panel-config');
    }
}