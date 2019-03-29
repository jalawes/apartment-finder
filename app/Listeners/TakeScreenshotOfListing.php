<?php

namespace App\Listeners;

use App\Events\ApartmentSaved;

class TakeScreenshotOfListing
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
        $apartment = $event->apartment;

        if (!$apartment->takeScreenshot()) {
            session()->flash('status', "Encountered an error when saving a screenshot of {$apartment->url}.");

            return false;
        }

        $apartment->saveThumbnail();

        session()->flash('status', "Screenshot of {$apartment->url} successfully saved!'");
    }
}
