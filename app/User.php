<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'nik',
        'hubungan_dalam_keluarga',
        'agama',
        'no_telepon',
        'sex',
        'tempatlahir',
        'tanggallahir',
        'pekerjaan',
        'pendidikan_kk',
        'kewarganegaraan',
        'ayah_nik',
        'nama_ayah',
        'ibu_nik',
        'nama_ibu',
        'status_kawin',
        'golongan_darah',
        'foto',
        'alamat_sebelumnya',
        'alamat_sekarang',
        'kelurahan',
        'kecamatan',
        'kabkot',
        'login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
