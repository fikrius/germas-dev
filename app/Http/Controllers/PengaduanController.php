<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Notification;
use App\Notifications\NotifikasiPengaduan;
use App\Pengaduan;
use Redirect,Response;


class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengaduan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pengaduan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek apakah form kosong
        if($request->get('pengaduan') == null){
            return redirect('pengaduan')->with(['error' => 'Pengaduan gagal dikirim!']);
        }else{
            $pengaduan = new \App\Pengaduan;
            $pengaduan->isi_pengaduan = $request->get('pengaduan');
            $pengaduan->save();

            //Simpan Notifikasi
            $admin = User::where('isAdmin',1)->first();
            $details = [
                'greeting' => 'Hai, ada pengaduan',
                'actionText' => 'Silahkan baca pengaduan dengan meng klik tombol dibawah ini',
                'actionURL' => url('/daftarpengaduan12345'),
                'thanks' => 'terima kasih',
                'pengaduan' => $request->pengaduan,
                'pengaduan_id' => $pengaduan->id
            ];
            Notification::send($admin, new NotifikasiPengaduan($details));

            return redirect('pengaduan')->with('success','Pengaduan telah dikirim!');
        }

    }

    public function read(){
        
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        // dd($date);

        $users = DB::table('notifications')->where('type','App\Notifications\NotifikasiPengaduan')
                                            ->update(['read_at' => $date]);
        // dd($dateTime);
        // $users->read_at = $date;
        // $users->save();

        return redirect('/daftarpengaduan12345');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_pengaduan = $id;
        $delete = DB::table("pengaduans")->where("id",$id_pengaduan)->delete();
        if($delete){
            return Response::json(["success" => "Pengaduan berhasil dihapus"]);    
        }else{
            return Response::json(["gagal" => "Pengaduan gagal dihapus x"]);
        }
        

    }

    //ambil data pengaduan
    public function getDataPengaduan(){
        $data = DB::table("pengaduans")->orderBy("id","desc")->get();

        return view('fiturAdmin.daftarPengaduan')->withData($data);
    }
}
