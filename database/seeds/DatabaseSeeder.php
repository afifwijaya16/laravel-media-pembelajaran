<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeed::class,
            UserSeed::class,
            ProfilSeeder::class,
            KelasSeeder::class,
        ]);
    }
}
