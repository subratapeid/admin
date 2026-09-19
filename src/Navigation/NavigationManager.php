<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Navigation;

class NavigationManager
{
    protected array $navigation = [];

    public function register(?array $navigation): void
    {
        $this->navigation = is_array($navigation)
            ? $navigation
            : [];
    }

    public function items(): array
    {
        return $this->process($this->navigation);
    }

    protected function process(array $items): array
    {
        $result = [];

        foreach ($items as $item) {

            if (!is_array($item)) {
                continue;
            }

            $item = $this->normalize($item);

            if (!$this->hasAccess($item)) {
                continue;
            }

            if (!empty($item['children'])) {
                $item['children'] = $this->process(
                    $item['children']
                );
            }

            /*
             * A parent menu without route/url
             * must have at least one visible child.
             */
            if (
                empty($item['route']) &&
                empty($item['url']) &&
                empty($item['children'])
            ) {
                continue;
            }

            $item['active'] = $this->isActive($item);

            /*
             * If a child is active, parent is active too.
             */
            if (!$item['active']) {
                foreach ($item['children'] as $child) {

                    if ($child['active'] ?? false) {
                        $item['active'] = true;
                        break;
                    }
                }
            }

            $result[] = $item;
        }

        usort(
            $result,
            fn(array $a, array $b) =>
                $a['order'] <=> $b['order']
        );

        return $result;
    }

    protected function normalize(array $item): array
    {
        return array_merge([
            'id' => null,
            'label' => '',
            'icon' => null,

            'route' => null,
            'url' => null,

            'active' => [],
            'active_url' => [],

            'roles' => [],
            'role_condition' => 'any',

            'permissions' => [],
            'permission_condition' => 'any',

            'access_condition' => 'all',

            'order' => 9999,

            'children' => [],
        ], $item);
    }

    protected function hasAccess(array $item): bool
    {
        /*
         * No access restrictions.
         */
        if (
            empty($item['roles']) &&
            empty($item['permissions'])
        ) {
            return true;
        }

        if (!auth()->check()) {
            return false;
        }

        $roleAccess = null;
        $permissionAccess = null;

        /*
         * Role check.
         */
        if (!empty($item['roles'])) {

            $roleAccess = $item['role_condition'] === 'all'
                ? auth()->user()->hasAllRoles($item['roles'])
                : auth()->user()->hasAnyRole($item['roles']);
        }

        /*
         * Permission check.
         */
        if (!empty($item['permissions'])) {

            if ($item['permission_condition'] === 'all') {

                $permissionAccess = true;

                foreach ($item['permissions'] as $permission) {

                    if (!auth()->user()->can($permission)) {
                        $permissionAccess = false;
                        break;
                    }
                }

            } else {

                $permissionAccess = false;

                foreach ($item['permissions'] as $permission) {

                    if (auth()->user()->can($permission)) {
                        $permissionAccess = true;
                        break;
                    }
                }
            }
        }

        /*
         * Only role restriction.
         */
        if ($roleAccess !== null && $permissionAccess === null) {
            return $roleAccess;
        }

        /*
         * Only permission restriction.
         */
        if ($roleAccess === null && $permissionAccess !== null) {
            return $permissionAccess;
        }

        /*
         * Both role and permission restrictions.
         */
        return $item['access_condition'] === 'any'
            ? ($roleAccess || $permissionAccess)
            : ($roleAccess && $permissionAccess);
    }

    protected function isActive(array $item): bool
    {
        /*
         * Route-based active state.
         */
        if (!empty($item['route'])) {

            $patterns = $item['active'] ?? [];

            if (!is_array($patterns)) {
                $patterns = [$patterns];
            }

            if (empty($patterns)) {
                $patterns = [$item['route']];
            }

            foreach ($patterns as $pattern) {

                if (
                    is_string($pattern) &&
                    request()->routeIs($pattern)
                ) {
                    return true;
                }
            }
        }

        /*
         * URL-based active state.
         */
        if (!empty($item['url'])) {

            $patterns = $item['active_url'] ?? [];

            if (!is_array($patterns)) {
                $patterns = [$patterns];
            }

            foreach ($patterns as $pattern) {

                if (
                    is_string($pattern) &&
                    $this->urlMatches($pattern)
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function urlMatches(string $pattern): bool
    {
        $currentPath = '/' . ltrim(
            request()->path(),
            '/'
        );

        $pattern = '/' . ltrim(
            $pattern,
            '/'
        );

        /*
         * Convert * wildcard into a regex.
         *
         * /admin/products*
         * matches:
         *
         * /admin/products
         * /admin/products/
         * /admin/products/123
         * /admin/products/edit
         */
        $regex = preg_quote($pattern, '#');

        $regex = str_replace(
            '\*',
            '.*',
            $regex
        );

        return (bool) preg_match(
            '#^' . $regex . '$#',
            $currentPath
        );
    }

    public function hasNavigation(): bool
    {
        return !empty($this->items());
    }
}