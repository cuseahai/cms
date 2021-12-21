<?php

namespace Haitech\ACL\Providers;

use Haitech\ACL\Events\RoleAssignmentEvent;
use Haitech\ACL\Events\RoleUpdateEvent;
use Haitech\ACL\Listeners\LoginListener;
use Haitech\ACL\Listeners\RoleAssignmentListener;
use Haitech\ACL\Listeners\RoleUpdateListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        RoleUpdateEvent::class     => [
            RoleUpdateListener::class,
        ],
        RoleAssignmentEvent::class => [
            RoleAssignmentListener::class,
        ],
        Login::class               => [
            LoginListener::class,
        ],
    ];
}
