<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Context;

use Illuminate\Support\Facades\Auth;

class AdminContext
{
    public function __construct(
        protected AdminRoutes $routes
    ) {
    }

    public function user(): AdminUser
    {
        return new AdminUser(
            Auth::user()
        );
    }

    public function routes(): AdminRoutes
    {
        return $this->routes;
    }

    public function authenticated(): bool
    {
        return Auth::check();
    }

    public function appName(): string
    {
        return config(
            'admin.application.name',
            config('app.name')
        );
    }
}