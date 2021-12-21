<?php

namespace Haitech\Widget\Repositories\Caches;

use Haitech\Support\Repositories\Caches\CacheAbstractDecorator;
use Haitech\Widget\Repositories\Interfaces\WidgetInterface;

class WidgetCacheDecorator extends CacheAbstractDecorator implements WidgetInterface
{
    /**
     * {@inheritDoc}
     */
    public function getByTheme($theme)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
