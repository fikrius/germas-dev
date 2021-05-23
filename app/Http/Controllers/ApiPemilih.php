<?php

namespace App\Http\Controllers;

use App\Pemilih;
use Illuminate\Http\Request;

class ApiPemilih extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Jakarta');
    }

    public function getAll(){
        $data = Pemilih::getAll();

        return $this->response($data);
    }

    public function getSingle($id){
        $data = Pemilih::getSingle($id);

        return $this->response($data);
    }

    public function create(){
        $data = [
            'no_kk' => request()->input('no_kk'),
            'nik' => request()->input('nik'),
            'nama' => request()->input('nama'),
            'tempat_lahir' => request()->input('tempat_lahir'),
            'tanggal_lahir' => request()->input('tanggal_lahir'),
            'status_perkawinan' => request()->input('status_perkawinan'),
            'jenis_kelamin' => request()->input('jenis_kelamin'),
            'dukuh' => request()->input('dukuh'),
            'rt' => request()->input('rt'),
            'rw' => request()->input('rw'),
            'disabilitas' => request()->input('disabilitas'),
            'keterangan' => request()->input('keterangan'),
            'status' => request()->input('status'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $create = Pemilih::createPemilih($data);

        if($create){
            return $this->response($data);
        }
    }

    public function update($id){
        $pemilih = Pemilih::findOrFail($id);
        $pemilih->no_kk = request()->input('no_kk');
        $pemilih->nik = request()->input('nik');
        $pemilih->nama = request()->input('nama');
        $pemilih->tempat_lahir = request()->input('tempat_lahir');
        $pemilih->tanggal_lahir = request()->input('tanggal_lahir');
        $pemilih->status_perkawinan = request()->input('status_perkawinan');
        $pemilih->jenis_kelamin = request()->input('jenis_kelamin');
        $pemilih->dukuh = request()->input('dukuh');
        $pemilih->rt = request()->input('rt');
        $pemilih->rw = request()->input('rw');
        $pemilih->disabilitas = request()->input('disabilitas');
        $pemilih->keterangan = request()->input('keterangan');
        $pemilih->status = request()->input('status');
        $pemilih->updated_at = date("Y-m-d H:i:s");
        $pemilih->save();

        if($pemilih){
            // return $this->response($data = null);
            return $this->response([
                "msg" => "updated"
            ]);
        }
    }

    public function delete($id){
        // Called instance method
        // $pemilih =  new Pemilih();
        // $delete = $pemilih->deletePemilih($id);

        // Called static method
        $delete = Pemilih::deletePemilih($id);

        // $delete = Pemilih::delete($id);

        if($delete){
            return $this->response("deleted");
        }
    }

    private function response($data){
        switch (request()->method()){
            case 'POST' || 'GET' || 'PUT' || 'PATCH': 
                if(isset($data) && !empty($data)){
                    return [
                        'request_type' => request()->method(),
                        'status' => 200,
                        'message' => 'success',
                        'results' => $data
                    ];  
                }
                return [
                    'request_type' => request()->method(),
                    'status' => 400,
                    'message' => 'Data Not Found',
                    'results' => $data
                ]; 

                break;
            
            case 'DELETE': 
                return [
                    'request_type' => request()->method(),
                    'status' => 200,
                    'message' => 'Data Deleted',
                ]; 
            break;

            default: 
                break;
                    
        }

        
    }
}
