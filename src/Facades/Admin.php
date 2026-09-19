<?php

namespace Pagelyne\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pagelyne.admin.navigation';
    }
}