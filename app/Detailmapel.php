<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailmapel extends Model
{
    protected $fillable = [
        'mapel_id',
        'kelas_id',
    ];

    public function mapel(){
        return $this->belongsTo('App\Mapel', 'mapel_id');
    }

    public function kelas(){
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
