<?php

return [

    'name' => 'PGL-Admin',

    'version' => '1.0.0',

    'active-layout' => 'basic',

    'layouts' => [

        'basic' => [
            'name' => 'basic',
            'view' => 'admin::layouts.basic.app',
            'components' => [
                'sidebar' => 'admin::layouts.classic.sidebar',
                'topbar' => 'admin::layouts.classic.topbar',
            ],
        ],

        'classic' => [
            'name' => 'Classic',
            'view' => 'admin::layouts.classic.app',
            'components' => [
                'sidebar' => 'admin::layouts.classic.sidebar',
                'topbar' => 'admin::layouts.classic.topbar',
            ],
        ],

        'modern' => [
            'name' => 'Modern',
            'view' => 'admin::layouts.modern.app',
            'components' => [
                'sidebar' => 'admin::layouts.modern.sidebar',
                'topbar' => 'admin::layouts.modern.topbar',
            ],
        ],

    ],

];