<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mapel_id');
            $table->string('nama_materi');
            $table->string('kategori_materi');
            $table->string('keterangan_materi');
            $table->string('berkas_materi')->nullable();
            $table->string('url_video_materi')->nullable();
            $table->string('type_berkas_materi')->default('Image');
            $table->string('status_materi')->default('Aktif');
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
        Schema::dropIfExists('materis');
    }
}
