<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Mail\ApartmentFound;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;

class ReplyingToApartmentPostTest extends TestCase
{
    public function testAnAuthenticatedUserCanSendAnEmailToTheAuthorOfAListing()
    {
        Event::fake();
        Mail::fake();

        $user = create(User::class);

        $route = route('apartments.store');

        $parameters = [
            'email' => $email = $this->faker->email,
            'url' => $this->faker->url,
            'sendEmail' => true,
        ];

        $response = $this->signIn($user)->post($route, $parameters);

        Mail::assertSent(ApartmentFound::class);
    }
}
