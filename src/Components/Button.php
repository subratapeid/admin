<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Button extends Component
{
    public string $classes;

    public function __construct(
        public string $type = 'button',
        public string $variant = 'primary',
        public string $size = 'md',
        public ?string $href = null,
    ) {
        $this->classes = $this->buildClasses();
    }

    protected function buildClasses(): string
    {
        $base = 'inline-flex items-center justify-center gap-2 rounded-lg font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';

        $variants = [
            'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
            'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400',
            'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
            'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
            'warning' => 'bg-yellow-500 text-white hover:bg-yellow-600 focus:ring-yellow-500',
            'dark' => 'bg-gray-900 text-white hover:bg-gray-800 focus:ring-gray-700',
            'light' => 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-gray-400',
            'ghost' => 'bg-transparent text-gray-700 hover:bg-gray-100 focus:ring-gray-400',
            'link' => 'bg-transparent text-blue-600 hover:text-blue-700 hover:underline focus:ring-0',
        ];

        $sizes = [
            'xs' => 'px-2.5 py-1.5 text-xs',
            'sm' => 'px-3 py-2 text-sm',
            'md' => 'px-4 py-2.5 text-sm',
            'lg' => 'px-5 py-3 text-base',
            'xl' => 'px-6 py-3.5 text-lg',
        ];

        return implode(' ', [
            $base,
            $variants[$this->variant] ?? $variants['primary'],
            $sizes[$this->size] ?? $sizes['md'],
        ]);
    }

    public function render(): View
    {
        return view('admin::components.button');
    }
}