<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Button;
use Redirect,Response;
use App\Pemilih;
use App\User;
use App\Pengaduan;
use Illuminate\Support\Facades\Cache;

class PetakanPemilihController extends Controller
{
	public function getIndex()
    {
        // $data = User::all();
        $data = Cache::remember('pemilih',10*60,function(){
            return User::all();
        });

        return view('petakanpemilih')->withData($data);
    }

    public function anyData()
    {
        $pemilih = DB::table('pemilihfix')->select(['id_table', 'id_pemilih', 'nama', 'status','keterangan']);

        // return Datatables::of($pemilih)->make(true);
        return Datatables::of($pemilih)
        		->addIndexColumn()
        		->addColumn('action', function($row){

        			$btn = '
                            <button id="btn-pasti" class="btn btn-success btn-sm" value="'.$row->id_table.'">Pasti</button>
                            <button id="btn-ragu" class="btn btn-warning btn-sm" value="'.$row->id_table.'">Ragu</button>
                            <button id="btn-tidak" class="btn btn-danger btn-sm" value="'.$row->id_table.'">Tidak</button>
                            <button id="btn-reset" class="btn btn-secondary btn-sm" value="'.$row->id_table.'">Reset</button>
        			';

        			return $btn;

        		})
                ->addColumn('keterangan', function($row){

                    $btn_lihat_ket = '
                        <button id="btn-lihat-ket" class="btn btn-primary btn-sm" value="'.$row->id_table.'" data-toggle="modal" data-target="#formMentionRelawan">Lihat</button>
                    ';

                    return $btn_lihat_ket;
  
                })
        		->rawColumns(['action','keterangan'])
        		->make(true);

                

    }

    //lihat keterangan
    public function getKeterangan($id_user){
        $keterangan = DB::table('pemilihfix')->select('keterangan')->where('id_table','=',$id_user)->get();
        // dd($keterangan);
        return Response::json($keterangan);
    }

    // update keterangan
    public function updateKeterangan(Request $request){
        $keterangan = $request->keterangan;
        $id_pemilih = $request->id;
        
        $insertKet = DB::table('pemilihfix')->where("id_table",$id_pemilih)->update([
            "keterangan" => $keterangan
        ]); 

        return response()->json(['success'=>'Data is successfully updated']);
    }

    //Log aktivitas relawan
    //1. Mengubah status pemilih
    //ex : Relawan Fikri mengubah status Kusnan dari "pasti" ke "tidak pasti"
    public function makeLog(){
        echo "haha";
    }

    //update status pemilih
    public function updateStatus($id,$status){
        // dd($id);
        $status = DB::table('pemilihfix')->where('id_table',$id)->update(['status' => $status]);
        return Response::json($status);
    }

    //tambah data pemilih
    public function tambahData(Request $request){
        // $nama = $request->nama;
        // $rt = $request->rt;
        // $rw = $request->rw;
        // $dukuh = $request->dukuh;

        // //insert data
        // $check = DB::table('pemilihs')->insert([
        //     ['nama' => $nama],
        //     ['rt' => $rt],
        //     ['rw' => $rw],
        //     ['dukuh' => $dukuh]
        // ]);

        $data = $request->all();
        $check = Pemilih::insert($data);
        $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        if($check){ 
            $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        }
        return Response()->json($arr);

        //versi 2
        // $data = $request->all();
        // $check = Pemilih::insert($data);
        // $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        // if($check){ 
        //     $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        // }
        // return Response()->json($arr);

    }

    //ambil data user, untuk keterangan//tepatnya memilih relawan untuk memprospek pemilih
    // public function getDataRelawan(){
    //     $data = User::all();

    //     return view('petakanpemilih')->withData($data);
    // }

    // public function getPemilihWithCache(){
    //     $query = Cache::remember("pemilih_all",1*60,function(){
    //         return Pemilih::all();
    //     });

    //     foreach($query as $q){
    //         echo "<li>{{$q->nama}}</li>";
    //     }
    // }

    // public function getPemilihWithQuery(){
    //     $query = Pemilih::all();
    //     foreach($query as $q){
    //         echo "<li>{{$q->nama}}</li>";
    //     }
    // }


}
