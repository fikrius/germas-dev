<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Exception;

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

    public function upload(){
        return view('upload');
    }

    public function proses_upload(){
        // echo "post";
        // var_dump($_FILES['image']);exit;
        if(isset($_FILES['image'])){
            $fileName = $_FILES['image']['name'];

            $file = request()->file('image');

            $finalFileName = time()."_".$fileName;
            
            // Opsi 1
            // move_uploaded_file($file, public_path("upload/").$finalFileName);
            
            // Opsi 2
            // $file->move("upload/", $finalFileName)
            try {
                if($file->move("upload/", $finalFileName))
                    throw new Exception("save image to local success");
                throw new Exception("failed");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        }
    }
}
