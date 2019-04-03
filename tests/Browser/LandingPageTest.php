<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LandingPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testCanSeeAppNameOnLandingPage()
    {
        $this->browse(function (Browser $browser) {
            $appName = env('APP_NAME');
            $browser->visit('/')
                    ->assertSee($appName);
        });
    }
}
