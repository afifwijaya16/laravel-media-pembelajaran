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
            $table->string('no_user')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('sex')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('nama_orang_tua')->nullable();
            $table->string('no_telepon_orang_tua')->nullable();
            $table->string('kategori')->nullable();
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
