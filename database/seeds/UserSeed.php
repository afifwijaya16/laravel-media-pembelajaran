<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'no_user'  => '123',
            'name'  => 'user',
            'email' => 'user@gmail.com',
            'no_telepon' => '082273661010',
            'password'  => bcrypt('user'),
        ]);
    }
}
