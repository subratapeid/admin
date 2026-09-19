<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    |
    | Basic route-based navigation item.
    |
    */

    [
        'id' => 'dashboard',
        'label' => 'Dashboard',
        'icon' => 'dashboard',
        'route' => 'admin.dashboard',
        'order' => 10,
    ],


    /*
    |--------------------------------------------------------------------------
    | Simple Route
    |--------------------------------------------------------------------------
    |
    | Navigation item using a Laravel named route.
    |
    */

    [
        'id' => 'products',
        'label' => 'Products',
        'icon' => 'cube',
        'route' => 'admin.products.index',

        /*
         * Optional.
         *
         * If omitted, the route itself is used for active detection.
         *
         * Example:
         * admin.products.index
         * admin.products.create
         * admin.products.edit
         */

        'active' => [
            'admin.products.*',
        ],

        'order' => 20,
    ],


    /*
    |--------------------------------------------------------------------------
    | Simple URL
    |--------------------------------------------------------------------------
    |
    | Navigation item using a normal URL instead of a Laravel route.
    |
    */

    [
        'id' => 'brands',
        'label' => 'Brands',
        'icon' => 'tag',
        'url' => '/admin/brands',

        /*
         * URL-based active state.
         *
         * The wildcard (*) matches child URLs as well.
         *
         * Examples:
         * /admin/brands
         * /admin/brands/1
         * /admin/brands/1/edit
         */

        'active_url' => [
            '/admin/brands*',
        ],

        'order' => 30,
    ],


    /*
    |--------------------------------------------------------------------------
    | External URL
    |--------------------------------------------------------------------------
    |
    | Can also point to an external website.
    |
    */

    [
        'id' => 'documentation',
        'label' => 'Documentation',
        'icon' => 'book',
        'url' => 'https://docs.example.com',
        'order' => 40,
    ],


    /*
    |--------------------------------------------------------------------------
    | Single Role
    |--------------------------------------------------------------------------
    |
    | Visible only to users having the specified role.
    |
    */

    [
        'id' => 'admin-panel',
        'label' => 'Admin Panel',
        'icon' => 'shield',
        'route' => 'admin.panel.index',

        'roles' => [
            'Admin',
        ],

        'role_condition' => 'any',

        'order' => 50,
    ],


    /*
    |--------------------------------------------------------------------------
    | Multiple Roles - ANY
    |--------------------------------------------------------------------------
    |
    | Visible when the user has at least one of these roles.
    |
    | Admin OR Manager
    |
    */

    [
        'id' => 'reports',
        'label' => 'Reports',
        'icon' => 'chart',
        'route' => 'admin.reports.index',

        'roles' => [
            'Admin',
            'Manager',
        ],

        'role_condition' => 'any',

        'order' => 60,
    ],


    /*
    |--------------------------------------------------------------------------
    | Multiple Roles - ALL
    |--------------------------------------------------------------------------
    |
    | Visible only when the user has every listed role.
    |
    | Admin AND Manager
    |
    */

    [
        'id' => 'advanced-reports',
        'label' => 'Advanced Reports',
        'icon' => 'chart',
        'route' => 'admin.reports.advanced',

        'roles' => [
            'Admin',
            'Manager',
        ],

        'role_condition' => 'all',

        'order' => 70,
    ],


    /*
    |--------------------------------------------------------------------------
    | Single Permission
    |--------------------------------------------------------------------------
    |
    | Visible when the user has the specified permission.
    |
    */

    [
        'id' => 'customers',
        'label' => 'Customers',
        'icon' => 'users',
        'route' => 'admin.customers.index',

        'permissions' => [
            'customers.view',
        ],

        'permission_condition' => 'any',

        'order' => 80,
    ],


    /*
    |--------------------------------------------------------------------------
    | Multiple Permissions - ANY
    |--------------------------------------------------------------------------
    |
    | Visible when the user has at least one permission.
    |
    | customers.view OR customers.manage
    |
    */

    [
        'id' => 'customer-management',
        'label' => 'Customer Management',
        'icon' => 'users',
        'route' => 'admin.customers.index',

        'permissions' => [
            'customers.view',
            'customers.manage',
        ],

        'permission_condition' => 'any',

        'order' => 90,
    ],


    /*
    |--------------------------------------------------------------------------
    | Multiple Permissions - ALL
    |--------------------------------------------------------------------------
    |
    | Visible only when the user has every permission.
    |
    | customers.view AND customers.manage
    |
    */

    [
        'id' => 'customer-administration',
        'label' => 'Customer Administration',
        'icon' => 'users',
        'route' => 'admin.customers.admin',

        'permissions' => [
            'customers.view',
            'customers.manage',
        ],

        'permission_condition' => 'all',

        'order' => 100,
    ],


    /*
    |--------------------------------------------------------------------------
    | Role + Permission - ALL
    |--------------------------------------------------------------------------
    |
    | Both conditions must pass.
    |
    | (Admin OR Manager)
    | AND
    | (reports.view OR reports.manage)
    |
    */

    [
        'id' => 'financial-reports',
        'label' => 'Financial Reports',
        'icon' => 'currency',
        'route' => 'admin.reports.financial',

        'roles' => [
            'Admin',
            'Manager',
        ],

        'role_condition' => 'any',

        'permissions' => [
            'reports.financial.view',
            'reports.financial.manage',
        ],

        'permission_condition' => 'any',

        'access_condition' => 'all',

        'order' => 110,
    ],


    /*
    |--------------------------------------------------------------------------
    | Role + Permission - ANY
    |--------------------------------------------------------------------------
    |
    | Either the role condition OR the permission condition can pass.
    |
    | (Admin OR Manager)
    | OR
    | (reports.view OR reports.manage)
    |
    */

    [
        'id' => 'special-reports',
        'label' => 'Special Reports',
        'icon' => 'chart',
        'route' => 'admin.reports.special',

        'roles' => [
            'Admin',
            'Manager',
        ],

        'role_condition' => 'any',

        'permissions' => [
            'reports.special.view',
            'reports.special.manage',
        ],

        'permission_condition' => 'any',

        'access_condition' => 'any',

        'order' => 120,
    ],


    /*
    |--------------------------------------------------------------------------
    | Parent / Group Navigation
    |--------------------------------------------------------------------------
    |
    | A navigation item can contain children.
    |
    */

    [
        'id' => 'catalogue',
        'label' => 'Catalogue',
        'icon' => 'cube',
        'order' => 200,

        'children' => [

            [
                'id' => 'catalogue-products',
                'label' => 'Products',
                'icon' => 'cube',
                'route' => 'admin.products.index',

                'active' => [
                    'admin.products.*',
                ],

                'permissions' => [
                    'products.view',
                ],

                'order' => 10,
            ],

            [
                'id' => 'catalogue-categories',
                'label' => 'Categories',
                'icon' => 'folder',
                'route' => 'admin.categories.index',

                'active' => [
                    'admin.categories.*',
                ],

                'permissions' => [
                    'categories.view',
                ],

                'order' => 20,
            ],

            [
                'id' => 'catalogue-brands',
                'label' => 'Brands',
                'icon' => 'tag',
                'url' => '/admin/brands',

                'active_url' => [
                    '/admin/brands*',
                ],

                'permissions' => [
                    'brands.view',
                ],

                'order' => 30,
            ],

            [
                'id' => 'catalogue-attributes',
                'label' => 'Attributes',
                'icon' => 'adjustments',
                'route' => 'admin.attributes.index',

                'permissions' => [
                    'attributes.view',
                ],

                'order' => 40,
            ],

        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Parent With Role Restriction
    |--------------------------------------------------------------------------
    |
    | The complete group is available only to Admin or Manager.
    |
    */

    [
        'id' => 'sales',
        'label' => 'Sales',
        'icon' => 'shopping-cart',

        'roles' => [
            'Admin',
            'Manager',
        ],

        'role_condition' => 'any',

        'order' => 300,

        'children' => [

            [
                'id' => 'quotations',
                'label' => 'Quotations',
                'icon' => 'document',
                'route' => 'admin.quotations.index',

                'active' => [
                    'admin.quotations.*',
                ],

                'permissions' => [
                    'quotations.view',
                ],

                'order' => 10,
            ],

            [
                'id' => 'orders',
                'label' => 'Orders',
                'icon' => 'shopping-bag',
                'route' => 'admin.orders.index',

                'active' => [
                    'admin.orders.*',
                ],

                'permissions' => [
                    'orders.view',
                ],

                'order' => 20,
            ],

            [
                'id' => 'invoices',
                'label' => 'Invoices',
                'icon' => 'receipt',
                'route' => 'admin.invoices.index',

                'active' => [
                    'admin.invoices.*',
                ],

                'permissions' => [
                    'invoices.view',
                ],

                'order' => 30,
            ],

            [
                'id' => 'payments',
                'label' => 'Payments',
                'icon' => 'credit-card',
                'route' => 'admin.payments.index',

                'active' => [
                    'admin.payments.*',
                ],

                'permissions' => [
                    'payments.view',
                ],

                'order' => 40,
            ],

        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | CRM
    |--------------------------------------------------------------------------
    |
    | Example of a larger nested navigation.
    |
    */

    [
        'id' => 'crm',
        'label' => 'CRM',
        'icon' => 'users',
        'order' => 400,

        'children' => [

            [
                'id' => 'customers',
                'label' => 'Customers',
                'icon' => 'user',
                'route' => 'admin.customers.index',

                'active' => [
                    'admin.customers.*',
                ],

                'permissions' => [
                    'customers.view',
                ],

                'order' => 10,
            ],

            [
                'id' => 'contacts',
                'label' => 'Contacts',
                'icon' => 'contact',
                'route' => 'admin.contacts.index',

                'active' => [
                    'admin.contacts.*',
                ],

                'permissions' => [
                    'contacts.view',
                ],

                'order' => 20,
            ],

            [
                'id' => 'companies',
                'label' => 'Companies',
                'icon' => 'building',
                'route' => 'admin.companies.index',

                'active' => [
                    'admin.companies.*',
                ],

                'permissions' => [
                    'companies.view',
                ],

                'order' => 30,
            ],

        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | URL Based Parent Navigation
    |--------------------------------------------------------------------------
    |
    | Children can also use URLs instead of routes.
    |
    */

    [
        'id' => 'tools',
        'label' => 'Tools',
        'icon' => 'wrench',
        'order' => 500,

        'children' => [

            [
                'id' => 'import',
                'label' => 'Import',
                'icon' => 'upload',
                'url' => '/admin/import',

                'active_url' => [
                    '/admin/import*',
                ],

                'permissions' => [
                    'import.view',
                ],

                'order' => 10,
            ],

            [
                'id' => 'export',
                'label' => 'Export',
                'icon' => 'download',
                'url' => '/admin/export',

                'active_url' => [
                    '/admin/export*',
                ],

                'permissions' => [
                    'export.view',
                ],

                'order' => 20,
            ],

        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | System
    |--------------------------------------------------------------------------
    |
    | Example of a restricted system section.
    |
    */

    [
        'id' => 'system',
        'label' => 'System',
        'icon' => 'settings',

        'roles' => [
            'Super Admin',
            'Admin',
        ],

        'role_condition' => 'any',

        'order' => 900,

        'children' => [

            [
                'id' => 'users',
                'label' => 'Users',
                'icon' => 'users',
                'route' => 'admin.users.index',

                'active' => [
                    'admin.users.*',
                ],

                'permissions' => [
                    'users.view',
                ],

                'order' => 10,
            ],

            [
                'id' => 'roles',
                'label' => 'Roles',
                'icon' => 'shield',
                'route' => 'admin.roles.index',

                'active' => [
                    'admin.roles.*',
                ],

                'permissions' => [
                    'roles.view',
                ],

                'order' => 20,
            ],

            [
                'id' => 'permissions',
                'label' => 'Permissions',
                'icon' => 'key',
                'route' => 'admin.permissions.index',

                'active' => [
                    'admin.permissions.*',
                ],

                'permissions' => [
                    'permissions.view',
                ],

                'order' => 30,
            ],

            [
                'id' => 'settings',
                'label' => 'Settings',
                'icon' => 'settings',
                'url' => '/admin/settings',

                'active_url' => [
                    '/admin/settings*',
                ],

                'permissions' => [
                    'settings.view',
                ],

                'order' => 40,
            ],

        ],
    ],

];