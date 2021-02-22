<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materikelas extends Model
{
    protected $fillable = [
        'materi_id',
        'kelas_id',
    ];

    public function materi(){
        return $this->belongsTo('App\Materi', 'materi_id');
    }

    public function kelas(){
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
