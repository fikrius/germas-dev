<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilih;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;


class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){
        return Datatables::of(Pemilih::all())->make(true);
    }


    //menampilkan pemilih di halaman admin
    public function index(Request $request)
    {   
        $data = Pemilih::all ();
        return view ( 'fiturAdmin.daftarPemilih' )->withData ( $data );
        // $data = Db::table('pemilihs')->get();
        // return view('fiturAdmin.daftarPemilih',['data' => $data]);
    }

    //get log petakan pemilih
    //melihat history relawan dalam memetakan pemilih
    public function getLog(){
        echo "log pemilih";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
