<?php

namespace Pagelyne\Admin\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;
use Pagelyne\Admin\Assets\AssetManager;
use Pagelyne\Admin\Context\AdminContext;
use Pagelyne\Admin\Layout\LayoutManager;
use Pagelyne\Admin\Navigation\NavigationManager;

class App extends Component
{
    public function render(): View
    {
        $layout = app(LayoutManager::class);
        $navigation = app(NavigationManager::class)->items();
        $assets = app(AssetManager::class);
        $admin = app(AdminContext::class);

        return view(
            'admin::components.layout.app',
            compact('layout', 'admin', 'assets', 'navigation')
        );
    }
}