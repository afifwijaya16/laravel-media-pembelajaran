<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'nama_profil',
        'alamat_kantor',
        'email_profil',
        'no_telepon',
        'logo',
    ];
}
