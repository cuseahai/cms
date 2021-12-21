<?php

namespace Haitech\Base\Facades;

use Haitech\Base\Supports\DashboardMenu;
use Illuminate\Support\Facades\Facade;

class DashboardMenuFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return DashboardMenu::class;
    }
}
