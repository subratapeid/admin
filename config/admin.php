<?php

return [

    'name' => 'PGL-Admin',

    'version' => '1.0.0',

    'active-layout' => 'basic',

    'user' => [
        'name' => 'username',
        'email' => fn($user) => $user->email,
        'phone' => fn($user) => $user->phone,
        'avatar' => 'avatar',
    ],

    'application' => [
        'name' => env('APP_NAME'),
        'logo' => null,
    ],

    'routes' => [
        'login' => 'login',
        'logout' => 'admin.logout',
        'register' => 'register',
        'forgot-password' => 'password.request',
    ],

    'footer' => [
        'enabled' => true,
        'text' => null,
    ],

];