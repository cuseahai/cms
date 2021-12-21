<?php

namespace Haitech\Chart\Providers;

use Haitech\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;

class ChartServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot()
    {
        $this->setNamespace('core/chart')
            ->loadAndPublishViews();
    }
}
