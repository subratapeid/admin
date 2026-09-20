<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Context;

use Illuminate\Support\Facades\Route;

class AdminRoutes
{
    public function get(string $key): ?string
    {
        $name = config("admin.routes.{$key}");

        if (! $name) {
            return null;
        }

        if (! Route::has($name)) {
            return null;
        }

        return route($name);
    }

    public function login(): ?string
    {
        return $this->get('login');
    }

    public function logout(): ?string
    {
        return $this->get('logout');
    }

    public function register(): ?string
    {
        return $this->get('register');
    }

    public function forgotPassword(): ?string
    {
        return $this->get('forgot-password');
    }
}