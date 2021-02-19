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
            'nama_kecamatan'  => 'Sukarame',
            'alamat_kantor' => 'Perum Korpri Blok B6 Korpri Raya',
            'kabkot' => 'Bandar Lampung',
            'provinsi' => 'Lampung',
            'nama_camat' => 'Zolahuddin Al Zam Zami, S.Sos., MM',
            'nip_camat' => '1972051919922031002',
            'email_kecamatan' => 'Sukarame@gmail.com',
            'no_telepon' => '07211446',
            'logo_kecamatan' => '-',
            'wilayah_administratif' => '-',
            'sejarah' => '-',
            'visi' => '-',
            'misi' => '-',
        ]);
    }
}
