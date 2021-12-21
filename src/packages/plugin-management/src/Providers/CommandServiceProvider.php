<?php

namespace Haitech\PluginManagement\Providers;

use Haitech\PluginManagement\Commands\PluginActivateAllCommand;
use Haitech\PluginManagement\Commands\PluginDeactivateAllCommand;
use Haitech\PluginManagement\Commands\PluginActivateCommand;
use Haitech\PluginManagement\Commands\PluginAssetsPublishCommand;
use Haitech\PluginManagement\Commands\PluginDeactivateCommand;
use Haitech\PluginManagement\Commands\PluginRemoveCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PluginAssetsPublishCommand::class,
            ]);
        }

        $this->commands([
            PluginActivateCommand::class,
            PluginDeactivateCommand::class,
            PluginRemoveCommand::class,
            PluginActivateAllCommand::class,
            PluginDeactivateAllCommand::class,
        ]);
    }
}
