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
Auth::routes(['register' => false]);

//RELAWAN & ADMIN
//routing home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/dataChart','HomeController@dataChart')->middleware('auth');
Route::get('/home/ChartPerWilayah','HomeController@ChartPerWilayah')->middleware('auth');
Route::get('/home/ChartAnalisis','HomeController@ChartAnalisis')->middleware('auth');

//ADMIN
Route::middleware(['admin'])->group(function(){
	//routing get data pengaduan
	Route::get('/daftarpengaduan12345','PengaduanController@getDataPengaduan');
	Route::get('/daftarpengaduan12345/{id}','PengaduanController@destroy');
	Route::get('/read','PengaduanController@read');
	Route::get('logrelawan','PetakanPemilihController@makeLog');
	Route::get('daftarrelawanfjvixcplkrbprsci','RelawanController@index');
	
	//Route pengaturan aplikasi
	Route::get('pengaturan','PengaturanAplikasiController@index');
	Route::post('pengaturan/create','PengaturanAplikasiController@create');
	Route::post('pengaturan/createGaleri','PengaturanAplikasiController@createGaleri');
	Route::get('pengaturan/delete/{id}','PengaturanAplikasiController@deleteGaleri');
	Route::post('pengaturan/deleteall','PengaturanAplikasiController@deleteAllPengaturan');

	//Route beri pesan ke relawan
	Route::get('/daftarrelawanfjvixcplkrbprsci/pesan/{id}', 'AdminMessageController@ShowSendMessageToRelawan');
	Route::post('/daftarrelawanfjvixcplkrbprsci/sendMessage', 'AdminMessageController@sendMessageToRelawan');

});

Route::get('/cekpass', 'PengaturanAplikasiController@cek');

//routing fitur petakan pemilih (ADMIN, RELAWAN)
Route::middleware(['auth'])->group(function(){
	Route::get('petakanpemilih','PetakanPemilihController@getIndex')->name('petakanpemilih');
	Route::get('petakanpemilih/anyData','PetakanPemilihController@anyData')->name('petakanpemilih.anyData');
	Route::get('petakanpemilih/getKeterangan/{id_user}','PetakanPemilihController@getKeterangan');
	Route::get('petakanpemilih/updateKeterangan','PetakanPemilihController@updateKeterangan');
	
	//update status pemilih
	Route::get('petakanpemilih/{id}/{status}','PetakanPemilihController@updateStatus');
	
	//tambah data pemilih
	Route::post('petakanpemilih/tambahData','PetakanPemilihController@tambahData');

	// Reset database
	Route::post('petakanpemilih/reset-database', 'PetakanPemilihController@resetDatabase');
});

// RELAWAN
Route::middleware(['auth','relawan'])->group(function(){
	Route::get('/notifikasi', 'NotifikasiRelawan@showAllNotifications');
	Route::get('/notifikasi/sendMessage','NotifikasiRelawan@sendMessageToAdmin');
});

//SEMUA BISA MENGAKSES
//routing kirim pengaduan
Route::resource('pengaduan','PengaduanController');



//Uji coba redis
// Route::get('/pemilih_cache', 'PetakanPemilihController@getPemilihWithCache');
// Route::get('/pemilih_query', 'PetakanPemilihController@getPemilihWithQuery');
