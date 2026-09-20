<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Layout;

use Illuminate\Support\Facades\File;
use InvalidArgumentException;

class LayoutManager
{
    protected string $path;

    protected array $layouts = [];

    public function __construct()
    {
        $this->path = __DIR__ . '/../../resources/views/layouts';

        $this->load();
    }

    protected function load(): void
    {
        if (!File::isDirectory($this->path)) {
            return;
        }

        foreach (File::directories($this->path) as $directory) {
            $file = $directory . '/layout.json';

            if (!File::exists($file)) {
                continue;
            }

            $config = json_decode(
                File::get($file),
                true
            );

            if (!is_array($config)) {
                continue;
            }

            $key = $config['key'] ?? basename($directory);

            $this->layouts[$key] = array_merge([
                'key' => $key,
                'name' => $key,
                'active' => true,
                'description' => null,
                'view' => 'admin::layouts.' . $key . '.app',
            ], $config);
        }
    }

    public function active(): LayoutDefinition
    {
        $key = config('admin.active-layout', 'classic');

        return $this->get($key);
    }

    public function get(string $key): LayoutDefinition
    {
        if (!isset($this->layouts[$key])) {
            throw new InvalidArgumentException(
                "Admin layout [{$key}] is not registered."
            );
        }

        if (!($this->layouts[$key]['active'] ?? false)) {
            throw new InvalidArgumentException(
                "Admin layout [{$key}] is inactive."
            );
        }

        return new LayoutDefinition(
            $key,
            $this->layouts[$key]
        );
    }

    public function component(string $name): string
    {
        $view = $this->active()->component($name);

        if (!$view) {
            throw new InvalidArgumentException(
                "Component [{$name}] is not registered for the active admin layout."
            );
        }

        return $view;
    }

    public function view(): string
    {
        return $this->active()->view();
    }

    public function name(): string
    {
        return $this->active()->name();
    }

    public function key(): string
    {
        return $this->active()->key();
    }

    public function all(): array
    {
        return collect($this->layouts)
            ->map(
                fn(array $config, string $key) =>
                    new LayoutDefinition($key, $config)
            )
            ->all();
    }

    public function activeLayouts(): array
    {
        return collect($this->layouts)
            ->filter(
                fn(array $config) =>
                    ($config['active'] ?? false) === true
            )
            ->map(
                fn(array $config, string $key) =>
                    new LayoutDefinition($key, $config)
            )
            ->all();
    }

    public function has(string $key): bool
    {
        return isset($this->layouts[$key]);
    }

    public function isActive(string $key): bool
    {
        return isset($this->layouts[$key])
            && ($this->layouts[$key]['active'] ?? false) === true;
    }
}