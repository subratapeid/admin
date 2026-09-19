<?php

namespace AdminPanel\View\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class App extends Component
{
    public function render(): View
    {
        return view('admin-panel::components.layout.app');
    }
}