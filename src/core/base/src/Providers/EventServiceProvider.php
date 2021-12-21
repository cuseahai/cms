<?php

namespace Haitech\Base\Providers;

use Haitech\Base\Events\BeforeEditContentEvent;
use Haitech\Base\Events\CreatedContentEvent;
use Haitech\Base\Events\DeletedContentEvent;
use Haitech\Base\Events\SendMailEvent;
use Haitech\Base\Events\UpdatedContentEvent;
use Haitech\Base\Listeners\BeforeEditContentListener;
use Haitech\Base\Listeners\CreatedContentListener;
use Haitech\Base\Listeners\DeletedContentListener;
use Haitech\Base\Listeners\SendMailListener;
use Haitech\Base\Listeners\UpdatedContentListener;
use Illuminate\Support\Facades\Event;
use File;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SendMailEvent::class          => [
            SendMailListener::class,
        ],
        CreatedContentEvent::class    => [
            CreatedContentListener::class,
        ],
        UpdatedContentEvent::class    => [
            UpdatedContentListener::class,
        ],
        DeletedContentEvent::class    => [
            DeletedContentListener::class,
        ],
        BeforeEditContentEvent::class => [
            BeforeEditContentListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        Event::listen(['cache:cleared'], function () {
            File::delete([storage_path('cache_keys.json'), storage_path('settings.json')]);
        });
    }
}
