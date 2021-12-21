<?php

namespace Haitech\Base\Providers;

use Haitech\Base\Commands\ClearLogCommand;
use Haitech\Base\Commands\InstallCommand;
use Haitech\Base\Commands\PublishAssetsCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            ClearLogCommand::class,
            InstallCommand::class,
            PublishAssetsCommand::class,
        ]);
    }
}
