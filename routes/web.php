<?php

use AdminPanel\Http\Controllers\Api\TestController;
use AdminPanel\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
])->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });