<?php

namespace Haitech\Slug\Providers;

use Haitech\Slug\Commands\ChangeSlugPrefixCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChangeSlugPrefixCommand::class,
            ]);
        }
    }
}
