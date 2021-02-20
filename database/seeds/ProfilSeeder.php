<?php

use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profil::create([
            'nama_profil'  => 'profil',
            'alamat_kantor' => 'Jalan',
            'email_profil' => 'profil@gmail.com',
            'no_telepon' => '07211111',
            'logo' => '-',
        ]);
    }
}
