<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailkelas extends Model
{
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'keterangan',
    ];

    public function siswa(){
        return $this->belongsTo('App\User', 'siswa_id');
    }

    public function kelas(){
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
