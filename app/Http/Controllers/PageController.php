<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Pengaturan_aplikasi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        //Get data galeri
        $data_galeri = Galeri::all();

    	return view('welcome')->with('data_galeri', $data_galeri);
    }
}
