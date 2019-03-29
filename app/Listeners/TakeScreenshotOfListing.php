<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TakeScreenshotOfListing implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param \App\Providers\ApartmentSaving  $event
     * @return void
     */
    public function handle(ApartmentSaving $event)
    {
        $apartment = $event->apartment;
    }
}
