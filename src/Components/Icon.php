<?php

namespace Pagelyne\Admin\View\Components;

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
        return view('admin::components.icon');
    }
}