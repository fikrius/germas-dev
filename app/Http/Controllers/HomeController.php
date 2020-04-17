<?php

namespace App\Http\Controllers;

use App\Pengaturan_aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Redirect,Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        //Get data pengaturan aplikasi
        $data = Pengaturan_aplikasi::all();
        return view('admin');
    }

    //grafik pemetaan per wilayah (RW)
    public function ChartPerWilayah(){
        $rw1 = DB::table('pemilihfix')->where('id_pemilih','LIKE','1.%')->get()->count();
        $rw2 = DB::table('pemilihfix')->where('id_pemilih','LIKE','2.%')->get()->count();
        $rw3 = DB::table('pemilihfix')->where('id_pemilih','LIKE','3.%')->get()->count();
        $rw4 = DB::table('pemilihfix')->where('id_pemilih','LIKE','4.%')->get()->count();
        $rw5 = DB::table('pemilihfix')->where('id_pemilih','LIKE','5.%')->get()->count();
        $rw6 = DB::table('pemilihfix')->where('id_pemilih','LIKE','6.%')->get()->count();
        $rw7 = DB::table('pemilihfix')->where('id_pemilih','LIKE','7.%')->get()->count();

        $data = [
            'rw1' => $rw1,
            'rw2' => $rw2,
            'rw3' => $rw3,
            'rw4' => $rw4,
            'rw5' => $rw5,
            'rw6' => $rw6,
            'rw7' => $rw7
        ];

        return Response::json($data);
    }   

    // chart analisis lebih lanjut tiap RW
    public function ChartAnalisis(){
        //Pasti, ragu, tidak
        //RW 1
        $rw1_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','1.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw1_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','1.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw1_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','1.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        //RW 2
        $rw2_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','2.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw2_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','2.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw2_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','2.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        //RW 3
        $rw3_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','3.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw3_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','3.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw3_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','3.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        //RW 4
        $rw4_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','4.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw4_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','4.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw4_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','4.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        //RW 5
        $rw5_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','5.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw5_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','5.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw5_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','5.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        //RW 6
        $rw6_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','6.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw6_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','6.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw6_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','6.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        //RW 7
        $rw7_pasti = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','7.%'],
            ['status','Pasti Memilih']
        ])->get()->count();

        $rw7_ragu = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','7.%'],
            ['status','Ragu Memilih']
        ])->get()->count();

        $rw7_tidak = DB::table('pemilihfix')->where([
            ['id_pemilih','LIKE','7.%'],
            ['status','Pasti Tidak Memilih']
        ])->get()->count();

        $data = [
            'rw1' => [
                'pasti' => $rw1_pasti,
                'ragu' => $rw1_ragu,
                'tidak' => $rw1_tidak
            ],
            'rw2' => [
                'pasti' => $rw2_pasti,
                'ragu' => $rw2_ragu,
                'tidak' => $rw2_tidak
            ],
            'rw3' => [
                'pasti' => $rw3_pasti,
                'ragu' => $rw3_ragu,
                'tidak' => $rw3_tidak
            ],
            'rw4' => [
                'pasti' => $rw4_pasti,
                'ragu' => $rw4_ragu,
                'tidak' => $rw4_tidak
            ],
            'rw5' => [
                'pasti' => $rw5_pasti,
                'ragu' => $rw5_ragu,
                'tidak' => $rw5_tidak
            ],
            'rw6' => [
                'pasti' => $rw6_pasti,
                'ragu' => $rw6_ragu,
                'tidak' => $rw6_tidak
            ],
            'rw7' => [
                'pasti' => $rw7_pasti,
                'ragu' => $rw7_ragu,
                'tidak' => $rw7_tidak
            ]
        ];
        
        return Response::json($data);

    }

    //grafik pemetaan secara umum
    public function dataChart(){

        //load data chart
        //ambil data pasti memilih
        $pasti_memilih = DB::table('pemilihfix')->where('status','Pasti Memilih')->get()->count();

        //ambil data ragu memilih
        $ragu_memilih = DB::table('pemilihfix')->where('status','Ragu Memilih')->get()->count();

        //ambil data tidak memilih
        $tidak_memilih = DB::table('pemilihfix')->where('status','Pasti Tidak Memilih')->get()->count();

        //ambil data jumlah pemilih
        $jumlah_pemilih = DB::table('pemilihfix')->get()->count();

        //ambil data pemilih belum di vote
        $jumlah_belum_vote = DB::table('pemilihfix')->where('status','0')->get()->count();

        $data = array(
            'pasti_memilih' => $pasti_memilih,
            'ragu_memilih' => $ragu_memilih,
            'tidak_memilih' => $tidak_memilih,
            'jumlah_pemilih' => $jumlah_pemilih,
            'jumlah_belum_vote' => $jumlah_belum_vote
        );

        return Response::json($data);

    }

}
