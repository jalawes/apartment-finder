<?php

namespace App\Listeners;

use App\Events\ApartmentSaving;

class TakeScreenshotOfListing
{
    /**
     * Handle the event.
     *
     * @param \App\Providers\ApartmentSaving  $event
     * @return void
     */
    public function handle(ApartmentSaving $event)
    {
        $apartment = $event->apartment;

        if (!$apartment->takeScreenshot()) {
            session()->flash('status', "Encountered an error when saving a screenshot of {$apartment->url}.");

            return false;
        }

        session()->flash('status', "Screenshot of {$apartment->url} successfully saved!'");
    }
}
