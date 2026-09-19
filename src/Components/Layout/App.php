<?php

namespace Pagelyne\Admin\View\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class App extends Component
{
    public function render(): View
    {
        return view('admin::components.layout.apps');
    }
}