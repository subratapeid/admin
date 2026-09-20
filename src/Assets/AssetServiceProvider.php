<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Assets;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AssetServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::get('/pagelyne-assets/{type}/{file}', function (string $type, string $file) {
            abort_unless(
                in_array($type, ['css', 'js', 'images'], true),
                404
            );

            $path = match ($type) {
                'css', 'js' => __DIR__ . '/../../dist/' . $type . '/' . $file,
                'images' => __DIR__ . '/../../resources/images/' . $file,
            };

            abort_unless(is_file($path), 404);

            $mime = match ($type) {
                'css' => 'text/css',
                'js' => 'application/javascript',
                'images' => mime_content_type($path),
            };

            return response()->file($path, [
                'Content-Type' => $mime,
            ]);
        })->where('file', '[A-Za-z0-9._/-]+');
    }
}