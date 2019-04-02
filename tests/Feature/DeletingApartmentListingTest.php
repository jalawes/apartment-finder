<?php

namespace Tests\Feature;

use App\User;
use App\Apartment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletingApartmentListingTest extends TestCase
{
    use RefreshDatabase;

    public function testAnAuthorizedUserCanSoftDeleteAnApartmentListing()
    {
        $user = create(User::class);

        $count = random_int(2, 3);

        $listings = create(Apartment::class, ['user_id' => $user], $count);

        $route = route('apartments.destroy', $listings->random());

        $response = $this->signIn($user)->delete($route);

        $response->assertSuccessful();

        $this->assertCount($count - 1, Apartment::all());
    }
}
