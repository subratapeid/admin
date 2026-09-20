<?php

declare(strict_types=1);

namespace Pagelyne\Admin\Components\Cards;

use Illuminate\View\Component;
use Illuminate\View\View;
use Pagelyne\Admin\Layout\LayoutManager;

class Test extends Component
{
    public function __construct(
        protected LayoutManager $layout,
        public string $variant = 'default'
    ) {
    }

    public function render(): View
    {
        return view(
            'admin::layouts.' . $this->layout->key() . '.cards.test'
        );
    }

    public function variantClass(): string
    {
        return match ($this->variant) {
            'default' => 'rounded-2xl border border-slate-200 p-6 shadow-sm bg-red-200',
            'flat' => 'rounded-xl border border-slate-200 p-6 bg-yellow-200',
            'elevated' => 'rounded-2xl p-6 shadow-lg bg-pink-200',
            'outlined' => 'rounded-2xl border-2 border-slate-300 p-6',
            default => 'rounded-2xl border border-slate-200 p-6 shadow-sm',
        };
        return view(
            'admin::layouts.' . $this->layout->key() . '.cards.test'
        );
    }
}