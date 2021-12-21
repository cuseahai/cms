<?php

namespace Haitech\Slug\Facades;

use Haitech\Slug\SlugHelper;
use Illuminate\Support\Facades\Facade;

class SlugHelperFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SlugHelper::class;
    }
}
