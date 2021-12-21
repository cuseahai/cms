<?php

namespace Haitech\SeoHelper\Contracts\Entities;

use Haitech\SeoHelper\Contracts\RenderableContract;

interface AnalyticsContract extends RenderableContract
{
    /**
     * Set Google Analytics code.
     *
     * @param string $code
     * @return $this
     */
    public function setGoogle($code);
}
