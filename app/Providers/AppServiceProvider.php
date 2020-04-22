<?php

namespace App\Providers;

use App\Pengaduan;
use App\Pengaturan_aplikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Parsing data pengaturan aplikasi ke semua view
        View::composer('*', function($view){
            $data_pengaturan = Pengaturan_aplikasi::latest()->first();

            $view->with('data_pengaturan', $data_pengaturan);
        });

        View::composer('layouts.app', function($view){
            $type = 'App\Notifications\NotifikasiPengaduan';
            $data_notifikasi_pengaduan = DB::table('notifications')->where('type', $type)
                                                                    ->where('read_at', NULL)->count();
            $view->with('data_notifikasi_pengaduan', $data_notifikasi_pengaduan);
        });
    }
}
