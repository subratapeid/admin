<?php

namespace Pagelyne\Admin\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;
use Pagelyne\Admin\Layout\LayoutManager;
use Pagelyne\Admin\Navigation\NavigationManager;

class App extends Component
{
    public function render(): View
    {
        $layout = app(LayoutManager::class);
        $navigation = app(NavigationManager::class)->items();

        return view(
            'admin::components.layout.app',
            compact('layout', 'navigation')
        );
    }
}