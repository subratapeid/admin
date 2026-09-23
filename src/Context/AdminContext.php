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
        // get guard from identity auth middleware
        $guard = request()->attributes->get('identity.guard') ?? 'web';
        return new AdminUser(
            Auth::guard($guard)->user()
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