<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Assets;

use InvalidArgumentException;

class AssetManager
{
    public function url(string $type, string $file): string
    {
        if (!in_array($type, ['css', 'js', 'images'], true)) {
            throw new InvalidArgumentException(
                "Invalid asset type [{$type}]."
            );
        }

        return url(
            'pagelyne-assets/' . $type . '/' . ltrim($file, '/')
        );
    }

    public function css(string $file): string
    {
        return $this->url('css', $file);
    }

    public function js(string $file): string
    {
        return $this->url('js', $file);
    }

    public function layoutCss(string $layout): string
    {
        return $this->css(
            $layout . 'Css.css'
        );
    }

    public function layoutJs(string $layout): string
    {
        return $this->js(
            $layout . 'Js.js'
        );
    }
    public function image(string $file): string
    {
        return $this->url('images', $file);
    }
}