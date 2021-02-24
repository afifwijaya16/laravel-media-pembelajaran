<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soalmateri extends Model
{
    protected $fillable = [
        'soal_materi',
        'jawaban_soal_a',
        'jawaban_soal_b',
        'jawaban_soal_c',
        'jawaban_soal_d',
        'jawaban_soal_e',
        'jawaban_benar',
        'mapel_id',
        'materi_id',
    ];
}
