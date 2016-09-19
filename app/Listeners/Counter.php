<?php

namespace App\Listeners;

use App\Events\NewsViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Counter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewsViewed  $event
     * @return void
     */
    public function handle(NewsViewed $event)
    {
        $event->news->increment('views');
    }
}
