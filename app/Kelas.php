<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'kelas',
        'kategori_kelas',
        'jumlah_siswa',
    ];

    public function Detailkelas(){
        return $this->hasMany('App\Detailkelas');
    }
}
