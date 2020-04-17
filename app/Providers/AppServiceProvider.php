<?php

namespace App\Providers;

use App\Pengaturan_aplikasi;
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
    }
}
