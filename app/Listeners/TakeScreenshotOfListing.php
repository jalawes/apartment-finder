<?php

namespace App\Listeners;

use App\Events\ApartmentSaved;
use Illuminate\Contracts\Queue\ShouldQueue;

class TakeScreenshotOfListing implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param \App\Events\ApartmentSaved $event
     *
     * @return void
     */
    public function handle(ApartmentSaved $event)
    {
        if (env('APP_ENV') === 'testing') {
            return false;
        }

        $apartment = $event->apartment;

        if (!$apartment->takeScreenshot()) {
            session()->flash('status', "Encountered an error when saving a screenshot of {$apartment->url}.");

            return false;
        }

        $apartment->saveThumbnail();

        session()->flash('status', "Screenshot of {$apartment->url} successfully saved!'");
    }
}
