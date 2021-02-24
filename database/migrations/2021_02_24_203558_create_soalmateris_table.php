<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalmaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soalmateris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('soal_materi');
            $table->text('jawaban_soal_a');
            $table->text('jawaban_soal_b');
            $table->text('jawaban_soal_c');
            $table->text('jawaban_soal_d');
            $table->text('jawaban_soal_e');
            $table->text('jawaban_benar');
            $table->integer('mapel_id');
            $table->integer('materi_id');

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
        Schema::dropIfExists('soalmateris');
    }
}
