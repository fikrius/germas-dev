<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemilih extends Model
{
    protected $table = "pemilihs";
    protected $fillable = [
        "id",
        "no_kk",
        "nik",
        "nama",
        "tempat_lahir",
        "tanggal_lahir",
        "status_perkawinan",
        "jenis_kelamin",
        "dukuh",
        "rt",
        "rw",
        "disabilitas",
        "keterangan",
        "status",
        "created_at",
        "updated_at"
    ];

    public static function getAll(){
        return Pemilih::all();
    }

    public static function getSingle($id){
        return Pemilih::findOrFail($id);
    }

    public static function updatePemilih($id, $data){
        return DB::table('pemilihs')->where('id', $id)->update($data);
    }

    public static function createPemilih($data){
        return Pemilih::insert($data);
    }

    public static function deletePemilih($id){
        return Pemilih::findOrFail($id)->delete();
    }

}
