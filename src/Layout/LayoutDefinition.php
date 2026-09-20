<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Layout;

class LayoutDefinition
{
    public function __construct(
        protected string $key,
        protected array $config
    ) {
    }

    public function key(): string
    {
        return $this->key;
    }

    public function name(): string
    {
        return $this->config['name'] ?? $this->key;
    }

    public function view(): string
    {
        return $this->config['view'];
    }

    public function component(string $name): ?string
    {
        return $this->config['components'][$name] ?? null;
    }

    public function config(): array
    {
        return $this->config;
    }
}