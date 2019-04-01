<?php

namespace App\Mail;

use App\Apartment;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApartmentFound extends Mailable
{
    use SerializesModels;

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
                    ->subject('Apartment Listing')
                    ->to($this->apartment->email)
                    ->with('apartment', $this->apartment);
    }
}
