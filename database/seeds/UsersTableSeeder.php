<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jamal',
            'email' => env('MAIL_FROM_ADDRESS'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('MAIL_PASSWORD')),
        ]);
    }
}
