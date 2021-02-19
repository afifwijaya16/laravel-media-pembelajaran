<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kecamatan')->nullable();
            $table->string('alamat_kantor')->nullable();
            $table->string('kabkot')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('nama_camat')->nullable();
            $table->string('nip_camat')->nullable();
            $table->string('email_kecamatan')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('logo_kecamatan')->nullable();
            $table->text('wilayah_administratif')->nullable();
            $table->text('sejarah')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
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
        Schema::dropIfExists('profils');
    }
}
