<?php

namespace Haitech\SeoHelper\Providers;

use Haitech\Base\Events\CreatedContentEvent;
use Haitech\Base\Events\DeletedContentEvent;
use Haitech\Base\Events\UpdatedContentEvent;
use Haitech\SeoHelper\Listeners\CreatedContentListener;
use Haitech\SeoHelper\Listeners\DeletedContentListener;
use Haitech\SeoHelper\Listeners\UpdatedContentListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdatedContentEvent::class => [
            UpdatedContentListener::class,
        ],
        CreatedContentEvent::class => [
            CreatedContentListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
    ];
}
