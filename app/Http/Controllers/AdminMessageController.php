<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\AdminMessage;

class AdminMessageController extends Controller
{

    public function ShowSendMessageToRelawan($id){
        $data_user = User::find($id);
        $data_pesan = Chat::where('user_id','=',$id)->get();

        return view('fiturAdmin.sendMessageToRelawan')->with([
                                                            'user' => $data_user, 
                                                            'data_pesan' => $data_pesan
                                                        ]);
    }

    public function sendMessageToRelawan(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        // Validasi form pesan
        $request->validate([
            'pesan' => 'required'
        ]);

        // Cari user tujuan yang akan dikirim notifikasi
        $user_id = User::find($request->user_id);
        
        // Simpan pesan ke database chats
        $pesan = Chat::create([
            'user_id' => $request->user_id,
            'pesan' => $request->pesan
        ]);

        // Kirim Notifikasi pesan ke user
        $details = [
            'user_id' => $request->user_id,
            'pesan' => $request->pesan
        ];

        Notification::send($user_id, new AdminMessage($details));

        return redirect('daftarrelawanfjvixcplkrbprsci/pesan/'.$request->user_id);
    }

    
}
