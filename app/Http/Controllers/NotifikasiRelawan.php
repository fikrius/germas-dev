<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;

class NotifikasiRelawan extends Controller
{
    public function showAllNotifications(){
        // Get notifikasi relawan
        $notifikasi = Chat::where('user_id',auth()->user()->id)->get();
        // dd($notifikasi);
        return view('notifikasiRelawan')->with(['notifikasi' => $notifikasi]);
    }

    public function sendMessageToAdmin(){
        
    }
}
