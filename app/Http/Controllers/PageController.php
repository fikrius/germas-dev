<?php

namespace App\Http\Controllers;

use App\Pengaturan_aplikasi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        //Get data pengaturan Aplikasi
        $data = Pengaturan_aplikasi::latest()->first();
        // dd($data);
    	return view('welcome')->withData($data);
    }
}
