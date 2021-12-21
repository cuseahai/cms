<?php

namespace Haitech\Dashboard\Repositories\Caches;

use Haitech\Dashboard\Repositories\Interfaces\DashboardWidgetSettingInterface;
use Haitech\Support\Repositories\Caches\CacheAbstractDecorator;

class DashboardWidgetSettingCacheDecorator extends CacheAbstractDecorator implements DashboardWidgetSettingInterface
{
    /**
     * {@inheritDoc}
     */
    public function getListWidget()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
