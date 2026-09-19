<?php

use AdminPanel\Http\Controllers\Api\TestController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'api',
])->prefix(config('admin-panel.api.prefix', 'api/admin'))
    ->name('admin.api.')
    ->group(function () {

        Route::get('/test', [TestController::class, 'index'])
            ->name('test');

        Route::get('/test/show', [TestController::class, 'show'])
            ->name('test.show');

        Route::post('/test', [TestController::class, 'store'])
            ->name('test.store');


    });