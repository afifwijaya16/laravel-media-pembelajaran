<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'nama_kecamatan',
        'alamat_kantor',
        'kabkot',
        'provinsi',
        'nama_camat',
        'nip_camat',
        'email_kecamatan',
        'no_telepon',
        'logo_kecamatan',
        'wilayah_administratif',
        'sejarah',
        'visi',
        'misi',
    ];
}
