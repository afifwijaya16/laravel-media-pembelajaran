<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'  => 'admin',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('admin'),
            'level'  => 'Admin',
        ]);

        DB::table('admins')->insert([
            'name'  => 'guru',
            'email' => 'guru@gmail.com',
            'password'  => bcrypt('guru'),
            'level'  => 'Guru',
        ]);
    }
}
