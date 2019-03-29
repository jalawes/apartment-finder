<?php

namespace App\Mail;

use App\Apartment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApartmentFound extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Apartment
     */
    public $apartment;

    /**
     * Create a new message instance.
     *
     * @param Apartment $apartment
     */
    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.apartments.found')
                    ->to($this->apartment->email)
                    ->with('apartment', $this->apartment);
    }
}
