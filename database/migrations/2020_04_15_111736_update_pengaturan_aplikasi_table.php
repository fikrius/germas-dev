<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePengaturanAplikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengaturan_aplikasi', function (Blueprint $table) {
            $table->string('nama_aplikasi',100)->nullable()->change();
            $table->string('foto_beranda_1',200)->nullable()->change();
            $table->string('foto_beranda_2',200)->nullable()->change();
            $table->string('foto_beranda_3',200)->nullable()->change();
            $table->string('caption_foto_beranda_1',150)->nullable()->change();
            $table->string('caption_foto_beranda_2',150)->nullable()->change();
            $table->string('caption_foto_beranda_3',150)->nullable()->change();
            $table->text('visi')->nullable()->change();
            $table->text('misi')->nullable()->change();
            $table->string('foto_profil',200)->nullable()->change();
            $table->text('data_pribadi')->nullable()->change();
            $table->text('data_keluarga')->nullable()->change();
            $table->text('data_riwayat_pendidikan')->nullable()->change();
            $table->text('data_riwayat_pekerjaan')->nullable()->change();
            $table->text('data_riwayat_pengabdian_masyarakat')->nullable()->change();
            $table->string('foto_tengah',200)->nullable()->change();
            $table->string('caption_foto_tengah',150)->nullable()->change();
            $table->string('caption_lain',150)->nullable()->change();
            $table->string('telepon',50)->nullable()->change();
            $table->string('email',50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaturan_aplikasi', function (Blueprint $table) {
            $table->string('nama_aplikasi',100)->nullable()->change();
            $table->string('foto_beranda_1',200)->nullable()->change();
            $table->string('foto_beranda_2',200)->nullable()->change();
            $table->string('foto_beranda_3',200)->nullable()->change();
            $table->string('caption_foto_beranda_1',150)->nullable()->change();
            $table->string('caption_foto_beranda_2',150)->nullable()->change();
            $table->string('caption_foto_beranda_3',150)->nullable()->change();
            $table->text('visi')->nullable()->change();
            $table->text('misi')->nullable()->change();
            $table->string('foto_profil',200)->nullable()->change();
            $table->text('data_pribadi')->nullable()->change();
            $table->text('data_keluarga')->nullable()->change();
            $table->text('data_riwayat_pendidikan')->nullable()->change();
            $table->text('data_riwayat_pekerjaan')->nullable()->change();
            $table->text('data_riwayat_pengabdian_masyarakat')->nullable()->change();
            $table->string('foto_tengah',200)->nullable()->change();
            $table->string('caption_foto_tengah',150)->nullable()->change();
            $table->string('caption_lain',150)->nullable()->change();
            $table->string('telepon',50)->nullable()->change();
            $table->string('email',50)->nullable()->change();
        });
    }
}
