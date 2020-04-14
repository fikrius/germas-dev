<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_kk',30);
            $table->string('nik',30);
            $table->string('nama',150);
            $table->string('tempat_lahir',100);
            $table->string('tanggal_lahir',30);
            $table->string('status_perkawinan',20);
            $table->string('jenis_kelamin',20);
            $table->string('dukuh',50);
            $table->string('rt',10);
            $table->string('rw',10);
            $table->string('disabilitas');
            $table->Text('keterangan');
            $table->integer('status');
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
        Schema::dropIfExists('pemilihs');
    }
}
