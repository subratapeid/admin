<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Layout;

use InvalidArgumentException;

class LayoutManager
{
    protected array $layouts;

    public function __construct()
    {
        $this->layouts = config('admin.layouts', []);
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
}