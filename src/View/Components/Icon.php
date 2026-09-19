<?php

namespace AdminPanel\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Icon extends Component
{
    public function __construct(
        public string $name = 'test'
    ) {
    }

    public function render(): View
    {
        return view('admin-panel::components.icon');
    }
}