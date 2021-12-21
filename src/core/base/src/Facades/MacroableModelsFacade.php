<?php

namespace Haitech\Base\Facades;

use Haitech\Base\Supports\MacroableModels;
use Illuminate\Support\Facades\Facade;

class MacroableModelsFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MacroableModels::class;
    }
}
