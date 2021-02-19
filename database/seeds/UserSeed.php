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
            'nik'  => '123',
            'name'  => 'suhenda',
            'email' => 'suhenda@gmail.com',
            'no_telepon' => '082273661010',
            'password'  => bcrypt('123'),
        ]);
    }
}
