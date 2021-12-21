<?php

namespace Haitech\Theme\Events;

use Haitech\Base\Events\Event;
use Illuminate\Queue\SerializesModels;

class RenderingHomePageEvent extends Event
{
    use SerializesModels;
}