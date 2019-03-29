<?php

namespace App\Providers;

use App\Apartment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ApartmentSaving
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Apartment
     */
    protected $apartment;

    /**
     * Create a new event instance.
     *
     * @param mixed $apartment
     * @return void
     */
    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }
}
