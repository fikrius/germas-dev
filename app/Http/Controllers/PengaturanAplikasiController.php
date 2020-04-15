<?php

namespace App\Http\Controllers;

use App\Pengaturan_aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PengaturanAplikasiController extends Controller
{
    public function index(){
        return view('fiturAdmin.pengaturan');
    }

    public function savePhotoToDB($str1, $col1, $str2, $col2, $str3, $col3, $str4, $col4, $str5, $col5, $str){
        $data = new Pengaturan_aplikasi;
        $data->$col1 = $str1;
        $data->$col2 = $str2;
        $data->$col3 = $str3;
        $data->$col4 = $str4;
        $data->$col5 = $str5;
        $data->nama_aplikasi = $str[0];
        $data->caption_foto_beranda_1 = $str[1];
        $data->caption_foto_beranda_2 = $str[2];
        $data->caption_foto_beranda_3 = $str[3];
        $data->visi = $str[4];
        $data->misi = $str[5];
        $data->data_pribadi = $str[6];
        $data->data_keluarga = $str[7];
        $data->data_riwayat_pendidikan = $str[8];
        $data->data_riwayat_pengabdian_masyarakat = $str[9];
        $data->caption_foto_tengah = $str[10];
        $data->caption_lain = $str[11];
        $data->telepon = $str[12];
        $data->email = $str[13];
        $data->save();
        return true;
    }

    public function savePhotoToLocal($path, $file, $nama_file){
        $file->move($path, $nama_file);
        return true;
    }

    public function create(Request $request){
        //Validasi Form
        $this->validate($request, [
            'foto_beranda_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_beranda_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_beranda_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'foto_tengah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        
        $data_str = new Pengaturan_aplikasi;

        //Nama Aplikasi
        $nama_aplikasi = $request->nama_aplikasi;
        $data_str->nama_aplikasi = $nama_aplikasi;
        
        //Caption Foto Beranda 1
        $caption_foto_beranda_1 = $request->caption_foto_beranda_1;
        $data_str->caption_foto_beranda_1 = $caption_foto_beranda_1;

        //Caption Foto Beranda 2
        $caption_foto_beranda_2 = $request->caption_foto_beranda_2;
        $data_str->caption_foto_beranda_2 = $caption_foto_beranda_2;

        //Caption Foto Beranda 3
        $caption_foto_beranda_3 = $request->caption_foto_beranda_3;
        $data_str->caption_foto_beranda_3 = $caption_foto_beranda_3;
        
        //Visi
        $visi = $request->visi;
        $data_str->visi = $visi;

        //Misi
        $misi = $request->misi;
        $data_str->misi = $misi;

        //Data Pribadi
        $data_pribadi = $request->data_pribadi;
        $data_str->data_pribadi = $data_pribadi;

        //Data Keluarga
        $data_keluarga = $request->data_keluarga;
        $data_str->data_keluarga = $data_keluarga;

        //Data Riwayat Pendidikan
        $data_riwayat_pendidikan = $request->data_riwayat_pendidikan;
        $data_str->data_riwayat_pendidikan = $data_riwayat_pendidikan;

        //Data Riwayat Pengabdian Masyarakat
        $data_riwayat_pengabdian_masyarakat = $request->data_riwayat_pengabdian_masyarakat;   
        $data_str->data_riwayat_pengabdian_masyarakat = $data_riwayat_pengabdian_masyarakat; 

        //Caption Foto Tengah
        $caption_foto_tengah = $request->caption_foto_tengah;
        $data_str->caption_foto_tengah = $caption_foto_tengah;

        //Caption Lain
        $caption_lain = $request->caption_lain;
        $data_str->caption_lain = $caption_lain;

        //Telepon
        $telepon = $request->telepon;
        $data_str->telepon = $telepon;

        // Email
        $email = $request->email;
        $data_str->email = $email;

        //Data dengan tipe data string
        // $str = [
        //     'nama_aplikasi' => $nama_aplikasi,
        //     'caption_foto_beranda_1' => $caption_foto_beranda_1,
        //     'caption_foto_beranda_2' => $caption_foto_beranda_2,
        //     'caption_foto_beranda_3' => $caption_foto_beranda_3,
        //     'visi' => $visi,
        //     'misi' => $misi,
        //     'data_pribadi' => $data_pribadi,
        //     'data_riwayat_pendidikan' => $data_riwayat_pendidikan,
        //     'data_riwayat_pengabdian_masyarakat' => $data_riwayat_pengabdian_masyarakat,
        //     'caption_foto_tengah' => $caption_foto_tengah,
        //     'caption_lain' => $caption_lain,
        //     'telepon' => $telepon,
        //     'email' => $email
        // ];

        $str = [
            $nama_aplikasi, $caption_foto_beranda_1, $caption_foto_beranda_2,
            $caption_foto_beranda_3, $visi, $misi, $data_pribadi, $data_keluarga, $data_riwayat_pendidikan, 
            $data_riwayat_pengabdian_masyarakat, $caption_foto_tengah, $caption_lain, $telepon, $email
        ];

        $file_foto_beranda_1 = $request->file('foto_beranda_1');
        $file_foto_beranda_2 = $request->file('foto_beranda_2');
        $file_foto_beranda_3 = $request->file('foto_beranda_3');
        $file_foto_profil = $request->file('foto_profil');
        $file_foto_tengah = $request->file('foto_tengah');
        

        //Foto Beranda 1
        $nama_foto_beranda_1 = time().'-'.$file_foto_beranda_1->getClientOriginalName();

        //1. Simpan Foto Asli ke Lokal
        $this->savePhotoToLocal('data_file',$file_foto_beranda_1,$nama_foto_beranda_1);


        //Foto Beranda 2
        $nama_foto_beranda_2 = time().'-'.$file_foto_beranda_2->getClientOriginalName();

        //1. Simpan Foto Asli ke Lokal
        $this->savePhotoToLocal('data_file',$file_foto_beranda_2,$nama_foto_beranda_2);

        //Foto Beranda 3
        $nama_foto_beranda_3 = time().'-'.$file_foto_beranda_3->getClientOriginalName();

        //1. Simpan Foto Asli ke Lokal
        $this->savePhotoToLocal('data_file',$file_foto_beranda_3,$nama_foto_beranda_3);

        //Foto Profil
        $nama_foto_profil = time().'-'.$file_foto_profil->getClientOriginalName();

        //1. Simpan Foto Asli ke Lokal
        $this->savePhotoToLocal('data_file',$file_foto_profil,$nama_foto_profil);

        //Foto Tengah
        $nama_foto_tengah = time().'-'.$file_foto_tengah->getClientOriginalName();

        //1. Simpan Foto Asli ke Lokal
        $this->savePhotoToLocal('data_file',$file_foto_tengah,$nama_foto_tengah);

        $this->savePhotoToDB(
            $nama_foto_beranda_1, 'foto_beranda_1', 
            $nama_foto_beranda_2, 'foto_beranda_2',
            $nama_foto_beranda_3, 'foto_beranda_3',
            $nama_foto_profil, 'foto_profil',
            $nama_foto_tengah, 'foto_tengah',
            $str
        );

        return redirect('/pengaturan')->with(['success' => 'Upload Berhasil']);
        
    }

    

}
