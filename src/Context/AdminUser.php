<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Context;

use Illuminate\Contracts\Auth\Authenticatable;

class AdminUser
{
    public function __construct(
        protected ?Authenticatable $user
    ) {
    }

    public function instance(): ?Authenticatable
    {
        return $this->user;
    }

    public function name(): string
    {
        return (string) $this->value(
            'name',
            'Guest User'
        );
    }

    public function email(): string
    {
        return (string) $this->value(
            'email',
            ''
        );
    }

    public function phone(): string
    {
        return (string) $this->value(
            'phone',
            ''
        );
    }

    public function avatar(): ?string
    {
        $avatar = $this->value('avatar');

        return $avatar ? (string) $avatar : null;
    }

    public function role(): ?string
    {
        if (!$this->user) {
            return null;
        }

        if (method_exists($this->user, 'getRoleNames')) {
            return $this->user->getRoleNames()->first();
        }

        $role = $this->value('role');

        return $role ? (string) $role : null;
    }

    public function roles(): array
    {
        if (!$this->user) {
            return [];
        }

        if (method_exists($this->user, 'getRoleNames')) {
            return $this->user->getRoleNames()->values()->all();
        }

        $roles = $this->value('roles', []);

        if (is_string($roles)) {
            return [$roles];
        }

        return is_array($roles) ? $roles : [];
    }

    public function hasRole(string $role): bool
    {
        if (!$this->user) {
            return false;
        }

        if (method_exists($this->user, 'hasRole')) {
            return $this->user->hasRole($role);
        }

        return in_array($role, $this->roles(), true);
    }

    protected function value(
        string $key,
        mixed $default = null
    ): mixed {
        if (!$this->user) {
            return $default;
        }

        $resolver = config("admin.user.{$key}");

        if (is_callable($resolver)) {
            return $resolver($this->user);
        }

        if (is_string($resolver) && $resolver !== '') {
            return data_get(
                $this->user,
                $resolver,
                $default
            );
        }

        return $default;
    }
}