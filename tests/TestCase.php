<?php

namespace Tests;

use App\User;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var \Faker\Generator
     */
    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker::create();
    }

    /**
     * Sign in and act as a user.
     *
     * @param \App\Models\User|\Illuminate\Database\Eloquent\Model $user
     * @param null|mixed $guard
     *
     * @return $this
     */
    public function signIn($user = null, $guard = null)
    {
        $user = $user ?? create(User::class);

        $this->actingAs($user, $guard);

        return $this;
    }
}
