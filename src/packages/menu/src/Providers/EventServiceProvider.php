<?php

namespace Haitech\Menu\Providers;

use Haitech\Base\Events\DeletedContentEvent;
use Haitech\Menu\Listeners\DeleteMenuNodeListener;
use Haitech\Menu\Listeners\UpdateMenuNodeUrlListener;
use Haitech\Slug\Events\UpdatedSlugEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdatedSlugEvent::class    => [
            UpdateMenuNodeUrlListener::class,
        ],
        DeletedContentEvent::class => [
            DeleteMenuNodeListener::class,
        ],
    ];
}
