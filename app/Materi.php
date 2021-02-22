<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'nama_materi',
        'kategori_materi',
        'keterangan_materi',
        'berkas_materi',
        'type_berkas_materi',
        'url_video_materi',
        'status_materi',
        'mapel_id',
    ];

    public function mapel(){
        return $this->belongsTo('App\Mapel', 'mapel_id');
    }

    public function materikelas(){
        return $this->hasMany('App\Materikelas');
    }
}
