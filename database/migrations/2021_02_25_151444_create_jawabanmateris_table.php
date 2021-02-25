<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanmaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabanmateris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mapel_id');
            $table->integer('materi_id');
            $table->integer('siswa_id');
            $table->string('keterangan_jawaban_materi');
            $table->integer('nilai')->nullable();
            $table->string('status_jawaban_materi')->default('Sedang Mengerjakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabanmateris');
    }
}
