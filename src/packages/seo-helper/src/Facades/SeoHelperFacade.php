<?php

namespace Haitech\SeoHelper\Facades;

use Haitech\SeoHelper\SeoHelper;
use Illuminate\Support\Facades\Facade;

/**
 * @since 02/12/2015 14:08 PM
 */
class SeoHelperFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SeoHelper::class;
    }
}
