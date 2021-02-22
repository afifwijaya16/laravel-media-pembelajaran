<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'kelas'  => 'I A',
            'kategori_kelas' => 'Gold',
            'jumlah_siswa'  => '5',
        ]);

        DB::table('kelas')->insert([
            'kelas'  => 'I B',
            'kategori_kelas' => 'Silver',
            'jumlah_siswa'  => '10',
        ]);
    }
}
