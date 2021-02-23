<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'nama_mapel',
        'pukul_mapel',
        'hari_mapel',
        'keterangan_mapel',
        'guru_id',
    ];

    public function detailmapel(){
        return $this->hasMany('App\Detailmapel');
    }

    public function guru(){
        return $this->belongsTo('App\Admin', 'guru_id');
    }

    public function materi(){
        return $this->hasMany('App\Materi');
    }
}
