<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawabanmateri extends Model
{
    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'materi_id',
        'keterangan_jawaban_materi',
        'nilai',
        'status_jawaban_materi',
    ];
}
