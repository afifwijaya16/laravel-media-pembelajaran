<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawabandetailmateri extends Model
{
    protected $fillable = [
        'jawaban_materi_id',
        'soal_id',
        'jawaban_yang_dipilih',
    ];

    public function jawaban(){
        return $this->belongsTo('App\Jawabanmateri', 'jawaban_materi_id');
    }
}
