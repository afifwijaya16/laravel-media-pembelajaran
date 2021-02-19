<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nik')->nullable();
            $table->string('hubungan_dalam_keluarga')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabkot')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('sex')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan_kk')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('ayah_nik')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('ibu_nik')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('login')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
