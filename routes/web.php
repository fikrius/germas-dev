<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//routing root
Route::get('/','PageController@index');

//auth
Auth::routes();

//routing auth user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/dataChart','HomeController@dataChart')->middleware('auth');
Route::get('/home/ChartPerWilayah','HomeController@ChartPerWilayah')->middleware('auth');
Route::get('/home/ChartAnalisis','HomeController@ChartAnalisis')->middleware('auth');

//routing get data pengaduan
Route::get('/daftarpengaduan12345','PengaduanController@getDataPengaduan')->middleware('auth');
Route::get('/daftarpengaduan12345/{id}','PengaduanController@destroy')->middleware('auth');

//routing auth admin
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

//routing kirim pengaduan
Route::resource('pengaduan','PengaduanController');

//routing tentang (static)
Route::get('tentang','PageController@index');

//routing fitur admin
Route::resource('pemilih','PemilihController')->middleware('auth');
Route::get('pemilih/json','PemilihController@json');
Route::post('pemilih/read','PemilihController@read');
Route::get('logrelawan','PetakanPemilihController@makeLog')->middleware('auth');

//routing fitur relawan
Route::middleware(['auth'])->group(function(){
	Route::get('petakanpemilih','PetakanPemilihController@getIndex')->name('petakanpemilih');
	Route::get('petakanpemilih/anyData','PetakanPemilihController@anyData')->name('petakanpemilih.anyData');
	Route::get('petakanpemilih/getKeterangan/{id_user}','PetakanPemilihController@getKeterangan');
	Route::get('petakanpemilih/updateKeterangan','PetakanPemilihController@updateKeterangan');
});

//routing daftar relawan
Route::get('daftarrelawanfjvixcplkrbprsci','RelawanController@index')->middleware('auth');

//update status pemilih
Route::get('petakanpemilih/{id}/{status}','PetakanPemilihController@updateStatus')->middleware('auth');

//tambah data pemilih
Route::post('petakanpemilih/tambahData','PetakanPemilihController@tambahData')->middleware('auth');

//Route pengaturan aplikasi
Route::get('pengaturan','PengaturanAplikasiController@index')->middleware('auth');
Route::post('pengaturan/create','PengaturanAplikasiController@create')->middleware('auth');
Route::post('pengaturan/createGaleri','PengaturanAplikasiController@createGaleri')->middleware('auth');

//Uji coba redis
Route::get('/pemilih_cache', 'PetakanPemilihController@getPemilihWithCache');
Route::get('/pemilih_query', 'PetakanPemilihController@getPemilihWithQuery');

