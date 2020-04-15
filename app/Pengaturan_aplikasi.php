<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaturan_aplikasi extends Model
{
    protected $table = 'pengaturan_aplikasi';
    protected $fillable = ['nama_aplikasi','foto_beranda_1','foto_beranda_2','foto_beranda_3','caption_foto_beranda_1','caption_foto_beranda_2','caption_foto_beranda_3','visi','misi','foto_profil','data_pribadi','data_keluarga','data_riwayat_pendidikan','data_riwayat_pekerjaan','data_riwayat_pengabdian_masyarakat','foto_tengah','caption_lain','telepon','email'];
}
