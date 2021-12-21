<?php

namespace Haitech\Widget\Facades;

use Haitech\Widget\WidgetGroup;
use Illuminate\Support\Facades\Facade;

class WidgetFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Haitech.widget';
    }

    /**
     * Get the widget group object.
     *
     * @param string $name
     *
     * @return WidgetGroup
     */
    public static function group($name)
    {
        return app('Haitech.widget-group-collection')->group($name);
    }
}
