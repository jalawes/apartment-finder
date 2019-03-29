<?php

namespace App\Events;

use App\Apartment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ApartmentSaving
{
    use Dispatchable, SerializesModels;

    /**
     * @var \App\Apartment
     */
    public $apartment;

    /**
     * Create a new event instance.
     *
     * @param \App\Apartment $apartment
     *
     * @return void
     */
    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }
}
