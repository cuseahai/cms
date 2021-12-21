<?php

namespace Haitech\ACL\Repositories\Caches;

use Haitech\ACL\Repositories\Interfaces\RoleInterface;
use Haitech\Support\Repositories\Caches\CacheAbstractDecorator;

class RoleCacheDecorator extends CacheAbstractDecorator implements RoleInterface
{
    /**
     * {@inheritDoc}
     */
    public function createSlug($name, $id)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }
}
